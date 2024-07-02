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

- PHP >= 8.1
- Composer
- Laravel >= 10.x
- MySQL atau Database Lainnya

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

6. **Install Valet Windows:**

   Instal [Valet Windows](https://packagist.org/packages/cretueusebiu/valet-windows) menggunakan Composer:

   ```bash
   composer global require cretueusebiu/valet-windows
   ```

   Pastikan untuk menambahkan direktori Composer global ke dalam PATH lingkungan.

7. **Konfigurasi Valet:**

   Jalankan perintah berikut untuk mengkonfigurasi Valet:

   ```bash
   valet install
   ```

8. **Configurasi DNS menggunakan Acrylic:**

   Ikuti [panduan konfigurasi Acrylic](https://mayakron.altervista.org/support/acrylic/Windows10Configuration.htm) untuk mengatur DNS yang diperlukan oleh Valet Windows.

9. **Jalankan Valet dan Link ke Proyek:**

    Navigasikan ke direktori proyek dan jalankan perintah:

    ```bash
    valet link
    ```

10. **Migrasikan dan Isi Database:**

    ```bash
    php artisan migrate --seed
    ```

11. **Buka Aplikasi di Browser Anda:**

    Buka aplikasi di browser Anda dengan mengunjungi `http://spk_ahp_karyawan_phk.test` atau sesuai dengan domain yang Anda atur dengan Valet.

