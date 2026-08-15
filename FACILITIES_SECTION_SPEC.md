# Spesifikasi Desain Section: Fasilitas Jurusan

Dokumen ini berisi spesifikasi arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Fasilitas"**. Bagian ini ditujukan untuk memberikan gambaran lingkungan belajar dan praktik (bengkel/laboratorium) yang sesungguhnya kepada calon siswa.

## 1. Tujuan & Filosofi UX

*   **Realitas vs Janji:** Gambar fasilitas adalah aset terkuat untuk meyakinkan calon siswa. Karenanya, **DILARANG** menggunakan gambar *stock photo* generik dari internet.
*   **Editorial Feeling:** Alih-alih menyajikan fasilitas dalam bentuk grid 12 kotak yang monoton (seperti halaman e-commerce), section ini mengadaptasi gaya **Majalah Editorial (Editorial Layout)**. Satu fasilitas unggulan (*Featured*) diberi porsi dominan, dikelilingi fasilitas pendukung.

---

## 2. Arsitektur Editorial Layout (Desktop & Tablet)

Layout dibangun berbasis grid asimetris untuk membedakan visual *Featured* dan *Standard*.

### 2.1. Featured Facility (Fokus Utama)
Mengambil porsi **2/3 lebar layar (atau 100% lebar layar di baris atas)**.
*   **Gambar Besar (Large Image):** Rasio 16:9 (Landscape) dengan kualitas tinggi. Menampilkan bengkel utama atau alat praktik termahal/terbaik.
*   **Overlay Konten:** Teks diletakkan melayang (overlay) di atas gambar menggunakan gradient hitam transparan (mirip gaya desain Apple/koran digital).
*   **Elemen:** Kategori (misal: "Laboratorium Praktik"), Nama (misal: "Bengkel Chassis & Suspensi"), Deskripsi pendek (max 2 baris).

### 2.2. Other Facilities (Fasilitas Pendukung)
Ditampilkan di sebelah kanan (1/3 layar) atau di baris bawah Featured.
*   **Gambar Sedang/Kecil:** Rasio 4:3 atau 1:1.
*   **Teks Bersih:** Teks berada di bawah gambar, tidak menimpa gambar.
*   **Limitasi:** Hanya tampilkan 2 atau 3 "Other Facilities". Sisanya dialihkan ke tombol CTA "Lihat Seluruh Fasilitas".

---

## 3. Responsive Rules (Mobile)

Desain editorial asimetris umumnya rusak di layar HP jika dipaksakan. Oleh karena itu, kita menerapkan degradasi layout:
*   **Mobile (`< 768px`):** Semua gambar menjadi 1 kolom vertikal (`flex-col`). 
*   **Hierarki Mobile:**
    1.  *Featured Facility* berada paling atas, dimensinya besar (rasio 4:3).
    2.  Fasilitas lainnya (nomor 2 dan 3) menyusul di bawahnya dengan ukuran gambar yang lebih pendek (rasio 16:9).
    3.  Tombol CTA "Lihat Seluruh Fasilitas" diletakkan penuh (`w-full`) di paling bawah.

---

## 4. Struktur Komponen Blade & Business Logic

*   **Penentuan Featured:** Di Controller, ambil fasilitas dengan kondisi khusus (misalnya `is_featured = true`) atau cukup ambil elemen pertama (`$facilities->first()`) sebagai Featured, dan sisanya (`$facilities->skip(1)->take(3)`) sebagai *Other facilities*.

```text
components/
└── frontend/
    └── home/
        └── facility-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── featured-card.blade.php   # Kartu besar (Overlay text)
            └── standard-card.blade.php   # Kartu kecil pendukung
```

### 4.1. Contoh Implementasi Induk (`index.blade.php`)

```blade
@props(['facilities'])

@if(isset($facilities) && $facilities->count() > 0)
<section class="py-16 md:py-24 bg-slate-900 text-white"> <!-- Tema gelap agar gambar mencolok -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Lingkungan Belajar</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-bold text-white tracking-tight">Fasilitas Standar Industri</h2>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('facilities.index') }}" class="text-sm font-medium text-slate-300 hover:text-white flex items-center transition-colors">
                    Lihat Seluruh Fasilitas
                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Editorial Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Featured (Kiri: 8 Kolom) -->
            @php $featured = $facilities->first(); @endphp
            @if($featured)
            <div class="lg:col-span-8">
                <x-frontend.home.facility-section.featured-card :facility="$featured" />
            </div>
            @endif

            <!-- Others (Kanan: 4 Kolom, Vertical Stack) -->
            <div class="lg:col-span-4 flex flex-col gap-6">
                @foreach($facilities->skip(1)->take(2) as $facility)
                    <x-frontend.home.facility-section.standard-card :facility="$facility" />
                @endforeach
            </div>

        </div>

        <!-- Mobile CTA Fallback -->
        <div class="mt-8 md:hidden">
            <a href="{{ route('facilities.index') }}" class="block text-center px-4 py-3 bg-slate-800 hover:bg-slate-700 rounded-md text-white font-medium transition-colors">
                Lihat Seluruh Fasilitas
            </a>
        </div>
        
    </div>
</section>
@endif
```

### 4.2. Featured Card (Overlay) `featured-card.blade.php`

```blade
@props(['facility'])

<a href="{{ route('facilities.show', $facility) }}" class="group relative block w-full h-[400px] md:h-[500px] lg:h-full rounded-2xl overflow-hidden focus:outline-none focus:ring-4 focus:ring-red-500">
    <!-- Image -->
    <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105">
    
    <!-- Heavy Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
    
    <!-- Content Layer -->
    <div class="absolute inset-0 p-6 md:p-10 flex flex-col justify-end">
        @if($facility->category)
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-600/90 text-white backdrop-blur-sm shadow-sm w-max mb-3">
                {{ $facility->category->name }}
            </span>
        @endif
        
        <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">
            {{ $facility->name }}
        </h3>
        
        <p class="text-slate-300 line-clamp-2 md:text-lg max-w-2xl">
            {{ $facility->description }}
        </p>
    </div>
</a>
```

### 4.3. Standard Card (Small) `standard-card.blade.php`

```blade
@props(['facility'])

<a href="{{ route('facilities.show', $facility) }}" class="group flex flex-col sm:flex-row lg:flex-col gap-4 bg-slate-800/50 hover:bg-slate-800 rounded-xl p-4 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 h-full">
    
    <!-- Image Thumbnail -->
    <div class="relative w-full sm:w-1/3 lg:w-full aspect-video rounded-lg overflow-hidden flex-shrink-0">
        <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
    </div>
    
    <!-- Content -->
    <div class="flex flex-col flex-1 justify-center">
        @if($facility->category)
            <span class="text-red-400 text-xs font-bold uppercase tracking-wider mb-1">
                {{ $facility->category->name }}
            </span>
        @endif
        <h4 class="text-lg font-bold text-white group-hover:text-red-400 transition-colors">
            {{ $facility->name }}
        </h4>
        <p class="text-slate-400 text-sm mt-1 line-clamp-2">
            {{ Str::limit($facility->description, 70) }}
        </p>
    </div>
</a>
```
