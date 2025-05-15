FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
      libpng-dev libjpeg-dev libfreetype6-dev git unzip curl libxml2-dev libxslt-dev nodejs npm \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql opcache xsl

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/download/2.4.4/composer.phar -o /usr/local/bin/composer \
 && chmod +x /usr/local/bin/composer

RUN composer install --no-interaction --optimize-autoloader --no-scripts

RUN php bin/console cache:clear --env=prod

WORKDIR /var/www/html/frontend
RUN npm install && npm run build

WORKDIR /var/www/html
RUN cp -R frontend/dist/* public/

RUN mkdir -p var/cache var/log var/sessions \
 && chown -R www-data:www-data var/cache var/log var/sessions

EXPOSE 80
CMD ["apache2-foreground"]
