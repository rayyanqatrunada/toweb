# Spesifikasi Desain Section: Praktik Kerja Lapangan (PKL)

Dokumen ini memuat panduan arsitektur antarmuka dan komponen Blade untuk *Section* **"Praktik Kerja Lapangan (PKL)"**. Bagian ini merupakan turunan langsung dari *Partnership Section*, dengan fokus pada **perjalanan siswa** dalam menghadapi dunia kerja nyata sebelum mereka benar-benar lulus.

## 1. Tujuan UX (User Experience)

*   **Pendidikan yang Transparan:** Menghilangkan kebingungan siswa/orang tua tentang "Bagaimana proses penyaluran PKL di jurusan ini?".
*   **Membangun Ekspektasi:** Memperlihatkan bahwa PKL bukan sekadar "magang biasa", melainkan sebuah *pipeline* (alur terstruktur) mulai dari persiapan hingga membuka gerbang karier.

---

## 2. Arsitektur Visual (Process Timeline)

Untuk menjelaskan alur kerja, kita menggunakan elemen **Step-by-Step / Visual Timeline Horizontal** di Desktop, dan Vertikal di Mobile.

### 2.1. Alur Proses (5 Langkah)
Setiap langkah (*node*) memiliki Ikon, Judul, dan Deskripsi Singkat:
1.  **Persiapan:** Pembekalan soft skill, K3 (Keselamatan Kerja), dan tes kompetensi dasar.
2.  **Penempatan:** Pemetaan kompetensi siswa dengan spesifikasi yang dibutuhkan mitra industri.
3.  **Praktik Industri:** Pengalaman kerja nyata di bengkel/pabrik selama 3-6 bulan penuh.
4.  **Evaluasi:** Penilaian performa oleh instruktur industri dan guru pembimbing.
5.  **Pengalaman Karier:** Sertifikasi industri dan prioritas rekrutmen pasca-lulus.

### 2.2. Highlight Statistik (Data-Driven)
Di bawah garis timeline, disajikan metrik yang mengesankan mengenai program PKL. Sesuai aturan: **JANGAN mengarang angka**. 
*   **Peserta PKL:** Total `$internship_participants->count()`.
*   **Perusahaan Partner:** Total `$industry_partners->where('is_pkl', true)->count()`.
*   **Periode:** (Tarik dari konfigurasi CMS jika ada, misal "6 Bulan").
*   **Lokasi:** Sebaran wilayah (jika ada datanya di CMS).

Jika data belum tersedia, sembunyikan (hide) metrik terkait, tanpa merusak keseluruhan UI.

---

## 3. Responsive Rules & Interaksi

*   **Desktop (`> 1024px`):** Horizontal Stepper. Garis lurus menyambungkan ke-5 titik (ikon) dari kiri ke kanan. Teks berada di bawah ikon.
*   **Mobile (`< 768px`):** Mengubah *Horizontal Stepper* menjadi *Vertical Stepper* (Garis dari atas ke bawah di sebelah kiri).
*   **Animasi Masuk:** Gunakan sedikit transisi (*fade right/up*) secara berurutan (*staggered*) pada setiap *node* saat masuk viewport (bisa via Alpine.js intersect).

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── pkl-section/
            ├── index.blade.php           # Base Section Wrapper
            ├── timeline-horizontal.blade.php # Komponen Proses Alur (Desktop/Mobile)
            └── stats-bar.blade.php       # Komponen Metrik Data Dinamis
```

### 4.1. Implementasi Utama (`index.blade.php`)

```blade
@props(['pklStats'])

<section class="py-16 md:py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Praktik Kerja Lapangan</span>
            <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Menjembatani Kelas & Industri</h2>
            <p class="mt-4 text-lg text-slate-600">
                Langkah konkret mengasah keterampilan teknis langsung di bawah bimbingan para mekanik dan teknisi profesional.
            </p>
        </div>

        <!-- Visual Timeline (Proses) -->
        <div class="mb-16">
            <x-frontend.home.pkl-section.timeline-horizontal />
        </div>

        <!-- Dynamic Statistics -->
        @if(isset($pklStats) && !empty($pklStats))
            <div class="mb-12">
                <x-frontend.home.pkl-section.stats-bar :stats="$pklStats" />
            </div>
        @endif

        <!-- CTA Action -->
        <div class="text-center">
            <a href="{{ route('pkl.index') }}" class="inline-flex items-center px-6 py-3 border border-red-600 shadow-sm text-base font-semibold rounded-md text-red-600 bg-transparent hover:bg-red-50 hover:text-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Informasi Lengkap PKL
            </a>
        </div>

    </div>
