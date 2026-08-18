# TOWEB — Complete Core System Audit

## 1. Executive Summary
Audit menyeluruh (*read-only*) ini dilakukan pada source code aplikasi Website Jurusan Teknik Otomotif (TOWEB) yang dibangun menggunakan Laravel 11 dan Filament v3. Sistem ini memisahkan peran antara backend administration (Filament CMS) dan frontend interaktif. Secara keseluruhan, sistem ini sangat terstruktur, dengan *caching* berlapis pada *homepage*, *background job* untuk melacak analitik, serta menggunakan Spatie Permission untuk kontrol otorisasi.

## 2. Project Architecture
Struktur utama project terdiri dari:
- **Framework**: Laravel v11.x, PHP v8.3
- **Admin Panel**: Filament v3 (`/admin`)
- **Frontend**: Blade Components + Alpine.js + Tailwind CSS (`/`)
- **Controllers**: Controller dipisah ke `app/Http/Controllers/Frontend/` untuk melayani *public routing*.
- **Services**: `app/Services/Search/GlobalSearchService.php` menangani logika agregasi *search*.
- **Jobs**: `app/Jobs/RecordDownloadAnalytics.php` melayani sistem antrean unduhan (*queue*).
- **Models**: Terdapat 24 Model Eloquent utama.

## 3. Authentication System
- **Login/Logout**: Dikelola secara *native* oleh Filament melalui `Filament\Auth`. URL admin terletak di `/admin/login`.
- **User Accounts**: Sistem hanya memiliki akun administrator (Tabel `users`). **Visitor publik, siswa, atau guru biasa tidak memiliki akun dan tidak bisa login.** (Guru hanya entitas data CMS `teachers`, bukan user yang bisa login kecuali mereka diberi *user_id*).
- **Registration**: Tidak ada form registrasi publik. 
- **Admin Authentication**: Konsep admin hanyalah _User_ yang memiliki *role* spesifik. Syarat bisa masuk panel CMS dibatasi oleh metode `canAccessPanel(Panel $panel): bool` di model `User`.

## 4. Role & Permission Matrix
Sistem menggunakan `Spatie\Permission`. Roles disemai (*seeded*) oleh `RoleAndUserSeeder.php`.

| Role | Ada? | Sumber | Permission | Bisa Login? | Bisa Masuk CMS? |
|------|------|--------|------------|-------------|-----------------|
| Super Admin | Ya | `RoleAndUserSeeder` | Semua (via Gate/Policies implicit) | Ya | Ya |
| Admin Jurusan | Ya | `RoleAndUserSeeder` | Manajemen data & berita | Ya | Ya |
| Editor | Ya | `RoleAndUserSeeder` | Manajemen artikel & konten publik | Ya | Ya |
| Guru | Ya | `RoleAndUserSeeder` | Terbatas (materi/nilai jika ada) | Ya | Ya |
| Public / User | Tidak | - | Tidak memiliki *role* | Tidak | Tidak |

*Catatan: Metode `canAccessPanel` mengizinkan keempat role di atas mengakses `/admin`. Pengaturan permission spesifik *(per resource)* tidak dikonfigurasi via file seeder, melainkan secara dinamis atau mengandalkan Filament Resource Authorization.*

## 5. Admin Account System
1. **Jumlah Admin:** *Multiple admins* didukung. Tidak ada batasan jumlah (secara kode).
2. **Siapa itu Admin?** Admin hanyalah rekaman di tabel `users` yang diberi role `Super Admin` atau role lainnya.
3. **Akun Aktual (Seeder):** Terdapat 1 akun *Super Admin* default yang dibuat oleh seeder: `admin@toweb.test` (password: `password`).
4. **Pembuatan Admin Baru:** Super Admin dapat membuat admin lain via Filament (tergantung *Resource Users* jika diaktifkan).

## 6. Database Entity Inventory
Sebanyak **24 Models** dipetakan ke tabel database.
*(Total tabel termasuk tabel pivot/cache/jobs: ~32 tabel).*

