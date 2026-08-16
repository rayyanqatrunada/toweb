<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md max-w-4xl mx-auto overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/3 bg-gray-50 border-r flex flex-col items-center py-10 px-6">
                    @if($alumni->photo)
                        <img src="{{ Storage::url($alumni->photo) }}" alt="{{ $alumni->name }}" class="w-48 h-48 rounded-full object-cover mb-6 border-4 border-white shadow-lg">
                    @else
                        <div class="w-48 h-48 rounded-full bg-gray-200 mb-6 flex items-center justify-center text-gray-400 border-4 border-white shadow-lg">
                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                    @endif
                    
                    <h1 class="text-2xl font-bold text-center mb-1">{{ $alumni->name }}</h1>
                    <p class="text-red-600 font-semibold mb-4 text-center">Lulusan Tahun {{ $alumni->graduation_year }}</p>
                    
                    <div class="w-full mt-4 space-y-3">
                        @if($alumni->city)
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $alumni->city }}
                        </div>
                        @endif
                        
                        @if($alumni->phone && $alumni->is_public) <!-- Ensure phone is shown only if meant to be public, actually better hide phone for alumni -->
                        @endif
                        
                        @if($alumni->email && $alumni->is_public)
                        @endif
                        
                        @if($alumni->social_media)
                        <div class="flex flex-wrap gap-2 mt-4 justify-center">
                            @foreach($alumni->social_media as $platform => $url)
                                @if($url)
                                <a href="{{ $url }}" target="_blank" class="text-blue-500 hover:text-blue-700 capitalize text-sm">{{ $platform }}</a>
                                @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="md:w-2/3 p-8">
                    @if($alumni->occupation || $alumni->company)
                    <div class="bg-red-50 rounded-lg p-5 mb-8 border border-blue-100">
                        <h3 class="text-xs uppercase font-bold text-red-800 tracking-wider mb-2">Pekerjaan Saat Ini</h3>
                        <p class="text-lg">
                            <span class="font-semibold text-gray-900">{{ $alumni->occupation ?? 'Bekerja' }}</span>
                            @if($alumni->company)
                                <span class="text-gray-600"> di </span>
                                <span class="font-semibold text-gray-900">{{ $alumni->company }}</span>
                            @endif
                        </p>
                    </div>
                    @endif
                    
                    @if($alumni->education)
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-3 border-b pb-2">Riwayat Pendidikan</h3>
                        <div class="prose max-w-none text-gray-700">
                            {!! nl2br(e($alumni->education)) !!}
                        </div>
                    </div>
                    @endif
                    
                    @if($alumni->bio)
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-3 border-b pb-2">Biografi Singkat</h3>
                        <div class="prose max-w-none text-gray-700">
                            {!! $alumni->bio !!}
                        </div>
                    </div>
                    @endif
                    
                    @if($alumni->achievements)
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-3 border-b pb-2">Pencapaian</h3>
                        <div class="prose max-w-none text-gray-700">
                            {!! $alumni->achievements !!}
                        </div>
                    </div>
                    @endif
                    
                    <div class="mt-8 pt-4">
                        <a href="{{ route('alumni.index') }}" class="text-red-600 hover:underline">&larr; Kembali ke Jejaring Alumni</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
