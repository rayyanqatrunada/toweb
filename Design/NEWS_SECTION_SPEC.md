# Spesifikasi Desain Section: Berita & Pengumuman (Information Center)

Dokumen ini berisi spesifikasi arsitektur antarmuka dan komponen Blade untuk *Section* **"Pusat Informasi"** di Landing Page. Bagian ini krusial untuk menunjukkan bahwa website dan institusi "hidup" dan senantiasa memperbarui kegiatannya.

## 1. Tujuan UX & Pemisahan Konteks

*   **Menghindari Kebingungan:** "Berita" (dokumentasi lomba, kunjungan industri) memiliki bobot visual (foto) yang penting, sementara "Pengumuman" (jadwal ujian, syarat daftar ulang) bersifat mendesak, text-heavy, dan butuh perhatian instan.
*   Oleh karena itu, **Pengumuman TIDAK BOLEH dicampur di dalam slider/grid Berita**. Keduanya dipisah secara tata letak dan hierarki warna.

---

## 2. Arsitektur Layout (Desktop & Editorial Grid)

Layout menggunakan asimetris Grid (12 Kolom) untuk memaksimalkan ruang di desktop.

### 2.1. Kolom Kiri: Area Berita (Grid Utama - 8 Kolom)
Fokus pada gambar dan *storytelling*.
*   **Featured News (Artikel Utama):** Satu berita terbaru/terpenting mengambil porsi besar (rasio gambar 16:9 atau lebar penuh kolom). Dilengkapi dengan Teks Kategori, Judul Besar, Excerpt (cuplikan 2 baris), dan Tanggal.
*   **Latest News (Berita Reguler):** Di bawah *Featured*, terdapat 2 atau 3 berita (berbaris menyamping) dengan layout *card* konvensional (Gambar di atas, teks di bawah). 
*   **CTA:** Tombol "Lihat Semua Berita" diletakkan di akhir blok berita.

### 2.2. Kolom Kanan: Area Pengumuman (Sidebar - 4 Kolom)
Fokus pada Teks dan *Urgency*.
*   **Highlighted Box:** Area ini dibingkai dengan warna *background* berbeda (misal: `bg-slate-100` atau *border* `red-200`) agar terkesan sebagai "Papan Pengumuman" (*Bulletin Board*).
*   **List Layout:** Pengumuman tidak menggunakan *thumbnail* gambar besar agar menghemat ruang. UI menggunakan format *List* (Daftar) yang padat.
*   **Attention Grabber:** Menggunakan Ikon (*Megaphone/Bell*) dan warna teks merah untuk penanda urgen/baru.

---

## 3. Business Logic (Aturan Data Kritis)

Sebelum di-render, *controller/backend* **HARUS** memastikan kueri mematuhi aturan berikut:
1.  `status = 'published'` atau `is_public = true` (Dilarang keras me-*render* Draft, Scheduled, atau Private post).
2.  Data dipisah sejak *query*: `$featuredNews` (1 item, diurutkan terbaru/ber-pin), `$latestNews` (2-3 item selain featured), `$announcements` (3-5 item pengumuman terbaru).

---

## 4. Responsive Rules (Mobile Degradation)

*   **Desktop (`> 1024px`):** Split Kiri (Berita) 65% dan Kanan (Pengumuman) 35%.
*   **Tablet (`768px - 1024px`):** Stack vertikal, namun Berita Reguler dibagi menjadi 2 kolom.
*   **Mobile (`< 768px`):** 
    1.  *Featured News* tampil paling atas (besar).
    2.  Lalu disusul oleh *Pengumuman* (Agar informasi penting tidak tenggelam terlalu jauh di bawah *scroll*).
    3.  Lalu disusul barisan *Latest News* (Card yang disusun ke bawah).

---

## 5. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── news-section/
            ├── index.blade.php           # Base Section (Membagi grid)
            ├── featured-news.blade.php   # Komponen Artikel Utama (Besar)
            ├── news-card.blade.php       # Komponen Artikel Reguler
            └── announcement-list.blade.php # Kotak Papan Pengumuman
```

### 5.1. Base Layout (`index.blade.php`)

```blade
@props(['featuredNews', 'latestNews', 'announcements'])

