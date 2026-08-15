# Spesifikasi Desain Profil Section (Setelah Hero)

Dokumen ini berisi arsitektur antarmuka dan struktur komponen untuk Section Profil ("Siapa Kami") yang tampil tepat setelah Hero Section di Landing Page.

## 1. Konsep Storytelling & Tujuan

Section ini bertugas mengawali alur *storytelling* website:
*   *Hero:* (Kesan Pertama & Hook)
*   **Profil Section:** -> **"Siapa Kami?"** (Trust & Kredibilitas Institusi)
*   *Section Berikutnya:* -> "Apa yang Dipelajari?" (Program Keahlian)
*   *Section Berikutnya:* -> "Apa Keunggulan Kami?" (Fasilitas & Prestasi)
*   *Section Berikutnya:* -> "Ke Mana Lulusan Kami?" (Alumni & Mitra Industri)

Tantangannya adalah memasukkan Profil, Visi-Misi, Sambutan, dan Nilai Karakter tanpa membuat pengunjung bosan membaca *wall of text*.

---

## 2. Arsitektur Layout (Desktop & Split Design)

Untuk menghindari tampilan yang membosankan, kita menggunakan pendekatan **Asymmetrical Split Layout** dipadukan dengan **Bento Box / Information Blocks**.

### Grid Utama (Desktop: 12 Kolom)

**Kolom Kiri (Visual & Karakter - 5 Kolom):**
*   **Portrait Kepala Jurusan (Kajur):** Sebuah foto portrait profesional kepala jurusan (jika tersedia).
*   **Highlighted Quote:** Kutipan singkat dan kuat (Visi utama/Nilai) menutupi sebagian foto (overlap) agar terasa modern. *Contoh: "Mencetak teknisi andal yang berkarakter industri."*
*   **Graceful Degradation:** Jika foto Kajur tidak ada di CMS, fallback menggunakan foto aktivitas siswa portrait (bukan mengarang nama/foto fiktif).

**Kolom Kanan (Informasi Padat - 7 Kolom):**
*   **Intro Singkat:** Subheading "Tentang Kami" dan Heading kuat ("Menjadi Pusat Keunggulan Teknik Otomotif di Wilayah X").
*   **Paragraf Tentang Jurusan:** Maksimal 2 paragraf ringkas.
*   **Visi & Misi (Information Blocks/Accordion):** Karena Misi biasanya panjang, letakkan di dalam UI yang *collapsible* (Accordion) atau bentuk *Grid Cards* kecil agar tidak memakan ruang vertikal terlalu banyak.
*   **Nilai/Karakter Jurusan (Icon List):** Misalnya: Disiplin, Kompeten, Inovatif (ditampilkan berjajar dengan icon mekanik/gears).
*   **CTA Button:** Tombol "Profil Selengkapnya" mengarah ke halaman khusus `/profil`.

---

## 3. Responsive Rules & UX Degradation

### 3.1. Mobile (`< 768px`)
*   **Layout:** Stack vertikal penuh. 
*   **Urutan (Visual Hierarchy):** Teks Intro Singkat -> Foto/Portrait Kajur & Quote -> Teks Tentang Jurusan -> Visi/Misi (berupa Accordion tertutup) -> CTA.
*   **Alasan Urutan:** Di mobile, pengguna ingin tahu sekilas dulu ("Intro") sebelum melihat foto Kajur.

### 3.2. Tablet (`768px - 1024px`)
*   **Layout:** Bisa menggunakan Stack vertikal namun gambar dan teks dibatasi `max-w-2xl` agar tidak terlalu merenggang ke samping. Atau menggunakan rasio 40% (Kiri) dan 60% (Kanan).

### 3.3. Graceful Fallback (Jika Data CMS Kosong)
Website menggunakan Blade directive untuk mengecek data:
1.  **Sambutan / Kajur Kosong?** -> Hide elemen foto portrait dan quote. Ganti kolom kiri dengan 1 foto profil/gedung jurusan biasa tanpa blok kutipan.
2.  **Visi Misi Kosong?** -> Hide bagian blok/accordion visi misi, agar layout tidak terkesan "bolong".
3.  **Semua Data Profil Kosong?** -> Hide *seluruh* section ini secara aman. Jangan tampilkan data *Lorem Ipsum* di level production.

