<x-layouts.app :title="$partner->name . ' - Mitra Industri & AHASS'" :no-padding-top="true">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "{{ $partner->name }}",
      "url": "{{ $partner->website ?? url()->current() }}",
      "description": "Kemitraan Kelas Industri Resmi Kurikulum Sepeda Motor SMK Negeri 1 Bangsri dengan PT Astra Honda Motor (AHM)."
    }
    </script>
    @endpush

    <!-- Main Layout Wrapper -->
    <main class="flex flex-col items-center w-full overflow-hidden relative bg-[#FAFAFA]">

        <!-- ============================================================================ -->
        <!-- 01. HERO BANNER: KEMITRAAN INDUSTRI HONDA (Cinematic & Confident) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-16 sm:py-20 lg:py-24 relative overflow-hidden text-white border-b border-charcoal-800">
            <!-- Background Photography with Overlay -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                @if($settings->get('industry_hero_bg_image'))
                    <img src="{{ Storage::url($settings->get('industry_hero_bg_image')) }}" alt="Hero Background" class="w-full h-full object-cover mix-blend-overlay opacity-30 grayscale" loading="eager">
                @elseif($partner->logo)
                    <img src="{{ Storage::url($partner->logo) }}" alt="Hero Background" class="w-full h-full object-cover mix-blend-overlay opacity-15 grayscale blur-md" loading="eager">
                @else
                    <img src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?q=80&w=1600&auto=format&fit=crop" alt="Hero Background" class="w-full h-full object-cover mix-blend-overlay opacity-25 grayscale" loading="eager">
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
                        {{ $settings->get('industry_hero_badge', 'KEMITRAAN KELAS INDUSTRI RESMI') }}
                    </span>
                    <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                </div>

                <!-- Main Heading -->
                <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.1] tracking-tight text-white uppercase mb-4 max-w-4xl drop-shadow-md reveal-on-scroll reveal-up delay-100">
                    {{ $partner->name }}
                </h1>

                <!-- Grade Status Pill -->
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs sm:text-sm font-bold mb-6 reveal-on-scroll reveal-up delay-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                </div>

                <!-- Subtitle Description -->
                <p class="font-sans text-base sm:text-lg text-gray-300 leading-relaxed max-w-3xl mx-auto mb-10 reveal-on-scroll reveal-up delay-300">
                    {{ $settings->get('industry_hero_subtitle', 'Program kemitraan strategis kurikulum injeksi PGM-FI, fasilitas bengkel standar AHASS Grade A+, serta penyerapan magang dan kerja di jaringan bengkel resmi AHASS se-Kabupaten Jepara.') }}
                </p>

                <!-- 4 Metrics Strip (Confident, Normal Sizing) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 divide-x-0 md:divide-x md:divide-charcoal-800 pt-8 border-t border-charcoal-800 w-full max-w-4xl reveal-on-scroll reveal-up delay-400">
                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('industry_stat_1_val', '2016') }}
                        </div>
                        <div class="w-6 h-[2px] bg-figma-red mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">Awal Kemitraan</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $branches->count() }} Cabang
                        </div>
                        <div class="w-6 h-[2px] bg-emerald-500 mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">AHASS di Jepara</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('industry_stat_3_val', '100%') }}
                        </div>
                        <div class="w-6 h-[2px] bg-amber-500 mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">Sinkron Kurikulum</div>
                    </div>

                    <div class="flex flex-col items-center md:items-start text-center md:text-left px-3">
                        <div class="font-heading font-black text-3xl sm:text-4xl text-white mb-1.5">
                            {{ $settings->get('industry_stat_4_val', 'Grade A+') }}
                        </div>
                        <div class="w-6 h-[2px] bg-figma-red mb-2 mx-auto md:mx-0"></div>
                        <div class="font-sans text-xs sm:text-sm uppercase tracking-wider text-gray-400 font-semibold">Akreditasi Bengkel</div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 02. OVERVIEW SINERGI & LEGALITAS MOU (Unified Split Screen) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-white border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    
                    <!-- Left: Narrative & Key Highlights (7 Cols) -->
                    <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                                Mitra Utama Industri
                            </span>
                        </div>

                        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark mb-4 leading-tight">
                            {{ $partner->name }}
                        </h2>

                        <div class="pl-4 border-l-2 border-figma-red mb-6">
                            <p class="font-sans font-bold text-base text-figma-dark">
                                {{ $partner->industry_type ?? 'Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)' }}
                            </p>
                            <p class="font-sans text-sm text-gray-600 mt-1">
                                Sinergi kemitraan vokasi link & match terpadu sejak 2016 guna menjamin penguasaan teknologi injeksi PGM-FI dan kesiapan teknisi handal.
                            </p>
                        </div>

                        <!-- Narrative -->
                        <div class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed mb-8">
                            {!! \App\Support\HtmlSanitizer::clean($partner->description) !!}
                        </div>

                        <!-- 4 Highlights Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center gap-3 p-4 bg-gray-50/80 border border-gray-200 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-figma-red/10 text-figma-red flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-figma-dark">Kurikulum Injeksi PGM-FI AMTC</span>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-gray-50/80 border border-gray-200 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-figma-red/10 text-figma-red flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-figma-dark">Lab Standar AHASS Grade A+</span>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-gray-50/80 border border-gray-200 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-figma-red/10 text-figma-red flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-figma-dark">Magang PKL 6 Bulan di AHASS</span>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-gray-50/80 border border-gray-200 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-figma-red/10 text-figma-red flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-figma-dark">Jalur Cepat Rekrutmen BKK</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Official MoU Status Card (5 Cols) -->
                    <div class="lg:col-span-5 reveal-on-scroll reveal-up delay-100">
                        <div class="bg-gray-50/80 border border-gray-200 p-6 sm:p-8 rounded-2xl shadow-xs">
                            <div class="flex items-center justify-between pb-4 border-b border-gray-200 mb-6">
                                <div class="flex items-center gap-3">
                                    @if($partner->logo)
                                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-10 w-auto object-contain">
                                    @else
                                        <div class="w-10 h-10 bg-figma-red text-white font-heading font-black text-sm flex items-center justify-center rounded-xl">
                                            AHM
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="font-heading font-bold text-base text-figma-dark">Legalitas Kerjasama</h3>
                                        <span class="text-xs text-gray-500">Memorandum of Understanding</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase">
                                    Aktif
                                </span>
                            </div>

                            <div class="space-y-4 font-sans text-sm mb-6">
                                <div class="flex justify-between pb-3 border-b border-gray-200/80">
                                    <span class="text-gray-500">Status Kemitraan:</span>
                                    <strong class="text-figma-dark">{{ $partner->partnership_level ?? 'Kelas Industri Grade A+' }}</strong>
                                </div>
                                <div class="flex justify-between pb-3 border-b border-gray-200/80">
                                    <span class="text-gray-500">Nomor Registrasi MoU:</span>
                                    <strong class="text-figma-dark font-mono text-xs">{{ $partner->mou_number ?? 'MOU/AHM-SMKN1BGS/2016-REV' }}</strong>
                                </div>
                                <div class="flex justify-between pb-3 border-b border-gray-200/80">
                                    <span class="text-gray-500">Mulai Binaan:</span>
                                    <strong class="text-figma-dark">{{ $partner->partnership_start_year ?? 'Tahun 2016' }}</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Jejaring Bengkel Resmi:</span>
                                    <strong class="text-emerald-700 font-bold">{{ $branches->count() }} Cabang AHASS Jepara</strong>
                                </div>
                            </div>

                            <div class="p-4 bg-white rounded-xl border border-gray-200 mb-6 text-xs text-gray-600 leading-relaxed">
                                <strong class="text-figma-dark block mb-1">Cakupan Payung Hukum:</strong>
                                Sinkronisasi kompetensi kurikulum nasional, pengadaan modul resmi AMTC, pelatihan guru berkala di Astra Motor Training Center, dan penempatan PKL wajib.
                            </div>

                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-figma-dark text-white hover:bg-charcoal-800 text-sm font-semibold transition-colors">
                                    <span>Kunjungi Portal Resmi Astra Honda</span>
                                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 03. 6 PILAR KERJASAMA HONDA (Clean 3-Column Grid) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-gray-50 border-b border-gray-200/80 relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16 reveal-on-scroll reveal-up">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                            Sinergi Link & Match
                        </span>
                        <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                    </div>
                    <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight mb-4">
                        6 Pilar Kerjasama Strategis
                    </h2>
                    <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                        Implementasi nyata kemitraan SMK Negeri 1 Bangsri dengan PT Astra Honda Motor dalam mewujudkan pendidikan vokasi bermutu tinggi.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    
                    <!-- Pilar 1 -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-7 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up">
                        <div>
                            <div class="w-11 h-11 rounded-xl bg-figma-red/10 text-figma-red font-heading font-bold text-base flex items-center justify-center mb-5 group-hover:bg-figma-red group-hover:text-white transition-colors">
                                01
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_1_title', 'Sinkronisasi Kurikulum Industri') }}
                            </h3>
                            <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_pillar_1_desc', 'Penyelarasan silabus Kurikulum Merdeka dengan standar kompetensi teknis Astra Honda Motor (AMTC Level 1 & 2), memastikan penguasaan teknologi injeksi PGM-FI dan eSP+ mutakhir.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 2 -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-7 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-100">
                        <div>
                            <div class="w-11 h-11 rounded-xl bg-figma-red/10 text-figma-red font-heading font-bold text-base flex items-center justify-center mb-5 group-hover:bg-figma-red group-hover:text-white transition-colors">
                                02
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_2_title', 'Praktik Kerja Lapangan (PKL) AHASS') }}
                            </h3>
                            <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_pillar_2_desc', 'Siswa diterjunkan magang selama 6 bulan penuh di jaringan bengkel resmi AHASS se-Kabupaten Jepara dan Karesidenan Pati untuk merasakan ritme kerja industri sesungguhnya.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 3 -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-7 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-200">
                        <div>
                            <div class="w-11 h-11 rounded-xl bg-figma-red/10 text-figma-red font-heading font-bold text-base flex items-center justify-center mb-5 group-hover:bg-figma-red group-hover:text-white transition-colors">
                                03
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_3_title', 'Teaching Factory (TeFa) Standar AHASS') }}
                            </h3>
                            <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_pillar_3_desc', 'Implementasi bengkel operasional berstandar bengkel resmi di sekolah, melayani servis riil kendaraan masyarakat dengan standar operasional prosedur (SOP) Astra Honda.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 4 -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-7 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up">
                        <div>
                            <div class="w-11 h-11 rounded-xl bg-figma-red/10 text-figma-red font-heading font-bold text-base flex items-center justify-center mb-5 group-hover:bg-figma-red group-hover:text-white transition-colors">
                                04
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_4_title', 'Bantuan Sarana & Special Tools') }}
                            </h3>
                            <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_pillar_4_desc', 'Dukungan unit sepeda motor praktik Honda generasi terbaru, alat diagnostik HIDS (Honda Intelligent Diagnostic System), dan special service tools resmi pabrikan.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 5 -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-7 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-100">
                        <div>
                            <div class="w-11 h-11 rounded-xl bg-figma-red/10 text-figma-red font-heading font-bold text-base flex items-center justify-center mb-5 group-hover:bg-figma-red group-hover:text-white transition-colors">
                                05
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_5_title', 'Uji Sertifikasi Mekanik Berstandar Honda') }}
                            </h3>
                            <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_pillar_5_desc', 'Pelaksanaan Uji Kompetensi Keahlian (UKK) dinilai langsung oleh asesor eksternal dari industri Astra Motor serta sertifikasi LSP-P1 berlisensi BNSP.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 6 -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-7 hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll reveal-up delay-200">
                        <div>
                            <div class="w-11 h-11 rounded-xl bg-figma-red/10 text-figma-red font-heading font-bold text-base flex items-center justify-center mb-5 group-hover:bg-figma-red group-hover:text-white transition-colors">
                                06
                            </div>
                            <h3 class="font-heading font-bold text-xl text-figma-dark mb-3 group-hover:text-figma-red transition-colors">
                                {{ $settings->get('industry_pillar_6_title', 'Prioritas Rekrutmen BKK SMKN 1 Bangsri') }}
                            </h3>
                            <p class="font-sans text-sm sm:text-base text-gray-600 leading-relaxed">
                                {{ $settings->get('industry_pillar_6_desc', 'Jalur cepat (fast-track) rekrutmen mekanik baru bagi lulusan TBSM SMKN 1 Bangsri langsung ke dealer dan bengkel AHASS rekanan tanpa perantara.') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 04. DIREKTORI 8 CABANG AHASS DI JEPARA (Interactive Search & Filters) -->
        <!-- ============================================================================ -->
        <section class="w-full py-16 sm:py-20 lg:py-24 bg-white border-b border-gray-200/80 relative" 
                 x-data="{ 
                     selectedDistrict: 'all', 
                     searchQuery: '',
                     selectedBranch: null
                 }">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
                
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 sm:mb-12 reveal-on-scroll reveal-up">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 sm:w-12 h-[2px] bg-figma-red"></div>
                            <span class="font-sans font-bold text-xs sm:text-sm tracking-[2px] text-figma-gray uppercase">
                                Jaringan Mitra AHASS Jepara
                            </span>
                        </div>
                        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-figma-dark tracking-tight leading-tight">
                            Direktori Cabang Bengkel Resmi AHASS
                        </h2>
                    </div>
                    <p class="font-sans text-sm sm:text-base text-gray-600 max-w-md leading-relaxed">
                        Lokasi Praktik Kerja Lapangan (PKL) siswa dan penyerapan rekrutmen kerja lulusan yang tersebar di wilayah Kabupaten Jepara.
                    </p>
                </div>

                <!-- Interactive Search & District Filter Controls -->
                <div class="bg-gray-50/80 border border-gray-200 p-5 rounded-2xl mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
                    
                    <!-- District Pills -->
                    <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                        <button 
                            @click="selectedDistrict = 'all'"
                            :class="selectedDistrict === 'all' ? 'bg-figma-dark text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200'"
                            class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                        >
                            Semua ({{ $branches->count() }})
                        </button>

                        @php
                            $districts = $branches->pluck('city')->unique()->filter()->values();
                        @endphp
                        @foreach($districts as $district)
                            <button 
                                @click="selectedDistrict = '{{ $district }}'"
                                :class="selectedDistrict === '{{ $district }}' ? 'bg-figma-dark text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200'"
                                class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                            >
                                {{ $district }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Search Input -->
                    <div class="w-full md:w-72 relative">
                        <input 
                            type="text" 
                            x-model="searchQuery" 
                            placeholder="Cari cabang AHASS..." 
                            class="w-full pl-10 pr-4 py-2 text-xs sm:text-sm bg-white border border-gray-200 rounded-full focus:outline-none focus:border-figma-red focus:ring-1 focus:ring-figma-red transition-all"
                        >
                        <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                </div>

                <!-- Branches 4-Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($branches as $branch)
                        <div 
                            x-show="(selectedDistrict === 'all' || selectedDistrict === '{{ $branch->city }}') && 
                                    ('{{ strtolower($branch->name . ' ' . $branch->address . ' ' . $branch->city) }}'.includes(searchQuery.toLowerCase()))"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="bg-white border border-gray-200 rounded-2xl p-6 shadow-xs hover:border-figma-red hover:shadow-xl transition-all duration-300 flex flex-col justify-between group"
                        >
                            <div>
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="text-xs font-bold text-figma-red bg-figma-red/10 px-2.5 py-1 rounded-full uppercase tracking-wider">
                                        {{ $branch->city ?? 'Jepara' }}
                                    </span>
                                    <span class="text-xs font-mono font-bold text-gray-400">
                                        AHASS
                                    </span>
                                </div>

                                <h3 class="font-heading font-bold text-lg text-figma-dark mb-2 group-hover:text-figma-red transition-colors line-clamp-1">
                                    {{ $branch->name }}
                                </h3>

                                <p class="font-sans text-sm text-gray-600 leading-relaxed mb-4 line-clamp-2">
                                    {{ $branch->address ?? 'Kecamatan ' . $branch->city . ', Kabupaten Jepara' }}
                                </p>

                                <div class="space-y-1.5 font-sans text-xs text-gray-500 mb-6">
                                    @if($branch->contact_person)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span class="truncate">SA: {{ $branch->contact_person }}</span>
                                        </div>
                                    @endif
                                    @if($branch->phone)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span>{{ $branch->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2">
                                @if($branch->phone)
                                    @php
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $branch->phone);
                                        if (str_starts_with($cleanPhone, '0')) {
                                            $cleanPhone = '62' . substr($cleanPhone, 1);
                                        }
                                    @endphp
                                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Halo AHASS ' . $branch->name . ', saya ingin bertanya mengenai layanan servis / informasi PKL siswa TBSM SMKN 1 Bangsri.') }}" 
                                       target="_blank" 
                                       class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold transition-colors">
                                        <span>WhatsApp</span>
                                    </a>
                                @endif

                                @if($branch->maps_url)
                                    <a href="{{ $branch->maps_url }}" 
                                       target="_blank" 
                                       class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Rute Maps</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-400">
                            Belum ada data cabang bengkel resmi AHASS yang ditambahkan.
                        </div>
                    @endforelse
                </div>

            </div>
        </section>

        <!-- ============================================================================ -->
        <!-- 05. CALL TO ACTION: BKK & HUBIN (Confident Closing Banner) -->
        <!-- ============================================================================ -->
        <section class="w-full bg-figma-dark py-16 sm:py-20 relative overflow-hidden text-center text-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8 relative z-10 reveal-on-scroll reveal-up">
                <span class="font-sans font-bold text-xs sm:text-sm text-figma-red uppercase tracking-wider block mb-3">
                    {{ $settings->get('industry_cta_badge', 'HUBIN & BKK SMKN 1 BANGSRI') }}
                </span>
                <h2 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-white leading-tight mb-4">
                    {{ $settings->get('industry_cta_title', 'Tertarik Bekerjasama atau Merekrut Lulusan Kami?') }}
                </h2>
                <p class="font-sans text-sm sm:text-base text-gray-300 leading-relaxed mb-8 max-w-xl mx-auto">
                    {{ $settings->get('industry_cta_desc', 'Bursa Kerja Khusus (BKK) SMK Negeri 1 Bangsri siap memfasilitasi kebutuhan tenaga teknisi otomotif kompeten dan berintegritas untuk jaringan industri otomotif.') }}
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ url($settings->get('industry_cta_button_url', '/kontak')) }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-figma-red text-white hover:bg-red-700 font-sans font-bold text-sm sm:text-base shadow-lg hover:shadow-xl transition-all">
                        <span>{{ $settings->get('industry_cta_button_text', 'Hubungi Hubin & BKK') }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('academic.programs') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-sans font-bold text-sm sm:text-base border border-white/20 transition-all">
                        <span>Kurikulum Akademik</span>
                    </a>
                </div>
            </div>
        </section>

    </main>
</x-layouts.app>
