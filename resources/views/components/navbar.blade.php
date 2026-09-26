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

    $homeSections = [
        ['id' => 'section-profil', 'num' => '01', 'label' => 'Profil', 'title' => 'Profil Jurusan', 'desc' => 'Visi & filosofi kompetensi vokasi'],
        ['id' => 'section-keunggulan', 'num' => '02', 'label' => 'Keunggulan', 'title' => 'Keunggulan TBSM', 'desc' => 'Standar industri AHASS & budaya 5S'],
        ['id' => 'section-program', 'num' => '03', 'label' => 'Program', 'title' => 'Program Keahlian', 'desc' => 'Kurikulum modern & spesialisasi teknis'],
        ['id' => 'section-fasilitas', 'num' => '04', 'label' => 'Fasilitas', 'title' => 'Fasilitas Bengkel', 'desc' => 'Laboratorium & sarana praktik lengkap'],
        ['id' => 'section-kemitraan', 'num' => '05', 'label' => 'Industri', 'title' => 'Mitra Industri', 'desc' => 'Sinergi PT Astra Honda Motor & DUDI'],
        ['id' => 'section-prestasi', 'num' => '06', 'label' => 'Prestasi', 'title' => 'Prestasi Siswa', 'desc' => 'Pencapaian ajang juara LKS & lomba'],
        ['id' => 'section-guru', 'num' => '07', 'label' => 'Instruktur', 'title' => 'Dewan Guru', 'desc' => 'Tim pendidik & instruktur tersertifikasi'],
    ];
@endphp

