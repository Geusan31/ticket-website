#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/

echo "Running npm install"
npm install

echo "Running npm build"
npm run build

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

php -S 0.0.0.0:80 -t public/