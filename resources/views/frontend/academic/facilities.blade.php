<x-layouts.app title="Fasilitas Bengkel & Sarana Praktik" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Fasilitas Bengkel {{ $settings->get('site_short_name', 'TBSM') }}",
      "description": "Fasilitas bengkel standar industri Astra Honda Motor (AHASS), bike lift hidrolik, simulator injeksi PGM-FI, dan bengkel praktik kejuruan di SMK Negeri 1 Bangsri."
    }
    </script>
    @endpush

    <!-- Main Layout Wrapper -->
    <main class="flex flex-col items-center w-full overflow-hidden relative bg-[#FAFAFA]" 
          x-data="{ 
              activeCategory: 'all',
              selectedFacility: null
          }">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: FASILITAS BENGKEL (Cinematic & Confident) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-16 sm:py-20 lg:py-24 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Overlay -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                @if($settings->get('facility_hero_bg_image'))
                    <img src="{{ Storage::url($settings->get('facility_hero_bg_image')) }}" alt="Facility Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @else
                    <img src="https://images.unsplash.com/photo-1486006920555-c77dce18193b?q=80&w=1600&auto=format&fit=crop" alt="Facility Background" class="w-full h-full object-cover mix-blend-overlay opacity-25 grayscale" loading="eager">
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
                        {{ $settings->get('facility_hero_badge', 'INFRASTRUKTUR & BENGKEL ASTRA HONDA') }}
                    </span>
                    <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Main Heading -->
                <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.1] tracking-tight text-white uppercase mb-5 max-w-4xl drop-shadow-md reveal-on-scroll reveal-up delay-100">
                    {!! nl2br(e($settings->get('facility_hero_title', 'Fasilitas Bengkel Standar Industri ' . $settings->get('site_short_name', 'TBSM')))) !!}
                </h1>

                <!-- Subtitle Description -->
                <p class="font-sans text-base sm:text-lg text-gray-300 leading-relaxed max-w-3xl mx-auto mb-10 reveal-on-scroll reveal-up delay-200">
                    {{ $settings->get('facility_hero_subtitle', 'Dilengkapi bike lift hidrolik, simulator injeksi PGM-FI, engine overhaul stand, special service tools (SST) lengkap, dan budaya kerja 5R/K3LH untuk mencetak teknisi profesional berstandar AHASS.') }}
                </p>

                <!-- 4 Metrics Strip (Confident, Normal Sizing) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 divide-x-0 md:divide-x md:divide-charcoal-800 pt-8 border-t border-charcoal-800 w-full max-w-4xl reveal-on-scroll reveal-up delay-300">
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('facility_stat_1_val', '70%') }}
                        </div>
                        <div class="w-6 h-[2px] bg-figma-red mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">
                            {{ $settings->get('facility_stat_1_label', 'Proporsi Praktik Kejuruan') }}
                        </div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('facility_stat_2_val', '6 Pit') }}
                        </div>
                        <div class="w-6 h-[2px] bg-emerald-500 mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">
                            {{ $settings->get('facility_stat_2_label', 'Stall Servis Hidrolik AHASS') }}
                        </div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('facility_stat_3_val', '100%') }}
                        </div>
                        <div class="w-6 h-[2px] bg-amber-500 mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">
                            {{ $settings->get('facility_stat_3_label', 'Peralatan Standar Pabrikan') }}
                        </div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('facility_stat_4_val', '5R & K3') }}
                        </div>
                        <div class="w-6 h-[2px] bg-figma-red mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">
                            {{ $settings->get('facility_stat_4_label', 'Budaya Disiplin Industri') }}
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. INVENTARIS FASILITAS & SARANA PRAKTIK (Clean Category Tabs) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-white border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 sm:mb-12 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                                Sarana & Prasarana
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight">
                            Galeri Peralatan & Stall Bengkel
                        </h2>
                    </div>
                    <p class="font-sans text-sm sm:text-base text-gray-600 max-w-md leading-relaxed">
                        Seluruh unit mesin praktik, bike lift hidrolik, dan scanner diagnostik dirancang sesuai bengkel resmi Honda Grade A+.
                    </p>
                </div>

                <!-- Category Filter Tabs -->
                <div class="flex flex-wrap items-center gap-2 mb-10 reveal-on-scroll reveal-up">
                    <button 
                        @click="activeCategory = 'all'"
                        :class="activeCategory === 'all' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-5 py-2.5 rounded-sm sm:rounded-[2px] text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                    >
                        Semua Fasilitas ({{ $facilities->count() }})
                    </button>
                    <button 
                        @click="activeCategory = 'pit'"
                        :class="activeCategory === 'pit' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-5 py-2.5 rounded-sm sm:rounded-[2px] text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                    >
                        Pit Servis & Bike Lift
                    </button>
                    <button 
                        @click="activeCategory = 'engine'"
                        :class="activeCategory === 'engine' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-5 py-2.5 rounded-sm sm:rounded-[2px] text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                    >
                        Unit Mesin & Injeksi
                    </button>
                    <button 
                        @click="activeCategory = 'scanner'"
                        :class="activeCategory === 'scanner' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-5 py-2.5 rounded-sm sm:rounded-[2px] text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                    >
                        Scanner & Kelistrikan
                    </button>
                    <button 
                        @click="activeCategory = 'tools'"
                        :class="activeCategory === 'tools' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-5 py-2.5 rounded-sm sm:rounded-[2px] text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                    >
                        Special Tools (SST) & Alat Ukur
                    </button>
                </div>

                <!-- Facilities Grid (Normal Sizing, High Polish) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @forelse($facilities as $facility)
                        @php
                            $catKey = 'tools';
                            $titleLower = strtolower($facility->title . ' ' . $facility->category);
                            if (str_contains($titleLower, 'lift') || str_contains($titleLower, 'pit') || str_contains($titleLower, 'stall')) {
                                $catKey = 'pit';
                            } elseif (str_contains($titleLower, 'mesin') || str_contains($titleLower, 'injeksi') || str_contains($titleLower, 'engine') || str_contains($titleLower, 'motor')) {
                                $catKey = 'engine';
                            } elseif (str_contains($titleLower, 'scan') || str_contains($titleLower, 'hids') || str_contains($titleLower, 'listrik') || str_contains($titleLower, 'tester')) {
                                $catKey = 'scanner';
                            }
                        @endphp
                        <div 
                            x-show="activeCategory === 'all' || activeCategory === '{{ $catKey }}'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="bg-white border border-gray-200 rounded-sm sm:rounded-none overflow-hidden shadow-xs hover:shadow-xl hover:border-figma-red transition-all duration-300 flex flex-col justify-between group"
                        >
                            <div>
                                <!-- Image Thumbnail -->
                                <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                                    @if($facility->image)
                                        <img src="{{ Storage::url($facility->image) }}" alt="{{ $facility->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                            <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <div class="absolute top-3 left-3 flex items-center gap-2">
                                        <span class="px-3 py-1 rounded-sm bg-figma-dark/80 backdrop-blur-md text-white text-xs font-semibold">
                                            {{ $facility->category_label ?? $facility->category ?? 'Peralatan Praktik' }}
                                        </span>
                                    </div>

                                    @if($facility->condition)
                                        <div class="absolute top-3 right-3">
                                            <span class="px-2.5 py-1 rounded-sm text-xs font-bold bg-emerald-500 text-white shadow-xs">
                                                {{ $facility->condition }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Content -->
                                <div class="p-6">
                                    <h3 class="font-heading font-bold text-xl text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                        {{ $facility->title }}
                                    </h3>
                                    <p class="font-sans text-sm text-gray-600 leading-relaxed mb-4 line-clamp-2">
                                        {{ $facility->description }}
                                    </p>

                                    @if($facility->specification)
                                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                                            <span class="font-semibold text-gray-400 uppercase tracking-wider">Spesifikasi:</span>
                                            <span class="font-mono text-gray-700 truncate max-w-[200px]">{{ $facility->specification }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6 pt-0">
                                <button 
                                    type="button" 
                                    @click="selectedFacility = {
                                        title: {{ json_encode($facility->title) }},
                                        category: {{ json_encode($facility->category_label ?? $facility->category ?? 'Peralatan') }},
                                        description: {{ json_encode($facility->description ?? '') }},
                                        specification: {{ json_encode($facility->specification ?? '') }},
                                        condition: {{ json_encode($facility->condition ?? 'Sangat Baik') }},
                                        image: {{ json_encode($facility->image ? Storage::url($facility->image) : '') }}
                                    }; $dispatch('open-modal', 'facility-detail-modal')"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm sm:rounded-[2px] bg-gray-50 hover:bg-figma-dark hover:text-white text-xs sm:text-sm font-semibold text-figma-dark transition-all border border-gray-200 cursor-pointer"
                                >
                                    <span>Lihat Spesifikasi Lengkap</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-400">
                            Belum ada inventaris fasilitas yang ditampilkan.
                        </div>
                    @endforelse
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. BUDAYA KERJA 5R & PROTOKOL K3LH (Redesigned Bento Architecture) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-gray-50 border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="max-w-3xl mb-12 sm:mb-16 reveal-on-scroll reveal-up">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                            {{ $settings->get('facility_5r_badge', 'DISIPLIN INDUSTRI JEPANG & K3LH') }}
                        </span>
                    </div>
                    <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight mb-4">
                        {{ $settings->get('facility_5r_title', 'Penerapan Budaya Kerja 5R & Standar K3LH') }}
                    </h2>
                    <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ $settings->get('facility_5r_desc', 'Sebelum dan sesudah melaksanakan praktik, seluruh siswa membiasakan 5R (Ringkas, Rapi, Resik, Rawat, Rajin) dan keselamatan kerja untuk membentuk etos kerja industri berstandar pabrikan.') }}
                    </p>
                </div>

                <!-- PART A: 5R Budaya Kerja Industri (5 Well-Proportioned Cards) -->
                <div class="mb-12">
                    <h3 class="font-heading font-bold text-lg sm:text-xl text-figma-dark mb-6 flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 bg-figma-red rounded-full"></span>
                        5 Prinsip Budaya Kerja Industri (Jepang)
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                        <!-- 1. Ringkas (Seiri) -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs hover:border-figma-red hover:shadow-md transition-all flex flex-col justify-between">
                            <div>
                                <span class="font-heading font-black text-xs text-figma-red uppercase tracking-wider block mb-1">Seiri</span>
                                <h4 class="font-heading font-bold text-lg text-figma-dark mb-2">
                                    {{ $settings->get('facility_5r_ringkas_title', 'Ringkas') }}
                                </h4>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $settings->get('facility_5r_ringkas_desc', 'Memisahkan alat kerja, material sisa, dan suku cadang yang diperlukan dengan yang tidak terpakai.') }}
                                </p>
                            </div>
                        </div>

                        <!-- 2. Rapi (Seiton) -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs hover:border-figma-red hover:shadow-md transition-all flex flex-col justify-between">
                            <div>
                                <span class="font-heading font-black text-xs text-figma-red uppercase tracking-wider block mb-1">Seiton</span>
                                <h4 class="font-heading font-bold text-lg text-figma-dark mb-2">
                                    {{ $settings->get('facility_5r_rapi_title', 'Rapi') }}
                                </h4>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $settings->get('facility_5r_rapi_desc', 'Menata seluruh perkakas dan special service tools pada shadow board dengan label presisi.') }}
                                </p>
                            </div>
                        </div>

                        <!-- 3. Resik (Seiso) -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs hover:border-figma-red hover:shadow-md transition-all flex flex-col justify-between">
                            <div>
                                <span class="font-heading font-black text-xs text-figma-red uppercase tracking-wider block mb-1">Seiso</span>
                                <h4 class="font-heading font-bold text-lg text-figma-dark mb-2">
                                    {{ $settings->get('facility_5r_resik_title', 'Resik') }}
                                </h4>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $settings->get('facility_5r_resik_desc', 'Menjaga kebersihan lantai bengkel dan bike lift dari ceceran oli maupun sisa bensin secara disiplin.') }}
                                </p>
                            </div>
                        </div>

                        <!-- 4. Rawat (Seiketsu) -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs hover:border-figma-red hover:shadow-md transition-all flex flex-col justify-between">
                            <div>
                                <span class="font-heading font-black text-xs text-figma-red uppercase tracking-wider block mb-1">Seiketsu</span>
                                <h4 class="font-heading font-bold text-lg text-figma-dark mb-2">
                                    {{ $settings->get('facility_5r_rawat_title', 'Rawat') }}
                                </h4>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $settings->get('facility_5r_rawat_desc', 'Mempertahankan standar APD wearpack, safety shoes, dan kalibrasi alat ukur secara konsisten.') }}
                                </p>
                            </div>
                        </div>

                        <!-- 5. Rajin (Shitsuke) -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs hover:border-figma-red hover:shadow-md transition-all flex flex-col justify-between">
                            <div>
                                <span class="font-heading font-black text-xs text-figma-red uppercase tracking-wider block mb-1">Shitsuke</span>
                                <h4 class="font-heading font-bold text-lg text-figma-dark mb-2">
                                    {{ $settings->get('facility_5r_rajin_title', 'Rajin') }}
                                </h4>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $settings->get('facility_5r_rajin_desc', 'Membiasakan briefing kedisiplinan pagi, doa bersama, dan pembagian job sheet sebelum sesi praktik.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PART B: Standar Keselamatan Kerja & Lingkungan (K3LH) (3 Feature Cards) -->
                <div>
                    <h3 class="font-heading font-bold text-lg sm:text-xl text-figma-dark mb-6 flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full"></span>
                        Standar Keselamatan Kerja & Lingkungan Hidup (K3LH)
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- APD Card -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs">
                            <div class="w-10 h-10 rounded-sm bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h4 class="font-heading font-bold text-base text-figma-dark mb-2">Alat Pelindung Diri (APD) Wajib</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ $settings->get('facility_k3_apd', 'Wearpack Standar AHASS, Safety Shoes Ujung Besi, Kacamata Pelindung, dan Sarung Tangan Nitrile.') }}
                            </p>
                        </div>

                        <!-- Safety & APAR Card -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs">
                            <div class="w-10 h-10 rounded-sm bg-red-50 text-figma-red flex items-center justify-center mb-4">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h4 class="font-heading font-bold text-base text-figma-dark mb-2">Tanggap Darurat & Kebakaran</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ $settings->get('facility_k3_safety', 'Tabung Pemadam APAR Powder & CO2 di Setiap Sudut, Kotak P3K Lengkap, dan Jalur Evakuasi Aman.') }}
                            </p>
                        </div>

                        <!-- Limbah B3 Card -->
                        <div class="p-6 bg-white border border-gray-200 rounded-sm sm:rounded-none shadow-xs">
                            <div class="w-10 h-10 rounded-sm bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                            <h4 class="font-heading font-bold text-base text-figma-dark mb-2">Pengelolaan Limbah Bengkel B3</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ $settings->get('facility_k3_limbah', 'Drum Penampung Oli Bekas Bersegel, Pemilah Aki Bekas, dan Tempat Sampah Majun Terkontaminasi.') }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. BENGKEL PRAKTIK & PERAWATAN SEPEDA MOTOR (Substantial Dual Card) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-white overflow-hidden border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="bg-gray-50/80 border border-gray-200 p-8 sm:p-10 rounded-sm sm:rounded-none grid grid-cols-1 lg:grid-cols-12 gap-8 items-center shadow-xs">
                    
                    <div class="lg:col-span-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-figma-red block mb-2">
                            {{ $settings->get('facility_tefa_badge', 'BENGKEL PRAKTIK KEJURUAN') }}
                        </span>
                        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-figma-dark mb-3 leading-tight">
                            {{ $settings->get('facility_tefa_title', 'Bengkel Praktik TBSM SMKN 1 Bangsri') }}
                        </h2>
                        <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed mb-6">
                            {{ $settings->get('facility_tefa_subtitle', 'Fasilitas praktik perawatan berkala dan pemeliharaan sepeda motor dengan standar operasional prosedur (SOP) bengkel resmi AHASS.') }}
                        </p>
                        
                        <div class="space-y-3 font-sans text-sm text-gray-700 bg-white p-5 rounded-sm border border-gray-200">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div><span class="text-gray-500">Jam Layanan:</span> <strong class="text-figma-dark">{{ $settings->get('facility_tefa_hours', 'Senin – Jumat : 08.00 – 15.00 WIB') }}</strong></div>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div><span class="text-gray-500">Lokasi Bengkel:</span> <strong class="text-figma-dark">{{ $settings->get('facility_tefa_location', 'Gedung Bengkel Otomotif SMKN 1 Bangsri') }}</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6 lg:border-l lg:border-gray-200 lg:pl-8">
                        <h4 class="font-heading font-bold text-base sm:text-lg uppercase tracking-wider text-figma-dark block mb-4">
                            Keterampilan Servis & Perawatan:
                        </h4>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 font-sans text-sm text-gray-700 mb-6">
                            <div class="flex items-center gap-2.5 p-3 bg-white rounded-sm border border-gray-200">
                                <span class="w-2 h-2 bg-figma-red rounded-full shrink-0"></span>
                                <span>Tune Up & Scanner ECM</span>
                            </div>
                            <div class="flex items-center gap-2.5 p-3 bg-white rounded-sm border border-gray-200">
                                <span class="w-2 h-2 bg-figma-red rounded-full shrink-0"></span>
                                <span>Servis Transmisi CVT</span>
                            </div>
                            <div class="flex items-center gap-2.5 p-3 bg-white rounded-sm border border-gray-200">
                                <span class="w-2 h-2 bg-figma-red rounded-full shrink-0"></span>
                                <span>Ganti Oli Asli AHM Oil</span>
                            </div>
                            <div class="flex items-center gap-2.5 p-3 bg-white rounded-sm border border-gray-200">
                                <span class="w-2 h-2 bg-figma-red rounded-full shrink-0"></span>
                                <span>Servis Rem CBS/ABS</span>
                            </div>
                            <div class="flex items-center gap-2.5 p-3 bg-white rounded-sm border border-gray-200">
                                <span class="w-2 h-2 bg-figma-red rounded-full shrink-0"></span>
                                <span>Pembersihan Injektor</span>
                            </div>
                            <div class="flex items-center gap-2.5 p-3 bg-white rounded-sm border border-gray-200">
                                <span class="w-2 h-2 bg-figma-red rounded-full shrink-0"></span>
                                <span>Uji Emisi Gas Buang</span>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 italic bg-white p-3.5 rounded-sm border border-gray-200">
                            {{ $settings->get('facility_tefa_note', 'Seluruh kegiatan praktik siswa dilaksanakan di bawah supervisi instruktur mekanik bersertifikasi Astra Motor.') }}
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. CALL TO ACTION: AJAKAN KUNJUNGAN (Confident Closing Banner) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-16 sm:py-20 relative overflow-hidden text-center text-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8 relative z-10 reveal-on-scroll reveal-up">
                <span class="font-sans font-bold text-xs sm:text-sm text-figma-red uppercase tracking-wider block mb-3">
                    {{ $settings->get('facility_cta_badge', 'KUNJUNGAN & INFORMASI') }}
                </span>
                <h2 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-white leading-tight mb-4">
                    {{ $settings->get('facility_cta_title', 'Tertarik Melihat Fasilitas Bengkel Kami?') }}
                </h2>
                <p class="font-sans text-sm sm:text-base text-gray-300 leading-relaxed mb-8 max-w-xl mx-auto">
                    {{ $settings->get('facility_cta_desc', 'Kami menyambut kunjungan calon siswa, orang tua, dan mitra industri yang ingin melihat ekosistem pembelajaran otomotif Astra Honda di SMKN 1 Bangsri.') }}
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ url($settings->get('facility_cta_button_url', '/kontak')) }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-sm sm:rounded-[2px] bg-figma-red text-white hover:bg-red-700 font-sans font-bold text-sm sm:text-base shadow-lg hover:shadow-xl transition-all">
                        <span>{{ $settings->get('facility_cta_button_text', 'Hubungi Kami / Jadwalkan Kunjungan') }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('academic.programs') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-sm sm:rounded-[2px] bg-white/10 hover:bg-white/20 text-white font-sans font-bold text-sm sm:text-base border border-white/20 transition-all">
                        <span>Lihat Kurikulum</span>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- ============================================================================ -->
    <!-- MODAL DETAIL FASILITAS (Alpine Modal Dialog) -->
    <!-- ============================================================================ -->
    <x-modal name="facility-detail-modal" maxWidth="2xl">
        <template x-if="selectedFacility">
            <div class="p-6 sm:p-8 bg-white text-left font-sans">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <div>
                        <span class="text-xs font-bold text-figma-red uppercase tracking-wider block" x-text="selectedFacility.category"></span>
                        <h3 class="font-heading font-bold text-2xl text-figma-dark" x-text="selectedFacility.title"></h3>
                    </div>
                    <button type="button" @click="$dispatch('close-modal', 'facility-detail-modal')" class="text-gray-400 hover:text-gray-700 p-2 rounded-sm hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <template x-if="selectedFacility.image">
                    <div class="h-64 w-full rounded-sm overflow-hidden mb-6 bg-gray-100">
                        <img :src="selectedFacility.image" :alt="selectedFacility.title" class="w-full h-full object-cover">
                    </div>
                </template>

                <div class="space-y-4 mb-6">
                    <div>
                        <h4 class="font-heading font-bold text-sm text-figma-dark mb-1">Deskripsi Peralatan:</h4>
                        <p class="text-sm text-gray-600 leading-relaxed" x-text="selectedFacility.description"></p>
                    </div>

                    <template x-if="selectedFacility.specification">
                        <div class="p-4 bg-gray-50 rounded-sm border border-gray-200">
                            <h4 class="font-heading font-bold text-sm text-figma-dark mb-1">Spesifikasi Teknis:</h4>
                            <p class="text-xs sm:text-sm font-mono text-gray-800" x-text="selectedFacility.specification"></p>
                        </div>
                    </template>

                    <div class="flex items-center justify-between pt-2">
                        <span class="text-xs text-gray-500">Kondisi Alat / Pit:</span>
                        <span class="px-3 py-1 rounded-sm text-xs font-bold bg-emerald-100 text-emerald-800" x-text="selectedFacility.condition"></span>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'facility-detail-modal')" class="px-5 py-2.5 rounded-sm sm:rounded-[2px] bg-figma-dark text-white text-xs sm:text-sm font-semibold hover:bg-charcoal-800 transition-colors">
                        Tutup Jendela
                    </button>
                </div>
            </div>
        </template>
    </x-modal>

</x-layouts.app>
