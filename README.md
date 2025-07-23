# SchoolNexus - PHP Multi-School Management System

A complete school management system built with plain PHP and MySQL, supporting multiple schools, role-based access, and all core features as shown in the provided dashboard screenshots.

## Features
- Multi-school support (Super Admin, School Admin, etc.)
- Student, Teacher, Class, Subject, Term, Exam, and Fee management
- Real MySQL database integration
- Dashboard statistics and reports
- Authentication and role-based access

## Installation

### Requirements
- PHP 8.0+
- MySQL 5.7+
- Apache/Nginx (with mod_rewrite enabled for Apache)

### Steps

1. **Clone the repository**
   ```bash
   git clone <repo-url> schoolnexus
   cd schoolnexus
   ```

2. **Copy environment file**
   ```bash
   cp .env.example .env
   # Edit .env and set your MySQL credentials
   ```

3. **Create the database**
   ```sql
   CREATE DATABASE schoolnexus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

4. **Import migrations and seeders**
   - Import all SQL files in `database/migrations/` (in order)
   - Import all SQL files in `database/seeders/` (in order)

   You can use a tool like phpMyAdmin or the MySQL CLI:
   ```bash
   mysql -u root -p schoolnexus < database/migrations/001_create_schools_table.sql
   # ...repeat for all migration files in order
   mysql -u root -p schoolnexus < database/seeders/001_seed_schools.sql
   # ...repeat for all seeder files in order
   ```

5. **Set up your web server**
   - Set the document root to the `public/` directory.
   - For Apache, ensure `.htaccess` is enabled for clean URLs.
   - For Nginx, configure routing to `public/index.php`.

6. **Access the application**
   - Visit `http://localhost/` in your browser.
   - Login with demo credentials:
     - **Super Admin:** `admin@schoolnexus.com` / `admin123`
     - **School Admin:** `schooladmin@schoolnexus.com` / `admin123`

7. **Start building!**

---

For production, update your `.env` and web server settings accordingly. Passwords in demo data are plain for testing; use password hashing in production.
