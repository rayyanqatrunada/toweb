<x-layouts.app title="Profil Akademik">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Profil & Akademik</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Mengenal lebih dekat fasilitas, tenaga pengajar, dan kompetensi keahlian Teknik Otomotif.</p>
        </div>
    </div>

    <!-- Fasilitas Section -->
    <section class="py-16 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Fasilitas Praktek</h2>
                <div class="w-20 h-1 bg-red-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-slate-500 max-w-2xl mx-auto">Sarana dan prasarana bengkel berstandar industri untuk menunjang kegiatan belajar mengajar.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($facilities as $facility)
                    <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $facility->name }}</h3>
                        @if($facility->description)
                            <p class="text-slate-500 text-sm mb-4">{{ $facility->description }}</p>
                        @endif
                        <div class="flex justify-between items-center text-sm font-medium">
                            <span class="text-slate-600">Jumlah: {{ $facility->quantity }} unit</span>
                            @if($facility->condition === 'good')
                                <span class="bg-green-100 text-green-700 px-2.5 py-0.5 rounded-full text-xs">Kondisi Baik</span>
                            @elseif($facility->condition === 'fair')
                                <span class="bg-yellow-100 text-yellow-700 px-2.5 py-0.5 rounded-full text-xs">Layak Pakai</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-2.5 py-0.5 rounded-full text-xs">Perbaikan</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-slate-500 border border-dashed border-slate-200 rounded-xl">
                        Data fasilitas belum ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Guru Section -->
    <section class="py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Tenaga Pendidik</h2>
                <div class="w-20 h-1 bg-red-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-slate-500 max-w-2xl mx-auto">Guru-guru profesional dan berpengalaman di bidang teknik otomotif.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($teachers as $teacher)
                    <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow text-center p-6 group">
                        <div class="w-24 h-24 mx-auto bg-slate-200 rounded-full overflow-hidden mb-4 border-4 border-slate-50 group-hover:border-red-200 transition-colors">
                            @if($teacher->photo)
                                <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $teacher->name }}</h3>
                        <p class="text-red-600 text-sm font-medium mb-3">{{ $teacher->position ?? 'Guru Kejuruan' }}</p>
                        @if($teacher->nip)
                            <p class="text-slate-500 text-xs">NIP. {{ $teacher->nip }}</p>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-slate-500 border border-dashed border-slate-200 rounded-xl">
                        Data tenaga pendidik belum ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
