<x-layouts.app 
    :title="$announcement->title"
    :description="Str::limit(strip_tags($announcement->content), 150)"
    :canonical="route('announcements.show', $announcement->slug)"
>
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <span class="inline-block py-1 px-3 bg-red-500/20 text-red-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-red-500/30">
                Agenda & Pengumuman
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $announcement->title }}</h1>
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Admin
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Diumumkan: {{ $announcement->created_at->translatedFormat('d F Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Pengumuman' => route('announcements.index'),
        Str::limit($announcement->title, 30) => '#'
    ]" />

    <article class="bg-white py-16 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="prose prose-lg prose-slate max-w-none prose-a:text-red-600 hover:prose-a:text-red-700 prose-img:rounded-xl">
                {!! \App\Support\HtmlSanitizer::clean($announcement->content) !!}
            </div>

            @if($announcement->file_attachment)
                <div class="mt-16 pt-8 border-t border-slate-100">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                        Lampiran Dokumen
                    </h3>
                    <a href="{{ Storage::url($announcement->file_attachment) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-red-50 text-red-700 font-bold rounded-xl hover:bg-red-100 transition-colors border border-red-100 group">
                        <svg class="w-5 h-5 mr-2 text-red-500 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh Berkas Lampiran
                    </a>
                </div>
            @endif

            <div class="mt-16 text-center border-t border-slate-100 pt-12">
                <a href="{{ route('announcements.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Pengumuman
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>
