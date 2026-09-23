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
        ['label' => 'Publikasi', 'route' => route('news.index'), 'active' => request()->is('berita*') || request()->is('pengumuman*') || request()->is('unduhan*')],
    ];
?>

<style>
    @media (max-width: 1023px) {
        #main-top-navbar {
            background-color: #ffffff !important;
            background: #ffffff !important;
            border-bottom: 1px solid #e2e8f0 !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
        }
        #main-top-navbar .site-brand-text {
            color: #0f172a !important;
            text-shadow: none !important;
        }
    }
</style>

<nav id="main-top-navbar"
    x-data="{ 
        scrolled: false,
        scrolledPastHero: false,
        isHome: <?php echo e($isHome ? 'true' : 'false'); ?>,
        checkScroll() {
            this.scrolled = window.pageYOffset > 10;
            if (!this.isHome) {
                this.scrolledPastHero = true;
                return;
            }
            const hero = document.getElementById('hero-slider') || document.querySelector('[data-hero-slider]');
            if (hero) {
                const heroBottom = hero.getBoundingClientRect().bottom;
                this.scrolledPastHero = heroBottom <= 64;
            } else {
                this.scrolledPastHero = window.pageYOffset > 600;
            }
        }
    }" 
    x-init="checkScroll()"
    @scroll.window.passive="checkScroll()"
    @resize.window.passive="checkScroll()"
    class="fixed top-0 w-full z-[80] transition-all duration-300 border-b bg-white border-slate-200/80 shadow-xs lg:shadow-none"
    :class="{
        'lg:bg-[#FBF8FC]/95 lg:backdrop-blur-md lg:border-[#E4E1E5] lg:shadow-sm': scrolledPastHero || (!isHome && scrolled),
        'lg:bg-[#FBF8FC]/90 lg:backdrop-blur-md lg:border-transparent': !isHome && !scrolled,
        'lg:bg-charcoal-950/60 lg:backdrop-blur-md lg:border-white/10 lg:shadow-sm': isHome && !scrolledPastHero && scrolled,
        'lg:bg-gradient-to-b lg:from-black/80 lg:via-black/40 lg:to-transparent lg:border-transparent': isHome && !scrolledPastHero && !scrolled
    }">
    
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-16 relative">
        <div class="flex justify-between items-center transition-all duration-300 h-[56px] lg:h-[64px]">
            
            <!-- Logo Section -->
            <a href="<?php echo e(route('home')); ?>" class="shrink-0 flex items-center gap-3 sm:gap-4 group focus-ring outline-hidden">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($logo = app(\App\Services\SettingsService::class)->get('site_logo')): ?>
                    <div class="flex items-center gap-2.5 sm:gap-3">
                        <img src="<?php echo e(Storage::url($logo)); ?>" alt="<?php echo e(app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor')); ?>" class="h-8 sm:h-10 w-auto">
                        <div class="site-brand-text font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300 text-figma-dark"
                             :class="{
                                 'lg:text-white lg:drop-shadow-sm': isHome && !scrolledPastHero,
                                 'lg:text-figma-dark': !isHome || scrolledPastHero
                             }">
                            <?php echo e(app(\App\Services\SettingsService::class)->get('site_short_name', 'TSM')); ?>

                        </div>
                    </div>
                <?php else: ?>
                    <div class="site-brand-text font-heading font-extrabold text-[17px] sm:text-[20px] leading-none uppercase transition-colors duration-300 text-figma-dark"
                         :class="{
                             'lg:text-white lg:drop-shadow-sm': isHome && !scrolledPastHero,
                             'lg:text-figma-dark': !isHome || scrolledPastHero
                         }">
                        <?php echo e(app(\App\Services\SettingsService::class)->get('site_name', 'Teknik Sepeda Motor')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-6 flex-grow justify-end">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e($item['route']); ?>" 
                       class="relative group font-sans text-[14px] tracking-[-0.5px] uppercase transition-colors duration-300"
                       :class="(scrolledPastHero || !isHome) 
                           ? '<?php echo e($item['active'] ? 'text-figma-dark font-bold' : 'text-figma-gray hover:text-figma-dark'); ?>' 
                           : '<?php echo e($item['active'] ? 'text-white font-bold drop-shadow-sm' : 'text-white/85 hover:text-white drop-shadow-sm'); ?>'">
                        <?php echo e($item['label']); ?>

                        <span class="absolute -bottom-[22px] left-0 h-[3px] bg-figma-red transition-all duration-300 <?php echo e($item['active'] ? 'w-full' : 'w-0 group-hover:w-full'); ?>"></span>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                
                <a href="<?php echo e(route('contact.index')); ?>" class="px-5 py-2 ml-4 bg-figma-red text-white font-sans text-[14px] tracking-[-0.5px] uppercase rounded-[2px] hover:bg-figma-dark-red transition-colors focus-ring shadow-sm">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Top Right Action: Tombol Hubungi Kami (Menggantikan Hamburger) -->
            <div class="flex lg:hidden items-center">
                <a href="<?php echo e(route('contact.index')); ?>" 
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
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/navbar.blade.php ENDPATH**/ ?>