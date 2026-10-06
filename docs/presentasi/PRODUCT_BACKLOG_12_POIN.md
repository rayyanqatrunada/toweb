# DOKUMEN PRODUCT BACKLOG LENGKAP (12 POIN UTAMA)
## SISTEM INFORMASI VOKASI & BURSA KERJA KHUSUS (BKK) TBSM SMKN 1 BANGSRI
### Kemitraan Industri: Binaan Resmi PT Astra Honda Motor (AHM)
### Metodologi: Agile Scrum Framework

---

## Ringkasan Distribusi Backlog (12 Poin)

| ID Backlog | Modul / Fitur | Prioritas (MoSCoW) | Estimasi (Story Points) | Status |
| :---: | :--- | :---: | :---: | :---: |
| **PB-01** | Beranda Interaktif & Landing Page Vokasi | Must Have (P0) | 8 SP | **Done** |
| **PB-02** | Profil Jurusan & Budaya Industri 5R / K3LH | Must Have (P0) | 5 SP | **Done** |
| **PB-03** | Kurikulum Vokasi AMTC & Direktori Pendidik | Must Have (P0) | 5 SP | **Done** |
| **PB-04** | Showcase Fasilitas Bengkel Standar AHASS | Must Have (P0) | 8 SP | **Done** |
| **PB-05** | Arsip Prestasi Siswa & Kejuaraan LKS | Should Have (P1) | 5 SP | **Done** |
| **PB-06** | Kemitraan DU/DI & Informasi Program PKL | Should Have (P1) | 8 SP | **Done** |
| **PB-07** | Portal Bursa Kerja Khusus (BKK) & Loker | Should Have (P1) | 8 SP | **Done** |
| **PB-08** | Tracer Study & Jejak Keterserapan Alumni | Should Have (P1) | 5 SP | **Done** |
| **PB-09** | Portal Warta Berita & Pengumuman Resmi | Should Have (P1) | 5 SP | **Done** |
| **PB-10** | Galeri Kegiatan & Pusat Repositori Unduhan | Should Have (P1) | 5 SP | **Done** |
| **PB-11** | Formulir Kontak Publik & Layanan Aspirasi | Must Have (P0) | 5 SP | **Done** |
| **PB-12** | Panel Administrasi CMS Filament (5 Grup) & Audit Trail | Must Have (P0) | 13 SP | **Done** |

---

## Rincian Lengkap 12 Product Backlog (PB-01 s.d. PB-12)

---

### PB-01: Beranda Interaktif & Landing Page Vokasi TBSM
* **Kode Backlog:** `PB-01`
* **Kategori Modul:** Frontend / Public Landing Page
* **Prioritas:** **Must Have (P0)**
* **User Story:**  
  > *"Sebagai calon siswa baru atau orang tua, saya ingin mengakses halaman beranda interaktif yang menampilkan hero banner, statistik keunggulan 70% praktik, lab AHASS, dan FAQ ringkas agar saya mendapatkan gambaran utuh tentang mutu pendidikan TBSM SMKN 1 Bangsri dalam satu kali kunjungan."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Hero section menampilkan slider foto bengkel dinamis dengan headline resmi dan tombol CTA langsung (*Jelajahi* & *Kurikulum*).
  2. Kartu 4 pilar keunggulan (Praktik 70%, Kompetensi Menyeluruh, Koneksi Industri AHM, Kesiapan Kerja) tampil jelas.
  3. Bagian FAQ disajikan dalam bentuk akordeon interaktif yang **compact dan ringkas** (tidak memakan ruang vertikal berlebih pada resolusi laptop skala 125%).
  4. Quick preview fasilitas unggulan, warta terkini, dan lowongan kerja tampil terintegrasi.
* **Implementasi Teknis:**
  * Rute: `GET /` (`HomeController@index`)
  * View: `resources/views/frontend/home.blade.php`
  * Model Terkait: `Setting`, `Post`, `Facility`, `JobVacancy`, `Faq`

---

