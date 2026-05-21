# AGENTS.md

Panduan untuk agent yang bekerja di repository ini.

## Project Overview

Ini adalah aplikasi web Petshop berbasis Laravel 12 dengan frontend Blade, Tailwind CSS 4, Alpine.js, AOS, dan Vite. Aplikasi memiliki halaman publik untuk home, services, products, articles, gallery, contact, appointments, dan newsletter, serta area admin untuk CRUD konten.

Database utama menggunakan MySQL/MariaDB. Dump database tersedia di root repository sebagai `petshop.sql`.

## Tech Stack

- PHP 8.2+
- Laravel 12
- Composer
- MySQL/MariaDB
- Node.js dan pnpm
- Vite 7 dengan `laravel-vite-plugin`
- Tailwind CSS 4 via `@tailwindcss/vite`
- Alpine.js
- AOS
- Pest/PHPUnit
- Laravel Pint

## Key Paths

- `app/Http/Controllers` - controller publik dan admin.
- `app/Http/Controllers/Admin` - controller dashboard/admin CRUD.
- `app/Models` - Eloquent model untuk data aplikasi.
- `routes/web.php` - route publik dan admin.
- `resources/views/layouts` - layout Blade utama.
- `resources/views/pages` - halaman frontend.
- `resources/views/admin` - halaman admin.
- `resources/views/partials` - komponen Blade kecil seperti navbar/footer/meta.
- `resources/css/app.css` - Tailwind entry dan custom layer.
- `resources/js/app.js` - Alpine.js dan AOS initialization.
- `database` - migration, factory, seeder.
- `tests` - Pest/PHPUnit tests.

## Setup Notes

Gunakan perintah standar berikut setelah clone atau saat dependency belum ada:

```bash
composer install
pnpm install
copy .env.example .env
php artisan key:generate
```

Untuk database lokal, buat database `petshop`, sesuaikan `.env`, lalu import `petshop.sql`. Jika memakai dump SQL, migration tidak selalu perlu dijalankan kecuali perubahan schema memang sedang dikerjakan.

```powershell
mysql -u root -p -e "CREATE DATABASE petshop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p petshop < petshop.sql
```

Untuk asset dan server lokal:

```bash
pnpm run dev
php artisan serve
```

`composer run dev` juga tersedia dan menjalankan Laravel server, queue listener, dan Vite lewat `concurrently`.

## Development Guidelines

- Ikuti pola Laravel yang sudah ada: route di `routes/web.php`, logic request di controller, data melalui Eloquent model, tampilan melalui Blade.
- Pisahkan area publik dan admin. Controller admin berada di namespace/folder `App\Http\Controllers\Admin`.
- Gunakan route names yang sudah ada, misalnya `admin.*`, `products.*`, `articles.*`, dan jangan hardcode URL jika route helper bisa dipakai.
- Untuk perubahan Blade, pertahankan struktur layout di `resources/views/layouts/app.blade.php` dan `resources/views/layouts/admin.blade.php`.
- Untuk styling, prioritaskan utility Tailwind di Blade. Tambahkan class reusable ke `resources/css/app.css` hanya jika dipakai lintas view.
- Untuk interaksi ringan frontend, gunakan Alpine.js. Jangan tambahkan framework frontend besar tanpa kebutuhan jelas.
- Untuk animasi scroll, gunakan pola AOS yang sudah diinisialisasi di `resources/js/app.js`.
- Jangan commit `.env`, file generated di `storage`, `vendor`, atau `node_modules`.
- Hindari mengubah `petshop.sql` kecuali task memang berkaitan dengan dump database.

## Database and Eloquent

- Periksa model di `app/Models` sebelum menambah field atau relasi.
- Jika mengubah schema, tambahkan migration yang jelas dan update seeder/factory/test bila relevan.
- Jika fitur harus cocok dengan database dump lama, pastikan migration dan dump tidak saling bertentangan.
- Validasi input di controller atau Form Request jika fitur bertambah kompleks.
- Untuk upload file, gunakan Laravel storage API dan pastikan `php artisan storage:link` sudah dipertimbangkan.

## Testing and Verification

Jalankan verifikasi yang sesuai dengan perubahan:

```bash
php artisan test
```

Untuk style PHP:

```bash
./vendor/bin/pint
```

Untuk build frontend:

```bash
pnpm run build
```

Jika perubahan menyentuh route atau view utama, minimal cek halaman terkait di browser atau dengan request lokal setelah `php artisan serve` dan `pnpm run dev` berjalan.

## Known Environment Details

- `phpunit.xml` menggunakan SQLite in-memory untuk testing.
- Queue default di mode dev dapat dijalankan lewat `composer run dev`.
- Vite input utama adalah `resources/css/app.css` dan `resources/js/app.js`.
- Vite watch mengabaikan `storage/framework/views`.

## Agent Workflow

1. Baca file terkait sebelum mengedit.
2. Cek pola existing di controller, model, dan Blade yang sejenis.
3. Buat perubahan sekecil mungkin sesuai task.
4. Jalankan test/build yang relevan.
5. Laporkan file yang diubah dan verifikasi yang berhasil atau gagal.

Jika ada perubahan user yang sudah ada di working tree, jangan revert kecuali diminta eksplisit.
