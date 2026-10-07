# LAPORAN 03: STRUKTUR HALAMAN DAN FITUR FRONTEND
## Panduan Komprehensif Antarmuka Publik Pengguna

---

## 1. Peta Navigasi dan Alur Halaman Publik

Sistem dirancang dengan hierarki informasi yang intuitif, memandu calon siswa, wali murid, dan mitra industri menemukan data penting secara cepat dan mudah:

```
                              ┌────────────────────┐
                              │    BERANDA (/)     │
                              └─────────┬──────────┘
                                        │
     ┌──────────────────┬───────────────┼───────────────┬──────────────────┐
     │                  │               │               │                  │
     ▼                  ▼               ▼               ▼                  ▼
┌──────────┐    ┌──────────────┐ ┌──────────────┐ ┌───────────┐     ┌─────────────┐
│ TENTANG  │    │   AKADEMIK   │ │    GALERI    │ │  BERITA   │     │  KEMITRAAN  │
│ (/tentang)│   ├──────────────┤ │  (/galeri)   │ │ (/berita) │     │ (/industri) │
└──────────┘    │ • Fasilitas  │ └──────────────┘ └───────────┘     └─────────────┘
                │ • Kurikulum  │                                           │
                └──────────────┘                                           ▼
                                                                    ┌─────────────┐
                                                                    │   ALUMNI    │
                                                                    │  (/alumni)  │
                                                                    └─────────────┘
```

---

## 2. Rincian Seluruh Halaman Publik

### A. Halaman Beranda / Home (`/`)
Laman utama yang berfungsi sebagai representasi visual dan gerbang informasi utama jurusan:
1. **Hero Banner Slider Dinamis:**
   - Menampilkan slide foto kegiatan bengkel dan slogan jurusan beresolusi tinggi.
   - Dilengkapi fallback cerdas berbasis SVG inline apabila foto belum diunggah, mencegah tampilan kosong.
   - Tombol Call-to-Action (CTA) langsung menuju halaman fasilitas dan formulir pendaftaran.
2. **Statistik Kunci (*Quick Counters*):**
   - Menampilkan indikator angka prestasi: rasio keterserapan alumni di industri, jumlah unit motor praktik, jam pelatihan bengkel standar pabrikan, dan jumlah mitra bengkel resmi.
3. **Section "Keunggulan TBSM" (*Why Choose Us*):**
   - Menjabarkan 4 pilar kompetensi: Kurikulum Terintegrasi Industri, Fasilitas Bengkel Standar APM, Instruktur Bersertifikasi BNSP, dan Pembinaan Karir Terarah.
4. **Kurikulum Berbasis Kompetensi Industri:**
   - Rangkuman visual 4 fokus pembelajaran: Pemeliharaan Mesin Otomotif, Sistem Elektronik EFI, Rangka & Sasis Suspensi, serta Kewirausahaan Bengkel (*TEFA*).
5. **Daftar Mitra Industri Terkemuka:**
   - Logo dan nama perusahaan rekanan (Yamaha Motor, jaringan bengkel resmi AHASS, distributor suku cadang, dan asosiasi bengkel otomotif).
6. **Sorotan Testimoni Alumni & Warta Terkini:**
   - Kutipan pengalaman karir nyata dari alumni yang telah bekerja di industri.
   - Cuplikan 3 berita dan agenda kegiatan terbaru dengan foto sampul dan tanggal.

---

### B. Halaman Profil Jurusan (`/tentang`)
Laman komprehensif mengenai sejarah dan identitas kelembagaan:
1. **Latar Belakang & Sejarah Pendirian:** Cerita dedikasi pendirian jurusan TBSM dalam menjawab kebutuhan teknisi otomotif roda dua nasional.
2. **Visi & Misi Kejuruan:** Panduan strategis sasaran capaian lulusan berakhlak mulia, kompeten, dan adaptif terhadap inovasi otomotif.
3. **Profil Tim Pengajar & Instruktur:**
   - Foto formal para guru produktif dan instruktur bengkel.
   - Kualifikasi akademik, bidang spesialisasi (Mesin / Kelistrikan / Manajemen), dan nomor sertifikasi profesi (LSP/BNSP).
4. **Standar Sarana & Budaya Kerja Industri:** Penjelasan penerapan budaya kerja *5S / 5R* (Ringkas, Rapi, Resik, Rawat, Rajin) dan Keselamatan dan Kesehatan Kerja (K3) di bengkel sekolah.

---

### C. Halaman Fasilitas Bengkel (`/akademik/fasilitas`)
Showcase sarana pembelajaran praktik siswa dengan fitur interaktif yang telah dioptimasi untuk perangkat bergerak:
1. **Katalog Unit Fasilitas:**
   - Foto unit alat, judul fasilitas, dan deskripsi singkat fungsi dalam pembelajaran.
   - Kategori fasilitas: Area Servis Cepat (*Quick Service*), Ruang Overhaul Mesin, Ruang Sistem Kelistrikan & EFI, dan Ruang Alat Khusus (*Special Service Tools - SST*).
2. **Tombol Responsif "Lihat Spesifikasi":**
   - **Tampilan Desktop:** Label lengkap `Lihat Spesifikasi Lengkap` dengan padding lega.
   - **Tampilan Mobile:** Label otomatis diringkas menjadi `Lihat Selengkapnya` dengan padding kompak (`px-3 py-1.5`, font `11px`), menjaga estetika kartu tanpa teks meluap (*text overflow*).
