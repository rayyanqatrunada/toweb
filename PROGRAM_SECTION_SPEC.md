# Spesifikasi Desain Program & Kompetensi Section

Dokumen ini memuat panduan UI/UX serta struktur komponen Blade untuk section **"Program Keahlian & Kompetensi"**, yang berfungsi sebagai pusat informasi keahlian apa saja yang ditawarkan oleh Jurusan Teknik Otomotif.

## 1. Tujuan & Arsitektur Konten

Pengunjung (calon siswa & orang tua) harus segera tahu **"Apa yang membedakan belajar di sini dengan di tempat lain?"**.

*   **Pesan Inti:** Pembelajaran yang aplikatif, bukan sekadar teori kelas.
*   **Hierarki Visual (Top to Bottom):**
    1.  **Eyebrow:** `PROGRAM KEAHLIAN` (Kecil, Uppercase, Red-600)
    2.  **Headline:** `Belajar tidak hanya teori.` (Besar, Slate-900)
    3.  **Subtitle (Opsional):** "Kurikulum berbasis industri dengan porsi praktik 70% di fasilitas berstandar nasional."
    4.  **Grid Cards:** Menampilkan 2 hingga 4 kartu (tergantung jumlah data di database).

## 2. Spesifikasi UI: Non-Generic Cards

Agar tidak terlihat seperti *template blog generik*, *Card* Program didesain dengan konsep **"Interactive Feature Card"** yang menggabungkan elemen visual tajam, tipografi teknikal, dan interaksi *hover* untuk melihat daftar kompetensi.

### Komponen Internal Card Program
*   **Background Visual:** Alih-alih gambar kotak di atas judul (seperti berita), gambar dijadikan latar belakang (cover) dengan layer *gradient overlay* yang cukup tebal dari bawah ke atas.
*   **Icon (Badge):** Icon mekanik/teknologi yang diletakkan di sudut kiri atas (opsional).
*   **Nama Program:** Teks putih, tebal, ukuran `text-2xl` di sudut kiri bawah.
*   **Deskripsi Singkat:** Muncul tepat di bawah nama.
*   **Competency Preview (Interaksi Hover):**
    *   *Default State:* Daftar kompetensi tidak terlihat (opacity 0 atau translate ke bawah).
    *   *Hover State:* Saat cursor mendekati Card, deskripsi menghilang/naik, dan *list* kompetensi inti (misal: "Engine Management", "Chassis Electrical", "EV Basics") muncul meluncur ke atas (*slide up*).
*   **CTA Button:** Arrow icon yang berubah warna saat di-hover. "Lihat Detail Program ➔".

---

## 3. Responsive Rules & Interaksi

### 3.1. Desktop (`> 1024px`)
*   **Layout:** Grid 2 kolom atau 3 kolom tergantung jumlah program (`grid-cols-1 md:grid-cols-2 lg:grid-cols-3`).
*   **Interaksi:** Mengandalkan *Hover Effect (CSS transition)*. Card membesar sedikit (`scale-105` atau `scale-[1.02]`), shadow membesar (`shadow-2xl`), dan *Competency List* muncul dari bawah (translate-y-0 opacity-100).

### 3.2. Tablet & Mobile (`< 768px`)
*   **Interaksi Hover pada Touch Screen:** Karena mobile tidak punya "hover", *Competency List* harus **selalu tampil** secara statis, atau diletakkan dalam *collapsible accordion* mini di dalam card.
*   **Layout Mobile:**
    *   Direkomendasikan **Horizontal Scroll (Swipeable Carousel/Snap)** dengan `overflow-x-auto snap-x snap-mandatory`. Menghemat ruang vertikal.
    *   Setiap Card menggunakan `min-w-[85vw] snap-center`, agar pengguna bisa menggeser (swipe) ke kiri/kanan untuk melihat program lain.
    *   Alternatif: **Stacked Cards** (vertikal berjejer) jika jumlah program hanya 2.

---

## 4. Business Logic (Data Check)

