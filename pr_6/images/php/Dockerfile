FROM php:8.1-apache
WORKDIR /var/www/denis
RUN docker-php-ext-install mysqli && pecl install redis && docker-php-ext-enable redis && a2enmod authn_dbd \
&& apt-get update && apt-get install -y apache2-utils libaprutil1-dbd-mysql && service apache2 restart