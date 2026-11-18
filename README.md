# Online Library

An online library web application for managing books and borrowing.

**ITI Training (FullStack WebDevelopment Using PHP)**

## About

A Laravel application with two separate accounts: admin and student. Admins manage books and can view students and the borrowing history. Students register, browse books, borrow a copy, and return it.

## Features

### Admin

- Log in and reset password
- Create, update, and delete books (title, author, ISBN, published year, number of copies)
- View the student list
- View borrowed books
- Update profile and password

### Student

- Register, log in, and reset password
- Browse books and view book details
- Borrow a book (blocked if the student already has an unreturned copy, or if no copies are left)
- Return a book
- Dashboard of borrowed books
- Update profile and password

## Tech Stack

- PHP 8.2
- Laravel 12
- Laravel Breeze (authentication)
- Blade, Tailwind CSS, Alpine.js, Vite
- MySQL

## Requirements

- PHP ^8.2
- Composer
- Node.js and npm
- MySQL

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Create a MySQL database, then set these values in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=online_library
DB_USERNAME=root
DB_PASSWORD=
```

Then run:

```bash
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

For local development with Vite:

```bash
composer run dev
```

## Default Admin

After seeding:

| Email | Password |
| --- | --- |
| admin@gmail.com | password |

- Admin: `/admin/login`
- Student: `/student/register` and `/student/login`

The seeder also creates 50 books, 50 students, and 100 borrow records.
