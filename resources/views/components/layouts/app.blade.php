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

    <!-- Global Background Decorations (Parallax effect on scroll) -->
    <div class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden">
        <!-- 1. Grid/Blueprint Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(#000 1px, transparent 1px), linear-gradient(90deg, #000 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <!-- 2. Vertical Accent Lines (Container aligned) -->
        <div class="absolute inset-0 flex justify-center opacity-[0.04]">
            <div class="w-full max-w-[1280px] h-full flex justify-between border-x border-black">
                <div class="w-1/3 h-full border-r border-black"></div>
                <div class="w-1/3 h-full border-r border-black"></div>
            </div>
        </div>

        <!-- 3. Ambient Red Glow (Top Left & Bottom Right) -->
        <div class="absolute -top-[20%] -left-[10%] w-[50vw] h-[50vw] rounded-full bg-figma-red opacity-[0.05] blur-[120px]"></div>
        <div class="absolute -bottom-[20%] -right-[10%] w-[50vw] h-[50vw] rounded-full bg-figma-red opacity-[0.04] blur-[140px]"></div>
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
</body>
</html>

