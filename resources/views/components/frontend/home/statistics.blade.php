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

<section class="w-full bg-charcoal-950 py-6 sm:py-10 md:py-12 lg:py-14 border-y border-charcoal-800">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-5 gap-x-3 sm:gap-6 md:gap-8 lg:gap-10 divide-x-0 md:divide-x md:divide-charcoal-800 reveal-on-scroll reveal-up">
            
            <!-- Stat 1 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-1 sm:px-4 group">
                <div class="font-heading font-black text-[26px] sm:text-[38px] md:text-[44px] lg:text-[48px] xl:text-[52px] leading-none text-white mb-1 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    2011
                </div>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                <div class="font-sans text-[10px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                    Awal Berdiri
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-1 sm:px-4 group">
                <div class="font-heading font-black text-[26px] sm:text-[38px] md:text-[44px] lg:text-[48px] xl:text-[52px] leading-none text-white mb-1 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    {{ $facilityCount }}+
                </div>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                <div class="font-sans text-[10px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                    Fasilitas Praktik
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-1 sm:px-4 group">
                <div class="font-heading font-black text-[26px] sm:text-[38px] md:text-[44px] lg:text-[48px] xl:text-[52px] leading-none text-white mb-1 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    1
                </div>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                <div class="font-sans text-[10px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                    Mitra Industri Utama
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left px-1 sm:px-4 group">
                <div class="font-heading font-black text-[26px] sm:text-[38px] md:text-[44px] lg:text-[48px] xl:text-[52px] leading-none text-white mb-1 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                    {{ $achievementCount }}+
                </div>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                <div class="font-sans text-[10px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                    Prestasi Diraih
                </div>
            </div>

        </div>

    </div>
</section>