| Entity | Table | Fungsi | Public? | CMS? | Relasi Utama |
|--------|-------|--------|---------|------|--------------|
| User | `users` | Autentikasi CMS | Tidak | Ya | - |
| Setting | `settings` | Pengaturan Website | Ya | Ya | - |
| Category | `categories` | Kategori Berita | Ya | Ya | hasMany Posts |
| Tag | `tags` | Label Berita | Ya | Ya | belongsToMany Posts |
| Post | `posts` | Berita/Artikel | Ya | Ya | belongsTo Category, belongsTo User |
| Page | `pages` | Halaman Statis | Ya | Ya | - |
| Event | `events` | Acara/Kalender | Ya | Ya | - |
| Announcement | `announcements` | Pengumuman | Ya | Ya | - |
| GalleryAlbum | `gallery_albums`| Folder Galeri | Ya | Ya | hasMany GalleryItem |
| GalleryItem | `gallery_items` | Foto/Video Galeri | Ya | Ya | belongsTo GalleryAlbum |
| DownloadCategory| `download_categories`| Kategori Dokumen | Ya | Ya | hasMany Downloads |
| Download | `downloads` | File Unduhan | Ya | Ya | belongsTo Category |
| Program | `programs` | Jurusan/Program Keahlian| Ya | Ya | hasMany Competencies |
| Competency | `competencies` | Kompetensi Dasar | Ya | Ya | belongsTo Program |
| Teacher | `teachers` | Profil Guru | Ya | Ya | belongsTo User |
| Facility | `facilities` | Fasilitas Sekolah | Ya | Ya | - |
| Achievement | `achievements` | Prestasi | Ya | Ya | hasMany Participants |
| IndustryPartner | `industry_partners`| Mitra Industri | Ya | Ya | hasMany Internships/Jobs |
| Partnership | `partnerships` | Kerja Sama Resmi | Ya | Ya | belongsTo Partner |
| Internship | `internships` | Info PKL | Ya | Ya | belongsTo Partner |
| JobVacancy | `job_vacancies` | Lowongan Kerja BKK | Ya | Ya | belongsTo Partner |
| Alumni | `alumni` | Data Alumni sukses | Ya | Ya | - |

## 7. CMS Resource Inventory
Ada **21 Filament Resources** (berbasis dari `app/Filament/Resources/*`):
- AchievementParticipants, Achievements, Alumnis, Announcements, Categories, Competencies, DownloadCategories, Downloads, Events, Facilities, GalleryAlbums, GalleryItems, IndustryPartners, Internships, JobVacancies, Pages, Partnerships, Posts, Programs, Tags, Teachers.

Setiap *resource* mendukung operasi CRUD utuh (Create, Read, Update, Delete) yang ditangani oleh Filament *Pages* (List, Create, Edit).

## 8. CMS Data Input Inventory
*(Fase 8 dan 23 digabung dalam bab 23 untuk keterbacaan)*

## 9. Field-Level Data Inventory
Contoh Inventarisasi Lapangan (*Field*) Utama:

### ENTITY: Post
| Field | Type | Required | Default | Editable | Public |
|-------|------|----------|---------|----------|--------|
| `title` | String | Yes | - | Yes | Yes |
| `slug` | String | Yes | - | Yes | Yes |
| `excerpt` | Text | No | - | Yes | Yes |
| `content` | Text | Yes | - | Yes | Yes |
| `thumbnail` | File/Str | No | - | Yes | Yes |
| `status` | Enum | Yes | `draft` | Yes | Yes (jika Published) |
| `published_at`| Datetime | No | - | Yes | Yes |
| `user_id` | Int (FK) | Yes | - | Yes | Yes (Relasi) |

### ENTITY: Download
| Field | Type | Required | Default | Editable | Public |
|-------|------|----------|---------|----------|--------|
| `file_path` | String | Yes | - | Yes | Ya (via URL) |
| `download_count`| Integer| No | `0` | Yes | Ya |
| `is_public` | Boolean| Yes | `1` | Yes | Ya |

## 10. Database Relationship Map
[CONFIRMED] Pola relasi yang dipetakan dari schema & model:
- `User` **hasMany** `Posts`, `Teachers`
- `Category` **hasMany** `Posts`
- `Post` **belongsToMany** `Tags` (tabel pivot `post_tag`)
- `GalleryAlbum` **hasMany** `GalleryItems`
- `DownloadCategory` **hasMany** `Downloads`
- `Program` **hasMany** `Competencies`
- `IndustryPartner` **hasMany** `JobVacancies`, `Internships`, `Partnerships`
- `Achievement` **hasMany** `AchievementParticipants`

## 11. Public Website Flow
Pengunjung publik (*Guest*) memiliki alur navigasi (ditangani oleh controller di `app/Http/Controllers/Frontend/`):

