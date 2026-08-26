<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'headline',
    'description',
    'imageUrl' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?auto=format&fit=crop&w=800&q=80',
    'eyebrowText' => 'JURUSAN TEKNIK DAN BISNIS SEPEDA MOTOR',
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
    'imageUrl' => 'https://images.unsplash.com/photo-1530630458144-014709e10016?auto=format&fit=crop&w=800&q=80',
    'eyebrowText' => 'JURUSAN TEKNIK DAN BISNIS SEPEDA MOTOR',
    'stats' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="relative bg-slate-50 overflow-hidden pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            
            <!-- Text Content -->
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left flex flex-col justify-center">
                
                <?php if (isset($component)) { $__componentOriginal046de35099a1b1f6aa14153ef114b50b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal046de35099a1b1f6aa14153ef114b50b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.eyebrow','data' => ['class' => 'text-red-600 mb-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-600 mb-3']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.title','data' => ['class' => 'text-slate-900 mb-5 leading-tight']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-slate-900 mb-5 leading-tight']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.description','data' => ['class' => 'text-slate-600 mb-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.description'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-slate-600 mb-8']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.hero.cta-group','data' => ['class' => 'sm:justify-center lg:justify-start']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.hero.cta-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'sm:justify-center lg:justify-start']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <a href="#about" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-md text-white bg-red-600 hover:bg-red-700 md:text-lg transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Jelajahi Jurusan
                    </a>
                    <a href="<?php echo e(route('academic.programs') ?? '/akademik/program'); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-semibold rounded-md text-slate-700 bg-white hover:bg-slate-50 hover:text-slate-900 md:text-lg transition-all shadow-sm hover:shadow">
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
                
                <!-- Stats Row -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stats): ?>
                <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 gap-6 pt-8 border-t border-slate-200 reveal-on-scroll reveal-up delay-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div>
                        <p class="text-3xl font-bold text-slate-900"><?php echo e($stat['value']); ?></p>
                        <p class="text-sm font-medium text-slate-500 mt-1 uppercase tracking-wider"><?php echo e($stat['label']); ?></p>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
            </div>
            
            <!-- Image Content -->
            <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center reveal-on-scroll reveal-fade delay-200">
                <div class="relative mx-auto w-full rounded-xl shadow-2xl lg:max-w-md overflow-hidden bg-slate-200 aspect-[4/3] sm:aspect-square lg:aspect-[3/4]">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" src="<?php echo e($imageUrl); ?>" alt="Siswa praktik di workshop otomotif" fetchpriority="high" decoding="async">
                    <!-- Subtle overlay to make it look industrial -->
                    <div class="absolute inset-0 bg-slate-900/10 mix-blend-multiply"></div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\components\frontend\hero\layout-split.blade.php ENDPATH**/ ?>