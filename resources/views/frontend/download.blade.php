<x-layouts.app title="Unduhan">
    <div class="bg-slate-900 py-16 lg:py-24">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Pusat Unduhan</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Dokumen akademik, modul materi, dan formulir pendaftaran yang dapat diunduh publik.</p>
        </div>
    </div>

    <section class="py-16 bg-slate-50 min-h-[50vh]">
        <div class="max-w-screen-xl mx-auto px-4">
            
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-500">
                        <thead class="bg-slate-50 text-xs text-slate-700 uppercase font-semibold border-b border-slate-200">
                            <tr>
                                <th scope="col" class="px-6 py-4">Nama Dokumen</th>
                                <th scope="col" class="px-6 py-4">Kategori</th>
                                <th scope="col" class="px-6 py-4">Tgl Diunggah</th>
                                <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($downloads as $doc)
                                <tr class="bg-white border-b border-slate-100 hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            {{ $doc->title }}
                                        </div>
                                        @if($doc->description)
                                            <p class="text-xs text-slate-500 mt-1 ml-7 font-normal">{{ $doc->description }}</p>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($doc->category)
                                            <span class="bg-slate-100 text-slate-700 px-2.5 py-0.5 rounded text-xs font-medium">{{ $doc->category->name }}</span>
                                        @else
                                            <span class="text-slate-400 italic">Umum</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $doc->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="inline-flex items-center justify-center font-medium text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition-colors">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Unduh
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                                        Tidak ada dokumen yang tersedia untuk diunduh saat ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</x-layouts.app>
