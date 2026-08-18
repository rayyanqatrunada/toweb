<x-layouts.app 
    :title="$alumni->name . ' - Profil Alumni'"
    :description="$alumni->bio ? Str::limit(strip_tags($alumni->bio), 150) : 'Profil lulusan Teknik Otomotif angkatan ' . $alumni->graduation_year"
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
                Profil Alumni
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $alumni->name }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    Angkatan {{ $alumni->graduation_year }}
                </span>
                @if($alumni->city)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $alumni->city }}
                </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Jejaring Alumni' => route('alumni.index'),
        Str::limit($alumni->name, 30) => '#'
    ]" />

    <article class="bg-slate-50 py-16 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-12 flex flex-col md:flex-row">
                <!-- Sidebar / Photo -->
                <div class="md:w-1/3 bg-slate-50/50 border-b md:border-b-0 md:border-r border-slate-100 flex flex-col items-center py-12 px-6">
                    <div class="w-48 h-48 rounded-full overflow-hidden shadow-md border-4 border-white mb-6 relative bg-slate-200">
                        @if($alumni->photo)
                            <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400">
                                <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    <h2 class="text-xl font-bold text-center text-slate-900 mb-1">{{ $alumni->name }}</h2>
                    <p class="text-red-600 font-bold text-sm mb-6 uppercase tracking-wider text-center">Angkatan {{ $alumni->graduation_year }}</p>
                    
                    @if($alumni->social_media && (is_array($alumni->social_media) || is_object($alumni->social_media)))
                        <div class="flex flex-wrap gap-3 mt-auto justify-center w-full border-t border-slate-200 pt-6">
                            @foreach($alumni->social_media as $platform => $url)
                                @if($url)
                                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors shadow-sm focus:outline-none focus:ring-4 focus:ring-red-100" title="{{ ucfirst($platform) }}">
                                        @if(strtolower($platform) === 'linkedin')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                        @elseif(strtolower($platform) === 'instagram')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                        @else
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                        @endif
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <!-- Main Content -->
                <div class="md:w-2/3 p-8 md:p-10">
                    @if($alumni->occupation || $alumni->company)
                        <div class="bg-red-50 rounded-xl p-6 mb-10 border border-red-100 shadow-sm relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-4 opacity-10">
                                <svg class="w-16 h-16 text-red-900" fill="currentColor" viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 16H4V8h16v12z"/></svg>
                            </div>
                            <h3 class="text-xs uppercase font-bold text-red-600 tracking-wider mb-2 relative z-10">Pekerjaan Saat Ini</h3>
                            <p class="text-xl relative z-10">
                                <span class="font-bold text-slate-900">{{ $alumni->occupation ?? 'Bekerja' }}</span>
                                @if($alumni->company)
                                    <span class="text-slate-600 font-medium mx-1"> di </span>
                                    <span class="font-bold text-slate-900">{{ $alumni->company }}</span>
                                @endif
                            </p>
                        </div>
                    @endif
                    
                    @if($alumni->education)
                        <div class="mb-10">
                            <h3 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                Riwayat Pendidikan
                            </h3>
                            <div class="prose prose-slate max-w-none text-slate-700 bg-slate-50 p-6 rounded-xl border border-slate-100">
                                {!! nl2br(e($alumni->education)) !!}
                            </div>
                        </div>
                    @endif
                    
                    @if($alumni->bio)
                        <div class="mb-10">
                            <h3 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Biografi Singkat
                            </h3>
                            <div class="prose prose-slate max-w-none prose-a:text-red-600">
                                {!! \App\Support\HtmlSanitizer::clean($alumni->bio) !!}
                            </div>
                        </div>
                    @endif
                    
                    @if($alumni->achievements)
                        <div class="mb-10">
                            <h3 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                Pencapaian & Penghargaan
                            </h3>
                            <div class="prose prose-slate max-w-none prose-a:text-red-600">
                                {!! \App\Support\HtmlSanitizer::clean($alumni->achievements) !!}
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('alumni.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Jejaring Alumni
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>
