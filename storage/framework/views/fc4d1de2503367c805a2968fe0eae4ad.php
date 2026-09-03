<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Galeri Dokumentasi']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Galeri Dokumentasi']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <main class="flex flex-col items-center bg-white w-full overflow-hidden relative">
        
        <!-- Hero Section -->
        <section class="w-full relative border-b border-gray-200 flex justify-center"
            style="background: linear-gradient(90deg, #E4E4E7 1px, transparent 1px), linear-gradient(180deg, #E4E4E7 1px, transparent 1px), #FFFFFF; background-size: 48px 48px; background-position: center top;">
            
            <div class="flex flex-col items-start px-6 md:px-16 py-16 md:py-32 w-full max-w-[1440px] relative">
                <!-- Decorative Accent -->
                <div class="absolute right-0 top-0 w-32 md:w-64 h-32 md:h-64 opacity-50 border-b border-l border-gray-200 flex flex-col pointer-events-none hidden md:flex">
                    <div class="flex-1 border border-gray-200 m-4 opacity-50"></div>
                </div>

                <div class="flex flex-col gap-6 w-full max-w-3xl relative z-10 reveal-on-scroll reveal-up">
                    <!-- Eyebrow -->
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-[1px] bg-figma-red"></div>
                        <span class="font-sans font-bold text-xs uppercase tracking-widest text-figma-red">
                            Dokumentasi
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="font-chivo font-extrabold text-4xl md:text-5xl lg:text-[64px] leading-tight lg:leading-[70px] tracking-tight text-figma-dark">
                        Galeri Kegiatan & Fasilitas
                    </h1>

                    <!-- Subtitle -->
                    <p class="font-sans text-base md:text-lg leading-relaxed text-gray-600 max-w-2xl">
                        Merekam jejak perjalanan akademik dan praktik industri siswa Teknik Otomotif SMK Negeri 1 Bangsri dalam membangun kompetensi profesional.
                    </p>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="flex flex-col items-center px-6 md:px-16 py-12 md:py-20 gap-12 w-full max-w-[1440px]">
            
            <!-- Filters -->
            <div class="flex flex-row items-start pb-4 gap-4 w-full border-b border-gray-200 overflow-x-auto hide-scrollbar snap-x">
                
                <?php
                    $currentFilter = request('album', 'all');
                ?>

                <a href="<?php echo e(route('gallery.index')); ?>" 
                   class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 <?php echo e($currentFilter === 'all' ? 'bg-figma-dark border-figma-dark text-white' : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50'); ?>">
                    <span class="font-sans font-bold text-xs uppercase tracking-widest">Semua</span>
                </a>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('gallery.index', ['album' => $album->slug])); ?>" 
                       class="flex flex-col justify-center items-center px-4 py-2 min-w-max border transition-colors duration-300 <?php echo e($currentFilter === $album->slug ? 'bg-figma-dark border-figma-dark text-white' : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50'); ?>">
                        <span class="font-sans font-bold text-xs uppercase tracking-widest"><?php echo e($album->title); ?></span>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <!-- Bento Grid -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->count() > 0): ?>
                <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[150px] md:auto-rows-[250px] grid-flow-row-dense">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php
                            $spanClasses = 'col-span-1 row-span-1'; // Default 1:1
                            
                            switch($item->aspect_ratio) {
                                case '4:3':
                                case '16:9':
                                    $spanClasses = 'col-span-2 row-span-1 md:col-span-2 md:row-span-1';
                                    break;
                                case '3:4':
                                    $spanClasses = 'col-span-1 row-span-2 md:col-span-1 md:row-span-2';
                                    break;
                                case 'large':
                                    $spanClasses = 'col-span-2 row-span-2 md:col-span-2 md:row-span-2';
                                    break;
                                case '1:1':
                                default:
                                    $spanClasses = 'col-span-1 row-span-1 md:col-span-1 md:row-span-1';
                                    break;
                            }
                        ?>

                        <div class="<?php echo e($spanClasses); ?> group relative bg-gray-100 border border-gray-200 overflow-hidden reveal-on-scroll reveal-up">
                            
                            <img src="<?php echo e(Storage::url($item->file_path)); ?>" 
                                 alt="<?php echo e($item->title ?? $item->album->title ?? 'Gallery image'); ?>" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 filter group-hover:contrast-110" loading="lazy">
                            
                            <!-- Overlay -->
                            <div class="absolute inset-1 bg-charcoal-950/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end items-start p-4 md:p-6">
                                
                                <div class="w-full h-4 mb-2 -mt-1 hidden md:block"></div>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->album): ?>
                                <div class="flex items-center uppercase font-sans font-bold text-[10px] md:text-xs tracking-widest text-[#FFDAD6] mb-1 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <?php echo e(Str::limit($item->album->title, 25)); ?>

                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->title): ?>
                                <h3 class="font-chivo font-bold text-lg md:text-xl text-white leading-tight transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">
                                    <?php echo e($item->title); ?>

                                </h3>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->description): ?>
                                <p class="font-sans text-xs md:text-sm text-gray-300 mt-2 line-clamp-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100">
                                    <?php echo e($item->description); ?>

                                </p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                </div>
            <?php else: ?>
                <div class="w-full py-16 flex flex-col items-center text-center">
                    <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Galeri Masih Kosong','message' => 'Belum ada dokumentasi kegiatan yang dipublikasikan pada kategori ini.','icon' => 'image']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Galeri Masih Kosong','message' => 'Belum ada dokumentasi kegiatan yang dipublikasikan pada kategori ini.','icon' => 'image']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb1651f2374e13365b46984f667e2eec8)): ?>
<?php $attributes = $__attributesOriginalb1651f2374e13365b46984f667e2eec8; ?>
<?php unset($__attributesOriginalb1651f2374e13365b46984f667e2eec8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1651f2374e13365b46984f667e2eec8)): ?>
<?php $component = $__componentOriginalb1651f2374e13365b46984f667e2eec8; ?>
<?php unset($__componentOriginalb1651f2374e13365b46984f667e2eec8); ?>
<?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Pagination -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->hasPages()): ?>
                <div class="mt-8 flex justify-center w-full">
                    <?php echo e($items->appends(['album' => request('album')])->links()); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </section>

        <!-- Final CTA (Optional, adding for consistency if needed, wait the prompt has a Final CTA with "Siap Menjadi Tenaga Ahli Otomotif?") -->
        <?php if (isset($component)) { $__componentOriginal9613240e70ec6dca7be8f7dc05a458d3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9613240e70ec6dca7be8f7dc05a458d3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.final-cta','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.final-cta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9613240e70ec6dca7be8f7dc05a458d3)): ?>
<?php $attributes = $__attributesOriginal9613240e70ec6dca7be8f7dc05a458d3; ?>
<?php unset($__attributesOriginal9613240e70ec6dca7be8f7dc05a458d3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9613240e70ec6dca7be8f7dc05a458d3)): ?>
<?php $component = $__componentOriginal9613240e70ec6dca7be8f7dc05a458d3; ?>
<?php unset($__componentOriginal9613240e70ec6dca7be8f7dc05a458d3); ?>
<?php endif; ?>

    </main>
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
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/frontend/gallery.blade.php ENDPATH**/ ?>