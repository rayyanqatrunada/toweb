<nav x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 10)"
    class="fixed top-0 w-full z-[100] transition-all duration-300 bg-[#FBF8FC]/90 backdrop-blur-md border-b"
    :class="scrolled ? 'border-[#E4E1E5] shadow-sm' : 'border-transparent'">
    
    <div class="max-w-[1440px] mx-auto px-6 md:px-16 relative">
        <div class="flex justify-between items-center transition-all duration-300 h-[64px]">
            
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-4 group focus-ring outline-none">
                @if($logo = app(\App\Services\SettingsService::class)->get('site_logo'))
                    <div class="flex items-center gap-3">
                        <img src="{{ Storage::url($logo) }}" alt="{{ app(\App\Services\SettingsService::class)->get('site_name', 'TBSM') }}" class="h-10 w-auto">
                        <div class="font-heading font-extrabold text-[20px] text-figma-dark leading-none uppercase">
                            TBSM
                        </div>
                    </div>
                @else
                    <div class="font-heading font-extrabold text-[20px] text-figma-dark leading-none uppercase">
                        {{ app(\App\Services\SettingsService::class)->get('site_name', 'TBSM') }}
                    </div>
                @endif
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

                <a href="{{ route('academic.programs') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->routeIs('academic.programs') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Akademik
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->routeIs('academic.programs') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ route('academic.facilities') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->routeIs('academic.facilities') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Fasilitas
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->routeIs('academic.facilities') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ route('partnership.index') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Industri
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                
                <a href="{{ route('alumni.index') }}" class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors {{ request()->is('alumni*') ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}">
                    Alumni
                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ request()->is('alumni*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
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
            <div class="flex lg:hidden items-center space-x-2">
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-figma-gray hover:text-figma-dark transition-colors focus-ring p-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                
                <button type="button" aria-controls="mobile-navigation" :aria-expanded="mobileMenuOpen.toString()" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-lg text-figma-dark hover:bg-gray-100 transition-colors focus-ring">
                    <span class="sr-only">Toggle menu</span>
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenuOpen" style="display: none;" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Compact Mobile Navigation Dropdown -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200 origin-top"
             x-transition:enter-start="opacity-0 scale-y-95 -translate-y-2"
             x-transition:enter-end="opacity-100 scale-y-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150 origin-top"
             x-transition:leave-start="opacity-100 scale-y-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-y-95 -translate-y-2"
             @click.away="mobileMenuOpen = false"
             @keydown.escape.window="mobileMenuOpen = false"
             class="absolute top-full left-0 right-0 mt-2 mx-4 z-[90] bg-white rounded-xl border border-[#E4E1E5] shadow-xl overflow-hidden lg:hidden" 
             id="mobile-navigation" 
             style="display: none;">
            
            <div class="flex flex-col py-3">
                <a href="{{ route('home') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->routeIs('home') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Beranda</a>
                <a href="{{ route('about') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->routeIs('about') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Tentang</a>
                <a href="{{ route('academic.programs') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->routeIs('academic.programs') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Akademik</a>
                <a href="{{ route('academic.facilities') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->routeIs('academic.facilities') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Fasilitas</a>
                <a href="{{ route('partnership.index') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->is('mitra-industri*') || request()->is('pkl*') || request()->is('lowongan*') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Industri</a>
                <a href="{{ route('alumni.index') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->is('alumni*') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Alumni</a>
                <a href="{{ route('gallery.index') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->is('galeri*') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Galeri</a>
                <a href="{{ route('news.index') }}" class="px-6 py-3 font-sans text-[15px] font-medium {{ request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('alumni*') || request()->is('unduhan*') ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">Publikasi</a>
                
                <div class="px-6 pt-3 pb-1 mt-2 border-t border-gray-100">
                    <a href="{{ route('contact.index') }}" class="block w-full text-center py-2.5 bg-figma-red text-white font-sans text-[14px] font-medium rounded-lg hover:bg-figma-dark-red transition-colors">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<x-global-search-modal />
