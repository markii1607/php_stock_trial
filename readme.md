
# PHP stock Management System Trial

A trial system based on West Acton's trial project using PHP, Laravel Framework and MySQL.

## Installation

1. Install [Git](https://git-scm.com/), [Composer](https://getcomposer.org/download/) and [NodeJS](https://nodejs.org/en/download/). 
2. Go to your htdocs folder, then using Git, clone the repository:

```git
git clone https://github.com/markii1607/php_stock_trial.git
```
3. Then, run the following commands to install the dependencies:
```bash
cd php_stock_trial
npm install
composer install
```
4. Go to your PhpMyAdmin and create a database called `php_stock_trial`.
5. Now, copy the `.env.example` file and rename it to `.env`.
6. Open the `.env` file and edit the following lines:
```php
APP_DEBUG=false
DB_DATABASE=php_stock_trial // the database that you created on step 4
```
7. Run `php artisan key:generate` to generate the application key
8. Run the migration and seeder file to populate the database:
```php
composer dumpautoload
php artisan migrate --seed
```

## Usage
Go inside the folder of the project then run the local server of Laravel in your command prompt:
```php
php artisan serve
```

Then access the system using the link [localhost:8000](localhost:8000).