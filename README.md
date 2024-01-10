
# Bicycle Exercise

## Steps to install and run

    git clone https://github.com/mason88/bc.git
    
    cd bc
    
    cp .env.example .env
    
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
    
    ./vendor/bin/sail up -d
    
    ./vendor/bin/sail artisan key:generate
    
    open 127.0.0.1 in browser

## Steps to test

    ./vendor/bin/sail artisan test

## Notes on implementation

 - Uses Laravel, Blade, Sail/Docker
 - Uses PHP 8 features much as possible including:
   - Constructor property promotion
   - Typed function parameters and return types
   - Enums
 - Files of interest to review:
   - app/Models/\*
   - app/Enums/Direction.php
   - app/Http/Controllers/BicycleController.php
   - resources/views/bicycle.blade.php
   - tests/Unit/BicycleTest.php

