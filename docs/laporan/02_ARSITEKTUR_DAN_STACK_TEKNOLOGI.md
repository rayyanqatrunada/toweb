# LAPORAN 02: ARSITEKTUR DAN STACK TEKNOLOGI
## Spesifikasi Teknis, Arsitektur Sistem, dan Lingkungan Eksekusi

---

## 1. Arsitektur Perangkat Lunak

Aplikasi **TBSM WEB** dibangun dengan menerapkan prinsip rancang bangun modern berbasis **Model-View-Controller (MVC)** yang diperkaya dengan lapisan layanan terdedikasi (*Dedicated Service Layer*):

```
┌─────────────────────────────────────────────────────────────┐
│                    KLIEN / PENGUNJUNG                       │
│           (Web Browser Desktop, Tablet, Smartphone)         │
└──────────────────────────────┬──────────────────────────────┘
                               │ HTTP / HTTPS Requests
                               ▼
┌─────────────────────────────────────────────────────────────┐
│                     SERVER WEB (APACHE / NGINX)             │
│   • .htaccess Rewrite & HTTP Security Headers               │
│   • Proteksi Anti-Script di Folder Storage                  │
└──────────────────────────────┬──────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────┐
│                     LARAVEL 11 ROUTING                      │
│   • routes/web.php (Frontend Publik)                        │
│   • Filament Panel Provider (Admin CMS)                     │
│   • Middleware Pipeline (SecurityHeaders, RateLimiting)    │
└──────────────┬──────────────────────────────┬───────────────┘
               │                              │
               ▼                              ▼
┌──────────────────────────────┐┌──────────────────────────────┐
│     FRONTEND CONTROLLERS     ││        FILAMENT CMS          │
│ • HomeController             ││ • Resources & Forms          │
│ • GalleryController          ││ • Custom Pages               │
│ • AcademicController         ││ • Dashboard Widgets          │
│ • AlumniController           ││ • Livewire Reactive Forms    │
└──────────────┬───────────────┘└──────────────┬───────────────┘
               │                              │
               └──────────────┬───────────────┘
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                   SERVICE & MODEL LAYER                     │
│ • SettingsService (Global Config Cache)                     │
│ • Eloquent Models & Relational Scopes                       │
│ • ActivityLog Hooks (Perekaman IP & Device)                │
└──────────────────────────────┬──────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────┐
│                     DATABASE & STORAGE                      │
│ • MariaDB / MySQL / SQLite Database Engine                  │
│ • Public Storage Disk (Simpan Gambar, Dokumen, Covers)       │
└─────────────────────────────────────────────────────────────┘
```

### Karakteristik Desain:
1. **Decoupled Frontend & Backend:** Bagian publik menggunakan Laravel Blade dengan Tailwind CSS yang ringan dan performa maksimal, sedangkan panel admin ditenagai oleh Filament PHP & Livewire 3 untuk interaksi dinamis tanpa reload halaman penuh.
2. **SettingsService Singleton:** Konfigurasi jurusan (nama sekolah, kontak, logo, peta, statistik) dilayani oleh `SettingsService` yang menerapkan caching internal untuk meminimalkan beban query database berulang.
3. **Resilient Asset Fallback:** Controller publik dilengkapi logika inspeksi aset di disk fisik server sebelum data dilempar ke view, mencegah terjadinya kegagalan pemuatan media.

---

## 2. Rincian Stack Teknologi

### A. Backend & Core Engine
| Komponen | Teknologi | Versi | Peran & Alasan Pemilihan |
|---|---|---|---|
| **Bahasa Pemrograman** | PHP | 8.2+ / 8.3 | Dukungan type-hinting ketat, sintaks modern (*readonly classes*, *match expressions*), dan efisiensi memori tinggi. |
| **Framework Utama** | Laravel | 11.x | Kerangka kerja web PHP terdepan dengan routing cepat, ORM Eloquent tangguh, sistem event-listener, dan integrasi pengujian bawaan. |
| **Panel Admin (CMS)** | Filament PHP | 3.x | Framework antarmuka admin berbasis TALL stack (Tailwind, Alpine, Laravel, Livewire) yang sangat fleksibel, modular, dan modern. |
| **Reaktivitas Antarmuka** | Livewire | 3.x | Memungkinkan komponen admin dinamis (multi-upload gambar, validasi langsung, modal form) tanpa perlu menulis framework SPA terpisah. |
| **Audit Logging** | Spatie Activitylog | 4.x | Merekam setiap riwayat penambahan, modifikasi, dan penghapusan data model oleh pengguna ke tabel `activity_log`. |
| **Manajemen Hak Akses** | Spatie Permission | 6.x | Mendukung role-based access control (RBAC) untuk mengelola peran admin dan staf. |
| **Slug Generator** | Spatie Sluggable | 3.x | Pembuatan slug SEO-friendly secara otomatis dari judul berita atau album galeri. |

