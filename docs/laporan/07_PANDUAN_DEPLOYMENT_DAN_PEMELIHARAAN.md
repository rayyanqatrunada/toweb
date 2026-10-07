# LAPORAN 07: PANDUAN DEPLOYMENT DAN PEMELIHARAAN SISTEM
## Prosedur Peluncuran Produksi, Utilitas Web `update-repo.php`, dan Mitigasi Kendala

---

## 1. Ikhtisar Alur Deployment

Aplikasi **TBSM WEB** dirancang agar dapat diperbarui secara cepat dan andal, baik pada lingkungan **Cloud VPS (Ubuntu/Debian)** maupun **Shared Hosting cPanel** tanpa perlu selalu bergantung pada akses terminal SSH.

```
┌─────────────────────────────────┐
│     PENGEMBANG / REPOSITORY     │
│   (git push origin main)        │
└────────────────┬────────────────┘
                 │
                 ▼
┌─────────────────────────────────┐
│       SERVER HOSTING TBSM       │
│  Buka Browser:                  │
│  domain.sch.id/update-repo.php  │
└────────────────┬────────────────┘
                 │
                 ▼
┌─────────────────────────────────┐
│    OTENTIKASI DEPLOY_KEY        │
│  (Anti-Brute Force Terproteksi) │
└────────────────┬────────────────┘
                 │
     ┌───────────┴───────────┐
     │                       │
     ▼                       ▼
┌──────────────┐     ┌──────────────┐
│  PULL REPO   │     │ PERBAIKI     │
│  (Git Pull)  │     │ STORAGE &    │
└──────┬───────┘     │ ASSETS SYNC  │
       │             └──────┬───────┘
       ▼                    ▼
┌──────────────┐     ┌──────────────┐
│ MIGRATE DB   │     │ REGENERATE   │
│ & OPTIMIZE   │     │ .HTACCESS    │
└──────────────┘     └──────────────┘
```

---

## 2. Penggunaan Utilitas Berbasis Web `public/update-repo.php`

Berkas [public/update-repo.php](../../public/update-repo.php) adalah perkakas administrasi server mandiri yang menyediakan antarmuka visual (GUI) modern untuk mengeksekusi operasi pemeliharaan rutin.

### A. Otentikasi dan Kata Sandi Akses
1. Buka alamat utilitas di browser:
   `https://domain-sekolah.sch.id/update-repo.php`
2. Masukkan kata sandi otentikasi. Kata sandi ini diambil langsung dari nilai konfigurasi lingkungan:
   ```env
   DEPLOY_KEY=sandi-rahasia-anda
   ```
   *(Secara bawaan di sistem lokal: `123123`)*.
3. **Catatan Keamanan:** Sistem memiliki proteksi anti-brute force berbasis file lock di server. Jika salah memasukkan sandi 5 kali berturut-turut, alamat IP Anda akan dikunci selama 15 menit.

---

### B. Fungsi-Fungsi Tombol Operasional

| Tombol Operasional | Perintah Internal yang Dijalankan | Fungsi & Kapan Digunakan |
|---|---|---|
| **Git Pull (Update Kode)** | `git pull origin main` | Mengunduh berkas kode dan pembaruan terbaru yang telah di-push ke GitHub. Dijalankan pertama kali setiap ada rilis baru. |
| **Migrate Database** | `php artisan migrate --force` | Mengeksekusi penambahan tabel atau kolom baru ke database produksi tanpa menghapus data yang sudah ada. |
| **Clear Cache** | `php artisan optimize:clear` | Menghapus seluruh cache konfigurasi, rute, template Blade, dan sesi lama. Wajib dijalankan setelah update kode agar perubahan tampilan langsung muncul. |
| **Optimize / Cache** | `php artisan optimize` | Mengkompilasi konfigurasi dan rute ke dalam format cache cepat untuk performa maksimal di lingkungan produksi. |
| **Perbaiki Folder & Izin Upload** | `mkdir`, `chmod 0775`, `storage:link`, `gallery:sync-assets`, regenerasi `.htaccess` | **Tombol Paling Penting untuk Hosting.** Membuat struktur folder upload yang hilang, menghubungkan symlink storage, membuat gambar fallback otomatis, dan memasang proteksi keamanan anti-script PHP. |
| **Sinkronisasi Aset Foto** | `php artisan gallery:sync-assets` | Memindai seluruh data foto di database dan membuatkan file gambar nyata (~6KB–12KB) di disk fisik server jika file belum tersedia. |

