FROM php:8.3-apache

LABEL org.opencontainers.image.source="https://github.com/NichoSeb2/portfolio"
LABEL org.opencontainers.image.description="My portfolio, made with Symfony and Tailwind"

# Update system
RUN apt-get update && apt-get upgrade -y

# Global requirement
RUN apt-get install -y nano wget git gcc make autoconf

# Node JS install
RUN apt-get install -y ca-certificates curl gnupg
RUN mkdir -p /etc/apt/keyrings
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
RUN apt-get update && apt-get install -y nodejs

# Composer install
COPY --from=composer:2.8 /usr/bin/composer /usr/local/bin/composer

# Symfony CLI install
# RUN cd /root \
#     && wget https://github.com/symfony-cli/symfony-cli/releases/download/v5.5.6/symfony-cli_linux_amd64.tar.gz \
#     && tar -xf symfony-cli_linux_amd64.tar.gz \
#     && mv /root/symfony /usr/local/bin/symfony

# MySQL install
RUN docker-php-ext-install -j$(nproc) mysqli
RUN docker-php-ext-install -j$(nproc) pdo_mysql

# OPcache install
RUN docker-php-ext-install -j$(nproc) opcache

# intl install
RUN apt-get install -y libicu-dev
RUN docker-php-ext-install -j$(nproc) intl

# pcntl install
RUN docker-php-ext-install -j$(nproc) pcntl

# XDebug install
RUN pecl install xdebug && docker-php-ext-enable xdebug

# yaml install
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libc-dev pkg-config libyaml-dev
RUN pecl install yaml && docker-php-ext-enable yaml

# zip install
RUN apt-get install -y libzip-dev unzip
RUN pecl install zip && docker-php-ext-enable zip

# APCu install
RUN pecl install apcu && docker-php-ext-enable apcu

# Clean up
RUN apt autoremove

# Apache setup and PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ./docker/production/php.ini /usr/local/etc/php/conf.d/more_upload_size.ini

RUN a2enmod rewrite

RUN a2dissite 000-default.conf

COPY ./docker/production/000-public.conf /etc/apache2/sites-available/000-public.conf

RUN a2ensite 000-public.conf

RUN useradd container -u 1000 -m
USER container

RUN echo 'alias sc="php bin/console"' >> /home/container/.bashrc

# Copy project file and install
WORKDIR /var/www/html

COPY --chown=container:container ./ ./

# Default environment variables
#? Need to be denined before composer install

# symfony/framework-bundle
ENV APP_ENV=prod
ENV APP_SECRET=
ENV APP_DEBUG=0

# doctrine/doctrine-bundle
ENV DATABASE_URL=mysql://root:root@db:3306/app?serverVersion=11.4.4-MariaDB&charset=utf8mb4

RUN composer install --no-dev --optimize-autoloader
