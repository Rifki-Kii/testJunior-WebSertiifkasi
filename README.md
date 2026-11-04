# Order Movie App

Project ini adalah project test sertifikasi Junior Web Developer. Aplikasi berbasis web untuk pemesanan tiket film yang dibangun menggunakan Laravel dan Livewire.

## Fitur Utama

- **Autentikasi Pengguna**: Registrasi, Login, dan Logout interaktif dengan Livewire.
- **Daftar Film (Movie List)**: Menampilkan katalog film yang tersedia beserta harga tiket.
- **Pemesanan Tiket (Order)**: Fitur pemesanan tiket film.
- **Riwayat Pemesanan (Order History)**: Melihat riwayat transaksi tiket yang telah dipesan.

## Tech Stack

- **Backend**: Laravel
- **Frontend**: Livewire, Blade, Vite
- **Database**: MySQL / SQLite

## Cara Menjalankan Project

1. **Clone repositori**:
   ```bash
   git clone https://github.com/Rifki-Kii/testJunior-WebSertiifkasi.git
   cd testJunior-WebSertiifkasi
   ```

2. **Install Dependensi**:
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**:
   Salin file konfigurasi `.env` dan buat application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Sesuaikan pengaturan database di file `.env` jika diperlukan.*

4. **Migrasi Database & Seeder**:
   ```bash
   php artisan migrate --seed
   ```

5. **Menjalankan Aplikasi**:
   ```bash
   npm run dev
   php artisan serve
   ```
   Buka browser di `http://127.0.0.1:8000`.
