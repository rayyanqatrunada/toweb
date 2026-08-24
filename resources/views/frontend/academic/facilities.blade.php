<x-layouts.app title="Fasilitas Bengkel">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Fasilitas & Workshop Otomotif",
      "description": "Fasilitas bengkel dan laboratorium praktik berstandar industri."
    }
    </script>
    @endpush

    <!-- HERO SECTION (BENTO STYLE) -->
    <section class="relative bg-charcoal-50 overflow-hidden lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-charcoal-200/50 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Akademik' => '#', 'Fasilitas Bengkel' => route('academic.facilities')]" class="mb-8" />
            
            <div class="max-w-4xl">
                <span class="inline-block py-1.5 px-3 rounded-md bg-white border border-charcoal-200 text-[10px] font-black uppercase tracking-widest text-charcoal-900 mb-6 shadow-sm reveal-on-scroll reveal-up">
                    INFRASTRUKTUR PRAKTIK
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-charcoal-950 tracking-tighter leading-[0.95] mb-6 uppercase reveal-on-scroll reveal-up delay-100">
                    FASILITAS <br class="hidden sm:block">
                    <span class="text-charcoal-400">BENGKEL UTAMA</span>
                </h1>
                <p class="text-base lg:text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl reveal-on-scroll reveal-up delay-200">
                    Merasakan pengalaman kerja nyata melalui ekosistem laboratorium praktik dan infrastruktur bengkel berstandar industri manufaktur.
                </p>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- BENTO GRID FOR FACILITIES -->
    <section class="bg-charcoal-50 pb-20 lg:pb-32">
        <x-frontend.layout.container>
            
            @if(count($facilities) === 0)
                <div class="py-20 reveal-on-scroll reveal-up">
                    <x-frontend.ui.empty-state title="Belum Ada Data Fasilitas" message="Data fasilitas bengkel sedang dalam tahap inventarisasi." icon="document" />
                </div>
            @else
                
                <!-- BENTO GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 auto-rows-[350px] lg:auto-rows-[450px]">
                    
                    @foreach($facilities as $index => $facility)
                        @php
                            // Make every 3rd facility span 2 columns if not on mobile, just to create a dynamic bento layout
                            $colSpan = ($index % 3 == 0) ? 'md:col-span-2 lg:col-span-2' : 'md:col-span-1 lg:col-span-1';
                        @endphp
                        
                        <div class="{{ $colSpan }} bg-charcoal-900 rounded-3xl relative overflow-hidden group shadow-sm flex flex-col justify-end reveal-on-scroll reveal-up delay-[{{ ($index % 3) * 100 }}ms]">
                            <!-- Image Background -->
                            <img src="{{ $facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $facility->name }}" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-80 group-hover:scale-105 transition-all duration-700" loading="{{ $index < 3 ? 'eager' : 'lazy' }}">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/60 to-transparent"></div>
                            
                            <!-- Content -->
                            <div class="relative z-10 p-6 lg:p-8">
                                <h2 class="text-2xl lg:text-3xl font-black text-white tracking-tight leading-tight mb-2">
                                    {{ $facility->name }}
                                </h2>
                                
                                <div class="overflow-hidden transition-all duration-500 max-h-0 opacity-0 group-hover:max-h-40 group-hover:opacity-100 group-hover:mt-4">
                                    <p class="text-charcoal-300 text-sm font-medium leading-relaxed">
                                        {{ strip_tags($facility->description) }}
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Icon/Decoration Top Right -->
                            <div class="absolute top-6 right-6 w-12 h-12 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif
        </x-frontend.layout.container>
    </section>

</x-layouts.app>




