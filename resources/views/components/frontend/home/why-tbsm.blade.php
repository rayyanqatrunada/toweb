<section class="w-full py-8 sm:py-16 md:py-24 lg:py-32 overflow-hidden relative">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center text-center mb-6 sm:mb-16 md:mb-24 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-4">
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                    Keunggulan Program
                </span>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[20px] sm:text-[34px] md:text-[48px] leading-[1.2] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[720px]">
                Mengapa Memilih {{ $settings->get('site_short_name', 'TSM') }}?
            </h2>
            <!-- Mobile Swipe Hint -->
            <p class="md:hidden text-[11px] text-gray-400 font-medium mt-1.5 flex items-center gap-1">
                <span>Geser ke samping untuk melihat keunggulan</span>
                <svg class="w-3.5 h-3.5 text-figma-red animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </p>
        </div>

        <!-- Mobile: Horizontal Snap Carousel | Desktop: Asymmetric Grid -->
        <div class="flex md:grid md:grid-cols-12 gap-3.5 sm:gap-6 lg:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-3 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 scrollbar-none">
            
            <!-- Item 1: Large Image Block -->
            <div class="w-[84vw] max-w-[320px] md:w-auto md:max-w-none shrink-0 snap-center md:col-span-8 group relative bg-white border border-gray-200 rounded-sm md:rounded-none overflow-hidden reveal-on-scroll reveal-up flex flex-col md:flex-row shadow-sm md:shadow-none">
                <div class="w-full md:w-1/2 aspect-[16/10] md:aspect-auto md:min-h-[320px] relative overflow-hidden bg-gray-100 shrink-0">
                    <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=800&auto=format&fit=crop" alt="Praktik Langsung" class="w-full h-full object-cover grayscale mix-blend-multiply opacity-85 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" loading="lazy">
                </div>
                <div class="p-5 sm:p-8 md:p-12 flex flex-col justify-center flex-1">
                    <div class="text-figma-red font-heading font-black text-[28px] sm:text-[40px] leading-none mb-1.5 sm:mb-4 opacity-60">01</div>
                    <h3 class="font-heading font-bold text-[17px] sm:text-[24px] text-figma-dark mb-1.5 sm:mb-3">Pembelajaran Praktik 70%</h3>
                    <p class="font-sans text-[13px] sm:text-[16px] text-gray-600 leading-[1.55] sm:leading-[1.6]">
                        Porsi praktik dirancang dominan. Setiap siswa mendapatkan jam terbang tinggi membongkar, merakit, dan mendiagnosa motor secara langsung.
                    </p>
                </div>
                <div class="absolute top-0 left-0 w-12 h-1 bg-figma-red z-20"></div>
            </div>

            <!-- Item 2: Vertical Card -->
            <div class="w-[84vw] max-w-[320px] md:w-auto md:max-w-none shrink-0 snap-center md:col-span-4 flex flex-col justify-between p-5 sm:p-8 md:p-10 bg-charcoal-950 text-white rounded-sm md:rounded-none relative overflow-hidden reveal-on-scroll reveal-up delay-100 group shadow-sm md:shadow-none">
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-figma-red rounded-full opacity-10 group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                <div class="text-figma-red/60 font-heading font-black text-[28px] sm:text-[40px] leading-none mb-4 md:mb-auto">02</div>
                <div class="mt-2 md:mt-16">
                    <h3 class="font-heading font-bold text-[17px] sm:text-[24px] mb-1.5 sm:mb-3 text-white">Kompetensi Menyeluruh</h3>
                    <p class="font-sans text-[13px] sm:text-[16px] text-gray-400 leading-[1.55] sm:leading-[1.6]">
                        Dari perawatan mesin konvensional, injeksi EFI mutakhir, sasis, hingga sistem kelistrikan pintar standar pabrikan Honda.
                    </p>
                </div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-figma-red"></div>
            </div>

            <!-- Item 3: Solid Accent Card -->
            <div class="w-[84vw] max-w-[320px] md:w-auto md:max-w-none shrink-0 snap-center md:col-span-5 flex flex-col justify-between p-5 sm:p-8 md:p-10 bg-figma-red text-white rounded-sm md:rounded-none relative overflow-hidden reveal-on-scroll reveal-up delay-100 shadow-sm md:shadow-none">
                <div class="text-white/40 font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4">03</div>
                <div>
                    <h3 class="font-heading font-bold text-[17px] sm:text-[24px] mb-1.5 sm:mb-3">Koneksi Industri AHM</h3>
                    <p class="font-sans text-[13px] sm:text-[16px] text-white/95 leading-[1.55] sm:leading-[1.6]">
                        Program kelas industri dan sinkronisasi kurikulum dengan PT Astra Honda Motor memastikan materi pembelajaran selalu relevan dengan SOP AHASS.
                    </p>
                </div>
                <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
            </div>

            <!-- Item 4: Minimalist Block -->
            <div class="w-[84vw] max-w-[320px] md:w-auto md:max-w-none shrink-0 snap-center md:col-span-7 flex flex-col-reverse md:flex-row items-center bg-white border border-gray-200 rounded-sm md:rounded-none overflow-hidden reveal-on-scroll reveal-up delay-200 group shadow-sm md:shadow-none">
                <div class="p-5 sm:p-8 md:p-12 w-full md:w-2/3">
                    <div class="text-gray-200 font-heading font-black text-[28px] sm:text-[40px] leading-none mb-1.5 sm:mb-4">04</div>
                    <h3 class="font-heading font-bold text-[17px] sm:text-[24px] text-figma-dark mb-1.5 sm:mb-3">Kesiapan Kerja & Wirausaha</h3>
                    <p class="font-sans text-[13px] sm:text-[16px] text-gray-600 leading-[1.55] sm:leading-[1.6]">
                        Lulusan dibekali etos kerja disiplin, sertifikasi BNSP, dan kemampuan manajerial untuk siap bekerja di bengkel resmi maupun membuka bengkel mandiri.
                    </p>
                </div>
                <div class="w-full md:w-1/3 aspect-[16/9] md:aspect-auto md:h-full bg-gray-100 overflow-hidden relative shrink-0">
                    <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover mix-blend-multiply grayscale opacity-75 group-hover:grayscale-0 transition-all duration-500" alt="Kesiapan Kerja" loading="lazy">
                </div>
            </div>

    </div>
</section>
