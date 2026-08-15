# Spesifikasi Desain UX: Global Search (Pencarian Terpusat)

Dokumen ini memuat arsitektur antarmuka dan struktur logika pencarian untuk fitur **"Global Search"**. Karena website jurusan memiliki berbagai macam entitas data (Berita, Prestasi, Guru, Alumni, Dokumen), pencarian tidak boleh dibatasi pada satu kategori saja, melainkan harus menyisir keseluruhan domain CMS yang berstatus publik.

## 1. Tujuan UX & Aksesibilitas

*   **Mudah Ditemukan (Discoverable):** Ikon Kaca Pembesar (Search) harus selalu tersedia di *Global Navigation* (Navbar) di layar Desktop maupun Mobile. 
*   **Kecepatan (Frictionless):** Disarankan menggunakan antarmuka **Full-screen Modal / Overlay** saat ikon *search* diklik, sehingga pengguna tidak perlu berpindah halaman (reload) hanya untuk mulai mengetik kueri pencarian.
*   **Privacy-First:** Search Engine secara ketat diinstruksikan **HANYA** menyisir baris database yang memiliki flag `is_public = true` atau `status = 'published'`. Seluruh draf artikel dan data privat dipastikan *blind* (buta) dari mesin pencari.

---

## 2. Arsitektur Layout (Search Overlay & Results)

### 2.1. Search Input Modal (Overlay)
Saat pengguna mengklik tombol *Search* di Navbar:
*   Sebuah *backdrop blur* menutupi halaman web.
*   Muncul kolom input besar (ukuran `text-2xl` atau `text-3xl`) di bagian atas-tengah layar.
*   Secara otomatis mendapatkan fokus kursor (`autofocus`), sehingga pengguna bisa langsung mengetik dari *keyboard*.

### 2.2. Tampilan Hasil Pencarian (Omni-Results)
Hasil pencarian harus dipecah/dikategorikan, bukan dicampur-aduk menjadi satu *list* tanpa konteks.

*Struktur Data Output (Jika Kueri: "otomotif"):*
**Menampilkan 16 hasil untuk kueri "otomotif"**

*   **Berita (3 hasil):** Menampilkan judul berita dan tanggal.
*   **Prestasi (2 hasil):** Menampilkan nama lomba dan juara.
*   **Alumni (4 hasil):** Menampilkan nama alumni dan angkatan.
*   **Galeri (5 hasil):** Menampilkan judul album/foto.
*   **Dokumen Publik (2 hasil):** Menampilkan judul dokumen dan tombol unduh.

### 2.3. Empty State (Pencarian Nihil)
Jika kueri tidak ditemukan, hindari jalan buntu.
*   *Teks:* "Maaf, kami tidak menemukan hasil untuk kata kunci '...'."
*   *Saran (Suggestion):* "Coba gunakan kata kunci lain, atau lihat halaman [Prestasi Terbaru] dan [Berita Terkini]."

---

## 3. Responsive Rules (Mobile Comfort)

*   **Masalah Mobile Search Klasik:** Kotak input yang terlalu kecil, tertutup oleh keyboard virtual (on-screen keyboard), atau tombol *close* yang sulit dijangkau jari.
*   **Solusi Mobile-First:**
    *   Modal pencarian di *mobile* harus menutupi layar sepenuhnya (100vh) dengan *background* warna solid (putih/gelap), bukan sekadar *dropdown* kecil.
    *   Kolom input diposisikan di puncak (Top: 0) agar tidak tertimpa/terdorong oleh kemunculan *keyboard* HP.
    *   Tombol (X) / Batal, diletakkan di sudut kanan atas dengan ukuran *touch-target* minimal 48px.

---

## 4. Rekomendasi Struktur Komponen Blade

```text
components/
└── frontend/
    └── global-search/
        ├── search-modal.blade.php      # Overlay popup pencarian (Alpine.js)
        ├── search-result-group.blade.php# Komponen baris kategori hasil
        └── search-page.blade.php       # Halaman fallback jika melihat "Semua Hasil"
```

### 4.1. Modal Pencarian Interaktif (`search-modal.blade.php`)
*Menggunakan Alpine.js agar ringan dan cepat tanpa jQuery.*

