<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cafe POS System

A modern point-of-sale system built with Laravel for cafe and restaurant management.

## Documentation

- 📄 [Installation Guide](#setup-instructions)
- 📄 [User Manual](Buku%20Petunjuk%20Penggunaan%20Aplikasi%20Jerseyku.pdf)
- 📄 [Laporan](Laporan%20Tugas%20Besar%20Pemrograman%20Basis%20Data.pdf)
- 🎥 [Demo Video](demo.mp4)
- 💾 [Database File](jerseyku.sql)

## Requirements

- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL 5.7+
- Git

## Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/andandadestaf/jerseyku.git
   cd jerseyku
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   php artisan storage:link
   ```

4. **Configure Database**
   - Create a new MySQL database
   - Update .env file with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=jerseyku
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```
   - Import the database from
     ```bash
     jerseyku.sql
     ```

5. **Install Frontend Dependencies**
   ```bash
   npm install && npm run build
   ```

6. **Start the Development Server**
   ```bash
   composer run dev
   ```

## Troubleshooting

### Permission Issues
If you encounter storage or cache-related errors:
```bash
chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

## Default Login Credentials

- **Admin**
  - Email: admin@jersey.id
  - Password: adminjersey

- **Customer**
  - Email: rex@rex.id
  - Password: 12345678

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