### PB-02: Profil Jurusan & Budaya Industri 5R / K3LH
* **Kode Backlog:** `PB-02`
* **Kategori Modul:** Akademik & Institusi
* **Prioritas:** **Must Have (P0)**
* **User Story:**  
  > *"Sebagai pengunjung website, saya ingin membaca profil resmi jurusan, visi, misi, filosofi Satu Hati AHM, struktur organisasi, dan penanaman budaya 5R/K3LH agar saya memahami landasan disiplin dan kualitas lulusan TBSM."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/tentang` memuat narasi sejarah pendirian jurusan TBSM sejak tahun 2011 dan status binaan resmi PT Astra Honda Motor sejak 2016.
  2. Visi dan Misi kejuruan dipaparkan dengan tipografi tegas dan mudah dipindai (*scannable*).
  3. Menampilkan penanaman 5 Prinsip Kerja Industri Jepang (Ringkas, Rapi, Resik, Rawat, Rajin) dan Standar Keselamatan Kerja K3LH.
  4. Kutipan sambutan Kepala Konsentrasi Keahlian tampil profesional dengan foto profil resmi.
* **Implementasi Teknis:**
  * Rute: `GET /tentang` (`HomeController@about`)
  * View: `resources/views/frontend/about.blade.php`
  * Model Terkait: `Setting`, `Teacher`

---

### PB-03: Kurikulum Vokasi AMTC Honda & Direktori Pendidik
* **Kode Backlog:** `PB-03`
* **Kategori Modul:** Kurikulum & Ketenagaan
* **Prioritas:** **Must Have (P0)**
* **User Story:**  
  > *"Sebagai siswa dan wali murid, saya ingin melihat kurikulum sinkronisasi Astra Motor Technical Center (AMTC) serta direktori guru pengampu agar mengetahui kompetensi teknis yang diajarkan dan kualifikasi sertifikasi para pengajar."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/akademik/program` memaparkan modul kejuruan berbasis Kurikulum Merdeka & AMTC (Mesin EFI, Sasis, Kelistrikan, Manajemen Bengkel).
  2. Halaman `/akademik/guru` menampilkan daftar guru kejuruan dan instruktur lengkap dengan NIP, jabatan, dan sertifikasi keahlian (BNSP / AHM Gold-Silver Instructor).
  3. Terdapat indikator modul kompetensi terstruktur per tingkat kelas (X, XI, XII).
* **Implementasi Teknis:**
  * Rute: `GET /akademik/program` (`AcademicController@programs`), `GET /akademik/guru` (`AcademicController@teachers`)
  * View: `resources/views/frontend/academic/programs.blade.php`, `resources/views/frontend/academic/teachers.blade.php`
  * Model Terkait: `Program`, `Competency`, `Teacher`

---

### PB-04: Showcase Fasilitas Bengkel Standar Resmi AHASS
* **Kode Backlog:** `PB-04`
* **Kategori Modul:** Infrastruktur & Sarana Prasarana
* **Prioritas:** **Must Have (P0)**
* **User Story:**  
  > *"Sebagai mitra industri, asesor, atau masyarakat, saya ingin melihat fasilitas bengkel praktik sekolah berstandar AHASS (Astra Honda Authorized Service Station) agar dapat memverifikasi kesiapan sarana pengujian dan pembelajaran praktik."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Menampilkan 6 unit Bike Lift hidrolik, Unit Pit Servis, Pos Teaching Factory (TeFa), dan Ruang Engine Overhaul.
  2. Menyajikan daftar peralatan presisi: Special Service Tools (SST), Fuel Injection Cleaner & Tester, Gas Analyzer, dan Komputer Scanner PGM-FI HIDS.
  3. Dilengkapi filter kategori peralatan (Pit Servis, Unit Mesin, Kelistrikan, Special Tools).
  4. Menampilkan informasi operasional Pos Servis TBSM untuk masyarakat umum (jam operasional dan SOP servis).
* **Implementasi Teknis:**
  * Rute: `GET /akademik/fasilitas` (`AcademicController@facilities`)
  * View: `resources/views/frontend/academic/facilities.blade.php`
  * Model Terkait: `Facility`, `Setting`

---