*   **Ketersediaan Data:** Section ini di-*wrap* dengan Blade condition (`@if($programs->count() > 0)`). Jika belum ada program keahlian yang dimasukkan oleh admin, section ini akan hilang sepenuhnya tanpa jejak (graceful fail).
*   **Fallback Image:** Jika program spesifik belum diberi gambar oleh admin, gunakan *default cover pattern* jurusan.

---

## 5. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── program-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── header.blade.php          # Eyebrow + Headline
            ├── grid.blade.php            # Container Grid / Horizontal Scroll
            └── card.blade.php            # Interactive Non-Generic Card
```

### Contoh Konsep Interaktif `card.blade.php` (Desktop Hover + Mobile Static)

```blade
@props(['program'])

<a href="{{ route('programs.show', $program) }}" class="group relative block h-96 w-full rounded-xl overflow-hidden bg-slate-900 focus:outline-none focus:ring-4 focus:ring-red-500 snap-center min-w-[85vw] md:min-w-0 flex-shrink-0 md:flex-shrink">
    
    <!-- Background Image -->
    <img src="{{ $program->image_url }}" alt="{{ $program->name }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105 group-hover:opacity-60 opacity-80 md:opacity-90">
    
    <!-- Gradient Overlay untuk Keterbacaan -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>

    <!-- Konten di Bawah Kiri -->
    <div class="absolute inset-x-0 bottom-0 p-6 md:p-8 flex flex-col justify-end h-full">
        <h3 class="text-2xl font-bold text-white mb-2 transform transition-transform duration-300 md:group-hover:-translate-y-4">
            {{ $program->name }}
        </h3>
        
        <!-- Deskripsi Singkat (Tampil Default, memudar saat di-hover di Desktop) -->
        <p class="text-slate-300 text-sm md:text-base line-clamp-2 md:group-hover:opacity-0 transition-opacity duration-300 md:group-hover:absolute md:group-hover:invisible">
            {{ Str::limit(strip_tags($program->description), 100) }}
        </p>
        
        <!-- Competency List (Tersembunyi di Desktop, muncul saat di-hover. Selalu tampil di Mobile) -->
        <div class="mt-4 md:absolute md:bottom-8 md:opacity-0 md:translate-y-4 md:group-hover:opacity-100 md:group-hover:translate-y-0 transition-all duration-300 hidden md:block">
            @if($program->competencies)
                <p class="text-red-400 font-semibold text-xs tracking-wider uppercase mb-2">Kompetensi Utama:</p>
                <ul class="text-white text-sm space-y-1">
                    @foreach(array_slice($program->competencies, 0, 3) as $kompetensi)
                        <li class="flex items-center">
                            <svg class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            {{ $kompetensi }}
                        </li>
                    @endforeach
                </ul>
            @endif
            
            <div class="mt-4 inline-flex items-center text-red-400 font-medium text-sm group-hover:text-red-300">
                Lihat Detail Program
                <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </div>
        
        <!-- Competency Mobile Static View (Hanya tampil di Mobile) -->
        <div class="mt-4 md:hidden">
             <div class="inline-flex items-center text-red-400 font-medium text-sm">
                Pelajari Lebih Lanjut
                <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </div>

    </div>
</a>
```

### Penggabungan di Induk `index.blade.php`
```blade
@if(isset($programs) && $programs->count() > 0)
<section id="program-keahlian" class="py-16 md:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <x-frontend.home.program-section.header />

        <!-- Container Grid / Horizontal Scroll -->
        <!-- Gunakan flex row dgn overflow-x-auto utk mobile snap scroll, dan CSS grid utk MD ke atas -->
        <div class="mt-12 md:mt-16 flex overflow-x-auto snap-x snap-mandatory hide-scrollbar md:grid md:grid-cols-2 lg:grid-cols-{{ min($programs->count(), 3) }} gap-6 pb-8 md:pb-0">
            
            @foreach($programs as $program)
                <x-frontend.home.program-section.card :program="$program" />
            @endforeach
            
        </div>
        
    </div>
</section>
@endif
```
