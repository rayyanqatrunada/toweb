<x-layouts.app title="Bursa Kerja Khusus (BKK)">
    <!-- Hero Section -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <x-frontend.ui.eyebrow class="text-amber-400 mb-4 justify-center">Bursa Kerja Khusus (BKK)</x-frontend.ui.eyebrow>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">Peluang Karir</h1>
                <p class="text-charcoal-300 text-lg lg:text-xl leading-relaxed">
                    Informasi lowongan pekerjaan terbaru dari mitra industri terpercaya untuk alumni dan siswa tingkat akhir.
                </p>
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Bursa Kerja Khusus' => route('jobs.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['BKK' => route('jobs.index')]" />
    </div>

    <section class="py-16 lg:py-24 bg-white min-h-[50vh]">
        <x-frontend.layout.container class="max-w-5xl">
            <div class="space-y-6">
                @forelse($jobs as $job)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:shadow-charcoal-900/5 border border-charcoal-100 p-6 md:p-8 flex flex-col md:flex-row gap-6 transition-all duration-300 relative group overflow-hidden focus-within:ring-4 focus-within:ring-primary-500 hover:-translate-y-1">
                        <!-- Decorative Indicator Line -->
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-amber-500 transition-all duration-300 group-hover:w-2 group-hover:bg-primary-500"></div>
                        
                        <!-- Logo Partner -->
                        <div class="flex-shrink-0 flex items-start justify-center md:justify-start">
                            <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl bg-white border border-charcoal-200 shadow-sm flex items-center justify-center overflow-hidden">
                                @if($job->industryPartner && $job->industryPartner->logo)
                                    <img src="{{ Storage::url($job->industryPartner->logo) }}" alt="{{ $job->industryPartner->name }}" class="w-full h-full object-contain p-3">
                                @else
                                    <svg class="w-8 h-8 text-charcoal-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 3.5L18.5 19H5.5L12 5.5z"/></svg>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Info Konten -->
                        <div class="flex-grow flex flex-col">
                            <div class="flex flex-col lg:flex-row lg:justify-between items-start mb-3 gap-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors leading-tight mb-1">
                                        <a href="{{ route('jobs.show', $job->slug) }}" class="focus:outline-none focus-visible:underline before:absolute before:inset-0">{{ $job->title }}</a>
                                    </h2>
                                    <p class="text-base font-bold text-charcoal-500">
                                        {{ $job->industryPartner->name ?? 'Perusahaan Rahasia' }}
                                    </p>
                                </div>
                                
                                @if($job->application_deadline)
                                    <div class="bg-charcoal-50 border border-charcoal-100 px-4 py-2.5 rounded-xl text-left lg:text-right shrink-0 w-full lg:w-auto relative z-10">
                                        <span class="block text-[11px] font-black text-charcoal-400 uppercase tracking-widest mb-0.5">Tenggat Waktu</span>
                                        <span class="block text-sm font-bold {{ $job->application_deadline->isPast() ? 'text-primary-600' : 'text-charcoal-800' }}">{{ $job->application_deadline->translatedFormat('d M Y') }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Badges -->
                            <div class="flex flex-wrap gap-2.5 mb-5 relative z-10">
                                @if($job->location)
                                    <span class="inline-flex items-center px-3 py-1 bg-charcoal-50 text-charcoal-600 border border-charcoal-100 text-xs font-semibold rounded-full">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $job->location }}
                                    </span>
                                @endif
                                @if($job->employment_type)
                                    <span class="inline-flex items-center px-3 py-1 bg-amber-50 text-amber-700 border border-amber-100 text-xs font-bold rounded-full uppercase tracking-wide">
                                        {{ $job->employment_type }}
                                    </span>
                                @endif
                                @if($job->salary_text)
                                    <span class="inline-flex items-center px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-100 text-xs font-semibold rounded-full">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $job->salary_text }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Deskripsi Singkat -->
                            <p class="text-charcoal-600 text-sm leading-relaxed line-clamp-2 mt-auto">
                                {{ Str::limit(strip_tags($job->description), 200) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="py-16">
                        <x-frontend.ui.empty-state 
                            title="Belum Ada Lowongan Pekerjaan" 
                            message="Informasi peluang karir dari mitra industri belum tersedia saat ini." 
                            icon="document" 
                        />
                    </div>
                @endforelse
            </div>
            
            @if($jobs->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $jobs->links() }}
                </div>
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>
