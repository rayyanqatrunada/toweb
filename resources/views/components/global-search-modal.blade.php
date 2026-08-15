<!-- Global Search Modal (Alpine.js) -->
<div 
    x-data="{ isSearchOpen: false, searchQuery: '' }" 
    @open-search.window="isSearchOpen = true; $nextTick(() => { $refs.searchInput.focus() })"
    @keydown.escape.window="isSearchOpen = false"
>
    <!-- Overlay & Modal Container -->
    <div 
        x-show="isSearchOpen" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-[100] overflow-y-auto bg-slate-900/90 backdrop-blur-sm p-4 sm:p-6 md:p-20"
        style="display: none;"
    >
        <!-- Modal Box -->
        <div class="mx-auto max-w-3xl transform divide-y divide-slate-100 overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-black/5 transition-all" @click.outside="isSearchOpen = false">
            
            <!-- Area Input Form -->
            <form action="{{ route('search.index') ?? '/search' }}" method="GET" class="relative">
                <svg class="pointer-events-none absolute left-4 top-4 h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                
                <input 
                    type="search" 
                    name="q"
                    x-model="searchQuery"
                    x-ref="searchInput"
                    class="h-14 w-full border-0 bg-transparent pl-12 pr-12 text-slate-900 focus:ring-0 sm:text-lg outline-none placeholder-slate-400 font-medium"
                    placeholder="Ketik kata kunci pencarian..." 
                    autocomplete="off"
                >
                
                <!-- Tombol Close (Mobile & Desktop) -->
                <button type="button" @click="isSearchOpen = false" class="absolute right-3 top-3 p-1 rounded-md text-slate-400 hover:text-red-500 hover:bg-red-50 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </form>

            <!-- Quick Suggestions (Tampil Jika Input Kosong) -->
            <div x-show="searchQuery.length === 0" class="px-6 py-6 sm:px-8 bg-slate-50">
                <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-3">Pencarian Populer</h2>
                <div class="flex flex-wrap gap-2">
                    <button type="button" @click="searchQuery = 'Prestasi'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Prestasi</button>
                    <button type="button" @click="searchQuery = 'Fasilitas'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Fasilitas Bengkel</button>
                    <button type="button" @click="searchQuery = 'Alumni'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Data Alumni</button>
                    <button type="button" @click="searchQuery = 'PKL'; $refs.searchInput.focus()" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">Lokasi PKL</button>
                </div>
            </div>

            <!-- Petunjuk Keyboard Aksesibilitas (Hanya Desktop) -->
            <div class="hidden sm:flex px-6 py-4 border-t border-slate-100 bg-slate-50 text-xs text-slate-400 items-center justify-between">
                <span>Tekan <kbd class="font-sans font-semibold border border-slate-300 rounded px-1.5 py-0.5 shadow-sm text-slate-500 bg-white">Enter</kbd> untuk mencari ke seluruh sistem.</span>
                <span>Tekan <kbd class="font-sans font-semibold border border-slate-300 rounded px-1.5 py-0.5 shadow-sm text-slate-500 bg-white">Esc</kbd> untuk menutup.</span>
            </div>
        </div>
    </div>
</div>