---

## 4. Rekomendasi Struktur Komponen Blade

Komponen ini diletakkan di `resources/views/components/frontend/home/` untuk spesifik landing page, atau `components/frontend/profile/` jika *reusable*.

```text
components/
└── frontend/
    └── home/
        └── profile-section/
            ├── index.blade.php           # Base wrapper
            ├── image-quote.blade.php     # Komponen kiri (Foto + Highlight Quote)
            ├── text-content.blade.php    # Komponen kanan (Heading + Paragraph)
            ├── vision-mission.blade.php  # Blok Visi Misi (bisa berupa Tab/Accordion)
            └── core-values.blade.php     # List nilai-nilai jurusan (Grid Icon)
```

### 4.1. Contoh Implementasi `index.blade.php`
```blade
@props(['profileData', 'headOfDept' => null])

@if(!empty($profileData))
<section id="profil" class="py-16 md:py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-12 items-center">
            
            <!-- Kolom Kiri: Visual & Quote (Col-span 5) -->
            <div class="lg:col-span-5 relative mb-12 lg:mb-0">
                @if($headOfDept && $headOfDept->image && $headOfDept->quote)
                    <x-frontend.home.profile-section.image-quote 
                        :image="$headOfDept->image" 
                        :name="$headOfDept->name"
                        :quote="$headOfDept->quote" 
                    />
                @elseif($profileData->cover_image)
                    <!-- Fallback if no Head of Dept data -->
                    <img src="{{ $profileData->cover_image }}" class="rounded-lg shadow-lg w-full aspect-[3/4] object-cover" alt="Gedung/Fasilitas Jurusan">
                @endif
            </div>

            <!-- Kolom Kanan: Teks & Info Blok (Col-span 7) -->
            <div class="lg:col-span-7 flex flex-col justify-center">
                <!-- Eyebrow & Title -->
                <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Siapa Kami</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    {{ $profileData->headline ?? 'Tentang Jurusan Teknik Otomotif' }}
                </h2>
                
                <!-- Paragraf Singkat -->
                <div class="mt-5 text-lg text-slate-600 space-y-4">
                    <!-- Gunakan limit atau excerpt jika data terlalu panjang -->
                    <p>{{ Str::limit(strip_tags($profileData->about), 250) }}</p>
                </div>
                
                <!-- Information Blocks: Visi Misi & Karakter -->
                @if($profileData->vision || $profileData->mission)
                    <div class="mt-8 border-t border-slate-200 pt-8">
                        <x-frontend.home.profile-section.vision-mission :data="$profileData" />
                    </div>
                @endif
                
                <!-- CTA -->
                <div class="mt-8">
                    <a href="{{ route('profile.index') }}" class="inline-flex items-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-slate-900 hover:bg-slate-800 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900">
                        Profil Selengkapnya
                        <!-- Icon Right Arrow -->
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endif
```

### 4.2. Konsep UI `image-quote.blade.php`
Untuk menghindari desain yang kaku, foto dibingkai *portrait* (`aspect-[3/4]`). Di atasnya (sudut kanan/kiri bawah) ditimpa sebuah "kotak" (highlighted quote) berwarna mencolok (misal putih dengan shadow/red background) berisi *Statement* yang sangat tebal. 
```blade
<div class="relative">
    <img src="{{ $image }}" class="rounded-lg shadow-xl w-full max-w-sm mx-auto aspect-[3/4] object-cover" alt="Kepala Jurusan {{ $name }}">
    
    <!-- Highlighted Quote Block overlap -->
    <div class="absolute -bottom-6 -right-6 md:bottom-8 md:-right-12 bg-white p-6 rounded-lg shadow-xl border border-slate-100 max-w-xs z-10 hidden sm:block">
        <svg class="w-8 h-8 text-red-500 mb-2 opacity-50" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
        </svg>
        <p class="text-slate-900 font-semibold italic text-sm leading-relaxed">
            "{{ $quote }}"
        </p>
        <p class="mt-2 text-xs font-bold text-slate-500 uppercase tracking-wide">- {{ $name }}</p>
    </div>
</div>
```
