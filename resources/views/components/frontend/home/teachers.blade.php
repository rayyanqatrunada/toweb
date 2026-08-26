@props([
    'headOfDepartment' => null,
    'teachers' => null
])

<section class="w-full bg-figma-bg-section py-24 lg:py-32 overflow-hidden border-t border-gray-100">
    <div class="max-w-[1280px] mx-auto px-6 md:px-16">
        
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
            <div class="w-full lg:w-5/12 bg-charcoal-950 p-8 md:p-12 text-white relative overflow-hidden group">
                <!-- Decorative background elements -->
                <div class="absolute -top-12 -right-12 w-48 h-48 bg-figma-red opacity-10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-figma-red"></div>
                
                @if($headOfDepartment)
                    <div class="flex flex-col h-full z-10 relative">
                        <h3 class="font-heading font-bold text-[24px] mb-2">Kepala Kompetensi Keahlian</h3>
                        <div class="w-12 h-1 bg-figma-red mb-8"></div>
                        
                        <div class="w-32 h-32 md:w-48 md:h-48 bg-charcoal-800 rounded-full overflow-hidden mb-8 border-4 border-charcoal-800 shadow-xl mx-auto md:mx-0">
                            @if($headOfDepartment->photo)
                                <img src="{{ Storage::url($headOfDepartment->photo) }}" alt="{{ $headOfDepartment->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center font-heading font-bold text-4xl text-gray-500">{{ substr($headOfDepartment->name, 0, 1) }}</div>
                            @endif
                        </div>
                        
                        <h4 class="font-heading font-bold text-[32px] leading-tight mb-2">{{ $headOfDepartment->name }}</h4>
                        <p class="font-sans text-[16px] text-gray-400 mb-6">{{ $headOfDepartment->position ?? 'Guru Kejuruan Otomotif' }}</p>
                        
                        <p class="font-sans text-[15px] leading-[1.7] text-gray-300 italic flex-grow">
                            "Misi kami adalah menjembatani jarak antara teori di sekolah dengan realita di bengkel, sehingga siswa TBSM tidak pernah kaget ketika terjun ke industri yang sebenarnya."
                        </p>
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
                        <div class="flex flex-col sm:flex-row items-center sm:items-start p-6 md:p-8 bg-white border border-gray-200 hover:shadow-lg transition-shadow duration-300 gap-6 group">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden shrink-0 bg-gray-100 border-2 border-gray-100 group-hover:border-figma-red transition-colors duration-300">
                                @if($teacher->photo)
                                    <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center font-heading font-bold text-2xl text-gray-400">{{ substr($teacher->name, 0, 1) }}</div>
                                @endif
                            </div>
                            
                            <div class="text-center sm:text-left flex-1">
                                <h4 class="font-heading font-bold text-[22px] md:text-[24px] text-figma-dark mb-1 group-hover:text-figma-red transition-colors">{{ $teacher->name }}</h4>
                                <p class="font-sans text-[15px] text-figma-gray mb-3">{{ $teacher->position ?? 'Guru Kejuruan Otomotif' }}</p>
                                <p class="font-sans text-[14px] text-gray-500 line-clamp-2">
                                    {{ $teacher->bio ?? 'Berpengalaman mendidik mekanik-mekanik andal dan membimbing siswa dalam berbagai kejuaraan otomotif tingkat nasional.' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="mt-4 flex justify-center lg:justify-start">
                        <a href="{{ route('academic.teachers') }}" class="inline-flex items-center justify-center px-8 py-3 border border-gray-300 text-figma-dark font-sans font-bold text-[14px] uppercase tracking-wide hover:bg-gray-100 transition-colors focus-ring">
                            Lihat Seluruh Tim Pengajar
                        </a>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full min-h-[200px] bg-white border border-gray-200 p-8">
                        <p class="text-gray-500 italic">Data Guru belum tersedia.</p>
                    </div>
                @endif
            </div>

        </div>
        
    </div>
</section>
