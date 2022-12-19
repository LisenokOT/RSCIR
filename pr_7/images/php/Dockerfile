FROM php:8.1-apache
RUN apt-get update && docker-php-ext-install mysqli && pecl install redis \
 && docker-php-ext-enable redis && apt-get install -y apache2-utils libaprutil1-dbd-mysql \
 && a2enmod authn_dbd
RUN a2enmod rewrite && service apache2 restart