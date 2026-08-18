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
      "@context": "https://schema.org",
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
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            @if($post->category)
                <span class="inline-block py-1 px-3 bg-red-500/20 text-red-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-red-500/30">
                    {{ $post->category->name }}
                </span>
            @endif
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $post->title }}</h1>
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Admin
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Berita' => route('news.index'),
        Str::limit($post->title, 30) => '#'
    ]" />

    <article class="bg-white py-16 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($post->thumbnail)
                <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" fetchpriority="high" class="w-full object-cover max-h-[500px]">
                </div>
            @endif

            <div class="prose prose-lg prose-slate max-w-none prose-a:text-red-600 hover:prose-a:text-red-700 prose-img:rounded-xl">
                {!! \App\Support\HtmlSanitizer::clean($post->content) !!}
            </div>

            @if($post->tags && $post->tags->count() > 0)
                <div class="mt-16 pt-8 border-t border-slate-100 flex flex-wrap gap-2 items-center">
                    <span class="text-slate-500 text-sm font-bold uppercase tracking-wider mr-2">Tags:</span>
                    @foreach($post->tags as $tag)
                        <span class="bg-slate-50 border border-slate-200 text-slate-600 px-3 py-1 rounded-lg text-sm font-medium hover:bg-slate-100 transition-colors cursor-default">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif

            <div class="mt-16 text-center">
                <a href="{{ route('news.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Indeks Berita
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>
