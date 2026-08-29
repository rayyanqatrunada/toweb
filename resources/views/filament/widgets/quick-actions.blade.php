<div class="tbsm-quick-actions">
    @foreach ($actions as $action)
        <a href="{{ $action['url'] }}" class="tbsm-quick-action">
            <x-filament::icon :icon="$action['icon']" />
            {{ $action['label'] }}
        </a>
    @endforeach
</div>
