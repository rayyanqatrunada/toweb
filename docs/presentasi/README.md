# PANDUAN LENGKAP & INDEKS LAPORAN PRESENTASI PROYEK TBSM WEB
## DOKUMENTASI RESMI 5 POIN PENILAIAN PRESENTASI AKHIR

**Aplikasi:** TBSM WEB — Sistem Informasi Vokasi & Bursa Kerja Khusus (BKK)  
**Institusi:** Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM) — SMK Negeri 1 Bangsri  
**Kemitraan Industri:** Binaan Resmi PT Astra Honda Motor (AHM)  
**Tahun:** 2026  

---

## 📌 Indeks Berkas Laporan Terpisah (5 Poin Penilaian)

Laporan telah disusun secara mendalam, lengkap, dan terpisah untuk masing-masing poin rubrik penilaian:

| No | Poin Penilaian | Berkas Markdown Lengkap | Topik Bahasan Utama |
| :---: | :--- | :--- | :--- |
| **1** | **Struktur Data, Relasi & Arsitektur** | [`POIN_1_STRUKTUR_DATA_RELASI_DAN_ARSITEKTUR.md`](POIN_1_STRUKTUR_DATA_RELASI_DAN_ARSITEKTUR.md) | Arsitektur 3-Tier MVC, Skema 26 Tabel MariaDB, ERD Mermaid, Foreign Key Cascade/Restrict, Model Eloquent, dan RBAC Otorisasi Admin vs Guest. |
| **2** | **Fitur Inti Sesuai Backlog & Demo Sistem** | [`POIN_2_FITUR_INTI_DAN_DEMO_SISTEM.md`](POIN_2_FITUR_INTI_DAN_DEMO_SISTEM.md) | Pemenuhan 10 fitur utama backlog, diagram alir transaksi pesan kontak & warta, validasi berlapis FormRequest, halaman error 404/500, dan skenario demo live. |
| **3** | **UI/UX Figma & Responsivitas** | [`POIN_3_UI_UX_FIGMA_DAN_RESPONSIVITAS.md`](POIN_3_UI_UX_FIGMA_DAN_RESPONSIVITAS.md) | Keselarasan Figma Design System Astra Honda, tipografi Chivo & Inter, navigasi Sub-Navbar & Mobile Bottom Bar, usabilitas heuristik, dan audit resolusi layar (Mobile, Tablet, Laptop 125% Scale, Desktop). |
| **4** | **Kualitas Kode & Modularitas** | [`POIN_4_KUALITAS_KODE_DAN_MODULARITAS.md`](POIN_4_KUALITAS_KODE_DAN_MODULARITAS.md) | Kepatuhan PSR-1/4/12, konvensi penamaan bersih, modularitas Blade Component & Service Layer (`SettingsService`), exception handling, dan pembuktian 82 automated test cases (100% green). |
| **5** | **Manajemen Proyek & Scrum** | [`POIN_5_MANAJEMEN_PROYEK_DAN_SCRUM.md`](POIN_5_MANAJEMEN_PROYEK_DAN_SCRUM.md) | Product Backlog MoSCoW, 4 siklus Sprint, pembagian peran RACI, Sprint Retrospective (pemadatan FAQ, perapian menu admin 5 grup, terminal DevOps), dan traceability matrix. |
| **PB** | **Rincian 12 Product Backlog** | [`PRODUCT_BACKLOG_12_POIN.md`](PRODUCT_BACKLOG_12_POIN.md) | Dokumen resmi rincian 12 Product Backlog (PB-01 s.d. PB-12) lengkap dengan User Story, Kriteria Keberhasilan (AC), model data, dan estimasi Story Points. |

---

## 🎨 Asset Slide Presentasi (16:9 Widescreen Full HD - PNG & SVG)

Untuk kebutuhan slide deck presentasi (PowerPoint / Google Slides / Canva / Keynote), telah disediakan diagram visual definisi tinggi (1920x1080) dengan tata letak rapi, font modern, dan aksen warna resmi TBSM & Astra Honda Motor:

1. **Diagram Alir (Flowchart User Journey Publik):**
   * Format Vektor: [`FLOWCHART_PRESENTASI.svg`](FLOWCHART_PRESENTASI.svg)
   * Format Raster Siap Pakai: [`FLOWCHART_PRESENTASI.png`](FLOWCHART_PRESENTASI.png)
   * *Fitur:* Menggunakan standar simbol flowchart ANSI (Terminator, Input/Output jajar genjang, Proses persegi panjang, Keputusan belah ketupat) membagi alur navigasi menjadi 5 kanal layanan utama (Kurikulum, Bengkel, BKK, Publikasi, Form Kontak).

2. **Diagram Relasi Entitas (ERD Garis Besar):**
   * Format Vektor: [`ERD_PRESENTASI.svg`](ERD_PRESENTASI.svg)
   * Format Raster Siap Pakai: [`ERD_PRESENTASI.png`](ERD_PRESENTASI.png)
   * *Fitur:* Menyederhanakan 26 tabel database menjadi 16 entitas inti konseptual dalam 3 tier horizontal (Keamanan & Konfigurasi, Akademik & Fasilitas, Kemitraan Industri & Media) lengkap dengan relasi kardinalitas 1:N dan badge pill PK, FK, UK tanpa garis yang saling bertumpuk.

3. **Koleksi Full-Page Desktop Screenshots (23 Halaman):**
   * Folder Direktori: [`docs/screenshots/desktop/`](../screenshots/desktop/) atau [`docs/presentasi/screenshots/desktop/`](screenshots/desktop/)
   * Katalog Lengkap: [`docs/screenshots/README.md`](../screenshots/README.md)
   * *Fitur:* Tangkapan layar penuh (navbar sampai footer) dari 16 halaman utama + 7 halaman detail sistem (Beranda, Profil, Kurikulum, Fasilitas Bengkel AHASS, Prestasi LKS, Loker BKK, Tracer Alumni, Form Kontak, dll.) dengan animasi ter-reveal sempurna untuk slide mockup & demo presentasi.

