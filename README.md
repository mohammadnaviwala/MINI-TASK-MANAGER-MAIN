Mini Task Manager


Mini Task Manager is a web application built with Laravel that allows users to manage tasks efficiently. It includes full user authentication, an admin panel, and task management functionality.

Features

User Authentication

Register, login, logout

Email verification

Password reset via email

Task Management

Create, read, update, delete tasks

Assign tasks (optional admin functionality)

Admin Panel

View all users and tasks

Delete users or tasks

Security

CSRF protection

Secure password hashing

Installation
Requirements

PHP >= 8.0

Composer

MySQL / MariaDB / PostgreSQL

Node.js & npm

Mail server (SMTP or Mailtrap for testing)

Steps

Clone the repository

git clone https://github.com/yourusername/mini-task-manager.git
cd mini-task-manager

Install dependencies

composer install

Copy environment file

cp .env.example .env

Update .env with your database credentials and mail settings:

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Mini Task Manager"

Generate application key

php artisan key:generate

Run database migrations

php artisan migrate

Optional: Seed the database

php artisan db:seed

Install Node.js dependencies & compile assets

npm install
npm run dev

Start the development server

php artisan serve

Application will run at: http://localhost:8000

Usage

Dashboard

View all tasks

Add new tasks

Edit or delete tasks

Admin Panel

Manage users

Manage all tasks

Password Reset

Click "Forgot Password?"

Receive reset link via email

Reset your password securely

Routes Overview

Tasks

GET /tasks – List tasks

POST /tasks – Create task

PUT/PATCH /tasks/{id} – Update task

DELETE /tasks/{id} – Delete task

Admin

GET /admin/dashboard – Admin panel

Authentication

GET /login – Login form

POST /login – Login action

GET /register – Registration form

POST /register – Register action

POST /logout – Logout

Password Reset

GET /forgot-password – Request password reset

POST /forgot-password – Send reset email

GET /reset-password/{token} – Reset form

POST /reset-password – Update password

Contributing

Fork the repository

Create a new branch: git checkout -b feature/YourFeature

Commit your changes: git commit -m "Add new feature"

Push to branch: git push origin feature/YourFeature

Open a Pull Request

License

This project is open-sourced under the MIT License.

Contact

For questions or suggestions: MOHAMMAD NAVIWALA AND MAZIN AHMED
