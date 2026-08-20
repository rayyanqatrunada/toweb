@props([
    'class' => ''
])

<div {{ $attributes->merge(['class' => 'h-px bg-gradient-to-r from-transparent via-charcoal-200 to-transparent ' . $class]) }} aria-hidden="true"></div>
