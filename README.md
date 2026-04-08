# Task Manager Application

## Project Description

A modern, responsive Task Manager application built with Laravel and Tailwind CSS. The application features a Kanban-style board for efficient task tracking and management. It includes administrative modules for both User and Project management, organized within a clean, sidebar-based layout.

Key features include:

- **Kanban Board:** Intuitive interface for managing task progression.
- **Role-Based Access Control (RBAC):** Secure user management features restricted to administrators only.
- **Project Management:** Comprehensive tools for creating, assigning, and managing different projects.
- **Modern UI/UX:** Responsive and attractive design utilizing Tailwind CSS.

## Setup Instructions

Follow these steps to get the project up and running on your local environment.


1. **Install PHP dependencies:**
   Ensure you have Composer installed, then run:

    ```bash
    composer install
    ```

2. **Install NPM dependencies:**
   Ensure you have Node.js and npm installed, then run:

    ```bash
    npm install
    ```

3. **Environment Configuration:**
   Copy the example environment file and configure your environment variables:

    ```bash
    cp .env.example .env
    ```

    Generate the application key:

    ```bash
    php artisan key:generate
    ```

4. **Start the development servers:**
   Open two terminal windows/tabs.

    In the first terminal, start the Laravel backend server (if not using Laragon auto-hosting):

    ```bash
    php artisan serve
    ```

    In the second terminal, start the Vite frontend development server to compile assets:

    ```bash
    npm run dev
    ```

## Database Setup Steps

1. **Configure Database Connection:**
   Open the `.env` file and update your database credentials. For Laragon, it usually looks like this:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=assessment_teledient
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    _(Ensure you create the database in your database manager e.g., HeidiSQL or phpMyAdmin if it does not automatically exist.)_

2. **Run Migrations and Seeders:**
   Execute the database migrations to create the necessary tables, and run the seeders to populate initial data (such as default administrator roles and sample users/projects).
    ```bash
    php artisan migrate:fresh --seed
    ```

## Credential To Login Into The System

1. **Admin**
   Email : admin@example.com
   Password : password

2. **User 1**
   Email : test@example.com
   Password : password

3. **User 2**
   Email : sandy07@example.com
   Password : password
