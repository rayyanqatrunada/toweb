<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['jobVacancies']));

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

foreach (array_filter((['jobVacancies']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
            
            <!-- Left: Career Info -->
            <div class="w-full lg:w-5/12 reveal-on-scroll reveal-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Karier & Masa Depan
                    </span>
                </div>
                
                <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark mb-6">
                    Peluang Karier Lulusan TBSM
                </h2>
                
                <p class="font-sans text-[16px] text-gray-600 leading-[1.6] mb-8">
                    Dengan ekosistem kelas industri yang terintegrasi, lulusan jurusan TBSM dipersiapkan tidak hanya sebagai mekanik andal, tetapi juga untuk mengisi posisi strategis di berbagai sektor otomotif.
                </p>

                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-figma-red rounded-full"></div>
                        <span class="font-heading font-bold text-[16px] text-charcoal-800">Mekanik Bengkel Resmi (AHASS)</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-figma-red rounded-full"></div>
                        <span class="font-heading font-bold text-[16px] text-charcoal-800">Teknisi Perakitan Industri Otomotif</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-figma-red rounded-full"></div>
                        <span class="font-heading font-bold text-[16px] text-charcoal-800">Wirausahawan Bengkel & Modifikasi</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-figma-red rounded-full"></div>
                        <span class="font-heading font-bold text-[16px] text-charcoal-800">Sparepart & Service Advisor</span>
                    </li>
                </ul>
                
                <a href="<?php echo e(route('jobs.index')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-white border border-figma-dark text-figma-dark font-sans font-bold text-[14px] uppercase tracking-wide hover:bg-figma-dark hover:text-white transition-colors focus-ring">
                    Lihat Info Lowongan Kerja
                </a>
            </div>

            <!-- Right: Job Vacancies Preview -->
            <div class="w-full lg:w-7/12 relative reveal-on-scroll reveal-up delay-200">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jobVacancies && $jobVacancies->count() > 0): ?>
                    <div class="bg-gray-50 border border-gray-200 p-8 md:p-10 relative">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-figma-red/5 rounded-bl-full pointer-events-none"></div>
                        
                        <h3 class="font-heading font-bold text-[20px] text-figma-dark mb-6">Lowongan Tersedia Saat Ini</h3>
                        
                        <div class="space-y-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $jobVacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-6 bg-white border border-gray-100 hover:border-figma-red/30 hover:shadow-md transition-all duration-300 gap-4 group">
                                    <div class="flex items-center gap-4">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->industryPartner && $job->industryPartner->logo): ?>
                                            <div class="w-12 h-12 rounded-full border border-gray-100 overflow-hidden shrink-0">
                                                <img src="<?php echo e(Storage::url($job->industryPartner->logo)); ?>" alt="<?php echo e($job->industryPartner->name); ?>" class="w-full h-full object-contain">
                                            </div>
                                        <?php else: ?>
                                            <div class="w-12 h-12 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center text-gray-400 shrink-0">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        
                                        <div>
                                            <h4 class="font-heading font-bold text-[16px] text-figma-dark group-hover:text-figma-red transition-colors mb-1"><?php echo e($job->title); ?></h4>
                                            <div class="font-sans text-[13px] text-gray-500">
                                                <?php echo e($job->industryPartner->name ?? 'Perusahaan Mitra'); ?> &bull; <?php echo e($job->location); ?>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="shrink-0 flex sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto mt-2 sm:mt-0">
                                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-600 font-sans text-[11px] font-bold uppercase tracking-wider mb-2">
                                            <?php echo e($job->work_type ?? 'Full-time'); ?>

                                        </span>
                                        <span class="text-figma-red font-sans font-bold text-[12px] uppercase opacity-0 group-hover:opacity-100 transition-opacity">Detail &rarr;</span>
                                    </div>
                                </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Fallback if no jobs -->
                    <div class="relative w-full aspect-[4/3] bg-charcoal-900 overflow-hidden shadow-xl group">
                        <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=800&auto=format&fit=crop" alt="Peluang Karier" class="w-full h-full object-cover mix-blend-overlay opacity-80 group-hover:scale-105 group-hover:opacity-100 transition-all duration-700" loading="lazy">
                        <div class="absolute inset-0 border-[16px] border-white/10 pointer-events-none z-10"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="bg-white/90 backdrop-blur-sm p-6 border-l-4 border-figma-red">
                                <h3 class="font-heading font-bold text-[20px] text-figma-dark mb-2">Pusat Bursa Kerja Khusus (BKK)</h3>
                                <p class="font-sans text-[14px] text-gray-600">Terhubung langsung dengan ratusan mitra industri untuk memfasilitasi penempatan kerja bagi lulusan TBSM.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
            </div>
            
        </div>
        
    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\components\frontend\home\career.blade.php ENDPATH**/ ?>