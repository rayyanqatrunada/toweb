# Spesifikasi Desain Section: "Apa yang Akan Dipelajari?"

Dokumen ini menjabarkan spesifikasi desain antarmuka dan struktur komponen untuk *Learning & Competencies Section*. Bagian ini bertujuan memberikan gambaran konkret kepada calon siswa mengenai alur pendidikan, dan menghubungkan teori yang dipelajari dengan kenyataan di dunia kerja (Industri).

## 1. Tujuan UX (User Experience)

Section ini dirancang untuk menjawab pertanyaan fundamental dari calon siswa: **"Kalau saya masuk Teknik Otomotif, saya akan belajar apa?"**

Untuk mencapai hal itu, UX disusun berdasarkan mental model:
`BELAJAR (Teori) → PRAKTIK (Fasilitas) → INDUSTRI (Mitra/PKL) → KARIER (Pekerjaan/Alumni)`

---

## 2. Arsitektur Konten & Hierarki Visual

Section ini dipecah menjadi dua sub-section besar yang saling berkesinambungan.

### Sub-Section A: Modul Pembelajaran (The "What")
*   **Headline:** "Apa yang Akan Kamu Pelajari?"
*   **Format:** Grid (Desktop) atau Slider (Mobile).
*   **Logic (Penting):** Jangan me-*hardcode* kategori seperti (Engine, Chassis, dll) di Blade. Tarik langsung dari `$competencyCategories` (Tabel Database) agar akurat.
*   **Konten Tiap Modul:**
    *   *Icon*: Icon spesifik (busi untuk Electrical, roda gigi untuk Transmisi, dst).
    *   *Kategori*: Nama kategori (misal: "Electrical System").
    *   *Deskripsi Pendek*: "Pemahaman kelistrikan body, manajemen engine, hingga AC."
    *   *Expandable Detail (Accordion/Modal)*: Menampilkan daftar lengkap mata pelajaran atau skill spesifik jika di-klik.

### Sub-Section B: Jalur Karier (The "Why")
*   **Headline:** "Ke Mana Kompetensimu Akan Membawamu?" (Setelah lulus, ini dapat digunakan untuk...)
*   **Format:** Jalur panah (Pipeline) atau Step-by-Step UI.
*   **Hubungan:**
    1.  **Praktik (Fasilitas):** Hubungkan dengan info *Workshop Standar Astra*.
    2.  **Industri (PKL & Mitra):** Hubungkan dengan logo-logo Mitra Industri (misal: Toyota, Honda, Daihatsu).
    3.  **Karier (Alumni & Lowongan):** Sebutkan profesi lulusan (Mekanik Kepala, Service Advisor, Teknisi Alat Berat).

---

## 3. Spesifikasi UI & Interaksi

### 3.1. Modul Pembelajaran (Expandable Cards)
*   Menggunakan *Card* sederhana berwarna latar terang (`bg-white` atau `bg-slate-50`) dengan *border* sangat tipis (`border-slate-100`) agar UI terlihat lega (*breathable*).
*   **Interaksi Expandable:** Gunakan *Alpine.js* (`x-data="{ expanded: false }"`) untuk membuat tombol "Lihat Detail". Saat diklik, *card* akan mengekspansi ke bawah menampilkan *bullet points* kompetensi tanpa perlu me-reload halaman.

### 3.2. Jalur Karier (Pipeline Flow)
*   Secara visual direpresentasikan oleh 3 hingga 4 *milestone* yang saling terhubung menggunakan garis (*connecting lines*).
*   Di Desktop, digambar mendatar (Horizontal Pipeline).
*   Di Mobile, digambar menurun (Vertical Timeline).
*   Di bawah Pipeline, tampilkan barisan **Logo Mitra Industri** (Marquee atau Static Grid) jika tersedia di tabel `industry_partners`.

---

## 4. Business Logic (Integrasi Data CMS)

*   **Kompetensi Kosong:** Jika tabel `competency_categories` kosong, lewati rendering Sub-Section A.
*   **Industri Kosong:** Jika tabel `industry_partners` kosong, sembunyikan barisan logo mitra industri, namun tetap tampilkan teks profesi lulusan (Service Advisor, dll).
*   *Semua visualisasi bergantung pada ketersediaan data (Graceful UI).*

---

## 5. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── learning-section/
            ├── index.blade.php           # Wrapper seluruh section (A + B)
            ├── competency-grid.blade.php # Container untuk grid kategori kompetensi
            ├── competency-card.blade.php # Expandable card untuk tiap kategori
            ├── career-pipeline.blade.php # Sub-section B (Hubungan Belajar -> Karier)
            └── partner-logos.blade.php   # Komponen logo industri (Marquee/Grid)
```

### 5.1. Contoh Implementasi `competency-card.blade.php` (Expandable dengan Alpine.js)

```blade
@props(['category'])

<div 
    x-data="{ expanded: false }" 
    class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col"
>
    <div class="flex items-center space-x-4">
        <!-- Render Icon SVG berdasarkan kategori -->
        <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-red-50 text-red-600 flex items-center justify-center">
            @if($category->icon)
                {!! $category->icon !!}
            @else
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            @endif
        </div>
        
        <div>
            <h3 class="text-lg font-bold text-slate-900">{{ $category->name }}</h3>
        </div>
    </div>
    
    <div class="mt-4">
        <p class="text-sm text-slate-600 line-clamp-2">
            {{ $category->description }}
        </p>
    </div>

    <!-- Toggle Button -->
    <div class="mt-4 pt-4 border-t border-slate-100 mt-auto">
        <button 
            @click="expanded = !expanded" 
            class="text-sm font-semibold text-red-600 hover:text-red-700 flex items-center focus:outline-none"
        >
            <span x-text="expanded ? 'Tutup Detail' : 'Lihat Apa Saja yang Dipelajari'"></span>
            <svg class="ml-1.5 w-4 h-4 transform transition-transform duration-200" :class="{'rotate-180': expanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
    </div>

    <!-- Expandable Content -->
    <div 
        x-show="expanded" 
        x-collapse 
        class="mt-4 text-sm text-slate-600"
        style="display: none;"
    >
        @if($category->topics)
            <ul class="list-disc list-inside space-y-1 ml-1">
                @foreach($category->topics as $topic)
                    <li>{{ $topic }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-slate-500 italic">Belum ada rincian materi.</p>
        @endif
    </div>
</div>
```

### 5.2. Konsep Visual Pipeline `career-pipeline.blade.php` (Sub-section B)
Komponen ini diisi oleh ilustrasi CSS (garis penghubung dan bulatan *node*) yang menggambarkan proses:
1.  **Node 1 (Belajar):** "3 Tahun di Kelas & Bengkel"
2.  **Node 2 (Praktik/PKL):** "6 Bulan Praktik di Industri" (Logo bengkel resmi bisa muncul di sini).
3.  **Node 3 (Karier/Alumni):** "Lulus Siap Kerja" (Text: Teknisi Alat Berat, Service Advisor, Wirausaha Bengkel).
4.  **Footer Pipeline:** Deretan Logo dari tabel `industry_partners` (Jika > 0) berjejer secara horizontal.
