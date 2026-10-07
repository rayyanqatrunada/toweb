# LAPORAN 04: SISTEM ADMINISTRASI DAN CMS (FILAMENT V3)
## Panduan Pengelolaan Konten, Panel Admin, dan Modul Dashboard

---

## 1. Arsitektur Panel Admin Filament v3

Sistem manajemen konten (**Content Management System - CMS**) dibangun menggunakan **Filament v3**, framework administrasi berbasis Laravel yang memanfaatkan ekosistem TALL Stack (*Tailwind, Alpine, Laravel, Livewire*). Panel admin ini dirancang untuk memberikan kemudahan bagi pengelola jurusan dalam memperbarui informasi tanpa memerlukan pengetahuan teknis pemrograman.

### Karakteristik Utama Panel Admin:
- **Kecepatan SPA-Like:** Berkat Livewire 3, perpindahan tab, penyimpanan formulir, dan penyaringan tabel berlangsung instan tanpa reload browser menyeluruh.
- **Identitas Visual Konsisten:** Menerapkan palet warna *TBSM Racing Red* (`#DC2626`) dipadukan dengan tipografi *Inter* dan mode terang yang bersih (*clean light mode*).
- **Keamanan Jalur Tersembunyi:** Rute URL admin dapat disesuaikan sesuka hati melalui konfigurasi `.env` (`ADMIN_PANEL_PATH=nama-rahasia`) untuk menyembunyikan pintu masuk admin dari serangan bot otomatis.

---

## 2. Struktur Navigasi dan Modul CMS

Navigasi admin dikelompokkan ke dalam 5 grup tematik yang terorganisir:

```
┌─────────────────────────────────────────────────────────────┐
│                 PANEL ADMINISTRASI TBSM                      │
├─────────────────────────────────────────────────────────────┤
│ 📁 PENGATURAN HALAMAN                                       │
│   • Hero Slider (Kelola banner geser beranda)               │
│   • Halaman Industri (Konten kemitraan pabrikan)            │
│   • Pengaturan Situs (Nama sekolah, logo, kontak, maps)     │
├─────────────────────────────────────────────────────────────┤
│ 📁 AKADEMIK & PROFIL                                        │
│   • Data Guru & Instruktur (Nama, gelar, foto, sertifikasi) │
│   • Data Fasilitas Bengkel (Nama alat, spesifikasi, foto)   │
│   • Prestasi Siswa (Lomba, tingkat kejuaraan, tahun, foto)  │
├─────────────────────────────────────────────────────────────┤
│ 📁 KEMITRAAN & KARIR                                        │
│   • Mitra Industri (Perusahaan rekanan, logo, tipe kerja sama)│
│   • Data Alumni (Nama, tahun lulus, pekerjaan, testimoni)   │
├─────────────────────────────────────────────────────────────┤
│ 📁 PUBLIKASI & INFORMASI                                    │
│   • Berita & Warta (Artikel kegiatan, foto sampul, draft)   │
│   • Kategori Berita (Pengelompokan artikel)                 │
│   • Album Galeri Foto (Dokumentasi kegiatan & multi-upload) │
├─────────────────────────────────────────────────────────────┤
│ 📁 PUSAT LAYANAN & SISTEM                                   │
│   • Profil Akun Admin (Ubah nama, email, kata sandi kuat)   │
│   • Notifikasi Database (Pemberitahuan pembaruan data)      │
└─────────────────────────────────────────────────────────────┘
```

---

## 3. Widget Dasbor Interaktif

Halaman beranda admin dilengkapi 6 widget informatif yang langsung menyajikan status operasional sistem secara *real-time*:

### 1. `WelcomeWidget`
- Menyajikan ucapan salam personal berdasarkan waktu (Pagi/Siang/Sore/Malam), nama akun admin yang sedang bertugas, serta ringkasan tanggal server.

### 2. `QuickActionsWidget`
- Tombol pintasan satu klik (*one-click shortcuts*) untuk aksi paling sering dilakukan: Tambah Berita Baru, Unggah Foto Galeri, Tambah Fasilitas Bengkel, dan Tambah Prestasi Siswa.

### 3. `StatsOverview`
- Kartu metrik berisi akumulasi data utama: Total Berita Terbit, Total Album Galeri, Total Mitra Industri Aktif, dan Jumlah Alumni Terdata.

### 4. `LatestPostsWidget`
- Menampilkan tabel 5 berita terakhir yang diunggah, lengkap dengan status publikasi (*Published / Draft*) dan tanggal pembuatan.

### 5. `RecentActivityWidget` (Audit Log dengan Alamat IP & Perangkat)
- Widget log audit yang menyajikan riwayat intervensi data terbaru di sistem.
- **Pembaruan Signifikan:** Menampilkan badge alamat IP klien (misal: `IP: 180.252.12.34`) dan klasifikasi perangkat (misal: `(HP/Mobile)` atau `(Windows)`). Hal ini memastikan bahwa jika akun admin digunakan oleh orang atau lokasi berbeda, perbedaannya langsung terlihat secara transparan.

### 6. `WebsiteStatusWidget`
- Memeriksa integritas sistem hosting: status tautan penyimpanan (*Storage Symlink*), status izin folder cache, dan ketersediaan ruang penyimpanan.

---

## 4. Manajemen Formulir dan Unggahan Media

### A. Perbaikan Bug Multi-Foto Galeri (*EditGalleryAlbum*)
- **Kondisi Sebelum Perbaikan:**
  Pada versi awal, pengembang sebelumnya menerapkan perulangan komparasi array:
  ```php
  // KODE LAMA BERMASALAH:
  foreach ($existingItems as $item) {
      if (!in_array($item->file_path, $savedStringPaths)) {
          $item->delete(); // Foto-foto lama otomatis terhapus!
      }
  }
  ```
  Hal ini menyebabkan setiap kali admin ingin menambahkan 1 foto baru ke album yang sudah memiliki 10 foto, ke-10 foto lama tersebut justru otomatis terhapus dari basis data.
- **Solusi yang Diterapkan:**
  Logika penghapusan destruktif tersebut telah dibuang sepenuhnya. Input formulir `gallery_photos` diatur untuk bekerja murni dalam mode *append* (penambahan foto baru) tanpa menghapus rekaman foto yang sudah tersimpan sebelumnya di tabel `gallery_items`.

### B. Standarisasi Format Media Aman
- Menghentikan penerimaan file berekstensi SVG (`image/svg+xml`) pada form foto galeri dan alumni untuk mengeliminasi risiko serangan *Stored Cross-Site Scripting (XSS)*.
- Seluruh formulir unggahan dibatasi ketat hanya menerima format raster terkompresi:
  `['image/jpeg', 'image/png', 'image/webp']` dengan batas ukuran maksimal 5MB per file foto.
- Dilengkapi fitur pemotongan dan rotasi gambar bawaan (*Filament Image Editor*) agar orientasi foto selalu rapi sebelum disimpan ke server.
