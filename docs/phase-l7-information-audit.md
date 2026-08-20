# PHASE L7.0 — INFORMATION & DOWNLOAD DOMAIN AUDIT

## 1. Executive Summary

Audit komprehensif telah dilakukan terhadap Information & Download Domain yang mencakup Pengumuman (Announcements), Lowongan Pekerjaan (Job Vacancies), Praktik Kerja Lapangan (Internships), dan Unduhan (Downloads). Secara keseluruhan, fondasi data dan controller sudah sangat baik, termasuk relasi database dan _eager loading_ yang efisien. Namun, ditemukan beberapa inkonsistensi antara _frontend view_ dengan skema database aktual (terutama pada domain PKL), serta masalah operasional di mana rute unduhan (download) yang dilengkapi fitur analitik tidak digunakan pada antarmuka publik (bypass).

## 2. Route Inventory

| Domain | Route | Controller | View | Index | Detail | Status |
|--------|-------|------------|------|-------|--------|--------|
| Announcements | `/pengumuman` | `NewsController` | `announcements.index` | Yes | Yes | Exists |
| Announcements | `/pengumuman/{slug}` | `NewsController` | `announcements.show` | Yes | Yes | Exists |
| Job Vacancies | `/lowongan` | `JobController` | `jobs.index` | Yes | Yes | Exists |
| Job Vacancies | `/lowongan/{slug}`| `JobController` | `jobs.show` | Yes | Yes | Exists |
| Internships | `/pkl` | `InternshipController`| `internships.index` | Yes | Yes | Exists |
| Internships | `/pkl/{id}` | `InternshipController`| `internships.show` | Yes | Yes | Exists |
| Downloads | `/unduhan` | `DownloadController`| `download` | Yes | No | Exists |
| Downloads | `/download/{slug}/file`| `DownloadController`| (Binary Response) | - | - | Exists |

## 3. Controller Audit

- **`NewsController@announcements`**: Menggunakan `Announcement::active()->latest()->paginate(10)`. Bersih dan efisien.
- **`JobController@index` & `show`**: Memanggil `JobVacancy::with('industryPartner')->published()`. Eager loading sudah diimplementasikan dengan benar.
- **`InternshipController@index` & `show`**: Memanggil `Internship::with('industryPartner')->published()`. Menggunakan parameter `id` untuk detail (`show`) karena model ini tidak memiliki `slug`.
- **`DownloadController@index`**: Memanggil `Download::with('category')->public()->latest('published_at')->get()`. Berjalan normal namun berpotensi membebani memori jika jumlah data sangat besar (karena menggunakan `get()` alih-alih `paginate()`).
- **`DownloadController@download`**: Menangani permintaan unduhan dengan aman (memverifikasi keberadaan file, menolak file non-publik, dan mencatat `RecordDownloadAnalytics`).

## 4. Model/Data Contract Audit

- **`Announcement`**: `title`, `slug`, `content`, `file_attachment`, `is_active`.
- **`JobVacancy`**: Berelasi dengan `IndustryPartner`. Memiliki field yang lengkap untuk karir: `position`, `requirements`, `responsibilities`, `location`, `work_type`, `employment_type`, dsb. Mekanisme publisitas menggunakan kombinasi `status` dan `published_at`.
- **`Internship`**: Memiliki field `title`, `start_date`, `end_date`, `status`, `description`. **Temuan Penting:** Model ini **tidak** memiliki field `location` dan `quota`.
- **`Download`**: Lengkap dengan file metadata seperti `file_size`, `file_type`, dan `download_count`. Terdapat `is_public` boolean. 

## 5. View Audit

- **`announcements.index` & `show`**: Memiliki *UI block* generik yang mirip "blog", belum selaras dengan identitas "Modern Automotive Technical Institution".
- **`jobs.index` & `show`**: Menggunakan palet `bg-slate-900` standar. Card layout terlihat seperti marketplace pekerja, belum merepresentasikan *career center* sebuah institusi vokasi yang terintegrasi.
- **`internships.index` & `show`**: Terdapat upaya pemanggilan field `$internship->location` dan `$internship->quota` menggunakan `??` operator, namun karena field ini secara harfiah tidak ada di database, data selalu mem-fallback ke nilai statis.
- **`download.blade.php`**: Berbentuk tabel konvensional. Tombol unduh menggunakan referensi langsung ke `Storage::url($doc->file_path)` sehingga melewati kontrol analitik.

