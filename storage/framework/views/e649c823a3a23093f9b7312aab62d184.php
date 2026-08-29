<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['partner']));

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

foreach (array_filter((['partner']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full bg-white py-24 lg:py-32 overflow-hidden border-t border-gray-100">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        
        <div class="flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
            
            <!-- Left: Partnership Info -->
            <div class="w-full lg:w-1/2 reveal-on-scroll reveal-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Kemitraan Industri
                    </span>
                </div>
                
                <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark mb-6">
                    Terhubung Langsung dengan Dunia Industri
                </h2>
                
                <p class="font-sans text-[18px] text-gray-600 leading-[1.6] mb-8">
                    Kurikulum dan standar operasional pembelajaran kami disinkronisasi penuh dengan kebutuhan industri, memastikan lulusan siap kerja dengan kompetensi yang diakui secara nasional.
                </p>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner): ?>
                    <!-- Partner Profile Mini -->
                    <div class="p-8 border border-gray-200 bg-gray-50 flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8 group">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 bg-white rounded-full flex items-center justify-center shadow-md p-4 shrink-0 overflow-hidden group-hover:shadow-lg group-hover:scale-105 transition-all duration-300">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->logo): ?>
                                <img src="<?php echo e(Storage::url($partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" class="w-full h-full object-contain">
                            <?php else: ?>
                                <div class="font-heading font-black text-4xl text-gray-300"><?php echo e(substr($partner->name, 0, 1)); ?></div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="text-center sm:text-left">
                            <h3 class="font-heading font-bold text-[24px] text-figma-dark mb-2"><?php echo e($partner->name); ?></h3>
                            <div class="inline-block px-3 py-1 bg-figma-red/10 text-figma-red font-sans text-[12px] font-bold uppercase tracking-wider rounded-sm mb-3">
                                Mitra Utama Industri
                            </div>
                            <p class="font-sans text-[14px] text-gray-500 line-clamp-2">
                                <?php echo e($partner->description ?? 'Mitra strategis dalam pengembangan kelas industri, penyelarasan kurikulum, dan rekrutmen mekanik profesional.'); ?>

                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="p-8 border border-gray-200 bg-gray-50 mb-8">
                        <p class="font-sans text-gray-500 italic">Data mitra industri belum tersedia.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <a href="<?php echo e(route('partnership.index')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-figma-dark text-white font-sans font-bold text-[14px] uppercase tracking-wide hover:bg-figma-red transition-colors focus-ring w-full sm:w-auto">
                    Lihat Profil Kemitraan
                </a>
            </div>

            <!-- Right: Image Composition -->
            <div class="w-full lg:w-1/2 relative reveal-on-scroll reveal-up delay-200">
                <!-- Decorative background block -->
                <div class="absolute -right-12 -bottom-12 w-3/4 h-3/4 bg-figma-red -z-10"></div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 relative aspect-[16/9] bg-charcoal-900 shadow-xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1622322394747-062e787498c8?q=80&w=800&auto=format&fit=crop" alt="Industri" class="w-full h-full object-cover mix-blend-overlay opacity-80 group-hover:scale-105 group-hover:opacity-100 transition-all duration-700" loading="lazy">
                        <div class="absolute bottom-4 left-4 right-4 p-4 bg-white/90 backdrop-blur-sm border-l-4 border-figma-red">
                            <span class="block font-heading font-bold text-[16px] text-figma-dark">Kelas Industri</span>
                            <span class="block font-sans text-[14px] text-gray-600">SOP Standar Bengkel Resmi</span>
                        </div>
                    </div>
                    
                    <div class="relative aspect-square bg-gray-200 shadow-lg overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1589710323380-60b6d27af0b5?q=80&w=400&auto=format&fit=crop" alt="Tools" class="w-full h-full object-cover mix-blend-multiply opacity-80 group-hover:scale-105 group-hover:opacity-100 transition-all duration-700" loading="lazy">
                    </div>
                    <div class="relative aspect-square bg-charcoal-950 shadow-lg flex flex-col items-center justify-center p-6 text-center group">
                        <div class="w-12 h-12 rounded-full border border-figma-red flex items-center justify-center mb-4 group-hover:bg-figma-red transition-colors">
                            <svg class="w-5 h-5 text-figma-red group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <span class="block font-heading font-bold text-[24px] text-white">PKL / OJT</span>
                        <span class="block font-sans text-[13px] text-gray-400 mt-2">On the Job Training</span>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/partnership.blade.php ENDPATH**/ ?>