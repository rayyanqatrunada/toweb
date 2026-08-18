@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'alignment' => 'left', // left, center
    'theme' => 'light' // light (dark text), dark (light text)
])

@php
    $alignClass = $alignment === 'center' ? 'text-center mx-auto' : 'text-left';
    $eyebrowClass = $theme === 'dark' ? 'text-red-500' : 'text-red-600';
    $titleClass = $theme === 'dark' ? 'text-white' : 'text-slate-900';
    $descClass = $theme === 'dark' ? 'text-slate-300' : 'text-slate-600';
@endphp

<div class="{{ $alignClass }} max-w-3xl mb-12">
    @if($eyebrow)
    <span class="text-sm font-bold tracking-wider {{ $eyebrowClass }} uppercase">{{ $eyebrow }}</span>
    @endif
    
    <h2 class="mt-2 text-3xl md:text-4xl font-extrabold {{ $titleClass }} tracking-tight">{!! $title !!}</h2>
    
    @if($description)
    <p class="mt-4 text-lg {{ $descClass }}">{!! $description !!}</p>
    @endif
</div>
