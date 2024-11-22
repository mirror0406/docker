FROM php:7.4-fpm

ADD ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN pear config-set php_ini "$PHP_INI_DIR"

RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*

# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install nano wget \
dialog \
libsqlite3-dev \
libsqlite3-0 && \
    apt-get -y --no-install-recommends install default-mysql-client \
zlib1g-dev \
libzip-dev \
libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils \
libmemcached11 \
libmemcachedutil2 \
libmemcached-dev \
build-essential \
git \
curl \
libonig-dev && \
    apt-get -y --no-install-recommends install --fix-missing libcurl4 \
libcurl4-openssl-dev \
zip \
openssl && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Install imagick
#RUN apt-get update && apt-get install -y \
#    libmagickwand-dev --no-install-recommends \
#    && pecl install imagick \
#	&& docker-php-ext-enable imagick
#
## Install xdebug
#RUN pecl install xdebug-2.8.0 && \
#    docker-php-ext-enable xdebug
#
#RUN pecl install redis && \
#    docker-php-ext-enable redis


#RUN pecl install memcached

#RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

RUN apt-get update -y
RUN apt-get install -y iputils-ping

# Other PHP7 Extensions

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo_sqlite && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install curl && \
    docker-php-ext-install tokenizer && \
    docker-php-ext-install json && \
    docker-php-ext-install zip && \
    docker-php-ext-install -j$(nproc) intl && \
    docker-php-ext-install mbstring && \
    docker-php-ext-install gettext


RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet


WORKDIR /var/www/html