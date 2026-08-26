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

<section class="w-full bg-figma-bg-section py-24 lg:py-32 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        
        <!-- Header -->
        <div class="flex flex-col items-center text-center mb-16 md:mb-24 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                    Fasilitas Pembelajaran
                </span>
                <div class="w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark max-w-[720px] mb-6">
                Peralatan Berstandar Industri Terkini
            </h2>
            <p class="font-sans text-[16px] text-gray-600 max-w-[640px]">
                Seluruh ruang praktik dirancang untuk mensimulasikan lingkungan bengkel resmi, lengkap dengan peralatan spesial (special tools) dan kendaraan praktik terbaru.
            </p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facilities && $facilities->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 reveal-on-scroll reveal-up">
                
                <?php
                    $featuredFacility = $facilities->first();
                    $otherFacilities = $facilities->skip(1);
                ?>

                <!-- Featured Facility -->
                <div class="md:col-span-8 relative bg-charcoal-950 aspect-video md:aspect-auto h-full min-h-[400px] overflow-hidden group">
                    <img src="<?php echo e($featuredFacility->photo ? Storage::url($featuredFacility->photo) : 'https://images.unsplash.com/photo-1599252328221-5c8c50b73df7?q=80&w=1200&auto=format&fit=crop'); ?>" 
                         alt="<?php echo e($featuredFacility->name); ?>" 
                         class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60 group-hover:opacity-80 group-hover:scale-105 transition-all duration-700" loading="lazy">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/40 to-transparent"></div>
                    
                    <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full z-10">
                        <h3 class="font-heading font-bold text-[32px] text-white mb-3"><?php echo e($featuredFacility->name); ?></h3>
                        <p class="font-sans text-[16px] text-gray-300 max-w-[500px] line-clamp-3 mb-6">
                            <?php echo e($featuredFacility->description ?? 'Fasilitas bengkel utama untuk praktik kelistrikan dan perakitan mesin.'); ?>

                        </p>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="inline-flex items-center gap-2 text-white hover:text-figma-red transition-colors font-sans font-bold text-[14px] uppercase tracking-wide">
                            Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Secondary Facilities -->
                <div class="md:col-span-4 flex flex-col gap-6 lg:gap-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $otherFacilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="relative bg-charcoal-900 flex-1 min-h-[240px] overflow-hidden group">
                            <img src="<?php echo e($facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1625806693899-73e46c7de29b?q=80&w=600&auto=format&fit=crop'); ?>" 
                                 alt="<?php echo e($facility->name); ?>" 
                                 class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-50 group-hover:opacity-70 group-hover:scale-105 transition-all duration-700" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/60 to-transparent"></div>
                            
                            <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full z-10">
                                <h3 class="font-heading font-bold text-[24px] text-white mb-2"><?php echo e($facility->name); ?></h3>
                                <p class="font-sans text-[14px] text-gray-400 line-clamp-2">
                                    <?php echo e($facility->description ?? 'Laboratorium pendukung untuk diagnostic tool dan sistem injeksi.'); ?>

                                </p>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    
                    <!-- View All CTA block if there's space -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($otherFacilities->count() < 2): ?>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="flex-1 min-h-[240px] bg-figma-red text-white flex flex-col items-center justify-center p-8 text-center hover:bg-figma-dark-red transition-colors group">
                            <svg class="w-10 h-10 mb-4 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            <span class="font-heading font-bold text-[20px] mb-2">Semua Fasilitas</span>
                            <span class="font-sans text-[14px] text-white/80">Jelajahi ekosistem praktik TBSM</span>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

            </div>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($otherFacilities->count() >= 2): ?>
            <div class="mt-12 text-center">
                <a href="<?php echo e(route('academic.facilities')); ?>" class="inline-flex items-center justify-center px-8 py-3 border border-figma-dark text-figma-dark font-sans font-bold text-[14px] uppercase tracking-wide hover:bg-figma-dark hover:text-white transition-colors focus-ring">
                    Jelajahi Semua Fasilitas
                </a>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/frontend/home/facilities.blade.php ENDPATH**/ ?>