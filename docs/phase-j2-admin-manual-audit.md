# Phase J2: Admin Manual & CMS Operation Audit

## 1. CMS Inventory

### Custom Pages
- `ManageSettings`: Mengatur identitas website, Hero Beranda, Profil Jurusan, Informasi Kontak, dan Media Sosial.

### Resources
| Menu | Fungsi | Create | Edit | Delete | Upload | Status | Relation |
|---|---|---|---|---|---|---|---|
| **Achievements** | Prestasi Siswa | Yes | Yes | Yes | Yes (photo) | Yes (published/draft) | Category |
| **Alumnis** | Data Alumni | Yes | Yes | Yes | Yes (photo) | Yes (published/draft) | User |
| **Announcements** | Pengumuman | Yes | Yes | Yes | Yes (file_attachment) | Yes (is_active) | - |
| **Categories** | Kategori Post | Yes | Yes | Yes | No | - | Posts |
| **Competencies** | Kompetensi Program | Yes | Yes | Yes | No | - | Program |
| **DownloadCategories** | Kategori Unduhan | Yes | Yes | Yes | No | - | Downloads |
| **Downloads** | File Unduhan Publik | Yes | Yes | Yes | Yes (file_path) | Yes (published/draft) | Category |
| **Facilities** | Fasilitas Bengkel | Yes | Yes | Yes | Yes (photo) | - | - |
| **GalleryAlbums** | Album Galeri | Yes | Yes | Yes | Yes (thumbnail) | Yes (published/draft) | GalleryItems |
| **GalleryItems** | Foto Galeri | Yes | Yes | Yes | Yes (file_path) | Yes (is_featured) | Album |
| **IndustryPartners** | Mitra Industri | Yes | Yes | Yes | Yes (logo) | Yes (published/draft) | - |
| **Internships** | Info PKL | Yes | Yes | Yes | No | Yes (planned/ongoing/completed) | Partner |
| **JobVacancies** | Lowongan Kerja | Yes | Yes | Yes | No | Yes (open/closed) | Partner |
| **Partnerships** | Kerja Sama (MoU) | Yes | Yes | Yes | Yes (document_file) | Yes (active/completed) | Partner |
| **Posts** | Berita / Artikel | Yes | Yes | Yes | Yes (thumbnail) | Yes (published/draft) | Category, Tags |
| **Programs** | Program Keahlian | Yes | Yes | Yes | Yes (thumbnail) | - | Competencies |
| **Tags** | Tag Post | Yes | Yes | Yes | No | - | Posts |
| **Teachers** | Guru & Staf | Yes | Yes | Yes | Yes (photo) | Yes (is_active) | - |

*(Seluruh inventaris ini diverifikasi berdasarkan `app/Filament/Resources/` aktual dan `app/Models/` aktual. Tidak ada entitas usang/obsolete).*

## 2. Documentation Coverage
- Login: PASS
- Dashboard: PASS
- Settings: PASS
- Academic: PASS
- Content: PASS
- Media: PASS
- Industry: PASS
- Alumni: PASS
- Downloads: PASS
- Security: PASS
- Troubleshooting: PASS

## 3. Accuracy
Informasi ini dipastikan 100% didasarkan pada source code:
- Tabel dan skema model dipastikan merespons `updateOrCreate` saat seed (Phase J1), sehingga UI Filament memiliki inputan yang persis sama.
- Tidak ada *Super Admin* role (Hanya 1 user admin).
- HTML Sanitizer berjalan dan dibahas secara eksplisit di User Manual.

## 4. Missing Information
- Fitur notifikasi realtime tidak didokumentasikan karena tidak ada push notification provider yang dikonfigurasi secara eksplisit.
- Lupa Password (Forgot Password) route bergantung pada otentikasi default Laravel/Filament (jika diaktifkan), kami mengasumsikan reset bergantung ke Admin Utama jika SMTP belum disetel.
