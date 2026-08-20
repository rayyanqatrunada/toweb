<x-layouts.app title="Program & Kompetensi">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Program & Kompetensi Keahlian",
      "description": "Program keahlian dan kompetensi teknis yang tersedia di jurusan kami."
    }
    </script>
    @endpush

    <!-- SECTION A — ACADEMIC HERO -->
    <section class="relative bg-white pt-24 pb-16 lg:pt-32 lg:pb-24 border-b border-charcoal-200 overflow-hidden">
        <!-- Abstract Technical Pattern -->
        <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 1px 1px, #94a3b8 1px, transparent 0); background-size: 24px 24px;"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Akademik' => '#', 'Program Keahlian' => route('academic.programs')]" class="mb-8" />
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-end">
                <div class="lg:col-span-8 reveal-on-scroll reveal-up">
                    <x-frontend.ui.eyebrow>ACADEMIC PROGRAM</x-frontend.ui.eyebrow>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-charcoal-900 tracking-tight leading-[1.1] mt-4 mb-6">
                        Program &<br class="hidden sm:block"> Kompetensi Keahlian
                    </h1>
                    <p class="text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl border-l-2 border-primary-600 pl-4">
                        Kurikulum teknikal kami dirancang secara komprehensif untuk membangun penguasaan mekanik tingkat lanjut dan kesiapan industri sejak hari pertama di bengkel.
                    </p>
                </div>
                
                <div class="lg:col-span-4 reveal-on-scroll reveal-up delay-100 hidden lg:flex flex-col items-end pb-2">
                    <div class="text-right">
                        <span class="block text-4xl font-extrabold text-charcoal-900">{{ count($programs) }}</span>
                        <span class="block text-xs font-bold text-charcoal-500 uppercase tracking-widest mt-1">Jalur Konsentrasi</span>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- SECTION B & C — PROGRAM OVERVIEW & COMPETENCY SPECIFICATIONS -->
    <section class="bg-charcoal-50 py-16 lg:py-24">
        <x-frontend.layout.container>
            @forelse($programs as $index => $program)
                <div id="{{ $program->slug }}" class="mb-24 last:mb-0 reveal-on-scroll reveal-up scroll-mt-24">
                    <!-- Program Header & Content -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-start mb-12">
                        <!-- Left: Visual & Number -->
                        <div class="lg:col-span-5 relative group">
                            <span class="absolute -top-12 -left-6 text-[8rem] font-black text-charcoal-900/5 leading-none select-none z-0 hidden lg:block">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            
                            <div class="relative z-10 w-full aspect-[4/3] lg:aspect-square bg-charcoal-200 overflow-hidden {{ $loop->iteration % 2 == 0 ? 'rounded-tr-3xl rounded-bl-3xl' : 'rounded-tl-3xl rounded-br-3xl' }}">
                                @if($program->thumbnail)
                                    <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-charcoal-400 bg-charcoal-100">
                                        <svg class="w-16 h-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                        <span class="text-xs font-bold uppercase tracking-widest">{{ $program->name }}</span>
                                    </div>
                                @endif
                                <div class="absolute inset-0 ring-1 ring-inset ring-charcoal-900/10 mix-blend-multiply"></div>
                            </div>
                        </div>

                        <!-- Right: Info & Competencies -->
                        <div class="lg:col-span-7 pt-4 lg:pt-8 relative z-10">
                            <!-- Mobile Index -->
                            <span class="text-primary-600 font-bold tracking-widest text-sm mb-3 block lg:hidden">
                                PROGRAM {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-charcoal-900 tracking-tight leading-tight mb-6">
                                {{ $program->name }}
                            </h2>
                            
                            <div class="prose prose-lg prose-charcoal prose-p:leading-relaxed max-w-none mb-10">
                                {!! \App\Support\HtmlSanitizer::clean($program->description) !!}
                            </div>
                            
                            <!-- Competency / Technical Specification List -->
                            <div>
                                <h3 class="text-xs font-bold uppercase tracking-widest text-charcoal-500 mb-6 flex items-center">
                                    <span class="bg-charcoal-200 h-px flex-grow mr-4"></span>
                                    Technical Specifications
                                    <span class="bg-charcoal-200 h-px flex-grow ml-4"></span>
                                </h3>
                                
                                @if($program->competencies->isNotEmpty())
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-0 border-t border-charcoal-200">
                                        @foreach($program->competencies as $compIndex => $competency)
                                            <div class="py-5 border-b border-charcoal-200 group/comp">
                                                <div class="flex items-start">
                                                    <span class="text-primary-600 font-bold font-mono text-sm mr-4 mt-0.5">
                                                        {{ str_pad($compIndex + 1, 2, '0', STR_PAD_LEFT) }}
                                                    </span>
                                                    <div>
                                                        <h4 class="text-base font-bold text-charcoal-900 mb-1 group-hover/comp:text-primary-600 transition-colors">{{ $competency->name }}</h4>
                                                        @if($competency->description)
                                                            <p class="text-sm text-charcoal-600 leading-relaxed">{{ strip_tags($competency->description) }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="bg-white border border-charcoal-200 rounded-xl p-6 text-center">
                                        <p class="text-sm font-medium text-charcoal-500">Spesifikasi kompetensi belum tersedia.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-20 reveal-on-scroll reveal-up">
                    <x-frontend.ui.empty-state title="Belum Ada Program" message="Data program keahlian sedang dalam tahap pembaruan sistem." icon="document" />
                </div>
            @endforelse
        </x-frontend.layout.container>
    </section>

    <!-- SECTION D — LEARNING APPROACH (Storytelling) -->
    @if(count($programs) > 0)
    <section class="bg-charcoal-950 text-white py-16 lg:py-24 overflow-hidden relative">
        <div class="absolute inset-0 opacity-20" style="background-image: linear-gradient(45deg, #1e293b 25%, transparent 25%), linear-gradient(-45deg, #1e293b 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #1e293b 75%), linear-gradient(-45deg, transparent 75%, #1e293b 75%); background-size: 20px 20px; background-position: 0 0, 0 10px, 10px -10px, -10px 0px;"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center divide-y md:divide-y-0 md:divide-x divide-charcoal-800">
                <div class="pt-8 md:pt-0 reveal-on-scroll reveal-up">
                    <span class="w-12 h-12 mx-auto rounded-full bg-primary-600/20 text-primary-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </span>
                    <h3 class="text-xl font-bold mb-3">Teori Terapan</h3>
                    <p class="text-charcoal-400 text-sm leading-relaxed">Penyampaian materi teknis yang diselaraskan secara langsung dengan standar operasional prosedur industri manufaktur.</p>
                </div>
                <div class="pt-8 md:pt-0 reveal-on-scroll reveal-up delay-100">
                    <span class="w-12 h-12 mx-auto rounded-full bg-primary-600/20 text-primary-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </span>
                    <h3 class="text-xl font-bold mb-3">Praktik Intensif</h3>
                    <p class="text-charcoal-400 text-sm leading-relaxed">Pengalaman menggunakan perangkat diagnosa dan toolkit standar yang dipakai pada bengkel resmi otomotif masa kini.</p>
                </div>
                <div class="pt-8 md:pt-0 reveal-on-scroll reveal-up delay-200">
                    <span class="w-12 h-12 mx-auto rounded-full bg-primary-600/20 text-primary-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </span>
                    <h3 class="text-xl font-bold mb-3">Kesiapan Kerja</h3>
                    <p class="text-charcoal-400 text-sm leading-relaxed">Membentuk etos kerja, kedisiplinan 5S, dan mentalitas profesional sebagai bekal transisi menuju jenjang karir.</p>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>
    @endif

    <!-- SECTION E — ACADEMIC CTA -->
    <x-frontend.layout.section class="bg-white text-center border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="max-w-3xl mx-auto reveal-on-scroll reveal-up">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mb-6">Eksplorasi Ekosistem Akademik</h2>
                <p class="text-lg text-charcoal-600 mb-10 leading-relaxed">Didukung oleh fasilitas yang memadai dan tenaga kependidikan yang kompeten di bidangnya masing-masing.</p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <x-frontend.ui.button href="{{ route('academic.teachers') }}" class="w-full sm:w-auto">
                        Profil Tenaga Pendidik
                    </x-frontend.ui.button>
                    <x-frontend.ui.button href="{{ route('academic.facilities') }}" variant="outline" class="w-full sm:w-auto">
                        Lihat Fasilitas Bengkel
                    </x-frontend.ui.button>
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

</x-layouts.app>
