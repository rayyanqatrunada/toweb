<x-layouts.app title="404 - Halaman Tidak Ditemukan" robots="noindex, nofollow">
    <div class="min-h-[70vh] flex items-center justify-center py-16 sm:py-24 px-4 sm:px-6 relative overflow-hidden bg-[#FAFAFA]">
        
        <!-- Background Ambient Accent -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-red-500/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute inset-0 z-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(circle at 2px 2px, #1B1B1E 1px, transparent 0); background-size: 32px 32px;"></div>

        <div class="max-w-xl mx-auto text-center relative z-10 reveal-on-scroll reveal-up">
            
            <!-- Code Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-50 border border-red-200 mb-6">
                <span class="w-2 h-2 rounded-full bg-figma-red animate-ping"></span>
                <span class="font-heading font-black text-xs uppercase tracking-widest text-figma-red">Kesalahan 404</span>
            </div>

            <!-- Big Number -->
            <div class="font-heading font-black text-[72px] sm:text-[110px] md:text-[130px] leading-none tracking-tighter text-figma-dark/90 mb-2">
                4<span class="text-figma-red">0</span>4
            </div>

            <!-- Heading -->
            <h1 class="font-heading font-extrabold text-[24px] sm:text-[32px] text-figma-dark mb-4 leading-snug">
                Halaman yang Anda Cari Tidak Ditemukan
            </h1>

            <!-- Description -->
            <p class="font-sans text-[14px] sm:text-[16px] text-gray-600 leading-relaxed mb-8 max-w-md mx-auto">
                Tautan yang Anda tuju mungkin telah berpindah alamat, dihapus, atau kata kunci pencarian belum tersedia di sistem kami.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-figma-red hover:bg-figma-dark-red text-white font-sans font-bold text-[14px] uppercase tracking-wider rounded-xl transition-all shadow-md shadow-figma-red/20 active:scale-[0.98]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Kembali ke Beranda</span>
                </a>
                <a href="{{ route('contact.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-gray-50 text-figma-dark border border-[#E4E1E5] font-sans font-bold text-[14px] uppercase tracking-wider rounded-xl transition-all shadow-sm active:scale-[0.98]">
                    <span>Hubungi Pengelola</span>
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>
