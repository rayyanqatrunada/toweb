@php
    try {
        $settings = app(\App\Services\SettingsService::class);
        $siteLogo = $settings->get('site_logo');
        $logoUrl = ($siteLogo && \Illuminate\Support\Facades\Storage::disk('public')->exists($siteLogo))
            ? \Illuminate\Support\Facades\Storage::url($siteLogo)
            : (file_exists(public_path('logo.png')) ? asset('logo.png') : null);

        $shortName = $settings->get('site_short_name') ?: 'TBSM';
        $siteName = $settings->get('site_name') ?: 'Teknik dan Bisnis Sepeda Motor';
    } catch (\Throwable $e) {
        $logoUrl = file_exists(public_path('logo.png')) ? asset('logo.png') : null;
        $shortName = 'TBSM';
        $siteName = 'Teknik dan Bisnis Sepeda Motor';
    }
@endphp

<div class="flex items-center gap-3">
    @if ($logoUrl)
        <img 
            src="{{ $logoUrl }}" 
            alt="{{ $shortName }}" 
            class="h-9 w-auto object-contain transition-transform duration-200 hover:scale-105"
            style="max-height: 2.25rem;"
        >
    @endif
    <div class="flex flex-col justify-center">
        <span class="font-extrabold text-sm tracking-tight text-neutral-900 leading-tight">
            {{ $shortName }} <span style="color: var(--tbsm-red, #DC2626);">ADMIN</span>
        </span>
        <span class="text-[9.5px] font-semibold text-neutral-500 uppercase tracking-wider leading-none mt-0.5 max-w-[260px] truncate" title="{{ $siteName }}">
            {{ $siteName }}
        </span>
    </div>
</div>
