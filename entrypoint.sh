#!/bin/bash

php artisan optimize:clear
php artisan migrate --force
php -S 0.0.0.0:80 -t public/
