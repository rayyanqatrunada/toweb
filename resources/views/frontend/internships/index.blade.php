<x-layouts.app title="Program PKL">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Praktik Kerja Lapangan</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Informasi dan peluang Praktik Kerja Lapangan (PKL) bersama mitra industri terkemuka.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Program PKL' => route('internships.index')]" />

    <section class="py-16 bg-slate-50 min-h-[50vh]">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($internships as $internship)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 overflow-hidden flex flex-col group transition-all duration-300 hover:-translate-y-1 relative">
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            @if($internship->status === 'open')
                                <span class="bg-emerald-100/90 backdrop-blur text-emerald-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm flex items-center">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5 animate-pulse"></span> Pendaftaran Buka
                                </span>
                            @elseif($internship->status === 'ongoing')
                                <span class="bg-blue-100/90 backdrop-blur text-blue-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Sedang Berjalan</span>
                            @else
                                <span class="bg-slate-100/90 backdrop-blur text-slate-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Selesai</span>
                            @endif
                        </div>

                        <div class="p-6 md:p-8 flex-grow flex flex-col">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center overflow-hidden flex-shrink-0">
                                    @if($internship->industryPartner && $internship->industryPartner->logo)
                                        <img src="{{ Storage::url($internship->industryPartner->logo) }}" alt="{{ $internship->industryPartner->name }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-slate-900 leading-tight">{{ $internship->industryPartner->name ?? 'Mitra Industri' }}</h3>
                                    <p class="text-xs text-slate-500">{{ $internship->industryPartner->field ?? 'Otomotif' }}</p>
                                </div>
                            </div>
                            
                            <h2 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition-colors">
                                <a href="{{ route('internships.show', $internship->id) }}" class="focus:outline-none">
                                    {{ $internship->title }}
                                </a>
                            </h2>
                            
                            <div class="mb-5 space-y-2">
                                <div class="flex items-center text-sm text-slate-600">
                                    <svg class="w-4 h-4 text-slate-400 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <span>Mulai: <span class="font-semibold">{{ $internship->start_date ? $internship->start_date->translatedFormat('d M Y') : '-' }}</span></span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600">
                                    <svg class="w-4 h-4 text-slate-400 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Selesai: <span class="font-semibold">{{ $internship->end_date ? $internship->end_date->translatedFormat('d M Y') : '-' }}</span></span>
                                </div>
                                <div class="flex items-center text-sm text-slate-600">
                                    <svg class="w-4 h-4 text-slate-400 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    <span>{{ $internship->location ?? 'Sesuai Penempatan' }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-sm font-bold text-red-600">Kuota: {{ $internship->quota ?? 'TBA' }} Siswa</span>
                                <a href="{{ route('internships.show', $internship->id) }}" class="inline-flex items-center justify-center p-2 bg-slate-50 text-slate-600 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors focus:ring-4 focus:ring-red-100">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-10">
                        <x-empty-state title="Belum Ada Program PKL" message="Data informasi Praktik Kerja Lapangan belum tersedia saat ini." icon="document" />
                    </div>
                @endforelse
            </div>
            
            @if($internships->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $internships->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

