# Spesifikasi Global Navigation (Navbar)

Dokumen ini berisi spesifikasi arsitektur informasi, UI/UX, dan rekomendasi struktur komponen Blade untuk Global Navigation website Jurusan Teknik Otomotif.

## 1. Arsitektur Informasi & Hierarki Menu

Untuk menghindari kognitif berlebih (overwhelming) bagi pengunjung, menu level pertama (Root) harus dibatasi. Struktur berikut mengelompokkan modul menjadi kategori yang berorientasi pada pengguna (siswa, orang tua, industri).

**Main Navigation (Left/Center aligned):**
- **Beranda** (Single Link)
- **Profil** (Dropdown)
  - Tentang Jurusan
  - Guru & Staf
  - Fasilitas
- **Akademik** (Dropdown)
  - Program & Kurikulum
  - Kompetensi Keahlian
  - Pembelajaran / Praktikum
- **Karier & Mitra** (Dropdown)
  - PKL (Praktik Kerja Lapangan)
  - Mitra Industri
  - Lowongan Kerja
  - Alumni
- **Informasi** (Dropdown)
  - Berita
  - Pengumuman
  - Agenda
  - Prestasi
- **Media** (Dropdown)
  - Gallery
  - Download / Dokumen

**Secondary/Action Navigation (Right aligned):**
- **Search Icon:** Membuka search bar overlay / dropdown (tidak memakan tempat di navbar utama).
- **CTA Button (Opsional):** Misal "Pendaftaran" atau "Portal Siswa" (Primary Button style).

---

## 2. Spesifikasi UI / Visual

### 2.1. Desktop (`lg` & `xl` screens)
*   **Height:** Maksimal 72px (`h-18` atau `py-4`). Navbar yang terlalu tinggi membuang ruang vertikal yang berharga.
*   **Behavior:** *Sticky Top* dengan *Backdrop Blur* (`sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200`). Transisi halus saat *scroll* ke bawah (misalnya shadow muncul saat halaman di-scroll).
*   **Root Links:** Teks warna `slate-600`, hover menjadi `slate-900`.
*   **Active State Indicator:** Menggunakan garis bawah (bottom border) setebal 2px berwarna merah (`border-red-600`) atau sekadar teks berubah menjadi `red-600` dan `font-semibold`.
*   **Dropdown Panel:**
    *   Menggunakan *Simple Dropdown* (bukan Mega Menu lebar penuh) karena sub-menu maksimal 4 item.
    *   Panel menggunakan background `white`, border `slate-200`, shadow medium (`shadow-lg`), dan sudut melengkung `rounded-lg`.
    *   Posisi dropdown diberi *gap* kecil dari navbar (sekitar 8px) agar tidak terkesan menempel kaku.

### 2.2. Mobile & Tablet (`sm` & `md` screens)
*   **Height:** 64px (`h-16`).
*   **Trigger:** Icon Hamburger (bar tiga) di sebelah kanan, Logo di sebelah kiri.
*   **Menu Layout:** *Off-canvas sidebar* (slide dari kanan) atau *full-width dropdown* (slide dari atas ke bawah menutupi layar). Disarankan *full-width dropdown* untuk konsistensi dengan *sticky header*.
*   **Accordion Sub-menu:** Dropdown di mobile diubah menjadi *accordion*. Pengguna tap panah bawah untuk mengekspansi sub-menu agar tinggi layar tidak tersita jika semua terbuka.
*   **Search Mobile:** Search bar diletakkan di paling atas di dalam area menu mobile (selalu terlihat saat hamburger dibuka).

---

## 3. Spesifikasi UX & Interaksi

*   **Hover vs Click (Desktop):** Dropdown menggunakan klik (didukung oleh Alpine.js `@click` dan `@click.outside`) untuk dukungan *touch-friendly tablet/laptop* dan menghindari dropdown tak sengaja terbuka saat kursor numpang lewat. Jika tetap ingin Hover, gunakan *delay* (debounce 150ms) sebelum tertutup agar pengguna tidak frustrasi saat memindahkan kursor secara diagonal.
*   **Keyboard Navigation (A11y):**
    *   Pengguna dapat melakukan navigasi menu menggunakan tombol `Tab`.
    *   Fokus (Focus State) harus terlihat (`focus:ring-2 focus:ring-red-500 focus:outline-none`).
    *   Menekan tombol `Enter` pada Parent Menu akan membuka Dropdown.
