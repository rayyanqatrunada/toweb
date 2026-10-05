@props(['achievements'])

<section class="w-full py-10 sm:py-14 md:py-16 lg:py-20 overflow-hidden border-t border-gray-100 relative">
    <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-16">
        
        <div class="flex flex-col lg:flex-row gap-8 sm:gap-12 lg:gap-16">
            
            <!-- Left: Content -->
            <div class="w-full lg:w-5/12 flex flex-col items-start reveal-on-scroll reveal-up">
                <div class="flex items-center gap-2.5 sm:gap-3 mb-2.5 sm:mb-4">
                    <div class="w-8 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                        Prestasi
                    </span>
                </div>
                
                <h2 class="font-heading font-extrabold text-[24px] sm:text-[30px] md:text-[36px] lg:text-[40px] leading-[1.15] tracking-tight sm:tracking-[-1px] text-figma-dark mb-3 sm:mb-5">
                    Tradisi Juara, Bukti Kompetensi Nyata.
                </h2>
                
                <p class="font-sans text-[14px] sm:text-[16px] text-gray-600 leading-[1.6] mb-6">
                    Siswa {{ $settings->get('site_short_name', 'TSM') }} secara konsisten mencetak prestasi di berbagai ajang kompetisi keahlian otomotif tingkat regional hingga nasional. Hal ini membuktikan bahwa kurikulum dan metode praktik yang kami terapkan membuahkan hasil unggul.
                </p>

                <a href="{{ route('achievements.index') }}" class="group flex items-center gap-3 sm:gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[14px] sm:text-[15px] uppercase tracking-[-0.5px]">
                    <span class="relative">
                        Lihat Semua Prestasi
                        <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                    </span>
                    <span class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

            <!-- Right: Timeline/Podium Style List -->
            <div class="w-full lg:w-7/12 relative reveal-on-scroll reveal-up delay-200">
                
                @if($achievements && $achievements->count() > 0)
                    <div class="flex flex-col border-l-2 border-figma-red/20 pl-6 sm:pl-8 space-y-4 sm:space-y-5">
                        @foreach($achievements as $index => $achievement)
                            <div class="relative group">
                                <!-- Dot indicator -->
                                <div class="absolute -left-[33px] sm:-left-[41px] top-2 w-4 h-4 sm:w-5 sm:h-5 rounded-full bg-white border-3 sm:border-4 border-figma-red group-hover:scale-125 transition-transform duration-300"></div>
                                
                                <div class="flex flex-col bg-charcoal-50 p-4 sm:p-5 md:p-6 hover:bg-white hover:shadow-lg transition-all duration-300 border border-transparent hover:border-gray-200 -mt-1.5 rounded-sm">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="px-2.5 py-0.5 bg-figma-dark text-white font-heading font-bold text-[12px] sm:text-[13px] rounded-xs">{{ $achievement->date ? $achievement->date->format('Y') : '' }}</span>
                                        <span class="font-sans font-bold text-[12px] sm:text-[13px] text-figma-red uppercase tracking-wide">{{ $achievement->rank }}</span>
                                    </div>
                                    <h3 class="font-heading font-bold text-[17px] sm:text-[20px] md:text-[22px] text-figma-dark leading-tight mb-1 group-hover:text-figma-red transition-colors">{{ $achievement->title }}</h3>
                                    <p class="font-sans text-[13px] sm:text-[14px] text-gray-500">{{ $achievement->organizer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 p-8 border border-gray-100 flex flex-col items-center justify-center h-full min-h-[300px] text-center">
                        <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        <p class="font-sans text-gray-500">Daftar prestasi sedang diperbarui.</p>
                    </div>
                @endif
                
            </div>
            
        </div>
        
    </div>
</section>
