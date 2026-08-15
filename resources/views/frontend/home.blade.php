<x-layouts.app title="Beranda">
    
    <!-- ============================================== -->
    <!-- 02. HERO SECTION -->
    <!-- ============================================== -->
    <section class="relative bg-slate-900 overflow-hidden min-h-[90vh] flex items-center justify-center pt-16">
        <!-- Background Image with Gradient Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover opacity-40 mix-blend-overlay" alt="Siswa praktik otomotif">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 md:py-20 lg:py-0">
            <div class="lg:w-2/3" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
                
                <!-- Eyebrow -->
                <div x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-600/20 text-red-400 border border-red-500/30 text-xs sm:text-sm font-bold tracking-widest uppercase backdrop-blur-sm shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        PUSAT KEUNGGULAN (COE)
                    </span>
                </div>
                
                <!-- Headline -->
                <h1 x-show="show" x-transition:enter="transition ease-out duration-700 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="mt-6 text-4xl sm:text-5xl lg:text-7xl font-extrabold tracking-tight text-white leading-[1.1]">
                    Menyiapkan Generasi Profesional di <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-400">Dunia Otomotif</span>
                </h1>
                
                <!-- Supporting Paragraph -->
                <p x-show="show" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="mt-6 text-lg sm:text-xl text-slate-300 max-w-2xl leading-relaxed">
                    Kami mendidik siswa menjadi mekanik, teknisi, dan wirausahawan andal dengan fasilitas standar industri dan penyaluran kerja yang terjamin.
                </p>
                
                <!-- CTA -->
                <div x-show="show" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="#profil" class="inline-flex justify-center items-center px-8 py-4 border border-transparent text-base sm:text-lg font-bold rounded-lg text-white bg-red-600 hover:bg-red-700 hover:-translate-y-1 transition-all shadow-lg shadow-red-600/30 w-full sm:w-auto">
                        Jelajahi Jurusan
                    </a>
                    <a href="{{ route('partnership.index') ?? '/kemitraan' }}" class="inline-flex justify-center items-center px-8 py-4 border-2 border-slate-400 text-base sm:text-lg font-bold rounded-lg text-white hover:border-white hover:bg-white/10 transition-all backdrop-blur-sm w-full sm:w-auto">
                        Lihat Program Kemitraan
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 03. QUICK STATS RIBBON -->
    <!-- ============================================== -->
    <section class="relative bg-slate-900 pb-16 border-b border-slate-800" x-data="{
        startAnimation(target, prop) {
            let start = 0;
            let duration = 2000;
            let stepTime = Math.abs(Math.floor(duration / target));
            if(stepTime < 5) stepTime = 5;
            let timer = setInterval(() => {
                start += Math.ceil(target / (duration / stepTime));
                if (start >= target) {
                    this[prop] = target;
                    clearInterval(timer);
                } else {
                    this[prop] = start;
                }
            }, stepTime);
        },
        c1: 0, c2: 0, c3: 0, c4: 0
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative -top-8 z-20">
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-900/50 p-8 border border-slate-100">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 divide-x divide-slate-100">
                    
                    <div class="text-center px-4" x-intersect.once="startAnimation({{ $alumniCount ?: 1200 }}, 'c1')">
                        <div class="text-red-500 mb-2 flex justify-center"><svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg></div>
                        <div class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight flex items-center justify-center">
                            <span x-text="c1">0</span><span class="text-red-600">+</span>
                        </div>
                        <div class="mt-1 text-sm font-bold text-slate-500 uppercase tracking-wide">Total Alumni</div>
                    </div>

                    <div class="text-center px-4" x-intersect.once="startAnimation({{ $partnerCount ?: 45 }}, 'c2')">
                        <div class="text-red-500 mb-2 flex justify-center"><svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg></div>
                        <div class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight flex items-center justify-center">
                            <span x-text="c2">0</span><span class="text-red-600">+</span>
                        </div>
                        <div class="mt-1 text-sm font-bold text-slate-500 uppercase tracking-wide">Mitra Industri</div>
                    </div>

                    <div class="text-center px-4" x-intersect.once="startAnimation({{ $achievementCount ?: 12 }}, 'c3')">
                        <div class="text-red-500 mb-2 flex justify-center"><svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg></div>
                        <div class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight flex items-center justify-center">
                            <span x-text="c3">0</span><span class="text-red-600"></span>
                        </div>
                        <div class="mt-1 text-sm font-bold text-slate-500 uppercase tracking-wide">Prestasi Nasional</div>
                    </div>

                    <div class="text-center px-4" x-intersect.once="startAnimation({{ $facilityCount ?: 8 }}, 'c4')">
                        <div class="text-red-500 mb-2 flex justify-center"><svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div>
                        <div class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight flex items-center justify-center">
                            <span x-text="c4">0</span><span class="text-red-600"></span>
                        </div>
                        <div class="mt-1 text-sm font-bold text-slate-500 uppercase tracking-wide">Fasilitas Bengkel</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 04. PROFIL JURUSAN (SIAPA KAMI) -->
    <!-- ============================================== -->
    <section id="profil" class="py-20 lg:py-28 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16 items-center">
                
                <!-- Kiri: Foto & Quote -->
                <div class="lg:col-span-5 relative mb-16 lg:mb-0">
                    <!-- Placeholder Foto -->
                    <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=800&auto=format&fit=crop" class="rounded-2xl shadow-2xl w-full max-w-sm mx-auto aspect-[3/4] object-cover border-4 border-white" alt="Kepala Jurusan Otomotif">
                    
                    <!-- Quote Box (Absolute overlap) -->
                    <div class="absolute -bottom-8 -right-4 sm:-right-8 md:bottom-8 bg-white p-6 rounded-2xl shadow-xl border border-slate-100 max-w-[280px] z-10 hidden sm:block">
                        <svg class="w-8 h-8 text-red-500 mb-3 opacity-50" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="text-slate-900 font-bold italic text-sm leading-relaxed">
                            "Menyiapkan lulusan yang bukan hanya paham mesin, tapi memiliki karakter profesional industri."
                        </p>
                        <p class="mt-3 text-xs font-extrabold text-slate-500 uppercase tracking-widest">- Kepala Jurusan</p>
                    </div>
                </div>

                <!-- Kanan: Teks & Info -->
                <div class="lg:col-span-7 flex flex-col justify-center">
                    <span class="text-sm font-extrabold tracking-widest text-red-600 uppercase mb-3 flex items-center">
                        <span class="w-8 h-0.5 bg-red-600 mr-3"></span> Siapa Kami
                    </span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.1]">
                        Mencetak Teknisi Andal <br> berkarakter Industri.
                    </h2>
                    
                    <div class="mt-6 text-lg text-slate-600 space-y-4">
                        <p>Jurusan Teknik Otomotif kami berdiri dengan satu tujuan: menjembatani kesenjangan antara pendidikan sekolah dengan kebutuhan riil dunia otomotif modern. Kami mendidik siswa untuk ahli dalam teknologi mesin konvensional hingga kendaraan listrik (EV).</p>
                    </div>
                    
                    <!-- Accordion Visi Misi -->
                    <div class="mt-8 border-t border-slate-200 pt-6" x-data="{ active: null }">
                        <!-- Item 1 -->
                        <div class="border-b border-slate-100 py-3">
                            <button @click="active !== 1 ? active = 1 : active = null" class="flex justify-between items-center w-full focus:outline-none text-left">
                                <span class="font-bold text-slate-900 flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                    Visi Jurusan
                                </span>
                                <svg class="h-5 w-5 text-slate-400 transform transition-transform duration-200" :class="{'rotate-180': active === 1}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div x-show="active === 1" x-collapse>
                                <p class="mt-3 text-slate-600 pb-2 pl-8">Menjadi pusat pendidikan dan pelatihan kejuruan Teknik Otomotif terkemuka yang menghasilkan tamatan kompeten, berkarakter, dan berwawasan global.</p>
                            </div>
                        </div>
                        
                        <!-- Item 2 -->
                        <div class="border-b border-slate-100 py-3">
                            <button @click="active !== 2 ? active = 2 : active = null" class="flex justify-between items-center w-full focus:outline-none text-left">
                                <span class="font-bold text-slate-900 flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    Misi & Tujuan
                                </span>
                                <svg class="h-5 w-5 text-slate-400 transform transition-transform duration-200" :class="{'rotate-180': active === 2}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div x-show="active === 2" x-collapse>
                                <ul class="mt-3 text-slate-600 pb-2 pl-8 list-disc space-y-2">
                                    <li>Membekali peserta didik dengan kompetensi abad 21.</li>
                                    <li>Menyelenggarakan pembelajaran berbasis proyek (PjBL) berstandar industri.</li>
                                    <li>Meningkatkan keterserapan tamatan di dunia kerja.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <a href="{{ route('about') ?? '/profil' }}" class="inline-flex items-center px-6 py-3 border border-slate-200 shadow-sm text-base font-bold rounded-lg text-slate-900 bg-white hover:bg-slate-50 hover:text-red-600 transition-colors">
                            Baca Selengkapnya
                            <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <!-- ============================================== -->
    <!-- 05. PROGRAM & KOMPETENSI -->
    <!-- ============================================== -->
    <section id="program-keahlian" class="py-16 md:py-24 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Program Keahlian</span>
                <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Belajar tidak hanya teori.</h2>
                <p class="mt-4 text-lg text-slate-600">Kurikulum berbasis industri dengan porsi praktik 70% di fasilitas berstandar nasional.</p>
            </div>

            <!-- Horizontal Scroll on Mobile, Grid on Desktop -->
            <div class="flex overflow-x-auto snap-x snap-mandatory pb-8 md:pb-0 md:grid md:grid-cols-2 lg:grid-cols-3 gap-6" style="scrollbar-width: none;">
                @forelse($programs as $program)
                <a href="{{ route('academic.programs') }}#{{ $program->slug }}" class="group relative block h-[420px] w-full rounded-2xl overflow-hidden bg-slate-900 snap-center min-w-[85vw] md:min-w-0 flex-shrink-0 shadow-lg @if($loop->iteration == 3) lg:col-span-1 md:col-span-2 @endif focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                    <img src="{{ $program->thumbnail ? Storage::url($program->thumbnail) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $program->name }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105 group-hover:opacity-60 opacity-80 md:opacity-90" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/70 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-6 md:p-8 flex flex-col justify-end h-full">
                        <div class="mb-4 w-12 h-12 rounded-full bg-red-600/20 flex items-center justify-center backdrop-blur-sm border border-red-500/30">
                            <svg class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2 transform transition-transform duration-300 md:group-hover:-translate-y-4">{{ $program->name }}</h3>
                        <p class="text-slate-300 text-sm md:text-base line-clamp-2 md:group-hover:opacity-0 transition-opacity duration-300 md:group-hover:absolute md:group-hover:invisible focus-within:opacity-0">{{ Str::limit(strip_tags($program->description), 100) }}</p>
                        
                        <div class="mt-4 md:absolute md:bottom-8 md:opacity-0 md:translate-y-4 md:group-hover:opacity-100 focus-within:opacity-100 focus-within:translate-y-0 md:group-hover:translate-y-0 transition-all duration-300 hidden md:block">
                            <p class="text-red-400 font-semibold text-xs tracking-wider uppercase mb-2">Kompetensi Utama:</p>
                            <ul class="text-white text-sm space-y-1">
                                @forelse($program->competencies->take(3) as $comp)
                                <li class="flex items-center"><svg class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ $comp->name }}</li>
                                @empty
                                <li class="text-slate-400 italic">Belum ada data kompetensi</li>
                                @endforelse
                            </ul>
                            <div class="mt-4 inline-flex items-center text-red-400 font-medium text-sm group-hover:text-red-300">Lihat Detail Program <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-slate-200 border-dashed">
                    <p class="text-slate-500 font-medium">Data program keahlian belum tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 06. FASILITAS UNGGULAN -->
    <!-- ============================================== -->
    <section class="py-16 md:py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
                <div>
                    <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Lingkungan Belajar</span>
                    <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-white tracking-tight">Fasilitas Standar Industri</h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('facilities.index') ?? '/fasilitas' }}" class="text-sm font-bold text-slate-300 hover:text-white flex items-center transition-colors">
                        Lihat Seluruh Fasilitas
                        <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Editorial Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                @if($facilities->isNotEmpty())
                @php $featuredFacility = $facilities->first(); @endphp
                <!-- Featured (Kiri: 8 Kolom) -->
                <div class="lg:col-span-8">
                    <a href="{{ route('facilities.index') ?? '/fasilitas' }}" class="group relative block w-full h-[400px] md:h-[500px] lg:h-full rounded-2xl overflow-hidden focus:outline-none focus:ring-4 focus:ring-red-500">
                        <img src="{{ $featuredFacility->photo ? Storage::url($featuredFacility->photo) : 'https://images.unsplash.com/photo-1632823465306-cdbb32ab7586?q=80&w=1200&auto=format&fit=crop' }}" alt="{{ $featuredFacility->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                        <div class="absolute inset-0 p-6 md:p-10 flex flex-col justify-end">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-600 text-white backdrop-blur-sm shadow-sm w-max mb-3 tracking-wide">
                                Fasilitas Utama
                            </span>
                            <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">{{ $featuredFacility->name }}</h3>
                            <p class="text-slate-300 line-clamp-2 md:text-lg max-w-2xl font-medium">
                                {{ Str::limit(strip_tags($featuredFacility->description), 120) }}
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Others (Kanan: 4 Kolom, Vertical Stack) -->
                <div class="lg:col-span-4 flex flex-col gap-6">
                    @foreach($facilities->skip(1) as $facility)
                    <a href="{{ route('facilities.index') ?? '/fasilitas' }}" class="group flex flex-col sm:flex-row lg:flex-col gap-4 bg-slate-800/80 hover:bg-slate-800 rounded-2xl p-4 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 h-full border border-slate-700">
                        <div class="relative w-full sm:w-1/3 lg:w-full aspect-video rounded-xl overflow-hidden flex-shrink-0">
                            <img src="{{ $facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1579730537446-5ec5e1b7b7dd?q=80&w=600&auto=format&fit=crop' }}" alt="{{ $facility->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                        </div>
                        <div class="flex flex-col flex-1 justify-center p-1">
                            <span class="text-red-400 text-xs font-bold uppercase tracking-wider mb-1">Fasilitas</span>
                            <h4 class="text-lg font-bold text-white group-hover:text-red-400 transition-colors">{{ $facility->name }}</h4>
                            <p class="text-slate-400 text-sm mt-1 line-clamp-2">{{ Str::limit(strip_tags($facility->description), 80) }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="col-span-full py-12 text-center bg-slate-800 rounded-2xl border border-slate-700 border-dashed">
                    <p class="text-slate-400 font-medium">Data fasilitas belum tersedia.</p>
                </div>
                @endif
            </div>
            
            <div class="mt-8 md:hidden">
                <a href="{{ route('facilities.index') ?? '/fasilitas' }}" class="flex justify-center px-4 py-3 bg-slate-800 hover:bg-slate-700 rounded-lg text-white font-bold transition-colors">
                    Lihat Seluruh Fasilitas
                </a>
            </div>
        </div>
    <!-- ============================================== -->
    <!-- 07. SUPER SECTION: INDUSTRI, PKL & KARIER -->
    <!-- ============================================== -->
    <section class="py-16 md:py-24 bg-white overflow-hidden border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Koneksi Industri</span>
                <h2 class="mt-2 text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight">Belajar dari Sekolah, Berkembang Bersama Industri.</h2>
                <p class="mt-4 text-lg text-slate-600">Perjalanan siswa kami didesain tidak hanya untuk lulus, tetapi untuk langsung bekerja di perusahaan terkemuka.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <!-- Kiri: Logo Wall & PKL Timeline (7 Kolom) -->
                <div class="lg:col-span-7">
                    <!-- Mitra Industri Logo Wall -->
                    <div class="mb-12">
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            Partner Industri Kami
                        </h3>
                        <div class="grid grid-cols-3 sm:grid-cols-4 gap-6 items-center">
                            @forelse($partners->take(7) as $partner)
                            <a href="{{ route('partnership.show', $partner->slug) ?? '#' }}" class="flex items-center justify-center p-4 bg-slate-50 rounded-xl grayscale hover:grayscale-0 transition-all border border-slate-100 hover:border-red-200 hover:shadow-md cursor-pointer" title="{{ $partner->name }}">
                                @if($partner->logo)
                                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-12 max-w-full object-contain" loading="lazy">
                                @else
                                    <span class="font-bold text-slate-400 text-xs text-center">{{ $partner->name }}</span>
                                @endif
                            </a>
                            @empty
                            <div class="col-span-full py-4 text-center">
                                <span class="text-sm text-slate-500">Belum ada partner industri.</span>
                            </div>
                            @endforelse
                            <a href="{{ route('partnership.index') ?? '/kemitraan' }}" class="flex items-center justify-center p-4 bg-slate-50 rounded-xl hover:bg-red-50 text-red-600 transition-all border border-slate-100 hover:border-red-200 cursor-pointer h-full min-h-[80px]">
                                <span class="font-bold text-sm text-center">Lihat<br>Semua</span>
                            </a>
                        </div>
                    </div>

                    <!-- Visual Timeline PKL -->
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Alur Praktik Kerja Lapangan
                        </h3>
                        <div class="relative border-l-2 border-slate-200 ml-3 space-y-6">
                            <div class="relative pl-6">
                                <div class="absolute -left-2 top-1.5 w-4 h-4 bg-red-600 rounded-full border-4 border-white shadow-sm"></div>
                                <h4 class="font-bold text-slate-900">Persiapan & Pembekalan</h4>
                                <p class="text-sm text-slate-500 mt-1">Siswa diberikan pelatihan etos kerja budaya industri sebelum penempatan.</p>
                            </div>
                            <div class="relative pl-6">
                                <div class="absolute -left-2 top-1.5 w-4 h-4 bg-slate-300 rounded-full border-4 border-white shadow-sm"></div>
                                <h4 class="font-bold text-slate-900">Penempatan Industri</h4>
                                <p class="text-sm text-slate-500 mt-1">Praktik langsung selama 3-6 bulan di bengkel resmi sesuai kompetensi.</p>
                            </div>
                            <div class="relative pl-6">
                                <div class="absolute -left-2 top-1.5 w-4 h-4 bg-slate-300 rounded-full border-4 border-white shadow-sm"></div>
                                <h4 class="font-bold text-slate-900">Evaluasi & Sertifikasi</h4>
                                <p class="text-sm text-slate-500 mt-1">Uji kompetensi langsung oleh asesor industri untuk mendapatkan sertifikat.</p>
                            </div>
                        </div>
                        <div class="mt-6 ml-3">
                            <a href="#" class="text-sm font-bold text-red-600 hover:text-red-700 flex items-center">Info Selengkapnya PKL <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg></a>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Lowongan Kerja BKK (5 Kolom) -->
                <div class="lg:col-span-5 relative mt-12 lg:mt-0">
                    <div class="bg-slate-50 rounded-2xl p-6 md:p-8 border border-slate-100 h-full shadow-inner relative overflow-hidden">
                        <!-- Decorative bg -->
                        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-48 h-48 bg-red-100 rounded-full opacity-50 blur-3xl"></div>
                        
                        <div class="flex justify-between items-center mb-6 relative z-10">
                            <h3 class="text-xl font-bold text-slate-900 flex items-center">
                                Bursa Kerja Khusus
                            </h3>
                            <span class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1 rounded-full">{{ $jobVacancies->count() }} Lowongan Aktif</span>
                        </div>
                        
                        <div class="space-y-4 relative z-10">
                            @forelse($jobVacancies as $job)
                            <a href="{{ route('jobs.show', $job->slug) ?? '#' }}" class="block bg-white p-5 rounded-xl shadow-sm border border-slate-200 hover:border-red-300 hover:shadow-md transition-all group focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-bold text-slate-900 group-hover:text-red-600 transition-colors">{{ $job->title }}</h4>
                                        <p class="text-sm text-slate-500 mt-0.5">{{ $job->industryPartner->name ?? $job->position }}</p>
                                    </div>
                                    <span class="text-xs font-medium bg-slate-100 text-slate-600 px-2 py-1 rounded">{{ ucfirst(str_replace('_', ' ', $job->employment_type)) }}</span>
                                </div>
                                <div class="flex items-center text-xs text-slate-400 mt-4 space-x-4">
                                    <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg> {{ $job->location }}</span>
                                    <span class="flex items-center {{ $job->application_deadline && $job->application_deadline->diffInDays(now()) <= 7 ? 'text-red-500' : '' }}"><svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> {{ $job->application_deadline ? 'Tutup ' . $job->application_deadline->diffForHumans() : 'Dibuka Terus' }}</span>
                                </div>
                            </a>
                            @empty
                            <div class="py-6 text-center border border-slate-200 border-dashed rounded-xl bg-white">
                                <span class="text-sm text-slate-500">Belum ada lowongan baru.</span>
                            </div>
                            @endforelse
                        </div>
                        
                        <div class="mt-8 relative z-10">
                            <a href="#" class="block w-full text-center px-4 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors shadow-sm focus:outline-none focus:ring-4 focus:ring-red-300">
                                Lihat Semua Lowongan
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 08. JEJAK ALUMNI (SOCIAL PROOF) -->
    <!-- ============================================== -->
    <section class="py-16 md:py-24 bg-slate-900 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div class="max-w-2xl">
                    <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Jejak Lulusan Kami</span>
                    <h2 class="mt-2 text-3xl md:text-4xl font-extrabold text-white tracking-tight">Menjadi Profesional di Berbagai Bidang.</h2>
                </div>
                <div class="mt-6 md:mt-0">
                    <a href="{{ route('alumni.index') ?? '/alumni' }}" class="inline-flex items-center px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-sm font-bold rounded-lg transition-colors border border-slate-700 focus:outline-none focus:ring-4 focus:ring-red-500">
                        Jelajahi Data Alumni
                    </a>
                </div>
            </div>

            <!-- Horizontal Swipeable Carousel for Mobile, Grid for Desktop -->
            <div class="flex overflow-x-auto snap-x snap-mandatory pb-8 md:pb-0 md:grid md:grid-cols-3 lg:grid-cols-4 gap-6 hide-scrollbar">
                
                <div class="group relative bg-slate-800 rounded-2xl overflow-hidden snap-center min-w-[75vw] sm:min-w-[50vw] md:min-w-0 flex-shrink-0 shadow-xl border border-slate-700">
                    <div class="aspect-[4/5] relative">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=600&auto=format&fit=crop" alt="Alumni" class="w-full h-full object-cover grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <span class="inline-block px-2.5 py-1 bg-red-600 text-white text-xs font-bold rounded mb-2">Lulusan 2018</span>
                            <h3 class="text-xl font-bold text-white mb-1">Andi Setiawan</h3>
                            <p class="text-sm text-slate-300 font-medium">Owner, Andi Motor Sport</p>
                            <p class="text-xs text-slate-400 mt-1"><svg class="inline w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg> Surabaya</p>
                        </div>
                    </div>
                </div>

                <!-- Alumni Card 4 (Hidden on sm, md. Visible on lg) -->
                <div class="group relative bg-slate-800 rounded-2xl overflow-hidden snap-center min-w-[75vw] hidden lg:block flex-shrink-0 shadow-xl border border-slate-700">
                    <div class="aspect-[4/5] relative flex items-center justify-center bg-slate-800 hover:bg-slate-700 transition-colors cursor-pointer">
                        <div class="text-center p-6">
                            <div class="w-16 h-16 rounded-full bg-slate-700 mx-auto flex items-center justify-center mb-4 group-hover:bg-red-600 transition-colors">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white">Lihat Ratusan<br>Data Alumni Lainnya</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ============================================== -->
    <!-- 09. INFORMATION HUB: BERITA & AGENDA -->
    <!-- ============================================== -->
    <section class="py-16 md:py-24 bg-white overflow-hidden border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <!-- Kiri: Berita Terbaru (8 Kolom) -->
                <div class="lg:col-span-8">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Informasi Terkini</span>
                            <h2 class="mt-2 text-3xl font-extrabold text-slate-900 tracking-tight">Berita Jurusan</h2>
                        </div>
                        <a href="{{ route('news.index') ?? '/berita' }}" class="hidden sm:flex items-center text-sm font-bold text-slate-500 hover:text-red-600 transition-colors">
                            Lihat Semua Berita
                            <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($latestNews->isNotEmpty())
                        @php $featuredNews = $latestNews->first(); @endphp
                        <!-- Featured News Card -->
                        <article class="md:col-span-2 group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300">
                            <a href="{{ route('news.show', $featuredNews->slug) ?? '#' }}" class="block relative aspect-[2/1] md:aspect-[2.5/1] overflow-hidden focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                                <img src="{{ $featuredNews->thumbnail ? Storage::url($featuredNews->thumbnail) : 'https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?q=80&w=800&auto=format&fit=crop' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $featuredNews->title }}" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    @if($featuredNews->category)
                                    <span class="inline-block px-2.5 py-1 bg-red-600 text-white text-xs font-bold rounded mb-2">{{ $featuredNews->category->name }}</span>
                                    @endif
                                    <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-red-300 transition-colors">{{ $featuredNews->title }}</h3>
                                    <p class="text-slate-300 text-sm hidden md:block line-clamp-1">{{ $featuredNews->excerpt ?? Str::limit(strip_tags($featuredNews->content), 100) }}</p>
                                </div>
                            </a>
                        </article>

                        @foreach($latestNews->skip(1) as $news)
                        <!-- Standard News Card -->
                        <article class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                            <a href="{{ route('news.show', $news->slug) ?? '#' }}" class="block relative aspect-video overflow-hidden bg-slate-100 focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                                <img src="{{ $news->thumbnail ? Storage::url($news->thumbnail) : 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=600&auto=format&fit=crop' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $news->title }}" loading="lazy">
                                @if($news->category)
                                <span class="absolute top-3 left-3 px-2.5 py-1 bg-blue-600 text-white text-xs font-bold rounded shadow-sm">{{ $news->category->name }}</span>
                                @endif
                            </a>
                            <div class="p-5 flex-1 flex flex-col">
                                <p class="text-xs text-slate-500 font-medium mb-2"><svg class="inline w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg> {{ $news->published_at ? $news->published_at->translatedFormat('d M Y') : $news->created_at->translatedFormat('d M Y') }}</p>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors leading-tight"><a href="{{ route('news.show', $news->slug) ?? '#' }}" class="focus:outline-none focus:underline">{{ $news->title }}</a></h3>
                                <p class="text-slate-600 text-sm line-clamp-2 mt-auto">{{ $news->excerpt ?? Str::limit(strip_tags($news->content), 80) }}</p>
                            </div>
                        </article>
                        @endforeach
                        @else
                        <div class="md:col-span-2 py-12 text-center border border-slate-200 border-dashed rounded-2xl bg-slate-50">
                            <p class="text-slate-500 font-medium">Belum ada berita terbaru.</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Kanan: Agenda Kegiatan (4 Kolom) -->
                <div class="lg:col-span-4 mt-12 lg:mt-0">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <span class="text-sm font-bold tracking-wider text-red-600 uppercase">Akan Datang</span>
                            <h2 class="mt-2 text-3xl font-extrabold text-slate-900 tracking-tight">Agenda</h2>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 shadow-inner">
                        <div class="space-y-4">
                            @forelse($agendas as $agenda)
                            <a href="{{ route('announcements.show', $agenda->slug) ?? '#' }}" class="flex group bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-red-300 hover:shadow-md transition-all focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                                <div class="bg-red-50 text-red-700 px-4 py-3 flex flex-col items-center justify-center border-r border-slate-100 min-w-[70px]">
                                    <span class="text-xs font-bold uppercase tracking-wider">{{ $agenda->created_at->translatedFormat('M') }}</span>
                                    <span class="text-2xl font-extrabold leading-none my-1">{{ $agenda->created_at->format('d') }}</span>
                                </div>
                                <div class="p-4 flex-1">
                                    <h4 class="font-bold text-slate-900 group-hover:text-red-600 transition-colors line-clamp-1">{{ $agenda->title }}</h4>
                                    <div class="mt-2 text-xs text-slate-500 flex flex-col space-y-1">
                                        <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Diumumkan {{ $agenda->created_at->diffForHumans() }}</span>
                                        @if($agenda->file_attachment)
                                        <span class="flex items-center text-blue-500"><svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg> Ada Lampiran</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="py-8 text-center bg-white rounded-xl border border-slate-200 border-dashed">
                                <p class="text-slate-500 text-sm">Belum ada agenda atau pengumuman.</p>
                            </div>
                            @endforelse
                        </div>
                        
                        <div class="mt-6 text-center">
                            <a href="{{ route('announcements.index') ?? '/agenda' }}" class="text-sm font-bold text-red-600 hover:text-red-700 flex items-center justify-center">Lihat Semua Agenda <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center sm:hidden">
                <a href="{{ route('news.index') ?? '/berita' }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 rounded-lg text-sm font-bold bg-white text-slate-900 w-full shadow-sm">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 10. VISUAL PROOF: GALLERY & YOUTUBE -->
    <!-- ============================================== -->
    <section class="py-16 md:py-24 bg-slate-900 overflow-hidden border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
                
                <!-- Kiri: YouTube Facade -->
                <div class="flex flex-col">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Video Profile</span>
                            <h2 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Kanal YouTube Kami</h2>
                        </div>
                    </div>
                    
                    <!-- YouTube Lazy Facade (Alpine.js) -->
                    <div x-data="{ loaded: false, videoId: 'dQw4w9WgXcQ' }" class="relative aspect-video rounded-2xl overflow-hidden shadow-2xl bg-slate-800 border-4 border-slate-800 group h-full max-h-[350px]">
                        <!-- Thumbnail Overlay -->
                        <div x-show="!loaded" class="absolute inset-0 cursor-pointer" @click="loaded = true">
                            <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-80" loading="lazy">
                            <div class="absolute inset-0 bg-slate-900/30 group-hover:bg-transparent transition-colors"></div>
                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-lg shadow-red-600/50 group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Iframe (Loads only when clicked) -->
                        <template x-if="loaded">
                            <iframe 
                                :src="'https://www.youtube-nocookie.com/embed/' + videoId + '?autoplay=1&rel=0'" 
                                class="absolute inset-0 w-full h-full border-0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </template>
                    </div>
                    
                    <div class="mt-4 flex items-center justify-between">
                        <p class="text-slate-400 text-sm">Lihat aktivitas kami dalam bentuk video pendek.</p>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="text-sm font-bold text-red-500 hover:text-white transition-colors flex items-center">
                            Subscribe
                            <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Kanan: Gallery Bento -->
                <div class="flex flex-col">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <span class="text-sm font-bold tracking-wider text-red-500 uppercase">Dokumentasi</span>
                            <h2 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Galeri Kegiatan</h2>
                        </div>
                        <a href="{{ route('gallery.index') ?? '/galeri' }}" class="hidden sm:flex items-center text-sm font-bold text-slate-400 hover:text-white transition-colors">
                            Lihat Semua Foto
                            <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                    
                    <!-- Bento Grid -->
                    <div class="grid grid-cols-2 gap-4 h-full max-h-[350px]">
                        @if($galleries->isNotEmpty())
                        @php $firstGallery = $galleries->first(); @endphp
                        <a href="{{ route('gallery.show', $firstGallery->slug) ?? '#' }}" class="block relative rounded-2xl overflow-hidden group shadow-lg row-span-2 focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                            <img src="{{ $firstGallery->thumbnail ? Storage::url($firstGallery->thumbnail) : 'https://images.unsplash.com/photo-1532522714596-f94be6a2fa59?q=80&w=600&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-80 group-hover:opacity-100" alt="{{ $firstGallery->title }}" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">
                                <span class="text-white font-bold text-sm">{{ $firstGallery->title }}</span>
                            </div>
                        </a>
                        
                        @if($galleries->count() > 1)
                        @php $secondGallery = $galleries->skip(1)->first(); @endphp
                        <a href="{{ route('gallery.show', $secondGallery->slug) ?? '#' }}" class="block relative rounded-2xl overflow-hidden group shadow-lg focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                            <img src="{{ $secondGallery->thumbnail ? Storage::url($secondGallery->thumbnail) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=400&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-80 group-hover:opacity-100" alt="{{ $secondGallery->title }}" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">
                                <span class="text-white font-bold text-xs">{{ $secondGallery->title }}</span>
                            </div>
                        </a>
                        @endif

                        <a href="{{ route('gallery.index') ?? '/galeri' }}" class="block relative rounded-2xl overflow-hidden group shadow-lg flex items-center justify-center bg-slate-800 hover:bg-slate-700 transition-colors border border-slate-700 focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none">
                            <div class="text-center">
                                <span class="block text-xl font-bold text-white mb-1">+{{ \App\Models\GalleryAlbum::count() }}</span>
                                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Album Lainnya</span>
                            </div>
                        </a>
                        @else
                        <div class="col-span-2 py-12 text-center bg-slate-800 rounded-2xl border border-slate-700 border-dashed">
                            <p class="text-slate-400 font-medium">Belum ada galeri kegiatan.</p>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
            
            <div class="mt-8 text-center sm:hidden">
                <a href="{{ route('gallery.index') ?? '/galeri' }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-700 rounded-lg text-sm font-bold bg-slate-800 text-white w-full shadow-sm">
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    <!-- ============================================== -->
    <!-- 11. DOWNLOAD CENTER RIBBON -->
    <!-- ============================================== -->
    <section class="py-12 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden">
                <!-- Decorative Icon Background -->
                <svg class="absolute -right-10 -top-10 w-48 h-48 text-slate-50 opacity-50 transform -rotate-12 pointer-events-none" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                
                <div class="flex items-center w-full md:w-auto relative z-10">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mr-5">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" /></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 leading-tight">Pusat Unduhan Dokumen</h3>
                        <p class="text-sm text-slate-500 mt-1">Jurnal PKL, Modul Ajar, Formulir Pendaftaran, SOP Bengkel.</p>
                    </div>
                </div>
                
                <div class="w-full md:w-auto flex-shrink-0 relative z-10">
                    <a href="{{ route('download.index') ?? '/download' }}" class="inline-flex justify-center items-center px-6 py-3 bg-white border border-slate-300 text-sm font-bold text-slate-700 rounded-lg hover:bg-slate-50 hover:text-blue-600 transition-colors w-full shadow-sm">
                        Menuju Download Center
                        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 12. FINAL CTA -->
    <!-- ============================================== -->
    <section class="relative bg-red-700 py-16 md:py-24 overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
                <path d="M0,0 L50,100 L0,100 Z" fill="currentColor" opacity="0.5" />
            </svg>
        </div>
        <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/3 opacity-20 hidden md:block">
            <svg class="w-96 h-96 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><path d="M11 19.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm5.9-4.9c-.31.81-.8 1.54-1.4 2.15l-3.5-3.5v-3c0-.55-.45-1-1-1h-2v-2h2c1.1 0 2-.9 2-2V4.26c3.95.73 7 4.15 7 8.24 0 1.02-.2 2.01-.5 2.93z"/></svg>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-6">
                Mulai Perjalanan Anda Bersama Kami.
            </h2>
            <p class="text-lg md:text-xl text-red-100 mb-10 max-w-2xl mx-auto">
                Baik Anda calon siswa yang mencari keahlian, atau perusahaan yang mencari teknisi andal, kami siap menjadi jembatan masa depan Anda.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('about') ?? '/profil' }}" class="inline-flex justify-center items-center px-8 py-4 bg-white text-red-700 font-bold rounded-xl hover:bg-slate-100 hover:scale-105 transition-all shadow-xl shadow-red-900/20 focus:outline-none focus:ring-4 focus:ring-white">
                    Jelajahi Jurusan
                </a>
                <a href="{{ route('partnership.index') ?? '/kemitraan' }}" class="inline-flex justify-center items-center px-8 py-4 bg-transparent border-2 border-white/50 text-white font-bold rounded-xl hover:bg-white/10 hover:border-white transition-all focus:outline-none focus:ring-4 focus:ring-white">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
