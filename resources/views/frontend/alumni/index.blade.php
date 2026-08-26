<x-layouts.app title="Jejaring Alumni">
    
    <!-- Hero Section -->
    <section class="relative flex flex-col justify-center items-center py-20 lg:py-[150px] bg-[#1B1B1E] border-b border-[#E4E1E5] w-full min-h-[560px] overflow-hidden mt-[80px]">
        <!-- Background Image with Gradient Overlay -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1B1B1E] via-[#1B1B1E]/80 to-transparent z-10"></div>
            <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?q=80&w=1280&auto=format&fit=crop" alt="Background" class="w-full h-full object-cover opacity-40">
        </div>
        
        <!-- Content Container -->
        <div class="relative z-10 flex flex-col items-start px-6 lg:px-[64px] w-full max-w-[1280px]">
            <div class="flex flex-col border-l-2 border-[#E4E1E5] pl-4 lg:pl-6 max-w-[760px] reveal-on-scroll reveal-right">
                
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-1 bg-[#B70011]"></div>
                    <span class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#FFB4AB] uppercase">Alumni Network</span>
                </div>
                
                <h1 class="font-heading font-extrabold text-[40px] lg:text-[64px] leading-[1.1] tracking-[-1.28px] text-white mb-6">
                    Jejaring Alumni &<br>Kisah Sukses
                </h1>
                
                <p class="font-sans font-normal text-[16px] lg:text-[18px] leading-[1.6] text-[#F0EDF1] max-w-[590px]">
                    Inspirasi dari para lulusan Teknik dan Bisnis Sepeda Motor (TBSM) {{ $settings->get('site_name', 'SMK Negeri 1 Bangsri') }} yang kini berkarier di industri otomotif terkemuka dan membangun masa depan.
                </p>
                
            </div>
        </div>
    </section>

    <!-- Alumni Stats Section -->
    <section class="flex flex-col items-center bg-[#F5F3F6] py-16 lg:py-[96px] px-6 lg:px-[64px] w-full border-b border-[#E4E1E5] relative">
        <!-- Abstract Gradients -->
        <div class="absolute inset-0 pointer-events-none opacity-50 bg-[linear-gradient(90deg,#E4E4E7_4.17%,transparent_4.17%),linear-gradient(180deg,#E4E4E7_4.17%,transparent_4.17%)] bg-[length:24px_24px]"></div>
        
        <div class="relative flex flex-col md:flex-row justify-center items-stretch gap-6 w-full max-w-[1152px] z-10 reveal-on-scroll reveal-up">
            
            <!-- Stat 1 -->
            <div class="flex-1 flex flex-col justify-center items-center p-8 bg-[#FBF8FC] border border-[#E4E1E5] transition-transform hover:-translate-y-1 duration-300">
                <div class="w-9 h-9 bg-figma-red flex justify-center items-center mb-4 rounded-[2px]">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="font-heading font-bold text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E] mb-2">2,500+</h3>
                <p class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#5F5E5E] uppercase text-center">Total Alumni</p>
            </div>

            <!-- Stat 2 -->
            <div class="flex-1 flex flex-col justify-center items-center p-8 bg-[#FBF8FC] border border-[#E4E1E5] relative transition-transform hover:-translate-y-1 duration-300 delay-100">
                <div class="absolute top-0 inset-x-0 h-[2px] bg-[#B70011]"></div>
                <div class="w-9 h-9 bg-[#B70011] flex justify-center items-center mb-4 rounded-[2px]">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="font-heading font-bold text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E] mb-2">50+</h3>
                <p class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#5F5E5E] uppercase text-center">Partnership Companies</p>
            </div>

            <!-- Stat 3 -->
            <div class="flex-1 flex flex-col justify-center items-center p-8 bg-[#FBF8FC] border border-[#E4E1E5] transition-transform hover:-translate-y-1 duration-300 delay-200">
                <div class="w-9 h-9 bg-[#B70011] flex justify-center items-center mb-4 rounded-[2px]">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-heading font-bold text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E] mb-2">85%</h3>
                <p class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#5F5E5E] uppercase text-center">Working in Industry</p>
            </div>

        </div>
    </section>

    <!-- Success Stories Showcase (Bento Grid) -->
    <section class="flex flex-col items-center bg-[#FBF8FC] py-16 lg:py-[96px] px-6 lg:px-[64px] w-full relative">
        <div class="absolute right-0 top-[80px] w-[256px] h-[256px] opacity-20 pointer-events-none bg-[linear-gradient(45deg,transparent_2.76%,rgba(228,228,231,0.5)_2.76%,rgba(228,228,231,0.5)_5.52%)]"></div>
        
        <div class="flex flex-col w-full max-w-[1280px] gap-12 z-10">
            
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-end border-b border-[#E4E1E5] pb-6 reveal-on-scroll reveal-up">
                <div class="flex flex-col gap-4 max-w-[536px]">
                    <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E]">
                        Profil Lulusan
                    </h2>
                    <p class="font-sans font-normal text-[16px] leading-[1.5] text-[#5F5E5E]">
                        Menelusuri jejak langkah para alumni yang telah membuktikan kompetensi teknis di berbagai sektor industri otomotif skala nasional dan internasional.
                    </p>
                </div>
                <div class="flex items-center gap-2 mt-4 md:mt-0">
                    <button class="w-10 h-10 flex justify-center items-center bg-[#FBF8FC] border border-[#E4E1E5] hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4 text-[#1B1B1E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="w-10 h-10 flex justify-center items-center bg-[#FBF8FC] border border-[#E4E1E5] hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4 text-[#1B1B1E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Bento Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full max-w-[1152px] mx-auto reveal-on-scroll reveal-up delay-100">
                @if($alumnis->count() > 0)
                    @foreach($alumnis->take(5) as $index => $alumni)
                        @if($index == 0)
                            <!-- Item 1: Featured Story (Spans 1 col, 2 rows) -->
                            <div class="lg:col-span-1 lg:row-span-2 relative flex flex-col justify-end p-8 border border-[#E4E1E5] bg-[#FBF8FC] min-h-[522px] overflow-hidden group">
                                @if($alumni->photo)
                                    <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="absolute inset-0 w-full h-full object-cover mix-blend-saturation group-hover:mix-blend-normal transition-all duration-500 z-0">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>
                                @else
                                    <div class="absolute inset-0 bg-[#E4E1E5] flex items-center justify-center z-0">
                                        <svg class="w-20 h-20 text-[#5F5E5E]/20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                                @endif
                                
                                <div class="absolute top-4 left-4 flex items-center bg-[#1B1B1E] px-3 py-1 gap-2 z-20 rounded-[2px]">
                                    <div class="w-2 h-2 rounded-full bg-[#B70011]"></div>
                                    <span class="font-sans font-bold text-[10px] tracking-[1.2px] text-white uppercase">Success Story</span>
                                </div>
                                
                                <div class="relative z-20 flex flex-col gap-1 border-l-2 border-[#B70011] pl-4">
                                    <span class="font-sans font-bold text-[12px] tracking-[1.2px] text-gray-300 uppercase">Angkatan {{ $alumni->graduation_year }}</span>
                                    <h3 class="font-heading font-bold text-[24px] text-white mb-2">
                                        <a href="{{ route('alumni.show', $alumni->slug) }}" class="hover:underline">{{ $alumni->name }}</a>
                                    </h3>
                                    <p class="font-sans font-bold text-[16px] text-figma-red">{{ $alumni->current_occupation ?: 'Alumni' }}@if($alumni->current_company), {{ $alumni->current_company }}@endif</p>
                                    @if($alumni->success_story)
                                        <p class="font-sans italic text-[16px] text-gray-300 mt-2 line-clamp-3">"{{ Str::limit(strip_tags($alumni->success_story), 100) }}"</p>
                                    @endif
                                </div>
                            </div>
                        @elseif($index == 1)
                            <!-- Item 2: Top Right Card with red accent -->
                            <div class="flex flex-col justify-between p-6 bg-[#FBF8FC] border border-[#E4E1E5] relative min-h-[250px] group hover:border-[#B70011] transition-colors">
                                <div class="absolute right-0 bottom-0 w-8 h-8 border-r border-b border-[#E4E1E5] opacity-50"></div>
                                <div class="flex flex-col gap-1 mb-4">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#5F5E5E] uppercase">Angkatan {{ $alumni->graduation_year }}</span>
                                        <div class="bg-[#B70011] px-2 py-1 rounded-[2px]">
                                            <span class="font-sans font-normal text-[10px] text-white uppercase">Entrepreneur</span>
                                        </div>
                                    </div>
                                    <h4 class="font-heading font-bold text-[18px] text-[#1B1B1E]">
                                        <a href="{{ route('alumni.show', $alumni->slug) }}" class="hover:text-[#B70011]">{{ $alumni->name }}</a>
                                    </h4>
                                    <p class="font-sans text-[14px] text-[#B70011]">{{ $alumni->current_occupation ?: 'Alumni' }}@if($alumni->current_company), {{ $alumni->current_company }}@endif</p>
                                    @if($alumni->success_story)
                                        <p class="font-sans text-[14px] text-[#5C403C] mt-2 line-clamp-2">{{ Str::limit(strip_tags($alumni->success_story), 80) }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center gap-2 text-[#5F5E5E] mt-auto">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4.5l6.5 13h-13L12 6.5z"/></svg>
                                    <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase">{{ $alumni->city ?: 'Indonesia' }}</span>
                                </div>
                            </div>
                        @elseif($index == 2 || $index == 4)
                            <!-- Item 3 & 5: Standard Card -->
                            <div class="flex flex-col justify-between p-6 bg-[#FBF8FC] border border-[#E4E1E5] min-h-[250px] hover:shadow-md transition-shadow">
                                <div class="flex flex-col gap-1 mb-4">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#5F5E5E] uppercase">Angkatan {{ $alumni->graduation_year }}</span>
                                        <div class="bg-[#1B1B1E] px-2 py-1 rounded-[2px]">
                                            <span class="font-sans font-normal text-[10px] text-white uppercase">Work Placement</span>
                                        </div>
                                    </div>
                                    <h4 class="font-heading font-bold text-[18px] text-[#1B1B1E]">
                                        <a href="{{ route('alumni.show', $alumni->slug) }}" class="hover:text-[#B70011]">{{ $alumni->name }}</a>
                                    </h4>
                                    <p class="font-sans text-[14px] text-[#B70011]">{{ $alumni->current_occupation ?: 'Alumni' }}@if($alumni->current_company), {{ $alumni->current_company }}@endif</p>
                                    @if($alumni->success_story)
                                        <p class="font-sans text-[14px] text-[#5C403C] mt-2 line-clamp-2">{{ Str::limit(strip_tags($alumni->success_story), 80) }}</p>
                                    @endif
                                </div>
                                @if($alumni->city)
                                <div class="flex items-center gap-2 text-[#5F5E5E] mt-auto">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase">{{ $alumni->city }}</span>
                                </div>
                                @endif
                            </div>
                        @elseif($index == 3)
                            <!-- Item 4: Dark Card -->
                            <div class="flex flex-col justify-between p-6 bg-[#1B1B1E] border border-[#E4E1E5] relative min-h-[250px] overflow-hidden">
                                <div class="absolute inset-0 bg-[linear-gradient(55deg,transparent_2.3%,rgba(228,228,231,0.5)_2.3%,rgba(228,228,231,0.5)_4.6%)] opacity-20 pointer-events-none"></div>
                                <div class="relative z-10 flex flex-col gap-1 mb-4">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#C8C6C5] uppercase">Angkatan {{ $alumni->graduation_year }}</span>
                                        <div class="border border-[#E4E1E5] px-2 py-1 rounded-[2px]">
                                            <span class="font-sans font-normal text-[10px] text-white uppercase">Success Story</span>
                                        </div>
                                    </div>
                                    <h4 class="font-heading font-bold text-[18px] text-white">
                                        <a href="{{ route('alumni.show', $alumni->slug) }}" class="hover:text-figma-red">{{ $alumni->name }}</a>
                                    </h4>
                                    <p class="font-sans text-[14px] text-[#FFDAD6]">{{ $alumni->current_occupation ?: 'Alumni' }}@if($alumni->current_company), {{ $alumni->current_company }}@endif</p>
                                    @if($alumni->success_story)
                                        <p class="font-sans text-[14px] text-[#F0EDF1] mt-2 line-clamp-2">"{{ Str::limit(strip_tags($alumni->success_story), 80) }}"</p>
                                    @endif
                                </div>
                                <div class="relative z-10 flex justify-end mt-auto">
                                    <a href="{{ route('alumni.show', $alumni->slug) }}" class="w-6 h-6 flex justify-center items-center rounded-full border border-[#FFDAD6] text-[#FFDAD6] hover:bg-[#FFDAD6] hover:text-[#1B1B1E] transition-colors">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <!-- Item 6: Lihat Semua -->
                    @if($alumnis->count() >= 5 || $alumnis->hasPages())
                    <a href="{{ $alumnis->nextPageUrl() ?? route('alumni.index') }}" class="flex flex-col justify-center items-center p-6 bg-[#FBF8FC] border border-[#E4E1E5] min-h-[250px] group hover:bg-gray-100 transition-colors cursor-pointer">
                        <div class="w-10 h-10 bg-figma-red flex justify-center items-center rounded-[2px] mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        </div>
                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] text-[#1B1B1E] uppercase">Lihat Semua Profil</span>
                    </a>
                    @endif
                @else
                    <div class="col-span-1 lg:col-span-3 py-16 text-center">
                        <x-frontend.ui.empty-state 
                            title="Belum Ada Data Alumni" 
                            message="Data jejaring alumni belum tersedia saat ini." 
                            icon="users" 
                        />
                    </div>
                @endif
            </div>

            <!-- Pagination (if standard view is needed) -->
            @if($alumnis->hasPages() && $alumnis->currentPage() > 1)
                <div class="mt-8 flex justify-center">
                    {{ $alumnis->links() }}
                </div>
            @endif

        </div>
    </section>

    <!-- Engagement Section -->
    <section class="flex flex-col items-center bg-[#F5F3F6] py-24 lg:py-[96px] px-6 lg:px-[256px] w-full border-y border-[#E4E1E5] relative">
        <div class="absolute left-10 top-10 w-4 h-4 border-l border-t border-[#5F5E5E] opacity-50"></div>
        <div class="absolute right-10 bottom-10 w-4 h-4 border-r border-b border-[#5F5E5E] opacity-50"></div>
        
        <div class="flex flex-col items-center text-center max-w-[768px] z-10 reveal-on-scroll reveal-up">
            <div class="w-9 h-10 bg-figma-red flex justify-center items-center rounded-[2px] mb-6">
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            
            <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E] mb-4">
                Are you an Alumnus?
            </h2>
            
            <p class="font-sans font-normal text-[16px] lg:text-[18px] leading-[1.6] text-[#5F5E5E] max-w-[532px] mb-8">
                Mari bangun jejaring profesional yang lebih kuat. Perbarui data diri Anda untuk tetap terhubung dengan almamater, adik tingkat, dan peluang karir di industri otomotif.
            </p>
            
            <a href="{{ route('contact') }}" class="flex items-center gap-2 bg-figma-red hover:bg-figma-dark-red text-white transition-colors px-8 py-4 rounded-[2px]">
                <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase">Update Profil Alumni</span>
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </section>

</x-layouts.app>
