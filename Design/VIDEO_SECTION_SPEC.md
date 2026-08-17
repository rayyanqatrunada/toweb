# Spesifikasi Desain Section: Video & Media (YouTube Integration)

Dokumen ini memuat arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Video & Media"**. Bagian ini berfungsi untuk menampilkan dokumentasi kegiatan jurusan secara dinamis melalui platform YouTube tanpa membebani server sendiri.

## 1. Tujuan UX & Performa

*   **Bukan Hosting Sendiri:** Video adalah beban server terbesar. Semua video harus bersumber dari YouTube. Kita hanya menyimpan ID Video atau URL YouTube-nya di *database/backend* CMS.
*   **Performa Maksimal (Anti Iframe-Trap):** Iframe YouTube sangat berat jika langsung di-render saat *initial page load* (menguras skor Google Lighthouse/Pagespeed). Oleh karena itu:
    *   TIDAK ADA Iframe di tahap awal (kecuali Featured Video yang itupun wajib `loading="lazy"`).
    *   Pendekatan terbaik: **Facade/Thumbnail First**. Kita me-render *thumbnail/cover* video biasa dengan Ikon "Play" melayang di atasnya. Saat pengguna mengklik *thumbnail* tersebut, baru kita merender Iframe-nya, atau membuka Modal Iframe YouTube. Ini membuat website 10x lebih cepat.

---

## 2. Arsitektur Layout (Featured & Grid)

### 2.1. Featured Video (Video Utama)
*   **Porsi:** Mengambil bagian separuh layar (Kiri) atau *Full-width* di atas daftar video lainnya.
*   **Visual:** Thumbnail besar (Rasio 16:9). Terdapat tombol **Play** berwarna merah (khas YouTube) di bagian tengah.
*   **Metadata:** Judul Besar, Tanggal, dan Durasi (jika API YouTube/CMS menyediakannya).

### 2.2. Latest Videos (Video Reguler)
*   **Porsi:** Grid 2 atau 3 kolom (menyamping) atau daftar menyusun ke bawah di sebelah Featured Video.
*   **Visual:** Mirip dengan UI *card* YouTube biasa. Thumbnail (16:9), Judul maksimal 2 baris (Truncated), dan Tanggal.
*   **Durasi Badge:** Terdapat kotak hitam kecil (transparan) di pojok kanan bawah *thumbnail* yang memuat teks durasi (Misal: `12:45`), sangat familiar bagi pengguna YouTube.

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Layout Split Asimetris (Kiri untuk Featured yang sangat besar, Kanan menumpuk 3 Video Reguler). Alternatif: Featured penuh di atas, diikuti 3 grid video di bawah.
*   **Mobile (`< 768px`):**
    *   Semuanya menjadi format 1 Kolom.
    *   Video Utama berada di puncak, disusul video lainnya.
*   **Interaksi Play (Facade Pattern):** 
    Ketika *thumbnail* diklik, menggunakan Alpine.js (`@click`) untuk mengganti *thumbnail image* `<img>` tersebut dengan Iframe YouTube yang `autoplay=1`. Atau alternatif yang lebih elegan: Membuka **Modal/Lightbox Video** di tengah layar (agar pengguna tidak terganggu layout yang bergeser).

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── video-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── featured-video.blade.php  # Komponen video utama (Facade)
            └── video-card.blade.php      # Kotak video list/grid biasa
```

### 4.1. Base Layout (`index.blade.php`)

```blade
@props(['featuredVideo', 'latestVideos', 'channelUrl' => '#'])

@if(isset($featuredVideo))
<section class="py-16 md:py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <span class="text-sm font-bold tracking-wider text-red-600 uppercase flex items-center">
                    <svg class="w-5 h-5 mr-1.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    Video Terkini
                </span>
                <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Dokumentasi Digital</h2>
            </div>
            
            <div class="mt-4 md:mt-0">
                <a href="{{ $channelUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-red-600 hover:text-red-700 transition-colors">
                    Lihat Channel YouTube
                    <svg class="ml-1.5 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </div>

        <!-- Split Layout -->
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            
            <!-- Featured Video (8 Kolom Kiri) -->
            <div class="lg:col-span-8 mb-8 lg:mb-0">
                <x-frontend.home.video-section.featured-video :video="$featuredVideo" />
            </div>

            <!-- Latest Videos List (4 Kolom Kanan) -->
            @if(isset($latestVideos) && $latestVideos->count() > 0)
                <div class="lg:col-span-4 flex flex-col gap-6">
                    @foreach($latestVideos as $video)
                        <x-frontend.home.video-section.video-card :video="$video" />
                    @endforeach
                </div>
            @endif

        </div>
        
    </div>
</section>
@endif
```

### 4.2. Featured Video Facade (`featured-video.blade.php`)
*Menggunakan Alpine.js untuk mengganti thumbnail menjadi iframe secara instan saat tombol play diklik (Performa optimal).*

```blade
@props(['video'])

