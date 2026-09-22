<?php
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
?>

<div class="flex items-center gap-3">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($logoUrl): ?>
        <img 
            src="<?php echo e($logoUrl); ?>" 
            alt="<?php echo e($shortName); ?>" 
            class="h-9 w-auto object-contain transition-transform duration-200 hover:scale-105"
            style="max-height: 2.25rem;"
        >
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="flex flex-col justify-center">
        <span class="font-extrabold text-sm tracking-tight text-neutral-900 leading-tight">
            <?php echo e($shortName); ?> <span style="color: var(--tbsm-red, #DC2626);">ADMIN</span>
        </span>
        <span class="text-[9.5px] font-semibold text-neutral-500 uppercase tracking-wider leading-none mt-0.5 max-w-[260px] truncate" title="<?php echo e($siteName); ?>">
            <?php echo e($siteName); ?>

        </span>
    </div>
</div>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/filament/logo.blade.php ENDPATH**/ ?>