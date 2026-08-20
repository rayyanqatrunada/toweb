<x-layouts.app title="Prestasi & Penghargaan">
    <!-- Hero Section -->
    <section class="bg-charcoal-950 border-b border-charcoal-800 relative overflow-hidden lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <!-- Trophy Pattern/Abstract Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Prestasi & Penghargaan' => route('achievements.index')]" class="mb-8" />
            
            <x-frontend.ui.eyebrow class="text-amber-400">PROOF OF COMPETENCE</x-frontend.ui.eyebrow>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1] mt-4 mb-6">
                Prestasi &<br class="hidden sm:block"> Penghargaan
            </h1>
            <p class="text-lg text-charcoal-300 font-medium leading-relaxed max-w-2xl border-l-2 border-amber-500 pl-4">
                Merekam jejak keberhasilan siswa dan tenaga pendidik dalam menguasai teknologi otomotif di berbagai ajang kompetisi.
            </p>
        </x-frontend.layout.container>
    </section>

    <!-- Content Section -->
    <section class="py-16 lg:py-24 bg-charcoal-50 min-h-[50vh]">
        <x-frontend.layout.container>
            @if($achievements->isEmpty())
                <div class="py-20 reveal-on-scroll reveal-up">
                    <x-frontend.ui.empty-state title="Belum Ada Rekor Prestasi" message="Data prestasi dan penghargaan belum ditambahkan saat ini." icon="document" />
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                    
                    @foreach($achievements as $loopIndex => $achievement)
                        <div class="reveal-on-scroll reveal-up" style="transition-delay: {{ ($loopIndex % 3) * 50 }}ms;">
                            <article class="relative flex flex-col h-full bg-white border-2 border-charcoal-100 rounded-2xl overflow-hidden group hover:border-amber-400 hover:shadow-xl hover:shadow-amber-900/5 transition-all duration-500 focus-within:ring-4 focus-within:ring-amber-500 focus-within:border-amber-500">
                                
                                <!-- Trophy/Rank Ribbon -->
                                <div class="absolute -right-12 top-6 rotate-45 bg-amber-500 text-amber-950 font-black text-[10px] tracking-widest uppercase py-1 px-14 shadow-md z-20 pointer-events-none group-hover:bg-amber-400 transition-colors text-center w-40">
                                    JUARA {{ $achievement->rank }}
                                </div>

                                <a href="{{ route('achievements.show', $achievement->slug) }}" class="relative aspect-[4/5] sm:aspect-square overflow-hidden block bg-charcoal-900 focus:outline-none z-10">
                                    @if($achievement->photo)
                                        <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" class="object-cover w-full h-full opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700" loading="{{ $loopIndex < 3 ? 'eager' : 'lazy' }}">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-charcoal-600 bg-charcoal-100 group-hover:bg-charcoal-200 transition-colors">
                                            <svg class="w-16 h-16 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Overlay Gradient for better text readability -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    
                                    <!-- Title inside Image -->
                                    <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8 flex flex-col justify-end">
                                        <div class="mb-3">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-widest bg-amber-400 text-amber-950 shadow-sm shadow-amber-900/20">
                                                TINGKAT {{ strtoupper($achievement->level) }}
                                            </span>
                                        </div>
                                        <h3 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight leading-tight group-hover:text-amber-400 transition-colors line-clamp-3">
                                            {{ $achievement->title }}
                                        </h3>
                                    </div>
                                </a>
                                
                                <div class="p-6 sm:p-8 flex flex-col flex-grow bg-white relative z-10 border-t-4 border-charcoal-50 group-hover:border-amber-400 transition-colors duration-500">
                                    <div class="grid grid-cols-1 gap-y-4 mb-6">
                                        <!-- Date -->
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 rounded-full bg-charcoal-50 flex items-center justify-center mr-4 shrink-0 border border-charcoal-100 group-hover:bg-amber-50 group-hover:border-amber-200 transition-colors">
                                                <svg class="w-4 h-4 text-charcoal-500 group-hover:text-amber-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Tanggal</div>
                                                <div class="text-sm font-semibold text-charcoal-900">{{ $achievement->date ? $achievement->date->translatedFormat('d F Y') : 'Tidak Diketahui' }}</div>
                                            </div>
                                        </div>
                                        
                                        <!-- Organizer -->
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 rounded-full bg-charcoal-50 flex items-center justify-center mr-4 shrink-0 border border-charcoal-100 group-hover:bg-amber-50 group-hover:border-amber-200 transition-colors">
                                                <svg class="w-4 h-4 text-charcoal-500 group-hover:text-amber-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Penyelenggara</div>
                                                <div class="text-sm font-semibold text-charcoal-900 line-clamp-1" title="{{ $achievement->organizer }}">{{ $achievement->organizer }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-auto pt-5 border-t border-charcoal-100 flex justify-between items-center">
                                        <a href="{{ route('achievements.show', $achievement->slug) }}" class="inline-flex items-center text-sm font-bold text-charcoal-900 hover:text-amber-600 transition-colors focus:outline-none group-hover:text-amber-600">
                                            Lihat Detail
                                            <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </a>
                                        <svg class="w-6 h-6 text-charcoal-200 group-hover:text-amber-300 transition-colors" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.984 3.984 0 01-3-1.383A3.984 3.984 0 019 15a3.984 3.984 0 01-3-1.383A3.989 3.989 0 013.285 13.9l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L10 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274zm-5-2.274L6.618 9.38l1.83 5.7c.456.345 1.025.545 1.63.545.605 0 1.174-.2 1.63-.545l1.83-5.7L10 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                @if($achievements->hasPages())
                    <div class="mt-16 reveal-on-scroll reveal-up">
                        <x-frontend.ui.divider class="mb-10" />
                        <div class="flex justify-center">
                            {{ $achievements->links() }}
                        </div>
                    </div>
                @endif
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>



