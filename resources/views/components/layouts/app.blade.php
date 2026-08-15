<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Teknik Otomotif' }} | SMK Negeri 1</title>
    
    <!-- Meta SEO & Open Graph -->
    <meta name="description" content="{{ $description ?? 'Website Resmi Program Keahlian Teknik Otomotif SMK Negeri 1. Menyiapkan generasi profesional di dunia otomotif.' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Teknik Otomotif' }} | SMK Negeri 1">
    <meta property="og:description" content="{{ $description ?? 'Website Resmi Program Keahlian Teknik Otomotif SMK Negeri 1. Menyiapkan generasi profesional di dunia otomotif.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if(isset($ogImage))
    <meta property="og:image" content="{{ $ogImage }}">
    @endif
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 flex flex-col min-h-screen overflow-x-hidden w-full">

    <!-- Skip Navigation (A11y) -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:px-4 focus:py-2 focus:bg-red-600 focus:text-white focus:font-bold focus:rounded-md focus:outline-none focus:ring-4 focus:ring-red-300">
        Skip to main content
    </a>

    <header>
        <x-navbar />
    </header>

    <main id="main-content" class="flex-grow pt-16">
        {{ $slot }}
    </main>

    <footer>
        <x-footer />
    </footer>

</body>
</html>
