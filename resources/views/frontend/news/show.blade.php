<x-layouts.app 
    :title="$post->title"
    :description="Str::limit(strip_tags($post->content), 150)"
    :canonical="route('news.show', $post->slug)"
    :ogImage="$post->thumbnail ? Storage::url($post->thumbnail) : null"
    ogType="article"
>
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "{{ $post->title }}",
      "image": [
        "{{ $post->thumbnail ? Storage::url($post->thumbnail) : url('/default-image.jpg') }}"
       ],
      "datePublished": "{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}",
      "dateModified": "{{ $post->updated_at->toIso8601String() }}"
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
            @if($post->category)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-primary-900/50 text-primary-300 border border-primary-700/50 shadow-sm mb-6">
                    {{ $post->category->name }}
                </span>
            @endif
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-[1.15] tracking-tight">{{ $post->title }}</h1>
            <div class="flex flex-wrap items-center justify-center text-charcoal-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center font-medium">
                    <svg class="w-4 h-4 mr-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Admin
                </span>
                <span class="flex items-center font-medium">
                    <svg class="w-4 h-4 mr-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y') }}
                </span>
            </div>
        </x-frontend.layout.container>
    </div>

    @php
        $breadcrumbs = [
            'Berita' => route('news.index'),
            Str::limit($post->title, 30) => '#'
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
            
            @if($post->thumbnail)
                <div class="mb-12 rounded-3xl overflow-hidden shadow-xl shadow-charcoal-900/5 border border-charcoal-100">
                    <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" fetchpriority="high" class="w-full object-cover max-h-[500px]" loading="eager">
                </div>
            @endif

            <div class="prose prose-lg md:prose-xl prose-slate max-w-none prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-p:leading-relaxed prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-img:rounded-2xl prose-img:shadow-md">
                {!! \App\Support\HtmlSanitizer::clean($post->content) !!}
            </div>

            @if($post->tags && $post->tags->count() > 0)
                <div class="mt-16 pt-8 border-t border-charcoal-100 flex flex-wrap gap-2 items-center">
                    <span class="text-charcoal-500 text-sm font-bold uppercase tracking-wider mr-2">Tags:</span>
                    @foreach($post->tags as $tag)
                        <span class="bg-charcoal-50 border border-charcoal-200 text-charcoal-700 px-3 py-1 rounded-lg text-sm font-semibold hover:bg-charcoal-100 transition-colors cursor-default shadow-sm">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif

            <div class="mt-16 text-center reveal-on-scroll reveal-up">
                <x-frontend.ui.button href="{{ route('news.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Indeks Berita
                </x-frontend.ui.button>
            </div>
            
        </div>
    </article>
</x-layouts.app>
