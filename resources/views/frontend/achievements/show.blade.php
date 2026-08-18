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
      "@context": "https://schema.org",
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
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <span class="inline-block py-1 px-3 bg-red-500/20 text-red-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-red-500/30">
                Prestasi {{ ucfirst($achievement->level) }}
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $achievement->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    Juara {{ $achievement->rank }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    {{ $achievement->organizer }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $achievement->date ? $achievement->date->translatedFormat('d F Y') : '-' }}
                </span>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Prestasi' => route('achievements.index'),
        Str::limit($achievement->title, 30) => '#'
    ]" />

    <article class="bg-white py-16 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($achievement->photo)
                <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" fetchpriority="high" class="w-full object-cover max-h-[500px]">
                </div>
            @endif

            <div class="prose prose-lg prose-slate max-w-none prose-a:text-red-600 hover:prose-a:text-red-700 prose-img:rounded-xl">
                {!! \App\Support\HtmlSanitizer::clean($achievement->description) !!}
            </div>

            <div class="mt-16 text-center border-t border-slate-100 pt-12">
                <a href="{{ route('achievements.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Prestasi
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>
