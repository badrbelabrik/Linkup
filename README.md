# LinkUp

## Description

LinkUp is a Laravel web application that reproduces the core features of a professional social network. This project was developed as part of a learning brief to practice Laravel, the MVC architecture, and Eloquent ORM.

## Features

- Display the news feed (`/feed`)
- Show posts from newest to oldest
- Display the author's information:
  - Name
  - Headline
  - Profile picture (or placeholder)
- Eloquent relationships between `User` and `Post`

## Technologies

- PHP
- Laravel
- Blade
- Eloquent ORM
- MySQL
- HTML/CSS
- Git & GitHub
- JIRA

---

## Project Structure

```text
app/
├── Http/
│   └── Controllers/
│       └── PostController.php
├── Models/
│   ├── User.php
│   └── Post.php

database/
└── migrations/

resources/
└── views/
    ├── feed.blade.php
    └── layouts/
        └── app.blade.php

routes/
└── web.php
```

---

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
```

### 2. Go to the project directory

```bash
cd LinkUp
```

### 3. Install dependencies

```bash
composer install
```

### 4. Create the environment file

```bash
cp .env.example .env
```

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Configure your database

Edit the `.env` file and update your database credentials.

### 7. Run the migrations

```bash
php artisan migrate
```

### 8. Start the development server

```bash
php artisan serve
```

Open your browser and visit:

```
http://127.0.0.1:8000/feed
```

---

## Database Schema

### Users

| Column | Type |
|--------|------|
| id | bigint |
| name | string |
| email | string |
| password | string |
| headline | string |
| company | string (nullable) |
| image_url | string |

### Posts

| Column | Type |
|--------|------|
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

## Application Workflow

1. The user accesses `/feed`.
2. The route calls `PostController@index`.
3. The controller retrieves all posts using Eloquent.
4. Posts are sorted from newest to oldest.
5. The controller passes the data to the Blade view.
6. The view displays each post along with its author's information.

---

## Author

This project was developed as part of the **LinkUp** Laravel learning brief.