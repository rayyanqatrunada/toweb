<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['as' => 'div', 'class' => '']));

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

foreach (array_filter((['as' => 'div', 'class' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<<?php echo e($as); ?> <?php echo e($attributes->merge(['class' => 'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ' . $class])); ?>>
    <?php echo e($slot); ?>

</<?php echo e($as); ?>>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/layout/container.blade.php ENDPATH**/ ?>