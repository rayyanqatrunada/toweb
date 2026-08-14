<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Teknik Otomotif' }} | SMK Negeri 1</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Website Resmi Program Keahlian Teknik Otomotif SMK Negeri 1">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 flex flex-col min-h-screen">

    <x-navbar />

    <main class="flex-grow pt-16">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>
