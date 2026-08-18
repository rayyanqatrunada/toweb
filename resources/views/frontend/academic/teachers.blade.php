<x-layouts.app title="Guru & Staf">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Guru & Staf</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Tenaga pendidik profesional dan berpengalaman di bidang teknik otomotif siap mendidik generasi andal.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Guru & Staf' => route('academic.teachers')]" />

    <section class="py-16 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($teachers as $teacher)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 overflow-hidden text-center p-8 group transition-all duration-300 hover:-translate-y-1 relative {{ $teacher->is_head_of_department ? 'ring-2 ring-red-500' : '' }}">
                        @if($teacher->is_head_of_department)
                            <div class="absolute top-0 inset-x-0 h-1 bg-red-600"></div>
                            <span class="absolute top-3 right-3 text-red-600" title="Kepala Jurusan">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            </span>
                        @endif
                        
                        <div class="w-32 h-32 mx-auto bg-slate-200 rounded-full overflow-hidden mb-5 border-4 border-slate-50 shadow-inner group-hover:border-red-100 transition-colors relative">
                            @if($teacher->photo)
                                <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>
                            @endif
                        </div>
                        
                        <h2 class="text-lg font-bold text-slate-900 mb-1 leading-tight group-hover:text-red-600 transition-colors">{{ $teacher->name }}</h2>
                        <p class="text-sm font-semibold text-red-600 mb-3">{{ $teacher->position ?? 'Tenaga Pendidik' }}</p>
                        
                        @if($teacher->nip)
                            <p class="text-xs text-slate-500 font-mono tracking-wider">NIP. {{ $teacher->nip }}</p>
                        @endif
                        
                        @if($teacher->phone)
                            <!-- Fitur phone sengaja di-hide secara publik untuk privasi, bisa ditambahkan jika perlu -->
                        @endif
                    </div>
                @empty
                    <div class="col-span-full py-16">
                        <x-empty-state title="Belum Ada Data Guru" message="Data tenaga pendidik belum ditambahkan saat ini." icon="document" />
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>

