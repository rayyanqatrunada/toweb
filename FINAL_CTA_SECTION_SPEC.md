# Spesifikasi Desain Section: Final CTA (Call to Action)

Dokumen ini memuat spesifikasi arsitektur antarmuka dan struktur komponen Blade untuk *Section* **"Final Call to Action"**. Bagian ini diletakkan di bagian paling bawah halaman (tepat sebelum *Global Footer*) yang bertujuan sebagai titik konversi (*conversion point*) utama bagi pengunjung setelah mereka menyerap seluruh informasi di atasnya.

## 1. Tujuan UX & Strategi Konversi

*   **Menghindari Dead-End:** Pengunjung yang telah membaca seluruh halaman sampai ke bawah (*scroll-to-bottom*) menunjukkan tingkat ketertarikan (intent) yang tinggi. Jangan biarkan halaman berakhir tanpa mengajak mereka melakukan tindakan yang bernilai.
*   **Fokus & Simpel:** Terlalu banyak pilihan tombol akan menyebabkan *Decision Paralysis* (kebingungan memilih). Aturan emasnya: **1 Primary Action (Tombol Utama)** dan **1 Secondary Action (Tombol Opsional)**.

---

## 2. Arsitektur Visual (Banner CTA)

*   **Desain Edge-to-Edge:** Section ini direkomendasikan memiliki warna latar belakang (Background) solid yang menyita perhatian, misalnya `bg-red-600` atau `bg-slate-900`. 
*   **Minimalis:** Tidak membutuhkan banyak teks, kotak grid, atau ornamen. Hanya perlu *Headline* yang tebal, satu baris sub-headline penjelas, dan barisan tombol CTA di bawahnya.
*   **Posisi Teks:** Sebaiknya berpusat di tengah (*Center Aligned*).

---

## 3. Dynamic CTA (Targeting Audiens)

Website Jurusan memiliki banyak jenis pengunjung (Siswa, Alumni, Industri). Oleh karenanya, komponen Blade dirancang secara **dinamis** agar admin (via CMS) dapat mengubah konteks CTA sesuai musim/kebutuhan institusi (Misal: Sedang musim ujian PKL vs Sedang musim pendaftaran).

### Contoh Tema 1: Musim Pendaftaran (PPDB) / Umum
*   **Headline:** "Siap Memulai Perjalananmu Bersama Kami?"
*   **Primary CTA:** `[ Hubungi Kami ]` (Ke Halaman Kontak/WhatsApp).
*   **Secondary CTA:** `[ Lihat Fasilitas ]` (Ke halaman fasilitas).

### Contoh Tema 2: Kemitraan (Industri / Alumni)
*   **Headline:** "Ingin Berkolaborasi Memajukan Pendidikan?"
*   **Primary CTA:** `[ Jadilah Mitra PKL ]` (Ke formulir industri).
*   **Secondary CTA:** `[ Hubungi Jurusan ]` (Ke halaman Kontak).

---

## 4. Responsive Rules

*   **Desktop (`> 1024px`):** Teks besar, tombol CTA dijajarkan menyamping (`flex-row`).
*   **Mobile (`< 768px`):** Teks otomatis menyusut sesuai ruang, namun **Tombol CTA wajib ditumpuk secara vertikal (`flex-col`)** dengan lebar tombol penuh (`w-full`) agar mudah ditekan di layar sentuh.

---

## 5. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── cta-section/
            └── index.blade.php           # Base Section Wrapper & Banner
```

### 5.1. Implementasi CTA Banner (`index.blade.php`)

```blade
@props(['ctaData' => null])

@php
    // Fallback data jika backend (CMS) tidak mengirimkan data konfigurasi CTA
    $defaultData = [
        'headline' => 'Kenali Lebih Dekat Teknik Otomotif',
        'subheadline' => 'Bergabunglah dengan ratusan teknisi muda dan raih peluang tanpa batas di dunia industri modern.',
        'primary_text' => 'Jelajahi Profil Jurusan',
        'primary_url' => route('profile.about'),
        'secondary_text' => 'Hubungi Jurusan',
        'secondary_url' => route('contact.index') // Asumsi ada route contact
    ];

    $data = $ctaData ?? $defaultData;
@endphp

<section class="relative bg-red-600 border-t border-red-700">
    <!-- Ornamen Latar Belakang (Opsional: Pattern Otomotif Halus) -->
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20 text-center">
        
        <!-- Copywriting Area -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight max-w-3xl mx-auto">
            {{ $data['headline'] }}
        </h2>
        
        <p class="mt-5 text-lg md:text-xl text-red-100 max-w-2xl mx-auto font-medium">
            {{ $data['subheadline'] }}
        </p>
        
        <!-- Button Action Area (1 Primary, 1 Secondary) -->
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-5">
            
            <!-- Primary Action (High Contrast - Solid) -->
            @if(isset($data['primary_text']) && isset($data['primary_url']))
                <a href="{{ $data['primary_url'] }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-bold rounded-lg text-red-700 bg-white hover:bg-slate-50 transition-colors shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-red-300">
                    {{ $data['primary_text'] }}
                    <!-- Arrow Right Icon -->
                    <svg class="ml-2 -mr-1.5 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            @endif

            <!-- Secondary Action (Low Contrast - Outline/Ghost) -->
            @if(isset($data['secondary_text']) && isset($data['secondary_url']))
                <a href="{{ $data['secondary_url'] }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border-2 border-red-200 text-base font-bold rounded-lg text-white hover:bg-red-700 hover:border-red-700 transition-colors focus:outline-none focus:ring-4 focus:ring-red-800">
                    {{ $data['secondary_text'] }}
                </a>
            @endif

        </div>

    </div>
</section>
```
