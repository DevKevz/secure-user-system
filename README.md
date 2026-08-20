# Secure User Management System

A secure PHP 8 and Laravel-based authentication and user profile management system developed as part of a practical coding assessment.

## Features

- User registration
- User login and logout
- Session-based authentication
- 30-minute session timeout
- Password hashing using `password_hash()`
- Password verification using `password_verify()`
- PDO database interaction
- Prepared SQL statements
- User profile CRUD operations
- Create profiles
- View profiles
- Update profiles
- Delete profiles
- Delete confirmation prompt
- CSRF protection
- XSS protection through escaped output
- Client-side validation
- Server-side validation
- Profile ownership authorization
- User-friendly validation and error messages
- Responsive Bootstrap 5 interface

## Technology Stack

- PHP 8.2
- Laravel 12
- MySQL
- PDO
- Bootstrap 5
- Blade Templates
- JavaScript

## Requirements

Before running the application, install:

- PHP 8.2 or higher
- Composer
- MySQL
- XAMPP or another PHP/MySQL environment

## Installation

### 1. Clone the repository

```bash
git clone YOUR_REPOSITORY_URL
cd secure-user-system

2. Install dependencies
composer install
3. Configure environment

Copy .env.example to .env.

cp .env.example .env

For Windows, you can also manually copy .env.example and rename it to .env.

Configure the database in .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secure_user_system
DB_USERNAME=root
DB_PASSWORD=
4. Generate application key
php artisan key:generate
5. Run migrations
php artisan migrate

Alternatively, the included database.sql file can be imported into MySQL/phpMyAdmin.

6. Start the application
php artisan serve

Open:

http://127.0.0.1:8000
Security

The application implements several security practices:

Password Security

Passwords are securely hashed before being stored and verified using password_verify().

SQL Injection Protection

Database operations use PDO prepared statements with bound parameters.

XSS Protection

User-generated output is escaped using Laravel Blade's default escaping behavior.

CSRF Protection

POST forms include Laravel CSRF tokens.

Session Security

Authenticated sessions use session regeneration and include an inactivity timeout.

Authorization

Users can only update or delete profiles associated with their authenticated account.

Database

The project includes:

database.sql

which contains the database structure for the users and profiles tables.

Project Structure
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── ProfileController.php
│   │   └── Controller.php
│   └── Middleware/
│       └── CheckSession.php
│
resources/
└── views/
    ├── auth/
    ├── profiles/
    └── dashboard.blade.php


routes/
└── web.php


database.sql
README.md
Author

Kevin Laurente

Developed as a practical coding assessment project.