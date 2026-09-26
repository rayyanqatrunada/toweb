@props([
    'as' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'class' => ''
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-bold rounded-sm sm:rounded-[2px] transition-all focus-ring disabled:opacity-70 disabled:cursor-not-allowed';

    $variants = [
        'primary' => 'bg-primary-600 text-white hover:bg-primary-700 border border-transparent shadow-sm',
        'secondary' => 'bg-charcoal-900 text-white hover:bg-charcoal-800 border border-transparent shadow-sm',
        'outline' => 'bg-white text-charcoal-800 border-2 border-charcoal-200 hover:border-charcoal-900 hover:text-charcoal-900',
        'outline-dark' => 'bg-transparent text-white border-2 border-charcoal-700 hover:border-white hover:bg-white/10',
        'ghost' => 'bg-transparent text-charcoal-700 hover:bg-charcoal-100 border border-transparent',
        'soft' => 'bg-primary-50 text-primary-700 hover:bg-primary-100 border border-transparent',
    ];

    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3 text-sm',
        'lg' => 'px-8 py-4 text-base',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']) . ' ' . $class;
@endphp

@if($as === 'a' || $href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
