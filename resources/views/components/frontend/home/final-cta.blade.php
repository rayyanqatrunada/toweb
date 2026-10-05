<section class="w-full bg-figma-dark py-12 sm:py-16 md:py-18 lg:py-22 relative overflow-hidden">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        @php
            $rawCtaBg = $settings->get('homepage_about_image');
            if (!empty($rawCtaBg)) {
                $ctaBgUrl = (str_starts_with($rawCtaBg, 'http://') || str_starts_with($rawCtaBg, 'https://'))
                    ? $rawCtaBg
                    : Storage::url(ltrim(preg_replace('#^storage/#', '', $rawCtaBg), '/'));
            } else {
                $ctaBgUrl = Storage::disk('public')->exists('facilities/bengkel-praktik-otomotif.png')
                    ? Storage::url('facilities/bengkel-praktik-otomotif.png')
                    : 'https://images.unsplash.com/photo-1558981806-ec527fa84c39?q=80&w=1600&auto=format&fit=crop';
            }
        @endphp
        <img src="{{ $ctaBgUrl }}" alt="Background CTA" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-charcoal-950 via-charcoal-900/90 to-charcoal-900/80"></div>
    </div>
    
    <!-- Decorative Grid -->
    <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.05]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    
    <div class="max-w-[1000px] mx-auto px-4 sm:px-8 md:px-16 relative z-20 text-center reveal-on-scroll reveal-up">
        
        <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-2.5 sm:mb-4">
            <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
            <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[2px] sm:tracking-[2.5px] text-figma-red uppercase">
                Bergabung Bersama Kami
            </span>
            <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
        </div>
        
        <h2 class="font-heading font-black text-[22px] sm:text-[32px] md:text-[40px] lg:text-[46px] xl:text-[50px] leading-[1.15] sm:leading-[1.12] tracking-tight sm:tracking-[-1px] text-white mb-3 sm:mb-5 drop-shadow-lg max-w-[850px] mx-auto">
            Siap Menjadi Bagian dari Profesional Otomotif?
        </h2>
        
        <p class="font-sans text-[13px] sm:text-[15px] md:text-[17px] text-gray-300 leading-[1.6] max-w-[680px] mx-auto mb-6 sm:mb-8">
            Mulai langkah suksesmu di industri otomotif dengan pendidikan vokasi yang berstandar tinggi, didukung fasilitas lengkap, dan jaminan kualitas pembelajaran berbasis praktik.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
            <a href="{{ route('contact.index') }}" class="group flex items-center justify-center px-6 sm:px-8 py-3 sm:py-3.5 bg-figma-red text-white font-sans font-bold text-[13px] sm:text-[15px] uppercase tracking-wide rounded-sm sm:rounded-[2px] w-full sm:w-auto hover:bg-figma-dark-red transition-all duration-300 shadow-xl shadow-figma-red/20 focus-ring active:scale-95">
                <span>Hubungi Kami</span>
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            
            <a href="{{ route('academic.programs') }}" class="flex items-center justify-center px-6 sm:px-8 py-3 sm:py-3.5 border-2 border-white/20 bg-white/5 backdrop-blur-sm text-white font-sans font-bold text-[13px] sm:text-[15px] uppercase tracking-wide rounded-sm sm:rounded-[2px] w-full sm:w-auto hover:bg-white/10 hover:border-white/40 transition-all duration-300 focus-ring active:scale-95">
                <span>Pelajari Kurikulum</span>
            </a>
        </div>
        
    </div>
</section>
