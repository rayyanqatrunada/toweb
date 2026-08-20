@props([
    'as' => 'span',
    'class' => ''
])

<{{ $as }} {{ $attributes->merge(['class' => 'inline-block py-1 px-3 bg-primary-50 text-primary-700 rounded-full text-xs font-bold tracking-widest uppercase mb-4 border border-primary-200 ' . $class]) }}>
    {{ $slot }}
</{{ $as }}>
