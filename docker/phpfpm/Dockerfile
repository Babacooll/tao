FROM php:7.1-fpm-alpine

ENV PHPIZE_DEPS \
		autoconf \
		dpkg-dev dpkg \
		file \
		g++ \
		gcc \
		libc-dev \
		make \
		pkgconf \
		re2c

RUN set -xe \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        coreutils \
         zlib-dev \
    && pecl install apcu \
    && pecl install  -o -f igbinary

RUN docker-php-ext-enable apcu igbinary
RUN docker-php-ext-install mbstring

RUN apk del .build-deps \
    && rm -rf /tmp/pear ~/.pearrc

