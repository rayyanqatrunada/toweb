<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Prestasi</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($achievements as $achievement)
                <div class="bg-white rounded-lg shadow overflow-hidden flex flex-col">
                    @if($achievement->photo)
                        <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-red-600 bg-blue-200 uppercase last:mr-0 mr-1 mb-2 self-start">
                            {{ $achievement->level }}
                        </span>
                        <h2 class="text-xl font-bold mb-2">
                            <a href="{{ route('achievements.show', $achievement->slug) }}" class="hover:text-red-600">{{ $achievement->title }}</a>
                        </h2>
                        <p class="text-sm text-gray-500 mb-4">{{ $achievement->date ? $achievement->date->format('d M Y') : '' }} | {{ $achievement->organizer }}</p>
                        
                        <div class="mt-auto">
                            <span class="inline-block bg-yellow-100 text-yellow-800 rounded-full px-3 py-1 text-sm font-semibold">
                                Peringkat: {{ $achievement->rank }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                    <x-empty-state title="Belum Ada Prestasi" message="Data prestasi belum ditambahkan." icon="document" />
                @endforelse
        </div>
        
        <div class="mt-8">
            {{ $achievements->links() }}
        </div>
    </div>
</x-layouts.app>
