#Setup

- Clone the repository.
```
git clone https://github.com/skyshader/laravel-person-relation-app
```
- Switch to the directory and run composer install.
```
composer install
```
- Duplicate the .env.example file and rename it to .env:
```
.env.example -> .env
```
- Create a database and update the .env file to reflect the same.
- Run migrations.
```
php artisan migrate
```
- Optionally you can seed the database.
```
php artisan db:seed
```
- Run the server.
```
php artisan serve
```
