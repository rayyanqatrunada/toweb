<x-layouts.app title="Bursa Kerja Khusus (BKK)">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Bursa Kerja Khusus (BKK)</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Informasi lowongan pekerjaan terbaru dari mitra industri terpercaya untuk alumni dan siswa tingkat akhir.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Lowongan Kerja' => route('jobs.index')]" />

    <section class="py-16 bg-slate-50 min-h-[50vh]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse($jobs as $job)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 p-6 md:p-8 flex flex-col md:flex-row gap-6 transition-all duration-300 relative group overflow-hidden focus-within:ring-4 focus-within:ring-red-500 hover:-translate-y-1">
                        <!-- Decorative Red Line -->
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-600 transition-all duration-300 group-hover:w-2"></div>
                        
                        <!-- Logo Partner -->
                        <div class="flex-shrink-0 flex items-start justify-center md:justify-start">
                            <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center overflow-hidden">
                                @if($job->industryPartner && $job->industryPartner->logo)
                                    <img src="{{ Storage::url($job->industryPartner->logo) }}" alt="{{ $job->industryPartner->name }}" class="w-full h-full object-contain p-2">
                                @else
                                    <svg class="w-8 h-8 text-slate-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 3.5L18.5 19H5.5L12 5.5z"/></svg>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Info Konten -->
                        <div class="flex-grow flex flex-col">
                            <div class="flex flex-col md:flex-row md:justify-between items-start mb-2 gap-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-slate-900 group-hover:text-red-600 transition-colors leading-tight mb-1">
                                        <a href="{{ route('jobs.show', $job->slug) }}" class="focus:outline-none">{{ $job->title }}</a>
                                    </h2>
                                    <p class="text-base font-medium text-slate-700">
                                        {{ $job->industryPartner->name ?? 'Perusahaan Rahasia' }}
                                    </p>
                                </div>
                                
                                @if($job->application_deadline)
                                    <div class="bg-red-50 border border-red-100 px-4 py-2 rounded-lg text-center md:text-right shrink-0">
                                        <span class="block text-xs font-semibold text-red-500 uppercase tracking-wider mb-0.5">Tenggat Waktu</span>
                                        <span class="block text-sm font-bold text-red-700">{{ $job->application_deadline->translatedFormat('d M Y') }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Badges -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                @if($job->location)
                                    <span class="inline-flex items-center px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $job->location }}
                                    </span>
                                @endif
                                @if($job->employment_type)
                                    <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 border border-blue-100 text-xs font-bold rounded-full uppercase tracking-wide">
                                        {{ $job->employment_type }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Deskripsi Singkat -->
                            <p class="text-slate-600 text-sm line-clamp-2 mt-auto">
                                {{ Str::limit(strip_tags($job->description), 200) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="py-10">
                        <x-empty-state title="Belum Ada Lowongan Pekerjaan" message="Lowongan pekerjaan dari mitra industri belum tersedia saat ini." icon="document" />
                    </div>
                @endforelse
            </div>
            
            @if($jobs->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

