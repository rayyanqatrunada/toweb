<x-layouts.app 
    :title="$announcement->title"
    :description="Str::limit(strip_tags($announcement->content), 150)"
    :canonical="route('announcements.show', $announcement->slug)"
>
    <!-- Header Page -->
    <div class="bg-charcoal-50 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-200">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-4xl mx-auto reveal-on-scroll reveal-up">
            <div class="flex justify-center mb-6">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black tracking-widest uppercase bg-primary-100 text-primary-700 border border-primary-200">
                    AGENDA & PENGUMUMAN
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-charcoal-900 mb-8 leading-[1.15] tracking-tight">{{ $announcement->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-600 text-sm gap-y-4 gap-x-6 md:gap-x-8 mt-6">
                <div class="flex items-center font-bold bg-white px-4 py-2 rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-5 h-5 mr-2 opacity-70 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Diterbitkan oleh Admin
                </div>
                <div class="flex items-center font-bold bg-white px-4 py-2 rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-5 h-5 mr-2 opacity-70 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $announcement->created_at->translatedFormat('d F Y - H:i') }}
                </div>
            </div>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-white border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="[
                'Pengumuman' => route('announcements.index'),
                Str::limit($announcement->title, 40) => '#'
            ]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="[
            'Pengumuman' => route('announcements.index'),
            Str::limit($announcement->title, 20) => '#'
        ]" />
    </div>

    <article class="bg-white py-12 lg:py-20 min-h-[50vh] reveal-on-scroll reveal-up">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Announcement Content -->
            <div class="prose prose-lg md:prose-xl prose-charcoal max-w-none prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-p:leading-relaxed prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-img:rounded-3xl prose-img:shadow-md">
                {!! \App\Support\HtmlSanitizer::clean($announcement->content) !!}
            </div>

            <!-- Attachment Section -->
            @if($announcement->file_attachment)
                <div class="mt-16 pt-10 border-t-2 border-dashed border-charcoal-200">
                    <div class="bg-charcoal-50 border border-charcoal-200 rounded-3xl p-6 lg:p-8 flex flex-col sm:flex-row items-center sm:items-start sm:justify-between gap-6">
                        <div class="flex items-start text-center sm:text-left">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center border border-charcoal-200 shadow-sm shrink-0 mr-0 sm:mr-5 mb-4 sm:mb-0 mx-auto sm:mx-0">
                                <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-charcoal-900 mb-1">Lampiran Dokumen Resmi</h3>
                                <p class="text-sm text-charcoal-500">Terdapat dokumen lampiran yang menyertai pengumuman ini. Silakan unduh untuk informasi lebih lanjut.</p>
                            </div>
                        </div>
                        <a href="{{ Storage::url($announcement->file_attachment) }}" target="_blank" class="shrink-0 inline-flex items-center px-6 py-3 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 transition-colors shadow-sm focus:ring-4 focus:ring-primary-100 group w-full sm:w-auto justify-center">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Unduh Lampiran
                        </a>
                    </div>
                </div>
            @endif

            <div class="mt-16 text-center border-t border-charcoal-100 pt-12">
                <x-frontend.ui.button href="{{ route('announcements.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Pengumuman
                </x-frontend.ui.button>
            </div>
            
        </div>
    </article>
</x-layouts.app>