---

## ⏱️ Strategi & Alokasi Waktu Presentasi (Total: 15 Menit)

Gunakan panduan waktu berikut agar presentasi berjalan runut, percaya diri, dan tidak melebihi batas waktu:

```mermaid
gantt
    title Alokasi Waktu Presentasi Tim (Total 15 Menit)
    dateFormat  m
    axisFormat  %M m
    Pembukaan & Latar Belakang TBSM  :0, 2m
    Poin 1: Arsitektur & Database   :2, 5m
    Poin 2: Demo Fitur & Validasi   :5, 8m
    Poin 3: Demo UI/UX & Responsif  :8, 11m
    Poin 4: Penjelasan Source Code  :11, 13m
    Poin 5: Manajemen Scrum & QnA   :13, 15m
```

1. **Menit 00:00 - 02:00 (Pembukaan):**
   * Salam, perkenalan anggota tim dan peran masing-masing (PO, Scrum Master, FE, BE, QA).
   * Latar belakang: Membangun portal resmi TBSM SMKN 1 Bangsri berstandar Pos Tefa Astra Honda Motor untuk menghubungkan siswa, guru, alumni, dan industri AHASS.
2. **Menit 02:00 - 05:00 (Poin 1 - Arsitektur & Data):**
   * Tunjukkan diagram arsitektur MVC Laravel 11 + Filament v3.
   * Perlihatkan ERD 26 tabel dan jelaskan integritas kunci asing (*Foreign Key CASCADE/RESTRICT*).
   * Jelaskan proteksi role/hak akses antara publik dan administrator.
3. **Menit 05:00 - 08:00 (Poin 2 - Demo Fitur Inti & Validasi):**
   * Demo fitur publik: Navigasi kurikulum, bengkel, kemitraan AHASS, lowongan kerja BKK.
   * Demo validasi form kontak: Masukkan input salah (muncul pesan error) -> masukkan input benar (berhasil terkirim).
   * Demo error handling: Buka URL acak untuk memperlihatkan halaman kustom 404.
4. **Menit 08:00 - 11:00 (Poin 3 - Desain Figma & Responsivitas):**
   * Tunjukkan keselarasan tema warna resmi Astra Honda Red `#DC2626` dan karakter tipografi Chivo.
   * Tunjukkan navigasi *Horizontal Sub-Navbar* dan *Accordion FAQ* yang baru saja dioptimasi menjadi **compact dan ringkas**.
   * Buka DevTools (F12): Tunjukkan tampilan responsif mobile (dengan Bottom Nav Bar) dan tampilan laptop skala 125%.
5. **Menit 11:00 - 13:00 (Poin 4 - Kualitas Kode & Automated Testing):**
   * Tunjukkan pohon direktori kode (modular Blade components, FormRequests, Models).
   * Jalankan automated testing secara langsung: `php artisan test --filter=FrontendPublicTest` (tunjukkan terminal hijau 100% pass).
6. **Menit 13:00 - 15:00 (Poin 5 - Scrum & Penutup):**
   * Jelaskan pembagian 4 Sprint dan prioritas MoSCoW.
   * Ceritakan hasil *Sprint Retrospective*: Bagaimana tim mendengarkan feedback dan memadatkan FAQ serta merapikan menu admin dari 11 grup menjadi 5 grup terstruktur.
   * Penutup dan siap membuka sesi tanya jawab dengan dewan penguji.

---

## 💡 Tips & Jawaban Cerdas untuk Pertanyaan Penguji (Q&A Cheat-Sheet)

* **T: Mengapa memilih Filament v3 daripada membuat CRUD admin sendiri dari nol?**  
  *J:* *"Filament v3 memanfaatkan arsitektur Livewire 3 yang sangat modular dan aman secara default (sudah memiliki CSRF protection, rate limiting, form validation, dan auto-authorization). Hal ini memungkinkan tim kami berfokus pada logika bisnis kurikulum dan kemitraan industri daripada mengulang pembuatan antarmuka tabel admin berulang-ulang."*

* **T: Bagaimana Anda memastikan data tidak hilang saat tabel berelasi dihapus?**  
  *J:* *"Kami menerapkan aturan integritas basis data yang ketat. Untuk data relasi yang krusial seperti Kategori Berita, kami menggunakan `ON DELETE RESTRICT` sehingga kategori tidak bisa dihapus jika masih ada artikel terkait. Sedangkan untuk data yang mutlak bergantung seperti Item Galeri di dalam Album, kami menerapkan `ON DELETE CASCADE` agar tidak ada data sampah (orphan records)."*

* **T: Mengapa kemarin bagian FAQ dan menu admin diperbaiki lagi?**  
  *J:* *"Itu adalah bagian dari proses Sprint Retrospective kami. Kami mengaudit bahwa pada layar laptop penguji dengan display scale 125%, section beranda dan FAQ memakan ruang vertikal terlalu besar. Kami memadatkan padding dan merampingkan font serta kartu agar 5 pertanyaan terlihat sekaligus tanpa harus scrolling berlebihan. Selain itu, menu admin yang sebelumnya 11 grup dirampingkan menjadi 5 grup logis agar panel admin rapi dan ringkas."*

---

> [!TIP]
> Semua berkas laporan ini siap dibuka langsung di browser/markdown viewer maupun dicetak menjadi berkas fisik pendukung penilaian presentasi.
