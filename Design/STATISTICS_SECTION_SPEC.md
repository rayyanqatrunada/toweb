# Spesifikasi Desain Section Statistik

Dokumen ini memuat panduan arsitektur antarmuka dan struktur komponen Blade untuk section **Statistik (Visual Separator)**. Section ini bertujuan untuk memberikan "Social Proof" atau bukti konkret mengenai skala, aktivitas, dan kredibilitas Jurusan Teknik Otomotif kepada pengunjung.

## 1. Peran & Tujuan UX

*   **Visual Separator (Pemecah Kebosanan):** Diletakkan di antara *section* konten yang berat (misalnya antara "Program Keahlian" dan "Berita Terbaru") untuk memberikan jeda visual bagi mata pengunjung.
*   **Concrete Proof:** Angka berbicara lebih keras daripada klaim kosong. Menampilkan angka-angka metrik utama untuk membangun kepercayaan (Trust).

---

## 2. Arsitektur Layout (Desktop & Mobile)

Karena berfungsi sebagai *visual separator*, latar belakang (background) harus kontras dengan section di atas dan di bawahnya.

### 2.1. Visual Theme (Pilihan)
1.  **Dark Theme (Direkomendasikan):** Menggunakan `bg-slate-900` atau *dark metallic gradient* dengan angka putih/merah. Memberikan kesan sangat berbobot dan teknikal.
2.  **Brand Theme:** Menggunakan warna utama institusi (misal: `bg-red-700`). Angka berwarna putih transparan (`text-white/90`).
3.  **Pattern/Image Background:** Foto *blur* dari bengkel/mesin dengan *overlay* gelap `bg-black/80`.

### 2.2. Grid System
Menggunakan *Responsive Grid* untuk mengatur pembagian ruang angka:
*   **Mobile (`< 768px`):** 2 kolom (`grid-cols-2`). Hindari 1 kolom karena akan membuat layar sangat memanjang (terlalu banyak scroll untuk fitur pemisah).
*   **Tablet (`768px - 1024px`):** 3 atau 4 kolom (`md:grid-cols-4`).
*   **Desktop (`> 1024px`):** 4 kolom terpusat (`lg:grid-cols-4`). Jika metrik hanya ada 3, letakkan di tengah (`justify-center`).

---

## 3. Komposisi Elemen (Number Emphasis)

Setiap item statistik wajib memiliki hierarki tipografi yang berpusat pada penekanan angka (Number Emphasis):

1.  **Icon (A11y/Visual Context):** Icon SVG (ukuran `w-8 h-8` atau `w-10 h-10`) diletakkan di atas angka dengan warna aksen ringan (misal `text-red-400`). Icon memberi konteks bagi pengunjung tunaaksara/disleksia (bukan sekadar angka saja).
2.  **Number (Highest Weight):** Angka ditampilkan sangat besar, font bold/extrabold (`text-4xl md:text-5xl font-extrabold`). Angka bisa ditambahkan suffix seperti `+` atau `K`.
3.  **Label (Descriptor):** Teks penjelas (misal "Mitra Industri") dengan ukuran lebih kecil (`text-sm md:text-base font-medium`) berwarna sedikit redup (`text-slate-300`).

---

## 4. Animasi & Interaksi

*   **Subtle Animation (Masuk Viewport):** Angka tidak boleh statis saat pertama kali dilihat. Harus ada efek menghitung dari nol (Number Counter Animation) saat *section* masuk ke dalam area layar (viewport).
*   **Implementasi Ringan:** Bisa menggunakan library kecil (seperti `countUp.js`) atau Alpine.js intersection observer (`x-intersect`).

---

## 5. Aturan Bisnis Data (No Dummy)

Section statistik HARUS merefleksikan data *production* yang sebenarnya. Jangan gunakan statis text di Blade jika data tidak ada.

*   `Total Guru`: Menghitung baris di tabel `teachers`.
*   `Total Mitra`: Menghitung baris di tabel `industry_partners`.
*   `Total Alumni`: Menghitung estimasi atau baris dari tabel `alumni`.
*   `Total Prestasi`: Menghitung baris tabel `achievements`.

**Graceful Degradation:**
Jika salah satu hitungan = 0 (misalnya belum ada data prestasi dimasukkan admin), maka **hilangkan kotak statistik tersebut**. Jangan menampilkan kotak bertuliskan "0 Prestasi" karena akan menjadi *anti-marketing* (terkesan tidak pernah berprestasi).

---

## 6. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── home/
        └── stats-section/
            ├── index.blade.php           # Base Section Wrapper
            └── item.blade.php            # Individual Stat Box
```

### 6.1. Contoh Implementasi Komponen Utama (`index.blade.php`)

```blade
@props(['stats'])

{{-- Hanya render jika ada minimal 2 statistik yang valid (> 0) --}}
@if(isset($stats) && count($stats) >= 2)
<section class="relative bg-slate-900 py-16 sm:py-24 border-y border-slate-800">
    <!-- Optional Background Pattern/Noise -->
    <div class="absolute inset-0 opacity-10 bg-[url('pattern.svg')]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-y-12 gap-x-6 md:grid-cols-4 md:gap-x-8">
            
            @foreach($stats as $stat)
                @if($stat['count'] > 0)
                    <x-frontend.home.stats-section.item 
                        :count="$stat['count']" 
                        :label="$stat['label']" 
                        :icon="$stat['icon'] ?? null" 
                        :suffix="$stat['suffix'] ?? '+'"
                    />
                @endif
            @endforeach
            
        </div>
    </div>
</section>
@endif
```

### 6.2. Komponen Item Alpine.js Counter (`item.blade.php`)

*Catatan: Menggunakan Alpine.js `@intersect` plugin untuk mendeteksi kapan elemen muncul di layar, lalu men-trigger animasi menghitung.*

```blade
@props(['count', 'label', 'icon' => null, 'suffix' => '+'])

<div class="text-center flex flex-col items-center">
    <!-- Icon Placeholder (Opsional) -->
    @if($icon)
        <div class="mb-4 text-red-500 bg-slate-800/50 p-3 rounded-full">
            @svg($icon, 'w-8 h-8')
        </div>
    @endif
    
    <!-- Number Animation Container -->
    <div 
        x-data="{ 
            count: 0, 
            target: {{ $count }},
            startAnimation() {
                let start = 0;
                let duration = 2000; // 2 detik
                let stepTime = Math.abs(Math.floor(duration / this.target));
                if(stepTime < 5) stepTime = 5;
                
                let timer = setInterval(() => {
                    start += Math.ceil(this.target / (duration / stepTime));
                    if (start >= this.target) {
                        this.count = this.target;
                        clearInterval(timer);
                    } else {
                        this.count = start;
                    }
                }, stepTime);
            }
        }"
        x-intersect.once="startAnimation()"
        class="mt-2 text-4xl md:text-5xl font-extrabold text-white tracking-tight flex items-baseline justify-center"
    >
        <span x-text="count">0</span>
        <span class="text-red-500 font-bold ml-1">{{ $suffix }}</span>
    </div>
    
    <!-- Label Deskripsi -->
    <p class="mt-3 text-sm md:text-base font-medium text-slate-400 uppercase tracking-wide">
        {{ $label }}
    </p>
</div>
```
