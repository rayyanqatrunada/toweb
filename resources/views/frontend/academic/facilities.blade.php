<x-layouts.app title="Fasilitas Bengkel & Workshop">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Fasilitas Bengkel Otomotif",
      "description": "Fasilitas bengkel dan laboratorium praktik berstandar industri di jurusan kami."
    }
    </script>
    @endpush

    <!-- SECTION A — HERO -->
    <section class="relative bg-charcoal-950 pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden text-white border-b border-charcoal-800">
        <!-- Abstract Technical/Industrial Pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, #334155 25%, transparent 25%, transparent 75%, #334155 75%, #334155), repeating-linear-gradient(45deg, #334155 25%, transparent 25%, transparent 75%, #334155 75%, #334155); background-position: 0 0, 10px 10px; background-size: 20px 20px;"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <!-- Ensure breadcrumb works on dark background by adding custom classes if necessary, or just rely on its default structure -->
            <div class="mb-8 opacity-80 hover:opacity-100 transition-opacity">
                <x-frontend.breadcrumbs :items="['Akademik' => '#', 'Fasilitas' => route('academic.facilities')]" />
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-end">
                <div class="lg:col-span-8 reveal-on-scroll reveal-up">
                    <x-frontend.ui.eyebrow class="text-charcoal-400">TECHNICAL INFRASTRUCTURE</x-frontend.ui.eyebrow>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1] mt-4 mb-6">
                        Fasilitas Bengkel &<br class="hidden sm:block"> Workshop
                    </h1>
                    <p class="text-lg text-charcoal-300 font-medium leading-relaxed max-w-2xl border-l-2 border-primary-500 pl-4">
                        Sarana praktik berstandar operasional industri. Dilengkapi dengan perangkat diagnosa masa kini untuk memastikan kesiapan kerja peserta didik.
                    </p>
                </div>
                
                <div class="lg:col-span-4 reveal-on-scroll reveal-up delay-100 hidden lg:flex flex-col items-end pb-2">
                    <div class="text-right">
                        <span class="block text-4xl font-extrabold text-white">{{ count($facilities) }}</span>
                        <span class="block text-xs font-bold text-charcoal-400 uppercase tracking-widest mt-1">Area Workshop</span>
                    </div>
                </div>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- SECTION B — FACILITY SHOWCASE -->
    <section class="bg-charcoal-50 py-16 lg:py-24">
        <x-frontend.layout.container>
            
            @if(count($facilities) === 0)
                <div class="py-20 reveal-on-scroll reveal-up">
                    <x-frontend.ui.empty-state title="Belum Ada Fasilitas" message="Data sarana dan prasarana bengkel belum ditambahkan saat ini." icon="document" />
                </div>
            @else
                
                <!-- ASYMMETRIC GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($facilities as $index => $facility)
                        @php
                            // Determine hierarchy: 
                            // Make the first facility (or ones with large quantities/good condition) featured by spanning 2 columns on desktop
                            // Since we can't reliably guess importance, let's just make the very first one featured.
                            $isFeatured = ($index === 0);
                            $gridClasses = $isFeatured ? 'md:col-span-2 lg:col-span-2 row-span-2' : 'col-span-1';
                            
                            // Condition badges mapping
                            $conditionLabel = 'Baik';
                            $badgeColor = 'success'; // Assuming L1 badge supports colors: success, warning, danger
                            if ($facility->condition === 'fair') {
                                $conditionLabel = 'Layak Pakai';
                                $badgeColor = 'warning';
                            } elseif ($facility->condition === 'poor') {
                                $conditionLabel = 'Perbaikan';
                                $badgeColor = 'danger';
                            }
                        @endphp
                        
                        <div class="{{ $gridClasses }} group flex flex-col bg-white border border-charcoal-200 overflow-hidden reveal-on-scroll reveal-up delay-[{{ ($index % 3) * 100 }}ms] relative
                             @if($isFeatured) rounded-3xl @else rounded-2xl @endif">
                            
                            <!-- Visual Anchor -->
                            <div class="w-full bg-charcoal-100 relative overflow-hidden @if($isFeatured) aspect-video lg:aspect-[21/9] @else aspect-[4/3] @endif">
                                @if($facility->photo)
                                    <img src="{{ Storage::url($facility->photo) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="{{ $index < 2 ? 'eager' : 'lazy' }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-charcoal-400">
                                        <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    </div>
                                @endif
                                
                                <!-- Status Overlay Overlay (Status & Quantity) -->
                                <div class="absolute top-4 right-4 flex flex-col gap-2 items-end">
                                    <span class="bg-charcoal-900/90 backdrop-blur text-white px-3 py-1.5 rounded text-xs font-bold font-mono shadow-sm tracking-wider flex items-center border border-charcoal-700">
                                        QTY: {{ str_pad($facility->quantity, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                                <div class="absolute top-4 left-4">
                                    @if($facility->condition === 'good')
                                        <span class="bg-emerald-100/95 backdrop-blur text-emerald-800 px-3 py-1.5 rounded text-xs font-bold shadow-sm tracking-wider border border-emerald-200">EXCELLENT / GOOD</span>
                                    @elseif($facility->condition === 'fair')
                                        <span class="bg-amber-100/95 backdrop-blur text-amber-800 px-3 py-1.5 rounded text-xs font-bold shadow-sm tracking-wider border border-amber-200">MAINTENANCE</span>
                                    @else
                                        <span class="bg-rose-100/95 backdrop-blur text-rose-800 px-3 py-1.5 rounded text-xs font-bold shadow-sm tracking-wider border border-rose-200">REPAIR / POOR</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Technical Information -->
                            <div class="p-6 @if($isFeatured) md:p-8 @endif flex flex-col flex-grow">
                                <h2 class="font-extrabold text-charcoal-900 mb-3 tracking-tight group-hover:text-primary-600 transition-colors
                                           @if($isFeatured) text-2xl md:text-3xl @else text-xl @endif">
                                    {{ $facility->name }}
                                </h2>
                                
                                @if($facility->description)
                                    <div class="prose prose-sm prose-charcoal mb-6 flex-grow @if($isFeatured) line-clamp-3 @else line-clamp-2 @endif">
                                        {!! \App\Support\HtmlSanitizer::clean($facility->description) !!}
                                    </div>
                                @endif
                                
                                <div class="mt-auto border-t border-charcoal-100 pt-4 flex items-center justify-between text-xs font-mono text-charcoal-500">
                                    <span class="flex items-center">
                                        <span class="w-1.5 h-1.5 rounded-full mr-2 
                                            @if($facility->condition === 'good') bg-emerald-500 
                                            @elseif($facility->condition === 'fair') bg-amber-500 
                                            @else bg-rose-500 @endif">
                                        </span>
                                        STATUS: {{ strtoupper($conditionLabel) }}
                                    </span>
                                    <span>
                                        ASSET // {{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            @endif
            
        </x-frontend.layout.container>
    </section>

    <!-- SECTION C — ACADEMIC CTA -->
    <x-frontend.layout.section class="bg-white text-center border-t border-charcoal-200">
        <x-frontend.layout.container>
            <div class="max-w-3xl mx-auto reveal-on-scroll reveal-up">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mb-6">Jelajahi Ekosistem Kami</h2>
                <p class="text-lg text-charcoal-600 mb-10 leading-relaxed">Infrastruktur bengkel berstandar industri ini didukung penuh oleh tim pengajar profesional dan kurikulum kompetensi terapan.</p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <x-frontend.ui.button href="{{ route('academic.programs') }}" class="w-full sm:w-auto">
                        Program Keahlian
                    </x-frontend.ui.button>
                    <x-frontend.ui.button href="{{ route('academic.teachers') }}" variant="outline" class="w-full sm:w-auto">
                        Profil Tenaga Pendidik
                    </x-frontend.ui.button>
                </div>
            </div>
        </x-frontend.layout.container>
    </x-frontend.layout.section>

</x-layouts.app>
