<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'headline',
    'description',
    'imageUrl' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?auto=format&fit=crop&w=1920&q=80',
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
    'headline',
    'description',
    'imageUrl' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?auto=format&fit=crop&w=1920&q=80',
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

<section class="relative bg-slate-900 min-h-[80vh] flex items-center overflow-hidden">
    <!-- Immersive Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="<?php echo e($imageUrl); ?>" alt="Background Teknik Otomotif" class="w-full h-full object-cover object-center opacity-40 mix-blend-overlay" fetchpriority="high" decoding="async">
        <!-- Gradient Overlay for Contrast -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20 lg:py-32">
        <div class="max-w-3xl">
            
            <?php if (isset($component)) { $__componentOriginal046de35099a1b1f6aa14153ef114b50b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal046de35099a1b1f6aa14153ef114b50b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.eyebrow','data' => ['class' => 'text-red-500 mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 mb-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e($eyebrowText); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal046de35099a1b1f6aa14153ef114b50b)): ?>
<?php $attributes = $__attributesOriginal046de35099a1b1f6aa14153ef114b50b; ?>
<?php unset($__attributesOriginal046de35099a1b1f6aa14153ef114b50b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal046de35099a1b1f6aa14153ef114b50b)): ?>
<?php $component = $__componentOriginal046de35099a1b1f6aa14153ef114b50b; ?>
<?php unset($__componentOriginal046de35099a1b1f6aa14153ef114b50b); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginale61a1266802cb832dc944f95985631c9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale61a1266802cb832dc944f95985631c9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.title','data' => ['class' => 'text-white mb-6 leading-tight']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-white mb-6 leading-tight']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e($headline); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale61a1266802cb832dc944f95985631c9)): ?>
<?php $attributes = $__attributesOriginale61a1266802cb832dc944f95985631c9; ?>
<?php unset($__attributesOriginale61a1266802cb832dc944f95985631c9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale61a1266802cb832dc944f95985631c9)): ?>
<?php $component = $__componentOriginale61a1266802cb832dc944f95985631c9; ?>
<?php unset($__componentOriginale61a1266802cb832dc944f95985631c9); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginal590c9d6b4dc8c918b37e1cf8497f0667 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal590c9d6b4dc8c918b37e1cf8497f0667 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.description','data' => ['class' => 'text-slate-300 mb-10 max-w-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.description'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-slate-300 mb-10 max-w-2xl']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e($description); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal590c9d6b4dc8c918b37e1cf8497f0667)): ?>
<?php $attributes = $__attributesOriginal590c9d6b4dc8c918b37e1cf8497f0667; ?>
<?php unset($__attributesOriginal590c9d6b4dc8c918b37e1cf8497f0667); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal590c9d6b4dc8c918b37e1cf8497f0667)): ?>
<?php $component = $__componentOriginal590c9d6b4dc8c918b37e1cf8497f0667; ?>
<?php unset($__componentOriginal590c9d6b4dc8c918b37e1cf8497f0667); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginalabaac17ef11050cfcf7a69b37ab71f18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabaac17ef11050cfcf7a69b37ab71f18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.cta-group','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.cta-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <a href="#about" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-md text-white bg-red-600 hover:bg-red-700 md:text-lg transition-all shadow-lg hover:shadow-red-600/30 hover:-translate-y-0.5">
                    Jelajahi Jurusan
                </a>
                <a href="<?php echo e(route('academic.programs') ?? '/akademik/program'); ?>" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-white/20 text-base font-semibold rounded-md text-white bg-transparent hover:bg-white/10 md:text-lg transition-all backdrop-blur-sm">
                    Lihat Program Keahlian
                </a>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalabaac17ef11050cfcf7a69b37ab71f18)): ?>
<?php $attributes = $__attributesOriginalabaac17ef11050cfcf7a69b37ab71f18; ?>
<?php unset($__attributesOriginalabaac17ef11050cfcf7a69b37ab71f18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalabaac17ef11050cfcf7a69b37ab71f18)): ?>
<?php $component = $__componentOriginalabaac17ef11050cfcf7a69b37ab71f18; ?>
<?php unset($__componentOriginalabaac17ef11050cfcf7a69b37ab71f18); ?>
<?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stats): ?>
            <div class="mt-16 grid grid-cols-2 md:grid-cols-3 gap-6 pt-8 border-t border-white/10 reveal-on-scroll reveal-up delay-400">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div>
                    <p class="text-3xl font-bold text-white"><?php echo e($stat['value']); ?></p>
                    <p class="text-sm font-medium text-slate-400 mt-1 uppercase tracking-wider"><?php echo e($stat['label']); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/frontend/hero/layout-full.blade.php ENDPATH**/ ?>