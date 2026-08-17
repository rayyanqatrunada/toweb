# Spesifikasi Desain Hero Section: Landing Page

Dokumen ini berisi spesifikasi arsitektur UI/UX untuk area **Hero Section** (bagian teratas) pada Landing Page utama website Jurusan Teknik Otomotif. 

## 1. Peran & Tujuan Hero Section
Hero section berfungsi sebagai kesan digital pertama (*digital first impression*). Tujuannya adalah:
1. Menyampaikan **secara instan** bahwa ini adalah website Jurusan Teknik Otomotif.
2. Memancarkan identitas industrial, mekanikal, dan profesionalisme.
3. Memberikan alasan/dorongan (melalui copy dan visual) untuk menggulir layar ke bawah.
4. Memberikan dua jalur aksi (CTA) yang jelas.

---

## 2. Struktur Konten & Hierarki Visual

Setiap varian Hero Section minimal mengandung komponen berikut secara terstruktur:

1.  **Eyebrow / Label (Highest Position, Lowest Weight):**
    Teks kecil di atas Headline (misal: `"SMK NEGERI 1 CONTOH | JURUSAN UNGGULAN"` atau `"PUSAT KEUNGGULAN (CoE)"`).
2.  **Headline (Highest Visual Weight):**
    Copywriter yang kuat. *Hindari "Selamat Datang"*. 
    Contoh: **"Menyiapkan Generasi Profesional di Dunia Otomotif"** atau **"Kuasai Teknologi Kendaraan Masa Depan"**.
3.  **Supporting Paragraph (Medium Weight):**
    Penjelasan 2-3 baris. Mengambil ringkasan dari profil jurusan (diambil dari CMS table `profiles/settings` jika ada).
4.  **Call-to-Action (CTA) (High Interaction Weight):**
    - **Primary:** "Jelajahi Jurusan" (Solid Red Button)
    - **Secondary:** "Lihat Program Keahlian" (Outline Button)
5.  **Optional Quick Stats/Badges:**
    - "Akreditasi A"
    - "Berdiri Sejak 1998"
    - "X+ Mitra Industri" (Angka X dinamis dari database).

---

## 3. Variasi Layout (Rekomendasi)

### Variasi A: Immersive Full Background (Sangat Direkomendasikan)
Cocok jika sekolah memiliki foto beresolusi tinggi, artistik, dan dramatis (misal: siswa memegang *wrench* di bawah mobil yang terangkat, atau bengkel dengan pencahayaan *cinematic*).
*   **Layout:** Gambar penuh mengisi layar (`min-h-screen` atau `min-h-[80vh]`).
*   **Overlay:** Gradient gelap pekat dari bawah dan kiri (`bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent`) agar teks putih (Eyebrow, Headline) di sebelah kiri sangat terbaca (High WCAG Contrast).
*   **Kesan:** Emosional, dramatis, profesional.

### Variasi B: Split Layout (Modern & Clean)
Cocok jika gambar tidak terlalu sinematik, fokus pada informasi terstruktur.
*   **Layout:** 50% Teks (kiri) dan 50% Gambar (kanan) di Desktop.
*   **Visual:** Sisi kanan bisa berupa gambar potong (masking) otomotif, atau *overlapping images* (2-3 gambar yang tumpang tindih: praktik siswa, blok mesin, dan gedung workshop).
*   **Background:** Menggunakan `bg-slate-50` agar teks gelap terbaca dengan sangat baik.

### Variasi C: Workshop Collage (Dynamic)
*   **Layout:** Teks berada di tengah (*Center Aligned*).
*   **Visual:** Dikelilingi grid foto-foto aktivitas bengkel/workshop yang tertata rapi.
*   **Kesan:** Aktif, penuh kegiatan, cocok jika ingin memamerkan fasilitas yang beragam.

---

## 4. Responsiveness & Spesifikasi Perangkat

1.  **Mobile (`< 768px`)**
    *   **Layout:** Stack vertikal. Gambar diubah rasio-nya menjadi persegi atau 4:3 dan diletakkan di atas atau di bawah teks (untuk Varian B). Untuk Varian A, teks berada di tengah bawah di atas gradient gelap.
    *   **Typography:** Headline mengecil ke `text-4xl` atau `text-3xl`. Teks body menjadi `text-base`.
    *   **CTA:** Tombol berjejer secara vertikal (`flex-col`) untuk *tap target* yang bersahabat dengan jari (100% width).
