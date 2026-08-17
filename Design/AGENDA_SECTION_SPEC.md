# Spesifikasi Desain Section: Agenda Kegiatan (Events)

Dokumen ini memuat arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Agenda Kegiatan"**. Bagian ini ditujukan untuk mempublikasikan jadwal acara jurusan (ujian kompetensi, kunjungan industri, pameran karya, rapat wali murid) kepada publik.

## 1. Tujuan UX (User Experience)

*   **Fokus Waktu (Time-Centric):** Agenda adalah informasi berbasis waktu. Pengunjung tidak peduli kapan agenda itu "ditulis" (created_at), mereka peduli "kapan acara itu akan dilaksanakan" (event_date).
*   **Urgency:** Menampilkan acara terdekat (Upcoming Events) di urutan pertama.
*   **Format Cepat Cerna:** Menggunakan desain kalender sobek (Date-Card) di sebelah kiri judul agar pengunjung bisa mengetahui tanggal acara hanya dengan melirik, tanpa perlu membaca teks panjang.

---

## 2. Arsitektur Visual (Date-Card Layout)

Untuk membedakan *Agenda* dari *Berita* (yang menggunakan foto lebar), daftar agenda didesain menyerupai lembaran tiket atau *list* horizontal.

### 2.1. Elemen Date-Card
Setiap *row* agenda terdiri dari dua bagian (Kiri dan Kanan):

1.  **Kotak Tanggal (Kiri - Calendar Block):**
    *   Warna background khas (Misal: Header Merah, Body Putih/Abu).
    *   Angka tanggal berukuran ekstra besar (Misal: **17**).
    *   Teks bulan berukuran kecil, bold, dan kapital (Misal: **AGU**).
2.  **Informasi Utama (Kanan):**
    *   **Judul:** Huruf tebal, langsung menjelaskan nama acara (Misal: "Upacara Kemerdekaan").
    *   **Metadata (Inline Icons):**
        *   `Jam (Clock Icon)` (Misal: 07:00 - Selesai).
        *   `Lokasi (Map-pin Icon)` (Misal: Lapangan Utama).
    *   **Deskripsi Pendek:** Cuplikan maksimal 2 baris (Misal: Wajib menggunakan seragam putih abu-abu dan topi).

### 2.2. Empty State (Graceful UI)
Jika database tidak memiliki data *upcoming event*, DILARANG memunculkan *Lorem Ipsum* atau jadwal fiktif. Tampilkan UI spesifik:
*   **Visual:** Icon kalender kosong berwarna abu-abu redup.
*   **Teks:** "Belum ada agenda kegiatan dalam waktu dekat. Pantau terus halaman ini untuk informasi kegiatan jurusan berikutnya."
*   **Tombol (Opsional):** "Lihat Arsip Agenda Sebelumnya".

---

## 3. Business Logic (Data Querying)

Pastikan Controller memberikan kueri yang benar kepada Blade:
1.  **Filter Tanggal:** `where('event_date', '>=', now())`. Hanya tarik agenda yang belum kedaluwarsa.
2.  **Order:** `orderBy('event_date', 'asc')`. Acara yang paling dekat waktunya harus muncul paling atas.
3.  **Limit:** Batasi maksimal 3-5 agenda saja di *Homepage*.

---

## 4. Responsive Rules

*   **Desktop (`> 1024px`):** Agenda bisa disusun vertikal (List) di dalam container sebesar 1/2 layar, disandingkan dengan foto kegiatan di separuh layar lainnya, atau dibuat *Grid 2 Kolom* (Kiri-Kanan).
*   **Tablet & Mobile (`< 768px`):** Semuanya diubah menjadi format baris vertikal. Kotak Tanggal (Calendar Block) disarankan diletakkan secara berdampingan (Flex Row) dengan Teks agar tidak memakan ruang tinggi berlebih.

---

## 5. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── agenda-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── event-card.blade.php      # Kotak acara (Date-card layout)
            └── empty-state.blade.php     # Desain jika tidak ada acara
```

### 5.1. Base Layout (`index.blade.php`)

```blade
@props(['agendas'])

