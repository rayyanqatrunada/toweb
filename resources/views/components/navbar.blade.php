<nav x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 10)"
    x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''" 
    class="fixed top-0 w-full z-[100] transition-all duration-300 bg-[#FBF8FC]/80 backdrop-blur-[6px] border-b-2"
    :class="scrolled ? 'border-[#E4E1E5] shadow-sm' : 'border-[#E4E1E5]'">
    
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        <div class="flex justify-between items-center transition-all duration-300 h-[64px]">
            
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-4 group focus-ring outline-none">
                <div class="font-heading font-extrabold text-[20px] text-figma-dark leading-none uppercase">
                    TBSM
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-6 flex-grow justify-end">
                <a href="{{ route('home') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->routeIs('home') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Beranda
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->routeIs('home') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                
                <a href="{{ route('about') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->routeIs('about') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Tentang
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->routeIs('about') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ route('academic.programs') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->is('akademik*') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Akademik
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->is('akademik*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ route('partnership.index') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Industri
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                
                <a href="{{ route('gallery.index') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->is('galeri*') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Galeri
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->is('galeri*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                
                <a href="{{ route('news.index') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('alumni*') || request()->is('unduhan*') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Publikasi
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('alumni*') || request()->is('unduhan*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                
                <a href="{{ route('contact.index') }}" class="px-5 py-2 ml-4 bg-figma-red text-white font-sans text-[14px] tracking-[-0.5px] uppercase rounded-[2px] hover:bg-figma-dark-red transition-colors focus-ring shadow-sm">Hubungi Kami</a>
                
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-figma-gray hover:text-figma-dark transition-colors focus-ring p-1 ml-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
            </div>

            <!-- Mobile Actions -->
            <div class="flex lg:hidden items-center space-x-4">
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-figma-gray hover:text-figma-dark transition-colors focus-ring p-1">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                
                <button type="button" aria-controls="mobile-navigation" :aria-expanded="mobileMenuOpen.toString()" @click="mobileMenuOpen = true" class="inline-flex items-center justify-center p-2 rounded-lg text-figma-dark hover:bg-gray-100 transition-colors focus-ring">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Panel -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         @keydown.escape.window="mobileMenuOpen = false"
         class="fixed inset-0 z-[100] bg-white flex flex-col w-full h-[100dvh] pointer-events-auto" 
         id="mobile-navigation" 
         role="dialog" 
         aria-modal="true" 
         style="display: none;">
        
        <div class="flex items-center justify-between px-6 h-16 border-b border-[#E4E1E5] shrink-0">
            <span class="font-heading font-extrabold text-lg text-figma-dark">MENU</span>
            <button type="button" @click="mobileMenuOpen = false" class="p-2 w-10 h-10 rounded-full bg-gray-50 text-figma-gray hover:bg-gray-100 hover:text-figma-dark focus-ring flex items-center justify-center transition-colors">
                <span class="sr-only">Tutup menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto px-6 py-6 space-y-6">
            <a href="{{ route('home') }}" class="block font-sans text-xl tracking-[-0.8px] uppercase {{ request()->routeIs('home') ? 'text-figma-dark font-bold' : 'text-figma-gray' }}">Beranda</a>
            <a href="{{ route('about') }}" class="block font-sans text-xl tracking-[-0.8px] uppercase {{ request()->routeIs('about') ? 'text-figma-dark font-bold' : 'text-figma-gray' }}">Tentang</a>
            <a href="{{ route('academic.programs') }}" class="block font-sans text-xl tracking-[-0.8px] uppercase {{ request()->is('akademik*') ? 'text-figma-dark font-bold' : 'text-figma-gray' }}">Akademik</a>
            <a href="{{ route('partnership.index') }}" class="block font-sans text-xl tracking-[-0.8px] uppercase {{ request()->is('mitra-industri*') || request()->is('pkl*') || request()->is('lowongan*') ? 'text-figma-dark font-bold' : 'text-figma-gray' }}">Industri</a>
            <a href="{{ route('gallery.index') }}" class="block font-sans text-xl tracking-[-0.8px] uppercase {{ request()->is('galeri*') ? 'text-figma-dark font-bold' : 'text-figma-gray' }}">Galeri</a>
            <a href="{{ route('news.index') }}" class="block font-sans text-xl tracking-[-0.8px] uppercase {{ request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('alumni*') || request()->is('unduhan*') ? 'text-figma-dark font-bold' : 'text-figma-gray' }}">Publikasi</a>
            
            <a href="{{ route('contact.index') }}" class="block text-center mt-8 px-6 py-3 bg-figma-red text-white font-sans text-lg uppercase rounded-[2px] hover:bg-figma-dark-red transition-colors">Hubungi Kami</a>
        </div>
    </div>
</nav>

<x-global-search-modal />
