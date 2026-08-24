<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => $job->title . ' - ' . ($job->industryPartner->name ?? 'BKK'),'description' => Str::limit(strip_tags($job->description), 150)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($job->title . ' - ' . ($job->industryPartner->name ?? 'BKK')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Str::limit(strip_tags($job->description), 150))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <!-- Header Page -->
    <div class="bg-charcoal-50 py-16 lg:py-24 relative overflow-hidden border-b border-charcoal-200">
        <!-- Abstract Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 text-center max-w-4xl mx-auto reveal-on-scroll reveal-up']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 text-center max-w-4xl mx-auto reveal-on-scroll reveal-up']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <div class="flex justify-center mb-6">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black tracking-widest uppercase bg-amber-100 text-amber-700 border border-amber-200 shadow-sm">
                    Bursa Kerja Khusus
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-charcoal-900 mb-6 leading-[1.15] tracking-tight"><?php echo e($job->title); ?></h1>
            
            <div class="flex flex-wrap items-center justify-center text-charcoal-600 text-sm gap-y-4 gap-x-6 mt-6 font-semibold">
                <span class="flex items-center bg-white px-4 py-2.5 rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-5 h-5 mr-2.5 opacity-70 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <?php echo e($job->industryPartner->name ?? 'Perusahaan Rahasia'); ?>

                </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->location): ?>
                <span class="flex items-center bg-white px-4 py-2.5 rounded-xl border border-charcoal-200 shadow-sm">
                    <svg class="w-5 h-5 mr-2.5 opacity-70 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <?php echo e($job->location); ?>

                </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
    </div>

    <!-- Breadcrumbs -->
    <div class="bg-white border-b border-charcoal-100 hidden md:block">
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

            <?php if (isset($component)) { $__componentOriginal98ae32034a5e9865062f4201185788de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal98ae32034a5e9865062f4201185788de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.breadcrumbs','data' => ['items' => [
                'BKK' => route('jobs.index'),
                Str::limit($job->title, 40) => '#'
            ],'class' => 'py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                'BKK' => route('jobs.index'),
                Str::limit($job->title, 40) => '#'
            ]),'class' => 'py-4']); ?>
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
    </div>
    
    <div class="md:hidden">
        <?php if (isset($component)) { $__componentOriginal98ae32034a5e9865062f4201185788de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal98ae32034a5e9865062f4201185788de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.breadcrumbs','data' => ['items' => [
            'BKK' => route('jobs.index'),
            Str::limit($job->title, 20) => '#'
        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
            'BKK' => route('jobs.index'),
            Str::limit($job->title, 20) => '#'
        ])]); ?>
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
    </div>

    <article class="bg-white py-12 lg:py-20 min-h-[50vh] reveal-on-scroll reveal-up">
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'max-w-4xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-4xl']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            
            <div class="bg-white rounded-3xl shadow-xl shadow-charcoal-900/5 border border-charcoal-100 overflow-hidden mb-12">
                <!-- Info Header -->
                <div class="bg-charcoal-50 p-6 sm:p-8 lg:p-10 border-b border-charcoal-100 relative overflow-hidden">
                    <!-- Accent Line -->
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-amber-400"></div>

                    <div class="flex flex-col sm:flex-row gap-6 lg:gap-8 items-center sm:items-start text-center sm:text-left">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->industryPartner && $job->industryPartner->logo): ?>
                            <div class="w-24 h-24 sm:w-32 sm:h-32 bg-white rounded-2xl border border-charcoal-200 flex items-center justify-center p-4 shadow-sm shrink-0 mt-2">
                                <img src="<?php echo e(Storage::url($job->industryPartner->logo)); ?>" alt="<?php echo e($job->industryPartner->name); ?>" class="w-full h-full object-contain">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <div class="flex-grow w-full">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                                <div class="bg-white p-4 rounded-xl border border-charcoal-100 text-center sm:text-left shadow-sm">
                                    <span class="flex items-center justify-center sm:justify-start text-[11px] text-charcoal-500 uppercase tracking-widest font-black mb-1.5">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        Tipe Pekerjaan
                                    </span>
                                    <span class="text-charcoal-900 font-bold"><?php echo e($job->employment_type ?? '-'); ?></span>
                                </div>
                                <div class="bg-white p-4 rounded-xl border border-charcoal-100 text-center sm:text-left shadow-sm">
                                    <span class="flex items-center justify-center sm:justify-start text-[11px] text-charcoal-500 uppercase tracking-widest font-black mb-1.5">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Estimasi Gaji
                                    </span>
                                    <span class="text-charcoal-900 font-bold"><?php echo e($job->salary_text ?? 'Kompetitif'); ?></span>
                                </div>
                                <div class="bg-white p-4 rounded-xl border border-charcoal-100 text-center sm:text-left shadow-sm sm:col-span-2">
                                    <span class="flex items-center justify-center sm:justify-start text-[11px] text-charcoal-500 uppercase tracking-widest font-black mb-1.5">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-charcoal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Batas Akhir Pendaftaran
                                    </span>
                                    <span class="<?php echo e($job->application_deadline && $job->application_deadline->isPast() ? 'text-primary-600' : 'text-charcoal-900'); ?> font-bold text-lg">
                                        <?php echo e($job->application_deadline ? $job->application_deadline->translatedFormat('d F Y') : 'Tidak Ditentukan'); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 sm:p-8 lg:p-10 space-y-12">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->description): ?>
                    <div>
                        <h2 class="text-xl lg:text-2xl font-bold text-charcoal-900 mb-6 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center mr-3 shadow-sm border border-amber-200 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                            Deskripsi Pekerjaan
                        </h2>
                        <div class="prose prose-lg md:prose-xl prose-charcoal max-w-none prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-li:text-charcoal-700"><?php echo \App\Support\HtmlSanitizer::clean($job->description); ?></div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->requirements): ?>
                    <div>
                        <h2 class="text-xl lg:text-2xl font-bold text-charcoal-900 mb-6 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3 shadow-sm border border-emerald-200 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                            Persyaratan
                        </h2>
                        <div class="prose prose-lg md:prose-xl prose-charcoal max-w-none prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-li:text-charcoal-700"><?php echo \App\Support\HtmlSanitizer::clean($job->requirements); ?></div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->responsibilities): ?>
                    <div>
                        <h2 class="text-xl lg:text-2xl font-bold text-charcoal-900 mb-6 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mr-3 shadow-sm border border-blue-200 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                            Tanggung Jawab
                        </h2>
                        <div class="prose prose-lg md:prose-xl prose-charcoal max-w-none prose-a:text-primary-600 hover:prose-a:text-primary-700 prose-headings:text-charcoal-900 prose-p:text-charcoal-700 prose-li:text-charcoal-700"><?php echo \App\Support\HtmlSanitizer::clean($job->responsibilities); ?></div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <div class="bg-charcoal-900 border border-charcoal-800 p-8 lg:p-10 rounded-3xl text-center sm:text-left relative overflow-hidden mt-8 shadow-xl shadow-charcoal-900/10">
                        <!-- BG Element -->
                        <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                            <svg class="w-64 h-64 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>

                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold text-white mb-2">Tertarik Melamar Posisi Ini?</h3>
                            <p class="text-charcoal-300 mb-8 max-w-2xl">Siapkan berkas lamaran dan Curriculum Vitae (CV) terbaik Anda. Segera lakukan pendaftaran sebelum batas akhir pengumpulan ditutup.</p>
                            
                            <div class="flex flex-col sm:flex-row gap-4 items-center sm:justify-start">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->application_url): ?>
                                    <a href="<?php echo e($job->application_url); ?>" target="_blank" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3.5 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-500 transition-colors shadow-lg shadow-primary-900/20 focus:ring-4 focus:ring-primary-500/50">
                                        Lamar via Website
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->application_email): ?>
                                    <a href="mailto:<?php echo e($job->application_email); ?>" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3.5 bg-white/10 text-white border border-white/20 font-bold rounded-xl hover:bg-white/20 transition-colors focus:ring-4 focus:ring-white/10">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        Kirim Lamaran via Email
                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$job->application_url && !$job->application_email): ?>
                                    <div class="flex items-center p-4 bg-amber-500/10 border border-amber-500/20 rounded-xl text-amber-300 w-full sm:w-auto text-left">
                                        <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <p class="text-sm font-medium">Hubungi Bursa Kerja Khusus (BKK) secara langsung untuk informasi pendaftaran posisi ini.</p>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="text-center mt-6">
                <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('jobs.index')).'','variant' => 'outline','class' => 'group']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('jobs.index')).'','variant' => 'outline','class' => 'group']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <svg class="w-5 h-5 mr-2 text-charcoal-400 group-hover:text-primary-500 transition-colors group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Bursa Kerja Khusus
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
    </article>
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
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\frontend\jobs\show.blade.php ENDPATH**/ ?>