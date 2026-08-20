<x-layouts.app title="Program Keahlian">
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

    <!-- HERO SECTION (BENTO STYLE) -->
    <section class="relative bg-charcoal-50 overflow-hidden lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-charcoal-200/50 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Akademik' => '#', 'Program Keahlian' => route('academic.programs')]" class="mb-8" />
            
            <div class="max-w-4xl">
                <span class="inline-block py-1.5 px-3 rounded-md bg-white border border-charcoal-200 text-[10px] font-black uppercase tracking-widest text-charcoal-900 mb-6 shadow-sm reveal-on-scroll reveal-up">
                    KURIKULUM & KOMPETENSI
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-charcoal-950 tracking-tighter leading-[0.95] mb-6 uppercase reveal-on-scroll reveal-up delay-100">
                    PROGRAM <br class="hidden sm:block">
                    <span class="text-charcoal-400">KEAHLIAN</span>
                </h1>
                <p class="text-base lg:text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl reveal-on-scroll reveal-up delay-200">
                    Kurikulum teknikal kami dirancang secara komprehensif untuk membangun penguasaan mekanik tingkat lanjut dan kesiapan industri sejak hari pertama di bengkel.
                </p>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- BENTO GRID FOR PROGRAMS -->
    <section class="bg-charcoal-50 pb-20 lg:pb-32">
        <x-frontend.layout.container>
            
            @forelse($programs as $index => $program)
                <!-- SINGLE PROGRAM BENTO -->
                <div id="{{ $program->slug }}" class="grid grid-cols-1 lg:grid-cols-12 gap-4 lg:gap-6 mb-16 last:mb-0 reveal-on-scroll reveal-up scroll-mt-24">
                    
                    <!-- Left Bento Box: Image & Name -->
                    <div class="lg:col-span-5 bg-charcoal-900 rounded-3xl p-6 lg:p-8 relative overflow-hidden group shadow-sm flex flex-col justify-end min-h-[300px] lg:min-h-[400px]">
                        <img src="{{ $program->thumbnail ? Storage::url($program->thumbnail) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=600&auto=format&fit=crop' }}" alt="{{ $program->name }}" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-70 group-hover:scale-105 transition-all duration-700" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/60 to-transparent"></div>
                        
                        <div class="relative z-10">
                            <span class="inline-block py-1 px-3 rounded bg-white/20 backdrop-blur-md border border-white/20 text-[10px] font-black uppercase tracking-widest text-white mb-4">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h2 class="text-2xl lg:text-4xl font-black text-white tracking-tight uppercase leading-tight">
                                {{ $program->name }}
                            </h2>
                        </div>
                    </div>

                    <!-- Right Bento Box: Description & Competencies -->
                    <div class="lg:col-span-7 bg-white rounded-3xl p-6 lg:p-10 border border-charcoal-200 shadow-sm flex flex-col">
                        <div class="prose prose-charcoal prose-p:leading-relaxed max-w-none mb-8 text-charcoal-700 text-sm lg:text-base flex-grow">
                            {!! \App\Support\HtmlSanitizer::clean($program->description) !!}
                        </div>
                        
                        <!-- Competencies List -->
                        <div>
                            <h3 class="text-[10px] font-black uppercase tracking-widest text-charcoal-400 mb-4 border-b border-charcoal-100 pb-3">
                                Spesifikasi Kompetensi
                            </h3>
                            
                            @if($program->competencies->isNotEmpty())
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    @foreach($program->competencies as $compIndex => $competency)
                                        <div class="bg-charcoal-50 rounded-2xl p-4 border border-charcoal-100 group/comp hover:bg-charcoal-100 transition-colors">
                                            <div class="flex items-start gap-3">
                                                <span class="text-charcoal-400 font-black text-xs mt-0.5">
                                                    {{ str_pad($compIndex + 1, 2, '0', STR_PAD_LEFT) }}
                                                </span>
                                                <div>
                                                    <h4 class="text-sm font-bold text-charcoal-900 mb-1 leading-tight">{{ $competency->name }}</h4>
                                                    @if($competency->description)
                                                        <p class="text-xs text-charcoal-500 leading-relaxed">{{ strip_tags($competency->description) }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-charcoal-50 rounded-2xl p-6 text-center border border-charcoal-100">
                                    <p class="text-xs font-bold uppercase tracking-wider text-charcoal-400">Spesifikasi kompetensi belum tersedia.</p>
                                </div>
                            @endif
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

</x-layouts.app>




