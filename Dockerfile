# Mulai dari image PHP
FROM php:8.2-cli AS php

# Install Composer versi 2.5.4
COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

# Install Git, zip, dan unzip
RUN apt-get update && apt-get install -y git zip unzip

# Install dependensi untuk ekstensi zip PHP
RUN apt-get update && apt-get install -y libzip-dev

# Install ekstensi zip PHP
RUN docker-php-ext-install zip

# Install dependensi untuk ekstensi pdo_pgsql
RUN apt-get update && apt-get install -y libpq-dev

# Install ekstensi pdo_pgsql
RUN docker-php-ext-install pdo_pgsql

# Set working directory
WORKDIR /app

# Copy aplikasi ke working directory
COPY . .

# Install dependensi PHP dengan Composer
RUN composer install

# Mulai dari image Node.js
FROM node:20 AS nodejs

WORKDIR /usr/app

# Copy package.json dan package-lock.json ke working directory
COPY package*.json ./

# Install Node.js dan npm
RUN echo "NODE Version:" && node --version
RUN echo "NPM Version:" && npm --version

RUN npm cache clean --force

# Copy sisa file aplikasi ke working directory
COPY . .

# Install dependensi JavaScript dengan npm
RUN npm install

# Build aplikasi dengan npm
RUN npm run build

# Mulai dari image PHP lagi untuk tahap akhir
FROM php:8.2-cli

WORKDIR /app

# Copy aplikasi dan dependensi dari tahap sebelumnya
COPY --from=php /app .
COPY --from=nodejs /usr/app/public ./public

# Jalankan migration (tambahkan baris ini)
RUN php artisan migrate --force

# Jalankan aplikasi
CMD php -S 0.0.0.0:80 -t public/