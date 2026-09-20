@props([
    'headOfDepartment' => null,
    'teachers' => null
])

<section class="w-full py-8 sm:py-16 md:py-24 lg:py-32 overflow-hidden border-t border-gray-100 relative">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-16">
        
        <div class="flex flex-col items-center text-center mb-6 sm:mb-16 md:mb-24 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-4">
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[11px] sm:text-[14px] leading-none tracking-[1.5px] sm:tracking-[2px] text-figma-gray uppercase">
                    Tim Akademik
                </span>
                <div class="w-5 sm:w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[20px] sm:text-[34px] md:text-[48px] leading-[1.2] sm:leading-[1.1] tracking-tight sm:tracking-[-1px] text-figma-dark max-w-[720px] mb-2 sm:mb-6">
                Instruktur Berpengalaman Standar Industri
            </h2>
            <p class="md:hidden text-[11px] text-gray-400 font-medium flex items-center gap-1">
                <span>Geser ke samping untuk melihat dewan guru</span>
                <svg class="w-3.5 h-3.5 text-figma-red animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-5 sm:gap-8 lg:gap-12 reveal-on-scroll reveal-up">
            
            <!-- Featured: Head of Department (Compact on Mobile) -->
            <div class="w-full lg:w-5/12 bg-charcoal-950 p-4 sm:p-8 md:p-12 text-white relative overflow-hidden group rounded-2xl shadow-xl flex flex-col justify-between">
                <div class="absolute -top-12 -right-12 w-48 h-48 bg-figma-red opacity-10 rounded-full group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-figma-red"></div>
                
                @if($headOfDepartment)
                    @php
                        $hasHeadPhoto = $headOfDepartment->hasValidPhoto();
                        $headPhotoUrl = $headOfDepartment->photo_url;
                        $headQuote = !empty($headOfDepartment->bio) 
                            ? $headOfDepartment->bio 
                            : (isset($settings) ? $settings->get('head_quote') : app(\App\Services\SettingsService::class)->get('head_quote', 'Misi kami adalah menjembatani jarak antara teori di sekolah dengan realita di bengkel, sehingga siswa TBSM siap di industri.'));
                    @endphp
                    <div class="flex flex-col h-full z-10 relative">
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h3 class="font-heading font-bold text-[15px] sm:text-[22px] text-white">Kepala Kompetensi Keahlian</h3>
                            <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-figma-red text-white text-[9px] sm:text-[10px] font-black uppercase tracking-widest rounded-full">Kajur</span>
                        </div>
                        <div class="w-8 sm:w-12 h-1 bg-figma-red mb-3 sm:mb-8"></div>
                        
                        <!-- Mobile Layout: Side-by-side Avatar & Info -->
                        <div class="flex flex-row md:flex-col items-center md:items-start gap-3.5 sm:gap-6 mb-3 sm:mb-6">
                            <!-- Avatar -->
                            <div class="w-16 h-16 sm:w-36 sm:h-36 md:w-44 md:h-44 bg-charcoal-800 rounded-full overflow-hidden border-2 sm:border-4 border-charcoal-700 shadow-xl shrink-0 flex items-center justify-center">
                                @if($hasHeadPhoto && $headPhotoUrl)
                                    <img src="{{ $headPhotoUrl }}" alt="{{ $headOfDepartment->name }}" class="w-full h-full object-cover object-top aspect-square" loading="eager">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-charcoal-800 to-charcoal-900 text-charcoal-300 font-heading font-black text-xl sm:text-4xl">
                                        <span>{{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $headOfDepartment->name)), 0, 2)) }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h4 class="font-heading font-bold text-[16px] sm:text-[28px] md:text-[32px] leading-tight mb-0.5 sm:mb-2 text-white truncate md:overflow-visible md:whitespace-normal">{{ $headOfDepartment->name }}</h4>
                                <p class="font-sans text-[12px] sm:text-[15px] font-medium text-figma-red truncate md:overflow-visible">{{ $headOfDepartment->position ?? 'Ketua Kompetensi Keahlian TBSM' }}</p>
                            </div>
                        </div>
                        
                        <blockquote class="font-sans text-[12px] sm:text-[15px] leading-[1.55] text-gray-300 italic flex-grow bg-white/5 border-l-2 border-figma-red p-3 sm:p-4 rounded-r-lg line-clamp-3 sm:line-clamp-none">
                            "{{ $headQuote }}"
                        </blockquote>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[160px]">
                        <p class="text-gray-500 italic text-sm">Data Kepala Jurusan belum diatur.</p>
                    </div>
                @endif
            </div>

            <!-- Other Teachers List (Swipeable Snap Cards on Mobile | Vertical Column on Desktop) -->
            <div class="w-full lg:w-7/12 flex flex-col justify-between">
                @if($teachers && $teachers->count() > 0)
                    <div class="flex lg:flex-col gap-3 sm:gap-5 overflow-x-auto lg:overflow-visible snap-x snap-mandatory pb-3 lg:pb-0 -mx-4 px-4 lg:mx-0 lg:px-0 scrollbar-none">
                        @foreach($teachers as $index => $teacher)
                            @php
                                $hasPhoto = $teacher->hasValidPhoto();
                                $photoUrl = $teacher->photo_url;
                                $initials = strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $teacher->name)), 0, 2));
                            @endphp
                            <div class="w-[78vw] max-w-[310px] lg:w-auto shrink-0 snap-center flex flex-row items-center p-3.5 sm:p-5 md:p-6 bg-white border border-gray-200 rounded-2xl hover:shadow-lg transition-all duration-300 gap-3.5 sm:gap-5 group shadow-sm md:shadow-none">
                                <!-- Circular Avatar Container -->
                                <div class="w-14 h-14 sm:w-20 sm:h-20 rounded-full overflow-hidden shrink-0 bg-charcoal-100 border-2 border-gray-200 group-hover:border-figma-red transition-all duration-300 relative flex items-center justify-center shadow-xs">
                                    @if($hasPhoto && $photoUrl)
                                        <img src="{{ $photoUrl }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover object-top aspect-square" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-charcoal-50 to-charcoal-200 text-charcoal-600 font-heading font-black text-sm sm:text-xl select-none">
                                            <span>{{ $initials }}</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="text-left flex-1 min-w-0">
                                    <h4 class="font-heading font-bold text-[14px] sm:text-[18px] text-figma-dark group-hover:text-figma-red transition-colors truncate">
                                        {{ $teacher->name }}
                                    </h4>
                                    <div class="text-[11px] sm:text-[13px] font-sans font-semibold text-figma-gray truncate mb-1">
                                        {{ $teacher->position ?? 'Guru Kejuruan Otomotif' }}
                                    </div>
                                    @if($teacher->specialization)
                                        <div class="inline-block px-2 py-0.5 rounded text-[9px] sm:text-[10px] font-bold uppercase tracking-wider bg-red-50 text-red-700 border border-red-100 truncate max-w-full">
                                            {{ $teacher->specialization }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-4 flex justify-center lg:justify-start">
                        <a href="{{ route('academic.teachers') }}" class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 sm:px-8 py-3 bg-white border border-slate-300 text-slate-800 font-sans font-bold text-[12px] sm:text-[14px] uppercase tracking-wider hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all rounded-xl shadow-xs focus-ring active:scale-95">
                            <span>Lihat Seluruh Dewan Guru</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[140px] bg-white border border-gray-200 p-5 rounded-2xl">
                        <p class="text-gray-500 italic text-sm">Data Guru belum tersedia.</p>
                    </div>
                @endif
            </div>

        </div>
        
    </div>
</section>

