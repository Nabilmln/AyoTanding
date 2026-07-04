# Ayotanding

**Aplikasi Penyewaan Lapangan Olahraga Berbasis Web**

Ayotanding adalah platform yang menghubungkan pemilik lapangan olahraga dengan penyewa. Pemilik dapat mendaftarkan lapangannya, dan pengguna dapat mencari, membooking, serta melakukan pembayaran secara mudah.

## Fitur

- Autentikasi pengguna (registrasi, login, logout)
- Role pengguna: **User** dan **Admin**
- Pendaftaran lapangan oleh pemilik (dilengkapi foto, dokumen, dan sesi waktu)
- Approve / reject lapangan oleh admin
- Pencarian dan detail lapangan
- Booking lapangan dengan pilih tanggal dan sesi waktu
- Keranjang booking
- Checkout dan upload bukti pembayaran
- Tiket pemesanan untuk pengguna
- Dashboard pemilik (lihat pemesan di lapangannya)
- Dashboard admin untuk manajemen lapangan

## Tech Stack

- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend:** Blade Templates, Bootstrap 5, Vanilla JavaScript
- **Database:** SQLite
- **Build Tool:** Vite

## Persyaratan

- PHP 8.2 atau lebih baru
- Composer
- Ekstensi PHP: `curl`, `fileinfo`, `gd`, `mbstring`, `openssl`, `pdo_sqlite`, `sqlite3`

## Instalasi

```bash
# 1. Clone repositori
git clone https://github.com/username/ayotanding.git
cd ayotanding

# 2. Install dependencies
composer install

# 3. Copy environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Buat database SQLite
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"

# 6. Jalankan migrasi dan seeder
php artisan migrate --seed

# 7. Jalankan server
php artisan serve
```

## Akun Demo

| Role  | Email                 | Password  |
|-------|-----------------------|-----------|
| Admin | admin@ayotanding.com  | password  |
| User  | user@ayotanding.com   | password  |

## Alur Aplikasi

1. **Landing Page** — Halaman selamat datang dengan tombol Login & Register
2. **Register / Login** — Buat akun atau masuk
3. **Main Page** — Lihat semua lapangan yang sudah di-approve
4. **Detail & Booking** — Pilih lapangan, tanggal, dan sesi waktu
5. **Keranjang** — Lihat item yang akan dibooking
6. **Checkout** — Isi data diri untuk pembayaran
7. **Pembayaran** — Upload bukti transfer (batas 10 menit)
8. **Tiket** — Lihat semua pemesanan yang sudah dibayar

## Kontributor

- **M. Nabil Maulana**
- **M. Habil Aswad**

## Lisensi

MIT
