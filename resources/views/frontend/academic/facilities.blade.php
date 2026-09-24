<x-layouts.app title="Fasilitas Bengkel & Laboratorium Kejuruan">
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

    <!-- ============================================================================ -->
    <!-- 01. HERO SECTION & STATISTIK METRIK -->
    <!-- ============================================================================ -->
    <section class="relative bg-charcoal-950 text-white overflow-hidden pt-12 pb-16 lg:pt-16 lg:pb-24 border-b border-charcoal-800">
        <!-- Background Image & Atmospheric Lighting -->
        @if($settings->get('facility_hero_bg_image'))
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ Storage::url($settings->get('facility_hero_bg_image')) }}')"></div>
        @elseif($settings->get('header_academic_facilities_image'))
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ Storage::url($settings->get('header_academic_facilities_image')) }}')"></div>
        @else
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-20 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ asset('storage/facilities/bengkel-tefa-praktik.png') }}')"></div>
        @endif
        
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-charcoal-950/80 via-charcoal-950/90 to-charcoal-950 pointer-events-none"></div>

        <!-- Technical Wireframe Grid Accent -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-10" style="background-image: linear-gradient(to right, #ffffff 1px, transparent 1px), linear-gradient(to bottom, #ffffff 1px, transparent 1px); background-size: 3rem 3rem;"></div>
        
        <!-- Glowing Red Accent Blur -->
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-primary-600/15 rounded-full blur-[140px] pointer-events-none -translate-y-1/2"></div>

        <x-frontend.layout.container class="relative z-10">
            <div class="max-w-4xl mx-auto text-center flex flex-col items-center">
                <!-- Eyebrow Pill Badge -->
                <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-[11px] font-black uppercase tracking-[0.2em] text-primary-400 mb-6 shadow-sm reveal-on-scroll reveal-up">
                    <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                    {{ $settings->get('facility_hero_badge', 'INFRASTRUKTUR & BENGKEL ASTRA HONDA') }}
                </div>
                
                <!-- Main H1 Title -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.08] mb-6 uppercase reveal-on-scroll reveal-up delay-100">
                    {!! nl2br(e($settings->get('facility_hero_title', 'Fasilitas Bengkel Standar Industri ' . $settings->get('site_short_name', 'TBSM')))) !!}
                </h1>
                
                <!-- Subtitle Description -->
                <p class="text-base sm:text-lg lg:text-xl text-charcoal-300 font-normal leading-relaxed max-w-3xl mb-10 reveal-on-scroll reveal-up delay-200">
                    {{ $settings->get('facility_hero_subtitle', 'Dilengkapi bike lift hidrolik, simulator injeksi PGM-FI, engine overhaul stand berputar, special service tools (SST) lengkap, dan budaya kerja 5R/K3LH untuk mencetak teknisi profesional berstandar AHASS.') }}
                </p>

                <!-- 4 Core Metrics Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 w-full max-w-4xl reveal-on-scroll reveal-up delay-300">
                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-primary-400 mb-1">
                            {{ $settings->get('facility_stat_1_val', '70%') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('facility_stat_1_label', 'Proporsi Praktikum & TeFa') }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-emerald-400 mb-1">
                            {{ $settings->get('facility_stat_2_val', '6 Pit') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('facility_stat_2_label', 'Stall Servis Hidrolik AHASS') }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-amber-400 mb-1">
                            {{ $settings->get('facility_stat_3_val', '100%') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('facility_stat_3_label', 'Peralatan Standar Pabrikan') }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-sky-400 mb-1">
                            {{ $settings->get('facility_stat_4_val', '5R & K3') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('facility_stat_4_label', 'Budaya Disiplin Industri') }}
                        </span>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 02. INTERACTIVE FACILITIES DIRECTORY WITH CATEGORY FILTER -->
    <!-- ============================================================================ -->
    <section 
        class="py-16 lg:py-24 bg-charcoal-50"
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
        <x-frontend.layout.container>
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-primary-100 text-primary-700 text-xs font-bold tracking-wider uppercase mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        SARANA PRAKTIK & LABORATORIUM
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                        Daftar Fasilitas Bengkel TBSM
                    </h2>
                    <p class="text-charcoal-600 text-sm sm:text-base mt-2 max-w-2xl">
                        Seluruh ruangan dan sarana dirancang merepresentasikan lingkungan kerja riil di jaringan Astra Honda Authorized Service Station (AHASS).
                    </p>
                </div>

                <!-- Total Count Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-white border border-charcoal-200 text-xs font-bold text-charcoal-700 shadow-2xs self-start md:self-auto">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <span>Total: <strong>{{ $facilities->count() }}</strong> Area Fasilitas Terintegrasi</span>
                </div>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex items-center gap-2 pb-4 overflow-x-auto no-scrollbar mb-10 border-b border-charcoal-200">
                <button 
                    @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' 
                        ? 'bg-charcoal-900 text-white shadow-sm border-charcoal-900' 
                        : 'bg-white text-charcoal-700 hover:bg-charcoal-100 border-charcoal-200'"
                    class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold border transition-all shrink-0 cursor-pointer"
                >
                    Semua Sarana ({{ $facilities->count() }})
                </button>

                @php
                    $categories = [
                        'tefa_workshop' => 'Bengkel TeFa & Pit Servis',
                        'electrical_lab' => 'Lab Kelistrikan & Injeksi',
                        'engine_lab' => 'Ruang Overhaul Mesin',
                        'theory_room' => 'Ruang Teori & Multimedia',
                        'tool_storage' => 'Gudang SST & Spare Parts',
                    ];
                @endphp

                @foreach($categories as $catKey => $catName)
                    @php
                        $count = $facilities->where('category', $catKey)->count();
                    @endphp
                    @if($count > 0)
                        <button 
                            @click="activeCategory = '{{ $catKey }}'"
                            :class="activeCategory === '{{ $catKey }}' 
                                ? 'bg-charcoal-900 text-white shadow-sm border-charcoal-900' 
                                : 'bg-white text-charcoal-700 hover:bg-charcoal-100 border-charcoal-200'"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold border transition-all shrink-0 cursor-pointer flex items-center gap-1.5"
                        >
                            <span>{{ $catName }}</span>
                            <span class="text-[11px] opacity-75 px-1.5 py-0.5 rounded-md bg-black/10">({{ $count }})</span>
                        </button>
                    @endif
                @endforeach
            </div>

            <!-- Facilities Grid -->
            @if($facilities && $facilities->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach($facilities as $index => $facility)
                        @php
                            $conditionLabel = match($facility->condition) {
                                'good' => 'Kondisi Prima',
                                'fair' => 'Perawatan Berkala',
                                'poor'  => 'Dalam Pemeliharaan',
                                default => 'Siap Pakai'
                            };
                            $conditionColor = match($facility->condition) {
                                'good' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'fair' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'poor'  => 'bg-rose-50 text-rose-700 border-rose-200',
                                default => 'bg-slate-50 text-slate-700 border-slate-200'
                            };

                            $specs = $facility->specifications_list;
                            $specsDisplay = array_slice($specs, 0, 3);
                            $moreSpecsCount = count($specs) - count($specsDisplay);

                            $facilityJson = json_encode([
                                'id' => $facility->id,
                                'name' => $facility->name,
                                'category_label' => $facility->category_label,
                                'condition_label' => $conditionLabel,
                                'condition_color' => $conditionColor,
                                'quantity' => $facility->quantity,
                                'capacity' => $facility->capacity,
                                'safety_standards' => $facility->safety_standards,
                                'description' => $facility->description,
                                'specs' => $specs,
                                'photo_url' => $facility->photo ? Storage::url($facility->photo) : null,
                            ]);
                        @endphp

                        <div 
                            x-show="activeCategory === 'all' || activeCategory === '{{ $facility->category }}'"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            class="flex flex-col bg-white rounded-3xl border border-charcoal-200 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 hover:border-primary-500 group"
                        >
                            <!-- Facility Image Container -->
                            <div class="relative w-full h-56 sm:h-64 overflow-hidden bg-charcoal-100">
                                @if($facility->photo && Storage::disk('public')->exists($facility->photo))
                                    <img 
                                        src="{{ Storage::url($facility->photo) }}" 
                                        alt="{{ $facility->name }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-charcoal-100 text-charcoal-400 gap-2">
                                        <svg class="w-12 h-12 text-charcoal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        <span class="text-xs font-semibold uppercase tracking-wider text-charcoal-400">Dokumentasi Bengkel TBSM</span>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                <div class="absolute top-3 left-3 z-10">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-charcoal-950/80 backdrop-blur-md text-white border border-white/20 shadow-xs">
                                        {{ $facility->category_label }}
                                    </span>
                                </div>

                                <!-- Condition Badge -->
                                <div class="absolute top-3 right-3 z-10 flex items-center gap-1.5">
                                    @if($facility->is_featured)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-white shadow-xs">
                                            Unggulan
                                        </span>
                                    @endif
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold border backdrop-blur-sm bg-white/95 {{ $conditionColor }}">
                                        {{ $conditionLabel }}
                                    </span>
                                </div>

                                <!-- Bottom Overlay with Capacity & Quantity -->
                                <div class="absolute bottom-0 inset-x-0 p-3 bg-gradient-to-t from-charcoal-950/80 to-transparent flex items-center justify-between text-white text-xs font-medium">
                                    @if($facility->capacity)
                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            {{ $facility->capacity }}
                                        </span>
                                    @endif
                                    @if($facility->quantity)
                                        <span class="ml-auto font-bold px-2 py-0.5 rounded bg-white/20 backdrop-blur-xs">
                                            {{ $facility->quantity }} Unit
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Facility Details Card Content -->
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <div>
                                    <!-- Title -->
                                    <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors leading-snug mb-3">
                                        {{ $facility->name }}
                                    </h3>

                                    <!-- Description Excerpt -->
                                    <div class="text-charcoal-600 text-xs sm:text-sm leading-relaxed mb-5 line-clamp-3">
                                        {!! \App\Support\HtmlSanitizer::clean($facility->description) !!}
                                    </div>

                                    <!-- Specifications Bullet Preview -->
                                    @if(count($specsDisplay) > 0)
                                        <div class="pt-4 border-t border-charcoal-100 mb-5">
                                            <span class="block text-[11px] font-bold uppercase tracking-wider text-charcoal-400 mb-2">
                                                Peralatan & Fitur Utama:
                                            </span>
                                            <ul class="space-y-1.5">
                                                @foreach($specsDisplay as $spec)
                                                    <li class="flex items-start gap-2 text-xs text-charcoal-700 font-medium">
                                                        <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        <span class="line-clamp-1">{{ $spec }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if($moreSpecsCount > 0)
                                                <span class="inline-block mt-2 text-[11px] font-bold text-primary-600">
                                                    + {{ $moreSpecsCount }} spesifikasi teknis lainnya
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <!-- Action Button: Open Detail Modal -->
                                <button 
                                    @click='openModal({!! $facilityJson !!})'
                                    type="button"
                                    class="w-full mt-2 py-2.5 px-4 rounded-xl bg-charcoal-100 hover:bg-primary-600 text-charcoal-800 hover:text-white font-bold text-xs sm:text-sm flex items-center justify-center gap-2 transition-all cursor-pointer group-hover:bg-primary-50 group-hover:text-primary-700"
                                >
                                    <span>Lihat Spesifikasi & Detail</span>
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="w-full py-16 px-6 bg-white border border-charcoal-200 rounded-3xl text-center">
                    <svg class="w-16 h-16 text-charcoal-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <h3 class="font-heading font-bold text-xl text-charcoal-800 mb-2">Belum Ada Fasilitas yang Ditambahkan</h3>
                    <p class="font-sans text-sm text-charcoal-500 max-w-md mx-auto">Informasi sarana dan prasarana bengkel dapat diatur dan diperbarui melalui panel administrasi.</p>
                </div>
            @endif

            <!-- ==================================================================== -->
            <!-- FACILITY DETAIL MODAL POPUP -->
            <!-- ==================================================================== -->
            <div 
                x-show="modalOpen" 
                x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
                role="dialog"
                aria-modal="true"
            >
                <!-- Backdrop Blur -->
                <div 
                    x-show="modalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="closeModal()"
                    class="fixed inset-0 bg-charcoal-950/80 backdrop-blur-sm"
                ></div>

                <!-- Modal Window Container -->
                <div 
                    x-show="modalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-3xl max-h-[90vh] bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col z-10 border border-charcoal-200"
                >
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between px-6 py-4 border-b border-charcoal-100 bg-charcoal-50">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-charcoal-900 text-white" x-text="selectedFacility?.category_label"></span>
                            <span class="text-xs font-semibold text-charcoal-500" x-text="selectedFacility?.quantity ? selectedFacility.quantity + ' Unit' : ''"></span>
                        </div>
                        <button 
                            @click="closeModal()"
                            class="w-8 h-8 rounded-full bg-white hover:bg-charcoal-200 text-charcoal-500 hover:text-charcoal-900 flex items-center justify-center transition-colors cursor-pointer border border-charcoal-200"
                        >
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body (Scrollable) -->
                    <div class="p-6 overflow-y-auto space-y-6">
                        <!-- Photo Banner -->
                        <template x-if="selectedFacility?.photo_url">
                            <div class="w-full h-64 sm:h-80 rounded-2xl overflow-hidden bg-charcoal-100 border border-charcoal-200">
                                <img :src="selectedFacility.photo_url" :alt="selectedFacility.name" class="w-full h-full object-cover">
                            </div>
                        </template>

                        <!-- Title and Key Metrics -->
                        <div>
                            <h3 class="text-2xl font-black text-charcoal-900" x-text="selectedFacility?.name"></h3>
                            <div class="flex flex-wrap items-center gap-2 mt-3">
                                <template x-if="selectedFacility?.capacity">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-primary-50 text-primary-700 text-xs font-bold border border-primary-200">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span x-text="'Kapasitas: ' + selectedFacility.capacity"></span>
                                    </span>
                                </template>
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold border" :class="selectedFacility?.condition_color" x-text="'Kondisi: ' + selectedFacility?.condition_label"></span>
                            </div>
                        </div>

                        <!-- Full Description -->
                        <div class="prose max-w-none text-charcoal-700 text-sm leading-relaxed" x-html="selectedFacility?.description"></div>

                        <!-- Specifications Checklist -->
                        <template x-if="selectedFacility?.specs && selectedFacility.specs.length > 0">
                            <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200">
                                <h4 class="text-xs font-black uppercase tracking-wider text-charcoal-900 mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    Spesifikasi Lengkap & Peralatan Praktik
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                    <template x-for="(item, idx) in selectedFacility.specs" :key="idx">
                                        <div class="flex items-start gap-2 p-2 rounded-lg bg-white border border-charcoal-100 text-xs font-medium text-charcoal-800">
                                            <svg class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span x-text="item"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <!-- Safety & K3LH Standards -->
                        <template x-if="selectedFacility?.safety_standards">
                            <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200 text-xs text-amber-900 flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <div>
                                    <strong class="font-bold block mb-1">Standar Keselamatan Kerja (K3LH) Wajib:</strong>
                                    <span x-text="selectedFacility.safety_standards"></span>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Modal Footer -->
                    <div class="p-4 border-t border-charcoal-100 bg-charcoal-50 flex justify-end">
                        <button 
                            @click="closeModal()" 
                            type="button"
                            class="px-5 py-2.5 rounded-xl bg-charcoal-900 text-white font-bold text-xs hover:bg-charcoal-800 transition-colors cursor-pointer"
                        >
                            Tutup Jendela
                        </button>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 03. BUDAYA KERJA INDUSTRI 5R & PROTOKOL K3LH -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-white border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="max-w-3xl mb-12">
                <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-rose-100 text-rose-700 text-xs font-bold tracking-wider uppercase mb-3">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    {{ $settings->get('facility_5r_badge', 'DISIPLIN KERJA JEPANG & K3LH') }}
                </div>
                <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                    {{ $settings->get('facility_5r_title', 'Penerapan Budaya Kerja Industri 5R & Standar K3LH') }}
                </h2>
                <p class="text-charcoal-600 text-sm sm:text-base mt-2">
                    {{ $settings->get('facility_5r_desc', 'Sebelum dan sesudah melaksanakan kegiatan di bengkel otomotif, seluruh siswa dibiasakan menerapkan 5R (Ringkas, Rapi, Resik, Rawat, Rajin) serta standar Keselamatan dan Kesehatan Kerja Lingkungan Hidup (K3LH).') }}
                </p>
            </div>

            <!-- 5R Cards Bento Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-12">
                <!-- Seiri / Ringkas -->
                <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200 hover:border-rose-400 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 font-black text-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        01
                    </div>
                    <h3 class="text-base font-black text-charcoal-900 mb-2">
                        {{ $settings->get('facility_5r_ringkas_title', 'Ringkas (Seiri)') }}
                    </h3>
                    <p class="text-xs text-charcoal-600 leading-relaxed">
                        {{ $settings->get('facility_5r_ringkas_desc', 'Memisahkan alat kerja, material sisa, dan suku cadang yang diperlukan dengan yang tidak terpakai sehingga area pit servis selalu efisien.') }}
                    </p>
                </div>

                <!-- Seiton / Rapi -->
                <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200 hover:border-amber-400 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 font-black text-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        02
                    </div>
                    <h3 class="text-base font-black text-charcoal-900 mb-2">
                        {{ $settings->get('facility_5r_rapi_title', 'Rapi (Seiton)') }}
                    </h3>
                    <p class="text-xs text-charcoal-600 leading-relaxed">
                        {{ $settings->get('facility_5r_rapi_desc', 'Menata seluruh perkakas tangan (hand tools) dan SST pada shadow board serta toolbox dengan penandaan posisi yang presisi.') }}
                    </p>
                </div>

                <!-- Seiso / Resik -->
                <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200 hover:border-emerald-400 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 font-black text-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        03
                    </div>
                    <h3 class="text-base font-black text-charcoal-900 mb-2">
                        {{ $settings->get('facility_5r_resik_title', 'Resik (Seiso)') }}
                    </h3>
                    <p class="text-xs text-charcoal-600 leading-relaxed">
                        {{ $settings->get('facility_5r_resik_desc', 'Menjaga kebersihan lantai bengkel dan bike lift dari ceceran oli maupun sisa bensin guna mencegah bahaya kerja tergelincir.') }}
                    </p>
                </div>

                <!-- Seiketsu / Rawat -->
                <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200 hover:border-sky-400 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 font-black text-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        04
                    </div>
                    <h3 class="text-base font-black text-charcoal-900 mb-2">
                        {{ $settings->get('facility_5r_rawat_title', 'Rawat (Seiketsu)') }}
                    </h3>
                    <p class="text-xs text-charcoal-600 leading-relaxed">
                        {{ $settings->get('facility_5r_rawat_desc', 'Mempertahankan standar kebersihan, kelengkapan Alat Pelindung Diri (APD wearpack), dan kalibrasi alat ukur secara konsisten.') }}
                    </p>
                </div>

                <!-- Shitsuke / Rajin -->
                <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200 hover:border-purple-400 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 font-black text-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        05
                    </div>
                    <h3 class="text-base font-black text-charcoal-900 mb-2">
                        {{ $settings->get('facility_5r_rajin_title', 'Rajin (Shitsuke)') }}
                    </h3>
                    <p class="text-xs text-charcoal-600 leading-relaxed">
                        {{ $settings->get('facility_5r_rajin_desc', 'Membiasakan briefing kedisiplinan pagi, doa bersama, dan pembagian job sheet sebelum sesi praktik dimulai.') }}
                    </p>
                </div>
            </div>

            <!-- Double-Bezel Hardware Box for K3LH Protocol & Environment -->
            <div class="p-2 rounded-3xl bg-charcoal-100 border border-charcoal-200 shadow-sm">
                <div class="p-6 sm:p-8 rounded-[1.25rem] bg-charcoal-900 text-white">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-6 border-b border-white/10 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-black uppercase tracking-tight">Protokol Keselamatan Kerja & Pengelolaan Limbah B3</h3>
                                <p class="text-xs sm:text-sm text-charcoal-400">Komitmen kami mewujudkan bengkel ramah lingkungan berstandar sertifikasi industri.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- APD Wajib -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-primary-400 font-bold text-xs uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Alat Pelindung Diri (APD) Wajib
                            </div>
                            <p class="text-xs text-charcoal-300 leading-relaxed">
                                {{ $settings->get('facility_k3_apd', 'Wearpack Standar AHASS, Safety Shoes Ujung Besi, Kacamata Pelindung Serpihan Logam, Sarung Tangan Karet Nitrile.') }}
                            </p>
                        </div>

                        <!-- Fasilitas Darurat -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-amber-400 font-bold text-xs uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                </svg>
                                Sarana Tanggap Darurat & Kebakaran
                            </div>
                            <p class="text-xs text-charcoal-300 leading-relaxed">
                                {{ $settings->get('facility_k3_safety', 'Tabung Pemadam Api (APAR) Powder & CO2 di Setiap Sudut, Eye Washer Darurat, Kotak P3K Lengkap, Jalur Evakuasi Evacuation Assembly Point.') }}
                            </p>
                        </div>

                        <!-- Limbah B3 -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-emerald-400 font-bold text-xs uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Penanganan Limbah B3 Bengkel
                            </div>
                            <p class="text-xs text-charcoal-300 leading-relaxed">
                                {{ $settings->get('facility_k3_limbah', 'Penampung Limbah B3 Berstandar Lingkungan: Drum Oli Bekas Bersegel, Pemilah Aki Bekas & Kain Majun Terkontaminasi.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 04. SOP ALUR PRAKTIKUM SISWA -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-charcoal-50 border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-charcoal-200 text-charcoal-800 text-xs font-bold tracking-wider uppercase mb-3">
                    STANDAR OPERASIONAL PROSEDUR (SOP)
                </div>
                <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                    Alur Praktikum & Disiplin Siswa di Bengkel
                </h2>
                <p class="text-charcoal-600 text-sm sm:text-base mt-2">
                    Tahapan sistematis yang dijalani setiap peserta didik TBSM untuk memastikan keselamatan, efisiensi kerja, dan ketelitian sesuai prosedur pabrikan.
                </p>
            </div>

            <!-- Steps Roadmap -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative">
                <!-- Step 1 -->
                <div class="p-6 rounded-2xl bg-white border border-charcoal-200 relative flex flex-col justify-between shadow-2xs">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">1</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Persiapan</span>
                        </div>
                        <h3 class="text-sm font-black text-charcoal-900 mb-2">Apel & Pemeriksaan APD</h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            Pemeriksaan kelengkapan wearpack, safety shoes, kerapian rambut (standar 2-1-1), dan briefing keselamatan kerja bersama instruktur.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="p-6 rounded-2xl bg-white border border-charcoal-200 relative flex flex-col justify-between shadow-2xs">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">2</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Job Sheet</span>
                        </div>
                        <h3 class="text-sm font-black text-charcoal-900 mb-2">Peminjaman Tool di Gudang SST</h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            Menerima lembar kerja (Job Sheet), mengambil toolbox dan perkakas khusus SST menggunakan kartu kontrol inventaris terkomputerisasi.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="p-6 rounded-2xl bg-white border border-charcoal-200 relative flex flex-col justify-between shadow-2xs">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">3</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Eksekusi</span>
                        </div>
                        <h3 class="text-sm font-black text-charcoal-900 mb-2">Praktik di Pit / Engine Stand</h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            Melakukan pembongkaran, diagnosa kerusakan, pengukuran presisi, dan penggantian komponen berpatokan pada Buku Pedoman Reparasi (BPR).
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="p-6 rounded-2xl bg-white border border-charcoal-200 relative flex flex-col justify-between shadow-2xs">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">4</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Verifikasi</span>
                        </div>
                        <h3 class="text-sm font-black text-charcoal-900 mb-2">Quality Control & Tes Scanner</h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            Pemeriksaan hasil kerja oleh guru asesor, verifikasi pembacaan scanner HIDS pada ECM, serta pengetesan fungsi rem dan kelistrikan.
                        </p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="p-6 rounded-2xl bg-white border border-charcoal-200 relative flex flex-col justify-between shadow-2xs">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-emerald-600 text-white font-black text-xs flex items-center justify-center">5</span>
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Evaluasi</span>
                        </div>
                        <h3 class="text-sm font-black text-charcoal-900 mb-2">Seiso & Pengembalian Tool</h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            Pembersihan menyeluruh bike lift dan lantai dari sisa oli, pengembalian tool SST dalam keadaan bersih, dan rekapitulasi nilai harian.
                        </p>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 05. TEACHING FACTORY (TeFa) & LAYANAN SERVIS PUBLIK -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-white border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                <!-- Left: Info Card & Authentic Photo -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-amber-100 text-amber-800 text-xs font-bold tracking-wider uppercase mb-3">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            {{ $settings->get('facility_tefa_badge', 'UNIT PRODUKSI & TEFA') }}
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase leading-tight">
                            {{ $settings->get('facility_tefa_title', 'Teaching Factory (TeFa) TBSM SMKN 1 Bangsri') }}
                        </h2>
                        <p class="text-charcoal-600 text-sm sm:text-base mt-3 leading-relaxed">
                            {{ $settings->get('facility_tefa_subtitle', 'Menghadirkan layanan perawatan berkala dan perbaikan sepeda motor untuk warga masyarakat, guru, dan siswa dengan kualitas pengerjaan berstandar bengkel resmi AHASS.') }}
                        </p>
                    </div>

                    <!-- Authentic Workshop Photo Box -->
                    <div class="rounded-3xl overflow-hidden border border-charcoal-200 shadow-sm relative group">
                        <img 
                            src="{{ asset('storage/facilities/stall-servis-motor-praktik.png') }}" 
                            alt="Stall Servis Praktik Motor Honda" 
                            class="w-full h-64 sm:h-72 object-cover group-hover:scale-105 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950/80 via-transparent to-transparent flex items-end p-5">
                            <div class="text-white">
                                <span class="text-[11px] font-bold uppercase tracking-wider text-amber-400 block">Stall Servis & Unit Praktik Motor Honda</span>
                                <span class="text-xs text-charcoal-200">Suasana bengkel TeFa SMKN 1 Bangsri berstandar bengkel resmi AHASS</span>
                            </div>
                        </div>
                    </div>

                    <!-- Operational Hours & Location -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-charcoal-50 border border-charcoal-200">
                            <span class="block text-[11px] font-bold uppercase text-charcoal-400 mb-1">Jam Layanan</span>
                            <span class="text-xs sm:text-sm font-black text-charcoal-900 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $settings->get('facility_tefa_hours', 'Senin – Jumat : 08.00 – 15.00 WIB') }}
                            </span>
                        </div>

                        <div class="p-4 rounded-2xl bg-charcoal-50 border border-charcoal-200">
                            <span class="block text-[11px] font-bold uppercase text-charcoal-400 mb-1">Lokasi Unit TeFa</span>
                            <span class="text-xs sm:text-sm font-black text-charcoal-900 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $settings->get('facility_tefa_location', 'Gedung Bengkel Otomotif SMKN 1 Bangsri') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: Services Menu -->
                <div class="lg:col-span-6">
                    <div class="p-6 sm:p-8 rounded-3xl bg-charcoal-50 border border-charcoal-200">
                        <h3 class="text-lg font-black text-charcoal-900 uppercase tracking-tight mb-2">
                            Menu Layanan Perawatan Sepeda Motor
                        </h3>
                        <p class="text-xs text-charcoal-600 mb-6">
                            Terbuka untuk kendaraan dinas sekolah, guru, karyawan, siswa, dan warga masyarakat Jepara sekitar.
                        </p>

                        @php
                            $servicesRaw = $settings->get('facility_tefa_services', "Servis Berkala & Tune Up Injeksi PGM-FI (Reset Scanner ECM)\nPerawatan Transmisi Otomatis CVT (V-Belt & Roller)\nGanti Oli Mesin & Transmisi (Astra Honda Oil Asli)\nServis Sistem Pengereman Hidrolik (CBS / ABS)\nPembersihan Injektor Ultrasonik & Throttle Body\nPenggantian Suku Cadang Orisinal Honda Genuine Parts (HGP)\nUji Emisi Gas Buang Sepeda Motor");
                            $servicesList = array_values(array_filter(array_map('trim', preg_split('/[\r\n]+/', $servicesRaw))));
                        @endphp

                        <div class="space-y-3">
                            @foreach($servicesList as $srvIndex => $srvItem)
                                <div class="flex items-center gap-3 p-3.5 rounded-xl bg-white border border-charcoal-100 hover:border-primary-400 transition-colors shadow-2xs">
                                    <div class="w-7 h-7 rounded-lg bg-primary-50 text-primary-600 flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ sprintf('%02d', $srvIndex + 1) }}
                                    </div>
                                    <span class="text-xs sm:text-sm font-bold text-charcoal-800">{{ $srvItem }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Supervision Guarantee Badge -->
                        <div class="mt-6 p-4 rounded-xl bg-primary-50 border border-primary-200 flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-xs text-primary-900 font-medium leading-relaxed">
                                {{ $settings->get('facility_tefa_note', 'Seluruh proses pengerjaan dilakukan oleh siswa berprestasi kelas XI & XII di bawah supervisi mekanik instruktur bersertifikasi Astra Motor.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 06. CALL TO ACTION (CTA) KUNJUNGAN BENGKEL & PPDB -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-charcoal-950 text-white relative overflow-hidden">
        <!-- Technical Mesh Lines -->
        <div class="absolute inset-0 pointer-events-none opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 2rem 2rem;"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-600/20 rounded-full blur-[120px] pointer-events-none"></div>

        <x-frontend.layout.container class="relative z-10">
            <div class="max-w-4xl mx-auto text-center flex flex-col items-center">
                <span class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/10 text-primary-400 border border-white/10 text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                    {{ $settings->get('facility_cta_badge', 'KUNJUNGAN & INFORMASI') }}
                </span>

                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight leading-tight mb-4">
                    {{ $settings->get('facility_cta_title', 'Tertarik Melihat Langsung Fasilitas Bengkel Kami?') }}
                </h2>

                <p class="text-charcoal-300 text-sm sm:text-base lg:text-lg max-w-2xl mb-8 leading-relaxed">
                    {{ $settings->get('facility_cta_desc', 'Kami menyambut baik kunjungan calon siswa, orang tua, sekolah mitra tingkat SMP/MTs, dan mitra industri yang ingin melihat langsung ekosistem pembelajaran otomotif berstandar Astra Honda di SMKN 1 Bangsri.') }}
                </p>

                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <a 
                        href="{{ url($settings->get('facility_cta_button_url', '/kontak')) }}" 
                        class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-primary-600 hover:bg-primary-500 text-white font-black text-sm uppercase tracking-wider transition-all shadow-lg hover:shadow-primary-600/30 flex items-center justify-center gap-2"
                    >
                        <span>{{ $settings->get('facility_cta_button_text', 'Hubungi Kami / Jadwalkan Kunjungan') }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <a 
                        href="{{ route('academic.programs') }}" 
                        class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-sm uppercase tracking-wider transition-all border border-white/20 flex items-center justify-center gap-2"
                    >
                        <span>Lihat Kurikulum Kejuruan</span>
                    </a>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

</x-layouts.app>
