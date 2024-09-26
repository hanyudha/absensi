
# ABSENSI APP (Project PKL SMK INFORMATIKA - DESTA)

<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>

<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>

Aplikasi absensi yang dibangun dengan menggunakan Laravel dengan database MySql

Fitur:
- Check In (masuk)
- Check Out (Pulang)
- Cuti
- Manajemen User


## Tech Stack

**Framework:** Laravel, Bootstrap

**Database:** MySql


## Demo

Role Admin
User: admin@gmail.com
Password: 12345678

Role Staff
User: alena12@gmail.com
Password: 12345678
## Installation for Dev (local)

- Clone git ke local
- copy file .env.example dan rename menjadi .env
- import absensi.sql ke dalam database local
- Run Command Prompt di folder root absensi
- run command `php artisan migrate --seeders`
- run command `composer install`
- run command `php artisan key:generate`
- run command `php artisan serve`
## Authors

- [@destasiti](https://github.com/destasiti)
- [@hanyudha](https://github.com/hanyudha)

