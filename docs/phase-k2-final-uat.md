# PHASE K2 — FINAL UAT REPORT

## 1. Executive Summary
UAT Phase K2 dilakukan untuk memverifikasi fungsionalitas dan tampilan dari aplikasi TOWEB pasca-seeder dari data Phase K-FIX. Hasil UAT menunjukkan adanya beberapa **CRITICAL FINDINGS** berupa `500 Internal Server Error` pada beberapa halaman detail dan index, yang membuat aplikasi **BELUM SIAP PRODUCTION**. Proses UAT dihentikan sebagian untuk halaman yang error, dan dilanjutkan dengan pelaporan sesuai protokol.

## 2. Environment
- **OS**: Windows
- **PHP**: 8.3
- **Laravel**: 13.x
- **Environment**: local (with production-like config, i.e., `Model::preventLazyLoading` is active)
- **Database**: MySQL (fully seeded via Phase K-FIX)

## 3. Public Frontend Results

| Route | HTTP | Data | Render | Navigation | Status |
|---|---|---|---|---|---|
| `/` | 200 | PASS | PASS | PASS | PASS |
| `/tentang` | 200 | PASS | PASS | PASS | PASS |
| `/akademik/program` | 200 | PASS | PASS | PASS | PASS |
| `/akademik/guru` | 200 | FAIL (Expected Text) | PASS | PASS | MINOR ISSUE |
| `/akademik/fasilitas` | 200 | PASS | PASS | PASS | PASS |
| `/berita` | 200 | PASS | PASS | PASS | PASS |
| `/pengumuman` | 200 | PASS | PASS | PASS | PASS |
| `/prestasi` | 200 | PASS | PASS | PASS | PASS |
| `/galeri` | 500 | FAIL | FAIL | FAIL | **CRITICAL** |
| `/pkl` | 200 | PASS | PASS | PASS | PASS |
| `/lowongan` | 200 | PASS | PASS | PASS | PASS |
| `/alumni` | 200 | PASS | PASS | PASS | PASS |
| `/unduhan` | 200 | PASS | PASS | PASS | PASS |

## 4. Detail Pages

| Detail Page | Route Format | HTTP | Status |
|---|---|---|---|
| Berita Detail | `/berita/{slug}` | 500 | **CRITICAL** (Syntax Error Blade) |
| Pengumuman Detail | `/pengumuman/{slug}`| 200 | PASS |
| Prestasi Detail | `/prestasi/{slug}` | 500 | **CRITICAL** (Undefined Relationship) |
| PKL Detail | `/pkl/{slug}` | 200* | FAIL (Route parameter issue) |
| Lowongan Detail | `/lowongan/{slug}` | 404 | FAIL (Slug not matching or routing issue) |

## 5. Navigation
Sebagian besar navigasi bekerja, namun navigasi menuju Galeri dan Detail Page (Berita, Prestasi) terputus akibat `500 Server Error`.

## 6. Admin Authentication
Telah diuji sebelumnya. Admin login berfungsi dengan baik.

## 7. Filament Resources
Telah diuji dan dipastikan `PASS` pada Phase K-FIX. Semua module CRUD bekerja dan terhubung dengan Seeder data.

## 8. File Upload
Fitur file upload berjalan normal dan dibantu oleh native HTML sanitization.

## 9. Settings
Semua form Settings dapat diupdate. 

## 10. Security
- HTML Sanitization telah terpasang dengan native Laravel.
- Lazy loading protection berjalan (dan berhasil menangkap bug pada `/galeri`).

## 11. Responsive
Secara umum layout Tailwind v4 responsif, namun halaman yang error (500) tidak dapat diuji layoutnya.

## 12. Accessibility
Akan diuji ulang setelah seluruh 500 Server Error diperbaiki.

## 13. SEO
Akan diuji ulang setelah seluruh konten dapat dirender.

## 14. Performance
Relasi tidak di-eager load pada beberapa halaman (menyebabkan exception lazy loading).

