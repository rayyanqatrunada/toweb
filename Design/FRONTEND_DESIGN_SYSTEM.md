# Frontend Design System: Website Jurusan Teknik Otomotif

Dokumen ini berisi panduan komprehensif untuk pengembangan antarmuka (UI) dan pengalaman pengguna (UX) pada website resmi Jurusan Teknik Otomotif. Design system ini dirancang khusus untuk ekosistem **Laravel 13, Blade, Livewire, dan Tailwind CSS**.

---

## 1. Design Philosophy

1.  **Industrial Elegance:** Menggabungkan kesan mekanikal/teknikal dari otomotif dengan estetika modern yang bersih. Tidak menggunakan ornamen dekoratif yang berlebihan.
2.  **Content-First Typography:** Mengandalkan tipografi yang kuat, skala yang jelas, dan white-space untuk membedakan hierarki informasi, bukan mengandalkan banyak *card* atau kotak-kotak (boxes).
3.  **Subtle Depth:** Menghindari *drop shadow* yang terlalu tebal (muddy). Menggunakan *border* tipis (1px) dan perbedaan kontras warna *background* untuk memisahkan section.
4.  **Accessible Professionalism:** Warna dan kontras harus memenuhi standar WCAG (minimal AA) karena audiens meliputi siswa, orang tua, dan mitra industri.
5.  **Performance & Dynamic:** UI harus terasa ringan (snappy) namun tetap mendukung data dinamis (CMS-driven).

---

## 2. Design Tokens (Tailwind CSS)

### 2.1. Color Palette
Menggunakan warna bernuansa industrial dan metalik, dipadukan dengan aksen warna energi (merah/oranye otomotif). Kami merekomendasikan palet `slate` dari Tailwind untuk warna netral karena memberikan nuansa abu-abu kebiruan (metalik).

