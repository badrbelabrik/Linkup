# LinkUp

## Description

LinkUp is a Laravel web application inspired by LinkedIn. The goal of this project is to build a secure professional social network by implementing authentication, post management, data validation, and authorization while following Laravel's best practices and the MVC architecture.

---

## Features

### Authentication

- User registration
- User login
- User logout
- Automatic login after registration
- Password hashing
- Session management

### News Feed

- Protected `/feed` route
- Display all posts from newest to oldest
- Display author's:
  - Name
  - Headline
  - Profile picture

### Post Management

- Create a new post
- Validate posts using a Form Request
- Only authenticated users can publish posts

### Authorization

- Only the owner of a post can edit it
- Only the owner of a post can delete it
- Unauthorized users receive a **403 Forbidden** response
- Edit and Delete buttons are displayed only to the owner of the post

---

## Technologies

- PHP 8+
- Laravel 13
- Blade
- Eloquent ORM
- MySQL
- Tailwind CSS
- Alpine.js
- Git & GitHub
- JIRA

---

## Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   └── PostController.php
│   ├── Requests/
│   │   └── StorePostRequest.php
│
├── Models/
│   ├── User.php
│   └── Post.php
│
├── Policies/
│   └── PostPolicy.php

database/
├── migrations/
├── factories/
└── seeders/

resources/
└── views/
    ├── auth/
    │   ├── login.blade.php
    │   └── register.blade.php
    ├── layouts/
    │   └── app.blade.php
    └── feed.blade.php

routes/
└── web.php
```

---

## Installation

### Clone the repository

```bash
git clone <repository-url>
```

### Enter the project

```bash
cd LinkUp
```

### Install dependencies

```bash
composer install
```

### Create the environment file

```bash
cp .env.example .env
```

### Generate the application key

```bash
php artisan key:generate
```

### Configure the database

Update the database credentials inside the `.env` file.

### Run the migrations

```bash
php artisan migrate
```

### (Optional) Seed the database

```bash
php artisan db:seed
```

### Start the server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## Database Schema

### Users

| Column | Type |
|---------|------|
| id | bigint |
| name | string |
| email | string (unique) |
| password | string |
| headline | string |
| company | string (nullable) |
| image_url | string (nullable) |
| created_at | timestamp |
| updated_at | timestamp |

### Posts

| Column | Type |
|---------|------|
| id | bigint |
| user_id | foreign key |
| content | text |
| created_at | timestamp |
| updated_at | timestamp |

---

## Eloquent Relationships

### User

```php
public function posts()
{
    return $this->hasMany(Post::class);
}
```

### Post

```php
public function user()
{
    return $this->belongsTo(User::class);
}
```

---

## Security

### Authentication

- Registration
- Login
- Logout
- Password hashing using Laravel's `Hash` facade

### Route Protection

Protected routes use the `auth` middleware.

Examples:

- `/feed`
- `/posts/create`
- `/posts/{post}/edit`
- `/posts/{post}/delete`

Unauthenticated users are redirected to the login page.

### Form Requests

Post validation is centralized in:

```
StorePostRequest
```

Validation rules:

- `content` is required
- Minimum 10 characters

### Authorization

A `PostPolicy` ensures that only the owner of a post can:

- Edit a post
- Delete a post

Blade uses:

```blade
@can('update', $post)
```

and

```blade
@can('delete', $post)
```

to display action buttons only to authorized users.

---

## Testing

The project has been tested for:

- User registration
- User login/logout
- Route protection
- Post creation
- Form validation
- Authorization
- Unauthorized access (403 Forbidden)

---

## Author

Developed as part of the **LinkUp** Laravel learning project.