### PB-05: Arsip Prestasi Siswa & Kejuaraan LKS
* **Kode Backlog:** `PB-05`
* **Kategori Modul:** Kesiswaan & Prestasi
* **Prioritas:** **Should Have (P1)**
* **User Story:**  
  > *"Sebagai peserta didik dan masyarakat luas, saya ingin melihat galeri medali dan prestasi kejuaraan otomotif yang diraih siswa TBSM agar mengetahui rekam jejak kompetitif sekolah di tingkat daerah hingga nasional."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/prestasi` menyajikan rekap perolehan juara pada ajang LKS SMK Otomotif, Safety Riding Contest Astra Honda, dan perlombaan teknis lainnya.
  2. Menyajikan badge tingkat kejuaraan (Kabupaten, Karesidenan, Provinsi, Nasional) dengan tahun perolehan yang jelas.
  3. Memiliki halaman detail (`/prestasi/{slug}`) yang menceritakan latar belakang kompetisi, nama peraih medali, dan dokumentasi piala kejuaraan.
* **Implementasi Teknis:**
  * Rute: `GET /prestasi` (`AchievementController@index`), `GET /prestasi/{slug}` (`AchievementController@show`)
  * View: `resources/views/frontend/achievements/index.blade.php`, `resources/views/frontend/achievements/show.blade.php`
  * Model Terkait: `Achievement`, `AchievementParticipant`, `Student`

---

### PB-06: Kemitraan DU/DI & Informasi Program PKL 6 Bulan
* **Kode Backlog:** `PB-06`
* **Kategori Modul:** Hubungan Industri (Hubin) & PKL
* **Prioritas:** **Should Have (P1)**
* **User Story:**  
  > *"Sebagai siswa kelas XI dan orang tua, saya ingin melihat daftar jaringan bengkel resmi AHASS rekanan dan prosedur penempatan Praktik Kerja Lapangan (PKL) agar kami memahami mekanisme magang industri selama 6 bulan."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/mitra-industri` menampilkan profil kemitraan strategis dengan PT Astra Honda Motor dan puluhan bengkel AHASS rekanan di Jepara dan sekitarnya.
  2. Halaman `/pkl` memaparkan alur penempatan PKL: pembekalan sekolah, keberangkatan industri, monitoring guru pembimbing, hingga ujian sertifikasi bengkel.
  3. Terdapat detail kuota peserta, durasi magang (6 bulan), dan profil bengkel mitra penerima peserta PKL.
* **Implementasi Teknis:**
  * Rute: `GET /mitra-industri` (`PartnershipController@index`), `GET /pkl` (`InternshipController@index`), `GET /pkl/{id}` (`InternshipController@show`)
  * View: `resources/views/frontend/partnership/index.blade.php`, `resources/views/frontend/internships/index.blade.php`
  * Model Terkait: `IndustryPartner`, `IndustryPartnerBranch`, `Internship`, `InternshipParticipant`

---

