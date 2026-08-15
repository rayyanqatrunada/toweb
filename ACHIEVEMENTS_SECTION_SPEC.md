# Spesifikasi Desain Section: Prestasi Jurusan

Dokumen ini memuat panduan arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Prestasi"**. Bagian ini berfungsi ganda: membangun kebanggaan internal dan menjadi *social proof* kompetitif bagi pihak eksternal.

## 1. Tujuan & Filosofi Desain

*   **Evidence-based Trust:** Kepercayaan tidak sekadar dibangun oleh janji (Visi Misi), tetapi harus dibuktikan dengan hasil (Prestasi).
*   **Hindari Visualisasi Komparatif yang Menyesatkan:** Jangan merancang UI berbentuk podium/ranking 1-2-3 berlebihan (overselling) kecuali data riil memang secara eksplisit merepresentasikan ranking juara umum. UI *Timeline* (Garis Waktu) atau *Editorial Card* lebih jujur dan elegan.

---

## 2. Arsitektur Layout (Homepage & Archive)

### 2.1. Layout Homepage: Vertical Timeline
Untuk *Homepage* (menampilkan 3-6 prestasi terbaru), direkomendasikan menggunakan format **Vertical Timeline** (Garis Waktu Menurun).
*   **Kenapa Timeline?** Format ini menceritakan "perjalanan kesuksesan" secara kronologis dan tidak memakan terlalu banyak ruang horizontal, sangat bersahabat untuk dibaca *scanning*.
*   **Struktur Timeline:**
    *   Sisi Kiri/Tengah: Garis vertikal dengan titik/bulatan penanda (Node).
    *   Node Label: Tahun/Tanggal prestasi (misal: "2025" atau "Okt 2025").
    *   Sisi Kanan: Kotak/Card informasi prestasi.

### 2.2. Anatomi Card Prestasi
Setiap titik dalam *Timeline* memuat sebuah kartu yang berisi:
1.  **Level Badge (Tingkat):** Badge warna kecil untuk menandakan bobot (Misal: `Nasional` warna Emas/Merah, `Provinsi` warna Biru, `Sekolah` warna Abu-abu).
2.  **Judul (Title):** (Misal: "Juara 1 LKS Otomotif Tingkat Nasional").
3.  **Partisipan/Siswa:** Menampilkan teks nama siswa/tim yang berprestasi (hanya jika public).
4.  **Gambar (Opsional):** Jika foto dokumentasi penyerahan piala tersedia (`image_url`), tampilkan *thumbnail* di sebelah kanan (Desktop) atau di atas teks (Mobile).

### 2.3. Halaman Archive (Semua Prestasi)
Halaman `/prestasi` akan menggunakan Grid Layout (bukan timeline) karena jumlah data yang lebih masif.
*   **Filter Ringan:** Sediakan filter *dropdown* atau *pill buttons* berbasis Alpine.js atau Livewire untuk memfilter berdasarkan:
    *   *Semua Tingkat*
    *   *Nasional*
    *   *Provinsi*
    *   *Tahun (Tebaru)*

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Timeline berada di tengah (Center Timeline). Garis berada di tengah, *card* bergantian kiri dan kanan (Alternating).
*   **Tablet & Mobile (`< 768px`):** Center timeline seringkali membuang ruang di layar sempit. Ubah menjadi **Left-aligned Timeline** (garis berada di sebelah paling kiri, konten semuanya di sebelah kanan).
*   **Interaksi:** Tidak perlu *hover effect* yang berlebihan. Cukup perubahan warna batas tepi (border) atau judul menjadi warna aksen (merah) saat diarahkan kursor.

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── achievement-section/
            ├── index.blade.php           # Wrapper Section
            ├── timeline-item.blade.php   # Timeline Card (Kiri/Kanan dinamis)
            └── badge-level.blade.php     # Komponen penentu warna tingkat prestasi
```

### 4.1. Induk Section (`index.blade.php`)

```blade
@props(['achievements'])

