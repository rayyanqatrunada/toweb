# Spesifikasi Desain Section: Guru & Tenaga Pendidik

Dokumen ini memuat panduan UI/UX serta rancangan komponen Blade untuk *Section* **"Guru & Tenaga Pendidik"**. Bagian ini diletakkan di Landing Page (Homepage) dengan tujuan utama **membangun Trust (Kepercayaan)** bahwa siswa akan dididik oleh tenaga yang profesional dan ahli di bidangnya.

## 1. Tujuan & Aturan Konten (Business Logic)

*   **Tujuan:** Memperlihatkan wajah-wajah profesional institusi tanpa membuatnya tampak seperti jejaring sosial (Social Media).
*   **Limitasi Homepage:** Hanya menampilkan 3 hingga 4 profil guru utama (misal: Kepala Sekolah, Kepala Jurusan, dan Guru Produktif/Kejuruan). Pengunjung dapat melihat sisanya melalui CTA "Lihat Semua Guru".
*   **Restriksi Privasi (Penting):**
    *   TIDAK menampilkan Nomor HP/WhatsApp (menghindari spam).
    *   TIDAK menampilkan Alamat Rumah.
    *   Fokus pada data akademik/profesional: Jabatan, Bidang Keahlian, dan Gelar Pendidikan.

---

## 2. Arsitektur Visual & UI

### 2.1. Desain "Portrait Card" (Elegan)
Untuk membangun kesan akademik yang profesional, kartu profil tidak menggunakan *drop-shadow* tebal bergaya *e-commerce*, melainkan menggunakan gaya korporat/akademik yang *clean*:

*   **Rasio Foto:** Wajib Portrait (`aspect-[3/4]` atau `aspect-[4/5]`). Menggunakan `object-cover`.
*   **Frame/Container:** Latar belakang *card* berwarna putih atau senada dengan section (`bg-transparent`), tanpa border tebal di sekeliling kartu.
*   **Hierarki Tipografi:**
    1.  **Nama (Bold):** Ukuran terbesar dalam kartu, menggunakan warna `slate-900`.
    2.  **Jabatan/Peran (Accent):** Menggunakan warna aksen (merah/biru) atau `slate-500` italic. (Misal: *Kepala Program Keahlian*).
    3.  **Bidang Keahlian (Secondary):** Teks kecil `text-sm` menjelaskan spesialisasi (Misal: *Spesialis Engine Management System*).
    4.  **Pendidikan (Muted):** Teks sangat kecil (Misal: *S.Pd., M.T. - Universitas X*).
*   **Kesan *Hover*:** Foto sedikit *zoom* (`scale-105`) di dalam framenya (*overflow-hidden*), atau kartu sedikit terangkat. Tidak ada tombol "Add Friend" atau semacamnya.

### 2.2. Responsive Grid System
*   **Desktop (`> 1024px`):** 3 atau 4 kolom sejajar (`grid-cols-4`).
*   **Tablet (`768px - 1024px`):** 2 kolom atau 3 kolom.
*   **Mobile (`< 768px`):**
    *   Direkomendasikan **1 kolom (`grid-cols-1`)** karena teks Bidang Keahlian dan Pendidikan akan terlalu sesak jika dipaksa 2 kolom di layar HP (menjaga agar teks tetap *accessible* dan tidak terpotong).
    *   Foto di HP bisa dibuat tidak terlalu tinggi (`aspect-square` atau dibatasi maksimal tingginya).

---

## 3. Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── teacher-section/
            ├── index.blade.php           # Base Section Wrapper
            └── card.blade.php            # Portrait Card Individual
```

### 3.1. Implementasi Induk (`index.blade.php`)

```blade
@props(['teachers'])

{{-- Render hanya jika ada data guru --}}
@if(isset($teachers) && $teachers->count() > 0)
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="max-w-2xl">
                <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Tenaga Pendidik</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">
                    Belajar dari Para Ahli
                </h2>
                <p class="mt-4 text-lg text-slate-600">
                    Dididik langsung oleh instruktur berpengalaman tersertifikasi industri dan berdedikasi tinggi.
                </p>
            </div>
            
            <!-- CTA Desktop (Tampil di Kanan Atas) -->
            <div class="hidden md:block mt-6 md:mt-0">
                <a href="{{ route('teachers.index') }}" class="group inline-flex items-center text-base font-semibold text-red-600 hover:text-red-700 transition-colors">
                    Lihat Semua Guru
                    <svg class="ml-2 w-5 h-5 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Grid Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-{{ min($teachers->count(), 4) }} gap-x-8 gap-y-12">
            @foreach($teachers as $teacher)
                <x-frontend.home.teacher-section.card :teacher="$teacher" />
            @endforeach
        </div>
        
        <!-- CTA Mobile (Tampil di Bawah Tengah) -->
        <div class="mt-10 md:hidden text-center">
            <a href="{{ route('teachers.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 shadow-sm text-base font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 w-full transition-colors">
                Lihat Semua Guru
            </a>
        </div>

    </div>
</section>
@endif
```

### 3.2. Implementasi Card Profil (`card.blade.php`)

```blade
@props(['teacher'])

<div class="group flex flex-col">
    <!-- Frame Foto Portrait -->
    <div class="relative w-full aspect-[4/5] bg-slate-100 rounded-xl overflow-hidden mb-5">
        @if($teacher->image_url)
            <img 
                src="{{ $teacher->image_url }}" 
                alt="Foto {{ $teacher->name }}" 
                class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-500 ease-out group-hover:scale-105"
            >
        @else
            <!-- Fallback Icon jika belum upload foto -->
            <div class="absolute inset-0 flex items-center justify-center text-slate-300">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
        @endif
        
        <!-- Subtle shadow/gradient di bagian bawah foto (opsional) -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </div>

    <!-- Informasi Profil (Elegan, no border) -->
    <div class="flex-1 flex flex-col">
        <h3 class="text-xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">
            {{ $teacher->name }}
        </h3>
        
        <p class="text-sm font-medium text-red-600 mt-1 mb-3">
            {{ $teacher->position ?? 'Tenaga Pendidik' }}
        </p>
        
        @if($teacher->expertise)
            <div class="mt-auto pt-3 border-t border-slate-100">
                <p class="text-sm text-slate-600 flex items-start">
                    <svg class="w-4 h-4 text-slate-400 mr-1.5 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>{{ $teacher->expertise }}</span>
                </p>
            </div>
        @endif

        @if($teacher->education)
            <div class="mt-2">
                <p class="text-xs text-slate-500 flex items-start">
                    <svg class="w-4 h-4 text-slate-400 mr-1.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                    <span>{{ $teacher->education }}</span>
                </p>
            </div>
        @endif
    </div>
</div>
```