*   **Dismissal:**
    *   Menekan tombol `ESC` wajib menutup dropdown yang sedang terbuka (atau menu mobile yang sedang terbuka).
    *   Klik di area manapun di luar navbar (`@click.outside`) wajib menutup dropdown yang aktif.
*   **Search Behavior:** Klik icon search di desktop akan mengubah area tengah navbar menjadi input text (expandable input) atau memunculkan modal *Command Palette* (lebih modern, bagus untuk *Global Search*).

---

## 4. Rekomendasi Struktur Komponen Blade

Kami merekomendasikan penggunaan gabungan **Blade Components** dan **Alpine.js** (karena Laravel + Livewire umumnya sangat kompatibel dengan Alpine untuk UI logic yang ringan tanpa re-render).

### Struktur File:
```text
resources/views/components/
└── layout/
    ├── navbar/
    │   ├── index.blade.php           # Parent navbar wrapper (Sticky header, Mobile Toggle)
    │   ├── desktop-nav.blade.php     # Container navigasi desktop
    │   ├── mobile-nav.blade.php      # Container navigasi mobile (Offcanvas / Dropdown)
    │   ├── link.blade.php            # Link biasa (Root: Beranda)
    │   ├── dropdown.blade.php        # Wrapper untuk dropdown menu (Alpine x-data)
    │   ├── dropdown-item.blade.php   # Item di dalam dropdown desktop
    │   ├── mobile-link.blade.php     # Link biasa mobile
    │   └── mobile-dropdown.blade.php # Accordion menu untuk mobile
    └── search/
        └── global-modal.blade.php    # Modal search yang dipanggil via icon navbar
```

### 4.1. Contoh Implementasi `dropdown.blade.php` (Desktop)
```blade
@props(['title', 'active' => false])

<div 
    x-data="{ open: false }" 
    @click.outside="open = false" 
    @keydown.escape.window="open = false"
    class="relative inline-block text-left"
>
    <!-- Trigger -->
    <button 
        @click="open = !open" 
        type="button" 
        class="inline-flex items-center px-1 pt-1 border-b-2 {{ $active ? 'border-red-600 text-red-600 font-semibold' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300' }} text-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500 rounded-sm"
        :aria-expanded="open.toString()"
    >
        {{ $title }}
        <!-- Chevron Down Icon -->
        <svg class="ml-1 h-4 w-4 text-slate-400 group-hover:text-slate-500 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-100" 
        x-transition:enter-start="transform opacity-0 scale-95" 
        x-transition:enter-end="transform opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-75" 
        x-transition:leave-start="transform opacity-100 scale-100" 
        x-transition:leave-end="transform opacity-0 scale-95" 
        class="absolute z-50 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" 
        style="display: none;"
    >
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            {{ $slot }}
        </div>
    </div>
</div>
```

### 4.2. Contoh Penggunaan di Induk (`navbar/index.blade.php`)
```blade
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2">
                    <img class="h-8 w-auto" src="{{ asset('img/logo-otomotif.svg') }}" alt="Logo">
                    <span class="font-bold text-lg text-slate-900 hidden sm:block">Teknik Otomotif</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <x-layout.navbar.link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    Beranda
                </x-layout.navbar.link>

                <x-layout.navbar.dropdown title="Profil" :active="request()->is('profil/*')">
                    <x-layout.navbar.dropdown-item href="{{ route('profile.about') }}">Tentang Jurusan</x-layout.navbar.dropdown-item>
                    <x-layout.navbar.dropdown-item href="{{ route('profile.teachers') }}">Guru & Staf</x-layout.navbar.dropdown-item>
                    <x-layout.navbar.dropdown-item href="{{ route('profile.facilities') }}">Fasilitas</x-layout.navbar.dropdown-item>
                </x-layout.navbar.dropdown>
                
                <!-- ... Navigasi lainnya ... -->
            </div>

            <!-- Right Actions (Search & Mobile Toggle) -->
            <div class="flex items-center space-x-4">
                <!-- Search Icon -->
                <button type="button" class="text-slate-500 hover:text-slate-700 p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-red-500">
                    <span class="sr-only">Search</span>
                    <x-icons.search class="h-5 w-5" />
                </button>
                
                <!-- Mobile Menu Button (Hamburger) -->
                <div class="flex items-center md:hidden">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="...">
                        <!-- Icon hamburger/close -->
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <x-layout.navbar.mobile-nav />
</nav>
```
