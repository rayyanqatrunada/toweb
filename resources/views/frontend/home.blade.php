<x-layouts.app title="Beranda">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "EducationalOrganization",
      "name": "{{ $settings->get('site_name', 'Teknik Otomotif') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/logo.png') }}"
    }
    </script>
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebSite",
      "url": "{{ url('/') }}",
      "potentialAction": {
        "@@type": "SearchAction",
        "target": "{{ url('/search') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    @endpush

    <!-- 01. HERO SECTION -->
    <section class="relative bg-white overflow-hidden flex flex-col justify-center min-h-[85vh] lg:min-h-[75vh] pt-8 pb-16 lg:py-0 border-b border-charcoal-100">
        <!-- Decorative Grid Background -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: linear-gradient(to right, #e2e8f0 1px, transparent 1px), linear-gradient(to bottom, #e2e8f0 1px, transparent 1px); background-size: 4rem 4rem;"></div>
        
        <x-frontend.layout.container class="relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Text Content -->
                <div class="lg:col-span-7 flex flex-col justify-center reveal-on-scroll reveal-up">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-10 h-0.5 bg-primary-600"></span>
                        <span class="text-xs font-bold tracking-widest text-charcoal-500 uppercase">Vocational Education &middot; Automotive</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-charcoal-900 tracking-tight leading-[1.1] mb-6">
                        {!! \App\Support\HtmlSanitizer::clean($settings->get('hero_title', 'Menyiapkan Talenta Otomotif untuk Dunia Industri.')) !!}
                    </h1>
                    
                    <p class="text-lg sm:text-xl text-charcoal-600 font-medium leading-relaxed mb-10 max-w-2xl">
                        {!! \App\Support\HtmlSanitizer::clean($settings->get('hero_subtitle', 'Pusat keunggulan pendidikan vokasi dengan fasilitas standar industri dan kurikulum berbasis kompetensi yang dirancang bersama mitra perusahaan.')) !!}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                        <x-frontend.ui.button href="{{ route('academic.programs') }}" variant="primary" size="lg" class="justify-center">
                            Jelajahi Program
                        </x-frontend.ui.button>
                        <x-frontend.ui.button href="{{ route('about') }}" variant="outline" size="lg" class="justify-center">
                            Profil Kami
                        </x-frontend.ui.button>
                    </div>
                </div>

                <!-- Visual Content -->
                <div class="lg:col-span-5 relative reveal-on-scroll reveal-fade delay-200">
                    <div class="relative w-full aspect-[4/3] lg:aspect-[3/4] rounded-2xl overflow-hidden bg-charcoal-100 border border-charcoal-200">
                        <img src="{{ $settings->get('hero_image') ? Storage::url($settings->get('hero_image')) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1000&auto=format&fit=crop' }}" alt="Kegiatan Praktik Siswa" class="absolute inset-0 w-full h-full object-cover" loading="eager">
                        
                        <!-- Overlay Accent -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-charcoal-900/60 via-transparent to-transparent"></div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-6 left-6 right-6 lg:right-auto bg-white/95 backdrop-blur-sm p-4 rounded-xl shadow-xl border border-white/20">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center text-primary-600">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-charcoal-500 uppercase tracking-wider">Mitra Aktif</p>
                                    <p class="text-xl font-extrabold text-charcoal-900">{{ $partnerCount ?: '30' }}+ Industri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative Dots -->
                    <div class="absolute -z-10 -bottom-6 -right-6 text-charcoal-200 hidden lg:block">
                        <svg width="104" height="104" fill="currentColor" viewBox="0 0 104 104"><pattern id="dots" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="2"></circle></pattern><rect width="104" height="104" fill="url(#dots)"></rect></svg>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- 02. QUICK TRUST STRIP -->
    <section class="bg-charcoal-950 py-8 lg:py-10 border-b-4 border-primary-600">
        <x-frontend.layout.container>
            <div class="flex flex-col sm:flex-row flex-wrap sm:flex-nowrap justify-between gap-6 sm:gap-4 divide-y sm:divide-y-0 sm:divide-x divide-charcoal-800">
                
                <div class="flex-1 flex items-center justify-center sm:justify-start gap-4 pt-4 sm:pt-0">
                    <span class="text-4xl font-light text-charcoal-500">01</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white">{{ $programs->count() ?: 3 }}</p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Program Ahli</p>
                    </div>
                </div>

                <div class="flex-1 flex items-center justify-center sm:justify-center gap-4 pt-4 sm:pt-0 pl-0 sm:pl-8">
                    <span class="text-4xl font-light text-charcoal-500">02</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white">{{ $facilityCount ?: 8 }}</p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Fasilitas Bengkel</p>
                    </div>
                </div>

                <div class="flex-1 flex items-center justify-center sm:justify-center gap-4 pt-4 sm:pt-0 pl-0 sm:pl-8">
                    <span class="text-4xl font-light text-charcoal-500">03</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white">{{ $achievementCount ?: 24 }}</p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Prestasi Siswa</p>
                    </div>
                </div>

                <div class="flex-1 flex items-center justify-center sm:justify-end gap-4 pt-4 sm:pt-0 pl-0 sm:pl-8">
                    <span class="text-4xl font-light text-charcoal-500">04</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white">{{ $alumniCount ?: 1200 }}+</p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Alumni Bekerja</p>
                    </div>
                </div>
                
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- 03. INTRODUCTION / ABOUT -->
    <x-frontend.layout.section class="bg-charcoal-50">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <!-- Left: Typography -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up">
                    <x-frontend.ui.eyebrow>01 &nbsp;/&nbsp; PROFIL KAMI</x-frontend.ui.eyebrow>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight leading-tight mt-4 mb-6">
                        Menyiapkan kompetensi masa depan, hari ini.
                    </h2>
                    <div class="text-charcoal-600 text-lg leading-relaxed mb-8 space-y-4">
                        {!! \App\Support\HtmlSanitizer::clean($settings->get('profile_history', '<p>Jurusan Teknik Otomotif kami berdiri dengan komitmen menjembatani gap antara kurikulum sekolah dengan tuntutan riil di industri otomotif modern.</p>')) !!}
                    </div>
                    <x-frontend.ui.button href="{{ route('about') }}" variant="outline">
                        Baca Selengkapnya
                    </x-frontend.ui.button>
                </div>

                <!-- Right: Editorial Image & Quote -->
                <div class="lg:col-span-7 relative reveal-on-scroll reveal-fade delay-100">
                    <div class="flex justify-end relative">
                        <img src="{{ isset($headOfDepartment) && $headOfDepartment->photo ? Storage::url($headOfDepartment->photo) : 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=600&auto=format&fit=crop' }}" alt="Ketua Jurusan" class="w-[85%] lg:w-[75%] rounded-2xl shadow-xl aspect-square object-cover" loading="lazy">
                        
                        <!-- Overlay Quote Box -->
                        <div class="absolute bottom-0 left-0 lg:-left-12 bg-white p-6 lg:p-8 rounded-2xl shadow-2xl border border-charcoal-100 max-w-sm transform translate-y-8 lg:translate-y-12">
                            <svg class="w-8 h-8 text-primary-500 mb-4 opacity-50" fill="currentColor" viewBox="0 0 32 32"><path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" /></svg>
                            <p class="text-charcoal-900 font-bold text-sm lg:text-base italic leading-relaxed">
                                "{!! \App\Support\HtmlSanitizer::clean($settings->get('head_quote', 'Fokus kami adalah membentuk mekanik yang tidak hanya mengerti mesin, tetapi memiliki etos kerja industri.')) !!}"
                            </p>
                            <p class="mt-4 text-xs font-extrabold text-charcoal-500 uppercase tracking-widest">- {{ isset($headOfDepartment) ? $headOfDepartment->name : 'Kepala Jurusan' }}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 04. PROGRAM & COMPETENCY -->
    <x-frontend.layout.section class="bg-white">
        <x-frontend.layout.container>
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-up">
                <x-frontend.ui.eyebrow>02 &nbsp;/&nbsp; KOMPETENSI KEAHLIAN</x-frontend.ui.eyebrow>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Jalur Pilihan Masa Depan</h2>
            </div>
            
            @if($programs->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($programs as $program)
                <a href="{{ route('academic.programs') }}#{{ $program->slug }}" class="group block relative bg-charcoal-50 rounded-2xl overflow-hidden border border-charcoal-100 hover:border-primary-200 hover:shadow-xl transition-all duration-300 focus-ring reveal-on-scroll reveal-up delay-{{ $loop->iteration * 100 }}">
                    <!-- Thumbnail -->
                    <div class="aspect-video relative overflow-hidden bg-charcoal-200">
                        <img src="{{ $program->thumbnail ? Storage::url($program->thumbnail) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=600&auto=format&fit=crop' }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <!-- Decorative tag -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal-900 text-xs font-bold px-3 py-1 rounded shadow-sm">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 lg:p-8 flex flex-col h-full">
                        <h3 class="text-xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3 leading-tight">{{ $program->name }}</h3>
                        <p class="text-sm text-charcoal-600 line-clamp-3 mb-6">{{ Str::limit(strip_tags($program->description), 120) }}</p>
                        
                        <!-- List Kompetensi Preview -->
                        <ul class="mt-auto space-y-2 border-t border-charcoal-100 pt-6">
                            @forelse($program->competencies->take(2) as $comp)
                            <li class="flex items-start text-xs font-medium text-charcoal-600">
                                <svg class="w-4 h-4 mr-2 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="line-clamp-1">{{ $comp->name }}</span>
                            </li>
                            @empty
                            <li class="text-xs text-charcoal-400 italic">Data kompetensi belum diisi.</li>
                            @endforelse
                            @if($program->competencies->count() > 2)
                            <li class="text-xs font-bold text-charcoal-400 pl-6">+{{ $program->competencies->count() - 2 }} lainnya</li>
                            @endif
                        </ul>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <x-frontend.ui.empty-state title="Program Keahlian Belum Tersedia" message="Kami sedang menyusun kurikulum terbaik untuk Anda." icon="academic-cap" />
            @endif
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 05. FACILITIES (EDITORIAL) -->
    <x-frontend.layout.section class="bg-charcoal-900 text-white overflow-hidden">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Text Intro -->
                <div class="lg:col-span-4 flex flex-col justify-center reveal-on-scroll reveal-up">
                    <div class="text-primary-500 text-sm font-bold tracking-widest uppercase mb-4">03 &nbsp;/&nbsp; FASILITAS BENGKEL</div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight mb-6">Standar Industri di Lingkungan Sekolah.</h2>
                    <p class="text-charcoal-300 text-lg mb-8 leading-relaxed">Peralatan praktik yang dirancang menyamai kondisi riil di bengkel resmi untuk memastikan siswa terbiasa dengan teknologi terkini.</p>
                    <div class="hidden lg:block">
                        <x-frontend.ui.button href="{{ route('academic.facilities') }}" variant="primary">
                            Lihat Semua Fasilitas
                        </x-frontend.ui.button>
                    </div>
                </div>

                <!-- Facilities Composition -->
                <div class="lg:col-span-8">
                    @if($facilities->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                        @foreach($facilities as $index => $facility)
                        <a href="{{ route('academic.facilities') }}" class="group block relative rounded-2xl overflow-hidden {{ $index === 0 ? 'md:col-span-2 aspect-video' : 'aspect-square' }} focus-ring bg-charcoal-800 reveal-on-scroll reveal-fade delay-{{ $index * 100 }}">
                            <img src="{{ $facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1632823465306-cdbb32ab7586?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $facility->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/40 to-transparent opacity-90"></div>
                            
                            <div class="absolute inset-0 p-6 lg:p-8 flex flex-col justify-end">
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-primary-400 transition-colors">{{ $facility->name }}</h3>
                                <p class="text-sm text-charcoal-300 line-clamp-2 md:opacity-0 md:translate-y-4 md:group-hover:opacity-100 md:group-hover:translate-y-0 transition-all duration-300">{{ Str::limit(strip_tags($facility->description), 100) }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <x-frontend.ui.empty-state title="Belum Ada Data Fasilitas" message="Informasi bengkel sedang diperbarui." icon="cog" />
                    @endif
                </div>

                <!-- Mobile CTA -->
                <div class="col-span-full lg:hidden text-center mt-4">
                    <x-frontend.ui.button href="{{ route('academic.facilities') }}" variant="outline" class="w-full justify-center text-white border-charcoal-600 hover:bg-charcoal-800">
                        Lihat Semua Fasilitas
                    </x-frontend.ui.button>
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 06. INDUSTRY & CAREER -->
    <x-frontend.layout.section class="bg-charcoal-50">
        <x-frontend.layout.container>
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-up">
                <x-frontend.ui.eyebrow>04 &nbsp;/&nbsp; KONEKSI INDUSTRI</x-frontend.ui.eyebrow>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Peluang Karier Lulusan</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Partner Wall -->
                <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                    <div class="bg-white rounded-2xl p-8 border border-charcoal-100 shadow-sm h-full">
                        <h3 class="text-xl font-bold text-charcoal-900 mb-8 flex items-center gap-3">
                            <svg class="w-6 h-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            Partner Penyaluran Lulusan
                        </h3>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                            @forelse($partners as $partner)
                            <a href="{{ route('partnership.show', $partner->slug) }}" class="group flex items-center justify-center p-4 border border-charcoal-100 rounded-xl hover:border-primary-200 transition-colors focus-ring h-20">
                                @if($partner->logo)
                                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-10 max-w-full object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all" loading="lazy">
                                @else
                                    <span class="text-xs font-bold text-charcoal-400 text-center uppercase">{{ $partner->name }}</span>
                                @endif
                            </a>
                            @empty
                            <div class="col-span-full">
                                <p class="text-sm text-charcoal-500 text-center py-4">Belum ada partner industri tercatat.</p>
                            </div>
                            @endforelse
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('partnership.index') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700 flex items-center w-max">
                                Lihat Seluruh Mitra <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Job Vacancies -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up delay-100">
                    <div class="bg-primary-950 rounded-2xl p-8 shadow-xl relative overflow-hidden h-full">
                        <!-- BG Accent -->
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary-900 rounded-full blur-3xl opacity-50"></div>
                        
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-white mb-2">Bursa Kerja Khusus (BKK)</h3>
                            <p class="text-sm text-primary-200 mb-8">Informasi lowongan kerja terbaru untuk alumni dan siswa tingkat akhir.</p>
                            
                            <div class="space-y-4">
                                @forelse($jobVacancies as $job)
                                <a href="{{ route('jobs.show', $job->slug) }}" class="group block bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors focus-ring">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-white group-hover:text-primary-300 transition-colors pr-4">{{ $job->title }}</h4>
                                        <x-frontend.ui.badge type="primary" size="sm">{{ ucfirst(str_replace('_', ' ', $job->employment_type)) }}</x-frontend.ui.badge>
                                    </div>
                                    <p class="text-sm text-primary-100 mb-3">{{ $job->industryPartner->name ?? $job->position }}</p>
                                    <div class="flex items-center text-xs text-primary-300 gap-4">
                                        <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg> {{ $job->location }}</span>
                                    </div>
                                </a>
                                @empty
                                <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center">
                                    <p class="text-sm text-primary-200">Belum ada lowongan baru.</p>
                                </div>
                                @endforelse
                            </div>
                            
                            <div class="mt-8 text-center">
                                <a href="{{ route('jobs.index') }}" class="inline-flex w-full items-center justify-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors focus-ring">
                                    Lihat Semua Lowongan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 07. NEWS & AGENDA -->
    <x-frontend.layout.section class="bg-white">
        <x-frontend.layout.container>
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 reveal-on-scroll reveal-up">
                <div>
                    <x-frontend.ui.eyebrow>05 &nbsp;/&nbsp; INFORMASI TERKINI</x-frontend.ui.eyebrow>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Berita & Agenda</h2>
                </div>
                <div class="mt-6 md:mt-0">
                    <x-frontend.ui.button href="{{ route('news.index') }}" variant="outline">
                        Arsip Berita
                    </x-frontend.ui.button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <!-- Latest News -->
                <div class="lg:col-span-8">
                    @if($latestNews->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        @foreach($latestNews->take(2) as $news)
                        <article class="group reveal-on-scroll reveal-up delay-{{ $loop->iteration * 100 }}">
                            <a href="{{ route('news.show', $news->slug) }}" class="block relative aspect-video rounded-2xl overflow-hidden mb-5 bg-charcoal-100 focus-ring">
                                <img src="{{ $news->thumbnail ? Storage::url($news->thumbnail) : 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=600&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $news->title }}" loading="lazy">
                                @if($news->category)
                                <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1 text-xs font-bold text-primary-600 rounded shadow-sm">
                                    {{ $news->category->name }}
                                </div>
                                @endif
                            </a>
                            <div>
                                <time class="text-xs font-bold text-charcoal-500 uppercase tracking-wider mb-2 block">
                                    {{ $news->published_at ? $news->published_at->translatedFormat('d F Y') : $news->created_at->translatedFormat('d F Y') }}
                                </time>
                                <h3 class="text-xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors leading-snug mb-3">
                                    <a href="{{ route('news.show', $news->slug) }}" class="focus:outline-none focus:underline">{{ $news->title }}</a>
                                </h3>
                                <p class="text-sm text-charcoal-600 line-clamp-2">{{ $news->excerpt ?? Str::limit(strip_tags($news->content), 100) }}</p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    @else
                    <x-frontend.ui.empty-state title="Belum Ada Berita" message="Berita terbaru akan muncul di sini." icon="document" />
                    @endif
                </div>

                <!-- Agendas -->
                <div class="lg:col-span-4 reveal-on-scroll reveal-up delay-200">
                    <h3 class="text-lg font-bold text-charcoal-900 mb-6 border-b border-charcoal-200 pb-4">Agenda Mendatang</h3>
                    <div class="space-y-6">
                        @forelse($agendas as $agenda)
                        <a href="{{ route('announcements.show', $agenda->slug) }}" class="group flex gap-5 items-start focus-ring rounded-lg p-2 -m-2 hover:bg-charcoal-50 transition-colors">
                            <div class="flex-shrink-0 w-14 h-14 bg-charcoal-100 rounded-xl flex flex-col items-center justify-center border border-charcoal-200 group-hover:bg-primary-50 group-hover:border-primary-200 transition-colors">
                                <span class="text-[10px] font-bold text-charcoal-500 uppercase group-hover:text-primary-600">{{ $agenda->created_at->translatedFormat('M') }}</span>
                                <span class="text-lg font-extrabold text-charcoal-900 leading-none group-hover:text-primary-700">{{ $agenda->created_at->format('d') }}</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-charcoal-900 text-sm group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug mb-1">{{ $agenda->title }}</h4>
                                <span class="text-xs font-medium text-charcoal-500">Lihat Pengumuman &rarr;</span>
                            </div>
                        </a>
                        @empty
                        <p class="text-sm text-charcoal-500 italic">Tidak ada agenda dalam waktu dekat.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 08. GALLERY -->
    <x-frontend.layout.section class="bg-charcoal-50 border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 reveal-on-scroll reveal-up">
                <div>
                    <x-frontend.ui.eyebrow>06 &nbsp;/&nbsp; AKTIVITAS JURUSAN</x-frontend.ui.eyebrow>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Galeri Kegiatan</h2>
                </div>
                <div class="mt-6 md:mt-0">
                    <x-frontend.ui.button href="{{ route('gallery.index') ?? '/galeri' }}" variant="outline">
                        Lihat Semua Album
                    </x-frontend.ui.button>
                </div>
            </div>

            @if($galleries->isNotEmpty())
            <!-- CSS Grid Asymmetric -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
                @foreach($galleries->take(4) as $index => $album)
                <a href="{{ route('gallery.show', $album->slug) ?? '#' }}" class="group block relative rounded-2xl overflow-hidden bg-charcoal-200 focus-ring {{ $index === 0 ? 'col-span-2 row-span-2 aspect-square md:aspect-auto' : 'col-span-1 aspect-square md:aspect-[4/3]' }} reveal-on-scroll reveal-up delay-{{ $index * 100 }}">
                    @php 
                        $coverItem = $album->items->first(); 
                        $imageSrc = $coverItem ? Storage::url($coverItem->file_path) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=800&auto=format&fit=crop';
                    @endphp
                    <img src="{{ $imageSrc }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    
                    <div class="absolute inset-0 p-4 lg:p-6 flex flex-col justify-end">
                        <h3 class="text-white font-bold {{ $index === 0 ? 'text-2xl lg:text-3xl mb-2' : 'text-sm lg:text-base leading-tight' }} group-hover:text-primary-400 transition-colors">{{ $album->title }}</h3>
                        @if($index === 0)
                        <p class="text-charcoal-300 text-sm hidden md:block line-clamp-2">{{ Str::limit(strip_tags($album->description), 100) }}</p>
                        @endif
                    </div>
                    <!-- Photo Count Badge -->
                    <div class="absolute top-4 right-4 bg-charcoal-900/60 backdrop-blur-sm px-2.5 py-1 text-xs font-bold text-white rounded shadow-sm">
                        {{ $album->items->count() }} Foto
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <x-frontend.ui.empty-state title="Belum Ada Album" message="Galeri foto belum tersedia saat ini." icon="photograph" />
            @endif
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 09. FINAL CTA -->
    <section class="bg-charcoal-900 text-white overflow-hidden relative">
        <!-- Decorative grid -->
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(to right, #475569 1px, transparent 1px), linear-gradient(to bottom, #475569 1px, transparent 1px); background-size: 4rem 4rem;"></div>
        
        <x-frontend.layout.container class="relative z-10 py-20 lg:py-28 text-center max-w-4xl mx-auto">
            <h2 class="text-4xl lg:text-5xl font-extrabold tracking-tight mb-6">Siap Menjadi Ahli Otomotif?</h2>
            <p class="text-lg text-charcoal-300 mb-10 max-w-2xl mx-auto">Bergabunglah dengan jurusan kami dan raih masa depan gemilang di industri otomotif. Fasilitas lengkap, guru profesional, dan lulusan yang terjamin kompetensinya.</p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <x-frontend.ui.button href="{{ route('academic.programs') }}" variant="primary" size="lg" class="w-full sm:w-auto justify-center">
                    Eksplorasi Program
                </x-frontend.ui.button>
                <x-frontend.ui.button href="{{ route('about') }}#kontak" variant="outline" size="lg" class="w-full sm:w-auto justify-center text-white border-charcoal-600 hover:bg-charcoal-800">
                    Hubungi Kami
                </x-frontend.ui.button>
            </div>
        </x-frontend.layout.container>
    </section>

</x-layouts.app>
