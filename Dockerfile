FROM php:8.2-apache

# Instala dependencias del sistema y PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev git unzip curl libxml2-dev libxslt-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql opcache xsl

# Habilita mod_rewrite
RUN a2enmod rewrite

# Cambia DocumentRoot a public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Copia el proyecto
COPY . /var/www/html

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Instala dependencias de Symfony (modo producción)
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Asigna permisos a carpetas necesarias
RUN mkdir -p var/cache var/log var/sessions && \
    chown -R www-data:www-data var

EXPOSE 80
CMD ["apache2-foreground"]

