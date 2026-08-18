<x-layouts.app 
    :title="$achievement->title"
    :description="Str::limit(strip_tags($achievement->description), 150)"
    :canonical="route('achievements.show', $achievement->slug)"
    :ogImage="$achievement->photo ? Storage::url($achievement->photo) : null"
    ogType="article"
>
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Article",
      "headline": "{{ $achievement->title }}",
      "image": [
        "{{ $achievement->photo ? Storage::url($achievement->photo) : url('/default-image.jpg') }}"
       ],
      "datePublished": "{{ $achievement->date ? $achievement->date->toIso8601String() : $achievement->created_at->toIso8601String() }}",
      "dateModified": "{{ $achievement->updated_at->toIso8601String() }}"
    }
    </script>
    @endpush
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow max-w-4xl mx-auto overflow-hidden">
            @if($achievement->photo)
                <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" class="w-full h-96 object-cover">
            @endif
            
            <div class="p-8">
                <div class="mb-4">
                    <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $achievement->level }}</span>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-2">Peringkat {{ $achievement->rank }}</span>
                </div>
                
                <h1 class="text-3xl font-bold mb-2">{{ $achievement->title }}</h1>
                <p class="text-gray-500 mb-6 text-sm">
                    Penyelenggara: <span class="font-semibold">{{ $achievement->organizer }}</span> | 
                    Tanggal: <span class="font-semibold">{{ $achievement->date ? $achievement->date->format('d F Y') : '-' }}</span>
                </p>
                
                <div class="prose max-w-none mb-8">
                    {!! $achievement->description !!}
                </div>
                
                @if($achievement->participants->count() > 0)
                    <div class="border-t pt-6">
                        <h3 class="text-xl font-bold mb-4">Siswa Berprestasi:</h3>
                        <ul class="list-disc list-inside">
                            @foreach($achievement->participants as $participant)
                                <!-- Only output student_name, explicitly preventing any student_id leaks -->
                                <li class="text-gray-700 font-medium">{{ $participant->student_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="mt-8 pt-4 border-t">
                    <a href="{{ route('achievements.index') }}" class="text-red-600 hover:underline">&larr; Kembali ke Prestasi</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
