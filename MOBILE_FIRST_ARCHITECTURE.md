# Audit & Arsitektur Mobile-First: Landing Page Jurusan

Dokumen ini adalah standarisasi **Responsive Design & Mobile-First Architecture** untuk seluruh komponen halaman utama (Landing Page). Dokumen ini menimpa dan menyempurnakan spesifikasi UI sebelumnya agar bukan sekadar "desktop yang dikecilkan", melainkan memiliki hierarki UX yang spesifik untuk perangkat bergerak.

## 1. Skala Viewport (Breakpoint Targets)

Desain Tailwind akan disusun berdasarkan rentang *viewport* nyata berikut, dimulai dari ukuran terkecil (Mobile-First):

1.  **320px** (iPhone SE, Small Android): **Base / Default** (Fokus pada pencegahan *horizontal overflow*).
2.  **375px - 430px** (iPhone 12-15 Pro Max, Modern Android): **Base** (Fokus pada keterbacaan teks dan ruang bernapas).
3.  **768px** (`md:` - iPad/Tablet Portrait): Transisi dari 1 kolom ke 2 kolom.
4.  **1024px** (`lg:` - iPad Pro/Laptop Kecil): Transisi penuh ke *Desktop Layout* (Navigasi berubah menjadi menu horizontal).
5.  **1280px** (`xl:` - Laptop Standar): *Desktop Layout* penuh.
6.  **1440px+** (`2xl:` - Monitor Eksternal): Pembatasan lebar maksimal (`max-w-7xl mx-auto`) agar UI tidak melebar tak terhingga.

---

## 2. Aturan Aksesibilitas Mobile (Touch Target & Spacing)

*   **Minimum Touch Target (44px):** Semua tombol, ikon menu, *link* sosial media, dan elemen interaktif **TIDAK BOLEH** memiliki tinggi/lebar interaktif kurang dari `44px` atau `3rem`.
    *   *Solusi Tailwind:* Jika ikon terlihat kecil (`w-5 h-5`), bungkus ikon tersebut dalam container sentuh yang besar: `p-3` atau set `min-h-[44px] min-w-[44px] flex items-center justify-center`.
*   **Spacing Padding:** Padding horizontal minimum di mobile adalah `px-4`. Di layar besar bisa ditingkatkan ke `sm:px-6 lg:px-8`.
*   **Anti-Overflow Horizontal:** Komponen induk terluar (`<body>` atau `<main>`) diatur menjadi `overflow-x-hidden w-full`.

---

## 3. Redesign Hierarki Per-Komponen (Mobile-First)

### A. Global Navigation (Navbar) & Search
*   **Mobile (Base):**
    *   Logo berada di kiri, *Hamburger Menu* (Touch target 48x48px) di kanan.
    *   Kolom *Search* (Pencarian) tidak disembunyikan di dalam *Hamburger*, melainkan berupa ikon Kaca Pembesar di sebelah kiri *Hamburger*. Saat diklik, *Search Bar* muncul penuh (Full-width overlay) untuk kemudahan mengetik di *keyboard virtual*.
    *   *Menu Dropdown* berubah menjadi *Full-Screen Accordion* (*Slide-in* dari kanan/bawah).
*   **Desktop (`lg:`):** Hamburger menghilang, diganti barisan *Mega Menu*. Search bar terintegrasi di navbar.
*   **Sticky Behavior:** Navbar bersifat `sticky top-0 z-50` agar menu dan navigasi selalu bisa diakses, tetapi diberi *backdrop-blur* (kaca) agar tidak memblokir pandangan pembaca sepenuhnya.

### B. Typography & Text Wrapping
*   **Headline:** Tidak boleh ada teks *Headline* yang terpotong di layar 320px. Gunakan utilitas *fluid typography* bawaan atau ukuran yang bersahabat:
    *   Mobile (320px): `text-3xl leading-tight tracking-tight` (Tidak boleh terlalu besar agar 1 kata panjang tidak merusak baris).
    *   Desktop (`lg:`): `text-5xl` atau `text-6xl`.
*   **Paragraf:** Ukuran *font* dasar diubah dari `14px` menjadi `16px` (`text-base`) di mobile demi keterbacaan.

### C. Hero Section
*   **Mobile:** 
    *   Gambar diletakkan sebagai *Background Image* dengan *gradient overlay* gelap, atau jika *split layout*, gambar ditaruh di *BAWAH* teks.
    *   Teks berada di atas (Vertical Stack) agar pesan tersampaikan sebelum pengguna men-*scroll*.
*   **Desktop (`lg:`):** Gambar bisa diletakkan di sisi Kanan (Split 50:50).

### D. Grids & Cards (Prestasi, Guru, Berita, Fasilitas)
*   **Masalah Desktop:** Grid 3 atau 4 kolom.
*   **Solusi Mobile:**
    *   **Berita/Fasilitas:** Berubah dari *Grid* ke **Vertical Stack (List Vertikal 1 Kolom)**.
    *   **Guru/Alumni (Editorial Portrait):** Berubah dari *Grid* vertikal menjadi **Horizontal Swipeable Carousel** (`flex overflow-x-auto snap-x snap-mandatory`). Ini menghindarkan pengguna dari *scroll* vertikal yang berlebihan (Fatigue Scrolling).
    *   Kartu menggunakan `w-[80vw]` di mobile agar pengguna melihat "sedikit potongan" kartu berikutnya, memberikan isyarat visual (affordance) bahwa area tersebut bisa di-*swipe*.

### E. Tables & Data Heavy (Statistik, Dokumen Publik)
*   Tabel HTML konvensional diharamkan di mobile karena menyebabkan *horizontal scroll* yang tidak intuitif.
*   **Solusi Mobile:** Ubah menjadi **Card List View**. 
    *   *Dokumen Publik:* Tipe file (Ikon SVG), Judul besar, lalu Tombol Download selebar layar (`w-full`) di bagian bawah *card*.

### F. Image Cropping & Aspect Ratios
*   Gunakan `object-cover` untuk memastikan gambar memenuhi wadah tanpa merusak proporsi (*distorting*).
*   *Aspek Rasio Mobile:* 
    *   Thumbnail Berita/Video: `aspect-video` (16:9).
    *   Foto Guru/Alumni: `aspect-[3/4]` atau `aspect-[4/5]` (Portrait).
    *   Galeri (Bento Grid) diubah dari grid asimetris menjadi Grid 1 atau 2 kolom seragam di ukuran `< 768px` untuk mencegah *layout* pecah.

### G. Buttons & Call to Action (CTA)
*   **Mobile:** Semua Primary CTA menjadi `w-full` (lebar 100%) dan berukuran tebal (`py-3.5` atau `py-4`) agar mudah ditekan jempol.
*   **Desktop (`sm:` atau `md:`):** Tombol kembali ke ukuran konten (`w-auto inline-flex`) dan dijajarkan secara horizontal.
*   *Sticky CTA Opsional:* Di halaman panjang (seperti artikel berita), bisa dipertimbangkan *Bottom Floating Action Button* untuk mendaftar atau membagikan konten.

### H. Footer
*   **Mobile:** 
    *   Tautan navigasi (Links) dikelompokkan dalam sistem *Accordion* (Klik untuk membuka list tautan). Mengurangi kepanjangan *Footer*.
    *   Informasi kontak dan Google Maps (Link) diletakkan di bagian paling bawah dengan ikon yang memiliki *touch target* 44px.
*   **Desktop (`lg:`):** *Accordion* dinonaktifkan, semua list tautan ditampilkan sejajar dalam Grid 4 kolom.