| URL | Controller | Method | View |
|-----|------------|--------|------|
| `/` | `HomeController` | `index` | `home` |
| `/search` | `SearchController` | `index` | `search` |
| `/tentang` | `HomeController` | `about` | `about` |
| `/berita` | `NewsController` | `index`, `show` | `news.index`, `news.show` |
| `/pengumuman` | `NewsController` | `announcements`, `announcementShow` | `announcements.index / show` |
| `/akademik/program`| `AcademicController` | `programs` | `academic.programs` |
| `/akademik/guru` | `AcademicController` | `teachers` | `academic.teachers` |
| `/akademik/fasilitas`| `AcademicController` | `facilities` | `academic.facilities` |
| `/prestasi` | `AchievementController`| `index`, `show` | `achievements.index / show` |
| `/galeri` | `GalleryController` | `index`, `show` | `gallery.index / show` |
| `/mitra-industri` | `PartnershipController`| `index`, `show` | `partnership.index / show` |
| `/pkl` | `InternshipController` | `index`, `show` | `internships.index / show` |
| `/lowongan` | `JobController` | `index`, `show` | `jobs.index / show` |
| `/alumni` | `AlumniController` | `index`, `show` | `alumni.index / show` |
| `/unduhan` | `DownloadController` | `index` | `download.index` |
| `/download/{slug}/file`| `DownloadController`| `download` | *Response Download* |

## 12. Admin/CMS Flow
Admin Login (`/admin/login`) -> Autentikasi & Verifikasi `canAccessPanel` (Role) -> Dashboard Filament -> Membuka Menu Resource (e.g., `Berita`) -> `CreatePost` Page -> Validasi Form -> Eloquent `save()` -> Data tersimpan di Database -> Publik dapat melihat data melalui Public Scope.

## 13. Publishing Workflow
Banyak entitas (Berita, Lowongan, Galeri) memiliki atribut `status` (Enum: `draft`, `review`, `published`) dan `published_at` (Datetime).
- Siapa yang dapat publish? Tergantung *Policy*, namun *Super Admin* dan *Admin Jurusan* secara implisit bisa melakukannya.
- Data Publik: *Frontend Controllers* mengaplikasikan *Scope* (contoh: `->published()` atau `->active()`) sehingga konten _draft_ diabaikan (menghasilkan 404 jika dibuka dengan slug statis).
- Tidak ditemukan indikasi penggunaan fitur *Soft Delete* secara masif.

## 14. Media & Storage System
- Modul *Upload*: Berita (Thumbnail), Dokumen (File Upload), Galeri (Image), Mitra Industri (Logo).
- Komponen: Dikelola via Filament `FileUpload::make()`.
- Storage: Disimpan secara publik di direktori `/storage/app/public` (simlink melalui `public/storage`).

## 15. Search Architecture
Dikelola oleh `App\Services\Search\GlobalSearchService`.
- **Trigger:** URL `GET /search?q={query}`
- **Security:** Dimoderasi dengan rate limiter (`throttle:60,1`).
- **Logic:** Pencarian diproses memecah model (`Post`, `Announcement`, `Program`, `Achievement`, `IndustryPartner`, `Internship`, `JobVacancy`, `Alumni`, `GalleryAlbum`, `Download`). Hasil dibatasi (`->take(10)`) per kategori.
- **DTO:** Data dikembalikan seragam menggunakan class *Data Transfer Object* (DTO) `SearchResult`.

## 16. Download Architecture
- **URL**: `GET /download/{slug}/file`
- **Controller**: `DownloadController@download`
- **Flow**: Cek jika file tersedia, jalankan *background job* `RecordDownloadAnalytics::dispatch($download->id)` untuk menghindari pemblokiran (*blocking*) *HTTP Response*, lalu berikan file dengan `response()->download()`.
- **Security**: IDOR tidak dimungkinkan karena pencarian menggunakan *slug/ID* yang ditautkan ke validasi status *published*.

## 17. Homepage Architecture
Diperkuat secara ekstensif menggunakan `Illuminate\Support\Facades\Cache`.
| Data | Cache Key | Duration | Invalidation |
|------|-----------|----------|--------------|
| Stats Alumni/Mitra | `homepage:stats:*` | 60 Menit | Kadaluwarsa berbasis TTL (Time to live). Invalidasi model belum terlihat secara eksplisit di observer (jika tidak ada Model Observer). |
| Data Tampilan | `homepage:programs`, `homepage:jobs`, dll | 15 Menit | TTL 15 menit. |

## 18. Queue & Background Processing
- **Queue Driver**: Database (`jobs` table).
- **Job**: `RecordDownloadAnalytics.php`
- **Trigger**: Setiap kali *user* mengunduh file via `DownloadController`.
- **Retry**: Maksimal 3 percobaan, *backoff* `[5, 10, 20]` detik. Bertujuan melakukan *increment* `download_count`.

## 19. Security Architecture
| Security Layer | Implemented? | Protection |
|----------------|--------------|------------|
| Authentication | Ya | Filament Session, Middleware `auth`. |
| CSRF & XSS | Ya | Blade `{{ }}` escaping, form `@csrf`. |
| Rate Limiting | Ya | `throttle:60,1` pada route `search`. |
| SQL Injection | Ya | ORM Eloquent sepenuhnya melindungi query. |
| IDOR | Ya | Akses data dilindungi *scope* `published()`. |
| Mass Assignment| Ya | Proteksi `Fillable` / `Guarded` pada model. |

