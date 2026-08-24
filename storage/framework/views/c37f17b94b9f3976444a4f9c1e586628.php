<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Beranda']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Beranda']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php $__env->startPush('json-ld'); ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "<?php echo e($settings->get('site_name', 'Teknik Otomotif')); ?>",
      "url": "<?php echo e(url('/')); ?>",
      "logo": "<?php echo e(url('/logo.png')); ?>"
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "<?php echo e(url('/')); ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo e(url('/search')); ?>?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    <?php $__env->stopPush(); ?>

    <!-- 01. HERO SECTION (Split Layout) -->
    <section class="relative bg-charcoal-50 overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-28 border-b border-charcoal-200">
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

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">
                <!-- Left: Copy -->
                <div class="reveal-on-scroll reveal-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-charcoal-200 shadow-sm text-xs font-bold text-primary-600 mb-6 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-primary-600 animate-pulse"></span>
                        Pusat Keunggulan Vokasi
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-charcoal-950 tracking-tight leading-[1.1] mb-6">
                        Langkah Pasti Menuju Karier <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-primary-400">Otomotif Profesional</span>
                    </h1>
                    <p class="text-lg text-charcoal-600 font-medium leading-relaxed mb-8 max-w-xl">
                        <?php echo \App\Support\HtmlSanitizer::clean($settings->get('hero_subtitle', 'Kurikulum berbasis industri, fasilitas praktik berstandar bengkel resmi, dan jaminan penyaluran kerja ke puluhan perusahaan mitra strategis kami.')); ?>

                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-4 mb-10">
                        <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.programs')).'','variant' => 'primary','size' => 'lg','class' => 'w-full sm:w-auto shadow-xl shadow-primary-600/20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.programs')).'','variant' => 'primary','size' => 'lg','class' => 'w-full sm:w-auto shadow-xl shadow-primary-600/20']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            Lihat Program Studi
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('jobs.index')).'','variant' => 'outline','size' => 'lg','class' => 'w-full sm:w-auto bg-white hover:bg-charcoal-50 border-charcoal-200 text-charcoal-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('jobs.index')).'','variant' => 'outline','size' => 'lg','class' => 'w-full sm:w-auto bg-white hover:bg-charcoal-50 border-charcoal-200 text-charcoal-800']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            Bursa Kerja (BKK)
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
                    <!-- Microcopy Reviews / Trust -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($alumnis->isNotEmpty()): ?>
                    <div class="flex items-center gap-4 text-sm font-medium text-charcoal-500">
                        <div class="flex -space-x-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $alumnis->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <img class="w-8 h-8 rounded-full border-2 border-white object-cover" src="<?php echo e($alumni->photo ? Storage::url($alumni->photo) : 'https://ui-avatars.com/api/?name='.urlencode($alumni->name).'&background=random'); ?>" alt="Alumni">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <p>Bergabunglah dengan <span class="font-bold text-charcoal-900"><?php echo e($alumniCount ?: 1200); ?>+</span> alumni sukses kami.</p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <!-- Right: Image/Video -->
                <div class="relative reveal-on-scroll reveal-right delay-200">
                    <div class="absolute -inset-4 bg-primary-100 rounded-[2.5rem] transform -rotate-3 z-0"></div>
                    <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="<?php echo e($settings->get('hero_image') ? Storage::url($settings->get('hero_image')) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1200&auto=format&fit=crop'); ?>" alt="Kegiatan Praktik Siswa" class="w-full h-auto object-cover aspect-[4/3] lg:aspect-[3/4]">
                    </div>
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-charcoal-100 z-20 flex items-center gap-4 animate-bounce-slow">
                        <div class="w-12 h-12 bg-primary-50 rounded-full flex items-center justify-center text-primary-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-charcoal-950"><?php echo e($facilityCount ?: 15); ?></p>
                            <p class="text-xs font-bold text-charcoal-500 uppercase tracking-widest">Fasilitas Standar</p>
                        </div>
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

    <!-- 02. QUICK STATS SECTION -->
    <section class="bg-primary-900 border-y border-primary-800 text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,100 L100,0 L100,100 Z" fill="currentColor" />
            </svg>
        </div>
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

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-4 divide-y md:divide-y-0 md:divide-x divide-primary-700 text-center reveal-on-scroll reveal-up">
                <div class="pt-4 md:pt-0">
                    <p class="text-4xl lg:text-5xl font-black text-white mb-2"><?php echo e($alumniCount ?: 1200); ?><span class="text-primary-400">+</span></p>
                    <p class="text-sm font-bold text-primary-200 uppercase tracking-widest">Lulusan Sukses</p>
                </div>
                <div class="pt-8 md:pt-0">
                    <p class="text-4xl lg:text-5xl font-black text-white mb-2"><?php echo e($partnerCount ?: 50); ?><span class="text-primary-400">+</span></p>
                    <p class="text-sm font-bold text-primary-200 uppercase tracking-widest">Mitra Industri</p>
                </div>
                <div class="pt-8 md:pt-0">
                    <p class="text-4xl lg:text-5xl font-black text-white mb-2"><?php echo e($achievementCount ?: 100); ?><span class="text-primary-400">+</span></p>
                    <p class="text-sm font-bold text-primary-200 uppercase tracking-widest">Prestasi Diraih</p>
                </div>
                <div class="pt-8 md:pt-0">
                    <p class="text-4xl lg:text-5xl font-black text-white mb-2"><?php echo e($facilityCount ?: 15); ?></p>
                    <p class="text-sm font-bold text-primary-200 uppercase tracking-widest">Fasilitas Praktik</p>
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

    <!-- 03. SAMBUTAN KAPROG -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headOfDepartment): ?>
    <section class="py-20 lg:py-28 bg-white overflow-hidden border-b border-charcoal-100">
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

            <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-16">
                <div class="md:w-5/12 reveal-on-scroll reveal-left">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary-100 rounded-[2.5rem] transform rotate-3 z-0"></div>
                        <img src="<?php echo e($headOfDepartment->photo ? Storage::url($headOfDepartment->photo) : 'https://ui-avatars.com/api/?name='.urlencode($headOfDepartment->name).'&background=random'); ?>" alt="<?php echo e($headOfDepartment->name); ?>" class="relative z-10 w-full h-auto object-cover rounded-3xl shadow-xl aspect-square">
                        <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm p-4 rounded-2xl shadow-lg border border-white z-20 text-center">
                            <p class="font-black text-charcoal-900"><?php echo e($headOfDepartment->name); ?></p>
                            <p class="text-xs font-bold text-primary-600 uppercase tracking-wider">Kepala Program Keahlian</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-7/12 reveal-on-scroll reveal-right">
                    <?php if (isset($component)) { $__componentOriginalac1079511a1017c8db3b04bb1937d3e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.eyebrow','data' => ['class' => 'text-primary-600 mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-primary-600 mb-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Sambutan <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                    <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-6">Membentuk SDM Otomotif Berdaya Saing Global</h2>
                    <blockquote class="text-lg lg:text-xl text-charcoal-600 font-medium leading-relaxed italic mb-8 border-l-4 border-primary-500 pl-6">
                        "Berkomitmen penuh mengintegrasikan pendidikan vokasi dengan tuntutan dunia kerja riil. Kami membekali siswa tidak hanya dengan keterampilan teknis mutakhir, tetapi juga etos kerja dan karakter tangguh yang dibutuhkan industri otomotif masa kini."
                    </blockquote>
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('about')).'','variant' => 'outline','class' => 'border-charcoal-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'','variant' => 'outline','class' => 'border-charcoal-200']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Kenali Kami Lebih Dekat
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
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- 04. PROGRAM KEAHLIAN -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($programs->isNotEmpty()): ?>
    <section class="py-20 lg:py-28 bg-charcoal-50">
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

            <div class="text-center max-w-3xl mx-auto mb-16 reveal-on-scroll reveal-up">
                <?php if (isset($component)) { $__componentOriginalac1079511a1017c8db3b04bb1937d3e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.eyebrow','data' => ['class' => 'text-primary-600 mb-4 justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-primary-600 mb-4 justify-center']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Program Kami <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-4">Pilihan Kompetensi Keahlian</h2>
                <p class="text-lg text-charcoal-600 font-medium">Program keahlian spesifik yang dirancang selaras dengan kebutuhan kompetensi di berbagai sektor otomotif.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-white p-8 rounded-3xl border border-charcoal-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100 % 300); ?>">
                    <div class="w-16 h-16 bg-primary-50 text-primary-600 rounded-2xl flex items-center justify-center mb-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Str::contains(strtolower($program->name), 'kendaraan ringan')): ?>
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        <?php elseif(Str::contains(strtolower($program->name), 'sepeda motor')): ?>
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        <?php else: ?>
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-4"><?php echo e($program->name); ?></h3>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->competencies->isNotEmpty()): ?>
                        <ul class="space-y-3 mb-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $program->competencies->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li class="flex items-start text-charcoal-600 font-medium text-sm">
                                <svg class="w-5 h-5 text-emerald-500 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <?php echo e($comp->name); ?>

                            </li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->competencies->count() > 3): ?>
                            <li class="flex items-start text-charcoal-500 font-medium text-sm italic">
                                + <?php echo e($program->competencies->count() - 3); ?> kompetensi lainnya
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <a href="<?php echo e(route('academic.programs')); ?>" class="text-primary-600 font-bold text-sm flex items-center hover:text-primary-700">Detail Program <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- 05. FASILITAS UNGGULAN & KEUNGGULAN -->
    <section class="py-20 lg:py-28 bg-white border-y border-charcoal-100">
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

            <div class="text-center max-w-3xl mx-auto mb-16 reveal-on-scroll reveal-up">
                <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-4">Mengapa Memilih Teknik Otomotif Kami?</h2>
                <p class="text-lg text-charcoal-600 font-medium">Kami memadukan teori terapan dan praktik intensif di fasilitas berstandar industri untuk memastikan lulusan siap kerja.</p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facilities->isNotEmpty()): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-charcoal-50 rounded-3xl overflow-hidden shadow-sm border border-charcoal-100 group reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100 % 300); ?>">
                    <div class="aspect-video relative overflow-hidden bg-charcoal-200">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facility->photo): ?>
                            <img src="<?php echo e(Storage::url($facility->photo)); ?>" alt="<?php echo e($facility->name); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-charcoal-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-charcoal-900 mb-2"><?php echo e($facility->name); ?></h3>
                        <p class="text-sm text-charcoal-600 font-medium line-clamp-2"><?php echo e(strip_tags($facility->description)); ?></p>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div class="text-center mb-16">
                <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.facilities')).'','variant' => 'outline','class' => 'border-charcoal-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.facilities')).'','variant' => 'outline','class' => 'border-charcoal-200']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Lihat Semua Fasilitas
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

    <!-- 06. MITRA INDUSTRI (LOGOS) -->
    <section class="py-12 bg-charcoal-50 overflow-hidden">
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

            <p class="text-center text-xs font-bold text-charcoal-400 uppercase tracking-widest mb-8">Telah dipercaya oleh <?php echo e($partnerCount ?: 10); ?>+ Mitra Industri Strategis</p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partners->isNotEmpty()): ?>
            <div class="flex flex-wrap justify-center items-center gap-8 lg:gap-16 opacity-60 grayscale reveal-on-scroll reveal-up">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <img src="<?php echo e($partner->logo ? Storage::url($partner->logo) : 'https://ui-avatars.com/api/?name='.urlencode($partner->name).'&background=fff&color=000&size=128&bold=true'); ?>" alt="<?php echo e($partner->name); ?>" class="h-8 md:h-12 object-contain hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
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

    <!-- 07. LOWONGAN PEKERJAAN TERBARU (BKK) -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jobVacancies->isNotEmpty()): ?>
    <section class="py-20 lg:py-28 bg-white border-y border-charcoal-100">
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

            <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal-on-scroll reveal-up">
                <div class="max-w-2xl mb-6 md:mb-0">
                    <?php if (isset($component)) { $__componentOriginalac1079511a1017c8db3b04bb1937d3e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.eyebrow','data' => ['class' => 'text-amber-500 mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.eyebrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-amber-500 mb-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Bursa Kerja Khusus <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                    <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-4">Peluang Karir Terbaru</h2>
                    <p class="text-lg text-charcoal-600 font-medium">Temukan lowongan eksklusif langsung dari mitra industri terpercaya kami.</p>
                </div>
                <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('jobs.index')).'','variant' => 'outline','class' => 'border-charcoal-200 hidden md:inline-flex']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('jobs.index')).'','variant' => 'outline','class' => 'border-charcoal-200 hidden md:inline-flex']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Lihat Semua Lowongan
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $jobVacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-white p-6 rounded-3xl border border-charcoal-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col group reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100 % 300); ?>">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-xl border border-charcoal-100 bg-white shadow-sm flex items-center justify-center p-2 shrink-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->industryPartner && $job->industryPartner->logo): ?>
                                <img src="<?php echo e(Storage::url($job->industryPartner->logo)); ?>" alt="Logo" class="w-full h-full object-contain">
                            <?php else: ?>
                                <svg class="w-8 h-8 text-charcoal-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 3.5L18.5 19H5.5L12 5.5z"/></svg>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-1"><?php echo e($job->industryPartner->name ?? 'Perusahaan'); ?></p>
                            <h3 class="font-bold text-charcoal-900 leading-tight group-hover:text-primary-600 transition-colors">
                                <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" class="focus:outline-none before:absolute before:inset-0"><?php echo e($job->title); ?></a>
                            </h3>
                        </div>
                    </div>
                    <div class="mt-auto space-y-3 relative z-10">
                        <div class="flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->location): ?>
                                <span class="px-3 py-1 bg-charcoal-50 text-charcoal-600 text-xs font-semibold rounded-full border border-charcoal-100"><?php echo e($job->location); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($job->work_type): ?>
                                <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-full border border-amber-100"><?php echo e($job->work_type); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div class="text-center mt-10 md:hidden reveal-on-scroll reveal-up">
                <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('jobs.index')).'','variant' => 'outline','class' => 'border-charcoal-200 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('jobs.index')).'','variant' => 'outline','class' => 'border-charcoal-200 w-full']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Lihat Semua Lowongan
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
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- 08. BERITA & PENGUMUMAN -->
    <section class="py-20 lg:py-28 bg-charcoal-50">
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Latest News -->
                <div class="lg:col-span-8 reveal-on-scroll reveal-left">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <h2 class="text-3xl font-black text-charcoal-950 tracking-tight mb-2">Berita Terbaru</h2>
                            <p class="text-charcoal-600 font-medium">Informasi dan liputan kegiatan seputar program keahlian.</p>
                        </div>
                        <a href="<?php echo e(route('news.index')); ?>" class="hidden sm:inline-flex text-primary-600 font-bold hover:text-primary-700 text-sm items-center">
                            Lihat Semua <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                    <div class="space-y-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestNews->isNotEmpty()): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="bg-white rounded-3xl p-4 border border-charcoal-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col sm:flex-row gap-6 group">
                                <div class="w-full sm:w-48 h-48 sm:h-auto rounded-2xl bg-charcoal-100 relative overflow-hidden shrink-0">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->thumbnail): ?>
                                        <img src="<?php echo e(Storage::url($post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center text-charcoal-300">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
                                        <span class="absolute top-3 left-3 bg-primary-600 text-white text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-lg">
                                            <?php echo e($post->category->name); ?>

                                        </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="py-2 pr-4 flex flex-col">
                                    <span class="text-xs font-bold text-charcoal-400 mb-2"><?php echo e($post->published_at ? $post->published_at->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y')); ?></span>
                                    <h3 class="text-xl font-bold text-charcoal-900 leading-tight mb-3 group-hover:text-primary-600 transition-colors">
                                        <a href="<?php echo e(route('news.show', $post->slug)); ?>" class="focus:outline-none before:absolute before:inset-0"><?php echo e($post->title); ?></a>
                                    </h3>
                                    <p class="text-charcoal-600 text-sm font-medium line-clamp-2 mt-auto"><?php echo e($post->excerpt); ?></p>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <?php else: ?>
                            <p class="text-charcoal-500">Belum ada berita terbaru.</p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <!-- Announcements -->
                <div class="lg:col-span-4 reveal-on-scroll reveal-right delay-200">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <h2 class="text-3xl font-black text-charcoal-950 tracking-tight mb-2">Pengumuman</h2>
                            <p class="text-charcoal-600 font-medium">Informasi penting.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl border border-charcoal-200 shadow-sm p-6">
                        <div class="space-y-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($agendas->isNotEmpty()): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div class="group relative pb-6 border-b border-charcoal-100 last:border-0 last:pb-0">
                                    <span class="text-xs font-bold text-primary-600 mb-1 block"><?php echo e($agenda->created_at->translatedFormat('d M Y')); ?></span>
                                    <h3 class="font-bold text-charcoal-900 leading-snug group-hover:text-primary-600 transition-colors">
                                        <a href="<?php echo e(route('announcements.show', $agenda->slug)); ?>" class="focus:outline-none before:absolute before:inset-0"><?php echo e($agenda->title); ?></a>
                                    </h3>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <?php else: ?>
                                <p class="text-charcoal-500 text-sm">Belum ada pengumuman.</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="mt-6 pt-6 border-t border-charcoal-100 text-center">
                            <a href="<?php echo e(route('announcements.index')); ?>" class="text-sm font-bold text-charcoal-600 hover:text-primary-600">Semua Pengumuman &rarr;</a>
                        </div>
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

    <!-- 09. TESTIMONIALS -->
    <section class="py-20 lg:py-28 bg-white border-y border-charcoal-100 overflow-hidden">
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

            <div class="text-center max-w-3xl mx-auto mb-16 reveal-on-scroll reveal-up">
                <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-4">Apa Kata Alumni Kami?</h2>
                <p class="text-lg text-charcoal-600 font-medium">Banyak lulusan kami yang telah menduduki posisi strategis di berbagai perusahaan otomotif.</p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($alumnis->isNotEmpty()): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $alumnis->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-charcoal-50 p-8 rounded-3xl border border-charcoal-100 flex flex-col reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100); ?>">
                    <div class="flex items-center gap-1 text-yellow-400 mb-4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <blockquote class="flex-grow text-charcoal-700 font-medium italic mb-6">
                        "Berkat ilmu teori dan praktik mendalam yang saya dapatkan selama sekolah, saya bisa langsung beradaptasi dengan ritme kerja industri tanpa hambatan."
                    </blockquote>
                    <div class="flex items-center gap-4">
                        <img src="<?php echo e($alumni->photo ? Storage::url($alumni->photo) : 'https://ui-avatars.com/api/?name='.urlencode($alumni->name).'&background=random'); ?>" alt="<?php echo e($alumni->name); ?>" class="w-12 h-12 rounded-full object-cover border border-charcoal-200">
                        <div>
                            <p class="font-bold text-charcoal-900"><?php echo e($alumni->name); ?></p>
                            <p class="text-xs text-charcoal-500 font-medium"><?php echo e($alumni->current_occupation ?? 'Alumni'); ?> di <?php echo e($alumni->current_company ?? 'Perusahaan'); ?></p>
                        </div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div class="text-center mt-10 reveal-on-scroll reveal-up">
                <a href="<?php echo e(route('alumni.index')); ?>" class="inline-flex items-center gap-2 text-charcoal-500 hover:text-primary-600 font-bold transition-colors">Lihat Semua Kisah Alumni <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
            </div>
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

    <!-- 10. GALERI (NEW SECTION) -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($galleries->isNotEmpty()): ?>
    <section class="py-20 bg-charcoal-50 border-t border-charcoal-100">
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

            <div class="flex justify-between items-end mb-12 reveal-on-scroll reveal-up">
                <div>
                    <h2 class="text-3xl font-black text-charcoal-950 tracking-tight mb-2">Galeri Kegiatan</h2>
                    <p class="text-charcoal-600 font-medium">Dokumentasi aktivitas dan praktik.</p>
                </div>
                <a href="<?php echo e(route('gallery.index')); ?>" class="hidden sm:inline-flex text-primary-600 font-bold hover:text-primary-700 text-sm items-center">
                    Semua Galeri <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('gallery.show', $gallery->slug)); ?>" class="block aspect-square rounded-3xl overflow-hidden relative group reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100 % 400); ?>">
                    <img src="<?php echo e($gallery->thumbnail ? Storage::url($gallery->thumbnail) : 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=500&q=80'); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Gallery">
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-bold text-sm line-clamp-2 leading-tight"><?php echo e($gallery->title); ?></p>
                    </div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- 11. FAQ SECTION -->
    <section class="py-20 lg:py-28 bg-white border-y border-charcoal-100" x-data="{ activeAccordion: null }">
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-5 reveal-on-scroll reveal-left">
                    <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-4">Pertanyaan yang Sering Diajukan</h2>
                    <p class="text-lg text-charcoal-600 font-medium mb-8">Punya pertanyaan lain? Jangan ragu untuk menghubungi bagian tata usaha kami.</p>
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('about')).'','variant' => 'outline','class' => 'border-charcoal-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'','variant' => 'outline','class' => 'border-charcoal-200']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Hubungi Kami
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
                
                <div class="lg:col-span-7 space-y-4 reveal-on-scroll reveal-right">
                    <!-- FAQ 1 -->
                    <div class="bg-charcoal-50 border border-charcoal-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary-300 hover:shadow-sm">
                        <button x-on:click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none">
                            <span class="font-bold text-charcoal-900">Apakah ada jaminan kerja setelah lulus?</span>
                            <svg class="w-5 h-5 text-charcoal-400 transform transition-transform duration-300" :class="activeAccordion === 1 ? 'rotate-180 text-primary-500' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeAccordion === 1" x-collapse x-cloak>
                            <div class="px-6 pb-5 text-charcoal-600 font-medium leading-relaxed">
                                Kami memiliki unit Bursa Kerja Khusus (BKK) yang aktif menyalurkan lulusan. Meskipun bukan "jaminan mutlak", rekam jejak kami menunjukkan mayoritas lulusan langsung terserap di perusahaan mitra industri yang bekerjasama dengan kami.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-charcoal-50 border border-charcoal-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary-300 hover:shadow-sm">
                        <button x-on:click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none">
                            <span class="font-bold text-charcoal-900">Berapa lama kegiatan Praktik Kerja Lapangan (PKL) dilaksanakan?</span>
                            <svg class="w-5 h-5 text-charcoal-400 transform transition-transform duration-300" :class="activeAccordion === 2 ? 'rotate-180 text-primary-500' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeAccordion === 2" x-collapse x-cloak>
                            <div class="px-6 pb-5 text-charcoal-600 font-medium leading-relaxed">
                                Sesuai kurikulum vokasi, PKL (Praktik Kerja Lapangan) wajib dilaksanakan selama 6 bulan (1 semester penuh) agar siswa benar-benar memahami budaya dan etos kerja industri.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-charcoal-50 border border-charcoal-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary-300 hover:shadow-sm">
                        <button x-on:click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none">
                            <span class="font-bold text-charcoal-900">Apakah pendaftaran siswa baru sudah dibuka?</span>
                            <svg class="w-5 h-5 text-charcoal-400 transform transition-transform duration-300" :class="activeAccordion === 3 ? 'rotate-180 text-primary-500' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeAccordion === 3" x-collapse x-cloak>
                            <div class="px-6 pb-5 text-charcoal-600 font-medium leading-relaxed">
                                Silakan pantau terus menu Pengumuman dan Berita di website kami. Jadwal Pendaftaran Peserta Didik Baru (PPDB) selalu diperbarui setiap tahun sesuai kalender pendidikan daerah.
                            </div>
                        </div>
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

    <!-- 12. FINAL CTA SECTION -->
    <section class="py-20 lg:py-24 bg-primary-600 text-white relative overflow-hidden">
        <!-- Abstract bg shapes -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 bg-charcoal-900/10 rounded-full blur-3xl"></div>
        
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 text-center max-w-4xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 text-center max-w-4xl']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <h2 class="text-3xl lg:text-5xl font-black tracking-tight mb-6 reveal-on-scroll reveal-up">Siap Memulai Perjalanan Karir Anda?</h2>
            <p class="text-lg text-primary-100 font-medium mb-10 max-w-2xl mx-auto reveal-on-scroll reveal-up delay-100">
                Jadilah bagian dari generasi teknisi otomotif unggul berikutnya. Temukan program studi, eksplorasi fasilitas, dan wujudkan mimpi Anda.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 reveal-on-scroll reveal-up delay-200">
                <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('about')).'','variant' => 'primary','size' => 'lg','class' => 'w-full sm:w-auto bg-white text-primary-600 hover:bg-charcoal-50 border-none shadow-xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'','variant' => 'primary','size' => 'lg','class' => 'w-full sm:w-auto bg-white text-primary-600 hover:bg-charcoal-50 border-none shadow-xl']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Jelajahi Profil Jurusan
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('news.index')).'','variant' => 'outline','size' => 'lg','class' => 'w-full sm:w-auto bg-transparent text-white border-white/30 hover:bg-white/10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('news.index')).'','variant' => 'outline','size' => 'lg','class' => 'w-full sm:w-auto bg-transparent text-white border-white/30 hover:bg-white/10']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Baca Berita Terbaru
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
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\frontend\home.blade.php ENDPATH**/ ?>