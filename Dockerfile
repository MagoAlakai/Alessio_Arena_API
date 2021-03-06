FROM php:7.4.19-fpm-alpine3.12

RUN apk update && apk upgrade

RUN apk add --no-cache linux-headers libmcrypt libmcrypt-dev icu-dev gmp-dev tidyhtml-dev libxml2-dev freetype-dev gettext-dev libpng-dev libjpeg-turbo-dev g++ openssh-client make libcurl curl autoconf zlib-dev php-pear php-curl
RUN apk add --no-cache php7-pear php7-dev php7-mysqli php7-pecl-xdebug

RUN docker-php-source extract

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install exif
RUN docker-php-ext-install gd
RUN docker-php-ext-install gettext
RUN docker-php-ext-install iconv
RUN docker-php-ext-install intl
RUN docker-php-ext-install soap
RUN docker-php-ext-install tidy
RUN docker-php-ext-install tokenizer
RUN docker-php-ext-install xml
RUN docker-php-ext-install xmlwriter

RUN docker-php-source delete
RUN rm -rf /tmp/*
RUN mkdir -p /usr/share/nginx/html && chown -Rf www-data:www-data /usr/share/nginx/html && chmod -Rf 775 /usr/share/nginx/html

CMD [ "php-fpm", "-F" ]

WORKDIR /usr/share/nginx/html

EXPOSE 9000
