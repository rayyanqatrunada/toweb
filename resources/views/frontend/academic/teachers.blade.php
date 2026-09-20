<x-layouts.app title="Struktur Organisasi & Dewan Guru TBSM">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Struktur Organisasi & Dewan Guru TBSM SMK Negeri 1 Bangsri",
      "description": "Bagan struktur organisasi resmi kejuruan dan direktori profil dewan guru instruktur otomotif tersertifikasi Astra Honda Motor di SMK Negeri 1 Bangsri."
    }
    </script>
    @endpush

    @php
        // Pemetaan data guru berdasarkan peran dalam struktur organisasi resmi
        $hod = $teachers->first(fn($t) => $t->is_head_of_department || stripos($t->position, 'Ketua Kompetensi') !== false || stripos($t->position, 'Kepala Jurusan') !== false) 
            ?: $teachers->first();

        $bendahara = $teachers->first(fn($t) => stripos($t->position, 'Bendahara') !== false);
        $sekretaris = $teachers->first(fn($t) => stripos($t->position, 'Sekretaris') !== false);
        $kepalaLab = $teachers->first(fn($t) => stripos($t->position, 'Laboratorium') !== false || stripos($t->position, 'Lab') !== false);

        $bidangPrestasi = $teachers->first(fn($t) => stripos($t->position, 'Event') !== false || stripos($t->position, 'Prestasi') !== false);
        $bidangIduka = $teachers->first(fn($t) => stripos($t->position, 'IDUKA') !== false || stripos($t->position, 'Industri') !== false);
        $bidangPkl = $teachers->first(fn($t) => stripos($t->position, 'PKL') !== false);
        $toolman = $teachers->first(fn($t) => stripos($t->position, 'Toolman') !== false || stripos($t->position, 'Teknisi') !== false);

        // Klaster Pengelompokan Direktori Lengkap
        $clusterLeadership = collect([$hod, $sekretaris, $bendahara])->filter()->unique('id');
        $clusterLab = collect([$kepalaLab, $toolman])->filter()->unique('id');
        $clusterIndustry = collect([$bidangIduka, $bidangPkl, $bidangPrestasi])->filter()->unique('id');

        $chartedIds = $clusterLeadership->pluck('id')
            ->merge($clusterLab->pluck('id'))
            ->merge($clusterIndustry->pluck('id'));
        $otherTeachers = $teachers->whereNotIn('id', $chartedIds);
    @endphp

    <!-- 1. HERO SECTION (CLEAN & AIRY) -->
    <section class="relative bg-gradient-to-b from-slate-100/90 via-white to-slate-50 overflow-hidden border-b border-slate-200/80 pt-8 pb-10 sm:pt-12 sm:pb-16 lg:pt-20 lg:pb-24">
        <!-- Ambient radial glow -->
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-red-500/5 rounded-full blur-[100px] pointer-events-none -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-1/4 w-[400px] h-[400px] bg-amber-500/5 rounded-full blur-[100px] pointer-events-none translate-y-1/2"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>

        <x-frontend.layout.container class="relative z-10 px-4 sm:px-6 md:px-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-slate-500 mb-4 sm:mb-6 reveal-on-scroll reveal-up">
                <a href="{{ route('home') }}" class="hover:text-red-600 transition-colors">Beranda</a>
                <span>/</span>
                <span class="text-slate-400">Akademik</span>
                <span>/</span>
                <span class="text-red-600 font-bold">Struktur Organisasi & Dewan Guru</span>
            </nav>

            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full bg-white border border-slate-200 shadow-sm mb-4 sm:mb-6 reveal-on-scroll reveal-up">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                    <span class="text-[10px] sm:text-[11px] font-black uppercase tracking-widest text-slate-700">TATA KELOLA & DEWAN INSTRUKTUR</span>
                </div>

                <h1 class="text-2xl sm:text-5xl lg:text-6xl font-heading font-black tracking-tight leading-[1.1] sm:leading-[1.08] uppercase text-slate-900 mb-4 sm:mb-6 reveal-on-scroll reveal-up delay-100">
                    Struktur Organisasi & <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-red-600 via-rose-600 to-amber-600 bg-clip-text text-transparent">Dewan Guru TBSM</span>
                </h1>

                <p class="text-sm sm:text-base lg:text-lg text-slate-600 font-normal leading-relaxed max-w-3xl reveal-on-scroll reveal-up delay-200">
                    Hierarki kepemimpinan kejuruan, tata kelola fasilitas laboratorium bengkel berstandar AHASS, serta tim instruktur bersertifikasi Astra Honda Motor dalam mendidik calon teknisi andal di SMK Negeri 1 Bangsri.
                </p>

                <!-- Action Jumps -->
                <div class="flex flex-wrap items-center gap-2.5 sm:gap-4 mt-6 sm:mt-8 reveal-on-scroll reveal-up delay-300">
                    <a href="#bagan-organisasi" class="inline-flex items-center gap-2 px-4 sm:px-6 py-2.5 sm:py-3 rounded-xl bg-slate-900 text-white font-heading font-bold text-xs uppercase tracking-wider hover:bg-red-600 shadow-md hover:shadow-xl transition-all duration-300 active:scale-95">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span>Lihat Bagan</span>
                    </a>
                    <a href="#direktori-guru" class="inline-flex items-center gap-2 px-4 sm:px-6 py-2.5 sm:py-3 rounded-xl bg-white text-slate-800 border border-slate-300 font-heading font-bold text-xs uppercase tracking-wider hover:border-slate-400 hover:bg-slate-50 shadow-sm transition-all duration-300 active:scale-95">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Direktori Profil</span>
                    </a>
                </div>
            </div>

            <!-- Highlights Bar -->
            <div class="mt-8 sm:mt-14 pt-6 sm:pt-8 border-t border-slate-200/80 grid grid-cols-2 md:grid-cols-4 gap-2.5 sm:gap-6 reveal-on-scroll reveal-up delay-300">
                <div class="flex items-center gap-3 sm:gap-3.5">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center text-red-600 font-black text-lg sm:text-xl font-heading shrink-0">
                        {{ count($teachers) }}
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Pendidik & Instruktur</div>
                        <div class="text-[11px] sm:text-xs text-slate-500">Keluarga Besar TBSM</div>
                    </div>
                </div>

                <div class="flex items-center gap-3 sm:gap-3.5">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 font-black text-lg sm:text-xl font-heading shrink-0">
                        AHM
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Kurikulum Industri</div>
                        <div class="text-[11px] sm:text-xs text-slate-500">PT Astra Honda Motor</div>
                    </div>
                </div>

                <div class="flex items-center gap-3 sm:gap-3.5">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 font-black text-lg sm:text-xl font-heading shrink-0">
                        BNSP
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Asesor Kompetensi</div>
                        <div class="text-[11px] sm:text-xs text-slate-500">LSP Pihak Pertama</div>
                    </div>
                </div>

                <div class="flex items-center gap-3 sm:gap-3.5">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 font-black text-lg sm:text-xl font-heading shrink-0">
                        5R
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Budaya Kerja Jepang</div>
                        <div class="text-[11px] sm:text-xs text-slate-500">Disiplin & Keselamatan</div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- 2. BAGAN STRUKTUR ORGANISASI VISUAL (ENGINEERED TREE & CLUSTER SYSTEM) -->
    <section id="bagan-organisasi" class="py-14 sm:py-20 lg:py-28 bg-slate-100/60 relative overflow-hidden border-b border-slate-200" x-data="{ activeTab: (window.innerWidth < 768 ? 'cards' : 'tree') }">
        <style>
            /* Flawless Tree Engine Connectors */
            .org-tree-row {
                display: flex;
                justify-content: center;
                position: relative;
                width: 100%;
            }
            .org-tree-col {
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                padding-top: 36px;
            }
            .org-tree-col::before {
                content: '';
                position: absolute;
                top: 0;
                height: 2px;
                background-color: #cbd5e1;
                transition: background-color 0.3s ease;
            }
            .org-tree-col:first-child::before {
                left: 50%;
                right: 0;
            }
            .org-tree-col:last-child::before {
                left: 0;
                right: 50%;
            }
            .org-tree-col:not(:first-child):not(:last-child)::before {
                left: 0;
                right: 0;
            }
            .org-tree-col::after {
                content: '';
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 2px;
                height: 36px;
                background-color: #cbd5e1;
                transition: background-color 0.3s ease;
            }
            .org-tree-col .tree-node-dot {
                position: absolute;
                top: -6px;
                left: 50%;
                transform: translateX(-50%);
                width: 14px;
                height: 14px;
                border-radius: 9999px;
                background-color: white;
                border: 3px solid #94a3b8;
                box-shadow: 0 1px 4px rgba(0,0,0,0.1);
                z-index: 10;
                transition: all 0.3s ease;
            }
            .org-tree-col:hover .tree-node-dot {
                transform: translateX(-50%) scale(1.25);
                border-color: #dc2626;
                box-shadow: 0 0 12px rgba(220,38,38,0.4);
            }
            .org-tree-col:hover::after,
            .org-tree-col:hover::before {
                background-color: #94a3b8;
            }
        </style>

        <x-frontend.layout.container>
            <!-- Section Header & Controls -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-8 sm:mb-10 gap-6 reveal-on-scroll reveal-up">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-[2px] bg-red-600"></span>
                        <span class="font-bold text-xs uppercase tracking-[2px] text-red-600">Alur Koordinasi & Tata Kelola</span>
                    </div>
                    <h2 class="font-heading font-black text-2xl sm:text-4xl lg:text-5xl text-slate-900 uppercase tracking-tight">
                        Bagan Struktur Organisasi
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-base mt-2 leading-relaxed">
                        Diagram hierarki kepemimpinan kejuruan, manajerial fasilitas bengkel berstandar AHASS, serta koordinator operasional TBSM SMK Negeri 1 Bangsri.
                    </p>
                </div>

                <!-- View Mode Segmented Control (Fully responsive on mobile) -->
                <div class="flex items-center w-full sm:w-auto bg-white p-1 rounded-2xl border border-slate-200/90 shadow-sm shrink-0 self-start lg:self-end">
                    <button 
                        @click="activeTab = 'tree'" 
                        :class="activeTab === 'tree' ? 'bg-slate-900 text-white shadow-md' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50'"
                        class="flex-1 sm:flex-initial px-3.5 sm:px-4 py-2.5 sm:py-2 rounded-xl text-[11px] sm:text-xs font-heading font-black uppercase tracking-wider transition-all duration-200 flex items-center justify-center gap-1.5 sm:gap-2">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span>Bagan Pohon</span>
                    </button>
                    <button 
                        @click="activeTab = 'cards'" 
                        :class="activeTab === 'cards' ? 'bg-slate-900 text-white shadow-md' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50'"
                        class="flex-1 sm:flex-initial px-3.5 sm:px-4 py-2.5 sm:py-2 rounded-xl text-[11px] sm:text-xs font-heading font-black uppercase tracking-wider transition-all duration-200 flex items-center justify-center gap-1.5 sm:gap-2">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        <span>Klaster Peran</span>
                    </button>
                </div>
            </div>

            <!-- CANVAS CONTAINER (Double-Bezel Architecture) -->
            <div class="bg-slate-100/80 rounded-3xl p-2 sm:p-3.5 border border-slate-200 shadow-xl shadow-slate-200/50 relative overflow-hidden">
                <div class="bg-white rounded-[calc(1.5rem-2px)] p-4 sm:p-8 lg:p-12 relative overflow-hidden border border-slate-100">
                    <!-- Background Subtle Blueprint Grid -->
                    <div class="absolute inset-0 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:24px_24px] opacity-40 pointer-events-none"></div>

                    <!-- Role Legend Bar -->
                    <div class="relative z-10 flex flex-wrap items-center justify-center sm:justify-between gap-3 pb-8 mb-8 border-b border-slate-100 text-xs">
                        <div class="flex items-center gap-2 text-slate-500 font-semibold">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Klik kartu untuk melihat profil lengkap di direktori</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-red-50 border border-red-200 text-[10px] font-bold text-red-700">
                                <span class="w-2 h-2 rounded-full bg-red-600"></span> Pimpinan
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-100 border border-slate-200 text-[10px] font-bold text-slate-700">
                                <span class="w-2 h-2 rounded-full bg-slate-800"></span> Pengelola
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-[10px] font-bold text-amber-800">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span> Kepala Lab & Bengkel
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-[10px] font-bold text-emerald-800">
                                <span class="w-2 h-2 rounded-full bg-emerald-600"></span> Koordinator Bidang
                            </span>
                        </div>
                    </div>

                    <!-- TAB 1: POHON HIERARKI VISUAL -->
                    <div x-show="activeTab === 'tree'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <!-- Mobile Scroll Hint -->
                        <div class="xl:hidden flex items-center justify-center gap-2 mb-6 text-xs text-slate-600 bg-slate-50 border border-slate-200 shadow-xs px-4 py-2 rounded-full w-fit mx-auto">
                            <svg class="w-4 h-4 text-red-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                            <span>Geser layar ke samping untuk melihat seluruh bagan hierarki</span>
                        </div>

                        <!-- Horizontal Scroll Wrapper -->
                        <div class="overflow-x-auto pb-8 pt-2 -mx-2 px-2 scrollbar-thin">
                            <div class="min-w-[1020px] max-w-[1100px] mx-auto flex flex-col items-center relative z-10">

                                <!-- TINGKAT 1: KETUA KOMPETENSI KEAHLIAN -->
                                <div class="flex flex-col items-center relative z-20">
                                    <a href="#guru-{{ $hod?->id ?? 1 }}" class="group block focus:outline-none" title="Lihat Profil {{ $hod->name }}">
                                        <div class="w-80 sm:w-[340px] rounded-2xl p-[1.5px] bg-gradient-to-b from-red-600 via-rose-500 to-amber-500 shadow-xl shadow-red-600/10 hover:shadow-2xl hover:shadow-red-600/20 hover:-translate-y-1.5 transition-all duration-500">
                                            <div class="bg-white rounded-[calc(1rem-1.5px)] p-5 text-center relative overflow-hidden">
                                                <!-- Top Crown Badge -->
                                                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-gradient-to-r from-red-600 via-red-700 to-rose-700 text-white text-[9px] font-black uppercase tracking-[2px] shadow-sm mb-3.5">
                                                    <svg class="w-3 h-3 text-amber-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                    <span>PIMPINAN KEJURUAN</span>
                                                </div>

                                                <!-- Photo Ring -->
                                                <div class="w-24 h-24 sm:w-26 sm:h-26 rounded-full overflow-hidden mx-auto mb-3 border-4 border-white shadow-lg ring-3 ring-amber-400 bg-slate-100 relative group-hover:ring-red-600 transition-all duration-300">
                                                    @if($hod && $hod->hasValidPhoto() && $hod->photo_url)
                                                        <img src="{{ $hod->photo_url }}" alt="{{ $hod->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-500" loading="eager">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-slate-900 text-amber-400 font-heading font-black text-2xl">
                                                            {{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $hod->name)), 0, 2)) }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <h3 class="font-heading font-black text-base sm:text-lg text-slate-900 leading-tight group-hover:text-red-600 transition-colors uppercase mb-1.5">
                                                    {{ $hod->name }}
                                                </h3>

                                                <div class="inline-block px-3 py-1 rounded-lg bg-red-50 border border-red-200 text-red-700 font-bold text-xs uppercase tracking-wider mb-2">
                                                    {{ $hod->position ?? 'Ketua Kompetensi Keahlian' }}
                                                </div>

                                                @if($hod->nip)
                                                    <div class="text-[10px] font-mono text-slate-400">NIP: {{ $hod->nip }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>

                                    <!-- Vertical Stem Down to Level 2 -->
                                    <div class="w-0.5 h-12 bg-slate-300 relative flex justify-center">
                                        <div class="w-3.5 h-3.5 rounded-full bg-red-600 ring-4 ring-white shadow-md absolute -bottom-1.5"></div>
                                    </div>
                                </div>

                                <!-- TINGKAT 2: 3 PENGELOLA (BENDAHARA, SEKRETARIS, KEPALA LAB) -->
                                <div class="org-tree-row max-w-[940px] mx-auto z-10">
                                    <!-- 1. Bendahara -->
                                    <div class="org-tree-col w-1/3 px-3">
                                        <div class="tree-node-dot"></div>
                                        <a href="#guru-{{ $bendahara?->id ?? 2 }}" class="group block w-full max-w-[270px] focus:outline-none" title="Lihat Profil {{ $bendahara->name }}">
                                            <div class="rounded-2xl p-[1px] bg-gradient-to-b from-slate-200 via-slate-100 to-slate-200 hover:from-slate-400 hover:to-slate-300 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                                <div class="bg-white rounded-[calc(1rem-1px)] p-4 text-center">
                                                    <div class="inline-block px-2.5 py-0.5 rounded-full bg-slate-900 text-slate-200 text-[9px] font-black uppercase tracking-wider mb-2.5">
                                                        PENGELOLA JURUSAN
                                                    </div>
                                                    <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-full overflow-hidden mx-auto mb-2.5 border-3 border-white shadow ring-2 ring-slate-200 bg-slate-100">
                                                        @if($bendahara && $bendahara->hasValidPhoto() && $bendahara->photo_url)
                                                            <img src="{{ $bendahara->photo_url }}" alt="{{ $bendahara->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                        @else
                                                            <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-lg">AL</div>
                                                        @endif
                                                    </div>
                                                    <h4 class="font-heading font-black text-sm text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">
                                                        {{ $bendahara->name ?? 'Akhmad Lutfianto, S.Pd.' }}
                                                    </h4>
                                                    <div class="inline-block px-2.5 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-700 font-bold text-[11px] uppercase tracking-wider mb-1">
                                                        Bendahara
                                                    </div>
                                                    @if($bendahara?->nip)
                                                        <div class="text-[9px] font-mono text-slate-400">NIP: {{ $bendahara->nip }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 2. Sekretaris -->
                                    <div class="org-tree-col w-1/3 px-3">
                                        <div class="tree-node-dot !border-red-600 !bg-red-50"></div>
                                        <a href="#guru-{{ $sekretaris?->id ?? 3 }}" class="group block w-full max-w-[270px] focus:outline-none" title="Lihat Profil {{ $sekretaris->name }}">
                                            <div class="rounded-2xl p-[1px] bg-gradient-to-b from-slate-200 via-slate-100 to-slate-200 hover:from-red-300 hover:to-slate-300 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                                <div class="bg-white rounded-[calc(1rem-1px)] p-4 text-center">
                                                    <div class="inline-block px-2.5 py-0.5 rounded-full bg-slate-900 text-slate-200 text-[9px] font-black uppercase tracking-wider mb-2.5">
                                                        PENGELOLA JURUSAN
                                                    </div>
                                                    <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-full overflow-hidden mx-auto mb-2.5 border-3 border-white shadow ring-2 ring-slate-200 bg-slate-100">
                                                        @if($sekretaris && $sekretaris->hasValidPhoto() && $sekretaris->photo_url)
                                                            <img src="{{ $sekretaris->photo_url }}" alt="{{ $sekretaris->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                        @else
                                                            <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-lg">AW</div>
                                                        @endif
                                                    </div>
                                                    <h4 class="font-heading font-black text-sm text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">
                                                        {{ $sekretaris->name ?? 'Ahmad Wildan, S.Pd.' }}
                                                    </h4>
                                                    <div class="inline-block px-2.5 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-700 font-bold text-[11px] uppercase tracking-wider mb-1">
                                                        Sekretaris
                                                    </div>
                                                    @if($sekretaris?->nip)
                                                        <div class="text-[9px] font-mono text-slate-400">NIP: {{ $sekretaris->nip }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 3. Kepala Laboratorium -->
                                    <div class="org-tree-col w-1/3 px-3">
                                        <div class="tree-node-dot !border-amber-500"></div>
                                        <a href="#guru-{{ $kepalaLab?->id ?? 4 }}" class="group block w-full max-w-[270px] focus:outline-none" title="Lihat Profil {{ $kepalaLab->name }}">
                                            <div class="rounded-2xl p-[1px] bg-gradient-to-b from-amber-300 via-amber-100 to-amber-200 hover:from-amber-500 hover:to-orange-400 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                                <div class="bg-white rounded-[calc(1rem-1px)] p-4 text-center">
                                                    <div class="inline-block px-2.5 py-0.5 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 text-white text-[9px] font-black uppercase tracking-wider mb-2.5 shadow-xs">
                                                        KEPALA BENGKEL & LAB
                                                    </div>
                                                    <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-full overflow-hidden mx-auto mb-2.5 border-3 border-white shadow ring-2 ring-amber-400 bg-slate-100">
                                                        @if($kepalaLab && $kepalaLab->hasValidPhoto() && $kepalaLab->photo_url)
                                                            <img src="{{ $kepalaLab->photo_url }}" alt="{{ $kepalaLab->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                        @else
                                                            <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-lg">GZ</div>
                                                        @endif
                                                    </div>
                                                    <h4 class="font-heading font-black text-sm text-slate-900 uppercase leading-snug group-hover:text-amber-600 transition-colors mb-1">
                                                        {{ $kepalaLab->name ?? 'Galih Zainawan, S.Pd.' }}
                                                    </h4>
                                                    <div class="inline-block px-2.5 py-0.5 rounded-md bg-amber-50 border border-amber-200 text-amber-800 font-bold text-[11px] uppercase tracking-wider mb-1">
                                                        Kepala Laboratorium
                                                    </div>
                                                    @if($kepalaLab?->nip)
                                                        <div class="text-[9px] font-mono text-slate-400">NIP: {{ $kepalaLab->nip }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Vertical Coordination Spine from Management to Level 3 -->
                                <div class="flex justify-center items-center py-2 relative z-10">
                                    <div class="w-0.5 h-14 bg-slate-300 relative flex justify-center">
                                        <!-- Label pill on line -->
                                        <div class="absolute top-1/2 -translate-y-1/2 px-3 py-1 rounded-full bg-white border border-slate-300 shadow-xs text-[10px] font-black uppercase tracking-wider text-slate-600 whitespace-nowrap z-20 flex items-center gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
                                            <span>Koordinasi Bidang Kerja & Sarana Bengkel</span>
                                        </div>
                                        <!-- Junction dot -->
                                        <div class="w-3.5 h-3.5 rounded-full bg-slate-700 ring-4 ring-white shadow-md absolute -bottom-1.5"></div>
                                    </div>
                                </div>

                                <!-- TINGKAT 3: 4 DIVISI PELAKSANA & TOOLMAN -->
                                <div class="org-tree-row max-w-[1060px] mx-auto z-10">
                                    <!-- 1. Event & Prestasi -->
                                    <div class="org-tree-col w-1/4 px-2 sm:px-2.5">
                                        <div class="tree-node-dot !border-amber-500"></div>
                                        <a href="#guru-{{ $bidangPrestasi?->id ?? 5 }}" class="group block w-full focus:outline-none" title="Lihat Profil {{ $bidangPrestasi->name }}">
                                            <div class="bg-white rounded-2xl border-t-4 border-amber-500 border-x border-b border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-3.5 text-center">
                                                <div class="w-16 h-16 rounded-full overflow-hidden mx-auto mb-2 border-2 border-white shadow ring-2 ring-slate-200 bg-slate-100">
                                                    @if($bidangPrestasi && $bidangPrestasi->hasValidPhoto() && $bidangPrestasi->photo_url)
                                                        <img src="{{ $bidangPrestasi->photo_url }}" alt="{{ $bidangPrestasi->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-sm">AJ</div>
                                                    @endif
                                                </div>
                                                <h5 class="font-heading font-bold text-xs sm:text-sm text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">
                                                    {{ $bidangPrestasi->name ?? 'Ahmad Arif Johan, S.Pd.' }}
                                                </h5>
                                                <div class="inline-block px-2 py-0.5 rounded-md bg-amber-50 border border-amber-200 text-amber-800 font-bold text-[10px] uppercase tracking-wide">
                                                    Bidang Event & Prestasi
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 2. Bidang IDUKA -->
                                    <div class="org-tree-col w-1/4 px-2 sm:px-2.5">
                                        <div class="tree-node-dot !border-emerald-600"></div>
                                        <a href="#guru-{{ $bidangIduka?->id ?? 6 }}" class="group block w-full focus:outline-none" title="Lihat Profil {{ $bidangIduka->name }}">
                                            <div class="bg-white rounded-2xl border-t-4 border-emerald-500 border-x border-b border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-3.5 text-center">
                                                <div class="w-16 h-16 rounded-full overflow-hidden mx-auto mb-2 border-2 border-white shadow ring-2 ring-slate-200 bg-slate-100">
                                                    @if($bidangIduka && $bidangIduka->hasValidPhoto() && $bidangIduka->photo_url)
                                                        <img src="{{ $bidangIduka->photo_url }}" alt="{{ $bidangIduka->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-sm">HK</div>
                                                    @endif
                                                </div>
                                                <h5 class="font-heading font-bold text-xs sm:text-sm text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">
                                                    {{ $bidangIduka->name ?? 'Hisyam Kholil, S.Pd.' }}
                                                </h5>
                                                <div class="inline-block px-2 py-0.5 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800 font-bold text-[10px] uppercase tracking-wide">
                                                    Bidang IDUKA
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 3. Bidang PKL -->
                                    <div class="org-tree-col w-1/4 px-2 sm:px-2.5">
                                        <div class="tree-node-dot !border-blue-600"></div>
                                        <a href="#guru-{{ $bidangPkl?->id ?? 7 }}" class="group block w-full focus:outline-none" title="Lihat Profil {{ $bidangPkl->name }}">
                                            <div class="bg-white rounded-2xl border-t-4 border-blue-500 border-x border-b border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-3.5 text-center">
                                                <div class="w-16 h-16 rounded-full overflow-hidden mx-auto mb-2 border-2 border-white shadow ring-2 ring-slate-200 bg-slate-100">
                                                    @if($bidangPkl && $bidangPkl->hasValidPhoto() && $bidangPkl->photo_url)
                                                        <img src="{{ $bidangPkl->photo_url }}" alt="{{ $bidangPkl->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-sm">MS</div>
                                                    @endif
                                                </div>
                                                <h5 class="font-heading font-bold text-xs sm:text-sm text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">
                                                    {{ $bidangPkl->name ?? 'Muslikan, S.Pd.' }}
                                                </h5>
                                                <div class="inline-block px-2 py-0.5 rounded-md bg-blue-50 border border-blue-200 text-blue-800 font-bold text-[10px] uppercase tracking-wide">
                                                    Bidang PKL
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 4. Toolman (Teknisi Bengkel / Lab) -->
                                    <div class="org-tree-col w-1/4 px-2 sm:px-2.5">
                                        <div class="tree-node-dot !border-slate-700"></div>
                                        <a href="#guru-{{ $toolman?->id ?? 8 }}" class="group block w-full focus:outline-none" title="Lihat Profil {{ $toolman->name }}">
                                            <div class="bg-white rounded-2xl border-t-4 border-slate-800 border-x border-b border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-3.5 text-center relative">
                                                <div class="w-16 h-16 rounded-full overflow-hidden mx-auto mb-2 border-2 border-white shadow ring-2 ring-slate-200 bg-slate-100">
                                                    @if($toolman && $toolman->hasValidPhoto() && $toolman->photo_url)
                                                        <img src="{{ $toolman->photo_url }}" alt="{{ $toolman->name }}" class="w-full h-full object-cover object-top aspect-square group-hover:scale-108 transition-transform duration-300" loading="lazy">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-300 font-bold text-sm">KT</div>
                                                    @endif
                                                </div>
                                                <h5 class="font-heading font-bold text-xs sm:text-sm text-slate-900 uppercase leading-snug group-hover:text-red-600 transition-colors mb-1">
                                                    {{ $toolman->name ?? 'Khasan Taufik' }}
                                                </h5>
                                                <div class="inline-block px-2 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-800 font-bold text-[10px] uppercase tracking-wide">
                                                    Toolman / Teknisi Lab
                                                </div>
                                                <!-- Direct oversight indicator badge -->
                                                <div class="mt-1.5 text-[9px] font-semibold text-amber-700 bg-amber-50 rounded px-1.5 py-0.5 border border-amber-200/60 inline-flex items-center gap-1">
                                                    <svg class="w-2.5 h-2.5 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106-2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>
                                                    <span>Supervisi Kepala Lab</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: MATRIKS KLASTER PERAN & TUGAS (CARD CLUSTER VIEW) -->
                    <div x-show="activeTab === 'cards'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" style="display: none;">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative z-10">
                            <!-- Klaster 1: Pimpinan & Tata Kelola -->
                            <div class="bg-gradient-to-b from-red-50/50 to-white rounded-2xl border border-red-200/80 p-6 shadow-sm flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                        <h4 class="font-heading font-black text-sm uppercase tracking-wider text-red-900">Pimpinan & Tata Kelola</h4>
                                    </div>
                                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">Perumusan arah kebijakan kejuruan, kepemimpinan akademik, administrasi persuratan, serta tata kelola keuangan program.</p>
                                    
                                    <div class="space-y-4">
                                        @foreach($clusterLeadership as $leader)
                                            <a href="#guru-{{ $leader->id }}" class="flex items-center gap-3.5 p-2.5 rounded-xl hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all duration-200 group">
                                                <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 border-2 border-white shadow-sm ring-1 ring-slate-200">
                                                    <img src="{{ $leader->photo_url }}" alt="{{ $leader->name }}" class="w-full h-full object-cover object-top aspect-square" loading="lazy">
                                                </div>
                                                <div class="min-w-0 flex-grow">
                                                    <div class="font-heading font-bold text-xs sm:text-sm text-slate-900 group-hover:text-red-600 transition-colors truncate uppercase">{{ $leader->name }}</div>
                                                    <div class="text-[11px] font-semibold text-red-600 truncate">{{ $leader->position }}</div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Klaster 2: Bengkel & Laboratorium -->
                            <div class="bg-gradient-to-b from-amber-50/50 to-white rounded-2xl border border-amber-200/80 p-6 shadow-sm flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-600"></span>
                                        <h4 class="font-heading font-black text-sm uppercase tracking-wider text-amber-900">Laboratorium & Bengkel AHASS</h4>
                                    </div>
                                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">Standardisasi keselamatan bengkel (5R/K3), perawatan berkala bike-lift dan SST presisi, kalibrasi scanner injeksi HIDS, serta ketersediaan suku cadang resmi.</p>
                                    
                                    <div class="space-y-4">
                                        @foreach($clusterLab as $labStaff)
                                            <a href="#guru-{{ $labStaff->id }}" class="flex items-center gap-3.5 p-2.5 rounded-xl hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all duration-200 group">
                                                <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 border-2 border-white shadow-sm ring-1 ring-amber-200">
                                                    <img src="{{ $labStaff->photo_url }}" alt="{{ $labStaff->name }}" class="w-full h-full object-cover object-top aspect-square" loading="lazy">
                                                </div>
                                                <div class="min-w-0 flex-grow">
                                                    <div class="font-heading font-bold text-xs sm:text-sm text-slate-900 group-hover:text-amber-600 transition-colors truncate uppercase">{{ $labStaff->name }}</div>
                                                    <div class="text-[11px] font-semibold text-amber-700 truncate">{{ $labStaff->position }}</div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Klaster 3: Kemitraan Industri, PKL & Prestasi -->
                            <div class="bg-gradient-to-b from-slate-100/60 to-white rounded-2xl border border-slate-300/80 p-6 shadow-sm flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-800"></span>
                                        <h4 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900">Kemitraan DUDI & Prestasi</h4>
                                    </div>
                                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">Sinkronisasi kurikulum industri Astra Honda Motor, pengorganisasian magang siswa di jaringan AHASS, dan pembinaan kontingen LKS tingkat regional & nasional.</p>
                                    
                                    <div class="space-y-4">
                                        @foreach($clusterIndustry as $indStaff)
                                            <a href="#guru-{{ $indStaff->id }}" class="flex items-center gap-3.5 p-2.5 rounded-xl hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all duration-200 group">
                                                <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 border-2 border-white shadow-sm ring-1 ring-slate-200">
                                                    <img src="{{ $indStaff->photo_url }}" alt="{{ $indStaff->name }}" class="w-full h-full object-cover object-top aspect-square" loading="lazy">
                                                </div>
                                                <div class="min-w-0 flex-grow">
                                                    <div class="font-heading font-bold text-xs sm:text-sm text-slate-900 group-hover:text-red-600 transition-colors truncate uppercase">{{ $indStaff->name }}</div>
                                                    <div class="text-[11px] font-semibold text-slate-700 truncate">{{ $indStaff->position }}</div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HIGH-END OFFICIAL VALIDATION FOOTER (Replaces the awkward old maroon block) -->
                    <div class="mt-12 rounded-2xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white p-6 sm:p-8 border border-slate-800 shadow-xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6 z-10">
                        <div class="w-64 h-64 bg-red-600/10 rounded-full blur-3xl absolute -right-20 -bottom-20 pointer-events-none"></div>
                        <div class="w-48 h-48 bg-amber-500/10 rounded-full blur-2xl absolute -left-10 -top-10 pointer-events-none"></div>
                        
                        <div class="flex items-center gap-4 relative z-10">
                            <div class="w-12 h-12 rounded-2xl bg-red-600/20 border border-red-500/30 flex items-center justify-center shrink-0 text-red-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <div>
                                <div class="font-heading font-black text-sm sm:text-base uppercase tracking-wider text-white">
                                    Struktur Resmi Tata Kelola Kejuruan TBSM
                                </div>
                                <div class="text-xs text-slate-400 mt-0.5">
                                    SMK Negeri 1 Bangsri • Terakreditasi & Binaan Resmi PT Astra Honda Motor (AHM)
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 relative z-10 shrink-0">
                            <a href="#direktori-guru" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-600 text-white font-heading font-bold text-xs uppercase tracking-wider hover:bg-red-700 shadow-md hover:shadow-lg transition-all duration-300">
                                <span>Direktori Lengkap Guru</span>
                                <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- 3. DIREKTORI PROFIL LENGKAP DEWAN GURU (GROUPED DIRECTORY GRID) -->
    <section id="direktori-guru" class="py-12 sm:py-20 lg:py-32 bg-white">
        <x-frontend.layout.container class="px-4 sm:px-6 md:px-8">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 reveal-on-scroll reveal-up">
                <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-2 sm:mb-4">
                    <div class="w-6 sm:w-8 h-[2px] bg-red-600"></div>
                    <span class="font-sans font-bold text-[11px] sm:text-xs uppercase tracking-[2px] text-slate-500">Profil & Kompetensi Pendidik</span>
                    <div class="w-6 sm:w-8 h-[2px] bg-red-600"></div>
                </div>
                <h2 class="font-heading font-black text-2xl sm:text-4xl lg:text-5xl text-slate-900 tracking-tight leading-tight uppercase mb-3 sm:mb-5">
                    Direktori Tenaga Pendidik & Keahlian
                </h2>
                <p class="text-slate-600 text-xs sm:text-base leading-relaxed">
                    Setiap tenaga pendidik dan instruktur memiliki spesialisasi keahlian otomotif bersertifikat untuk membimbing siswa dari teori dasar hingga servis motor terkini.
                </p>
            </div>

            <!-- KLASTER 1: PIMPINAN & TATA KELOLA KEJURUAN -->
            <div class="mb-10 sm:mb-16">
                <div class="flex items-center gap-3 sm:gap-4 mb-5 sm:mb-8 pb-3 sm:pb-4 border-b border-slate-200">
                    <div class="w-2.5 sm:w-3 h-6 sm:h-8 bg-red-600 rounded-sm"></div>
                    <div>
                        <h3 class="font-heading font-black text-lg sm:text-2xl text-slate-900 uppercase tracking-tight">Pimpinan & Tata Kelola Kejuruan</h3>
                        <p class="text-[11px] sm:text-xs font-semibold text-slate-500 uppercase tracking-wider">Perumusan Kurikulum, Administrasi, & Pengelolaan Keuangan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-8">
                    @foreach($clusterLeadership as $leader)
                        <div id="guru-{{ $leader->id }}" class="scroll-mt-28 bg-slate-50/70 rounded-2xl border border-slate-200 hover:border-red-300 hover:bg-white shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-row sm:flex-col group">
                            <!-- Photo Container -->
                            <div class="w-28 sm:w-full h-auto sm:h-72 min-h-[140px] bg-slate-200 overflow-hidden relative shrink-0">
                                @if($leader->hasValidPhoto() && $leader->photo_url)
                                    <img src="{{ $leader->photo_url }}" alt="{{ $leader->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-950 text-white font-heading font-black text-3xl sm:text-5xl">
                                        {{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $leader->name)), 0, 2)) }}
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                                <div class="absolute bottom-2 left-2 right-2 sm:bottom-4 sm:left-4 sm:right-4">
                                    <span class="inline-block px-2 py-0.5 sm:px-3 sm:py-1 rounded-md bg-red-600 text-white text-[9px] sm:text-[10px] font-black uppercase tracking-wider sm:tracking-widest shadow-sm truncate max-w-full">
                                        {{ $leader->position ?? 'Pengelola Kejuruan' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Detail Content -->
                            <div class="p-3.5 sm:p-6 flex flex-col flex-grow justify-between min-w-0">
                                <div>
                                    <h4 class="font-heading font-black text-sm sm:text-xl text-slate-900 group-hover:text-red-600 transition-colors leading-snug mb-1 line-clamp-2 sm:line-clamp-none">
                                        {{ $leader->name }}
                                    </h4>
                                    @if($leader->nip)
                                        <p class="text-[10px] sm:text-xs font-mono text-slate-500 mb-2 sm:mb-4 pb-1.5 sm:pb-3 border-b border-slate-200">NIP: {{ $leader->nip }}</p>
                                    @endif

                                    @if($leader->specialization)
                                        <div class="mb-2 sm:mb-4">
                                            <span class="hidden sm:block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Bidang Spesialisasi:</span>
                                            <div class="inline-flex items-center gap-1.5 text-[11px] sm:text-xs font-bold text-slate-800 bg-white px-2 py-1 sm:px-3 sm:py-1.5 rounded-lg border border-slate-200 shadow-2xs truncate max-w-full">
                                                <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106-2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>
                                                <span class="truncate">{{ $leader->specialization }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    <p class="text-[11px] sm:text-sm text-slate-600 leading-relaxed italic line-clamp-2 sm:line-clamp-none">
                                        "{{ $leader->bio ?? 'Mendedikasikan diri untuk memajukan pendidikan vokasi otomotif berstandar industri.' }}"
                                    </p>
                                </div>

                                @if($leader->phone)
                                    <div class="mt-2.5 sm:mt-6 pt-2 sm:pt-4 border-t border-slate-200 flex justify-end">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $leader->phone) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 sm:gap-1.5 text-[11px] sm:text-xs font-bold text-emerald-600 hover:text-emerald-700 transition-colors active:scale-95">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.202.043.073.043.419-.101.824z"/></svg>
                                            <span>Kontak WA</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- KLASTER 2: LABORATORIUM, BENGKEL & SARANA PRAKTIK -->
            <div class="mb-10 sm:mb-16">
                <div class="flex items-center gap-3 sm:gap-4 mb-5 sm:mb-8 pb-3 sm:pb-4 border-b border-slate-200">
                    <div class="w-2.5 sm:w-3 h-6 sm:h-8 bg-amber-500 rounded-sm"></div>
                    <div>
                        <h3 class="font-heading font-black text-lg sm:text-2xl text-slate-900 uppercase tracking-tight">Laboratorium, Bengkel & Sarana Presisi</h3>
                        <p class="text-[11px] sm:text-xs font-semibold text-slate-500 uppercase tracking-wider">Tata Kelola Standar Bengkel Resmi AHASS, Kalibrasi SST & Bike Lift</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5 sm:gap-8 max-w-4xl">
                    @foreach($clusterLab as $labStaff)
                        <div id="guru-{{ $labStaff->id }}" class="scroll-mt-28 bg-slate-50/70 rounded-2xl border border-slate-200 hover:border-amber-300 hover:bg-white shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-row sm:flex-row group">
                            <!-- Photo -->
                            <div class="w-28 sm:w-2/5 h-auto sm:h-auto min-h-[140px] bg-slate-200 overflow-hidden relative shrink-0">
                                @if($labStaff->hasValidPhoto() && $labStaff->photo_url)
                                    <img src="{{ $labStaff->photo_url }}" alt="{{ $labStaff->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-950 text-white font-heading font-black text-3xl sm:text-4xl">
                                        {{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $labStaff->name)), 0, 2)) }}
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent sm:hidden"></div>
                                <div class="absolute bottom-2 left-2 sm:hidden">
                                    <span class="inline-block px-2 py-0.5 rounded bg-amber-500 text-white text-[9px] font-black uppercase tracking-wider">
                                        {{ $labStaff->position }}
                                    </span>
                                </div>
                            </div>

                            <!-- Detail -->
                            <div class="p-3.5 sm:p-6 flex flex-col justify-between flex-grow min-w-0">
                                <div>
                                    <span class="hidden sm:inline-block px-2.5 py-1 rounded bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider mb-2">
                                        {{ $labStaff->position }}
                                    </span>
                                    <h4 class="font-heading font-black text-sm sm:text-xl text-slate-900 group-hover:text-amber-600 transition-colors leading-snug mb-1 line-clamp-2 sm:line-clamp-none">
                                        {{ $labStaff->name }}
                                    </h4>
                                    @if($labStaff->nip)
                                        <p class="text-[10px] sm:text-xs font-mono text-slate-500 mb-2 sm:mb-3">NIP: {{ $labStaff->nip }}</p>
                                    @endif

                                    @if($labStaff->specialization)
                                        <div class="mb-2 sm:mb-3">
                                            <span class="hidden sm:block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Keahlian:</span>
                                            <p class="text-[11px] sm:text-xs font-bold text-slate-800 truncate">{{ $labStaff->specialization }}</p>
                                        </div>
                                    @endif

                                    <p class="text-[11px] sm:text-xs text-slate-600 leading-relaxed italic line-clamp-2 sm:line-clamp-none">
                                        "{{ $labStaff->bio ?? 'Menjaga kelayakan dan kepresisian peralatan praktik bengkel otomotif.' }}"
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- KLASTER 3: HUBUNGAN INDUSTRI, PKL & PRESTASI -->
            <div class="mb-10 sm:mb-16">
                <div class="flex items-center gap-3 sm:gap-4 mb-5 sm:mb-8 pb-3 sm:pb-4 border-b border-slate-200">
                    <div class="w-2.5 sm:w-3 h-6 sm:h-8 bg-slate-900 rounded-sm"></div>
                    <div>
                        <h3 class="font-heading font-black text-lg sm:text-2xl text-slate-900 uppercase tracking-tight">Kemitraan Industri, PKL & Prestasi Kejuruan</h3>
                        <p class="text-[11px] sm:text-xs font-semibold text-slate-500 uppercase tracking-wider">Kerjasama DUDI, Penempatan Magang di AHASS, & Pembinaan Lomba LKS</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-8">
                    @foreach($clusterIndustry as $industryStaff)
                        <div id="guru-{{ $industryStaff->id }}" class="scroll-mt-28 bg-slate-50/70 rounded-2xl border border-slate-200 hover:border-red-300 hover:bg-white shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-row sm:flex-col group">
                            <!-- Photo Container -->
                            <div class="w-28 sm:w-full h-auto sm:h-72 min-h-[140px] bg-slate-200 overflow-hidden relative shrink-0">
                                @if($industryStaff->hasValidPhoto() && $industryStaff->photo_url)
                                    <img src="{{ $industryStaff->photo_url }}" alt="{{ $industryStaff->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-950 text-white font-heading font-black text-3xl sm:text-5xl">
                                        {{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $industryStaff->name)), 0, 2)) }}
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                <div class="absolute bottom-2 left-2 right-2 sm:bottom-4 sm:left-4 sm:right-4">
                                    <span class="inline-block px-2 py-0.5 sm:px-3 sm:py-1 rounded-md bg-slate-900 text-white text-[9px] sm:text-[10px] font-black uppercase tracking-wider sm:tracking-widest shadow-sm truncate max-w-full">
                                        {{ $industryStaff->position ?? 'Koordinator Bidang' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Detail Content -->
                            <div class="p-3.5 sm:p-6 flex flex-col flex-grow justify-between min-w-0">
                                <div>
                                    <h4 class="font-heading font-black text-sm sm:text-xl text-slate-900 group-hover:text-red-600 transition-colors leading-snug mb-1 line-clamp-2 sm:line-clamp-none">
                                        {{ $industryStaff->name }}
                                    </h4>
                                    @if($industryStaff->nip)
                                        <p class="text-[10px] sm:text-xs font-mono text-slate-500 mb-2 sm:mb-4 pb-1.5 sm:pb-3 border-b border-slate-200">NIP: {{ $industryStaff->nip }}</p>
                                    @endif

                                    @if($industryStaff->specialization)
                                        <div class="mb-2 sm:mb-4">
                                            <span class="hidden sm:block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Bidang Spesialisasi:</span>
                                            <div class="inline-flex items-center gap-1.5 text-[11px] sm:text-xs font-bold text-slate-800 bg-white px-2 py-1 sm:px-3 sm:py-1.5 rounded-lg border border-slate-200 shadow-2xs truncate max-w-full">
                                                <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                                                <span class="truncate">{{ $industryStaff->specialization }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    <p class="text-[11px] sm:text-sm text-slate-600 leading-relaxed italic line-clamp-2 sm:line-clamp-none">
                                        "{{ $industryStaff->bio ?? 'Membimbing dan memfasilitasi siswa terhubung langsung dengan realitas dunia kerja otomotif.' }}"
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- GURU & INSTRUKTUR TAMBAHAN (JIKA ADA DATA TAMBAHAN DI KEMUDIAN HARI) -->
            @if($otherTeachers->count() > 0)
                <div>
                    <div class="flex items-center gap-3 sm:gap-4 mb-5 sm:mb-8 pb-3 sm:pb-4 border-b border-slate-200">
                        <div class="w-2.5 sm:w-3 h-6 sm:h-8 bg-slate-400 rounded-sm"></div>
                        <div>
                            <h3 class="font-heading font-black text-lg sm:text-2xl text-slate-900 uppercase tracking-tight">Tenaga Pengajar Lainnya</h3>
                            <p class="text-[11px] sm:text-xs font-semibold text-slate-500 uppercase tracking-wider">Tim Pengampu Mata Pelajaran Produktif & Muatan Kejuruan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
                        @foreach($otherTeachers as $ot)
                            <div class="bg-white rounded-2xl border border-slate-200 p-3.5 sm:p-5 shadow-sm hover:shadow-md transition-all flex flex-col items-center text-center">
                                <div class="w-16 h-16 sm:w-24 sm:h-24 rounded-full overflow-hidden mb-2 sm:mb-4 bg-slate-100 border-2 border-slate-200">
                                    @if($ot->hasValidPhoto() && $ot->photo_url)
                                        <img src="{{ $ot->photo_url }}" alt="{{ $ot->name }}" class="w-full h-full object-cover object-top aspect-square">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-slate-800 text-white font-bold text-sm sm:text-xl">
                                            {{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $ot->name)), 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                <h4 class="font-heading font-bold text-xs sm:text-base text-slate-900 mb-0.5 sm:mb-1 line-clamp-2">{{ $ot->name }}</h4>
                                <p class="text-[11px] sm:text-xs text-red-600 font-semibold mb-1 sm:mb-2">{{ $ot->position ?? 'Guru Kejuruan' }}</p>
                                @if($ot->nip)
                                    <span class="text-[9px] sm:text-[10px] font-mono text-slate-400">NIP: {{ $ot->nip }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </x-frontend.layout.container>
    </section>

    <!-- 4. STANDAR KUALIFIKASI INSTRUKTUR AHM -->
    <section class="py-20 bg-slate-50 border-t border-slate-200">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5">
                    <span class="text-xs font-black uppercase tracking-widest text-red-600 block mb-3">STANDARISASI PENDIDIK</span>
                    <h2 class="font-heading font-black text-3xl sm:text-4xl text-slate-900 uppercase tracking-tight leading-tight mb-6">
                        Kualifikasi & Sertifikasi Mutu Pengajar
                    </h2>
                    <p class="text-slate-600 text-base leading-relaxed mb-8">
                        Guru kejuruan TBSM SMK Negeri 1 Bangsri wajib mengikuti sertifikasi berjenjang dari PT Astra Honda Motor dan LSP Pihak Pertama guna menjamin kurikulum yang diajarkan selalu relevan dengan dinamika teknologi terkini.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-sm">✓</div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Astra Motor Training Center (AMTC)</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Sertifikasi berjenjang teknisi resmi Honda untuk guru produktif.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-sm">✓</div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Asesor Lisensi BNSP / LSP-P1</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Memiliki sertifikat penguji Uji Kompetensi Keahlian (UKK) resmi SKKNI.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-sm">✓</div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Instruktur Safety Riding Bersertifikat</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Pelatih bersertifikasi dalam kompetisi keselamatan berkendara Honda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 bg-slate-900 p-8 sm:p-10 rounded-3xl text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-red-600/20 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <span class="inline-block px-3 py-1 rounded bg-white/10 text-amber-400 text-[10px] font-black uppercase tracking-widest mb-4">
                            KOLABORASI INDUSTRI
                        </span>
                        <h3 class="font-heading font-black text-2xl sm:text-3xl uppercase tracking-tight mb-4">
                            Ingin Berkonsultasi Mengenai Program Kejuruan Kami?
                        </h3>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed mb-8">
                            Kami membuka pintu dialog seluas-luasnya bagi orang tua, mitra industri, dan calon peserta didik yang ingin mengetahui lebih dalam seputar kurikulum, magang AHASS, dan fasilitas laboratorium.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('academic.programs') }}" class="px-6 py-3 bg-red-600 text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-red-700 transition-colors shadow-lg shadow-red-900/40">
                                Lihat Program Keahlian
                            </a>
                            <a href="{{ route('academic.facilities') }}" class="px-6 py-3 bg-white/10 border border-white/20 text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-white/20 transition-colors">
                                Jelajahi Fasilitas Bengkel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

</x-layouts.app>






