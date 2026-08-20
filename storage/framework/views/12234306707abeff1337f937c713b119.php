<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Guru & Tenaga Pendidik']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Guru & Tenaga Pendidik']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php $__env->startPush('json-ld'); ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Profil Guru & Tenaga Pengajar",
      "description": "Profil tenaga pendidik profesional dan berpengalaman di bidang teknik otomotif."
    }
    </script>
    <?php $__env->stopPush(); ?>

    <?php
        $headOfDepartment = $teachers->where('is_head_of_department', true)->first();
        $teachingStaff = $teachers->where('is_head_of_department', false)->sortBy('name')->values();
    ?>

    <!-- SECTION A — ACADEMIC PEOPLE HERO -->
    <section class="relative bg-white pt-24 pb-16 lg:pt-32 lg:pb-24 border-b border-charcoal-200 overflow-hidden">
        <!-- Abstract Technical Pattern -->
        <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 1px 1px, #94a3b8 1px, transparent 0); background-size: 24px 24px;"></div>
        
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php if (isset($component)) { $__componentOriginal98ae32034a5e9865062f4201185788de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal98ae32034a5e9865062f4201185788de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.breadcrumbs','data' => ['items' => ['Akademik' => '#', 'Guru & Staf' => route('academic.teachers')],'class' => 'mb-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Akademik' => '#', 'Guru & Staf' => route('academic.teachers')]),'class' => 'mb-8']); ?>
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
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-end">
                <div class="lg:col-span-8 reveal-on-scroll reveal-up">
                    <?php if (isset($component)) { $__componentOriginalac1079511a1017c8db3b04bb1937d3e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.eyebrow','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
ACADEMIC STAFF <?php echo $__env->renderComponent(); ?>
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
                        Guru &<br class="hidden sm:block"> Tenaga Pendidik
                    </h1>
                    <p class="text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl border-l-2 border-primary-600 pl-4">
                        Di balik kurikulum dan fasilitas modern, terdapat tenaga pendidik bersertifikasi yang berdedikasi penuh untuk mentransfer pengetahuan dan membimbing keterampilan peserta didik.
                    </p>
                </div>
                
                <div class="lg:col-span-4 reveal-on-scroll reveal-up delay-100 hidden lg:flex flex-col items-end pb-2">
                    <div class="text-right">
                        <span class="block text-4xl font-extrabold text-charcoal-900"><?php echo e(count($teachers)); ?></span>
                        <span class="block text-xs font-bold text-charcoal-500 uppercase tracking-widest mt-1">Tenaga Profesional</span>
                    </div>
                </div>
            </div>
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

    <!-- SECTION B & C — HEAD OF DEPARTMENT & TEACHING TEAM -->
    <section class="bg-charcoal-50 py-16 lg:py-24">
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

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($teachers) === 0): ?>
                <div class="py-20 reveal-on-scroll reveal-up">
                    <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Belum Ada Data Guru','message' => 'Data tenaga pendidik belum ditambahkan saat ini.','icon' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Data Guru','message' => 'Data tenaga pendidik belum ditambahkan saat ini.','icon' => 'document']); ?>
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
                
                <!-- SECTION B — HEAD OF DEPARTMENT FEATURE -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headOfDepartment): ?>
                    <div class="mb-24 reveal-on-scroll reveal-up">
                        <div class="flex items-center mb-8">
                            <h2 class="text-xs font-bold uppercase tracking-widest text-charcoal-500">Head of Department</h2>
                            <div class="h-px bg-charcoal-200 flex-grow ml-4"></div>
                        </div>

                        <div class="bg-charcoal-900 rounded-3xl overflow-hidden shadow-sm flex flex-col md:flex-row group">
                            <!-- Visual Anchor -->
                            <div class="w-full md:w-2/5 aspect-[4/5] md:aspect-auto relative bg-charcoal-800 border-r border-charcoal-700/50">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headOfDepartment->photo): ?>
                                    <img src="<?php echo e(Storage::url($headOfDepartment->photo)); ?>" alt="<?php echo e($headOfDepartment->name); ?>" class="w-full h-full object-cover object-top mix-blend-luminosity opacity-80 group-hover:opacity-100 group-hover:mix-blend-normal transition-all duration-700" loading="eager">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-charcoal-600 bg-charcoal-800">
                                        <svg class="w-24 h-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-charcoal-900 via-transparent to-transparent md:bg-gradient-to-r opacity-60"></div>
                            </div>
                            
                            <!-- Profile Information -->
                            <div class="w-full md:w-3/5 p-8 md:p-12 lg:p-16 flex flex-col justify-center relative">
                                <div class="absolute top-0 right-0 p-8 hidden lg:block opacity-10">
                                    <svg class="w-24 h-24 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"/></svg>
                                </div>
                                
                                <span class="inline-block px-3 py-1 bg-primary-500/10 text-primary-400 text-xs font-bold uppercase tracking-widest rounded-full mb-6 max-w-max border border-primary-500/20">Kepala Jurusan</span>
                                
                                <h3 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-2 group-hover:text-primary-400 transition-colors">
                                    <?php echo e($headOfDepartment->name); ?>

                                </h3>
                                <p class="text-lg text-primary-400 font-medium mb-8"><?php echo e($headOfDepartment->position ?? 'Tenaga Pendidik'); ?></p>
                                
                                <div class="space-y-4">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headOfDepartment->nip): ?>
                                        <div class="flex flex-col">
                                            <span class="text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-1">Nomor Induk (NIP)</span>
                                            <span class="text-charcoal-300 font-mono text-sm bg-charcoal-800/50 px-3 py-2 rounded border border-charcoal-700 max-w-max"><?php echo e($headOfDepartment->nip); ?></span>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <!-- SECTION C — TEACHING TEAM -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($teachingStaff->count() > 0): ?>
                    <div class="reveal-on-scroll reveal-up <?php echo e($headOfDepartment ? 'delay-100' : ''); ?>">
                        <div class="flex items-center mb-8">
                            <h2 class="text-xs font-bold uppercase tracking-widest text-charcoal-500">Teaching Team</h2>
                            <div class="h-px bg-charcoal-200 flex-grow ml-4"></div>
                        </div>

                        <!-- Editorial Staff Listing -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $teachingStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div class="group flex flex-col relative reveal-on-scroll reveal-fade delay-[<?php echo e(($index % 3) * 100); ?>ms]">
                                    <!-- Visual -->
                                    <div class="w-full aspect-square bg-charcoal-200 rounded-2xl overflow-hidden mb-6 relative">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($teacher->photo): ?>
                                            <img src="<?php echo e(Storage::url($teacher->photo)); ?>" alt="<?php echo e($teacher->name); ?>" class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 group-hover:scale-[1.02] transition-all duration-500" loading="lazy">
                                        <?php else: ?>
                                            <div class="w-full h-full flex flex-col items-center justify-center text-charcoal-400 bg-charcoal-100">
                                                <svg class="w-16 h-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="absolute inset-0 border border-black/5 rounded-2xl pointer-events-none group-hover:border-primary-500/30 transition-colors"></div>
                                        <!-- Index -->
                                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-charcoal-900 font-bold font-mono text-xs px-2 py-1 rounded shadow-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                            <?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?>

                                        </div>
                                    </div>
                                    
                                    <!-- Meta -->
                                    <div class="flex-grow flex flex-col border-l-2 border-transparent group-hover:border-primary-500 pl-4 transition-colors">
                                        <h3 class="text-xl font-bold text-charcoal-900 mb-1 leading-tight group-hover:text-primary-600 transition-colors">
                                            <?php echo e($teacher->name); ?>

                                        </h3>
                                        <p class="text-sm font-semibold text-primary-600 mb-3"><?php echo e($teacher->position ?? 'Tenaga Pendidik'); ?></p>
                                        
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($teacher->nip): ?>
                                            <p class="text-xs text-charcoal-500 font-mono mt-auto pt-4 border-t border-charcoal-200">
                                                NIP. <?php echo e($teacher->nip); ?>

                                            </p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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

    <!-- SECTION E — ACADEMIC ECOSYSTEM CTA -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-white text-center border-t border-charcoal-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-white text-center border-t border-charcoal-200']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

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

            <div class="max-w-3xl mx-auto reveal-on-scroll reveal-up">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mb-6">Explore the Academic Ecosystem</h2>
                <p class="text-lg text-charcoal-600 mb-10 leading-relaxed">Selain tim pengajar profesional, kenali juga program keahlian yang kami tawarkan beserta fasilitas penunjangnya.</p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.programs')).'','class' => 'w-full sm:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.programs')).'','class' => 'w-full sm:w-auto']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Program & Kompetensi
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $attributes = $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $component = $__componentOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.facilities')).'','variant' => 'outline','class' => 'w-full sm:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.facilities')).'','variant' => 'outline','class' => 'w-full sm:w-auto']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Fasilitas Bengkel
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $attributes = $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__attributesOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7)): ?>
<?php $component = $__componentOriginal4790532a04fde6528e82c3998ebdc4a7; ?>
<?php unset($__componentOriginal4790532a04fde6528e82c3998ebdc4a7); ?>
<?php endif; ?>
                </div>
            </div>
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
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3709a60425609ff17b7472c44e8aa0b)): ?>
<?php $attributes = $__attributesOriginald3709a60425609ff17b7472c44e8aa0b; ?>
<?php unset($__attributesOriginald3709a60425609ff17b7472c44e8aa0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3709a60425609ff17b7472c44e8aa0b)): ?>
<?php $component = $__componentOriginald3709a60425609ff17b7472c44e8aa0b; ?>
<?php unset($__componentOriginald3709a60425609ff17b7472c44e8aa0b); ?>
<?php endif; ?>

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
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/frontend/academic/teachers.blade.php ENDPATH**/ ?>