# Daftar Lengkap Teknologi yang Digunakan (Technology Stack)

**Sistem Informasi Terintegrasi Konsentrasi Keahlian Teknik Sepeda Motor (TSM)**  
**SMK Negeri 1 Bangsri — Binaan Resmi PT Astra Honda Motor (AHM)**

---

## 1. Peta Ekosistem Teknologi (Technology Stack Matrix)

Sistem ini dibangun dengan memadukan ekosistem PHP modern dan teknologi web mutakhir (*modern frontend stack*) yang dirancang untuk performa tinggi, skalabilitas, kemudahan pemeliharaan, serta keamanan tingkat institusi:

```mermaid
graph TD
    subgraph 1. Runtime & Bahasa
        PHP[PHP 8.3 / 8.5 Engine]
        JS[JavaScript ES6+ Standard]
        HTML5[HTML5 Semantic Markup]
        CSS3[CSS3 Modern Features]
    end

    subgraph 2. Backend & CMS
        Laravel[Laravel Framework Core v13/11]
        Filament[Filament v3 Admin CMS]
        Livewire[Livewire 3 Component Engine]
        SpatiePerm[Spatie Laravel Permission]
        SpatieLog[Spatie Laravel Activitylog]
    end

    subgraph 3. Frontend & UI Engine
        Blade[Laravel Blade SSR]
        Tailwind[Tailwind CSS v4 Engine]
        Alpine[Alpine.js v3 Micro-Reactivity]
        GoogleFonts[Google Fonts: Chivo & Hanken Grotesk]
    end

    subgraph 4. Database & Storage
        MySQL[(MySQL / MariaDB RDBMS)]
        Eloquent[Eloquent ORM]
        StorageSymlink[Laravel Storage Disk & Public Symlink]
    end

    subgraph 5. Build Tools & Automation
        Vite[Vite 8.x Bundler]
        VitePlugin[Laravel Vite Plugin 3.x]
        TailwindVite[@tailwindcss/vite 4.x]
        ChromePuppeteer[Headless Chrome + Puppeteer-Core]
    end

    subgraph 6. Deployment & Hosting
        UpdateRepo[update-repo.php Auto Sync Hook]
        IntlPolyfill[Custom Number & Intl Polyfill]
        SecurityHeaders[SecurityHeaders Custom Middleware]
    end

    PHP --> Laravel
    Laravel --> Filament
    Filament --> Livewire
    Laravel --> Blade
    Blade --> Tailwind
    Blade --> Alpine
    Laravel --> Eloquent
    Eloquent --> MySQL
    Vite --> TailwindVite
```

---

## 2. Rincian Kategori Teknologi

### 2.1 Bahasa Pemrograman & Runtime
| Komponen | Versi / Standar | Peran & Implementasi |
| :--- | :--- | :--- |
| **PHP** | `^8.3` (Kompatibel hingga PHP 8.5) | Bahasa utama sisi server (*server-side*). Memanfaatkan *strict typing, match expressions, constructor promotion, nullsafe operators*, dan *attributes*. |
| **JavaScript** | ES6+ (ECMAScript 2022+) | Logika interaktivitas klien, transisi scroll navbar, dan kontrol laci menu mobile (*sliding drawer*). |
| **HTML5** | W3C Semantic Standard | Struktur semantik dokumen web (`<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`) yang ramah SEO dan aksesibilitas (*A11y*). |
| **CSS3** | Modern W3C Spec | Variabel CSS kustom (*CSS Custom Properties*), *flexbox*, *grid layout*, serta efek *glassmorphism* (`backdrop-filter`). |

---

### 2.2 Framework Backend & Arsitektur Inti
| Teknologi | Versi / Spesifikasi | Fungsi & Manfaat |
| :--- | :--- | :--- |
| **Laravel Core** | `^13.17` (Kompatibel v11/v12) | Framework MVC utama yang menyediakan *routing, middleware pipeline, service container, dependency injection, blade rendering*, dan *exception handling*. |
| **Eloquent ORM** | Bawaan Laravel | Abstraksi interaksi basis data berbasis objek (*Object-Relational Mapping*) dengan proteksi bawaan terhadap SQL Injection melalui *prepared statements*. |
| **Artisan CLI** | Bawaan Laravel | Alat baris perintah untuk migrasi basis data, optimasi cache, pembersihan tampilan kompilasi, dan *scaffolding*. |
| **Laravel Tinker** | `^3.0` | Antarmuka REPL interaktif (*Read-Eval-Print Loop*) untuk debugging dan inspeksi data Eloquent secara langsung melalui terminal. |

