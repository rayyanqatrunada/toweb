<x-layouts.app title="Program Keahlian">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Program Keahlian</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Mengenal lebih dalam konsentrasi keahlian yang kami tawarkan dengan kurikulum tersinkronisasi industri.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Program Keahlian' => route('academic.programs')]" />

    <section class="py-16 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-16">
                @forelse($programs as $program)
                    <div id="{{ $program->slug }}" class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden flex flex-col lg:flex-row group scroll-mt-24">
                        <div class="w-full lg:w-2/5 aspect-video lg:aspect-auto relative overflow-hidden bg-slate-900">
                            @if($program->thumbnail)
                                <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-90 group-hover:opacity-100">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-500">
                                    <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent lg:hidden"></div>
                            <div class="absolute bottom-6 left-6 right-6 lg:hidden">
                                <h2 class="text-2xl font-bold text-white">{{ $program->name }}</h2>
                            </div>
                        </div>
                        
                        <div class="p-8 lg:p-12 w-full lg:w-3/5 flex flex-col justify-center">
                            <h2 class="text-3xl font-bold text-slate-900 mb-4 hidden lg:block group-hover:text-red-600 transition-colors">{{ $program->name }}</h2>
                            
                            <div class="prose prose-slate prose-lg max-w-none mb-8 text-slate-600">
                                {!! \App\Support\HtmlSanitizer::clean($program->description) !!}
                            </div>
                            
                            @if($program->competencies->count() > 0)
                                <div class="mt-auto">
                                    <h3 class="text-sm font-bold tracking-wider text-red-600 uppercase mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        Kompetensi Utama
                                    </h3>
                                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        @foreach($program->competencies as $competency)
                                            <li class="flex items-start text-slate-700 bg-slate-50 rounded-lg p-3 border border-slate-100 hover:border-red-200 hover:bg-red-50 transition-colors">
                                                <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                <span class="font-medium text-sm">{{ $competency->name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20">
                        <x-empty-state title="Belum Ada Program Keahlian" message="Data program keahlian belum tersedia saat ini." icon="document" />
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>