@php
    // Anggap format $video->youtube_id menyimpan ID unik video YouTube (misal: dQw4w9WgXcQ)
    // Atau backend menghasilkan $video->thumbnail_url secara dinamis dari API YouTube.
@endphp

<div class="relative w-full aspect-video bg-slate-900 rounded-2xl overflow-hidden shadow-lg group">
    
    <!-- Alpine.js Component state -->
    <div x-data="{ isPlaying: false }" class="absolute inset-0 w-full h-full">
        
        <!-- THUMBNAIL FACADE (Tampil di awal) -->
        <div x-show="!isPlaying" class="absolute inset-0 w-full h-full cursor-pointer" @click="isPlaying = true">
            
            <!-- Thumbnail Gambar Asli (Bisa ditarik dari format standar YouTube: https://img.youtube.com/vi/{id}/maxresdefault.jpg) -->
            <img 
                src="{{ $video->thumbnail_url ?? 'https://img.youtube.com/vi/'.$video->youtube_id.'/maxresdefault.jpg' }}" 
                alt="Play Video: {{ $video->title }}" 
                loading="lazy"
                class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-90 transition-opacity duration-300"
            >
            
            <!-- Gradient Overlay (Atas dan Bawah) -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-slate-900/40"></div>
            
            <!-- Tombol Play Tengah -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-red-600 rounded-full flex items-center justify-center text-white shadow-xl transform transition-transform duration-300 group-hover:scale-110">
                    <svg class="w-8 h-8 md:w-10 md:h-10 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </div>
            </div>
            
            <!-- Metadata Teks -->
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                <h3 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-tight">
                    {{ $video->title }}
                </h3>
                <div class="flex items-center text-sm font-medium text-slate-300 space-x-3">
                    @if($video->published_at)
                        <span>{{ \Carbon\Carbon::parse($video->published_at)->diffForHumans() }}</span>
                    @endif
                    
                    @if($video->duration)
                        <span class="flex items-center text-white bg-black/60 px-2 py-0.5 rounded text-xs">
                            {{ $video->duration }}
                        </span>
                    @endif
                </div>
            </div>
            
        </div>

        <!-- ACTUAL IFRAME (Hanya di-render dan dimainkan otomatis setelah diklik) -->
        <template x-if="isPlaying">
            <iframe 
                class="absolute inset-0 w-full h-full" 
                src="https://www.youtube-nocookie.com/embed/{{ $video->youtube_id }}?autoplay=1&rel=0" 
                title="{{ $video->title }}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen
            ></iframe>
        </template>
        
    </div>
</div>
```

### 4.3. Video Card (Small Grid/List) (`video-card.blade.php`)

```blade
@props(['video'])

<div x-data="{ isPlaying: false }" class="flex flex-col sm:flex-row lg:flex-row gap-4 group cursor-pointer" @click="isPlaying = true">
    
    <!-- Thumbnail Kiri -->
    <div class="relative w-full sm:w-48 lg:w-40 flex-shrink-0 aspect-video bg-slate-200 rounded-lg overflow-hidden">
        
        <!-- Tampilan sebelum klik (Facade) -->
        <div x-show="!isPlaying" class="absolute inset-0 w-full h-full">
            <img 
                src="{{ $video->thumbnail_url ?? 'https://img.youtube.com/vi/'.$video->youtube_id.'/mqdefault.jpg' }}" 
                alt="{{ $video->title }}" 
                loading="lazy"
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
            >
            <!-- Hover Play Icon (Mini) -->
            <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white shadow-md">
                    <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </div>
            </div>
            
            <!-- Durasi YouTube Style -->
            @if($video->duration)
                <div class="absolute bottom-1 right-1 bg-black/80 text-white text-[10px] font-bold px-1.5 py-0.5 rounded shadow">
                    {{ $video->duration }}
                </div>
            @endif
        </div>

        <!-- Tampilan setelah klik (Iframe Autoplay) -->
        <template x-if="isPlaying">
            <iframe 
                class="absolute inset-0 w-full h-full" 
                src="https://www.youtube-nocookie.com/embed/{{ $video->youtube_id }}?autoplay=1&rel=0" 
                title="{{ $video->title }}" 
                frameborder="0" 
                allow="autoplay; encrypted-media" 
                allowfullscreen
            ></iframe>
        </template>
        
    </div>

    <!-- Teks Kanan -->
    <div class="flex-1 flex flex-col justify-center py-1">
        <h4 class="text-base font-bold text-slate-900 leading-snug line-clamp-2 group-hover:text-red-600 transition-colors">
            {{ $video->title }}
        </h4>
        @if($video->published_at)
            <p class="mt-1 text-sm text-slate-500">
                {{ \Carbon\Carbon::parse($video->published_at)->diffForHumans() }}
            </p>
        @endif
    </div>

</div>
```
