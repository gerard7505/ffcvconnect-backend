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

# 5) Copiar primero TODO el código (no solo composer.json)
COPY . .

# 6) Instalar Composer
RUN curl -sS https://getcomposer.org/download/2.4.4/composer.phar -o /usr/local/bin/composer \
 && chmod +x /usr/local/bin/composer

# 7) Instalar dependencias PHP (ahora que el código y bin/console ya están)
RUN composer install --no-interaction --optimize-autoloader

# 8) Instalar dependencias JS y compilar frontend
WORKDIR /var/www/html/frontend
RUN npm install && npm run build

# 9) Volver al root y mover frontend build a public
WORKDIR /var/www/html
RUN cp -R frontend/dist/* public/

# 10) Permisos para cache, logs y sesiones
RUN mkdir -p var/cache var/log var/sessions \
 && chown -R www-data:www-data var/cache var/log var/sessions

# 11) Exponer puerto 80 y arrancar Apache
EXPOSE 80
CMD ["apache2-foreground"]
