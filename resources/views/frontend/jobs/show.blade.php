<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow max-w-4xl mx-auto overflow-hidden">
            <div class="bg-red-50 p-8 border-b">
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    @if($job->industryPartner && $job->industryPartner->logo)
                        <img src="{{ Storage::url($job->industryPartner->logo) }}" alt="{{ $job->industryPartner->name }}" class="w-32 h-32 object-contain rounded bg-white p-2 shadow-sm">
                    @endif
                    <div class="flex-grow">
                        <h1 class="text-3xl font-bold mb-2">{{ $job->title }}</h1>
                        <h2 class="text-xl text-blue-700 font-semibold mb-4">{{ $job->industryPartner->name ?? '-' }}</h2>
                        
                        <div class="grid grid-cols-2 gap-4">
                            @if($job->location)
                            <div><span class="text-xs text-gray-500 uppercase font-semibold">Lokasi</span><br/> <span class="font-medium">{{ $job->location }}</span></div>
                            @endif
                            @if($job->employment_type)
                            <div><span class="text-xs text-gray-500 uppercase font-semibold">Tipe Pekerjaan</span><br/> <span class="font-medium">{{ $job->employment_type }}</span></div>
                            @endif
                            @if($job->salary_text)
                            <div><span class="text-xs text-gray-500 uppercase font-semibold">Gaji</span><br/> <span class="font-medium">{{ $job->salary_text }}</span></div>
                            @endif
                            @if($job->application_deadline)
                            <div><span class="text-xs text-gray-500 uppercase font-semibold">Tenggat Waktu</span><br/> <span class="font-medium text-red-600">{{ $job->application_deadline->format('d M Y') }}</span></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="p-8">
                @if($job->description)
                <h3 class="text-xl font-bold mb-3 border-b pb-2">Deskripsi Pekerjaan</h3>
                <div class="prose max-w-none mb-8">{!! $job->description !!}</div>
                @endif
                
                @if($job->requirements)
                <h3 class="text-xl font-bold mb-3 border-b pb-2">Persyaratan</h3>
                <div class="prose max-w-none mb-8">{!! $job->requirements !!}</div>
                @endif
                
                @if($job->responsibilities)
                <h3 class="text-xl font-bold mb-3 border-b pb-2">Tanggung Jawab</h3>
                <div class="prose max-w-none mb-8">{!! $job->responsibilities !!}</div>
                @endif
                
                <div class="bg-gray-50 p-6 rounded-lg border mt-8">
                    <h3 class="text-lg font-bold mb-4">Cara Melamar</h3>
                    @if($job->application_url)
                        <a href="{{ $job->application_url }}" target="_blank" class="inline-block bg-red-600 text-white font-bold py-2 px-6 rounded hover:bg-red-700 mr-4">Lamar Sekarang (Web)</a>
                    @endif
                    @if($job->application_email)
                        <a href="mailto:{{ $job->application_email }}" class="inline-block bg-white text-red-600 border border-blue-600 font-bold py-2 px-6 rounded hover:bg-red-50">Kirim via Email</a>
                    @endif
                    @if(!$job->application_url && !$job->application_email)
                        <p class="text-gray-600">Hubungi Bursa Kerja Khusus (BKK) sekolah untuk informasi pendaftaran lebih lanjut.</p>
                    @endif
                </div>
                
                <div class="mt-8 pt-4">
                    <a href="{{ route('jobs.index') }}" class="text-red-600 hover:underline">&larr; Kembali ke Lowongan Kerja</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
