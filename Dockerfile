FROM php:8.2-apache

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    curl \
    libxml2-dev \
    libxslt-dev

# Extensiones de PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql opcache xsl

# Habilita mod_rewrite de Apache
RUN a2enmod rewrite

# Directorio de trabajo
WORKDIR /var/www/html

# Copia archivos del proyecto
COPY . .

# Instala Composer
RUN curl -sS https://getcomposer.org/download/2.4.4/composer.phar -o /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

# Instala dependencias (incluyendo dev para evitar error del MakerBundle)
RUN composer install --optimize-autoloader

# Crear directorios si no existen y asignar permisos
RUN mkdir -p var/cache var/log var/sessions && \
    chown -R www-data:www-data var/cache var/log var/sessions

# Exponer puerto
EXPOSE 80

# Comando final
CMD ["apache2-foreground"]
