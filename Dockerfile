FROM php:8.2-apache

# 1) Dependencias del sistema + Node.js/NPM
RUN apt-get update && apt-get install -y \
      libpng-dev \
      libjpeg-dev \
      libfreetype6-dev \
      git \
      unzip \
      curl \
      libxml2-dev \
      libxslt-dev \
      nodejs \
      npm \
    && rm -rf /var/lib/apt/lists/*

# 2) Extensiones de PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql opcache xsl

# 3) Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# 4) Directorio de trabajo
WORKDIR /var/www/html

# 5) Copiar ficheros de dependencias para aprovechar la cache de Docker
COPY composer.json composer.lock ./
COPY frontend/package*.json ./frontend/

# 6) Instalar Composer
RUN curl -sS https://getcomposer.org/download/2.4.4/composer.phar \
     -o /usr/local/bin/composer \
 && chmod +x /usr/local/bin/composer

# 7) Instalar dependencias PHP (incluye MakerBundle dev)
RUN composer install --no-interaction --optimize-autoloader --no-scripts

# 8) Instalar dependencias JS y compilar frontend
RUN cd frontend \
 && npm install \
 && npm run build \
 # Mover el output del frontend al directorio público de Symfony
 && cp -R dist/* ../public/

# 9) Copiar el resto del código (src, config, public, etc.)
COPY . .

# 10) Permisos para cache, logs y sesiones
RUN mkdir -p var/cache var/log var/sessions \
 && chown -R www-data:www-data var/cache var/log var/sessions

# 11) Exponer puerto 80 y arrancar Apache
EXPOSE 80
CMD ["apache2-foreground"]