<nav x-data="{ 
        scrolled: false,
        scrolledPastHero: false,
        isHome: {{ $isHome ? 'true' : 'false' }},
        homeDropdownOpen: false,
        mobileHomeDropdownOpen: false,
        activeSection: '',
        hoverTimeout: null,
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
        },
        openHomeDropdown() {
            if (!this.isHome) return;
            clearTimeout(this.hoverTimeout);
            this.homeDropdownOpen = true;
        },
        closeHomeDropdown(delay = 200) {
            if (!this.isHome) return;
            clearTimeout(this.hoverTimeout);
            if (delay === 0) {
                this.homeDropdownOpen = false;
            } else {
                this.hoverTimeout = setTimeout(() => {
                    this.homeDropdownOpen = false;
                }, delay);
            }
        },
        toggleHomeDropdown() {
            if (!this.isHome) return;
            this.homeDropdownOpen = !this.homeDropdownOpen;
        },
        scrollToSection(id) {
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
            this.homeDropdownOpen = false;
            this.mobileHomeDropdownOpen = false;
        },
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            this.homeDropdownOpen = false;
            this.mobileHomeDropdownOpen = false;
        },
        initScrollspy() {
            if (!this.isHome) return;
            const sectionIds = ['section-profil', 'section-keunggulan', 'section-program', 'section-fasilitas', 'section-kemitraan', 'section-prestasi', 'section-guru'];
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.activeSection = entry.target.id;
                    }
                });
            }, {
                root: null,
                rootMargin: '-20% 0px -60% 0px',
                threshold: 0.05
            });

            sectionIds.forEach(id => {
                const el = document.getElementById(id);
                if (el) observer.observe(el);
            });
        }
    }" 
    x-init="checkScroll(); initScrollspy();"
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
                    @if($item['label'] === 'Beranda' && $isHome)
                        <!-- Tombol Beranda Khusus Halaman Beranda (Dengan Fitur Hover/Click Dropdown Horizontal) -->
                        <div class="relative flex items-center"
                             @mouseenter="openHomeDropdown()"
                             @mouseleave="closeHomeDropdown(250)">
                            <button type="button" 
                                    @click="toggleHomeDropdown()"
                                    class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors duration-300 flex items-center gap-1.5 focus:outline-none cursor-pointer py-1"
                                    :class="(scrolledPastHero || !isHome) 
                                        ? '{{ $item['active'] ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}' 
                                        : '{{ $item['active'] ? 'text-white font-bold drop-shadow-sm' : 'text-white/85 hover:text-white drop-shadow-sm' }}'"
                                    aria-haspopup="true"
                                    :aria-expanded="homeDropdownOpen">
                                <span>{{ $item['label'] }}</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 transform"
                                     :class="homeDropdownOpen ? 'rotate-180 text-figma-red' : ''"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/>
                                </svg>
                                <span class="absolute -bottom-[21px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ $item['active'] ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </button>
                        </div>
                    @else
                        <a href="{{ $item['route'] }}" 
                           class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors duration-300"
                           :class="(scrolledPastHero || !isHome) 
                               ? '{{ $item['active'] ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark' }}' 
                               : '{{ $item['active'] ? 'text-white font-bold drop-shadow-sm' : 'text-white/85 hover:text-white drop-shadow-sm' }}'">
                            {{ $item['label'] }}
                            <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 {{ $item['active'] ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                        </a>
                    @endif
                @endforeach
                
                <a href="{{ route('contact.index') }}" class="px-5 py-2 ml-4 bg-figma-red text-white font-sans text-[14px] tracking-[-0.5px] uppercase rounded-[2px] hover:bg-figma-dark-red transition-colors focus-ring shadow-sm">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Top Right Action: Tombol Bagian (Beranda) & Hubungi Kami -->
            <div class="flex lg:hidden items-center gap-2">
                @if($isHome)
                    <button type="button"
                            @click="mobileHomeDropdownOpen = !mobileHomeDropdownOpen"
                            class="inline-flex items-center gap-1.5 px-2.5 py-1.5 font-heading font-bold text-[11px] uppercase tracking-wider rounded-[2px] transition-all border focus:outline-none active:scale-95 cursor-pointer"
                            :class="scrolledPastHero 
                                ? 'bg-white text-figma-dark border-[#E4E1E5] hover:bg-charcoal-50' 
                                : 'bg-white/10 text-white border-white/20 hover:bg-white/20 backdrop-blur-sm'">
                        <span class="w-1.5 h-1.5 rounded-full bg-figma-red animate-pulse"></span>
                        <span>Bagian</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="mobileHomeDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                @endif

                <a href="{{ route('contact.index') }}" 
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-figma-red text-white font-heading font-bold text-[11.5px] uppercase tracking-wider rounded-[2px] hover:bg-figma-dark-red transition-all shadow-xs active:scale-95 focus:outline-none">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Dropdown Horizontal Turunan Beranda (Desktop Viewport) -->
    @if($isHome)
    <div x-show="homeDropdownOpen"
         x-transition:enter="transition-all ease-out duration-250"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition-all ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @mouseenter="openHomeDropdown()"
         @mouseleave="closeHomeDropdown(200)"
         class="w-full border-t border-b transition-colors duration-300 hidden lg:block"
         :class="{
             'bg-[#FBF8FC]/98 backdrop-blur-md border-[#E4E1E5] shadow-lg': scrolledPastHero,
             'bg-charcoal-950/95 backdrop-blur-md border-white/10 shadow-2xl': !scrolledPastHero
         }"
         style="display: none;">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-16">
            <div class="flex items-center justify-between py-2 h-[48px]">
                
                <!-- Badge Penanda Sub-Navigasi -->
                <div class="flex items-center gap-2 pr-4 border-r shrink-0"
                     :class="scrolledPastHero ? 'border-[#E4E1E5] text-charcoal-600' : 'border-white/15 text-white/70'">
                    <span class="w-1.5 h-1.5 rounded-full bg-figma-red animate-pulse"></span>
                    <span class="font-heading font-extrabold text-[11px] uppercase tracking-widest">Bagian Beranda</span>
                </div>

                <!-- Deretan Section Horizontal -->
                <div class="flex items-center gap-1 xl:gap-2 flex-grow justify-start pl-3 xl:pl-4 overflow-x-auto scrollbar-none">
                    @foreach($homeSections as $sec)
                        <button type="button"
                                @click="scrollToSection('{{ $sec['id'] }}')"
                                class="group flex items-center gap-2 px-3 py-1.5 rounded-[2px] transition-all duration-200 text-left shrink-0 cursor-pointer"
                                :class="activeSection === '{{ $sec['id'] }}'
                                    ? 'bg-figma-red text-white shadow-xs'
                                    : (scrolledPastHero
                                        ? 'text-charcoal-700 hover:text-charcoal-950 hover:bg-charcoal-100'
                                        : 'text-white/80 hover:text-white hover:bg-white/10')">
                            <span class="font-mono text-[10px] font-bold opacity-75"
                                  :class="activeSection === '{{ $sec['id'] }}' ? 'text-white' : 'text-figma-red'">
                                {{ $sec['num'] }}
                            </span>
                            <span class="font-sans font-bold text-[12px] uppercase tracking-tight">
                                {{ $sec['label'] }}
                            </span>
                        </button>
                    @endforeach
                </div>

                <!-- Tombol Kembali ke Atas (Hero) & Tutup -->
                <div class="flex items-center gap-1.5 pl-3 border-l shrink-0"
                     :class="scrolledPastHero ? 'border-[#E4E1E5]' : 'border-white/15'">
                    <button type="button"
                            @click="scrollToTop()"
                            class="flex items-center gap-1 px-2.5 py-1 text-[11px] font-heading font-bold uppercase tracking-wider rounded-[2px] transition-colors cursor-pointer"
                            :class="scrolledPastHero ? 'text-charcoal-500 hover:text-figma-red hover:bg-charcoal-100' : 'text-white/70 hover:text-white hover:bg-white/10'"
                            title="Kembali ke Bagian Paling Atas">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                        <span>Top</span>
                    </button>
                    <button type="button"
                            @click="closeHomeDropdown(0)"
                            class="flex items-center justify-center w-7 h-7 rounded-[2px] transition-colors cursor-pointer"
                            :class="scrolledPastHero ? 'text-charcoal-400 hover:text-charcoal-800 hover:bg-charcoal-100' : 'text-white/60 hover:text-white hover:bg-white/10'"
                            title="Tutup Sub-Navigasi">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Mobile Vertical Dropdown Menu (Dari Navbar Atas) -->
    <div x-show="mobileHomeDropdownOpen"
         x-transition:enter="transition-all ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition-all ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.outside="mobileHomeDropdownOpen = false"
         class="lg:hidden border-t border-[#E4E1E5] bg-white shadow-2xl px-4 py-3 max-h-[75vh] overflow-y-auto"
         style="display: none;">
        <div class="flex items-center justify-between pb-2 mb-2 border-b border-charcoal-100">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-figma-red animate-pulse"></span>
                <span class="font-heading font-extrabold text-[11px] uppercase tracking-wider text-charcoal-900">Pilih Bagian Beranda</span>
            </div>
            <button type="button" @click="mobileHomeDropdownOpen = false" class="text-charcoal-400 p-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="flex flex-col gap-1">
            @foreach($homeSections as $sec)
                <button type="button"
                        @click="scrollToSection('{{ $sec['id'] }}')"
                        class="flex items-center justify-between p-2.5 rounded-[2px] transition-colors text-left"
                        :class="activeSection === '{{ $sec['id'] }}' ? 'bg-figma-red/10 text-figma-red font-bold' : 'hover:bg-charcoal-50 text-charcoal-800'">
                    <div class="flex items-center gap-2.5">
                        <span class="font-mono text-xs font-bold text-figma-red">{{ $sec['num'] }}</span>
                        <div>
                            <div class="font-heading font-bold text-[13px] uppercase tracking-tight">{{ $sec['title'] }}</div>
                            <div class="text-[11px] text-charcoal-500 font-normal leading-tight">{{ $sec['desc'] }}</div>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-charcoal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            @endforeach

            <!-- Action Ke Paling Atas -->
            <button type="button"
                    @click="scrollToTop()"
                    class="flex items-center justify-center gap-2 mt-2 p-2.5 rounded-[2px] bg-charcoal-100 hover:bg-charcoal-200 text-charcoal-800 text-xs font-heading font-bold uppercase tracking-wider transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                <span>Kembali ke Atas (Hero)</span>
            </button>
        </div>
    </div>
    @endif
</nav>
