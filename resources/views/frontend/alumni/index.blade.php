<x-layouts.app title="Jejaring Alumni">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Jejaring Alumni</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Profil dan rekam jejak lulusan Program Keahlian Teknik Otomotif yang telah sukses berkarya di industri.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Jejaring Alumni' => route('alumni.index')]" />

    <section class="py-16 bg-slate-50 min-h-[50vh]">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($alumnis as $alumni)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 overflow-hidden group transition-all duration-300 hover:-translate-y-1 relative">
                        <div class="aspect-square bg-slate-100 relative overflow-hidden">
                            @if($alumni->photo)
                                <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-200">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>
                            @endif
                            <div class="absolute bottom-3 right-3 bg-red-600/90 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                Angkatan {{ $alumni->graduation_year }}
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h2 class="text-lg font-bold text-slate-900 mb-1 truncate group-hover:text-red-600 transition-colors">
                                <a href="{{ route('alumni.show', $alumni->slug) }}" class="focus:outline-none focus:underline">{{ $alumni->name }}</a>
                            </h2>
                            
                            @if($alumni->occupation)
                                <p class="text-sm font-bold text-slate-700 truncate mb-0.5">{{ $alumni->occupation }}</p>
                            @endif
                            
                            @if($alumni->company)
                                <p class="text-xs font-medium text-slate-500 truncate flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    {{ $alumni->company }}
                                </p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16">
                        <x-empty-state title="Belum Ada Data Alumni" message="Data jejaring alumni belum tersedia saat ini." icon="users" />
                    </div>
                @endforelse
            </div>
            
            @if($alumnis->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $alumnis->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

