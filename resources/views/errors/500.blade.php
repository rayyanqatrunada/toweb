<x-layouts.app title="500 - Gangguan Server" robots="noindex, nofollow">
    <div class="min-h-[70vh] flex items-center justify-center py-16 sm:py-24 px-4 sm:px-6 relative overflow-hidden bg-[#FAFAFA]">
        
        <!-- Background Ambient Accent -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-amber-500/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute inset-0 z-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(circle at 2px 2px, #1B1B1E 1px, transparent 0); background-size: 32px 32px;"></div>

        <div class="max-w-xl mx-auto text-center relative z-10 reveal-on-scroll reveal-up">
            
            <!-- Code Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-50 border border-amber-200 mb-6">
                <span class="w-2 h-2 rounded-full bg-amber-600 animate-pulse"></span>
                <span class="font-heading font-black text-xs uppercase tracking-widest text-amber-700">Kendala Server 500</span>
            </div>

            <!-- Big Number -->
            <div class="font-heading font-black text-[72px] sm:text-[110px] md:text-[130px] leading-none tracking-tighter text-figma-dark/90 mb-2">
                5<span class="text-amber-600">0</span>0
            </div>

            <!-- Heading -->
            <h1 class="font-heading font-extrabold text-[24px] sm:text-[32px] text-figma-dark mb-4 leading-snug">
                Terjadi Kendala Teknis Sementara
            </h1>

            <!-- Description -->
            <p class="font-sans text-[14px] sm:text-[16px] text-gray-600 leading-relaxed mb-8 max-w-md mx-auto">
                Server kami sedang mengalami gangguan pemrosesan data. Tim teknis telah menerima catatan sistem dan sedang melakukan pemulihan.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button type="button" onclick="window.location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-figma-red hover:bg-figma-dark-red text-white font-sans font-bold text-[14px] uppercase tracking-wider rounded-xl transition-all shadow-md shadow-figma-red/20 active:scale-[0.98]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span>Muat Ulang Halaman</span>
                </button>
                <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-gray-50 text-figma-dark border border-[#E4E1E5] font-sans font-bold text-[14px] uppercase tracking-wider rounded-xl transition-all shadow-sm active:scale-[0.98]">
                    <span>Kembali ke Beranda</span>
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>
