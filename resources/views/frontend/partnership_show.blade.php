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

    <!-- Main Auto Layout Wrapper (Matching Homepage structure) -->
    <main class="flex flex-col items-center w-full overflow-hidden relative">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: KEMITRAAN KELAS INDUSTRI ASTRA HONDA -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-14 sm:py-20 lg:py-28 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Cinematic Overlay -->
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

            <!-- Decorative Technical Grid (Identical to Homepage Final-CTA) -->
            <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.06]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
            
            <!-- Red Ambient Glow -->
            <div class="absolute top-0 right-1/4 w-[450px] h-[450px] bg-figma-red/15 rounded-full blur-[140px] pointer-events-none -translate-y-1/2"></div>

            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16 relative z-20 text-center flex flex-col items-center">
                
                <!-- Eyebrow with Brand Red Bar -->
                <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-4 sm:mb-6 reveal-on-scroll reveal-up">
                    <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[2px] sm:tracking-[3px] text-figma-red uppercase">
                        {{ $settings->get('industry_hero_badge', 'Kemitraan Kelas Industri Resmi') }}
                    </span>
                    <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Dual Synergy Emblem (SMKN 1 Bangsri x PT Astra Honda Motor) -->
                <div class="flex items-center justify-center gap-3 sm:gap-6 mb-6 sm:mb-8 reveal-on-scroll reveal-up delay-100">
                    <!-- Partner Logo Card -->
                    <div class="w-16 h-16 sm:w-24 sm:h-24 bg-white rounded-xl sm:rounded-2xl p-2.5 sm:p-3 shadow-xl flex items-center justify-center transform hover:scale-105 transition-all duration-300">
                        @if($partner->logo && Storage::disk('public')->exists($partner->logo))
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                        @else
                            <img src="{{ asset('storage/industry_partners/01M1DB84NZV7C26TS184CWVE8F.png') }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                        @endif
                    </div>

                    <!-- Synergy Badge Connector -->
                    <div class="flex flex-col items-center justify-center px-2 py-1">
                        <span class="font-heading font-black text-[12px] sm:text-[15px] uppercase tracking-wider text-figma-red">Link & Match</span>
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red my-1"></div>
                        <span class="font-sans text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400">Binaan Sejak 2016</span>
                    </div>

                    <!-- School Logo Card -->
                    <div class="w-16 h-16 sm:w-24 sm:h-24 bg-white rounded-xl sm:rounded-2xl p-2.5 sm:p-3 shadow-xl flex items-center justify-center transform hover:scale-105 transition-all duration-300">
                        @if($schoolLogo = $settings->get('site_logo'))
                            <img src="{{ Storage::url($schoolLogo) }}" alt="{{ $settings->get('school_name', 'SMKN 1 Bangsri') }}" class="w-full h-full object-contain">
                        @else
                            <div class="font-heading font-black text-lg sm:text-2xl text-figma-dark">TBSM</div>
                        @endif
                    </div>
                </div>

                <!-- Main Heading (Chivo font, matching Homepage h2) -->
                <h1 class="font-heading font-black text-[24px] sm:text-[40px] md:text-[54px] lg:text-[64px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1.5px] text-white uppercase mb-4 sm:mb-6 max-w-[960px] drop-shadow-md reveal-on-scroll reveal-up delay-200">
                    {!! nl2br(e($settings->get('industry_hero_title', 'Sinergi Industri Resmi Bersama PT Astra Honda Motor'))) !!}
                </h1>

                <!-- Grade Status Pill -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs sm:text-sm font-bold mb-6 reveal-on-scroll reveal-up delay-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                </div>

                <!-- Subtitle Description -->
                <p class="font-sans text-[14px] sm:text-[18px] md:text-[20px] text-gray-300 leading-[1.6] max-w-[820px] mx-auto mb-8 sm:mb-12 reveal-on-scroll reveal-up delay-300">
                    {{ $settings->get('industry_hero_subtitle', 'Program kemitraan strategis link & match kurikulum, sertifikasi kompetensi teknisi level Honda, fasilitas lab bengkel standar pabrikan, serta penyerapan magang dan kerja di jaringan bengkel resmi AHASS se-Kabupaten Jepara.') }}
                </p>

                <!-- 4 Metrics Strip (Styled identical to Homepage Statistics) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-4 sm:gap-8 md:gap-12 divide-x-0 md:divide-x md:divide-charcoal-800 pt-8 border-t border-charcoal-800 w-full max-w-[1100px] reveal-on-scroll reveal-up delay-400">
                    <!-- Metric 1 -->
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                        <div class="font-heading font-black text-[28px] sm:text-[42px] lg:text-[52px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                            {{ $settings->get('industry_stat_1_val', '2016') }}
                        </div>
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[11px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                            {{ $settings->get('industry_stat_1_label', 'Awal Kemitraan Resmi Honda') }}
                        </div>
                    </div>

                    <!-- Metric 2 -->
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                        <div class="font-heading font-black text-[28px] sm:text-[42px] lg:text-[52px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-emerald-400 transition-colors duration-300">
                            {{ $branches->count() }} Cabang
                        </div>
                        <div class="w-5 sm:w-8 h-[2px] bg-emerald-500 mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[11px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                            {{ $settings->get('industry_stat_2_label', 'Jaringan AHASS di Jepara') }}
                        </div>
                    </div>

                    <!-- Metric 3 -->
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                        <div class="font-heading font-black text-[28px] sm:text-[42px] lg:text-[52px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-amber-400 transition-colors duration-300">
                            {{ $settings->get('industry_stat_3_val', '100%') }}
                        </div>
                        <div class="w-5 sm:w-8 h-[2px] bg-amber-500 mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[11px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                            {{ $settings->get('industry_stat_3_label', 'Kurikulum Sinkron PGM-FI') }}
                        </div>
                    </div>

                    <!-- Metric 4 -->
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-2 sm:px-4 group">
                        <div class="font-heading font-black text-[28px] sm:text-[42px] lg:text-[52px] leading-none text-white mb-1.5 sm:mb-2 group-hover:text-figma-red transition-colors duration-300">
                            {{ $settings->get('industry_stat_4_val', 'Grade A+') }}
                        </div>
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red mb-1.5 sm:mb-2.5 mx-auto md:mx-0"></div>
                        <div class="font-sans text-[11px] sm:text-[13px] uppercase tracking-[0.5px] sm:tracking-[1px] text-gray-400 font-medium">
                            {{ $settings->get('industry_stat_4_label', 'Standarisasi Lab Honda') }}
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. OVERVIEW MITRA UTAMA & DOKUMEN LEGALITAS MOU -->
        <!-- ============================================================================ -->
        <section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 bg-white overflow-hidden border-b border-gray-100 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="flex flex-col lg:flex-row gap-10 sm:gap-16 lg:gap-24 items-start">
                    
                    <!-- Left Column: Story & Narrative (Matching Homepage Section 07 Partnership) -->
                    <div class="w-full lg:w-7/12 reveal-on-scroll reveal-up">
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-3 sm:mb-6">
                            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                                Mitra Utama Industri
                            </span>
                        </div>

                        <h2 class="font-heading font-extrabold text-[24px] sm:text-[34px] md:text-[46px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark mb-4 sm:mb-6">
                            {{ $partner->name }}
                        </h2>

                        <!-- Red Vertical Accent Bar & Summary (Matching Homepage Section 02 Intro) -->
                        <div class="pl-4 sm:pl-6 border-l-2 border-figma-red mb-6 sm:mb-8">
                            <p class="font-sans font-medium text-[15px] sm:text-[18px] leading-[1.6] text-figma-dark mb-2">
                                {{ $partner->industry_type ?? 'Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)' }}
                            </p>
                            <p class="font-sans text-[13px] sm:text-[15px] leading-[1.6] text-gray-500">
                                Program Kelas Industri Binaan Astra Honda Motor di SMKN 1 Bangsri mengintegrasikan kurikulum, fasilitas praktikum, sertifikasi kejuruan, dan jalur rekrutmen kerja profesional.
                            </p>
                        </div>

                        <!-- Rich Description Narrative -->
                        <div class="font-sans text-[14px] sm:text-[16px] text-gray-600 leading-[1.65] space-y-4 mb-6 sm:mb-8">
                            {!! \App\Support\HtmlSanitizer::clean($partner->description) !!}
                        </div>

                        <!-- Highlights Checklist (Matching Homepage Career Section) -->
                        <div class="bg-gray-50 border border-gray-200 p-5 sm:p-7 rounded-xl sm:rounded-none mb-6 sm:mb-8">
                            <h3 class="font-heading font-bold text-[16px] sm:text-[18px] text-figma-dark mb-4 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 bg-figma-red rounded-full"></span>
                                Standarisasi Sinergi Industri
                            </h3>
                            <ul class="space-y-3 font-sans text-[13px] sm:text-[15px] text-gray-700">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Sinkronisasi Kurikulum Vokasi berbasis Injeksi PGM-FI dan AMTC Level 1-2.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Standarisasi Bengkel Kerja dengan Bike Lift Hidrolik setara standar AHASS Grade A+.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Sertifikasi Pengajar & Asesor Kejuruan berkala oleh Astra Motor Training Center.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Jalur prioritas rekrutmen mekanik resmi AHASS se-Kabupaten Jepara dan sekitarnya.</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-4">
                            @if($partner->website)
                                <a 
                                    href="{{ Str::startsWith($partner->website, 'http') ? $partner->website : 'https://' . $partner->website }}" 
                                    target="_blank" 
                                    class="inline-flex items-center justify-center px-6 sm:px-8 py-3.5 sm:py-4 bg-figma-dark text-white font-sans font-bold text-[13px] sm:text-[14px] uppercase tracking-wide hover:bg-figma-red transition-colors focus-ring rounded-sm group"
                                >
                                    <span>Kunjungi Situs Astra Honda</span>
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif

                            <a 
                                href="#jaringan-ahass" 
                                class="inline-flex items-center justify-center px-6 sm:px-8 py-3.5 sm:py-4 border border-gray-300 text-figma-dark font-sans font-bold text-[13px] sm:text-[14px] uppercase tracking-wide hover:border-figma-red hover:text-figma-red transition-colors rounded-sm"
                            >
                                <span>Lihat Cabang AHASS di Jepara</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Official MoU & Certificate Card -->
                    <div class="w-full lg:w-5/12 relative reveal-on-scroll reveal-up delay-200">
                        <!-- Decorative background red block (matching Homepage section 07) -->
                        <div class="hidden sm:block absolute -right-4 -bottom-4 w-full h-full bg-figma-red/10 border border-figma-red/20 -z-10 rounded-lg sm:rounded-none"></div>

                        <!-- Main White Card -->
                        <div class="bg-white border border-gray-200 p-6 sm:p-8 shadow-xl relative overflow-hidden rounded-xl sm:rounded-none">
                            <div class="absolute top-0 left-0 w-16 h-1.5 bg-figma-red"></div>
                            
                            <div class="flex items-center justify-between pb-5 border-b border-gray-100 mb-6">
                                <div>
                                    <span class="font-sans font-bold text-[11px] text-figma-red uppercase tracking-wider block">Legalitas Kerjasama</span>
                                    <h3 class="font-heading font-black text-[18px] sm:text-[20px] text-figma-dark uppercase">Perjanjian Kerjasama (MoU)</h3>
                                </div>
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-[11px] font-bold uppercase tracking-wider rounded-sm">
                                    Resmi Aktif
                                </span>
                            </div>

                            <!-- Partner Logo & Emblem inside Card -->
                            <div class="flex items-center gap-4 p-4 bg-gray-50 border border-gray-100 rounded-lg mb-6">
                                <div class="w-16 h-16 bg-white p-2 rounded-lg shadow-sm border border-gray-200 shrink-0 flex items-center justify-center">
                                    @if($partner->logo && Storage::disk('public')->exists($partner->logo))
                                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                                    @else
                                        <img src="{{ asset('storage/industry_partners/01M1DB84NZV7C26TS184CWVE8F.png') }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-heading font-bold text-[16px] text-figma-dark leading-tight">{{ $partner->name }}</h4>
                                    <span class="font-sans text-[12px] text-figma-red font-semibold">Astra Motor Jawa Tengah</span>
                                </div>
                            </div>

                            <!-- Key Specs -->
                            <div class="space-y-4 font-sans text-[13px] sm:text-[14px]">
                                <div class="pb-3 border-b border-gray-100">
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-0.5">Nomor Surat Perjanjian (MoU):</span>
                                    <span class="font-mono font-bold text-figma-dark text-[14px] sm:text-[15px]">{{ $partner->mou_number ?? '042/MoU-AHM/SMKN1BSR/TBSM/2021' }}</span>
                                </div>

                                <div class="grid grid-cols-2 gap-3 pb-3 border-b border-gray-100">
                                    <div>
                                        <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-0.5">Tahun Awal:</span>
                                        <span class="font-bold text-figma-dark">{{ $partner->mou_start_date ? $partner->mou_start_date->format('d M Y') : '1 Agustus 2016' }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-0.5">Masa Berlaku:</span>
                                        <span class="font-bold text-emerald-700">{{ $partner->mou_end_date ? $partner->mou_end_date->format('d M Y') : '2028 (Diperbarui)' }}</span>
                                    </div>
                                </div>

                                <div class="pb-3 border-b border-gray-100">
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-0.5">Tingkat / Akreditasi Binaan:</span>
                                    <span class="font-bold text-figma-red text-[15px]">{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                                </div>

                                <div class="pb-3 border-b border-gray-100">
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-0.5">Wilayah Jaringan Binaan:</span>
                                    <span class="font-medium text-gray-700">Kabupaten Jepara & Karesidenan Pati (Jawa Tengah)</span>
                                </div>

                                @if($partner->address)
                                    <div>
                                        <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-0.5">Kantor Pusat Perusahaan:</span>
                                        <span class="font-normal text-gray-600 leading-snug block">{{ $partner->address }}</span>
                                    </div>
                                @endif
                            </div>

                            @if($partner->curriculum_sync_info)
                                <div class="mt-6 pt-5 border-t border-gray-100">
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider mb-1.5">Rangkuman Integrasi Kurikulum:</span>
                                    <p class="font-sans text-[12px] sm:text-[13px] text-gray-600 leading-relaxed bg-gray-50 p-3 rounded border border-gray-100">
                                        {{ $partner->curriculum_sync_info }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. 6 PILAR KEMITRAAN RESMI HONDA (Bento Grid inspired by Homepage Why-TBSM) -->
        <!-- ============================================================================ -->
        <section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 bg-gray-50 overflow-hidden border-b border-gray-200 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header (Centered with Double Red Bar) -->
                <div class="flex flex-col items-center text-center mb-10 sm:mb-16 md:mb-20 reveal-on-scroll reveal-up">
                    <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-4">
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                            {{ $settings->get('industry_pillars_badge', '6 Pilar Kemitraan Resmi') }}
                        </span>
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                    </div>
                    <h2 class="font-heading font-extrabold text-[22px] sm:text-[34px] md:text-[48px] leading-[1.2] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[760px]">
                        {{ $settings->get('industry_pillars_title', 'Ruang Lingkup Sinergi SMK & Industri') }}
                    </h2>
                    <p class="font-sans text-[14px] sm:text-[17px] text-gray-600 leading-[1.6] max-w-[680px] mt-3">
                        {{ $settings->get('industry_pillars_desc', 'Enam pondasi kolaborasi komprehensif yang dirancang untuk menjamin kesiapan kerja lulusan TBSM SMKN 1 Bangsri di dunia industri otomotif modern.') }}
                    </p>
                </div>

                <!-- 6 Pillars Bento Grid (Matching Homepage Item Cards) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">
                    
                    <!-- Pilar 1: White Card with Red Top Bar -->
                    <div class="p-6 sm:p-8 bg-white border border-gray-200 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up">
                        <div class="absolute top-0 left-0 w-12 h-1 bg-figma-red z-20"></div>
                        <div>
                            <div class="text-figma-red font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4 opacity-60">01</div>
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_1_title', 'Sinkronisasi Kurikulum Industri') }}
                            </h3>
                            <p class="font-sans text-[13px] sm:text-[15px] text-gray-600 leading-[1.6]">
                                {{ $settings->get('industry_pillar_1_desc', 'Penyelarasan silabus Kurikulum Merdeka dengan standar kompetensi teknis Astra Honda Motor (AMTC Level 1 & 2), memastikan penguasaan teknologi injeksi PGM-FI dan eSP+ mutakhir.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 2: Dark Charcoal Contrast Card (Matching Item 2 in Why-TBSM) -->
                    <div class="p-6 sm:p-8 bg-charcoal-950 text-white rounded-xl sm:rounded-none relative overflow-hidden group shadow-md hover:shadow-2xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-100">
                        <div class="absolute -right-8 -top-8 w-24 h-24 bg-figma-red rounded-full opacity-15 group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-figma-red"></div>
                        <div>
                            <div class="text-figma-red font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4 opacity-80">02</div>
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-white mb-2.5">
                                {{ $settings->get('industry_pillar_2_title', 'Praktik Kerja Lapangan (PKL) AHASS') }}
                            </h3>
                            <p class="font-sans text-[13px] sm:text-[15px] text-gray-400 leading-[1.6]">
                                {{ $settings->get('industry_pillar_2_desc', 'Siswa diterjunkan magang selama 6 bulan penuh di jaringan bengkel resmi AHASS se-Kabupaten Jepara untuk merasakan ritme kerja profesional sesungguhnya.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 3: Red Solid Accent Card (Matching Item 3 in Why-TBSM) -->
                    <div class="p-6 sm:p-8 bg-figma-red text-white rounded-xl sm:rounded-none relative overflow-hidden group shadow-md hover:shadow-2xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-200">
                        <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 20px 20px;"></div>
                        <div class="relative z-10">
                            <div class="text-white/60 font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4">03</div>
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-white mb-2.5">
                                {{ $settings->get('industry_pillar_3_title', 'Teaching Factory (TeFa) AHASS') }}
                            </h3>
                            <p class="font-sans text-[13px] sm:text-[15px] text-white/95 leading-[1.6]">
                                {{ $settings->get('industry_pillar_3_desc', 'Implementasi bengkel operasional berstandar bengkel resmi di sekolah, melayani servis riil kendaraan masyarakat dengan standar operasional prosedur (SOP) Astra Honda.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 4: White Card -->
                    <div class="p-6 sm:p-8 bg-white border border-gray-200 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up">
                        <div class="absolute top-0 left-0 w-12 h-1 bg-figma-red z-20"></div>
                        <div>
                            <div class="text-figma-red font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4 opacity-60">04</div>
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_4_title', 'Bantuan Unit Motor & Special Tools (SST)') }}
                            </h3>
                            <p class="font-sans text-[13px] sm:text-[15px] text-gray-600 leading-[1.6]">
                                {{ $settings->get('industry_pillar_4_desc', 'Dukungan unit sepeda motor praktik Honda generasi terbaru, alat diagnostik scanner HIDS (Honda Intelligent Diagnostic System), dan special service tools resmi pabrikan.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 5: White Card -->
                    <div class="p-6 sm:p-8 bg-white border border-gray-200 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-100">
                        <div class="absolute top-0 left-0 w-12 h-1 bg-figma-red z-20"></div>
                        <div>
                            <div class="text-figma-red font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4 opacity-60">05</div>
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_5_title', 'Uji Sertifikasi Mekanik Berstandar Honda') }}
                            </h3>
                            <p class="font-sans text-[13px] sm:text-[15px] text-gray-600 leading-[1.6]">
                                {{ $settings->get('industry_pillar_5_desc', 'Pelaksanaan Uji Kompetensi Keahlian (UKK) dinilai langsung oleh asesor eksternal dari industri Astra Motor serta sertifikasi LSP-P1 berlisensi BNSP.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 6: White Card -->
                    <div class="p-6 sm:p-8 bg-white border border-gray-200 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-200">
                        <div class="absolute top-0 left-0 w-12 h-1 bg-figma-red z-20"></div>
                        <div>
                            <div class="text-figma-red font-heading font-black text-[28px] sm:text-[40px] leading-none mb-3 sm:mb-4 opacity-60">06</div>
                            <h3 class="font-heading font-bold text-[18px] sm:text-[22px] text-figma-dark mb-2.5 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_6_title', 'Prioritas Rekrutmen BKK Lulusan TBSM') }}
                            </h3>
                            <p class="font-sans text-[13px] sm:text-[15px] text-gray-600 leading-[1.6]">
                                {{ $settings->get('industry_pillar_6_desc', 'Jalur cepat (fast-track) rekrutmen mekanik baru bagi lulusan TBSM SMKN 1 Bangsri langsung ke dealer dan bengkel AHASS rekanan tanpa perantara.') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. DIREKTORI JARINGAN BENGKEL RESMI AHASS SE-KABUPATEN JEPARA -->
        <!-- ============================================================================ -->
        <section 
            id="jaringan-ahass"
            class="w-full py-12 sm:py-16 md:py-24 lg:py-32 bg-white overflow-hidden border-b border-gray-100 relative"
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
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 sm:mb-12 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-2.5 sm:mb-4">
                            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                                {{ $settings->get('industry_branch_badge', 'Jaringan Kerjasama Se-Kabupaten Jepara') }}
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-[24px] sm:text-[34px] md:text-[46px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark">
                            {{ $settings->get('industry_branch_title', 'Mitra Bengkel Resmi AHASS di Kabupaten Jepara') }}
                        </h2>
                        <p class="font-sans text-[14px] sm:text-[16px] text-gray-600 mt-2 max-w-2xl leading-relaxed">
                            {{ $settings->get('industry_branch_desc', 'Daftar bengkel resmi AHASS rekanan tempat siswa melaksanakan Praktik Kerja Lapangan (PKL), uji kompetensi eksternal, dan penempatan kerja lulusan di seluruh kecamatan se-Kabupaten Jepara.') }}
                        </p>
                    </div>

                    <!-- Summary Badge -->
                    <div class="flex items-center gap-3 shrink-0 self-start md:self-auto">
                        <div class="px-4 py-2 bg-gray-50 border border-gray-200 text-figma-dark font-sans text-xs sm:text-sm font-bold rounded-sm shadow-sm">
                            <span>Total: <strong class="text-figma-red">{{ $branches->count() }}</strong> Cabang AHASS</span>
                        </div>
                        <div class="px-3.5 py-2 bg-figma-red/10 border border-figma-red/20 text-figma-red font-sans text-xs sm:text-sm font-bold rounded-sm">
                            <span>Kabupaten Jepara</span>
                        </div>
                    </div>
                </div>

                <!-- Interactive Toolbar: Search Input & District Filter Pills -->
                <div class="flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4 mb-8 sm:mb-10 pb-6 border-b border-gray-200">
                    
                    <!-- Search Bar (Crisp White with Icon) -->
                    <div class="relative w-full lg:w-96 shrink-0">
                        <input 
                            type="text" 
                            x-model="searchQuery"
                            placeholder="Cari cabang AHASS, kode, atau kecamatan..." 
                            class="w-full pl-10 pr-4 py-3 bg-white border border-gray-300 text-xs sm:text-sm font-sans font-medium text-figma-dark focus:border-figma-red focus:ring-1 focus:ring-figma-red rounded-sm outline-none transition-colors"
                        >
                        <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Horizontal District Filter Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-1">
                        <button 
                            @click="selectedDistrict = 'all'"
                            :class="selectedDistrict === 'all' 
                                ? 'bg-figma-dark text-white border-figma-dark shadow-sm' 
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200 border-gray-200'"
                            class="px-4 py-2.5 text-xs sm:text-sm font-sans font-bold border rounded-sm transition-all shrink-0 cursor-pointer"
                        >
                            Semua Kecamatan ({{ $branches->count() }})
                        </button>

                        @foreach($districts as $dst)
                            @php
                                $dstCount = $branches->where('district', $dst)->count();
                            @endphp
                            <button 
                                @click="selectedDistrict = '{{ $dst }}'"
                                :class="selectedDistrict === '{{ $dst }}' 
                                    ? 'bg-figma-dark text-white border-figma-dark shadow-sm' 
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200 border-gray-200'"
                                class="px-3.5 py-2.5 text-xs sm:text-sm font-sans font-bold border rounded-sm transition-all shrink-0 cursor-pointer flex items-center gap-1.5"
                            >
                                <span>{{ $dst }}</span>
                                <span class="text-[11px] opacity-75">({{ $dstCount }})</span>
                            </button>
                        @endforeach
                    </div>

                </div>

                <!-- Branches Cards Grid (Homepage Card Aesthetic) -->
                @if($branches && $branches->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
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
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                class="bg-white border {{ $branch->is_main_branch ? 'border-figma-red shadow-lg' : 'border-gray-200' }} p-6 sm:p-7 rounded-xl sm:rounded-none relative overflow-hidden group hover:shadow-2xl hover:border-figma-red transition-all duration-300 flex flex-col justify-between"
                            >
                                <!-- Top Accent Strip on hover -->
                                <div class="absolute top-0 left-0 w-0 group-hover:w-full h-1 bg-figma-red transition-all duration-300"></div>

                                <div>
                                    <!-- Badges Row -->
                                    <div class="flex items-center justify-between gap-2 mb-3.5">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="px-2.5 py-1 bg-gray-100 text-figma-dark font-sans text-[11px] font-bold uppercase rounded-sm border border-gray-200">
                                                Kec. {{ $branch->district }}
                                            </span>
                                            @if($branch->branch_code)
                                                <span class="px-2 py-0.5 bg-gray-50 text-gray-500 font-mono text-[10px] font-bold rounded-sm border border-gray-200">
                                                    {{ $branch->branch_code }}
                                                </span>
                                            @endif
                                        </div>

                                        @if($branch->is_main_branch)
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-figma-red text-white text-[10px] font-bold uppercase tracking-wider rounded-sm shrink-0 shadow-sm">
                                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                Cabang Utama
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Branch Name -->
                                    <h3 class="font-heading font-bold text-[18px] sm:text-[20px] text-figma-dark group-hover:text-figma-red transition-colors mb-2 leading-snug">
                                        {{ $branch->name }}
                                    </h3>

                                    <!-- Address -->
                                    <p class="font-sans text-[13px] text-gray-500 leading-relaxed flex items-start gap-2 mb-4">
                                        <svg class="w-4 h-4 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>{{ $branch->address }}</span>
                                    </p>

                                    <!-- Quota & PIC Details -->
                                    <div class="space-y-2 pt-3 border-t border-gray-100 font-sans text-[12px] mb-5">
                                        @if($branch->internship_quota)
                                            <div class="flex items-center justify-between">
                                                <span class="text-gray-400">Kuota PKL:</span>
                                                <span class="font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                                                    {{ $branch->internship_quota }} Siswa / Periode
                                                </span>
                                            </div>
                                        @endif

                                        @if($branch->pic_name)
                                            <div class="flex items-center justify-between">
                                                <span class="text-gray-400">Kepala Bengkel / PIC:</span>
                                                <span class="font-semibold text-figma-dark line-clamp-1">{{ $branch->pic_name }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons Row -->
                                <div class="pt-3 border-t border-gray-100 flex items-center gap-2">
                                    @if($branch->formatted_whatsapp_url)
                                        <a 
                                            href="{{ $branch->formatted_whatsapp_url }}" 
                                            target="_blank" 
                                            class="flex-1 py-2.5 px-3 bg-emerald-600 hover:bg-emerald-700 text-white font-sans font-bold text-[12px] uppercase tracking-wide flex items-center justify-center gap-1.5 transition-colors rounded-sm"
                                        >
                                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.159.579 4.178 1.594 5.922l-1.594 5.822 6.009-1.576c1.701.927 3.655 1.454 5.733 1.454 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/>
                                            </svg>
                                            <span>WhatsApp</span>
                                        </a>
                                    @endif

                                    @if($branch->google_maps_url)
                                        <a 
                                            href="{{ $branch->google_maps_url }}" 
                                            target="_blank" 
                                            class="py-2.5 px-3 bg-figma-dark hover:bg-figma-red text-white font-sans font-bold text-[12px] flex items-center justify-center gap-1.5 transition-colors rounded-sm"
                                            title="Rute Maps"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>
                                    @endif

                                    <button 
                                        @click='openModal({!! $branchJson !!})'
                                        type="button"
                                        class="py-2.5 px-3 bg-gray-100 hover:bg-gray-200 text-figma-dark font-sans font-bold text-[12px] uppercase tracking-wide transition-colors rounded-sm cursor-pointer"
                                    >
                                        Detail
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-12 text-center bg-gray-50 border border-gray-200 rounded-sm">
                        <p class="font-sans text-gray-500 text-sm">Data cabang bengkel rekanan di Kabupaten Jepara sedang dalam proses pembaruan.</p>
                    </div>
                @endif

                <!-- ==================================================================== -->
                <!-- MODAL DETAIL CABANG AHASS (Clean White Dialog) -->
                <!-- ==================================================================== -->
                <div 
                    x-show="modalOpen" 
                    x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
                    role="dialog"
                    aria-modal="true"
                >
                    <div 
                        x-show="modalOpen"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click="closeModal()"
                        class="fixed inset-0 bg-figma-dark/80 backdrop-blur-sm"
                    ></div>

                    <div 
                        x-show="modalOpen"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95"
                        class="relative w-full max-w-xl max-h-[90vh] bg-white shadow-2xl overflow-hidden flex flex-col z-10 border border-gray-200 rounded-xl sm:rounded-none"
                    >
                        <!-- Modal Header -->
                        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-1 bg-figma-red text-white text-xs font-bold uppercase rounded-sm" x-text="'Kec. ' + selectedBranch?.district"></span>
                                <span class="text-xs font-mono font-bold text-gray-500" x-text="selectedBranch?.branch_code"></span>
                            </div>
                            <button 
                                @click="closeModal()"
                                class="w-8 h-8 rounded-full bg-white hover:bg-gray-200 text-gray-500 hover:text-figma-dark flex items-center justify-center transition-colors cursor-pointer border border-gray-200"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="p-6 overflow-y-auto space-y-5 font-sans text-xs sm:text-sm">
                            <div>
                                <h3 class="font-heading font-black text-[20px] text-figma-dark" x-text="selectedBranch?.name"></h3>
                                <p class="text-gray-500 mt-1 flex items-start gap-1.5">
                                    <svg class="w-4 h-4 text-figma-red shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span x-text="selectedBranch?.address"></span>
                                </p>
                            </div>

                            <div class="grid grid-cols-2 gap-3 p-4 bg-gray-50 border border-gray-100 rounded-sm">
                                <div>
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider">Kuota Magang (PKL):</span>
                                    <span class="font-bold text-emerald-700" x-text="(selectedBranch?.internship_quota ? selectedBranch.internship_quota + ' Siswa' : '-')"></span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider">Wilayah:</span>
                                    <span class="font-bold text-figma-dark" x-text="selectedBranch?.city || 'Kabupaten Jepara'"></span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider">Pembimbing / PIC:</span>
                                    <span class="font-bold text-figma-dark" x-text="selectedBranch?.pic_name || '-'"></span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block text-[11px] uppercase tracking-wider">Telepon:</span>
                                    <span class="font-bold text-figma-dark" x-text="selectedBranch?.phone || '-'"></span>
                                </div>
                            </div>

                            <template x-if="selectedBranch?.facilities_list && selectedBranch.facilities_list.length > 0">
                                <div>
                                    <h4 class="font-heading font-bold text-figma-dark mb-2.5 uppercase text-[12px] tracking-wider">Fasilitas Bengkel:</h4>
                                    <div class="space-y-2">
                                        <template x-for="(fac, idx) in selectedBranch.facilities_list" :key="idx">
                                            <div class="flex items-center gap-2.5 p-2.5 bg-gray-50 text-gray-700 border border-gray-100 rounded-sm">
                                                <svg class="w-4 h-4 text-figma-red shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span x-text="fac"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Modal Footer -->
                        <div class="p-4 border-t border-gray-100 bg-gray-50 flex items-center justify-between gap-3">
                            <template x-if="selectedBranch?.google_maps_url">
                                <a :href="selectedBranch.google_maps_url" target="_blank" class="px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-figma-dark font-sans font-bold text-xs uppercase tracking-wide flex items-center gap-1.5 transition-colors rounded-sm">
                                    <span>Petunjuk Rute Maps</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            </template>

                            <div class="flex items-center gap-2 ml-auto">
                                <template x-if="selectedBranch?.formatted_wa">
                                    <a :href="selectedBranch.formatted_wa" target="_blank" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-sans font-bold text-xs uppercase tracking-wide flex items-center gap-1.5 transition-colors rounded-sm">
                                        <span>Chat WhatsApp</span>
                                    </a>
                                </template>
                                <button @click="closeModal()" type="button" class="px-4 py-2.5 bg-figma-dark text-white font-sans font-bold text-xs uppercase tracking-wide hover:bg-figma-red transition-colors rounded-sm cursor-pointer">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. ROADMAP VOKASI 3 TAHUN SISWA MENUJU INDUSTRI -->
        <!-- ============================================================================ -->
        <section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 bg-gray-50 overflow-hidden border-b border-gray-200 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Centered Header -->
                <div class="flex flex-col items-center text-center mb-10 sm:mb-16 md:mb-20 reveal-on-scroll reveal-up">
                    <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-4">
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                            {{ $settings->get('industry_roadmap_badge', 'Roadmap Pendidikan Vokasi') }}
                        </span>
                        <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                    </div>
                    <h2 class="font-heading font-extrabold text-[22px] sm:text-[34px] md:text-[48px] leading-[1.2] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[760px]">
                        {{ $settings->get('industry_roadmap_title', 'Jalur Jenjang Karir & Kompetensi Siswa') }}
                    </h2>
                    <p class="font-sans text-[14px] sm:text-[17px] text-gray-600 leading-[1.6] max-w-[680px] mt-3">
                        {{ $settings->get('industry_roadmap_desc', 'Perjalanan terstruktur 3 tahun dari penguasaan dasar mekanikal hingga sertifikasi teknisi AHASS siap pakai.') }}
                    </p>
                </div>

                <!-- 4 Roadmap Steps Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Fase 1 -->
                    <div class="bg-white border border-gray-200 p-6 sm:p-7 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-lg transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up">
                        <div class="absolute top-0 left-0 w-8 h-1 bg-figma-red"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 bg-figma-red text-white font-heading font-black text-sm flex items-center justify-center rounded-sm">1</span>
                                <span class="font-sans font-bold text-[10px] text-gray-400 uppercase tracking-widest">Tahun Ke-1</span>
                            </div>
                            <h3 class="font-heading font-bold text-[16px] sm:text-[18px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_roadmap_1_title', 'Kelas X: Fondasi 5R & Mekanika Dasar') }}
                            </h3>
                            <p class="font-sans text-[13px] text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_roadmap_1_desc', 'Penanaman budaya industri 5R, disiplin APD, pengenalan perkakas dasar, dan pemahaman prinsip kerja mesin sepeda motor.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Fase 2 -->
                    <div class="bg-white border border-gray-200 p-6 sm:p-7 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-lg transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-100">
                        <div class="absolute top-0 left-0 w-8 h-1 bg-figma-red"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 bg-figma-red text-white font-heading font-black text-sm flex items-center justify-center rounded-sm">2</span>
                                <span class="font-sans font-bold text-[10px] text-gray-400 uppercase tracking-widest">Tahun Ke-2</span>
                            </div>
                            <h3 class="font-heading font-bold text-[16px] sm:text-[18px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_roadmap_2_title', 'Kelas XI: Kejuruan Injeksi & Praktik TeFa') }}
                            </h3>
                            <p class="font-sans text-[13px] text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_roadmap_2_desc', 'Pendalaman teknologi injeksi PGM-FI, scanner HIDS, perawatan berkala, serta terjun langsung di unit Teaching Factory melayani konsumen.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Fase 3 -->
                    <div class="bg-white border border-gray-200 p-6 sm:p-7 rounded-xl sm:rounded-none relative overflow-hidden group hover:border-figma-red hover:shadow-lg transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-200">
                        <div class="absolute top-0 left-0 w-8 h-1 bg-figma-red"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 bg-figma-red text-white font-heading font-black text-sm flex items-center justify-center rounded-sm">3</span>
                                <span class="font-sans font-bold text-[10px] text-gray-400 uppercase tracking-widest">Tahun Ke-3</span>
                            </div>
                            <h3 class="font-heading font-bold text-[16px] sm:text-[18px] text-figma-dark mb-2 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_roadmap_3_title', 'Kelas XII: PKL 6 Bulan di AHASS & UKK') }}
                            </h3>
                            <p class="font-sans text-[13px] text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_roadmap_3_desc', 'Imersi kerja nyata 6 bulan di bengkel resmi AHASS se-Kabupaten Jepara, diakhiri Uji Kompetensi Keahlian (UKK) dan sertifikasi mekanik BNSP.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Fase 4 -->
                    <div class="bg-charcoal-950 text-white p-6 sm:p-7 rounded-xl sm:rounded-none relative overflow-hidden group shadow-md hover:shadow-xl transition-all duration-300 flex flex-col justify-between reveal-on-scroll reveal-up delay-300">
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-figma-red"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 bg-figma-red text-white font-heading font-black text-sm flex items-center justify-center rounded-sm">4</span>
                                <span class="font-sans font-bold text-[10px] text-figma-red uppercase tracking-widest">Karir & Kerja</span>
                            </div>
                            <h3 class="font-heading font-bold text-[16px] sm:text-[18px] text-white mb-2">
                                {{ $settings->get('industry_roadmap_4_title', 'Pasca Lulus: Rekrutmen BKK & Karir') }}
                            </h3>
                            <p class="font-sans text-[13px] text-gray-400 leading-relaxed">
                                {{ $settings->get('industry_roadmap_4_desc', 'Perekrutan langsung oleh jaringan AHASS, dealer Astra Motor, industri manufaktur, atau pendampingan wirausaha bengkel mandiri.') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 06. LOWONGAN KERJA MITRA (Matching Homepage Section 12 Career) -->
        <!-- ============================================================================ -->
        @if(isset($partner->jobVacancies) && $partner->jobVacancies->count() > 0)
            <section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 bg-white overflow-hidden border-b border-gray-100 relative">
                <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                    
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 sm:mb-12">
                        <div>
                            <div class="flex items-center gap-2.5 sm:gap-3 mb-2.5 sm:mb-4">
                                <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                                <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                                    Bursa Kerja Khusus (BKK)
                                </span>
                            </div>
                            <h2 class="font-heading font-extrabold text-[24px] sm:text-[34px] md:text-[46px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark">
                                Lowongan Karir dari Mitra
                            </h2>
                            <p class="font-sans text-[14px] sm:text-[16px] text-gray-600 mt-2 max-w-2xl leading-relaxed">
                                Peluang penempatan kerja resmi bagi alumni dan siswa tingkat akhir SMK Negeri 1 Bangsri.
                            </p>
                        </div>

                        <span class="px-4 py-2 bg-gray-100 text-figma-dark font-sans text-xs sm:text-sm font-bold rounded-sm">
                            {{ $partner->jobVacancies->count() }} Lowongan Aktif
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($partner->jobVacancies as $job)
                            <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl sm:rounded-none flex flex-col justify-between hover:border-figma-red hover:shadow-lg transition-all duration-300">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <span class="text-xs font-bold px-2.5 py-0.5 rounded-sm bg-figma-red/10 text-figma-red uppercase">
                                            {{ $job->work_type ?? 'Full-time' }}
                                        </span>
                                        <span class="text-xs font-medium text-gray-500">{{ $job->location ?? 'Jepara & Sekitarnya' }}</span>
                                    </div>
                                    <h3 class="font-heading font-bold text-[18px] sm:text-[20px] text-figma-dark mb-2">{{ $job->title }}</h3>
                                    <p class="font-sans text-xs sm:text-sm text-gray-600 line-clamp-2 mb-4">{{ strip_tags($job->description) }}</p>
                                </div>

                                <a href="{{ route('jobs.show', $job->slug) }}" class="inline-flex items-center gap-1.5 font-sans text-xs sm:text-sm font-bold text-figma-red hover:text-figma-dark transition-colors">
                                    <span>Lihat Persyaratan & Lamar</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
        @endif

        <!-- ============================================================================ -->
        <!-- 07. FINAL CTA: BURSA KERJA KHUSUS (100% Identical to Homepage Final-CTA) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-14 sm:py-20 lg:py-32 relative overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 z-0">
                @php
                    $ctaBg = $settings->get('homepage_about_image') ?: 'facilities/01M1JB8QW6J6VCY86FHFH53NPV.jpeg';
                @endphp
                <img src="{{ Storage::url($ctaBg) }}" alt="Background CTA" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-r from-charcoal-950 via-charcoal-900/90 to-charcoal-900/80"></div>
            </div>
            
            <!-- Decorative Radial Grid -->
            <div class="absolute inset-0 z-10 pointer-events-none opacity-[0.05]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
            
            <div class="max-w-[1000px] mx-auto px-4 sm:px-8 md:px-16 relative z-20 text-center reveal-on-scroll reveal-up">
                
                <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-3 sm:mb-6">
                    <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[11px] sm:text-[16px] leading-none tracking-[2px] sm:tracking-[3px] text-figma-red uppercase">
                        {{ $settings->get('industry_cta_badge', 'BURSA KERJA KHUSUS (BKK) TBSM') }}
                    </span>
                    <div class="w-6 sm:w-12 h-[2px] bg-figma-red"></div>
                </div>
                
                <h2 class="font-heading font-black text-[22px] sm:text-[36px] md:text-[52px] lg:text-[72px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-2px] text-white mb-3 sm:mb-8 drop-shadow-lg">
                    {{ $settings->get('industry_cta_title', 'Siap Berkarir di Dunia Otomotif Bersama AHASS?') }}
                </h2>
                
                <p class="font-sans text-[13px] sm:text-[18px] md:text-[22px] text-gray-300 leading-[1.6] max-w-[760px] mx-auto mb-6 sm:mb-12">
                    {{ $settings->get('industry_cta_desc', 'Bagi siswa dan alumni TBSM SMKN 1 Bangsri yang ingin mendaftar magang PKL atau mengikuti seleksi rekrutmen mekanik resmi AHASS di wilayah Kabupaten Jepara dan sekitarnya, hubungi koordinator BKK kami.') }}
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-6">
                    <a 
                        href="{{ $settings->get('industry_cta_btn_url', 'https://wa.me/6282323429052?text=Halo%20Admin%20BKK%20TBSM%20SMKN%201%20Bangsri,%20saya%20ingin%20informasi%20lowongan%20dan%20magang%20AHASS.') }}" 
                        target="_blank"
                        class="group flex items-center justify-center px-6 sm:px-10 py-3.5 sm:py-5 bg-figma-red text-white font-sans font-bold text-[14px] sm:text-[16px] md:text-[18px] uppercase tracking-wide rounded-xl sm:rounded-[2px] w-full sm:w-auto hover:bg-figma-dark-red transition-all duration-300 shadow-xl shadow-figma-red/20 focus-ring active:scale-95"
                    >
                        <span>{{ $settings->get('industry_cta_btn_text', 'Konsultasi BKK & Magang') }}</span>
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 ml-2.5 sm:ml-3 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    
                    <a 
                        href="{{ route('academic.facilities') }}" 
                        class="flex items-center justify-center px-6 sm:px-10 py-3.5 sm:py-5 border-2 border-white/20 bg-white/5 backdrop-blur-sm text-white font-sans font-bold text-[14px] sm:text-[16px] md:text-[18px] uppercase tracking-wide rounded-xl sm:rounded-[2px] w-full sm:w-auto hover:bg-white/10 hover:border-white/40 transition-all duration-300 focus-ring active:scale-95"
                    >
                        <span>Lihat Fasilitas Bengkel</span>
                    </a>
                </div>
                
            </div>
        </section>

    </main>

    <!-- Floating Scroll To Top Button -->
    <x-frontend.home.scroll-to-top />

</x-layouts.app>
