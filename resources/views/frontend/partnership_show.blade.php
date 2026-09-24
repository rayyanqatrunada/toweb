<x-layouts.app title="Kemitraan Industri Resmi - PT Astra Honda Motor">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "{{ $partner->name }}",
      "url": "{{ $partner->website }}",
      "description": "Kemitraan Kelas Industri Binaan PT Astra Honda Motor untuk {{ $settings->get('site_name', 'Teknik Sepeda Motor') }} {{ $settings->get('school_name', 'SMK Negeri 1 Bangsri') }}."
    }
    </script>
    @endpush

    <!-- ============================================================================ -->
    <!-- 01. HERO SECTION: KEMITRAAN INDUSTRI RESMI ASTRA HONDA -->
    <!-- ============================================================================ -->
    <section class="relative bg-charcoal-950 text-white overflow-hidden pt-12 pb-16 lg:pt-16 lg:pb-24 border-b border-charcoal-800">
        <!-- Background Imagery -->
        @if($partner->banner_image && Storage::disk('public')->exists($partner->banner_image))
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ Storage::url($partner->banner_image) }}')"></div>
        @elseif($settings->get('industry_hero_bg_image'))
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ Storage::url($settings->get('industry_hero_bg_image')) }}')"></div>
        @else
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-20 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ asset('storage/facilities/bengkel-tefa-praktik.png') }}')"></div>
        @endif

        <div class="absolute inset-0 z-0 bg-gradient-to-b from-charcoal-950/80 via-charcoal-950/90 to-charcoal-950 pointer-events-none"></div>

        <!-- Technical Wireframe Accent -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-10" style="background-image: linear-gradient(to right, #ffffff 1px, transparent 1px), linear-gradient(to bottom, #ffffff 1px, transparent 1px); background-size: 3rem 3rem;"></div>
        
        <!-- Glowing Red Accent -->
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-primary-600/15 rounded-full blur-[140px] pointer-events-none -translate-y-1/2"></div>

        <x-frontend.layout.container class="relative z-10">
            <div class="max-w-4xl mx-auto text-center flex flex-col items-center">
                <!-- Eyebrow Pill -->
                <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-[11px] font-black uppercase tracking-[0.2em] text-primary-400 mb-6 shadow-sm reveal-on-scroll reveal-up">
                    <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                    {{ $settings->get('industry_hero_badge', 'KEMITRAAN KELAS INDUSTRI RESMI') }}
                </div>

                <!-- Logo & Dual Partnership Emblem -->
                <div class="flex items-center justify-center gap-4 sm:gap-6 mb-8 reveal-on-scroll reveal-up delay-100">
                    <div class="w-20 h-20 sm:w-28 sm:h-28 rounded-2xl bg-white p-3.5 shadow-2xl flex items-center justify-center border-2 border-white/20 transform hover:scale-105 transition-transform">
                        @if($partner->logo && Storage::disk('public')->exists($partner->logo))
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                        @else
                            <img src="{{ asset('storage/industry_partners/01M1DB84NZV7C26TS184CWVE8F.png') }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                        @endif
                    </div>
                    
                    <div class="flex flex-col items-center justify-center text-charcoal-400">
                        <span class="text-xs uppercase tracking-widest font-black text-primary-400 mb-0.5">Sinergi</span>
                        <div class="w-6 h-0.5 bg-primary-500 my-1"></div>
                        <span class="text-[10px] uppercase tracking-wider text-charcoal-300">Binaan Sejak 2016</span>
                    </div>

                    <div class="w-20 h-20 sm:w-28 sm:h-28 rounded-2xl bg-white p-3.5 shadow-2xl flex items-center justify-center border-2 border-white/20 transform hover:scale-105 transition-transform">
                        @if($schoolLogo = $settings->get('site_logo'))
                            <img src="{{ Storage::url($schoolLogo) }}" alt="{{ $settings->get('school_name', 'SMKN 1 Bangsri') }}" class="w-full h-full object-contain">
                        @else
                            <div class="w-full h-full rounded-xl bg-charcoal-900 text-white font-black text-xl flex items-center justify-center">
                                TBSM
                            </div>
                        @endif
                    </div>
                </div>

                <!-- H1 Title -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.08] mb-4 uppercase reveal-on-scroll reveal-up delay-200">
                    {!! nl2br(e($settings->get('industry_hero_title', 'Kemitraan Industri Dengan PT Astra Honda Motor'))) !!}
                </h1>

                <!-- Level / Status Pill -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold mb-6">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                </div>

                <!-- Lead Paragraph -->
                <p class="text-base sm:text-lg lg:text-xl text-charcoal-300 font-normal leading-relaxed max-w-3xl mb-10 reveal-on-scroll reveal-up delay-300">
                    {{ $settings->get('industry_hero_subtitle', 'Komitmen strategis sejak 2016 antara SMK Negeri 1 Bangsri dengan PT Astra Honda Motor (AHM) untuk mencetak teknisi sepeda motor profesional berstandar bengkel resmi AHASS.') }}
                </p>

                <!-- 4 Metrics Bar -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 w-full max-w-4xl reveal-on-scroll reveal-up delay-400">
                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-primary-400 mb-1">
                            {{ $settings->get('industry_stat_1_val', '2016') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('industry_stat_1_label', 'Awal Kemitraan Resmi Honda') }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-emerald-400 mb-1">
                            {{ $branches->count() }} Cabang
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('industry_stat_2_label', 'Jaringan AHASS Mitra di Jepara') }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-amber-400 mb-1">
                            {{ $settings->get('industry_stat_3_val', '100%') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('industry_stat_3_label', 'Penyaluran Magang PKL Siswa') }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:bg-white/10 transition-colors">
                        <span class="block text-2xl sm:text-3xl lg:text-4xl font-black text-sky-400 mb-1">
                            {{ $settings->get('industry_stat_4_val', 'Grade A+') }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-charcoal-300">
                            {{ $settings->get('industry_stat_4_label', 'Standarisasi Kelas Industri') }}
                        </span>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 02. PROFIL PERUSAHAAN & DOKUMEN PERJANJIAN (MoU) -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-white border-b border-charcoal-200">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                <!-- Left: Description and Narrative -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-primary-100 text-primary-700 text-xs font-bold tracking-wider uppercase mb-3">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            PROFIL MITRA UTAMA
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase leading-tight">
                            {{ $partner->name }}
                        </h2>
                        <span class="block text-sm sm:text-base font-bold text-primary-600 mt-1">
                            {{ $partner->industry_type ?? 'Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)' }}
                        </span>
                    </div>

                    <div class="prose max-w-none text-charcoal-600 text-sm sm:text-base leading-relaxed">
                        {!! \App\Support\HtmlSanitizer::clean($partner->description) !!}
                    </div>

                    @if($partner->curriculum_sync_info)
                        <div class="p-5 rounded-2xl bg-charcoal-50 border border-charcoal-200">
                            <h4 class="text-xs font-black uppercase tracking-wider text-charcoal-900 mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Sinkronisasi Kurikulum & Modul Ajar
                            </h4>
                            <p class="text-xs sm:text-sm text-charcoal-700 leading-relaxed">
                                {{ $partner->curriculum_sync_info }}
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Right: MoU & Legal Information Box (Double-bezel hardware styling) -->
                <div class="lg:col-span-5">
                    <div class="p-2 rounded-3xl bg-charcoal-100 border border-charcoal-200 shadow-sm">
                        <div class="p-6 sm:p-7 rounded-[1.25rem] bg-charcoal-900 text-white space-y-6">
                            <div class="flex items-center justify-between pb-4 border-b border-white/10">
                                <div>
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-primary-400 block">Surat Perjanjian Kerjasama</span>
                                    <h3 class="text-base sm:text-lg font-black uppercase">Memorandum of Understanding (MoU)</h3>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500 text-white">
                                    Resmi Aktif
                                </span>
                            </div>

                            <div class="space-y-4 text-xs">
                                <div>
                                    <span class="text-charcoal-400 block mb-0.5">Nomor Perjanjian Kerjasama (MoU):</span>
                                    <span class="font-mono font-bold text-sm text-white">{{ $partner->mou_number ?? '042/MoU-AHM/SMKN1BSR/TBSM/2021' }}</span>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <span class="text-charcoal-400 block mb-0.5">Tahun Awal:</span>
                                        <span class="font-bold text-white">{{ $partner->mou_start_date ? $partner->mou_start_date->format('d M Y') : '1 Agustus 2016' }}</span>
                                    </div>
                                    <div>
                                        <span class="text-charcoal-400 block mb-0.5">Masa Berlaku s/d:</span>
                                        <span class="font-bold text-white">{{ $partner->mou_end_date ? $partner->mou_end_date->format('d M Y') : '1 Agustus 2027 (Diperbarui)' }}</span>
                                    </div>
                                </div>

                                <div>
                                    <span class="text-charcoal-400 block mb-0.5">Tingkat / Akreditasi Binaan:</span>
                                    <span class="font-bold text-emerald-400 text-sm">{{ $partner->partnership_level ?? 'Kelas Industri Binaan Grade A+' }}</span>
                                </div>

                                <div>
                                    <span class="text-charcoal-400 block mb-0.5">Kantor Pusat Perusahaan:</span>
                                    <span class="font-medium text-charcoal-200">{{ $partner->address ?? 'Jl. Laksda Yos Sudarso, Sunter I, Jakarta Utara 14350' }}</span>
                                </div>

                                @if($partner->phone)
                                    <div>
                                        <span class="text-charcoal-400 block mb-0.5">Kontak Hotline:</span>
                                        <span class="font-medium text-charcoal-200">{{ $partner->phone }}</span>
                                    </div>
                                @endif
                            </div>

                            @if($partner->website)
                                <a 
                                    href="{{ Str::startsWith($partner->website, 'http') ? $partner->website : 'https://' . $partner->website }}" 
                                    target="_blank" 
                                    class="w-full py-3 px-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-2 transition-all border border-white/10"
                                >
                                    <span>Kunjungi Situs Resmi Astra Honda</span>
                                    <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 03. 6 PILAR KERJASAMA KELAS INDUSTRI HONDA -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-charcoal-50 border-b border-charcoal-200">
        <x-frontend.layout.container>
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-charcoal-200 text-charcoal-800 text-xs font-bold tracking-wider uppercase mb-3">
                    SINERGI PENDIDIKAN VOKASI
                </div>
                <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                    6 Pilar Kelas Industri Astra Honda
                </h2>
                <p class="text-charcoal-600 text-sm sm:text-base mt-2">
                    Bentuk komitmen nyata PT Astra Honda Motor dalam mengembangkan potensi generasi muda melalui ekosistem vokasi terpadu.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Pilar 1 -->
                <div class="p-6 sm:p-7 rounded-3xl bg-white border border-charcoal-200 hover:border-primary-500 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black text-lg mb-5 group-hover:scale-110 transition-transform">
                            01
                        </div>
                        <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3">
                            {{ $settings->get('industry_pillar_1_title', 'Sinkronisasi Kurikulum Industri') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_1_desc', 'Penyelarasan silabus Kurikulum Merdeka dengan standar kompetensi teknis Astra Honda Motor (AMTC Level 1 & 2), memastikan penguasaan teknologi injeksi PGM-FI dan eSP+ mutakhir.') }}
                        </p>
                    </div>
                </div>

                <!-- Pilar 2 -->
                <div class="p-6 sm:p-7 rounded-3xl bg-white border border-charcoal-200 hover:border-primary-500 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black text-lg mb-5 group-hover:scale-110 transition-transform">
                            02
                        </div>
                        <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3">
                            {{ $settings->get('industry_pillar_2_title', 'Praktik Kerja Lapangan (PKL) AHASS') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_2_desc', 'Siswa diterjunkan magang selama 6 bulan penuh di jaringan bengkel resmi AHASS se-Kabupaten Jepara dan Karesidenan Pati untuk merasakan ritme kerja industri sesungguhnya.') }}
                        </p>
                    </div>
                </div>

                <!-- Pilar 3 -->
                <div class="p-6 sm:p-7 rounded-3xl bg-white border border-charcoal-200 hover:border-primary-500 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black text-lg mb-5 group-hover:scale-110 transition-transform">
                            03
                        </div>
                        <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3">
                            {{ $settings->get('industry_pillar_3_title', 'Teaching Factory (TeFa) Standar AHASS') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_3_desc', 'Implementasi bengkel operasional berstandar bengkel resmi di sekolah, melayani servis riil kendaraan masyarakat dengan standar operasional prosedur (SOP) Astra Honda.') }}
                        </p>
                    </div>
                </div>

                <!-- Pilar 4 -->
                <div class="p-6 sm:p-7 rounded-3xl bg-white border border-charcoal-200 hover:border-primary-500 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black text-lg mb-5 group-hover:scale-110 transition-transform">
                            04
                        </div>
                        <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3">
                            {{ $settings->get('industry_pillar_4_title', 'Bantuan Sarana & Special Tools (SST)') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_4_desc', 'Dukungan unit sepeda motor praktik Honda generasi terbaru, alat diagnostik HIDS (Honda Intelligent Diagnostic System), dan special service tools resmi pabrikan.') }}
                        </p>
                    </div>
                </div>

                <!-- Pilar 5 -->
                <div class="p-6 sm:p-7 rounded-3xl bg-white border border-charcoal-200 hover:border-primary-500 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black text-lg mb-5 group-hover:scale-110 transition-transform">
                            05
                        </div>
                        <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3">
                            {{ $settings->get('industry_pillar_5_title', 'Uji Sertifikasi Mekanik Berstandar Honda') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_5_desc', 'Pelaksanaan Uji Kompetensi Keahlian (UKK) dinilai langsung oleh asesor eksternal dari industri Astra Motor serta sertifikasi LSP-P1 berlisensi BNSP.') }}
                        </p>
                    </div>
                </div>

                <!-- Pilar 6 -->
                <div class="p-6 sm:p-7 rounded-3xl bg-white border border-charcoal-200 hover:border-primary-500 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black text-lg mb-5 group-hover:scale-110 transition-transform">
                            06
                        </div>
                        <h3 class="text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3">
                            {{ $settings->get('industry_pillar_6_title', 'Prioritas Rekrutmen BKK SMKN 1 Bangsri') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_pillar_6_desc', 'Jalur cepat (fast-track) rekrutmen mekanik baru bagi lulusan TBSM SMKN 1 Bangsri langsung ke dealer dan bengkel AHASS rekanan tanpa perantara.') }}
                        </p>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 04. JARINGAN CABANG BENGKEL RESMI AHASS SE-KABUPATEN JEPARA -->
    <!-- ============================================================================ -->
    <section 
        class="py-16 lg:py-24 bg-white border-b border-charcoal-200"
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
        <x-frontend.layout.container>
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-emerald-100 text-emerald-800 text-xs font-bold tracking-wider uppercase mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        SEBARAN LOKASI PRAKTIK INDUSTRI
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                        Jaringan Bengkel AHASS di Kabupaten Jepara
                    </h2>
                    <p class="text-charcoal-600 text-sm sm:text-base mt-2 max-w-2xl">
                        Daftar bengkel resmi mitra penempatan Praktik Kerja Lapangan (PKL) siswa TBSM SMKN 1 Bangsri di wilayah Kabupaten Jepara.
                    </p>
                </div>

                <!-- Stats Summary -->
                <div class="flex items-center gap-3">
                    <div class="px-4 py-2.5 rounded-2xl bg-charcoal-50 border border-charcoal-200 text-xs font-bold text-charcoal-800 shadow-2xs">
                        <span>Total: <strong>{{ $branches->count() }}</strong> Cabang AHASS</span>
                    </div>
                    <div class="px-4 py-2.5 rounded-2xl bg-primary-50 border border-primary-200 text-xs font-bold text-primary-800 shadow-2xs">
                        <span>Wilayah: <strong>Kabupaten Jepara</strong></span>
                    </div>
                </div>
            </div>

            <!-- Search and District Filter Bar -->
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4 mb-8">
                <!-- Search Input -->
                <div class="relative max-w-md w-full">
                    <input 
                        type="text" 
                        x-model="searchQuery"
                        placeholder="Cari cabang AHASS, kecamatan, atau alamat..." 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-charcoal-300 bg-white text-xs sm:text-sm font-medium focus:ring-2 focus:ring-primary-500 focus:outline-hidden"
                    >
                    <svg class="w-4 h-4 text-charcoal-400 absolute left-3.5 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- District Filter Pills -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-2 md:pb-0">
                    <button 
                        @click="selectedDistrict = 'all'"
                        :class="selectedDistrict === 'all' 
                            ? 'bg-charcoal-900 text-white shadow-xs' 
                            : 'bg-charcoal-100 text-charcoal-700 hover:bg-charcoal-200'"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all shrink-0 cursor-pointer"
                    >
                        Semua Wilayah ({{ $branches->count() }})
                    </button>

                    @foreach($districts as $dst)
                        @php
                            $dstCount = $branches->where('district', $dst)->count();
                        @endphp
                        <button 
                            @click="selectedDistrict = '{{ $dst }}'"
                            :class="selectedDistrict === '{{ $dst }}' 
                                ? 'bg-charcoal-900 text-white shadow-xs' 
                                : 'bg-charcoal-100 text-charcoal-700 hover:bg-charcoal-200'"
                            class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all shrink-0 cursor-pointer flex items-center gap-1.5"
                        >
                            <span>{{ $dst }}</span>
                            <span class="text-[10px] opacity-75">({{ $dstCount }})</span>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Branches Cards Grid -->
            @if($branches && $branches->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                            class="flex flex-col bg-white rounded-3xl border {{ $branch->is_main_branch ? 'border-primary-500 shadow-md ring-2 ring-primary-500/10' : 'border-charcoal-200 shadow-xs' }} overflow-hidden hover:shadow-lg transition-all duration-300 group justify-between"
                        >
                            <!-- Top Header Bar -->
                            <div class="p-6 pb-4">
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-primary-100 text-primary-800">
                                            Kec. {{ $branch->district }}
                                        </span>
                                        @if($branch->branch_code)
                                            <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-charcoal-100 text-charcoal-700 font-mono">
                                                {{ $branch->branch_code }}
                                            </span>
                                        @endif
                                    </div>

                                    @if($branch->is_main_branch)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-black bg-amber-500 text-white shadow-2xs shrink-0">
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            Cabang Utama
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-base sm:text-lg font-black text-charcoal-900 group-hover:text-primary-600 transition-colors leading-snug mb-2">
                                    {{ $branch->name }}
                                </h3>

                                <p class="text-xs text-charcoal-600 leading-relaxed flex items-start gap-1.5 mb-4">
                                    <svg class="w-4 h-4 text-charcoal-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $branch->address }}</span>
                                </p>

                                <!-- Details Badges (Quota & PIC) -->
                                <div class="space-y-2 pt-3 border-t border-charcoal-100 text-xs">
                                    @if($branch->internship_quota)
                                        <div class="flex items-center justify-between">
                                            <span class="text-charcoal-400 font-medium">Kapasitas PKL:</span>
                                            <span class="font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                                                {{ $branch->internship_quota }}
                                            </span>
                                        </div>
                                    @endif

                                    @if($branch->pic_name)
                                        <div class="flex items-center justify-between">
                                            <span class="text-charcoal-400 font-medium">Pembimbing DU/DI:</span>
                                            <span class="font-bold text-charcoal-800 line-clamp-1">{{ $branch->pic_name }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Bottom Bar -->
                            <div class="p-4 pt-0 flex items-center gap-2">
                                @if($branch->formatted_whatsapp_url)
                                    <a 
                                        href="{{ $branch->formatted_whatsapp_url }}" 
                                        target="_blank" 
                                        class="flex-1 py-2 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs flex items-center justify-center gap-1.5 transition-colors"
                                    >
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.159.579 4.178 1.594 5.922l-1.594 5.822 6.009-1.576c1.701.927 3.655 1.454 5.733 1.454 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        <span>Chat WA</span>
                                    </a>
                                @endif

                                @if($branch->google_maps_url)
                                    <a 
                                        href="{{ $branch->google_maps_url }}" 
                                        target="_blank" 
                                        class="p-2 rounded-xl bg-charcoal-100 hover:bg-charcoal-200 text-charcoal-700 hover:text-charcoal-900 transition-colors"
                                        title="Buka Peta Google Maps"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                @endif

                                <button 
                                    @click='openModal({!! $branchJson !!})'
                                    type="button"
                                    class="py-2 px-3 rounded-xl bg-charcoal-100 hover:bg-charcoal-200 text-charcoal-700 hover:text-charcoal-900 font-bold text-xs transition-colors cursor-pointer"
                                >
                                    Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-12 text-center bg-charcoal-50 rounded-3xl border border-charcoal-200">
                    <p class="text-charcoal-500 text-sm">Data cabang bengkel rekanan di Kabupaten Jepara sedang dalam proses pembaruan.</p>
                </div>
            @endif

            <!-- ==================================================================== -->
            <!-- MODAL DETAIL CABANG AHASS -->
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
                    class="fixed inset-0 bg-charcoal-950/80 backdrop-blur-sm"
                ></div>

                <div 
                    x-show="modalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-xl max-h-[90vh] bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col z-10 border border-charcoal-200"
                >
                    <div class="flex items-center justify-between px-6 py-4 border-b border-charcoal-100 bg-charcoal-50">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-primary-600 text-white" x-text="'Kec. ' + selectedBranch?.district"></span>
                            <span class="text-xs font-semibold text-charcoal-600" x-text="selectedBranch?.branch_code"></span>
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

                    <div class="p-6 overflow-y-auto space-y-5 text-xs sm:text-sm">
                        <div>
                            <h3 class="text-xl font-black text-charcoal-900" x-text="selectedBranch?.name"></h3>
                            <p class="text-charcoal-600 mt-1 flex items-start gap-1.5">
                                <svg class="w-4 h-4 text-primary-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span x-text="selectedBranch?.address"></span>
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-3 p-4 rounded-2xl bg-charcoal-50 border border-charcoal-100">
                            <div>
                                <span class="text-charcoal-400 block text-xs">Kuota PKL:</span>
                                <span class="font-bold text-emerald-700" x-text="selectedBranch?.internship_quota || '-'"></span>
                            </div>
                            <div>
                                <span class="text-charcoal-400 block text-xs">Wilayah:</span>
                                <span class="font-bold text-charcoal-800" x-text="selectedBranch?.city || 'Kabupaten Jepara'"></span>
                            </div>
                            <div>
                                <span class="text-charcoal-400 block text-xs">Kepala Bengkel / PIC:</span>
                                <span class="font-bold text-charcoal-800" x-text="selectedBranch?.pic_name || '-'"></span>
                            </div>
                            <div>
                                <span class="text-charcoal-400 block text-xs">Telepon Bengkel:</span>
                                <span class="font-bold text-charcoal-800" x-text="selectedBranch?.phone || '-'"></span>
                            </div>
                        </div>

                        <template x-if="selectedBranch?.facilities_list && selectedBranch.facilities_list.length > 0">
                            <div>
                                <h4 class="font-bold text-charcoal-900 mb-2 uppercase text-xs tracking-wider">Fasilitas Bengkel Cabang:</h4>
                                <div class="space-y-1.5">
                                    <template x-for="(fac, idx) in selectedBranch.facilities_list" :key="idx">
                                        <div class="flex items-center gap-2 p-2 rounded-lg bg-charcoal-50 text-charcoal-700">
                                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span x-text="fac"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="p-4 border-t border-charcoal-100 bg-charcoal-50 flex items-center justify-between gap-3">
                        <template x-if="selectedBranch?.google_maps_url">
                            <a :href="selectedBranch.google_maps_url" target="_blank" class="px-4 py-2 rounded-xl bg-charcoal-200 hover:bg-charcoal-300 text-charcoal-800 font-bold text-xs flex items-center gap-1.5 transition-colors">
                                <span>Petunjuk Rute Maps</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </template>

                        <div class="flex items-center gap-2 ml-auto">
                            <template x-if="selectedBranch?.formatted_wa">
                                <a :href="selectedBranch.formatted_wa" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs flex items-center gap-1.5 transition-colors">
                                    <span>WhatsApp</span>
                                </a>
                            </template>
                            <button @click="closeModal()" type="button" class="px-4 py-2 rounded-xl bg-charcoal-900 text-white font-bold text-xs hover:bg-charcoal-800 transition-colors cursor-pointer">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 05. ROADMAP 3 TAHUN SISWA MENUJU INDUSTRI -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-charcoal-50 border-b border-charcoal-200">
        <x-frontend.layout.container>
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-charcoal-200 text-charcoal-800 text-xs font-bold tracking-wider uppercase mb-3">
                    ALUR KARIR BERKESINAMBUNGAN
                </div>
                <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                    {{ $settings->get('industry_roadmap_title', 'Roadmap Penyiapan Karir Industri Siswa') }}
                </h2>
                <p class="text-charcoal-600 text-sm sm:text-base mt-2">
                    {{ $settings->get('industry_roadmap_desc', 'Pola pembinaan bertahap terstruktur sejak awal masuk hingga penempatan kerja profesional di ekosistem Astra Honda.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Fase 1 -->
                <div class="p-6 rounded-3xl bg-white border border-charcoal-200 relative shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">1</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Tahun Ke-1</span>
                        </div>
                        <h3 class="text-sm sm:text-base font-black text-charcoal-900 mb-2">
                            {{ $settings->get('industry_roadmap_1_title', 'Kelas X: Fondasi 5R & Mekanika Dasar') }}
                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_roadmap_1_desc', 'Penanaman budaya industri 5R, disiplin APD, pengenalan perkakas dasar, dan pemahaman prinsip dasar mesin sepeda motor.') }}
                        </p>
                    </div>
                </div>

                <!-- Fase 2 -->
                <div class="p-6 rounded-3xl bg-white border border-charcoal-200 relative shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">2</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Tahun Ke-2</span>
                        </div>
                        <h3 class="text-sm sm:text-base font-black text-charcoal-900 mb-2">
                            {{ $settings->get('industry_roadmap_2_title', 'Kelas XI: Kejuruan Injeksi & Praktik TeFa') }}
                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_roadmap_2_desc', 'Pendalaman teknologi injeksi PGM-FI, scanner HIDS, perawatan berkala, serta terjun langsung di unit Teaching Factory melayani konsumen.') }}
                        </p>
                    </div>
                </div>

                <!-- Fase 3 -->
                <div class="p-6 rounded-3xl bg-white border border-charcoal-200 relative shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-primary-600 text-white font-black text-xs flex items-center justify-center">3</span>
                            <span class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Tahun Ke-3</span>
                        </div>
                        <h3 class="text-sm sm:text-base font-black text-charcoal-900 mb-2">
                            {{ $settings->get('industry_roadmap_3_title', 'Kelas XII: PKL 6 Bulan di AHASS & Uji Sertifikasi') }}
                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_roadmap_3_desc', 'Imersi kerja nyata 6 bulan penuh di bengkel resmi AHASS se-Kabupaten Jepara, diakhiri dengan Uji Kompetensi Keahlian (UKK) dan sertifikasi BNSP.') }}
                        </p>
                    </div>
                </div>

                <!-- Fase 4 -->
                <div class="p-6 rounded-3xl bg-white border border-charcoal-200 relative shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-8 h-8 rounded-full bg-emerald-600 text-white font-black text-xs flex items-center justify-center">4</span>
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Karir Kerja</span>
                        </div>
                        <h3 class="text-sm sm:text-base font-black text-charcoal-900 mb-2">
                            {{ $settings->get('industry_roadmap_4_title', 'Pasca Lulus: Rekrutmen BKK & Karir Teknisi') }}
                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            {{ $settings->get('industry_roadmap_4_desc', 'Perekrutan langsung oleh jaringan AHASS, dealer Astra Motor, industri perakitan manufaktur, atau pendampingan wirausaha bengkel mandiri.') }}
                        </p>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- ============================================================================ -->
    <!-- 06. LOWONGAN KERJA / BURSA KARIR (JIKA ADA) -->
    <!-- ============================================================================ -->
    @if(isset($partner->jobVacancies) && $partner->jobVacancies->count() > 0)
        <section class="py-16 lg:py-24 bg-white border-b border-charcoal-200">
            <x-frontend.layout.container>
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                    <div>
                        <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-amber-100 text-amber-800 text-xs font-bold tracking-wider uppercase mb-3">
                            BURSA KERJA KHUSUS (BKK)
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-charcoal-900 tracking-tight uppercase">
                            Lowongan Karir Terbuka dari Mitra
                        </h2>
                        <p class="text-charcoal-600 text-sm sm:text-base mt-2">
                            Peluang penempatan kerja resmi bagi alumni dan siswa tingkat akhir SMK Negeri 1 Bangsri.
                        </p>
                    </div>

                    <span class="px-4 py-2 rounded-xl bg-charcoal-100 text-xs font-bold text-charcoal-800">
                        {{ $partner->jobVacancies->count() }} Lowongan Aktif
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($partner->jobVacancies as $job)
                        <div class="p-6 rounded-3xl bg-charcoal-50 border border-charcoal-200 flex flex-col justify-between hover:border-primary-500 transition-colors">
                            <div>
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-primary-100 text-primary-700">
                                        {{ $job->work_type ?? 'Full-time' }}
                                    </span>
                                    <span class="text-xs text-charcoal-500">{{ $job->location ?? 'Jepara & Sekitarnya' }}</span>
                                </div>
                                <h3 class="text-lg font-black text-charcoal-900 mb-2">{{ $job->title }}</h3>
                                <p class="text-xs text-charcoal-600 line-clamp-2 mb-4">{{ strip_tags($job->description) }}</p>
                            </div>

                            <a href="{{ route('jobs.show', $job->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary-600 hover:text-primary-700">
                                <span>Lihat Persyaratan & Lamar</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </x-frontend.layout.container>
        </section>
    @endif

    <!-- ============================================================================ -->
    <!-- 07. CALL TO ACTION (CTA): HUBIN & BKK -->
    <!-- ============================================================================ -->
    <section class="py-16 lg:py-24 bg-charcoal-950 text-white relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 2rem 2rem;"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-600/20 rounded-full blur-[120px] pointer-events-none"></div>

        <x-frontend.layout.container class="relative z-10">
            <div class="max-w-4xl mx-auto text-center flex flex-col items-center">
                <span class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/10 text-primary-400 border border-white/10 text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                    {{ $settings->get('industry_cta_badge', 'HUBIN & BKK SMKN 1 BANGSRI') }}
                </span>

                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight leading-tight mb-4">
                    {{ $settings->get('industry_cta_title', 'Tertarik Bekerjasama atau Merekrut Lulusan Kami?') }}
                </h2>

                <p class="text-charcoal-300 text-sm sm:text-base lg:text-lg max-w-2xl mb-8 leading-relaxed">
                    {{ $settings->get('industry_cta_desc', 'Bursa Kerja Khusus (BKK) SMK Negeri 1 Bangsri siap memfasilitasi kebutuhan tenaga teknisi otomotif kompeten dan berintegritas untuk jaringan industri otomotif di seluruh Indonesia.') }}
                </p>

                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <a 
                        href="{{ url($settings->get('industry_cta_button_url', '/kontak')) }}" 
                        class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-primary-600 hover:bg-primary-500 text-white font-black text-sm uppercase tracking-wider transition-all shadow-lg hover:shadow-primary-600/30 flex items-center justify-center gap-2"
                    >
                        <span>{{ $settings->get('industry_cta_button_text', 'Hubungi Hubin & BKK') }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <a 
                        href="{{ route('academic.facilities') }}" 
                        class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-sm uppercase tracking-wider transition-all border border-white/20 flex items-center justify-center gap-2"
                    >
                        <span>Lihat Fasilitas Bengkel TBSM</span>
                    </a>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

</x-layouts.app>