3. **Modal Dialog Detail Fasilitas:**
   - Membuka popup spesifikasi teknis (merk alat, spesifikasi daya, kapasitas angkat, dan panduan penggunaan praktikum).
   - Telah diperbaiki dari bug modal hilang: kini menggunakan modal state Alpine.js yang kokoh, dilengkapi tombol tutup (*Close*) dan deteksi klik di luar jendela.

---

### D. Halaman Kurikulum & Kompetensi (`/akademik/kurikulum`)
Struktur pembelajaran akademik yang diselaraskan dengan standar industri:
1. **Distribusi Jenjang Tingkat:**
   - **Kelas X:** Pengenalan Dasar-Dasar Kejuruan Otomotif (K3LH, Gambar Teknik, Teknologi Mekanik, Hand Tools).
   - **Kelas XI:** Pemeliharaan Mesin, Kelistrikan Dasar & Pengapian, Sistem Pemindah Tenaga, dan Servis Berkala.
   - **Kelas XII:** Diagnosis Canggih Sensor EFI, Overhaul Total, Sistem Pengereman ABS, dan Praktik Kerja Lapangan (PKL) di bengkel resmi rekanan.
2. **Sinkronisasi Industri:** Paparan integrasi modul sertifikasi dari pabrikan mitra ke dalam silabus sekolah.

---

### E. Halaman Galeri Foto Terpadu (`/galeri`)
Pusat dokumentasi visual terpadu yang telah diperbarui secara masif:
1. **Sistem Agregasi Foto Lintas Entitas:**
   - Mengumpulkan seluruh aset foto dari 4 sumber berbeda: **Album Galeri Kegiatan**, **Prestasi Siswa**, **Fasilitas Bengkel**, dan **Warta/Berita**.
2. **Sistem Tab Filter Kategori Interaktif:**
   - `Semua Foto`: Menampilkan keseluruhan aset yang telah diurutkan berdasarkan prioritas.
   - `Albums`: Dokumentasi album kegiatan umum (upacara, kunjungan industri, perpisahan).
   - `Prestasi Siswa`: Foto piala, medali, dan piagam kemenangan siswa di ajang LKS atau kontes mekanik.
   - `Fasilitas Bengkel`: Foto sarana alat bengkel dan ruang praktikum.
   - `Warta & Berita`: Foto liputan artikel dan berita kegiatan harian.
3. **Algoritma Pemilahan Prioritas (*Priority Sort*):**
   - Item yang memiliki file foto nyata di disk server (ukuran $\ge 6\text{ KB}$) secara otomatis diletakkan pada posisi paling atas halaman.
   - Item yang mengandalkan fallback atau belum memiliki file diletakkan di bagian bawah secara rapi.
4. **Fallback Dinamis Anti-Gambar Rusak (*Zero Broken Images*):**
   - Setiap kartu foto dilengkapi handler `onerror` dengan placeholder SVG bawaan bergaya otomotif. Pengunjung tidak akan pernah menemui kotak silang merah atau gambar rusak.

---

### F. Halaman Warta & Berita (`/berita` dan `/berita/{slug}`)
Portal media informasi berkala:
1. **Arsip Berita:**
   - Filter berdasarkan kategori berita (Agenda, Prestasi, Workshop, Pengumuman).
   - Paginasi rapi dengan indikator waktu publikasi relatif (misal: "2 hari yang lalu").
2. **Halaman Baca Artikel:**
   - Judul berita ramah SEO, nama penulis, dan kategori.
   - Konten artikel berformat teks kaya (*rich text*) dengan format gambar, kutipan, dan paragraf rapi.
   - Rekomendasi berita terkait di bagian bawah untuk memperpanjang durasi kunjungan pembaca.

---

### G. Halaman Kemitraan Industri (`/industri`) & Alumni (`/alumni`)
1. **Kemitraan Industri:**
   - Menjelaskan model kerja sama: Praktek Kerja Lapangan (PKL) 6 bulan, Guru Tamu dari bengkel resmi, donasi unit mesin untuk media ajar, dan program rekrutmen mekanik langsung di sekolah.
2. **Alumni & Jejak Karir:**
   - Direktori profil lulusan dengan foto, nama, tahun kelulusan, dan jabatan/tempat kerja saat ini (misal: *Service Advisor di Yamaha*, *Owner Bengkel Mandiri*, *Mahasiswa Teknik Mesin*).
   - Kutipan motivasi dan tips dari alumni untuk adik-adik kelas yang masih menempuh studi.

---

### H. Komponen Navigasi Global
1. **Header Navbar Desktop:**
   - Logo resmi jurusan dan teks identitas sekolah.
   - Menu navigasi dengan indikator halaman aktif (*active link state*).
   - Tombol cepat akses Kontak WhatsApp.
2. **Mobile Bottom Navigation Bar:**
   - Menu navigasi tetap (*fixed bottom bar*) di bagian bawah layar smartphone untuk akses ibu jari yang nyaman: **Beranda**, **Fasilitas**, **Galeri**, **Berita**, dan **Kontak**.
3. **Footer Terstruktur:**
   - Informasi kontak resmi (Alamat fisik sekolah, No. Telepon bengkel, Email resmi, Jam buka bengkel).
   - Peta interaktif Google Maps lokasi bengkel praktik.
   - Hak cipta dan tautan akses admin terproteksi.
