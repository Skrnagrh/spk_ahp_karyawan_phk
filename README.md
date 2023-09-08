# Sistem Pendukung Keputusan (SPK) Pemilihan Karyawan PHK menggunakan Metode Analytical Hierarchy Process (AHP)

Sistem Pendukung Keputusan (SPK) ini adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu dalam pemilihan karyawan yang akan di-PHK (Pemutusan Hubungan Kerja) menggunakan Metode Analytical Hierarchy Process (AHP).

## Tampilan Aplikasi

### Halaman Homepage

![Halaman Homepage](https://github.com/Skrnagrh/spk_ahp_karyawan_phk/raw/main/public/1.tampilan/1.PNG)

### Halaman Login

![Halaman Login](https://github.com/Skrnagrh/spk_ahp_karyawan_phk/raw/main/public/1.tampilan/2.PNG)

### Halaman Dashboard

![Halaman Dashboard](https://github.com/Skrnagrh/spk_ahp_karyawan_phk/raw/main/public/1.tampilan/3.PNG)


## Fitur

- Manajemen Kriteria dan Subkriteria
- Manajemen Data Karyawan
- Penggunaan Metode AHP untuk Pemilihan Karyawan PHK
- Tampilan Dashboard Interaktif
- Dan masih banyak lagi...

## Persyaratan

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL atau Database Lainnya
- [Laragon](https://laragon.org/) (Opsional, untuk pengembangan lokal)

## Panduan Instalasi

1. Clone repositori ini ke komputer Anda:

   ```bash
   git clone https://github.com/Skrnagrh/spk_ahp_karyawan_phk.git
   ```

2. Masuk ke direktori proyek:

   ```bash
   cd spk_ahp_karyawan_phk
   ```

3. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

4. Konfigurasi file `.env` sesuai dengan pengaturan database Anda.

5. Jalankan perintah berikut untuk menginstal dependensi:

   ```bash
   composer install
   ```

6. Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

   ```bash
   php artisan key:generate
   ```

7. Migrasikan dan isi database Anda dengan data awal:

   ```bash
   php artisan migrate --seed
   ```

8. Jalankan server pengembangan:

   ```bash
   php artisan serve
   ```

9. Buka aplikasi di browser Anda dengan mengunjungi `http://localhost:8000`.

