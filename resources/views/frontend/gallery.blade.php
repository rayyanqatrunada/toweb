<x-layouts.app title="Galeri & Prestasi">
    <div class="bg-slate-900 py-16 lg:py-24">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Galeri Kegiatan</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">Dokumentasi momen kegiatan belajar mengajar, event jurusan, dan prestasi siswa.</p>
        </div>
    </div>

    <section class="py-16 bg-white min-h-[50vh]">
        <div class="max-w-screen-xl mx-auto px-4">
            
            <div class="space-y-16">
                @forelse($albums as $album)
                    <div>
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-900">{{ $album->title }}</h2>
                            @if($album->description)
                                <p class="text-slate-500 mt-2">{{ $album->description }}</p>
                            @endif
                        </div>

                        @if($album->items && $album->items->count() > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach($album->items as $item)
                                    <div class="group relative rounded-xl overflow-hidden aspect-square bg-slate-100 cursor-pointer">
                                        <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->caption ?? $album->title }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500" loading="lazy">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                            @if($item->caption)
                                                <p class="text-white text-sm font-medium">{{ $item->caption }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-slate-500 italic p-6 bg-slate-50 rounded-lg border border-slate-100 text-sm">
                                Album ini belum memiliki foto.
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Belum Ada Galeri</h3>
                        <p class="text-slate-500 max-w-md mx-auto">Album foto dan dokumentasi kegiatan belum dipublikasikan.</p>
                    </div>
                @endforelse
            </div>

            @if($albums->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $albums->links() }}
                </div>
            @endif

        </div>
    </section>
</x-layouts.app>
