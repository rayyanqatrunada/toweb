# Phase D1 — Official Content Alignment Audit & Plan

Dokumen ini berisi hasil audit *existing schema* dan pemetaan konten resmi dari **Profil Jurusan TO - MPLS.pdf** ke dalam *seeders* aplikasi TOWEB, sesuai instruksi agar PDF menjadi *Single Source of Truth*.

## Pemetaan Konten (Mapping) & Rencana Tindakan

| Phase / PDF Content | Database Entity | Seeder | Database Field Mapping & Action Plan | Status Mapping |
|---------------------|-----------------|--------|--------------------------------------|----------------|
| **1. Identitas & 11. Kontak** | `Setting` | `SettingSeeder` | `site_name` = "Teknik Otomotif"<br>`contact_phone` = "082323429052"<br>`contact_address` = "JL. KH. Achmad Fauzan No. 17 Bangsri Jepara"<br>`contact_email` = "smkn1bangsri@yahoo.co.id"<br>`profile_history` = (disesuaikan dgn berdirinya TSM di 2011) | **PASS** |
| **2. Visi Misi** | `Setting` | `SettingSeeder` | `profile_vision` = "Terbentuknya SDM profesional..."<br>`profile_mission` = "1. Menyiapkan lulusan..." | **PASS** |
| **3. Program & Kompetensi** | `Program`<br>`Competency` | `AcademicDataSeeder` | **Tindakan:** Hapus TKR dan TBO. Hanya gunakan "Teknik dan Bisnis Sepeda Motor".<br>Kompetensi: Mesin, Sasis, Kelistrikan, Pengelolaan Bengkel. (Deskripsi di-copy persis dari PDF). | **PASS** |
| **4. Kurikulum** | *N/A* | *N/A* | **Tindakan:** Tidak ditemukan *entity* khusus kurikulum. Memasukkan struktur mapel yang rumit ke `Program->description` akan merusak UI. Direkomendasikan untuk tidak di-*seed* di fase ini melainkan dikembangkan di CMS sebagai entri dinamis (Post/Halaman Statis). | **NEEDS REVIEW** |
| **5. Guru & Organisasi** | `Teacher` | `AcademicDataSeeder` | **Tindakan:** Hapus guru fiktif. Masukkan 8 nama dari PDF (Laily Rizqissalim [Kajur], Akhmad Lutfianto [Bendahara], dll) ke `position` dan nama. | **PASS** |
| **6. Koneksi Industri** | `IndustryPartner`<br>`Partnership`<br>`Internship` | `IndustryDataSeeder` | **Tindakan:** Hapus mitra fiktif (Oto Mandiri, Bintang Auto). Gunakan "Astra Honda Motor" (sejak 2016).<br>Program (Magang, Pelatihan Guru, Lomba) akan dimasukkan ke `Partnership` dengan `type` yang relevan atau `Internship`. | **PASS** |
| **7. Prestasi** | `Achievement` | `AchievementSeeder`<br>*(saat ini di ContentDataSeeder)* | **Tindakan:** Hapus prestasi fiktif (Olimpiade Mekanik, dll). Masukkan persis 10 poin prestasi dari PDF, extract *rank* (Juara 1, 5, 8) dan tahun. | **PASS** |
| **8. Pilihan Karir** | *N/A* | *N/A* | **Tindakan:** Tidak ada entitas spesifik. Karena bentuknya 3 poin pendek, bisa saja disisipkan di akhir deskripsi entitas `Program` menggunakan HTML `<ol>`. | **NEEDS REVIEW** |
| **9. Fasilitas** | `Facility` | `AcademicDataSeeder` | **Tindakan:** Hapus bengkel fiktif. Hanya cantumkan 1 entitas riil: "Laboratorium Teknik Otomotif" sesuai eksplisit PDF. | **PASS** |
| **10. Tata Tertib** | *N/A* | *N/A* | **Tindakan:** Tidak ada entitas `Rule`. Jika harus masuk *frontend*, konten ini sebaiknya jadi Pengumuman (`Announcement`) dengan judul "Tata Tertib Jurusan" atau disematkan di Profil/Setting. (Akan dibuat di `Announcement` di `ContentDataSeeder`). | **NEEDS REVIEW** |
| **12. Data Hygiene** | Berbagai Model | Berbagai Seeder | **Tindakan:** Seluruh *Lorem Ipsum*, nama guru bule, dsb. akan diganti/dibersihkan. | **PASS** |

> [!WARNING]
> **Open Questions (Membutuhkan Arahan):**
> 1. **Kurikulum (Phase 4):** Karena tidak ada tabel `curriculums`, apakah saya abaikan dulu datanya, atau masukkan sebagai Artikel Berita (`Post`) / Pengumuman?
> 2. **Pilihan Karir (Phase 8):** Apakah Anda setuju poin-poin karir ini saya tambahkan *(append)* ke dalam field `description` pada entitas `Program` (karena masih relevan secara konteks profil)?
> 3. **Tata Tertib (Phase 10):** Apakah Anda setuju Tata Tertib dimasukkan sebagai 1 *record* statis di tabel `announcements`?

### Rencana Eksekusi Teknis
Jika di-Approve, saya akan memodifikasi 4 file *Seeder* utama (`SettingSeeder`, `AcademicDataSeeder`, `IndustryDataSeeder`, `ContentDataSeeder`) tanpa membuat tabel baru, lalu memvalidasi via UAT.

Mohon tinjau tabel dan usulan solusi untuk entitas yang tidak ada (Phase 4, 8, 10).