@if(isset($achievements) && $achievements->count() > 0)
<section class="py-16 md:py-24 bg-slate-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Jejak Prestasi</span>
            <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Tradisi Juara</h2>
            <p class="mt-4 text-lg text-slate-600">
                Membangun daya saing tinggi melalui berbagai kompetisi akademik dan kejuruan.
            </p>
        </div>

        <!-- Timeline Container -->
        <div class="relative">
            <!-- Garis Vertikal (Tengah di Desktop, Kiri di Mobile) -->
            <div class="absolute left-4 md:left-1/2 md:-ml-px top-0 bottom-0 w-0.5 bg-slate-200"></div>

            <div class="space-y-12">
                @foreach($achievements as $index => $achievement)
                    <!-- Gunakan modulo untuk menentukan posisi Kiri (Genap) atau Kanan (Ganjil) di Desktop -->
                    <x-frontend.home.achievement-section.timeline-item 
                        :achievement="$achievement" 
                        :alignment="$index % 2 == 0 ? 'left' : 'right'" 
                    />
                @endforeach
            </div>
        </div>

        <!-- CTA Action -->
        <div class="mt-16 text-center">
            <a href="{{ route('achievements.index') }}" class="inline-flex items-center px-6 py-3 border border-slate-300 shadow-sm text-base font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                Lihat Semua Prestasi
            </a>
        </div>

    </div>
</section>
@endif
```

### 4.2. Timeline Item (`timeline-item.blade.php`)

```blade
@props(['achievement', 'alignment' => 'right'])

<div class="relative flex flex-col md:flex-row items-center md:justify-between w-full">
    
    <!-- Bagian Kiri Desktop (Bisa Kosong, Teks, atau Titik di Mobile) -->
    <div class="w-full md:w-[45%] {{ $alignment == 'left' ? 'md:order-1 md:text-right' : 'md:order-3' }}">
        @if($alignment == 'left')
            <div class="hidden md:block">
                @include('components.frontend.home.achievement-section._card-content', ['achievement' => $achievement])
            </div>
        @endif
    </div>

    <!-- Node Tengah (Titik & Tanggal) -->
    <div class="absolute left-4 md:left-1/2 md:static transform -translate-x-1/2 flex flex-col items-center justify-center w-8 md:w-[10%] z-10 md:order-2">
        <!-- Node Dot -->
        <div class="h-4 w-4 rounded-full bg-red-600 border-4 border-white shadow-sm mt-1.5 md:mt-0"></div>
        <!-- Year Tag (Tersembunyi di Mobile krn diletakkan dalam konten) -->
        <div class="hidden md:block mt-2 px-3 py-1 bg-white border border-slate-200 text-xs font-bold text-slate-600 rounded-full shadow-sm">
            {{ Carbon\Carbon::parse($achievement->date)->format('Y') }}
        </div>
    </div>

    <!-- Bagian Kanan Desktop -->
    <div class="w-full pl-12 md:pl-0 md:w-[45%] {{ $alignment == 'right' ? 'md:order-3' : 'md:order-1' }}">
        @if($alignment == 'right')
            <div class="hidden md:block">
                @include('components.frontend.home.achievement-section._card-content', ['achievement' => $achievement])
            </div>
        @endif
        
        <!-- Mobile Content (Selalu Tampil di sisi kanan Node, Menggantikan aturan Desktop) -->
        <div class="block md:hidden">
            <div class="text-xs font-bold text-slate-500 mb-2">
                {{ Carbon\Carbon::parse($achievement->date)->format('d M Y') }}
            </div>
            @include('components.frontend.home.achievement-section._card-content', ['achievement' => $achievement])
        </div>
    </div>

</div>
```

### 4.3. Partial Isi Konten (`_card-content.blade.php`)
```blade
<div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
    <div class="flex items-start justify-between">
        <div>
            <!-- Komponen Badge Level Tingkat Nasional/Provinsi -->
            <x-frontend.home.achievement-section.badge-level :level="$achievement->level" />
            
            <h3 class="mt-2 text-lg font-bold text-slate-900 leading-snug">
                {{ $achievement->title }}
            </h3>
            
            @if($achievement->participants)
                <p class="mt-1 text-sm font-medium text-slate-600">
                    Oleh: {{ $achievement->participants }}
                </p>
            @endif
        </div>
        
        <!-- Jika ada Gambar (Thumbnail) -->
        @if($achievement->image_url)
            <div class="ml-4 flex-shrink-0">
                <img src="{{ $achievement->image_url }}" alt="{{ $achievement->title }}" class="h-16 w-16 md:h-20 md:w-20 object-cover rounded-md border border-slate-100">
            </div>
        @endif
    </div>
</div>
```