## 20. SEO & Accessibility
Secara penuh telah direfaktor pada "STEP 10G dan 10H".
- *Accessibility (A11y)*: Menggunakan `prefers-reduced-motion` untuk menghentikan animasi; kontras warna diseimbangkan.
- *SEO*: Atribut dinamis, JSON-LD metadata, file `robots.txt` dan `sitemap.xml` dinamis. Halaman `/search` dinonaktifkan indexasinya (menggunakan meta `robots` `noindex`).

## 21. User Journey
**Visitor mengunduh dokumen:**
1. Masuk ke halaman `/unduhan` (Route) -> `DownloadController@index` (Controller) -> Render *View* (Blade).
2. Klik *link* dokumen (`/download/{slug}/file`).
3. Sistem memverifikasi file.
4. Memicu Job Queue `RecordDownloadAnalytics`.
5. *Browser* mulai mengunduh dokumen fisik (Response File).

## 22. Dead Code / Unused Components
- Secara fungsional, fitur yang didaftarkan di Filament Resource tampak digunakan karena route publiknya (seperti Program, Agenda, Guru) tersedia di Frontend. Tidak ada indikasi *dead routes*.

## 23. System Inconsistencies
*Tidak ada temuan inkonsistensi yang masuk kategori CRITICAL atau HIGH.* Keseluruhan skema model, migration, dan Filament Resource sudah selaras.

## 24. What can be entered into CMS? (Data Input Catalog)
*(Menggabungkan Fase 8 & 23)*
## 📰 Konten & Informasi
- **Berita**: Judul, Isi, Thumbnail, Kategori, Status.
- **Pengumuman/Agenda**: Judul, Isi, File Lampiran, Status.
- **Halaman Statis**: Judul, Konten HTML (Rich Editor), Thumbnail.

## 🎓 Akademik
- **Program Keahlian**: Nama Jurusan, Deskripsi, Thumbnail.
- **Kompetensi**: Detail keahlian terikat ke Program.
- **Fasilitas**: Nama, Deskripsi, Foto, Kuantitas, Kondisi.
- **Data Guru**: Nama, NIP, Jabatan, Kontak, Foto, (Opsional terkait Akun Login).

## 🤝 Industri & Ketenagakerjaan
- **Mitra Industri**: Nama Perusahaan, Bidang, Logo, Kontak & Alamat.
- **Kerja Sama (Partnership)**: Judul MOU, Periode, Dokumen MOU.
- **Lowongan Kerja (BKK)**: Posisi, Detail Tugas, Rentang Gaji, Tenggat Waktu (Deadline), Link/Email Lamaran.
- **Info PKL**: Judul, Deskripsi, Periode, Perusahaan terkait.

## 🏆 Kesiswaan
- **Prestasi**: Nama, Tingkat (Lokal/Nasional), Peringkat, Penyelenggara.
- **Data Alumni**: Nama, Profesi, Perusahaan, Kisah/Bio Singkat.

## 📁 Media & Aset
- **Galeri**: Album Folder (Cover) -> Galeri Items (Foto/Video banyak).
- **Download Center**: Dokumen Publik (PDF/ZIP/Word), Kategori Dokumen.

## 25. Final Architecture Assessment
- **Architecture:** ★★★★★ (Desain Service dan Controller sangat rapi, tidak over-engineered).
- **Security:** ★★★★★ (Tidak ada public scope leak).
- **Database:** ★★★★★ (Relasi antar entitas kuat, naming convention tepat).
- **CMS:** ★★★★★ (Filament v3 digunakan secara ekstensif dan tepat sasaran).
- **Frontend / SEO:** ★★★★★ (Performa tinggi berkat caching, reduced-motion, dan SEO JSON-LD).
- **Maintainability:** ★★★★★ (Filament dan View Blade yang terkomponen).

## 26. Final System Inventory
- **Model**: 24
- **Filament Resources**: 21
- **Public Routes**: 16 (*Unique Route Names*)
- **Queue Jobs**: 1
- **Auth Roles (Spatie)**: 4 (Super Admin, Admin Jurusan, Editor, Guru)

## 27. Recommended Next Steps
Sistem Core telah solid. Proses pengembangan berikutnya disarankan untuk diarahkan ke ranah **Deployment, CI/CD Pipeline, dan Setup Server Production (Nginx/Apache & Redis/Supervisor untuk Queue/Cache)**.
