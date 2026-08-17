# Spesifikasi Desain Section: Galeri (Visual Proof)

Dokumen ini memuat spesifikasi arsitektur antarmuka dan komponen Blade untuk *Section* **"Galeri"**. Bagian ini ditujukan sebagai *Visual Proof* (bukti visual) tertinggi bahwa institusi dan siswa jurusan ini aktif dalam berbagai kegiatan nyata (praktik, *event*, PKL, kompetisi).

## 1. Tujuan UX (User Experience)

*   **Pembuktian Visual:** "Sebuah gambar bermakna seribu kata." Jika di section "Apa yang Dipelajari" kita membicarakan kompetensi kelistrikan, di section Galeri inilah kita menaruh foto siswa sedang merangkai sistem kelistrikan.
*   **Performa Utama:** Galeri sering kali menjadi biang kerok website yang lambat (karena memuat banyak gambar besar). Aturan keras: **Setiap gambar wajib menggunakan `loading="lazy"`**.

---

## 2. Arsitektur Layout (Bento Grid / Editorial Masonry)

Agar tidak membosankan dan monoton seperti tabel gambar biasa, kita menerapkan gaya **Bento Grid** (Editorial Masonry) yang memberikan penekanan berbeda pada beberapa foto.

### 2.1. Anatomi Bento Grid (Desktop)
*   Menggunakan 4 Kolom, dan 2 Baris tinggi. (Misal menggunakan utilitas CSS Tailwind Grid: `grid-cols-4 grid-rows-2`).
*   **Item 1 (Featured Image):** Sangat besar. Mengambil porsi 2 Kolom x 2 Baris (`col-span-2 row-span-2`). Digunakan untuk kegiatan praktik terpenting.
*   **Item 2 (Medium Image):** Mengambil porsi lebar `col-span-2` dan tinggi 1 baris.
*   **Item 3 & 4 (Small Images):** Mengambil porsi standar 1 Kolom x 1 Baris.
*   *Semua kotak diberi sudut melengkung `rounded-xl` dengan sedikit celah (gap).*

### 2.2. Konten Gambar (Label & Hover)
*   **Tema Prioritas:** (1) Kegiatan Praktik (Prioritas Tertinggi), (2) PKL, (3) Lomba/Prestasi, (4) Suasana Kelas.
*   **Overlay Info:** Saat kursor tidak *hover*, gambar tampil penuh. Saat kursor di-*hover*, *gradient* hitam muncul dari bawah disertai Teks Judul Kegiatan (misal: "Praktik Overhaul Mesin") dan kategori.
*   **Keyboard Accessible:** Elemen dapat difokuskan menggunakan tombol `Tab`. Menggunakan `<button>` atau `<a>` yang membungkus gambar.

---

## 3. Lightbox Interaksi (Opsional)

*   Jika gambar merupakan dokumentasi kegiatan yang detail, kita menyediakan fitur *Lightbox* (Gambar membesar memenuhi layar saat di-klik).
*   Gunakan library seringan mungkin (seperti `fslightbox` atau komponen modal kustom via Alpine.js) agar JavaScript tidak membebani pemuatan (*loading*) halaman awal.

---

## 4. Responsive Rules (Mobile)

*   **Desktop (`> 1024px`):** Grid Bento Editorial asimetris 4 kolom.
*   **Tablet (`768px - 1024px`):** Diturunkan menjadi grid 2 kolom simetris.
*   **Mobile (`< 768px`):** Bento Grid sangat buruk di layar sempit. Ubah menjadi **1 Kolom Vertikal**, atau gunakan **Horizontal Scroll (Swipeable)** agar tinggi layar tidak dipenuhi gambar.

---

## 5. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── gallery-section/
            ├── index.blade.php           # Base Section Wrapper
            └── gallery-item.blade.php    # Pembungkus gambar, lazyload, dan hover
```

### 5.1. Induk Layout (`index.blade.php`)

```blade
@props(['galleries'])

