<x-layouts.app 
    :title="$internship->title . ' - PKL'"
    :description="Str::limit(strip_tags($internship->description), 150)"
>
    <!-- Header Page -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-4xl mx-auto">
            <div class="flex justify-center mb-6">
                <span class="inline-flex items-center px-4 py-1.5 bg-primary-500/20 text-primary-300 rounded-full text-xs font-black tracking-widest uppercase border border-primary-500/30">
                    Program Praktik Kerja Lapangan
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white mb-8 leading-[1.15] tracking-tight">{{ $internship->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-300 text-sm gap-4">
                <span class="flex items-center font-bold text-white bg-charcoal-900/60 px-5 py-2.5 rounded-xl border border-charcoal-800">
                    <svg class="w-5 h-5 mr-2.5 opacity-70 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Mitra Industri: &nbsp;
                    @if($internship->industryPartner)
                        <a href="{{ route('partnership.show', $internship->industryPartner->slug) }}" class="text-primary-300 hover:text-white transition-colors">{{ $internship->industryPartner->name }}</a>
                    @else
                        -
                    @endif
                </span>
                
                @if($internship->status === 'open')
                    <span class="flex items-center font-bold text-emerald-300 bg-emerald-950/60 px-5 py-2.5 rounded-xl border border-emerald-800/50">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full mr-2.5 animate-pulse"></span> Pendaftaran Buka
                    </span>
                @elseif($internship->status === 'ongoing')
                    <span class="flex items-center font-bold text-blue-300 bg-blue-950/60 px-5 py-2.5 rounded-xl border border-blue-800/50">
                        Sedang Berjalan
                    </span>
                @else
                    <span class="flex items-center font-bold text-charcoal-400 bg-charcoal-900/60 px-5 py-2.5 rounded-xl border border-charcoal-800">
                        Selesai
                    </span>
                @endif
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="[
                'Program PKL' => route('internships.index'),
                Str::limit($internship->title, 40) => '#'
            ]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="[
            'PKL' => route('internships.index'),
            Str::limit($internship->title, 20) => '#'
        ]" />
    </div>

    <article class="bg-white py-12 lg:py-20 min-h-[50vh]">
        <x-frontend.layout.container class="max-w-4xl">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-12">
                <div class="bg-white border border-charcoal-200 shadow-sm rounded-2xl p-6 flex items-center">
                    <div class="w-14 h-14 bg-charcoal-50 rounded-xl flex items-center justify-center text-charcoal-500 mr-5 shrink-0 border border-charcoal-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-[11px] text-charcoal-500 uppercase tracking-widest font-black mb-1">Tanggal Mulai</span>
                        <span class="text-charcoal-900 font-bold text-lg">{{ $internship->start_date ? $internship->start_date->translatedFormat('d F Y') : '-' }}</span>
                    </div>
                </div>
                
                <div class="bg-white border border-charcoal-200 shadow-sm rounded-2xl p-6 flex items-center">
                    <div class="w-14 h-14 bg-charcoal-50 rounded-xl flex items-center justify-center text-charcoal-500 mr-5 shrink-0 border border-charcoal-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-[11px] text-charcoal-500 uppercase tracking-widest font-black mb-1">Tanggal Selesai</span>
                        <span class="text-charcoal-900 font-bold text-lg">{{ $internship->end_date ? $internship->end_date->translatedFormat('d F Y') : '-' }}</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl shadow-xl shadow-charcoal-900/5 border border-charcoal-100 p-8 lg:p-12">
                <h2 class="text-2xl lg:text-3xl font-bold text-charcoal-900 mb-8 flex items-center border-b border-charcoal-100 pb-6">
                    <span class="w-10 h-10 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center mr-4 shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    Informasi Program
                </h2>
                
                <div class="prose prose-lg md:prose-xl prose-slate max-w-none prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-li:text-charcoal-700">
                    {!! \App\Support\HtmlSanitizer::clean($internship->description) !!}
                </div>
                
                @if($internship->status === 'open')
                <div class="mt-12 bg-charcoal-50 border border-charcoal-200 rounded-2xl p-6 text-center">
                    <p class="text-charcoal-600 font-medium mb-4">Pendaftaran saat ini sedang dibuka. Hubungi bagian kurikulum atau tim BKK untuk informasi lebih lanjut tentang pendaftaran.</p>
                </div>
                @endif
            </div>
            
            <div class="mt-12 text-center">
                <x-frontend.ui.button href="{{ route('internships.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar PKL
                </x-frontend.ui.button>
            </div>
            
        </x-frontend.layout.container>
    </article>
</x-layouts.app>
