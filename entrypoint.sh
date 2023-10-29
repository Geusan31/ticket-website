#!/bin/bash

php artisan optimize:clear
php artisan migrate --force
php -S 0.0.0.0:8080 -t public/
