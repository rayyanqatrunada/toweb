<x-layouts.app title="Program Praktik Kerja Lapangan (PKL)">
    <!-- Hero Section -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-3xl mx-auto">
            <x-frontend.ui.eyebrow class="text-primary-400 mb-4 justify-center">Program Kemitraan</x-frontend.ui.eyebrow>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">Praktik Kerja Lapangan</h1>
            <p class="text-charcoal-300 text-lg lg:text-xl leading-relaxed">
                Informasi dan peluang Praktik Kerja Lapangan (PKL) bersama mitra industri terkemuka.
            </p>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Program PKL' => route('internships.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['PKL' => route('internships.index')]" />
    </div>

    <section class="bg-white min-h-[50vh] lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <x-frontend.layout.container class="max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse($internships as $internship)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:shadow-charcoal-900/5 border border-charcoal-100 flex flex-col group transition-all duration-300 hover:-translate-y-1 relative overflow-hidden focus-within:ring-4 focus-within:ring-primary-500/30">
                        <!-- Top Accent Line -->
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary-500 transition-all duration-300 opacity-0 group-hover:opacity-100"></div>

                        <!-- Status Badge -->
                        <div class="absolute top-5 right-5 z-10">
                            @if($internship->status === 'open')
                                <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-bold shadow-sm flex items-center">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5 animate-pulse"></span> Pendaftaran Buka
                                </span>
                            @elseif($internship->status === 'ongoing')
                                <span class="bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Sedang Berjalan</span>
                            @else
                                <span class="bg-charcoal-50 text-charcoal-600 border border-charcoal-200 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Selesai</span>
                            @endif
                        </div>

                        <div class="p-6 md:p-8 flex-grow flex flex-col pt-8">
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-14 h-14 rounded-2xl bg-white border border-charcoal-100 shadow-sm flex items-center justify-center overflow-hidden flex-shrink-0 p-2">
                                    @if($internship->industryPartner && $internship->industryPartner->logo)
                                        <img src="{{ Storage::url($internship->industryPartner->logo) }}" alt="{{ $internship->industryPartner->name }}" class="w-full h-full object-contain">
                                    @else
                                        <svg class="w-6 h-6 text-charcoal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-sm font-black text-charcoal-900 leading-tight">{{ $internship->industryPartner->name ?? 'Mitra Industri' }}</h3>
                                    <p class="text-xs font-medium text-charcoal-500">{{ $internship->industryPartner->field ?? 'Otomotif' }}</p>
                                </div>
                            </div>
                            
                            <h2 class="text-xl font-bold text-charcoal-900 mb-4 group-hover:text-primary-600 transition-colors leading-tight">
                                <a href="{{ route('internships.show', $internship->slug ?? $internship->id) }}" class="focus:outline-none focus-visible:underline before:absolute before:inset-0">
                                    {{ $internship->title }}
                                </a>
                            </h2>
                            
                            <div class="mb-6 space-y-2.5 mt-auto bg-charcoal-50 p-4 rounded-xl border border-charcoal-100 relative z-10">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-charcoal-500 font-medium">Mulai:</span>
                                    <span class="font-bold text-charcoal-900">{{ $internship->start_date ? $internship->start_date->translatedFormat('d M Y') : '-' }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-charcoal-500 font-medium">Selesai:</span>
                                    <span class="font-bold text-charcoal-900">{{ $internship->end_date ? $internship->end_date->translatedFormat('d M Y') : '-' }}</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-sm font-bold text-primary-600 group-hover:underline relative z-10">Lihat Detail</span>
                                <div class="w-8 h-8 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16">
                        <x-frontend.ui.empty-state 
                            title="Belum Ada Program PKL" 
                            message="Data informasi Praktik Kerja Lapangan belum tersedia saat ini." 
                            icon="document" 
                        />
                    </div>
                @endforelse
            </div>
            
            @if($internships->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $internships->links() }}
                </div>
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>



