# Ayotanding

**Aplikasi Penyewaan Lapangan Olahraga Berbasis Web**

Ayotanding adalah platform yang menghubungkan pemilik lapangan olahraga dengan penyewa. Pemilik dapat mendaftarkan lapangannya, dan pengguna dapat mencari, membooking, serta melakukan pembayaran secara mudah.

## Fitur

- Autentikasi pengguna dengan 3 role (Penyewa, Pemilik, Admin)
- Pendaftaran lapangan oleh pemilik (dilengkapi foto, dokumen, dan sesi waktu)
- Approve / reject lapangan oleh admin
- Pencarian dan detail lapangan
- Booking lapangan dengan pilih tanggal dan sesi waktu
- Keranjang booking
- Checkout dan upload bukti pembayaran
- Tiket pemesanan untuk penyewa
- Dashboard pemilik (lihat pemesan di lapangannya)
- Dashboard admin untuk manajemen lapangan

## Role System

### 🧑 Penyewa (`user`)
- Browse & cari lapangan di halaman Main
- Booking lapangan (pilih tanggal + sesi waktu)
- Kelola keranjang dan checkout
- Upload bukti pembayaran
- Lihat tiket pemesanan
- Lihat riwayat booking di profil

### 👨‍💼 Pemilik Lapangan (`owner`)
- Daftarkan lapangan baru (isi data, upload foto, tentukan sesi & harga)
- Lihat daftar lapangan yang sudah didaftarkan
- Lihat daftar pemesan per lapangan (nama, telepon, tanggal, sesi, total)
- Menunggu approval admin sebelum lapangan tampil

### 🛡️ Admin (`admin`)
- Dashboard admin untuk mengelola seluruh lapangan
- Approve lapangan agar bisa dibooking penyewa
- Reject / hapus lapangan
- Mengawasi seluruh aktivitas platform

### Alur Aplikasi

```
Owner daftarkan lapangan → Admin approve → Penyewa lihat & booking → Bayar → Tiket
```

1. **Landing Page** — Halaman selamat datang
2. **Register** — Pilih role: Penyewa atau Pemilik Lapangan
3. **Login** — Masuk sesuai role masing-masing
4. **Main Page** (Penyewa) — Lihat semua lapangan yang sudah di-approve
5. **Detail & Booking** — Pilih lapangan, tanggal, dan sesi waktu
6. **Keranjang** — Lihat item yang akan dibooking
7. **Checkout** — Isi data diri untuk pembayaran
8. **Pembayaran** — Upload bukti transfer (batas 10 menit)
9. **Tiket** — Lihat semua pemesanan yang sudah dibayar

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
git clone https://github.com/username/ayotanding.git
cd ayotanding
composer install
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan storage:link
php artisan migrate --seed
php artisan serve
```

## Akun Demo

| Role             | Email                 | Password  |
|------------------|-----------------------|-----------|
| Admin            | admin@ayotanding.com  | password  |
| Pemilik Lapangan | owner@ayotanding.com  | password  |
| Penyewa          | user@ayotanding.com   | password  |

## Data Demo

| Lapangan | Lokasi | Jenis | Status |
|---|---|---|---|
| Lapangan Futsal A | Malang | Futsal | ✅ Approved |
| Gor Badminton B | Surabaya | Badminton | ✅ Approved |
| Lapangan Basket C | Bandung | Basket | ✅ Approved |
| Lapangan Futsal D | Jakarta | Futsal | ✅ Approved |
| Gor Badminton E | Yogyakarta | Badminton | ✅ Approved |
| Lapangan Sepak Bola F | Semarang | Sepak Bola | ⏳ Pending |
| Mini Soccer G | Medan | Mini Soccer | ⏳ Pending |

Login sebagai **admin** untuk mencoba approve/pending, atau sebagai **penyewa** untuk booking lapangan yang sudah approved.

## Kontributor

- **M. Nabil Maulana**
- **M. Habil Aswad**

## Lisensi

MIT
