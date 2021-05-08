FROM php:7.4-cli

RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 8000
