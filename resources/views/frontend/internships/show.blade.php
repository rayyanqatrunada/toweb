<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow max-w-4xl mx-auto p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $internship->title }}</h1>
            
            <div class="flex items-center text-sm text-gray-500 mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <span class="font-semibold text-gray-700">Mitra Industri: &nbsp;</span>
                @if($internship->industryPartner)
                    <a href="{{ route('partnership.show', $internship->industryPartner->slug) }}" class="text-red-600 hover:underline">{{ $internship->industryPartner->name }}</a>
                @else
                    -
                @endif
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-8 bg-gray-50 p-4 rounded-lg border">
                <div>
                    <span class="block text-xs text-gray-500 uppercase tracking-wider font-semibold">Tanggal Mulai</span>
                    <span class="text-gray-900">{{ $internship->start_date ? $internship->start_date->format('d F Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs text-gray-500 uppercase tracking-wider font-semibold">Tanggal Selesai</span>
                    <span class="text-gray-900">{{ $internship->end_date ? $internship->end_date->format('d F Y') : '-' }}</span>
                </div>
            </div>
            
            <h3 class="text-xl font-bold mb-4 border-b pb-2">Deskripsi Program</h3>
            <div class="prose max-w-none mb-8">
                {!! $internship->description !!}
            </div>
            
            <div class="mt-8 pt-4 border-t">
                <a href="{{ route('internships.index') }}" class="text-red-600 hover:underline">&larr; Kembali ke Daftar PKL</a>
            </div>
        </div>
    </div>
</x-layouts.app>
