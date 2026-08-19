# PHASE K1 — DATABASE DATA VALIDATION UAT

## 1. Rekapitulasi Data (Berdasarkan UAT Script)

- Setting: 14 records (PASS)
- Program: 3 records (PASS)
- Competency: 12 records (PASS)
- Teacher: 6 records (PASS)
- Facility: 8 records (PASS)
- IndustryPartner: 5 records (PASS)
- **Partnership: 0 records (FAIL)**
- **Internship: 0 records (FAIL)**
- **JobVacancy: 0 records (FAIL)**
- **Category: 0 records (FAIL)**
- **Tag: 0 records (FAIL)**
- **Post: 0 records (FAIL)**
- **Announcement: 0 records (FAIL)**
- **Achievement: 0 records (FAIL)**
- **GalleryAlbum: 0 records (FAIL)**
- **GalleryItem: 0 records (FAIL)**
- **Alumni: 0 records (FAIL)**
- **DownloadCategory: 0 records (FAIL)**
- **Download: 0 records (FAIL)**

## 2. Temuan Kritis (CRITICAL FINDING)

Saat UAT Database dilakukan dengan menjalankan ulang command `php artisan db:seed --force`, terlihat bahwa seeder gagal tepat di tengah eksekusi, lebih spesifik pada **`IndustryDataSeeder`**.

**Penyebab (Root Cause):**
Terdapat kesalahan *type casting* enum di `IndustryDataSeeder.php`. 
Field `type` pada model `Partnership` didefinisikan dengan *enum* `('mou','internship','recruitment')`, tetapi Seeder mencoba memasukkan nilai string seperti `'Penyaluran Lulusan'`, `'Tempat PKL'`, dan `'Guru Tamu'`.
Field `status` pada model `Partnership` didefinisikan dengan *enum* `('active','expired','terminated')`, tetapi Seeder mencoba memasukkan `'completed'`.

**Dampak:**
Sebuah `QueryException` tertrigger (`Data truncated for column 'type'`), yang menyebabkan `DatabaseSeeder.php` mengalami *abort* (berhenti seketika). Alhasil, 5 file Seeder yang mengantre di belakangnya tidak tereksekusi sama sekali, menghasilkan database dengan record berjumlah **0 (Nol)** untuk entitas-entitas krusial seperti Berita, Galeri, Lowongan, Alumni, dan Unduhan.

## 3. Foreign Key & Atribut Lanjutan
Karena 13 tabel masih kosong (Nol record), validasi *foreign key* tidak dapat dilakukan untuk tabel-tabel tersebut. 
Untuk tabel `Teacher`, logika `is_active` dan `is_head_of_department` diverifikasi valid (berjumlah 6 dan 1 berturut-turut).
Untuk tabel `Setting`, konfigurasi telah masuk dengan utuh.

**KESIMPULAN UAT K1:** 
**FAIL (CRITICAL).** Data seeder perlu diperbaiki agar UI / Frontend UAT dapat memiliki data demo (*mock data*) yang representatif, bukannya halaman kosong (*empty state*).
