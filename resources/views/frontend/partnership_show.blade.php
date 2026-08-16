<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md max-w-4xl mx-auto p-8">
            <div class="flex flex-col md:flex-row items-center gap-8 mb-8 border-b pb-8">
                @if($partner->logo)
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="w-48 h-48 object-contain rounded bg-white p-2 border shadow-sm">
                @else
                    <div class="w-48 h-48 bg-gray-100 flex items-center justify-center text-gray-400 rounded border">No Logo</div>
                @endif
                
                <div class="flex-grow text-center md:text-left">
                    <h1 class="text-3xl font-bold mb-2">{{ $partner->name }}</h1>
                    <span class="inline-block bg-red-100 text-red-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $partner->industry_type ?? 'Industri' }}</span>
                    
                    <div class="space-y-2 text-gray-600">
                        @if($partner->address)
                        <p class="flex items-start justify-center md:justify-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ $partner->address }}</span>
                        </p>
                        @endif
                        @if($partner->website)
                        <p class="flex items-center justify-center md:justify-start">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            <a href="{{ Str::startsWith($partner->website, 'http') ? $partner->website : 'https://'.$partner->website }}" target="_blank" class="text-red-600 hover:underline">{{ $partner->website }}</a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            
            @if($partner->description)
            <div class="mb-8">
                <h3 class="text-xl font-bold mb-4">Profil Perusahaan</h3>
                <div class="prose max-w-none text-gray-700">
                    {!! $partner->description !!}
                </div>
            </div>
            @endif
            
            <div class="mt-8 pt-4 text-center">
                <a href="{{ route('partnership.index') }}" class="text-red-600 hover:underline font-medium">&larr; Kembali ke Daftar Mitra</a>
            </div>
        </div>
    </div>
</x-layouts.app>
