#!/bin/bash

php artisan migrate --force
php -S 0.0.0.0:80 -t public/