### PB-07: Portal Bursa Kerja Khusus (BKK) & Info Lowongan Kerja
* **Kode Backlog:** `PB-07`
* **Kategori Modul:** Karir & Ketenagakerjaan
* **Prioritas:** **Should Have (P1)**
* **User Story:**  
  > *"Sebagai alumni atau siswa tingkat akhir, saya ingin mencari informasi lowongan kerja terbaru di jaringan bengkel resmi dan industri otomotif agar saya dapat segera melamar pekerjaan sesuai kompetensi keahlian saya."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/lowongan` menampilkan kartu loker aktif (Teknisi AHASS, Service Advisor, Operator Perakitan, Front Desk) dengan badge tipe kerja (*Full-time, Kontrak*).
  2. Dilengkapi batas waktu lamaran (*deadline*), nama perusahaan penyedia, lokasi penempatan, dan rentang estimasi gaji/benefit.
  3. Halaman detail `/lowongan/{slug}` menyajikan rincian persyaratan berkas, deskripsi tugas, dan tombol direct kontak pendaftaran.
* **Implementasi Teknis:**
  * Rute: `GET /lowongan` (`JobController@index`), `GET /lowongan/{slug}` (`JobController@show`)
  * View: `resources/views/frontend/jobs/index.blade.php`, `resources/views/frontend/jobs/show.blade.php`
  * Model Terkait: `JobVacancy`, `IndustryPartner`

---

### PB-08: Tracer Study & Jejak Keterserapan Alumni (BMW)
* **Kode Backlog:** `PB-08`
* **Kategori Modul:** Alumni & Penelusuran Lulusan
* **Prioritas:** **Should Have (P1)**
* **User Story:**  
  > *"Sebagai pihak pengelola sekolah dan calon siswa, saya ingin melihat statistik keterserapan lulusan TBSM (Bekerja, Melanjutkan studi, atau Wirausaha mandiri) serta kisah sukses alumni agar menjadi tolak ukur keberhasilan vokasi."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/alumni` menampilkan rekap persentase BMW (Bekerja di AHASS/Manufaktur, Melanjutkan ke Politeknik/PTN, Membuka Bengkel Mandiri).
  2. Menampilkan kartu profil alumni unggulan (*featured alumni*) dengan foto, tahun kelulusan, jabatan, dan tempat kerja saat ini.
  3. Halaman detail `/alumni/{slug}` memuat narasi testimoni dan perjalanan karir alumni setelah menempuh pendidikan di TBSM SMKN 1 Bangsri.
* **Implementasi Teknis:**
  * Rute: `GET /alumni` (`AlumniController@index`), `GET /alumni/{slug}` (`AlumniController@show`)
  * View: `resources/views/frontend/alumni/index.blade.php`, `resources/views/frontend/alumni/show.blade.php`
  * Model Terkait: `Alumni`

---

### PB-09: Portal Warta Berita & Pengumuman Resmi Sekolah
* **Kode Backlog:** `PB-09`
* **Kategori Modul:** Publikasi & Media Informasi
* **Prioritas:** **Should Have (P1)**
* **User Story:**  
  > *"Sebagai civitas akademika dan masyarakat umum, saya ingin membaca publikasi berita kegiatan dan agenda pengumuman resmi sekolah agar tetap mendapatkan informasi terverifikasi dan terkini."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/berita` menampilkan artikel warta dengan filter kategori, pagination, thumbnail berkualitas, dan penanda tanggal rilis.
  2. Halaman `/pengumuman` memuat agenda resmi institusi (seperti jadwal Uji Kompetensi Keahlian Mandiri AHM).
  3. Memiliki fitur pencarian instan kata kunci (`/cari?q=...`) yang mengindeks artikel, modul, dan pengumuman.
  4. Halaman baca artikel `/berita/{slug}` terbebas dari lag, responsif, dan menyajikan rekomendasi artikel terkait.
* **Implementasi Teknis:**
  * Rute: `GET /berita`, `GET /berita/{slug}`, `GET /pengumuman`, `GET /pengumuman/{slug}`, `GET /cari`
  * Controller: `NewsController`, `SearchController`
  * Model Terkait: `Post`, `Category`, `Tag`, `Announcement`

---

### PB-10: Galeri Dokumentasi Kegiatan & Pusat Repositori Unduhan
* **Kode Backlog:** `PB-10`
* **Kategori Modul:** Dokumentasi & Arsip Digital
* **Prioritas:** **Should Have (P1)**
* **User Story:**  
  > *"Sebagai siswa dan guru, saya ingin melihat dokumentasi foto kegiatan praktik serta mengunduh dokumen silabus, jurnal harian PKL, dan SOP bengkel dengan cepat dan aman."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/galeri` mengelompokkan dokumentasi foto ke dalam album kegiatan (kunjungan industri, servis gratis tefa, lomba LKS).
  2. Halaman album `/galeri/{slug}` menyajikan galeri foto dengan grid responsif dan lightbox interaktif.
  3. Halaman `/unduhan` menampilkan repositori berkas PDF/DOCX yang dikelompokkan berdasarkan kategori (Kurikulum, Panduan PKL, SOP K3LH).
  4. Pengunduhan berkas tercatat secara otomatis pada database counter (`download_count`) tanpa tautan rusak (*broken link*).
