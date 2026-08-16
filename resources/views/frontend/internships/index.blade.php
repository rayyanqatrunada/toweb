<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Program PKL (Praktik Kerja Lapangan)</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($internships as $internship)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-2">
                        <a href="{{ route('internships.show', $internship->id) }}" class="hover:text-red-600">{{ $internship->title }}</a>
                    </h2>
                    
                    <div class="text-sm text-gray-500 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Mitra: {{ $internship->industryPartner->name ?? '-' }}
                    </div>
                    
                    <div class="mb-4">
                        <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                            Mulai: {{ $internship->start_date ? $internship->start_date->format('d M Y') : '-' }}
                        </span>
                        <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                            Selesai: {{ $internship->end_date ? $internship->end_date->format('d M Y') : '-' }}
                        </span>
                    </div>
                    
                    <p class="text-gray-700">{{ Str::limit(strip_tags($internship->description), 150) }}</p>
                </div>
            @empty
                    <x-empty-state title="Belum Ada Informasi PKL" message="Data informasi PKL belum tersedia saat ini." icon="document" />
                @endforelse
        </div>
        
        <div class="mt-8">
            {{ $internships->links() }}
        </div>
    </div>
</x-layouts.app>
