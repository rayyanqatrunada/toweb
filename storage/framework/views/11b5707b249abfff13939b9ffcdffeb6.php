<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'slidesJson' => null
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
    'slidesJson' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $defaultSlides = [
        [
            'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1920&auto=format&fit=crop',
            'eyebrow' => 'TEKNIK DAN BISNIS SEPEDA MOTOR',
            'title' => 'Menyiapkan Generasi Profesional di Dunia Otomotif',
            'desc' => 'Program keahlian yang membekali peserta didik dengan kompetensi teknis dan profesional di bidang sepeda motor serta kesiapan dunia kerja.'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?q=80&w=1920&auto=format&fit=crop',
            'eyebrow' => 'FASILITAS STANDAR INDUSTRI',
            'title' => 'Pusat Keunggulan Vokasi Otomotif',
            'desc' => 'Menggunakan fasilitas laboratorium yang dirancang menyerupai lingkungan kerja industri otomotif sesungguhnya untuk pengalaman belajar maksimal.'
        ]
    ];

    $dbSlides = $slidesJson ? json_decode($slidesJson, true) : [];
    
    $slides = [];
    if (!empty($dbSlides) && is_array($dbSlides)) {
        foreach ($dbSlides as $slide) {
            $slides[] = [
                'image' => !empty($slide['image']) ? Storage::url($slide['image']) : $defaultSlides[0]['image'],
                'eyebrow' => $slide['eyebrow'] ?? 'TEKNIK DAN BISNIS SEPEDA MOTOR',
                'title' => $slide['title'] ?? 'TBSM',
                'desc' => $slide['desc'] ?? ''
            ];
        }
    } else {
        $slides = $defaultSlides;
    }
?>

<section class="relative w-full h-[680px] lg:h-[780px] bg-charcoal-900 overflow-hidden" data-hero-slider aria-label="Hero Image Slider">
    
    <!-- Slides Container -->
    <div class="relative w-full h-full">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out <?php echo e($index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'); ?>" aria-hidden="<?php echo e($index === 0 ? 'false' : 'true'); ?>">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index === 0): ?>
                    <!-- Eager load first image -->
                    <img src="<?php echo e($slide['image']); ?>" alt="Slide <?php echo e($index + 1); ?>" loading="eager" fetchpriority="high" class="absolute inset-0 w-full h-full object-cover">
                <?php else: ?>
                    <!-- Lazy load subsequent images with data-src for JS -->
                    <img data-src="<?php echo e($slide['image']); ?>" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="Slide <?php echo e($index + 1); ?>" class="absolute inset-0 w-full h-full object-cover">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <!-- Dark Gradient Overlay for Contrast -->
                <div class="absolute inset-0 bg-gradient-to-r from-charcoal-950/90 via-charcoal-900/60 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950/80 via-transparent to-transparent"></div>
                
                <!-- Decorative Elements per slide -->
                <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-bl from-figma-red/10 to-transparent mix-blend-overlay"></div>

                <!-- Text Content inside slide to fade together -->
                <div class="absolute inset-0 z-30 flex items-center">
                    <div class="w-full max-w-[1280px] mx-auto px-6 md:px-16 flex flex-col justify-center">
                        <div class="max-w-[720px] <?php echo e($index === 0 ? 'reveal-on-scroll reveal-up' : ''); ?>">
                            <!-- Eyebrow -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-[2px] bg-figma-red"></div>
                                <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-red uppercase">
                                    <?php echo e($slide['eyebrow']); ?>

                                </span>
                            </div>
                            
                            <!-- H1 (Only for first slide for SEO, others use span/div or H2) -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index === 0): ?>
                                <h1 class="font-heading font-extrabold text-[40px] md:text-[56px] lg:text-[64px] leading-[1.1] tracking-[-1.5px] text-white mb-6 drop-shadow-sm">
                                    <?php echo e($slide['title']); ?>

                                </h1>
                            <?php else: ?>
                                <h2 class="font-heading font-extrabold text-[40px] md:text-[56px] lg:text-[64px] leading-[1.1] tracking-[-1.5px] text-white mb-6 drop-shadow-sm">
                                    <?php echo e($slide['title']); ?>

                                </h2>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            
                            <!-- Description -->
                            <p class="font-sans font-normal text-[18px] md:text-[20px] leading-[1.6] text-gray-300 mb-10 max-w-[580px]">
                                <?php echo e($slide['desc']); ?>

                            </p>
                            
                            <!-- CTAs (Static links, so they are the same on every slide) -->
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <a href="<?php echo e(route('about')); ?>" class="flex justify-center items-center px-8 py-4 bg-figma-red text-white font-sans font-bold text-[16px] tracking-[-0.5px] uppercase rounded-[2px] w-full sm:w-auto h-[56px] hover:bg-figma-dark-red transition-all duration-300 focus-ring shadow-lg shadow-figma-red/20 group">
                                    Jelajahi TBSM
                                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                                
                                <a href="<?php echo e(route('academic.programs')); ?>" class="box-border flex justify-center items-center px-8 py-4 border-2 border-white/20 bg-white/5 backdrop-blur-sm text-white font-sans font-bold text-[16px] tracking-[-0.5px] uppercase rounded-[2px] w-full sm:w-auto h-[56px] hover:bg-white/10 hover:border-white/40 transition-all duration-300 focus-ring">
                                    Kenali Program Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    <!-- Decorative Grid & Brackets (Static across slides) -->
    <div class="absolute inset-0 z-20 pointer-events-none opacity-[0.15]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    
    <!-- Top-Left Bracket -->
    <div class="absolute top-12 left-6 md:left-12 z-20 pointer-events-none w-16 h-16 border-t-2 border-l-2 border-figma-red opacity-50"></div>
    <!-- Bottom-Right Bracket -->
    <div class="absolute bottom-32 right-6 md:right-12 z-20 pointer-events-none w-16 h-16 border-b-2 border-r-2 border-figma-red opacity-50"></div>

    <!-- Slider Controls -->
    <div class="absolute bottom-0 left-0 w-full z-40 bg-gradient-to-t from-charcoal-950 to-transparent pt-12 pb-8">
        <div class="max-w-[1280px] mx-auto px-6 md:px-16 flex items-center justify-between">
            
            <!-- Dots Indicator -->
            <div class="flex items-center gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <button type="button" aria-label="Go to slide <?php echo e($index + 1); ?>" class="hero-dot h-2 rounded-full transition-all duration-300 focus-ring <?php echo e($index === 0 ? 'bg-figma-red w-8' : 'bg-white/50 w-2 hover:bg-white'); ?>"></button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <!-- Counter & Arrows -->
            <div class="flex items-center gap-6">
                <div class="hidden md:flex items-baseline gap-1 font-heading text-white">
                    <span class="hero-counter-current text-[20px] font-bold">01</span>
                    <span class="text-[14px] text-gray-500 font-normal">/ 0<?php echo e(count($slides)); ?></span>
                </div>
                
                <div class="flex items-center gap-2">
                    <button type="button" class="hero-prev w-12 h-12 flex items-center justify-center rounded-full border border-white/20 bg-charcoal-900/50 backdrop-blur-sm text-white hover:bg-figma-red hover:border-figma-red transition-all duration-300 focus-ring" aria-label="Previous Slide">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" class="hero-next w-12 h-12 flex items-center justify-center rounded-full border border-white/20 bg-charcoal-900/50 backdrop-blur-sm text-white hover:bg-figma-red hover:border-figma-red transition-all duration-300 focus-ring" aria-label="Next Slide">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/hero-slider.blade.php ENDPATH**/ ?>