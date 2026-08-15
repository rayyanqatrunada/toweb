<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Program Keahlian</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($programs as $program)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if($program->thumbnail)
                        <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-4">{{ $program->name }}</h2>
                        <p class="text-gray-700 mb-4">{{ $program->description }}</p>
                        
                        @if($program->competencies->count() > 0)
                            <h3 class="font-semibold text-lg mb-2">Kompetensi:</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach($program->competencies as $competency)
                                    <li>{{ $competency->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">Belum ada data program keahlian.</div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
