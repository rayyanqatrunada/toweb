<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2 text-center">Jejaring Alumni</h1>
        <p class="text-center text-gray-500 mb-8 max-w-2xl mx-auto">Profil dan jejak rekam lulusan Program Keahlian Teknik Otomotif yang telah berkarya di berbagai industri.</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($alumnis as $alumni)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="h-48 bg-gray-200 relative">
                        @if($alumni->photo)
                            <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif
                        <div class="absolute bottom-0 right-0 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-tl">
                            Angkatan {{ $alumni->graduation_year }}
                        </div>
                    </div>
                    
                    <div class="p-5">
                        <h2 class="text-lg font-bold mb-1 truncate">
                            <a href="{{ route('alumni.show', $alumni->slug) }}" class="hover:text-blue-600">{{ $alumni->name }}</a>
                        </h2>
                        
                        @if($alumni->occupation)
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $alumni->occupation }}</p>
                        @endif
                        
                        @if($alumni->company)
                            <p class="text-xs text-gray-500 truncate">di {{ $alumni->company }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10 bg-white rounded-lg">Belum ada profil alumni yang dipublikasikan.</div>
            @endforelse
        </div>
        
        <div class="mt-10">
            {{ $alumnis->links() }}
        </div>
    </div>
</x-layouts.app>
