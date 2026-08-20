<x-layouts.app title="Jejaring Alumni">
    <!-- Hero Header -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-3xl mx-auto">
            <x-frontend.ui.eyebrow class="text-primary-400 mb-4 justify-center">Alumni Network</x-frontend.ui.eyebrow>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">Jejaring Alumni</h1>
            <p class="text-charcoal-300 text-lg lg:text-xl leading-relaxed">
                Profil dan rekam jejak kelulusan Program Keahlian Teknik Otomotif yang telah sukses berkarya di industri.
            </p>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Jejaring Alumni' => route('alumni.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Alumni' => route('alumni.index')]" />
    </div>

    <section class="py-16 lg:py-24 bg-white min-h-[50vh]">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($alumnis as $alumni)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1 border border-charcoal-100 hover:border-charcoal-200 overflow-hidden group transition-all duration-300 relative flex flex-col h-full">
                        <div class="aspect-square bg-charcoal-100 relative overflow-hidden">
                            @if($alumni->photo)
                                <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 filter group-hover:contrast-110" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-charcoal-300 bg-charcoal-50">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>
                            @endif
                            <div class="absolute bottom-4 right-4 bg-primary-600/90 backdrop-blur text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg border border-primary-500/50">
                                Angkatan {{ $alumni->graduation_year }}
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="text-lg font-bold text-charcoal-900 mb-1 line-clamp-1 group-hover:text-primary-600 transition-colors">
                                <a href="{{ route('alumni.show', $alumni->slug) }}" class="focus:outline-none before:absolute before:inset-0 z-10">{{ $alumni->name }}</a>
                            </h2>
                            
                            @if($alumni->current_occupation)
                                <p class="text-sm font-bold text-charcoal-700 line-clamp-1 mb-1">{{ $alumni->current_occupation }}</p>
                            @endif
                            
                            @if($alumni->current_company)
                                <p class="text-xs font-semibold text-charcoal-500 line-clamp-1 flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-charcoal-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    {{ $alumni->current_company }}
                                </p>
                            @endif
                            
                            @if($alumni->city)
                                <div class="mt-4 pt-4 border-t border-charcoal-100 flex items-center text-xs text-charcoal-400 font-medium relative z-20">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $alumni->city }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center">
                        <x-frontend.ui.empty-state 
                            title="Belum Ada Data Alumni" 
                            message="Data jejaring alumni belum tersedia saat ini." 
                            icon="users" 
                        />
                    </div>
                @endforelse
            </div>
            
            @if($alumnis->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $alumnis->links() }}
                </div>
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>
