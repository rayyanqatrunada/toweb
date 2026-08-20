<x-layouts.app :title="$partner->name . ' - Mitra Industri'">
    <!-- Hero Header -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
                <div class="w-48 h-48 md:w-56 md:h-56 shrink-0 bg-white rounded-3xl p-6 shadow-2xl flex items-center justify-center border-4 border-charcoal-800 transform rotate-1 hover:rotate-0 transition-transform">
                    @if($partner->logo)
                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-full bg-charcoal-50 text-charcoal-400 rounded-xl flex items-center justify-center">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    @endif
                </div>
                
                <div class="text-center md:text-left flex-grow">
                    <div class="inline-flex items-center space-x-2 mb-4">
                        <span class="bg-primary-500/20 text-primary-300 border border-primary-500/30 text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full">
                            {{ $partner->industry_type ?? 'Mitra DUDI' }}
                        </span>
                        @if($partner->status == 'published')
                            <span class="flex h-3 w-3 relative ml-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500" title="Active Partner"></span>
                            </span>
                        @endif
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $partner->name }}</h1>
                    
                    <div class="flex flex-col sm:flex-row flex-wrap items-center justify-center md:justify-start gap-4 md:gap-8 text-charcoal-300 text-sm font-medium">
                        @if($partner->address)
                            <div class="flex items-center max-w-sm text-left">
                                <svg class="w-5 h-5 mr-2 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="line-clamp-2">{{ $partner->address }}</span>
                            </div>
                        @endif
                        @if($partner->website)
                            <a href="{{ Str::startsWith($partner->website, 'http') ? $partner->website : 'https://'.$partner->website }}" target="_blank" class="flex items-center hover:text-white transition-colors group">
                                <svg class="w-5 h-5 mr-2 text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                <span>Kunjungi Website</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="[
                'Kemitraan Industri' => route('partnership.index'),
                $partner->name => '#'
            ]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Kembali ke Mitra' => route('partnership.index')]" />
    </div>

    <article class="py-16 lg:py-24 bg-white min-h-[50vh]">
        <x-frontend.layout.container class="max-w-4xl">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    @if($partner->description)
                        <div>
                            <h2 class="text-2xl font-bold text-charcoal-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                Profil Perusahaan
                            </h2>
                            <div class="prose prose-lg prose-charcoal max-w-none prose-headings:font-bold prose-a:text-primary-600 hover:prose-a:text-primary-700">
                                {!! \App\Support\HtmlSanitizer::clean($partner->description) !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar Content -->
                <div class="space-y-8">
                    
                    @if(isset($partner->jobVacancies) && $partner->jobVacancies->count() > 0)
                        <div class="bg-charcoal-50 rounded-3xl p-8 border border-charcoal-100 shadow-sm relative overflow-hidden group">
                            <!-- Background Decoration -->
                            <div class="absolute -right-6 -top-6 text-charcoal-200/50 transform group-hover:scale-110 transition-transform duration-500 pointer-events-none">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            
                            <div class="relative z-10">
                                <h3 class="text-xl font-bold text-charcoal-900 mb-2">Bursa Kerja</h3>
                                <p class="text-charcoal-600 mb-6 font-medium">Terdapat lowongan aktif dari perusahaan ini di portal karir kami.</p>
                                
                                <a href="{{ route('jobs.index') }}?mitra={{ $partner->slug }}" class="w-full inline-flex items-center justify-center px-6 py-3 font-bold text-white bg-primary-600 hover:bg-primary-700 rounded-xl transition-colors focus:ring-4 focus:ring-primary-100">
                                    Lihat {{ $partner->jobVacancies->count() }} Lowongan
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="bg-charcoal-50 rounded-3xl p-8 border border-charcoal-100 shadow-sm text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm border border-charcoal-100 text-charcoal-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="font-bold text-charcoal-900 mb-2">Bursa Kerja</h3>
                            <p class="text-sm text-charcoal-500">Belum ada lowongan aktif yang dipublikasikan saat ini.</p>
                        </div>
                    @endif

                </div>
            </div>
            
            <div class="mt-16 pt-8 border-t border-charcoal-100 text-center">
                <a href="{{ route('partnership.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-charcoal-700 bg-white border-2 border-charcoal-200 rounded-xl hover:bg-charcoal-50 hover:text-primary-600 hover:border-primary-200 transition-all focus:ring-4 focus:ring-charcoal-50 group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Mitra
                </a>
            </div>
        </x-frontend.layout.container>
    </article>
</x-layouts.app>