* **Implementasi Teknis:**
  * Rute: `GET /galeri`, `GET /galeri/{slug}`, `GET /unduhan`, `GET /download/{slug}/file`
  * Controller: `GalleryController`, `DownloadController`
  * Model Terkait: `GalleryAlbum`, `GalleryItem`, `Download`, `DownloadCategory`

---

### PB-11: Formulir Kontak Publik, Peta Lokasi & Layanan Aspirasi
* **Kode Backlog:** `PB-11`
* **Kategori Modul:** Layanan Kontak & Aspirasi
* **Prioritas:** **Must Have (P0)**
* **User Story:**  
  > *"Sebagai masyarakat, calon siswa, atau wali murid, saya ingin dapat mengirimkan pesan pertanyaan, kritik, atau aspirasi melalui formulir kontak online serta melihat lokasi bengkel sekolah di peta Google Maps."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Halaman `/kontak` menyediakan informasi alamat lengkap SMKN 1 Bangsri, nomor telepon bengkel, email resmi, dan tautan media sosial.
  2. Formulir pesan kontak memvalidasi kelengkapan nama, email valid, subjek, dan pesan minimal 10 karakter.
  3. Dilengkapi sistem proteksi keamanan: Token CSRF dan pembatasan frekuensi pengiriman (*Rate Limiting Throttle: 5 pengiriman per menit*).
  4. Pesan yang berhasil dikirim otomatis tersimpan di tabel basis data `contact_messages` dan memicu badge notifikasi pesan baru di panel admin.
* **Implementasi Teknis:**
  * Rute: `GET /kontak`, `POST /kontak` (`ContactController@index`, `ContactController@store`)
  * Form Request: `App\Http\Requests\ContactRequest`
  * Model Terkait: `ContactMessage`, `Setting`

---

### PB-12: Panel Administrasi CMS Filament (5 Grup) & Audit Trail
* **Kode Backlog:** `PB-12`
* **Kategori Modul:** Backend CMS & Keamanan Sistem
* **Prioritas:** **Must Have (P0)**
* **User Story:**  
  > *"Sebagai administrator dan tim pengelola website, saya ingin memiliki panel administrasi terpadu berbasis Filament v3 dengan menu ringkas (5 grup navigasi), otentikasi aman, dan audit log agar pemeliharaan seluruh konten website berjalan efisien dan terpantau keamanannya."*
* **Kriteria Keberhasilan (Acceptance Criteria):**
  1. Autentikasi panel admin aman dengan hash password Bcrypt dan session timeout.
  2. Menu admin ditata ringkas ke dalam **5 Grup Navigasi Logis**:
     * 📁 **Pengaturan Halaman**: Konfigurasi Site, Hero Slide, FAQ, Visi Misi, Tim Jurusan, Social Links.
     * 📚 **Akademik & Sarana**: Program Keahlian, Guru & Tendik, Sarana Fasilitas Bengkel.
     * 🤝 **Kemitraan & Karir**: Mitra Industri AHASS, Cabang Bengkel, Program PKL, Lowongan Kerja BKK, Alumni Tracer.
     * 📰 **Publikasi & Media**: Berita & Artikel, Pengumuman, Galeri Foto, Repositori Berkas.
     * 🛠️ **Layanan & Sistem**: Pesan Kontak Masuk, Manajemen Pengguna Admin, Audit Activity Log.
  3. Setiap aksi penambahan, perubahan, dan penghapusan data tercatat otomatis pada tabel `activity_log` (*causer, event, subject, timestamp*).
  4. Penyimpanan berkas foto dan dokumen terproteksi serta mengadopsi trait pembersihan berkas otomatis (*clean up files*).
* **Implementasi Teknis:**
  * Rute: `/admin` (Filament Panel v3)
  * Filament Resources: 20+ Resources terkelompok dalam 5 Navigation Groups
  * Security: Middleware Auth, Spatie Activitylog, `SettingsService`
  * Model Terkait: `User`, `ActivityLog`, `Setting`, seluruh model data master.

---
