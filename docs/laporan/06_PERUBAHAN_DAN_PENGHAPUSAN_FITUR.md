# LAPORAN 06: PERUBAHAN DAN PENGHAPUSAN FITUR
## Dokumentasi Refactoring, Deprecations, dan Peningkatan Kualitas Sistem

---

## 1. Latar Belakang Refactoring

Seiring dengan evaluasi kebutuhan pengguna, hasil audit kinerja, serta pengujian berkala pada lingkungan hosting nyata, sistem **TBSM WEB** menjalani serangkaian penyesuaian fungsional. Langkah ini diambil untuk:
1. Menghilangkan fitur-fitur yang tidak esensial (*feature bloat*) yang menambah beban pemeliharaan tanpa memberikan nilai guna signifikan.
2. Memperbaiki *bug* krusial pada modul galeri yang sebelumnya menghapus data foto secara tidak sengaja.
3. Meningkatkan ketahanan media (*media resilience*) di hosting dengan mengagregasikan seluruh foto kegiatan dan menyediakan fallback cerdas.
4. Memaksimalkan kenyamanan antarmuka pengguna pada perangkat smartphone (*mobile-first refinement*).

---

## 2. Fitur yang Dihapus / Dinonaktifkan (*Deprecations*)

### A. Fitur Pencarian Global Frontend (`/cari`)
- **Alasan Penghapusan:**
  - Evaluasi perilaku pengunjung menunjukkan bahwa pengguna portal sekolah kejuruan mencari informasi secara tematik melalui navigasi hierarkis (misal: langsung membuka halaman Fasilitas untuk melihat bengkel, atau halaman Berita untuk membaca pengumuman).
  - Fitur pencarian global teks bebas (*full-text search*) memerlukan pemeliharaan indeks database yang kompleks dan kerap menjadi celah *denial-of-service* mikro jika dibombardir query panjang oleh bot.
- **Implementasi Teknis:**
  - Menghapus komponen modal pencarian global, input pencarian pada navbar desktop, navigasi seluler bawah (*bottom nav*), dan footer.
  - Rute `/cari` pada [routes/web.php](../../routes/web.php) dialihkan secara permanen (*HTTP 302 Redirect*) ke halaman beranda (`/`).

### B. Modul Unduhan / Dokumen Publik (`/unduhan`)
- **Alasan Penonaktifan:**
  - Kebutuhan informasi dokumen (seperti silabus kurikulum dan brosur) telah diintegrasikan langsung secara kontekstual di halaman terkait (misal: silabus di halaman Kurikulum).
  - Menyediakan halaman direktori unduhan terpisah berisiko menyimpan dokumen lawas atau link file PDF rusak yang tidak terawat oleh pengelola.
- **Implementasi Teknis:**
  - Navigasi `DownloadResource` dan `DownloadCategoryResource` di panel admin Filament dinonaktifkan (`canAccess = false` dan `shouldRegisterNavigation = false`).
  - Tautan menu unduhan dihapus dari navigasi publik.

### C. Format Unggahan SVG pada Formulir Foto
- **Alasan Penghapusan:**
  - File vektor SVG (`image/svg+xml`) berbasis kode XML yang berpotensi disisipi tag skrip JavaScript berbahaya (`<script>` atau atribut `onload`). Jika diunggah oleh pihak yang berniat jahat, file ini dapat memicu serangan *Stored Cross-Site Scripting (XSS)* saat dibuka oleh pengguna lain.
- **Implementasi Teknis:**
  - Seluruh skema formulir Filament (`GalleryAlbumForm`, `AlumniForm`) kini hanya mengizinkan format raster aman: `image/jpeg`, `image/png`, dan `image/webp`.

---

## 3. Fitur yang Diubah dan Ditingkatkan (*Major Enhancements*)

### A. Agregasi Foto Terpadu & Algoritma Prioritas di Galeri (`/galeri`)
- **Kondisi Sebelumnya:**
  Halaman galeri hanya menampilkan album yang dibuat secara manual di modul album. Sementara itu, foto-foto dokumentasi fasilitas bengkel, piala prestasi siswa, dan dokumentasi warta berita tersebar di halamannya masing-masing dan tidak dapat dilihat di satu tempat.
- **Pembaruan Sistem:**
  1. **Agregasi Multi-Entitas:**
     Controller [app/Http/Controllers/Frontend/GalleryController.php](../../app/Http/Controllers/Frontend/GalleryController.php) dirombak untuk secara dinamis mengumpulkan foto dari 4 model data sekaligus:
     - Foto album galeri kegiatan (`GalleryItem`)
     - Foto piala dan penghargaan siswa (`Achievement`)
     - Foto peralatan dan ruang praktikum (`Facility`)
     - Foto sampul warta dan artikel kegiatan (`Post`)
  2. **Algoritma Pemilahan Prioritas (*Smart Priority Sorting*):**
     Sistem memeriksa keberadaan file fisik di disk server. Item yang memiliki foto nyata dengan ukuran berkas valid ($\ge 6\text{ KB}$) secara otomatis ditempatkan pada posisi teratas (*priority sort*). Item yang belum memiliki file foto diletakkan di bagian bawah.
  3. **Tab Penyaring Kategori Interaktif:**
     Pengunjung dapat memfilter tampilan dengan satu klik: *Semua Foto*, *Albums*, *Prestasi Siswa*, *Fasilitas Bengkel*, dan *Warta & Berita*.
  4. **Fallback Dinamis ~6KB (*Zero Broken Images*):**
     Kartu foto di [resources/views/frontend/gallery.blade.php](../../resources/views/frontend/gallery.blade.php) dilengkapi penangan eror gambar inline (`onerror`) dengan placeholder vektor SVG bertema otomotif. Tidak ada lagi tampilan gambar silang atau kotak kosong di browser pengunjung.

