<x-layouts.app title="Kemitraan & BKK">
    <div class="bg-slate-900 py-16 lg:py-24">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Kemitraan Industri & BKK</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Informasi perusahaan mitra, program magang, dan lowongan kerja dari Bursa Kerja Khusus (BKK).</p>
        </div>
    </div>

    <section class="py-16 bg-white min-h-[50vh]">
        <div class="max-w-screen-xl mx-auto px-4">
            
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-slate-900 mb-8 border-b border-slate-200 pb-4">Mitra Industri Kami</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @forelse($partners as $partner)
                        <div class="bg-slate-50 border border-slate-100 rounded-xl p-4 flex flex-col items-center justify-center text-center hover:shadow-md transition-shadow group">
                            @if($partner->logo)
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-16 w-auto object-contain mb-3 group-hover:scale-105 transition-transform">
                            @else
                                <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                            @endif
                            <h3 class="font-bold text-slate-900 text-sm">{{ $partner->name }}</h3>
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" class="text-xs text-red-600 hover:underline mt-1">Kunjungi Web</a>
                            @endif
                        </div>
                    @empty
                        <div class="col-span-full py-8 text-center text-slate-500">
                            Data mitra industri belum tersedia.
                        </div>
                    @endforelse
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-8 border-b border-slate-200 pb-4">Lowongan Kerja (Open)</h2>
                <div class="space-y-6">
                    @php $hasVacancies = false; @endphp
                    @foreach($partners as $partner)
                        @foreach($partner->jobVacancies as $vacancy)
                            @php $hasVacancies = true; @endphp
                            <div class="bg-white border border-slate-200 rounded-xl p-6 hover:border-blue-300 hover:shadow-md transition-all flex flex-col md:flex-row md:items-start justify-between gap-4">
                                <div class="flex-grow">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <h3 class="text-xl font-bold text-slate-900">{{ $vacancy->title }}</h3>
                                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider">OPEN</span>
                                    </div>
                                    <div class="flex items-center text-slate-500 text-sm mb-4 space-x-4">
                                        <span class="flex items-center font-medium text-slate-700">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                            {{ $partner->name }}
                                        </span>
                                        @if($vacancy->deadline)
                                            <span class="flex items-center text-red-500">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Tutup: {{ $vacancy->deadline->format('d M Y') }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="prose prose-sm prose-slate max-w-none mb-4">
                                        {!! \App\Support\HtmlSanitizer::clean($vacancy->description) !!}
                                    </div>

                                    @if($vacancy->requirements)
                                        <div class="bg-slate-50 rounded-lg p-4 text-sm text-slate-700 border border-slate-100">
                                            <strong class="block mb-2 text-slate-900">Persyaratan Khusus:</strong>
                                            {!! nl2br(e($vacancy->requirements)) !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="md:text-right mt-4 md:mt-0 flex-shrink-0">
                                    <a href="mailto:{{ $partner->email ?? 'info@sekolah.sch.id' }}" class="inline-flex justify-center items-center py-2 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-blue-300 w-full md:w-auto">
                                        Lamar Sekarang
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                    @if(!$hasVacancies)
                        <div class="text-center py-12 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                            <svg class="w-12 h-12 text-slate-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <p class="text-slate-500 font-medium">Belum ada lowongan kerja yang dibuka saat ini.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
</x-layouts.app>
