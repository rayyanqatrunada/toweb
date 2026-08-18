<x-layouts.app title="Pengumuman">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Pengumuman & Agenda</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Informasi resmi, jadwal kegiatan, dan agenda penting seputar kegiatan akademik jurusan.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Pengumuman' => route('announcements.index')]" />

    <section class="py-16 bg-slate-50 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse($announcements as $announcement)
                    <a href="{{ route('announcements.show', $announcement->slug) }}" class="flex flex-col sm:flex-row bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group focus-visible:ring-4 focus-visible:ring-red-500 focus:outline-none hover:-translate-y-1">
                        <div class="bg-red-50 text-red-700 px-6 py-4 flex flex-col items-center justify-center border-b sm:border-b-0 sm:border-r border-slate-100 min-w-[120px]">
                            <span class="text-sm font-bold uppercase tracking-widest">{{ $announcement->created_at->translatedFormat('M') }}</span>
                            <span class="text-4xl font-extrabold leading-none my-1">{{ $announcement->created_at->format('d') }}</span>
                            <span class="text-xs font-semibold text-red-500">{{ $announcement->created_at->format('Y') }}</span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-center">
                            <h2 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors">
                                {{ $announcement->title }}
                            </h2>
                            <p class="text-slate-600 text-sm mb-4 line-clamp-2">
                                {{ Str::limit(strip_tags($announcement->content), 150) }}
                            </p>
                            <div class="flex items-center text-xs text-slate-500 mt-auto">
                                <span class="flex items-center bg-slate-100 px-3 py-1 rounded-full">
                                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> 
                                    Diumumkan {{ $announcement->created_at->diffForHumans() }}
                                </span>
                                @if($announcement->file_attachment)
                                <span class="flex items-center text-blue-600 bg-blue-50 px-3 py-1 rounded-full ml-3">
                                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg> 
                                    Ada Lampiran
                                </span>
                                @endif
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="py-10">
                        <x-empty-state title="Belum Ada Pengumuman" message="Pengumuman atau agenda belum tersedia saat ini." icon="calendar" />
                    </div>
                @endforelse
            </div>
            
            @if($announcements->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $announcements->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

