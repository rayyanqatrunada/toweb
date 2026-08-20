<x-layouts.app title="Mitra Industri">
    <!-- Hero Section -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-3xl mx-auto">
            <x-frontend.ui.eyebrow class="text-primary-400 mb-4 justify-center">Industry Partners</x-frontend.ui.eyebrow>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">Kemitraan Industri</h1>
            <p class="text-charcoal-300 text-lg lg:text-xl leading-relaxed">
                Jaringan kolaborasi strategis dengan dunia usaha dan dunia industri (DUDI) untuk menjamin kualitas lulusan.
            </p>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Kemitraan Industri' => route('partnership.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Mitra Industri' => route('partnership.index')]" />
    </div>

    <section class="bg-white min-h-[50vh] lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($partners as $partner)
                    <div class="bg-white border border-charcoal-200 rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1 hover:border-primary-200 transition-all duration-300 overflow-hidden group flex flex-col h-full relative">
                        
                        @if($partner->job_vacancies_count > 0)
                            <div class="absolute top-4 right-4 z-10">
                                <span class="flex h-3 w-3 relative">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500" title="{{ $partner->job_vacancies_count }} Lowongan Buka"></span>
                                </span>
                            </div>
                        @endif

                        <a href="{{ route('partnership.show', $partner->slug) }}" class="block p-8 bg-charcoal-50 flex items-center justify-center aspect-[4/3] group-hover:bg-primary-50/30 transition-colors relative z-0">
                                <img src="{{ $partner->logo ? Storage::url($partner->logo) : 'https://ui-avatars.com/api/?name='.urlencode($partner->name).'&background=1e293b&color=fff&size=256&bold=true' }}" alt="{{ $partner->name }}" class="max-w-[70%] max-h-[70%] object-contain filter grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-105" loading="lazy">                       
                        </a>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="text-xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors mb-2 line-clamp-2">
                                <a href="{{ route('partnership.show', $partner->slug) }}" class="focus:outline-none before:absolute before:inset-0 before:z-10">
                                    {{ $partner->name }}
                                </a>
                            </h2>
                            
                            @if($partner->industry_type)
                                <p class="text-sm font-semibold text-primary-600 mb-3">{{ $partner->industry_type }}</p>
                            @endif
                            
                            @if($partner->description)
                                <p class="text-sm text-charcoal-500 mb-4 line-clamp-3 leading-relaxed flex-grow">
                                    {{ strip_tags($partner->description) }}
                                </p>
                            @endif
                            
                            <div class="mt-auto space-y-3 pt-4 border-t border-charcoal-100 relative z-20">
                                @if($partner->partnerships->count() > 0)
                                    <div class="flex flex-wrap gap-2 pointer-events-none">
                                        @foreach($partner->partnerships->take(2) as $ps)
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-charcoal-100 text-charcoal-700">
                                                {{ $ps->type }}
                                            </span>
                                        @endforeach
                                        @if($partner->partnerships->count() > 2)
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-charcoal-50 text-charcoal-500">
                                                +{{ $partner->partnerships->count() - 2 }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                                
                                @if($partner->job_vacancies_count > 0)
                                    <div class="mt-4 flex items-center justify-between text-sm">
                                        <a href="{{ route('jobs.index') }}?mitra={{ $partner->slug }}" class="font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg border border-emerald-200 transition-colors flex items-center z-20 relative">
                                            {{ $partner->job_vacancies_count }} Lowongan Aktif
                                        </a>
                                        <span class="text-primary-600 font-bold group-hover:translate-x-1 transition-transform flex items-center pointer-events-none">
                                            Profil <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center">
                        <x-frontend.ui.empty-state 
                            title="Belum Ada Data Mitra Industri" 
                            message="Daftar mitra industri DUDI belum tersedia saat ini." 
                            icon="building" 
                        />
                    </div>
                @endforelse
            </div>
            
            @if($partners->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $partners->links() }}
                </div>
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>



