<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['facilities']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['facilities']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full bg-figma-bg-section py-8 sm:py-16 md:py-24 lg:py-32 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        
        <!-- Header -->
        <div class="flex flex-col items-center text-center mb-6 sm:mb-12 md:mb-20 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-2.5 sm:gap-3 mb-2 sm:mb-4">
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                    Fasilitas Pembelajaran
                </span>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[20px] sm:text-[34px] md:text-[48px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[720px] mb-2 sm:mb-6">
                Peralatan Berstandar Industri Terkini
            </h2>
            <p class="font-sans text-[13px] sm:text-[16px] text-gray-600 max-w-[640px] leading-relaxed">
                Seluruh ruang praktik dirancang untuk mensimulasikan lingkungan bengkel resmi, lengkap dengan peralatan spesial dan kendaraan praktik terbaru.
            </p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facilities && $facilities->count() > 0): ?>
            <?php
                $featuredFacility = $facilities->first();
                $otherFacilities = $facilities->skip(1);
            ?>

            <!-- Mobile Swipe Hint -->
            <div class="md:hidden flex items-center justify-between mb-3 px-1">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Ruang & Lab Praktik</span>
                <span class="text-[11px] font-semibold text-figma-red flex items-center gap-1">
                    Geser kartu
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
            </div>

            <!-- Mobile: Horizontal Snap Carousel (< md) -->
            <div class="md:hidden flex gap-3.5 overflow-x-auto snap-x snap-mandatory pb-3 -mx-4 px-4 scrollbar-none">
                <!-- Featured Card -->
                <div class="w-[82vw] max-w-[310px] shrink-0 snap-center relative bg-charcoal-950 aspect-[16/12] rounded-2xl overflow-hidden group shadow-md">
                    <img src="<?php echo e($featuredFacility->photo ? Storage::url($featuredFacility->photo) : asset('storage/facilities/01M1JB8QW6J6VCY86FHFH53NPV.jpeg')); ?>" 
                         alt="<?php echo e($featuredFacility->name); ?>" 
                         class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/50 to-transparent"></div>
                    
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-figma-red text-white text-[10px] font-bold uppercase tracking-wider shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                            Fasilitas Utama
                        </span>
                    </div>

                    <div class="absolute bottom-0 left-0 p-4 w-full z-10">
                        <h3 class="font-heading font-bold text-[18px] text-white mb-1 leading-snug"><?php echo e($featuredFacility->name); ?></h3>
                        <p class="font-sans text-[12px] text-gray-300 line-clamp-2 mb-3">
                            <?php echo e(strip_tags($featuredFacility->description ?? 'Fasilitas bengkel utama untuk praktik kelistrikan dan perakitan mesin.')); ?>

                        </p>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="inline-flex items-center gap-1.5 text-white font-sans font-bold text-[12px] uppercase tracking-wide active:scale-95 transition-transform">
                            <span>Lihat Detail</span>
                            <svg class="w-3.5 h-3.5 text-figma-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Secondary Facility Cards -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $otherFacilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="w-[82vw] max-w-[310px] shrink-0 snap-center relative bg-charcoal-900 aspect-[16/12] rounded-2xl overflow-hidden group shadow-md">
                        <img src="<?php echo e($facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1625806693899-73e46c7de29b?q=80&w=600&auto=format&fit=crop'); ?>" 
                             alt="<?php echo e($facility->name); ?>" 
                             class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-50" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/60 to-transparent"></div>
                        
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider">
                                Laboratorium
                            </span>
                        </div>

                        <div class="absolute bottom-0 left-0 p-4 w-full z-10">
                            <h3 class="font-heading font-bold text-[17px] text-white mb-1 leading-snug"><?php echo e($facility->name); ?></h3>
                            <p class="font-sans text-[12px] text-gray-300 line-clamp-2 mb-3">
                                <?php echo e(strip_tags($facility->description ?? 'Laboratorium pendukung untuk diagnostic tool dan sistem injeksi.')); ?>

                            </p>
                            <a href="<?php echo e(route('academic.facilities')); ?>" class="inline-flex items-center gap-1.5 text-white font-sans font-bold text-[12px] uppercase tracking-wide active:scale-95 transition-transform">
                                <span>Lihat Detail</span>
                                <svg class="w-3.5 h-3.5 text-figma-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                <!-- Quick Browse All Card -->
                <a href="<?php echo e(route('academic.facilities')); ?>" class="w-[65vw] max-w-[240px] shrink-0 snap-center bg-figma-red rounded-2xl p-5 flex flex-col items-center justify-center text-center text-white shadow-md active:scale-95 transition-transform">
                    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                    <span class="font-heading font-black text-base uppercase mb-1">Semua Fasilitas</span>
                    <span class="text-xs text-white/80">Jelajahi ekosistem <?php echo e($settings->get('site_short_name', 'TSM')); ?> &rarr;</span>
                </a>
            </div>

            <!-- Desktop: Bento Grid (md+) -->
            <div class="hidden md:grid md:grid-cols-12 gap-6 lg:gap-8 reveal-on-scroll reveal-up">
                
                <!-- Featured Facility -->
                <div class="md:col-span-8 relative bg-charcoal-950 min-h-[400px] overflow-hidden group rounded-xl">
                    <img src="<?php echo e($featuredFacility->photo ? Storage::url($featuredFacility->photo) : asset('storage/facilities/01M1JB8QW6J6VCY86FHFH53NPV.jpeg')); ?>" 
                         alt="<?php echo e($featuredFacility->name); ?>" 
                         class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60 group-hover:opacity-80 group-hover:scale-105 transition-all duration-700" loading="lazy">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/40 to-transparent"></div>
                    
                    <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full z-10">
                        <h3 class="font-heading font-bold text-[28px] md:text-[32px] text-white mb-3 leading-tight"><?php echo e($featuredFacility->name); ?></h3>
                        <p class="font-sans text-[15px] md:text-[16px] text-gray-300 max-w-[500px] line-clamp-3 mb-6">
                            <?php echo e(strip_tags($featuredFacility->description ?? 'Fasilitas bengkel utama untuk praktik kelistrikan dan perakitan mesin.')); ?>

                        </p>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="inline-flex items-center gap-2 text-white hover:text-figma-red transition-colors font-sans font-bold text-[14px] uppercase tracking-wide">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Secondary Facilities -->
                <div class="md:col-span-4 flex flex-col gap-6 lg:gap-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $otherFacilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="relative bg-charcoal-900 flex-1 min-h-[200px] overflow-hidden group rounded-xl">
                            <img src="<?php echo e($facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1625806693899-73e46c7de29b?q=80&w=600&auto=format&fit=crop'); ?>" 
                                 alt="<?php echo e($facility->name); ?>" 
                                 class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-50 group-hover:opacity-70 group-hover:scale-105 transition-all duration-700" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/60 to-transparent"></div>
                            
                            <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full z-10">
                                <h3 class="font-heading font-bold text-[20px] md:text-[24px] text-white mb-2 leading-tight"><?php echo e($facility->name); ?></h3>
                                <p class="font-sans text-[14px] text-gray-400 line-clamp-2">
                                    <?php echo e(strip_tags($facility->description ?? 'Laboratorium pendukung untuk diagnostic tool dan sistem injeksi.')); ?>

                                </p>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($otherFacilities->count() < 2): ?>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="flex-1 min-h-[200px] bg-figma-red text-white flex flex-col items-center justify-center p-8 text-center hover:bg-figma-dark-red transition-colors group rounded-xl">
                            <svg class="w-10 h-10 mb-4 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            <span class="font-heading font-bold text-[20px] mb-2">Semua Fasilitas</span>
                            <span class="font-sans text-[14px] text-white/80">Jelajahi ekosistem praktik <?php echo e($settings->get('site_short_name', 'TSM')); ?></span>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

            </div>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($otherFacilities->count() >= 2): ?>
            <div class="mt-6 sm:mt-12 text-center">
                <a href="<?php echo e(route('academic.facilities')); ?>" class="inline-flex items-center justify-center w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-3.5 border border-figma-dark text-figma-dark font-sans font-bold text-[13px] sm:text-[14px] uppercase tracking-wide hover:bg-figma-dark hover:text-white transition-colors focus-ring rounded-xl sm:rounded-sm active:scale-95">
                    Jelajahi Semua Fasilitas
                </a>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/facilities.blade.php ENDPATH**/ ?>