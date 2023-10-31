# Mulai dari image PHP
# FROM php:8.2-cli AS php

# RUN php --version

# # Tambahkan baris ini
# ARG DB_CONNECTION
# ARG APP_KEY
# ARG DATABASE_URL
# ARG DB_HOST
# ARG DB_PORT
# ARG DB_DATABASE
# ARG DB_USERNAME
# ARG DB_PASSWORD

# # Install Composer versi 2.5.4
# COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

# # Install Git, zip, dan unzip
# RUN apt-get update && apt-get install -y git zip unzip

# # Install dependensi untuk ekstensi zip PHP
# RUN apt-get update && apt-get install -y libzip-dev

# # Install ekstensi zip PHP
# RUN docker-php-ext-install zip

# # Install dependensi untuk ekstensi pdo_pgsql
# RUN apt-get update && apt-get install -y libpq-dev


# # Install dan aktifkan ekstensi pdo_pgsql dan pgsql
# RUN docker-php-ext-install pdo_pgsql pgsql && docker-php-ext-enable pdo_pgsql pgsql

# # Set working directory
# WORKDIR /app

# # Copy aplikasi ke working directory
# COPY . .

# # Install dependensi PHP dengan Composer
# RUN composer install

# # Cek variabel lingkungan DATABASE_CONNECTION
# RUN echo $DB_CONNECTION
# RUN echo $APP_KEY
# RUN echo $DATABASE_URL
# RUN echo $DB_HOST
# RUN echo $DB_PORT
# RUN echo $DB_DATABASE
# RUN echo $DB_USERNAME
# RUN echo $DB_PASSWORD

# # Cek semua ekstensi PHP yang diaktifkan
# RUN php -m | grep pgsql

# # Mulai dari image Node.js
# FROM node:20 AS nodejs

# WORKDIR /usr/app

# # Copy package.json dan package-lock.json ke working directory
# COPY package*.json ./

# # Install Node.js dan npm
# RUN echo "NODE Version:" && node --version
# RUN echo "NPM Version:" && npm --version

# RUN npm cache clean --force

# # Copy sisa file aplikasi ke working directory
# COPY . .

# # Install dependensi JavaScript dengan npm
# RUN npm install

# # Build aplikasi dengan npm
# RUN npm run build

# # Mulai dari image PHP lagi untuk tahap akhir
# FROM php:8.2-cli

# WORKDIR /app

# # Copy aplikasi dan dependensi dari tahap sebelumnya
# COPY --from=php /app .
# COPY --from=nodejs /usr/app/public ./public


# # Tambahkan skrip entrypoint (misalnya entrypoint.sh)
# COPY entrypoint.sh /entrypoint.sh
# RUN chmod +x /entrypoint.sh

# CMD ["/entrypoint.sh"]

# FROM richarvey/nginx-php-fpm:1.7.2
# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js
RUN apt-get update && apt-get install -y \
    software-properties-common \
    npm
RUN npm cache clean -f && \
    npm install -g n && \
    n stable

# Check Node.js and npm version
RUN node -v && npm -v

# Set the working directory in the container to /var/www
WORKDIR /var/www

# Copy the current directory contents into the container at /var/www
COPY . /var/www

# Image config
ENV SKIP_COMPOSER 0
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Give permissions for the entrypoint.sh file to execute
RUN chmod +x /var/www/entrypoint.sh

# Run entrypoint.sh when the container launches
CMD ["/var/www/entrypoint.sh"]
