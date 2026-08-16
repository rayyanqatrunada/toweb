<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Lowongan Kerja (BKK)</h1>
        
        <div class="space-y-6 max-w-5xl mx-auto">
            @forelse($jobs as $job)
                <div class="bg-white rounded-lg shadow p-6 flex flex-col md:flex-row gap-6 border-l-4 border-red-500">
                    @if($job->industryPartner && $job->industryPartner->logo)
                        <div class="flex-shrink-0">
                            <img src="{{ Storage::url($job->industryPartner->logo) }}" alt="{{ $job->industryPartner->name }}" class="w-24 h-24 object-contain rounded bg-white p-1 border">
                        </div>
                    @endif
                    
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-2xl font-bold mb-1">
                                    <a href="{{ route('jobs.show', $job->slug) }}" class="hover:text-red-600">{{ $job->title }}</a>
                                </h2>
                                <p class="text-lg text-gray-700 font-semibold mb-2">
                                    {{ $job->industryPartner->name ?? 'Perusahaan Rahasia' }}
                                </p>
                            </div>
                            @if($job->application_deadline)
                                <div class="text-right">
                                    <span class="text-xs text-gray-500 block mb-1">Tenggat Waktu</span>
                                    <span class="inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded font-semibold">{{ $job->application_deadline->format('d M Y') }}</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($job->location)
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $job->location }}
                                </span>
                            @endif
                            @if($job->employment_type)
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">{{ $job->employment_type }}</span>
                            @endif
                        </div>
                        
                        <p class="text-gray-600 line-clamp-2 text-sm">{{ strip_tags($job->description) }}</p>
                    </div>
                </div>
            @empty
                    <x-empty-state title="Belum Ada Lowongan" message="Lowongan pekerjaan belum tersedia saat ini." icon="document" />
                @endforelse
        </div>
        
        <div class="mt-8 max-w-5xl mx-auto">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layouts.app>
