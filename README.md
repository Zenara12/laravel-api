# Laravel 11 Installation and Setup Guide

## Prerequisites
Before installing Laravel 11, ensure you have the following installed on your system:

- **PHP**: >= 8.2
- **Composer**: Latest version
- **MySQL** or **PostgreSQL** (or any other supported database)

## Installation
### 1. Clone the Repository (if applicable)
```sh
git clone https://github.com/Zenara12/laravel-api.git
cd your-laravel-project-name
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Create Environment File
```sh
cp .env.example .env
```

Modify the `.env` file and update database credentials accordingly:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

APP_URL=http://localhost:8000
FRONTEND_URL=http://localhost:3000 
SANCTUM_STATEFUL_DOMAINS=localhost:3000
```


### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Run Database Migrations
```sh
php artisan migrate
```

### 7. Serve the Application
```sh
php artisan serve
```

The application should now be running on `http://127.0.0.1:8000/`.

## Additional Commands
### Running Tests
```sh
php artisan test
```



