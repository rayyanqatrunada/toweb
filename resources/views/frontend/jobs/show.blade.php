<x-layouts.app 
    :title="$job->title . ' - ' . ($job->industryPartner->name ?? 'BKK')"
    :description="Str::limit(strip_tags($job->description), 150)"
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
                Lowongan Pekerjaan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">{{ $job->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center text-slate-300 text-sm gap-4 md:gap-6 mt-6">
                <span class="flex items-center font-bold text-white">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    {{ $job->industryPartner->name ?? 'Perusahaan Rahasia' }}
                </span>
                @if($job->location)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $job->location }}
                </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <x-frontend.breadcrumbs :items="[
        'Lowongan Kerja' => route('jobs.index'),
        Str::limit($job->title, 30) => '#'
    ]" />

    <article class="bg-slate-50 py-16 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-12">
                <div class="bg-slate-50 p-6 sm:p-8 border-b border-slate-100">
                    <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left">
                        @if($job->industryPartner && $job->industryPartner->logo)
                            <div class="w-24 h-24 sm:w-32 sm:h-32 bg-white rounded-xl border border-slate-200 flex items-center justify-center p-2 shadow-sm shrink-0">
                                <img src="{{ Storage::url($job->industryPartner->logo) }}" alt="{{ $job->industryPartner->name }}" class="w-full h-full object-contain">
                            </div>
                        @endif
                        
                        <div class="flex-grow w-full">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-2">
                                <div class="bg-white p-4 rounded-xl border border-slate-100 text-center sm:text-left shadow-sm">
                                    <span class="block text-xs text-slate-500 uppercase tracking-wider font-bold mb-1">Tipe</span>
                                    <span class="text-slate-900 font-bold">{{ $job->employment_type ?? '-' }}</span>
                                </div>
                                <div class="bg-white p-4 rounded-xl border border-slate-100 text-center sm:text-left shadow-sm">
                                    <span class="block text-xs text-slate-500 uppercase tracking-wider font-bold mb-1">Gaji</span>
                                    <span class="text-slate-900 font-bold">{{ $job->salary_text ?? '-' }}</span>
                                </div>
                                <div class="bg-white p-4 rounded-xl border border-slate-100 text-center sm:text-left shadow-sm sm:col-span-2 lg:col-span-2">
                                    <span class="block text-xs text-slate-500 uppercase tracking-wider font-bold mb-1">Tenggat Waktu</span>
                                    <span class="{{ $job->application_deadline && $job->application_deadline->isPast() ? 'text-red-600' : 'text-slate-900' }} font-bold">
                                        {{ $job->application_deadline ? $job->application_deadline->translatedFormat('d F Y') : '-' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 sm:p-10">
                    @if($job->description)
                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Deskripsi Pekerjaan
                        </h2>
                        <div class="prose prose-slate max-w-none prose-a:text-red-600">{!! \App\Support\HtmlSanitizer::clean($job->description) !!}</div>
                    </div>
                    @endif
                    
                    @if($job->requirements)
                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Persyaratan
                        </h2>
                        <div class="prose prose-slate max-w-none prose-a:text-red-600">{!! \App\Support\HtmlSanitizer::clean($job->requirements) !!}</div>
                    </div>
                    @endif
                    
                    @if($job->responsibilities)
                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tanggung Jawab
                        </h2>
                        <div class="prose prose-slate max-w-none prose-a:text-red-600">{!! \App\Support\HtmlSanitizer::clean($job->responsibilities) !!}</div>
                    </div>
                    @endif
                    
                    <div class="bg-slate-50 border border-slate-200 p-8 rounded-2xl mt-12 text-center sm:text-left">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Tertarik Melamar?</h3>
                        <p class="text-slate-600 mb-6">Siapkan CV terbaikmu dan segera daftar sebelum tenggat waktu pendaftaran ditutup.</p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 items-center sm:justify-start">
                            @if($job->application_url)
                                <a href="{{ $job->application_url }}" target="_blank" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-sm focus:ring-4 focus:ring-red-200">
                                    Lamar via Website
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            @endif
                            @if($job->application_email)
                                <a href="mailto:{{ $job->application_email }}" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 bg-white text-slate-700 border border-slate-300 font-bold rounded-xl hover:bg-slate-50 transition-colors focus:ring-4 focus:ring-slate-100">
                                    <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    Kirim via Email
                                </a>
                            @endif
                            @if(!$job->application_url && !$job->application_email)
                                <p class="text-slate-600 italic bg-slate-100 px-4 py-2 rounded-lg border border-slate-200 inline-block w-full text-center">Hubungi Bursa Kerja Khusus (BKK) sekolah untuk pendaftaran.</p>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('jobs.index') }}" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl hover:bg-slate-50 hover:text-red-600 hover:border-red-200 transition-all focus:ring-4 focus:ring-slate-100 group">
                    <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-red-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Bursa Kerja Khusus
                </a>
            </div>
            
        </div>
    </article>
</x-layouts.app>
