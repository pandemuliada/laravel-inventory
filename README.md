# Laravel Inventory

Open source laravel project about inventory management for learning purpose

## Getting Started

1. Clone this repo
2. Run `composer install`
3. Run `npm install` or `yarn install`
4. Create copy of .env file `cp .env.example .env`
5. Config your `.env` file
6. Generate encryption key `php artisan key:generate`
7. Create an empty database match your `.env` configuration
8. Migrate database `php artisan migrate`
9. Seed the database `php artisan db:seed`

## Important

Enable `extension=exif` on your `php.ini` file.

## Topic

-   [x] Eloquent
-   [x] Seeder
-   [x] Factory
-   [x] Midleware
-   [x] Soft Delete
-   [x] Model Relationship
-   [x] Permissions & Roles using [spatie/laravel-permission](https://docs.spatie.be/laravel-permission/v3/)
-   [x] Media & File Upload using [spatie/laravel-medialibrary](https://docs.spatie.be/laravel-medialibrary/v8/)

## Users

_Note: User password is the same as the email_

-   superadmin@gmail.com
-   admin@gmail.com
-   user@gmail.com

_Feel free to contribute_
