<section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 overflow-hidden relative">
    <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-16">
        <div class="flex flex-col lg:flex-row items-center gap-10 sm:gap-16 lg:gap-24">
            
            <!-- Left Content: Text (Asymmetric - narrower) -->
            <div class="w-full lg:w-5/12 flex flex-col items-start z-10 reveal-on-scroll reveal-up">
                
                <!-- Eyebrow -->
                <div class="flex items-center gap-3 mb-4 sm:mb-6">
                    <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Tentang TBSM
                    </span>
                </div>
                
                <!-- Heading -->
                <h2 class="font-heading font-extrabold text-[26px] sm:text-[34px] md:text-[48px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark mb-4 sm:mb-6">
                    Tempat Kompetensi Otomotif Dibentuk.
                </h2>
                
                <!-- Red Vertical Accent & Paragraph -->
                <div class="pl-4 sm:pl-6 border-l-2 border-figma-red mb-6 sm:mb-8">
                    <p class="font-sans font-normal text-[15px] sm:text-[18px] leading-[1.6] text-figma-gray mb-3 sm:mb-4">
                        Kami memiliki komitmen penuh untuk membangun ekosistem pendidikan vokasi otomotif yang tidak hanya unggul secara akademis, namun juga adaptif terhadap perkembangan teknologi industri.
                    </p>
                    <p class="font-sans font-normal text-[14px] sm:text-[16px] leading-[1.6] text-gray-500">
                        Melalui pendekatan praktik yang intensif dan kurikulum yang diselaraskan dengan kebutuhan nyata, kami memastikan setiap lulusan siap melangkah pasti ke dunia kerja.
                    </p>
                </div>
                
                <!-- CTA -->
                <a href="{{ route('about') }}" class="group flex items-center gap-3 sm:gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[14px] sm:text-[16px] uppercase tracking-[-0.5px]">
                    <span class="relative">
                        Pelajari Lebih Lanjut
                        <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                    </span>
                    <span class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

            <!-- Right Content: Image (Asymmetric - wider) -->
            <div class="w-full lg:w-7/12 relative reveal-on-scroll reveal-up delay-200 mt-2 sm:mt-0">
                <!-- Decorative Elements behind image -->
                <div class="hidden sm:block absolute -top-8 -right-8 w-64 h-64 bg-gray-50 border border-gray-100 -z-10"></div>
                <div class="hidden sm:block absolute -bottom-8 -left-8 w-48 h-48 bg-figma-red/5 -z-10"></div>
                
                <!-- Main Image -->
                <div class="relative w-full aspect-[4/3] bg-gray-200 overflow-hidden shadow-xl sm:shadow-2xl shadow-charcoal-900/5 rounded-lg sm:rounded-none">
                    @php
                        $aboutImage = app(\App\Services\SettingsService::class)->get('homepage_about_image');
                    @endphp
                    <img src="{{ $aboutImage ? Storage::url($aboutImage) : 'https://images.unsplash.com/photo-1635831968846-512ce24e930f?q=80&w=1200&auto=format&fit=crop' }}" 
                         alt="Siswa TBSM Praktik" 
                         class="w-full h-full object-cover mix-blend-multiply opacity-90 grayscale hover:grayscale-0 transition-all duration-700" 
                         loading="lazy">
                    
                    <!-- Inner red accent frame -->
                    <div class="absolute inset-0 border-[8px] sm:border-[12px] border-white/10 pointer-events-none"></div>

                    <!-- Floating Stats/Label (Positioned safely on mobile) -->
                    <div class="absolute bottom-3 left-3 sm:-bottom-6 sm:-left-6 md:-left-12 bg-figma-dark text-white p-3.5 sm:p-6 shadow-xl flex items-center gap-3 sm:gap-4 reveal-on-scroll reveal-up delay-400 rounded-sm">
                        <div class="text-[30px] sm:text-[40px] font-heading font-black leading-none text-figma-red">70%</div>
                        <div class="font-sans text-[11px] sm:text-[14px] uppercase tracking-wider text-gray-300 max-w-[100px] sm:max-w-[120px] leading-tight">
                            Pembelajaran Praktik
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
