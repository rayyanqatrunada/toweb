@props(['programs'])

<section class="w-full py-12 sm:py-16 md:py-24 lg:py-32 border-t border-gray-100 overflow-hidden relative">
    <div class="max-w-[1440px] mx-auto px-5 sm:px-8 md:px-16">
        
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 sm:gap-8 mb-10 sm:mb-16 lg:mb-24 reveal-on-scroll reveal-up">
            <div class="max-w-[640px]">
                <div class="flex items-center gap-2.5 sm:gap-3 mb-3 sm:mb-4">
                    <div class="w-6 sm:w-8 h-[2px] bg-figma-red"></div>
                    <span class="font-sans font-bold text-[12px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                        Program Keahlian
                    </span>
                </div>
                <h2 class="font-heading font-extrabold text-[26px] sm:text-[34px] md:text-[48px] leading-[1.15] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark">
                    Fokus Pembelajaran & Kompetensi
                </h2>
            </div>
            
            <a href="{{ route('academic.programs') }}" class="group inline-flex items-center gap-3 sm:gap-4 text-figma-dark hover:text-figma-red transition-colors font-sans font-bold text-[14px] sm:text-[16px] uppercase tracking-[-0.5px]">
                <span class="relative">
                    Lihat Kurikulum Lengkap
                    <span class="absolute -bottom-1 left-0 w-0 h-[2px] bg-figma-red transition-all duration-300 group-hover:w-full"></span>
                </span>
                <span class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-figma-red transition-colors">
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
            </a>
        </div>

        <!-- Academic Content -->
        @if($programs && $programs->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-12 lg:gap-24">
                
                @foreach($programs as $index => $program)
                    <div class="lg:col-span-12 grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12 items-center reveal-on-scroll reveal-up delay-100">
                        
                        <!-- Program Description -->
                        <div class="order-2 {{ $index % 2 == 0 ? 'md:order-1' : 'md:order-2 lg:pl-16' }}">
                            <div class="text-figma-red/20 font-heading font-black text-[36px] sm:text-[48px] md:text-[64px] leading-none mb-1 sm:mb-2">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3 class="font-heading font-bold text-[22px] sm:text-[30px] md:text-[40px] text-figma-dark mb-3 sm:mb-4 leading-[1.15] sm:leading-[1.1]">{{ $program->name }}</h3>
                            <div class="font-sans text-[14px] sm:text-[16px] text-gray-600 leading-[1.65] sm:leading-[1.7] mb-6 sm:mb-8 [&>p]:mb-3 [&>h4]:font-heading [&>h4]:font-bold [&>h4]:text-figma-dark [&>h4]:text-[16px] sm:[&>h4]:text-[18px] [&>h4]:mb-2 [&>ul]:list-disc [&>ul]:pl-5 [&>ul>li]:mb-1">
                                {!! \App\Support\HtmlSanitizer::clean($program->description ?? 'Program ini membekali siswa dengan keterampilan teknis otomotif terkini yang disesuaikan dengan standar kebutuhan industri.') !!}
                            </div>
                            
                            @if($program->competencies && $program->competencies->count() > 0)
                                <h4 class="font-heading font-bold text-[16px] sm:text-[18px] text-figma-dark mb-3 sm:mb-4">Kompetensi Utama:</h4>
                                <ul class="space-y-3 sm:space-y-4">
                                    @foreach($program->competencies->take(5) as $competency)
                                        <li class="flex items-start gap-3 sm:gap-4">
                                            <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-figma-red/10 flex items-center justify-center shrink-0 mt-0.5">
                                                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 text-figma-red" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <span class="font-sans text-[14px] sm:text-[15px] text-charcoal-700 leading-snug">{{ $competency->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        
                        <!-- Image Block -->
                        <div class="order-1 {{ $index % 2 == 0 ? 'md:order-2' : 'md:order-1' }} relative w-full aspect-[16/10] sm:aspect-square md:aspect-[4/5] bg-gray-100 group overflow-hidden border border-gray-200 rounded-lg sm:rounded-none">
                            <img src="{{ $program->thumbnail ? Storage::url($program->thumbnail) : 'https://images.unsplash.com/photo-1610491462702-42e6ecd6a982?q=80&w=800&auto=format&fit=crop' }}" 
                                 alt="{{ $program->name }}" 
                                 class="w-full h-full object-cover mix-blend-multiply opacity-90 group-hover:scale-105 transition-all duration-700" loading="lazy">
                            <div class="absolute inset-0 border-[8px] sm:border-[16px] border-white/20 pointer-events-none z-10"></div>
                            
                            <div class="absolute bottom-3 left-3 sm:bottom-6 sm:left-6 bg-white p-2.5 sm:p-4 shadow-xl z-20 flex items-center gap-2.5 sm:gap-3 rounded-sm">
                                <div class="w-9 h-9 sm:w-12 sm:h-12 bg-charcoal-900 text-white flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div class="font-heading font-bold text-[12px] sm:text-[14px] text-figma-dark leading-tight">Standar<br>Industri</div>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
