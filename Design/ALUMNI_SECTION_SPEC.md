# Spesifikasi Desain Section: Jejak Lulusan (Alumni)

Dokumen ini berisi rancangan arsitektur antarmuka dan komponen Blade untuk *Section* **"Alumni"**. Bagian ini merupakan bukti nyata (*ultimate social proof*) tentang dampak dari kurikulum pendidikan, sekaligus menjadi motivasi bagi calon siswa.

## 1. Tujuan & Filosofi Desain

*   **Impact, bukan Jejaring Sosial:** Desain bertujuan merayakan kesuksesan para lulusan, bukan menghubungkan mereka seperti Facebook. Tidak ada tombol *Follow*, *Add Friend*, atau *Direct Message*.
*   **Privacy-First:** Privasi adalah hal mutlak. Semua data (seperti lokasi kota) hanya dirender di halaman jika statusnya secara spesifik disetel sebagai `public` di *backend*.
*   **Visual Editorial Portrait:** Alih-alih kotak *card* kaku, kita menggunakan tata letak *Editorial Portrait* yang elegan untuk *Featured Alumni*, memberi kesan seperti wawancara eksklusif di majalah.

---

## 2. Arsitektur Konten & Layout

### 2.1. Aggregate Statistics (Status Bar Lulusan)
Di bagian paling atas (sebelum deretan wajah alumni), terdapat sebuah *summary bar* ringkas (jika data agregat dari CMS tersedia).
*   (Misal: `85% Bekerja di Industri`, `10% Melanjutkan Studi`, `5% Wirausaha`).
*   Data ini sangat berharga bagi orang tua siswa sebagai indikator keberhasilan jurusan.

### 2.2. Featured Alumni (Editorial Portrait)
*   **Format:** Hanya menampilkan 3 hingga 4 alumni unggulan (Featured) di *Homepage*.
*   **Gambar:** Foto *Portrait* (rasio 3:4 atau 4:5), idealnya menggunakan pakaian kerja (*wearpack*/jas) agar terasa nyata.
*   **Metadata:**
    *   **Nama:** Jelas dan elegan.
    *   **Angkatan:** (Misal: Lulusan 2022).
    *   **Pekerjaan & Perusahaan:** (Misal: *Senior Technician* di PT Toyota Astra Motor).
    *   **Lokasi (Opsional):** (Misal: Karawang, Jawa Barat - Hanya jika public).
*   **Aksen Visual:** Tambahkan ornamen kutipan pendek (Quote) yang melayang (*overlay*) di foto jika alumni tersebut memberikan testimoni positif.

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Menggunakan Grid 3 atau 4 kolom. Gambar mengisi seluruh tinggi *card*, sementara teks melayang (*gradient overlay*) di bagian bawah, mirip sampul majalah.
*   **Mobile (`< 768px`):** Diubah menjadi **Swipeable Carousel** (Horizontal scroll dengan *snap*). Karena rasio foto adalah *portrait*, menyusun semuanya secara vertikal akan memakan layar terlalu panjang. *Swipeable* adalah solusi paling natural.

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── alumni-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── aggregate-stats.blade.php # Baris statistik ringkasan
            └── portrait-card.blade.php   # Kartu editorial foto alumni
```

### 4.1. Wrapper Utama (`index.blade.php`)

```blade
@props(['featuredAlumni', 'aggregateStats'])

{{-- Pengecekan Kritis: Render hanya jika ada data alumni yang di-featured --}}
@if(isset($featuredAlumni) && $featuredAlumni->count() > 0)
<section class="py-16 md:py-24 bg-slate-900 text-white overflow-hidden relative"> <!-- Tema gelap menonjolkan foto portrait -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="max-w-2xl">
                <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Dampak Nyata</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-white tracking-tight">Jejak Lulusan Kami</h2>
                <p class="mt-4 text-lg text-slate-300">
                    Menyaksikan langkah para alumnus membangun karier cemerlang dan mengukir prestasi di berbagai lini industri.
                </p>
            </div>
            
            <div class="hidden md:block mt-6 md:mt-0">
                <a href="{{ route('alumni.index') }}" class="inline-flex items-center text-sm font-medium text-slate-300 hover:text-white transition-colors">
                    Jelajahi Alumni
                    <svg class="ml-1.5 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Aggregate Statistics (Jika Ada) -->
        @if(isset($aggregateStats) && !empty($aggregateStats))
            <div class="mb-12">
                <x-frontend.home.alumni-section.aggregate-stats :stats="$aggregateStats" />
            </div>
        @endif

        <!-- Editorial Portrait Container (Grid Desktop, Horizontal Scroll Mobile) -->
        <div class="flex overflow-x-auto snap-x snap-mandatory hide-scrollbar md:grid md:grid-cols-2 lg:grid-cols-4 gap-6 pb-8 md:pb-0">
            @foreach($featuredAlumni as $alumni)
                <x-frontend.home.alumni-section.portrait-card :alumni="$alumni" />
            @endforeach
        </div>
        
        <!-- Mobile CTA Fallback -->
        <div class="mt-8 md:hidden text-center">
            <a href="{{ route('alumni.index') }}" class="block px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-medium rounded-md transition-colors w-full">
                Jelajahi Alumni
            </a>
        </div>

    </div>
