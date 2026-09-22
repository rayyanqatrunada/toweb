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
    $siteName = $settings->get('site_name', 'Teknik Sepeda Motor');
    $siteShortName = $settings->get('site_short_name', 'TSM');

    $defaultSlides = [
        [
            'image' => asset('storage/hero-slides/slide-1.jpg'),
            'eyebrow' => strtoupper($siteName),
            'title' => 'Menyiapkan Generasi Profesional di Dunia Otomotif',
            'desc' => 'Program keahlian yang membekali peserta didik dengan kompetensi teknis dan profesional di bidang sepeda motor serta kesiapan dunia kerja.',
            'button_primary_text' => 'Jelajahi ' . $siteShortName,
            'button_primary_url' => route('about'),
            'button_secondary_text' => 'Program',
            'button_secondary_url' => route('academic.programs'),
        ],
        [
            'image' => asset('storage/hero-slides/slide-2.jpg'),
            'eyebrow' => 'FASILITAS STANDAR INDUSTRI',
            'title' => 'Pusat Keunggulan Vokasi Otomotif',
            'desc' => 'Menggunakan fasilitas laboratorium yang dirancang menyerupai lingkungan kerja industri otomotif sesungguhnya untuk pengalaman belajar maksimal.',
            'button_primary_text' => 'Lihat Fasilitas',
            'button_primary_url' => route('academic.facilities'),
            'button_secondary_text' => 'Kemitraan Industri',
            'button_secondary_url' => route('partnership.index'),
        ]
    ];

    $dbSlides = $slidesJson ? json_decode($slidesJson, true) : [];
    
    $slides = [];
    if (!empty($dbSlides) && is_array($dbSlides)) {
        foreach ($dbSlides as $index => $slide) {
            $rawImg = $slide['image'] ?? null;
            if (!empty($rawImg)) {
                if (str_starts_with($rawImg, 'http://') || str_starts_with($rawImg, 'https://') || str_starts_with($rawImg, '/')) {
                    $img = $rawImg;
                } else {
                    $img = Storage::url($rawImg);
                }
            } else {
                $img = $defaultSlides[$index % count($defaultSlides)]['image'];
            }

            $slides[] = [
                'image' => $img,
                'eyebrow' => !empty($slide['eyebrow']) ? $slide['eyebrow'] : strtoupper($siteName),
                'title' => !empty($slide['title']) ? $slide['title'] : $siteShortName,
                'desc' => $slide['desc'] ?? '',
                'button_primary_text' => $slide['button_primary_text'] ?? ('Jelajahi ' . $siteShortName),
                'button_primary_url' => $slide['button_primary_url'] ?? route('about'),
                'button_secondary_text' => $slide['button_secondary_text'] ?? 'Program',
                'button_secondary_url' => $slide['button_secondary_url'] ?? route('academic.programs'),
            ];
        }
    } else {
        $slides = $defaultSlides;
    }
?>

