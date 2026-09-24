<x-layouts.app title="Kemitraan Industri Resmi - PT Astra Honda Motor" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "{{ $partner->name }}",
      "url": "{{ $partner->website ?? url('/') }}",
      "description": "Kemitraan Kelas Industri Binaan PT Astra Honda Motor untuk {{ $settings->get('site_name', 'Teknik dan Bisnis Sepeda Motor') }} {{ $settings->get('school_name', 'SMK Negeri 1 Bangsri') }}."
    }
    </script>
    @endpush

    <!-- Main Layout Wrapper (Synchronized with Homepage theme) -->
    <main class="flex flex-col items-center w-full overflow-hidden relative">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: KEMITRAAN KELAS INDUSTRI ASTRA HONDA (Compact & Cinematic) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-12 sm:py-16 lg:py-20 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Overlay -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                @if($partner->banner_image && Storage::disk('public')->exists($partner->banner_image))
                    <img src="{{ Storage::url($partner->banner_image) }}" alt="Hero Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @elseif($settings->get('industry_hero_bg_image'))
                    <img src="{{ Storage::url($settings->get('industry_hero_bg_image')) }}" alt="Hero Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @else
                    <img src="https://images.unsplash.com/photo-1622322394747-062e787498c8?q=80&w=1600&auto=format&fit=crop" alt="Hero Background" class="w-full h-full object-cover mix-blend-overlay opacity-25 grayscale" loading="eager">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-charcoal-950/80 via-charcoal-900/90 to-charcoal-950"></div>
            </div>

            <!-- Decorative Radial Grid -->
            <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.06]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
            
            <!-- Red Ambient Glow -->
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-figma-red/15 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>

            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16 relative z-20 text-center flex flex-col items-center">
                
                <!-- Eyebrow with Brand Red Bar -->
                <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-3 sm:mb-4 reveal-on-scroll reveal-up">
                    <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-red uppercase">
                        {{ $settings->get('industry_hero_badge', 'KEMITRAAN KELAS INDUSTRI RESMI') }}
                    </span>
                    <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Dual Synergy Emblem (SMKN 1 Bangsri x PT Astra Honda Motor) -->
                <div class="flex items-center justify-center gap-3 sm:gap-6 mb-4 sm:mb-6 reveal-on-scroll reveal-up delay-100">
                    <div class="w-14 h-14 sm:w-20 sm:h-20 bg-white rounded-xl p-2 sm:p-2.5 shadow-xl flex items-center justify-center transform hover:scale-105 transition-all">
                        @if($partner->logo && Storage::disk('public')->exists($partner->logo))
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                        @else
                            <img src="{{ asset('storage/industry_partners/01M1DB84NZV7C26TS184CWVE8F.png') }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                        @endif
                    </div>

                    <div class="flex flex-col items-center justify-center px-1">
                        <span class="font-heading font-black text-[11px] sm:text-[13px] uppercase tracking-wider text-figma-red">Link & Match</span>
                        <div class="w-6 sm:w-8 h-[2px] bg-figma-red my-1"></div>
                        <span class="font-sans text-[9px] sm:text-[10px] uppercase tracking-wider text-gray-400">Sejak 2016</span>
                    </div>

                    <div class="w-14 h-14 sm:w-20 sm:h-20 bg-white rounded-xl p-2 sm:p-2.5 shadow-xl flex items-center justify-center transform hover:scale-105 transition-all">
                        @if($schoolLogo = $settings->get('site_logo'))
                            <img src="{{ Storage::url($schoolLogo) }}" alt="{{ $settings->get('school_name', 'SMKN 1 Bangsri') }}" class="w-full h-full object-contain">
                        @else
                            <div class="font-heading font-black text-base sm:text-xl text-figma-dark">TBSM</div>
                        @endif
                    </div>
                </div>

                <!-- Main Heading -->
                <h1 class="font-heading font-black text-[24px] sm:text-[36px] md:text-[48px] lg:text-[56px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-white uppercase mb-3 sm:mb-4 max-w-[880px] drop-shadow-md reveal-on-scroll reveal-up delay-200">
                    {!! nl2br(e($settings->get('industry_hero_title', 'Sinergi Industri Resmi Bersama PT Astra Honda Motor'))) !!}
                </h1>

                <!-- Grade Status Pill -->
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold mb-5 reveal-on-scroll reveal-up delay-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                </div>

                <!-- Subtitle Description -->
                <p class="font-sans text-[13px] sm:text-[16px] md:text-[18px] text-gray-300 leading-[1.6] max-w-[760px] mx-auto mb-6 sm:mb-8 reveal-on-scroll reveal-up delay-300">
                    {{ $settings->get('industry_hero_subtitle', 'Program kemitraan strategis kurikulum injeksi PGM-FI, fasilitas bengkel standar AHASS Grade A+, serta penyerapan magang dan kerja di jaringan bengkel resmi AHASS se-Kabupaten Jepara.') }}
                </p>

                <!-- 4 Metrics Strip (Compact) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-y-4 gap-x-3 sm:gap-6 md:gap-8 divide-x-0 md:divide-x md:divide-charcoal-800 pt-6 border-t border-charcoal-800 w-full max-w-[960px] reveal-on-scroll reveal-up delay-400">
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('industry_stat_1_val', '2016') }}
                        </div>
                        <div class="w-4 h-[2px] bg-figma-red mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Awal Kerjasama</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $branches->count() }} Cabang
                        </div>
                        <div class="w-4 h-[2px] bg-emerald-500 mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">AHASS di Jepara</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('industry_stat_3_val', '100%') }}
                        </div>
                        <div class="w-4 h-[2px] bg-amber-500 mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Sinkron Kurikulum</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-3">
                        <div class="font-heading font-black text-[24px] sm:text-[34px] leading-none text-white mb-1">
                            {{ $settings->get('industry_stat_4_val', 'Grade A+') }}
                        </div>
                        <div class="w-4 h-[2px] bg-figma-red mb-1.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-medium">Akreditasi Lab</div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. OVERVIEW SINERGI & LEGALITAS MOU (Unified Compact Layout) -->
        <!-- ============================================================================ -->
        <section class="w-full py-10 sm:py-14 lg:py-16 bg-white overflow-hidden border-b border-gray-100 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Left: Narrative & Key Highlights (7 Cols) -->
                    <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                        <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-3">
                            <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                                Mitra Utama Industri
                            </span>
                        </div>

                        <h2 class="font-heading font-extrabold text-[22px] sm:text-[32px] md:text-[38px] leading-[1.15] text-figma-dark mb-3 sm:mb-4">
                            {{ $partner->name }}
                        </h2>

                        <div class="pl-3.5 sm:pl-4 border-l-2 border-figma-red mb-4">
                            <p class="font-sans font-semibold text-[13px] sm:text-[15px] text-figma-dark">
                                {{ $partner->industry_type ?? 'Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)' }}
                            </p>
                            <p class="font-sans text-[12px] sm:text-[13px] text-gray-500 mt-1">
                                Sinergi kemitraan vokasi link & match terpadu sejak 2016 guna menjamin penguasaan teknologi injeksi PGM-FI dan kesiapan teknisi handal.
                            </p>
                        </div>

                        <!-- Narrative -->
                        <div class="font-sans text-[13px] sm:text-[14px] text-gray-600 leading-relaxed mb-5">
                            {!! \App\Support\HtmlSanitizer::clean($partner->description) !!}
                        </div>

                        <!-- 4 Highlights (Compact) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-5 font-sans text-xs text-gray-700">
                            <div class="flex items-center gap-2 p-2.5 bg-gray-50 border border-gray-100 rounded-sm">
                                <svg class="w-4 h-4 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="line-clamp-1">Kurikulum Injeksi PGM-FI AMTC</span>
                            </div>
                            <div class="flex items-center gap-2 p-2.5 bg-gray-50 border border-gray-100 rounded-sm">
                                <svg class="w-4 h-4 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="line-clamp-1">Lab Standar AHASS Grade A+</span>
                            </div>
                            <div class="flex items-center gap-2 p-2.5 bg-gray-50 border border-gray-100 rounded-sm">
                                <svg class="w-4 h-4 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="line-clamp-1">Sertifikasi Asesor & Guru AMTC</span>
                            </div>
                            <div class="flex items-center gap-2 p-2.5 bg-gray-50 border border-gray-100 rounded-sm">
                                <svg class="w-4 h-4 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="line-clamp-1">Rekrutmen Prioritas BKK AHASS</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-3">
                            @if($partner->website)
                                <a 
                                    href="{{ Str::startsWith($partner->website, 'http') ? $partner->website : 'https://' . $partner->website }}" 
                                    target="_blank" 
                                    class="px-5 py-2.5 bg-figma-dark text-white font-sans font-bold text-xs uppercase tracking-wide hover:bg-figma-red transition-colors rounded-sm inline-flex items-center gap-2"
                                >
                                    <span>Situs Resmi Astra Honda</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif

                            <a 
                                href="#jaringan-ahass" 
                                class="px-5 py-2.5 border border-gray-300 text-figma-dark font-sans font-bold text-xs uppercase tracking-wide hover:border-figma-red hover:text-figma-red transition-colors rounded-sm"
                            >
                                <span>Cari Bengkel AHASS di Jepara</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right: Official MoU Box (5 Cols - Compact) -->
                    <div class="lg:col-span-5 reveal-on-scroll reveal-up delay-100">
                        <div class="bg-gray-50 border border-gray-200 p-5 sm:p-6 rounded-xl sm:rounded-none relative overflow-hidden shadow-sm">
                            <div class="absolute top-0 left-0 w-12 h-1 bg-figma-red"></div>

                            <div class="flex items-center justify-between pb-3.5 border-b border-gray-200 mb-4">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-figma-red block">Legalitas Kerjasama</span>
                                    <h3 class="font-heading font-bold text-base text-figma-dark">Surat Perjanjian (MoU)</h3>
                                </div>
                                <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold uppercase rounded-sm">
                                    Resmi Aktif
                                </span>
                            </div>

                            <div class="space-y-3 font-sans text-xs">
                                <div>
                                    <span class="text-gray-400 block text-[10px] uppercase">Nomor MoU Kerjasama:</span>
                                    <strong class="text-figma-dark font-mono text-[13px]">{{ $partner->mou_number ?? '042/MoU-AHM/SMKN1BSR/TBSM/2021' }}</strong>
                                </div>

                                <div class="grid grid-cols-2 gap-3 pb-3 border-b border-gray-200">
                                    <div>
                                        <span class="text-gray-400 block text-[10px] uppercase">Tahun Awal:</span>
                                        <span class="font-semibold text-figma-dark">{{ $partner->mou_start_date ? $partner->mou_start_date->format('d M Y') : '1 Agustus 2016' }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-400 block text-[10px] uppercase">Masa Berlaku:</span>
                                        <span class="font-semibold text-emerald-700">{{ $partner->mou_end_date ? $partner->mou_end_date->format('d M Y') : '2028 (Diperbarui)' }}</span>
                                    </div>
                                </div>

                                <div>
                                    <span class="text-gray-400 block text-[10px] uppercase">Akreditasi Kelas Industri:</span>
                                    <span class="font-bold text-figma-red text-sm">{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                                </div>

                                <div>
                                    <span class="text-gray-400 block text-[10px] uppercase">Cakupan Wilayah:</span>
                                    <span class="font-medium text-gray-700">Kabupaten Jepara & Karesidenan Pati (Jawa Tengah)</span>
                                </div>

                                @if($partner->curriculum_sync_info)
                                    <div class="pt-2 border-t border-gray-200">
                                        <span class="text-gray-400 block text-[10px] uppercase mb-1">Sinkronisasi Kurikulum:</span>
                                        <p class="text-[11px] text-gray-600 leading-relaxed bg-white p-2.5 rounded border border-gray-200">
                                            {{ $partner->curriculum_sync_info }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. 6 PILAR KERJASAMA INDUSTRI (Compact 6-Card Grid) -->
        <!-- ============================================================================ -->
        <section class="w-full py-10 sm:py-14 lg:py-16 bg-gray-50 overflow-hidden border-b border-gray-200 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10 reveal-on-scroll reveal-up">
                    <div class="flex items-center justify-center gap-2 sm:gap-3 mb-2">
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                            {{ $settings->get('industry_pillars_badge', '6 Pilar Kemitraan Resmi') }}
                        </span>
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                    </div>
                    <h2 class="font-heading font-extrabold text-[22px] sm:text-[30px] md:text-[36px] text-figma-dark tracking-tight">
                        {{ $settings->get('industry_pillars_title', 'Ruang Lingkup Sinergi SMK & Industri') }}
                    </h2>
                </div>

                <!-- 6 Compact Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                    
                    <!-- 1 -->
                    <div class="p-5 bg-white border border-gray-200 rounded-xl sm:rounded-none group hover:border-figma-red transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">01</span>
                            <h3 class="font-heading font-bold text-sm sm:text-base text-figma-dark group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_1_title', 'Sinkronisasi Kurikulum') }}
                            </h3>
                        </div>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_1_desc', 'Penyelarasan silabus Kurikulum Merdeka dengan standar kompetensi AMTC Astra Honda Level 1 & 2 untuk teknologi injeksi PGM-FI.') }}
                        </p>
                    </div>

                    <!-- 2 -->
                    <div class="p-5 bg-white border border-gray-200 rounded-xl sm:rounded-none group hover:border-figma-red transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">02</span>
                            <h3 class="font-heading font-bold text-sm sm:text-base text-figma-dark group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_2_title', 'Magang PKL 6 Bulan di AHASS') }}
                            </h3>
                        </div>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_2_desc', 'Siswa diterjunkan magang selama 6 bulan penuh di jaringan bengkel resmi AHASS se-Kabupaten Jepara.') }}
                        </p>
                    </div>

                    <!-- 3 -->
                    <div class="p-5 bg-white border border-gray-200 rounded-xl sm:rounded-none group hover:border-figma-red transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">03</span>
                            <h3 class="font-heading font-bold text-sm sm:text-base text-figma-dark group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_3_title', 'Teaching Factory (TeFa) AHASS') }}
                            </h3>
                        </div>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_3_desc', 'Bengkel operasional berstandar AHASS di sekolah, melayani servis riil kendaraan masyarakat dengan SOP Honda.') }}
                        </p>
                    </div>

                    <!-- 4 -->
                    <div class="p-5 bg-white border border-gray-200 rounded-xl sm:rounded-none group hover:border-figma-red transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">04</span>
                            <h3 class="font-heading font-bold text-sm sm:text-base text-figma-dark group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_4_title', 'Bantuan Unit Motor & SST') }}
                            </h3>
                        </div>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_4_desc', 'Dukungan unit motor praktik Honda generasi terbaru, scanner injeksi HIDS, dan special service tools resmi pabrikan.') }}
                        </p>
                    </div>

                    <!-- 5 -->
                    <div class="p-5 bg-white border border-gray-200 rounded-xl sm:rounded-none group hover:border-figma-red transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">05</span>
                            <h3 class="font-heading font-bold text-sm sm:text-base text-figma-dark group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_5_title', 'Uji Sertifikasi Mekanik Honda') }}
                            </h3>
                        </div>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_5_desc', 'Uji Kompetensi Keahlian (UKK) dinilai langsung oleh asesor eksternal Astra Motor serta sertifikasi LSP-P1 BNSP.') }}
                        </p>
                    </div>

                    <!-- 6 -->
                    <div class="p-5 bg-white border border-gray-200 rounded-xl sm:rounded-none group hover:border-figma-red transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 bg-figma-red text-white font-heading font-black text-xs flex items-center justify-center rounded-sm">06</span>
                            <h3 class="font-heading font-bold text-sm sm:text-base text-figma-dark group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_6_title', 'Prioritas Rekrutmen BKK') }}
                            </h3>
                        </div>
                        <p class="font-sans text-xs text-gray-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_6_desc', 'Jalur rekrutmen cepat teknisi baru bagi alumni TBSM SMKN 1 Bangsri langsung ke dealer dan bengkel AHASS rekanan.') }}
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. DIREKTORI JARINGAN BENGKEL RESMI AHASS SE-KABUPATEN JEPARA -->
        <!-- ============================================================================ -->
        <section 
            id="jaringan-ahass"
            class="w-full py-10 sm:py-14 lg:py-16 bg-white overflow-hidden border-b border-gray-100 relative"
            x-data="{ 
                selectedDistrict: 'all',
                searchQuery: '',
                selectedBranch: null,
                modalOpen: false,
                openModal(branch) {
                    this.selectedBranch = branch;
                    this.modalOpen = true;
                    document.body.classList.add('overflow-hidden');
                },
                closeModal() {
                    this.modalOpen = false;
                    document.body.classList.remove('overflow-hidden');
                },
                matchesBranch(district, name, address, pic) {
                    const matchesDistrict = (this.selectedDistrict === 'all' || this.selectedDistrict === district);
                    if (!matchesDistrict) return false;
                    if (!this.searchQuery.trim()) return true;
                    const q = this.searchQuery.toLowerCase();
                    return (name && name.toLowerCase().includes(q)) || 
                           (address && address.toLowerCase().includes(q)) || 
                           (pic && pic.toLowerCase().includes(q));
                }
            }"
        >
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6 sm:mb-8 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-2">
                            <div class="w-6 sm:w-10 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[11px] sm:text-[13px] leading-none tracking-[2px] text-figma-gray uppercase">
                                Jaringan Mitra AHASS
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-[22px] sm:text-[30px] md:text-[36px] text-figma-dark tracking-tight">
                            Bengkel AHASS Rekanan di Kabupaten Jepara
                        </h2>
                    </div>

                    <div class="text-xs font-bold text-gray-500 bg-gray-50 border border-gray-200 px-3.5 py-1.5 rounded-sm self-start md:self-auto">
                        Total: <strong class="text-figma-red">{{ $branches->count() }}</strong> Cabang Resmi
                    </div>
                </div>

                <!-- Search & District Filter -->
                <div class="flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-3 mb-6 pb-4 border-b border-gray-200">
                    <div class="relative w-full lg:w-80 shrink-0">
                        <input 
                            type="text" 
                            x-model="searchQuery"
                            placeholder="Cari cabang AHASS, kode, kecamatan..." 
                            class="w-full pl-9 pr-3 py-2.5 bg-white border border-gray-300 text-xs font-medium text-figma-dark focus:border-figma-red focus:ring-1 focus:ring-figma-red rounded-sm outline-none"
                        >
                        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar py-0.5">
                        <button 
                            @click="selectedDistrict = 'all'"
                            :class="selectedDistrict === 'all' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-3 py-1.5 text-xs font-sans font-bold rounded-sm shrink-0 cursor-pointer transition-all"
                        >
                            Semua ({{ $branches->count() }})
                        </button>

                        @foreach($districts as $dst)
                            @php $dstCount = $branches->where('district', $dst)->count(); @endphp
                            <button 
                                @click="selectedDistrict = '{{ $dst }}'"
                                :class="selectedDistrict === '{{ $dst }}' ? 'bg-figma-dark text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                class="px-3 py-1.5 text-xs font-sans font-bold rounded-sm shrink-0 cursor-pointer transition-all"
                            >
                                {{ $dst }} ({{ $dstCount }})
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Branches Grid (Compact & Dense) -->
                @if($branches && $branches->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($branches as $branch)
                            @php
                                $branchJson = json_encode([
                                    'id' => $branch->id,
                                    'name' => $branch->name,
                                    'branch_code' => $branch->branch_code,
                                    'district' => $branch->district,
                                    'city' => $branch->city,
                                    'address' => $branch->address,
                                    'phone' => $branch->phone,
                                    'whatsapp' => $branch->whatsapp,
                                    'formatted_wa' => $branch->formatted_whatsapp_url,
                                    'google_maps_url' => $branch->google_maps_url,
                                    'pic_name' => $branch->pic_name,
                                    'pic_phone' => $branch->pic_phone,
                                    'internship_quota' => $branch->internship_quota,
                                    'facilities_list' => $branch->facilities_list,
                                    'photo_url' => $branch->photo ? Storage::url($branch->photo) : null,
                                    'is_main_branch' => $branch->is_main_branch,
                                ]);
                            @endphp

                            <div 
                                x-show="matchesBranch('{{ $branch->district }}', '{{ addslashes($branch->name) }}', '{{ addslashes($branch->address) }}', '{{ addslashes($branch->pic_name ?? '') }}')"
                                class="bg-white border {{ $branch->is_main_branch ? 'border-figma-red shadow-sm' : 'border-gray-200' }} p-4 rounded-sm flex flex-col justify-between hover:border-figma-red transition-all group"
                            >
                                <div>
                                    <div class="flex items-center justify-between gap-1.5 mb-2">
                                        <span class="px-2 py-0.5 bg-gray-100 text-figma-dark text-[10px] font-bold uppercase rounded">
                                            Kec. {{ $branch->district }}
                                        </span>
                                        @if($branch->is_main_branch)
                                            <span class="px-2 py-0.5 bg-figma-red text-white text-[9px] font-bold uppercase rounded">
                                                Cabang Utama
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="font-heading font-bold text-sm text-figma-dark group-hover:text-figma-red transition-colors line-clamp-1 mb-1">
                                        {{ $branch->name }}
                                    </h3>

                                    <p class="font-sans text-[11px] text-gray-500 line-clamp-2 leading-relaxed mb-3">
                                        {{ $branch->address }}
                                    </p>

                                    <div class="text-[11px] font-sans text-gray-600 pb-2 mb-2 border-b border-gray-100 flex items-center justify-between">
                                        <span>Kuota PKL:</span>
                                        <strong class="text-emerald-700">{{ $branch->internship_quota ? $branch->internship_quota . ' Siswa' : '-' }}</strong>
                                    </div>
                                </div>

                                <div class="flex items-center gap-1.5 pt-1">
                                    @if($branch->formatted_whatsapp_url)
                                        <a href="{{ $branch->formatted_whatsapp_url }}" target="_blank" class="flex-1 py-1.5 px-2 bg-emerald-600 hover:bg-emerald-700 text-white font-sans font-bold text-[10px] uppercase text-center rounded-sm">
                                            WhatsApp
                                        </a>
                                    @endif
                                    @if($branch->google_maps_url)
                                        <a href="{{ $branch->google_maps_url }}" target="_blank" class="py-1.5 px-2 bg-figma-dark hover:bg-figma-red text-white font-sans font-bold text-[10px] uppercase text-center rounded-sm" title="Peta">
                                            Maps
                                        </a>
                                    @endif
                                    <button @click='openModal({!! $branchJson !!})' type="button" class="py-1.5 px-2 bg-gray-100 hover:bg-gray-200 text-figma-dark font-sans font-bold text-[10px] uppercase rounded-sm cursor-pointer">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Modal Detail Cabang AHASS -->
                <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog">
                    <div x-show="modalOpen" @click="closeModal()" class="fixed inset-0 bg-figma-dark/80 backdrop-blur-xs"></div>
                    <div x-show="modalOpen" class="relative w-full max-w-lg bg-white shadow-2xl p-6 rounded-sm z-10 border border-gray-200">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100 mb-4">
                            <div>
                                <span class="px-2 py-0.5 bg-figma-red text-white text-[10px] font-bold uppercase rounded-sm" x-text="'Kec. ' + selectedBranch?.district"></span>
                                <h3 class="font-heading font-black text-base text-figma-dark mt-1" x-text="selectedBranch?.name"></h3>
                            </div>
                            <button @click="closeModal()" class="w-7 h-7 rounded-full bg-gray-100 text-gray-500 hover:text-figma-dark flex items-center justify-center cursor-pointer">✕</button>
                        </div>
                        <div class="space-y-3 text-xs font-sans text-gray-600 mb-4">
                            <p class="text-xs text-gray-500" x-text="selectedBranch?.address"></p>
                            <div class="grid grid-cols-2 gap-2 p-3 bg-gray-50 rounded border border-gray-100">
                                <div><span class="text-gray-400 block text-[10px]">Kuota Magang:</span><strong class="text-emerald-700" x-text="(selectedBranch?.internship_quota || '-') + ' Siswa'"></strong></div>
                                <div><span class="text-gray-400 block text-[10px]">Kepala Bengkel / PIC:</span><strong class="text-figma-dark" x-text="selectedBranch?.pic_name || '-'"></strong></div>
                                <div><span class="text-gray-400 block text-[10px]">Telepon:</span><strong class="text-figma-dark" x-text="selectedBranch?.phone || '-'"></strong></div>
                                <div><span class="text-gray-400 block text-[10px]">Wilayah:</span><strong class="text-figma-dark" x-text="selectedBranch?.city || 'Kabupaten Jepara'"></strong></div>
                            </div>
                            <template x-if="selectedBranch?.facilities_list && selectedBranch.facilities_list.length > 0">
                                <div>
                                    <span class="font-bold text-figma-dark block text-[11px] mb-1">Fasilitas Bengkel:</span>
                                    <div class="space-y-1">
                                        <template x-for="(fac, idx) in selectedBranch.facilities_list" :key="idx">
                                            <div class="p-1.5 bg-gray-50 text-[11px] text-gray-700 rounded flex items-center gap-1.5">
                                                <span class="w-1 h-1 bg-figma-red rounded-full"></span>
                                                <span x-text="fac"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="flex justify-end gap-2 pt-3 border-t border-gray-100">
                            <button @click="closeModal()" type="button" class="px-4 py-2 bg-figma-dark text-white text-xs font-bold uppercase rounded-sm cursor-pointer">Tutup</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. FINAL CTA: BKK & REKRUTMEN (Compact) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-12 sm:py-16 relative overflow-hidden text-center text-white">
            <div class="max-w-[800px] mx-auto px-4 sm:px-8 relative z-10 reveal-on-scroll reveal-up">
                <span class="font-sans font-bold text-[11px] sm:text-[13px] text-figma-red uppercase tracking-wider block mb-2">
                    {{ $settings->get('industry_cta_badge', 'BURSA KERJA KHUSUS (BKK) TBSM') }}
                </span>
                <h2 class="font-heading font-black text-[22px] sm:text-[32px] md:text-[38px] text-white leading-tight mb-3">
                    {{ $settings->get('industry_cta_title', 'Siap Berkarir di Dunia Otomotif Bersama AHASS?') }}
                </h2>
                <p class="font-sans text-xs sm:text-sm text-gray-300 max-w-lg mx-auto mb-6 leading-relaxed">
                    {{ $settings->get('industry_cta_desc', 'Informasi pendaftaran magang PKL atau seleksi rekrutmen mekanik resmi AHASS di wilayah Kabupaten Jepara, hubungi koordinator BKK kami.') }}
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a 
                        href="{{ $settings->get('industry_cta_btn_url', 'https://wa.me/6282323429052?text=Halo%20Admin%20BKK%20TBSM%20SMKN%201%20Bangsri,%20saya%20ingin%20informasi%20lowongan%20dan%20magang%20AHASS.') }}" 
                        target="_blank"
                        class="px-6 py-3 bg-figma-red hover:bg-figma-dark-red text-white font-sans font-bold text-xs uppercase tracking-wide transition-colors rounded-sm inline-flex items-center gap-2 shadow-lg shadow-figma-red/20"
                    >
                        <span>{{ $settings->get('industry_cta_btn_text', 'Konsultasi BKK & Magang') }}</span>
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
