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
    @toggle-mobile-menu.window="mobileMenuOpen = !mobileMenuOpen"
    class="fixed top-0 w-full z-[100] transition-all duration-300 border-b"
    :class="{
        'bg-[#FBF8FC]/95 backdrop-blur-md border-[#E4E1E5] shadow-sm': scrolledPastHero || (!isHome && scrolled),
        'bg-[#FBF8FC]/90 backdrop-blur-md border-transparent': !isHome && !scrolled,
        'bg-charcoal-950/60 backdrop-blur-md border-white/10 shadow-sm': isHome && !scrolledPastHero && scrolled && !mobileMenuOpen,
        'bg-gradient-to-b from-black/80 via-black/40 to-transparent border-transparent': isHome && !scrolledPastHero && !scrolled && !mobileMenuOpen,
        'bg-white/95 backdrop-blur-md border-[#E4E1E5] shadow-md': mobileMenuOpen
    }">
    
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-16 relative">
        <div class="flex justify-between items-center transition-all duration-300 h-[56px] lg:h-[64px]">
            
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-3 sm:gap-4 group focus-ring outline-hidden">
                @if($logo = app(\App\Services\SettingsService::class)->get('site_logo'))
                    <div class="flex items-center gap-2.5 sm:gap-3">
                        <img src="{{ Storage::url($logo) }}" alt="{{ app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor') }}" class="h-8 sm:h-10 w-auto">
                        <div class="font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300"
                             :class="(scrolledPastHero || !isHome || mobileMenuOpen) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                            {{ app(\App\Services\SettingsService::class)->get('site_short_name', 'TSM') }}
                        </div>
                    </div>
                @else
                    <div class="font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300"
                         :class="(scrolledPastHero || !isHome || mobileMenuOpen) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                        {{ app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor') }}
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
            </div>

            <!-- Mobile Actions -->
            <div class="flex lg:hidden items-center space-x-1.5">
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

        <!-- Backdrop Scrim for Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileMenuOpen = false" 
             class="fixed inset-0 bg-black/50 backdrop-blur-xs z-[85] lg:hidden"
             style="display: none;"></div>

        <!-- Compact Mobile Navigation Dropdown -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-250 origin-top"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-3"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150 origin-top"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-3"
             @click.away="mobileMenuOpen = false"
             @keydown.escape.window="mobileMenuOpen = false"
             class="absolute top-full left-0 right-0 mt-2 mx-3 sm:mx-6 z-[95] bg-white rounded-2xl border border-[#E4E1E5] shadow-2xl overflow-hidden max-h-[calc(100vh-84px)] overflow-y-auto lg:hidden" 
             id="mobile-navigation" 
             style="display: none;">
            
            <!-- App-Like Menu Header -->
            <div class="px-5 py-3 bg-slate-50/90 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                    <span class="text-xs font-heading font-black tracking-wider uppercase text-slate-800">Menu Navigasi</span>
                </div>
                <button type="button" @click="mobileMenuOpen = false" class="p-1 text-slate-400 hover:text-slate-700 rounded-lg active:scale-95" aria-label="Tutup Menu">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <div class="flex flex-col py-2 divide-y divide-gray-100/70">
                <div class="py-1">
                    @foreach($menuItems as $item)
                        <a href="{{ $item['route'] }}" 
                           class="flex items-center justify-between px-5 py-3 font-sans text-[15px] transition-colors rounded-lg mx-2 {{ $item['active'] ? 'text-figma-red bg-red-50/80 font-bold' : 'text-figma-dark hover:bg-gray-50 font-medium' }}">
                            <span class="flex items-center gap-3">
                                @if($item['active'])
                                    <span class="w-1.5 h-1.5 rounded-full bg-figma-red"></span>
                                @endif
                                {{ $item['label'] }}
                            </span>
                            <svg class="w-4 h-4 {{ $item['active'] ? 'text-figma-red' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    @endforeach
                </div>
                
                <div class="p-4 bg-gray-50/80">
                    <a href="{{ route('contact.index') }}" class="flex items-center justify-center gap-2 w-full text-center py-3 bg-figma-red text-white font-sans text-[14px] font-bold uppercase tracking-wider rounded-xl hover:bg-figma-dark-red transition-all shadow-md shadow-figma-red/20 active:scale-[0.98]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
