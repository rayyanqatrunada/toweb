<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Guru & Staf</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($teachers as $teacher)
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    @if($teacher->photo)
                        <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    @else
                        <div class="w-32 h-32 rounded-full bg-gray-200 mx-auto mb-4 flex items-center justify-center text-gray-500">No Photo</div>
                    @endif
                    <h2 class="text-xl font-semibold mb-1">{{ $teacher->name }}</h2>
                    <p class="text-blue-600">{{ $teacher->position ?? 'Guru' }}</p>
                    <!-- Internal data like NIP is hidden for public privacy -->
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">Belum ada data guru.</div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
