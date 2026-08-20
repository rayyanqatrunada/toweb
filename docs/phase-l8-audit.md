# Phase L8.0 — Industry, Alumni, & Gallery Domain Audit Report

## 1. Domain Mitra Industri (`IndustryPartner`)
**Tujuan:** Menjadikan `/mitra-industri` murni sebagai portofolio relasi, memisahkan daftar pekerjaan spesifik ke `/lowongan`.

**Temuan Audit Controller & Relasi (N+1 Risk):**
- Saat ini `PartnershipController@index` melakukan `$partners = IndustryPartner::published()->get();`.
- **N+1 Alert:** Di `partnership.blade.php`, kode melakukan dua buah *nested loop*:
  ```php
  @foreach($partners as $partner)
      @foreach($partner->jobVacancies as $vacancy)
          // render vacancy
      @endforeach
  @endforeach
  ```
  Ini menyebabkan masalah N+1 yang cukup masif pada fase saat ini.
- Model `IndustryPartner` memiliki relasi `partnerships()` (status/jenis kerja sama) dan `jobVacancies()` (peluang kerja).
- **Rencana Tindakan:** 
  1. Modifikasi `PartnershipController@index` menggunakan eager loading dan *count*: `IndustryPartner::with('partnerships')->withCount(['jobVacancies' => fn($q) => $q->published()->where('deadline', '>=', now())])->published()->paginate(...)`.
  2. Desain ulang `partnership.blade.php` agar hanya merender profil perusahaan (Logo, Nama, `industry_type`, `description`, `address`, dan jenis kerja sama dari tabel `partnerships`).
  3. Berikan tombol CTA *"Lihat X Lowongan Tersedia"* yang akan mengarahkan ke halaman `/lowongan?mitra=slug` atau ke halaman detail Mitra (`/mitra-industri/{slug}`).

## 2. Domain Jejaring Alumni (`Alumni`)
**Tujuan:** Menampilkan profil sukses *(outcome)* lulusan secara aman dan menjaga *privacy*.

**Temuan Audit Controller & Relasi:**
- `AlumniController` sudah menggunakan *scope* `Alumni::public()` sehingga hanya profil alumni dengan status `is_public = true` dan `status = published` yang ditarik dari *database*. Ini sudah merupakan lapis pertahanan privasi yang sangat baik.
- **Privacy Audit pada Field:**
  - `student_id` (NIS/NISN): **Berisiko**. Field ini tidak boleh diekspos secara eksplisit di *frontend*.
  - *Contact Info* (Email/Phone): Berdasarkan skema tabel, *field* ini tidak ada di tabel `alumni`, sehingga aman (mungkin ditautkan ke tabel `User`, tapi kita tidak akan merendernya).
  - Field yang aman diekspos: `name`, `graduation_year`, `photo`, `city`, `education`, `current_occupation`, `current_company`, `bio`, `achievements`.
- **Rencana Tindakan:** 
  1. Restrukturisasi `alumni/index.blade.php` menjadi format *LinkedIn-style card*.
  2. Secara eksplisit mengeksklusi pemanggilan variabel/atribut yang sensitif di seluruh *blade views*.

## 3. Domain Galeri (`GalleryAlbum` & `GalleryItem`)
**Tujuan:** Menyajikan dokumentasi kegiatan secara imersif dan terstruktur (arsip, featured, grid foto).

**Temuan Audit Controller & Relasi:**
- `GalleryController@index` menggunakan eager loading `$albums = GalleryAlbum::with(['items'])->withCount('items')->published()->latest()->paginate(9);`.
- Penarikan seluruh `items` hanya untuk *cover image* sangat boros *bandwidth* dan memori (jika 1 album punya 100 foto, maka 100 objek ditarik).
- Model `GalleryAlbum` memiliki relasi `featuredImage()`.
- **Rencana Tindakan (Performance Fix):** 
  1. Ubah query di `GalleryController@index` menjadi: `GalleryAlbum::with('featuredImage')->withCount('items')->published()->latest()->paginate(9)`. Ini akan menghentikan kelebihan beban (*overhead*) data karena hanya memuat foto sampul.
  2. Implementasi `loading="lazy"` secara ketat di `gallery_show.blade.php` (Grid Masonry) agar *render* foto massal tidak membekukan *browser* pengguna.

## 4. Kesimpulan Strategi Eksekusi
- **Controller Refactor:** Kita wajib mengedit ketiga Controller (`PartnershipController`, `AlumniController`, `GalleryController`) sebelum menyentuh *Frontend Views* karena temuan *bottleneck* performa di atas (N+1 di BKK dan *Over-fetching* di Galeri).
- **Frontend Refactor:** Tampilan akan didekorasi sesuai hierarki dan fokus yang disetujui (L8.1, L8.2, L8.3).
