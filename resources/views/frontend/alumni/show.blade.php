<x-layouts.app 
    :title="$alumni->name . ' - Profil Alumni'"
    :description="$alumni->bio ? Str::limit(strip_tags($alumni->bio), 150) : 'Profil lulusan Teknik dan Bisnis Sepeda Motor (TBSM) angkatan ' . $alumni->graduation_year"
>
    <!-- Header Page -->
    <div class="bg-charcoal-50 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-200">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center reveal-on-scroll reveal-up">
            <span class="inline-block py-1 px-4 bg-primary-100 text-primary-700 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-primary-200 shadow-sm">
                Profil Alumni
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-charcoal-900 mb-6 leading-tight">{{ $alumni->name }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-600 text-sm gap-4 md:gap-6 mt-6 font-semibold">
                <span class="flex items-center px-4 py-2 bg-white rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    Angkatan {{ $alumni->graduation_year }}
                </span>
                @if($alumni->city)
                <span class="flex items-center px-4 py-2 bg-white rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $alumni->city }}
                </span>
                @endif
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-white border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="[
                'Jejaring Alumni' => route('alumni.index'),
                Str::limit($alumni->name, 30) => '#'
            ]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Kembali' => route('alumni.index')]" />
    </div>

    <article class="bg-white py-12 lg:py-20 min-h-[50vh]">
        <x-frontend.layout.container class="max-w-5xl">
            
            <div class="bg-white rounded-3xl shadow-xl shadow-charcoal-900/5 border border-charcoal-100 overflow-hidden mb-16 flex flex-col md:flex-row relative z-10 reveal-on-scroll reveal-up">
                <!-- Sidebar / Photo -->
                <div class="md:w-1/3 bg-charcoal-50 border-b md:border-b-0 md:border-r border-charcoal-200 flex flex-col items-center py-16 px-8 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-charcoal-100/50 to-transparent pointer-events-none"></div>
                    
                    <div class="w-56 h-56 rounded-full overflow-hidden shadow-2xl shadow-charcoal-900/10 border-4 border-white mb-8 relative z-10 bg-charcoal-100 flex-shrink-0">
                        @if($alumni->photo)
                            <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-charcoal-400">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    <h2 class="text-2xl font-black text-center text-charcoal-900 mb-2 relative z-10 leading-tight">{{ $alumni->name }}</h2>
                    <p class="text-primary-600 font-bold text-sm mb-8 uppercase tracking-widest text-center relative z-10">Angkatan {{ $alumni->graduation_year }}</p>
                </div>
                
                <!-- Main Content -->
                <div class="md:w-2/3 p-8 md:p-12">
                    @if($alumni->current_occupation || $alumni->current_company)
                        <div class="bg-primary-50 rounded-2xl p-8 mb-10 border border-primary-100 shadow-sm relative overflow-hidden group">
                            <div class="absolute -right-4 -top-4 opacity-5 transform group-hover:scale-110 transition-transform duration-700 pointer-events-none">
                                <svg class="w-32 h-32 text-primary-900" fill="currentColor" viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 16H4V8h16v12z"/></svg>
                            </div>
                            <h3 class="text-xs uppercase font-black text-primary-600 tracking-widest mb-3 relative z-10 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Pekerjaan Saat Ini
                            </h3>
                            <p class="text-2xl relative z-10 leading-tight">
                                @if($alumni->current_occupation)
                                    <span class="font-bold text-charcoal-900">{{ $alumni->current_occupation }}</span>
                                @else
                                    <span class="font-bold text-charcoal-900">Bekerja</span>
                                @endif
                                @if($alumni->current_company)
                                    <span class="text-charcoal-500 font-medium mx-1">di</span>
                                    <span class="font-bold text-primary-700">{{ $alumni->current_company }}</span>
                                @endif
                            </p>
                        </div>
                    @endif
                    
                    @if($alumni->education)
                        <div class="mb-10">
                            <h3 class="text-xl font-bold text-charcoal-900 mb-5 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-charcoal-100 text-charcoal-600 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                </div>
                                Riwayat Pendidikan
                            </h3>
                            <div class="prose prose-charcoal max-w-none bg-charcoal-50 p-6 rounded-2xl border border-charcoal-100">
                                {!! nl2br(e($alumni->education)) !!}
                            </div>
                        </div>
                    @endif
                    
                    @if($alumni->bio)
                        <div class="mb-10">
                            <h3 class="text-xl font-bold text-charcoal-900 mb-5 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-charcoal-100 text-charcoal-600 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                Biografi
                            </h3>
                            <div class="prose prose-lg prose-charcoal max-w-none prose-a:text-primary-600 hover:prose-a:text-primary-700">
                                {!! \App\Support\HtmlSanitizer::clean($alumni->bio) !!}
                            </div>
                        </div>
                    @endif
                    
                    @if($alumni->achievements)
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-charcoal-900 mb-5 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-charcoal-100 text-charcoal-600 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                                Pencapaian & Penghargaan
                            </h3>
                            <div class="prose prose-lg prose-charcoal max-w-none prose-a:text-primary-600 hover:prose-a:text-primary-700">
                                {!! \App\Support\HtmlSanitizer::clean($alumni->achievements) !!}
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>

            <div class="text-center pt-12 reveal-on-scroll reveal-up">
                <x-frontend.ui.button href="{{ route('alumni.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Jejaring Alumni
                </x-frontend.ui.button>
            </div>
            
        </x-frontend.layout.container>
    </article>
</x-layouts.app>
