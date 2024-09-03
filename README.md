# Storeroom | Estoque

Um app web para gerenciar seu estoque ou escritório.

A web app to manage your storeroom or office.

## How to run

Prerequisites:
* PHP >=8.2
* Node >=20.*

Initial Setup:

```bash
composer install
npm i
cp .env.example .env
php artisan key:generate
```

To start docker containers:

```bash
./vendor/bin/sail up
```
In detached mode:

```bash
./vendor/bin/sail up -d
```
Run the migrations:
```bash
sail artisan migrate
```
To start vite:

```javascript
npm run dev
```

I am using the Laravel Sail dev environment.
To use too, learn it from [Laravel Sail](https://laravel.com/docs/10.x/sail).
