@php
    $isHome = request()->routeIs('home');
    $menuItems = [
        ['label' => 'Beranda', 'route' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'Tentang', 'route' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Prestasi', 'route' => route('achievements.index'), 'active' => request()->is('prestasi*') && !request()->is('berita*')],
        ['label' => 'Akademik', 'route' => route('academic.programs'), 'active' => request()->routeIs('academic.programs')],
        ['label' => 'Fasilitas', 'route' => route('academic.facilities'), 'active' => request()->routeIs('academic.facilities')],
        ['label' => 'Industri', 'route' => route('partnership.index'), 'active' => request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*')],
        ['label' => 'Alumni', 'route' => route('alumni.index'), 'active' => request()->is('alumni*')],
        ['label' => 'Galeri', 'route' => route('gallery.index'), 'active' => request()->is('galeri*')],
        ['label' => 'Publikasi', 'route' => route('news.index'), 'active' => request()->is('berita*') || request()->is('pengumuman*') || request()->is('unduhan*')],
    ];
@endphp

<nav x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false,
        scrolledPastHero: false,
        isHome: {{ $isHome ? 'true' : 'false' }},
        checkScroll() {
            this.scrolled = window.pageYOffset > 10;
            if (!this.isHome) {
                this.scrolledPastHero = true;
                return;
            }
            const hero = document.getElementById('hero-slider') || document.querySelector('[data-hero-slider]');
            if (hero) {
                const heroBottom = hero.getBoundingClientRect().bottom;
                // Navbar is 64px tall; if hero bottom is <= 64px, it has scrolled past the hero
                this.scrolledPastHero = heroBottom <= 64;
            } else {
                this.scrolledPastHero = window.pageYOffset > 600;
            }
        }
    }" 
    x-init="checkScroll()"
    @scroll.window.passive="checkScroll()"
    @resize.window.passive="checkScroll()"
    class="fixed top-0 w-full z-[100] transition-all duration-300 border-b"
    :class="{
        'bg-[#FBF8FC]/95 backdrop-blur-md border-[#E4E1E5] shadow-sm': scrolledPastHero || (!isHome && scrolled),
        'bg-[#FBF8FC]/90 backdrop-blur-md border-transparent': !isHome && !scrolled,
        'bg-charcoal-950/60 backdrop-blur-md border-white/10 shadow-sm': isHome && !scrolledPastHero && scrolled && !mobileMenuOpen,
        'bg-gradient-to-b from-black/80 via-black/40 to-transparent border-transparent': isHome && !scrolledPastHero && !scrolled && !mobileMenuOpen,
        'bg-white/95 backdrop-blur-md border-[#E4E1E5] shadow-md': mobileMenuOpen
    }">
    
    <div class="max-w-[1440px] mx-auto px-6 md:px-16 relative">
        <div class="flex justify-between items-center transition-all duration-300 h-[64px]">
            
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-4 group focus-ring outline-hidden">
                @if($logo = app(\App\Services\SettingsService::class)->get('site_logo'))
                    <div class="flex items-center gap-3">
                        <img src="{{ Storage::url($logo) }}" alt="{{ app(\App\Services\SettingsService::class)->get('site_name', 'TBSM') }}" class="h-10 w-auto">
                        <div class="font-heading font-extrabold text-[20px] leading-none uppercase transition-colors duration-300"
                             :class="(scrolledPastHero || !isHome || mobileMenuOpen) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                            {{ app(\App\Services\SettingsService::class)->get('site_short_name', 'TBSM') }}
                        </div>
                    </div>
                @else
                    <div class="font-heading font-extrabold text-[20px] leading-none uppercase transition-colors duration-300"
                         :class="(scrolledPastHero || !isHome || mobileMenuOpen) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                        {{ app(\App\Services\SettingsService::class)->get('site_name', 'TBSM') }}
                    </div>
                @endif
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-6 flex-grow justify-end">
                @foreach($menuItems as $item)
                    <a href="{{ $item['route'] }}" 
                       class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors duration-300"
                       :class="(scrolledPastHero || !isHome) 
                           ? '{{ $item['active'] ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}' 
                           : '{{ $item['active'] ? 'text-white font-bold drop-shadow-sm' : 'text-white/85 hover:text-white drop-shadow-sm' }}'">
                        {{ $item['label'] }}
                        <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ $item['active'] ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                @endforeach
                
                <a href="{{ route('contact.index') }}" class="px-5 py-2 ml-4 bg-figma-red text-white font-sans text-[14px] tracking-[-0.5px] uppercase rounded-[2px] hover:bg-figma-dark-red transition-colors focus-ring shadow-sm">
                    Hubungi Kami
                </a>
                
                {{-- Tombol Search Desktop (Disembunyikan Sementara) --}}
                {{--
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-figma-gray hover:text-figma-dark transition-colors focus-ring p-1 ml-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                --}}
            </div>

            <!-- Mobile Actions -->
            <div class="flex lg:hidden items-center space-x-2">
                {{-- Tombol Search Mobile (Disembunyikan Sementara) --}}
                {{--
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-figma-gray hover:text-figma-dark transition-colors focus-ring p-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                --}}
                
                <button type="button" 
                        aria-controls="mobile-navigation" 
                        :aria-expanded="mobileMenuOpen.toString()" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="inline-flex items-center justify-center p-2 rounded-lg transition-colors duration-300 focus-ring"
                        :class="(scrolledPastHero || !isHome || mobileMenuOpen) ? 'text-figma-dark hover:bg-gray-100' : 'text-white hover:bg-white/15 drop-shadow-sm'">
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
                @foreach($menuItems as $item)
                    <a href="{{ $item['route'] }}" 
                       class="px-6 py-3 font-sans text-[15px] font-medium {{ $item['active'] ? 'text-figma-red bg-red-50' : 'text-figma-gray hover:bg-gray-50' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                
                <div class="px-6 pt-3 pb-1 mt-2 border-t border-gray-100">
                    <a href="{{ route('contact.index') }}" class="block w-full text-center py-2.5 bg-figma-red text-white font-sans text-[14px] font-medium rounded-lg hover:bg-figma-dark-red transition-colors">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<x-global-search-modal />
