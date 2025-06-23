## Description
It is a simple Laravel 8 based application that allows you to keep and manage a directory of personal links.

## Demo
[You can browse application demo and play with dummy data.](https://bookmarks.monolitpro.info)

## Installation
1. Clone the repository to your installation folder
```bash
git clone git@github.com:OlegApanovich/laravel-bookmark-application.git .
```

2. Create an app environment file
```bash
cp .env.example .env
```
And configure it with your environment's purpose.

4. Then
```bash
composer install
``` 

5. Then
```bash
php artisan serve
```

That's all. Now you can browse your application by following the link http://127.0.0.1:8000

#### Optional
For some hosting environments, you need to run additional commands to provide appropriate file permissions and generate an app secret key

chmod -R gu+w storage

chmod -R guo+w storage

php artisan key:generate

php artisan cache:clear

Also, you may have added .htaccess to the public app folder and put some rewrite rules in it
```
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>
    RewriteEngine On
    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} ^(.*)
    RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]
    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]
    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```
