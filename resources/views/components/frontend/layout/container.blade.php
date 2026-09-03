@props(['as' => 'div', 'class' => ''])

<{{ $as }} {{ $attributes->merge(['class' => 'max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 ' . $class]) }}>
    {{ $slot }}
</{{ $as }}>
