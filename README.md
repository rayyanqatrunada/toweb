# TBSM WEB - Sistem Informasi Akademik dan Bursa Kerja Khusus (BKK)

Sistem Informasi Terpadu berbasis web yang dikembangkan khusus untuk sekolah menengah kejuruan (fokus pada jurusan Teknik dan Bisnis Sepeda Motor / TBSM). Aplikasi ini mengintegrasikan profil sekolah digital dengan manajemen Bursa Kerja Khusus (BKK) untuk memfasilitasi hubungan antara dunia pendidikan dan industri.

## Daftar Isi
1. [Fitur Utama](#fitur-utama)
2. [Teknologi yang Digunakan](#teknologi-yang-digunakan)
3. [Prasyarat Instalasi](#prasyarat-instalasi)
4. [Cara Instalasi](#cara-instalasi)
5. [Cara Penggunaan](#cara-penggunaan)
6. [Struktur Proyek](#struktur-proyek)

---

## Fitur Utama

Aplikasi ini dibagi menjadi beberapa modul utama yang beroperasi secara terintegrasi:

### 1. Sistem Manajemen Konten (CMS)
* Publikasi artikel dan berita sekolah dengan dukungan kategori dan label.
* Manajemen pengumuman dengan lampiran dokumen.
* Sistem draf dan penjadwalan terbit otomatis.

### 2. Modul Akademik & Profil
* **Direktori Guru:** Data lengkap staf pengajar beserta bidang keahlian.
* **Manajemen Program & Fasilitas:** Inventarisasi fasilitas penunjang pendidikan.
* **Papan Prestasi:** Katalog prestasi akademik dan non-akademik siswa.

### 3. Modul BKK & Hubungan Industri (Hubin)
* **Kemitraan (MoU):** Pendataan mitra perusahaan dan masa berlaku kerjasama.
* **Lowongan Pekerjaan:** Portal bursa kerja khusus untuk alumni, lengkap dengan sistem penyaringan dan tenggat waktu.
* **Sistem Magang (Prakerin):** Pencatatan dan pelacakan tempat magang siswa di mitra industri.
* **Tracer Study:** Direktori pencarian jejak alumni beserta riwayat karir mereka.

### 4. Pusat Media dan Dokumen
* Galeri foto dan video sekolah yang terstruktur dalam format album.
* Pusat unduhan file/dokumen publik (modul, brosur, formulir) dilengkapi dengan analitik jumlah unduhan.

---

## Teknologi yang Digunakan

* **Backend Framework:** Laravel 11.x
* **Frontend Framework:** Laravel Blade dengan Tailwind CSS v4 dan Vite
* **Admin Panel:** Filament PHP v3
* **Database:** MariaDB / MySQL
* **Keamanan & Audit:** Spatie Permission (Otorisasi) & Spatie ActivityLog (Rekam Jejak Admin)

---

## Prasyarat Instalasi

Sebelum memulai instalasi, pastikan lingkungan server Anda memenuhi spesifikasi berikut:
* PHP versi 8.2 atau lebih tinggi.
* Composer v2.
* Node.js (untuk kompilasi aset frontend Tailwind CSS v4).
* Database MySQL atau MariaDB.

---

## Cara Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di lingkungan pengembangan lokal Anda:

1. **Unduh Proyek**
   Kloning repositori proyek atau unduh source code ke dalam direktori lokal komputer Anda.

2. **Instalasi Dependensi PHP (Composer)**
   Buka terminal di direktori proyek, kemudian jalankan:
   ```bash
   composer install
   ```

3. **Instalasi Dependensi Frontend (NPM)**
   Jalankan perintah berikut untuk menginstal Tailwind CSS dan dependensi Vite:
   ```bash
   npm install
   ```

4. **Konfigurasi Environment**
   Salin file konfigurasi contoh untuk membuat environment lokal Anda:
   ```bash
   cp .env.example .env
   ```
   Buka file `.env` dan sesuaikan pengaturan database Anda (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database**
   Jalankan migrasi untuk membuat tabel di dalam database Anda:
   ```bash
   php artisan migrate
   ```

7. **Storage Link**
   Kaitkan folder storage agar file gambar dan unggahan dapat diakses secara publik:
   ```bash
   php artisan storage:link
   ```

---

## Cara Penggunaan

Untuk menjalankan sistem ini secara lokal, Anda harus menjalankan server backend dan proses build frontend secara bersamaan.

1. **Menjalankan Server Web (Laravel)**
   Buka terminal dan jalankan:
   ```bash
   php artisan serve
   ```
   Aplikasi publik akan tersedia di `http://localhost:8000`.

2. **Menjalankan Build Assets (Vite)**
   Buka tab terminal baru (biarkan terminal sebelumnya tetap berjalan) dan eksekusi:
   ```bash
   npm run dev
   ```
   Proses ini akan mengkompilasi Tailwind CSS dan memantau setiap perubahan desain secara real-time.

3. **Mengakses Panel Admin**
   Buka peramban (browser) dan navigasikan ke `http://localhost:8000/admin`. 
   Silakan login menggunakan akun admin yang telah Anda buat atau di-seed dari database.

---

## Struktur Proyek

Bagian penting dari struktur direktori yang perlu diketahui oleh pengembang:
* `/app/Models/`: Berisi semua definisi entitas data dan relasinya.
* `/app/Filament/Resources/`: Mengatur semua tampilan CRUD di dasboard admin.
* `/resources/views/frontend/`: Berisi seluruh tampilan halaman web publik berbasis Laravel Blade.
* `/routes/web.php`: Tempat semua rute publik dideklarasikan.
* `/database/migrations/`: Skema database yang menyusun inti aplikasi.

