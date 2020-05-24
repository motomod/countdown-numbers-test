FROM php:7-fpm

RUN apt update && apt install libzip-dev -y

RUN docker-php-ext-install mysqli zip && docker-php-ext-enable mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
