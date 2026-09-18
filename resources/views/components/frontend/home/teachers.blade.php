@props([
    'headOfDepartment' => null,
    'teachers' => null
])

<section class="w-full py-24 lg:py-32 overflow-hidden border-t border-gray-100 relative">
    <div class="max-w-[1440px] mx-auto px-6 md:px-16">
        
        <div class="flex flex-col items-center text-center mb-16 md:mb-24 reveal-on-scroll reveal-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[14px] leading-none tracking-[2px] text-figma-gray uppercase">
                    Tim Akademik
                </span>
                <div class="w-8 h-[2px] bg-figma-red"></div>
            </div>
            <h2 class="font-heading font-extrabold text-[36px] md:text-[48px] leading-[1.1] tracking-[-1px] text-figma-dark max-w-[720px] mb-6">
                Instruktur Berpengalaman Standar Industri
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 reveal-on-scroll reveal-up">
            
            <!-- Featured: Head of Department -->
            <div class="w-full lg:w-5/12 bg-charcoal-950 p-8 md:p-12 text-white relative overflow-hidden group rounded-2xl shadow-xl flex flex-col justify-between">
                <!-- Decorative background elements -->
                <div class="absolute -top-12 -right-12 w-48 h-48 bg-figma-red opacity-10 rounded-full group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-full h-1.5 bg-figma-red"></div>
                
                @if($headOfDepartment)
                    @php
                        $hasHeadPhoto = $headOfDepartment->hasValidPhoto();
                        $headPhotoUrl = $headOfDepartment->photo_url;
                        $headQuote = !empty($headOfDepartment->bio) 
                            ? $headOfDepartment->bio 
                            : (isset($settings) ? $settings->get('head_quote') : app(\App\Services\SettingsService::class)->get('head_quote', 'Misi kami adalah menjembatani jarak antara teori di sekolah dengan realita di bengkel, sehingga siswa TBSM tidak pernah kaget ketika terjun ke industri yang sebenarnya.'));
                    @endphp
                    <div class="flex flex-col h-full z-10 relative">
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h3 class="font-heading font-bold text-[22px] text-white">Kepala Kompetensi Keahlian</h3>
                            <span class="px-3 py-1 bg-figma-red text-white text-[10px] font-black uppercase tracking-widest rounded-full">Kajur</span>
                        </div>
                        <div class="w-12 h-1 bg-figma-red mb-8"></div>
                        
                        <!-- Avatar / Photo -->
                        <div class="w-36 h-36 md:w-44 md:h-44 bg-charcoal-800 rounded-full overflow-hidden mb-8 border-4 border-charcoal-700 shadow-2xl mx-auto md:mx-0 shrink-0 relative flex items-center justify-center">
                            @if($hasHeadPhoto && $headPhotoUrl)
                                <img src="{{ $headPhotoUrl }}" alt="{{ $headOfDepartment->name }}" class="w-full h-full object-cover object-top aspect-square" loading="eager">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-charcoal-800 to-charcoal-900 text-charcoal-300 font-heading font-black text-4xl">
                                    <span>{{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $headOfDepartment->name)), 0, 2)) }}</span>
                                </div>
                            @endif
                        </div>
                        
                        <h4 class="font-heading font-bold text-[28px] md:text-[32px] leading-tight mb-2 text-white">{{ $headOfDepartment->name }}</h4>
                        <p class="font-sans text-[15px] font-medium text-figma-red mb-6">{{ $headOfDepartment->position ?? 'Ketua Kompetensi Keahlian TBSM' }}</p>
                        
                        <blockquote class="font-sans text-[15px] leading-[1.7] text-gray-300 italic flex-grow bg-white/5 border-l-2 border-figma-red p-4 rounded-r-lg">
                            "{{ $headQuote }}"
                        </blockquote>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[300px]">
                        <p class="text-gray-500 italic">Data Kepala Jurusan belum diatur.</p>
                    </div>
                @endif
            </div>

            <!-- Other Teachers List -->
            <div class="w-full lg:w-7/12 flex flex-col gap-6">
                @if($teachers && $teachers->count() > 0)
                    @foreach($teachers as $index => $teacher)
                        @php
                            $hasPhoto = $teacher->hasValidPhoto();
                            $photoUrl = $teacher->photo_url;
                            $initials = strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $teacher->name)), 0, 2));
                        @endphp
                        <div class="flex flex-col sm:flex-row items-center sm:items-start p-6 md:p-8 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition-all duration-300 gap-6 group">
                            <!-- Circular Avatar Container -->
                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden shrink-0 bg-charcoal-100 border-2 border-gray-200 group-hover:border-figma-red transition-all duration-300 relative flex items-center justify-center shadow-sm">
                                @if($hasPhoto && $photoUrl)
                                    <img src="{{ $photoUrl }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover object-top aspect-square" loading="lazy">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-charcoal-50 to-charcoal-200 text-charcoal-600 font-heading font-black text-2xl select-none">
                                        <span>{{ $initials }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="text-center sm:text-left flex-1">
                                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mb-1">
                                    <h4 class="font-heading font-bold text-[20px] md:text-[22px] text-figma-dark group-hover:text-figma-red transition-colors">
                                        {{ $teacher->name }}
                                    </h4>
                                </div>
                                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mb-3">
                                    <span class="font-sans font-semibold text-[14px] text-figma-gray">
                                        {{ $teacher->position ?? 'Guru Kejuruan Otomotif' }}
                                    </span>
                                    @if($teacher->specialization)
                                        <span class="text-gray-300">•</span>
                                        <span class="inline-block px-2.5 py-0.5 rounded text-[11px] font-bold uppercase tracking-wider bg-charcoal-100 text-charcoal-700">
                                            {{ $teacher->specialization }}
                                        </span>
                                    @endif
                                </div>
                                <p class="font-sans text-[14px] leading-relaxed text-gray-500 line-clamp-2">
                                    {{ $teacher->bio ?? 'Berpengalaman mendidik mekanik-mekanik andal dan membimbing siswa dalam berbagai kejuaraan otomotif tingkat nasional.' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="mt-2 flex justify-center lg:justify-start">
                        <a href="{{ route('academic.teachers') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 border border-charcoal-300 text-figma-dark font-sans font-bold text-[14px] uppercase tracking-wider hover:bg-charcoal-900 hover:text-white hover:border-charcoal-900 transition-all rounded-lg shadow-sm focus-ring">
                            <span>Lihat Seluruh Tim Pengajar</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[200px] bg-white border border-gray-200 p-8 rounded-xl">
                        <p class="text-gray-500 italic">Data Guru belum tersedia.</p>
                    </div>
                @endif
            </div>

        </div>
        
    </div>
</section>

