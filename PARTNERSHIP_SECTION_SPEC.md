# Spesifikasi Desain Section: Terhubung dengan Dunia Industri

Dokumen ini memuat panduan arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Mitra Industri"**. Sesuai arahan, section ini dirancang untuk menjadi salah satu titik penjualan utama (The Strongest Section) yang meyakinkan siswa bahwa keterampilan mereka memiliki muara (*pipeline*) langsung ke dunia kerja nyata.

## 1. Pesan & Hierarki Copywriting

*   **Pesan Inti:** Jurusan Teknik Otomotif bukan hanya mengajarkan teori, tetapi merupakan pintu gerbang yang difasilitasi oleh industri.
*   **Headline Kuat:** "Belajar dari Sekolah, Berkembang Bersama Industri." (Ditulis dengan font yang sangat tebal/Display font, dipecah menjadi dua baris menggunakan `<br>`).
*   **Subheadline:** "Didukung oleh jaringan kemitraan strategis untuk memastikan kurikulum kami relevan dengan kebutuhan dunia kerja masa kini."

---

## 2. Arsitektur Layout (Visual & UX)

Untuk memberikan bobot yang besar pada *section* ini, kita menggabungkan **Featured Partner Spotlight** dan **Logo Wall (Grid/Marquee)**.

### 2.1. Featured Partner Spotlight (Mitra Utama)
Sebuah kotak (Card) berdesain premium di bagian atas *section* untuk menyorot Mitra Utama (Tier 1/Kelas Industri).
*   **Visual:** Menampilkan foto/video besar kegiatan *teaching factory* atau MoU dengan logo Mitra Utama melayang di atasnya.
*   **Metadata Kolaborasi:**
    *   *Jenis Kerja Sama:* (Misal: "Kelas Industri & Penyelarasan Kurikulum").
    *   *Deskripsi Singkat:* Penjelasan ringkas MoU atau bentuk kerja sama.
*   **Data CMS:** Harus merujuk pada tabel `industry_partners` di mana `is_featured = true` atau `tier = 'Utama'`.

### 2.2. Logo Wall (Mitra Reguler & Tempat PKL)
Di bawah *Featured Partner*, terdapat barisan mitra industri lainnya (Tempat PKL, Tempat Uji Kompetensi).
*   **Desain Elegan:** Latar belakang bersih (`bg-slate-50`), logo-logo perusahaan menggunakan filter CSS `grayscale opacity-60 hover:grayscale-0 hover:opacity-100` agar terlihat homogen, profesional, dan seragam sebelum di-*hover*.
*   **Typographic Fallback:** Jika admin memasukkan data mitra di CMS tetapi lupa/tidak memiliki file gambarnya, logo akan otomatis digantikan oleh kotak minimalis bertuliskan inisial/nama perusahaan tebal (Typographic Name). *Jangan menampilkan broken image*.
*   **Label Jenis Mitra:** Di bawah logo/nama, sertakan teks sangat kecil (misal: "Tempat PKL" atau "MOU: Uji Kompetensi").

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Logo Wall ditampilkan dalam bentuk grid (misal 5 atau 6 kolom). 
*   **Tablet & Mobile (`< 768px`):** Logo Wall bisa menggunakan grid 2-3 kolom, atau diubah menjadi **Infinite Marquee Animation** (berjalan otomatis ke kiri) agar dapat menampung puluhan logo tanpa membuat halaman terlalu panjang secara vertikal.

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── partnership-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── featured-partner.blade.php# Spotlight card Mitra Utama
            ├── logo-grid.blade.php       # Container logo-logo (Grid/Marquee)
            └── logo-item.blade.php       # Item individual (Image / Typographic fallback)
```

### 4.1. Implementasi Utama (`index.blade.php`)

```blade
@props(['featuredPartner', 'partners'])

