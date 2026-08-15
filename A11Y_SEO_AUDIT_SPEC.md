# Audit & Standar Implementasi: Accessibility (A11y) & SEO

Dokumen ini adalah standar mutlak yang mengatur bagaimana seluruh komponen *Frontend* (mulai dari Hero, Navbar, hingga Footer) dirender menjadi HTML. Tujuannya adalah memastikan website ramah bagi penyandang disabilitas (tunanetra/pengguna *screen reader*) dan sangat diistimewakan oleh mesin pencari (Google SEO), **tanpa** mengorbankan estetika dan kecantikan antarmuka UI.

## 1. Panduan SEO (Search Engine Optimization)

Setiap halaman (terutama *Landing Page*) **WAJIB** membungkus *layout* utama dengan komponen induk `<x-layouts.app>` atau `<x-layouts.guest>` yang telah disuntikkan meta tags dinamis.

### 1.1. Aturan Meta Tags & Open Graph
Di tag `<head>`, Controller Blade wajib mengirimkan data berikut:
*   **Title:** Unik per halaman. Format: `[Nama Halaman] | Jurusan Teknik Otomotif`.
*   **Meta Description:** 150-160 karakter yang *compelling* (menjual).
*   **Canonical URL:** URL bersih untuk mencegah konten duplikat (`<link rel="canonical" href="{{ url()->current() }}">`).
*   **Open Graph (Sosial Media):** Saat website di-share di WhatsApp atau Twitter, tidak boleh kosong. Wajib ada `og:title`, `og:description`, `og:image` (gambar sekolah/hero resolusi 1200x630px), dan `og:type="website"`.

### 1.2. Hierarki Heading (H1 - H6)
Hierarki *heading* adalah indikator utama struktur halaman untuk bot Google dan pengguna *screen reader*.
*   **Aturan Mutlak:** Hanya boleh ada **satu `<h1>`** dalam satu halaman (Biasanya diletakkan di Hero Section, tersembunyi secara visual `sr-only` jika tidak cocok dengan desain, namun idealnya tampil elegan).
*   **Level Turunan Bertahap:** Setelah H1, bagian berikutnya harus `<h2>` (seperti *Program, Fasilitas, Prestasi*). Jika di dalam fasilitas ada sub-judul, ia wajib menggunakan `<h3>`. Tidak boleh melompat dari `<h2>` langsung ke `<h4>`.

### 1.3. Structured Data (JSON-LD)
Untuk halaman beranda, suntikkan JSON-LD bertipe `EducationalOrganization` agar Google mengenali profil sekolah secara kaya (*Rich Snippets*), mencakup alamat, nomor telepon, logo, dan profil sosial media.

---

## 2. Panduan Aksesibilitas (A11y) & Semantic HTML

Kita tidak akan merusak desain UI. Aksesibilitas diatur di "belakang layar" (markup HTML) dan *state* interaksi CSS.

### 2.1. Semantic Elements
Jangan menggunakan `<div>` untuk segalanya.
*   Gunakan `<header>` untuk Navbar.
*   Gunakan `<nav>` untuk daftar menu.
*   Gunakan `<main>` sebagai pembungkus utama konten.
*   Gunakan `<section>` untuk bagian besar (Hero, Galeri, Berita). Berikan atribut `aria-labelledby="[id-heading]"` pada section tersebut.
*   Gunakan `<article>` untuk kartu berita independen.
*   Gunakan `<footer>` untuk penutup.

### 2.2. Skip Navigation (Sangat Penting)
Sebagai elemen pertama di dalam `<body>`, wajib ada tombol `<a href="#main-content" class="sr-only focus:not-sr-only ...">Skip to content</a>`.
*UX:* Tombol ini tak terlihat di mata normal. Namun, jika penyandang disabilitas menekan `Tab` di keyboard saat halaman baru terbuka, tombol ini akan muncul di pojok kiri atas, membantu mereka meloncati navigasi panjang langsung ke isi konten utama.

### 2.3. Keyboard Navigation & Visible Focus
Desain fokus standar browser sering kali merusak estetika *border* CSS modern.
*   *Solusi Elegan:* Gunakan Tailwind `focus:outline-none focus-visible:ring-4 focus-visible:ring-red-500/50 focus-visible:border-red-600 rounded-md`.
*   Dengan menggunakan `focus-visible`, cincin fokus (halo) hanya akan muncul saat pengunjung bernavigasi menggunakan tombol `Tab` keyboard. Jika mereka mengklik dengan Mouse, desain akan tetap bersih tanpa cincin biru bawaan *browser*.

### 2.4. Alternatif Gambar (Alt Text)
*   **Gambar Informatif (Berita/Kegiatan/Guru):** WAJIB memiliki tag `alt="Teks Deskriptif"`. (Contoh: `alt="Siswa sedang melakukan overhaul transmisi mobil di bengkel industri"`).
*   **Gambar Dekoratif (Pattern/Background/Shape):** Wajib menggunakan atribut `alt=""` atau `aria-hidden="true"` agar *screen reader* (pembaca layar tunanetra) tidak membacanya sebagai "Image... dot png" yang membingungkan.

### 2.5. Buttons & Links (Tautan)
*   Jika sebuah elemen memiliki aksi interaktif (misal, membuka Accordion FAQ atau memutar Video), elemen itu **WAJIB** berupa `<button>`, BUKAN `<a href="#">` atau `<div onclick="...">`.
*   Jika sebuah tautan (link) hanya berisi ikon (misal: ikon Sosial Media Facebook), elemen itu wajib dilengkapi keterangan untuk tunanetra: `<a href="..." aria-label="Kunjungi halaman Facebook kami">...</a>`.

### 2.6. Kontras Warna (Sufficient Contrast)
*   Jangan gunakan teks abu-abu terang di atas putih (`text-slate-300` di atas `bg-white`).
*   Gunakan alat ukur WCAG 2.1 AA. Standar aman:
    *   Teks standar: `text-slate-600` atau `text-slate-900` pada latar putih.
    *   Teks di atas latar gelap/merah: Gunakan putih (`text-white`) atau abu-abu pucat (`text-slate-100`).

### 2.7. Menghargai Reduced Motion (Animasi Ramah)
Beberapa animasi yang terlalu lincah (parallax ekstrim atau zoom-in liar) bisa menyebabkan sakit kepala/vertigo bagi pengunjung dengan *vestibular disorder*.
*   *Solusi CSS:* Setiap elemen yang beranimasi (fade/slide/zoom) sebaiknya menghormati preferensi OS perangkat melalui media query Tailwind `motion-safe:` atau `motion-reduce:`.
*   *Contoh:* `<div class="transition-transform duration-500 motion-reduce:transition-none hover:scale-105">` (Animasi zoom hanya bekerja jika fitur animasi sistem operasi tidak dimatikan oleh pengguna).