*   **Primary (Engine Red):** `red-600` (#dc2626) - Untuk CTA utama, tombol submit, dan penekanan.
    *   *Hover:* `red-700`
    *   *Focus Ring:* `red-500`
*   **Neutral/Surface (Metallic Slate):**
    *   *Background:* `slate-50` (#f8fafc) - Latar belakang utama website.
    *   *Surface (Card/Modal):* `white` (#ffffff)
    *   *Border:* `slate-200` (#e2e8f0)
    *   *Subtle Background:* `slate-100` (#f1f5f9) - Untuk alternate section atau table row header.
*   **Typography Colors:**
    *   *Heading/Title:* `slate-900` (#0f172a)
    *   *Body Text:* `slate-600` (#475569)
    *   *Muted/Caption:* `slate-500` (#64748b)
*   **Status Colors:**
    *   *Success:* `emerald-600` (Untuk notifikasi berhasil, status aktif)
    *   *Warning:* `amber-500` (Untuk peringatan)
    *   *Info:* `blue-600` (Untuk informasi tambahan)

### 2.2. Typography Scale
Menggunakan font *sans-serif* yang bersih, teknis, dan memiliki keterbacaan tinggi.
*   **Font Family:** `Inter` atau `Roboto` (Set sebagai font default di Tailwind).

*   **Scale:**
    *   `text-xs` (12px) - Caption, badge, metadata tanggal.
    *   `text-sm` (14px) - Secondary text, tabel, navigasi.
    *   `text-base` (16px) - Body utama, paragraf artikel.
    *   `text-lg` (18px) - Intro teks (lead paragraph).
    *   `text-xl` (20px) - Section subtitle, Card Title.
    *   `text-2xl` (24px) - Section title (Mobile).
    *   `text-3xl` (30px) - Section title (Desktop), Article Title.
    *   `text-4xl` / `text-5xl` - Hero heading.

### 2.3. Spacing & Border Radius
*   **Spacing:** Menggunakan skala Tailwind default (`4`, `8`, `12`, `16`, `24`, `32`).
    *   *Section Padding:* `py-16 md:py-24`
    *   *Component Gap:* `gap-4 md:gap-6`
*   **Border Radius:**
    *   Cenderung lebih *boxy* untuk nuansa teknikal. Hindari *pill-shape* yang terlalu bulat kecuali untuk badge.
    *   *Buttons/Inputs:* `rounded` (4px) atau `rounded-md` (6px).
    *   *Cards/Images:* `rounded-lg` (8px).

---

## 3. Component Specification & Usage

### 3.1. Buttons
*   **Primary:** `bg-red-600 text-white hover:bg-red-700 font-medium px-4 py-2 rounded-md transition-colors`
*   **Secondary/Outline:** `bg-transparent border border-slate-300 text-slate-700 hover:bg-slate-50 font-medium px-4 py-2 rounded-md transition-colors`
*   **Ghost/Text:** `text-red-600 hover:text-red-700 hover:bg-red-50 font-medium px-4 py-2 rounded-md transition-colors`

### 3.2. Badges & Status Indicators
Digunakan untuk label kategori berita, status internship, dll.
*   **Neutral Badge:** `inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800`
*   **Primary Badge:** `inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800`

### 3.3. Cards (News, Alumni, Industry)
Tidak menggunakan *heavy drop-shadow*. Menggunakan kombinasi *border* dan *subtle shadow*.
*   **Card Container:** `bg-white border border-slate-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300`
*   **Card Image:** `aspect-video w-full object-cover bg-slate-100`
*   **Card Body:** `p-5 md:p-6`

### 3.4. Form Elements & Search
*   **Input Field:** `w-full border-slate-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm`
*   **Label:** `block text-sm font-medium text-slate-700 mb-1`
*   **Search Field:** Input biasa ditambah icon *magnifying glass* (Heroicons) dengan styling `pl-10` untuk memberi ruang icon di sebelah kiri.

---

## 4. Responsive Rules (Mobile-First)

1.  **Grid Systems:**
    *   Mobile (`< 768px`): 1 kolom (`grid-cols-1`).
    *   Tablet (`768px - 1024px`): 2 kolom (`md:grid-cols-2`).
    *   Desktop (`> 1024px`): 3 atau 4 kolom (`lg:grid-cols-3` / `xl:grid-cols-4`).
2.  **Typography:** Skala teks mengecil di mobile. Contoh: `text-3xl md:text-4xl lg:text-5xl`.
3.  **Navigation:** Menggunakan Hamburger menu di mobile yang membuka *off-canvas* atau *dropdown full-width*. Di desktop menggunakan navigasi horizontal sejajar.
4.  **Touch Targets:** Tombol dan link di mobile minimal memiliki tinggi/lebar 44px (sesuai standar UX mobile).

---

## 5. UX & Accessibility Rules

### 5.1. UX Rules
*   **Clear Hierarchy:** Gunakan ukuran font yang kontras untuk membedakan judul, subjudul, dan teks body.
*   **Feedback:** Setiap interaksi form atau tombol harus memiliki *state* (hover, focus, disabled, loading).
*   **Empty States:** Jika tidak ada berita/kategori, jangan biarkan kosong. Tampilkan pesan ramah: *"Belum ada berita untuk kategori ini."* dengan ilustrasi sederhana (opsional).
*   **Loading States:** Gunakan *Skeleton Loading* (Tailwind `animate-pulse` dan `bg-slate-200`) untuk data yang diambil via Livewire, alih-alih menampilkan *spinner* layar penuh.

### 5.2. Accessibility (A11y)
*   **Focus Ring:** Jangan hilangkan outline pada elemen *focusable* (`focus:outline-none` HARUS diganti dengan `focus:ring-2`).
*   **Aria Attributes:** Komponen interaktif (dropdown, modal buatan Livewire) harus memiliki `aria-expanded`, `aria-hidden`, `role="dialog"`, dll.
*   **Alt Text:** Semua gambar (Fasilitas, Gallery, Thumbnail Berita) wajib memiliki attribut `alt` yang deskriptif dan ditarik dinamis dari CMS (atau menggunakan judul konten sebagai fallback).
*   **Color Contrast:** Pastikan teks `slate-500` dapat dibaca jelas di atas `slate-50` atau `white`.

---

## 6. Contoh Implementasi HTML (Blade + Tailwind)

### 6.1. Section Heading (Standardized)
```blade
<div class="mb-8 md:mb-12">
    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Mitra Industri</h2>
    <p class="mt-4 text-lg text-slate-600 max-w-2xl">
        Berkolaborasi dengan perusahaan otomotif terkemuka untuk memastikan kurikulum kami relevan dengan kebutuhan industri.
    </p>
</div>
```

### 6.2. News Card Component
```blade
<article class="flex flex-col bg-white border border-slate-200 rounded-lg overflow-hidden hover:shadow-md transition duration-300">
    <div class="flex-shrink-0 relative aspect-video bg-slate-100">
        <img class="h-full w-full object-cover" src="{{ $post->image_url }}" alt="{{ $post->title }}">
        <div class="absolute top-4 left-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/90 text-slate-900 backdrop-blur-sm shadow-sm">
                {{ $post->category->name }}
            </span>
        </div>
    </div>
    <div class="flex-1 p-5 flex flex-col justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-slate-500 mb-2">
                <time datetime="{{ $post->published_at->format('Y-m-d') }}">{{ $post->published_at->format('d M Y') }}</time>
            </p>
            <a href="{{ route('post.show', $post) }}" class="block mt-2 focus:outline-none focus:ring-2 focus:ring-red-500 rounded-sm">
                <h3 class="text-xl font-semibold text-slate-900 hover:text-red-600 line-clamp-2">
                    {{ $post->title }}
                </h3>
                <p class="mt-3 text-base text-slate-600 line-clamp-3">
                    {{ $post->excerpt }}
                </p>
            </a>
        </div>
        <div class="mt-6 flex items-center">
            <a href="{{ route('post.show', $post) }}" class="text-sm font-medium text-red-600 hover:text-red-700 flex items-center">
                Baca selengkapnya
                <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</article>
```

### 6.3. Empty State Component
```blade
<div class="text-center py-12 px-4 border-2 border-dashed border-slate-300 rounded-lg bg-slate-50">
    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
    </svg>
    <h3 class="mt-2 text-sm font-semibold text-slate-900">Belum ada dokumen</h3>
    <p class="mt-1 text-sm text-slate-500">Modul praktikum atau form pendaftaran belum tersedia untuk saat ini.</p>
</div>
```

---

## 7. Rekomendasi Struktur Folder (Blade Components)

Karena project ini menggunakan Laravel Blade & Livewire, direkomendasikan membuat Anonymous Blade Components untuk UI yang berulang, sehingga UI terpusat dan mudah di-maintain.

Struktur di dalam `resources/views/components/`:
```text
components/
├── ui/                     # Basic UI elements (Atomic)
│   ├── button.blade.php
│   ├── badge.blade.php
│   ├── alert.blade.php
│   └── tooltip.blade.php
├── form/                   # Form inputs & labels
│   ├── input.blade.php
│   ├── select.blade.php
│   ├── label.blade.php
│   └── error.blade.php
├── layout/                 # Structural components
│   ├── container.blade.php
│   ├── section.blade.php
│   ├── header.blade.php
│   └── footer.blade.php
├── data/                   # Data presentation
│   ├── card-post.blade.php
│   ├── card-teacher.blade.php
│   ├── table.blade.php
│   ├── empty-state.blade.php
│   └── pagination.blade.php
└── icons/                  # SVG Icons wrappers
    ├── arrow-right.blade.php
    └── ...
```

**Cara Penggunaan (Contoh):**
```blade
<x-layout.section class="bg-white">
    <x-layout.container>
        <x-ui.section-heading 
            title="Berita Terbaru" 
            subtitle="Informasi dan kegiatan terbaru dari jurusan Teknik Otomotif" 
        />
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <x-data.card-post :post="$post" />
            @endforeach
        </div>
    </x-layout.container>
</x-layout.section>
```
