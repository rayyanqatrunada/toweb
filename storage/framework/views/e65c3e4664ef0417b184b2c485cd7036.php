<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Prestasi & Penghargaan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Prestasi & Penghargaan']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <!-- Hero Section -->
    <section class="bg-charcoal-50 border-b border-charcoal-200 relative overflow-hidden lg: pt-2 pb-16 lg:pt-4 lg:pb-24">
        <!-- Trophy Pattern/Abstract Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 reveal-on-scroll reveal-up']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 reveal-on-scroll reveal-up']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php if (isset($component)) { $__componentOriginal98ae32034a5e9865062f4201185788de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal98ae32034a5e9865062f4201185788de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.breadcrumbs','data' => ['items' => ['Prestasi & Penghargaan' => route('achievements.index')],'class' => 'mb-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Prestasi & Penghargaan' => route('achievements.index')]),'class' => 'mb-8']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal98ae32034a5e9865062f4201185788de)): ?>
<?php $attributes = $__attributesOriginal98ae32034a5e9865062f4201185788de; ?>
<?php unset($__attributesOriginal98ae32034a5e9865062f4201185788de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98ae32034a5e9865062f4201185788de)): ?>
<?php $component = $__componentOriginal98ae32034a5e9865062f4201185788de; ?>
<?php unset($__componentOriginal98ae32034a5e9865062f4201185788de); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginalac1079511a1017c8db3b04bb1937d3e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.eyebrow','data' => ['class' => 'text-amber-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-amber-500']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
PROOF OF COMPETENCE <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-charcoal-900 tracking-tight leading-[1.1] mt-4 mb-6">
                Prestasi &<br class="hidden sm:block"> Penghargaan
            </h1>
            <p class="text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl border-l-2 border-amber-500 pl-4">
                Merekam jejak keberhasilan siswa dan tenaga pendidik dalam menguasai teknologi otomotif di berbagai ajang kompetisi.
            </p>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal264d3cdba9db237c49d9665edc40da42)): ?>
