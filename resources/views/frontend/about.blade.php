<x-layouts.app title="Profil Jurusan">
    <!-- Header Page -->
    <div class="bg-slate-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Profil Jurusan</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Mengenal lebih dekat sejarah, visi, dan misi Teknik Otomotif.</p>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="['Profil' => route('about')]" />

    <!-- Sejarah Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-frontend.section-header 
                eyebrow="Sejarah"
                title="Sejarah Singkat Jurusan"
                alignment="left"
            />
            
            <div class="prose prose-slate prose-lg max-w-none prose-a:text-red-600 hover:prose-a:text-red-500">
                {!! \App\Support\HtmlSanitizer::clean($settings->get('profile_history', '<p>Sejarah singkat jurusan Teknik Otomotif bermula dari dedikasi kami untuk mencetak tenaga kerja profesional...</p>')) !!}
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16">
                <!-- Visi -->
                <div class="bg-white p-8 md:p-10 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 text-slate-100 pointer-events-none">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900 mb-4">Visi Kami</h2>
                        <div class="text-lg text-slate-600 leading-relaxed font-medium italic">
                            "{!! strip_tags($settings->get('profile_vision', 'Menjadi program studi otomotif terdepan di tingkat nasional.')) !!}"
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="bg-white p-8 md:p-10 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 text-slate-100 pointer-events-none">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900 mb-4">Misi Kami</h2>
                        <div class="prose prose-slate prose-li:marker:text-red-600">
                            {!! \App\Support\HtmlSanitizer::clean($settings->get('profile_mission', '<ul><li>Menyelenggarakan pendidikan berkualitas...</li></ul>')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links to Fasilitas & Guru -->
    <section class="py-16 bg-slate-900 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-8">Kenali Kami Lebih Dekat</h2>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ route('academic.teachers') }}" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Lihat Tenaga Pendidik
                </a>
                <a href="{{ route('academic.facilities') }}" class="px-8 py-4 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-lg transition-colors border border-slate-700 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    Lihat Fasilitas
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>

