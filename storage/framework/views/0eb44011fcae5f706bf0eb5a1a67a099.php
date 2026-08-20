<nav x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''" 
    :class="{
        'bg-white/95 backdrop-blur-md shadow-sm border-b border-charcoal-100': scrolled,
        'bg-white border-b border-transparent': !scrolled && !mobileMenuOpen,
        'bg-white': mobileMenuOpen
    }"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-20">
            <!-- Logo Section -->
            <a href="<?php echo e(route('home')); ?>" class="flex-shrink-0 flex items-center gap-3 group focus-ring rounded-lg py-1 px-1 -ml-1">
                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-primary-600 rounded-lg flex items-center justify-center text-white font-extrabold text-lg lg:text-xl shadow-inner group-hover:bg-primary-700 transition-colors">
                    <span class="sr-only">Logo</span>
                    TO
                </div>
                <div class="flex flex-col">
                    <span class="font-black text-lg lg:text-xl text-charcoal-900 tracking-tight leading-none group-hover:text-primary-700 transition-colors"><?php echo e($settings->get('site_name', 'Teknik Otomotif')); ?></span>
                    <span class="text-[10px] lg:text-xs font-semibold text-charcoal-500 uppercase tracking-widest mt-0.5">Sekolah Vokasi</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-1">
                <a href="<?php echo e(route('home')); ?>" class="px-3 py-2 rounded-md text-sm font-semibold transition-colors <?php echo e(request()->routeIs('home') ? 'text-primary-700 bg-primary-50' : 'text-charcoal-700 hover:text-primary-600 hover:bg-charcoal-50'); ?>">Beranda</a>
                
                <a href="<?php echo e(route('about')); ?>" class="px-3 py-2 rounded-md text-sm font-semibold transition-colors <?php echo e(request()->routeIs('about') ? 'text-primary-700 bg-primary-50' : 'text-charcoal-700 hover:text-primary-600 hover:bg-charcoal-50'); ?>">Tentang</a>

                <!-- Akademik Dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative inline-block text-left" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" type="button" class="inline-flex items-center px-3 py-2 rounded-md text-sm font-semibold transition-colors <?php echo e(request()->is('akademik*') ? 'text-primary-700 bg-primary-50' : 'text-charcoal-700 hover:text-primary-600 hover:bg-charcoal-50'); ?>" :aria-expanded="open.toString()">
                        Akademik
                        <svg class="ml-1 h-4 w-4 opacity-70 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute z-50 left-0 mt-1 w-56 rounded-xl shadow-lg bg-white ring-1 ring-charcoal-200 p-1.5 focus:outline-none" style="display: none;">
                        <a href="<?php echo e(route('academic.programs')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('academic.programs') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Program & Kompetensi</a>
                        <a href="<?php echo e(route('academic.teachers')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('academic.teachers') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Guru & Staf</a>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('academic.facilities') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Fasilitas Bengkel</a>
                    </div>
                </div>

                <!-- Industri Dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative inline-block text-left" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" type="button" class="inline-flex items-center px-3 py-2 rounded-md text-sm font-semibold transition-colors <?php echo e(request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*') ? 'text-primary-700 bg-primary-50' : 'text-charcoal-700 hover:text-primary-600 hover:bg-charcoal-50'); ?>" :aria-expanded="open.toString()">
                        Industri
                        <svg class="ml-1 h-4 w-4 opacity-70 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute z-50 left-0 mt-1 w-56 rounded-xl shadow-lg bg-white ring-1 ring-charcoal-200 p-1.5" style="display: none;">
                        <a href="<?php echo e(route('partnership.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('partnership.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Mitra Industri</a>
                        <a href="<?php echo e(route('internships.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('internships.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Praktik Kerja Lapangan</a>
                        <a href="<?php echo e(route('jobs.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('jobs.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Lowongan Kerja (BKK)</a>
                    </div>
                </div>
                
                <!-- Informasi Dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative inline-block text-left" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" type="button" class="inline-flex items-center px-3 py-2 rounded-md text-sm font-semibold transition-colors <?php echo e(request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('galeri*') || request()->is('alumni*') || request()->is('unduhan*') ? 'text-primary-700 bg-primary-50' : 'text-charcoal-700 hover:text-primary-600 hover:bg-charcoal-50'); ?>" :aria-expanded="open.toString()">
                        Informasi
                        <svg class="ml-1 h-4 w-4 opacity-70 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute z-50 left-0 mt-1 w-48 rounded-xl shadow-lg bg-white ring-1 ring-charcoal-200 p-1.5" style="display: none;">
                        <a href="<?php echo e(route('news.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('news.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Berita</a>
                        <a href="<?php echo e(route('announcements.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('announcements.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Pengumuman</a>
                        <a href="<?php echo e(route('achievements.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('achievements.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Prestasi</a>
                        <a href="<?php echo e(route('gallery.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('gallery.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Galeri</a>
                        <div class="h-px bg-charcoal-100 my-1 mx-2"></div>
                        <a href="<?php echo e(route('alumni.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('alumni.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Alumni</a>
                        <a href="<?php echo e(route('download.index')); ?>" class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('download.*') ? 'bg-primary-50 text-primary-700' : 'text-charcoal-700 hover:bg-charcoal-50 hover:text-primary-600'); ?>">Unduhan</a>
                    </div>
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-3">
                <button type="button" @click="$dispatch('open-search')" aria-label="Search" class="text-charcoal-500 hover:text-primary-600 p-2 min-w-[44px] min-h-[44px] flex items-center justify-center rounded-full transition-colors focus-ring">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>

                <div class="hidden sm:block">
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => '/admin','variant' => 'primary','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin','variant' => 'primary','size' => 'sm']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Masuk Portal
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $attributes = $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $component = $__componentOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
                </div>
                
                <!-- Mobile Menu Toggle Button -->
                <div class="flex lg:hidden">
                    <button type="button" aria-controls="mobile-navigation" :aria-expanded="mobileMenuOpen.toString()" @click="mobileMenuOpen = true" class="inline-flex items-center justify-center p-2 min-w-[44px] min-h-[44px] rounded-lg text-charcoal-700 hover:bg-charcoal-100 transition-colors focus-ring">
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
         class="fixed inset-0 z-[100] bg-white flex flex-col w-full h-[100dvh]" 
         id="mobile-navigation" 
         role="dialog" 
         aria-modal="true" 
         style="display: none;">
        
        <!-- Mobile Nav Header -->
        <div class="flex items-center justify-between px-4 h-16 border-b border-charcoal-100 shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-primary-600 rounded-md flex items-center justify-center text-white font-extrabold text-sm">TO</div>
                <span class="font-bold text-lg text-charcoal-900">Menu Navigasi</span>
            </div>
            <button type="button" @click="mobileMenuOpen = false" class="p-2 min-w-[44px] min-h-[44px] rounded-lg text-charcoal-500 hover:bg-charcoal-100 hover:text-charcoal-900 focus-ring flex items-center justify-center transition-colors">
                <span class="sr-only">Tutup menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Mobile Nav Content (Scrollable) -->
        <div class="flex-1 overflow-y-auto px-4 py-6 space-y-6">
            
            <a href="<?php echo e(route('home')); ?>" class="block text-xl font-bold <?php echo e(request()->routeIs('home') ? 'text-primary-600' : 'text-charcoal-900'); ?>">Beranda</a>
            <a href="<?php echo e(route('about')); ?>" class="block text-xl font-bold <?php echo e(request()->routeIs('about') ? 'text-primary-600' : 'text-charcoal-900'); ?>">Tentang Jurusan</a>

            <!-- Accordion Akademik -->
            <div x-data="{ expanded: <?php echo e(request()->is('akademik*') ? 'true' : 'false'); ?> }" class="border-t border-charcoal-100 pt-4">
                <button @click="expanded = !expanded" class="w-full flex justify-between items-center text-xl font-bold text-charcoal-900 py-2 focus:outline-none">
                    <span :class="{'text-primary-600': expanded}">Akademik</span>
                    <svg class="h-6 w-6 text-charcoal-400 transform transition-transform" :class="{'rotate-180': expanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="expanded" x-collapse class="pl-4 mt-2 space-y-4 pb-2 border-l-2 border-charcoal-100 ml-2">
                    <a href="<?php echo e(route('academic.programs')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('academic.programs') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Program & Kompetensi</a>
                    <a href="<?php echo e(route('academic.teachers')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('academic.teachers') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Guru & Staf</a>
                    <a href="<?php echo e(route('academic.facilities')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('academic.facilities') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Fasilitas Bengkel</a>
                </div>
            </div>

            <!-- Accordion Industri -->
            <div x-data="{ expanded: <?php echo e(request()->is('mitra-industri*') || request()->is('pkl*') || request()->is('lowongan*') ? 'true' : 'false'); ?> }" class="border-t border-charcoal-100 pt-4">
                <button @click="expanded = !expanded" class="w-full flex justify-between items-center text-xl font-bold text-charcoal-900 py-2 focus:outline-none">
                    <span :class="{'text-primary-600': expanded}">Industri</span>
                    <svg class="h-6 w-6 text-charcoal-400 transform transition-transform" :class="{'rotate-180': expanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="expanded" x-collapse class="pl-4 mt-2 space-y-4 pb-2 border-l-2 border-charcoal-100 ml-2">
                    <a href="<?php echo e(route('partnership.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('partnership.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Mitra Industri</a>
                    <a href="<?php echo e(route('internships.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('internships.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Praktik Kerja Lapangan</a>
                    <a href="<?php echo e(route('jobs.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('jobs.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Lowongan Kerja (BKK)</a>
                </div>
            </div>

            <!-- Accordion Informasi -->
            <div x-data="{ expanded: <?php echo e(request()->is('berita*') || request()->is('pengumuman*') || request()->is('prestasi*') || request()->is('galeri*') || request()->is('alumni*') || request()->is('unduhan*') ? 'true' : 'false'); ?> }" class="border-t border-charcoal-100 pt-4">
                <button @click="expanded = !expanded" class="w-full flex justify-between items-center text-xl font-bold text-charcoal-900 py-2 focus:outline-none">
                    <span :class="{'text-primary-600': expanded}">Informasi</span>
                    <svg class="h-6 w-6 text-charcoal-400 transform transition-transform" :class="{'rotate-180': expanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="expanded" x-collapse class="pl-4 mt-2 space-y-4 pb-2 border-l-2 border-charcoal-100 ml-2">
                    <a href="<?php echo e(route('news.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('news.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Berita</a>
                    <a href="<?php echo e(route('announcements.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('announcements.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Pengumuman</a>
                    <a href="<?php echo e(route('achievements.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('achievements.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Prestasi</a>
                    <a href="<?php echo e(route('gallery.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('gallery.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Galeri</a>
                    <a href="<?php echo e(route('alumni.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('alumni.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Alumni</a>
                    <a href="<?php echo e(route('download.index')); ?>" class="block text-lg font-medium <?php echo e(request()->routeIs('download.*') ? 'text-primary-600' : 'text-charcoal-600'); ?>">Unduhan</a>
                </div>
            </div>
            
        </div>
        
        <!-- Mobile Nav Footer -->
        <div class="p-6 border-t border-charcoal-100 bg-charcoal-50 mt-auto shrink-0 space-y-4">
            <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => '/admin','variant' => 'primary','size' => 'lg','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin','variant' => 'primary','size' => 'lg','class' => 'w-full']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Masuk Portal Admin
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $attributes = $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $component = $__componentOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
            
            <div class="flex items-center justify-center gap-6 pt-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_instagram')): ?>
                <a href="<?php echo e($settings->get('social_instagram')); ?>" target="_blank" rel="noopener" class="text-charcoal-400 hover:text-primary-600 transition-colors p-2"><span class="sr-only">Instagram</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg></a>