```blade
<!-- Wrapper Komponen yang mengendalikan State via Alpine -->
<div 
    x-data="{ isSearchOpen: false, searchQuery: '' }" 
    @open-search.window="isSearchOpen = true; $nextTick(() => { $refs.searchInput.focus() })"
    @keydown.escape.window="isSearchOpen = false"
>
    <!-- Overlay & Modal Container -->
    <div 
        x-show="isSearchOpen" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-[100] overflow-y-auto bg-slate-900/90 backdrop-blur-sm p-4 sm:p-6 md:p-20"
        style="display: none;"
    >
        <!-- Modal Box -->
        <div class="mx-auto max-w-3xl transform divide-y divide-slate-100 overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-black/5 transition-all" @click.outside="isSearchOpen = false">
            
            <!-- Area Input Form -->
            <form action="{{ route('search.index') }}" method="GET" class="relative">
                <svg class="pointer-events-none absolute left-4 top-4 h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                
                <input 
                    type="search" 
                    name="q"
                    x-model="searchQuery"
                    x-ref="searchInput"
                    class="h-14 w-full border-0 bg-transparent pl-12 pr-12 text-slate-900 focus:ring-0 sm:text-lg outline-none placeholder-slate-400 font-medium"
                    placeholder="Ketik kata kunci pencarian..." 
                    autocomplete="off"
                >
                
                <!-- Tombol Close (Mobile & Desktop) -->
                <button type="button" @click="isSearchOpen = false" class="absolute right-3 top-3 p-1 rounded-md text-slate-400 hover:text-red-500 hover:bg-red-50 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </form>

            <!-- Quick Suggestions (Tampil Jika Input Kosong) -->
            <div x-show="searchQuery.length === 0" class="px-6 py-6 sm:px-8 bg-slate-50">
                <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-3">Pencarian Populer</h2>
                <div class="flex flex-wrap gap-2">
                    <button type="button" @click="searchQuery = 'Prestasi'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Prestasi</button>
                    <button type="button" @click="searchQuery = 'Fasilitas'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Fasilitas Bengkel</button>
                    <button type="button" @click="searchQuery = 'Alumni'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Data Alumni</button>
                    <button type="button" @click="searchQuery = 'PKL'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Lokasi PKL</button>
                </div>
            </div>

            <!-- Petunjuk Keyboard Aksesibilitas (Hanya Desktop) -->
            <div class="hidden sm:flex px-6 py-4 border-t border-slate-100 bg-slate-50 text-xs text-slate-400 items-center justify-between">
                <span>Tekan <kbd class="font-sans font-semibold border border-slate-300 rounded px-1.5 py-0.5 shadow-sm text-slate-500 bg-white">Enter</kbd> untuk mencari ke seluruh sistem.</span>
                <span>Tekan <kbd class="font-sans font-semibold border border-slate-300 rounded px-1.5 py-0.5 shadow-sm text-slate-500 bg-white">Esc</kbd> untuk menutup.</span>
            </div>
        </div>
    </div>
</div>
```

### 4.2. Halaman Hasil Pencarian Omni-Search (`search-page.blade.php`)
*Halaman terdedikasi setelah pengguna menekan "Enter". Controller harus melempar variabel `$results` yang merupakan struktur multidimensi berisi hitungan dari masing-masing model yang di-query.*

```blade
<!-- Di dalam Tag Konten Utama -->
<div class="max-w-4xl mx-auto px-4 py-12 md:py-20">
    
    <div class="mb-10 text-center">
        <h1 class="text-3xl font-extrabold text-slate-900">
            Hasil Pencarian untuk <span class="text-red-600">"{{ request('q') }}"</span>
        </h1>
        <p class="mt-2 text-slate-500 text-lg">
            Menemukan total {{ $totalResults }} entri publik terkait.
        </p>
    </div>

    @if($totalResults > 0)
        <div class="space-y-8">
            
            <!-- Kategori: Berita -->
            @if(isset($results['news']) && count($results['news']) > 0)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-slate-50 px-5 py-3 border-b border-slate-200 flex justify-between items-center">
                        <h2 class="font-bold text-slate-800">Berita & Artikel</h2>
                        <span class="bg-slate-200 text-slate-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ count($results['news']) }} hasil</span>
                    </div>
                    <ul class="divide-y divide-slate-100 p-5">
                        @foreach($results['news'] as $news)
                            <li class="py-2 hover:bg-slate-50 transition-colors">
                                <a href="{{ route('news.show', $news->slug) }}" class="text-blue-600 hover:text-red-600 font-medium font-medium">{{ $news->title }}</a>
                                <div class="text-sm text-slate-500 mt-0.5">{{ Str::limit(strip_tags($news->excerpt), 100) }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Kategori: Prestasi -->
            @if(isset($results['achievements']) && count($results['achievements']) > 0)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-slate-50 px-5 py-3 border-b border-slate-200 flex justify-between items-center">
                        <h2 class="font-bold text-slate-800">Prestasi Siswa</h2>
                        <span class="bg-slate-200 text-slate-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ count($results['achievements']) }} hasil</span>
                    </div>
                    <ul class="divide-y divide-slate-100 p-5">
                        @foreach($results['achievements'] as $ach)
                            <li class="py-2 hover:bg-slate-50 transition-colors">
                                <a href="{{ route('achievements.show', $ach->id) }}" class="text-blue-600 hover:text-red-600 font-medium">{{ $ach->title }}</a>
                                <div class="text-sm text-slate-500 mt-0.5">Juara {{ $ach->rank }} tingkat {{ $ach->level }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Dan kategori lainnya (Alumni, Dokumen, dll) berlanjut dengan pola yang sama... -->

        </div>
    @else
        <!-- Empty State -->
        <div class="text-center bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 p-12 mt-10">
            <svg class="mx-auto h-16 w-16 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-bold text-slate-900">Pencarian Nihil</h3>
            <p class="mt-2 text-slate-500 max-w-md mx-auto">
                Kami tidak dapat menemukan data publik dengan kata kunci <span class="font-bold text-slate-700">"{{ request('q') }}"</span>. 
                Pastikan penulisan kata kunci sudah benar, atau coba gunakan kueri pencarian yang lebih umum.
            </p>
            <div class="mt-6">
                <button onclick="window.dispatchEvent(new CustomEvent('open-search'))" class="inline-flex items-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    Coba Pencarian Lain
                </button>
            </div>
        </div>
    @endif
    
</div>
```