---

### B. Perbaikan Bug Penghapusan Foto Otomatis (*EditGalleryAlbum*)
- **Kondisi Bug:**
  Ketika admin membuka album galeri yang sudah memiliki 10 foto lalu mengunggah 1 foto tambahan dan menekan tombol simpan, kode lama menjalankan komparasi array:
  ```php
  // BUG LAMA:
  foreach ($existingItems as $item) {
      if (!in_array($item->file_path, $savedStringPaths)) {
          $item->delete();
      }
  }
  ```
  Karena komponen Livewire pada mode edit hanya mengirimkan path foto baru yang baru saja diunggah, sistem menganggap 10 foto lama telah "dihapus oleh pengguna" dan langsung mengeksekusi perintah `$item->delete()`. Akibatnya, seluruh foto lama hilang dari album.
- **Solusi yang Diterapkan:**
  Di [app/Filament/Resources/GalleryAlbums/Pages/EditGalleryAlbum.php](../../app/Filament/Resources/GalleryAlbums/Pages/EditGalleryAlbum.php):
  - Perulangan destruktif `$item->delete()` dibuang seutuhnya.
  - Formulir `gallery_photos` diatur khusus untuk menambahkan (*append*) foto baru ke dalam album tanpa mengusik foto-foto yang sudah tersimpan sebelumnya.

---

### C. Tombol Ringkas Fasilitas pada Perangkat Bergerak
- **Kondisi Sebelumnya:**
  Pada halaman [resources/views/frontend/academic/facilities.blade.php](../../resources/views/frontend/academic/facilities.blade.php), tombol "Lihat Spesifikasi Lengkap" memiliki ukuran font besar dan padding lebar. Pada layar smartphone kecil, tombol ini mendominasi kartu dan menyebabkan teks patah ke beberapa baris.
- **Pembaruan Sistem:**
  Tombol diatur agar responsif secara otomatis:
  ```html
  <span class="sm:hidden">Lihat Selengkapnya</span>
  <span class="hidden sm:inline">Lihat Spesifikasi Lengkap</span>
  ```
  Dilengkapi padding kompak (`px-3 py-1.5` pada mobile dan `px-4 py-2.5` pada desktop), tampilan kartu fasilitas di smartphone menjadi jauh lebih rapi, proporsional, dan nyaman dipandang.

---

### D. Perbaikan Modal Spesifikasi Fasilitas
- **Kondisi Bug:**
  Sebelumnya, saat pengunjung mengklik tombol detail fasilitas di mobile, jendela popup (*modal*) terkadang langsung menutup kembali atau menghilang secara tidak terduga.
- **Solusi yang Diterapkan:**
  Komponen [resources/views/components/modal.blade.php](../../resources/views/components/modal.blade.php) diperbarui dengan manajemen state Alpine.js yang terisolasi, pencegah propagasi event klik liar (`@click.stop`), serta transisi animasi halus (`x-transition`). Modal kini terbuka stabil di seluruh perangkat.

---

### E. Penyesuaian Tautan Storage Hosting (`config/filesystems.php`)
- **Kondisi Sebelumnya:**
  Pada hosting shared yang belum mengatur `APP_URL` di `.env` dengan domain aslinya, tautan penyimpanan otomatis merujuk ke `http://localhost/storage/...`, menyebabkan seluruh foto gagal dimuat di browser pengunjung hosting.
- **Pembaruan Sistem:**
  Pada [config/filesystems.php](../../config/filesystems.php), URL disk publik diberikan fallback cerdas:
  ```php
  'url' => (env('APP_URL') && !str_contains(env('APP_URL'), 'localhost'))
      ? env('APP_URL').'/storage'
      : '/storage',
  ```
  Dengan fallback rute relatif `/storage`, browser pengunjung akan selalu mengambil foto langsung dari domain tempat website dibuka, apa pun konfigurasi nilai `APP_URL`-nya.

---

### F. Peningkatan Batas Unggah Hosting
- Menambahkan konfigurasi batas unggah 64MB pada [public/.htaccess](../../public/.htaccess) dan [public/.user.ini](../../public/.user.ini):
  ```ini
  upload_max_filesize = 64M
  post_max_size = 64M
  memory_limit = 256M
  max_execution_time = 300
  max_input_time = 300
  ```
  Memastikan admin dapat mengunggah kumpulan foto beresolusi tinggi tanpa terputus oleh limitasi default shared hosting (yang biasanya hanya 2MB).
