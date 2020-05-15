FROM php:7.4-fpm
LABEL maintainer="support@isiroca.com"

RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    default-mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmagickwand-dev \
    libzip-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    && pecl install imagick

# Clear cache
RUN rm -rf /tmp/* \
    && rm -rf /var/list/apt/* \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean

# Installing extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath opcache
RUN docker-php-ext-enable imagick

# Installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Setting locales
RUN echo en_EN.UTF-8 UTF-8 > /etc/locale.gen && locale-gen

# Allow container to write on host
RUN usermod -u 1000 www-data

# Changing Workdir
WORKDIR /ssm
