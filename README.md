# Task Backend Setup

This guide will help you set up the Task Backend.

1. **Prerequisites:**
   - Docker
   - WSL 2 (Windows Subsystem for Linux)
   - Ubuntu

2. **Setup Steps:**
   - Open the Ubuntu terminal.
   - Clone the repository:
     ```bash
     git clone https://github.com/mj-medina/task-backend.git
     ```
   - Navigate to the project directory:
     ```bash
     cd task-backend
     ```
   - Copy the `env.example` file and create a `.env` file:
     ```bash
     cp env.example .env
     ```
   - Start the Docker containers:
     ```bash
     sail up -d
     ```
   - Generate the Laravel application key:
     ```bash
     sail artisan key:generate
     ```
   - Access MySQL and create the "task" database:
     ```bash
     sail mysql -u sail -p
     ```
     Enter the password (default is 'password') and run the SQL command:
     ```sql
     CREATE DATABASE task;
     ```
   - Run the database migrations:
     ```bash
     sail artisan migrate
     ```
   - (Optional) Seed the database with sample data:
     ```bash
     sail artisan db:seed
     ```
   - (Optional) Install additional dependencies:
     ```bash
     sail composer install
     ```
   - The backend API will be accessible at [http://localhost:8000](http://localhost:8000).