<section class="py-16 md:py-24 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Pusat Informasi</h2>
            <p class="mt-2 text-lg text-slate-600">Berita kegiatan terbaru dan pengumuman akademik.</p>
        </div>

        <div class="lg:grid lg:grid-cols-12 lg:gap-12">
            
            <!-- Kolom Kiri: Berita Utama & Terbaru (8 Kolom) -->
            <div class="lg:col-span-8 flex flex-col">
                
                <!-- Featured News (Besar) -->
                @if($featuredNews)
                    <div class="mb-8">
                        <x-frontend.home.news-section.featured-news :post="$featuredNews" />
                    </div>
                @endif
                
                <!-- Latest News (Grid 2 Kolom) -->
                @if(isset($latestNews) && $latestNews->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                        @foreach($latestNews as $news)
                            <x-frontend.home.news-section.news-card :post="$news" />
                        @endforeach
                    </div>
                @endif
                
                <!-- CTA Berita -->
                <div class="mt-auto md:mb-0 mb-12">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center text-red-600 font-semibold hover:text-red-700">
                        Lihat Semua Berita 
                        <svg class="ml-1.5 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Papan Pengumuman (4 Kolom) -->
            <div class="lg:col-span-4 mt-12 lg:mt-0 order-first lg:order-last mb-12 lg:mb-0">
                <x-frontend.home.news-section.announcement-list :announcements="$announcements" />
            </div>

        </div>

    </div>
</section>
```

### 5.2. Featured News Card (`featured-news.blade.php`)

```blade
@props(['post'])

<a href="{{ route('news.show', $post) }}" class="group block relative rounded-2xl overflow-hidden focus:outline-none focus:ring-4 focus:ring-red-500">
    <div class="relative h-[300px] md:h-[400px] w-full bg-slate-100">
        @if($post->image_url)
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
        <div class="flex items-center space-x-3 mb-3">
            @if($post->category)
                <span class="px-2.5 py-1 text-xs font-bold text-white bg-red-600 rounded-md">
                    {{ $post->category->name }}
                </span>
            @endif
            <span class="text-sm font-medium text-slate-300">
                {{ \Carbon\Carbon::parse($post->published_at)->isoFormat('D MMM Y') }}
            </span>
        </div>
        
        <h3 class="text-2xl md:text-3xl font-bold text-white group-hover:text-red-400 transition-colors mb-2 leading-tight">
            {{ $post->title }}
        </h3>
        
        <p class="text-slate-300 line-clamp-2 md:text-lg">
            {{ Str::limit(strip_tags($post->excerpt ?? $post->content), 120) }}
        </p>
    </div>
</a>
```

### 5.3. Kotak Papan Pengumuman (`announcement-list.blade.php`)

```blade
@props(['announcements'])

<div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 md:p-8 shadow-sm">
    <div class="flex items-center justify-between mb-6 border-b border-slate-200 pb-4">
        <h3 class="text-xl font-bold text-slate-900 flex items-center">
            <svg class="w-6 h-6 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
            Pengumuman
        </h3>
        <a href="{{ route('announcements.index') }}" class="text-sm text-red-600 hover:text-red-700 font-medium">Lihat Semua</a>
    </div>

    @if(isset($announcements) && $announcements->count() > 0)
        <ul class="space-y-5 divide-y divide-slate-100">
            @foreach($announcements as $announcement)
                <li class="{{ !$loop->first ? 'pt-5' : '' }}">
                    <a href="{{ route('announcements.show', $announcement) }}" class="group block focus:outline-none rounded-sm">
                        <div class="flex items-center text-xs font-semibold text-slate-500 mb-1.5">
                            <svg class="w-4 h-4 mr-1.5 text-slate-400 group-hover:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ \Carbon\Carbon::parse($announcement->published_at)->isoFormat('D MMM Y') }}
                            
                            <!-- Label BARU untuk pengumuman < 7 Hari -->
                            @if(now()->diffInDays($announcement->published_at) <= 7)
                                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-700">BARU</span>
                            @endif
                        </div>
                        <h4 class="text-base font-bold text-slate-800 group-hover:text-red-600 transition-colors leading-snug line-clamp-2">
                            {{ $announcement->title }}
                        </h4>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="py-8 text-center text-slate-500 text-sm">
            Tidak ada pengumuman baru.
        </div>
    @endif
</div>
```
