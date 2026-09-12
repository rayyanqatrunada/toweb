<x-layouts.app title="Prestasi & Penghargaan">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "CollectionPage",
      "name": "Prestasi & Penghargaan Teknik Otomotif",
      "description": "Daftar prestasi kompetisi, sertifikasi, dan penghargaan jurusan Teknik Otomotif."
    }
    </script>
    @endpush

    <main class="flex flex-col items-center bg-[#FBF8FC] w-full overflow-hidden relative">

        {{-- ═══════════════════════════════════════════════════════════════════
            SECTION 1 — HERO / HEADER & METRICS
        ═══════════════════════════════════════════════════════════════════ --}}
        <section class="w-full bg-[#F5F3F6] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-12 md:py-12">
                <div class="flex flex-col gap-6">
                    {{-- Breadcrumb & Status --}}
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                        <x-frontend.breadcrumbs :items="['Prestasi & Penghargaan' => route('achievements.index')]" />
                        <div class="flex items-center gap-2 px-3 py-1 bg-[#F0EDF1] rounded-[2px]">
                            <span class="w-2 h-2 bg-[#DC2626] rounded-full"></span>
                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5C403C]">PRESTASI REKAM JEJAK TERBARU</span>
                        </div>
                    </div>

                    {{-- Headline + Metrics --}}
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                        {{-- Left: Headline --}}
                        <div class="lg:col-span-7 xl:col-span-8 reveal-on-scroll reveal-up">
                            <span class="font-sans font-bold text-[12px] tracking-[0.6px] uppercase text-[#DC2626] mb-2 block">
                                PUSAT KEUNGGULAN PENDIDIKAN VOKASI
                            </span>
                            <h1 class="font-heading font-extrabold text-4xl sm:text-5xl lg:text-[64px] lg:leading-[64px] tracking-[-1.6px] uppercase text-[#1B1B1E] mb-6">
                                PRESTASI &amp;<br>PENGHARGAAN<br>TEKNIK OTOMOTIF
                            </h1>
                            <p class="font-sans text-base lg:text-lg leading-[29px] text-[#5C403C] max-w-[768px]">
                                Daftar prestasi kompetisi, sertifikasi industri, dan penghargaan siswa serta tenaga pendidik jurusan Teknik Otomotif SMK Negeri 1 Bangsri di kancah lokal, regional, nasional, dan kompetisi bertaraf internasional manufaktur.
                            </p>
                        </div>

                        {{-- Right: Metric Badges --}}
                        <div class="lg:col-span-5 xl:col-span-4 flex flex-col gap-3 reveal-on-scroll reveal-up delay-100">
                            {{-- Stat 1: Total --}}
                            <div class="flex items-center justify-between bg-white p-4 rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                                <div>
                                    <span class="font-heading font-bold text-[40px] leading-[48px] tracking-[-0.4px] text-[#1B1B1E]">{{ $totalAchievements }}+</span>
                                    <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">TOTAL PRESTASI TERCATAT</span>
                                </div>
                                <svg class="w-7 h-7 text-[#DC2626]" fill="currentColor" viewBox="0 0 24 24"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            </div>
                            {{-- Stat 2: National --}}
                            <div class="flex items-center justify-between bg-white p-4 rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                                <div>
                                    <span class="font-heading font-bold text-[40px] leading-[48px] tracking-[-0.4px] text-[#DC2626]">{{ $nationalCount }}</span>
                                    <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">PRESTASI TINGKAT NASIONAL</span>
                                </div>
                                <svg class="w-[15px] h-[30px] text-[#5F5E5E]" fill="currentColor" viewBox="0 0 15 30"><rect width="15" height="30" rx="2"/></svg>
                            </div>
                            {{-- Stat 3: Success Rate --}}
                            <div class="flex items-center justify-between bg-white p-4 rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                                <div>
                                    <span class="font-heading font-bold text-[40px] leading-[48px] tracking-[-0.4px] text-[#1B1B1E]">100%</span>
                                    <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">RASIO KELULUSAN SERTIFIKASI</span>
                                </div>
                                <svg class="w-8 h-8 text-[#59595C]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════════════════════════════
            SECTION 2 — ROADMAP 6 PRESTASI TERBARU (HORIZONTAL SCROLL)
        ═══════════════════════════════════════════════════════════════════ --}}
        <section class="w-full bg-[#FBF8FC] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16">
                <div class="flex flex-col gap-8">
                    {{-- Section Header --}}
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
                        <div class="reveal-on-scroll reveal-up">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-3 h-3 bg-[#DC2626] rounded-[2px]"></span>
                                <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#DC2626]">6 MILESTONE TERBARU</span>
                            </div>
                            <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-0.4px] uppercase text-[#1B1B1E]">
                                ROADMAP PRESTASI TERBARU
                            </h2>
                            <p class="font-sans text-base leading-6 text-[#5F5E5E] mt-1 max-w-2xl">
                                Enam pencapaian teknis terbaru dari bengkel kompetisi dan forum sertifikasi industri.
                            </p>
                        </div>
                        {{-- Scroll Buttons --}}
                        <div class="flex items-center gap-2 reveal-on-scroll reveal-up delay-100">
                            <button onclick="document.getElementById('roadmap-scroll').scrollBy({left: -310, behavior: 'smooth'})" class="w-10 h-10 flex items-center justify-center bg-[#F0EDF1] rounded-[2px] hover:bg-[#E4E1E5] transition-colors" aria-label="Scroll left">
                                <svg class="w-5 h-3.5 text-[#1B1B1E]" fill="none" viewBox="0 0 20 14" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1L7 7l6 6"/></svg>
                            </button>
                            <button onclick="document.getElementById('roadmap-scroll').scrollBy({left: 310, behavior: 'smooth'})" class="w-10 h-10 flex items-center justify-center bg-[#F0EDF1] rounded-[2px] hover:bg-[#E4E1E5] transition-colors" aria-label="Scroll right">
                                <svg class="w-5 h-3.5 text-[#1B1B1E]" fill="none" viewBox="0 0 20 14" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- Roadmap Horizontal Strip --}}
                    <div class="relative">
                        {{-- Connecting Line --}}
                        <div class="absolute top-7 left-0 right-0 h-[2px] bg-[#E4E1E5] z-0 hidden md:block"></div>
                        
                        <div id="roadmap-scroll" class="flex gap-6 overflow-x-auto pb-6 scrollbar-hide relative z-10 snap-x snap-mandatory" style="-webkit-overflow-scrolling: touch;">
                            @forelse($recentAchievements as $idx => $ra)
                                @php
                                    $isFirst = $idx === 0;
                                    $iconBg = $isFirst ? 'bg-[#DC2626]' : ($idx === 1 ? 'bg-[#303033]' : 'bg-[#E4E1E5]');
                                    $iconColor = $isFirst || $idx === 1 ? 'text-white' : 'text-[#1B1B1E]';
                                    $levelBg = $isFirst ? 'bg-[#FFDAD6] text-[#410002]' : 'bg-[#E5E2E1] text-[#656464]';
                                    $levelLabel = match($ra->level) {
                                        'national' => 'NASIONAL',
                                        'province' => 'PROVINSI',
                                        'district' => 'KAB/KOTA',
                                        default => strtoupper($ra->level),
                                    };
                                    $icons = ['M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z','M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z','M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z','M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z','M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z','M13 10V3L4 14h7v7l9-11h-7z'];
                                @endphp
                                <div class="flex flex-col flex-shrink-0 w-[280px] min-w-[280px] snap-start reveal-on-scroll reveal-up" style="transition-delay: {{ $idx * 60 }}ms;">
                                    {{-- Node Header: Icon + Level Badge + Date --}}
                                    <div class="flex items-center gap-3 mb-4 h-12">
                                        <div class="w-12 h-12 {{ $iconBg }} rounded-[2px] flex items-center justify-center shadow-md flex-shrink-0">
                                            <svg class="w-[15px] h-[15px] {{ $iconColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icons[$idx % count($icons)] }}"/></svg>
                                        </div>
                                        <div>
                                            <span class="inline-block px-2 py-1 rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase {{ $levelBg }}">{{ $levelLabel }}</span>
                                            <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E] mt-1">{{ $ra->date ? $ra->date->format('M Y') : '—' }}</span>
                                        </div>
                                    </div>

                                    {{-- Card --}}
                                    <div class="bg-white rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)] p-5 flex flex-col flex-grow">
                                        <div class="flex-grow">
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#DC2626] mb-2 block">{{ $ra->category ? strtoupper($ra->category->name) : 'PRESTASI' }}</span>
                                            <h3 class="font-heading font-bold text-lg leading-[29px] uppercase text-[#1B1B1E] mb-2 line-clamp-2">
                                                <a href="{{ route('achievements.show', $ra->slug) }}" class="hover:text-[#DC2626] transition-colors">
                                                    {{ $ra->title }}
                                                </a>
                                            </h3>
                                            <p class="font-sans text-base leading-6 text-[#5F5E5E] line-clamp-3">{{ Str::limit(strip_tags($ra->description), 120) }}</p>
                                        </div>
                                        <div class="flex items-center gap-1 pt-4 mt-4 border-t border-[#F0EDF1]">
                                            <svg class="w-3 h-3 text-[#5F5E5E]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">{{ Str::limit($ra->organizer, 30) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full py-12 text-center text-[#5F5E5E]">Belum ada data prestasi.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════════════════════════════
            SECTION 3 — 2 PRESTASI UNGGULAN (FEATURED SPOTLIGHT)
        ═══════════════════════════════════════════════════════════════════ --}}
        @if($featuredAchievements->isNotEmpty())
        <section class="w-full bg-[#F5F3F6] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16">
                <div class="flex flex-col gap-10">
                    {{-- Section Header --}}
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 reveal-on-scroll reveal-up">
                        <div>
                            <span class="font-sans font-bold text-[12px] tracking-[0.6px] uppercase text-[#DC2626] mb-1 block">PRESTASI UNGGULAN NASIONAL</span>
                            <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-0.4px] uppercase text-[#1B1B1E]">
                                PENCAPAIAN TERBAIK
                            </h2>
                            <p class="font-sans text-base leading-6 text-[#5F5E5E] mt-1">
                                Gelar tertinggi yang menonjolkan supremasi teknik otomotif SMKN 1 Bangsri di panggung nasional & regional.
                            </p>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block px-3 py-1 bg-[#E4E1E5] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#1B1B1E]">CURATED SELECTION &mdash; {{ $featuredAchievements->count() }} ENTRIES</span>
                        </div>
                    </div>

                    {{-- 2 Spotlight Cards --}}
                    <div class="grid grid-cols-1 {{ $featuredAchievements->count() > 1 ? 'lg:grid-cols-2' : 'max-w-3xl mx-auto w-full' }} gap-6">
                        @foreach($featuredAchievements as $fi => $feat)
                            @php
                                $levelLabel = match($feat->level) {
                                    'national' => 'NASIONAL',
                                    'province' => 'PROVINSI',
                                    'district' => 'KAB/KOTA',
                                    default => strtoupper($feat->level),
                                };
                                $participantNames = $feat->participants->pluck('student_name')->join(', ');
                                $rankText = str_starts_with(strtolower($feat->rank), 'juara') ? strtoupper($feat->rank) : 'JUARA ' . strtoupper($feat->rank);
                            @endphp
                            <article class="bg-white rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col reveal-on-scroll reveal-up" style="transition-delay: {{ $fi * 80 }}ms;">
                                {{-- Image Top --}}
                                <div class="relative h-[288px] overflow-hidden">
                                    @if($feat->photo)
                                        <img src="{{ Storage::url($feat->photo) }}" alt="{{ $feat->title }}" class="w-full h-full object-cover" loading="lazy">
                                    @else
                                        <div class="w-full h-full bg-[#E4E1E5]"></div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-[rgba(48,48,51,0.9)] via-[rgba(48,48,51,0.3)] to-transparent"></div>

                                    {{-- Badges --}}
                                    <div class="absolute top-4 left-4 flex items-center gap-2 z-10">
                                        <span class="px-3 py-1 bg-[#DC2626] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-white shadow-md">{{ $rankText }} {{ $levelLabel }}</span>
                                        <span class="px-3 py-1 bg-[#303033] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#F3F0F4]">{{ $feat->category ? strtoupper($feat->category->name) : 'KOMPETISI' }}</span>
                                    </div>

                                    {{-- Bottom overlay text --}}
                                    <div class="absolute bottom-4 left-4 right-4 z-10">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#FFDAD6] block mb-1">{{ $rankText }}</span>
                                        <h3 class="font-heading font-bold text-xl md:text-2xl leading-[31px] uppercase text-white">
                                            <a href="{{ route('achievements.show', $feat->slug) }}" class="hover:underline">
                                                {{ $feat->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>

                                {{-- Content Bottom --}}
                                <div class="p-6 flex flex-col flex-grow">
                                    <p class="font-sans text-base leading-6 text-[#5C403C] mb-4 line-clamp-3">{{ Str::limit(strip_tags($feat->description), 200) }}</p>

                                    {{-- Technical Specs Box --}}
                                    <div class="bg-[#F0EDF1] rounded-[2px] p-4 grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E] block">SISWA BERPRESTASI</span>
                                            <span class="font-sans font-bold text-base text-[#1B1B1E] mt-1 block">{{ $participantNames ?: 'Tim Teknik Otomotif' }}</span>
                                            <span class="font-sans text-[12px] text-[#5C403C] block">{{ $feat->category ? $feat->category->name : 'Kompetisi' }}</span>
                                        </div>
                                        <div>
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E] block">PENYELENGGARA</span>
                                            <span class="font-sans font-bold text-base text-[#1B1B1E] mt-1 block">{{ $feat->organizer }}</span>
                                            <span class="font-sans text-[12px] text-[#5C403C] block">{{ $feat->date ? $feat->date->translatedFormat('d F Y') : '' }}</span>
                                        </div>
                                    </div>

                                    {{-- Validator + Button --}}
                                    <div class="flex items-center justify-between pt-4 border-t border-[#E4E1E5] mt-auto">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">{{ $feat->date ? $feat->date->translatedFormat('d F Y') : '' }} &mdash; TERVERIFIKASI</span>
                                        <a href="{{ route('achievements.show', $feat->slug) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#303033] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#F3F0F4] hover:bg-[#1B1B1E] transition-colors">
                                            LIHAT DETAIL
                                            <svg class="w-[9px] h-[9px]" fill="currentColor" viewBox="0 0 12 12"><path d="M1 6h10M7 2l4 4-4 4"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{-- ═══════════════════════════════════════════════════════════════════
            SECTION 4 — ARSIP LENGKAP (ALL ACHIEVEMENTS GRID)
        ═══════════════════════════════════════════════════════════════════ --}}
        <section class="w-full bg-[#FBF8FC]" id="arsip">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16">
                <div class="flex flex-col gap-8">
                    {{-- Heading & Search --}}
                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-4 reveal-on-scroll reveal-up">
                        <div>
                            <span class="font-sans font-bold text-[12px] tracking-[0.6px] uppercase text-[#DC2626] mb-1 block">07 MULTI-YEAR ARCHIVE</span>
                            <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-0.4px] uppercase text-[#1B1B1E]">
                                DAFTAR REKAM JEJAK &amp; PENCAPAIAN
                            </h2>
                            <p class="font-sans text-base leading-6 text-[#5F5E5E] mt-1 max-w-2xl">
                                Katalog lengkap penghargaan, kompetisi, sertifikasi, dan pengakuan resmi sejak jurusan berdiri.
                            </p>
                        </div>
                        {{-- Search --}}
                        <form method="GET" action="{{ route('achievements.index') }}#arsip" class="relative w-full lg:w-[288px]">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kompetisi, siswa..." class="w-full pl-10 pr-4 py-2.5 bg-[#F0EDF1] rounded-[2px] font-sans text-base text-[#1B1B1E] placeholder-[#5F5E5E] border-0 focus:ring-2 focus:ring-[#DC2626] outline-none">
                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-[13.5px] h-[13.5px] text-[#5F5E5E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                            @if(request('year'))<input type="hidden" name="year" value="{{ request('year') }}">@endif
                        </form>
                    </div>

                    {{-- Filter Tabs & Year --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 reveal-on-scroll reveal-up delay-100">
                        {{-- Category Tabs --}}
                        <div class="flex items-center gap-2 flex-wrap">
                            <a href="{{ route('achievements.index', array_merge(request()->except('category','page'), [])) }}#arsip"
                               class="px-4 py-2 rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase {{ !request('category') ? 'bg-[#DC2626] text-white' : 'bg-[#F0EDF1] text-[#1B1B1E] hover:bg-[#E4E1E5]' }} transition-colors">
                                SEMUA
                            </a>
                            @foreach($categories as $cat)
                                <a href="{{ route('achievements.index', array_merge(request()->except('page'), ['category' => $cat->slug])) }}#arsip"
                                   class="px-4 py-2 rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase {{ request('category') === $cat->slug ? 'bg-[#DC2626] text-white' : 'bg-[#F0EDF1] text-[#1B1B1E] hover:bg-[#E4E1E5]' }} transition-colors">
                                    {{ strtoupper($cat->name) }}
                                </a>
                            @endforeach
                        </div>
                        {{-- Year Filter --}}
                        @if($years->count() > 0)
                        <div class="flex items-center gap-2">
                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">TAHUN:</span>
                            <form method="GET" action="{{ route('achievements.index') }}#arsip" id="year-filter-form">
                                @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                                <select name="year" onchange="document.getElementById('year-filter-form').submit()" class="px-4 py-2 bg-[#F0EDF1] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#1B1B1E] border-0 focus:ring-2 focus:ring-[#DC2626] cursor-pointer">
                                    <option value="">SEMUA TAHUN</option>
                                    @foreach($years as $yr)
                                        <option value="{{ $yr }}" {{ request('year') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        @endif
                    </div>

                    {{-- Grid Cards --}}
                    @if($allAchievements->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($allAchievements as $ai => $ach)
                            @php
                                $levelLabel = match($ach->level) {
                                    'national' => 'NASIONAL',
                                    'province' => 'PROVINSI',
                                    'district' => 'KAB/KOTA',
                                    default => strtoupper($ach->level),
                                };
                                $isJuara1 = str_contains(strtolower($ach->rank), 'juara 1') || str_contains(strtolower($ach->rank), 'juara i');
                                $rankBg = $isJuara1 ? 'bg-[#DC2626] text-white' : 'bg-[#303033] text-[#F3F0F4]';
                                $participantNames = $ach->participants->pluck('student_name')->join(' & ');
                            @endphp
                            <article class="bg-white rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col reveal-on-scroll reveal-up" style="transition-delay: {{ ($ai % 3) * 50 }}ms;">
                                <div class="p-6 flex flex-col flex-grow">
                                    {{-- Top: Level Badge + Rank Icon --}}
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="px-2.5 py-1 bg-[#F0EDF1] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5C403C]">
                                            TINGKAT {{ $levelLabel }}
                                        </span>
                                        @if($isJuara1)
                                            <span class="w-8 h-8 rounded-[2px] {{ $rankBg }} flex items-center justify-center font-sans font-bold text-sm">1</span>
                                        @else
                                            @php
                                                $rankNum = preg_replace('/[^0-9]/', '', $ach->rank);
                                            @endphp
                                            <span class="w-8 h-8 rounded-[2px] {{ $rankBg }} flex items-center justify-center font-sans font-bold text-sm">{{ $rankNum ?: '—' }}</span>
                                        @endif
                                    </div>

                                    {{-- Title with Link --}}
                                    <h3 class="font-heading font-bold text-lg leading-[29px] uppercase text-[#1B1B1E] mb-2 line-clamp-2">
                                        <a href="{{ route('achievements.show', $ach->slug) }}" class="hover:text-[#DC2626] transition-colors">
                                            {{ $ach->title }}
                                        </a>
                                    </h3>

                                    {{-- Description --}}
                                    <p class="font-sans text-base leading-6 text-[#5F5E5E] line-clamp-3 mb-4 flex-grow">{{ Str::limit(strip_tags($ach->description), 150) }}</p>
                                </div>

                                {{-- Footer --}}
                                <div class="bg-[#F5F3F6] px-6 py-4 rounded-b-[2px] flex items-center justify-between">
                                    <div>
                                        <span class="font-sans font-semibold text-[12px] tracking-[1.2px] uppercase text-[#1B1B1E] block">{{ $participantNames ?: strtoupper($ach->rank) }}</span>
                                        <span class="font-sans text-[12px] leading-4 text-[#5F5E5E] block mt-1">Penyelenggara: {{ $ach->organizer }}</span>
                                    </div>
                                    <a href="{{ route('achievements.show', $ach->slug) }}" class="p-2 text-[#303033] hover:text-[#DC2626] transition-colors" title="Lihat Detail">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if($allAchievements->hasPages())
                    <div class="flex flex-col items-center gap-3 pt-8">
                        {{ $allAchievements->appends(request()->except('page'))->fragment('arsip')->links() }}
                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">
                            MENAMPILKAN {{ $allAchievements->firstItem() }}-{{ $allAchievements->lastItem() }} DARI TOTAL {{ $allAchievements->total() }} PRESTASI
                        </span>
                    </div>
                    @endif
                    @else
                    <div class="w-full py-16 flex flex-col items-center text-center">
                        <x-frontend.ui.empty-state 
                            title="Tidak Ada Hasil" 
                            message="Tidak ditemukan prestasi yang sesuai dengan filter Anda." 
                            icon="document" 
                        />
                    </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════════════════════════════
            SECTION 5 — CTA DARK BANNER
        ═══════════════════════════════════════════════════════════════════ --}}
        <section class="w-full bg-[#303033] relative overflow-hidden">
            {{-- Subtle Grid --}}
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, rgba(255,255,255,0.5) 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#FFDAD6] mb-3 block">SIAP MENGUKIR PRESTASI BERSAMA KAMI?</span>
                        <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-1px] uppercase text-[#FBF8FC] mb-4">
                            BERGABUNG DENGAN JURUSAN TEKNIK OTOMOTIF
                        </h2>
                        <p class="font-sans text-lg leading-[29px] text-[#E4E1E5] max-w-2xl">
                            Raih pengalaman belajar dengan fasilitas dan bengkel modern, bimbingan instruktur berpengalaman, dan kesempatan produksi berkompetisi di tingkat nasional.
                        </p>
                    </div>
                    <div class="lg:col-span-5 flex flex-wrap gap-4 justify-start lg:justify-end reveal-on-scroll reveal-up delay-100">
                        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-6 px-8 py-4 bg-[#DC2626] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-white shadow-md hover:bg-[#B70011] transition-colors">
                            DAFTAR
                            <svg class="w-[15px] h-[12px]" fill="none" viewBox="0 0 15 12" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 6h13M9 1l5 5-5 5"/></svg>
                        </a>
                        <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-3 px-6 py-4 bg-[rgba(228,225,229,0.2)] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#FBF8FC] hover:bg-[rgba(228,225,229,0.35)] transition-colors">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                            LIHAT GALERI DOKUMENTASI
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
</x-layouts.app>
