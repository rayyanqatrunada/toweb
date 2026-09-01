@props([
    'title' => null,
    'description' => null,
    'canonical' => null,
    'robots' => 'index, follow',
    'ogImage' => null,
    'ogType' => 'website',
    'noPaddingTop' => false
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title . ' | ' . $settings->get('site_name', 'SMK Negeri 1') : $settings->get('site_name', 'TBSM') . ' | ' . $settings->get('site_tagline', 'Website Resmi') }}</title>
    
    <!-- Meta SEO & Open Graph -->
    <meta name="description" content="{{ $description ?? $settings->get('site_description', 'Website Resmi Program Keahlian TBSM') }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    
    <meta property="og:title" content="{{ $title ? $title . ' | ' . $settings->get('site_name', 'SMK Negeri 1') : $settings->get('site_name', 'TBSM') . ' | ' . $settings->get('site_tagline', 'Website Resmi') }}">
    <meta property="og:description" content="{{ $description ?? $settings->get('site_description', 'Website Resmi Program Keahlian TBSM') }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    @if($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $ogImage }}">
    @else
    <meta name="twitter:card" content="summary">
    @endif
    <meta name="twitter:title" content="{{ $title ? $title . ' | ' . $settings->get('site_name', 'SMK Negeri 1') : $settings->get('site_name', 'TBSM') . ' | ' . $settings->get('site_tagline', 'Website Resmi') }}">
    <meta name="twitter:description" content="{{ $description ?? $settings->get('site_description', 'Website Resmi Program Keahlian TBSM') }}">

    <!-- JSON-LD -->
    @stack('json-ld')

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,100..900;1,100..900&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Motion System -->
    <style>
        @media (prefers-reduced-motion: no-preference) {
            .reveal-on-scroll {
                opacity: 0;
                transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            }
            .reveal-up {
                transform: translateY(30px);
            }
            .reveal-fade {
                transform: none;
            }
            .is-revealed {
                opacity: 1;
                transform: translateY(0);
            }
            .delay-100 { transition-delay: 100ms; }
            .delay-200 { transition-delay: 200ms; }
            .delay-300 { transition-delay: 300ms; }
            .delay-400 { transition-delay: 400ms; }
            .delay-500 { transition-delay: 500ms; }
        }
        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll, .reveal-up, .reveal-fade, .is-revealed {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="font-sans antialiased text-figma-dark bg-[#FAFAFA] flex flex-col min-h-screen selection:bg-figma-red selection:text-white relative">

    <!-- Global Ambient Glow (Fixed) -->
    <div class="fixed inset-0 z-[-2] pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[50vw] h-[50vw] rounded-full bg-figma-red opacity-[0.03] blur-[120px]"></div>
        <div class="absolute -bottom-[20%] -right-[10%] w-[50vw] h-[50vw] rounded-full bg-figma-red opacity-[0.02] blur-[140px]"></div>
    </div>

    <!-- Scrollable Decorative Backgrounds (Absolute to body) -->
    <div class="absolute inset-0 z-[-1] pointer-events-none overflow-hidden w-full h-full">
        <!-- Grid block 1 (60% nempel kanan) -->
        <div class="absolute top-[5%] right-0 w-[60%] h-[500px] opacity-[0.04]" style="background-image: linear-gradient(#1B1B1E 1px, transparent 1px), linear-gradient(90deg, #1B1B1E 1px, transparent 1px); background-size: 32px 32px;"></div>
        
        <!-- Grid block 2 (70% nempel kiri) -->
        <div class="absolute top-[25%] left-0 w-[70%] h-[600px] opacity-[0.03]" style="background-image: linear-gradient(#1B1B1E 1px, transparent 1px), linear-gradient(90deg, #1B1B1E 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <!-- Grid block 3 (30% center agak serong kiri) -->
        <div class="absolute top-[50%] left-[30%] w-[35%] h-[400px] opacity-[0.04] -rotate-6" style="background-image: linear-gradient(#1B1B1E 1px, transparent 1px), linear-gradient(90deg, #1B1B1E 1px, transparent 1px); background-size: 24px 24px;"></div>
        
        <!-- Grid block 4 (Bottom mix) -->
        <div class="absolute top-[75%] right-[10%] w-[50%] h-[500px] opacity-[0.03]" style="background-image: linear-gradient(#1B1B1E 1px, transparent 1px), linear-gradient(90deg, #1B1B1E 1px, transparent 1px); background-size: 48px 48px;"></div>
        
        <!-- Random Shapes (Lingkaran) -->
        <div class="absolute top-[12%] left-[15%] w-72 h-72 rounded-full border border-[#1B1B1E] opacity-[0.05]"></div>
        <div class="absolute top-[35%] right-[20%] w-96 h-96 rounded-full border-2 border-[#DC2626] opacity-[0.03]"></div>
        <div class="absolute top-[65%] left-[8%] w-48 h-48 rounded-full border border-[#1B1B1E] opacity-[0.04]"></div>
        <div class="absolute top-[85%] right-[30%] w-64 h-64 rounded-full border border-[#1B1B1E] opacity-[0.03]"></div>
        
        <!-- Random Shapes (Kotak / Persegi) -->
        <div class="absolute top-[18%] right-[25%] w-48 h-48 border border-[#1B1B1E] opacity-[0.04] rotate-12"></div>
        <div class="absolute top-[42%] left-[22%] w-40 h-40 border border-[#DC2626] opacity-[0.03] -rotate-12"></div>
        <div class="absolute top-[58%] right-[15%] w-56 h-56 border border-[#1B1B1E] opacity-[0.04] rotate-45"></div>
        <div class="absolute top-[82%] left-[25%] w-32 h-32 border border-[#1B1B1E] opacity-[0.05] -rotate-6"></div>
        
        <!-- Dotted accents -->
        <div class="absolute top-[8%] right-[5%] w-[200px] h-[200px] opacity-[0.1]" style="background-image: radial-gradient(#1B1B1E 2px, transparent 2px); background-size: 24px 24px;"></div>
        <div class="absolute top-[48%] left-[5%] w-[150px] h-[150px] opacity-[0.1]" style="background-image: radial-gradient(#DC2626 2px, transparent 2px); background-size: 20px 20px;"></div>
        <div class="absolute top-[88%] right-[5%] w-[250px] h-[250px] opacity-[0.1]" style="background-image: radial-gradient(#1B1B1E 2px, transparent 2px); background-size: 32px 32px;"></div>
    </div>

    <!-- Skip Navigation (A11y) -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:px-4 focus:py-2 focus:bg-red-600 focus:text-white focus:font-bold focus:rounded-md focus:outline-none focus:ring-4 focus:ring-red-300">
        Skip to main content
    </a>

    <header>
        <x-navbar />
    </header>

    <main id="main-content" class="flex-grow {{ $noPaddingTop ? '' : 'pt-[64px]' }}">
        {{ $slot }}
    </main>

    <footer>
        <x-footer />
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReducedMotion) return;

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.1
            });

            document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
        });
    </script>
    @livewireScripts
</body>
</html>

