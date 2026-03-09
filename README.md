Mini Task Manager
<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"> </a> </p>

A simple task management application built with Laravel
 that allows users to register, log in, create, update, and delete tasks. It also includes an admin panel for managing users and tasks.

Features

User authentication (login, register, logout)

Password reset via email

Email verification

CRUD operations for tasks

Admin dashboard for managing users and tasks

CSRF protection

Responsive UI with Blade templates

Installation
Requirements

PHP >= 8.0

Composer

MySQL / MariaDB / PostgreSQL

Node.js & npm (for compiling assets)

Mail server for sending emails (e.g., SMTP, Mailtrap for testing)

Steps

Clone the repository:

git clone https://github.com/yourusername/mini-task-manager.git
cd mini-task-manager

Install PHP dependencies:

composer install

Copy .env.example to .env and configure your environment variables:

cp .env.example .env

Set database credentials

Set mail credentials for password reset:

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Mini Task Manager"

Generate application key:

php artisan key:generate

Run migrations:

php artisan migrate

(Optional) Seed database:

php artisan db:seed

Install Node.js dependencies & compile assets:

npm install
npm run dev

Start the development server:

php artisan serve

Your app will run at http://localhost:8000

Usage

Register a new user

Log in to access the dashboard

Create tasks from the dashboard

Edit or delete tasks

Admin panel is accessible if the user has admin privileges

Routes

GET /tasks – List tasks

POST /tasks – Create task

PUT/PATCH /tasks/{id} – Update task

DELETE /tasks/{id} – Delete task

GET /admin/dashboard – Admin panel

Password reset routes are fully functional via /forgot-password and /reset-password/{token}

Contributing

Fork the repository

Create a new branch (git checkout -b feature/YourFeature)

Commit your changes (git commit -m 'Add new feature')

Push to the branch (git push origin feature/YourFeature)

Open a pull request

License

This project is open-sourced under the MIT License.

Contact

For questions or suggestions, contact mohammad naviwala
