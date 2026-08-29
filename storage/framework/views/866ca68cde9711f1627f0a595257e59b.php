<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Pencarian Global','robots' => 'noindex, follow']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pencarian Global','robots' => 'noindex, follow']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="bg-charcoal-50 py-16 lg:py-24 border-b border-charcoal-200">
        <div class="max-w-screen-xl mx-auto px-4 text-center reveal-on-scroll reveal-up">
            <h1 class="text-3xl md:text-5xl font-bold text-charcoal-900 mb-4">Pencarian Global</h1>
            <p class="text-charcoal-600 text-lg max-w-2xl mx-auto">Temukan informasi seputar jurusan Teknik dan Bisnis Sepeda Motor (TBSM).</p>
            <form action="<?php echo e(route('search')); ?>" method="GET" class="mt-8 max-w-xl mx-auto relative reveal-on-scroll reveal-up delay-100">
                <input type="text" name="q" value="<?php echo e($q); ?>" placeholder="Ketik kata kunci pencarian..." class="w-full px-6 py-4 rounded-full text-charcoal-800 bg-white border border-charcoal-200 focus:outline-none focus:ring-4 focus:ring-primary-100 shadow-sm text-lg">
                <button type="submit" class="absolute right-2 top-2 bottom-2 bg-primary-600 text-white px-6 rounded-full font-semibold hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300 transition">Cari</button>
            </form>
        </div>
    </div>

    <section class="bg-white min-h-[50vh] pt-12 pb-20 lg:pt-16 lg:pb-24">
        <div class="max-w-screen-md mx-auto px-4 reveal-on-scroll reveal-up">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($q)): ?>
                <div class="text-center py-20">
                    <h3 class="text-xl font-bold text-charcoal-800 mb-2">Mulai Pencarian</h3>
                    <p class="text-charcoal-500">Silakan masukkan kata kunci pada kotak pencarian di atas.</p>
                </div>
            <?php elseif($totalResults === 0): ?>
                <div class="text-center py-20 bg-charcoal-50 rounded-3xl shadow-sm border border-charcoal-200">
                    <svg class="w-16 h-16 text-charcoal-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <h3 class="text-xl font-bold text-charcoal-800 mb-2">Pencarian tidak menemukan hasil</h3>
                    <p class="text-charcoal-500">Tidak ada data yang cocok dengan kata kunci <strong>"<?php echo e($q); ?>"</strong>.</p>
                </div>
            <?php else: ?>
                <div class="mb-8">
                    <h2 class="text-lg font-medium text-charcoal-600">Menemukan <?php echo e($totalResults); ?> hasil untuk <strong>"<?php echo e($q); ?>"</strong></h2>
                </div>

                <div class="space-y-12">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupName => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($items) > 0): ?>
                            <div class="bg-white rounded-3xl shadow-sm border border-charcoal-200 overflow-hidden reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100); ?>">
                                <div class="bg-charcoal-50 px-6 py-4 border-b border-charcoal-200">
                                    <h3 class="font-bold text-charcoal-900"><?php echo e($groupName); ?> <span class="ml-2 bg-primary-100 text-primary-700 text-xs py-1 px-2 rounded-full"><?php echo e(count($items)); ?></span></h3>
                                </div>
                                <div class="divide-y divide-charcoal-100">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <a href="<?php echo e($item->url); ?>" class="block p-6 hover:bg-charcoal-50 transition-colors group">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="text-lg font-semibold text-charcoal-900 group-hover:text-primary-600 transition-colors"><?php echo e($item->title); ?></h4>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->date): ?>
                                                    <span class="text-xs font-medium text-charcoal-500 bg-charcoal-100 px-2 py-1 rounded"><?php echo e($item->date); ?></span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->excerpt): ?>
                                                <p class="text-charcoal-600 text-sm line-clamp-2"><?php echo e($item->excerpt); ?></p>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>



<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/frontend/search.blade.php ENDPATH**/ ?>