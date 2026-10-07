# LAPORAN 01: RINGKASAN EKSEKUTIF DAN TUJUAN STRATEGIS
## Portal Informasi Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM)

---

## 1. Latar Belakang Proyek

Perkembangan teknologi kendaraan bermotor roda dua melaju dengan sangat pesat, ditandai dengan adopsi luas sistem injeksi elektronik (*Electronic Fuel Injection*), sistem rem ABS, diagnosa komputer terkomputerisasi (*diagnostic tool*), hingga peralihan menuju era sepeda motor listrik (*Electric Vehicle*). Di tengah tuntutan industri yang dinamis ini, program keahlian **Teknik dan Bisnis Sepeda Motor (TBSM)** di tingkat Sekolah Menengah Kejuruan (SMK) dituntut tidak hanya mampu mencetak mekanik terampil, tetapi juga teknisi cerdas yang memiliki jiwa kewirausahaan (*technopreneurship*) dan standar kerja industri modern.

Sebelum adanya sistem web terpadu ini, keterbukaan informasi mengenai kompetensi, sarana bengkel, dan prestasi jurusan TBSM menghadapi berbagai hambatan:
- **Dokumentasi yang Terfragmentasi:** Portofolio kegiatan siswa dan fasilitas bengkel sering kali hanya tersebar di media sosial non-resmi atau tersimpan dalam arsip luring yang sulit diakses oleh masyarakat umum.
- **Kesenjangan Informasi Kemitraan Industri:** Mitra Dunia Usaha dan Dunia Industri (DUDI) seperti bengkel resmi pabrikan (Astra Honda Motor, Yamaha Motor, bengkel rekanan lokal) membutuhkan transparansi kurikulum dan standar bengkel binaan untuk menyepakati program PKL, magang, dan penyerapan tenaga kerja.
- **Citra Jurusan di Mata Calon Siswa dan Orang Tua:** Diperlukan representasi digital yang berwibawa, modern, dan informatif untuk meyakinkan calon peserta didik bahwa jurusan TBSM bukan sekadar "bengkel oli", melainkan pusat keunggulan teknologi otomotif berstandar APM.

Oleh karena itu, proyek web portal **TBSM WEB** ini dikembangkan sebagai portal resmi jurusan yang menyatukan media publikasi publik (*front-facing showcase*) dengan sistem manajemen konten mandiri (*self-hosted content management system*) yang aman, cepat, dan mudah dirawat.

---

## 2. Profil Jurusan TBSM

Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM) membekali peserta didik dengan pengetahuan dan keterampilan komprehensif, mencakup:
1. **Teknologi Mesin (*Engine System*):** Pemeliharaan berkala, pembongkaran, pengukuran komponen presisi, dan perbaikan mesin bensin 4-langkah dan matic.
2. **Sistem Sasis & Suspensi (*Chassis & Suspension*):** Rangka, geometri kemudi, suspensi teleskopik & monosok, sistem pengereman hidrolik, dan roda.
3. **Kelistrikan & Elektronika Bodi (*Electrical & EFI Systems*):** Sistem pengapian transistor, kelistrikan starter, pencahayaan LED, sensor EFI, injektor, ECU, dan troubleshooting sensor menggunakan scanner diagnostik.
4. **Manajemen Bisnis Bengkel & Layanan Pelanggan:** Pengelolaan suku cadang (*spare parts inventory*), alur kerja *service advisor*, estimasi biaya servis, dan tata kelola unit usaha bengkel sekolah (*Teaching Factory / TEFA*).

---

## 3. Tujuan dan Sasaran Pengembangan

### A. Tujuan Utama (Goals)
1. **Membangun Identitas Digital Profesional (*Digital Branding*):** Memperkenalkan jurusan TBSM dengan standar visual otomotif berkelas tinggi, modern, dan responsif di seluruh perangkat (smartphone, tablet, desktop).
2. **Meningkatkan Kepercayaan Calon Peserta Didik & Orang Tua:** Menyajikan informasi kurikulum, profil guru pengampu, keunggulan program, dan rekam jejak alumni secara transparan dan menarik.
3. **Memperkuat Sinergi dengan Mitra Industri (DUDI):** Menyediakan laman khusus yang memaparkan kerja sama industri, sertifikasi standar bengkel resmi (misal: Yamaha Kelas Khusus / binaan APM), serta mekanisme rekrutmen lulusan.
4. **Mempublikasikan Fasilitas dan Sarana Bengkel:** Memvisualisasikan fasilitas bengkel praktik, unit sepeda motor uji praktik, peralatan hidrolik *bike lift*, ruang alat (*tool room*), dan instrumen diagnostik canggih.
5. **Menyediakan Pusat Dokumentasi Kegiatan Terpadu:** Mengagregasikan seluruh foto prestasi siswa, praktikum bengkel, kunjungan industri, dan warta kegiatan tanpa risiko tautan foto rusak (*zero broken images*).

### B. Sasaran Pengguna (Target Audience)
Sistem ini dirancang untuk melayani lima kelompok pengguna utama:
1. **Calon Siswa & Wali Murid:** Memperoleh gambaran jelas mengenai prospek karir, biaya, fasilitas, kurikulum, dan prestasi jurusan sebelum memutuskan pendaftaran sekolah (PPDB).
2. **Siswa Aktif:** Mengakses warta pengumuman, jadwal kegiatan, dan referensi akademik jurusan.
3. **Alumni:** Menjaga jejaring dengan almamater, membagikan testimoni karir, dan memfasilitasi program berbagi lowongan kerja dari industri tempat mereka berkarier.
4. **Mitra Industri (DUDI) & Komunitas Otomotif:** Meninjau kesiapan sarana bengkel untuk uji sertifikasi kompetensi (LSP/BNSP), kerja sama magang PKL, dan perekrutan mekanik muda.
5. **Guru & Pengelola Jurusan (Admin CMS):** Mengelola publikasi konten web secara mandiri, aman, dan tercatat tanpa perlu memiliki keahlian pemrograman web.

---

## 4. Nilai Tambah dan Keunggulan Strategis

1. **Kecepatan dan Performa Tinggi:** Dibangun di atas fondasi Laravel 11 dan Tailwind CSS, halaman web memuat dengan sangat cepat, hemat kuota internet, dan dioptimalkan untuk perangkat seluler.
2. **Desain Visual Eksklusif (Non-Templated AI):** Mengadopsi palet warna berkarakter otomotif (Merah TBSM, Charcoal, Abu-abu Presisi), tipografi tajam (*Inter / Heading modern*), dan tata letak dinamis yang tidak menyerupai template generik.
3. **Transparansi dan Akuntabilitas Multi-Pengguna:** Dilengkapi sistem audit log yang mencatat alamat IP asli dan tipe perangkat pada setiap aktivitas pengubahan konten oleh admin.
4. **Resiliensi Media:** Mekanisme penanganan foto cerdas memastikan bahwa walaupun file di server hosting hilang atau belum terunggah, antarmuka tetap menampilkan fallback berukuran ringan (~6KB) sehingga pengunjung tidak pernah melihat kotak gambar rusak.
5. **Siap Dioperasikan di Berbagai Jenis Hosting:** Arsitektur sistem dapat berjalan optimal baik di shared hosting cPanel hemat biaya maupun di server cloud VPS dengan ketersediaan alat `update-repo.php`.
