FROM php:8.2-fpm

WORKDIR /var/www
# Install system dependencies

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y  libpng-dev libonig-dev libxml2-dev zip unzip git curl libbz2-dev \
    libicu-dev \
    libonig-dev \
    libsodium-dev \
    libzip-dev \
    libpq-dev

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash \
    && apt-get update && apt-get install -y nodejs

RUN docker-php-ext-configure intl  
# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif zip pcntl bcmath gd bz2 sodium intl \
    pgsql pdo_pgsql

# RUN addgroup www --gid 1000

# USER www

# COPY --chown=www-data:www-data . /var/www
COPY ./docker/php.ini /usr/local/etc/php/conf.d/php.ini

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]