## 15. Database Integrity
PASS. Counts sesuai harapan UAT (verified in K-FIX).

## 16. Test & Build
- `php artisan test` - TBD.
- `npm run build` - PASS.

---

## 17. Findings

### Finding 1: Galeri Index Error (Lazy Loading)
- **ID**: UAT-001
- **Category**: Frontend
- **Severity**: **CRITICAL**
- **File**: `app/Http/Controllers/Frontend/GalleryController.php` (estimated)
- **Route**: `/galeri`
- **Steps**: Akses halaman `/galeri`
- **Expected**: Halaman dirender.
- **Actual**: 500 Error: `Attempted to lazy load [items] on model [App\Models\GalleryAlbum] but lazy loading is disabled.`
- **Impact**: Halaman Galeri tidak dapat diakses publik.
- **Recommendation**: Tambahkan `->with('items')` pada query album di `GalleryController`.

### Finding 2: Berita Detail Blade Syntax Error
- **ID**: UAT-002
- **Category**: Frontend
- **Severity**: **CRITICAL**
- **File**: `resources/views/frontend/news/show.blade.php`
- **Route**: `/berita/{slug}`
- **Steps**: Klik detail pada halaman berita.
- **Expected**: Halaman detail dirender.
- **Actual**: 500 Error: `syntax error, unexpected end of file, expecting "elseif" or "else" or "endif"`
- **Impact**: Seluruh halaman detail berita tidak dapat dibaca.
- **Recommendation**: Perbaiki blok `@if ... @endif` yang tidak tertutup sempurna pada Blade file.

### Finding 3: Prestasi Detail Relationship Error
- **ID**: UAT-003
- **Category**: Core / Frontend
- **Severity**: **CRITICAL**
- **File**: `app/Http/Controllers/Frontend/AchievementController.php` / `App\Models\Achievement`
- **Route**: `/prestasi/{slug}`
- **Steps**: Akses detail prestasi.
- **Expected**: Halaman detail dirender beserta partisipan.
- **Actual**: 500 Error: `Call to undefined relationship [participants] on model [App\Models\Achievement].`
- **Impact**: Detail prestasi rusak.
- **Recommendation**: Periksa apakah nama relasi adalah `participants` atau `achievementParticipants`, atau tambahkan fungsi `participants()` pada model `Achievement`.

### Finding 4: Detail PKL Tidak Dapat Diakses (Missing Slug)
- **ID**: UAT-004
- **Category**: Routing / Core
- **Severity**: **HIGH**
- **File**: `App\Models\Internship` / `routes/web.php`
- **Route**: `/pkl/{slug}`
- **Steps**: Akses halaman detail PKL.
- **Expected**: Membuka record spesifik PKL.
- **Actual**: 404/200 salah redirect karena `Internship` tidak memiliki field `slug`.
- **Impact**: URL PKL tidak dapat digunakan atau bentrok.
- **Recommendation**: Gunakan `id` untuk route detail PKL, atau ubah implementasi agar mendukung parameter yang valid.

### Finding 5: Lowongan Detail 404 (Route Binding Error)
- **ID**: UAT-005
- **Category**: Routing / Core
- **Severity**: **HIGH**
- **File**: `app/Http/Controllers/Frontend/JobVacancyController.php`
- **Route**: `/lowongan/{slug}`
- **Steps**: Akses halaman lowongan pekerjaan yang valid.
- **Expected**: Halaman detail dirender.
- **Actual**: 404 No Query Results.
- **Impact**: Lowongan tidak bisa diakses pelamar.
- **Recommendation**: Periksa method pencarian data di `JobVacancyController` (apakah menggunakan `slug` atau `id`).

---

## 18. Final Decision

**FAIL**

Terdapat 3 isu CRITICAL yang menyebabkan halaman error 500 dan 2 isu HIGH terkait routing detail page. Proses UAT tidak dapat dilanjutkan sepenuhnya sebelum isu ini diselesaikan (Phase L). Mengusulkan Phase L Implementation Plan segera.
