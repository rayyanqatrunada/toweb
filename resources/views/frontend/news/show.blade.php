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
      "@@type": "NewsArticle",
      "headline": "{{ $post->title }}",
      "image": [
        "{{ $post->thumbnail ? Storage::url($post->thumbnail) : url('/default-image.jpg') }}"
       ],
      "datePublished": "{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}",
      "dateModified": "{{ $post->updated_at->toIso8601String() }}"
    }
    </script>
    @endpush

    <article class="bg-white py-16 lg:py-24">
        <div class="max-w-3xl mx-auto px-4">
            
            <x-frontend.breadcrumbs :items="['Berita' => route('news.index'), $post->title => '#']" />

            <header class="mb-10 text-center">
                @if($post->category)
                    <span class="inline-block py-1 px-3 bg-red-50 text-red-600 rounded-full text-sm font-semibold tracking-wide mb-6">
                        {{ $post->category->name }}
                    </span>
                @endif
                <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center justify-center text-slate-500 text-sm space-x-4">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Admin
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}
                    </span>
                </div>
            </header>

            @if($post->thumbnail)
                <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="w-full object-cover max-h-[500px]">
                </div>
            @endif

            <div class="prose prose-lg prose-slate max-w-none prose-a:text-red-600 hover:prose-a:text-red-600 prose-img:rounded-xl">
                {!! $post->content !!}
            </div>

            @if($post->tags && $post->tags->count() > 0)
                <div class="mt-12 pt-6 border-t border-slate-100 flex flex-wrap gap-2">
                    <span class="text-slate-500 text-sm font-medium py-1 mr-2">Tags:</span>
                    @foreach($post->tags as $tag)
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-lg text-sm">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif

            <div class="mt-12 text-center">
                <a href="{{ route('news.index') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 focus:ring-4 focus:ring-slate-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Indeks Berita
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>

