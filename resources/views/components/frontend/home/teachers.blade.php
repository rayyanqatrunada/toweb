@props([
    'headOfDepartment' => null,
    'teachers' => null
])

<section class="w-full py-12 sm:py-16 md:py-20 lg:py-24 overflow-hidden border-t border-slate-100 bg-slate-50/50 relative">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-12 lg:px-16">
        
        {{-- Section Header --}}
        <div class="flex flex-col items-center text-center mb-8 sm:mb-12 lg:mb-14 reveal-on-scroll reveal-up">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-50 border border-red-100 mb-3 sm:mb-4">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                <span class="text-xs font-heading font-black tracking-widest uppercase text-red-700">Tim Akademik & Instruktur</span>
            </div>
            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl leading-tight text-slate-900 tracking-tight max-w-2xl mb-3">
                Instruktur Berpengalaman Standar Industri
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-xl font-sans leading-relaxed">
                Didukung tenaga pendidik profesional dan instruktur bersertifikasi Astra Honda Motor dalam membimbing kompetensi teknis peserta didik.
            </p>
        </div>

        {{-- Content Grid: Kajur Card + Other Teachers --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch reveal-on-scroll reveal-up">
            
            {{-- 1. Featured Leadership Card: Kepala Kompetensi Keahlian --}}
            <div class="lg:col-span-5 rounded-sm sm:rounded-none bg-gradient-to-br from-slate-900 via-slate-900 to-zinc-950 p-6 sm:p-8 lg:p-9 text-white relative overflow-hidden border border-slate-800 shadow-xl shadow-slate-900/10 flex flex-col justify-between group">
                {{-- Decorative background glow --}}
                <div class="absolute -top-16 -right-16 w-56 h-56 bg-red-600/15 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-700"></div>
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-600 via-rose-600 to-amber-500"></div>

                @if($headOfDepartment)
                    @php
                        $hasHeadPhoto = $headOfDepartment->hasValidPhoto();
                        $headPhotoUrl = $headOfDepartment->photo_url;
                        $headQuote = !empty($headOfDepartment->bio) 
                            ? $headOfDepartment->bio 
                            : (isset($settings) ? $settings->get('head_quote') : app(\App\Services\SettingsService::class)->get('head_quote', 'Mendedikasikan diri memimpin sinkronisasi kurikulum berbasis industri untuk mencetak lulusan berintegritas dan siap kerja.'));
                    @endphp
                    
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        {{-- Header Role --}}
                        <div>
                            <div class="flex items-center justify-between gap-3 mb-4">
                                <span class="text-[11px] sm:text-xs font-heading font-black tracking-widest uppercase text-slate-400">Kepemimpinan Jurusan</span>
                                <span class="px-2.5 py-0.5 rounded-sm bg-red-600 text-white text-[10px] font-black tracking-wider uppercase shadow-xs">Kajur</span>
                            </div>

                            {{-- Profile Info --}}
                            <div class="flex flex-col sm:flex-row lg:flex-col items-center sm:items-start text-center sm:text-left gap-4 sm:gap-5 mb-5">
                                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-sm overflow-hidden border-2 border-white/20 shadow-xl shrink-0 bg-slate-800 flex items-center justify-center">
                                    @if($hasHeadPhoto && $headPhotoUrl)
                                        <img src="{{ $headPhotoUrl }}" alt="{{ $headOfDepartment->name }}" class="w-full h-full object-cover object-top" loading="eager">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 text-slate-300 font-heading font-black text-2xl">
                                            {{ strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $headOfDepartment->name)), 0, 2)) }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1 min-w-0">
                                    <h3 class="font-heading font-bold text-xl sm:text-2xl text-white leading-snug tracking-tight mb-1">
                                        {{ $headOfDepartment->name }}
                                    </h3>
                                    <div class="text-sm font-semibold text-red-400 mb-2">
                                        {{ $headOfDepartment->position ?? 'Ketua Kompetensi Keahlian' }}
                                    </div>
                                    @if($headOfDepartment->specialization)
                                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-sm text-xs font-medium bg-white/10 text-slate-200 border border-white/10">
                                            <svg class="w-3.5 h-3.5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                            <span>{{ $headOfDepartment->specialization }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Quote Box --}}
                            <div class="relative bg-white/5 border border-white/10 rounded-sm p-4 sm:p-5 mt-2">
                                <svg class="w-6 h-6 text-red-500/40 absolute top-3 right-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                                <p class="font-sans text-xs sm:text-sm leading-relaxed text-slate-300 italic pr-4">
                                    "{{ $headQuote }}"
                                </p>
                            </div>
                        </div>

                        {{-- Footer Link --}}
                        <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-sans">SMK Negeri 1 Bangsri</span>
                            <a href="{{ route('academic.teachers') }}" class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-red-400 hover:text-red-300 transition-colors">
                                <span>Profil Pendidik</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[220px]">
                        <p class="text-slate-400 italic text-sm">Data Kepala Jurusan belum diatur.</p>
                    </div>
                @endif
            </div>

            {{-- 2. Other Teachers List (Tidy, No Truncation, Balanced Cards) --}}
            <div class="lg:col-span-7 flex flex-col justify-between gap-3 sm:gap-4">
                @if($teachers && $teachers->count() > 0)
                    <div class="flex flex-col gap-3 sm:gap-3.5">
                        @foreach($teachers as $index => $teacher)
                            @php
                                $hasPhoto = $teacher->hasValidPhoto();
                                $photoUrl = $teacher->photo_url;
                                $initials = strtoupper(substr(trim(preg_replace('/^(Drs\.|Dr\.|Ir\.|H\.|Hj\.)\s+/i', '', $teacher->name)), 0, 2));
                            @endphp
                            <div class="rounded-sm sm:rounded-none border border-slate-200/90 bg-white p-4 sm:p-5 shadow-2xs hover:shadow-md hover:border-red-500/40 transition-all duration-300 flex flex-col sm:flex-row sm:items-center gap-3.5 sm:gap-4 group">
                                {{-- Teacher Avatar --}}
                                <div class="w-16 h-16 sm:w-18 sm:h-18 rounded-sm overflow-hidden shrink-0 bg-slate-100 border-2 border-slate-200 group-hover:border-red-500 transition-colors shadow-2xs flex items-center justify-center">
                                    @if($hasPhoto && $photoUrl)
                                        <img src="{{ $photoUrl }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover object-top" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-slate-700 font-heading font-black text-base select-none">
                                            {{ $initials }}
                                        </div>
                                    @endif
                                </div>
                                
                                {{-- Teacher Details --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center justify-between gap-1.5 mb-1">
                                        <h4 class="font-heading font-bold text-base sm:text-lg text-slate-900 group-hover:text-red-600 transition-colors leading-snug">
                                            {{ $teacher->name }}
                                        </h4>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-sm text-[11px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 border border-slate-200 shrink-0">
                                            {{ $teacher->position ?? 'Guru Kejuruan' }}
                                        </span>
                                    </div>

                                    @if($teacher->specialization)
                                        <div class="text-xs sm:text-[13px] text-slate-600 font-medium leading-relaxed flex items-start gap-1.5 mt-1">
                                            <span class="text-red-500 font-bold shrink-0 mt-0.5">•</span>
                                            <span class="line-clamp-2 text-slate-600">{{ $teacher->specialization }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    {{-- Action CTA Banner --}}
                    <div class="mt-2 pt-1">
                        <a href="{{ route('academic.teachers') }}" class="group flex items-center justify-between w-full p-4 sm:p-4.5 bg-white hover:bg-slate-900 border border-slate-200 hover:border-slate-900 rounded-sm sm:rounded-none transition-all duration-300 shadow-2xs hover:shadow-lg">
                            <div class="flex items-center gap-3.5">
                                <div class="w-10 h-10 rounded-sm bg-red-50 group-hover:bg-red-600 flex items-center justify-center text-red-600 group-hover:text-white transition-colors shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <div class="text-left">
                                    <div class="font-heading font-bold text-sm sm:text-base text-slate-900 group-hover:text-white transition-colors">Lihat Seluruh Dewan Guru & Instruktur</div>
                                    <div class="text-xs text-slate-500 group-hover:text-slate-300 transition-colors">Bagan struktur organisasi resmi & profil dewan guru lengkap</div>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-center gap-1.5 text-red-600 group-hover:text-white font-bold text-xs uppercase tracking-wider transition-colors shrink-0">
                                <span>Selengkapnya</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[160px] bg-white border border-slate-200 p-6 rounded-sm sm:rounded-none">
                        <p class="text-slate-500 italic text-sm">Data Dewan Guru belum tersedia.</p>
                    </div>
                @endif
            </div>

        </div>
        
    </div>
</section>