---

### 2.3 Panel Administrasi & Pengelolaan Konten (CMS)
| Teknologi | Versi / Paket | Peran & Implementasi |
| :--- | :--- | :--- |
| **Filament Panel Builder** | `v3.x` (`filament/filament`) | Engine panel admin berbasis TALL stack (Tailwind, Alpine, Laravel, Livewire) untuk mengelola data guru, berita, pengumuman, mitra, dan fasilitas. |
| **Livewire** | `v3.x` | Menghubungkan logika backend PHP langsung ke antarmuka frontend admin secara reaktif tanpa penulisan endpoint REST API manual. |
| **Filament Form Builder** | Terintegrasi Filament v3 | Penyedia komponen input dinamis: *Rich Text Editor, Image/File Upload, Date Picker, Select Search, dan Toggles*. |
| **Filament Table Builder** | Terintegrasi Filament v3 | Penyedia tabel data canggih: pencarian instan (*global search*), pagination, filter status, pengurutan kolom, dan bulk action. |
| **Filament Notifications** | Terintegrasi Filament v3 | Sistem notifikasi *toast* real-time yang memberikan umpan balik langsung kepada admin saat aksi simpan/ubah/hapus berhasil. |

---

### 2.4 Desain Antarmuka & Frontend UI/UX
| Komponen | Spesifikasi / Library | Deskripsi Teknis |
| :--- | :--- | :--- |
| **Tailwind CSS** | `v4.3.3` | Engine styling CSS berbasis utilitas generasi terbaru. Menggunakan arsitektur kompilasi *zero-runtime* yang super cepat dan ukuran berkas CSS produksi yang sangat terkompresi. |
| **Alpine.js** | `v3.x` | Framework reaktivitas mikro yang menangani logika visual lokal: transisi scroll navbar desktop, status buka-tutup modal, dan tab kurikulum. |
| **Google Fonts: Chivo** | Variable Font (`wght@100..900`) | Font tipografi heading bertema mekanikal dan presisi industri otomotif. |
| **Google Fonts: Hanken Grotesk** | Variable Font (`wght@100..900`) | Font sans-serif untuk badan teks (*body text*) dengan keterbacaan tinggi di layar seluler. |
| **Heroicons & Custom SVG** | SVG Vektor Murni | Seluruh ikon grafis disajikan dalam bentuk vektor SVG inline berbobot ringan tanpa ketergantungan pada pustaka font ikon berat (seperti FontAwesome). |

---

### 2.5 Basis Data & Manajemen Penyimpanan
| Komponen | Spesifikasi | Karakteristik & Implementasi |
| :--- | :--- | :--- |
| **MySQL / MariaDB** | MySQL 8.0+ / MariaDB 10.4+ | RDBMS relasional utama dengan *engine* InnoDB yang mendukung integritas relasi referensial (*Foreign Key Constraints*) dan transaksi atomik. |
| **Character Set & Collation** | `utf8mb4_unicode_ci` | Mendukung penuh penyimpanan karakter multibyte, karakter simbol teknis, dan emoji modern. |
| **Laravel Storage System** | Public Disk (`local`) | Penyimpanan berkas foto profil guru, galeri fasilitas, dan dokumen PDF unduhan yang diisolasi aman di `storage/app/public` dan diakses publik via symlink `public/storage`. |

---

### 2.6 Alat Kompilasi & Asset Pipeline
| Alat | Versi / Modul | Peran Teknis |
| :--- | :--- | :--- |
| **Vite** | `v8.2.1` | Build tool generasi modern berbasis Rollup yang menggantikan Webpack. Menyediakan *Fast Refresh* di mode pengembangan dan bundling teroptimasi di mode produksi. |
| **@tailwindcss/vite** | `v4.3.3` | Plugin resmi integrasi Tailwind CSS v4 langsung ke dalam alur transformasi Vite tanpa memerlukan file `postcss.config.js` terpisah. |
| **laravel-vite-plugin** | `v3.1.0` | Plugin integrasi resmi Laravel yang menghubungkan helper `@vite(['resources/css/app.css', 'resources/js/app.js'])` di template Blade dengan berkas manifest. |
| **Rollup Engine** | Bawaan Vite | Memproses *code-splitting*, minifikasi CSS/JS, dan pemberian hash unik pada nama berkas (*cache busting*) untuk mencegah caching browser basi. |

---

