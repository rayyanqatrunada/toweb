<x-layouts.app title="Berita & Informasi">
    <!-- Hero Section -->
    <section class="bg-charcoal-950 py-16 lg:py-24 border-b border-charcoal-800 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Berita & Informasi' => route('news.index')]" class="mb-8" />
            
            <x-frontend.ui.eyebrow class="text-charcoal-400">INSTITUTIONAL KNOWLEDGE</x-frontend.ui.eyebrow>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1] mt-4 mb-6">
                Berita &<br class="hidden sm:block"> Informasi Terkini
            </h1>
            <p class="text-lg text-charcoal-300 font-medium leading-relaxed max-w-2xl border-l-2 border-primary-500 pl-4">
                Pembaruan kurikulum, kegiatan akademik, prestasi jurusan, dan wawasan mendalam mengenai industri otomotif masa kini.
            </p>
        </x-frontend.layout.container>
    </section>

    <!-- Content Section -->
    <section class="py-16 lg:py-24 bg-charcoal-50 min-h-[50vh]">
        <x-frontend.layout.container>
            @if($news->isEmpty())
                <div class="py-20 reveal-on-scroll reveal-up">
                    <x-frontend.ui.empty-state title="Belum Ada Berita" message="Konten berita atau pengumuman akademik belum tersedia saat ini." icon="document" />
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                    
                    <!-- Featured Article (First Post) -->
                    @php $featured = $news->first(); @endphp
                    <div class="lg:col-span-12 reveal-on-scroll reveal-up mb-6">
                        <article class="group grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-0 items-stretch bg-white border border-charcoal-200 rounded-3xl overflow-hidden hover:border-charcoal-300 transition-colors duration-500 shadow-sm hover:shadow-md">
                            
                            <!-- Image -->
                            <a href="{{ route('news.show', $featured->slug) }}" class="lg:col-span-3 relative aspect-video md:aspect-auto overflow-hidden block bg-charcoal-100">
                                @if($featured->thumbnail)
                                    <img src="{{ Storage::url($featured->thumbnail) }}" alt="{{ $featured->title }}" class="object-cover w-full h-full grayscale-[15%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" loading="eager">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-charcoal-400">
                                        <svg class="w-16 h-16 mb-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                    </div>
                                @endif
                                
                                @if($featured->category)
                                    <span class="absolute top-6 left-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-primary-600 text-white shadow-sm">
                                            {{ $featured->category->name }}
                                        </span>
                                    </span>
                                @endif
                            </a>
                            
                            <!-- Content -->
                            <div class="lg:col-span-2 p-8 sm:p-10 lg:p-12 flex flex-col justify-center border-l border-charcoal-100 relative">
                                <!-- Subtle accent -->
                                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-charcoal-50 to-transparent opacity-50 pointer-events-none"></div>
                                
                                <div class="flex items-center text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-4">
                                    <svg class="w-4 h-4 mr-2 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>{{ $featured->published_at ? $featured->published_at->translatedFormat('d M Y') : $featured->created_at->translatedFormat('d M Y') }}</span>
                                </div>
                                
                                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight leading-tight mb-5 group-hover:text-primary-600 transition-colors">
                                    <a href="{{ route('news.show', $featured->slug) }}" class="focus:outline-none">{{ $featured->title }}</a>
                                </h2>
                                
                                <p class="text-base text-charcoal-600 leading-relaxed mb-8 line-clamp-3 md:line-clamp-4">
                                    {{ $featured->excerpt ?? Str::limit(strip_tags($featured->content), 180) }}
                                </p>
                                
                                <div class="mt-auto">
                                    <x-frontend.ui.button href="{{ route('news.show', $featured->slug) }}" variant="outline">
                                        Baca Artikel Lengkap
                                    </x-frontend.ui.button>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Regular Articles -->
                    @foreach($news->skip(1) as $post)
                        <div class="lg:col-span-4 reveal-on-scroll reveal-up">
                            <article class="flex flex-col h-full bg-white border border-charcoal-200 rounded-2xl overflow-hidden group hover:border-charcoal-300 transition-colors duration-500 shadow-sm hover:shadow-md">
                                <a href="{{ route('news.show', $post->slug) }}" class="relative aspect-[16/10] overflow-hidden block bg-charcoal-100 focus:outline-none">
                                    @if($post->thumbnail)
                                        <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="object-cover w-full h-full grayscale-[15%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-charcoal-400">
                                            <svg class="w-10 h-10 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                    @endif
                                    
                                    @if($post->category)
                                        <span class="absolute top-4 left-4">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-widest bg-white/90 backdrop-blur-sm text-charcoal-900 border border-charcoal-200 shadow-sm">
                                                {{ $post->category->name }}
                                            </span>
                                        </span>
                                    @endif
                                </a>
                                
                                <div class="p-6 sm:p-8 flex flex-col flex-grow">
                                    <div class="flex items-center text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-4">
                                        <svg class="w-3.5 h-3.5 mr-2 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : $post->created_at->translatedFormat('d M Y') }}
                                    </div>
                                    
                                    <h3 class="text-xl font-extrabold text-charcoal-900 tracking-tight leading-snug mb-4 group-hover:text-primary-600 transition-colors">
                                        <a href="{{ route('news.show', $post->slug) }}" class="focus:outline-none">{{ $post->title }}</a>
                                    </h3>
                                    
                                    <p class="text-sm text-charcoal-600 leading-relaxed mb-6 line-clamp-3">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                    </p>
                                    
                                    <div class="mt-auto pt-4 border-t border-charcoal-100">
                                        <a href="{{ route('news.show', $post->slug) }}" class="inline-flex items-center text-sm font-bold text-primary-600 hover:text-primary-700 transition-colors focus:outline-none">
                                            Baca selengkapnya
                                            <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                @if($news->hasPages())
                    <div class="mt-16 reveal-on-scroll reveal-up">
                        <x-frontend.ui.divider class="mb-10" />
                        <div class="flex justify-center">
                            {{ $news->links() }}
                        </div>
                    </div>
                @endif
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>
