FROM php:7.0.24-fpm

ADD php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt-get update \
  && docker-php-ext-install pdo_mysql mysqli mbstring

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && docker-php-ext-install zip pdo pdo_mysql \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer
#RUN apt-get update \
# Mongo db
#RUN apt-get install -y autoconf pkg-config libssl-dev
#RUN pecl install mongodb-1.2.2
#RUN docker-php-ext-install bcmath
#RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini
#  && apt-get install -y libmemcached-dev zlib1g-dev \
#  && pecl install memcached-2.2.0 \
#  && docker-php-ext-enable memcached