<section id="hero-slider" class="relative w-full h-[470px] sm:h-[560px] lg:h-[740px] bg-charcoal-900 overflow-hidden" data-hero-slider aria-label="Hero Image Slider">
    
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
                <div class="absolute inset-0 bg-gradient-to-r from-charcoal-950/95 via-charcoal-900/80 to-charcoal-900/45 sm:to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950/90 via-transparent to-black/30"></div>
                
                <!-- Decorative Elements per slide -->
                <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-bl from-figma-red/10 to-transparent mix-blend-overlay"></div>

                <!-- Text Content inside slide to fade together -->
                <div class="absolute inset-0 z-30 flex items-center">
                    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16 flex flex-col justify-center pt-8 sm:pt-0">
                        <div class="max-w-[720px] <?php echo e($index === 0 ? 'reveal-on-scroll reveal-up' : ''); ?>">
                            <!-- Eyebrow -->
                            <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-4">
                                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                                <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-red uppercase">
                                    <?php echo e($slide['eyebrow']); ?>

                                </span>
                            </div>
                            
                            <!-- H1 / H2 -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index === 0): ?>
                                <h1 class="font-heading font-extrabold text-[22px] sm:text-[36px] md:text-[50px] lg:text-[60px] leading-[1.18] sm:leading-[1.1] tracking-tight sm:tracking-[-1.5px] text-white mb-2.5 sm:mb-5 drop-shadow-sm">
                                    <?php echo e($slide['title']); ?>

                                </h1>
                            <?php else: ?>
                                <h2 class="font-heading font-extrabold text-[22px] sm:text-[36px] md:text-[50px] lg:text-[60px] leading-[1.18] sm:leading-[1.1] tracking-tight sm:tracking-[-1.5px] text-white mb-2.5 sm:mb-5 drop-shadow-sm">
                                    <?php echo e($slide['title']); ?>

                                </h2>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            
                            <!-- Description -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($slide['desc'])): ?>
                                <p class="font-sans font-normal text-[13px] sm:text-[16px] md:text-[18px] leading-[1.5] text-gray-300 mb-4 sm:mb-8 max-w-[580px] line-clamp-2 sm:line-clamp-none">
                                    <?php echo e($slide['desc']); ?>

                                </p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            
                            <!-- CTAs (Ergonomic App-Style Buttons) -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($slide['button_primary_text']) || !empty($slide['button_secondary_text'])): ?>
                                <div class="flex flex-row items-center gap-2.5 sm:gap-4">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($slide['button_primary_text'])): ?>
                                        <a href="<?php echo e($slide['button_primary_url'] ?? '#'); ?>" class="flex-1 sm:flex-initial flex justify-center items-center px-4 sm:px-8 py-2.5 sm:py-4 bg-figma-red text-white font-sans font-bold text-[12px] sm:text-[15px] tracking-tight uppercase rounded-xl sm:rounded-[2px] h-[44px] sm:h-[54px] hover:bg-figma-dark-red transition-all duration-300 focus-ring shadow-md shadow-figma-red/20 active:scale-95 group">
                                            <span><?php echo e($slide['button_primary_text']); ?></span>
                                            <svg class="w-3.5 sm:w-5 h-3.5 sm:h-5 ml-1.5 sm:ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                        </a>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($slide['button_secondary_text'])): ?>
                                        <a href="<?php echo e($slide['button_secondary_url'] ?? '#'); ?>" class="flex-1 sm:flex-initial box-border flex justify-center items-center px-4 sm:px-8 py-2.5 sm:py-4 border border-white/30 sm:border-2 sm:border-white/20 bg-white/10 sm:bg-white/5 backdrop-blur-sm text-white font-sans font-bold text-[12px] sm:text-[15px] tracking-tight uppercase rounded-xl sm:rounded-[2px] h-[44px] sm:h-[54px] hover:bg-white/15 hover:border-white/40 transition-all duration-300 focus-ring active:scale-95">
                                            <span><?php echo e($slide['button_secondary_text']); ?></span>
                                        </a>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    <!-- Decorative Grid & Brackets (Static across slides) -->
    <div class="absolute inset-0 z-20 pointer-events-none opacity-[0.15]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    
    <!-- Top-Left Bracket -->
    <div class="hidden sm:block absolute top-12 left-6 md:left-12 z-20 pointer-events-none w-16 h-16 border-t-2 border-l-2 border-figma-red opacity-50"></div>
    <!-- Bottom-Right Bracket -->
    <div class="hidden sm:block absolute bottom-32 right-6 md:right-12 z-20 pointer-events-none w-16 h-16 border-b-2 border-r-2 border-figma-red opacity-50"></div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($slides) > 1): ?>
        <!-- Slider Controls (Tighter and clean on mobile) -->
        <div class="absolute bottom-0 left-0 w-full z-40 bg-gradient-to-t from-charcoal-950 via-charcoal-950/80 to-transparent pt-4 sm:pt-12 pb-3 sm:pb-8">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16 flex items-center justify-between">
                
                <!-- Dots Indicator -->
                <div class="flex items-center gap-1.5 sm:gap-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button type="button" aria-label="Go to slide <?php echo e($index + 1); ?>" class="hero-dot h-1.5 sm:h-2 rounded-full transition-all duration-300 focus-ring <?php echo e($index === 0 ? 'bg-figma-red w-6 sm:w-8' : 'bg-white/50 w-2 hover:bg-white'); ?>"></button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <!-- Counter & Arrows -->
                <div class="flex items-center gap-3 sm:gap-6">
                    <div class="hidden sm:flex items-baseline gap-1 font-heading text-white">
                        <span class="hero-counter-current text-[18px] sm:text-[20px] font-bold">01</span>
                        <span class="text-[13px] sm:text-[14px] text-gray-500 font-normal">/ 0<?php echo e(count($slides)); ?></span>
                    </div>
                    
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <button type="button" class="hero-prev w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center rounded-full border border-white/20 bg-charcoal-900/50 backdrop-blur-sm text-white hover:bg-figma-red hover:border-figma-red transition-all duration-300 focus-ring active:scale-95" aria-label="Previous Slide">
                            <svg class="w-3.5 sm:w-5 h-3.5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button type="button" class="hero-next w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center rounded-full border border-white/20 bg-charcoal-900/50 backdrop-blur-sm text-white hover:bg-figma-red hover:border-figma-red transition-all duration-300 focus-ring active:scale-95" aria-label="Next Slide">
                            <svg class="w-3.5 sm:w-5 h-3.5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/hero-slider.blade.php ENDPATH**/ ?>