<section class="w-full py-8 sm:py-16 md:py-24 lg:py-32 overflow-hidden relative">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        <div class="flex flex-col lg:flex-row items-center gap-6 sm:gap-16 lg:gap-24">
            
            <!-- Left Content: Text -->
            <div class="w-full lg:w-5/12 flex flex-col items-start z-10 reveal-on-scroll reveal-up">
                
                <!-- Eyebrow -->
                <div class="flex items-center gap-2.5 sm:gap-3 mb-2.5 sm:mb-6">
                    <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                        Tentang {{ $settings->get('site_short_name', 'TSM') }}
                    </span>
                </div>
                
                <!-- Heading -->
                <h2 class="font-heading font-extrabold text-[20px] sm:text-[34px] md:text-[48px] leading-[1.2] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark mb-3 sm:mb-6">
                    Tempat Kompetensi Otomotif Dibentuk.
                </h2>
                
                <!-- Red Vertical Accent & Paragraph -->
                <div class="pl-3.5 sm:pl-6 border-l-2 border-figma-red mb-4 sm:mb-8">
                    <p class="font-sans font-normal text-[13px] sm:text-[17px] leading-[1.6] text-figma-gray mb-2 sm:mb-4">
                        Komitmen penuh membangun ekosistem pendidikan vokasi otomotif berstandar industri dengan kurikulum adaptif teknologi modern.
                    </p>
                    <p class="font-sans font-normal text-[12px] sm:text-[15px] leading-[1.6] text-gray-500 hidden sm:block">
                        Melalui pendekatan praktik yang intensif dan kurikulum yang diselaraskan dengan kebutuhan nyata, kami memastikan setiap lulusan siap melangkah pasti ke dunia kerja.
                    </p>
                </div>
                
                <!-- CTA -->
                <a href="{{ route('about') }}" class="group flex items-center gap-2.5 sm:gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[13px] sm:text-[16px] uppercase tracking-tight">
                    <span class="relative">
                        Pelajari Profil Lengkap
                        <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                    </span>
                    <span class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors active:scale-95">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

            <!-- Right Content: Image -->
            <div class="w-full lg:w-7/12 relative reveal-on-scroll reveal-up delay-200 mt-1 sm:mt-0">
                <!-- Decorative Elements behind image -->
                <div class="hidden sm:block absolute -top-8 -right-8 w-64 h-64 bg-gray-50 border border-gray-100 -z-10"></div>
                <div class="hidden sm:block absolute -bottom-8 -left-8 w-48 h-48 bg-figma-red/5 -z-10"></div>
                
                <!-- Main Image Card -->
                <div class="relative w-full aspect-[16/10] sm:aspect-[4/3] bg-gray-200 overflow-hidden shadow-md sm:shadow-2xl shadow-charcoal-900/5 rounded-2xl sm:rounded-none">
                    @php
                        $aboutImage = app(\App\Services\SettingsService::class)->get('homepage_about_image');
                    @endphp
                    <img src="{{ $aboutImage ? Storage::url($aboutImage) : 'https://images.unsplash.com/photo-1635831968846-512ce24e930f?q=80&w=1200&auto=format&fit=crop' }}" 
                         alt="Siswa {{ $settings->get('site_short_name', 'TSM') }} Praktik" 
                         class="w-full h-full object-cover mix-blend-multiply opacity-90 grayscale hover:grayscale-0 transition-all duration-700" 
                         loading="lazy">
                    
                    <!-- Inner accent frame -->
                    <div class="absolute inset-0 border-[6px] sm:border-[12px] border-white/15 pointer-events-none rounded-2xl sm:rounded-none"></div>
                </div>

                <!-- Floating Stats/Label (Placed outside overflow-hidden so it's never clipped) -->
                <div class="absolute bottom-3 left-3 sm:-bottom-6 sm:-left-6 md:-left-8 bg-figma-dark text-white p-2.5 sm:p-5 lg:p-6 shadow-2xl flex items-center gap-2.5 sm:gap-4 rounded-xl sm:rounded-sm z-20">
                    <div class="text-[24px] sm:text-[36px] lg:text-[40px] font-heading font-black leading-none text-figma-red shrink-0">70%</div>
                    <div class="font-sans text-[10px] sm:text-[13px] lg:text-[14px] uppercase tracking-wider text-gray-300 max-w-[85px] sm:max-w-[120px] leading-tight font-medium">
                        Pembelajaran Praktik
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
