<x-layouts.app title="Guru & Tenaga Pendidik">
    @push('json-ld')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebPage",
      "name": "Profil Guru & Tenaga Pengajar",
      "description": "Profil tenaga pendidik profesional dan berpengalaman di bidang teknik dan bisnis sepeda motor."
    }
    </script>
    @endpush

    @php
        $headOfDepartment = $teachers->where('is_head_of_department', true)->first();
        $teachingStaff = $teachers->where('is_head_of_department', false)->sortBy('name')->values();
    @endphp

    <!-- HERO SECTION (BENTO STYLE) -->
    <section class="relative bg-charcoal-50 overflow-hidden lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-charcoal-200/50 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
        
        <x-frontend.layout.container class="relative z-10">
            <x-frontend.breadcrumbs :items="['Akademik' => '#', 'Guru & Staf' => route('academic.teachers')]" class="mb-8" />
            
            <div class="max-w-4xl">
                <span class="inline-block py-1.5 px-3 rounded-md bg-white border border-charcoal-200 text-[10px] font-black uppercase tracking-widest text-charcoal-900 mb-6 shadow-sm reveal-on-scroll reveal-up">
                    TENAGA PENDIDIK
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-charcoal-950 tracking-tighter leading-[0.95] mb-6 uppercase reveal-on-scroll reveal-up delay-100">
                    GURU & <br class="hidden sm:block">
                    <span class="text-charcoal-400">STAF PENGAJAR</span>
                </h1>
                <p class="text-base lg:text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl reveal-on-scroll reveal-up delay-200">
                    Di balik kurikulum dan fasilitas modern, terdapat tenaga pendidik bersertifikasi yang berdedikasi penuh untuk mentransfer pengetahuan dan membimbing keterampilan peserta didik.
                </p>
            </div>
        </x-frontend.layout.container>
    </section>

    <!-- BENTO GRID FOR TEACHERS -->
    <section class="bg-charcoal-50 pb-20 lg:pb-32">
        <x-frontend.layout.container>
            
            @if(count($teachers) === 0)
                <div class="py-20 reveal-on-scroll reveal-up">
                    <x-frontend.ui.empty-state title="Belum Ada Data Guru" message="Data tenaga pendidik belum ditambahkan saat ini." icon="document" />
                </div>
            @else
                
                <!-- BENTO GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                    
                    <!-- HEAD OF DEPARTMENT (Col Span 2) -->
                    @if($headOfDepartment)
                        <div class="md:col-span-2 lg:col-span-2 bg-charcoal-900 rounded-3xl p-6 lg:p-8 relative overflow-hidden group shadow-sm flex flex-col justify-end min-h-[350px] lg:min-h-[450px] reveal-on-scroll reveal-up">
                            @if($headOfDepartment->photo)
                                <img src="{{ Storage::url($headOfDepartment->photo) }}" alt="{{ $headOfDepartment->name }}" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-70 group-hover:scale-105 transition-all duration-700" loading="eager">
                            @else
                                <div class="absolute inset-0 bg-gradient-to-br from-charcoal-800 to-charcoal-950"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/60 to-transparent"></div>
                            
                            <div class="relative z-10">
                                <span class="inline-block py-1 px-3 rounded bg-white/20 backdrop-blur-md border border-white/20 text-[10px] font-black uppercase tracking-widest text-white mb-4">
                                    KEPALA JURUSAN
                                </span>
                                <h2 class="text-2xl lg:text-3xl font-black text-white tracking-tight leading-tight mb-1">
                                    {{ $headOfDepartment->name }}
                                </h2>
                                <p class="text-charcoal-300 text-sm font-medium">{{ $headOfDepartment->specialization ?? 'Manajemen Otomotif' }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- OTHER TEACHING STAFF (Col Span 1) -->
                    @foreach($teachingStaff as $index => $teacher)
                        <div class="bg-white rounded-3xl p-6 lg:p-6 border border-charcoal-200 relative overflow-hidden group shadow-sm flex flex-col min-h-[350px] lg:min-h-[450px] reveal-on-scroll reveal-up delay-[{{ ($index % 3 + 1) * 100 }}ms]">
                            
                            <!-- Image Top Half -->
                            <div class="absolute top-0 left-0 right-0 h-3/5 bg-charcoal-100 overflow-hidden">
                                @if($teacher->photo)
                                    <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover object-top grayscale-[50%] group-hover:grayscale-0 transition-all duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-charcoal-300">
                                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Bottom Info -->
                            <div class="absolute bottom-0 left-0 right-0 h-2/5 p-6 flex flex-col justify-end bg-white">
                                <h3 class="text-lg lg:text-xl font-bold text-charcoal-900 leading-tight mb-1">
                                    {{ $teacher->name }}
                                </h3>
                                @if($teacher->specialization)
                                    <p class="text-charcoal-500 text-xs font-bold uppercase tracking-wider">{{ $teacher->specialization }}</p>
                                @endif
                                
                                @if($teacher->nip)
                                    <p class="text-charcoal-400 text-[10px] uppercase tracking-widest mt-2 border-t border-charcoal-100 pt-2">
                                        NIP/NIGK: {{ $teacher->nip }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif
        </x-frontend.layout.container>
    </section>

</x-layouts.app>




