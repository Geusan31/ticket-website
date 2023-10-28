# Mulai dari image PHP
FROM php:8.2-cli

# Install Composer versi 2.5.4
COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

# Install Git, zip, dan unzip
RUN apt-get update && apt-get install -y git zip unzip

# Install dependensi untuk ekstensi zip PHP
RUN apt-get update && apt-get install -y libzip-dev

# Install ekstensi zip PHP
RUN docker-php-ext-install zip

# Set working directory
WORKDIR /app

# Copy aplikasi ke working directory
COPY . /app

# Install dependensi PHP dengan Composer
RUN composer install

# Install Node.js dan npm
RUN curl -sL https://deb.nodesource.com/setup_18.14 | bash -
RUN apt-get install -y nodejs

# Install Node.js dan npm
RUN echo "NODE Version:" && node --version
RUN echo "NPM Version:" && npm --version

# Install dependensi JavaScript dengan npm
RUN npm install

# Build aplikasi dengan npm
RUN npm run build

# Jalankan migration
RUN php artisan migrate --force

# Jalankan aplikasi
CMD php -S 0.0.0.0:80 -t public/