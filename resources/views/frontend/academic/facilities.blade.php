<x-layouts.app title="Fasilitas Bengkel & Laboratorium Kejuruan" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Fasilitas & Sarana Praktik {{ $settings->get('site_short_name', 'TBSM') }} {{ $settings->get('school_name', 'SMK Negeri 1 Bangsri') }}",
      "description": "Fasilitas bengkel standar Astra Honda Motor, laboratorium injeksi PGM-FI, ruang overhaul mesin, dan sarana praktik Teaching Factory (TeFa) TBSM SMKN 1 Bangsri."
    }
    </script>
    @endpush

    <!-- Main Layout Wrapper (Synchronized with Homepage theme) -->
    <main class="flex flex-col items-center w-full overflow-hidden relative">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: FASILITAS BENGKEL STANDAR ASTRA HONDA (Compact & Cinematic) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-12 sm:py-16 lg:py-20 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Overlay -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                @if($settings->get('facility_hero_bg_image'))
                    <img src="{{ Storage::url($settings->get('facility_hero_bg_image')) }}" alt="Facility Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @else
                    <img src="{{ asset('storage/facilities/bengkel-tefa-praktik.png') }}" alt="Facility Background" class="w-full h-full object-cover mix-blend-overlay opacity-25 grayscale" loading="eager">
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
                        {{ $settings->get('facility_hero_badge', 'INFRASTRUKTUR & BENGKEL ASTRA HONDA') }}
                    </span>
                    <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Main Heading -->
                <h1 class="font-heading font-black text-[24px] sm:text-[36px] md:text-[48px] lg:text-[56px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-white uppercase mb-3 sm:mb-5 max-w-[900px] drop-shadow-md reveal-on-scroll reveal-up delay-100">
                    {!! nl2br(e($settings->get('facility_hero_title', 'Fasilitas Bengkel Standar Industri ' . $settings->get('site_short_name', 'TBSM')))) !!}
                </h1>

                <!-- Subtitle Description -->
                <p class="font-sans text-[13px] sm:text-[16px] md:text-[18px] text-gray-300 leading-[1.6] max-w-[780px] mx-auto mb-6 sm:mb-8 reveal-on-scroll reveal-up delay-200">
                    {{ $settings->get('facility_hero_subtitle', 'Dilengkapi bike lift hidrolik, simulator injeksi PGM-FI, engine overhaul stand, special service tools (SST) lengkap, dan budaya kerja 5R/K3LH untuk mencetak teknisi profesional berstandar AHASS.') }}
                </p>

                <!-- 4 Metrics Strip (Compact) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-y-4 gap-x-3 sm:gap-6 md:gap-8 divide-x-0 md:divide-x md:divide-charcoal-800 pt-6 border-t border-charcoal-800 w-full max-w-[960px] reveal-on-scroll reveal-up delay-300">
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('facility_stat_1_val', '70%') }}
                        </div>
                        <div class="w-4 h-[2px] bg-figma-red mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Praktikum & TeFa</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('facility_stat_2_val', '6 Pit') }}
                        </div>
                        <div class="w-4 h-[2px] bg-emerald-500 mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Stall Servis Hidrolik</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('facility_stat_3_val', '100%') }}
                        </div>
                        <div class="w-4 h-[2px] bg-amber-500 mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Standar Pabrikan</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('facility_stat_4_val', '5R & K3') }}
                        </div>
                        <div class="w-4 h-[2px] bg-figma-red mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Disiplin Industri</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. DIREKTORI FASILITAS & SARANA PRAKTIK (Compact Category Tabs & Dense Grid) -->
        <!-- ============================================================================ -->
        <section 
            class="w-full py-10 sm:py-14 lg:py-16 bg-white overflow-hidden border-b border-gray-100 relative"
            x-data="{ 
                activeCategory: 'all',
                selectedFacility: null,
                modalOpen: false,
                openModal(item) {
                    this.selectedFacility = item;
                    this.modalOpen = true;
                    document.body.classList.add('overflow-hidden');
                },
                closeModal() {
                    this.modalOpen = false;
                    document.body.classList.remove('overflow-hidden');
                }
            }"
        >
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header & Category Filter Bar -->
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 mb-6 sm:mb-8 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-2">
                            <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                                Sarana Praktik & Lab
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-[22px] sm:text-[30px] md:text-[36px] text-figma-dark tracking-tight">
                            Ruang Bengkel & Laboratorium TBSM
                        </h2>
                    </div>

                    <!-- Category Pills -->
                    <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar py-0.5">
                        <button 
                            @click="activeCategory = 'all'"
                            :class="activeCategory === 'all' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-3.5 py-1.5 text-xs font-sans font-bold rounded-sm shrink-0 cursor-pointer transition-all"
                        >
                            Semua Sarana ({{ $facilities->count() }})
                        </button>

                        @php
                            $categories = [
                                'tefa_workshop' => 'Bengkel TeFa & Pit',
                                'electrical_lab' => 'Lab Injeksi & Kelistrikan',
                                'engine_lab' => 'Ruang Overhaul Mesin',
                                'theory_room' => 'Ruang Teori & Multimedia',
                                'tool_storage' => 'Gudang SST & Parts',
                            ];
                        @endphp

                        @foreach($categories as $catKey => $catName)
                            @php $count = $facilities->where('category', $catKey)->count(); @endphp
                            @if($count > 0)
                                <button 
                                    @click="activeCategory = '{{ $catKey }}'"
                                    :class="activeCategory === '{{ $catKey }}' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                    class="px-3 py-1.5 text-xs font-sans font-bold rounded-sm shrink-0 cursor-pointer transition-all"
                                >
                                    {{ $catName }} ({{ $count }})
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Facilities Grid (Dense & Scannable) -->
                @if($facilities && $facilities->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach($facilities as $facility)
                            @php
                                $facilityJson = json_encode([
                                    'id' => $facility->id,
                                    'name' => $facility->name,
                                    'category_label' => $facility->category_label,
                                    'condition_label' => $facility->condition_label ?? 'Sangat Baik',
                                    'quantity' => $facility->quantity,
                                    'capacity' => $facility->capacity,
                                    'safety_standards' => $facility->safety_standards,
                                    'description' => strip_tags($facility->description),
                                    'specifications' => $facility->specifications_list,
                                    'photo_url' => $facility->photo ? Storage::url($facility->photo) : null,
                                ]);
                            @endphp

                            <div 
                                x-show="activeCategory === 'all' || activeCategory === '{{ $facility->category }}'"
                                class="bg-white border border-gray-200 rounded-sm overflow-hidden flex flex-col justify-between hover:border-figma-red hover:shadow-lg transition-all group"
                            >
                                <div>
                                    <!-- Photo Ratio 16/9 -->
                                    <div class="aspect-[16/10] w-full bg-gray-100 overflow-hidden relative">
                                        @if($facility->photo && Storage::disk('public')->exists($facility->photo))
                                            <img src="{{ Storage::url($facility->photo) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400 font-sans text-xs">
                                                Foto Bengkel TBSM
                                            </div>
                                        @endif

                                        <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5">
                                            <span class="px-2 py-0.5 bg-figma-dark/90 backdrop-blur-xs text-white text-[10px] font-bold uppercase rounded">
                                                {{ $facility->category_label }}
                                            </span>
                                            @if($facility->is_featured)
                                                <span class="px-2 py-0.5 bg-figma-red text-white text-[10px] font-bold uppercase rounded">
                                                    Unggulan
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="p-4 pb-2">
                                        <h3 class="font-heading font-bold text-base text-figma-dark group-hover:text-figma-red transition-colors line-clamp-1 mb-1.5">
                                            {{ $facility->name }}
                                        </h3>
                                        <p class="font-sans text-xs text-gray-500 line-clamp-2 leading-relaxed mb-3">
                                            {{ strip_tags($facility->description) }}
                                        </p>

                                        <div class="flex items-center justify-between text-[11px] font-sans text-gray-600 pt-2 border-t border-gray-100">
                                            <span>Kapasitas: <strong class="text-figma-dark">{{ $facility->capacity ?: ($facility->quantity ? $facility->quantity . ' Unit' : 'Standar Pit') }}</strong></span>
                                            <span class="text-emerald-700 font-semibold">{{ $facility->condition_label ?? 'Kondisi Prima' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 pt-2">
                                    <button 
                                        @click='openModal({!! $facilityJson !!})'
                                        type="button" 
                                        class="w-full py-2 bg-gray-50 hover:bg-figma-dark hover:text-white text-figma-dark font-sans font-bold text-xs uppercase tracking-wide border border-gray-200 transition-colors rounded-sm cursor-pointer"
                                    >
                                        Spesifikasi Lengkap
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Modal Detail Fasilitas -->
                <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog">
                    <div x-show="modalOpen" @click="closeModal()" class="fixed inset-0 bg-figma-dark/80 backdrop-blur-xs"></div>
                    <div x-show="modalOpen" class="relative w-full max-w-lg bg-white shadow-2xl p-6 rounded-sm z-10 border border-gray-200 max-h-[90vh] overflow-y-auto">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100 mb-4">
                            <div>
                                <span class="px-2 py-0.5 bg-figma-red text-white text-[10px] font-bold uppercase rounded-sm" x-text="selectedFacility?.category_label"></span>
                                <h3 class="font-heading font-black text-lg text-figma-dark mt-1" x-text="selectedFacility?.name"></h3>
                            </div>
                            <button @click="closeModal()" class="w-7 h-7 rounded-full bg-gray-100 text-gray-500 hover:text-figma-dark flex items-center justify-center cursor-pointer">✕</button>
                        </div>
                        <div class="space-y-3 text-xs font-sans text-gray-600 mb-4">
                            <p x-text="selectedFacility?.description"></p>
                            <div class="grid grid-cols-2 gap-2 p-3 bg-gray-50 rounded border border-gray-100">
                                <div><span class="text-gray-400 block text-[10px]">Kapasitas:</span><strong class="text-figma-dark" x-text="selectedFacility?.capacity || '-'"></strong></div>
                                <div><span class="text-gray-400 block text-[10px]">Kondisi Alat:</span><strong class="text-emerald-700" x-text="selectedFacility?.condition_label || 'Sangat Baik'"></strong></div>
                            </div>
                            <template x-if="selectedFacility?.safety_standards">
                                <div>
                                    <span class="font-bold text-figma-dark block text-[11px] mb-1">Standar K3LH:</span>
                                    <p class="text-xs text-gray-600 p-2.5 bg-amber-50/60 border border-amber-200/60 rounded" x-text="selectedFacility?.safety_standards"></p>
                                </div>
                            </template>
                            <template x-if="selectedFacility?.specifications && selectedFacility.specifications.length > 0">
                                <div>
                                    <span class="font-bold text-figma-dark block text-[11px] mb-1">Rincian Peralatan / SST:</span>
                                    <div class="space-y-1">
                                        <template x-for="(spec, idx) in selectedFacility.specifications" :key="idx">
                                            <div class="p-1.5 bg-gray-50 text-[11px] text-gray-700 rounded flex items-center gap-1.5">
                                                <span class="w-1 h-1 bg-figma-red rounded-full"></span>
                                                <span x-text="spec"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="flex justify-end pt-3 border-t border-gray-100">
                            <button @click="closeModal()" type="button" class="px-4 py-2 bg-figma-dark text-white text-xs font-bold uppercase rounded-sm cursor-pointer">Tutup</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. BUDAYA KERJA 5R & K3LH (Compact Bento Strip) -->
        <!-- ============================================================================ -->
        <section class="w-full py-10 sm:py-14 bg-gray-50 overflow-hidden border-b border-gray-200 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Left: 5R Industri Jepang (7 Cols) -->
                    <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                        <div class="flex items-center gap-2 sm:gap-3 mb-2">
                            <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                                {{ $settings->get('facility_5r_badge', 'DISIPLIN INDUSTRI JEPANG') }}
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-[20px] sm:text-[28px] text-figma-dark tracking-tight mb-3">
                            {{ $settings->get('facility_5r_title', 'Penerapan Budaya Kerja 5R di Bengkel') }}
                        </h2>
                        <p class="font-sans text-xs sm:text-sm text-gray-600 mb-5">
                            {{ $settings->get('facility_5r_desc', 'Sebelum dan sesudah praktik, seluruh siswa membiasakan 5R (Ringkas, Rapi, Resik, Rawat, Rajin) agar area kerja selalu aman dan efisien.') }}
                        </p>

                        <!-- 5R Strip -->
                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-2.5">
                            <div class="p-3 bg-white border border-gray-200 rounded-sm">
                                <span class="font-heading font-bold text-xs text-figma-red block mb-0.5">Seiri</span>
                                <strong class="text-xs text-figma-dark block mb-1">{{ $settings->get('facility_5r_ringkas_title', 'Ringkas') }}</strong>
                                <p class="text-[10px] text-gray-500 leading-snug">{{ $settings->get('facility_5r_ringkas_desc', 'Pisahkan alat kerja dan buang barang tak terpakai.') }}</p>
                            </div>
                            <div class="p-3 bg-white border border-gray-200 rounded-sm">
                                <span class="font-heading font-bold text-xs text-figma-red block mb-0.5">Seiton</span>
                                <strong class="text-xs text-figma-dark block mb-1">{{ $settings->get('facility_5r_rapi_title', 'Rapi') }}</strong>
                                <p class="text-[10px] text-gray-500 leading-snug">{{ $settings->get('facility_5r_rapi_desc', 'Tata tools pada shadow board berlabel presisi.') }}</p>
                            </div>
                            <div class="p-3 bg-white border border-gray-200 rounded-sm">
                                <span class="font-heading font-bold text-xs text-figma-red block mb-0.5">Seiso</span>
                                <strong class="text-xs text-figma-dark block mb-1">{{ $settings->get('facility_5r_resik_title', 'Resik') }}</strong>
                                <p class="text-[10px] text-gray-500 leading-snug">{{ $settings->get('facility_5r_resik_desc', 'Bersihkan ceceran oli dan debu dari lantai pit.') }}</p>
                            </div>
                            <div class="p-3 bg-white border border-gray-200 rounded-sm">
                                <span class="font-heading font-bold text-xs text-figma-red block mb-0.5">Seiketsu</span>
                                <strong class="text-xs text-figma-dark block mb-1">{{ $settings->get('facility_5r_rawat_title', 'Rawat') }}</strong>
                                <p class="text-[10px] text-gray-500 leading-snug">{{ $settings->get('facility_5r_rawat_desc', 'Pertahankan standar APD dan kalibrasi alat ukur.') }}</p>
                            </div>
                            <div class="p-3 bg-white border border-gray-200 rounded-sm">
                                <span class="font-heading font-bold text-xs text-figma-red block mb-0.5">Shitsuke</span>
                                <strong class="text-xs text-figma-dark block mb-1">{{ $settings->get('facility_5r_rajin_title', 'Rajin') }}</strong>
                                <p class="text-[10px] text-gray-500 leading-snug">{{ $settings->get('facility_5r_rajin_desc', 'Briefing disiplin pagi, job sheet, dan doa kerja.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Standar Keselamatan K3LH (5 Cols) -->
                    <div class="lg:col-span-5 reveal-on-scroll reveal-up delay-100">
                        <div class="bg-white border border-gray-200 p-5 rounded-sm shadow-sm">
                            <h3 class="font-heading font-bold text-base text-figma-dark mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                Standar Keselamatan Kerja & Lingkungan (K3LH)
                            </h3>
                            <ul class="space-y-3 font-sans text-xs text-gray-600">
                                <li class="flex items-start gap-2.5">
                                    <span class="w-5 h-5 bg-gray-100 text-figma-dark rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">1</span>
                                    <div>
                                        <strong class="text-figma-dark block">Alat Pelindung Diri (APD):</strong>
                                        <span class="text-gray-500">{{ $settings->get('facility_k3_apd', 'Wearpack AHASS, Safety Shoes, Kacamata Pelindung, Sarung Tangan Nitrile.') }}</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="w-5 h-5 bg-gray-100 text-figma-dark rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">2</span>
                                    <div>
                                        <strong class="text-figma-dark block">Tanggap Darurat & Kebakaran:</strong>
                                        <span class="text-gray-500">{{ $settings->get('facility_k3_safety', 'APAR Powder & CO2 di Setiap Sudut, Kotak P3K, Jalur Evakuasi Aman.') }}</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="w-5 h-5 bg-gray-100 text-figma-dark rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">3</span>
                                    <div>
                                        <strong class="text-figma-dark block">Pengelolaan Limbah B3:</strong>
                                        <span class="text-gray-500">{{ $settings->get('facility_k3_limbah', 'Drum Oli Bekas Bersegel, Pemilah Aki Bekas & Kain Majun Terkontaminasi.') }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. UNIT PRODUKSI TEACHING FACTORY (Compact 2-Col Card) -->
        <!-- ============================================================================ -->
        <section class="w-full py-10 sm:py-14 bg-white overflow-hidden border-b border-gray-100 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="bg-gray-50 border border-gray-200 p-6 sm:p-8 rounded-sm grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                    
                    <div class="lg:col-span-6">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-figma-red block mb-1">
                            {{ $settings->get('facility_tefa_badge', 'UNIT PRODUKSI & TEFA') }}
                        </span>
                        <h2 class="font-heading font-extrabold text-[20px] sm:text-[26px] text-figma-dark mb-2">
                            {{ $settings->get('facility_tefa_title', 'Teaching Factory (TeFa) TBSM SMKN 1 Bangsri') }}
                        </h2>
                        <p class="font-sans text-xs sm:text-sm text-gray-600 leading-relaxed mb-4">
                            {{ $settings->get('facility_tefa_subtitle', 'Layanan servis berkala dan perawatan sepeda motor untuk masyarakat dengan SOP berstandar bengkel resmi AHASS.') }}
                        </p>
                        <div class="space-y-1.5 font-sans text-xs text-gray-600">
                            <div><span>Jam Layanan:</span> <strong class="text-figma-dark">{{ $settings->get('facility_tefa_hours', 'Senin – Jumat : 08.00 – 15.00 WIB') }}</strong></div>
                            <div><span>Lokasi:</span> <strong class="text-figma-dark">{{ $settings->get('facility_tefa_location', 'Gedung Bengkel Otomotif SMKN 1 Bangsri') }}</strong></div>
                        </div>
                    </div>

                    <div class="lg:col-span-6 lg:border-l lg:border-gray-200 lg:pl-6">
                        <span class="font-heading font-bold text-xs uppercase tracking-wider text-figma-dark block mb-2">
                            Layanan Servis Unggulan:
                        </span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 font-sans text-xs text-gray-700">
                            <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-figma-red rounded-full"></span><span>Tune Up & Reset Scanner ECM</span></div>
                            <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-figma-red rounded-full"></span><span>Servis Transmisi Otomatis CVT</span></div>
                            <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-figma-red rounded-full"></span><span>Ganti Oli Asli Astra Honda Oil</span></div>
                            <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-figma-red rounded-full"></span><span>Servis Rem Hidrolik CBS/ABS</span></div>
                            <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-figma-red rounded-full"></span><span>Pembersihan Injektor Ultrasonik</span></div>
                            <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-figma-red rounded-full"></span><span>Uji Emisi Gas Buang Motor</span></div>
                        </div>
                        <p class="text-[11px] text-gray-400 italic mt-3">
                            {{ $settings->get('facility_tefa_note', 'Dikerjakan siswa berprestasi di bawah bimbingan instruktur bersertifikasi Astra Motor.') }}
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. CALL TO ACTION (Compact) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-12 sm:py-14 relative overflow-hidden text-center text-white">
            <div class="max-w-[760px] mx-auto px-4 sm:px-8 relative z-10 reveal-on-scroll reveal-up">
                <span class="font-sans font-bold text-[10px] sm:text-[12px] text-figma-red uppercase tracking-wider block mb-1.5">
                    {{ $settings->get('facility_cta_badge', 'KUNJUNGAN & INFORMASI') }}
                </span>
                <h2 class="font-heading font-black text-[20px] sm:text-[28px] md:text-[34px] text-white leading-tight mb-2.5">
                    {{ $settings->get('facility_cta_title', 'Tertarik Melihat Fasilitas Bengkel Kami?') }}
                </h2>
                <p class="font-sans text-xs sm:text-sm text-gray-300 max-w-md mx-auto mb-5 leading-relaxed">
                    {{ $settings->get('facility_cta_desc', 'Kami menyambut kunjungan calon siswa, orang tua, dan mitra industri yang ingin melihat ekosistem pembelajaran otomotif Astra Honda di SMKN 1 Bangsri.') }}
                </p>
                <a 
                    href="{{ url($settings->get('facility_cta_button_url', '/kontak')) }}" 
                    class="px-6 py-2.5 bg-figma-red hover:bg-figma-dark-red text-white font-sans font-bold text-xs uppercase tracking-wide transition-colors rounded-sm inline-flex items-center gap-2 shadow-lg shadow-figma-red/20"
                >
                    <span>{{ $settings->get('facility_cta_button_text', 'Hubungi Kami / Kunjungan') }}</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </section>

    </main>

    <!-- Floating Scroll To Top Button -->
    <x-frontend.home.scroll-to-top />

</x-layouts.app>
