<x-layouts.app 
    :title="$internship->title"
    :description="Str::limit(strip_tags($internship->description), 150)"
>
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <span class="inline-block py-1 px-3 bg-red-500/20 text-red-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-red-500/30">
                Program PKL
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $internship->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Mitra Industri: &nbsp;
                    @if($internship->industryPartner)
                        <a href="{{ route('partnership.show', $internship->industryPartner->slug) }}" class="text-red-300 hover:text-red-400 font-bold hover:underline transition-colors focus:outline-none">{{ $internship->industryPartner->name }}</a>
                    @else
                        -
                    @endif
                </span>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Program PKL' => route('internships.index'),
        Str::limit($internship->title, 30) => '#'
    ]" />

    <article class="bg-white py-16 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-slate-500 mb-3 border border-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="block text-xs text-slate-500 uppercase tracking-wider font-bold mb-1">Tanggal Mulai</span>
                    <span class="text-slate-900 font-bold">{{ $internship->start_date ? $internship->start_date->translatedFormat('d F Y') : '-' }}</span>
                </div>
                
                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-slate-500 mb-3 border border-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="block text-xs text-slate-500 uppercase tracking-wider font-bold mb-1">Tanggal Selesai</span>
                    <span class="text-slate-900 font-bold">{{ $internship->end_date ? $internship->end_date->translatedFormat('d F Y') : '-' }}</span>
                </div>

                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-slate-500 mb-3 border border-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <span class="block text-xs text-slate-500 uppercase tracking-wider font-bold mb-1">Lokasi PKL</span>
                    <span class="text-slate-900 font-bold">{{ $internship->location ?? 'Sesuai Penempatan' }}</span>
                </div>
            </div>
            
            <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Deskripsi Program
            </h2>
            <div class="prose prose-lg prose-slate max-w-none prose-a:text-red-600 hover:prose-a:text-red-700">
                {!! $internship->description !!}
            </div>
            
            <div class="mt-16 text-center border-t border-slate-100 pt-12">
                <a href="{{ route('internships.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar PKL
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>
