FROM php:8.0-cli

RUN apt-get update -y && \
    apt-get upgrade -y

RUN apt-get install -y git \
    zip \
    unzip

RUN pecl install -o -f redis \
    &&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 8000
