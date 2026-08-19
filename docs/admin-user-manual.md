# BUKU PANDUAN PENGGUNA (USER MANUAL) ADMIN CMS
**Website Jurusan Teknik Otomotif SMK Negeri 1 Bangsri (TOWEB)**

---

## DAFTAR ISI
1. [Pengantar & Konsep Dasar](#1-pengantar--konsep-dasar)
2. [Login & Dashboard](#2-login--dashboard)
3. [Pengaturan Website (Settings)](#3-pengaturan-website-settings)
4. [Manajemen Akademik (Guru, Program & Fasilitas)](#4-manajemen-akademik)
5. [Manajemen Konten (Berita, Pengumuman, Prestasi)](#5-manajemen-konten)
6. [Manajemen Media (Galeri)](#6-manajemen-media)
7. [Manajemen BKK & Industri (Mitra, Loker, PKL)](#7-manajemen-bkk--industri)
8. [Manajemen Alumni & Pusat Unduhan](#8-manajemen-alumni--pusat-unduhan)
9. [Manajemen File (Keamanan Penghapusan)](#9-manajemen-file-keamanan-penghapusan)
10. [Troubleshooting](#10-troubleshooting)

---

## 1. PENGANTAR & KONSEP DASAR

### Single Admin Role
Sistem ini beroperasi dengan model otorisasi tunggal yakni **Admin**. Tidak ada pembagian *role* seperti Editor, Author, atau Moderator. Hanya satu *tier* akses yang mendominasi seluruh fitur CMS. Oleh karenanya, kehati-hatian operasional berada sepenuhnya di tangan administrator.

### Pembaruan *Realtime* (Cache Invalidation)
Sistem memiliki pengoptimalan cerdas terhadap konten dinamis yang ditarik dari *Settings*. Ketika Anda menyimpan perubahan, sistem secara otomatis menangani *cache invalidation*. Perubahan langsung tampil seketika di bagian antarmuka publik (Frontend) tanpa perlu Anda mematikan atau menyegarkan server.

### Rich Text Editor & HTML Sanitization
Sistem kami mendukung penulisan teks kaya (Bold, Italic, Bullet Point, dsb) melalui *RichEditor*. Anda dapat mengatur susunan kata demi kata tanpa perlu mengerti pemrograman web.  
**Penting:** Website kami dilindungi oleh pelindung XSS (*HTML Sanitizer*). Apabila seseorang secara sengaja atau tidak sengaja memasukkan script berbahaya (misalnya tag `<script>` atau tag `<iframe onload="">`), sistem akan secara otomatis memblokir dan membersihkan *script* berbahaya tersebut sebelum menampilkannya di halaman muka.

---

## 2. LOGIN & DASHBOARD

### Cara Melakukan Login
1. Buka browser web Anda.
2. Akses URL: `{URL-WEBSITE-ANDA}/admin`
3. Masukkan Email kredensial admin yang diberikan oleh administrator server Anda.
4. Masukkan Password kredensial Anda. *(Gunakan password admin yang telah dikonfigurasi, dan pastikan kerahasiaannya terjaga).*
5. Klik **Sign In**.

### Apa Yang Terjadi Jika Lupa Password?
Fungsi lupa kata sandi (*Forgot Password*) umumnya diurus oleh infrastruktur email SMTP. Jika server Anda belum mengaktifkan layanan SMTP, harap segera menghubungi tim IT (Database Administrator) sekolah Anda untuk melakukan peresetan paksa secara teknis dari dalam database.

### Dashboard Utama
Dashboard adalah halaman pendaratan (landing page) awal CMS Anda. 
- Di sini akan tersaji ringkasan metrik statistik (*Widgets*) (jika sudah didefinisikan). 
- Anda bisa menavigasi setiap entitas pada bilah sisi kiri (*Sidebar*). 
- Untuk keluar dengan aman, klik ikon panah keluar atau profil Anda di pojok kanan atas layar dan pilih tombol **Sign Out**.

---

## 3. PENGATURAN WEBSITE (SETTINGS)

Pengaturan dasar website tidak diatur di dalam source code, melainkan dapat diakses penuh melalui menu **Sistem > Pengaturan Web**.

### A. Identitas Website
- **Nama Website:** Judul tab dasar. (Misal: "TOWEB").
- **Tagline Singkat:** Kalimat pendek penyerta nama website.
- **Deskripsi Website (SEO & Footer):** Paragraf ringkas yang akan digunakan sebagai meta description pada hasil pencarian Google.

### B. Konten Beranda (Hero)
- **Judul Utama (Hero):** Teks *headline* berukuran besar di muka *Homepage*.
- **Subjudul (Hero):** Teks pendukung di bawah *headline*.
- **Kutipan Kepala Jurusan:** Teks khusus yang disematkan dalam blok profil kepala jurusan di muka *Homepage*.

### C. Profil Jurusan (Tentang Kami)
- **Sejarah Singkat & Misi:** Gunakan *RichEditor* (teks editor) untuk memformat peluru/nomor pada penjabaran misi dan menulis rentetan paragraf perihal sejarah sekolah.
- **Visi Jurusan:** Teks polos (*plaintext*) dari sasaran utopia program keahlian.

### D. Informasi Kontak & Sosial Media
- **Alamat, Email, Telepon:** Otomatis memperbarui blok *Footer* (kaki) pada seluruh laman publik.
- **Social Media Link:** Mengatur tautan eksternal (YouTube, Facebook, dsb.).
- **ID Video YouTube (Home):** Tampilan sematan video di beranda. **Jangan masukkan Full URL!** Cukup masukkan ID (contoh: `dQw4w9WgXcQ` untuk video dari `youtube.com/watch?v=dQw4w9WgXcQ`).

### Dampak Pada Frontend (Frontend Impact Map)
| Admin Data (Settings) | Frontend Page (Lokasi Aktual) |
|---|---|
| Konten Beranda | Halaman Depan (`/`) -> Banner Utama & Kata Sambutan |
| Profil Jurusan | Halaman Tentang Kami (`/tentang`) |
| ID Video YouTube | Halaman Depan (`/`) -> Video Presentasi |
| Informasi Kontak | Footer seluruh halaman Web |

---

## 4. MANAJEMEN AKADEMIK

### Guru & Staf (`Teachers`)
Menu ini mengatur personil edukasi di lingkungan Anda.
- **Is Active (Aktif):** Gunakan fungsi *toggle* ini jika Anda menginginkan profil guru tertentu tampil di laman `/akademik/guru`. *Tips: Matikan (Uncheck) untuk menyembunyikan Guru yang pindah tugas atau sedang nonaktif (Pensiun/Cuti) TANPA PERLU MENGHAPUS riwayat mereka secara destruktif.*
- **Is Head of Department:** Pastikan hanya 1 guru yang mendapatkan gelar Kaprodi.

### Program & Kompetensi (`Programs`, `Competencies`)
- **Programs:** Membuat program keahlian besar (Contoh: "Teknik Kendaraan Ringan"). Anda harus mengisi nama dan thumbnail gambar.
- **Competencies:** Setelah sebuah *Program* dibentuk, buka *Competencies* untuk membuat jabaran mata palajaran spesifik (Contoh: "Kelistrikan Bodi") lalu relasikan dengan *Program* yang bersangkutan.

### Fasilitas Bengkel (`Facilities`)
- Menginventarisasi ruangan / alat raksasa sekolah. 
- *Kondisi:* Hanya pilih salah satu dari enum status (*Good*, *Fair*, atau *Poor*).

---

## 5. MANAJEMEN KONTEN

### Alur Kerja (Workflow) Publikasi Berita
*Draft → Review → Publish*
Menu: `Posts`
1. Klik tombol **New post** / **Create post**.
2. Masukkan *Title* (judul berita).
3. Pilih *Category* (jika belum ada kategori yang sesuai, Anda bisa beralih terlebih dahulu ke menu `Categories` untuk membuatnya).
4. Tambahkan *Thumbnail* dengan mengunggah gambar.
5. Tulis *Content* menggunakan Rich Text Editor.
6. **(Penting!) Status:** Pilih *Draft* bila tulisan Anda masih mentah, atau *Published* agar berita tersebut dilempar langsung ke pembaca publik di laman `/berita`.

### Pengumuman (`Announcements`)
- Dikhususkan untuk buletin kilat.
- Status diatur melalui field `Is Active`.

### Prestasi (`Achievements`)
- Menampilkan medali, ajang juara, dan perankingan secara langsung di laman `/prestasi`.
- Pastikan menyematkan *Kategori* yang tepat dan *Photo* bukti kemenangan.

---

## 6. MANAJEMEN MEDIA

### Galeri (Gallery)
Publikasi media foto dipisahkan menjadi dua hierarki: `GalleryAlbums` dan `GalleryItems`.

**Workflow:**
1. **Create Album:** Buka menu `GalleryAlbums`. Tentukan nama event/album, lokasi, serta gambar sampul utamanya. Tentukan status ke *Published*.
2. **Upload Items:** Buka menu `GalleryItems`. Tekan Create. Pilih *Album* mana yang dituju dari kotak dropdown, lalu unggah (upload) file fotonya.

---

## 7. MANAJEMEN BKK & INDUSTRI

Menunjang sistem *Link & Match* (Bursa Kerja Khusus).
### Mitra Industri (`IndustryPartners`)
Entitas root pertama. Daftarkan perusahaan (Contoh: "PT Astra Honda Motor") beserta Logo perusahaannya.

### Hubungan Relasi
Setelah perusahaan induk Anda daftarkan, Anda dapat mengelola elemen-elemen berikut dengan cara mengaitkan entitas barunya ke `IndustryPartner` yang dituju:
- **Kerja Sama / Partnership (`Partnerships`):** Bukti MoU. (Status: *Active* atau *Completed*).
- **Info PKL (`Internships`):** Tempat penugasan siswa magang. (Status: *Planned*, *Ongoing*, *Completed*).
- **Lowongan Kerja (`JobVacancies`):** Portal pencarian kandidat alumni. Bila kuota pelamar telah penuh, ubahlah Status ke *Closed* (Tertutup).

---

## 8. MANAJEMEN ALUMNI & PUSAT UNDUHAN

### Alumni (`Alumnis`)
Daftarkan biografi karir alumni sukses di sini.
**Catatan Privasi Khusus:** Jika terdapat field status publikasi (Contoh: Status `Published`), maka setujui publikasinya HANYA JIKA alumni yang bersangkutan telah memberi izin pada institusi. Data kontak pribadi tidak boleh ditulis berlebihan pada bio/deskripsi guna mencegah spam terhadap alumni.

### Unduhan (`Downloads`)
Wadah untuk menyediakan file resmi (mis. PDF Buku Panduan, Syarat Lomba).
1. Buat kategori dokumen terlebih dahulu di menu `DownloadCategories`.
2. Buka `Downloads` lalu klik create.
3. Unggah (Upload) file. 
*(Sistem akan menolak jika format yang diunggah tidak sesuai validasi keamanan Laravel yang diizinkan sistem).*

---

## 9. MANAJEMEN FILE (KEAMANAN PENGHAPUSAN)

Sistem Anda dibekali dengan modul canggih (Garbace Collector / `CleansUpFiles`).
Pahamilah alur interaksi file (gambar, dokumen) berikut ini:

1. **Upload File Baru:** File statis diunggah (upload) dan disimpan di penyimpanan (*storage*) secara aman.
2. **Replace File (Mengganti Gambar Lama):** Jika Anda meng-edit suatu entitas (mis. Berita A) lalu MENGUNGGAH GAMBAR BARU menimpa gambar lawas, **gambar lama akan langsung dihapus** secara cerdas dari folder storage. Menghemat ruang harddisk.
3. **Delete Record (Menghapus Data Keseluruhan):** Ini sangat destruktif! Ketika Anda menekan tombol "Delete" untuk suatu Berita / Guru, maka record database HANCUR dan **FILE FISIK JUGA IKUT HANCUR TERHAPUS** tanpa peringatan retensi. 

> **RULE:**  
> JANGAN MENGHAPUS (Delete) DATA JIKA ANDA HANYA INGIN MENYEMBUNYIKANNYA DARI PUBLIC!  
> Selalu gunakan opsi ubah Status (Draft / Inactive) jika data sewaktu-waktu bisa diperlukan lagi.

---

## 10. TROUBLESHOOTING

Jika menghadapi masalah yang lazim, cobalah rujukan berikut:

### Data Baru Tidak Muncul di Frontend?
- Periksa opsi kotak/status: Apakah tertinggal dalam kondisi `Draft`?
- Apakah toggle `Is Active` masih dinonaktifkan (mati)?
- Jika ini data relasional (contoh Galeri), pastikan `GalleryItem` sudah ditautkan ke Album yang benar.

### Foto Berita Tidak Mau Keluar
- Pastikan berkas benar-benar terunggah (upload bar selesai).
- Jika nama file mengandung karakter-karakter aneh yang ekstrim (simbol khusus, apostrof tidak standar), cobalah merenamai file menjadi karakter abjad/angka standar terlebih dahulu sebelum upload ulang.

### Data Guru Tidak Tampil
- Periksa dan centang tombol toggle `Is Active`.

### Settings Website Tetap Membandel
- Pastikan Anda telah menekan tombol "Simpan" biru yang terletak di paling bawah halaman `Pengaturan Web`.
- Apabila browser Anda secara keras menyimpan riwayat (*Browser Cache*), cobalah *Hard Refresh* dengan menekan (Ctrl + F5).
