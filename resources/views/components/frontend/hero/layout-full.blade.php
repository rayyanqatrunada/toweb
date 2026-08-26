@props([
    'headline',
    'description',
    'imageUrl' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?auto=format&fit=crop&w=1920&q=80',
    'eyebrowText' => 'JURUSAN TEKNIK DAN BISNIS SEPEDA MOTOR',
    'stats' => null
])

<section class="relative bg-slate-900 min-h-[80vh] flex items-center overflow-hidden">
    <!-- Immersive Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $imageUrl }}" alt="Background TBSM" class="w-full h-full object-cover object-center opacity-40 mix-blend-overlay" fetchpriority="high" decoding="async">
        <!-- Gradient Overlay for Contrast -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20 lg:py-32">
        <div class="max-w-3xl">
            
            <x-frontend.hero.eyebrow class="text-red-500 mb-4">
                {{ $eyebrowText }}
            </x-frontend.hero.eyebrow>
            
            <x-frontend.hero.title class="text-white mb-6 leading-tight">
                {{ $headline }}
            </x-frontend.hero.title>
            
            <x-frontend.hero.description class="text-slate-300 mb-10 max-w-2xl">
                {{ $description }}
            </x-frontend.hero.description>
            
            <x-frontend.hero.cta-group>
                <a href="#about" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-md text-white bg-red-600 hover:bg-red-700 md:text-lg transition-all shadow-lg hover:shadow-red-600/30 hover:-translate-y-0.5">
                    Jelajahi Jurusan
                </a>
                <a href="{{ route('academic.programs') ?? '/akademik/program' }}" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-white/20 text-base font-semibold rounded-md text-white bg-transparent hover:bg-white/10 md:text-lg transition-all backdrop-blur-sm">
                    Lihat Program Keahlian
                </a>
            </x-frontend.hero.cta-group>

            @if($stats)
            <div class="mt-16 grid grid-cols-2 md:grid-cols-3 gap-6 pt-8 border-t border-white/10 reveal-on-scroll reveal-up delay-400">
                @foreach($stats as $stat)
                <div>
                    <p class="text-3xl font-bold text-white">{{ $stat['value'] }}</p>
                    <p class="text-sm font-medium text-slate-400 mt-1 uppercase tracking-wider">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
