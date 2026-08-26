<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['achievements']));

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

foreach (array_filter((['achievements']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full bg-white py-24 lg:py-32 overflow-hidden border-t border-gray-100">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        
        <div class="flex flex-col lg:flex-row gap-16 lg:gap-24">
            
            <!-- Left: Content -->
            <div class="w-full lg:w-5/12 flex flex-col items-start reveal-on-scroll reveal-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Prestasi
                    </span>
                </div>
                
                <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark mb-6">
                    Tradisi Juara, Bukti Kompetensi Nyata.
                </h2>
                
                <p class="font-sans text-[16px] text-gray-600 leading-[1.6] mb-8">
                    Siswa TBSM secara konsisten mencetak prestasi di berbagai ajang kompetisi keahlian otomotif tingkat regional hingga nasional. Hal ini membuktikan bahwa kurikulum dan metode praktik yang kami terapkan membuahkan hasil unggul.
                </p>

                <a href="<?php echo e(route('achievements.index')); ?>" class="group flex items-center gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[16px] uppercase tracking-[-0.5px]">
                    <span class="relative">
                        Lihat Semua Prestasi
                        <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                    </span>
                    <span class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

            <!-- Right: Timeline/Podium Style List -->
            <div class="w-full lg:w-7/12 relative reveal-on-scroll reveal-up delay-200">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($achievements && $achievements->count() > 0): ?>
                    <div class="flex flex-col border-l-2 border-figma-red/20 pl-8 space-y-12">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="relative group">
                                <!-- Dot indicator -->
                                <div class="absolute -left-[41px] top-2 w-5 h-5 rounded-full bg-white border-4 border-figma-red group-hover:scale-125 transition-transform duration-300"></div>
                                
                                <div class="flex flex-col bg-charcoal-50 p-6 md:p-8 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-200 -mt-2">
                                    <div class="flex items-center gap-4 mb-3">
                                        <span class="px-3 py-1 bg-figma-dark text-white font-heading font-bold text-[14px]"><?php echo e($achievement->date ? $achievement->date->format('Y') : ''); ?></span>
                                        <span class="font-sans font-bold text-[14px] text-figma-red uppercase tracking-wide"><?php echo e($achievement->rank); ?></span>
                                    </div>
                                    <h3 class="font-heading font-bold text-[22px] md:text-[28px] text-figma-dark leading-tight mb-2 group-hover:text-figma-red transition-colors"><?php echo e($achievement->title); ?></h3>
                                    <p class="font-sans text-[15px] text-gray-500"><?php echo e($achievement->organizer); ?></p>
                                </div>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="bg-gray-50 p-8 border border-gray-100 flex flex-col items-center justify-center h-full min-h-[300px] text-center">
                        <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        <p class="font-sans text-gray-500">Daftar prestasi sedang diperbarui.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
            </div>
            
        </div>
        
    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/frontend/home/achievements.blade.php ENDPATH**/ ?>