<x-layouts.app title="Profil Jurusan">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "AboutPage",
      "mainEntity": {
        "@@type": "EducationalOrganization",
        "name": "{{ $settings->get('site_name', 'Teknik Otomotif') }}",
        "description": "{!! strip_tags($settings->get('site_description')) !!}"
      }
    }
    </script>
    @endpush

    <!-- 01. PAGE HERO -->
    <section class="relative bg-white pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden border-b border-charcoal-200">
        <!-- Technical Grid Background -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: linear-gradient(to right, #cbd5e1 1px, transparent 1px), linear-gradient(to bottom, #cbd5e1 1px, transparent 1px); background-size: 2rem 2rem;"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Profil Jurusan' => route('about')]" class="mb-8" />
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Text Content (lg:col-span-6 or 5) -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up">
                    <x-frontend.ui.eyebrow>ABOUT THE DEPARTMENT</x-frontend.ui.eyebrow>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-charcoal-900 tracking-tight leading-[1.1] mt-4 mb-6">
                        {{ $settings->get('site_name', 'Teknik Otomotif') }}
                    </h1>
                    <p class="text-lg text-charcoal-600 font-medium leading-relaxed mb-8 border-l-2 border-primary-600 pl-4">
                        Membangun kompetensi teknis, karakter disiplin, dan kesiapan untuk memimpin di era industri otomotif modern.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-bold text-charcoal-500 uppercase tracking-wider">
                        <span class="flex items-center gap-2"><svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg> Pendidikan Vokasi</span>
                        <span class="w-1 h-1 rounded-full bg-charcoal-300"></span>
                        <span>Berstandar Industri</span>
                    </div>
                </div>

                <!-- Visual Content (lg:col-span-7) -->
                <div class="lg:col-span-7 relative reveal-on-scroll reveal-fade delay-100">
                    <div class="relative w-full aspect-[4/3] sm:aspect-video lg:aspect-[16/10] rounded-2xl overflow-hidden bg-charcoal-100 border border-charcoal-200">
                        <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=1200&auto=format&fit=crop" alt="Kegiatan Praktik Otomotif" class="absolute inset-0 w-full h-full object-cover grayscale-[30%]" loading="eager">
                        <div class="absolute inset-0 bg-charcoal-900/10"></div>
                        
                        <!-- Technical Accent Line -->
                        <div class="absolute bottom-0 right-0 w-1/3 h-1.5 bg-primary-600"></div>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- 02. DEPARTMENT INTRODUCTION & HISTORY -->
    <x-frontend.layout.section class="bg-charcoal-50">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Metadata Side -->
                <div class="lg:col-span-4 reveal-on-scroll reveal-up hidden lg:block">
                    <div class="sticky top-32">
                        <h3 class="text-sm font-bold tracking-widest text-primary-600 uppercase mb-8">Informasi Profil</h3>
                        <ul class="space-y-6">
                            <li class="pb-6 border-b border-charcoal-200">
                                <span class="block text-xs font-bold text-charcoal-500 uppercase tracking-wider mb-1">01 / IDENTITAS</span>
                                <span class="block font-bold text-charcoal-900">{{ $settings->get('site_name', 'Jurusan Teknik Otomotif') }}</span>
                            </li>
                            <li class="pb-6 border-b border-charcoal-200">
                                <span class="block text-xs font-bold text-charcoal-500 uppercase tracking-wider mb-1">02 / FOKUS PENDIDIKAN</span>
                                <span class="block font-bold text-charcoal-900">Teknologi Mekanik & Kendaraan Modern</span>
                            </li>
                            <li>
                                <span class="block text-xs font-bold text-charcoal-500 uppercase tracking-wider mb-1">03 / ORIENTASI INDUSTRI</span>
                                <span class="block font-bold text-charcoal-900">Penyaluran Tenaga Kerja & Wirausaha</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Editorial History Content -->
                <div class="lg:col-span-8 reveal-on-scroll reveal-up">
                    <span class="text-primary-500 text-sm font-bold tracking-widest uppercase mb-4 block">Sejarah & Profil Jurusan</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight leading-tight mb-8">
                        Mendedikasikan diri pada mutu lulusan sejak hari pertama.
                    </h2>
                    
                    <div class="prose prose-lg prose-charcoal prose-p:leading-relaxed prose-a:text-primary-600 hover:prose-a:text-primary-700 max-w-none">
                        {!! \App\Support\HtmlSanitizer::clean($settings->get('profile_history', '<p>Sejarah singkat jurusan Teknik Otomotif bermula dari dedikasi kami untuk mencetak tenaga kerja profesional. Dengan fasilitas yang terus berkembang, kami selalu berusaha menyesuaikan kurikulum dengan teknologi terkini di dunia otomotif.</p>')) !!}
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 03. VISION & MISSION -->
    <x-frontend.layout.section class="bg-charcoal-950 text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-primary-900 rounded-full blur-[100px] opacity-20 pointer-events-none"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-24">
                
                <!-- VISION -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up">
                    <span class="text-primary-500 text-sm font-bold tracking-widest uppercase mb-4 block">Visi Utama</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight mb-6 text-white">
                        Menjadi pusat pendidikan vokasi unggulan.
                    </h2>
                    <p class="text-xl lg:text-2xl font-light text-charcoal-300 leading-relaxed italic border-l-4 border-primary-600 pl-6 py-2">
                        "{!! strip_tags($settings->get('profile_vision', 'Menjadi program studi otomotif terdepan di tingkat nasional.')) !!}"
                    </p>
                </div>

                <!-- MISSION -->
                <div class="lg:col-span-7 reveal-on-scroll reveal-up delay-100">
                    <span class="text-primary-500 text-sm font-bold tracking-widest uppercase mb-6 block">Misi Jurusan</span>
                    
                    <div class="prose prose-invert prose-lg max-w-none prose-li:marker:text-primary-500 prose-ul:space-y-4">
                        {!! \App\Support\HtmlSanitizer::clean($settings->get('profile_mission', '<ul><li>Menyelenggarakan pembelajaran berbasis industri.</li><li>Membentuk karakter disiplin dan profesional.</li><li>Mengembangkan kerjasama kemitraan dengan DUDI.</li></ul>')) !!}
                    </div>
                </div>

            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 04. HEAD OF DEPARTMENT -->
    <x-frontend.layout.section class="bg-white border-b border-charcoal-100">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <div class="lg:col-span-5 relative reveal-on-scroll reveal-fade">
                    <div class="aspect-[4/5] relative rounded-2xl overflow-hidden bg-charcoal-100">
                        <img src="{{ isset($headOfDepartment) && $headOfDepartment->photo ? Storage::url($headOfDepartment->photo) : 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=800&auto=format&fit=crop' }}" alt="Kepala Jurusan" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                        <!-- Bottom Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-900/50 to-transparent"></div>
                    </div>
                </div>

                <div class="lg:col-span-7 flex flex-col justify-center reveal-on-scroll reveal-up">
                    <div class="w-12 h-12 rounded-full bg-primary-50 flex items-center justify-center text-primary-600 mb-6">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 32 32"><path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" /></svg>
                    </div>
                    
                    <p class="text-xl lg:text-2xl font-bold text-charcoal-900 leading-relaxed italic mb-8">
                        "{!! \App\Support\HtmlSanitizer::clean($settings->get('head_quote', 'Fokus kami adalah membentuk mekanik yang tidak hanya mengerti mesin, tetapi memiliki etos kerja dan kedisiplinan setara dengan tuntutan industri profesional.')) !!}"
                    </p>
                    
                    <div>
                        <h3 class="text-lg font-extrabold text-charcoal-900 uppercase tracking-wide">{{ isset($headOfDepartment) ? $headOfDepartment->name : 'Ketua Jurusan' }}</h3>
                        <p class="text-sm font-bold text-primary-600 mt-1">Kepala Program Keahlian Otomotif</p>
                    </div>
                </div>

            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 05. IDENTITY / KEY PRINCIPLES -->
    <x-frontend.layout.section class="bg-charcoal-50">
        <x-frontend.layout.container>
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-up">
                <x-frontend.ui.eyebrow>NILAI & IDENTITAS</x-frontend.ui.eyebrow>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Karakter Lulusan Kami</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Principle 1 -->
                <div class="bg-white p-8 rounded-2xl border border-charcoal-200 reveal-on-scroll reveal-up">
                    <span class="text-4xl font-light text-charcoal-300 block mb-4">01</span>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-3">Technical Mastery</h3>
                    <p class="text-charcoal-600 text-sm leading-relaxed">Penguasaan penuh terhadap teori dasar, mekanisme mesin, dan teknologi diagnostik modern (EFI & Kendaraan Listrik).</p>
                </div>
                <!-- Principle 2 -->
                <div class="bg-white p-8 rounded-2xl border border-charcoal-200 reveal-on-scroll reveal-up delay-100">
                    <span class="text-4xl font-light text-charcoal-300 block mb-4">02</span>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-3">Industry Discipline</h3>
                    <p class="text-charcoal-600 text-sm leading-relaxed">Menerapkan budaya kerja 5S, standar K3 (Keselamatan dan Kesehatan Kerja), serta etos kerja industri sejak di bengkel sekolah.</p>
                </div>
                <!-- Principle 3 -->
                <div class="bg-white p-8 rounded-2xl border border-charcoal-200 reveal-on-scroll reveal-up delay-200">
                    <span class="text-4xl font-light text-charcoal-300 block mb-4">03</span>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-3">Career Readiness</h3>
                    <p class="text-charcoal-600 text-sm leading-relaxed">Penyelarasan kurikulum dengan kebutuhan mitra industri untuk memastikan kesiapan lulusan di dunia kerja maupun wirausaha.</p>
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 06. PROGRAM SNAPSHOT -->
    <x-frontend.layout.section class="bg-white border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Left: Intro -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up">
                    <x-frontend.ui.eyebrow>PROGRAM KEAHLIAN</x-frontend.ui.eyebrow>
                    <h2 class="text-3xl font-extrabold text-charcoal-900 tracking-tight mt-4 mb-6">Jalur Pendidikan Kompetensi</h2>
                    <p class="text-charcoal-600 leading-relaxed mb-8">Kurikulum kami disusun khusus untuk mengakomodasi spesialisasi bidang otomotif secara spesifik.</p>
                    <x-frontend.ui.button href="{{ route('academic.programs') }}" variant="outline">
                        Lihat Kurikulum Lengkap
                    </x-frontend.ui.button>
                </div>

                <!-- Right: Compact List -->
                <div class="lg:col-span-7">
                    @if(isset($programs) && $programs->isNotEmpty())
                        <div class="flex flex-col gap-4">
                            @foreach($programs as $index => $program)
                            <a href="{{ route('academic.programs') }}#{{ $program->slug }}" class="group flex items-start p-6 rounded-2xl border border-charcoal-100 hover:border-primary-200 hover:bg-charcoal-50 transition-all focus-ring reveal-on-scroll reveal-up delay-{{ $index * 100 }}">
                                <span class="text-xl font-bold text-charcoal-300 mr-6 mt-1">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <div>
                                    <h3 class="text-xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors mb-2">{{ $program->name }}</h3>
                                    <p class="text-sm text-charcoal-600 line-clamp-2 mb-3">{{ Str::limit(strip_tags($program->description), 100) }}</p>
                                    <span class="text-xs font-bold text-primary-600 uppercase tracking-wider flex items-center group-hover:translate-x-1 transition-transform">Eksplorasi Program <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    @else
                        <x-frontend.ui.empty-state title="Belum Ada Program" message="Program keahlian sedang disiapkan." icon="academic-cap" />
                    @endif
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 07. FACILITIES SNAPSHOT -->
    <x-frontend.layout.section class="bg-charcoal-950 text-white border-t border-charcoal-900">
        <x-frontend.layout.container>
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 reveal-on-scroll reveal-up">
                <div>
                    <span class="text-primary-500 text-sm font-bold tracking-widest uppercase mb-4 block">FASILITAS BENGKEL</span>
                    <h2 class="text-3xl font-extrabold text-white tracking-tight mt-2">Dukungan Infrastruktur Industri</h2>
                </div>
                <div class="mt-6 md:mt-0">
                    <x-frontend.ui.button href="{{ route('academic.facilities') }}" variant="outline" class="border-charcoal-700 text-white hover:bg-charcoal-800">
                        Galeri Fasilitas
                    </x-frontend.ui.button>
                </div>
            </div>

            @if(isset($facilities) && $facilities->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($facilities->take(3) as $facility)
                <a href="{{ route('academic.facilities') }}" class="group block relative aspect-square rounded-2xl overflow-hidden focus-ring reveal-on-scroll reveal-up delay-{{ $loop->iteration * 100 }}">
                    <img src="{{ $facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=600&auto=format&fit=crop' }}" alt="{{ $facility->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/50 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-lg font-bold text-white group-hover:text-primary-400 transition-colors">{{ $facility->name }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <x-frontend.ui.empty-state title="Belum Ada Fasilitas" message="Informasi fasilitas sedang diperbarui." icon="cog" />
            @endif
        </x-frontend.layout.container>
    </x-frontend.layout.section>

    <!-- 08. FINAL CTA -->
    <section class="bg-primary-600 text-white overflow-hidden relative" id="kontak">
        <!-- Abstract Technical Pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 20px 20px;"></div>
        
        <x-frontend.layout.container class="relative z-10 py-20 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight mb-6">Hubungi Jurusan Kami</h2>
            <p class="text-primary-100 text-lg mb-10 max-w-2xl mx-auto">Kami siap melayani kebutuhan informasi pendaftaran, kerjasama industri, dan kunjungan institusi.</p>
            
            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                @if($settings->get('contact_email'))
                <a href="mailto:{{ $settings->get('contact_email') }}" class="flex items-center gap-3 bg-primary-700/50 hover:bg-primary-700 px-6 py-4 rounded-xl border border-primary-500 transition-colors focus-ring w-full md:w-auto">
                    <svg class="w-6 h-6 text-primary-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <div class="text-left">
                        <span class="block text-xs font-bold text-primary-300 uppercase">Email</span>
                        <span class="block font-bold">{{ $settings->get('contact_email') }}</span>
                    </div>
                </a>
                @endif
                
                @if($settings->get('contact_phone'))
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->get('contact_phone')) }}" class="flex items-center gap-3 bg-primary-700/50 hover:bg-primary-700 px-6 py-4 rounded-xl border border-primary-500 transition-colors focus-ring w-full md:w-auto">
                    <svg class="w-6 h-6 text-primary-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    <div class="text-left">
                        <span class="block text-xs font-bold text-primary-300 uppercase">Telepon</span>
                        <span class="block font-bold">{{ $settings->get('contact_phone') }}</span>
                    </div>
                </a>
                @endif
            </div>
            
            <div class="mt-12 text-primary-200 text-sm">
                <p class="font-bold mb-1">Alamat Institusi</p>
                <p>{{ $settings->get('contact_address', 'Bangsri, Jepara') }}</p>
            </div>
        </x-frontend.layout.container>
    </section>

</x-layouts.app>