<section class="py-16 md:py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 border-b border-slate-200 pb-5">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 flex items-center">
                    <svg class="w-8 h-8 text-red-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Agenda Kegiatan
                </h2>
                <p class="mt-2 text-slate-600">Jadwal acara, uji kompetensi, dan kegiatan jurusan mendatang.</p>
            </div>
            
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('agendas.index') }}" class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-red-600 transition-colors">
                    Semua Agenda
                    <svg class="ml-1.5 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        <div class="max-w-4xl mx-auto">
            @if(isset($agendas) && $agendas->count() > 0)
                <div class="space-y-6">
                    @foreach($agendas as $agenda)
                        <x-frontend.home.agenda-section.event-card :event="$agenda" />
                    @endforeach
                </div>
            @else
                <x-frontend.home.agenda-section.empty-state />
            @endif
        </div>

    </div>
</section>
```

### 5.2. Event Date-Card (`event-card.blade.php`)

```blade
@props(['event'])

<a href="{{ route('agendas.show', $event) }}" class="group block bg-white border border-slate-200 rounded-xl hover:shadow-lg transition-all duration-300 hover:border-red-200 overflow-hidden">
    <div class="flex flex-col sm:flex-row">
        
        <!-- Kiri: Calendar Block -->
        <!-- Memiliki lebar tetap (w-24), menonjolkan tanggal -->
        @php
            $date = \Carbon\Carbon::parse($event->event_date);
        @endphp
        <div class="flex sm:flex-col items-center sm:justify-center sm:w-28 bg-slate-50 sm:border-r border-slate-200 p-4 sm:p-6 text-center sm:group-hover:bg-red-50 transition-colors">
            <span class="text-xs font-bold uppercase tracking-widest text-red-600 sm:text-slate-500 sm:group-hover:text-red-600 sm:mb-1 mr-3 sm:mr-0">
                {{ $date->isoFormat('MMM') }}
            </span>
            <span class="text-3xl md:text-4xl font-extrabold text-slate-900 group-hover:text-red-600 transition-colors leading-none">
                {{ $date->format('d') }}
            </span>
            <!-- Menampilkan tahun jika acaranya ada di tahun depan -->
            @if($date->format('Y') != now()->format('Y'))
                <span class="ml-auto sm:ml-0 text-xs font-bold text-slate-400 sm:mt-1">{{ $date->format('Y') }}</span>
            @endif
        </div>
        
        <!-- Kanan: Informasi Utama -->
        <div class="p-5 sm:p-6 flex-1 flex flex-col justify-center border-t sm:border-t-0 border-slate-100">
            <h3 class="text-xl font-bold text-slate-900 group-hover:text-red-600 transition-colors mb-2">
                {{ $event->title }}
            </h3>
            
            <!-- Metadata Area (Waktu & Tempat) -->
            <div class="flex flex-wrap gap-y-2 gap-x-4 text-sm font-medium text-slate-500 mb-3">
                @if($event->time)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $event->time }}
                </div>
                @endif
                
                @if($event->location)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ Str::limit($event->location, 30) }}
                </div>
                @endif
            </div>

            <!-- Deskripsi Singkat -->
            @if($event->excerpt || $event->description)
            <p class="text-sm text-slate-600 line-clamp-2">
                {{ strip_tags($event->excerpt ?? $event->description) }}
            </p>
            @endif
        </div>

    </div>
</a>
```

### 5.3. Empty State (`empty-state.blade.php`)

```blade
<div class="bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 p-12 text-center">
    <div class="mx-auto h-16 w-16 text-slate-300 mb-4 flex items-center justify-center bg-white rounded-full shadow-sm">
        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
    </div>
    <h3 class="text-lg font-bold text-slate-900 mb-2">Belum Ada Agenda Terdekat</h3>
    <p class="text-slate-500 max-w-md mx-auto mb-6">
        Saat ini tidak ada acara atau jadwal kegiatan dalam waktu dekat. Pantau terus halaman ini atau media sosial kami untuk informasi terbaru.
    </p>
    <a href="{{ route('agendas.index', ['filter' => 'past']) }}" class="inline-flex items-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50">
        Lihat Arsip Kegiatan Lalu
    </a>
</div>
```
