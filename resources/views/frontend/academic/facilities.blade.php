<x-layouts.app title="Fasilitas Unggulan">
    
    <!-- Hero Section -->
    <section class="relative flex flex-col justify-center items-center py-8 sm:py-16 lg:py-24 bg-[#1B1B1E] w-full min-h-[280px] sm:min-h-[440px]">
        <!-- Image Background -->
        @if($settings->get('header_academic_facilities_image'))
            <div class="absolute inset-0 bg-cover bg-center opacity-40" style="background-image: url('{{ Storage::url($settings->get('header_academic_facilities_image')) }}')"></div>
        @else
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?q=80&w=1280&auto=format&fit=crop')] bg-cover bg-center opacity-40"></div>
        @endif
        
        <!-- Content Container -->
        <div class="relative flex flex-col items-center gap-2.5 sm:gap-4 z-10 px-4 sm:px-6 max-w-[768px] reveal-on-scroll reveal-up">
            <!-- Label -->
            <div class="flex flex-row justify-center items-center px-3 py-1 bg-[#1B1B1E]/80 border border-[#E4E1E5] rounded-full">
                <span class="font-sans font-bold text-[10px] sm:text-[12px] leading-[12px] tracking-[1.2px] text-[#FFB4AB] uppercase">
                    Infrastruktur Teknik
                </span>
            </div>
            
            <!-- Heading -->
            <h1 class="font-heading font-extrabold text-[26px] sm:text-[44px] lg:text-[64px] leading-[1.1] tracking-[-0.8px] sm:tracking-[-1.28px] text-[#FBF8FC] text-center mb-1">
                Fasilitas Unggulan
            </h1>
            
            <!-- Description -->
            <p class="font-sans font-normal text-[13px] sm:text-[16px] lg:text-[18px] leading-[1.6] text-[#E4E1E5] text-center max-w-[756px]">
                Lingkungan belajar berstandar industri dengan peralatan diagnostik terkini, dirancang untuk mencetak teknisi otomotif profesional yang siap menghadapi tantangan teknologi masa depan.
            </p>
        </div>
    </section>

    <!-- Section - Facility Categories Bento Grid -->
    <section class="flex flex-col items-center py-8 sm:py-16 lg:py-[96px] px-4 sm:px-6 lg:px-[64px] w-full relative">
        <div class="flex flex-col w-full max-w-[1152px] z-10 gap-6 sm:gap-12">
            
            <!-- Header -->
            <div class="flex flex-col border-b border-[#E4E1E5] pb-3 sm:pb-4 reveal-on-scroll reveal-up">
                <h2 class="font-heading font-bold text-[20px] sm:text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E]">
                    Area Praktik Terpadu
                </h2>
            </div>
            
            <!-- Dynamic Facilities Grid -->
            @if($facilities && $facilities->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-6 w-full reveal-on-scroll reveal-up delay-100">
                    @foreach($facilities as $index => $facility)
                        @php
                            $isWide = ($index % 3 === 0);
                            $colSpan = $isWide ? 'lg:col-span-8' : 'lg:col-span-4';
                            $conditionLabel = match($facility->condition) {
                                'good' => 'Kondisi Prima',
                                'fair' => 'Perawatan Berkala',
                                'bad'  => 'Dalam Pemeliharaan',
                                default => null
                            };
                            $conditionColor = match($facility->condition) {
                                'good' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'fair' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'bad'  => 'bg-rose-50 text-rose-700 border-rose-200',
                                default => 'bg-slate-50 text-slate-700 border-slate-200'
                            };
                        @endphp
                        
                        <div class="{{ $colSpan }} flex flex-col bg-white border border-[#E4E1E5] p-4 sm:p-6 lg:p-8 gap-4 sm:gap-6 relative overflow-hidden group hover:border-[#DC2626] transition-colors rounded-2xl shadow-sm">
                            <div class="absolute top-0 right-0 w-[200px] h-[200px] opacity-20 pointer-events-none bg-[linear-gradient(45deg,transparent_2.76%,rgba(228,228,231,0.5)_2.76%,rgba(228,228,231,0.5)_5.52%)] z-10"></div>
                            
                            <div class="flex flex-col gap-1.5 sm:gap-2 z-20">
                                <div class="flex items-center justify-between gap-2 mb-1 sm:mb-2">
                                    <div class="w-10 sm:w-12 h-[2px] bg-[#DC2626]"></div>
                                    <div class="flex items-center gap-2">
                                        @if($conditionLabel)
                                            <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full border {{ $conditionColor }}">
                                                {{ $conditionLabel }}
                                            </span>
                                        @endif
                                        @if($facility->quantity)
                                            <span class="text-[11px] font-medium px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200">
                                                {{ $facility->quantity }} Unit
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <h3 class="font-heading font-bold text-[18px] sm:text-[24px] lg:text-[28px] text-[#1B1B1E] group-hover:text-[#DC2626] transition-colors">
                                    {{ $facility->name }}
                                </h3>
                                <div class="font-sans text-[13px] sm:text-[15px] leading-[1.6] text-[#5F5E5E]">
                                    {!! \App\Support\HtmlSanitizer::clean($facility->description) !!}
                                </div>
                            </div>
                            
                            <div class="w-full {{ $isWide ? 'h-[220px] sm:h-[280px] lg:h-[320px]' : 'h-[180px] sm:h-[220px] lg:h-[260px]' }} mt-auto relative overflow-hidden bg-[#F0EDF1] rounded-xl">
                                @if($facility->photo && Storage::disk('public')->exists($facility->photo))
                                    <img src="{{ Storage::url($facility->photo) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" loading="lazy">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400 gap-2">
                                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                        <span class="text-xs font-medium uppercase tracking-wider text-slate-400">Laboratorium Praktik TSM</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="w-full py-16 px-6 bg-slate-50 border border-slate-200 rounded-3xl text-center">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <h3 class="font-heading font-bold text-xl text-slate-800 mb-2">Belum Ada Fasilitas yang Ditambahkan</h3>
                    <p class="font-sans text-sm text-slate-500 max-w-md mx-auto">Informasi sarana dan prasarana bengkel akan segera diperbarui melalui panel administrasi.</p>
                </div>
            @endif
            
        </div>
    </section>

</x-layouts.app>
