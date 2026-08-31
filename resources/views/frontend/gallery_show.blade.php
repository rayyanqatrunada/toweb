<x-layouts.app 
    :title="$album->title . ' - Galeri'"
    :description="$album->description ? Str::limit(strip_tags($album->description), 150) : 'Dokumentasi Galeri: ' . $album->title"
>
    <!-- Header Page -->
    <div class="bg-charcoal-50 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-200">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-4xl mx-auto reveal-on-scroll reveal-up">
            <span class="inline-block py-1 px-4 bg-primary-100 text-primary-700 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-primary-200 shadow-sm">
                Album Dokumentasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-charcoal-900 mb-6 leading-tight">{{ $album->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-600 text-sm gap-4 md:gap-6 mt-6 font-semibold">
                @if($album->event_date)
                <span class="flex items-center px-4 py-2 bg-white rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->event_date->translatedFormat('d F Y') }}
                </span>
                @endif
                @if($album->location)
                <span class="flex items-center px-4 py-2 bg-white rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $album->location }}
                </span>
                @endif
                <span class="flex items-center px-4 py-2 bg-white rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->items->count() }} Foto
                </span>
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-white border-b border-charcoal-100 hidden md:block">
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

    <article class="bg-white py-16 min-h-[50vh]" x-data="{
        isOpen: false,
        image: '',
        title: '',
        description: '',
        openModal(img, t, d) {
            this.image = img;
            this.title = t;
            this.description = d;
            this.isOpen = true;
        }
    }" 
    x-effect="document.body.style.overflow = isOpen ? 'hidden' : ''"
    @keydown.escape.window="isOpen = false">
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
            
            @if($album->items->isNotEmpty())
                <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
                    @foreach($album->items as $item)
                        <div class="break-inside-avoid relative group rounded-3xl overflow-hidden shadow-sm border border-charcoal-200 bg-charcoal-50 reveal-on-scroll reveal-up">
                            <button type="button" @click.prevent="openModal('{{ Storage::url($item->file_path) }}', @js($item->title ?? $album->title), @js($item->description ?? ''))" class="block h-full w-full text-left focus:outline-none">
                                @if(Storage::disk('public')->exists($item->file_path))
                                    <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->alt_text ?? $item->title ?? $album->title }}" class="w-full h-auto min-h-[250px] max-h-[600px] object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                    <div class="absolute inset-0 bg-charcoal-950/0 group-hover:bg-charcoal-950/30 transition-colors duration-300 flex items-center justify-center pointer-events-none">
                                        <div class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-xl text-primary-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-full h-[250px] bg-gradient-to-br from-charcoal-100 via-charcoal-50 to-charcoal-200 relative overflow-hidden flex flex-col items-center justify-center pointer-events-none">
                                        <!-- Geometric Accents -->
                                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary-100 rounded-full mix-blend-multiply opacity-50 transition-transform duration-700 group-hover:scale-150"></div>
                                        <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-primary-200 rounded-full mix-blend-multiply opacity-50 transition-transform duration-700 group-hover:scale-150"></div>
                                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full flex justify-center text-charcoal-300/40 group-hover:scale-110 transition-transform duration-700">
                                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                                        </div>
                                    </div>
                                @endif
                            </button>
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
            
            <div class="mt-16 pt-12 border-t border-charcoal-100 text-center reveal-on-scroll reveal-up">
                <x-frontend.ui.button href="{{ route('gallery.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Album Galeri
                </x-frontend.ui.button>
            </div>
        </x-frontend.layout.container>

        <!-- The Modal -->
        <div x-show="isOpen" class="fixed inset-0 z-[200] flex items-center justify-center p-4 md:p-8 lg:p-12" style="display: none;">
            <!-- Backdrop -->
            <div x-show="isOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="isOpen = false" 
                 class="absolute inset-0 bg-charcoal-950/90 backdrop-blur-sm cursor-zoom-out"></div>
        
            <!-- Modal Content (Split Layout) -->
            <div x-show="isOpen" 
                 x-transition:enter="transition ease-out duration-300 delay-100"
                 x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                 class="relative bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-6xl max-h-full flex flex-col md:flex-row z-10 border border-charcoal-200/20">
                
                <!-- Close Button -->
                <button @click="isOpen = false" class="absolute top-4 right-4 md:top-6 md:right-6 z-20 w-10 h-10 bg-white/50 hover:bg-white backdrop-blur-md rounded-full flex items-center justify-center text-charcoal-900 transition-colors shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
        
                <!-- Left: Image (2/3 width) -->
                <div class="w-full md:w-2/3 bg-charcoal-50 flex items-center justify-center relative min-h-[300px] md:min-h-[500px]">
                    <!-- Checkboard pattern for transparency or just subtle background -->
                    <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: radial-gradient(#9ca3af 1px, transparent 1px); background-size: 20px 20px;"></div>
                    <img :src="image" :alt="title" class="relative z-10 w-full h-full object-contain max-h-[50vh] md:max-h-[85vh] drop-shadow-2xl">
                </div>
        
                <!-- Right: Content (1/3 width) -->
                <div class="w-full md:w-1/3 p-8 md:p-10 flex flex-col bg-white overflow-y-auto max-h-[40vh] md:max-h-[85vh] border-t md:border-t-0 md:border-l border-charcoal-100">
                    <div class="mb-auto">
                        <span class="inline-flex items-center py-1.5 px-3 bg-primary-50 text-primary-700 rounded-lg text-xs font-extrabold tracking-widest uppercase mb-5 border border-primary-100 shadow-sm">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Informasi Detail
                        </span>
                        
                        <h3 x-text="title" class="text-2xl md:text-3xl font-extrabold text-charcoal-900 mb-6 leading-tight"></h3>
                        
                        <div class="prose prose-sm text-charcoal-600 max-w-none leading-relaxed">
                            <template x-if="description">
                                <p x-text="description"></p>
                            </template>
                            <template x-if="!description">
                                <p class="italic text-charcoal-400">Tidak ada deskripsi tambahan untuk foto ini.</p>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
</x-layouts.app>
