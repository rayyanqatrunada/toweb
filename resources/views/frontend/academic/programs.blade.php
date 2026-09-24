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

    <!-- Main Layout Wrapper (Synchronized with Homepage theme) -->
    <main class="flex flex-col items-center w-full overflow-hidden relative">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: AKADEMIK & KURIKULUM (Compact & Cinematic) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-12 sm:py-16 lg:py-20 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Overlay -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                @if($settings->get('header_academic_programs_image'))
                    <img src="{{ Storage::url($settings->get('header_academic_programs_image')) }}" alt="Academic Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @else
                    <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=1600&auto=format&fit=crop" alt="Academic Background" class="w-full h-full object-cover mix-blend-overlay opacity-25 grayscale" loading="eager">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-charcoal-950/80 via-charcoal-900/90 to-charcoal-950"></div>
            </div>

            <!-- Technical Radial Grid -->
            <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.06]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
            
            <!-- Red Ambient Glow -->
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-figma-red/15 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>

            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16 relative z-20 text-center flex flex-col items-center">
                <!-- Eyebrow with Brand Red Bar -->
                <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-3 sm:mb-4 reveal-on-scroll reveal-up">
                    <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-red uppercase">
                        {{ $settings->get('academic_hero_badge', 'KURIKULUM & KOMPETENSI KEJURUAN') }}
                    </span>
                    <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Main Heading -->
                <h1 class="font-heading font-black text-[24px] sm:text-[36px] md:text-[48px] lg:text-[56px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-white uppercase mb-3 sm:mb-5 max-w-[860px] drop-shadow-md reveal-on-scroll reveal-up delay-100">
                    {!! nl2br(e($settings->get('academic_hero_title', 'Akademik & Kurikulum ' . $settings->get('site_short_name', 'TBSM')))) !!}
                </h1>

                <!-- Subtitle Description -->
                <p class="font-sans text-[13px] sm:text-[16px] md:text-[18px] text-gray-300 leading-[1.6] max-w-[760px] mx-auto mb-6 sm:mb-8 reveal-on-scroll reveal-up delay-200">
                    {{ $settings->get('academic_hero_subtitle', 'Penyelarasan Kurikulum Merdeka dengan standar AMTC PT Astra Honda Motor (AHM) untuk mencetak teknisi sepeda motor profesional, kompeten, dan siap kerja.') }}
                </p>

                <!-- 3 Quick Highlight Badges (Compact) -->
                <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-4 reveal-on-scroll reveal-up delay-300">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-sm text-xs font-semibold text-white">
                        <span class="w-2 h-2 rounded-full bg-figma-red animate-pulse"></span>
                        <span>Proporsi: <strong class="text-white">{{ $settings->get('academic_praktikum_pct', '70%') }} Praktik</strong> / {{ $settings->get('academic_teori_pct', '30%') }} Teori</span>
                    </div>

                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-sm text-xs font-semibold text-white">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>Mitra Industri: <strong class="text-white">{{ $settings->get('academic_partner_name', 'Astra Honda Motor (AHASS)') }}</strong></span>
                    </div>

                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-sm text-xs font-semibold text-white">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span>Lisensi: <strong class="text-white">BNSP & Honda Level 1</strong></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. 4 PILAR SPESIFIKASI KOMPETENSI (Compact 4-Grid, To The Point) -->
        <!-- ============================================================================ -->
        <section class="w-full py-12 sm:py-16 md:py-20 bg-white border-b border-gray-100 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8 sm:mb-12 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-2 sm:mb-3">
                            <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                                4 Pilar Keahlian
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-[22px] sm:text-[32px] md:text-[40px] leading-[1.15] text-figma-dark tracking-tight">
                            Spesifikasi Kompetensi Lulusan
                        </h2>
                    </div>
                    <p class="font-sans text-[13px] sm:text-[15px] text-gray-500 max-w-md leading-relaxed">
                        Capaian pembelajaran teknis modular standar bengkel resmi Honda, menjamin penguasaan diagnosa dan pemeliharaan sepeda motor modern.
                    </p>
                </div>

                <!-- 4 Cards Grid (Clear, dense, zero filler) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    
                    <!-- 1. Sistem Mesin (Engine) -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none p-5 sm:p-6 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="w-7 h-7 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">01</span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 bg-white px-2 py-0.5 rounded border border-gray-200">Engine</span>
                            </div>
                            <h3 class="font-heading font-bold text-[17px] sm:text-[19px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_engine_title', 'Sistem Mesin') }}
                            </h3>
                            <p class="font-sans text-[12px] sm:text-[13px] text-gray-600 leading-relaxed mb-4">
                                {{ $settings->get('academic_comp_engine_desc', 'Mendiagnosis dan servis komponen engine, sistem pendingin radiator, pelumasan, dan sistem bahan bakar injeksi PGM-FI.') }}
                            </p>
                        </div>
                        <div class="pt-3 border-t border-gray-200">
                            <span class="block text-[10px] font-bold uppercase text-gray-400 tracking-wider mb-1.5">Fokus Praktikum:</span>
                            <ul class="space-y-1 text-xs text-gray-700">
                                @php
                                    $engineScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_engine_scope', "Overhaul Silinder & Katup\nInjektor & Throttle Body PGM-FI\nRadiator & Pendingin Cair"))));
                                @endphp
                                @foreach($engineScopes as $scope)
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 bg-figma-red rounded-full shrink-0"></span>
                                        <span class="line-clamp-1">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- 2. Sistem Sasis (Chassis) -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none p-5 sm:p-6 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-100">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="w-7 h-7 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">02</span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 bg-white px-2 py-0.5 rounded border border-gray-200">Chassis</span>
                            </div>
                            <h3 class="font-heading font-bold text-[17px] sm:text-[19px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_chassis_title', 'Sistem Sasis') }}
                            </h3>
                            <p class="font-sans text-[12px] sm:text-[13px] text-gray-600 leading-relaxed mb-4">
                                {{ $settings->get('academic_comp_chassis_desc', 'Perawatan dan perbaikan sistem rem hidrolik (CBS/ABS), kemudi presisi, suspensi teleskopik/monoshock, pelek, dan ban.') }}
                            </p>
                        </div>
                        <div class="pt-3 border-t border-gray-200">
                            <span class="block text-[10px] font-bold uppercase text-gray-400 tracking-wider mb-1.5">Fokus Praktikum:</span>
                            <ul class="space-y-1 text-xs text-gray-700">
                                @php
                                    $chassisScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_chassis_scope', "Servis & Bleeding Rem CBS/ABS\nPerbaikan Suspensi & Kemudi\nWheel Alignment & Tyre Changer"))));
                                @endphp
                                @foreach($chassisScopes as $scope)
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 bg-figma-red rounded-full shrink-0"></span>
                                        <span class="line-clamp-1">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- 3. Sistem Kelistrikan (Electrical) -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none p-5 sm:p-6 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-200">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="w-7 h-7 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">03</span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 bg-white px-2 py-0.5 rounded border border-gray-200">Electrical</span>
                            </div>
                            <h3 class="font-heading font-bold text-[17px] sm:text-[19px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_electrical_title', 'Sistem Kelistrikan') }}
                            </h3>
                            <p class="font-sans text-[12px] sm:text-[13px] text-gray-600 leading-relaxed mb-4">
                                {{ $settings->get('academic_comp_electrical_desc', 'Diagnosis scanner injeksi HIDS, starter ACG, sistem pengisian baterai, pencahayaan LED, serta fitur Smart Key / Alarm.') }}
                            </p>
                        </div>
                        <div class="pt-3 border-t border-gray-200">
                            <span class="block text-[10px] font-bold uppercase text-gray-400 tracking-wider mb-1.5">Fokus Praktikum:</span>
                            <ul class="space-y-1 text-xs text-gray-700">
                                @php
                                    $elecScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_electrical_scope', "Scanner Diagnostik HIDS / ECM\nSmart Key System & Alarm\nWiring Harness & Alternator"))));
                                @endphp
                                @foreach($elecScopes as $scope)
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 bg-figma-red rounded-full shrink-0"></span>
                                        <span class="line-clamp-1">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- 4. Pengelolaan Bengkel (Management) -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none p-5 sm:p-6 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-300">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="w-7 h-7 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">04</span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 bg-white px-2 py-0.5 rounded border border-gray-200">Management</span>
                            </div>
                            <h3 class="font-heading font-bold text-[17px] sm:text-[19px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('academic_comp_management_title', 'Pengelolaan Bengkel') }}
                            </h3>
                            <p class="font-sans text-[12px] sm:text-[13px] text-gray-600 leading-relaxed mb-4">
                                {{ $settings->get('academic_comp_management_desc', 'Alur Service Advisor (SA), kalkulasi estimasi biaya, inventaris suku cadang HGP, dan budaya kerja industri 5R/K3LH.') }}
                            </p>
                        </div>
                        <div class="pt-3 border-t border-gray-200">
                            <span class="block text-[10px] font-bold uppercase text-gray-400 tracking-wider mb-1.5">Fokus Praktikum:</span>
                            <ul class="space-y-1 text-xs text-gray-700">
                                @php
                                    $mgmtScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_management_scope', "Alur Service Advisor & Front Desk\nEstimasi Biaya & Faktur Servis\nInventaris Tools & Suku Cadang"))));
                                @endphp
                                @foreach($mgmtScopes as $scope)
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 bg-figma-red rounded-full shrink-0"></span>
                                        <span class="line-clamp-1">{{ $scope }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. STRUKTUR KURIKULUM 3 TAHUN (Tabbed, Dense, Fast Reading) -->
        <!-- ============================================================================ -->
        <section class="w-full py-12 sm:py-16 md:py-20 bg-gray-50 border-b border-gray-200 relative" x-data="{ activeTab: 'kelas10' }">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header with Tab Switcher -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 sm:mb-10 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-2 sm:mb-3">
                            <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                                Peta Pembelajaran
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-[22px] sm:text-[32px] md:text-[40px] leading-[1.15] text-figma-dark tracking-tight">
                            {{ $settings->get('academic_curriculum_heading', 'Struktur Kurikulum 3 Tahun') }}
                        </h2>
                    </div>

                    <!-- 3 Grade Tabs -->
                    <div class="flex items-center gap-1 bg-white p-1 rounded-sm border border-gray-200 shadow-xs self-start md:self-auto">
                        <button 
                            @click="activeTab = 'kelas10'"
                            :class="activeTab === 'kelas10' ? 'bg-figma-dark text-white font-bold' : 'text-gray-600 hover:text-figma-dark'"
                            class="px-4 py-2 text-xs sm:text-sm font-sans rounded-sm transition-all cursor-pointer"
                        >
                            Kelas X (Fase E)
                        </button>
                        <button 
                            @click="activeTab = 'kelas11'"
                            :class="activeTab === 'kelas11' ? 'bg-figma-dark text-white font-bold' : 'text-gray-600 hover:text-figma-dark'"
                            class="px-4 py-2 text-xs sm:text-sm font-sans rounded-sm transition-all cursor-pointer"
                        >
                            Kelas XI (Fase F)
                        </button>
                        <button 
                            @click="activeTab = 'kelas12'"
                            :class="activeTab === 'kelas12' ? 'bg-figma-dark text-white font-bold' : 'text-gray-600 hover:text-figma-dark'"
                            class="px-4 py-2 text-xs sm:text-sm font-sans rounded-sm transition-all cursor-pointer"
                        >
                            Kelas XII (PKL & UKK)
                        </button>
                    </div>
                </div>

                <!-- Tab Panels -->
                
                <!-- TAB 1: KELAS X -->
                <div x-show="activeTab === 'kelas10'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 bg-white border border-gray-200 p-6 sm:p-8 rounded-xl sm:rounded-none shadow-sm">
                        <div class="lg:col-span-4 border-b lg:border-b-0 lg:border-r border-gray-200 pb-5 lg:pb-0 lg:pr-6 flex flex-col justify-between">
                            <div>
                                <span class="px-2.5 py-1 bg-figma-red text-white text-[10px] font-bold uppercase rounded-sm inline-block mb-3">Tingkat 1 • Fase E</span>
                                <h3 class="font-heading font-bold text-[20px] text-figma-dark mb-2">
                                    {{ $settings->get('academic_curriculum_x_title', 'Fondasi Kejuruan Otomotif') }}
                                </h3>
                                <p class="font-sans text-[13px] text-gray-600 leading-relaxed mb-4">
                                    {{ $settings->get('academic_curriculum_x_desc', 'Penanaman budaya industri 5R, keselamatan kerja (K3LH), penguasaan alat ukur mekanik presisi, serta logika koding dan kecerdasan artifisial dasar.') }}
                                </p>
                            </div>
                            <div class="pt-4 border-t border-gray-100 font-sans text-xs text-gray-500 space-y-1">
                                <div class="flex justify-between"><span>Alokasi Kejuruan:</span><strong class="text-figma-dark">{{ $settings->get('academic_curriculum_x_hours', '12 JP / Minggu') }}</strong></div>
                                <div class="flex justify-between"><span>Fokus:</span><strong class="text-figma-dark">{{ $settings->get('academic_curriculum_x_focus', 'Disiplin & Ketelitian Ukur') }}</strong></div>
                            </div>
                        </div>

                        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">GTO</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Gambar Teknik Otomotif</h4>
                                <p class="text-xs text-gray-500">Standarisasi ISO, proyeksi ortogonal komponen mesin, dan pembacaan diagram wiring kendaraan.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">TDO</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Teknologi Dasar Otomotif</h4>
                                <p class="text-xs text-gray-500">Konversi energi motor 4 tak, dasar hidrolika, pneumatik, dan karakteristik bahan bakar minyak/pelumas.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">PDO</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Peralatan Dasar Otomotif</h4>
                                <p class="text-xs text-gray-500">Penguasaan hand tools, special service tools (SST), dan alat ukur presisi (Jangka Sorong, Micrometer).</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">KKA</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Koding & AI Otomotif Dasar</h4>
                                <p class="text-xs text-gray-500">Logika komputasi, sensor elektronik cerdas, dan kontrol otomatis kendaraan roda dua masa kini.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: KELAS XI -->
                <div x-show="activeTab === 'kelas11'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 bg-white border border-gray-200 p-6 sm:p-8 rounded-xl sm:rounded-none shadow-sm">
                        <div class="lg:col-span-4 border-b lg:border-b-0 lg:border-r border-gray-200 pb-5 lg:pb-0 lg:pr-6 flex flex-col justify-between">
                            <div>
                                <span class="px-2.5 py-1 bg-figma-dark text-white text-[10px] font-bold uppercase rounded-sm inline-block mb-3">Tingkat 2 • Fase F</span>
                                <h3 class="font-heading font-bold text-[20px] text-figma-dark mb-2">
                                    {{ $settings->get('academic_curriculum_xi_title', 'Konsentrasi Keahlian & TeFa') }}
                                </h3>
                                <p class="font-sans text-[13px] text-gray-600 leading-relaxed mb-4">
                                    {{ $settings->get('academic_curriculum_xi_desc', 'Pendalaman teknis 3 sistem utama sepeda motor, simulasi pelayanan servis konsumen nyata (Teaching Factory), dan proyek kewirausahaan.') }}
                                </p>
                            </div>
                            <div class="pt-4 border-t border-gray-100 font-sans text-xs text-gray-500 space-y-1">
                                <div class="flex justify-between"><span>Alokasi Kejuruan:</span><strong class="text-figma-dark">{{ $settings->get('academic_curriculum_xi_hours', '18 JP / Minggu') }}</strong></div>
                                <div class="flex justify-between"><span>Fokus:</span><strong class="text-figma-dark">{{ $settings->get('academic_curriculum_xi_focus', 'Injeksi PGM-FI & TeFa Nyata') }}</strong></div>
                            </div>
                        </div>

                        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">ENGINE</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Perawatan Mesin Sepeda Motor</h4>
                                <p class="text-xs text-gray-500">Tune-up injeksi PGM-FI, penyetelan katup, overhaul kepala silinder, dan sistem pendingin radiator.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">CHASSIS</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Perawatan Sasis & Kemudi</h4>
                                <p class="text-xs text-gray-500">Perbaikan sistem rem hidrolik CBS/ABS, shock absorber teleskopik/monoshock, dan balancing roda.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">ELECTRICAL</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Perawatan Kelistrikan Motor</h4>
                                <p class="text-xs text-gray-500">Pengujian sistem pengapian, alternator, starter ACG, sistem Smart Key, dan lampu LED terpadu.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">PKK</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Produk Kreatif & Kewirausahaan</h4>
                                <p class="text-xs text-gray-500">Praktik pelayanan servis konsumen di Teaching Factory, kalkulasi jasa, dan suku cadang motor.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: KELAS XII -->
                <div x-show="activeTab === 'kelas12'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 bg-white border border-gray-200 p-6 sm:p-8 rounded-xl sm:rounded-none shadow-sm">
                        <div class="lg:col-span-4 border-b lg:border-b-0 lg:border-r border-gray-200 pb-5 lg:pb-0 lg:pr-6 flex flex-col justify-between">
                            <div>
                                <span class="px-2.5 py-1 bg-emerald-600 text-white text-[10px] font-bold uppercase rounded-sm inline-block mb-3">Tingkat 3 • Pemantapan</span>
                                <h3 class="font-heading font-bold text-[20px] text-figma-dark mb-2">
                                    {{ $settings->get('academic_curriculum_xii_title', 'Pemantapan Industri & PKL') }}
                                </h3>
                                <p class="font-sans text-[13px] text-gray-600 leading-relaxed mb-4">
                                    {{ $settings->get('academic_curriculum_xii_desc', 'Pelaksanaan Praktik Kerja Lapangan (PKL) 6 bulan di AHASS, pemecahan masalah (troubleshooting) tingkat lanjut, dan Uji Sertifikasi LSP/UKK.') }}
                                </p>
                            </div>
                            <div class="pt-4 border-t border-gray-100 font-sans text-xs text-gray-500 space-y-1">
                                <div class="flex justify-between"><span>Alokasi PKL:</span><strong class="text-emerald-700">{{ $settings->get('academic_curriculum_xii_hours', '6 Bulan Penuh di AHASS') }}</strong></div>
                                <div class="flex justify-between"><span>Fokus:</span><strong class="text-figma-dark">{{ $settings->get('academic_curriculum_xii_focus', 'UKK, BNSP, Rekrutmen BKK') }}</strong></div>
                            </div>
                        </div>

                        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-emerald-700 uppercase">PKL 6 BULAN</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Praktik Kerja Lapangan di AHASS</h4>
                                <p class="text-xs text-gray-500">Penempatan kerja riil di jaringan bengkel resmi AHASS se-Kabupaten Jepara dan Karesidenan Pati.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">DIAGNOSIS</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Troubleshooting Lanjutan</h4>
                                <p class="text-xs text-gray-500">Analisis kerusakan kompleks menggunakan scanner HIDS, multimeter digital, dan oscilloscope otomotif.</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-figma-red uppercase">SERTIFIKASI</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Uji Kompetensi Keahlian (UKK)</h4>
                                <p class="text-xs text-gray-500">Uji kompetensi teknis resmi dengan penguji eksternal dari PT Astra Honda Motor (Main Dealer).</p>
                            </div>
                            <div class="p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <span class="text-[10px] font-bold text-amber-700 uppercase">BNSP LSP-P1</span>
                                <h4 class="font-heading font-bold text-sm text-figma-dark mt-0.5 mb-1">Sertifikasi Profesi Nasional</h4>
                                <p class="text-xs text-gray-500">Sertifikat berlisensi Badan Nasional Sertifikasi Profesi (BNSP) pengakuan kompetensi kerja nasional.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. SERTIFIKASI & JAMINAN MUTU LULUSAN (3-Card Strip, Direct & Clear) -->
        <!-- ============================================================================ -->
        <section class="w-full py-12 sm:py-16 bg-white border-b border-gray-100 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-12 reveal-on-scroll reveal-up">
                    <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-2 sm:mb-3">
                        <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                            Pengakuan Kompetensi
                        </span>
                        <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                    </div>
                    <h2 class="font-heading font-extrabold text-[22px] sm:text-[32px] md:text-[38px] text-figma-dark tracking-tight">
                        Sertifikasi & Lisensi Resmi Lulusan
                    </h2>
                    <p class="font-sans text-[13px] sm:text-[15px] text-gray-500 mt-2">
                        Setiap lulusan dibekali sertifikasi resmi yang diakui industri otomotif nasional dan standar kerja bengkel resmi.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6">
                    <!-- Cert 1: BNSP -->
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none relative group hover:border-figma-red transition-all">
                        <div class="w-10 h-10 rounded-lg bg-amber-500/10 text-amber-700 font-heading font-bold text-sm flex items-center justify-center mb-4">
                            BNSP
                        </div>
                        <h3 class="font-heading font-bold text-[17px] text-figma-dark mb-1.5">{{ $settings->get('academic_cert_bnsp_title', 'Sertifikasi BNSP / LSP-P1') }}</h3>
                        <span class="text-[11px] font-bold text-amber-700 uppercase tracking-wide block mb-3">{{ $settings->get('academic_cert_bnsp_license', 'LSP-P1 SMKN 1 Bangsri') }}</span>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('academic_cert_bnsp_desc', 'Sertifikat Garuda Emas resmi berstandar SKKNI, diakui di seluruh wilayah Republik Indonesia dan ASEAN.') }}
                        </p>
                    </div>

                    <!-- Cert 2: Honda AMTC -->
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none relative group hover:border-figma-red transition-all">
                        <div class="w-10 h-10 rounded-lg bg-figma-red/10 text-figma-red font-heading font-bold text-sm flex items-center justify-center mb-4">
                            AHM
                        </div>
                        <h3 class="font-heading font-bold text-[17px] text-figma-dark mb-1.5">{{ $settings->get('academic_cert_ahm_title', 'Lisensi Astra Honda Motor') }}</h3>
                        <span class="text-[11px] font-bold text-figma-red uppercase tracking-wide block mb-3">{{ $settings->get('academic_cert_ahm_level', 'AMTC Honda Level 1 Bronze') }}</span>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('academic_cert_ahm_desc', 'Standar keahlian mekanik resmi Honda yang membuka akses prioritas rekrutmen kerja langsung di jaringan AHASS.') }}
                        </p>
                    </div>

                    <!-- Cert 3: UKK -->
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none relative group hover:border-figma-red transition-all">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500/10 text-emerald-700 font-heading font-bold text-sm flex items-center justify-center mb-4">
                            UKK
                        </div>
                        <h3 class="font-heading font-bold text-[17px] text-figma-dark mb-1.5">{{ $settings->get('academic_cert_ukk_title', 'Uji Kompetensi Keahlian (UKK)') }}</h3>
                        <span class="text-[11px] font-bold text-emerald-700 uppercase tracking-wide block mb-3">{{ $settings->get('academic_cert_ukk_issuer', 'Kemendikbud & DUDI Astra Motor') }}</span>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('academic_cert_ukk_desc', 'Verifikasi kemampuan akhir siswa yang diuji langsung oleh instruktur bengkel resmi eksternal.') }}
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. CALL TO ACTION & SILABUS (Compact) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-12 sm:py-16 relative overflow-hidden text-center text-white">
            <div class="max-w-[800px] mx-auto px-4 sm:px-8 relative z-10 reveal-on-scroll reveal-up">
                <h2 class="font-heading font-black text-[22px] sm:text-[32px] md:text-[40px] text-white leading-tight mb-3">
                    Tertarik Menjadi Bagian dari TBSM?
                </h2>
                <p class="font-sans text-xs sm:text-sm text-gray-300 max-w-lg mx-auto mb-6 leading-relaxed">
                    Pelajari kurikulum kejuruan selengkapnya atau konsultasikan pendaftaran calon siswa dengan tim akademik kami.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    @if($syllabus = $settings->get('academic_syllabus_file'))
                        <a 
                            href="{{ Storage::url($syllabus) }}" 
                            target="_blank" 
                            class="px-6 py-3 bg-white text-figma-dark font-sans font-bold text-xs uppercase tracking-wide hover:bg-gray-100 transition-colors rounded-sm inline-flex items-center gap-2"
                        >
                            <svg class="w-4 h-4 text-figma-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>Unduh Ringkasan Silabus PDF</span>
                        </a>
                    @endif
                    <a 
                        href="{{ route('contact.index') }}" 
                        class="px-6 py-3 bg-figma-red hover:bg-figma-dark-red text-white font-sans font-bold text-xs uppercase tracking-wide transition-colors rounded-sm inline-flex items-center gap-2 shadow-lg shadow-figma-red/20"
                    >
                        <span>Hubungi Kontak Jurusan</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- Floating Scroll To Top Button -->
    <x-frontend.home.scroll-to-top />

</x-layouts.app>