## 6. Filament/CMS Audit

Struktur *backend* yang di-deploy pada Phase D dan E sudah stabil. Sinkronisasi data di antara tabel-tabel ini (terutama flag `status` dan `published_at`) telah menangani kontrol visibilitas secara efektif.

## 7. Security Audit

- **Privacy PKL**: Data `InternshipParticipant` (peserta PKL) tidak terekspos ke publik (Frontend tidak menampilkannya), yang mana sudah tepat sesuai prinsip keamanan data (PII).
- **File Access**: Rute `/download/{slug}/file` mengamankan file dengan memverifikasi properti `is_public`. Namun, tautan pada Frontend saat ini memberikan *direct storage access* ke publik, sehingga berpotensi mengekspos file tanpa kontrol penuh di Controller jika path diketahui.

## 8. Performance Audit

- **N+1 Query**: Tidak ditemukan N+1 query. Seluruh pemanggilan Controller (kecuali Announcement yang tidak memiliki relasi eksternal kompleks) telah menggunakan `with()`.
- **Pagination**: Domain `Downloads` mengambil seluruh data tanpa paginasi.

## 9. SEO Audit

Metadata eksplisit belum diterapkan secara merata di halaman seperti Jobs dan Announcements (contoh: JSON-LD untuk `JobPosting`).

## 10. Design System Audit

- Mayoritas *view* menggunakan komponen generik HTML statis dan *styling* `slate-900`. 
- Belum memanfaatkan `x-frontend.ui.*` komponen dari Phase L1 sepenuhnya.
- Tampilan harus ditarik ke dalam skema *charcoal*, *red*, dan *amber* (khusus BKK).

## 11. Mobile UX Audit

Tabel unduhan pada *mobile* hanya bergeser (`overflow-x-auto`), mengurangi *usability*. Detail lowongan kerja dan pengumuman di perangkat seluler terasa padat dan tidak memiliki jarak pandang vertikal yang optimal.

## 12. Findings

| ID | Domain | Severity | Title | Description | Recommendation | Fix Before Redesign |
|---|---|---|---|---|---|---|
| F-01 | Downloads | **HIGH** | Analytics Bypass | Frontend view `download.blade.php` merender URL langsung ke `Storage::url()`, melewati rute `download.file` yang berfungsi menjalankan Job Analytics. | Ubah href menjadi `route('download.file', $doc->slug)` | Ya (Saat Redesign) |
| F-02 | Internships | **MEDIUM** | Non-existent Field Access | View PKL mencoba menampilkan `location` dan `quota` yang tidak ada di skema database. | Hapus atau sesuaikan informasi UI dengan field yang benar-benar ada (`description`, `start_date`, `end_date`). | Ya (Saat Redesign) |
| F-03 | Downloads | **MEDIUM** | Missing Pagination | `DownloadController` menggunakan `get()` untuk seluruh tabel. | Ubah ke `paginate(15)` dan perbarui view. | Ya (Saat Redesign) |
| F-04 | All Domains | **LOW** | Generic Visual Aesthetics | Desain halaman Information masih generik dan tidak sejalan dengan Phase L3 Homepage. | Lakukan remastering visual menggunakan komponen L1. | Ya (Fokus Phase L7) |

## 13. Risk Assessment

Tidak ada isu berisiko kritis (Critical) yang akan merusak database atau privasi siswa secara fatal. Operasi *redesign* aman untuk dijalankan tanpa harus melakukan migrasi struktur data. F-01 adalah celah teknis (logical flaw) yang bisa langsung diperbaiki saat pembaruan UI.

## 14. Recommended Implementation Sequence

Karena skala desain masing-masing domain cukup independen, implementasi sebaiknya dilakukan berdasarkan alur entitas informasi institusi:
1. Pengumuman (Terkait erat dengan operasional)
2. Lowongan & PKL (Pusat Karir / BKK)
3. Pusat Unduhan (Resource File)