2.  **Tablet (`768px - 1024px`)**
    *   **Layout:** Mulai menggunakan 2 kolom jika Split Layout.
    *   **CTA:** Tombol dapat diatur horizontal (`flex-row`).
3.  **Desktop (`> 1024px`)**
    *   **Layout:** Teks dan gambar seimbang.
    *   **Typography:** Headline besar (`text-5xl` atau `text-6xl`). Body copy lebih leluasa.
    *   **Quick Info:** Dimunculkan di bawah tombol CTA (sebagai 3 kolom metrik mini).

---

## 5. Rekomendasi Animasi (Micro-interactions)

Agar website terasa "hidup" tanpa mengganggu performa:
1.  **Staggered Fade-Up:** Saat halaman di-load, Eyebrow muncul dari bawah ke atas (fade up), disusul Headline (delay 100ms), lalu Paragraph (delay 200ms), lalu CTA (delay 300ms). Gunakan Alpine.js (`x-transition`) atau *AOS (Animate On Scroll)* yang ringan.
2.  **Button Hover:** CTA Primary sedikit terangkat (translate-y-[-2px]) dan menambah shadow saat di-hover.
3.  **Image Pan (Ken Burns Effect) - Opsional untuk Varian A:** Background utama secara sangat lambat membesar (zoom 1% ke 5% dalam 10 detik) menggunakan CSS murni untuk memberi kesan ruang (bengkel/workshop).

---

## 6. Image Specification

*   **Format:** Wajib menggunakan format WebP untuk performa.
*   **Rasio:** Untuk Varian A (16:9 atau super-wide). Untuk Varian B (3:4 portrait atau 1:1).
*   **Kualitas & Autentisitas:** JANGAN gunakan vector illustrasi 2D generik atau stok foto orang barat. Gunakan **foto riil siswa di bengkel SMK dengan baju wearpack**. Konten asli memancarkan rasa saling percaya (trust) yang jauh lebih tinggi.
*   **ALT Text:** `alt="Siswa jurusan otomotif sedang merakit blok mesin di bengkel utama"`.

---

## 7. Rekomendasi Struktur Komponen (Blade)

Untuk fleksibilitas, arsitektur *Hero Component* disarankan berbentuk sebagai berikut di dalam folder `resources/views/components/frontend/hero/`:

```text
components/
└── frontend/
    └── hero/
        ├── index.blade.php           # Base Wrapper (menerima variable $layout_type)
        ├── layout-full.blade.php     # Varian A (Immersive background)
        ├── layout-split.blade.php    # Varian B (Split kiri-kanan)
        ├── eyebrow.blade.php         # Teks label atas
        ├── title.blade.php           # H1 element
        ├── description.blade.php     # P element
        ├── cta-group.blade.php       # Wrapper tombol CTA
        └── stats-row.blade.php       # Komponen badge/angka opsional (dikirim dari controller)
```

### 7.1 Contoh Implementasi `layout-split.blade.php` (Varian B)
```blade
<section class="relative bg-slate-50 overflow-hidden pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            
            <!-- Text Content -->
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left flex flex-col justify-center">
                
                <x-frontend.hero.eyebrow>
                    {{ $institutionName ?? 'JURUSAN TEKNIK OTOMOTIF' }}
                </x-frontend.hero.eyebrow>
                
                <x-frontend.hero.title class="mt-3">
                    {{ $headline }}
                </x-frontend.hero.title>
                
                <x-frontend.hero.description class="mt-5">
                    {{ $description }}
                </x-frontend.hero.description>
                
                <x-frontend.hero.cta-group class="mt-8 sm:mt-10">
                    <a href="#about" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 md:text-lg transition-all shadow-sm hover:shadow">
                        Jelajahi Jurusan
                    </a>
                    <a href="{{ route('programs') }}" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-medium rounded-md text-slate-700 bg-transparent hover:bg-slate-100 md:text-lg transition-all">
                        Lihat Program Keahlian
                    </a>
                </x-frontend.hero.cta-group>
                
                <!-- Stats Row (Dynamic from CMS) -->
                @if(isset($stats))
                <x-frontend.hero.stats-row :stats="$stats" class="mt-10 border-t border-slate-200 pt-8" />
                @endif
                
            </div>
            
            <!-- Image Content -->
            <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                <div class="relative mx-auto w-full rounded-lg shadow-xl lg:max-w-md overflow-hidden">
                    <img class="w-full h-auto object-cover rounded-lg aspect-[4/3] bg-slate-200" src="{{ $imageUrl }}" alt="Siswa praktik di workshop otomotif">
                </div>
            </div>
            
        </div>
    </div>
</section>
```
