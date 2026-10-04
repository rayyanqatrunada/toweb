<x-layouts.app title="Dewan Guru & Instruktur Kejuruan TBSM" description="Bagan struktur organisasi kejuruan dan direktori dewan guru instruktur Teknik Otomotif Sepeda Motor tersertifikasi Astra Honda Motor di SMKN 1 Bangsri Jepara.">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Struktur Organisasi & Dewan Guru TBSM SMKN 1 Bangsri",
      "description": "Bagan struktur organisasi resmi kejuruan dan direktori profil dewan guru instruktur otomotif tersertifikasi Astra Honda Motor di SMK Negeri 1 Bangsri."
    }
    </script>
    @endpush

    @php
        $hod = $teachers->first(fn($t) => $t->is_head_of_department || stripos((string)($t->position ?? ''), 'Ketua Kompetensi') !== false || stripos((string)($t->position ?? ''), 'Kepala Jurusan') !== false)
            ?: $teachers->first();

        $bendahara      = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'Bendahara') !== false);
        $sekretaris     = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'Sekretaris') !== false);
        $kepalaLab      = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'Laboratorium') !== false || stripos((string)($t->position ?? ''), 'Lab') !== false);
        $bidangPrestasi = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'Event') !== false || stripos((string)($t->position ?? ''), 'Prestasi') !== false);
        $bidangIduka    = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'IDUKA') !== false || stripos((string)($t->position ?? ''), 'Industri') !== false);
        $bidangPkl      = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'PKL') !== false);
        $toolman        = $teachers->first(fn($t) => stripos((string)($t->position ?? ''), 'Toolman') !== false || stripos((string)($t->position ?? ''), 'Teknisi') !== false);

        $clusterLeadership = collect([$hod, $sekretaris, $bendahara])->filter()->unique('id');
        $clusterLab        = collect([$kepalaLab, $toolman])->filter()->unique('id');
        $clusterIndustry   = collect([$bidangIduka, $bidangPkl, $bidangPrestasi])->filter()->unique('id');

        $chartedIds    = $clusterLeadership->pluck('id')->merge($clusterLab->pluck('id'))->merge($clusterIndustry->pluck('id'));
        $otherTeachers = $teachers->whereNotIn('id', $chartedIds);

        $initials = fn($name) => strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $name ?? '')), 0, 2));
    @endphp

    {{-- ════════════════════════════════
         1. HERO
    ════════════════════════════════ --}}
    <section class="bg-white border-b border-slate-200 pt-8 pb-10 sm:pt-12 sm:pb-14">
        <x-frontend.layout.container class="px-4 sm:px-6">
            <nav class="flex items-center gap-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-red-600 transition-colors">Beranda</a>
                <span>/</span><span>Akademik</span><span>/</span>
                <span class="text-slate-700">Dewan Guru</span>
            </nav>

            <div class="max-w-3xl">
                <p class="text-xs font-black uppercase tracking-widest text-red-600 mb-3">Tata Kelola & Dewan Instruktur</p>
                <h1 class="font-heading font-black text-3xl sm:text-5xl lg:text-6xl uppercase tracking-tight text-slate-900 leading-tight mb-4">
                    Struktur Organisasi &<br class="hidden sm:block">
                    <span class="text-red-600">Dewan Guru {{ $settings->get('site_short_name', 'TSM') }}</span>
                </h1>
                <p class="text-slate-500 text-sm sm:text-base leading-relaxed max-w-2xl">
                    Hierarki kepemimpinan kejuruan, fasilitas bengkel berstandar AHASS, serta instruktur bersertifikat Astra Honda Motor di SMK Negeri 1 Bangsri.
                </p>
                <div class="flex flex-wrap gap-3 mt-7">
                    <a href="#bagan-organisasi" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900 text-white text-xs font-bold uppercase tracking-wider hover:bg-red-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Lihat Bagan
                    </a>
                    <a href="#direktori-guru" class="inline-flex items-center gap-2 px-5 py-2.5 border border-slate-300 text-slate-700 text-xs font-bold uppercase tracking-wider hover:border-slate-400 hover:bg-slate-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Direktori Guru
                    </a>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-slate-900 text-white flex items-center justify-center text-xs font-black font-heading shrink-0">{{ count($teachers) }}</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Pendidik & Instruktur</div>
                        <div class="text-[11px] text-slate-400">Keluarga Besar {{ $settings->get('site_short_name','TSM') }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-slate-900 text-white flex items-center justify-center text-xs font-black font-heading shrink-0">AHM</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Kurikulum Industri</div>
                        <div class="text-[11px] text-slate-400">PT Astra Honda Motor</div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-slate-900 text-white flex items-center justify-center text-xs font-black font-heading shrink-0">BNSP</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Asesor Kompetensi</div>
                        <div class="text-[11px] text-slate-400">LSP Pihak Pertama</div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-slate-900 text-white flex items-center justify-center text-xs font-black font-heading shrink-0">5R</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Budaya Kerja</div>
                        <div class="text-[11px] text-slate-400">Disiplin & Keselamatan</div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    {{-- ════════════════════════════════
         2. BAGAN STRUKTUR ORGANISASI
    ════════════════════════════════ --}}
    <section id="bagan-organisasi" class="py-14 sm:py-20 bg-slate-50 border-b border-slate-200">
        <style>
            .org-col { position:relative; display:flex; flex-direction:column; align-items:center; padding-top:36px; }
            .org-col::before { content:''; position:absolute; top:0; height:2px; background:#cbd5e1; }
            .org-col:first-child::before { left:50%; right:0; }
            .org-col:last-child::before  { left:0; right:50%; }
            .org-col:not(:first-child):not(:last-child)::before { left:0; right:0; }
            .org-col::after  { content:''; position:absolute; top:0; left:50%; transform:translateX(-50%); width:2px; height:36px; background:#cbd5e1; }
            .org-col:only-child::before { display:none; }
            .org-dot { position:absolute; top:-6px; left:50%; transform:translateX(-50%); width:12px; height:12px; border-radius:9999px; background:#fff; border:2px solid #94a3b8; z-index:10; }
        </style>

        <x-frontend.layout.container class="px-4 sm:px-6">
            <div class="mb-8 sm:mb-10">
                <p class="text-xs font-black uppercase tracking-widest text-red-600 mb-1">Alur Koordinasi & Tata Kelola</p>
                <h2 class="font-heading font-black text-2xl sm:text-4xl text-slate-900 uppercase tracking-tight">Bagan Struktur Organisasi</h2>
            </div>

            <div class="bg-white border border-slate-200 p-4 sm:p-8 lg:p-12 overflow-hidden">
                <div class="xl:hidden flex items-center justify-center gap-2 mb-6 text-xs text-slate-500 bg-slate-50 border border-slate-200 px-4 py-2 w-fit mx-auto">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    <span>Geser ke samping untuk melihat seluruh bagan</span>
                </div>

                <div class="overflow-x-auto pb-4 -mx-2 px-2">
                    <div class="min-w-[900px] max-w-[1060px] mx-auto flex flex-col items-center">

                        {{-- LEVEL 1 — Ketua Kompetensi --}}
                        <div class="flex flex-col items-center">
                            <a href="#guru-{{ $hod?->id ?? 1 }}" class="group block">
                                <div class="w-72 border-2 border-slate-900 bg-white hover:-translate-y-1 transition-transform duration-300 text-center p-5">
                                    <div class="inline-block px-3 py-0.5 bg-red-600 text-white text-[9px] font-black uppercase tracking-widest mb-3">Pimpinan Kejuruan</div>
                                    <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-3 bg-slate-100 border-2 border-slate-200">
                                        @if($hod && $hod->hasValidPhoto() && $hod->photo_url)
                                            <img src="{{ $hod->photo_url }}" alt="{{ $hod->name }}" class="w-full h-full object-cover object-top" loading="eager">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-slate-900 text-white font-heading font-black text-2xl">{{ $initials($hod?->name ?? 'PK') }}</div>
                                        @endif
                                    </div>
                                    <h3 class="font-heading font-black text-sm text-slate-900 uppercase leading-tight group-hover:text-red-600 transition-colors mb-1">{{ $hod?->name ?? 'Pimpinan Kejuruan' }}</h3>
                                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">{{ $hod?->position ?? 'Ketua Kompetensi Keahlian' }}</div>
                                </div>
                            </a>
                            <div class="w-px h-10 bg-slate-300 relative">
                                <div class="w-3 h-3 rounded-full bg-red-600 absolute -bottom-1.5 left-1/2 -translate-x-1/2"></div>
                            </div>
                        </div>

                        {{-- LEVEL 2 — 3 Pengelola --}}
                        <div class="flex justify-center w-full max-w-[880px] mx-auto">
                            @foreach([
                                [$bendahara, 'Bendahara'],
                                [$sekretaris, 'Sekretaris'],
                                [$kepalaLab, 'Kepala Laboratorium'],
                            ] as [$person, $defaultPos])
                            <div class="org-col flex-1 px-3">
                                <div class="org-dot"></div>
                                <a href="#guru-{{ $person?->id ?? 0 }}" class="group block w-full max-w-[260px] mx-auto">
                                    <div class="border border-slate-200 bg-white hover:border-slate-400 hover:-translate-y-1 transition-all duration-300 p-4 text-center">
                                        <div class="w-16 h-16 rounded-full overflow-hidden mx-auto mb-2.5 bg-slate-100 border border-slate-200">
                                            @if($person && $person->hasValidPhoto() && $person->photo_url)
                                                <img src="{{ $person->photo_url }}" alt="{{ $person->name }}" class="w-full h-full object-cover object-top" loading="lazy">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-slate-800 text-white font-heading font-bold text-lg">{{ $initials($person?->name ?? $defaultPos) }}</div>
                                            @endif
                                        </div>
                                        <h4 class="font-heading font-bold text-xs text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">{{ $person?->name ?? '-' }}</h4>
                                        <div class="inline-block px-2 py-0.5 bg-slate-100 border border-slate-200 text-slate-600 font-bold text-[10px] uppercase">{{ $person?->position ?? $defaultPos }}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>

                        {{-- stem + label --}}
                        <div class="flex justify-center py-1 mt-1">
                            <div class="w-px h-12 bg-slate-300 relative flex justify-center">
                                <div class="absolute top-1/2 -translate-y-1/2 px-3 py-1 bg-white border border-slate-200 text-[10px] font-bold uppercase tracking-wider text-slate-500 whitespace-nowrap z-10">
                                    Koordinasi Bidang Kerja
                                </div>
                                <div class="w-3 h-3 rounded-full bg-slate-700 absolute -bottom-1.5 left-1/2 -translate-x-1/2"></div>
                            </div>
                        </div>

                        {{-- LEVEL 3 — 4 Divisi --}}
                        <div class="flex justify-center w-full max-w-[1020px] mx-auto">
                            @foreach([
                                [$bidangPrestasi, 'Bidang Event & Prestasi'],
                                [$bidangIduka,    'Bidang IDUKA'],
                                [$bidangPkl,      'Bidang PKL'],
                                [$toolman,        'Toolman / Teknisi Lab'],
                            ] as [$person, $defaultPos])
                            <div class="org-col flex-1 px-2">
                                <div class="org-dot"></div>
                                <a href="#guru-{{ $person?->id ?? 0 }}" class="group block w-full max-w-[220px] mx-auto">
                                    <div class="border-t-2 border-t-slate-900 border border-slate-200 bg-white hover:border-slate-400 hover:-translate-y-0.5 transition-all duration-300 p-3.5 text-center">
                                        <div class="w-14 h-14 rounded-full overflow-hidden mx-auto mb-2 bg-slate-100 border border-slate-200">
                                            @if($person && $person->hasValidPhoto() && $person->photo_url)
                                                <img src="{{ $person->photo_url }}" alt="{{ $person->name }}" class="w-full h-full object-cover object-top" loading="lazy">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-slate-800 text-white font-heading font-bold text-sm">{{ $initials($person?->name ?? $defaultPos) }}</div>
                                            @endif
                                        </div>
                                        <h5 class="font-heading font-bold text-xs text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1 line-clamp-2">{{ $person?->name ?? '-' }}</h5>
                                        <div class="inline-block px-2 py-0.5 bg-slate-100 border border-slate-200 text-slate-600 font-bold text-[9px] uppercase">{{ $person?->position ?? $defaultPos }}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            {{-- Legend --}}
            <div class="mt-4 flex flex-wrap gap-4 text-xs text-slate-500">
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 border-2 border-red-600 inline-block"></span> Pimpinan</span>
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 border-2 border-slate-400 inline-block"></span> Pengelola</span>
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 border-t-2 border-slate-900 border border-slate-300 inline-block"></span> Koordinator Bidang</span>
            </div>
        </x-frontend.layout.container>
    </section>

    {{-- ════════════════════════════════
         3. DIREKTORI PROFIL GURU
    ════════════════════════════════ --}}
    <section id="direktori-guru" class="py-14 sm:py-20 bg-white">
        <x-frontend.layout.container class="px-4 sm:px-6">

            <div class="mb-10 sm:mb-14 text-center max-w-2xl mx-auto">
                <p class="text-xs font-black uppercase tracking-widest text-red-600 mb-2">Profil & Kompetensi Pendidik</p>
                <h2 class="font-heading font-black text-2xl sm:text-4xl text-slate-900 uppercase tracking-tight">Direktori Dewan Guru</h2>
                <p class="text-slate-500 text-sm mt-3 leading-relaxed">Setiap tenaga pendidik memiliki spesialisasi keahlian otomotif bersertifikat untuk membimbing siswa.</p>
            </div>

            @php
                $directoryClusters = [
                    ['Pimpinan & Tata Kelola Kejuruan',        'Perumusan Kurikulum, Administrasi & Pengelolaan Keuangan', 'red',   $clusterLeadership],
                    ['Laboratorium, Bengkel & Sarana Presisi',  'Tata Kelola Bengkel Resmi AHASS, Kalibrasi SST & Bike Lift', 'slate', $clusterLab],
                    ['Kemitraan Industri, PKL & Prestasi',      'Kerjasama DUDI, Penempatan Magang di AHASS & Pembinaan LKS', 'slate', $clusterIndustry],
                ];
            @endphp

            @foreach($directoryClusters as [$clusterTitle, $clusterSub, $accent, $clusterItems])
            @if($clusterItems->count())
            <div class="mb-12 sm:mb-16">
                <div class="flex items-center gap-3 mb-6 pb-3 border-b border-slate-200">
                    <div class="w-1 h-7 {{ $accent === 'red' ? 'bg-red-600' : 'bg-slate-900' }}"></div>
                    <div>
                        <h3 class="font-heading font-black text-lg sm:text-xl text-slate-900 uppercase tracking-tight">{{ $clusterTitle }}</h3>
                        <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">{{ $clusterSub }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 {{ $clusterItems->count() >= 3 ? 'lg:grid-cols-3' : 'max-w-3xl' }} gap-4 sm:gap-6">
                    @foreach($clusterItems as $teacher)
                    <div id="guru-{{ $teacher->id }}" class="scroll-mt-24 flex border border-slate-200 bg-white hover:border-slate-300 hover:shadow-md transition-all duration-300 group overflow-hidden">
                        <div class="w-24 sm:w-28 shrink-0 bg-slate-100 overflow-hidden relative">
                            @if($teacher->hasValidPhoto() && $teacher->photo_url)
                                <img src="{{ $teacher->photo_url }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            @else
                                <div class="w-full h-full min-h-[120px] flex items-center justify-center bg-slate-900 text-white font-heading font-black text-2xl">{{ $initials($teacher->name) }}</div>
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 bg-slate-900/80 px-2 py-1">
                                <div class="text-white text-[8px] font-bold uppercase leading-tight line-clamp-2">{{ $teacher->position ?? 'Guru Kejuruan' }}</div>
                            </div>
                        </div>
                        <div class="p-3.5 sm:p-4 flex flex-col justify-between flex-grow min-w-0">
                            <div>
                                <h4 class="font-heading font-bold text-sm sm:text-base text-slate-900 group-hover:text-red-600 transition-colors leading-snug mb-1 line-clamp-2">{{ $teacher->name }}</h4>
                                @if($teacher->specialization)
                                    <p class="text-[11px] text-slate-500 mb-1.5 line-clamp-1">{{ $teacher->specialization }}</p>
                                @endif
                                @if($teacher->bio)
                                    <p class="text-[11px] text-slate-400 leading-relaxed line-clamp-2 italic">"{{ $teacher->bio }}"</p>
                                @endif
                            </div>
                            @if($teacher->phone)
                            <div class="mt-3 pt-2.5 border-t border-slate-100">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $teacher->phone) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-600 hover:text-red-600 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.202.043.073.043.419-.101.824z"/></svg>
                                    Kontak WA
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach

            @if($otherTeachers->count() > 0)
            <div class="mb-4">
                <div class="flex items-center gap-3 mb-6 pb-3 border-b border-slate-200">
                    <div class="w-1 h-7 bg-slate-300"></div>
                    <div>
                        <h3 class="font-heading font-black text-lg sm:text-xl text-slate-900 uppercase tracking-tight">Tenaga Pengajar Lainnya</h3>
                        <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Tim Pengampu Mata Pelajaran Produktif & Muatan Kejuruan</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
                    @foreach($otherTeachers as $ot)
                    <div class="flex flex-col items-center text-center border border-slate-200 bg-white p-4 hover:border-slate-300 hover:shadow-sm transition-all">
                        <div class="w-16 h-16 rounded-full overflow-hidden mb-3 bg-slate-100 border border-slate-200">
                            @if($ot->hasValidPhoto() && $ot->photo_url)
                                <img src="{{ $ot->photo_url }}" alt="{{ $ot->name }}" class="w-full h-full object-cover object-top" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-800 text-white font-heading font-bold text-lg">{{ $initials($ot->name) }}</div>
                            @endif
                        </div>
                        <h4 class="font-heading font-bold text-xs text-slate-900 mb-1 line-clamp-2 leading-snug">{{ $ot->name }}</h4>
                        <p class="text-[10px] text-slate-500 font-semibold uppercase tracking-wider line-clamp-2">{{ $ot->position ?? 'Guru Kejuruan' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </x-frontend.layout.container>
    </section>

    {{-- ════════════════════════════════
         4. KUALIFIKASI & CTA
    ════════════════════════════════ --}}
    <section class="py-14 sm:py-20 bg-slate-50 border-t border-slate-200">
        <x-frontend.layout.container class="px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-5">
                    <p class="text-xs font-black uppercase tracking-widest text-red-600 mb-3">Standarisasi Pendidik</p>
                    <h2 class="font-heading font-black text-2xl sm:text-3xl text-slate-900 uppercase tracking-tight leading-tight mb-4">Kualifikasi & Sertifikasi Pengajar</h2>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        Guru kejuruan {{ $settings->get('site_short_name', 'TSM') }} wajib mengikuti sertifikasi berjenjang dari PT Astra Honda Motor dan LSP Pihak Pertama guna menjamin kurikulum selalu relevan dengan teknologi terkini.
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 bg-red-600 text-white flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">✓</div>
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Astra Motor Training Center (AMTC)</div>
                                <p class="text-xs text-slate-500 mt-0.5">Sertifikasi berjenjang teknisi resmi Honda untuk guru produktif.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 bg-red-600 text-white flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">✓</div>
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Asesor Lisensi BNSP / LSP-P1</div>
                                <p class="text-xs text-slate-500 mt-0.5">Memiliki sertifikat penguji UKK resmi SKKNI.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 bg-red-600 text-white flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">✓</div>
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Instruktur Safety Riding Bersertifikat</div>
                                <p class="text-xs text-slate-500 mt-0.5">Pelatih bersertifikasi dalam kompetisi keselamatan berkendara Honda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 bg-slate-900 p-7 sm:p-10 text-white relative overflow-hidden">
                    <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-red-600/20 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <span class="inline-block px-3 py-1 bg-white/10 text-red-400 text-[10px] font-black uppercase tracking-widest mb-4">Kolaborasi Industri</span>
                        <h3 class="font-heading font-black text-xl sm:text-2xl uppercase tracking-tight mb-3">Ingin Berkonsultasi Mengenai Program Kejuruan Kami?</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-7">
                            Kami membuka dialog bagi orang tua, mitra industri, dan calon peserta didik yang ingin mengetahui lebih dalam seputar kurikulum, magang AHASS, dan fasilitas laboratorium.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('academic.programs') }}" class="px-5 py-2.5 bg-red-600 text-white text-xs font-bold uppercase tracking-wider hover:bg-red-700 transition-colors">Lihat Program Keahlian</a>
                            <a href="{{ route('academic.facilities') }}" class="px-5 py-2.5 bg-white/10 border border-white/20 text-white text-xs font-bold uppercase tracking-wider hover:bg-white/20 transition-colors">Fasilitas Bengkel</a>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

</x-layouts.app>
