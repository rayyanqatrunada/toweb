<x-layouts.app title="Program & Kurikulum Akademik" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Program & Kurikulum Akademik {{ $settings->get('site_short_name', 'TBSM') }}",
      "description": "Struktur kurikulum, 4 pilar kompetensi kejuruan, dan sertifikasi industri {{ $settings->get('site_name', 'Teknik dan Bisnis Sepeda Motor') }} SMK Negeri 1 Bangsri binaan PT Astra Honda Motor."
    }
    </script>
    @endpush

    <!-- Main Layout Wrapper -->
    <main class="flex flex-col items-center w-full overflow-hidden relative bg-[#FAFAFA]">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: AKADEMIK & KURIKULUM (Cinematic & Confident) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-16 sm:py-20 lg:py-24 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Subtle Film Overlay -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                @if($settings->get('header_academic_programs_image'))
                    <img src="{{ Storage::url($settings->get('header_academic_programs_image')) }}" alt="Academic Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @else
                    <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=1600&auto=format&fit=crop" alt="Academic Background" class="w-full h-full object-cover mix-blend-overlay opacity-25 grayscale" loading="eager">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-charcoal-950/85 via-charcoal-900/90 to-charcoal-950"></div>
            </div>

            <!-- Technical Radial Grid -->
            <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.06]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
            
            <!-- Red Ambient Glow -->
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-figma-red/15 rounded-full blur-[140px] pointer-events-none -translate-y-1/2"></div>

            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16 relative z-20 text-center flex flex-col items-center">
                <!-- Eyebrow Tag -->
                <div class="flex items-center justify-center gap-3 mb-4 reveal-on-scroll reveal-up">
                    <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-red uppercase">
                        {{ $settings->get('academic_hero_badge', 'KURIKULUM & KOMPETENSI KEJURUAN') }}
                    </span>
                    <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Main Heading -->
                <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.1] tracking-tight text-white uppercase mb-5 max-w-4xl drop-shadow-md reveal-on-scroll reveal-up delay-100">
                    {!! nl2br(e($settings->get('academic_hero_title', 'Akademik & Kurikulum ' . $settings->get('site_short_name', 'TBSM')))) !!}
                </h1>

                <!-- Subtitle Description -->
                <p class="font-sans text-base sm:text-lg text-gray-300 leading-relaxed max-w-3xl mx-auto mb-8 reveal-on-scroll reveal-up delay-200">
                    {{ $settings->get('academic_hero_subtitle', 'Penyelarasan Kurikulum Merdeka dengan standar AMTC PT Astra Honda Motor (AHM) untuk mencetak teknisi sepeda motor profesional, kompeten, dan siap kerja.') }}
                </p>

                <!-- 3 Key Metric Highlight Pills -->
                <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 reveal-on-scroll reveal-up delay-300">
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-sm bg-white/10 border border-white/15 backdrop-blur-md text-sm font-medium text-white shadow-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-figma-red animate-pulse"></span>
                        <span>Proporsi: <strong class="text-white font-bold">{{ $settings->get('academic_praktikum_pct', '70%') }} Praktik</strong> / {{ $settings->get('academic_teori_pct', '30%') }} Teori</span>
                    </div>

                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-sm bg-white/10 border border-white/15 backdrop-blur-md text-sm font-medium text-white shadow-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        <span>Mitra Binaan: <strong class="text-white font-bold">{{ $settings->get('academic_partner_name', 'Astra Honda Motor (AHASS)') }}</strong></span>
                    </div>

                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-sm bg-white/10 border border-white/15 backdrop-blur-md text-sm font-medium text-white shadow-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span>Sertifikasi: <strong class="text-white font-bold">BNSP & Honda Level 1</strong></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. 4 PILAR SPESIFIKASI KOMPETENSI (Generous, Well-Proportioned Bento Cards) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-white border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 sm:mb-16 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                                4 Pilar Keahlian Teknis
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight">
                            Spesifikasi Kompetensi Lulusan
                        </h2>
                    </div>
                    <p class="font-sans text-sm sm:text-base text-gray-600 max-w-lg leading-relaxed">
                        Capaian pembelajaran teknis modular standar bengkel resmi Honda, menjamin penguasaan diagnosa dan pemeliharaan sepeda motor modern.
                    </p>
                </div>

                <!-- 4 Cards Grid (Substantial, Readable, Premium) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    
                    <!-- 1. Sistem Mesin (Engine) -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-6 sm:p-7 hover:border-figma-red hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-9 h-9 rounded-sm bg-figma-red/10 text-figma-red group-hover:bg-figma-red group-hover:text-white font-heading font-black text-sm flex items-center justify-center transition-colors">
                                    01
                                </span>
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 bg-white px-2.5 py-1 rounded-sm border border-gray-200">
                                    Engine
                                </span>
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_engine_title', 'Sistem Mesin') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_comp_engine_desc', 'Mendiagnosis dan servis komponen engine, sistem pendingin radiator, pelumasan, dan sistem bahan bakar injeksi PGM-FI.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200/80">
                            <span class="block text-xs font-bold uppercase text-gray-400 tracking-wider mb-2.5">Cakupan Keahlian:</span>
                            <ul class="space-y-2 text-sm text-gray-700">
                                @php
                                    $engineScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_engine_scope', "Overhaul Silinder & Katup\nInjektor & Throttle Body PGM-FI\nRadiator & Pendingin Cair"))));
                                @endphp
                                @foreach($engineScopes as $scope)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="leading-snug">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- 2. Sistem Sasis (Chassis) -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-6 sm:p-7 hover:border-figma-red hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-100">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-9 h-9 rounded-sm bg-figma-red/10 text-figma-red group-hover:bg-figma-red group-hover:text-white font-heading font-black text-sm flex items-center justify-center transition-colors">
                                    02
                                </span>
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 bg-white px-2.5 py-1 rounded-sm border border-gray-200">
                                    Chassis
                                </span>
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_chassis_title', 'Sistem Sasis') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_comp_chassis_desc', 'Perawatan dan perbaikan sistem rem hidrolik (CBS/ABS), kemudi presisi, suspensi teleskopik/monoshock, pelek, dan ban.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200/80">
                            <span class="block text-xs font-bold uppercase text-gray-400 tracking-wider mb-2.5">Cakupan Keahlian:</span>
                            <ul class="space-y-2 text-sm text-gray-700">
                                @php
                                    $chassisScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_chassis_scope', "Servis & Bleeding Rem CBS/ABS\nPerbaikan Suspensi & Kemudi\nWheel Alignment & Tyre Changer"))));
                                @endphp
                                @foreach($chassisScopes as $scope)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="leading-snug">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- 3. Sistem Kelistrikan (Electrical) -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-6 sm:p-7 hover:border-figma-red hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-200">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-9 h-9 rounded-sm bg-figma-red/10 text-figma-red group-hover:bg-figma-red group-hover:text-white font-heading font-black text-sm flex items-center justify-center transition-colors">
                                    03
                                </span>
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 bg-white px-2.5 py-1 rounded-sm border border-gray-200">
                                    Electrical
                                </span>
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_electrical_title', 'Sistem Kelistrikan') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_comp_electrical_desc', 'Diagnosis scanner injeksi HIDS, starter ACG, sistem pengisian baterai, pencahayaan LED, serta fitur Smart Key / Alarm.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200/80">
                            <span class="block text-xs font-bold uppercase text-gray-400 tracking-wider mb-2.5">Cakupan Keahlian:</span>
                            <ul class="space-y-2 text-sm text-gray-700">
                                @php
                                    $elecScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_electrical_scope', "Scanner Diagnostik HIDS / ECM\nSmart Key System & Alarm\nWiring Harness & Alternator"))));
                                @endphp
                                @foreach($elecScopes as $scope)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="leading-snug">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- 4. Pengelolaan Bengkel (Management) -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-6 sm:p-7 hover:border-figma-red hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-300">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-9 h-9 rounded-sm bg-figma-red/10 text-figma-red group-hover:bg-figma-red group-hover:text-white font-heading font-black text-sm flex items-center justify-center transition-colors">
                                    04
                                </span>
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 bg-white px-2.5 py-1 rounded-sm border border-gray-200">
                                    Management
                                </span>
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_management_title', 'Pengelolaan Bengkel') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_comp_management_desc', 'Alur Service Advisor (SA), kalkulasi estimasi biaya, inventaris suku cadang HGP, dan budaya kerja industri 5R/K3LH.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200/80">
                            <span class="block text-xs font-bold uppercase text-gray-400 tracking-wider mb-2.5">Cakupan Keahlian:</span>
                            <ul class="space-y-2 text-sm text-gray-700">
                                @php
                                    $mgmtScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_management_scope', "Alur Service Advisor & Front Desk\nEstimasi Biaya & Faktur Servis\nInventaris Tools & Suku Cadang"))));
                                @endphp
                                @foreach($mgmtScopes as $scope)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="leading-snug">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. STRUKTUR KURIKULUM 3 TAHUN (Split-Screen Interactive Hub) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-gray-50 border-b border-gray-200/80 relative" x-data="{ activeTab: 'kelas10' }">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="max-w-3xl mb-12 sm:mb-16 reveal-on-scroll reveal-up">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                            Peta Pembelajaran Berjenjang
                        </span>
                    </div>
                    <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight mb-4">
                        {{ $settings->get('academic_curriculum_heading', 'Struktur Kurikulum 3 Tahun') }}
                    </h2>
                    <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                        Pola pembelajaran komprehensif dari penanaman fondasi kedisiplinan dan mekanika dasar di kelas X, konsentrasi keahlian injeksi di kelas XI, hingga pemantapan industri dan magang penuh di AHASS pada kelas XII.
                    </p>
                </div>

                <!-- Split Interactive Hub Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Left: Navigation Control & Syllabus Card (4 Cols) -->
                    <div class="lg:col-span-4 space-y-4">
                        
                        <!-- Segmented Level Switcher -->
                        <div class="bg-white border border-gray-200 rounded-sm sm:rounded-none p-2.5 shadow-xs space-y-2">
                            <button 
                                 @click="activeTab = 'kelas10'"
                                 :class="activeTab === 'kelas10' ? 'bg-figma-dark text-white shadow-md' : 'text-gray-700 hover:bg-gray-100'"
                                 class="w-full text-left px-5 py-4 rounded-sm sm:rounded-[2px] font-sans transition-all flex items-center justify-between group cursor-pointer"
                            >
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-wider block" :class="activeTab === 'kelas10' ? 'text-figma-red' : 'text-gray-400'">Tingkat 1 • Fase E</span>
                                    <span class="font-heading font-bold text-base block mt-0.5">Kelas X (Fondasi Otomotif)</span>
                                </div>
                                <svg class="w-5 h-5 transition-transform" :class="activeTab === 'kelas10' ? 'translate-x-1 text-white' : 'text-gray-400 group-hover:translate-x-1'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <button 
                                 @click="activeTab = 'kelas11'"
                                 :class="activeTab === 'kelas11' ? 'bg-figma-dark text-white shadow-md' : 'text-gray-700 hover:bg-gray-100'"
                                 class="w-full text-left px-5 py-4 rounded-sm sm:rounded-[2px] font-sans transition-all flex items-center justify-between group cursor-pointer"
                            >
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-wider block" :class="activeTab === 'kelas11' ? 'text-figma-red' : 'text-gray-400'">Tingkat 2 • Fase F</span>
                                    <span class="font-heading font-bold text-base block mt-0.5">Kelas XI (Konsentrasi Kejuruan)</span>
                                </div>
                                <svg class="w-5 h-5 transition-transform" :class="activeTab === 'kelas11' ? 'translate-x-1 text-white' : 'text-gray-400 group-hover:translate-x-1'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <button 
                                 @click="activeTab = 'kelas12'"
                                 :class="activeTab === 'kelas12' ? 'bg-figma-dark text-white shadow-md' : 'text-gray-700 hover:bg-gray-100'"
                                 class="w-full text-left px-5 py-4 rounded-sm sm:rounded-[2px] font-sans transition-all flex items-center justify-between group cursor-pointer"
                            >
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-wider block" :class="activeTab === 'kelas12' ? 'text-emerald-400' : 'text-gray-400'">Tingkat 3 • Pemantapan</span>
                                    <span class="font-heading font-bold text-base block mt-0.5">Kelas XII (PKL AHASS & UKK)</span>
                                </div>
                                <svg class="w-5 h-5 transition-transform" :class="activeTab === 'kelas12' ? 'translate-x-1 text-white' : 'text-gray-400 group-hover:translate-x-1'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Syllabus Download CTA Box -->
                        <div class="bg-white border border-gray-200 rounded-sm sm:rounded-none p-6 shadow-xs">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-sm bg-figma-red/10 text-figma-red flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-heading font-bold text-base text-figma-dark">Dokumen Silabus</h4>
                                    <p class="text-xs text-gray-500">Struktur JP & Capaian Pembelajaran</p>
                                </div>
                            </div>
                            <p class="font-sans text-xs text-gray-600 leading-relaxed mb-4">
                                Pelajari rincian lengkap alokasi mata pelajaran umum, kejuruan, dan standar kelulusan resmi.
                            </p>
                            <button 
                                type="button"
                                @click="$dispatch('open-modal', 'syllabus-modal')"
                                class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm sm:rounded-[2px] bg-figma-dark text-white hover:bg-charcoal-800 text-xs sm:text-sm font-semibold transition-colors cursor-pointer"
                            >
                                <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>Lihat Rincian Silabus</span>
                            </button>
                        </div>

                    </div>

                    <!-- Right: Active Grade Detail Cards (8 Cols) -->
                    <div class="lg:col-span-8">
                        
                        <!-- TAB 1: KELAS X -->
                        <div x-show="activeTab === 'kelas10'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                            <div class="bg-white border border-gray-200 p-6 sm:p-8 rounded-sm sm:rounded-none shadow-xs">
                                <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-gray-100 mb-6">
                                    <div>
                                        <span class="px-3 py-1 bg-figma-red/10 text-figma-red text-xs font-bold uppercase rounded-sm inline-block mb-2">
                                            Tingkat 1 • Fase E
                                        </span>
                                        <h3 class="font-heading font-bold text-2xl text-figma-dark">
                                            {{ $settings->get('academic_curriculum_x_title', 'Fondasi Kejuruan Otomotif') }}
                                        </h3>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-right">
                                            <span class="text-xs text-gray-500 block">Alokasi:</span>
                                            <strong class="text-sm font-bold text-figma-dark">{{ $settings->get('academic_curriculum_x_hours', '12 JP / Minggu') }}</strong>
                                        </div>
                                        <div class="w-[1px] h-8 bg-gray-200"></div>
                                        <div>
                                            <span class="text-xs text-gray-500 block">Fokus Utama:</span>
                                            <strong class="text-sm font-bold text-figma-red">{{ $settings->get('academic_curriculum_x_focus', 'Disiplin & Ketelitian Ukur') }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed mb-6">
                                    {{ $settings->get('academic_curriculum_x_desc', 'Penanaman budaya industri 5R, keselamatan kerja (K3LH), penguasaan alat ukur mekanik presisi, serta logika koding dan kecerdasan artifisial dasar.') }}
                                </p>

                                <!-- 4 Subject Modules -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">GTO</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Gambar Teknik Otomotif</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Standarisasi ISO, proyeksi ortogonal komponen mesin, dan pembacaan diagram wiring kendaraan roda dua.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">TDO</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Teknologi Dasar Otomotif</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Konversi energi motor 4 tak, dasar hidrolika, pneumatik, dan karakteristik bahan bakar serta pelumas resmi.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">PDO</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Peralatan Dasar Otomotif</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Penguasaan hand tools, special service tools (SST), dan alat ukur presisi (Jangka Sorong, Micrometer sekrup).</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">KKA</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Koding & AI Otomotif</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Logika komputasi, sensor elektronik cerdas, dan kontrol otomatis sistem kendaraan injeksi modern.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2: KELAS XI -->
                        <div x-show="activeTab === 'kelas11'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                            <div class="bg-white border border-gray-200 p-6 sm:p-8 rounded-sm sm:rounded-none shadow-xs">
                                <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-gray-100 mb-6">
                                    <div>
                                        <span class="px-3 py-1 bg-figma-dark text-white text-xs font-bold uppercase rounded-sm inline-block mb-2">
                                            Tingkat 2 • Fase F
                                        </span>
                                        <h3 class="font-heading font-bold text-2xl text-figma-dark">
                                            {{ $settings->get('academic_curriculum_xi_title', 'Konsentrasi Keahlian Otomotif') }}
                                        </h3>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-right">
                                            <span class="text-xs text-gray-500 block">Alokasi:</span>
                                            <strong class="text-sm font-bold text-figma-dark">{{ $settings->get('academic_curriculum_xi_hours', '18 JP / Minggu') }}</strong>
                                        </div>
                                        <div class="w-[1px] h-8 bg-gray-200"></div>
                                        <div>
                                            <span class="text-xs text-gray-500 block">Fokus Utama:</span>
                                            <strong class="text-sm font-bold text-figma-red">{{ $settings->get('academic_curriculum_xi_focus', 'Injeksi PGM-FI & Perawatan Berkala') }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed mb-6">
                                    {{ $settings->get('academic_curriculum_xi_desc', 'Pendalaman teknis 3 sistem utama sepeda motor, praktik kerja bangku dan perawatan berkala, serta proyek produk kreatif kewirausahaan.') }}
                                </p>

                                <!-- 4 Subject Modules -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">ENGINE</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Perawatan Mesin Sepeda Motor</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Tune-up injeksi PGM-FI, penyetelan katup presisi, overhaul kepala silinder, dan sistem pendingin radiator.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">CHASSIS</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Perawatan Sasis & Kemudi</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Perbaikan sistem rem hidrolik CBS/ABS, shock absorber teleskopik/monoshock, dan wheel alignment roda.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">ELECTRICAL</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Kelistrikan Bodi & Smart Key</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Scanner diagnostik HIDS, sistem pengisian ACG starter, pencahayaan LED, dan troubleshooting Smart Key.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider">PRAKTIK</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Perawatan Berkala & Servis Nyata</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Simulasi alur Service Advisor (SA), estimasi biaya suku cadang, dan standar pemeliharaan berkala motor.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: KELAS XII -->
                        <div x-show="activeTab === 'kelas12'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                            <div class="bg-white border border-gray-200 p-6 sm:p-8 rounded-sm sm:rounded-none shadow-xs">
                                <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-gray-100 mb-6">
                                    <div>
                                        <span class="px-3 py-1 bg-emerald-700 text-white text-xs font-bold uppercase rounded-sm inline-block mb-2">
                                            Tingkat 3 • Pemantapan
                                        </span>
                                        <h3 class="font-heading font-bold text-2xl text-figma-dark">
                                            {{ $settings->get('academic_curriculum_xii_title', 'Pemantapan Industri & PKL') }}
                                        </h3>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-right">
                                            <span class="text-xs text-gray-500 block">Durasi PKL:</span>
                                            <strong class="text-sm font-bold text-emerald-700">{{ $settings->get('academic_curriculum_xii_hours', '6 Bulan di AHASS') }}</strong>
                                        </div>
                                        <div class="w-[1px] h-8 bg-gray-200"></div>
                                        <div>
                                            <span class="text-xs text-gray-500 block">Muara Lulusan:</span>
                                            <strong class="text-sm font-bold text-figma-dark">{{ $settings->get('academic_curriculum_xii_focus', 'UKK, BNSP, Rekrutmen BKK') }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed mb-6">
                                    {{ $settings->get('academic_curriculum_xii_desc', 'Pelaksanaan Praktik Kerja Lapangan (PKL) 6 bulan di AHASS, pemecahan masalah (troubleshooting) tingkat lanjut, dan Uji Sertifikasi LSP/UKK.') }}
                                </p>

                                <!-- 4 Subject Modules -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">MAGANG</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">PKL Industri AHASS 6 Bulan</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Imersi kerja penuh di bengkel resmi Honda, mengasah kecepatan, ketepatan, dan mentalitas profesional.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">ADVANCED</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Troubleshooting Kompleks</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Analisis kasus kerusakan mesin injeksi yang tidak teratur, diagnosis kelistrikan rumit, dan uji performa dyno.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">BENGKEL</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">Manajemen Bengkel & SA</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Sistem informasi manajemen bengkel AHASS, administrasi garansi suku cadang, dan kepuasan pelanggan.</p>
                                    </div>
                                    <div class="p-5 bg-gray-50/80 border border-gray-200/80 rounded-sm hover:bg-white hover:border-gray-300 transition-colors">
                                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">SERTIFIKASI</span>
                                        <h4 class="font-heading font-bold text-base text-figma-dark mt-1 mb-2">UKK & Uji Lisensi BNSP</h4>
                                        <p class="text-sm text-gray-600 leading-relaxed">Uji Kompetensi Keahlian dinilai asesor DUDI Astra Motor dan sertifikasi lisensi BNSP sebelum wisuda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. SERTIFIKASI & LISENSI LULUSAN (3 Confident Cards) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-white border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16 reveal-on-scroll reveal-up">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                            Pengakuan Kompetensi
                        </span>
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                    </div>
                    <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight mb-4">
                        Standar Sertifikasi & Lisensi Lulusan
                    </h2>
                    <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                        Setiap lulusan dibekali sertifikasi resmi berstandar nasional dan industri yang menjadi bukti autentik keahlian di dunia kerja.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                    
                    <!-- 1. BNSP LSP-P1 -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-7 hover:border-amber-500 hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up">
                        <div>
                            <div class="w-12 h-12 rounded-sm bg-amber-500/10 text-amber-600 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-amber-700 uppercase tracking-wider block mb-2">
                                {{ $settings->get('academic_cert_bnsp_license', 'LSP-P1 SMKN 1 Bangsri') }}
                            </span>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3">
                                {{ $settings->get('academic_cert_bnsp_title', 'Sertifikasi BNSP / LSP-P1') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_cert_bnsp_desc', 'Sertifikat Garuda Emas resmi berstandar SKKNI, diakui di seluruh wilayah Republik Indonesia dan ASEAN.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200 flex items-center justify-between text-xs font-semibold text-gray-500">
                            <span>Status Lisensi:</span>
                            <strong class="text-amber-700">Garuda Emas Nasional</strong>
                        </div>
                    </div>

                    <!-- 2. Lisensi Honda Motor -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-7 hover:border-figma-red hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-100">
                        <div>
                            <div class="w-12 h-12 rounded-sm bg-figma-red/10 text-figma-red flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-figma-red uppercase tracking-wider block mb-2">
                                {{ $settings->get('academic_cert_ahm_level', 'AMTC Honda Level 1 Bronze') }}
                            </span>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3">
                                {{ $settings->get('academic_cert_ahm_title', 'Lisensi Astra Honda Motor') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_cert_ahm_desc', 'Standar keahlian mekanik resmi Honda yang membuka akses prioritas rekrutmen kerja langsung di jaringan AHASS.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200 flex items-center justify-between text-xs font-semibold text-gray-500">
                            <span>Peluang Kerja:</span>
                            <strong class="text-figma-red">Fast-Track Rekrutmen AHASS</strong>
                        </div>
                    </div>

                    <!-- 3. UKK Kemendikbud -->
                    <div class="bg-gray-50/80 border border-gray-200 rounded-sm sm:rounded-none p-7 hover:border-emerald-600 hover:bg-white hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-200">
                        <div>
                            <div class="w-12 h-12 rounded-sm bg-emerald-600/10 text-emerald-600 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider block mb-2">
                                {{ $settings->get('academic_cert_ukk_issuer', 'Kemendikbud & DUDI Astra Motor') }}
                            </span>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3">
                                {{ $settings->get('academic_cert_ukk_title', 'Uji Kompetensi Keahlian (UKK)') }}
                            </h3>
                            <p class="font-sans text-sm text-gray-600 leading-relaxed mb-6">
                                {{ $settings->get('academic_cert_ukk_desc', 'Verifikasi kemampuan akhir siswa yang diuji langsung oleh instruktur bengkel resmi eksternal.') }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-gray-200 flex items-center justify-between text-xs font-semibold text-gray-500">
                            <span>Sifat Kelulusan:</span>
                            <strong class="text-emerald-700">Wajib Kompeten SMK</strong>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. CALL TO ACTION PENUTUP (Polished Closing Banner) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-16 sm:py-20 relative overflow-hidden text-center text-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8 relative z-10 reveal-on-scroll reveal-up">
                <span class="font-sans font-bold text-xs sm:text-sm text-figma-red uppercase tracking-wider block mb-3">
                    SIAP BERKARIER DI INDUSTRI OTOMOTIF?
                </span>
                <h2 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-white leading-tight mb-4">
                    Wujudkan Masa Depan Teknisi Andal Bersama {{ $settings->get('site_short_name', 'TBSM') }}
                </h2>
                <p class="font-sans text-sm sm:text-base text-gray-300 leading-relaxed mb-8 max-w-xl mx-auto">
                    Dapatkan kurikulum berstandar Astra Honda Motor, sertifikasi BNSP resmi, dan fasilitas praktik berstandar bengkel resmi AHASS.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('partnership.index') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-sm sm:rounded-[2px] bg-figma-red text-white hover:bg-red-700 font-sans font-bold text-sm sm:text-base shadow-lg hover:shadow-xl transition-all">
                        <span>Lihat Mitra Industri & AHASS</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('academic.facilities') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-sm sm:rounded-[2px] bg-white/10 hover:bg-white/20 text-white font-sans font-bold text-sm sm:text-base border border-white/20 transition-all">
                        <span>Fasilitas Bengkel</span>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- ============================================================================ -->
    <!-- MODAL SILABUS KURIKULUM (Alpine Modal Dialog) -->
    <!-- ============================================================================ -->
    <x-modal name="syllabus-modal" maxWidth="2xl">
        <div class="p-6 sm:p-8 bg-white text-left font-sans">
            <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                <div>
                    <span class="text-xs font-bold text-figma-red uppercase tracking-wider block">Dokumen Resmi</span>
                    <h3 class="font-heading font-bold text-xl text-figma-dark">Ringkasan Silabus & Kurikulum</h3>
                </div>
                <button type="button" @click="$dispatch('close-modal', 'syllabus-modal')" class="text-gray-400 hover:text-gray-700 p-2 rounded-sm hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <p class="text-sm text-gray-600 leading-relaxed mb-6">
                {{ $settings->get('academic_syllabus_modal_intro', 'Kurikulum ' . $settings->get('site_name', 'Teknik Sepeda Motor') . ' diselaraskan secara penuh dengan standar industri PT Astra Honda Motor.') }}
            </p>

            <div class="space-y-4 mb-6">
                <div class="p-4 bg-gray-50 rounded-sm border border-gray-200">
                    <h4 class="font-heading font-bold text-sm text-figma-dark mb-2">Alokasi Jam Pelajaran (JP):</h4>
                    <p class="text-xs sm:text-sm text-gray-700 whitespace-pre-line leading-relaxed">
                        {{ $settings->get('academic_syllabus_modal_hours', "• Kelas X (Fase E): Dasar Kejuruan Otomotif (12 JP)\n• Kelas XI (Fase F): Konsentrasi Mesin, Sasis, Kelistrikan (18 JP) + Praktikum Kejuruan\n• Kelas XII (Fase F): Pemantapan Troubleshooting & PKL AHASS (6 Bulan Penuh)") }}
                    </p>
                </div>

                <div class="p-4 bg-gray-50 rounded-sm border border-gray-200">
                    <h4 class="font-heading font-bold text-sm text-figma-dark mb-2">Standar Kelulusan:</h4>
                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                        {{ $settings->get('academic_syllabus_modal_standards', 'Siswa dinyatakan kompeten setelah menyelesaikan seluruh modul capaian pembelajaran, lulus UKK dari asesor industri Astra Motor, dan bersertifikasi BNSP.') }}
                    </p>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex flex-wrap items-center justify-between gap-4">
                <span class="text-xs text-gray-500">Format: Dokumen Digital Kurikulum Merdeka</span>
                <div class="flex items-center gap-3">
                    <button type="button" @click="$dispatch('close-modal', 'syllabus-modal')" class="px-4 py-2 rounded-sm sm:rounded-[2px] border border-gray-300 text-xs sm:text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                        Tutup
                    </button>
                    @if($syllabus = $settings->get('academic_syllabus_file'))
                        <a href="{{ Storage::url($syllabus) }}" target="_blank" download class="inline-flex items-center gap-1.5 px-5 py-2 rounded-sm sm:rounded-[2px] bg-figma-red text-white text-xs sm:text-sm font-semibold hover:bg-red-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <span>Unduh PDF Resmi</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </x-modal>

</x-layouts.app>
