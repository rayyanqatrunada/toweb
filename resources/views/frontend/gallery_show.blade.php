<x-layouts.app 
    :title="$album->title . ' - Galeri'"
    :description="$album->description ? Str::limit(strip_tags($album->description), 150) : 'Dokumentasi Galeri: ' . $album->title"
>
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
            <span class="inline-block py-1 px-3 bg-red-500/20 text-red-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-red-500/30">
                Album Dokumentasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $album->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                @if($album->event_date)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->event_date->translatedFormat('d F Y') }}
                </span>
                @endif
                @if($album->location)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $album->location }}
                </span>
                @endif
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->items->count() }} Foto
                </span>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Galeri' => route('gallery.index'),
        Str::limit($album->title, 30) => '#'
    ]" />

    <article class="bg-slate-50 py-16 min-h-[50vh]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($album->description)
                <div class="max-w-4xl mx-auto mb-12">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 text-center">
                        <div class="w-12 h-12 mx-auto bg-red-50 text-red-500 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed">{{ $album->description }}</p>
                    </div>
                </div>
            @endif
            
            @if($album->items->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($album->items as $item)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group flex flex-col h-full">
                            <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="block relative aspect-w-4 aspect-h-3 overflow-hidden bg-slate-100 flex-grow">
                                <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->alt_text ?? $item->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors duration-300 flex items-center justify-center">
                                    <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-lg">
                                        <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                    </div>
                                </div>
                            </a>
                            @if($item->title || $item->description)
                                <div class="p-5 border-t border-slate-100">
                                    @if($item->title)<h4 class="font-bold text-slate-900 mb-1 line-clamp-1">{{ $item->title }}</h4>@endif
                                    @if($item->description)<p class="text-sm text-slate-500 line-clamp-2">{{ $item->description }}</p>@endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <x-empty-state 
                    icon="camera" 
                    title="Album Kosong" 
                    description="Belum ada foto yang ditambahkan ke dalam album ini." 
                />
            @endif
            
            <div class="mt-16 pt-8 border-t border-slate-200 text-center">
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Album Galeri
                </a>
            </div>
        </div>
    </article>
</x-layouts.app>