### 2.7 Pustaka Ekstensi (Packages & Libraries)
| Pustaka | Namespace / Vendor | Manfaat & Penggunaan |
| :--- | :--- | :--- |
| **Spatie Laravel Permission** | `spatie/laravel-permission` | Sistem kontrol akses berbasis peran (*Role-Based Access Control / RBAC*) untuk mengatur hak akses pengguna dan administrator. |
| **Spatie Activity Log** | `spatie/laravel-activitylog` | Pencatat riwayat audit (*audit trail*) otomatis yang merekam setiap aktivitas penambahan, perubahan, dan penghapusan data penting. |
| **Number & Intl Polyfill** | `App\Support\NumberPolyfill` | Solusi polifill kustom yang mengemulasi fungsi kelas `NumberFormatter` dan metode `Number::formatCurrency()`, menjaga sistem tetap stabil pada hosting cPanel yang kekurangan modul `ext-intl`. |
| **Puppeteer Core** | `puppeteer-core` (Headless Chrome) | Alat otomasi penangkapan layar (*screenshot automation*) berbasis browser Chrome headless untuk pengujian visual responsif mobile & desktop. |

---

### 2.8 Keamanan & Penguatan Sistem (Security Stack)
| Lapisan Keamanan | Implementasi | Fungsi Perlindungan |
| :--- | :--- | :--- |
| **Security Headers Middleware** | `App\Http\Middleware\SecurityHeaders` | Mengatur header keamanan HTTP secara global: `X-Content-Type-Options: nosniff`, `X-Frame-Options: SAMEORIGIN`, `Referrer-Policy: strict-origin-when-cross-origin`, dan `Content-Security-Policy (CSP)`. |
| **Proteksi CSRF** | Laravel VerifyCsrfToken | Setiap formulir HTTP POST (seperti form kontak dan autentikasi login) diverifikasi menggunakan token acak yang unik per sesi pengguna. |
| **Sanitasi Anti-XSS** | Laravel Blade Engine | Seluruh pencetakan variabel dinamis menggunakan sintaks kurung ganda `{{ ... }}` yang secara otomatis menjalankan `htmlspecialchars()`. |
| **Otentikasi Sandi Kuat** | Bcrypt / Argon2id Hashing | Seluruh kata sandi administrator dienkripsi menggunakan algoritma *one-way salted hashing* yang aman dari serangan *rainbow table*. |
| **Rate Limiter** | Laravel Throttle Middleware | Mencegah serangan *brute force* pada formulir login dan serangan spamming pada formulir kontak publik. |

---

### 2.9 Infrastruktur, Server & Deployment Pipeline
| Komponen | Spesifikasi / Mekanisme | Keterangan |
| :--- | :--- | :--- |
| **Web Server** | Apache (mod_rewrite) / Nginx | Penanganan routing terpusat mengarah ke berkas induk `public/index.php`. |
| **Sistem Operasi Host** | Linux (Ubuntu / AlmaLinux / CloudLinux) | Lingkungan server standar yang stabil untuk PHP 8.3+ dan database MariaDB/MySQL. |
| **Skrip Pembaruan Mandiri** | `public/update-repo.php` | Mekanisme deployment berbasis token rahasia (`?key=...`) yang secara otomatis menjalankan `git pull`, deteksi path root, serta pembersihan cache Laravel hanya dalam 1 klik. |
| **Pre-compiled Assets** | `build_folder_only.zip` | Bundel aset produksi CSS dan JS yang sudah dikompilasi sebelumnya, sehingga hosting tidak memerlukan Node.js atau NPM terpasang. |

---

### 2.10 Alat Pengujian & Penjaminan Kualitas (Testing & QA)
| Alat | Versi / Lingkungan | Kegunaan |
| :--- | :--- | :--- |
| **PHPUnit** | `^12.5.12` | Framework pengujian unit (*Unit Testing*) dan pengujian fitur (*Feature Testing*) otomatis untuk memastikan seluruh rute publik dan controller merespons status HTTP 200 OK. |
| **FakerPHP** | `^1.23` | Pembangkit data tiruan (*mock data*) untuk pengisian awal basis data (*seeders*) dan pengujian performa. |
| **Laravel Pint** | `^1.27` | Linter dan *code style fixer* berbasis standar PSR-12 untuk memastikan kebersihan dan konsistensi penulisan kode PHP. |
| **Mockery** | `^1.6` | Pustaka pembuatan objek tiruan (*mock objects*) untuk pengujian terisolasi. |
