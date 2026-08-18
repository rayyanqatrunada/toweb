<nav x-data="{ mobileMenuOpen: false }" x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''" class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-18">
            <!-- Logo Section -->
            <a href="{{ route('home') ?? '/' }}" class="flex-shrink-0 flex items-center gap-3">
                <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center text-white font-extrabold text-lg shadow-inner shadow-white/20">TO</div>
                <span class="font-bold text-xl text-slate-900 tracking-tight hidden sm:block">{{ $settings->get('site_name', 'Teknik Otomotif') }}</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex md:items-center md:space-x-8">
                <a href="{{ route('home') ?? '/' }}" class="px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 {{ request()->routeIs('home') ? 'border-red-600 text-red-600' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300' }}">Beranda</a>
                
                <!-- Profil Dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 text-sm font-medium transition duration-150" :aria-expanded="open.toString()">
                        Profil
                        <svg class="ml-1 h-4 w-4 text-slate-400 group-hover:text-slate-500 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="absolute z-50 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
                        <div class="py-1">
                            <a href="{{ route('about') ?? '/profil' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Tentang Jurusan</a>
                            <a href="{{ route('academic.teachers') ?? '/guru' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Guru & Staf</a>
                            <a href="{{ route('academic.facilities') ?? '/fasilitas' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Fasilitas</a>
                        </div>
                    </div>
                </div>

                <!-- Akademik Dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 text-sm font-medium transition duration-150" :aria-expanded="open.toString()">
                        Akademik
                        <svg class="ml-1 h-4 w-4 text-slate-400 group-hover:text-slate-500 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div x-show="open" x-transition class="absolute z-50 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                        <div class="py-1">
                            <a href="{{ route('academic.programs') ?? '/akademik/program' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Program & Kompetensi</a>
                            <a href="{{ url('/akademik/kurikulum') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Kurikulum</a>
                        </div>
                    </div>
                </div>

                <!-- Karier & Mitra Dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 text-sm font-medium transition duration-150" :aria-expanded="open.toString()">
                        Karier & Mitra
                        <svg class="ml-1 h-4 w-4 text-slate-400 group-hover:text-slate-500 transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div x-show="open" x-transition class="absolute z-50 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                        <div class="py-1">
                            <a href="{{ route('internships.index') ?? '/pkl' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Praktik Kerja Lapangan</a>
                            <a href="{{ route('partnership.index') ?? '/kemitraan' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Mitra Industri</a>
                            <a href="{{ route('jobs.index') ?? '/bursa-kerja' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Lowongan Kerja</a>
                            <a href="{{ route('alumni.index') ?? '/alumni' }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-red-600">Alumni</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-2 sm:space-x-4">
                <!-- Search Icon (Membuka Modal) -->
                <button type="button" @click="$dispatch('open-search')" class="text-slate-500 hover:text-red-600 hover:bg-red-50 p-2 min-w-[44px] min-h-[44px] flex items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                    <span class="sr-only">Search</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>

                <!-- CTA Admin -->
                <a href="/admin" class="hidden sm:inline-flex text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2 text-center transition-colors shadow-sm focus:outline-none focus:ring-4 focus:ring-red-300">Masuk Portal</a>
                
                <!-- Mobile Menu Button -->
                <div class="flex items-center lg:hidden">
                    <button type="button" aria-controls="mobile-menu" :aria-expanded="mobileMenuOpen.toString()" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 min-w-[44px] min-h-[44px] rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger -->
                        <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <!-- Close -->
                        <svg x-show="mobileMenuOpen" class="hidden h-6 w-6" :class="{'hidden': !mobileMenuOpen, 'block': mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" x-show="mobileMenuOpen" x-transition class="lg:hidden bg-white border-t border-slate-100 shadow-xl" style="display: none;">
        <div class="px-4 pt-2 pb-6 space-y-1 overflow-y-auto max-h-[calc(100vh-64px)]">
            <a href="{{ route('home') ?? '/' }}" class="block px-3 py-3 rounded-md text-base font-semibold text-red-600 bg-red-50">Beranda</a>
            
            <!-- Accordion Mobile Menu -->
            <div x-data="{ expanded: false }">
                <button @click="expanded = !expanded" class="w-full flex justify-between items-center px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors">
                    <span>Profil Jurusan</span>
                    <svg class="h-5 w-5 transform transition-transform" :class="{'rotate-180': expanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="expanded" class="pl-6 pr-3 py-2 space-y-2 bg-slate-50/50 rounded-md">
                    <a href="{{ route('about') ?? '/profil' }}" class="block text-sm text-slate-600 hover:text-red-600 py-2">Tentang Kami</a>
                    <a href="{{ route('academic.teachers') ?? '/guru' }}" class="block text-sm text-slate-600 hover:text-red-600 py-2">Guru & Staf</a>
                    <a href="{{ route('academic.facilities') ?? '/fasilitas' }}" class="block text-sm text-slate-600 hover:text-red-600 py-2">Fasilitas</a>
                </div>
            </div>
            
            <a href="/admin" class="block w-full text-center mt-4 px-3 py-3 rounded-md text-base font-semibold text-white bg-slate-900 hover:bg-slate-800 transition-colors">Login Portal Admin</a>
        </div>
    </div>
</nav>

<!-- Global Search Modal (Alpine.js) dipisah namun tetap masuk dalam flow -->
<x-global-search-modal />
