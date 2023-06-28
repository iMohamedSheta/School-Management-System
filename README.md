<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# School Management System

This is a school management system built using the TALL stack (Tailwind CSS, Alpine.js, Laravel, and Livewire).

## Requirements

Before proceeding with the installation, ensure that your system meets the following requirements:

- PHP version +8.1: Ensure you have PHP version 8.1 or higher installed.
- PHP Extension "intl": Install the "intl" extension for PHP.
- PHP Extension "gd": Install the "gd" extension for PHP.
- MySQL version +5.5: Make sure you have MySQL version 5.5 or higher installed.
- Composer latest version: Install the latest version of Composer.
- NPM latest version: Install the latest version of Node.js, which includes NPM.

## Installation

### Step 1: Configure PHP

After downloading PHP, navigate to the PHP installation folder and open the `php.ini` file using a text editor.

Uncomment the following lines by removing the semicolon at the beginning of each line (if present), or add them if they don't exist:

```ini
extension=intl
extension=gd
```
If you are using a web server such as Apache or Nginx, you can use the following command to find the path to the php.ini file used by PHP on the server:

```php -i | grep "Loaded Configuration File"```

After cloning or downloading the project from GitHub, you will find a file named .env-example in the main project folder. This file contains the basic configuration settings that can vary for each project, such as database connection and email server connection.

Make a copy of the .env-example file and rename it to .env.

Open the .env file and update the database settings based on your database. If you are using the default settings, leave them as they are and only change the DB_DATABASE to the one you will create.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

After configuring the environment variables, open a command line interface and navigate to the project folder.

```cd "path/to/School-Management-System"```

Run the following commands:
```
composer update
npm update
php artisan migrate
npm run dev
php artisan db:seed
php artisan key:generate
php artisan storage:link
php artisan serve
```
Access the application by visiting http://localhost:8000 or http://127.0.0.1:8000 in your web browser. If port 8000 is busy, you can specify a different port using the php artisan serve --port command.

## Zoom Integration
School Management System allows integration with Zoom for creating and deleting meetings. To enable this integration, follow these steps:

Obtain your Zoom API Keys by creating an account on the Zoom Developer Portal.
Once you have your API Keys, open the .env file in the project's root folder.

Add your Zoom API Keys to the file:

```
ZOOM_CLIENT_KEY=your_zoom_client_key
ZOOM_CLIENT_SECRET=your_zoom_client_secret
```


## Login Credentials

Use the following credentials to log in to the system:

- Admin: admin@admin.com / 123456789@#
- Teacher: teacher@test.com / 123456789@#
- Student: student@test.com / 123456789@#
- Parent: parent@test.com / 123456789@#
  
## Support

If you encounter any issues or have any questions, please feel free to contact Mohamed Sheta at mohamed15.sheta15@gmail.com or open an issue in the repository.

## License

This project School-Management-System is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgements

School Management System was created by Mohamed Sheta.



