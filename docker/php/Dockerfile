ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-fpm

ARG DIR
ARG PORT=9000
ARG USER=www-data
ARG UID=1000

WORKDIR $DIR

COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer

RUN usermod -d /home/$USER $USER
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    wget \
    openssl \
    git \
    libmemcached-dev \
    libc-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
	libmcrypt-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-install iconv mbstring pdo mysqli pdo_mysql exif zip pcntl bcmath \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get -y --no-install-recommends install php${PHP_VERSION}-{gd, mysql, xml, zip, mbstring, sqlite, pdo_mysql, soap} \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && mkdir -p /home/$USER/.composer && chown -R $USER:$USER /home/$USER
RUN pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug \
    && touch /tmp/xdebug.log && chmod 777 /tmp/xdebug.log

USER $USER
EXPOSE $PORT
CMD ["php-fpm"]
