<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['galleries']));

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

foreach (array_filter((['galleries']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full py-24 lg:py-32 overflow-hidden border-t border-gray-100 relative">
    <div class="max-w-[1440px] mx-auto px-6 md:px-16">
        
        <div class="flex flex-col items-center text-center mb-12 md:mb-16 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                    Galeri Dokumentasi
                </span>
                <div class="w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark max-w-[720px]">
                Jejak Aktivitas & Karya Siswa
            </h2>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($galleries && $galleries->count() > 0): ?>
            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6 reveal-on-scroll reveal-up delay-100">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('gallery.show', $gallery->slug)); ?>" class="block relative group overflow-hidden break-inside-avoid shadow-sm hover:shadow-xl transition-all duration-300 bg-white">
                        <img src="<?php echo e($gallery->thumbnail ? Storage::url($gallery->thumbnail) : 'https://images.unsplash.com/photo-1517520286882-73bc410d29ce?q=80&w=600&auto=format&fit=crop'); ?>" 
                             alt="<?php echo e($gallery->title); ?>" 
                             class="w-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950/80 via-charcoal-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="absolute bottom-0 left-0 w-full p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <h3 class="font-heading font-bold text-[18px] text-white mb-1"><?php echo e($gallery->title); ?></h3>
                            <div class="flex items-center gap-2 font-sans text-[12px] text-gray-300">
                                <span><?php echo e($gallery->items ? $gallery->items->count() : 0); ?> Foto</span>
                                <span>&bull;</span>
                                <span><?php echo e($gallery->published_at ? $gallery->published_at->format('M Y') : $gallery->created_at->format('M Y')); ?></span>
                            </div>
                        </div>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            
            <div class="mt-12 md:mt-16 text-center">
                <a href="<?php echo e(route('gallery.index')); ?>" class="inline-flex items-center justify-center px-8 py-4 border-2 border-figma-dark text-figma-dark font-sans font-bold text-[14px] uppercase tracking-wide hover:bg-figma-dark hover:text-white transition-colors focus-ring">
                    Lihat Seluruh Galeri
                </a>
            </div>
        <?php else: ?>
            <div class="bg-white p-12 border border-gray-200 flex flex-col items-center justify-center text-center shadow-sm">
                <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="font-sans text-gray-500">Galeri foto belum tersedia.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
    </div>
</section>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/gallery.blade.php ENDPATH**/ ?>