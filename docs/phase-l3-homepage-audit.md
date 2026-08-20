# Phase L3 Homepage Audit

## 1. Existing Homepage Structure
The current `home.blade.php` is a monolithic file (744 lines) containing:
1. Hero Section (using `<x-frontend.hero>`)
2. Quick Stats Ribbon (using Alpine.js number counters)
3. Profil Jurusan / Who we are
4. Program & Kompetensi (using horizontal scroll on mobile)
5. Fasilitas Unggulan (editorial grid layout)
6. Koneksi Industri (Partner Industri + PKL Timeline + Lowongan Kerja BKK)
7. Jejak Alumni (Horizontal scroll)
8. Informasi Terkini (Berita + Agenda)

## 2. Data Source Setiap Section
Data is provided via `HomeController@index` utilizing `Cache::remember`:
- **Stats**: `$alumniCount`, `$partnerCount`, `$achievementCount`, `$facilityCount`
- **Hero/Settings**: `$settings->get('hero_title')`, `$settings->get('hero_subtitle')`, `$settings->get('head_quote')`
- **Profil Jurusan**: `$headOfDepartment` (Model `Teacher`)
- **Program & Kompetensi**: `$programs` (Model `Program` with `competencies`)
- **Fasilitas**: `$facilities` (Model `Facility`, limit 3)
- **Koneksi Industri**: `$partners` (Model `IndustryPartner`, limit 8), `$jobVacancies` (Model `JobVacancy`, limit 3)
- **Jejak Alumni**: `$alumnis` (Model `Alumni`, limit 6)
- **Informasi Terkini**: `$latestNews` (Model `Post`, limit 3), `$agendas` (Model `Announcement`, limit 3)
- **Galeri**: `$galleries` (Model `GalleryAlbum`, limit 4)

## 3. Existing Components yang Dapat Digunakan
- `x-frontend.layout.container`
- `x-frontend.layout.section`
- `x-frontend.ui.eyebrow`
- `x-frontend.ui.button`
- `x-frontend.ui.badge`
- `x-frontend.ui.empty-state`
- `x-frontend.ui.divider`

## 4. Components yang Perlu Dibuat
Mengingat kompleksitas layout homepage, lebih baik menyusun section langsung di dalam `home.blade.php` tanpa perlu membuat komponen mikro spesifik yang hanya digunakan satu kali di homepage (menghindari overhead komponen tak berguna). Namun, jika ada pola berulang seperti "Homepage News Card" atau "Homepage Program Item", mereka dapat dipertahankan secara inline atau di-extract jika file terlalu besar.

## 5. Potential Backend/Data Issues
- `headOfDepartment` mungkin kosong jika tidak ada guru dengan `is_head_of_department = true`. Layout harus menangani ini dengan aman (`isset()`).
- Empty states untuk program, fasilitas, dll. harus tetap mempertahankan visual profesional tanpa memecah grid (gunakan `x-frontend.ui.empty-state`).

## 6. Responsive Issues
- Penggunaan horizontal scroll dengan `snap-x` di masa lalu sering memutus flow vertikal jika tidak dieksekusi dengan baik.
- Teks hero sering kali tidak menyesuaikan dengan baik di perangkat sempit.
- Layout 2 kolom atau multi-kolom di desktop harus bertumpuk vertikal dengan komposisi yang tepat di mobile.

## 7. Accessibility Issues
- Horizontal scrolling sebelumnya mungkin tidak sepenuhnya dapat diakses keyboard.
- Banyak elemen dekoratif yang mungkin diinterpretasikan screen reader jika tidak diberi `aria-hidden="true"`.
- Fokus button/link `focus-ring` belum sepenuhnya merata di semua elemen card klikabel.
- Dukungan `prefers-reduced-motion` untuk animasi kemunculan card.

## 8. SEO Issues
- Penggunaan `@@context` untuk JSON-LD di Blade sudah benar untuk Laravel 11.
- Alt text pada gambar dinamis terkadang kosong jika CMS tidak mensyaratkan. Harus selalu diberi *fallback alt text* (misalnya nama dari entitas terkait).
- Hierarchy tag `<H1>`, `<H2>`, `<H3>` harus terstruktur dari Hero ke bagian bawah.
