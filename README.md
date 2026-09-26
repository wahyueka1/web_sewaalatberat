# Website Sewa Alat Berat (Draft Laravel)

Ini adalah draft kode untuk website perusahaan sewa alat berat, dengan:
- Halaman publik (tanpa login): landing page, daftar alat, detail alat, portofolio, tentang kami
- Tombol WhatsApp untuk booking (satu-satunya jalur transaksi)
- Panel admin (login) untuk CRUD alat berat, portofolio, dan profil usaha
- Setup dasar SEO: meta title/description per halaman, canonical URL, Open Graph,
  schema.org LocalBusiness, sitemap.xml dinamis, robots.txt

File ini BUKAN project Laravel yang lengkap (tidak ada folder vendor/composer
karena dibuat di sandbox tanpa akses internet ke Packagist). Ikuti langkah di
bawah untuk menggabungkannya ke instalasi Laravel baru di komputer Anda.

## 1. Buat project Laravel baru

```bash
composer create-project laravel/laravel nama-project
cd nama-project
```

## 2. Salin file dari draft ini

Salin (timpa) folder-folder berikut dari draft ini ke project Laravel baru:
- routes/web.php
- app/Models/*
- app/Http/Controllers/*  (termasuk subfolder Admin dan Auth)
- database/migrations/*
- database/seeders/DatabaseSeeder.php
- resources/views/*
- public/robots.txt

## 3. Setup environment

Edit file `.env`, isi koneksi database (MySQL/PostgreSQL/SQLite).

```bash
php artisan key:generate
php artisan storage:link
```

## 4. Migrasi & isi data awal

```bash
php artisan migrate --seed
```

Seeder akan membuat:
- Akun admin: **admin@usaha-anda.com** / **password123** (WAJIB diganti setelah login pertama)
- Contoh data profil usaha, 1 alat berat, dan 1 portofolio

## 5. Jalankan

```bash
php artisan serve
```

- Situs publik: `http://localhost:8000`
- Login admin: `http://localhost:8000/admin/login`

## 6. Ganti data awal Anda sendiri

Login ke `/admin/login`, lalu:
1. Buka menu **Profil Usaha** → isi nama usaha, alamat, nomor WA asli, sosial media.
2. Tambahkan alat berat & portofolio lewat menu masing-masing.

## Catatan penting soal SEO

Kode ini sudah menyiapkan fondasi teknis SEO on-page:
- Meta title & description unik tiap halaman (ambil dari deskripsi alat/portofolio)
- URL bersih & konsisten (slug), canonical tag
- Sitemap.xml otomatis mengikuti data alat & portofolio terbaru (submit ke Google Search Console)
- robots.txt (ingat ganti URL sitemap di dalamnya sesuai domain Anda)
- Schema.org LocalBusiness agar Google lebih memahami konteks bisnis

Tapi SEO "muncul paling atas di Google" juga sangat dipengaruhi hal di luar kode:
- Daftarkan bisnis di **Google Business Profile** (sangat berpengaruh untuk pencarian lokal, mis. "sewa excavator Bali")
- Kecepatan hosting & gambar yang dioptimasi (kompres foto alat/portofolio)
- Konten deskripsi yang detail & unik per alat (hindari copy-paste dari kompetitor)
- Backlink dari direktori bisnis/konstruksi lokal
- Update rutin (portofolio baru, alat baru) agar Google menganggap situs aktif

Untuk produksi, sebaiknya ganti Tailwind CDN (dipakai di draft ini agar simpel)
dengan build Tailwind lewat Vite (`npm install && npm run build`) supaya lebih cepat.
