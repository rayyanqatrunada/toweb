<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'full', // 'full' or 'split'
    'headline',
    'description',
    'imageUrl',
    'eyebrowText' => 'JURUSAN TEKNIK OTOMOTIF',
    'stats' => null
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
    'variant' => 'full', // 'full' or 'split'
    'headline',
    'description',
    'imageUrl',
    'eyebrowText' => 'JURUSAN TEKNIK OTOMOTIF',
    'stats' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($variant === 'split'): ?>
    <?php if (isset($component)) { $__componentOriginal75ad3ec12cd238a7d8075961bf0805c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75ad3ec12cd238a7d8075961bf0805c6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.layout-split','data' => ['headline' => $headline,'description' => $description,'imageUrl' => $imageUrl,'eyebrowText' => $eyebrowText,'stats' => $stats]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.layout-split'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($headline),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($description),'image-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageUrl),'eyebrow-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($eyebrowText),'stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75ad3ec12cd238a7d8075961bf0805c6)): ?>
<?php $attributes = $__attributesOriginal75ad3ec12cd238a7d8075961bf0805c6; ?>
<?php unset($__attributesOriginal75ad3ec12cd238a7d8075961bf0805c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75ad3ec12cd238a7d8075961bf0805c6)): ?>
<?php $component = $__componentOriginal75ad3ec12cd238a7d8075961bf0805c6; ?>
<?php unset($__componentOriginal75ad3ec12cd238a7d8075961bf0805c6); ?>
<?php endif; ?>
<?php else: ?>
    <?php if (isset($component)) { $__componentOriginal046e9729925cf91370ccae0fe6642630 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal046e9729925cf91370ccae0fe6642630 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.layout-full','data' => ['headline' => $headline,'description' => $description,'imageUrl' => $imageUrl,'eyebrowText' => $eyebrowText,'stats' => $stats]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.layout-full'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($headline),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($description),'image-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageUrl),'eyebrow-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($eyebrowText),'stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal046e9729925cf91370ccae0fe6642630)): ?>
<?php $attributes = $__attributesOriginal046e9729925cf91370ccae0fe6642630; ?>
<?php unset($__attributesOriginal046e9729925cf91370ccae0fe6642630); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal046e9729925cf91370ccae0fe6642630)): ?>
<?php $component = $__componentOriginal046e9729925cf91370ccae0fe6642630; ?>
<?php unset($__componentOriginal046e9729925cf91370ccae0fe6642630); ?>
<?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/frontend/hero/index.blade.php ENDPATH**/ ?>