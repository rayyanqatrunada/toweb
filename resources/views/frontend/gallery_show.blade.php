<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold mb-2">{{ $album->title }}</h1>
                <p class="text-gray-500">
                    @if($album->event_date)
                        {{ $album->event_date->format('d M Y') }}
                    @endif
                    @if($album->event_date && $album->location) | @endif
                    @if($album->location)
                        {{ $album->location }}
                    @endif
                </p>
            </div>
            
            @if($album->description)
                <div class="prose max-w-none mb-8 bg-white p-6 rounded-lg shadow-sm text-center mx-auto">
                    {{ $album->description }}
                </div>
            @endif
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($album->items as $item)
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm group">
                        <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="block aspect-w-4 aspect-h-3">
                            <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->alt_text ?? $item->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        </a>
                        @if($item->title || $item->description)
                            <div class="p-3 bg-white border-t">
                                @if($item->title)<h4 class="font-semibold text-sm">{{ $item->title }}</h4>@endif
                                @if($item->description)<p class="text-xs text-gray-500 mt-1">{{ Str::limit($item->description, 60) }}</p>@endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8 pt-6 border-t text-center">
                <a href="{{ route('gallery.index') }}" class="text-red-600 hover:underline font-medium">&larr; Kembali ke Galeri</a>
            </div>
        </div>
    </div>
</x-layouts.app>
