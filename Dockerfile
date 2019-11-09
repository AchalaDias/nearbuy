FROM php:7-fpm

MAINTAINER Achala Dias

#RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client && docker-php-ext-install mcrypt pdo_mysql
RUN apt-get update -y && apt-get install -y openssl zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY . /app

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8181

EXPOSE 8181

#FROM php:7
#RUN apt-get update -y && apt-get install -y openssl zip unzip git
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo mbstring
#WORKDIR /app
#COPY . /app
#RUN composer install
#
#CMD php artisan serve --host=0.0.0.0 --port=8181
#EXPOSE 8181