@if(isset($partners) && $partners->count() > 0)
<section class="py-16 md:py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Strong Headline -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Belajar dari Sekolah, <br class="hidden sm:block">
                <span class="text-red-600">Berkembang Bersama Industri.</span>
            </h2>
            <p class="mt-6 text-lg md:text-xl text-slate-600 max-w-2xl mx-auto">
                Bekerja sama erat dengan pemimpin otomotif untuk memastikan kompetensi lulusan selalu relevan dengan standar global.
            </p>
        </div>

        <!-- Featured Partner Spotlight (Jika Ada) -->
        @if($featuredPartner)
            <div class="mb-16">
                <x-frontend.home.partnership-section.featured-partner :partner="$featuredPartner" />
            </div>
        @endif

        <!-- Logo Wall / Partner Grid -->
        <div>
            <h3 class="text-center text-sm font-semibold uppercase tracking-wider text-slate-400 mb-8">
                Jejaring Industri & Tempat PKL
            </h3>
            
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:gap-8 items-center justify-items-center">
                @foreach($partners as $partner)
                    <x-frontend.home.partnership-section.logo-item :partner="$partner" />
                @endforeach
            </div>
        </div>

        <!-- CTA Action -->
        <div class="mt-16 text-center">
            <a href="{{ route('partners.index') }}" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-md shadow-sm text-white bg-slate-900 hover:bg-slate-800 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900">
                Lihat Mitra Industri
                <!-- Arrow Right Icon -->
                <svg class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>
@endif
```

### 4.2. Logo Item dengan Typographic Fallback (`logo-item.blade.php`)

```blade
@props(['partner'])

<div class="flex flex-col items-center justify-center p-4 w-full h-full group">
    @if($partner->logo_url)
        <!-- Logo Image -->
        <img 
            src="{{ $partner->logo_url }}" 
            alt="Logo {{ $partner->name }}" 
            class="max-h-12 md:max-h-16 w-auto object-contain filter grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300"
        >
    @else
        <!-- Typographic Fallback (Jika tidak ada gambar logo) -->
        <div class="flex h-12 md:h-16 w-full items-center justify-center text-center">
            <span class="text-lg md:text-xl font-bold text-slate-400 group-hover:text-slate-800 transition-colors uppercase tracking-tight">
                {{ $partner->name }}
            </span>
        </div>
    @endif
    
    <!-- Jenis Kerja Sama / Label -->
    @if($partner->partnership_type)
        <span class="mt-3 text-[10px] md:text-xs font-semibold text-slate-400 uppercase tracking-widest text-center group-hover:text-red-500 transition-colors">
            {{ $partner->partnership_type }}
        </span>
    @endif
</div>
```

### 4.3. Featured Partner Box (`featured-partner.blade.php`)
```blade
@props(['partner'])

<div class="relative bg-slate-900 rounded-2xl overflow-hidden shadow-2xl border border-slate-800">
    <div class="absolute inset-0">
        <!-- Background/Workshop Image -->
        <img src="{{ $partner->featured_image_url ?? asset('img/default-workshop.jpg') }}" alt="Teaching Factory {{ $partner->name }}" class="h-full w-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    </div>
    
    <div class="relative p-8 md:p-12 lg:p-16 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="max-w-xl">
            <!-- Typographic Fallback atau Logo Putih -->
            @if($partner->logo_url)
                <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="h-10 md:h-12 w-auto object-contain filter brightness-0 invert mb-6">
            @else
                <h3 class="text-3xl font-extrabold text-white mb-6 uppercase tracking-tight">{{ $partner->name }}</h3>
            @endif
            
            <h4 class="text-xl md:text-2xl font-bold text-white mb-3">
                Program Penyelarasan Kurikulum & Kelas Industri
            </h4>
            <p class="text-slate-300 text-lg">
                {{ $partner->description ?? 'Mitra strategis dalam pengembangan kurikulum, penyediaan teaching factory, dan penyerapan lulusan secara langsung.' }}
            </p>
        </div>
        
        <div class="mt-8 md:mt-0 flex-shrink-0 text-left md:text-right">
            <span class="inline-block px-4 py-2 bg-red-600/20 text-red-400 border border-red-600/30 rounded-lg text-sm font-semibold tracking-wide uppercase">
                Mitra Utama (Tier 1)
            </span>
        </div>
    </div>
</div>
```
