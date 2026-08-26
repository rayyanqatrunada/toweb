<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['programs']));

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

foreach (array_filter((['programs']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full bg-white py-24 lg:py-32 border-t border-gray-100 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16 lg:mb-24 reveal-on-scroll reveal-up">
            <div class="max-w-[640px]">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Program Keahlian
                    </span>
                </div>
                <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark">
                    Fokus Pembelajaran & Kompetensi
                </h2>
            </div>
            
            <a href="<?php echo e(route('academic.programs')); ?>" class="group inline-flex items-center gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[16px] uppercase tracking-[-0.5px]">
                <span class="relative">
                    Lihat Kurikulum Lengkap
                    <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                </span>
                <span class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
            </a>
        </div>

        <!-- Academic Content -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($programs && $programs->count() > 0): ?>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="lg:col-span-12 grid grid-cols-1 md:grid-cols-2 gap-12 items-center reveal-on-scroll reveal-up delay-100">
                        
                        <!-- Program Description -->
                        <div class="order-2 <?php echo e($index % 2 == 0 ? 'md:order-1' : 'md:order-2 lg:pl-16'); ?>">
                            <div class="text-figma-red/20 font-heading font-black text-[64px] leading-none mb-2"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></div>
                            <h3 class="font-heading font-bold text-[32px] md:text-[40px] text-figma-dark mb-4 leading-[1.1]"><?php echo e($program->name); ?></h3>
                            <p class="font-sans text-[16px] text-gray-600 leading-[1.7] mb-8">
                                <?php echo e($program->description ?? 'Program ini membekali siswa dengan keterampilan teknis otomotif terkini yang disesuaikan dengan standar kebutuhan industri.'); ?>

                            </p>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->competencies && $program->competencies->count() > 0): ?>
                                <h4 class="font-heading font-bold text-[18px] text-figma-dark mb-4">Kompetensi Utama:</h4>
                                <ul class="space-y-4">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $program->competencies->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <li class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-figma-red/10 flex items-center justify-center shrink-0 mt-0.5">
                                                <svg class="w-3 h-3 text-figma-red" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <span class="font-sans text-[15px] text-charcoal-700 leading-snug"><?php echo e($competency->name); ?></span>
                                        </li>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        
                        <!-- Image Block -->
                        <div class="order-1 <?php echo e($index % 2 == 0 ? 'md:order-2' : 'md:order-1'); ?> relative w-full aspect-square md:aspect-[4/5] bg-gray-100 group overflow-hidden border border-gray-200">
                            <!-- In a real scenario we'd use $program->photo, but falling back to an unsplash image for visual -->
                            <img src="<?php echo e($program->photo ? Storage::url($program->photo) : 'https://images.unsplash.com/photo-1610491462702-42e6ecd6a982?q=80&w=800&auto=format&fit=crop'); ?>" 
                                 alt="<?php echo e($program->name); ?>" 
                                 class="w-full h-full object-cover mix-blend-multiply opacity-90 group-hover:scale-105 transition-all duration-700" loading="lazy">
                            <div class="absolute inset-0 border-[16px] border-white/20 pointer-events-none z-10"></div>
                            
                            <div class="absolute bottom-6 left-6 bg-white p-4 shadow-xl z-20 flex items-center gap-3">
                                <div class="w-12 h-12 bg-charcoal-900 text-white flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div class="font-heading font-bold text-[14px] text-figma-dark">Standar<br>Industri</div>
                            </div>
                        </div>
                        
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\components\frontend\home\academic.blade.php ENDPATH**/ ?>