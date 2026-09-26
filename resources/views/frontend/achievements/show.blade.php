<x-layouts.app 
    :title="$achievement->title"
    :description="Str::limit(strip_tags($achievement->description), 150)"
    :canonical="route('achievements.show', $achievement->slug)"
    :ogImage="$achievement->photo ? Storage::url($achievement->photo) : null"
    ogType="article"
>
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{ $achievement->title }}",
      "image": [
        "{{ $achievement->photo ? Storage::url($achievement->photo) : url('/default-image.jpg') }}"
       ],
      "datePublished": "{{ $achievement->date ? $achievement->date->toIso8601String() : $achievement->created_at->toIso8601String() }}",
      "dateModified": "{{ $achievement->updated_at->toIso8601String() }}"
    }
    </script>
    @endpush

    <div class="flex flex-col items-center bg-[#FBF8FC] w-full overflow-hidden relative"
          x-data="{
              lightboxOpen: false,
              activeImage: '',
              activeCaption: '',
              openLightbox(url, caption = '') {
                  this.activeImage = url;
                  this.activeCaption = caption;
                  this.lightboxOpen = true;
              },
              closeLightbox() {
                  this.lightboxOpen = false;
              },
              copied: false,
              copyUrl() {
                  navigator.clipboard.writeText(window.location.href);
                  this.copied = true;
                  setTimeout(() => this.copied = false, 2500);
              }
          }"
          x-effect="document.body.style.overflow = lightboxOpen ? 'hidden' : ''"
          @keydown.escape.window="closeLightbox()"
    >

        {{-- ═══════════════════════════════════════════════════════════════════
            HEADER SECTION WITH RICH BACKGROUND DECORATIONS
        ═══════════════════════════════════════════════════════════════════ --}}
        <header class="w-full bg-[#F5F3F6] border-b border-[#E4E1E5] relative overflow-hidden">
            {{-- Background Layer 1: Engineering Grid --}}
            <div class="absolute inset-0 pointer-events-none opacity-40 bg-[linear-gradient(90deg,#E4E4E7_1px,transparent_1px),linear-gradient(180deg,#E4E4E7_1px,transparent_1px)] bg-[size:36px_36px]"></div>

            {{-- Background Layer 2: Subtle Dot Matrix --}}
            <div class="absolute inset-0 pointer-events-none opacity-15" style="background-image: radial-gradient(#9CA3AF 1px, transparent 1px); background-size: 24px 24px;"></div>

            {{-- Background Layer 3: Diagonal Technical Hatching (Top Right & Bottom Left) --}}
            <div class="absolute -right-6 -top-6 w-64 h-64 opacity-25 pointer-events-none hidden lg:block" style="background: repeating-linear-gradient(45deg, transparent, transparent 3px, rgba(228,228,231,0.7) 3px, rgba(228,228,231,0.7) 6px);"></div>
            <div class="absolute -left-6 -bottom-6 w-52 h-52 opacity-20 pointer-events-none hidden lg:block" style="background: repeating-linear-gradient(-45deg, transparent, transparent 3px, rgba(228,228,231,0.7) 3px, rgba(228,228,231,0.7) 6px);"></div>

            {{-- Background Layer 4: Ambient Glow Orbs --}}
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#DC2626]/5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl pointer-events-none"></div>

            {{-- Background Layer 5: Technical Corner Framing & Watermarks --}}
            <div class="absolute right-6 top-6 w-16 h-16 border-r border-t border-[#E4E1E5] pointer-events-none hidden md:block"></div>
            <div class="absolute left-6 bottom-6 w-16 h-16 border-l border-b border-[#E4E1E5] pointer-events-none hidden md:block"></div>
            <div class="absolute left-8 top-7 font-mono text-[10px] tracking-[2px] uppercase text-[#1B1B1E]/25 select-none pointer-events-none hidden xl:block">// {{ $settings->get('site_short_name', 'TSM') }}.ARCHIVE.REC</div>
            <div class="absolute right-8 bottom-7 font-mono text-[10px] tracking-[2px] uppercase text-[#1B1B1E]/25 select-none pointer-events-none hidden xl:block">ID // {{ substr(md5($achievement->slug), 0, 8) }}</div>

            {{-- Content Container --}}
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-14 lg:py-20 relative z-10">
                <div class="max-w-4xl mx-auto text-center reveal-on-scroll reveal-up">
                    {{-- Level Eyebrow Badge --}}
                    @php
                        $levelLabel = match($achievement->level) {
                            'national' => 'NASIONAL',
                            'province' => 'PROVINSI',
                            'city' => 'KOTA',
                            'district' => 'KABUPATEN',
                            'international' => 'INTERNASIONAL',
                            default => strtoupper($achievement->level),
                        };
                        $rankLabel = str_starts_with(strtolower($achievement->rank), 'juara') ? strtoupper($achievement->rank) : 'JUARA ' . strtoupper($achievement->rank);
                    @endphp
                    <div class="flex justify-center mb-5">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-[2px] text-xs font-sans font-bold tracking-[1.2px] uppercase bg-amber-100/80 text-amber-800 border border-amber-300/80 shadow-sm">
                            <span class="w-1.5 h-1.5 bg-amber-600 rounded-full"></span>
                            PRESTASI TINGKAT {{ $levelLabel }}
                        </span>
                    </div>
                    
                    {{-- Title --}}
                    <h1 class="font-heading font-extrabold text-3xl sm:text-4xl lg:text-[46px] lg:leading-[52px] tracking-[-1px] text-[#1B1B1E] uppercase mb-6">
                        {{ $achievement->title }}
                    </h1>
                    
                    {{-- Meta Badges Strip --}}
                    <div class="flex flex-wrap items-center justify-center text-[#5F5E5E] text-sm gap-3 sm:gap-4 mt-6">
                        <!-- Rank -->
                        <div class="flex items-center font-sans font-bold text-amber-700 bg-white px-4 py-2.5 rounded-[2px] border border-amber-300/70 shadow-[0_1px_2px_rgba(0,0,0,0.04)]">
                            <svg class="w-4 h-4 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            {{ $rankLabel }}
                        </div>
                        
                        <!-- Organizer -->
                        <div class="flex items-center font-sans font-medium text-[#1B1B1E] bg-white px-4 py-2.5 rounded-[2px] border border-[#E4E1E5] shadow-[0_1px_2px_rgba(0,0,0,0.04)]">
                            <svg class="w-4 h-4 mr-2 text-[#5F5E5E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="line-clamp-1 max-w-[200px] sm:max-w-xs" title="{{ $achievement->organizer }}">{{ $achievement->organizer ?? 'Penyelenggara Lomba Resmi' }}</span>
                        </div>
                        
                        <!-- Date (Highlighted prominently) -->
                        <div class="flex items-center font-sans font-bold text-[#DC2626] bg-white px-4 py-2.5 rounded-[2px] border border-[#DC2626]/30 shadow-[0_1px_2px_rgba(0,0,0,0.04)]">
                            <svg class="w-4 h-4 mr-2 text-[#DC2626]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $achievement->date ? $achievement->date->translatedFormat('d F Y') : '-' }}
                        </div>

                        <!-- Category -->
                        @if($achievement->category)
                        <div class="flex items-center font-sans font-medium text-[#1B1B1E] bg-white px-4 py-2.5 rounded-[2px] border border-[#E4E1E5] shadow-[0_1px_2px_rgba(0,0,0,0.04)]">
                            <svg class="w-4 h-4 mr-2 text-[#5F5E5E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            {{ $achievement->category->name }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        {{-- ═══════════════════════════════════════════════════════════════════
            BREADCRUMBS BAR
        ═══════════════════════════════════════════════════════════════════ --}}
        @php
            $breadcrumbs = [
                'Prestasi & Penghargaan' => route('achievements.index'),
                Str::limit($achievement->title, 40) => '#'
            ];
        @endphp
        <div class="w-full bg-[#FBF8FC] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-3.5">
                <x-frontend.breadcrumbs :items="$breadcrumbs" />
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════════════════════════
            MAIN ARTICLE & FACT SHEET LAYOUT (INFORMATIVE 2-COLUMN STRUCTURE)
        ═══════════════════════════════════════════════════════════════════ --}}
        <section class="w-full py-12 lg:py-20 relative overflow-hidden min-h-[60vh]">
            {{-- Background Canvas 1: Subtle Grid --}}
            <div class="absolute inset-0 pointer-events-none opacity-30 bg-[linear-gradient(90deg,#E4E4E7_1px,transparent_1px),linear-gradient(180deg,#E4E4E7_1px,transparent_1px)] bg-[size:48px_48px]"></div>

            {{-- Background Canvas 2: Dot Matrix Layer --}}
            <div class="absolute inset-0 pointer-events-none opacity-15" style="background-image: radial-gradient(#9CA3AF 1px, transparent 1px); background-size: 28px 28px;"></div>

            {{-- Background Canvas 3: Ambient Color Glows --}}
            <div class="absolute top-1/4 -left-40 w-[550px] h-[550px] bg-amber-500/5 rounded-full blur-[140px] pointer-events-none"></div>
            <div class="absolute top-2/3 -right-40 w-[550px] h-[550px] bg-[#DC2626]/5 rounded-full blur-[140px] pointer-events-none"></div>
            <div class="absolute bottom-10 left-1/3 w-[450px] h-[450px] bg-[#1B1B1E]/3 rounded-full blur-[120px] pointer-events-none"></div>

            {{-- Background Canvas 4: Blueprint Hatching Blocks --}}
            <div class="absolute -left-10 top-40 w-44 h-80 opacity-15 pointer-events-none hidden xl:block" style="background: repeating-linear-gradient(45deg, transparent, transparent 4px, rgba(228,228,231,0.8) 4px, rgba(228,228,231,0.8) 8px);"></div>
            <div class="absolute -right-10 bottom-40 w-44 h-80 opacity-15 pointer-events-none hidden xl:block" style="background: repeating-linear-gradient(-45deg, transparent, transparent 4px, rgba(228,228,231,0.8) 4px, rgba(228,228,231,0.8) 8px);"></div>

            {{-- Background Canvas 5: Engineering Crosshairs --}}
            <div class="absolute left-8 top-16 text-[#5F5E5E]/25 font-mono text-sm select-none pointer-events-none hidden lg:block">+</div>
            <div class="absolute right-8 top-16 text-[#5F5E5E]/25 font-mono text-sm select-none pointer-events-none hidden lg:block">+</div>
            <div class="absolute left-8 bottom-24 text-[#5F5E5E]/25 font-mono text-sm select-none pointer-events-none hidden lg:block">+</div>
            <div class="absolute right-8 bottom-24 text-[#5F5E5E]/25 font-mono text-sm select-none pointer-events-none hidden lg:block">+</div>

            {{-- Container --}}
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 relative z-10 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                    
                    {{-- ─────────────────────────────────────────────────────────
                        LEFT COLUMN (8 Cols): MAIN ARTICLE, PHOTOS & DETAILS
                    ───────────────────────────────────────────────────────── --}}
                    <div class="lg:col-span-8 flex flex-col gap-8">
                        
                        {{-- Main Content Card --}}
                        <article class="bg-white rounded-[2px] shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#E4E1E5] p-6 sm:p-10 lg:p-12 reveal-on-scroll reveal-up">
                            
                            {{-- Featured Photo (Main / Primary Photo) --}}
                            @if($achievement->photo)
                                <div class="mb-10 rounded-[2px] overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.06)] border border-[#E4E1E5] relative group cursor-pointer"
                                     @click="openLightbox('{{ Storage::url($achievement->photo) }}', '{{ addslashes($achievement->title) }} (Foto Utama)')"
                                     title="Klik untuk memperbesar foto">
                                    <!-- Gold Ribbon Overlay on image -->
                                    <div class="absolute -right-12 top-8 rotate-45 bg-amber-500 text-amber-950 font-sans font-black text-xs tracking-widest uppercase py-1.5 px-16 shadow-lg z-20 pointer-events-none group-hover:scale-105 transition-transform duration-500">
                                        {{ $rankLabel }}
                                    </div>
                                    
                                    <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" fetchpriority="high" class="w-full object-cover max-h-[580px] group-hover:scale-[1.02] transition-transform duration-500" loading="eager">
                                    
                                    <!-- Zoom Hint Overlay -->
                                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/95 backdrop-blur-sm text-[#1B1B1E] font-sans font-bold text-xs rounded-[2px] shadow-lg">
                                            <svg class="w-4 h-4 text-[#DC2626]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                            Perbesar Foto
                                        </span>
                                    </div>
                                </div>
                            @endif

                            {{-- Fact Highlight Grid (Quick Metrics Under Photo) --}}
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 p-4 bg-[#F5F3F6] rounded-[2px] border border-[#E4E1E5] mb-10">
                                <div class="p-2 border-r border-[#E4E1E5]/60 last:border-r-0">
                                    <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-[#5F5E5E]">Tanggal</span>
                                    <span class="font-heading font-bold text-sm text-[#1B1B1E] mt-0.5 block">
                                        {{ $achievement->date ? $achievement->date->translatedFormat('d M Y') : '-' }}
                                    </span>
                                </div>
                                <div class="p-2 border-r border-[#E4E1E5]/60 last:border-r-0">
                                    <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-[#5F5E5E]">Peringkat</span>
                                    <span class="font-heading font-bold text-sm text-amber-700 mt-0.5 block">
                                        {{ $rankLabel }}
                                    </span>
                                </div>
                                <div class="p-2 border-r border-[#E4E1E5]/60 last:border-r-0">
                                    <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-[#5F5E5E]">Tingkat</span>
                                    <span class="font-heading font-bold text-sm text-[#DC2626] mt-0.5 block">
                                        {{ $levelLabel }}
                                    </span>
                                </div>
                                <div class="p-2">
                                    <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-[#5F5E5E]">Tahun</span>
                                    <span class="font-heading font-bold text-sm text-[#1B1B1E] mt-0.5 block">
                                        {{ $achievement->date ? $achievement->date->format('Y') : '-' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Section: Description & Narrative --}}
                            <div class="mb-10">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="w-2.5 h-2.5 bg-[#DC2626] rounded-[2px]"></span>
                                    <h2 class="font-heading font-bold text-xl sm:text-2xl text-[#1B1B1E] uppercase tracking-[-0.3px]">
                                        DOKUMENTASI &amp; DESKRIPSI LENGKAP
                                    </h2>
                                </div>

                                <div class="prose prose-lg max-w-none prose-headings:font-heading prose-headings:font-bold prose-headings:text-[#1B1B1E] prose-p:font-sans prose-p:text-[#3B3A3E] prose-p:leading-relaxed prose-a:text-[#DC2626] hover:prose-a:underline prose-img:rounded-[2px] prose-img:shadow-md">
                                    @if(!empty(trim(strip_tags($achievement->description))))
                                        {!! \App\Support\HtmlSanitizer::clean($achievement->description) !!}
                                    @else
                                        <p class="text-[#3B3A3E] leading-relaxed">
                                            Pencapaian bergengsi ini ditorehkan oleh perwakilan kompetensi keahlian {{ $settings->get('site_name', 'Teknik Sepeda Motor') }} ({{ $settings->get('site_short_name', 'TSM') }}) SMK Negeri 1 Bangsri dalam ajang <strong>{{ $achievement->title }}</strong> yang diselenggarakan oleh <strong>{{ $achievement->organizer ?? 'penyelenggara resmi' }}</strong> pada <strong>{{ $achievement->date ? $achievement->date->translatedFormat('d F Y') : 'periode tahun kompetisi' }}</strong>.
                                        </p>
                                        <p class="text-[#5F5E5E] leading-relaxed mt-3">
                                            Prestasi ini merupakan buah dari pembinaan intensif di bengkel praktik kejuruan berstandar industri, penguasaan SOP servis terkini, serta dedikasi peserta didik dan instruktur kejuruan dalam menjunjung tinggi standar kualitas vokasi tingkat {{ strtolower($levelLabel) }}.
                                        </p>
                                    @endif
                                </div>
                            </div>

                            {{-- ─────────────────────────────────────────────────────
                                SECTION: FOTO PENDUKUNG (SUPPORTING PHOTOS / GALLERY)
                                [RULE: HILANGKAN JIKA FOTO CUMA 1 / TIDAK ADA FOTO PENDUKUNG]
                            ───────────────────────────────────────────────────── --}}
                            @php
                                $supportingPhotos = is_array($achievement->supporting_photos) 
                                    ? array_filter($achievement->supporting_photos) 
                                    : [];
                            @endphp

                            @if(count($supportingPhotos) > 0)
                                <div class="mt-12 pt-10 border-t border-[#E4E1E5]">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-6">
                                        <div>
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="w-2.5 h-2.5 bg-[#DC2626] rounded-[2px]"></span>
                                                <h3 class="font-heading font-bold text-lg sm:text-xl text-[#1B1B1E] uppercase tracking-[-0.2px]">
                                                    FOTO PENDUKUNG DOKUMENTASI
                                                </h3>
                                            </div>
                                            <p class="font-sans text-xs sm:text-sm text-[#5F5E5E]">
                                                Galeri foto suasana kompetisi, penyerahan penghargaan, dan dinamika tim ({{ count($supportingPhotos) }} Foto Tambahan).
                                            </p>
                                        </div>
                                        <span class="inline-flex items-center px-3 py-1 bg-[#F5F3F6] border border-[#E4E1E5] rounded-[2px] text-[11px] font-mono font-bold text-[#5F5E5E]">
                                            TOTAL {{ count($supportingPhotos) }} FOTO
                                        </span>
                                    </div>

                                    {{-- Grid of Supporting Photos --}}
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach($supportingPhotos as $spIdx => $sPhoto)
                                            <div class="relative group rounded-[2px] overflow-hidden border border-[#E4E1E5] shadow-sm bg-[#F5F3F6] cursor-pointer aspect-[4/3]"
                                                 @click="openLightbox('{{ Storage::url($sPhoto) }}', 'Dokumentasi Tambahan #{{ $spIdx + 1 }} - {{ addslashes($achievement->title) }}')">
                                                <img src="{{ Storage::url($sPhoto) }}" 
                                                     alt="Foto Pendukung {{ $spIdx + 1 }} {{ $achievement->title }}" 
                                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                                     loading="lazy">
                                                
                                                {{-- Hover Overlay with Zoom Icon --}}
                                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-3 text-center">
                                                    <div class="w-9 h-9 rounded-sm bg-white/90 text-[#1B1B1E] flex items-center justify-center mb-1 shadow-md transform group-hover:scale-110 transition-transform">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                                    </div>
                                                    <span class="font-sans font-bold text-[11px] text-white tracking-wider uppercase drop-shadow-sm">Lihat Foto</span>
                                                </div>

                                                {{-- Corner Index Pill --}}
                                                <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm text-white font-mono text-[10px] rounded-[2px]">
                                                    #{{ $spIdx + 1 }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- Participants / Team Section --}}
                            @if($achievement->participants->count() > 0)
                                <div class="mt-12 pt-10 border-t border-[#E4E1E5]">
                                    <div class="bg-[#FBF8FC] border border-amber-200/80 rounded-[2px] p-6 sm:p-8">
                                        <h3 class="text-xs font-sans font-bold uppercase tracking-widest text-amber-800 mb-4 flex items-center gap-2">
                                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3.005 3.005 0 013.75-2.906z"/></svg>
                                            Siswa &amp; Tim Berprestasi
                                        </h3>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            @foreach($achievement->participants as $p)
                                                <div class="bg-white px-4 py-3 rounded-[2px] border border-amber-200/60 shadow-sm flex items-center justify-between">
                                                    <div>
                                                        <span class="font-sans font-bold text-[#1B1B1E] text-sm sm:text-base block">{{ $p->student_name }}</span>
                                                        <span class="text-[11px] text-[#5F5E5E] font-sans">Peserta / Delegasi Vokasi</span>
                                                    </div>
                                                    @if($p->student_id)
                                                        <span class="text-xs font-mono text-[#5F5E5E] bg-[#F5F3F6] px-2 py-0.5 rounded-[2px]">NIS: {{ $p->student_id }}</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Bottom Action: Back Button --}}
                            <div class="mt-12 pt-8 border-t border-[#E4E1E5] flex justify-between items-center flex-wrap gap-4">
                                <a href="{{ route('achievements.index') }}" class="group inline-flex items-center gap-2 px-5 py-2.5 bg-[#F5F3F6] hover:bg-[#E4E1E5] text-[#1B1B1E] font-sans font-bold text-xs uppercase tracking-[1px] rounded-[2px] transition-all border border-[#E4E1E5]">
                                    <svg class="w-4 h-4 text-[#5F5E5E] group-hover:text-[#DC2626] transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    Kembali ke Rekam Jejak Prestasi
                                </a>
                                <span class="font-mono text-[11px] text-[#8E8B8F] uppercase tracking-wider">
                                    Pusat Keunggulan Kejuruan {{ $settings->get('site_short_name', 'TSM') }}
                                </span>
                            </div>
                            
                        </article>
                    </div>

                    {{-- ─────────────────────────────────────────────────────────
                        RIGHT COLUMN (4 Cols): STICKY INFORMATIVE FACT SHEET
                    ───────────────────────────────────────────────────────── --}}
                    <aside class="lg:col-span-4 flex flex-col gap-6 sticky top-24">
                        
                        {{-- 1. Official Fact Sheet Card --}}
                        <div class="bg-white rounded-[2px] shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#E4E1E5] overflow-hidden reveal-on-scroll reveal-up">
                            <div class="bg-[#1B1B1E] px-6 py-4 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 bg-[#DC2626] rounded-full"></span>
                                    <h3 class="font-sans font-bold text-xs uppercase tracking-[1.4px] text-white">
                                        LEMBAR FAKTA RESMI
                                    </h3>
                                </div>
                                <span class="text-[10px] font-mono text-[#A1A1AA] uppercase">VERIFIED</span>
                            </div>

                            <div class="p-6 flex flex-col divide-y divide-[#F0EDF1]">
                                {{-- Tanggal Pelaksanaan --}}
                                <div class="py-3.5 first:pt-0">
                                    <span class="block font-sans font-bold text-[11px] uppercase tracking-wider text-[#5F5E5E] mb-1">
                                        Tanggal Pelaksanaan
                                    </span>
                                    <span class="font-sans font-bold text-base text-[#1B1B1E]">
                                        {{ $achievement->date ? $achievement->date->translatedFormat('l, d F Y') : '-' }}
                                    </span>
                                    @if($achievement->date)
                                        <span class="block text-xs font-mono text-[#5F5E5E] mt-0.5">
                                            Tahun Anggaran / Kompetisi: {{ $achievement->date->format('Y') }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Peringkat & Gelar --}}
                                <div class="py-3.5">
                                    <span class="block font-sans font-bold text-[11px] uppercase tracking-wider text-[#5F5E5E] mb-1">
                                        Peringkat / Predikat
                                    </span>
                                    <span class="font-sans font-bold text-base text-amber-700">
                                        {{ $rankLabel }}
                                    </span>
                                </div>

                                {{-- Tingkat Kompetisi --}}
                                <div class="py-3.5">
                                    <span class="block font-sans font-bold text-[11px] uppercase tracking-wider text-[#5F5E5E] mb-1">
                                        Tingkat / Jangkauan
                                    </span>
                                    <span class="inline-flex items-center px-2.5 py-1 bg-red-50 text-[#DC2626] border border-red-200 text-xs font-sans font-bold uppercase rounded-[2px]">
                                        Tingkat {{ $levelLabel }}
                                    </span>
                                </div>

                                {{-- Penyelenggara Resmi --}}
                                <div class="py-3.5">
                                    <span class="block font-sans font-bold text-[11px] uppercase tracking-wider text-[#5F5E5E] mb-1">
                                        Instansi Penyelenggara
                                    </span>
                                    <span class="font-sans font-medium text-sm text-[#1B1B1E] leading-snug block">
                                        {{ $achievement->organizer ?? 'Penyelenggara Lomba Resmi' }}
                                    </span>
                                </div>

                                {{-- Kategori / Bidang Kejuruan --}}
                                <div class="py-3.5">
                                    <span class="block font-sans font-bold text-[11px] uppercase tracking-wider text-[#5F5E5E] mb-1">
                                        Bidang Kejuruan
                                    </span>
                                    <span class="font-sans font-medium text-sm text-[#1B1B1E] block">
                                        {{ $achievement->category ? $achievement->category->name : $settings->get('site_name', 'Teknik Sepeda Motor') }}
                                    </span>
                                </div>

                                {{-- Validasi Status --}}
                                <div class="py-3.5 last:pb-0">
                                    <span class="block font-sans font-bold text-[11px] uppercase tracking-wider text-[#5F5E5E] mb-1">
                                        Status Validasi Arsip
                                    </span>
                                    <div class="flex items-center gap-2 text-xs font-sans font-semibold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-[2px] border border-emerald-200">
                                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        Terverifikasi SMKN 1 Bangsri
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 2. Social Share Card --}}
                        <div class="bg-white rounded-[2px] shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#E4E1E5] p-5">
                            <span class="block font-sans font-bold text-xs uppercase tracking-wider text-[#1B1B1E] mb-3">
                                Bagikan Informasi Prestasi
                            </span>
                            <div class="flex items-center gap-2">
                                {{-- WhatsApp --}}
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($achievement->title . ' - Prestasi ' . $settings->get('site_short_name', 'TSM') . ' SMKN 1 Bangsri: ' . url()->current()) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-[#25D366] hover:bg-[#20ba59] text-white text-xs font-bold rounded-[2px] transition-colors shadow-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.044c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.824l-1.611 5.885 6.035-1.583c1.674.914 3.585 1.43 5.614 1.43 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
                                    WhatsApp
                                </a>

                                {{-- Salin Link Button --}}
                                <button @click="copyUrl()" 
                                        type="button" 
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-[#F5F3F6] hover:bg-[#E4E1E5] text-[#1B1B1E] text-xs font-bold rounded-[2px] transition-colors border border-[#E4E1E5]">
                                    <svg x-show="!copied" class="w-4 h-4 text-[#5F5E5E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <svg x-show="copied" class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    <span x-text="copied ? 'Tersalin!' : 'Salin Tautan'"></span>
                                </button>
                            </div>
                        </div>

                        {{-- 3. Related / Other Achievements --}}
                        @if(isset($relatedAchievements) && $relatedAchievements->isNotEmpty())
                            <div class="bg-white rounded-[2px] shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#E4E1E5] p-5">
                                <div class="flex items-center justify-between mb-4 pb-2 border-b border-[#F0EDF1]">
                                    <span class="font-sans font-bold text-xs uppercase tracking-wider text-[#1B1B1E]">
                                        Prestasi Terkait Lainnya
                                    </span>
                                    <a href="{{ route('achievements.index') }}" class="text-[11px] text-[#DC2626] font-bold hover:underline">Lihat Semua &rarr;</a>
                                </div>

                                <div class="flex flex-col divide-y divide-[#F0EDF1]">
                                    @foreach($relatedAchievements as $rel)
                                        <a href="{{ route('achievements.show', $rel->slug) }}" class="py-3 first:pt-0 last:pb-0 group flex items-center gap-3">
                                            @if($rel->photo)
                                                <img src="{{ Storage::url($rel->photo) }}" alt="{{ $rel->title }}" class="w-14 h-14 object-cover rounded-[2px] border border-[#E4E1E5] flex-shrink-0 group-hover:scale-105 transition-transform" loading="lazy">
                                            @else
                                                <div class="w-14 h-14 bg-[#F5F3F6] rounded-[2px] border border-[#E4E1E5] flex items-center justify-center text-[10px] text-[#5F5E5E] flex-shrink-0">
                                                    {{ $settings->get('site_short_name', 'TSM') }}
                                                </div>
                                            @endif
                                            <div class="flex-grow min-w-0">
                                                <span class="block font-sans font-bold text-xs text-[#1B1B1E] group-hover:text-[#DC2626] transition-colors truncate">
                                                    {{ $rel->title }}
                                                </span>
                                                <div class="flex items-center gap-2 text-[11px] text-[#5F5E5E] mt-0.5">
                                                    <span class="font-semibold text-amber-700">{{ $rel->rank }}</span>
                                                    <span>&bull;</span>
                                                    <span>{{ $rel->date ? $rel->date->format('Y') : '-' }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </aside>

                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════════════════════════════
            LIGHTBOX MODAL FOR IMAGES (INTERACTIVE FULL PREVIEW)
        ═══════════════════════════════════════════════════════════════════ --}}
        <div x-show="lightboxOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/90 backdrop-blur-md" 
             style="display: none;"
             @click="closeLightbox()">
            
            {{-- Close Button --}}
            <button type="button" 
                    @click="closeLightbox()" 
                    class="absolute top-4 right-4 z-50 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 p-2.5 rounded-sm sm:rounded-[2px] transition-colors focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            {{-- Modal Content Card --}}
            <div class="relative max-w-5xl max-h-[90vh] flex flex-col items-center" @click.stop>
                <img :src="activeImage" 
                     :alt="activeCaption" 
                     class="max-w-full max-h-[80vh] object-contain rounded-[2px] shadow-2xl border border-white/10">
                
                {{-- Caption bar --}}
                <div x-show="activeCaption" class="mt-3 px-4 py-1.5 bg-black/60 rounded-sm sm:rounded-[2px] text-white text-xs font-sans tracking-wide text-center">
                    <span x-text="activeCaption"></span>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
