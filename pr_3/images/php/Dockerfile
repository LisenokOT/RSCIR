FROM php:7.2-apache
RUN apt-get update && docker-php-ext-install mysqli && sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf