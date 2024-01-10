# Bicycle Exercise

## Steps to install and run

 1. git clone https://github.com/mason88/bc.git
 2. cd bc
 3. cp .env.example .env
 4. ./vendor/bin/sail composer install
 5. ./vendor/bin/sail up -d
 6. open 127.0.0.1 in browser

## Steps to test

 1. ./vendor/bin/sail artisan test

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


