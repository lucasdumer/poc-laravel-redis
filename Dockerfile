FROM php:7.4-cli

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

EXPOSE 8000
