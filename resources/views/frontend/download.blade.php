<x-layouts.app title="Pusat Unduhan">
    <!-- Hero Section -->
    <div class="bg-charcoal-50 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-200 lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <x-frontend.layout.container class="relative z-10 text-center max-w-3xl mx-auto reveal-on-scroll reveal-up">
            <x-frontend.ui.eyebrow class="text-primary-600 mb-4 justify-center">Resource Library</x-frontend.ui.eyebrow>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-charcoal-900 mb-6 leading-tight tracking-tight">Pusat Unduhan</h1>
            <p class="text-charcoal-600 text-lg lg:text-xl leading-relaxed">
                Akses cepat ke berbagai dokumen akademik, modul materi pembelajaran, dan formulir pendaftaran.
            </p>
        </x-frontend.layout.container>
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-white border-b border-charcoal-100 hidden md:block">
        <x-frontend.layout.container>
            <x-frontend.breadcrumbs :items="['Pusat Unduhan' => route('download.index')]" class="py-4" />
        </x-frontend.layout.container>
    </div>
    
    <div class="md:hidden">
        <x-frontend.breadcrumbs :items="['Unduhan' => route('download.index')]" />
    </div>

    <section class="bg-white min-h-[50vh] pt-12 pb-20 lg:pt-16 lg:pb-24">
        <x-frontend.layout.container class="max-w-5xl reveal-on-scroll reveal-up">
            
            <div class="bg-white border border-charcoal-200 rounded-3xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-charcoal-600">
                        <thead class="bg-charcoal-50 text-xs text-charcoal-500 uppercase tracking-widest font-black border-b border-charcoal-200">
                            <tr>
                                <th scope="col" class="px-6 py-5 whitespace-nowrap">Nama Dokumen</th>
                                <th scope="col" class="px-6 py-5 whitespace-nowrap">Kategori</th>
                                <th scope="col" class="px-6 py-5 whitespace-nowrap">Tgl Diunggah</th>
                                <th scope="col" class="px-6 py-5 text-right whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-charcoal-100">
                            @forelse($downloads as $doc)
                                <tr class="bg-white hover:bg-charcoal-50/50 transition-colors group">
                                    <td class="px-6 py-5 align-top lg:align-middle">
                                        <div class="flex items-start lg:items-center">
                                            <div class="w-10 h-10 rounded-lg bg-primary-50 text-primary-600 flex items-center justify-center mr-4 shrink-0 group-hover:bg-primary-600 group-hover:text-white transition-colors border border-primary-100 group-hover:border-primary-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            </div>
                                            <div>
                                                <h3 class="text-base font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors leading-tight mb-1">
                                                    {{ $doc->title }}
                                                </h3>
                                                @if($doc->description)
                                                    <p class="text-xs text-charcoal-500 font-medium line-clamp-2 max-w-md">{{ $doc->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 align-top lg:align-middle">
                                        @if($doc->category)
                                            <span class="inline-flex items-center bg-charcoal-100 text-charcoal-700 border border-charcoal-200 px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                                                {{ $doc->category->name }}
                                            </span>
                                        @else
                                            <span class="text-charcoal-400 italic text-xs font-medium">Umum</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 align-top lg:align-middle text-charcoal-500 font-semibold whitespace-nowrap">
                                        {{ ($doc->published_at ?? $doc->created_at)?->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-5 align-top lg:align-middle text-right">
                                        <a href="{{ route('download.file', $doc->slug) }}" target="_blank" class="inline-flex items-center justify-center font-bold text-primary-600 hover:text-white bg-primary-50 hover:bg-primary-600 border border-primary-200 hover:border-primary-600 px-4 py-2 rounded-xl transition-all shadow-sm group-hover:shadow-md focus:ring-4 focus:ring-primary-100 whitespace-nowrap">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Unduh
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-16 text-center">
                                        <x-frontend.ui.empty-state 
                                            title="Belum Ada Unduhan" 
                                            message="Berkas, modul, maupun dokumen pendukung belum tersedia." 
                                            icon="document" 
                                        />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($downloads->hasPages())
                <div class="mt-8">
                    {{ $downloads->links() }}
                </div>
            @endif

        </x-frontend.layout.container>
    </section>
</x-layouts.app>



