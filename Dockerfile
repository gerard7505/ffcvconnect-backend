FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    git \
    unzip \
    curl \
    libxml2-dev \
    libxslt-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql opcache xsl \
    && docker-php-ext-enable pdo_mysql pdo_pgsql

RUN a2enmod rewrite

# DocumentRoot apuntando a public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Permitir .htaccess
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/symfony.conf \
    && a2enconf symfony

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/download/2.4.4/composer.phar -o /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

RUN composer install --no-scripts --optimize-autoloader --no-interaction

RUN mkdir -p var/cache var/log var/sessions && chown -R www-data:www-data var

EXPOSE 80

CMD ["apache2-foreground"]