</section>
```

### 4.2. Timeline Horizontal (`timeline-horizontal.blade.php`)
*Contoh sederhana menggunakan Flexbox untuk membuat Stepper/Timeline yang responsif.*

```blade
<div class="relative">
    <!-- Garis Penghubung (Tampil di belakang layar pada Desktop) -->
    <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-slate-200 -translate-y-1/2 z-0"></div>

    <!-- Stepper Container -->
    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center space-y-8 md:space-y-0 md:space-x-4">
        
        @php
            $steps = [
                ['icon' => 'clip-board', 'title' => 'Persiapan', 'desc' => 'Pembekalan teori K3 dan kompetensi dasar.'],
                ['icon' => 'map-pin', 'title' => 'Penempatan', 'desc' => 'Pemetaan siswa sesuai spesifikasi mitra.'],
                ['icon' => 'wrench', 'title' => 'Praktik Industri', 'desc' => 'Kerja langsung di bengkel 3-6 bulan.'],
                ['icon' => 'check-circle', 'title' => 'Evaluasi', 'desc' => 'Penilaian oleh instruktur industri.'],
                ['icon' => 'briefcase', 'title' => 'Karier', 'desc' => 'Sertifikasi dan prioritas rekrutmen.'],
            ];
        @endphp

        @foreach($steps as $index => $step)
            <div class="flex flex-row md:flex-col items-center md:items-center text-left md:text-center flex-1 w-full md:w-auto relative">
                
                <!-- Garis Penghubung Mobile (Vertikal) -->
                @if(!$loop->last)
                    <div class="absolute left-6 top-12 bottom-[-2rem] w-0.5 bg-slate-200 md:hidden z-[-1]"></div>
                @endif

                <!-- Node Icon -->
                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-white border-2 border-red-600 shadow-sm flex-shrink-0 text-red-600 z-10">
                    <span class="text-sm font-bold">{{ $index + 1 }}</span>
                </div>
                
                <!-- Teks -->
                <div class="ml-6 md:ml-0 md:mt-6">
                    <h4 class="text-lg font-bold text-slate-900">{{ $step['title'] }}</h4>
                    <p class="mt-1 text-sm text-slate-500 leading-relaxed md:max-w-xs mx-auto">
                        {{ $step['desc'] }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
</div>
```

### 4.3. Stats Bar Dinamis (`stats-bar.blade.php`)

```blade
@props(['stats'])

<div class="bg-white rounded-xl border border-slate-200 p-6 md:p-8 shadow-sm">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-slate-100">
        
        @if(isset($stats['partners']) && $stats['partners'] > 0)
            <div class="px-2">
                <div class="text-3xl font-extrabold text-slate-900">{{ $stats['partners'] }}+</div>
                <div class="mt-1 text-sm font-medium text-slate-500 uppercase tracking-wide">Perusahaan Mitra</div>
            </div>
        @endif
        
        @if(isset($stats['participants']) && $stats['participants'] > 0)
            <div class="px-2 border-l border-slate-100">
                <div class="text-3xl font-extrabold text-slate-900">{{ $stats['participants'] }}</div>
                <div class="mt-1 text-sm font-medium text-slate-500 uppercase tracking-wide">Siswa Berangkat</div>
            </div>
        @endif
        
        @if(isset($stats['locations']) && $stats['locations'] > 0)
            <div class="px-2 border-l-0 md:border-l border-slate-100 mt-6 md:mt-0 pt-6 md:pt-0 border-t md:border-t-0">
                <div class="text-3xl font-extrabold text-slate-900">{{ $stats['locations'] }}</div>
                <div class="mt-1 text-sm font-medium text-slate-500 uppercase tracking-wide">Kota/Kabupaten</div>
            </div>
        @endif

        @if(isset($stats['period']))
            <div class="px-2 border-l border-slate-100 mt-6 md:mt-0 pt-6 md:border-t-0 border-t">
                <div class="text-3xl font-extrabold text-slate-900">{{ $stats['period'] }}</div>
                <div class="mt-1 text-sm font-medium text-slate-500 uppercase tracking-wide">Lama Praktik</div>
            </div>
        @endif

    </div>
</div>
```
