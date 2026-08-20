@props([
    'title' => 'Belum Ada Data',
    'description' => 'Data untuk halaman ini belum tersedia atau sedang dalam proses pembaruan.',
    'icon' => null,
    'actionText' => null,
    'actionUrl' => null,
    'class' => ''
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-16 px-4 text-center border-2 border-dashed border-charcoal-200 rounded-3xl bg-charcoal-50/50 ' . $class]) }}>
    <div class="w-16 h-16 mb-4 flex items-center justify-center rounded-full bg-white shadow-sm border border-charcoal-100 text-charcoal-400">
        @if($icon)
            {{ $icon }}
        @else
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
        @endif
    </div>
    <h3 class="text-lg font-bold text-charcoal-900 mb-2">{{ $title }}</h3>
    <p class="text-charcoal-500 max-w-sm mx-auto text-sm mb-6">{{ $description }}</p>
    
    @if($actionText && $actionUrl)
        <x-frontend.ui.button :href="$actionUrl" variant="outline" size="sm">
            {{ $actionText }}
        </x-frontend.ui.button>
    @endif
</div>
