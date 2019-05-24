## Laravel Email

After clone or download the project, cd into project folder and run these commands:

```
composer install
```
```
cp .env.example .env
```
```
php artisan key:generate
```

Change database credentials and run migrate command and seed database with dummy emails.

```
php artisan migrate --seed
```

> Run server to test

```
php artisan serve
```

Note: You may need to update email configuration in `.env` file.