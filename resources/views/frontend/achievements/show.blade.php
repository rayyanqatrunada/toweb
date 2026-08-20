<x-layouts.app 
    :title="$achievement->title"
    :description="Str::limit(strip_tags($achievement->description), 150)"
    :canonical="route('achievements.show', $achievement->slug)"
    :ogImage="$achievement->photo ? Storage::url($achievement->photo) : null"
    ogType="article"
>
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{ $achievement->title }}",
      "image": [
        "{{ $achievement->photo ? Storage::url($achievement->photo) : url('/default-image.jpg') }}"
       ],
      "datePublished": "{{ $achievement->date ? $achievement->date->toIso8601String() : $achievement->created_at->toIso8601String() }}",
      "dateModified": "{{ $achievement->updated_at->toIso8601String() }}"
    }
    </script>
    @endpush

    <!-- Header Page -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-4xl mx-auto">
            <div class="flex justify-center mb-6">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black tracking-widest uppercase bg-amber-500/20 text-amber-400 border border-amber-500/30 shadow-sm shadow-amber-900/50">
                    PRESTASI TINGKAT {{ strtoupper($achievement->level) }}
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white mb-8 leading-[1.15] tracking-tight">{{ $achievement->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-300 text-sm gap-y-4 gap-x-4 md:gap-x-6 mt-6">
                <!-- Rank -->
                <div class="flex items-center font-bold text-amber-400 bg-amber-950/40 px-4 py-2.5 rounded-xl border border-amber-900/50 shadow-inner">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    JUARA {{ strtoupper($achievement->rank) }}
                </div>
                
                <!-- Organizer -->
                <div class="flex items-center font-medium bg-charcoal-900/60 px-4 py-2.5 rounded-xl border border-charcoal-800">
                    <svg class="w-5 h-5 mr-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="line-clamp-1 max-w-[200px] sm:max-w-xs" title="{{ $achievement->organizer }}">{{ $achievement->organizer }}</span>
                </div>
                
                <!-- Date -->
                <div class="flex items-center font-medium bg-charcoal-900/60 px-4 py-2.5 rounded-xl border border-charcoal-800">
                    <svg class="w-5 h-5 mr-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $achievement->date ? $achievement->date->translatedFormat('d F Y') : '-' }}
                </div>
            </div>
        </x-frontend.layout.container>
    </div>

    @php
        $breadcrumbs = [
            'Prestasi & Penghargaan' => route('achievements.index'),
            Str::limit($achievement->title, 30) => '#'
        ];
    @endphp
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="$breadcrumbs" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="$breadcrumbs" />
    </div>

    <article class="bg-white py-12 lg:py-20 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($achievement->photo)
                <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl shadow-amber-900/10 border-4 border-amber-50 relative group">
                    <!-- Subtle Gold Ribbon Overlay on image -->
                    <div class="absolute -right-12 top-8 rotate-45 bg-amber-500 text-amber-950 font-black text-xs tracking-widest uppercase py-1.5 px-16 shadow-lg z-20 pointer-events-none group-hover:scale-110 transition-transform duration-500">
                        JUARA {{ $achievement->rank }}
                    </div>
                    
                    <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" fetchpriority="high" class="w-full object-cover max-h-[600px]" loading="eager">
                </div>
            @endif

            <div class="prose prose-lg md:prose-xl prose-slate max-w-none prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-p:leading-relaxed prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-img:rounded-2xl prose-img:shadow-md">
                @if(!empty(trim(strip_tags($achievement->description))))
                    {!! \App\Support\HtmlSanitizer::clean($achievement->description) !!}
                @else
                    <p class="text-charcoal-400 italic text-center text-lg py-8">Tidak ada deskripsi detail tambahan mengenai prestasi ini.</p>
                @endif
            </div>

            <div class="mt-16 text-center reveal-on-scroll reveal-up border-t border-charcoal-100 pt-12">
                <x-frontend.ui.button href="{{ route('achievements.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Prestasi
                </x-frontend.ui.button>
            </div>
            
        </div>
    </article>
</x-layouts.app>
