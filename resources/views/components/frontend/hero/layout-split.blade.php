@props([
    'headline',
    'description',
    'imageUrl' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?auto=format&fit=crop&w=800&q=80',
    'eyebrowText' => 'JURUSAN TEKNIK OTOMOTIF',
    'stats' => null
])

<section class="relative bg-slate-50 overflow-hidden pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            
            <!-- Text Content -->
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left flex flex-col justify-center">
                
                <x-frontend.hero.eyebrow class="text-red-600 mb-3">
                    {{ $eyebrowText }}
                </x-frontend.hero.eyebrow>
                
                <x-frontend.hero.title class="text-slate-900 mb-5 leading-tight">
                    {{ $headline }}
                </x-frontend.hero.title>
                
                <x-frontend.hero.description class="text-slate-600 mb-8">
                    {{ $description }}
                </x-frontend.hero.description>
                
                <x-frontend.hero.cta-group class="sm:justify-center lg:justify-start">
                    <a href="#about" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-md text-white bg-red-600 hover:bg-red-700 md:text-lg transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Jelajahi Jurusan
                    </a>
                    <a href="{{ route('academic.programs') ?? '/akademik/program' }}" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-semibold rounded-md text-slate-700 bg-white hover:bg-slate-50 hover:text-slate-900 md:text-lg transition-all shadow-sm hover:shadow">
                        Lihat Program Keahlian
                    </a>
                </x-frontend.hero.cta-group>
                
                <!-- Stats Row -->
                @if($stats)
                <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 gap-6 pt-8 border-t border-slate-200 reveal-on-scroll reveal-up delay-400">
                    @foreach($stats as $stat)
                    <div>
                        <p class="text-3xl font-bold text-slate-900">{{ $stat['value'] }}</p>
                        <p class="text-sm font-medium text-slate-500 mt-1 uppercase tracking-wider">{{ $stat['label'] }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
                
            </div>
            
            <!-- Image Content -->
            <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center reveal-on-scroll reveal-fade delay-200">
                <div class="relative mx-auto w-full rounded-xl shadow-2xl lg:max-w-md overflow-hidden bg-slate-200 aspect-[4/3] sm:aspect-square lg:aspect-[3/4]">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" src="{{ $imageUrl }}" alt="Siswa praktik di workshop otomotif">
                    <!-- Subtle overlay to make it look industrial -->
                    <div class="absolute inset-0 bg-slate-900/10 mix-blend-multiply"></div>
                </div>
            </div>
            
        </div>
    </div>
</section>
