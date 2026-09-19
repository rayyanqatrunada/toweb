<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'headOfDepartment' => null,
    'teachers' => null
]));

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

foreach (array_filter(([
    'headOfDepartment' => null,
    'teachers' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 overflow-hidden border-t border-gray-100 relative">
    <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-16">
        
        <div class="flex flex-col items-center text-center mb-10 sm:mb-16 md:mb-24 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-2.5 sm:gap-3 mb-3 sm:mb-4">
                <div class="w-6 sm:w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                    Tim Akademik
                </span>
                <div class="w-6 sm:w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[26px] sm:text-[34px] md:text-[48px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[720px] mb-3 sm:mb-6">
                Instruktur Berpengalaman Standar Industri
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row gap-6 sm:gap-8 lg:gap-12 reveal-on-scroll reveal-up">
            
            <!-- Featured: Head of Department -->
            <div class="w-full lg:w-5/12 bg-charcoal-950 p-6 sm:p-8 md:p-12 text-white relative overflow-hidden group rounded-2xl shadow-xl flex flex-col justify-between">
                <!-- Decorative background elements -->
                <div class="absolute -top-12 -right-12 w-48 h-48 bg-figma-red opacity-10 rounded-full group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-full h-1.5 bg-figma-red"></div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headOfDepartment): ?>
                    <?php
                        $hasHeadPhoto = $headOfDepartment->hasValidPhoto();
                        $headPhotoUrl = $headOfDepartment->photo_url;
                        $headQuote = !empty($headOfDepartment->bio) 
                            ? $headOfDepartment->bio 
                            : (isset($settings) ? $settings->get('head_quote') : app(\App\Services\SettingsService::class)->get('head_quote', 'Misi kami adalah menjembatani jarak antara teori di sekolah dengan realita di bengkel, sehingga siswa TBSM tidak pernah kaget ketika terjun ke industri yang sebenarnya.'));
                    ?>
                    <div class="flex flex-col h-full z-10 relative">
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-white">Kepala Kompetensi Keahlian</h3>
                            <span class="px-2.5 py-0.5 sm:px-3 sm:py-1 bg-figma-red text-white text-[9px] sm:text-[10px] font-black uppercase tracking-widest rounded-full">Kajur</span>
                        </div>
                        <div class="w-10 sm:w-12 h-1 bg-figma-red mb-5 sm:mb-8"></div>
                        
                        <!-- Avatar / Photo -->
                        <div class="w-28 h-28 sm:w-36 sm:h-36 md:w-44 md:h-44 bg-charcoal-800 rounded-full overflow-hidden mb-5 sm:mb-8 border-3 sm:border-4 border-charcoal-700 shadow-2xl mx-auto md:mx-0 shrink-0 relative flex items-center justify-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasHeadPhoto && $headPhotoUrl): ?>
                                <img src="<?php echo e($headPhotoUrl); ?>" alt="<?php echo e($headOfDepartment->name); ?>" class="w-full h-full object-cover object-top aspect-square" loading="eager">
                            <?php else: ?>
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-charcoal-800 to-charcoal-900 text-charcoal-300 font-heading font-black text-3xl sm:text-4xl">
                                    <span><?php echo e(strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $headOfDepartment->name)), 0, 2))); ?></span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        
                        <h4 class="font-heading font-bold text-[22px] sm:text-[28px] md:text-[32px] leading-tight mb-1 sm:mb-2 text-white text-center md:text-left"><?php echo e($headOfDepartment->name); ?></h4>
                        <p class="font-sans text-[13px] sm:text-[15px] font-medium text-figma-red mb-4 sm:mb-6 text-center md:text-left"><?php echo e($headOfDepartment->position ?? 'Ketua Kompetensi Keahlian TBSM'); ?></p>
                        
                        <blockquote class="font-sans text-[13px] sm:text-[15px] leading-[1.65] text-gray-300 italic flex-grow bg-white/5 border-l-2 border-figma-red p-3.5 sm:p-4 rounded-r-lg">
                            "<?php echo e($headQuote); ?>"
                        </blockquote>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-center h-full min-h-[250px]">
                        <p class="text-gray-500 italic text-sm">Data Kepala Jurusan belum diatur.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Other Teachers List (Optimized Horizontal Compact on Mobile) -->
            <div class="w-full lg:w-7/12 flex flex-col gap-4 sm:gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($teachers && $teachers->count() > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php
                            $hasPhoto = $teacher->hasValidPhoto();
                            $photoUrl = $teacher->photo_url;
                            $initials = strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $teacher->name)), 0, 2));
                        ?>
                        <div class="flex flex-row items-center p-4 sm:p-6 md:p-8 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition-all duration-300 gap-4 sm:gap-6 group">
                            <!-- Circular Avatar Container -->
                            <div class="w-16 h-16 sm:w-24 sm:h-24 md:w-28 md:h-28 rounded-full overflow-hidden shrink-0 bg-charcoal-100 border-2 border-gray-200 group-hover:border-figma-red transition-all duration-300 relative flex items-center justify-center shadow-sm">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasPhoto && $photoUrl): ?>
                                    <img src="<?php echo e($photoUrl); ?>" alt="<?php echo e($teacher->name); ?>" class="w-full h-full object-cover object-top aspect-square" loading="lazy">
                                <?php else: ?>
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-charcoal-50 to-charcoal-200 text-charcoal-600 font-heading font-black text-base sm:text-2xl select-none">
                                        <span><?php echo e($initials); ?></span>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            
                            <div class="text-left flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-2 mb-0.5 sm:mb-1">
                                    <h4 class="font-heading font-bold text-[16px] sm:text-[20px] md:text-[22px] text-figma-dark group-hover:text-figma-red transition-colors truncate">
                                        <?php echo e($teacher->name); ?>

                                    </h4>
                                </div>
                                <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 mb-1.5 sm:mb-2.5">
                                    <span class="font-sans font-semibold text-[12px] sm:text-[14px] text-figma-gray">
                                        <?php echo e($teacher->position ?? 'Guru Kejuruan Otomotif'); ?>

                                    </span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($teacher->specialization): ?>
                                        <span class="text-gray-300 hidden sm:inline">•</span>
                                        <span class="inline-block px-2 py-0.5 rounded text-[10px] sm:text-[11px] font-bold uppercase tracking-wider bg-charcoal-100 text-charcoal-700">
                                            <?php echo e($teacher->specialization); ?>

                                        </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <p class="font-sans text-[12px] sm:text-[14px] leading-relaxed text-gray-500 line-clamp-2">
                                    <?php echo e($teacher->bio ?? 'Berpengalaman mendidik mekanik-mekanik andal dan membimbing siswa dalam berbagai kejuaraan otomotif tingkat nasional.'); ?>

                                </p>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    
                    <div class="mt-2 flex justify-center lg:justify-start">
                        <a href="<?php echo e(route('academic.teachers')); ?>" class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-6 sm:px-8 py-3.5 border border-charcoal-300 text-figma-dark font-sans font-bold text-[13px] sm:text-[14px] uppercase tracking-wider hover:bg-charcoal-900 hover:text-white hover:border-charcoal-900 transition-all rounded-lg shadow-sm focus-ring">
                            <span>Lihat Seluruh Tim Pengajar</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-center h-full min-h-[160px] bg-white border border-gray-200 p-6 rounded-xl">
                        <p class="text-gray-500 italic text-sm">Data Guru belum tersedia.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

        </div>
        
    </div>
</section>

<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/teachers.blade.php ENDPATH**/ ?>