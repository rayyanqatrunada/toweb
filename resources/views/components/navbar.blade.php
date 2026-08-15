<nav class="fixed w-full z-50 top-0 start-0 bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm transition-all duration-300">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <!-- Icon placeholder or logo -->
            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-inner shadow-white/20">TO</div>
            <span class="self-center text-2xl font-bold whitespace-nowrap text-slate-900 tracking-tight">Teknik Otomotif</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="/admin" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors shadow-md shadow-blue-500/30">Portal Admin</a>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-slate-500 rounded-lg md:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-slate-100 rounded-lg bg-slate-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-slate-900 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="block py-2 px-3 text-slate-900 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors {{ request()->routeIs('about') ? 'text-blue-600 font-semibold' : '' }}">Profil & Akademik</a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}" class="block py-2 px-3 text-slate-900 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors {{ request()->routeIs('news.*') ? 'text-blue-600 font-semibold' : '' }}">Berita</a>
                </li>
                <li>
                    <a href="{{ route('gallery.index') }}" class="block py-2 px-3 text-slate-900 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors {{ request()->routeIs('gallery.*') ? 'text-blue-600 font-semibold' : '' }}">Galeri & Prestasi</a>
                </li>
                <li>
                    <a href="{{ route('partnership.index') }}" class="block py-2 px-3 text-slate-900 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors {{ request()->routeIs('partnership.*') ? 'text-blue-600 font-semibold' : '' }}">Kemitraan & BKK</a>
                </li>
                <li>
                    <a href="{{ route('download.index') }}" class="block py-2 px-3 text-slate-900 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 transition-colors {{ request()->routeIs('download.*') ? 'text-blue-600 font-semibold' : '' }}">Unduhan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.querySelector('[data-collapse-toggle="navbar-sticky"]');
        const menu = document.getElementById('navbar-sticky');
        
        if(toggleBtn && menu) {
            toggleBtn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });
        }
    });
</script>
