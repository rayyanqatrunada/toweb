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
    <section class="relative bg-charcoal-50 overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-28">
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
                    <div class="flex items-center gap-4 text-sm font-medium text-charcoal-500">
                        <div class="flex -space-x-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $alumnis->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <img class="w-8 h-8 rounded-full border-2 border-white object-cover" src="<?php echo e($alumni->photo ? Storage::url($alumni->photo) : 'https://ui-avatars.com/api/?name='.urlencode($alumni->name).'&background=random'); ?>" alt="Alumni">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <p>Bergabunglah dengan <span class="font-bold text-charcoal-900"><?php echo e($alumniCount ?: 1200); ?>+</span> alumni sukses kami.</p>
                    </div>
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

    <!-- 02. SOCIAL PROOF: PARTNER LOGOS -->
    <section class="py-10 bg-white border-y border-charcoal-100 overflow-hidden">
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

            <p class="text-center text-xs font-bold text-charcoal-400 uppercase tracking-widest mb-6">Telah dipercaya oleh <?php echo e($partnerCount ?: 10); ?>+ Mitra Industri Strategis</p>
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

    <!-- 03. BENEFITS SECTION -->
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
                <h2 class="text-3xl lg:text-4xl font-black text-charcoal-950 tracking-tight mb-4">Mengapa Memilih Teknik Otomotif Kami?</h2>
                <p class="text-lg text-charcoal-600 font-medium">Kami memadukan teori terapan dan praktik intensif untuk memastikan lulusan siap kerja langsung di hari pertama.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Benefit 1: Kurikulum -->
                <div class="bg-white p-8 rounded-3xl border border-charcoal-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all reveal-on-scroll reveal-up delay-100">
                    <div class="w-14 h-14 bg-primary-50 rounded-2xl flex items-center justify-center text-primary-600 mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-3">Kurikulum Penyelarasan Industri</h3>
                    <p class="text-charcoal-600 font-medium mb-6">Materi pembelajaran selalu diupdate berdasarkan masukan dari perusahaan otomotif terkemuka (Link & Match).</p>
                    <a href="<?php echo e(route('academic.programs')); ?>" class="text-primary-600 font-bold text-sm flex items-center hover:text-primary-700">Pelajari Kurikulum <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                </div>

                <!-- Benefit 2: Fasilitas -->
                <div class="bg-white p-8 rounded-3xl border border-charcoal-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all reveal-on-scroll reveal-up delay-200">
                    <div class="w-14 h-14 bg-primary-50 rounded-2xl flex items-center justify-center text-primary-600 mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-3">Fasilitas Bengkel Standar Dealer</h3>
                    <p class="text-charcoal-600 font-medium mb-6">Praktik menggunakan peralatan diagnostic modern dan kendaraan riil yang umum digunakan di bengkel resmi.</p>
                    <a href="<?php echo e(route('academic.facilities')); ?>" class="text-primary-600 font-bold text-sm flex items-center hover:text-primary-700">Lihat Fasilitas <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                </div>

                <!-- Benefit 3: Penyaluran Kerja -->
                <div class="bg-white p-8 rounded-3xl border border-charcoal-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all reveal-on-scroll reveal-up delay-300">
                    <div class="w-14 h-14 bg-primary-50 rounded-2xl flex items-center justify-center text-primary-600 mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-charcoal-900 mb-3">Bursa Kerja Khusus Aktif</h3>
                    <p class="text-charcoal-600 font-medium mb-6">Sekolah aktif menjembatani lulusan dengan lowongan kerja eksklusif langsung dari mitra industri.</p>
                    <a href="<?php echo e(route('jobs.index')); ?>" class="text-primary-600 font-bold text-sm flex items-center hover:text-primary-700">Info Lowongan <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
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

    <!-- 04. SOCIAL PROOF: TESTIMONIALS -->
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
                        <img src="<?php echo e($alumni->photo ? Storage::url($alumni->photo) : 'https://ui-avatars.com/api/?name='.urlencode($alumni->name).'&background=random'); ?>" alt="<?php echo e($alumni->name); ?>" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <p class="font-bold text-charcoal-900"><?php echo e($alumni->name); ?></p>
                            <p class="text-xs text-charcoal-500 font-medium"><?php echo e($alumni->current_job ?? 'Alumni'); ?> di <?php echo e($alumni->current_company ?? 'Perusahaan Otomotif'); ?></p>
                        </div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div class="text-center mt-10">
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

    <!-- 05. FAQ SECTION -->
    <section class="py-20 lg:py-28 bg-charcoal-50" x-data="{ activeAccordion: null }">
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
                    <div class="bg-white border border-charcoal-200 rounded-2xl overflow-hidden transition-all duration-300">
                        <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none">
                            <span class="font-bold text-charcoal-900">Apakah ada jaminan kerja setelah lulus?</span>
                            <svg class="w-5 h-5 text-charcoal-400 transform transition-transform duration-300" :class="activeAccordion === 1 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeAccordion === 1" x-collapse x-cloak>
                            <div class="px-6 pb-5 text-charcoal-600 font-medium leading-relaxed">
                                Kami memiliki unit Bursa Kerja Khusus (BKK) yang aktif menyalurkan lulusan. Meskipun bukan "jaminan mutlak", rekam jejak kami menunjukkan mayoritas lulusan langsung terserap di perusahaan mitra industri yang bekerjasama dengan kami.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-white border border-charcoal-200 rounded-2xl overflow-hidden transition-all duration-300">
                        <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none">
                            <span class="font-bold text-charcoal-900">Berapa lama kegiatan Praktik Kerja Lapangan (PKL) dilaksanakan?</span>
                            <svg class="w-5 h-5 text-charcoal-400 transform transition-transform duration-300" :class="activeAccordion === 2 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="activeAccordion === 2" x-collapse x-cloak>
                            <div class="px-6 pb-5 text-charcoal-600 font-medium leading-relaxed">
                                Sesuai kurikulum vokasi, PKL (Praktik Kerja Lapangan) wajib dilaksanakan selama 6 bulan (1 semester penuh) agar siswa benar-benar memahami budaya dan etos kerja industri.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white border border-charcoal-200 rounded-2xl overflow-hidden transition-all duration-300">
                        <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none">
                            <span class="font-bold text-charcoal-900">Apakah pendaftaran siswa baru sudah dibuka?</span>
                            <svg class="w-5 h-5 text-charcoal-400 transform transition-transform duration-300" :class="activeAccordion === 3 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
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

    <!-- 06. FINAL CTA SECTION -->
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
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/frontend/home.blade.php ENDPATH**/ ?>