<?php $attributes = $__attributesOriginal264d3cdba9db237c49d9665edc40da42; ?>
<?php unset($__attributesOriginal264d3cdba9db237c49d9665edc40da42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal264d3cdba9db237c49d9665edc40da42)): ?>
<?php $component = $__componentOriginal264d3cdba9db237c49d9665edc40da42; ?>
<?php unset($__componentOriginal264d3cdba9db237c49d9665edc40da42); ?>
<?php endif; ?>
    </section>

    <!-- Content Section -->
    <section class="py-16 lg:py-24 bg-charcoal-50 min-h-[50vh]">
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($achievements->isEmpty()): ?>
                <div class="py-20 reveal-on-scroll reveal-up">
                    <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Belum Ada Rekor Prestasi','message' => 'Data prestasi dan penghargaan belum ditambahkan saat ini.','icon' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Rekor Prestasi','message' => 'Data prestasi dan penghargaan belum ditambahkan saat ini.','icon' => 'document']); ?>
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
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loopIndex => $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="reveal-on-scroll reveal-up" style="transition-delay: <?php echo e(($loopIndex % 3) * 50); ?>ms;">
                            <article class="relative flex flex-col h-full bg-white border border-charcoal-200 rounded-3xl overflow-hidden group hover:border-amber-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-500 focus-within:ring-4 focus-within:ring-amber-500 focus-within:border-amber-500">
                                
                                <!-- Trophy/Rank Ribbon -->
                                <div class="absolute -right-12 top-6 rotate-45 bg-amber-500 text-amber-950 font-black text-[10px] tracking-widest uppercase py-1 px-14 shadow-md z-20 pointer-events-none group-hover:bg-amber-400 transition-colors text-center w-40">
                                    JUARA <?php echo e($achievement->rank); ?>

                                </div>

                                <a href="<?php echo e(route('achievements.show', $achievement->slug)); ?>" class="relative aspect-[4/5] sm:aspect-square overflow-hidden block bg-charcoal-900 focus:outline-none z-10">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($achievement->photo): ?>
                                        <img src="<?php echo e(Storage::url($achievement->photo)); ?>" alt="<?php echo e($achievement->title); ?>" class="object-cover w-full h-full opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700" loading="<?php echo e($loopIndex < 3 ? 'eager' : 'lazy'); ?>">
                                    <?php else: ?>
                                        <div class="w-full h-full flex flex-col items-center justify-center text-charcoal-600 bg-charcoal-100 group-hover:bg-charcoal-200 transition-colors">
                                            <svg class="w-16 h-16 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    
                                    <!-- Overlay Gradient for better text readability -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    
                                    <!-- Title inside Image -->
                                    <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8 flex flex-col justify-end">
                                        <div class="mb-3">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-widest bg-amber-400 text-amber-950 shadow-sm shadow-amber-900/20">
                                                TINGKAT <?php echo e(strtoupper($achievement->level)); ?>

                                            </span>
                                        </div>
                                        <h3 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight leading-tight group-hover:text-amber-400 transition-colors line-clamp-3">
                                            <?php echo e($achievement->title); ?>

                                        </h3>
                                    </div>
                                </a>
                                
                                <div class="p-6 sm:p-8 flex flex-col flex-grow bg-white relative z-10 border-t-4 border-charcoal-50 group-hover:border-amber-400 transition-colors duration-500">
                                    <div class="grid grid-cols-1 gap-y-4 mb-6">
                                        <!-- Date -->
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 rounded-full bg-charcoal-50 flex items-center justify-center mr-4 shrink-0 border border-charcoal-100 group-hover:bg-amber-50 group-hover:border-amber-200 transition-colors">
                                                <svg class="w-4 h-4 text-charcoal-500 group-hover:text-amber-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Tanggal</div>
                                                <div class="text-sm font-semibold text-charcoal-900"><?php echo e($achievement->date ? $achievement->date->translatedFormat('d F Y') : 'Tidak Diketahui'); ?></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Organizer -->
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 rounded-full bg-charcoal-50 flex items-center justify-center mr-4 shrink-0 border border-charcoal-100 group-hover:bg-amber-50 group-hover:border-amber-200 transition-colors">
                                                <svg class="w-4 h-4 text-charcoal-500 group-hover:text-amber-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-[10px] font-bold text-charcoal-400 uppercase tracking-widest">Penyelenggara</div>
                                                <div class="text-sm font-semibold text-charcoal-900 line-clamp-1" title="<?php echo e($achievement->organizer); ?>"><?php echo e($achievement->organizer); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-auto pt-5 border-t border-charcoal-100 flex justify-between items-center">
                                        <a href="<?php echo e(route('achievements.show', $achievement->slug)); ?>" class="inline-flex items-center text-sm font-bold text-charcoal-900 hover:text-amber-600 transition-colors focus:outline-none group-hover:text-amber-600">
                                            Lihat Detail
                                            <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </a>
                                        <svg class="w-6 h-6 text-charcoal-200 group-hover:text-amber-300 transition-colors" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.984 3.984 0 01-3-1.383A3.984 3.984 0 019 15a3.984 3.984 0 01-3-1.383A3.989 3.989 0 013.285 13.9l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L10 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274zm-5-2.274L6.618 9.38l1.83 5.7c.456.345 1.025.545 1.63.545.605 0 1.174-.2 1.63-.545l1.83-5.7L10 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($achievements->hasPages()): ?>
                    <div class="mt-16 reveal-on-scroll reveal-up">
                        <?php if (isset($component)) { $__componentOriginaldf5742675780a490b7a0b98d0252ff52 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf5742675780a490b7a0b98d0252ff52 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.divider','data' => ['class' => 'mb-10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-10']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf5742675780a490b7a0b98d0252ff52)): ?>
<?php $attributes = $__attributesOriginaldf5742675780a490b7a0b98d0252ff52; ?>
<?php unset($__attributesOriginaldf5742675780a490b7a0b98d0252ff52); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf5742675780a490b7a0b98d0252ff52)): ?>
<?php $component = $__componentOriginaldf5742675780a490b7a0b98d0252ff52; ?>
<?php unset($__componentOriginaldf5742675780a490b7a0b98d0252ff52); ?>
<?php endif; ?>
                        <div class="flex justify-center">
                            <?php echo e($achievements->links()); ?>

                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal264d3cdba9db237c49d9665edc40da42)): ?>
<?php $attributes = $__attributesOriginal264d3cdba9db237c49d9665edc40da42; ?>
<?php unset($__attributesOriginal264d3cdba9db237c49d9665edc40da42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal264d3cdba9db237c49d9665edc40da42)): ?>
<?php $component = $__componentOriginal264d3cdba9db237c49d9665edc40da42; ?>
<?php unset($__componentOriginal264d3cdba9db237c49d9665edc40da42); ?>
<?php endif; ?>
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



<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\frontend\achievements\index.blade.php ENDPATH**/ ?>