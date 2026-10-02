<?php
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
        // ['label' => 'Publikasi', 'route' => route('news.index'), 'active' => request()->is('berita*') || request()->is('pengumuman*') || request()->is('unduhan*')],
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
?>

<nav x-data="{ 
        scrolled: false,
        scrolledPastHero: false,
        isHome: <?php echo e($isHome ? 'true' : 'false'); ?>,
        homeDropdownOpen: false,
        isHovered: false,
        isPinned: false,
        suppressHover: false,
        hoverTimeout: null,
        activeSection: '',
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
        syncDropdownState() {
            this.homeDropdownOpen = this.isHome && (this.isPinned || this.isHovered);
        },
        onHoverEnter() {
            if (!this.isHome || this.suppressHover) return;
            clearTimeout(this.hoverTimeout);
            this.isHovered = true;
            this.syncDropdownState();
        },
        onHoverLeave(delay = 250) {
            if (!this.isHome) return;
            clearTimeout(this.hoverTimeout);
            this.hoverTimeout = setTimeout(() => {
                this.isHovered = false;
                this.suppressHover = false;
                this.syncDropdownState();
            }, delay);
        },
        togglePin() {
            if (!this.isHome) return;
            if (this.isPinned) {
                this.isPinned = false;
                this.isHovered = false;
                this.suppressHover = true;
                clearTimeout(this.hoverTimeout);
            } else {
                this.isPinned = true;
                this.isHovered = true;
                this.suppressHover = false;
                clearTimeout(this.hoverTimeout);
            }
            this.syncDropdownState();
        },
        scrollToSection(id) {
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
            if (!this.isPinned) {
                this.isHovered = false;
                this.syncDropdownState();
            }
        },
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            if (!this.isPinned) {
                this.isHovered = false;
                this.syncDropdownState();
            }
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
    class="fixed top-0 w-full z-[100] transition-colors duration-300 border-b"
    :class="{
        'bg-[#FBF8FC]/95 backdrop-blur-md border-[#E4E1E5] shadow-sm': scrolledPastHero || (!isHome && scrolled),
        'bg-[#FBF8FC]/90 backdrop-blur-md border-transparent': !isHome && !scrolled,
        'bg-charcoal-950/60 backdrop-blur-md border-white/10 shadow-sm': isHome && !scrolledPastHero && scrolled,
        'bg-gradient-to-b from-black/80 via-black/40 to-transparent border-transparent': isHome && !scrolledPastHero && !scrolled
    }">
    
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-16 relative z-20">
        <div class="flex justify-between items-center h-[56px] lg:h-[64px]">
            
            <!-- Logo Section -->
            <a href="<?php echo e(route('home')); ?>" class="shrink-0 flex items-center gap-3 sm:gap-4 group focus-ring outline-hidden">
                <?php
                    $rawLogo = app(\App\Services\SettingsService::class)->get('site_logo');
                    $logoUrl = null;
                    if (!empty($rawLogo)) {
                        if (str_starts_with($rawLogo, 'http://') || str_starts_with($rawLogo, 'https://')) {
                            $logoUrl = $rawLogo;
                        } elseif (file_exists(public_path($rawLogo))) {
                            $logoUrl = asset($rawLogo);
                        } else {
                            $logoUrl = Storage::url(ltrim(preg_replace('#^storage/#', '', $rawLogo), '/'));
                        }
                    } elseif (file_exists(public_path('logo.png'))) {
                        $logoUrl = asset('logo.png');
                    }
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($logoUrl): ?>
                    <div class="flex items-center gap-2.5 sm:gap-3">
                        <img src="<?php echo e($logoUrl); ?>" alt="<?php echo e(app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor')); ?>" class="h-8 sm:h-10 w-auto object-contain">
                        <div class="font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300"
                             :class="(scrolledPastHero || !isHome) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                            <?php echo e(app(\App\Services\SettingsService::class)->get('site_short_name', 'TSM')); ?>

                        </div>
                    </div>
                <?php else: ?>
                    <div class="font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300"
                         :class="(scrolledPastHero || !isHome) ? 'text-figma-dark' : 'text-white drop-shadow-sm'">
                        <?php echo e(app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-6 flex-grow justify-end h-full">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item['label'] === 'Beranda' && $isHome): ?>
                        <!-- Tombol Beranda Khusus Halaman Beranda (Dengan Fitur Hover & Pinned-Click Dropdown) -->
                        <div class="relative flex items-center h-full"
                             @mouseenter="onHoverEnter()"
                             @mouseleave="onHoverLeave(250)">
                            <button type="button" 
                                    @click="togglePin()"
                                    class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors duration-300 flex items-center gap-1.5 focus:outline-none cursor-pointer"
                                    :class="(scrolledPastHero || !isHome) 
                                        ? '<?php echo e($item['active'] ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark'); ?>' 
                                        : '<?php echo e($item['active'] ? 'text-white font-bold drop-shadow-sm' : 'text-white/85 hover:text-white drop-shadow-sm'); ?>'"
                                    aria-haspopup="true"
                                    :aria-expanded="homeDropdownOpen"
                                    :title="isPinned ? 'Sub-navigasi terkunci (Klik untuk menutup)' : 'Klik untuk mengunci sub-navigasi'">
                                <span class="relative inline-flex items-center">
                                    <?php echo e($item['label']); ?>

                                    <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red rounded-t-[1px] transition-all duration-300 <?php echo e($item['active'] ? 'w-full' : 'w-0 group-hover:w-full'); ?>"></span>
                                </span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] transform"
                                     :class="homeDropdownOpen ? 'rotate-180 text-figma-red' : ''"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e($item['route']); ?>" 
                           class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors duration-300"
                           :class="(scrolledPastHero || !isHome) 
                               ? '<?php echo e($item['active'] ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark'); ?>' 
                               : '<?php echo e($item['active'] ? 'text-white font-bold drop-shadow-sm' : 'text-white/85 hover:text-white drop-shadow-sm'); ?>'">
                            <?php echo e($item['label']); ?>

                            <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red rounded-t-[1px] transition-all duration-300 <?php echo e($item['active'] ? 'w-full' : 'w-0 group-hover:w-full'); ?>"></span>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                
                <a href="<?php echo e(route('contact.index')); ?>" class="px-5 py-2 ml-4 bg-figma-red text-white font-sans text-[14px] tracking-[-0.5px] uppercase rounded-[2px] hover:bg-figma-dark-red transition-colors focus-ring shadow-sm">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Top Right Action: Hubungi Kami -->
            <div class="flex lg:hidden items-center gap-2">
                <a href="<?php echo e(route('contact.index')); ?>" 
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-figma-red text-white font-heading font-bold text-[11.5px] uppercase tracking-wider rounded-[2px] hover:bg-figma-dark-red transition-all shadow-xs active:scale-95 focus:outline-none">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Dropdown Horizontal Turunan Beranda (Desktop Viewport - Centered & Hardware-Accelerated) -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isHome): ?>
    <div x-show="homeDropdownOpen"
         x-transition:enter="transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]"
         x-transition:enter-start="opacity-0 -translate-y-3"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @mouseenter="onHoverEnter()"
         @mouseleave="onHoverLeave(250)"
         class="absolute top-full left-0 w-full border-b transition-colors duration-300 hidden lg:block transform-gpu will-change-[transform,opacity] shadow-md z-10"
         :class="{
             'bg-[#FBF8FC] border-[#E4E1E5]': scrolledPastHero,
             'bg-charcoal-950/95 backdrop-blur-md border-white/10 shadow-2xl': !scrolledPastHero
         }"
         style="display: none;">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-16">
            <div class="flex items-center justify-center py-2 h-[48px]">
                
                <!-- Deretan Section Horizontal Terpusat (Centered) -->
                <div class="flex items-center justify-center gap-1.5 xl:gap-2.5 overflow-x-auto scrollbar-none py-0.5">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $homeSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button type="button"
                                @click="scrollToSection('<?php echo e($sec['id']); ?>')"
                                class="group flex items-center gap-2 px-3.5 py-1.5 rounded-[2px] transition-all duration-200 text-left shrink-0 cursor-pointer hover:scale-[1.02] active:scale-[0.98]"
                                :class="activeSection === '<?php echo e($sec['id']); ?>'
                                    ? 'bg-figma-red text-white shadow-xs font-bold'
                                    : (scrolledPastHero
                                        ? 'text-charcoal-700 hover:text-charcoal-950 hover:bg-charcoal-100 font-medium'
                                        : 'text-white/80 hover:text-white hover:bg-white/10 font-medium')">
                            <span class="font-mono text-[10.5px] font-bold transition-colors"
                                  :class="activeSection === '<?php echo e($sec['id']); ?>' ? 'text-white' : 'text-figma-red'">
                                <?php echo e($sec['num']); ?>

                            </span>
                            <span class="font-sans text-[12px] uppercase tracking-tight">
                                <?php echo e($sec['label']); ?>

                            </span>
                        </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</nav>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/navbar.blade.php ENDPATH**/ ?>