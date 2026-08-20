<x-layouts.app 
    :title="$album->title . ' - Galeri'"
    :description="$album->description ? Str::limit(strip_tags($album->description), 150) : 'Dokumentasi Galeri: ' . $album->title"
>
    <!-- Header Page -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-4xl mx-auto">
            <span class="inline-block py-1 px-4 bg-primary-500/20 text-primary-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-primary-500/30 shadow-sm">
                Album Dokumentasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $album->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-300 text-sm gap-4 md:gap-6 mt-6 font-medium">
                @if($album->event_date)
                <span class="flex items-center px-3 py-1.5 bg-charcoal-800/50 rounded-lg border border-charcoal-700/50">
                    <svg class="w-4 h-4 mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->event_date->translatedFormat('d F Y') }}
                </span>
                @endif
                @if($album->location)
                <span class="flex items-center px-3 py-1.5 bg-charcoal-800/50 rounded-lg border border-charcoal-700/50">
                    <svg class="w-4 h-4 mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $album->location }}
                </span>
                @endif
                <span class="flex items-center px-3 py-1.5 bg-charcoal-800/50 rounded-lg border border-charcoal-700/50">
                    <svg class="w-4 h-4 mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->items->count() }} Foto
                </span>
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="[
                'Galeri' => route('gallery.index'),
                Str::limit($album->title, 30) => '#'
            ]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Kembali' => route('gallery.index')]" />
    </div>

    <article class="bg-white py-16 min-h-[50vh]">
        <x-frontend.layout.container>
            
            @if($album->description)
                <div class="max-w-4xl mx-auto mb-16">
                    <div class="bg-charcoal-50 p-8 md:p-10 rounded-3xl shadow-sm border border-charcoal-100 text-center relative overflow-hidden group">
                        <div class="absolute -left-6 -top-6 text-charcoal-200/50 transform group-hover:-translate-y-2 transition-transform duration-500 pointer-events-none">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5-7l-3 3.72L9 13l-3 4h12l-4-5z"/></svg>
                        </div>
                        <div class="relative z-10">
                            <p class="text-charcoal-700 text-lg md:text-xl leading-relaxed">{{ $album->description }}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            @if($album->items->count() > 0)
                <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
                    @foreach($album->items as $item)
                        <div class="break-inside-avoid relative group rounded-2xl overflow-hidden shadow-sm border border-charcoal-100 bg-charcoal-50">
                            <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="block">
                                <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->alt_text ?? $item->title ?? $album->title }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                <div class="absolute inset-0 bg-charcoal-950/0 group-hover:bg-charcoal-950/30 transition-colors duration-300 flex items-center justify-center">
                                    <div class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-xl text-primary-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                    </div>
                                </div>
                            </a>
                            @if($item->title || $item->description)
                                <div class="absolute bottom-0 left-0 right-0 p-5 bg-gradient-to-t from-charcoal-950/90 via-charcoal-950/60 to-transparent translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                    @if($item->title)<h4 class="font-bold text-white mb-1 line-clamp-1">{{ $item->title }}</h4>@endif
                                    @if($item->description)<p class="text-sm text-charcoal-200 line-clamp-2">{{ $item->description }}</p>@endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-16 text-center">
                    <x-frontend.ui.empty-state 
                        title="Album Kosong" 
                        message="Belum ada foto yang ditambahkan ke dalam album ini." 
                        icon="camera" 
                    />
                </div>
            @endif
            
            <div class="mt-16 pt-8 border-t border-charcoal-100 text-center">
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center justify-center px-8 py-3.5 text-sm font-bold text-charcoal-700 bg-white border-2 border-charcoal-200 rounded-xl hover:bg-charcoal-50 hover:text-primary-600 hover:border-primary-200 transition-all focus:ring-4 focus:ring-charcoal-100 group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Album Galeri
                </a>
            </div>
        </x-frontend.layout.container>
    </article>
</x-layouts.app>
