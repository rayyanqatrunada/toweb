<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Fasilitas Jurusan</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($facilities as $facility)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if($facility->photo)
                        <img src="{{ Storage::url($facility->photo) }}" alt="{{ $facility->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $facility->name }}</h2>
                        <p class="text-gray-700">{{ $facility->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">Belum ada data fasilitas.</div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
