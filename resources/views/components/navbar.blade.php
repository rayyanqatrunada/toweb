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
        'bg-charcoal-950/60 backdrop-blur-md border-white/10 shadow-sm': isHome && !scrolledPastHero && scrolled,
        'bg-gradient-to-b from-black/80 via-black/40 to-transparent border-transparent': isHome && !scrolledPastHero && !scrolled
    }">
    
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-16 relative">
        <div class="flex justify-between items-center transition-all duration-300 h-[56px] lg:h-[64px]">
            
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-3 sm:gap-4 group focus-ring outline-hidden">
                @if($logo = app(\App\Services\SettingsService::class)->get('site_logo'))
                    <div class="flex items-center gap-2.5 sm:gap-3">
                        <img src="{{ Storage::url($logo) }}" alt="{{ app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor') }}" class="h-8 sm:h-10 w-auto">
                        <div class="font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300"
                             :class="(scrolledPastHero || !isHome) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                            {{ app(\App\Services\SettingsService::class)->get('site_short_name', 'TSM') }}
                        </div>
                    </div>
                @else
                    <div class="font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300"
                         :class="(scrolledPastHero || !isHome) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
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

            <!-- Mobile Top Right Action: Tombol Hubungi Kami (Menggantikan Hamburger) -->
            <div class="flex lg:hidden items-center">
                <a href="{{ route('contact.index') }}" 
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-figma-red text-white font-heading font-bold text-[11.5px] uppercase tracking-wider rounded-lg hover:bg-figma-dark-red transition-all shadow-xs active:scale-95 focus:outline-none">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>

        </div>
    </div>
</nav>