@if(isset($galleries) && $galleries->count() > 0)
<section class="py-16 md:py-24 bg-slate-900 border-t border-slate-800"> <!-- Tema gelap menonjolkan kecerahan foto -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Aktivitas Siswa</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-white tracking-tight">Galeri Kegiatan</h2>
                <p class="mt-3 text-slate-400 text-lg max-w-2xl">
                    Jejak visual dinamika pembelajaran, praktik kejuruan, dan interaksi dengan mitra industri.
                </p>
            </div>
            <div class="mt-6 md:mt-0">
                <a href="{{ route('galleries.index') }}" class="inline-flex items-center text-sm font-semibold text-slate-300 hover:text-white transition-colors">
                    Lihat Semua Galeri
                    <svg class="ml-1.5 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 lg:grid-rows-2 gap-4 h-auto lg:h-[600px]">
            
            <!-- Mengasumsikan koleksi gallery memiliki minimal 4 gambar dari database -->
            
            <!-- Featured: Item Besar Kiri (Col-Span 2, Row-Span 2) -->
            @if(isset($galleries[0]))
            <div class="lg:col-span-2 lg:row-span-2 h-64 md:h-80 lg:h-full">
                <x-frontend.home.gallery-section.gallery-item :gallery="$galleries[0]" />
            </div>
            @endif
            
            <!-- Medium: Item Lebar Atas Kanan (Col-Span 2, Row-Span 1) -->
            @if(isset($galleries[1]))
            <div class="lg:col-span-2 lg:row-span-1 h-64 md:h-80 lg:h-full">
                <x-frontend.home.gallery-section.gallery-item :gallery="$galleries[1]" />
            </div>
            @endif
            
            <!-- Small: Item Bawah (Col-Span 1) -->
            @if(isset($galleries[2]))
            <div class="lg:col-span-1 lg:row-span-1 h-64 md:h-80 lg:h-full">
                <x-frontend.home.gallery-section.gallery-item :gallery="$galleries[2]" />
            </div>
            @endif
            
            <!-- Small: Item Bawah Kanan Pojok (Col-Span 1) -->
            @if(isset($galleries[3]))
            <div class="lg:col-span-1 lg:row-span-1 h-64 md:h-80 lg:h-full">
                <x-frontend.home.gallery-section.gallery-item :gallery="$galleries[3]" />
            </div>
            @endif
            
        </div>

        <!-- Mobile CTA Fallback -->
        <div class="mt-8 md:hidden text-center">
            <a href="{{ route('galleries.index') }}" class="block px-6 py-3 border border-slate-700 shadow-sm text-base font-medium rounded-md text-white bg-slate-800 hover:bg-slate-700 transition-colors">
                Lihat Semua Galeri
            </a>
        </div>

    </div>
</section>
@endif
```

### 5.2. Item Galeri dengan LazyLoad & Hover (`gallery-item.blade.php`)

```blade
@props(['gallery'])

<a 
    href="{{ $gallery->image_url }}" 
    data-fslightbox="gallery" 
    class="group block relative w-full h-full rounded-2xl overflow-hidden focus:outline-none focus:ring-4 focus:ring-red-500 bg-slate-800"
    aria-label="Lihat gambar: {{ $gallery->title }}"
>
    <!-- Gambar Wajib Lazy Loading (loading="lazy") -->
    <img 
        src="{{ $gallery->image_url }}" 
        alt="{{ $gallery->title }}" 
        loading="lazy"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
    >
    
    <!-- Gradient Overlay (Default tersembunyi, muncul saat hover) -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    
    <!-- Teks Info (Muncul dari bawah saat hover) -->
    <div class="absolute inset-0 p-6 flex flex-col justify-end text-left transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
        @if($gallery->album)
            <span class="inline-block px-2.5 py-1 bg-red-600/90 backdrop-blur-sm text-white text-xs font-bold rounded w-max mb-2">
                {{ $gallery->album->name }}
            </span>
        @endif
        <h3 class="text-xl font-bold text-white leading-snug">
            {{ $gallery->title }}
        </h3>
        
        <!-- Ikon Expand / Zoom indicator -->
        <div class="absolute top-4 right-4 bg-black/50 text-white p-2 rounded-full backdrop-blur-md">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
        </div>
    </div>
</a>
```
