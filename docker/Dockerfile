FROM php:8.0-fpm-alpine

WORKDIR /var/www

RUN apk update --no-cache \
&& apk add \
icu-dev \
oniguruma-dev \
tzdata
 
RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install mysqli 
 
RUN rm -rf /var/cache/apk/*
 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
