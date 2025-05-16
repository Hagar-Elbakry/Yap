# Yap

Yap is a Laravel-based social platform for sharing posts.

## Technologies Used

- **Laravel** (PHP framework)
- **PHP** (Backend language)
- **MySQL** (Database)
- **Tailwind CSS** (Frontend styling)
- **Composer** (PHP dependency manager)

## Features 

- User registration, login and password reset
- Post creation, liking and disliking
- User profiles with avatars, banners and bios
- Follow/Unfollow functionality
- Notifications for follows and post reactions
- Admin dashboard for managing users and posts
- Uses Laravel Form Request classes to handle validation and authorization of incoming HTTP requests

## File Storage

This project use Laravel's built-in file storage system to handle user-uploaded files, such as profile avatars and banners.
Make sure to create a symbolic link for the `storage` directory with the following command:

```sh
php artisan storage:link
```

Uploaded files are stored in `storage/app/public/` and are accessible via the `public/storage` URL.

## Authorization and Middleware

This project uses Laravel Gates and Policies to control access to actions such as editing or deleting posts and profiles.  
Custom middleware is also used to protect routes and ensure only authorized users can access certain features (such as admin routes or user-specific actions).

- **Gates & Policies:** Manage permissions for actions like updating or deleting posts and profiles.
- **Middleware:** Protects routes, handles authentication, and restricts access to admin or user-only areas.

## Installation

1. **Clone the repository:**
    ```sh
    git clone https://github.com/Hagar-Elbakry/yap.git
    cd yap
    ```

2. **Install PHP dependencies:**
   ```sh
   composer install
   ```

3. **copy and configure environment:**
   ```sh
   cp .env.example .env
   # Edit .env with your database and mail settings
   ```

4. **Generate application key:**
   ```sh
   php artisan key:generate
   ```

5. **Run migrations and seeders:**
   ```sh
   php artisan migrate --seed
   ```

6. **Start the development server:**
   ```sh
   php artisan serve
   ```

## Folder Structure

- `app/` - Application logic (Controllers, Models, Mail, Notifications, etc.)
- `resources/views/` - Blade templates for frontend
- `routes/` - Route definitions
- `database/migrations/` - Database schema
- `database/seeders/` - Seed data
- `public/` - Public assets
- `config/` - Configuration files

## Admin Acess

To access the admin dashboard, log in as a user with `is_admin` set to `true` in the `users` table.

