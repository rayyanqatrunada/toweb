<x-layouts.app title="Galeri Dokumentasi">
    <div class="flex flex-col items-center bg-[#FBF8FC] w-full overflow-hidden relative">
        
        <!-- Hero Section -->
        <section class="w-full relative border-b border-[#E4E1E5] flex justify-center"
            @if($settings->get('header_gallery_image'))
                style="background-image: url('{{ Storage::url($settings->get('header_gallery_image')) }}'); background-size: cover; background-position: center;"
            @else
                style="background: linear-gradient(90deg, #E4E4E7 1px, transparent 1px), linear-gradient(180deg, #E4E4E7 1px, transparent 1px), #FFFFFF; background-size: 48px 48px; background-position: center top;"
            @endif
        >
            
            <div class="flex flex-col items-start px-6 md:px-16 py-12 md:py-20 w-full max-w-[1440px] relative">
                <!-- Decorative Accent -->
                <div class="absolute right-0 top-0 w-32 md:w-64 h-32 md:h-64 opacity-50 border-b border-l border-[#E4E1E5] flex flex-col pointer-events-none hidden md:flex">
                    <div class="flex-1 border border-[#E4E4E7] m-4 opacity-20"></div>
                </div>

                @php
                    // Determine if we should play animations (only on initial direct load of /gallery)
                    $isFilteredOrPaginated = request()->has('album') || request()->has('page');
                    $animationClasses = $isFilteredOrPaginated ? '' : 'reveal-on-scroll reveal-up';
                @endphp

                <div class="flex flex-col gap-6 w-full max-w-3xl relative z-10 {{ $animationClasses }}">
                    <!-- Eyebrow -->
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-[1px] bg-[#B70011]"></div>
                        <span class="font-sans font-bold text-xs uppercase tracking-[1.2px] text-[#B70011]">
                            Dokumentasi
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-[64px] leading-tight lg:leading-[70px] tracking-[-1.28px] text-[#1B1B1E]">
                        Galeri Kegiatan & Fasilitas
                    </h1>

                    <!-- Subtitle -->
                    <p class="font-sans text-base md:text-lg leading-[29px] text-[#5F5E5E] max-w-[672px]">
                        Merekam jejak perjalanan akademik dan praktik industri siswa Teknik Otomotif SMK Negeri 1 Bangsri dalam membangun kompetensi profesional.
                    </p>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="koleksi-galeri" class="flex flex-col items-start px-6 md:px-16 py-12 md:py-20 gap-12 w-full max-w-[1440px]">
            
            <!-- Filters -->
            <div class="flex flex-row items-start pb-4 gap-4 w-full border-b border-[#E4E1E5] overflow-x-auto hide-scrollbar snap-x">
                
                @php
                    $currentFilter = request('album', 'all');
                @endphp

                <a href="{{ route('gallery.index') }}" 
                   class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 {{ $currentFilter === 'all' ? 'bg-[#1B1B1E] border-[#1B1B1E] text-white' : 'bg-white border-[#E4E1E5] text-[#5F5E5E] hover:bg-gray-50' }}">
                    <span class="font-sans font-bold text-xs uppercase tracking-[1.2px]">Semua Foto</span>
                </a>

                @foreach($albums as $album)
                    <a href="{{ route('gallery.index', ['album' => $album->slug]) }}" 
                       class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 {{ $currentFilter === $album->slug ? 'bg-[#1B1B1E] border-[#1B1B1E] text-white' : 'bg-white border-[#E4E1E5] text-[#5F5E5E] hover:bg-gray-50' }}">
                        <span class="font-sans font-bold text-xs uppercase tracking-[1.2px]">{{ $album->title }}</span>
                    </a>
                @endforeach

                <a href="{{ route('gallery.index', ['album' => 'prestasi']) }}" 
                   class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 {{ $currentFilter === 'prestasi' ? 'bg-[#1B1B1E] border-[#1B1B1E] text-white' : 'bg-white border-[#E4E1E5] text-[#5F5E5E] hover:bg-gray-50' }}">
                    <span class="font-sans font-bold text-xs uppercase tracking-[1.2px]">Prestasi Siswa</span>
                </a>

                <a href="{{ route('gallery.index', ['album' => 'fasilitas']) }}" 
                   class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 {{ $currentFilter === 'fasilitas' ? 'bg-[#1B1B1E] border-[#1B1B1E] text-white' : 'bg-white border-[#E4E1E5] text-[#5F5E5E] hover:bg-gray-50' }}">
                    <span class="font-sans font-bold text-xs uppercase tracking-[1.2px]">Fasilitas Bengkel</span>
                </a>

                <a href="{{ route('gallery.index', ['album' => 'berita']) }}" 
                   class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 {{ $currentFilter === 'berita' ? 'bg-[#1B1B1E] border-[#1B1B1E] text-white' : 'bg-white border-[#E4E1E5] text-[#5F5E5E] hover:bg-gray-50' }}">
                    <span class="font-sans font-bold text-xs uppercase tracking-[1.2px]">Warta & Berita</span>
                </a>
            </div>

            <!-- Bento Grid -->
            @if($items->count() > 0)
                <div class="w-full bento-gallery-grid">
                    @foreach($items as $index => $item)
                        @php
                            // Repeating pattern every 6 items:
                            // 0: Large (2col × 2row)
                            // 1: Normal (1col × 1row)
                            // 2: Normal (1col × 1row)
                            // 3: Tall (1col × 2row)
                            // 4: Normal (1col × 1row)
                            // 5: Wide (2col × 1row)
                            $pos = $index % 6;
                            $sizeClass = match($pos) {
                                0 => 'bento-large',
                                3 => 'bento-tall',
                                5 => 'bento-wide',
                                default => 'bento-normal',
                            };

                            $photoUrl = (str_starts_with($item->file_path, 'http://') || str_starts_with($item->file_path, 'https://')) 
                                ? $item->file_path 
                                : Storage::url(ltrim(preg_replace('#^storage/#', '', $item->file_path), '/'));
                            
                            $fallbackSvg = "data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22800%22%20height%3D%22600%22%20viewBox%3D%220%200%20800%20600%22%3E%3Crect%20fill%3D%22%231F2937%22%20width%3D%22800%22%20height%3D%22600%22%2F%3E%3Cpath%20d%3D%22M350%20250a50%2050%200%201%200%20100%200%2050%2050%200%201%200-100%200zm-50%20150h200l-60-80-40%2050-30-40-70%2070z%22%20fill%3D%22%23DC2626%22%2F%3E%3Ctext%20x%3D%22400%22%20y%3D%22450%22%20font-family%3D%22sans-serif%22%20font-size%3D%2220%22%20font-weight%3D%22bold%22%20fill%3D%22%23FFFFFF%22%20text-anchor%3D%22middle%22%3EDOKUMENTASI%20TBSM%3C%2Ftext%3E%3C%2Fsvg%3E";
                        @endphp

                        <div class="bento-item {{ $sizeClass }} group relative bg-white border border-[#E4E1E5] overflow-hidden {{ $animationClasses }}">
                            
                            <img src="{{ $photoUrl }}" 
                                 alt="{{ $item->title ?? $item->album_title ?? 'Gallery image' }}" 
                                 onerror="this.onerror=null; this.src='{{ $fallbackSvg }}';"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            
                            <!-- Overlay -->
                            <div class="absolute inset-[1px] bg-[rgba(27,27,30,0.8)] opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end items-start p-4 md:p-6">
                                
                                @if($item->album_title)
                                <div class="flex items-center uppercase font-sans font-bold text-[12px] tracking-[1.2px] text-[#FFDAD6] mb-1 pb-1 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    {{ Str::limit($item->album_title, 35) }}
                                </div>
                                @endif
                                
                                @if($item->title)
                                <h3 class="font-heading font-bold text-lg md:text-2xl text-white leading-[1.3] transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">
                                    {{ $item->title }}
                                </h3>
                                @endif
                                
                                @if($item->description)
                                <p class="font-sans text-xs md:text-sm text-gray-300 mt-2 line-clamp-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100">
                                    {{ $item->description }}
                                </p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            @else
                <div class="w-full py-16 flex flex-col items-center text-center">
                    <x-frontend.ui.empty-state 
                        title="Galeri Masih Kosong" 
                        message="Belum ada dokumentasi kegiatan yang dipublikasikan pada kategori ini." 
                        icon="image" 
                    />
                </div>
            @endif

            <!-- Pagination -->
            @if($items->hasPages())
                <div class="flex justify-center w-full">
                    {{ $items->appends(['album' => request('album')])->links() }}
                </div>
            @endif

        </section>

        <!-- Final CTA -->
        <x-frontend.home.final-cta />

    </div>

    @push('styles')
    <style>
        /* Bento Gallery Grid */
        .bento-gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 250px;
            gap: 24px;
            grid-auto-flow: dense;
        }

        .bento-item {
            min-height: 0;
        }

        /* Large: 2 col × 2 row */
        .bento-large {
            grid-column: span 2;
            grid-row: span 2;
        }

        /* Tall: 1 col × 2 row */
        .bento-tall {
            grid-column: span 1;
            grid-row: span 2;
        }

        /* Wide: 2 col × 1 row */
        .bento-wide {
            grid-column: span 2;
            grid-row: span 1;
        }

        /* Normal: 1 col × 1 row */
        .bento-normal {
            grid-column: span 1;
            grid-row: span 1;
        }

        /* Tablet: 3 columns */
        @media (max-width: 1024px) {
            .bento-gallery-grid {
                grid-template-columns: repeat(3, 1fr);
                grid-auto-rows: 200px;
                gap: 16px;
            }
        }

        /* Mobile: 2 columns */
        @media (max-width: 640px) {
            .bento-gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-auto-rows: 150px;
                gap: 8px;
            }
            .bento-large {
                grid-column: span 2;
                grid-row: span 2;
            }
            .bento-wide {
                grid-column: span 2;
                grid-row: span 1;
            }
            .bento-tall {
                grid-column: span 1;
                grid-row: span 2;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Handle instant scroll restoration for filters and pagination
        document.addEventListener("DOMContentLoaded", function() {
            @if(request()->has('album') || request()->has('page'))
                const savedScroll = sessionStorage.getItem('galleryScrollPos');
                if (savedScroll) {
                    // Disable smooth scrolling temporarily
                    document.documentElement.classList.remove('scroll-smooth');
                    
                    // Instantly jump to saved position
                    window.scrollTo(0, parseInt(savedScroll, 10));
                    
                    // Re-enable smooth scrolling
                    setTimeout(() => {
                        document.documentElement.classList.add('scroll-smooth');
                    }, 50);
                }
            @endif

            // Save scroll position before leaving the page
            window.addEventListener('beforeunload', function() {
                sessionStorage.setItem('galleryScrollPos', window.scrollY);
            });
        });
    </script>
    @endpush

</x-layouts.app>
