@php
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $isHome = request()->routeIs('home');
    $isPrograms = request()->routeIs('academic.programs');
    $isTeachers = request()->routeIs('academic.teachers');
    $isFacilities = request()->routeIs('academic.facilities');

    $menuTiles = [
        [
            'label' => 'Beranda',
            'desc' => 'Halaman Utama',
            'route' => route('home'),
            'active' => $isHome,
            'icon' => 'home',
        ],
        [
            'label' => 'Tentang',
            'desc' => 'Profil Jurusan',
            'route' => route('about'),
            'active' => request()->routeIs('about'),
            'icon' => 'info',
        ],
        [
            'label' => 'Program',
            'desc' => 'Keahlian TSM',
            'route' => route('academic.programs'),
            'active' => $isPrograms,
            'icon' => 'academic',
        ],
        [
            'label' => 'Guru',
            'desc' => 'Tim Pengajar',
            'route' => route('academic.teachers'),
            'active' => $isTeachers,
            'icon' => 'users',
        ],
        [
            'label' => 'Fasilitas',
            'desc' => 'Bengkel AHASS',
            'route' => route('academic.facilities'),
            'active' => $isFacilities,
            'icon' => 'building',
        ],
        [
            'label' => 'Prestasi',
            'desc' => 'Juara & Lomba',
            'route' => route('achievements.index'),
            'active' => request()->is('prestasi*'),
            'icon' => 'trophy',
        ],
        [
            'label' => 'Industri',
            'desc' => 'PKL & Mitra',
            'route' => route('partnership.index'),
            'active' => request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*'),
            'icon' => 'briefcase',
        ],
        [
            'label' => 'Alumni',
            'desc' => 'Jejak Karir',
            'route' => route('alumni.index'),
            'active' => request()->is('alumni*'),
            'icon' => 'user-group',
        ],
        [
            'label' => 'Galeri',
            'desc' => 'Dokumentasi',
            'route' => route('gallery.index'),
            'active' => request()->is('galeri*'),
            'icon' => 'camera',
        ],
        [
            'label' => 'Berita',
            'desc' => 'Kabar & Info',
            'route' => route('news.index'),
            'active' => request()->is('berita*') || request()->is('pengumuman*'),
            'icon' => 'newspaper',
        ],
        [
            'label' => 'Unduhan',
            'desc' => 'Modul & Arsip',
            'route' => route('download.index'),
            'active' => request()->is('unduhan*') || request()->is('download*'),
            'icon' => 'download',
        ],
        [
            'label' => 'Kontak',
            'desc' => 'Hubungi Kami',
            'route' => route('contact.index'),
            'active' => request()->routeIs('contact.index'),
            'icon' => 'mail',
        ],
    ];
@endphp

