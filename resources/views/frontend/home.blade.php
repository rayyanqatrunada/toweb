<x-layouts.app title="Beranda">
    <!-- Hero Section -->
    <section class="relative bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center opacity-30 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
        
        <div class="relative max-w-screen-xl mx-auto px-4 py-24 lg:py-32 flex flex-col items-center text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-300 text-sm font-semibold tracking-wider mb-6 border border-blue-500/30 backdrop-blur-sm">
                PROGRAM KEAHLIAN UNGGULAN
            </span>
            <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-7xl">
                Cetak Mekanik Handal & <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Siap Hadapi Industri Modern</span>
            </h1>
            <p class="mb-10 text-lg font-normal text-slate-300 lg:text-xl sm:px-16 lg:px-48 max-w-4xl">
                Bergabunglah bersama kami di Teknik Otomotif. Kami mendidik siswa menjadi profesional di bidang otomotif dengan fasilitas praktek standar industri, kurikulum berbasis project, dan penyaluran kerja yang terjamin.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ route('about') }}" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-900 transition-all shadow-lg shadow-blue-600/30">
                    Pelajari Selengkapnya
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="{{ route('partnership') }}" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-white rounded-lg border border-slate-600 hover:bg-slate-800 focus:ring-4 focus:ring-slate-900 backdrop-blur-sm transition-all">
                    Lihat Mitra Industri
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="py-16 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Berita Terbaru</h2>
                    <p class="mt-2 text-slate-500">Informasi dan kabar terkini dari jurusan kami.</p>
                </div>
                <a href="{{ route('news.index') }}" class="hidden sm:inline-flex items-center font-medium text-blue-600 hover:text-blue-700">
                    Lihat semua berita
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestNews as $post)
                    <article class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden group flex flex-col h-full">
                        <a href="{{ route('news.show', $post->slug) }}" class="relative h-56 overflow-hidden bg-slate-100 block">
                            @if($post->thumbnail)
                                <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            @if($post->category)
                                <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">{{ $post->category->name }}</span>
                            @endif
                        </a>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center text-sm text-slate-500 mb-3 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 leading-tight group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-600 mb-4 line-clamp-3">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}</p>
                            <div class="mt-auto pt-4 border-t border-slate-100">
                                <a href="{{ route('news.show', $post->slug) }}" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800">
                                    Baca selengkapnya
                                    <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500 bg-slate-50 rounded-xl border border-slate-100">
                        Belum ada berita yang dipublikasikan.
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8 text-center sm:hidden">
                <a href="{{ route('news.index') }}" class="inline-flex justify-center items-center py-2.5 px-5 text-sm font-medium text-slate-900 bg-white rounded-lg border border-slate-200 hover:bg-slate-100 hover:text-blue-700">
                    Lihat semua berita
                </a>
            </div>
        </div>
    </section>

    <!-- Industry Partners Preview Section -->
    <section class="py-16 bg-slate-50 border-y border-slate-200">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold text-slate-900 mb-8 tracking-tight">Mitra Industri Terkemuka Kami</h2>
            
            @if($partners->count() > 0)
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 hover:opacity-100 transition-opacity duration-300">
                    @foreach($partners as $partner)
                        <div class="flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300 group cursor-pointer" title="{{ $partner->name }}">
                            @if($partner->logo)
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-12 md:h-16 object-contain max-w-[150px]">
                            @else
                                <span class="text-xl font-bold text-slate-400 group-hover:text-blue-600">{{ $partner->name }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-slate-500">Data mitra industri belum tersedia.</p>
            @endif
            
            <div class="mt-12">
                <a href="{{ route('partnership') }}" class="inline-flex justify-center items-center font-medium text-slate-500 hover:text-blue-600">
                    Lihat program kemitraan dan lowongan kerja (BKK)
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
