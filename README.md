# A50 Life Art

> *Life is Art. Art is Life.*

A PHP and MySQL art gallery web application crafted with an Afro-Modern editorial aesthetic. It showcases original paintings, tells the artist's story, enables direct WhatsApp artwork inquiries, and includes a session-protected admin dashboard for managing the gallery catalog.

## Features

- **Editorial Landing Page (`index.php`)** — Showcases featured artworks, curated collections (Murals, Portraits, Street Art, Typography), and the artist's story.
- **Full Artwork Gallery (`gallery.php`)** — Displays the full catalog of paintings stored in MySQL.
- **Artwork Detail View (`details.php`)** — Dedicated view per painting with price formatting, previous/next artwork navigation, and a pre-filled WhatsApp inquiry button.
- **Admin Dashboard (`admin.php`)** — Paginated artwork management panel protected by PHP session authentication (`login.php` / `logout.php`).
- **CRUD & Image Uploads (`add.php`, `edit.php`, `delete.php`, `delete_action.php`)** — Add new paintings with live image preview, edit details, and delete artworks along with their uploaded image files.

## Tech Stack

- **Backend:** PHP 8.2+, MySQL (`mysqli`)
- **Frontend:** HTML5, CSS3 (custom Afro-Modern earth-tone palette), Vanilla JavaScript, Bootstrap 5.3
- **Icons & Typography:** Font Awesome 6, Google Fonts (`Playfair Display`, `Inter`, `Space Grotesk`)
- **Hosting:** Apache / cPanel (`.htaccess` configured for PHP 8.2) or local XAMPP/WAMP

## Project Structure

```text
public_html/
├── index.php             # Main landing page & featured gallery
├── gallery.php           # Full paintings catalog
├── details.php           # Individual artwork details & WhatsApp inquiry
├── admin.php             # Paginated admin dashboard (auth required)
├── login.php             # Admin login page
├── logout.php            # Admin logout handler
├── add.php               # Add new painting & upload image
├── edit.php              # Edit existing painting
├── delete.php            # Delete painting confirmation UI
├── delete_action.php     # Delete painting & image handler
├── config.example.php    # Sample database configuration template
├── uploads/              # Static site assets & uploaded artwork images
└── .htaccess             # Apache PHP 8.2 handler configuration
```

## Getting Started

### 1. Prerequisites

- PHP 8.0+ with the `mysqli` extension enabled
- MySQL / MariaDB server
- Apache (e.g., XAMPP, Laragon, or cPanel) or the built-in PHP server

### 2. Database Setup

Create a MySQL database (e.g., `art_gallery`) and create the `paintings` table:

```sql
CREATE DATABASE IF NOT EXISTS art_gallery
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE art_gallery;

CREATE TABLE IF NOT EXISTS paintings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  image_url VARCHAR(500) NOT NULL,
  price DECIMAL(10, 2) NOT NULL DEFAULT 0.00
);
```

### 3. Configuration

Copy `config.example.php` to `config.php` and update it with your database credentials:

```bash
cp config.example.php config.php
```

```php
<?php
$host = "localhost";
$user = "your_db_user";
$pass = "your_db_password";
$dbname = "art_gallery";
```

> **Note:** `config.php` is listed in `.gitignore` so live database credentials are never committed to version control.

### 4. Admin Credentials

Before deploying to production, update `$ADMIN_USERNAME` and `$HASHED_PASSWORD` in `login.php`. You can generate a new password hash using PHP:

```bash
php -r 'echo password_hash("your-strong-password", PASSWORD_DEFAULT) . PHP_EOL;'
```

### 5. Run Locally

Place the project folder inside your web root (e.g., `htdocs/a50-life-art` in XAMPP) or start PHP's built-in development server:

```bash
php -S localhost:8000
```

Then visit `http://localhost:8000` in your browser, and `http://localhost:8000/login.php` for the admin dashboard.