39:                 <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
40:                 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_youtube')): ?>
41:                 <a href="<?php echo e($settings->get('social_youtube')); ?>" target="_blank" rel="noopener" class="text-charcoal-400 hover:text-primary-600 transition-colors p-2"><span class="sr-only">YouTube</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" /></svg></a>
42:                 <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
43:                 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_facebook')): ?>
44:                 <a href="<?php echo e($settings->get('social_facebook')); ?>" target="_blank" rel="noopener" class="text-charcoal-400 hover:text-primary-600 transition-colors p-2"><span class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
45:                 <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
46:             </div>
47:         </div>
48:     </div>
49: </nav>
50: 
51: <?php if (isset($component)) { $__componentOriginal884ec1d8c6b8f530aa8698d5404840a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal884ec1d8c6b8f530aa8698d5404840a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.global-search-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-search-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal884ec1d8c6b8f530aa8698d5404840a3)): ?>
<?php $attributes = $__attributesOriginal884ec1d8c6b8f530aa8698d5404840a3; ?>
<?php unset($__attributesOriginal884ec1d8c6b8f530aa8698d5404840a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal884ec1d8c6b8f530aa8698d5404840a3)): ?>
<?php $component = $__componentOriginal884ec1d8c6b8f530aa8698d5404840a3; ?>
<?php unset($__componentOriginal884ec1d8c6b8f530aa8698d5404840a3); ?>
<?php endif; ?>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/navbar.blade.php ENDPATH**/ ?>