<div class="flex items-center gap-2">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(file_exists(public_path('logo.png'))): ?>
        <img src="<?php echo e(asset('logo.png')); ?>" alt="Logo" style="height: 2rem;">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <span class="font-bold text-xl tracking-tight" style="color: var(--tbsm-charcoal, #1B1B1E)">TBSM Admin</span>
</div>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/filament/logo.blade.php ENDPATH**/ ?>