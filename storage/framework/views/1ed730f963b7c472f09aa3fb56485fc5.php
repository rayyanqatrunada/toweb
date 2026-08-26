<section class="w-full bg-white py-24 lg:py-32 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            
            <!-- Left Content: Text (Asymmetric - narrower) -->
            <div class="w-full lg:w-5/12 flex flex-col items-start z-10 reveal-on-scroll reveal-up">
                
                <!-- Eyebrow -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Tentang TBSM
                    </span>
                </div>
                
                <!-- Heading -->
                <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark mb-6">
                    Tempat Kompetensi Otomotif Dibentuk.
                </h2>
                
                <!-- Red Vertical Accent & Paragraph -->
                <div class="pl-6 border-l-2 border-figma-red mb-8">
                    <p class="font-sans font-normal text-[18px] leading-[1.6] text-figma-gray mb-4">
                        Kami memiliki komitmen penuh untuk membangun ekosistem pendidikan vokasi otomotif yang tidak hanya unggul secara akademis, namun juga adaptif terhadap perkembangan teknologi industri.
                    </p>
                    <p class="font-sans font-normal text-[16px] leading-[1.6] text-gray-500">
                        Melalui pendekatan praktik yang intensif dan kurikulum yang diselaraskan dengan kebutuhan nyata, kami memastikan setiap lulusan siap melangkah pasti ke dunia kerja.
                    </p>
                </div>
                
                <!-- CTA -->
                <a href="<?php echo e(route('about')); ?>" class="group flex items-center gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[16px] uppercase tracking-[-0.5px]">
                    <span class="relative">
                        Pelajari Lebih Lanjut
                        <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                    </span>
                    <span class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

            <!-- Right Content: Image (Asymmetric - wider) -->
            <div class="w-full lg:w-7/12 relative reveal-on-scroll reveal-up delay-200">
                <!-- Decorative Elements behind image -->
                <div class="absolute -top-8 -right-8 w-64 h-64 bg-gray-50 border border-gray-100 -z-10"></div>
                <div class="absolute -bottom-8 -left-8 w-48 h-48 bg-figma-red/5 -z-10"></div>
                
                <!-- Main Image -->
                <div class="relative w-full aspect-[4/3] bg-gray-200 overflow-hidden shadow-2xl shadow-charcoal-900/5">
                    <img src="https://images.unsplash.com/photo-1635831968846-512ce24e930f?q=80&w=1200&auto=format&fit=crop" 
                         alt="Siswa TBSM Praktik" 
                         class="w-full h-full object-cover mix-blend-multiply opacity-90 grayscale hover:grayscale-0 transition-all duration-700" 
                         loading="lazy">
                    
                    <!-- Inner red accent frame -->
                    <div class="absolute inset-0 border-[12px] border-white/10 pointer-events-none"></div>
                </div>
                
                <!-- Floating Stats/Label (Optional visual richness) -->
                <div class="absolute -bottom-6 -left-6 md:-left-12 bg-figma-dark text-white p-6 shadow-xl flex items-center gap-4 reveal-on-scroll reveal-up delay-400">
                    <div class="text-[40px] font-heading font-black leading-none text-figma-red">70%</div>
                    <div class="font-sans text-[14px] uppercase tracking-wider text-gray-300 max-w-[120px] leading-tight">
                        Pembelajaran Praktik
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/frontend/home/intro.blade.php ENDPATH**/ ?>