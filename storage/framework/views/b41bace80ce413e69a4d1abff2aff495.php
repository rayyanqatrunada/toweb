<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'alumniCount' => 0,
    'partnerCount' => 0,
    'achievementCount' => 0,
    'facilityCount' => 0
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
    'alumniCount' => 0,
    'partnerCount' => 0,
    'achievementCount' => 0,
    'facilityCount' => 0
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!-- We will use a JS function to animate the counters when they scroll into view. 
     Instead of writing complex JS, we can just use CSS counters or simple JS. 
     I'll add the data attributes and let home.js handle it if possible, 
     but keeping it simple: just show the numbers clearly. -->

<section class="w-full bg-charcoal-950 py-16 lg:py-24 border-y border-charcoal-800">
    <div class="max-w-[1440px] mx-auto px-6 md:px-16">
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 divide-x-0 md:divide-x md:divide-charcoal-800 reveal-on-scroll reveal-up">
            
            <!-- Stat 1 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-4 group">
                <div class="font-heading font-black text-[48px] lg:text-[64px] leading-none text-white mb-2 group-hover:text-figma-red transition-colors duration-300">
                    2011
                </div>
                <div class="w-8 h-[2px] bg-figma-red mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[14px] uppercase tracking-[1px] text-gray-400">
                    Awal Perkembangan
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-4 group">
                <div class="font-heading font-black text-[48px] lg:text-[64px] leading-none text-white mb-2 group-hover:text-figma-red transition-colors duration-300">
                    <?php echo e($facilityCount); ?>+
                </div>
                <div class="w-8 h-[2px] bg-figma-red mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[14px] uppercase tracking-[1px] text-gray-400">
                    Fasilitas Praktik
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-4 group">
                <div class="font-heading font-black text-[48px] lg:text-[64px] leading-none text-white mb-2 group-hover:text-figma-red transition-colors duration-300">
                    1
                </div>
                <div class="w-8 h-[2px] bg-figma-red mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[14px] uppercase tracking-[1px] text-gray-400">
                    Mitra Industri Utama
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-4 group">
                <div class="font-heading font-black text-[48px] lg:text-[64px] leading-none text-white mb-2 group-hover:text-figma-red transition-colors duration-300">
                    <?php echo e($achievementCount); ?>+
                </div>
                <div class="w-8 h-[2px] bg-figma-red mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[14px] uppercase tracking-[1px] text-gray-400">
                    Prestasi Diraih
                </div>
            </div>

        </div>

    </div>
</section>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/statistics.blade.php ENDPATH**/ ?>