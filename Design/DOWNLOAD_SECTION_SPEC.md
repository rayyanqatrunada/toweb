# Spesifikasi Desain Section: Dokumen Publik (Download Center)

Dokumen ini memuat arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Dokumen Publik"**. Bagian ini berfungsi sebagai utilitas praktis (Functional UX) bagi siswa dan orang tua untuk mengunduh formulir, buku panduan, atau berkas akademik tanpa harus menghubungi pihak sekolah secara manual.

## 1. Tujuan UX & Keamanan Data

*   **Fokus Utilitas:** Pengunjung yang mencari dokumen biasanya terburu-buru. Desain harus bersifat memindai (*scannable*) dan informatif. Bukan gambar besar, melainkan *List* (Daftar) yang bersih dengan indikator tipe file yang jelas.
*   **Privacy Strictness:** *Backend/Controller* **DIWAJIBKAN** menerapkan *query* filter (misal: `is_public = true` atau `visibility = 'public'`). Dokumen spesifikasi internal, rekap nilai rahasia, atau SOP internal guru tidak boleh lolos ke section ini.

---

## 2. Arsitektur Layout (List-Based Card)

Alih-alih menggunakan kotak gambar (*image grid*), *download center* menggunakan **List/Row Layout** yang menyerupai antarmuka *file manager* modern (seperti Google Drive atau Dropbox).

### 2.1. Elemen Setiap Baris Dokumen
1.  **File Type Icon (Kiri):** Ikon konsisten berbasis jenis ekstensi file (PDF menggunakan ikon merah PDF, DOCX ikon biru Word, XLSX ikon hijau Excel).
2.  **Informasi Utama (Tengah):**
    *   **Judul Dokumen** (Tebal, Ukuran Sedang).
    *   **Deskripsi Pendek** (Opsional, di bawah judul).
    *   **Metadata:** (Tipe File, Kategori, dan Ukuran File dalam MB/KB).
3.  **Download Action (Kanan):** Tombol CTA (berupa icon panah ke bawah atau tombol "Unduh").

### 2.2. Pengelompokan Kategori
Jika ditampilkan di *Homepage*, dokumen diacak berdasarkan yang "Terbaru" dengan badge Kategori. Namun, di halaman `/download-center`, dokumen akan dikelompokkan secara visual ke dalam:
*   Akademik
*   PKL (Praktik Kerja Lapangan)
*   Formulir
*   Panduan
*   Informasi

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Menggunakan format tabel rapi atau *List Row* memanjang ke samping (Horizontal). Tombol unduh berada paling ujung kanan.
*   **Hover State:** Baris dokumen yang di-*hover* akan berubah warna *background* (misal `bg-slate-50` menjadi `bg-white`) dan memunculkan *shadow* ringan untuk memandunya sebagai tautan aktif.
*   **Mobile (`< 768px`):** Format *List Row* diubah menjadi kotak vertikal (Stacked). Tombol *Download* dipindah ke bagian paling bawah (memanjang penuh `w-full`) agar ramah untuk di-klik oleh jari.

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── download-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── document-item.blade.php   # Komponen baris file
            └── file-icon.blade.php       # Komponen penentu Icon SVG berdasar ekstensi
```

### 4.1. Base Layout (`index.blade.php`)

```blade
@props(['documents'])

{{-- Pengecekan Keamanan: Pastikan hanya ada data public --}}
@if(isset($documents) && $documents->count() > 0)
<section class="py-16 md:py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 flex items-center justify-center">
                <svg class="w-8 h-8 text-red-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Pusat Unduhan
            </h2>
            <p class="mt-3 text-slate-600 text-lg">
                Dapatkan formulir, buku panduan, dan dokumen akademik lainnya secara cepat.
            </p>
        </div>

        <!-- Daftar Dokumen (List View) -->
        <div class="space-y-4">
            @foreach($documents as $document)
                <x-frontend.home.download-section.document-item :document="$document" />
            @endforeach
        </div>

        <!-- CTA Action -->
        <div class="mt-10 text-center">
            <a href="{{ route('downloads.index') }}" class="inline-flex items-center px-6 py-3 border border-slate-300 shadow-sm text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-100 transition-colors">
                Kunjungi Download Center
                <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>
@endif
```

### 4.2. File Icon Logic (`file-icon.blade.php`)
*Pemisah ikon berdasarkan tipe MIME/Ekstensi.*

```blade
@props(['type'])

@php
    $extension = strtolower($type);
@endphp

@switch($extension)
    @case('pdf')
        <div class="w-12 h-12 rounded-lg bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/></svg>
        </div>
        @break

    @case('doc')
    @case('docx')
        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
        </div>
        @break
        
    @case('xls')
    @case('xlsx')
        <div class="w-12 h-12 rounded-lg bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 14h-3v2h-2v-2H8v-2h3v-2H8v-2h3v-2h2v2h3v2h-3v2h3v2zm-3-7V3.5L18.5 9H13z"/></svg>
        </div>
        @break

    @default
        <!-- Icon Default Folder/Zip/Etc -->
        <div class="w-12 h-12 rounded-lg bg-slate-200 text-slate-500 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
@endswitch
```

### 4.3. Document Item Baris File (`document-item.blade.php`)

```blade
@props(['document'])

<div class="group bg-white border border-slate-200 rounded-xl p-4 md:p-5 flex flex-col md:flex-row md:items-center justify-between hover:border-red-200 hover:shadow-md transition-all duration-300">
    
    <!-- Info Kiri (Ikon & Metadata) -->
    <div class="flex items-start md:items-center">
        <!-- Panggil Blade Component Ikon Otomatis -->
        <x-frontend.home.download-section.file-icon :type="pathinfo($document->file_path, PATHINFO_EXTENSION)" />
        
        <div class="ml-4">
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-600 transition-colors">
                {{ $document->title }}
            </h3>
            
            <p class="mt-1 text-sm text-slate-500 line-clamp-1">
                {{ Str::limit($document->description, 80) ?? 'Dokumen Publik' }}
            </p>
            
            <div class="mt-2 flex items-center space-x-3 text-xs font-semibold text-slate-400 uppercase tracking-widest">
                @if($document->category)
                    <span class="text-slate-500">{{ $document->category->name }}</span>
                    <span>&bull;</span>
                @endif
                <!-- Ukuran File dari Backend misal: 2.4 MB -->
                <span>{{ strtoupper(pathinfo($document->file_path, PATHINFO_EXTENSION)) }}</span>
                <span>&bull;</span>
                <span>{{ $document->size ?? 'N/A' }}</span>
            </div>
        </div>
    </div>

    <!-- Tombol Unduh Kanan -->
    <div class="mt-5 md:mt-0 md:ml-6 flex-shrink-0">
        <!-- Target blank agar mengunduh atau membuka PDF di tab baru -->
        <a href="{{ route('downloads.download', $document) }}" target="_blank" rel="noopener noreferrer" class="flex w-full justify-center items-center px-4 py-2 bg-slate-50 hover:bg-red-50 text-slate-700 hover:text-red-700 font-medium rounded-lg border border-slate-200 hover:border-red-200 transition-colors">
            Unduh Berkas
            <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        </a>
    </div>

</div>
```
