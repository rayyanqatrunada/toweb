# PHASE L7.0 — INFORMATION & DOWNLOAD DOMAIN IMPLEMENTATION PLAN

Berdasarkan audit yang dilakukan pada Phase L7.0, berikut adalah rencana eksekusi linier untuk *Information & Download Domain*:

## L7.1 — Announcement Redesign (Archive & Detail)

**Objective**: Mendesain ulang rute `/pengumuman` dan `/pengumuman/{slug}` agar merefleksikan "Institutional Information" yang resmi.
- **Files to Change**: 
  - `resources/views/frontend/announcements/index.blade.php`
  - `resources/views/frontend/announcements/show.blade.php`
- **Data Source**: `Announcement` model.
- **UI Direction**: Bersih, tegas, dengan prioritas tipografi yang kuat (editorial header). Kontras warna tajam antara meta info (tanggal/kategori) dengan *content* utama.
- **DoD**: Tampilan berubah 100% menggunakan token komponen L1, lampiran dapat diunduh jika tersedia, `npm run build` dan `php artisan test` sukses.

## L7.2 — Job Vacancy Redesign (Archive & Detail)

**Objective**: Mengubah rute `/lowongan` dan `/lowongan/{slug}` menjadi pengalaman *Career Center/BKK* spesifik jurusan vokasi.
- **Files to Change**: 
  - `resources/views/frontend/jobs/index.blade.php`
  - `resources/views/frontend/jobs/show.blade.php`
- **Data Source**: `JobVacancy` dengan relasi `IndustryPartner`.
- **UI Direction**: Menggunakan palet `charcoal` sebagai *base* dan merah/amber sebagai indikator interaktif. *Layout* asimetris untuk menonjolkan profil Mitra Industri vs Spesifikasi Pekerjaan.
- **DoD**: Tampilan bebas dari elemen visual generik (meninggalkan `bg-slate-900`), menampilkan *deadline*, *salary* (jika ada), dan *work type* secara terstruktur. Responsif di mobile.

## L7.3 — Internship / PKL Redesign (Archive & Detail)

**Objective**: Menyempurnakan rute `/pkl` dan `/pkl/{id}` agar mengomunikasikan prestise program PKL, sekaligus **menghapus ekspektasi palsu** pada data yang tidak eksis di database (seperti `quota` dan `location`).
- **Files to Change**:
  - `resources/views/frontend/internships/index.blade.php`
  - `resources/views/frontend/internships/show.blade.php`
- **Data Source**: `Internship` dengan relasi `IndustryPartner`. (Abaikan relasi pesertanya demi perlindungan PII).
- **UI Direction**: Fokus pada nama Mitra Industri dan deskripsi kegiatan PKL. 
- **DoD**: Elemen *hardcoded* atau `??` yang tidak memiliki landasan di Model `Internship` dibersihkan sepenuhnya. Desain baru terintegrasi mulus.

## L7.4 — Download / Resource Library Redesign

**Objective**: Merombak rute `/unduhan` menjadi pustaka dokumen yang tangguh dan estetik, serta memperbaiki masalah **Analytics Bypass** (F-01) dan **Missing Pagination** (F-03).
- **Files to Change**:
  - `app/Http/Controllers/Frontend/DownloadController.php` (Fix Pagination: dari `->get()` menjadi `->paginate(15)`)
  - `resources/views/frontend/download.blade.php`
- **Data Source**: `Download` dan `DownloadCategory`.
- **UI Direction**: Beralih dari *data table* HTML primitif ke *list view* bergaya *file-manager* modern dengan ikon MIME type (PDF, DOCX, ZIP) jika memungkinkan, serta indikator *file size*.
- **DoD**: Rute tombol *download* menunjuk ke `route('download.file', $doc->slug)`. Pagination berjalan. Tampilan menggunakan L1 `x-frontend.*` component.

## L7.5 — Information Domain QA & Cross-Page Consistency

**Objective**: Melakukan pengujian sistem secara menyeluruh terhadap performa, SEO, dan responsibilitas halaman-halaman yang disentuh pada L7.1 – L7.4.
- **Action Items**:
  - Audit JSON-LD (*Rich Snippets*) di `announcements/show.blade.php` dan `jobs/show.blade.php`.
  - Verifikasi keamanan URL unduhan menggunakan script UAT.
  - Memastikan *mobile user experience* pada *Resource Library* berjalan nyaman dengan target sentuh *thumb-friendly*.
- **DoD**: 0 error pada server logs, *Zero broken links*, HTTP 200 pada seluruh rute di bawah pengujian UAT.
