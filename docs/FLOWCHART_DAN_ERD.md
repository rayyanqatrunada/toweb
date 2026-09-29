# DOKUMENTASI SISTEM INFORMASI TBSM SMKN 1 BANGSRI
## FLOWCHART SISTEM LENGKAP & ENTITY RELATIONSHIP DIAGRAM (ERD)

**Aplikasi:** TBSM WEB — Sistem Informasi Vokasi & Bursa Kerja Khusus (BKK)  
**Institusi:** Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM) — SMK Negeri 1 Bangsri  
**Kemitraan Industri:** Binaan Resmi PT Astra Honda Motor (AHM)  
**Teknologi:** Laravel 11/12, Filament PHP v3, Tailwind CSS v4, MariaDB 11.x, Alpine.js  

---

## DAFTAR ISI
1. [Pendahuluan & Ruang Lingkup Sistem](#1-pendahuluan--ruang-lingkup-sistem)
2. [Flowchart Pengunjung Publik (User Flowchart)](#2-flowchart-pengunjung-publik-user-flowchart)
   - [2.1 Diagram Alir Mermaid Pengunjung Publik](#21-diagram-alir-mermaid-pengunjung-publik)
   - [2.2 Rincian Alur Navigasi & Interaksi Publik](#22-rincian-alur-navigasi--interaksi-publik)
3. [Flowchart Administrator (Admin Panel Flowchart)](#3-flowchart-administrator-admin-panel-flowchart)
   - [3.1 Diagram Alir Mermaid Administrator](#31-diagram-alir-mermaid-administrator)
   - [3.2 Rincian Alur Pengelolaan & Audit Log](#32-rincian-alur-pengelolaan--audit-log)
4. [Entity Relationship Diagram (ERD) Lengkap](#4-entity-relationship-diagram-erd-lengkap)
   - [4.1 Diagram Konseptual & Fisik Mermaid ERD](#41-diagram-konseptual--fisik-mermaid-erd)
   - [4.2 Matriks Relasi Antar-Entitas & Integritas Kunci Asing](#42-matriks-relasi-antar-entitas--integritas-kunci-asing)
5. [Kamus Data Basis Data (Data Dictionary)](#5-kamus-data-basis-data-data-dictionary)
   - [Tabel 01: users](#tabel-01-users)
   - [Tabel 02: posts](#tabel-02-posts)
   - [Tabel 03: categories](#tabel-03-categories)
   - [Tabel 04: tags](#tabel-04-tags)
   - [Tabel 05: post_tag](#tabel-05-post_tag)
   - [Tabel 06: announcements](#tabel-06-announcements)
   - [Tabel 07: programs](#tabel-07-programs)
   - [Tabel 08: competencies](#tabel-08-competencies)
   - [Tabel 09: teachers](#tabel-09-teachers)
   - [Tabel 10: facilities](#tabel-10-facilities)
   - [Tabel 11: achievements](#tabel-11-achievements)
   - [Tabel 12: achievement_participants](#tabel-12-achievement_participants)
   - [Tabel 13: industry_partners](#tabel-13-industry_partners)
   - [Tabel 14: industry_partner_branches](#tabel-14-industry_partner_branches)
   - [Tabel 15: partnerships](#tabel-15-partnerships)
   - [Tabel 16: internships](#tabel-16-internships)
   - [Tabel 17: internship_participants](#tabel-17-internship_participants)
   - [Tabel 18: job_vacancies](#tabel-18-job_vacancies)
   - [Tabel 19: alumni](#tabel-19-alumni)
   - [Tabel 20: gallery_albums](#tabel-20-gallery_albums)
   - [Tabel 21: gallery_items](#tabel-21-gallery_items)
   - [Tabel 22: download_categories](#tabel-22-download_categories)
   - [Tabel 23: downloads](#tabel-23-downloads)
   - [Tabel 24: contact_messages](#tabel-24-contact_messages)
   - [Tabel 25: settings](#tabel-25-settings)
   - [Tabel 26: activity_log](#tabel-26-activity_log)
6. [Aturan Bisnis (Business Rules) & Penjaminan Integritas](#6-aturan-bisnis-business-rules--penjaminan-integritas)

---

## 1. PENDAHULUAN & RUANG LINGKUP SISTEM

Sistem Informasi TBSM SMKN 1 Bangsri dirancang sebagai portal terpadu berbasis web yang menghubungkan 4 pilar utama:
1. **Calon Siswa & Publik:** Memperoleh informasi profil program keahlian, kurikulum Astra Honda Motor, sarana bengkel AHASS, dan prestasi siswa.
2. **Siswa Aktif & Guru:** Mengakses informasi silabus, profil instruktur bersertifikasi BNSP/AHM, penempatan Praktik Kerja Lapangan (PKL), dan materi modul unduhan.
3. **Alumni & Dunia Industri (DUDI):** Mengakses bursa kerja khusus (BKK), melacak jejak alumni (Tracer Study BMW: Bekerja, Melanjutkan, Wirausaha), dan memperluas kemitraan MoU link-and-match.
4. **Pengelola Sekolah / Admin:** Mengelola seluruh data statis dan dinamis sekolah secara aman melalui Filament PHP v3 Admin Panel yang dilengkapi audit log aktivitas (*Spatie ActivityLog*).

Dokumen ini memuat arsitektur logika alur pengguna (*Flowchart*) dan struktur penyimpanan relasional (*ERD & Data Dictionary*) yang mencerminkan keseluruhan basis data produksi `tbsm_db`.

---

## 2. FLOWCHART PENGUNJUNG PUBLIK (USER FLOWCHART)

### 2.1 Diagram Alir Mermaid Pengunjung Publik

```mermaid
flowchart TD
    Start([Mulai: Pengunjung Mengakses Website]) --> AksesBeranda[Akses Halaman Beranda /]
    
    AksesBeranda --> NavbarInteraksi{Interaksi Navigasi Utama}
    
    %% 1. Beranda & Sub-Navbar
    NavbarInteraksi -->|Hover / Klik Tab Beranda| SubnavCheck{Posisi di Halaman Beranda?}
    SubnavCheck -->|Ya| TampilSubnav[Buka Horizontal Sub-Navbar: 7 Anchor Section]
    TampilSubnav --> PilihAnchor{Pilih Section}
    PilihAnchor -->|01 Profil| ScrollProfil[Scroll Halus ke #section-profile]
    PilihAnchor -->|02 Kurikulum| ScrollKurik[Scroll Halus ke #section-curriculum]
    PilihAnchor -->|03 Bengkel| ScrollBengkel[Scroll Halus ke #section-workshop]
    PilihAnchor -->|04 Mitra DUDI| ScrollMitra[Scroll Halus ke #section-partners]
    PilihAnchor -->|05 Prestasi| ScrollPrestasi[Scroll Halus ke #section-achievements]
    PilihAnchor -->|06 Berita| ScrollBerita[Scroll Halus ke #section-news]
    PilihAnchor -->|07 Instruktur| ScrollGuru[Scroll Halus ke #section-teachers]
    SubnavCheck -->|Tidak| RedirectBeranda[Redirect ke Beranda /]
    
    %% 2. Tentang Kami
    NavbarInteraksi -->|Klik Tentang Kami| PageTentang[Buka Halaman /tentang]
    PageTentang --> LihatProfilTentang[Jelajahi: Sejarah, Visi Misi, Karakter Lulusan, Pimpinan TBSM, Budaya 5S/5R]
    
    %% 3. Akademik
    NavbarInteraksi -->|Pilih Menu Akademik| DropdownAkademik{Pilih Sub-Menu Akademik}
    DropdownAkademik -->|Program Keahlian| PageProgram[Buka /akademik/program]
    PageProgram --> AksiProgram{Pilihan Interaksi Program}
    AksiProgram -->|Klik 'Ringkasan Silabus PDF'| OpenModalSilabus[Buka Modal Ringkasan Silabus: Jam Pelajaran, Materi Pokok, Tombol Download PDF]
    AksiProgram -->|Eksplorasi Kurikulum| TabKurikulum[Eksplorasi Tab Fase E Kelas X, Fase F Kelas XI & XII Magang]
    AksiProgram -->|Pilar & Lisensi| LihatLisensi[Lihat 4 Pilar Kompetensi & Lisensi BNSP/AHM]
    
    DropdownAkademik -->|Dewan Guru| PageGuru[Buka /akademik/guru]
    PageGuru --> LihatDetailGuru[Lihat Profil Guru, NIP, Jabatan, Sertifikasi & Mata Pelajaran Diampu]
    
    DropdownAkademik -->|Fasilitas Bengkel| PageFasilitas[Buka /akademik/fasilitas]
    PageFasilitas --> LihatAlatBengkel[Spesifikasi Alat AHASS: Hydraulic Bike Lift, Scanner HIDS, Kunci Momen & Standar K3]
    
    %% 4. Prestasi
    NavbarInteraksi -->|Klik Prestasi| PagePrestasi[Buka /prestasi]
    PagePrestasi --> FilterPrestasi{Filter Tingkat Lomba}
    FilterPrestasi -->|Semua / Sekolah / Kabupaten / Provinsi / Nasional / Internasional| RenderPrestasi[Tampilkan Grid Kartu Prestasi Terfilter]
    RenderPrestasi --> KlikDetailPrestasi[Pilih Prestasi /prestasi/slug]
    KlikDetailPrestasi --> DetailPrestasiView[Lihat Detail: Juara, Penyelenggara, Sertifikat & Carousel Foto Dokumentasi]
    
    %% 5. Industri & BKK
    NavbarInteraksi -->|Pilih Menu Industri & BKK| DropdownIndustri{Pilih Sub-Menu DUDI}
    DropdownIndustri -->|Mitra Industri| PageMitra[Buka /mitra-industri]
    PageMitra --> DetailMitra[Klik Mitra /mitra-industri/slug: Profil DUDI, Nomor MoU, Daftar Cabang AHASS & Kuota PKL]
    
    DropdownIndustri -->|Lowongan Kerja BKK| PageLoker[Buka /lowongan]
    PageLoker --> FilterLoker{Filter Lowongan: Posisi / Tipe / Gaji}
    FilterLoker --> DetailLoker[Klik Lowongan /lowongan/slug: Syarat Kualifikasi, Benefit, Deadline Lamar]
    DetailLoker --> LamarAction{Aksi Melamar}
    LamarAction -->|Kirim Email| MailtoLink[Buka Mail Client ke application_email]
    LamarAction -->|Form Eksternal| ExtLink[Redirect ke application_url Mitra]
    
    DropdownIndustri -->|Magang PKL Siswa| PagePKL[Buka /pkl]
    PagePKL --> DetailPKL[Klik Penempatan /pkl/id: Informasi Bengkel, Mentor Industri, Daftar Siswa Peserta]
    
    %% 6. Alumni
    NavbarInteraksi -->|Klik Alumni| PageAlumni[Buka /alumni]
    PageAlumni --> FilterAlumni{Filter Tahun Lulus & Status BMW}
    FilterAlumni -->|Bekerja / Melanjutkan / Wirausaha| GridAlumni[Tampilkan Data Tracer Study Terfilter]
    GridAlumni --> DetailAlumni[Buka Profil Alumni /alumni/slug: Jabatan, Perusahaan, Testimoni Sukses]
    
    %% 7. Galeri Media
    NavbarInteraksi -->|Klik Galeri| PageGaleri[Buka /galeri]
    PageGaleri --> PilihAlbum[Pilih Album Kegiatan /galeri/slug]
    PilihAlbum --> LightboxMedia[Buka Lightbox Interaktif Foto & Video Pembelajaran Praktik]
    
    %% 8. Unduhan Berkas
    NavbarInteraksi -->|Klik Unduhan| PageUnduhan[Buka /unduhan]
    PageUnduhan --> FilterKategoriUnduhan{Pilih Kategori Unduhan: Modul / Brosur / Dokumen}
    FilterKategoriUnduhan --> KlikUnduhFile[Klik Tombol Unduh /download/slug/file]
    KlikUnduhFile --> DownloadProcess[Kirim File Binary ke Browser & Increment download_count Otomatis di DB]
    
    %% 9. Kontak
    NavbarInteraksi -->|Klik Kontak| PageKontak[Buka /kontak]
    PageKontak --> InputFormKontak[Pengunjung Mengisi: Nama, Email, Subjek, Pesan]
    InputFormKontak --> SubmitKontak[Klik 'Kirim Pesan']
    SubmitKontak --> ValidasiInputKontak{Validasi Server & Rate Limiter 5 req/min}
    ValidasiInputKontak -->|Gagal / Spam Terdeteksi| WarningError[Tampilkan Flash Message Error / 429 Too Many Requests]
    WarningError --> InputFormKontak
    ValidasiInputKontak -->|Valid| SimpanPesanDB[Simpan ke Tabel contact_messages & Beri Notifikasi Sukses]
    
    %% Terminasi Alur
    SimpanPesanDB --> SelesaiUser([Selesai: Pengunjung Menerima Informasi])
    DownloadProcess --> SelesaiUser
    LightboxMedia --> SelesaiUser
    DetailAlumni --> SelesaiUser
    DetailPrestasiView --> SelesaiUser
    ScrollProfil & ScrollKurik & ScrollBengkel & ScrollMitra & ScrollPrestasi & ScrollBerita & ScrollGuru --> SelesaiUser
```

### 2.2 Rincian Alur Navigasi & Interaksi Publik

1. **Alur Beranda & Horizontal Sub-Navbar:**
   - Pengunjung mengakses URL utama `/`.
   - Komponen Navbar menyajikan navigasi tingkat atas. Saat cursor hover atau klik pada tombol "Beranda", sub-navbar horizontal memuat 7 link section cepat (*01 Profil*, *02 Kurikulum*, *03 Bengkel*, *04 Mitra DUDI*, *05 Prestasi*, *06 Berita*, *07 Instruktur*).
   - Pengunjung mengeklik salah satu section, JavaScript Alpine.js melakukan *smooth scrolling* langsung ke elemen ID target tanpa me-reload halaman.
   - Status pin horizontal sub-navbar dipertahankan dengan mekanisme klik-untuk-mengunci (*click-to-pin*) dan transisi CSS terakselerasi hardware.

2. **Alur Program Akademik & Modal Silabus:**
   - Pengunjung membuka `/akademik/program`.
   - Mengakses tab Kurikulum Fase E (Kelas X: Dasar Otomotif, Gambar Teknik), Fase F (Kelas XI: Pemeliharaan Mesin, Chasis, Kelistrikan Sepeda Motor), dan Fase F (Kelas XII: Troubleshooting Lanjutan & Magang Industri 6 Bulan).
   - Pengunjung dapat menekan tombol **"Ringkasan Silabus PDF"** yang memicu *modal pop-up* berisi alokasi jam pelajaran mingguan, capaian pembelajaran kompetensi inti, serta tautan unduh dokumen silabus format PDF.

3. **Alur Katalog Prestasi & Filter Level:**
   - Pengunjung membuka `/prestasi`.
   - Tersedia tombol filter kategori lomba: *Semua*, *Sekolah*, *Kabupaten*, *Provinsi*, *Nasional*, dan *Internasional*.
   - Saat item prestasi dipilih, sistem merender halaman detail `/prestasi/{slug}` yang menampilkan informasi kejuaraan, nama siswa peserta, penyelenggara lomba, serta *carousel* foto pendukung dokumentasi penyerahan piala/sertifikat.

4. **Alur Kemitraan DUDI, Lowongan Kerja BKK, dan PKL:**
   - Halaman `/mitra-industri` menampilkan daftar partner resmi dengan badge MoU aktif. Mengklik mitra membuka profil DUDI, nomor perjanjian kerjasama, daftar bengkel cabang AHASS terdekat, nomor kontak PIC, serta kuota siswa magang.
   - Portal `/lowongan` menampilkan peluang karir bagi alumni TBSM. Terdapat filter posisi mekanik, service advisor, partman, dan operator manufaktur. Tombol lamar mengarahkan ke form pendaftaran eksternal atau *mailto* resmi HRD.
   - Halaman `/pkl` menampilkan monitoring penempatan siswa pada bengkel mitra, mentor industri yang bertugas, dan status kemajuan magang.

5. **Alur Tracer Study Alumni (Status BMW):**
   - Halaman `/alumni` memuat visualisasi statistik keterserapan lulusan berdasarkan 3 pilar vokasi: **B**ekerja, **M**elanjutkan ke perguruan tinggi, dan **W**irausaha mandiri (BMW).
   - Pengunjung dapat memfilter alumni berdasarkan tahun kelulusan dan status pilar untuk melihat profil sukses dan rekam jejak karir.

6. **Alur Pusat Unduhan (Downloads) & Auto-Counter:**
   - Pengunjung membuka `/unduhan` dan memilih kategori berkas (*Modul Pembelajaran*, *Brosur Sekolah*, *Formulir PKL*).
   - Saat pengunjung menekan tombol unduh pada salah satu item, rute `GET /download/{slug}/file` memproses pengiriman file biner ke browser sekaligus menjalankan query increment atomic `download_count = download_count + 1` di database MariaDB.

7. **Alur Formulir Kontak & Anti-Spam Rate Limiting:**
   - Pengunjung membuka `/kontak`, mengisi form (nama, alamat email, subjek, pesan) lalu menekan tombol kirim.
   - Sistem memeriksa validasi data serta middleware `throttle:5,1` (maksimal 5 kali percobaan per menit per alamat IP).
   - Jika valid, pesan disimpan ke tabel `contact_messages` dengan status default `is_read = 0`, dan sistem memunculkan banner notifikasi sukses kepada pengunjung.

---

## 3. FLOWCHART ADMINISTRATOR (ADMIN PANEL FLOWCHART)

### 3.1 Diagram Alir Mermaid Administrator

```mermaid
flowchart TD
    AdminStart([Mulai: Administrator Mengakses Web]) --> BukaLoginPage[Akses URL /admin/login]
    BukaLoginPage --> InputKredensial[Input Email & Kata Sandi]
    InputKredensial --> CekAutentikasi{Autentikasi Kredensial & Role Spatie}
    
    CekAutentikasi -->|Email / Password Salah atau Non-Admin| TolakLogin[Tampilkan Pesan Error: Credentials Do Not Match]
    TolakLogin --> InputKredensial
    
    CekAutentikasi -->|Otentikasi Berhasil| DashboardAdmin[Masuk ke Filament Admin Panel Dashboard /admin]
    DashboardAdmin --> PantauStatistik[Lihat Widget: Total Guru, Siswa PKL, Lowongan Aktif, Pesan Masuk]
    
    PantauStatistik --> NavigasiMenu{Pilih Menu Kelola}

    %% 1. Modul Profil & Akademik
    NavigasiMenu -->|Profil & Akademik| MenuAkademik{Pilih Sub-Menu}
    MenuAkademik -->|Kelola Halaman Program| PageManageProgram[ManageAcademicPrograms: Form 4 Tab Sticky Save]
    PageManageProgram --> EditTab1[Tab 1: Judul Hero, Rasio 70:30, Mitra Utama]
    PageManageProgram --> EditTab2[Tab 2: 4 Pilar Kompetensi, Silabus PDF, Peta Fase E-F]
    PageManageProgram --> EditTab3[Tab 3: 6 Program Unggulan, Lisensi BNSP/AHM]
    PageManageProgram --> EditTab4[Tab 4: 3 Jalur Karir, Roadmap 3 Tahun, Banner CTA]
    
    MenuAkademik -->|Master Program Studi| CrudProgram[Resource Programs: Form Nama, Kode, Lab Equipments]
    CrudProgram --> RelasiKompetensi[Kelola Hubungan 1:M ke Competencies]
    
    MenuAkademik -->|Direktori Guru & Instruktur| CrudGuru[Resource Teachers: NIP, Posisi, Sertifikasi, Status Kajur, Foto]
    
    MenuAkademik -->|Sarana & Fasilitas Bengkel| CrudFasilitas[Resource Facilities: Kategori, Standar K3, Kapasitas, Foto Alat]
    MenuAkademik -->|Header Halaman Fasilitas| PageManageFac[ManageAcademicFacilities: Deskripsi & Gambar Banner]

    %% 2. Modul Hubin & BKK
    NavigasiMenu -->|Hubin & BKK| MenuBKK{Pilih Sub-Menu}
    MenuBKK -->|Mitra Industri DUDI| CrudMitra[Resource IndustryPartners: Profil Perusahaan, No MoU, Logo, Level]
    CrudMitra --> CrudCabang[Relation Manager IndustryPartnerBranches: Alamat Cabang, PIC, Kuota PKL, Maps]
    
    MenuBKK -->|Dokumen Kerjasama MoU| CrudKerjasama[Resource Partnerships: Jenis MoU/Magang, Unggah File Dokumen, Masa Berlaku]
    
    MenuBKK -->|Lowongan Pekerjaan BKK| CrudLowongan[Resource JobVacancies: Judul Posisi, Gaji Min/Max, Deskripsi, Deadline]
    
    MenuBKK -->|Praktik Kerja Lapangan| CrudMagang[Resource Internships: Tempat Bengkel, Periode Tanggal]
    CrudMagang --> CrudPesertaMagang[Relation Manager InternshipParticipants: Nama Siswa, NIS, Status Magang]
    
    MenuBKK -->|Tracer Study Alumni| CrudAlumni[Resource Alumni: Status BMW, Perusahaan, Gaji, Kisah Sukses]
    MenuBKK -->|Kelola Halaman Industri| PageManageInd[ManageIndustryPage: Statistik Serapan Lulusan & Narasi Hubin]

    %% 3. Modul Publikasi & Media
    NavigasiMenu -->|Publikasi & Media| MenuPublikasi{Pilih Sub-Menu}
    MenuPublikasi -->|Artikel & Berita| CrudPost[Resource Posts: Rich Text Editor, Slug Otomatis, Kategori, Multi-Tags, Cover]
    MenuPublikasi -->|Pengumuman Resmi| CrudPengumuman[Resource Announcements: Judul, Isi Surat, Lampiran File PDF, Status Aktif]
    MenuPublikasi -->|Katalog Prestasi| CrudPrestasi[Resource Achievements: Tingkat Juara, Multi-Upload Foto Pendukung, Peserta]
    MenuPublikasi -->|Galeri Foto/Video| CrudGaleri[Resource GalleryAlbums: Album Foto & Video Pembelajaran, Aspect Ratio]
    MenuPublikasi -->|Pusat Unduhan Berkas| CrudUnduhan[Resource Downloads & DownloadCategories: File Dokumen, Reset Counter]

    %% 4. Modul Pesan & Pengaturan
    NavigasiMenu -->|Pesan & Pengaturan| MenuPengaturan{Pilih Sub-Menu}
    MenuPengaturan -->|Kotak Pesan Masuk| CrudPesan[Resource ContactMessages: Baca Pesan Pengunjung, Tandai 'Sudah Dibaca', Balas Email]
    MenuPengaturan -->|Hero Slider Beranda| PageHeroSlider[ManageHeroSlider: Atur Urutan Slide, Gambar High-Res, Tombol CTA]
    MenuPengaturan -->|Banner Header Halaman| PageHeaders[ManagePageHeaders: Kustomisasi Gambar Banner untuk Tiap Route]
    MenuPengaturan -->|Profil Akun Admin| PageProfile[EditProfile /admin/profile: Ubah Nama, Alamat Email, Verifikasi Password Saat Ini, Set Password Baru]
    MenuPengaturan -->|Audit Log Aktivitas| LogAktivitas[Resource ActivityLog: Pantau Siapa Mengubah Data Apa, Waktu & Event]

    %% Eksekusi Penyimpanan
    EditTab1 & EditTab2 & EditTab3 & EditTab4 --> EksekusiSimpan[(Simpan ke MariaDB)]
    CrudProgram & RelasiKompetensi & CrudGuru & CrudFasilitas & PageManageFac --> EksekusiSimpan
    CrudMitra & CrudCabang & CrudKerjasama & CrudLowongan & CrudMagang & CrudPesertaMagang & CrudAlumni & PageManageInd --> EksekusiSimpan
    CrudPost & CrudPengumuman & CrudPrestasi & CrudGaleri & CrudUnduhan --> EksekusiSimpan
    CrudPesan & PageHeroSlider & PageHeaders & PageSettings & PageProfile --> EksekusiSimpan

    EksekusiSimpan --> CatatAudit[Spatie ActivityLog Merekam Transaksi: created/updated/deleted]
    CatatAudit --> NotifikasiSukses[Filament Menampilkan Toast Notifikasi 'Saved Successfully']
    NotifikasiSukses --> NavigasiMenu

    DashboardAdmin -->|Klik Menu Akun / Avatar| DropdownUser{Menu Profil User}
    DropdownUser -->|Pilih 'Profil Saya'| PageProfile
    DropdownUser -->|Pilih 'Keluar'| LogoutAdmin[Aksi Logout & Invalidate Session]
    LogoutAdmin --> SelesaiAdmin([Selesai: Kembali ke Halaman Login])
```

### 3.2 Rincian Alur Pengelolaan & Audit Log

1. **Autentikasi & Otorisasi Berbasis Peran (RBAC):**
   - Administrator mengakses `/admin/login`. Form memvalidasi email dan kata sandi menggunakan hashing Bcrypt/Argon2id.
   - Model `User` mengimplementasikan Spatie `HasRoles`. Sistem memverifikasi bahwa akun memiliki role `admin`. Jika berhasil, sesi disimpan di tabel `sessions` dan diarahkan ke Dashboard.

2. **Pengelolaan Profil Akun Administrator (/admin/profile):**
   - Administrator dapat membuka halaman profil melalui dua akses:
     - Menu avatar pengguna di pojok kanan atas (*User Menu -> Profil Saya*).
     - Menu bilah sisi navigasi (*Pengaturan Sistem -> Profil Admin*).
   - Form profil terbagi menjadi dua bagian:
     - **Informasi Akun Admin:** Mengubah nama lengkap dan alamat email resmi administrator.
     - **Keamanan & Kata Sandi:** Mengubah kata sandi baru (minimal 8 karakter) dengan konfirmasi kata sandi dan verifikasi kata sandi saat ini (*current password*) untuk mencegah perubahan yang tidak terotorisasi.
   - Kata sandi dienkripsi otomatis secara aman (*Hashed*), dan sesi login tetap aktif tanpa memaksa logout.

3. **Pengelolaan Program Akademik 4-Tab (*ManageAcademicPrograms*):**
   - Halaman kustom Filament yang mengelola konfigurasi program secara sentral dengan fitur *Sticky Save Header*:
     - **Tab 1: Identitas & Rasio Praktik:** Konfigurasi headline hero, rasio 70% praktik : 30% teori, dan mitra pembina AHM.
     - **Tab 2: Pilar Kompetensi & Kurikulum:** Pengaturan 4 pilar teknis (Engine, Chasis, Electrical, Fuel Injection), dokumen silabus PDF, serta capaian pembelajaran Fase E dan Fase F.
     - **Tab 3: Program Unggulan & Sertifikasi:** Pengaturan 6 program unggulan dan 3 lisensi sertifikasi (BNSP LSP-P1, Honda Sertifikasi Level 1/2).
     - **Tab 4: Prospek Karir & Roadmap:** Pemetaan 3 jalur karir utama dan infografis roadmap pendidikan 3 tahun.

4. **Pengelolaan Kemitraan Industri & Jaringan Bengkel AHASS:**
   - Administrator menginput data DUDI di `IndustryPartnerResource`.
   - Menggunakan relasi `HasMany` ke `IndustryPartnerBranch`, admin dapat menambahkan banyak cabang bengkel resmi lengkap dengan alamat kecamatan, link Google Maps, nama PIC, nomor WhatsApp, dan kapasitas kuota magang siswa.
   - Pengelolaan dokumen kerjasama di `PartnershipResource` mencatat tanggal masa berlaku MoU dan mengunggah berkas perjanjian resmi bertanda tangan digital.

5. **Pengelolaan Bursa Kerja Khusus (BKK) & Pelacakan Alumni:**
   - Admin mempublikasikan lowongan kerja melalui `JobVacancyResource`, menentukan kualifikasi keahlian, tipe pekerjaan (*full-time, kontrak*), rentang gaji, dan tanggal kadaluarsa lowongan.
   - Admin mendata lulusan melalui `AlumniResource`, mencatat status pilar BMW (*Bekerja, Melanjutkan, Wirausaha*), nama industri tempat bekerja, jabatan, serta kisah inspiratif alumni untuk memotivasi adik kelas.

6. **Pengelolaan Konten Publikasi & Pusat Unduhan:**
   - Penulisan berita dan artikel di `PostResource` dilengkapi Rich Text Editor, penentuan kategori, relasi many-to-many dengan tags, unggah berkas thumbnail, serta status publikasi (*draft, review, published*).
   - Pengelolaan unduhan di `DownloadResource` memvalidasi tipe file dokumen (*PDF, DOCX, XLSX, ZIP*) dan ukuran file. Tersedia tombol untuk mereset counter jumlah unduhan.

7. **Audit Trail Otomatis (*Spatie ActivityLog*):**
   - Setiap operasi penyimpanan (`create`), pembaruan (`update`), maupun penghapusan (`delete`) pada model-model utama dicatat secara otomatis ke tabel `activity_log`.
   - Data log menyimpan ID admin pelaku (`causer_id`), nama tabel/model objek (`subject_type`, `subject_id`), tipe event, serta rekaman nilai kolom sebelum dan sesudah perubahan (`properties`).

---

## 4. ENTITY RELATIONSHIP DIAGRAM (ERD) LENGKAP

### 4.1 Diagram Konseptual & Fisik Mermaid ERD

Diagram berikut memetakan seluruh 25 tabel entitas utama di basis data MariaDB `tbsm_db` beserta kunci primer (PK), kunci asing (FK), indeks unik (UK), tipe data, dan kardinalitas relasi:

```mermaid
erDiagram
    USERS ||--o{ POSTS : "menulis (user_id)"
    USERS ||--o| TEACHERS : "akun profil (user_id)"
    USERS ||--o| ALUMNI : "akun tracer study (user_id)"
    USERS ||--o{ ACTIVITY_LOG : "melakukan aksi (causer_id)"

    CATEGORIES ||--o{ POSTS : "klasifikasi (category_id)"
    CATEGORIES ||--o{ ACHIEVEMENTS : "bidang lomba (category_id)"

    POSTS ||--|{ POST_TAG : "memiliki label"
    TAGS ||--|{ POST_TAG : "dilekatkan ke post"

    PROGRAMS ||--o{ COMPETENCIES : "memiliki kompetensi (program_id)"

    ACHIEVEMENTS ||--o{ ACHIEVEMENT_PARTICIPANTS : "diikuti oleh (achievement_id)"

    INDUSTRY_PARTNERS ||--o{ INDUSTRY_PARTNER_BRANCHES : "memiliki cabang (industry_partner_id)"
    INDUSTRY_PARTNERS ||--o{ PARTNERSHIPS : "memiliki MoU (industry_partner_id)"
    INDUSTRY_PARTNERS ||--o{ INTERNSHIPS : "lokasi PKL (industry_partner_id)"
    INDUSTRY_PARTNERS ||--o{ JOB_VACANCIES : "membuka lowongan (industry_partner_id)"

    PARTNERSHIPS ||--o{ INTERNSHIPS : "dasar hukum magang (partnership_id)"
    INTERNSHIPS ||--o{ INTERNSHIP_PARTICIPANTS : "daftar siswa (internship_id)"

    GALLERY_ALBUMS ||--o{ GALLERY_ITEMS : "memuat dokumentasi (gallery_album_id)"

    DOWNLOAD_CATEGORIES ||--o{ DOWNLOADS : "mengelompokkan berkas (download_category_id)"

    USERS {
        bigint id PK
        varchar name
        varchar email UK
        timestamp email_verified_at
        varchar password
        varchar remember_token
        timestamp created_at
        timestamp updated_at
    }

    CATEGORIES {
        bigint id PK
        varchar name
        varchar slug UK
        text description
        timestamp created_at
        timestamp updated_at
    }

    TAGS {
        bigint id PK
        varchar name
        varchar slug UK
        timestamp created_at
        timestamp updated_at
    }

    POSTS {
        bigint id PK
        varchar title
        varchar slug UK
        text excerpt
        longtext content
        varchar thumbnail
        enum status "draft, review, published"
        timestamp published_at
        bigint user_id FK
        bigint category_id FK
        timestamp created_at
        timestamp updated_at
    }

    POST_TAG {
        bigint id PK
        bigint post_id FK
        bigint tag_id FK
    }

    ANNOUNCEMENTS {
        bigint id PK
        varchar title
        varchar slug UK
        longtext content
        varchar file_attachment
        tinyint is_active
        timestamp created_at
        timestamp updated_at
    }

    PROGRAMS {
        bigint id PK
        varchar name UK
        varchar slug UK
        varchar code
        varchar badge_text
        varchar specialization
        varchar specialization_tag
        text description
        text facility_description
        text lab_equipments
        longtext partners
        longtext industry_partners
        longtext partner_badges
        varchar thumbnail
        timestamp created_at
        timestamp updated_at
    }

    COMPETENCIES {
        bigint id PK
        bigint program_id FK
        varchar name
        varchar slug UK
        text description
        timestamp created_at
        timestamp updated_at
    }

    TEACHERS {
        bigint id PK
        bigint user_id FK
        varchar name
        varchar nip UK
        varchar position
        varchar specialization
        text bio
        tinyint is_head_of_department
        tinyint is_active
        varchar phone
        varchar photo
        timestamp created_at
        timestamp updated_at
    }

    FACILITIES {
        bigint id PK
        varchar name UK
        varchar slug UK
        varchar category
        text description
        text specifications
        varchar photo
        int quantity
        varchar capacity
        varchar safety_standards
        enum condition "good, fair, poor"
        int sort_order
        tinyint is_featured
        timestamp created_at
        timestamp updated_at
    }

    ACHIEVEMENTS {
        bigint id PK
        bigint category_id FK
        varchar title
        varchar slug UK
        enum level "school, district, city, province, national, international"
        varchar rank
        varchar organizer
        date date
        text description
        varchar photo
        longtext supporting_photos
        enum status "draft, published, archived"
        timestamp published_at
        varchar meta_title
        text meta_description
        timestamp created_at
        timestamp updated_at
    }

    ACHIEVEMENT_PARTICIPANTS {
        bigint id PK
        bigint achievement_id FK
        varchar student_name
        varchar student_id
        timestamp created_at
        timestamp updated_at
    }

    INDUSTRY_PARTNERS {
        bigint id PK
        varchar name UK
        varchar slug UK
        varchar industry_type
        text description
        varchar address
        varchar phone
        varchar email
        varchar website
        varchar mou_number
        date mou_start_date
        date mou_end_date
        varchar partnership_level
        varchar headquarters_city
        text curriculum_sync_info
        varchar logo
        varchar banner_image
        enum status "draft, published, archived"
        timestamp published_at
        varchar meta_title
        text meta_description
        timestamp created_at
        timestamp updated_at
    }

    INDUSTRY_PARTNER_BRANCHES {
        bigint id PK
        bigint industry_partner_id FK
        varchar name
        varchar branch_code
        varchar district
        varchar city
        text address
        varchar phone
        varchar whatsapp
        varchar google_maps_url
        varchar pic_name
        varchar pic_phone
        varchar internship_quota
        text facilities
        varchar photo
        tinyint is_main_branch
        tinyint is_active
        int sort_order
        timestamp created_at
        timestamp updated_at
    }

    PARTNERSHIPS {
        bigint id PK
        bigint industry_partner_id FK
        enum type "mou, internship, recruitment"
        varchar title
        date start_date
        date end_date
        text description
        varchar document_file
        enum status "active, expired, terminated"
        timestamp created_at
        timestamp updated_at
    }

    INTERNSHIPS {
        bigint id PK
        bigint industry_partner_id FK
        bigint partnership_id FK
        varchar title
        date start_date
        date end_date
        varchar status
        text description
        timestamp created_at
        timestamp updated_at
    }

    INTERNSHIP_PARTICIPANTS {
        bigint id PK
        bigint internship_id FK
        varchar student_name
        varchar student_id
        varchar role
        enum status "active, completed, dropped"
        timestamp created_at
        timestamp updated_at
    }

    JOB_VACANCIES {
        bigint id PK
        bigint industry_partner_id FK
        varchar title
        varchar slug UK
        varchar position
        longtext description
        text requirements
        text responsibilities
        varchar location
        varchar work_type
        varchar employment_type
        decimal salary_min
        decimal salary_max
        varchar salary_text
        varchar application_email
        varchar application_url
        datetime application_deadline
        date deadline
        varchar status
        timestamp published_at
        timestamp created_at
        timestamp updated_at
    }

    ALUMNI {
        bigint id PK
        bigint user_id FK
        varchar name
        varchar slug UK
        varchar student_id UK
        int graduation_year
        varchar photo
        tinyint is_public
        tinyint is_featured
        int featured_order
        varchar status
        varchar city
        varchar education
        varchar current_occupation
        varchar current_company
        text bio
        text achievements
        text success_story
        timestamp published_at
        varchar meta_title
        text meta_description
        timestamp created_at
        timestamp updated_at
    }

    GALLERY_ALBUMS {
        bigint id PK
        varchar title
        varchar slug UK
        text description
        date event_date
        varchar location
        varchar thumbnail
        varchar status
        int sort_order
        timestamp published_at
        varchar meta_title
        text meta_description
        timestamp created_at
        timestamp updated_at
    }

    GALLERY_ITEMS {
        bigint id PK
        bigint gallery_album_id FK
        varchar file_path
        varchar title
        varchar alt_text
        tinyint is_featured
        int sort_order
        enum type "image, video"
        varchar aspect_ratio
        text description
        timestamp created_at
        timestamp updated_at
    }

    DOWNLOAD_CATEGORIES {
        bigint id PK
        varchar name
        varchar slug UK
        text description
        timestamp created_at
        timestamp updated_at
    }

    DOWNLOADS {
        bigint id PK
        bigint download_category_id FK
        varchar title
        varchar slug UK
        text description
        varchar file_path
        varchar file_name
        varchar file_type
        bigint file_size
        varchar status
        tinyint is_public
        bigint download_count
        int sort_order
        timestamp published_at
        varchar meta_title
        text meta_description
        timestamp created_at
        timestamp updated_at
    }

    CONTACT_MESSAGES {
        bigint id PK
        varchar name
        varchar email
        varchar subject
        text message
        tinyint is_read
        timestamp created_at
        timestamp updated_at
    }

    SETTINGS {
        bigint id PK
        varchar key UK
        text value
        varchar type
        timestamp created_at
        timestamp updated_at
    }

    ACTIVITY_LOG {
        bigint id PK
        varchar log_name
        text description
        varchar subject_type
        bigint subject_id
        varchar event
        varchar causer_type
        bigint causer_id
        longtext properties
        uuid batch_uuid
        timestamp created_at
        timestamp updated_at
    }
```

---

### 4.2 Matriks Relasi Antar-Entitas & Integritas Kunci Asing

Tabel berikut merangkum seluruh relasi foreign key, tipe kardinalitas, aksi referensial ON DELETE, dan tujuan bisnis dalam sistem:

| Tabel Asal (Child) | Kunci Asing (FK) | Tabel Rujukan (Parent) | Kunci Primer (PK) | Kardinalitas | Aturan ON DELETE | Penjelasan Bisnis |
| :--- | :--- | :--- | :--- | :---: | :---: | :--- |
| `posts` | `user_id` | `users` | `id` | N : 1 | `CASCADE` / `SET NULL` | Setiap artikel berita ditulis oleh seorang user/admin terdaftar. |
| `posts` | `category_id` | `categories` | `id` | N : 1 | `RESTRICT` / `SET NULL` | Mengelompokkan artikel ke dalam kategori berita/kegiatan. |
| `post_tag` | `post_id` | `posts` | `id` | N : 1 | `CASCADE` | Pivot table relasi Many-to-Many antara artikel berita dan tag. |
| `post_tag` | `tag_id` | `tags` | `id` | N : 1 | `CASCADE` | Pivot table relasi Many-to-Many antara artikel berita dan tag. |
| `teachers` | `user_id` | `users` | `id` | 1 : 1 (Nullable) | `SET NULL` | Menghubungkan profil pendidik dengan akun login aplikasi. |
| `competencies` | `program_id` | `programs` | `id` | N : 1 | `CASCADE` | Unit kompetensi keahlian yang menjadi bagian dari program studi. |
| `achievements` | `category_id` | `categories` | `id` | N : 1 | `SET NULL` | Klasifikasi bidang lomba prestasi (misal: LKS Otomotif). |
| `achievement_participants` | `achievement_id` | `achievements` | `id` | N : 1 | `CASCADE` | Daftar siswa atau tim yang berpartisipasi dalam suatu kejuaraan. |
| `industry_partner_branches`| `industry_partner_id`| `industry_partners` | `id` | N : 1 | `CASCADE` | Cabang-cabang bengkel AHASS di bawah naungan PT mitra industri. |
| `partnerships` | `industry_partner_id`| `industry_partners` | `id` | N : 1 | `CASCADE` | Rekaman MoU dan perjanjian legal kerjasama dengan DUDI. |
| `internships` | `industry_partner_id`| `industry_partners` | `id` | N : 1 | `CASCADE` | Penyelenggaraan gelombang Praktik Kerja Lapangan di mitra industri. |
| `internships` | `partnership_id` | `partnerships` | `id` | N : 1 (Nullable) | `SET NULL` | Dasar hukum MoU yang memayungi pelaksanaan program magang. |
| `internship_participants` | `internship_id` | `internships` | `id` | N : 1 | `CASCADE` | Daftar siswa yang ditempatkan pada gelombang magang tertentu. |
| `job_vacancies` | `industry_partner_id`| `industry_partners` | `id` | N : 1 | `CASCADE` | Lowongan kerja yang dibuka langsung oleh mitra industri binaan. |
| `alumni` | `user_id` | `users` | `id` | 1 : 1 (Nullable) | `SET NULL` | Akun pengguna bagi alumni yang mengisi kuesioner tracer study. |
| `gallery_items` | `gallery_album_id` | `gallery_albums` | `id` | N : 1 | `CASCADE` | Berkas foto atau video dokumentasi yang berada dalam album tertentu. |
| `downloads` | `download_category_id` | `download_categories` | `id` | N : 1 | `RESTRICT` | Kategori penataan berkas unduhan publik. |
| `activity_log` | `causer_id` | `users` | `id` | N : 1 (Polymorphic) | `SET NULL` | Pengguna yang menjadi pelaku aksi manipulasi data di panel admin. |

---

## 5. KAMUS DATA BASIS DATA (DATA DICTIONARY)

Berikut adalah kamus data lengkap untuk seluruh 25 tabel aplikasi di database `tbsm_db`:

### Tabel 01: `users`
Menyimpan akun pengguna dan administrator yang memiliki hak akses login ke Filament Admin Panel.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama lengkap pengguna / administrator |
| `email` | `VARCHAR(255)` | Tidak | - | Alamat surel unik untuk autentikasi (Unique Key) |
| `email_verified_at` | `TIMESTAMP` | Ya | `NULL` | Waktu verifikasi email |
| `password` | `VARCHAR(255)` | Tidak | - | Kata sandi terenkripsi (Bcrypt / Argon2id) |
| `remember_token` | `VARCHAR(100)` | Ya | `NULL` | Token sesi remember-me Laravel |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data akun dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data akun terakhir diubah |

---

### Tabel 02: `posts`
Menyimpan artikel warta, berita jurusan, liputan kegiatan, dan dokumentasi akademik.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `title` | `VARCHAR(255)` | Tidak | - | Judul artikel |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL unik ramah SEO (Unique Key) |
| `excerpt` | `TEXT` | Ya | `NULL` | Ringkasan singkat cuplikan artikel |
| `content` | `LONGTEXT` | Tidak | - | Isi lengkap artikel (HTML Rich Text) |
| `thumbnail` | `VARCHAR(255)` | Ya | `NULL` | Lokasi berkas gambar cover artikel di disk storage |
| `status` | `ENUM('draft', 'review', 'published')` | Tidak | `'draft'` | Status alur penerbitan artikel |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal dan waktu artikel dirilis ke publik |
| `user_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `users.id` |
| `category_id` | `BIGINT UNSIGNED` | Ya | `NULL` | Foreign Key (FK) merujuk ke `categories.id` |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan record |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan record |

---

### Tabel 03: `categories`
Menyimpan kategori taksonomi untuk mengelompokkan artikel warta dan prestasi.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama label kategori |
| `slug` | `VARCHAR(255)` | Tidak | - | URL slug unik (Unique Key) |
| `description` | `TEXT` | Ya | `NULL` | Deskripsi penjelasan lingkup kategori |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 04: `tags`
Menyimpan kata kunci atau tag untuk pengindeksan multi-topik pada artikel warta.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama tag kata kunci |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug unik tag untuk pencarian (Unique Key) |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 05: `post_tag`
Tabel pivot relasi Many-to-Many antara artikel (`posts`) dan label kata kunci (`tags`).
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `post_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `posts.id` |
| `tag_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `tags.id` |

---

### Tabel 06: `announcements`
Menyimpan pengumuman resmi berkas akademik atau warta kedinasan sekolah.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `title` | `VARCHAR(255)` | Tidak | - | Judul surat atau pengumuman |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug unik URL (Unique Key) |
| `content` | `LONGTEXT` | Tidak | - | Teks isi lengkap pengumuman |
| `file_attachment` | `VARCHAR(255)` | Ya | `NULL` | Lokasi berkas PDF surat keputusan / edaran |
| `is_active` | `TINYINT(1)` | Tidak | `1` | Status penayangan di bar pengumuman publik |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 07: `programs`
Menyimpan profil program konsentrasi keahlian Teknik dan Bisnis Sepeda Motor.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama resmi program keahlian |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug unik URL (Unique Key) |
| `code` | `VARCHAR(50)` | Ya | `NULL` | Kode kompetensi kejuruan |
| `badge_text` | `VARCHAR(255)` | Ya | `NULL` | Label banner (misal: "Binaan Resmi PT AHM") |
| `specialization` | `VARCHAR(255)` | Ya | `NULL` | Peminatan khusus |
| `specialization_tag` | `VARCHAR(255)` | Ya | `NULL` | Tagline peminatan |
| `description` | `TEXT` | Ya | `NULL` | Narasi penjelasan visi keilmuan program |
| `facility_description` | `TEXT` | Ya | `NULL` | Gambaran ringkas fasilitas bengkel |
| `lab_equipments` | `TEXT` | Ya | `NULL` | Ringkasan peralatan laboratorium mekanik |
| `partners` | `LONGTEXT` | Ya | `NULL` | JSON / Teks daftar institusi pendukung |
| `industry_partners` | `LONGTEXT` | Ya | `NULL` | JSON daftar mitra industri binaan |
| `partner_badges` | `LONGTEXT` | Ya | `NULL` | JSON badge kemitraan |
| `thumbnail` | `VARCHAR(255)` | Ya | `NULL` | Foto utama bengkel/kegiatan praktik |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan data |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu modifikasi data |

---

### Tabel 08: `competencies`
Menyimpan capaian kompetensi dasar dan keahlian teknis otomotif sepeda motor.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `program_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `programs.id` |
| `name` | `VARCHAR(255)` | Tidak | - | Nama modul kompetensi (misal: "Injeksi PGM-FI") |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL kompetensi (Unique Key) |
| `description` | `TEXT` | Ya | `NULL` | Rincian materi kompetensi kejuruan |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan data |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan data |

---

### Tabel 09: `teachers`
Menyimpan data tenaga pendidik kejuruan, instruktur bengkel, dan pimpinan program studi.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `user_id` | `BIGINT UNSIGNED` | Ya | `NULL` | Foreign Key (FK) ke `users.id` (1:1 opsional) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama lengkap pendidik beserta gelar |
| `nip` | `VARCHAR(50)` | Ya | `NULL` | Nomor Induk Pegawai (Unique Key) |
| `position` | `VARCHAR(255)` | Ya | `NULL` | Jabatan kedinasan (misal: Guru Produktif) |
| `specialization` | `VARCHAR(255)` | Ya | `NULL` | Bidang keahlian teknis (Chasis, Engine, Kelistrikan) |
| `bio` | `TEXT` | Ya | `NULL` | Profil biografi dan riwayat sertifikasi |
| `is_head_of_department` | `TINYINT(1)` | Tidak | `0` | Penanda Kepala Konsentrasi Keahlian (Kajur) |
| `is_active` | `TINYINT(1)` | Tidak | `1` | Status aktif mengajar |
| `phone` | `VARCHAR(50)` | Ya | `NULL` | Nomor kontak resmi |
| `photo` | `VARCHAR(255)` | Ya | `NULL` | Berkas foto potret formal |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 10: `facilities`
Menyimpan inventaris sarana bengkel, mesin praktik, pit kerja AHASS, dan laboratorium.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama sarana / fasilitas / alat |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL unik sarana (Unique Key) |
| `category` | `VARCHAR(100)` | Ya | `NULL` | Kategori (Bengkel Mesin, Lab Kelistrikan, Pit AHASS) |
| `description` | `TEXT` | Ya | `NULL` | Deskripsi dan fungsi pemakaian |
| `specifications` | `TEXT` | Ya | `NULL` | Spesifikasi teknis alat industri |
| `photo` | `VARCHAR(255)` | Ya | `NULL` | Berkas foto dokumentasi sarana |
| `quantity` | `INT` | Ya | `1` | Jumlah unit yang tersedia di sekolah |
| `capacity` | `VARCHAR(100)` | Ya | `NULL` | Kapasitas tampung siswa per sesi |
| `safety_standards` | `VARCHAR(255)` | Ya | `NULL` | Standar K3 (Helm, Safety Shoes, Kacamata) |
| `condition` | `ENUM('good', 'fair', 'poor')` | Tidak | `'good'` | Kondisi kelaikan alat |
| `sort_order` | `INT` | Tidak | `0` | Urutan penayangan di grid galeri |
| `is_featured` | `TINYINT(1)` | Tidak | `0` | Ditampilkan di highlight beranda |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 11: `achievements`
Menyimpan rekam jejak prestasi kejuaraan, Lomba Kompetensi Siswa (LKS), dan kontes mekanik.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `category_id` | `BIGINT UNSIGNED` | Ya | `NULL` | Foreign Key (FK) merujuk ke `categories.id` |
| `title` | `VARCHAR(255)` | Tidak | - | Nama kejuaraan atau kompetisi |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL unik prestasi (Unique Key) |
| `level` | `ENUM('school', 'district', 'city', 'province', 'national', 'international')` | Tidak | `'school'` | Tingkatan lomba |
| `rank` | `VARCHAR(50)` | Ya | `NULL` | Peringkat juara (Juara 1, Medali Emas, Harapan) |
| `organizer` | `VARCHAR(255)` | Ya | `NULL` | Institusi penyelenggara (Kemendikbud, PT AHM) |
| `date` | `DATE` | Ya | `NULL` | Tanggal pelaksanaan kejuaraan |
| `description` | `TEXT` | Ya | `NULL` | Narasi perjuangan dan pencapaian lomba |
| `photo` | `VARCHAR(255)` | Ya | `NULL` | Foto utama piala / podium juara |
| `supporting_photos` | `LONGTEXT` | Ya | `NULL` | JSON array foto pendukung dokumentasi |
| `status` | `ENUM('draft', 'published', 'archived')` | Tidak | `'published'` | Status penayangan |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal penayangan |
| `meta_title` | `VARCHAR(255)` | Ya | `NULL` | Meta title tag SEO |
| `meta_description` | `TEXT` | Ya | `NULL` | Meta description tag SEO |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 12: `achievement_participants`
Menyimpan nama-nama siswa delegasi atau anggota tim peraih penghargaan prestasi.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `achievement_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `achievements.id` |
| `student_name` | `VARCHAR(255)` | Tidak | - | Nama lengkap siswa peserta |
| `student_id` | `VARCHAR(50)` | Ya | `NULL` | Nomor Induk Siswa (NIS / NISN) |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan data |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan data |

---

### Tabel 13: `industry_partners`
Menyimpan profil perusahaan rekanan DUDI dan industri otomotif binaan resmi.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama resmi perusahaan / korporasi |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL profil mitra (Unique Key) |
| `industry_type` | `VARCHAR(100)` | Ya | `NULL` | Bidang bisnis (Dealer Resmi, AHASS, Manufaktur) |
| `description` | `TEXT` | Ya | `NULL` | Profil perusahaan dan rekam jejak |
| `address` | `VARCHAR(255)` | Ya | `NULL` | Alamat kantor pusat |
| `phone` | `VARCHAR(50)` | Ya | `NULL` | Nomor telepon resmi kantor |
| `email` | `VARCHAR(100)` | Ya | `NULL` | Email narahubung korporat |
| `website` | `VARCHAR(255)` | Ya | `NULL` | Situs web resmi mitra |
| `mou_number` | `VARCHAR(100)` | Ya | `NULL` | Nomor dokumen nota kesepahaman MoU |
| `mou_start_date` | `DATE` | Ya | `NULL` | Tanggal awal berlakunya kerjasama |
| `mou_end_date` | `DATE` | Ya | `NULL` | Tanggal berakhirnya kerjasama MoU |
| `partnership_level` | `VARCHAR(50)` | Ya | `NULL` | Kelas kerjasama (Binaan Utama / Grade A+) |
| `headquarters_city` | `VARCHAR(100)` | Ya | `NULL` | Kota kantor pusat |
| `curriculum_sync_info` | `TEXT` | Ya | `NULL` | Catatan sinkronisasi kurikulum industri |
| `logo` | `VARCHAR(255)` | Ya | `NULL` | Berkas logo resmi format PNG/SVG |
| `banner_image` | `VARCHAR(255)` | Ya | `NULL` | Banner cover profil kemitraan |
| `status` | `ENUM('draft', 'published', 'archived')` | Tidak | `'published'` | Status tayang |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal tayang |
| `meta_title` | `VARCHAR(255)` | Ya | `NULL` | Meta title tag SEO |
| `meta_description` | `TEXT` | Ya | `NULL` | Meta description tag SEO |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 14: `industry_partner_branches`
Menyimpan jaringan outlet/cabang bengkel AHASS di tingkat kecamatan dan kabupaten.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `industry_partner_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) ke `industry_partners.id` |
| `name` | `VARCHAR(255)` | Tidak | - | Nama cabang bengkel (misal: AHASS Bangsri Motor) |
| `branch_code` | `VARCHAR(50)` | Ya | `NULL` | Kode bengkel resmi Honda |
| `district` | `VARCHAR(100)` | Ya | `NULL` | Nama kecamatan lokasi bengkel |
| `city` | `VARCHAR(100)` | Ya | `NULL` | Nama kota / kabupaten |
| `address` | `TEXT` | Ya | `NULL` | Alamat lengkap jalan |
| `phone` | `VARCHAR(50)` | Ya | `NULL` | Nomor telepon bengkel |
| `whatsapp` | `VARCHAR(50)` | Ya | `NULL` | Nomor WhatsApp service advisor |
| `google_maps_url` | `VARCHAR(500)` | Ya | `NULL` | URL tautan Google Maps penunjuk lokasi |
| `pic_name` | `VARCHAR(255)` | Ya | `NULL` | Nama Kepala Bengkel / PIC PKL |
| `pic_phone` | `VARCHAR(50)` | Ya | `NULL` | Kontak WhatsApp PIC bengkel |
| `internship_quota` | `VARCHAR(50)` | Ya | `NULL` | Daya tampung kuota magang siswa |
| `facilities` | `TEXT` | Ya | `NULL` | Fasilitas yang ada di cabang |
| `photo` | `VARCHAR(255)` | Ya | `NULL` | Foto fasad depan bengkel cabang |
| `is_main_branch` | `TINYINT(1)` | Tidak | `0` | Penanda cabang utama pusat |
| `is_active` | `TINYINT(1)` | Tidak | `1` | Status operasional cabang |
| `sort_order` | `INT` | Tidak | `0` | Urutan penataan list |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 15: `partnerships`
Menyimpan riwayat dokumen legal Memorandum of Understanding (MoU) dan kontrak kerja.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `industry_partner_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) ke `industry_partners.id` |
| `type` | `ENUM('mou', 'internship', 'recruitment')` | Tidak | `'mou'` | Tipe perjanjian kerjasama |
| `title` | `VARCHAR(255)` | Tidak | - | Judul kesepakatan kerjasama |
| `start_date` | `DATE` | Ya | `NULL` | Tanggal penandatanganan kesepakatan |
| `end_date` | `DATE` | Ya | `NULL` | Tanggal berakhir masa kesepakatan |
| `description` | `TEXT` | Ya | `NULL` | Poin-poin kesepakatan bersama |
| `document_file` | `VARCHAR(255)` | Ya | `NULL` | Berkas scan dokumen PDF bertanda tangan |
| `status` | `ENUM('active', 'expired', 'terminated')` | Tidak | `'active'` | Status keberlakuan hukum dokumen |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan data |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan data |

---

### Tabel 16: `internships`
Menyimpan agenda gelombang pelaksanaan Praktik Kerja Lapangan (PKL) siswa di bengkel rekanan.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `industry_partner_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) ke `industry_partners.id` |
| `partnership_id` | `BIGINT UNSIGNED` | Ya | `NULL` | Foreign Key (FK) merujuk ke `partnerships.id` |
| `title` | `VARCHAR(255)` | Tidak | - | Nama program magang (misal: "PKL Gelombang 1") |
| `start_date` | `DATE` | Ya | `NULL` | Tanggal penerjunan siswa ke industri |
| `end_date` | `DATE` | Ya | `NULL` | Tanggal penarikan kembali siswa ke sekolah |
| `status` | `VARCHAR(50)` | Tidak | `'active'` | Status pelaksanaan magang |
| `description` | `TEXT` | Ya | `NULL` | Catatan penugasan dan fokus keahlian |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 17: `internship_participants`
Menyimpan data siswa peserta yang diterjunkan dalam program Praktik Kerja Lapangan.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `internship_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `internships.id` |
| `student_name` | `VARCHAR(255)` | Tidak | - | Nama lengkap siswa peserta PKL |
| `student_id` | `VARCHAR(50)` | Ya | `NULL` | Nomor Induk Siswa (NIS) |
| `role` | `VARCHAR(100)` | Ya | `NULL` | Peran (Ketua Kelompok Magang / Anggota) |
| `status` | `ENUM('active', 'completed', 'dropped')` | Tidak | `'active'` | Status kelulusan program magang |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan data |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan data |

---

### Tabel 18: `job_vacancies`
Menyimpan informasi bursa kerja khusus (BKK) dan rekrutmen mekanik untuk alumni.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `industry_partner_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) ke `industry_partners.id` |
| `title` | `VARCHAR(255)` | Tidak | - | Judul iklan lowongan kerja |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL unik lowongan (Unique Key) |
| `position` | `VARCHAR(100)` | Tidak | - | Posisi pekerjaan (Mekanik AHASS, Service Advisor) |
| `description` | `LONGTEXT` | Tidak | - | Deskripsi menyeluruh tentang pekerjaan |
| `requirements` | `TEXT` | Ya | `NULL` | Syarat kualifikasi calon pelamar |
| `responsibilities` | `TEXT` | Ya | `NULL` | Tanggung jawab dan target kerja harian |
| `location` | `VARCHAR(255)` | Ya | `NULL` | Lokasi penempatan kerja |
| `work_type` | `VARCHAR(50)` | Ya | `NULL` | Tipe kerja (Onsite, Shift) |
| `employment_type` | `VARCHAR(50)` | Ya | `NULL` | Status ikatan kerja (Kontrak, Tetap) |
| `salary_min` | `DECIMAL(12,2)` | Ya | `NULL` | Batas gaji minimal |
| `salary_max` | `DECIMAL(12,2)` | Ya | `NULL` | Batas gaji maksimal |
| `salary_text` | `VARCHAR(100)` | Ya | `NULL` | Keterangan gaji (misal: "UMK Jepara + Insentif") |
| `application_email` | `VARCHAR(100)` | Ya | `NULL` | Email tujuan pengiriman berkas CV |
| `application_url` | `VARCHAR(255)` | Ya | `NULL` | Tautan formulir pendaftaran daring |
| `application_deadline` | `DATETIME` | Ya | `NULL` | Batas akhir pengajuan lamaran lengkap |
| `deadline` | `DATE` | Ya | `NULL` | Tanggal penutupan lowongan |
| `status` | `VARCHAR(50)` | Tidak | `'published'` | Status penayangan di bursa kerja |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal penayangan |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 19: `alumni`
Menyimpan pangkalan data Tracer Study kelulusan alumni berlandaskan pilar BMW.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `user_id` | `BIGINT UNSIGNED` | Ya | `NULL` | Foreign Key (FK) merujuk ke `users.id` (1:1) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama lengkap alumni |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug profil unik alumni (Unique Key) |
| `student_id` | `VARCHAR(50)` | Ya | `NULL` | Nomor Induk Siswa saat bersekolah (Unique Key) |
| `graduation_year` | `INT` | Tidak | - | Tahun kelulusan dari SMKN 1 Bangsri |
| `photo` | `VARCHAR(255)` | Ya | `NULL` | Foto formal / seragam kerja alumni |
| `is_public` | `TINYINT(1)` | Tidak | `1` | Persetujuan tampil di halaman direktori publik |
| `is_featured` | `TINYINT(1)` | Tidak | `0` | Disorot sebagai figur alumni teladan |
| `featured_order` | `INT` | Ya | `0` | Urutan penayangan alumni teladan |
| `status` | `VARCHAR(50)` | Tidak | `'employed'` | Status Tracer Study: Bekerja, Melanjutkan, Wirausaha |
| `city` | `VARCHAR(100)` | Ya | `NULL` | Kota domisili kerja saat ini |
| `education` | `VARCHAR(255)` | Ya | `NULL` | Perguruan tinggi (jika Melanjutkan studi) |
| `current_occupation` | `VARCHAR(255)` | Ya | `NULL` | Jabatan / Profesi kerja saat ini |
| `current_company` | `VARCHAR(255)` | Ya | `NULL` | Nama perusahaan tempat kerja atau nama usaha |
| `bio` | `TEXT` | Ya | `NULL` | Riwayat perjalanan karir alumni |
| `achievements` | `TEXT` | Ya | `NULL` | Prestasi kerja yang pernah diraih di industri |
| `success_story` | `TEXT` | Ya | `NULL` | Testimoni dan kisah inspiratif alumni |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal profil disetujui publik |
| `meta_title` | `VARCHAR(255)` | Ya | `NULL` | Meta title tag SEO |
| `meta_description` | `TEXT` | Ya | `NULL` | Meta description tag SEO |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan data |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan data |

---

### Tabel 20: `gallery_albums`
Menyimpan album kegiatan praktik, upacara bendera, kunjungan industri, dan seminar.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `title` | `VARCHAR(255)` | Tidak | - | Judul album galeri |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL unik album (Unique Key) |
| `description` | `TEXT` | Ya | `NULL` | Keterangan kegiatan dalam album |
| `event_date` | `DATE` | Ya | `NULL` | Tanggal dokumentasi diambil |
| `location` | `VARCHAR(255)` | Ya | `NULL` | Lokasi kegiatan (Bengkel, Aula, PT AHM) |
| `thumbnail` | `VARCHAR(255)` | Ya | `NULL` | Gambar sampul album |
| `status` | `VARCHAR(50)` | Tidak | `'published'` | Status penayangan |
| `sort_order` | `INT` | Tidak | `0` | Urutan penataan |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal rilis |
| `meta_title` | `VARCHAR(255)` | Ya | `NULL` | Meta title tag SEO |
| `meta_description` | `TEXT` | Ya | `NULL` | Meta description tag SEO |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 21: `gallery_items`
Menyimpan berkas biner media foto dan video yang berafiliasi dalam sebuah album.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `gallery_album_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) merujuk ke `gallery_albums.id` |
| `file_path` | `VARCHAR(255)` | Tidak | - | Lokasi penyimpanan berkas di disk storage / URL video |
| `title` | `VARCHAR(255)` | Ya | `NULL` | Judul caption foto/video |
| `alt_text` | `VARCHAR(255)` | Ya | `NULL` | Teks alternatif aksesibilitas gambar (Alt Tag) |
| `is_featured` | `TINYINT(1)` | Tidak | `0` | Disorot sebagai media utama |
| `sort_order` | `INT` | Tidak | `0` | Urutan urut foto dalam lightbox |
| `type` | `ENUM('image', 'video')` | Tidak | `'image'` | Format berkas media |
| `aspect_ratio` | `VARCHAR(20)` | Ya | `'16:9'` | Rasio aspek tampilan media |
| `description` | `TEXT` | Ya | `NULL` | Keterangan tambahan |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 22: `download_categories`
Menyimpan kategori pengelompokan berkas unduhan publik.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama kategori unduhan (Modul, Formulir, Silabus) |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug URL unik kategori (Unique Key) |
| `description` | `TEXT` | Ya | `NULL` | Penjelasan isi berkas dalam kategori |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 23: `downloads`
Menyimpan metadata berkas dokumen, modul ajar, dan formulir beserta penghitung unduhan.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `download_category_id` | `BIGINT UNSIGNED` | Tidak | - | Foreign Key (FK) ke `download_categories.id` |
| `title` | `VARCHAR(255)` | Tidak | - | Nama judul berkas yang ditampilkan |
| `slug` | `VARCHAR(255)` | Tidak | - | Slug unik dokumen (Unique Key) |
| `description` | `TEXT` | Ya | `NULL` | Keterangan petunjuk isi berkas |
| `file_path` | `VARCHAR(255)` | Tidak | - | Path berkas di dalam sistem direktori storage |
| `file_name` | `VARCHAR(255)` | Tidak | - | Nama asli berkas saat diunduh pengguna |
| `file_type` | `VARCHAR(50)` | Ya | `NULL` | Ekstensi berkas (PDF, DOCX, XLSX, ZIP) |
| `file_size` | `BIGINT UNSIGNED` | Ya | `0` | Ukuran berkas dalam satuan byte |
| `status` | `VARCHAR(50)` | Tidak | `'published'` | Status ketersediaan berkas |
| `is_public` | `TINYINT(1)` | Tidak | `1` | Dapat diakses pengunjung tanpa autentikasi |
| `download_count` | `BIGINT UNSIGNED` | Tidak | `0` | Akumulator otomatis jumlah kali berkas diunduh |
| `sort_order` | `INT` | Tidak | `0` | Urutan penataan berkas |
| `published_at` | `TIMESTAMP` | Ya | `NULL` | Tanggal dokumen diunggah |
| `meta_title` | `VARCHAR(255)` | Ya | `NULL` | Meta title tag SEO |
| `meta_description` | `TEXT` | Ya | `NULL` | Meta description tag SEO |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data diubah |

---

### Tabel 24: `contact_messages`
Menyimpan pesan, pertanyaan, dan umpan balik yang dikirimkan oleh pengunjung website.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `name` | `VARCHAR(255)` | Tidak | - | Nama lengkap pengirim pesan |
| `email` | `VARCHAR(255)` | Tidak | - | Alamat surel aktif pengirim |
| `subject` | `VARCHAR(255)` | Ya | `NULL` | Pokok bahasan pesan kontak |
| `message` | `TEXT` | Tidak | - | Uraian lengkap isi pesan |
| `is_read` | `TINYINT(1)` | Tidak | `0` | Status penanda telah dibaca oleh pengelola (0=Belum, 1=Sudah) |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pesan dikirimkan |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu status pesan diperbarui |

---

### Tabel 25: `settings`
Menyimpan konfigurasi identitas situs, kontak telepon WhatsApp, dan parameter aplikasi (Key-Value).
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `key` | `VARCHAR(255)` | Tidak | - | Kunci konfigurasi unik (Unique Key) |
| `value` | `TEXT` | Ya | `NULL` | Nilai konfigurasi (string, integer, atau serialisasi JSON) |
| `type` | `VARCHAR(50)` | Ya | `'text'` | Tipe data form kontrol (text, textarea, image, toggle) |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembuatan konfigurasi |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu pembaruan konfigurasi |

---

### Tabel 26: `activity_log`
Tabel audit trail resmi (*Spatie ActivityLog*) yang merekam jejak operasi administrator.
| Nama Kolom | Tipe Data | Nullable | Nilai Default | Keterangan & Relasi |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `BIGINT UNSIGNED` | Tidak | Auto Increment | Primary Key (PK) |
| `log_name` | `VARCHAR(255)` | Ya | `'default'` | Kelompok log (misal: 'academic', 'security') |
| `description` | `TEXT` | Tidak | - | Keterangan aksi (misal: "Created Program TBSM") |
| `subject_type` | `VARCHAR(255)` | Ya | `NULL` | Nama Class Model objek target (Polymorphic) |
| `subject_id` | `BIGINT UNSIGNED` | Ya | `NULL` | ID record objek target (Polymorphic) |
| `event` | `VARCHAR(255)` | Ya | `NULL` | Tipe kejadian: `created`, `updated`, `deleted` |
| `causer_type` | `VARCHAR(255)` | Ya | `NULL` | Nama Class Model pengguna pelaku aksi |
| `causer_id` | `BIGINT UNSIGNED` | Ya | `NULL` | ID pengguna pelaku (merujuk ke `users.id`) |
| `properties` | `LONGTEXT` | Ya | `NULL` | JSON perbandingan data (`old` vs `attributes`) |
| `batch_uuid` | `CHAR(36)` | Ya | `NULL` | UUID penanda transaksi massal |
| `created_at` | `TIMESTAMP` | Ya | `NULL` | Waktu kejadian dicatat sistem |
| `updated_at` | `TIMESTAMP` | Ya | `NULL` | Waktu data log diperbarui |

---

## 6. ATURAN BISNIS (BUSINESS RULES) & PENJAMINAN INTEGRITAS

1. **Aturan Kurikulum Industri & Bengkel AHASS:**
   - Program Keahlian TBSM menerapkan komposisi pembelajaran **70% Praktik dan 30% Teori**.
   - Setiap sarana bengkel wajib mencantumkan standar Kesehatan dan Keselamatan Kerja (K3) serta kondisi kelaikan (`condition`: good, fair, poor) untuk menjaga standar sertifikasi Astra Honda Motor.

2. **Aturan Kemitraan DUDI & Pelaksanaan PKL:**
   - Hubungan kerjasama dengan mitra industri (`industry_partners`) dipayungi oleh nomor MoU yang sah (`mou_number`) serta rentang masa berlaku (`mou_start_date` sampai `mou_end_date`).
   - Penempatan magang (`internships`) hanya dapat diselenggarakan pada mitra industri yang memiliki status aktif. Cabang bengkel AHASS (`industry_partner_branches`) membatasi penerjunan siswa berdasarkan kuota magang maksimal (`internship_quota`).

3. **Aturan Bursa Kerja Khusus (BKK) & Rekrutmen:**
   - Lowongan pekerjaan (`job_vacancies`) wajib memiliki tanggal batas akhir pendaftaran (`application_deadline`). Sistem secara berkala menyaring lowongan kedaluwarsa dari penayangan publik.
   - Pendaftaran pelamar difasilitasi melalui tombol lamar yang mengarah langsung ke email resmi DUDI (`application_email`) atau formulir seleksi daring (`application_url`).

4. **Aturan Tracer Study Alumni (Pilar BMW):**
   - Lulusan diklasifikasikan ke dalam salah satu dari tiga pilar vokasi:
     - **Bekerja:** Wajib mencantumkan nama perusahaan (`current_company`) dan posisi pekerjaan (`current_occupation`).
     - **Melanjutkan:** Mencantumkan nama perguruan tinggi / institusi pendidikan lanjutan (`education`).
     - **Wirausaha:** Mencantumkan bidang usaha mandiri di bidang otomotif atau sektor komersial.

5. **Aturan Integritas Unduhan & Keamanan Pesan Kontak:**
   - Rute pengunduhan berkas dilindungi oleh mekanisme streaming file controller yang memvalidasi keberadaan file biner fisik sebelum menaikkan penghitung `download_count` secara atomic untuk menghindari *race conditions*.
   - Rute formulir kontak dilindungi oleh middleware *Rate Limiting* (`throttle:5,1`), yang membatasi pengiriman maksimal 5 pesan per menit dari IP yang sama guna mencegah serangan spam dan eksploitasi form.
