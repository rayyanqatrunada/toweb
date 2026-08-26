@props(['latestNews'])

<section class="w-full bg-white py-24 lg:py-32 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16 md:mb-20 reveal-on-scroll reveal-up">
            <div class="max-w-[600px]">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Berita & Informasi
                    </span>
                </div>
                <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark">
                    Kabar Terbaru dari TBSM
                </h2>
            </div>
            
            <a href="{{ route('news.index') }}" class="group inline-flex items-center gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[16px] uppercase tracking-[-0.5px]">
                <span class="relative">
                    Lihat Semua Berita
                    <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                </span>
                <span class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
            </a>
        </div>

        @if($latestNews && $latestNews->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-on-scroll reveal-up delay-100">
                @foreach($latestNews as $news)
                    <a href="{{ route('news.show', $news->slug) }}" class="flex flex-col group bg-white border border-gray-100 hover:shadow-xl transition-all duration-300 overflow-hidden h-full">
                        
                        <div class="relative aspect-[4/3] bg-gray-200 overflow-hidden">
                            @if($news->thumbnail)
                                <img src="{{ Storage::url($news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                            @endif
                            
                            @if($news->category)
                                <div class="absolute top-4 left-4 bg-figma-red text-white px-3 py-1 font-sans text-[12px] font-bold uppercase tracking-wide">
                                    {{ $news->category->name }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-6 md:p-8 flex flex-col flex-1">
                            <div class="flex items-center gap-2 font-sans text-[13px] text-gray-500 mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                            </div>
                            
                            <h3 class="font-heading font-bold text-[20px] md:text-[22px] text-figma-dark leading-snug mb-3 group-hover:text-figma-red transition-colors line-clamp-2">
                                {{ $news->title }}
                            </h3>
                            
                            <p class="font-sans text-[15px] text-gray-600 line-clamp-3 mb-6 flex-1">
                                {{ Str::limit(strip_tags($news->excerpt ?? $news->content), 120) }}
                            </p>
                            
                            <div class="inline-flex items-center gap-2 text-figma-dark font-sans font-bold text-[14px] uppercase group-hover:text-figma-red transition-colors mt-auto">
                                Baca Selengkapnya <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 p-12 border border-gray-100 flex flex-col items-center justify-center text-center">
                <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <p class="font-sans text-gray-500">Belum ada berita terbaru.</p>
            </div>
        @endif
        
    </div>
</section>
