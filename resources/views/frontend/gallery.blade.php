<x-layouts.app title="Galeri Dokumentasi">
    <!-- Hero Section -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-3xl mx-auto">
            <x-frontend.ui.eyebrow class="text-primary-400 mb-4 justify-center">Documentations</x-frontend.ui.eyebrow>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">Galeri Kegiatan</h1>
            <p class="text-charcoal-300 text-lg lg:text-xl leading-relaxed">
                Rekam jejak visual, dokumentasi praktik, kegiatan belajar mengajar, event jurusan, hingga karya siswa.
            </p>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Galeri Kegiatan' => route('gallery.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Galeri' => route('gallery.index')]" />
    </div>

    <section class="bg-white min-h-[50vh] lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($albums as $album)
                    <a href="{{ route('gallery.show', $album->slug) }}" class="group block h-full">
                        <div class="bg-white border border-charcoal-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:border-charcoal-200 hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative">
                            
                            <!-- Cover Image -->
                            <div class="aspect-[4/3] relative overflow-hidden bg-charcoal-100">
                                @if($album->thumbnail)
                                    <img src="{{ Storage::url($album->thumbnail) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 filter group-hover:contrast-110" loading="lazy">
                                @elseif(isset($album->featuredImage) && $album->featuredImage->file_path)
                                    <img src="{{ Storage::url($album->featuredImage->file_path) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 filter group-hover:contrast-110" loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-charcoal-300">
                                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-charcoal-900/80 via-charcoal-900/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                                
                                <div class="absolute bottom-4 left-4 right-4 flex justify-between items-end">
                                    <div class="bg-white/20 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-lg border border-white/30 flex items-center shadow-lg">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $album->items_count }} Foto
                                    </div>
                                    <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/30 transform translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6 flex flex-col flex-grow">
                                <h2 class="text-xl font-bold text-charcoal-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                    {{ $album->title }}
                                </h2>
                                
                                @if($album->description)
                                    <p class="text-charcoal-500 text-sm line-clamp-2 mb-4 leading-relaxed flex-grow">
                                        {{ strip_tags($album->description) }}
                                    </p>
                                @endif
                                
                                <div class="mt-auto pt-4 border-t border-charcoal-100 flex flex-wrap gap-y-2 gap-x-4 text-xs font-semibold text-charcoal-400">
                                    @if($album->event_date)
                                        <span class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1 text-charcoal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ $album->event_date->translatedFormat('d M Y') }}
                                        </span>
                                    @endif
                                    
                                    @if($album->location)
                                        <span class="flex items-center line-clamp-1">
                                            <svg class="w-3.5 h-3.5 mr-1 text-charcoal-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            {{ Str::limit($album->location, 20) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-16 text-center">
                        <x-frontend.ui.empty-state 
                            title="Galeri Masih Kosong" 
                            message="Belum ada album foto atau dokumentasi kegiatan yang dipublikasikan." 
                            icon="image" 
                        />
                    </div>
                @endforelse
            </div>
            
            @if($albums->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $albums->links() }}
                </div>
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>



