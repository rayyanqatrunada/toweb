<x-layouts.app title="Prestasi">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Prestasi & Penghargaan</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Merekam jejak keberhasilan siswa dan guru dalam berbagai kompetisi tingkat lokal hingga internasional.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Prestasi' => route('achievements.index')]" />

    <section class="py-16 bg-slate-50 min-h-[50vh]">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($achievements as $achievement)
                    <article class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col h-full focus-within:ring-4 focus-within:ring-red-500 hover:-translate-y-1">
                        <a href="{{ route('achievements.show', $achievement->slug) }}" class="relative h-56 overflow-hidden bg-slate-100 block focus:outline-none">
                            @if($achievement->photo)
                                <img src="{{ Storage::url($achievement->photo) }}" alt="{{ $achievement->title }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-200">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                            @endif
                            <span class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                Tingkat {{ ucfirst($achievement->level) }}
                            </span>
                        </a>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center text-sm text-slate-500 mb-3 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $achievement->date ? $achievement->date->translatedFormat('d M Y') : 'Tanpa Tanggal' }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 leading-tight group-hover:text-red-600 transition-colors">
                                <a href="{{ route('achievements.show', $achievement->slug) }}" class="focus:outline-none">{{ $achievement->title }}</a>
                            </h3>
                            <p class="text-slate-600 text-sm mb-4">Penyelenggara: <span class="font-medium text-slate-800">{{ $achievement->organizer }}</span></p>
                            
                            <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="inline-flex items-center bg-amber-100 text-amber-800 rounded-lg px-3 py-1.5 text-sm font-bold shadow-sm">
                                    <svg class="w-4 h-4 mr-1.5 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    Juara {{ $achievement->rank }}
                                </span>
                                
                                <a href="{{ route('achievements.show', $achievement->slug) }}" class="inline-flex items-center text-sm font-bold text-red-600 hover:text-red-700">
                                    Detail
                                    <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-10">
                        <x-empty-state title="Belum Ada Prestasi" message="Data prestasi belum ditambahkan saat ini." icon="document" />
                    </div>
                @endforelse
            </div>
            
            @if($achievements->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $achievements->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