### B. Frontend & Tampilan
| Komponen | Teknologi | Versi | Peran & Alasan Pemilihan |
|---|---|---|---|
| **Templating Engine** | Laravel Blade | Bawaan 11.x | Sistem template server-side yang cepat, mendukung komponen terisolasi (*Blade Components*), dan ramah SEO. |
| **CSS Utility Framework** | Tailwind CSS | 3.4+ | Framework utilitas CSS untuk styling antarmuka dengan konsistensi sistem desain, ukuran bundle terkontrol via PurgeCSS/Vite. |
| **Scripting Interaktif** | Alpine.js | 3.x | Framework JavaScript ultra-ringan untuk interaksi dropdown, modal dialog, tab filter galeri, dan mobile menu. |
| **Tipografi** | Google Fonts (Inter) | Webfont | Font sans-serif berpresisi tinggi yang memberikan kesan modern, bersih, dan mudah dibaca pada berbagai resolusi layar. |
| **Ikonografi** | Lucide Icons & Heroicons | SVG Bawaan | Ikon berbasis vektor SVG inline yang tajam, ringan, dan tidak membutuhkan unduhan file font eksternal yang berat. |

### C. Database & Penyimpanan
| Komponen | Spesifikasi | Keterangan |
|---|---|---|
| **Database Engine** | MySQL 8.0+ / MariaDB 10.4+ (Produksi) | Engine basis data relasional standar industri dengan dukungan indeks full-text dan integritas foreign key. |
| **Development Engine** | SQLite 3 | Digunakan untuk pengujian otomatis (*automated test suite*) in-memory dan pengembangan lokal yang cepat. |
| **Storage Driver** | Local Disk (`public` disk) | Terletak di `storage/app/public` dan dipublikasikan via symlink ke `public/storage`. |
| **GD Library** | PHP GD / Imagick | Digunakan untuk kompresi gambar, pengubahan ukuran, dan pembuatan fallback placeholder berukuran 6KB–12KB. |

---

## 3. Prasyarat Server & Hosting

Aplikasi ini dapat dijalankan pada lingkungan **Shared Hosting cPanel**, **Cloud VPS (Ubuntu/Debian)**, maupun **PaaS / Docker**:

### Kebutuhan Server Minimum:
- **Sistem Operasi:** Linux (Ubuntu 22.04 LTS / CloudLinux / CentOS)
- **Versi PHP:** Minimal PHP 8.2 (Disarankan PHP 8.2 atau 8.3)
- **Ekstensi PHP Wajib Diaktifkan:**
  - `pdo_mysql` / `pdo_sqlite`
  - `mbstring`
  - `openssl`
  - `curl`
  - `gd` atau `imagick`
  - `fileinfo`
  - `exif`
  - `tokenizer`
  - `xml`
  - `zip`
- **Konfigurasi PHP (`php.ini`):**
  - `upload_max_filesize = 64M`
  - `post_max_size = 64M`
  - `memory_limit = 256M`
  - `max_execution_time = 300`
- **Web Server:**
  - Apache 2.4+ dengan `mod_rewrite` dan `mod_headers` diaktifkan, ATAU
  - Nginx 1.20+ dengan konfigurasi fastcgi PHP-FPM yang sesuai.

---

## 4. Struktur Direktori Utama Proyek

```
toweb/
├── app/
│   ├── Console/Commands/       # Perintah artisan kustom (SyncGalleryAssetsCommand)
│   ├── Filament/               # Konfigurasi panel admin Filament (Resources, Pages, Widgets)
│   ├── Http/Controllers/       # Controller web publik (Home, Gallery, Academic, Alumni)
│   ├── Http/Middleware/        # Middleware keamanan (SecurityHeaders)
│   ├── Models/                 # Model Eloquent data (GalleryAlbum, Post, Facility, Teacher, dll)
│   ├── Providers/              # Service providers (AppServiceProvider, AdminPanelProvider)
│   └── Services/               # Layanan logika bisnis (SettingsService)
├── config/                     # Berkas konfigurasi sistem Laravel
├── database/
│   ├── migrations/             # Migrasi skema tabel database
│   └── seeders/                # Pengisi data awal & generator aset uji
├── docs/                       # Dokumentasi lengkap sistem & laporan teknis
│   └── laporan/                # Laporan terpisah (arsitektur, fitur, keamanan, dll)
├── public/
│   ├── .htaccess               # Aturan rewrite server & HTTP security headers
│   ├── update-repo.php         # Alat pemeliharaan & deployment berbasis web
│   └── storage/                # Tautan publik ke direktori penyimpanan aset
├── resources/
│   ├── css/                    # Stylesheet kustom & tema Filament
│   └── views/                  # Template Blade tampilan antarmuka publik
├── routes/
│   └── web.php                 # Peta rute URL aplikasi web
└── storage/
    └── app/public/             # Berkas asli media yang diunggah oleh admin
```
