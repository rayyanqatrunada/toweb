# PHASE H — IMPLEMENTATION PLAN

**Date:** 2026-08-18
**Project:** TOWEB — Website Jurusan Teknik Otomotif

Berdasarkan `phase-h-full-system-audit.md`, kami mengidentifikasi dua masalah utama yang harus diselesaikan untuk mencapai status **Production Ready 100%**.

## OPEN QUESTIONS / USER REVIEW REQUIRED

> [!WARNING]
> **F-02 Security (XSS via Settings/RichEditor)**
> Saat ini, `{!! $settings->get('profile_history') !!}` merender HTML langsung tanpa disanitasi. Karena Admin adalah satu-satunya role yang ada, risiko serangan dari pihak luar sangat kecil. Namun jika akun Admin diretas, XSS dapat terjadi.
> **Pertanyaan:** Apakah Anda ingin mengimplementasikan paket `mews/purifier` untuk menyaring HTML, atau membiarkannya saja karena Admin dianggap sebagai "Trusted User" (seperti halnya WordPress)?

## PROPOSED CHANGES

### 1. Storage Orphan Cleanup (F-01)
*Deskripsi*: File fisik yang diunggah harus dihapus secara otomatis saat entitas terkait dihapus dari database.
*Pendekatan*: Kami akan menggunakan event Eloquent `deleting` observer pada model yang menggunakan gambar.

#### [MODIFY] `app/Models/Achievement.php`
- Menambahkan hook `deleting` untuk `Storage::disk('public')->delete($model->photo)`.

#### [MODIFY] `app/Models/Alumni.php`
- Menambahkan hook `deleting` untuk file `photo`.

#### [MODIFY] `app/Models/Download.php`
- Menambahkan hook `deleting` untuk file `file_path`.

#### [MODIFY] `app/Models/GalleryItem.php`
- Menambahkan hook `deleting` untuk file `file_path`.

#### [MODIFY] `app/Models/IndustryPartner.php`
- Menambahkan hook `deleting` untuk file `logo`.

#### [MODIFY] `app/Models/Post.php`
- Menambahkan hook `deleting` untuk file `thumbnail`.

#### [MODIFY] `app/Models/Program.php`
- Menambahkan hook `deleting` untuk file `thumbnail`.

#### [MODIFY] `app/Models/Teacher.php`
- Menambahkan hook `deleting` untuk file `photo`.

#### [MODIFY] `app/Models/Announcement.php`
- Menambahkan hook `deleting` untuk file `file_attachment`.

### 2. Final Readiness Setup (H21)
Setelah kode model diperbarui:
1. Menjalankan `php artisan test` untuk memastikan hook `deleting` tidak merusak fungsi hapus.
2. Menjalankan skrip `php artisan optimize:clear` dan `php artisan view:cache` untuk environment production.

## VERIFICATION PLAN
- Upload file via Filament ke salah satu modul (misal `GalleryItem`).
- Hapus modul dari Filament.
- Periksa direktori fisik `/public/storage` apakah file masih ada.
- Verifikasi Test Suite PHPUnit tidak gagal pada fitur penghapusan CRUD CMS.
