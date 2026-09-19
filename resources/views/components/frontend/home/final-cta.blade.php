<section class="w-full bg-figma-dark py-14 sm:py-20 lg:py-32 relative overflow-hidden">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1599252251347-1f4869c45bf9?q=80&w=1920&auto=format&fit=crop" alt="Background CTA" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-charcoal-950 via-charcoal-900/90 to-charcoal-900/80"></div>
    </div>
    
    <!-- Decorative Grid -->
    <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.05]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    
    <div class="max-w-[1000px] mx-auto px-5 sm:px-8 md:px-16 relative z-20 text-center reveal-on-scroll reveal-up">
        
        <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-4 sm:mb-6">
            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
            <span class="font-sans font-bold text-[12px] sm:text-[16px] leading-none tracking-[2px] sm:tracking-[3px] text-figma-red uppercase">
                Bergabung Bersama Kami
            </span>
            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
        </div>
        
        <h2 class="font-heading font-black text-[24px] sm:text-[36px] md:text-[52px] lg:text-[72px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-2px] text-white mb-4 sm:mb-8 drop-shadow-lg">
            Siap Menjadi Bagian dari Profesional Otomotif?
        </h2>
        
        <p class="font-sans text-[14px] sm:text-[18px] md:text-[22px] text-gray-300 leading-[1.6] max-w-[760px] mx-auto mb-8 sm:mb-12">
            Mulai langkah suksesmu di industri otomotif dengan pendidikan vokasi yang berstandar tinggi, didukung fasilitas lengkap, dan jaminan kualitas pembelajaran berbasis praktik.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5 sm:gap-6">
            <a href="{{ route('about') }}#contact" class="group flex items-center justify-center px-6 sm:px-10 py-3.5 sm:py-5 bg-figma-red text-white font-sans font-bold text-[14px] sm:text-[16px] md:text-[18px] uppercase tracking-wide rounded-[2px] w-full sm:w-auto hover:bg-figma-dark-red transition-all duration-300 shadow-xl shadow-figma-red/20 focus-ring">
                <span>Hubungi Kami</span>
                <svg class="w-4 sm:w-5 h-4 sm:h-5 ml-2.5 sm:ml-3 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            
            <a href="{{ route('academic.programs') }}" class="flex items-center justify-center px-6 sm:px-10 py-3.5 sm:py-5 border-2 border-white/20 bg-white/5 backdrop-blur-sm text-white font-sans font-bold text-[14px] sm:text-[16px] md:text-[18px] uppercase tracking-wide rounded-[2px] w-full sm:w-auto hover:bg-white/10 hover:border-white/40 transition-all duration-300 focus-ring">
                <span>Pelajari Kurikulum</span>
            </a>
        </div>
        
    </div>
</section>
