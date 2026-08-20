@props([
    'variant' => 'neutral',
    'class' => ''
])

@php
    $variants = [
        'neutral' => 'bg-charcoal-100 text-charcoal-800 border-charcoal-200',
        'primary' => 'bg-primary-50 text-primary-700 border-primary-200',
        'success' => 'bg-green-50 text-green-700 border-green-200',
        'warning' => 'bg-amber-50 text-amber-700 border-amber-200',
        'danger' => 'bg-red-50 text-red-700 border-red-200',
        'info' => 'bg-blue-50 text-blue-700 border-blue-200',
    ];

    $classes = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border ' . ($variants[$variant] ?? $variants['neutral']) . ' ' . $class;
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
