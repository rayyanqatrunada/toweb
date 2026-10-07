# LAPORAN KOMPREHENSIF PROYEK WEB TBSM
## Portal Informasi & Sistem Manajemen Terintegrasi Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM)

> **Versi Dokumentasi:** 2.4.0 (Pasca Refactoring & Penguatan Keamanan)  
> **Tanggal Pembaruan:** Oktober 2026  
> **Status Sistem:** Siap Produksi (*Production Ready*) | 87/87 Unit & Feature Tests Lulus (100%)  
> **Framework Utama:** Laravel 11.x | Filament 3.x | Tailwind CSS | Livewire 3.x  

---

## 📌 Daftar Isi Dokumen Laporan

Laporan ini disusun secara modular dan terpisah untuk memudahkan peninjauan teknis, akademis, dan manajerial. Silakan pilih bagian yang ingin dipelajari:

| No | Dokumen Laporan | Fokus Pembahasan |
|---|---|---|
| **01** | [**01_RINGKASAN_EKSEKUTIF_DAN_TUJUAN.md**](01_RINGKASAN_EKSEKUTIF_DAN_TUJUAN.md) | Latar belakang, visi & misi jurusan TBSM, tujuan strategis pengembangan web, target pengguna, dan nilai tambah sistem. |
| **02** | [**02_ARSITEKTUR_DAN_STACK_TEKNOLOGI.md**](02_ARSITEKTUR_DAN_STACK_TEKNOLOGI.md) | Arsitektur perangkat lunak, spesifikasi teknologi backend, frontend, database, library pendukung, dan prasyarat server hosting. |
| **03** | [**03_STRUKTUR_HALAMAN_DAN_FITUR.md**](03_STRUKTUR_HALAMAN_DAN_FITUR.md) | Rincian lengkap seluruh halaman publik (Frontend), navigasi antarmuka, tata letak responsif, serta interaktivitas pengguna. |
| **04** | [**04_SISTEM_ADMINISTRASI_DAN_CMS.md**](04_SISTEM_ADMINISTRASI_DAN_CMS.md) | Panel admin berbasis Filament v3, modul manajemen data, widget dashboard interaktif, role & permission, serta alur publikasi konten. |
| **05** | [**05_KEAMANAN_DAN_AUDIT_LOG_IP.md**](05_KEAMANAN_DAN_AUDIT_LOG_IP.md) | Arsitektur keamanan berlapis, proteksi direktori upload, audit log perubahan dengan pelacakan IP & jenis perangkat, kebijakan password, dan anti-brute force. |
| **06** | [**06_PERUBAHAN_DAN_PENGHAPUSAN_FITUR.md**](06_PERUBAHAN_DAN_PENGHAPUSAN_FITUR.md) | Dokumentasi perubahan signifikan: fitur yang dihapus (Pencarian Global, Modul Unduhan) serta fitur yang diperbaiki & ditingkatkan (Agregasi Galeri, Mobile Fasilitas). |
| **07** | [**07_PANDUAN_DEPLOYMENT_DAN_PEMELIHARAAN.md**](07_PANDUAN_DEPLOYMENT_DAN_PEMELIHARAAN.md) | Prosedur peluncuran (*deployment*) ke cPanel/VPS, panduan utilitas web `update-repo.php`, sinkronisasi aset gambar, pemeliharaan rutin, dan mitigasi kendala (*troubleshooting*). |

---

## 🎯 Ringkasan Eksekutif Sistem

Portal Web TBSM dirancang untuk mentransformasikan kehadiran digital program keahlian Teknik dan Bisnis Sepeda Motor SMK ke tingkat profesional, modern, dan informatif. 

### Pilar Utama Sistem:
1. **Representasi Industri Otomotif Standar Pabrikan:** Tampilan antarmuka yang modern, dinamis, dan responsif dengan identitas visual khas bengkel resmi (standar Yamaha / APM terkemuka).
2. **Sentralisasi Dokumentasi & Prestasi:** Menampilkan rekam jejak siswa, fasilitas bengkel praktik, sertifikasi kompetensi, serta berita kegiatan dalam satu portal terpadu.
3. **Agregasi Galeri Multi-Entitas Tanpa Gambar Rusak (*Zero Broken Images*):** Seluruh aset foto dari prestasi, fasilitas, dan warta diintegrasikan ke galeri publik dengan prioritas aset beresolusi nyata dan fallback cerdas dinamis ~6KB.
4. **Keamanan & Akuntabilitas Multi-Admin:** Dilengkapi pencatatan alamat IP dan jenis perangkat pada setiap perubahan data, proteksi file script pada direktori publik, serta rate limiting protektif.
5. **Kemudahan Pemeliharaan Hosting Shared/VPS:** Dilengkapi alat pemeliharaan instan berbasis antarmuka grafis (`update-repo.php`) untuk sinkronisasi repository git, link storage, dan regenerasi aset tanpa harus selalu membuka terminal SSH.

---

## 📊 Matriks Status Pengujian Sistem

Sistem telah diuji secara menyeluruh menggunakan rangkaian pengujian otomatis (*automated testing suite*) PHPUnit & Pest dengan hasil sebagai berikut:

- **Total Test Cases:** 87 pengujian aktif
- **Total Assertions:** 280 asersi logika & data
- **Status Kelulusan:** 100% Berhasil (*Passed*)
- **Cakupan Pengujian:**
  - Validasi halaman publik & respon HTTP 200 (`FrontendPublicTest`, `FrontendRouteTest`)
  - Manajemen konten galeri & relasi multi-foto (`GalleryCmsTest`)
  - Kebijakan keamanan kata sandi & validasi kebocoran akun (`AdminProfileTest`)
  - Otentikasi dan hak akses panel admin
  - Sanitasi file dan pembatasan tipe file upload
