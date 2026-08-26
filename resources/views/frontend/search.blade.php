<x-layouts.app title="Pencarian Global" robots="noindex, follow">
    <div class="bg-charcoal-50 py-16 lg:py-24 border-b border-charcoal-200">
        <div class="max-w-screen-xl mx-auto px-4 text-center reveal-on-scroll reveal-up">
            <h1 class="text-3xl md:text-5xl font-bold text-charcoal-900 mb-4">Pencarian Global</h1>
            <p class="text-charcoal-600 text-lg max-w-2xl mx-auto">Temukan informasi seputar jurusan Teknik dan Bisnis Sepeda Motor (TBSM).</p>
            <form action="{{ route('search') }}" method="GET" class="mt-8 max-w-xl mx-auto relative reveal-on-scroll reveal-up delay-100">
                <input type="text" name="q" value="{{ $q }}" placeholder="Ketik kata kunci pencarian..." class="w-full px-6 py-4 rounded-full text-charcoal-800 bg-white border border-charcoal-200 focus:outline-none focus:ring-4 focus:ring-primary-100 shadow-sm text-lg">
                <button type="submit" class="absolute right-2 top-2 bottom-2 bg-primary-600 text-white px-6 rounded-full font-semibold hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300 transition">Cari</button>
            </form>
        </div>
    </div>

    <section class="bg-white min-h-[50vh] pt-12 pb-20 lg:pt-16 lg:pb-24">
        <div class="max-w-screen-md mx-auto px-4 reveal-on-scroll reveal-up">
            @if(empty($q))
                <div class="text-center py-20">
                    <h3 class="text-xl font-bold text-charcoal-800 mb-2">Mulai Pencarian</h3>
                    <p class="text-charcoal-500">Silakan masukkan kata kunci pada kotak pencarian di atas.</p>
                </div>
            @elseif($totalResults === 0)
                <div class="text-center py-20 bg-charcoal-50 rounded-3xl shadow-sm border border-charcoal-200">
                    <svg class="w-16 h-16 text-charcoal-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <h3 class="text-xl font-bold text-charcoal-800 mb-2">Pencarian tidak menemukan hasil</h3>
                    <p class="text-charcoal-500">Tidak ada data yang cocok dengan kata kunci <strong>"{{ $q }}"</strong>.</p>
                </div>
            @else
                <div class="mb-8">
                    <h2 class="text-lg font-medium text-charcoal-600">Menemukan {{ $totalResults }} hasil untuk <strong>"{{ $q }}"</strong></h2>
                </div>

                <div class="space-y-12">
                    @foreach($results as $groupName => $items)
                        @if(count($items) > 0)
                            <div class="bg-white rounded-3xl shadow-sm border border-charcoal-200 overflow-hidden reveal-on-scroll reveal-up delay-{{ $loop->iteration * 100 }}">
                                <div class="bg-charcoal-50 px-6 py-4 border-b border-charcoal-200">
                                    <h3 class="font-bold text-charcoal-900">{{ $groupName }} <span class="ml-2 bg-primary-100 text-primary-700 text-xs py-1 px-2 rounded-full">{{ count($items) }}</span></h3>
                                </div>
                                <div class="divide-y divide-charcoal-100">
                                    @foreach($items as $item)
                                        <a href="{{ $item->url }}" class="block p-6 hover:bg-charcoal-50 transition-colors group">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="text-lg font-semibold text-charcoal-900 group-hover:text-primary-600 transition-colors">{{ $item->title }}</h4>
                                                @if($item->date)
                                                    <span class="text-xs font-medium text-charcoal-500 bg-charcoal-100 px-2 py-1 rounded">{{ $item->date }}</span>
                                                @endif
                                            </div>
                                            @if($item->excerpt)
                                                <p class="text-charcoal-600 text-sm line-clamp-2">{{ $item->excerpt }}</p>
                                            @endif
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>



