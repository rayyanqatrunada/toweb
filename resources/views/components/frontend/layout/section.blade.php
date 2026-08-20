@props([
    'as' => 'section',
    'class' => '',
    'container' => true,
    'containerClass' => '',
    'padding' => 'py-16 md:py-24'
])

<{{ $as }} {{ $attributes->merge(['class' => 'relative ' . $padding . ' ' . $class]) }}>
    @if($container)
        <x-frontend.layout.container class="{{ $containerClass }}">
            {{ $slot }}
        </x-frontend.layout.container>
    @else
        {{ $slot }}
    @endif
</{{ $as }}>