---

## 3. Perintah Artisan Mandiri Penting

Bagi pengelola server yang memiliki akses terminal SSH, perintah-perintah berikut dapat dijalankan secara langsung:

### 1. Sinkronisasi Aset Foto Otomatis
```bash
php artisan gallery:sync-assets
```
*Perintah ini memeriksa seluruh foto pada tabel `gallery_albums`, `gallery_items`, `achievements`, `facilities`, `teachers`, dan `posts`. Jika file belum ada di disk `public/storage/`, sistem otomatis membuat gambar JPEG berukuran ~6KB–12KB agar halaman web tidak mengalami eror 404.*

### 2. Penghubung Direktori Publik (Storage Symlink)
```bash
php artisan storage:link
```
*Menghubungkan direktori fisik `storage/app/public` ke folder publik `public/storage`.*

### 3. Pembersihan Cache Menyeluruh
```bash
php artisan optimize:clear
```
*Membersihkan cache konfigurasi, rute, event, dan view Blade yang usang.*

### 4. Eksekusi Pengujian Otomatis (*Automated Testing*)
```bash
php artisan test
```
*Menjalankan 87 test case untuk memverifikasi keutuhan logika sistem sebelum dipublikasikan.*

---

## 4. Prosedur Pencadangan Rutin (*Backup Procedure*)

Untuk menjamin ketersediaan data (*data durability*), lakukan pencadangan dua komponen secara berkala:

1. **Pencadangan Basis Data (Database Dump):**
   ```bash
   mysqldump -u nama_user -p nama_database > backup_tbsm_$(date +%F).sql
   ```
   *(Atau unduh berkas `.sql` melalui menu phpMyAdmin pada cPanel).*
2. **Pencadangan Berkas Media Upload:**
   Kompres folder penyimpanan foto ke dalam arsip zip:
   ```bash
   zip -r backup_storage_$(date +%F).zip storage/app/public/
   ```
   *(Simpan berkas cadangan ini di media penyimpanan terpisah di luar server web).*

---

## 5. Panduan Mitigasi Kendala (*Troubleshooting*)

### 1. Foto-Foto Tidak Muncul Setelah Diunggah di Hosting
- **Penyebab:** Tautan symlink `public/storage` belum terbentuk, atau direktori tujuan belum dibuat oleh cPanel.
- **Solusi:**
  1. Buka browser: `domain-sekolah.sch.id/update-repo.php`.
  2. Klik tombol **"Perbaiki Folder & Izin Upload"**.
  3. Skrip akan otomatis membuat seluruh folder kategori (`facilities`, `galleries`, `teachers`, `posts`), menghubungkan `storage:link`, dan mengonfigurasi izin `0775`.

### 2. Halaman Menampilkan Eror 500 (Internal Server Error)
- **Penyebab:** Berkas cache lama masih tersimpan atau berkas konfigurasi `.env` mengalami kesalahan format.
- **Solusi:**
  1. Jalankan `php artisan optimize:clear` melalui terminal atau tombol **"Clear Cache"** di `update-repo.php`.
  2. Periksa berkas log server di: `storage/logs/laravel.log`.
  3. Pastikan versi PHP server minimal versi 8.2.

### 3. Batas Unggah File Terlalu Kecil (Maksimal 2MB)
- **Penyebab:** Konfigurasi default PHP hosting membatasi ukuran unggahan.
- **Solusi:**
  1. Pastikan berkas [public/.htaccess](../../public/.htaccess) dan [public/.user.ini](../../public/.user.ini) sudah memuat:
     ```ini
     upload_max_filesize = 64M
     post_max_size = 64M
     memory_limit = 256M
     ```
  2. Jika menggunakan cPanel, buka menu **Select PHP Version** -> **Options** -> ubah `upload_max_filesize` menjadi `64M`.

### 4. Terkunci dari `update-repo.php` Karena Salah Sandi 5 Kali
- **Penyebab:** Mekanisme anti-brute force aktif untuk melindungi server dari serangan bot.
- **Solusi:**
  - Opsi A: Tunggu selama 15 menit hingga masa penguncian IP berakhir otomatis.
  - Opsi B: Jika memiliki akses File Manager cPanel atau SSH, hapus file pengunci di:
    `storage/framework/cache/tbsm_locks/`
