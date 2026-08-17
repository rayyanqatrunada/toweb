# Spesifikasi Desain Section: Peluang Karier & Lowongan

Dokumen ini berisi arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Peluang Karier" (Job Vacancy)**. Bagian ini merupakan fitur pembeda yang memposisikan website bukan sekadar "brosur digital" atau portal berita pasif, melainkan sebuah hub yang aktif menjembatani lulusan ke dunia kerja.

## 1. Tujuan UX & Copywriting

*   **Tujuan:** Memberikan keyakinan akhir (Ultimate Trust) kepada pengunjung bahwa institusi secara aktif mencarikan peluang bagi lulusannya (dan masyarakat umum jika diizinkan).
*   **Kesan (Vibe):** Harus terasa seperti portal rekrutmen profesional (seperti LinkedIn/JobStreet versi mini), namun tidak melepaskan diri dari tema visual (warna/font) sekolah.

---

## 2. Arsitektur Konten & Aturan Bisnis

### 2.1. Anatomy of a Job Card (Kartu Lowongan)
Untuk mendapatkan kesan portal karier yang mapan, desain harus *clean*, berbasis kartu (*Card-based UI*), dan menonjolkan metadata kunci:
1.  **Judul Posisi (Bold/Besar):** (Misal: "Teknisi Alat Berat / Mekanik Senior").
2.  **Perusahaan:** Nama perusahaan pemanggil. Jika terhubung dengan `industry_partners`, bisa menampilkan logo. Jika tidak, gunakan teks.
3.  **Tipe Pekerjaan (Badge):** (Misal: Full-Time, Kontrak, Magang). Gunakan warna berbeda (Full-time: Hijau, Magang: Biru).
4.  **Lokasi (Icon Map-Pin):** (Misal: Jakarta Selatan).
5.  **Tenggat Waktu / Deadline (Icon Clock):** (Misal: Berakhir 15 Okt 2025). Jika sisa waktu sangat mepet (< 3 hari), beri highlight teks merah.
6.  **Status (Penting):** *Ditutup* (Expired) atau *Dibuka*. 

### 2.2. Business Logic Filtering (Wajib)
Section di Landing Page ini **HARUS** diproses oleh *query backend* yang ketat sebelum di-render oleh Blade:
*   `is_published = true` (atau status *public* sejenis).
*   `deadline >= now()` (Jangan menayangkan lowongan yang sudah *expired* di Homepage).
*   `limit(3)` hingga `limit(5)` (Batas aman tampilan Homepage agar tidak memakan layar vertikal).

Jika *query* ini mengembalikan `0` hasil (tidak ada lowongan aktif), **Sembunyikan seluruh section ini dari Homepage**, atau tampilkan UI *Empty State* kecil yang suportif ("Saat ini belum ada lowongan baru, silakan cek secara berkala"). Menyembunyikan keseluruhan section adalah pilihan teraman.

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Menggunakan List memanjang ke bawah (`flex-col` pada container list) jika lowongan hanya 3. Atau menggunakan Grid 2 kolom (`grid-cols-2`) jika lowongan 4-5.
*   **Hover State:** Kartu lowongan sedikit terangkat (`translate-y-[-2px]`) dan garis batas kirinya (left-border) berubah menjadi tebal dan berwarna merah (`border-l-4 border-red-600`) seperti notifikasi.
*   **Mobile (`< 768px`):** Semua kartu menggunakan `flex-col` standar. Teks metadata (Lokasi/Deadline) dibuat *wrap* atau bertumpuk vertikal jika layar sempit.

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── career-section/
            ├── index.blade.php           # Base Section Wrapper
            └── job-card.blade.php        # Kartu List Lowongan
```

### 4.1. Wrapper Induk (`index.blade.php`)

```blade
@props(['vacancies'])

