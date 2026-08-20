<nav x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 10)"
    x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''" 
    class="fixed top-0 w-full z-[100] transition-all duration-300 bg-white border-b-2"
    :class="scrolled ? 'border-charcoal-900 shadow-md' : 'border-charcoal-200'">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center transition-all duration-300" :class="scrolled ? 'h-16' : 'h-20'">
            
            <!-- Logo Section (Mimicking the MOUNTBLACK style) -->
            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-4 group focus-ring outline-none">
                <!-- Icon -->
                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-charcoal-900 flex items-center justify-center text-white font-black text-lg lg:text-xl transform group-hover:scale-105 transition-transform duration-300">
                    TO
                </div>
                <!-- Text -->
                <div class="flex flex-col justify-center">
                    <div class="text-xl lg:text-2xl text-charcoal-900 tracking-tight leading-none uppercase">
                        <span class="font-black">TEKNIK</span><span class="font-light">OTOMOTIF</span>
                    </div>
                    <span class="text-[10px] lg:text-xs font-medium text-charcoal-400 mt-1 transition-colors group-hover:text-charcoal-600">
                        Sekolah Menengah Kejuruan Vokasi
                    </span>
                </div>
            </a>

            <!-- Desktop Menu (Uppercase, clean text links) -->
            <div class="hidden lg:flex lg:items-center lg:space-x-8 lg:justify-end flex-grow ml-8">
                <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-wider transition-colors {{ request()->routeIs('home') ? 'text-charcoal-900' : 'text-charcoal-500 hover:text-charcoal-900' }}">Beranda</a>
                
                <a href="{{ route('about') }}" class="text-xs font-bold uppercase tracking-wider transition-colors {{ request()->routeIs('about') ? 'text-charcoal-900' : 'text-charcoal-500 hover:text-charcoal-900' }}">Tentang</a>

                <!-- Akademik Link -->
                <a href="{{ route('academic.programs') }}" class="text-xs font-bold uppercase tracking-wider transition-colors {{ request()->is('akademik*') ? 'text-charcoal-900' : 'text-charcoal-500 hover:text-charcoal-900' }}">Akademik</a>

                <!-- Industri Link -->
                <a href="{{ route('partnership.index') }}" class="text-xs font-bold uppercase tracking-wider transition-colors {{ request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*') ? 'text-charcoal-900' : 'text-charcoal-500 hover:text-charcoal-900' }}">Industri</a>
                
                <!-- Publikasi Link -->
                <a href="{{ route('news.index') }}" class="text-xs font-bold uppercase tracking-wider transition-colors {{ request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('galeri*') || request()->is('alumni*') || request()->is('unduhan*') ? 'text-charcoal-900' : 'text-charcoal-500 hover:text-charcoal-900' }}">Publikasi</a>
            </div>

            <!-- Right Actions (Search Icon) -->
            <div class="flex items-center space-x-4 ml-6">
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-charcoal-500 hover:text-charcoal-900 transition-colors focus-ring p-1">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                
                <!-- Mobile Menu Toggle Button -->
                <div class="flex lg:hidden">
                    <button type="button" aria-controls="mobile-navigation" :aria-expanded="mobileMenuOpen.toString()" @click="mobileMenuOpen = true" class="inline-flex items-center justify-center p-2 rounded-lg text-charcoal-600 hover:bg-charcoal-100 transition-colors focus-ring">
                        <span class="sr-only">Buka menu utama</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Panel (Full Screen) -->
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
        
        <!-- Mobile Nav Header -->
        <div class="flex items-center justify-between px-6 h-16 border-b border-charcoal-100 shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-charcoal-900 flex items-center justify-center text-white font-black text-sm">TO</div>
                <span class="font-black text-lg text-charcoal-900 tracking-tight">MENU</span>
            </div>
            <button type="button" @click="mobileMenuOpen = false" class="p-2 w-10 h-10 rounded-full bg-charcoal-50 text-charcoal-500 hover:bg-charcoal-100 hover:text-charcoal-900 focus-ring flex items-center justify-center transition-colors">
                <span class="sr-only">Tutup menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Mobile Nav Content (Scrollable) -->
        <div class="flex-1 overflow-y-auto px-6 py-6 space-y-6">
            
            <a href="{{ route('home') }}" class="block text-xl font-bold uppercase tracking-wider {{ request()->routeIs('home') ? 'text-charcoal-900' : 'text-charcoal-500' }}">Beranda</a>
            <a href="{{ route('about') }}" class="block text-xl font-bold uppercase tracking-wider {{ request()->routeIs('about') ? 'text-charcoal-900' : 'text-charcoal-500' }}">Tentang</a>
            
            <a href="{{ route('academic.programs') }}" class="block text-xl font-bold uppercase tracking-wider {{ request()->is('akademik*') ? 'text-charcoal-900' : 'text-charcoal-500' }}">Akademik</a>
            
            <a href="{{ route('partnership.index') }}" class="block text-xl font-bold uppercase tracking-wider {{ request()->is('mitra-industri*') || request()->is('pkl*') || request()->is('lowongan*') ? 'text-charcoal-900' : 'text-charcoal-500' }}">Industri</a>
            
            <a href="{{ route('news.index') }}" class="block text-xl font-bold uppercase tracking-wider {{ request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('galeri*') || request()->is('alumni*') || request()->is('unduhan*') ? 'text-charcoal-900' : 'text-charcoal-500' }}">Publikasi</a>
            
        </div>
        
    </div>
</nav>

<x-global-search-modal />
