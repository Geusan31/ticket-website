# Mulai dari image PHP
FROM php:8.2-cli

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy aplikasi ke working directory
COPY . /app

# Install dependensi PHP dengan Composer
RUN composer install

# Install Node.js dan npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Install dependensi JavaScript dengan npm
RUN npm install

# Build aplikasi dengan npm
RUN npm run build

# Jalankan aplikasi
CMD php -S 0.0.0.0:8080 -t public/