{{-- Pengecekan Kritis: Hanya render jika ada lowongan AKTIF (Belum Expired) --}}
@if(isset($vacancies) && $vacancies->count() > 0)
<section class="py-16 md:py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Career Center</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Peluang Karier & Lowongan</h2>
                <p class="mt-3 text-slate-600 text-lg">
                    Tersedia secara eksklusif bagi lulusan maupun pencari kerja melalui jejaring industri kami.
                </p>
            </div>
            <div class="mt-6 md:mt-0">
                <a href="{{ route('careers.index') }}" class="text-sm font-semibold text-red-600 hover:text-red-700 flex items-center transition-colors">
                    Lihat Semua Lowongan
                    <svg class="ml-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Job List Container -->
        <!-- Gunakan grid-cols-1 atau lg:grid-cols-2 tergantung dari preferensi desain -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach($vacancies as $vacancy)
                <x-frontend.home.career-section.job-card :vacancy="$vacancy" />
            @endforeach
        </div>

        <!-- Mobile CTA Fallback -->
        <div class="mt-10 md:hidden text-center">
            <a href="{{ route('careers.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 shadow-sm text-base font-medium rounded-md text-slate-700 bg-white w-full">
                Lihat Semua Lowongan
            </a>
        </div>
        
    </div>
</section>
@endif
```

### 4.2. Komponen Kartu Lowongan (`job-card.blade.php`)

```blade
@props(['vacancy'])

<a href="{{ route('careers.show', $vacancy) }}" class="group block bg-white rounded-lg border border-slate-200 shadow-sm hover:shadow-md transition-all duration-200 p-5 md:p-6 border-l-4 hover:border-l-red-600">
    
    <div class="flex flex-col sm:flex-row sm:items-start justify-between">
        
        <!-- Info Utama Kiri -->
        <div class="flex-1">
            <h3 class="text-xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">
                {{ $vacancy->title }}
            </h3>
            
            <p class="mt-1 font-semibold text-slate-700">
                {{ $vacancy->company_name }}
            </p>

            <div class="mt-3 flex flex-wrap items-center gap-y-2 gap-x-4 text-sm text-slate-500">
                <!-- Location -->
                @if($vacancy->location)
                <div class="flex items-center">
                    <svg class="mr-1.5 h-4 w-4 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $vacancy->location }}
                </div>
                @endif
                
                <!-- Deadline -->
                @if($vacancy->deadline)
                <div class="flex items-center">
                    <!-- Berubah menjadi merah jika sisa waktu kurang dari 3 hari (Logika Backend) -->
                    @php 
                        $daysLeft = now()->diffInDays($vacancy->deadline, false); 
                        $isUrgent = $daysLeft > 0 && $daysLeft <= 3;
                    @endphp
                    
                    <svg class="mr-1.5 h-4 w-4 {{ $isUrgent ? 'text-red-500' : 'text-slate-400' }} flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="{{ $isUrgent ? 'text-red-600 font-semibold' : '' }}">
                        Berakhir {{ Carbon\Carbon::parse($vacancy->deadline)->format('d M Y') }}
                    </span>
                </div>
                @endif
            </div>
        </div>

        <!-- Badge Tipe Pekerjaan & Action Kanan -->
        <div class="mt-4 sm:mt-0 flex sm:flex-col items-center sm:items-end justify-between sm:justify-start">
            @if($vacancy->employment_type)
                @php
                    // Logika warna badge (bisa disesuaikan di Helpers/Models nantinya)
                    $badgeClass = match(strtolower($vacancy->employment_type)) {
                        'full-time' => 'bg-emerald-100 text-emerald-800',
                        'part-time' => 'bg-amber-100 text-amber-800',
                        'internship', 'magang' => 'bg-blue-100 text-blue-800',
                        'contract', 'kontrak' => 'bg-purple-100 text-purple-800',
                        default => 'bg-slate-100 text-slate-800'
                    };
                @endphp
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeClass }}">
                    {{ $vacancy->employment_type }}
                </span>
            @endif
            
            <div class="hidden sm:flex mt-4 text-sm font-medium text-red-600 items-center opacity-0 group-hover:opacity-100 transition-opacity">
                Detail <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </div>
        
    </div>
</a>
```
