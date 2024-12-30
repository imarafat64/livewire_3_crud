<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Livewire 3 SPA CRUD With Laravel 11


A Single Page Application (SPA) CRUD implementation using Laravel 11 and Livewire 3, demonstrating real-time data manipulation without page refreshes.

Features 

1. Laravel 11 framework

2. Livewire 3 for reactive components


3. Single Page Application (SPA) architecture

4. CRUD operations for posts

5. Real-time UI updates

6. Responsive design

Prerequisites :

1. PHP >= 8.2

2. Composer

3. Node.js & NPM

4. MySQL

Post Management:

1. Create new posts with a form interface
2. Display posts in a table format
3. Real-time updates when posts are created/modified
4. Responsive UI design



 





## Installation

1. Clone the repository:

```bash
  git clone [your-repository-url]
  cd livewire-3-spa-crud
```
2. Install PHP dependencies:

```bash
  composer install
```

3. Copy the environment file:

```bash
  cp .env.example .env
```

4. Configure your database in .env file:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

4. Generate application key:

php artisan key:generate

5. Run migrations

php artisan migrate

6. Start the development server:

php artisan serve




## Tech Stack

**Framework:** Laravel 11

**Frontend:** Livewire 3

**Database:** MySQL 



## Authors

- [@imarafat64](https://github.com/imarafat64)