</section>
@endif
```

### 4.2. Portrait Editorial Card (`portrait-card.blade.php`)

```blade
@props(['alumni'])

<div class="relative group block w-[75vw] sm:w-[60vw] md:w-full flex-shrink-0 snap-center rounded-2xl overflow-hidden focus:outline-none focus:ring-2 focus:ring-red-500 h-[450px]">
    
    <!-- Portrait Foto -->
    @if($alumni->image_url)
        <img 
            src="{{ $alumni->image_url }}" 
            alt="Foto {{ $alumni->name }}" 
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105"
        >
    @else
        <!-- Fallback Pattern jika belum upload foto -->
        <div class="absolute inset-0 bg-slate-800 flex items-center justify-center text-slate-600">
            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
        </div>
    @endif
    
    <!-- Gradient Overlay (Darken bottom for text readability) -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>

    <!-- Teks Konten Editorial -->
    <div class="absolute inset-0 p-6 flex flex-col justify-end text-left">
        
        <!-- Tahun Angkatan (Badge) -->
        <span class="inline-block px-2.5 py-1 bg-red-600 text-white text-xs font-bold rounded-md shadow-sm mb-3 w-max">
            Lulusan {{ $alumni->graduation_year }}
        </span>
        
        <!-- Nama Alumni -->
        <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-red-400 transition-colors">
            {{ $alumni->name }}
        </h3>
        
        <!-- Pekerjaan & Perusahaan -->
        <p class="text-slate-300 font-medium text-sm md:text-base leading-snug">
            {{ $alumni->job_title }} <br>
            <span class="text-slate-400 font-normal">di {{ $alumni->company }}</span>
        </p>

        <!-- Privasi: Cek Kota Jika Public -->
        @if($alumni->city && $alumni->is_city_public)
            <div class="mt-3 flex items-center text-xs text-slate-500">
                <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $alumni->city }}
            </div>
        @endif
        
    </div>
</div>
```

### 4.3. Aggregate Stats Bar (`aggregate-stats.blade.php`)
```blade
@props(['stats'])

<!-- Tampil Elegan seperti HUD Status Bar -->
<div class="bg-slate-800/50 border border-slate-700/50 rounded-xl p-6 backdrop-blur-sm flex flex-col sm:flex-row items-center justify-around gap-6 text-center">
    @if(isset($stats['employed']))
        <div>
            <div class="text-3xl font-extrabold text-white">{{ $stats['employed'] }}%</div>
            <div class="text-xs font-bold tracking-widest text-slate-400 uppercase mt-1">Bekerja di Industri</div>
        </div>
    @endif
    @if(isset($stats['entrepreneur']))
        <div class="sm:border-l sm:border-slate-700 sm:pl-8">
            <div class="text-3xl font-extrabold text-white">{{ $stats['entrepreneur'] }}%</div>
            <div class="text-xs font-bold tracking-widest text-slate-400 uppercase mt-1">Wirausaha/Bengkel Mandiri</div>
        </div>
    @endif
    @if(isset($stats['study']))
        <div class="sm:border-l sm:border-slate-700 sm:pl-8">
            <div class="text-3xl font-extrabold text-white">{{ $stats['study'] }}%</div>
            <div class="text-xs font-bold tracking-widest text-slate-400 uppercase mt-1">Melanjutkan Studi</div>
        </div>
    @endif
</div>
```