<!-- Container Mobile Navigation & Expanding Bottom Drawer -->
<div class="lg:hidden" id="mobile-nav-container">

    <!-- 1. Backdrop Scrim Gelap (Fade In/Out) -->
    <div id="mobile-menu-backdrop"
         onclick="window.closeMobileNavDrawer()"
         class="fixed inset-0 bg-slate-950/65 backdrop-blur-sm z-[95] transition-opacity duration-300 opacity-0 pointer-events-none"
         style="display: none;"></div>

    <!-- 2. Kotak Drawer yang Bergeser ke Atas (Solid White Bottom Sheet - 4 Kolom Murni) -->
    <div id="mobile-menu-drawer"
         class="fixed left-0 right-0 z-[98] max-w-[540px] mx-auto px-3.5 pb-2 transition-all duration-300 transform translate-y-full opacity-0 pointer-events-none"
         style="display: none; bottom: 68px;">

        <div class="bg-white border border-slate-200/90 rounded-3xl shadow-[0_-16px_40px_rgba(0,0,0,0.22)] ring-1 ring-black/5 p-4 sm:p-5 overflow-hidden">
            
            <!-- Drag Handle Bar (Pill) -->
            <button type="button" onclick="window.closeMobileNavDrawer()" class="w-full flex justify-center py-1 -mt-1 group cursor-grab focus:outline-none" aria-label="Tutup Panel">
                <span class="w-12 h-1.5 bg-slate-300 group-hover:bg-slate-400 rounded-full transition-colors"></span>
            </button>

            <!-- Header Panel Menu -->
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-3.5 mt-1">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-red-50 text-red-600 flex items-center justify-center border border-red-100/80">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900 leading-none">Pilihan Menu TSM</h3>
                        <p class="text-[10px] text-slate-500 font-medium mt-0.5">Navigasi cepat & praktis</p>
                    </div>
                </div>
                <button type="button" 
                        onclick="window.closeMobileNavDrawer()" 
                        class="p-1.5 rounded-full text-slate-400 hover:text-slate-700 hover:bg-slate-100 active:scale-90 transition-all focus:outline-none" 
                        aria-label="Tutup Menu">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- KOTAK MENU: GRID 4 KOLOM PERSISI (Perkotak 4 Kolom) -->
            <div class="grid grid-cols-4 gap-2 sm:gap-2.5 max-h-[58vh] overflow-y-auto pr-0.5" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
                @foreach($menuTiles as $item)
                    <a href="{{ $item['route'] }}" 
                       onclick="window.closeMobileNavDrawer()"
                       class="flex flex-col items-center justify-center p-2 rounded-2xl transition-all duration-150 active:scale-90 group focus:outline-none {{ $item['active'] ? 'bg-red-50 border border-red-200 shadow-2xs' : 'bg-slate-50/70 hover:bg-slate-100 border border-slate-100' }}">
                       
                        <!-- Kotak Icon Persegi / Rounded Squircle -->
                        <div class="relative w-11 h-11 sm:w-12 sm:h-12 rounded-2xl flex items-center justify-center transition-all duration-200 {{ $item['active'] ? 'bg-red-600 text-white shadow-md shadow-red-600/30 scale-105' : 'bg-white text-slate-700 border border-slate-200/70 group-hover:text-red-600 group-hover:border-red-200 group-hover:shadow-xs' }}">
                            
                            @if($item['icon'] === 'home')
                                <svg class="w-5 h-5" fill="{{ $item['active'] ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            @elseif($item['icon'] === 'info')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @elseif($item['icon'] === 'academic')
                                <svg class="w-5 h-5" fill="{{ $item['active'] ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            @elseif($item['icon'] === 'users')
                                <svg class="w-5 h-5" fill="{{ $item['active'] ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            @elseif($item['icon'] === 'building')
                                <svg class="w-5 h-5" fill="{{ $item['active'] ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            @elseif($item['icon'] === 'trophy')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2 0h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            @elseif($item['icon'] === 'briefcase')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            @elseif($item['icon'] === 'user-group')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/>
                                </svg>
                            @elseif($item['icon'] === 'camera')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @elseif($item['icon'] === 'newspaper')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            @elseif($item['icon'] === 'download')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            @elseif($item['icon'] === 'mail')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            @endif

                            @if($item['active'])
                                <span class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-red-600 ring-2 ring-white"></span>
                            @endif
                        </div>
                        
                        <!-- Label Nama Menu -->
                        <span class="text-[10px] sm:text-[10.5px] font-heading font-bold text-center mt-1.5 leading-tight truncate max-w-full {{ $item['active'] ? 'text-red-600' : 'text-slate-700 group-hover:text-slate-900' }}">
                            {{ $item['label'] }}
                        </span>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

    <!-- 3. Bottom Navigation Bar Dock (Selalu Menempel di Bawah Layar) -->
    <nav aria-label="Mobile Navigation Bar" 
         class="fixed bottom-0 left-0 right-0 z-[100] bg-white/98 backdrop-blur-xl border-t border-slate-200/90 shadow-[0_-4px_24px_rgba(0,0,0,0.08)] transition-all duration-300">
        <div class="max-w-[540px] mx-auto px-3 flex items-center justify-around h-[62px]">
            
            <!-- Tab 1: Beranda -->
            <a href="{{ route('home') }}" 
               onclick="window.closeMobileNavDrawer()"
               class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none {{ $isHome ? 'text-red-600' : 'text-slate-500 hover:text-slate-900' }}">
                <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors {{ $isHome ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="{{ $isHome ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $isHome ? '2.2' : '1.9' }}" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    @if($isHome)
                        <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                    @endif
                </div>
                <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 {{ $isHome ? 'text-red-600' : 'text-slate-500' }}">
                    Beranda
                </span>
            </a>

            <!-- Tab 2: Program -->
            <a href="{{ route('academic.programs') }}" 
               onclick="window.closeMobileNavDrawer()"
               class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none {{ $isPrograms ? 'text-red-600' : 'text-slate-500 hover:text-slate-900' }}">
                <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors {{ $isPrograms ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="{{ $isPrograms ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $isPrograms ? '2.2' : '1.9' }}" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    @if($isPrograms)
                        <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                    @endif
                </div>
                <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 {{ $isPrograms ? 'text-red-600' : 'text-slate-500' }}">
                    Program
                </span>
            </a>

            <!-- Tab 3: Guru -->
            <a href="{{ route('academic.teachers') }}" 
               onclick="window.closeMobileNavDrawer()"
               class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none {{ $isTeachers ? 'text-red-600' : 'text-slate-500 hover:text-slate-900' }}">
                <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors {{ $isTeachers ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="{{ $isTeachers ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $isTeachers ? '2.2' : '1.9' }}" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    @if($isTeachers)
                        <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                    @endif
                </div>
                <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 {{ $isTeachers ? 'text-red-600' : 'text-slate-500' }}">
                    Guru
                </span>
            </a>

            <!-- Tab 4: Fasilitas -->
            <a href="{{ route('academic.facilities') }}" 
               onclick="window.closeMobileNavDrawer()"
               class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none {{ $isFacilities ? 'text-red-600' : 'text-slate-500 hover:text-slate-900' }}">
                <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors {{ $isFacilities ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="{{ $isFacilities ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $isFacilities ? '2.2' : '1.9' }}" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    @if($isFacilities)
                        <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                    @endif
                </div>
                <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 {{ $isFacilities ? 'text-red-600' : 'text-slate-500' }}">
                    Fasilitas
                </span>
            </a>

            <!-- Tab 5: Menu Expanding Drawer Trigger (4 Kolom) -->
            <button type="button" 
                    id="mobile-menu-btn"
                    onclick="window.toggleMobileNavDrawer()"
                    aria-label="Buka Menu Lengkap" 
                    class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none text-slate-500 hover:text-slate-900">
                
                <div id="mobile-menu-btn-icon-wrapper"
                     class="relative flex items-center justify-center w-8 h-8 rounded-full transition-all duration-200 group-hover:bg-slate-100 text-slate-500">
                    
                    <!-- Ikon Menu (Saat Tertutup) -->
                    <svg id="mobile-menu-icon-closed" class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                    
                    <!-- Ikon Close Silang (Saat Terbuka) -->
                    <svg id="mobile-menu-icon-open" style="display: none;" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                    <span id="mobile-menu-dot" style="display: none;" class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                </div>
                
                <span id="mobile-menu-btn-label" class="text-[10px] font-heading font-bold tracking-tight mt-0.5 transition-colors text-slate-500">
                    Menu
                </span>
            </button>

        </div>
    </nav>
</div>

<!-- Script Mandiri & Tangguh: Selalu Berjalan Tanpa Ketergantungan Alpine/Framework -->
<script>
    (function() {
        window.openMobileNavDrawer = function() {
            const drawer = document.getElementById('mobile-menu-drawer');
            const backdrop = document.getElementById('mobile-menu-backdrop');
            const iconClosed = document.getElementById('mobile-menu-icon-closed');
            const iconOpen = document.getElementById('mobile-menu-icon-open');
            const dot = document.getElementById('mobile-menu-dot');
            const label = document.getElementById('mobile-menu-btn-label');
            const iconWrapper = document.getElementById('mobile-menu-btn-icon-wrapper');
            const btn = document.getElementById('mobile-menu-btn');

            if (!drawer || !backdrop) return;

            drawer.style.display = 'block';
            backdrop.style.display = 'block';
            drawer.classList.remove('pointer-events-none');
            backdrop.classList.remove('pointer-events-none');

            // Force reflow
            void drawer.offsetHeight;

            drawer.classList.remove('translate-y-full', 'opacity-0');
            drawer.classList.add('translate-y-0', 'opacity-100');
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');

            if (iconClosed) iconClosed.style.display = 'none';
            if (iconOpen) iconOpen.style.display = 'block';
            if (dot) dot.style.display = 'block';
            if (label) {
                label.textContent = 'Tutup';
                label.classList.add('text-red-600');
                label.classList.remove('text-slate-500');
            }
            if (iconWrapper) {
                iconWrapper.classList.add('bg-red-50', 'text-red-600', 'rotate-90', 'scale-105');
                iconWrapper.classList.remove('text-slate-500');
            }
            if (btn) {
                btn.classList.add('text-red-600');
                btn.classList.remove('text-slate-500');
            }
        };

        window.closeMobileNavDrawer = function() {
            const drawer = document.getElementById('mobile-menu-drawer');
            const backdrop = document.getElementById('mobile-menu-backdrop');
            const iconClosed = document.getElementById('mobile-menu-icon-closed');
            const iconOpen = document.getElementById('mobile-menu-icon-open');
            const dot = document.getElementById('mobile-menu-dot');
            const label = document.getElementById('mobile-menu-btn-label');
            const iconWrapper = document.getElementById('mobile-menu-btn-icon-wrapper');
            const btn = document.getElementById('mobile-menu-btn');

            if (!drawer || !backdrop) return;

            drawer.classList.remove('translate-y-0', 'opacity-100');
            drawer.classList.add('translate-y-full', 'opacity-0');
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            drawer.classList.add('pointer-events-none');
            backdrop.classList.add('pointer-events-none');

            setTimeout(() => {
                if (drawer.classList.contains('translate-y-full')) {
                    drawer.style.display = 'none';
                    backdrop.style.display = 'none';
                }
            }, 300);

            if (iconClosed) iconClosed.style.display = 'block';
            if (iconOpen) iconOpen.style.display = 'none';
            if (dot) dot.style.display = 'none';
            if (label) {
                label.textContent = 'Menu';
                label.classList.remove('text-red-600');
                label.classList.add('text-slate-500');
            }
            if (iconWrapper) {
                iconWrapper.classList.remove('bg-red-50', 'text-red-600', 'rotate-90', 'scale-105');
                iconWrapper.classList.add('text-slate-500');
            }
            if (btn) {
                btn.classList.remove('text-red-600');
                btn.classList.add('text-slate-500');
            }
        };

        window.toggleMobileNavDrawer = function() {
            const drawer = document.getElementById('mobile-menu-drawer');
            if (!drawer) return;
            const isOpen = drawer.classList.contains('translate-y-0');
            if (isOpen) {
                window.closeMobileNavDrawer();
            } else {
                window.openMobileNavDrawer();
            }
        };

        window.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.closeMobileNavDrawer();
            }
        });
    })();
</script>
