@props([
    'alumniCount' => 0,
    'partnerCount' => 0,
    'achievementCount' => 0,
    'facilityCount' => 0
])

<!-- We will use a JS function to animate the counters when they scroll into view. 
     Instead of writing complex JS, we can just use CSS counters or simple JS. 
     I'll add the data attributes and let home.js handle it if possible, 
     but keeping it simple: just show the numbers clearly. -->

<section class="w-full bg-charcoal-950 py-10 sm:py-16 lg:py-24 border-y border-charcoal-800">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-4 sm:gap-8 md:gap-12 divide-x-0 md:divide-x md:divide-charcoal-800 reveal-on-scroll reveal-up">
            
            <!-- Stat 1 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                <div class="font-heading font-black text-[34px] sm:text-[48px] lg:text-[64px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    2011
                </div>
                <div class="w-6 sm:w-8 h-[2px] bg-figma-red mb-2 sm:mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[11px] sm:text-[14px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400">
                    Awal Perkembangan
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                <div class="font-heading font-black text-[34px] sm:text-[48px] lg:text-[64px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    {{ $facilityCount }}+
                </div>
                <div class="w-6 sm:w-8 h-[2px] bg-figma-red mb-2 sm:mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[11px] sm:text-[14px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400">
                    Fasilitas Praktik
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                <div class="font-heading font-black text-[34px] sm:text-[48px] lg:text-[64px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    1
                </div>
                <div class="w-6 sm:w-8 h-[2px] bg-figma-red mb-2 sm:mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[11px] sm:text-[14px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400">
                    Mitra Industri Utama
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                <div class="font-heading font-black text-[34px] sm:text-[48px] lg:text-[64px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    {{ $achievementCount }}+
                </div>
                <div class="w-6 sm:w-8 h-[2px] bg-figma-red mb-2 sm:mb-3 mx-auto md:mx-0"></div>
                <div class="font-sans text-[11px] sm:text-[14px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400">
                    Prestasi Diraih
                </div>
            </div>

        </div>

    </div>
</section>
