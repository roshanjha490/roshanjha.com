FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd mbstring pdo_mysql


WORKDIR /var/www

COPY composer.json composer.lock ./

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --no-scripts --prefer-dist


# RUN chmod -R 777 storage bootstrap/cache