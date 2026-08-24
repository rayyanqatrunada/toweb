<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'eyebrow' => null,
    'title',
    'description' => null,
    'alignment' => 'left', // left, center
    'theme' => 'light' // light (dark text), dark (light text)
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'eyebrow' => null,
    'title',
    'description' => null,
    'alignment' => 'left', // left, center
    'theme' => 'light' // light (dark text), dark (light text)
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $alignClass = $alignment === 'center' ? 'text-center mx-auto' : 'text-left';
    $eyebrowClass = $theme === 'dark' ? 'text-red-500' : 'text-red-600';
    $titleClass = $theme === 'dark' ? 'text-white' : 'text-slate-900';
    $descClass = $theme === 'dark' ? 'text-slate-300' : 'text-slate-600';
?>

<div class="<?php echo e($alignClass); ?> max-w-3xl mb-12">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($eyebrow): ?>
    <span class="text-sm font-bold tracking-wider <?php echo e($eyebrowClass); ?> uppercase"><?php echo e($eyebrow); ?></span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    
    <h2 class="mt-2 text-3xl md:text-4xl font-extrabold <?php echo e($titleClass); ?> tracking-tight"><?php echo $title; ?></h2>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($description): ?>
    <p class="mt-4 text-lg <?php echo e($descClass); ?>"><?php echo $description; ?></p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\components\frontend\section-header.blade.php ENDPATH**/ ?>