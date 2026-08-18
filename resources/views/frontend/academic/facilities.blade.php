<x-layouts.app title="Fasilitas Jurusan">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Fasilitas Jurusan</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Sarana dan prasarana bengkel berstandar industri untuk menunjang kegiatan belajar mengajar.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Fasilitas' => route('academic.facilities')]" />

    <section class="py-16 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($facilities as $facility)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 overflow-hidden group transition-all duration-300 hover:-translate-y-1">
                        <div class="aspect-video relative overflow-hidden bg-slate-100">
                            @if($facility->photo)
                                <img src="{{ Storage::url($facility->photo) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                            @endif
                            <div class="absolute top-3 right-3">
                                @if($facility->condition === 'good')
                                    <span class="bg-emerald-100/90 backdrop-blur text-emerald-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Kondisi Baik</span>
                                @elseif($facility->condition === 'fair')
                                    <span class="bg-amber-100/90 backdrop-blur text-amber-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Layak Pakai</span>
                                @else
                                    <span class="bg-rose-100/90 backdrop-blur text-rose-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Perbaikan</span>
                                @endif
                            </div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors">{{ $facility->name }}</h2>
                            <p class="text-slate-600 text-sm mb-4 line-clamp-3">{{ $facility->description }}</p>
                            <div class="flex items-center text-sm font-medium text-slate-500 bg-slate-50 px-4 py-2 rounded-lg">
                                <svg class="w-4 h-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                Jumlah: {{ $facility->quantity }} Unit
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16">
                        <x-empty-state title="Belum Ada Fasilitas" message="Data fasilitas bengkel belum ditambahkan saat ini." icon="document" />
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>

