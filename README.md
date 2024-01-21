# My Project

This project uses PHP 8.2.10-2ubuntu 1and Laravel 10.41.0.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 8.2
- Laravel 10

### Installing

Clone the repository:
Run Migration or go to database folder and import the db

### Resetting the Database
- php artisan migrate:fresh

If you want to seed your database after running the migrations, you can use the --seed option:

- php artisan migrate:fresh --seed

#### Seeding Individual Tables

You can seed individual tables by running the corresponding seeder class. Here are the commands to seed the `Languages`, `Users`, and `Items` tables:

- php artisan db:seed --class=LanguagesTableSeeder
- php artisan db:seed --class=UsersTableSeeder
- php artisan db:seed --class=ItemsTableSeeder

#### Seeding All Tables

Alternatively, you can seed all tables at once by running the `db:seed` command without specifying a seeder class. This will run all registered seeders:

- php artisan db:seed

Please note that if you want to force seeders to run in production, you can use the `--force` flag:

- php artisan db:seed --force
 
