@props(['galleries'])

<section class="w-full py-8 sm:py-16 md:py-24 lg:py-32 overflow-hidden border-t border-gray-100 relative">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        
        <div class="flex flex-col items-center text-center mb-6 sm:mb-12 md:mb-16 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-2.5 sm:gap-3 mb-2 sm:mb-4">
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                    Galeri Dokumentasi
                </span>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[20px] sm:text-[34px] md:text-[48px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[720px]">
                Jejak Aktivitas & Karya Siswa
            </h2>
        </div>

        @if($galleries && $galleries->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2.5 sm:gap-6 reveal-on-scroll reveal-up delay-100">
                @foreach($galleries as $gallery)
                    <a href="{{ route('gallery.show', $gallery->slug) }}" class="block relative group overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 bg-charcoal-900 rounded-sm sm:rounded-none aspect-[4/3] sm:aspect-square active:scale-[0.98]">
                        <img src="{{ $gallery->thumbnail ? Storage::url($gallery->thumbnail) : 'https://images.unsplash.com/photo-1517520286882-73bc410d29ce?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-90" loading="lazy">
                        
                        <!-- Gradient Overlay (Always softly visible on mobile for readable text, intensified on desktop hover) -->
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950/90 via-charcoal-950/30 to-transparent sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="absolute bottom-0 left-0 w-full p-2.5 sm:p-5 sm:translate-y-2 sm:opacity-0 sm:group-hover:translate-y-0 sm:group-hover:opacity-100 transition-all duration-300 z-10">
                            <h3 class="font-heading font-bold text-[12px] sm:text-[16px] text-white leading-tight mb-0.5 sm:mb-1 line-clamp-2">{{ $gallery->title }}</h3>
                            <div class="flex items-center gap-1.5 font-sans text-[9px] sm:text-[12px] text-gray-300">
                                <span>{{ $gallery->items ? $gallery->items->count() : 0 }} Foto</span>
                                <span>&bull;</span>
                                <span>{{ $gallery->published_at ? $gallery->published_at->format('M Y') : $gallery->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <div class="mt-6 sm:mt-12 md:mt-16 text-center">
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center justify-center w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-3.5 border-2 border-figma-dark text-figma-dark font-sans font-bold text-[13px] sm:text-[14px] uppercase tracking-wide hover:bg-figma-dark hover:text-white transition-colors focus-ring rounded-sm sm:rounded-[2px] active:scale-95">
                    Lihat Seluruh Galeri
                </a>
            </div>
        @else
            <div class="bg-white p-6 sm:p-12 border border-gray-200 flex flex-col items-center justify-center text-center shadow-sm rounded-sm sm:rounded-none">
                <svg class="w-8 h-8 sm:w-12 sm:h-12 text-gray-300 mb-2 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="font-sans text-gray-500 text-sm">Galeri foto belum tersedia.</p>
            </div>
        @endif
        
    </div>
</section>
