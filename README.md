# Sistem Informasi Manajemen Pelanggan Citra Elektronik Service

Sistem Informasi Manajemen Pelanggan Citra Elektronik Service adalah aplikasi web yang dirancang untuk membantu pengelolaan dan optimalisasi bisnis reparasi elektronik milik Anda. Sistem ini menawarkan berbagai fitur yang dapat membantu Anda dalam. Sistem ini dibuat dengan menggunakan bahasa pemrograman PHP 8.3 dilengkapi dengan framework Laravel 10.x dan teknologi lainnya seperti Jetstream 4.x, Tailwind 3.x, Livewire 3.x.



## Features

- Multi Auth dengan menggunakan Roles/Permissions Spatie
- Kelola Data User
- Kelola Data Booking Service
- Kelola Data Perbaikan
- Kelola Data Transaksi
- Kelola Data Detail Perbaikan
- Kelola Data Review
- Cetak Laporan melalui PDF/XLSX/CSV



## Tech Stack

**Client:** Livewire, Jetstream, TailwindCSS

**Server:** Laravel, Spatie


## Instalasi Project

Melakukan cloning project di terminal
```bash
git clone https://github.com/WM-WiseMinds/Web-Citra.git
```
Buka directory file
```bash
cd Web-Citra
```
Melakukan instalasi composer
```bash
composer install
```
Melakukan instalasi dan build npm
```bash
npm install
npm run build
```
Membuat database dan setelahnya melakukan migration
```bash
php artisan migration
```
Untuk melakukan pengujian atau testing dengan dummy data silahkan seeding data melalui `DatabaseSeeder.php`
```bash
php artisan db:seed
```
Silahkan coba melakukan login dengan menginputkan **Email** dan **Password** berikut
```bash
admin@example.com
Password
```
