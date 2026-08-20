<x-layouts.app title="Pengumuman & Agenda">
    <!-- Hero Section -->
    <div class="bg-charcoal-950 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-800">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <x-frontend.ui.eyebrow class="text-primary-400 mb-4 justify-center">Informasi Resmi Institusi</x-frontend.ui.eyebrow>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">Pengumuman & Agenda</h1>
                <p class="text-charcoal-300 text-lg lg:text-xl leading-relaxed">
                    Pusat informasi resmi, jadwal kegiatan akademik, dan agenda penting jurusan.
                </p>
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-charcoal-50 border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Pengumuman & Agenda' => route('announcements.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Pengumuman' => route('announcements.index')]" />
    </div>

    <section class="bg-white min-h-[50vh] lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <x-frontend.layout.container class="max-w-4xl">
            <div class="space-y-6">
                @forelse($announcements as $announcement)
                    <a href="{{ route('announcements.show', $announcement->slug) }}" class="flex flex-col sm:flex-row bg-white rounded-2xl border border-charcoal-100 shadow-sm hover:shadow-xl hover:shadow-primary-900/5 transition-all duration-300 overflow-hidden group focus-visible:ring-4 focus-visible:ring-primary-500 focus:outline-none hover:-translate-y-1">
                        <!-- Date Block -->
                        <div class="bg-charcoal-50 group-hover:bg-primary-50 px-6 py-6 flex flex-col items-center justify-center border-b sm:border-b-0 sm:border-r border-charcoal-100 min-w-[140px] transition-colors duration-300">
                            <span class="text-sm font-bold uppercase tracking-widest text-charcoal-500 group-hover:text-primary-600 transition-colors">{{ $announcement->created_at->translatedFormat('M') }}</span>
                            <span class="text-4xl lg:text-5xl font-black leading-none my-1 text-charcoal-900 group-hover:text-primary-600 transition-colors">{{ $announcement->created_at->format('d') }}</span>
                            <span class="text-xs font-bold text-charcoal-400 group-hover:text-primary-400 transition-colors">{{ $announcement->created_at->format('Y') }}</span>
                        </div>
                        
                        <!-- Content Block -->
                        <div class="p-6 lg:p-8 flex-1 flex flex-col justify-center relative">
                            <!-- New Badge (Optional logic if needed, e.g. < 7 days) -->
                            @if($announcement->created_at->diffInDays(now()) < 7)
                                <span class="absolute top-6 right-6 flex h-3 w-3">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-500"></span>
                                </span>
                            @endif

                            <h2 class="text-xl lg:text-2xl font-bold text-charcoal-900 mb-3 group-hover:text-primary-600 transition-colors leading-tight pr-6">
                                {{ $announcement->title }}
                            </h2>
                            <p class="text-charcoal-600 text-sm lg:text-base mb-6 line-clamp-2 leading-relaxed">
                                {{ Str::limit(strip_tags($announcement->content), 180) }}
                            </p>
                            <div class="flex flex-wrap items-center text-xs font-medium mt-auto gap-3">
                                <span class="flex items-center text-charcoal-500 bg-charcoal-50 border border-charcoal-100 px-3 py-1.5 rounded-lg">
                                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> 
                                    {{ $announcement->created_at->diffForHumans() }}
                                </span>
                                @if($announcement->file_attachment)
                                <span class="flex items-center text-primary-700 bg-primary-50 border border-primary-100 px-3 py-1.5 rounded-lg">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg> 
                                    Ada Lampiran
                                </span>
                                @endif
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="py-16">
                        <x-frontend.ui.empty-state 
                            title="Belum Ada Pengumuman" 
                            message="Belum ada informasi resmi atau agenda yang dipublikasikan saat ini. Silakan periksa kembali nanti." 
                            icon="calendar" 
                        />
                    </div>
                @endforelse
            </div>
            
            @if($announcements->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $announcements->links() }}
                </div>
            @endif
        </x-frontend.layout.container>
    </section>
</x-layouts.app>



