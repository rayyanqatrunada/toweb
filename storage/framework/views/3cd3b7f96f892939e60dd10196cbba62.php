<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Program & Kurikulum Akademik']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Program & Kurikulum Akademik']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php $__env->startPush('json-ld'); ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Program & Kurikulum Akademik TBSM",
      "description": "Struktur kurikulum, spesifikasi kompetensi, sertifikasi industri, dan program unggulan Teknik dan Bisnis Sepeda Motor SMK Negeri 1 Bangsri binaan Astra Honda Motor."
    }
    </script>
    <?php $__env->stopPush(); ?>

    <!-- ============================================================================ -->
    <!-- 01. HERO SECTION -->
    <!-- ============================================================================ -->
    <section class="relative bg-charcoal-50 overflow-hidden pt-4 pb-16 lg:pt-8 lg:pb-24 border-b border-charcoal-200">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('header_academic_programs_image')): ?>
            <img src="<?php echo e(Storage::url($settings->get('header_academic_programs_image'))); ?>" alt="Programs Background" class="absolute inset-0 z-0 w-full h-full object-cover opacity-15 pointer-events-none">
        <?php else: ?>
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-charcoal-200/50 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3 z-0"></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        <!-- Subtle Mechanical Grid -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: linear-gradient(to right, #cbd5e1 1px, transparent 1px), linear-gradient(to bottom, #cbd5e1 1px, transparent 1px); background-size: 2.5rem 2.5rem;"></div>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.breadcrumbs','data' => ['items' => ['Akademik' => '#', 'Program & Kurikulum' => route('academic.programs')],'class' => 'mb-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Akademik' => '#', 'Program & Kurikulum' => route('academic.programs')]),'class' => 'mb-8']); ?>
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
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end">
                <div class="lg:col-span-8">
                    <div class="inline-flex items-center gap-2 py-1.5 px-3 rounded-md bg-white border border-charcoal-200 text-[10px] font-black uppercase tracking-widest text-charcoal-900 mb-6 shadow-sm reveal-on-scroll reveal-up">
                        <span class="w-2 h-2 rounded-full bg-primary-600 animate-pulse"></span>
                        <?php echo e($settings->get('academic_hero_badge', 'KURIKULUM & KOMPETENSI KEJURUAN')); ?>

                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-charcoal-950 tracking-tighter leading-[0.95] mb-6 uppercase reveal-on-scroll reveal-up delay-100">
                        <?php echo nl2br(e($settings->get('academic_hero_title', "AKADEMIK & \nKURIKULUM TBSM"))); ?>

                    </h1>
                    
                    <p class="text-base lg:text-lg text-charcoal-600 font-medium leading-relaxed max-w-2xl reveal-on-scroll reveal-up delay-200">
                        <?php echo e($settings->get('academic_hero_subtitle', 'Standar kompetensi kejuruan teknik sepeda motor berbasis industri Astra Honda Motor (AHM) dengan Kurikulum Merdeka terintegrasi, dirancang untuk melahirkan teknisi profesional dan wirausahawan tangguh.')); ?>

                    </p>
                </div>

                <div class="lg:col-span-4 reveal-on-scroll reveal-up delay-300">
                    <div class="bg-white rounded-2xl p-6 border border-charcoal-200 shadow-sm">
                        <div class="flex items-center gap-3 pb-4 mb-4 border-b border-charcoal-100">
                            <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary-600 flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-charcoal-400 uppercase tracking-wider">Mitra Industri Utama</span>
                                <span class="block text-sm font-black text-charcoal-900 uppercase"><?php echo e($settings->get('academic_partner_name', 'Astra Honda Motor (AHASS)')); ?></span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 text-center">
                            <div class="bg-charcoal-50 rounded-xl p-3 border border-charcoal-100">
                                <span class="block text-2xl font-black text-primary-600"><?php echo e($settings->get('academic_praktikum_pct', '70%')); ?></span>
                                <span class="text-[10px] font-bold uppercase text-charcoal-500 tracking-wider"><?php echo e($settings->get('academic_praktikum_label', 'Praktikum & TeFa')); ?></span>
                            </div>
                            <div class="bg-charcoal-50 rounded-xl p-3 border border-charcoal-100">
                                <span class="block text-2xl font-black text-charcoal-900"><?php echo e($settings->get('academic_teori_pct', '30%')); ?></span>
                                <span class="text-[10px] font-bold uppercase text-charcoal-500 tracking-wider"><?php echo e($settings->get('academic_teori_label', 'Teori & K3LH')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Jump Anchor Bar -->
            <div class="mt-12 pt-6 border-t border-charcoal-200/80 flex flex-wrap items-center gap-2 sm:gap-3 text-xs font-bold text-charcoal-600 reveal-on-scroll reveal-up delay-200">
                <span class="text-charcoal-400 uppercase tracking-widest text-[10px] mr-2">Navigasi Halaman:</span>
                <a href="#program-keahlian" class="px-3 py-1.5 rounded-lg bg-white border border-charcoal-200 hover:border-primary-600 hover:text-primary-600 transition-colors shadow-2xs">01. Spesifikasi Kompetensi</a>
                <a href="#struktur-kurikulum" class="px-3 py-1.5 rounded-lg bg-white border border-charcoal-200 hover:border-primary-600 hover:text-primary-600 transition-colors shadow-2xs">02. Peta Kurikulum</a>
                <a href="#sertifikasi" class="px-3 py-1.5 rounded-lg bg-white border border-charcoal-200 hover:border-primary-600 hover:text-primary-600 transition-colors shadow-2xs">03. Sertifikasi LSP & Industri</a>
                <a href="#program-unggulan" class="px-3 py-1.5 rounded-lg bg-white border border-charcoal-200 hover:border-primary-600 hover:text-primary-600 transition-colors shadow-2xs">04. Program Unggulan & TeFa</a>
                <a href="#prospek-karir" class="px-3 py-1.5 rounded-lg bg-white border border-charcoal-200 hover:border-primary-600 hover:text-primary-600 transition-colors shadow-2xs">05. Pilihan Karir</a>
                <a href="#roadmap-akademik" class="px-3 py-1.5 rounded-lg bg-white border border-charcoal-200 hover:border-primary-600 hover:text-primary-600 transition-colors shadow-2xs">06. Alur 3 Tahun</a>
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

    <!-- ============================================================================ -->
    <!-- 02. PROGRAM KEAHLIAN & 4 PILAR KOMPETENSI TEKNIS -->
    <!-- ============================================================================ -->
    <section id="program-keahlian" class="bg-charcoal-50 py-16 lg:py-24 border-b border-charcoal-200 scroll-mt-16">
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

            <div class="max-w-3xl mb-12 reveal-on-scroll reveal-up">
                <div class="inline-block py-1 px-3 rounded bg-primary-50 border border-primary-200 text-[10px] font-black uppercase tracking-widest text-primary-700 mb-3">
                    01 / SPESIFIKASI CAPAIAN
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-charcoal-950 uppercase tracking-tight leading-tight">
                    4 Pilar Kompetensi Teknis
                </h2>
                <p class="mt-3 text-base text-charcoal-600 leading-relaxed">
                    Setiap lulusan dibekali dengan penguasaan modular yang ketat sesuai standar bengkel resmi, mulai dari sistem mekanik mesin hingga manajemen operasional bengkel modern.
                </p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <!-- PROGRAM BENTO CONTAINER -->
                <div id="<?php echo e($program->slug); ?>" class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12 reveal-on-scroll reveal-up">
                    
                    <!-- Left Bento: Program Identity Banner -->
                    <div class="lg:col-span-5 bg-charcoal-900 rounded-3xl p-6 lg:p-8 relative overflow-hidden group shadow-sm flex flex-col justify-between min-h-[340px] lg:min-h-[420px]">
                        <img src="<?php echo e($program->thumbnail ? Storage::url($program->thumbnail) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=800&auto=format&fit=crop'); ?>" alt="<?php echo e($program->name); ?>" class="absolute inset-0 w-full h-full object-cover opacity-45 group-hover:opacity-65 group-hover:scale-105 transition-all duration-700" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/70 to-transparent"></div>
                        
                        <div class="relative z-10 flex items-center justify-between">
                            <span class="inline-block py-1 px-3 rounded bg-white/20 backdrop-blur-md border border-white/20 text-[10px] font-black uppercase tracking-widest text-white">
                                KONSENTRASI KEAHLIAN
                            </span>
                            <span class="text-xs font-mono font-bold text-primary-400">SMKN 1 BANGSRI</span>
                        </div>

                        <div class="relative z-10 mt-auto">
                            <span class="block text-primary-500 text-xs font-bold uppercase tracking-wider mb-2">Binaan Langsung Astra Honda Motor</span>
                            <h3 class="text-2xl lg:text-3xl font-black text-white tracking-tight uppercase leading-tight mb-2">
                                <?php echo e($program->name); ?>

                            </h3>
                            <p class="text-xs text-charcoal-300 line-clamp-2">
                                Pendidikan vokasi dengan kurikulum berstandar industri otomotif nasional dan kesiapan kerja tinggi.
                            </p>
                        </div>
                    </div>

                    <!-- Right Bento: Overview & Scope -->
                    <div class="lg:col-span-7 bg-white rounded-3xl p-6 lg:p-10 border border-charcoal-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between border-b border-charcoal-100 pb-4 mb-6">
                                <span class="text-xs font-black uppercase tracking-widest text-charcoal-400">Ikhtisar Program</span>
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Aktif Terakreditasi
                                </span>
                            </div>

                            <div class="prose prose-charcoal prose-p:leading-relaxed max-w-none mb-6 text-charcoal-700 text-sm lg:text-base">
                                <?php echo \App\Support\HtmlSanitizer::clean($program->description); ?>

                            </div>
                        </div>

                        <div class="pt-6 border-t border-charcoal-100 flex flex-wrap items-center justify-between gap-4 text-xs">
                            <div class="flex items-center gap-2 text-charcoal-500 font-medium">
                                <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Durasi Belajar: <strong>3 Tahun (Fase E & F)</strong>
                            </div>
                            <div class="flex items-center gap-2 text-charcoal-500 font-medium">
                                <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Sertifikasi: <strong>LSP-P1 & Astra Honda</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 PILLARS DETAILED CARDS (Mesin, Sasis, Kelistrikan, Pengelolaan Bengkel) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 reveal-on-scroll reveal-up delay-100">
                    
                    <!-- 1. MESIN (ENGINE) -->
                    <div class="bg-white rounded-2xl p-6 border border-charcoal-200 hover:border-primary-600 transition-all duration-300 hover:shadow-md flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 rounded-xl bg-primary-50 text-primary-600 font-black text-xs flex items-center justify-center border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                                    01
                                </span>
                                <span class="text-[10px] font-black uppercase tracking-wider text-charcoal-400 bg-charcoal-100 px-2 py-0.5 rounded">Engine</span>
                            </div>
                            
                            <h4 class="text-lg font-black text-charcoal-900 uppercase tracking-tight mb-2 group-hover:text-primary-600 transition-colors">
                                <?php echo e($settings->get('academic_comp_engine_title', 'Sistem Mesin')); ?>

                            </h4>
                            <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                                <?php echo e($settings->get('academic_comp_engine_desc', 'Mendiagnosis gangguan atau kerusakan pada Engine Sepeda Motor meliputi komponen utama engine, sistem pelumasan, sistem pendinginan, dan sistem bahan bakar injeksi PGM-FI.')); ?>

                            </p>
                        </div>

                        <div class="pt-4 border-t border-charcoal-100">
                            <span class="block text-[10px] font-bold uppercase text-charcoal-400 tracking-wider mb-2">Cakupan Keahlian:</span>
                            <ul class="space-y-1.5 text-[11px] text-charcoal-600">
                                <?php
                                    $engineScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_engine_scope', "Overhaul Silinder & Valve\nKalibrasi Injektor & Throttle Body\nSistem Pendingin Cair & Radiator"))));
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $engineScopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1 h-1 rounded-full bg-primary-600 flex-shrink-0"></span>
                                        <span><?php echo e($scope); ?></span>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- 2. SASIS (CHASSIS) -->
                    <div class="bg-white rounded-2xl p-6 border border-charcoal-200 hover:border-primary-600 transition-all duration-300 hover:shadow-md flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 rounded-xl bg-primary-50 text-primary-600 font-black text-xs flex items-center justify-center border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                                    02
                                </span>
                                <span class="text-[10px] font-black uppercase tracking-wider text-charcoal-400 bg-charcoal-100 px-2 py-0.5 rounded">Chassis</span>
                            </div>
                            
                            <h4 class="text-lg font-black text-charcoal-900 uppercase tracking-tight mb-2 group-hover:text-primary-600 transition-colors">
                                <?php echo e($settings->get('academic_comp_chassis_title', 'Sistem Sasis')); ?>

                            </h4>
                            <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                                <?php echo e($settings->get('academic_comp_chassis_desc', 'Mendiagnosis gangguan pada sasis sepeda motor beserta komponennya, meliputi sistem rem hidrolik (CBS/ABS), sistem kemudi, suspensi, rangka, pelek, dan ban.')); ?>

                            </p>
                        </div>

                        <div class="pt-4 border-t border-charcoal-100">
                            <span class="block text-[10px] font-bold uppercase text-charcoal-400 tracking-wider mb-2">Cakupan Keahlian:</span>
                            <ul class="space-y-1.5 text-[11px] text-charcoal-600">
                                <?php
                                    $chassisScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_chassis_scope', "Bleeding & Servis Rem CBS/ABS\nPerbaikan Suspensi & Kemudi\nWheel Alignment & Spoke Lacing"))));
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $chassisScopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1 h-1 rounded-full bg-primary-600 flex-shrink-0"></span>
                                        <span><?php echo e($scope); ?></span>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- 3. KELISTRIKAN (ELECTRICAL) -->
                    <div class="bg-white rounded-2xl p-6 border border-charcoal-200 hover:border-primary-600 transition-all duration-300 hover:shadow-md flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 rounded-xl bg-primary-50 text-primary-600 font-black text-xs flex items-center justify-center border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                                    03
                                </span>
                                <span class="text-[10px] font-black uppercase tracking-wider text-charcoal-400 bg-charcoal-100 px-2 py-0.5 rounded">Electrical</span>
                            </div>
                            
                            <h4 class="text-lg font-black text-charcoal-900 uppercase tracking-tight mb-2 group-hover:text-primary-600 transition-colors">
                                <?php echo e($settings->get('academic_comp_electrical_title', 'Sistem Kelistrikan')); ?>

                            </h4>
                            <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                                <?php echo e($settings->get('academic_comp_electrical_desc', 'Mendiagnosis gangguan pada sistem kelistrikan motor, mencakup pengapian, pengisian, starter, penerangan LED, sistem pengaman (Smart Key / Alarm), instrumen dan sinyal.')); ?>

                            </p>
                        </div>

                        <div class="pt-4 border-t border-charcoal-100">
                            <span class="block text-[10px] font-bold uppercase text-charcoal-400 tracking-wider mb-2">Cakupan Keahlian:</span>
                            <ul class="space-y-1.5 text-[11px] text-charcoal-600">
                                <?php
                                    $elecScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_electrical_scope', "Diagnosis Scanner Injeksi (HIDS)\nTroubleshooting Smart Key & Alarm\nWiring Harness & Pengisian Aki"))));
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $elecScopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1 h-1 rounded-full bg-primary-600 flex-shrink-0"></span>
                                        <span><?php echo e($scope); ?></span>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- 4. PENGELOLAAN BENGKEL (MANAGEMENT) -->
                    <div class="bg-white rounded-2xl p-6 border border-charcoal-200 hover:border-primary-600 transition-all duration-300 hover:shadow-md flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-8 h-8 rounded-xl bg-primary-50 text-primary-600 font-black text-xs flex items-center justify-center border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                                    04
                                </span>
                                <span class="text-[10px] font-black uppercase tracking-wider text-charcoal-400 bg-charcoal-100 px-2 py-0.5 rounded">Management</span>
                            </div>
                            
                            <h4 class="text-lg font-black text-charcoal-900 uppercase tracking-tight mb-2 group-hover:text-primary-600 transition-colors">
                                <?php echo e($settings->get('academic_comp_management_title', 'Pengelolaan Bengkel')); ?>

                            </h4>
                            <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                                <?php echo e($settings->get('academic_comp_management_desc', 'Menerapkan pengelolaan teknis, alur Service Advisor (SA), estimasi biaya, inventaris suku cadang, serta manajemen operasional dan perawatan berkala sepeda motor.')); ?>

                            </p>
                        </div>

                        <div class="pt-4 border-t border-charcoal-100">
                            <span class="block text-[10px] font-bold uppercase text-charcoal-400 tracking-wider mb-2">Cakupan Keahlian:</span>
                            <ul class="space-y-1.5 text-[11px] text-charcoal-600">
                                <?php
                                    $mgmtScopes = array_filter(array_map('trim', explode("\n", $settings->get('academic_comp_management_scope', "Alur Service Advisor & Front Desk\nEstimasi Biaya & Faktur Servis\nInventaris Tools & Suku Cadang"))));
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mgmtScopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li class="flex items-center gap-1.5">
                                        <span class="w-1 h-1 rounded-full bg-primary-600 flex-shrink-0"></span>
                                        <span><?php echo e($scope); ?></span>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="py-20 reveal-on-scroll reveal-up">
                    <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Belum Ada Program','message' => 'Data program keahlian sedang dalam tahap sinkronisasi sistem.','icon' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Program','message' => 'Data program keahlian sedang dalam tahap sinkronisasi sistem.','icon' => 'document']); ?>
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

    <!-- ============================================================================ -->
    <!-- 03. STRUKTUR KURIKULUM & PETA MATA PELAJARAN (TABBED INTERACTION) -->
    <!-- ============================================================================ -->
    <section id="struktur-kurikulum" class="bg-white py-16 lg:py-24 border-b border-charcoal-200 scroll-mt-16">
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

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 reveal-on-scroll reveal-up">
                <div class="max-w-2xl">
                    <div class="inline-block py-1 px-3 rounded bg-charcoal-100 border border-charcoal-200 text-[10px] font-black uppercase tracking-widest text-charcoal-800 mb-3">
                        02 / STRUKTUR KURIKULUM MERDEKA
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-charcoal-950 uppercase tracking-tight leading-tight">
                        <?php echo e($settings->get('academic_curriculum_heading', 'Peta Mata Pelajaran Produktif')); ?>

                    </h2>
                    <p class="mt-3 text-base text-charcoal-600 leading-relaxed">
                        <?php echo e($settings->get('academic_curriculum_subheading', 'Pola pembelajaran bertahap dari pengenalan fondasi otomotif dasar, konsentrasi kejuruan, hingga pemantapan industri dan magang penuh di bengkel resmi AHASS.')); ?>

                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button type="button" onclick="openSyllabusModal()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-charcoal-900 text-white font-bold text-xs uppercase tracking-wider hover:bg-primary-600 transition-colors shadow-sm focus-ring">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Ringkasan Silabus PDF
                    </button>
                </div>
            </div>

            <!-- Tab Switcher (Vanilla JS Powered) -->
            <div class="bg-charcoal-50 rounded-2xl p-1.5 border border-charcoal-200 inline-flex max-w-full overflow-x-auto mb-8 reveal-on-scroll reveal-up" role="tablist">
                <button type="button" class="tab-btn active px-6 py-2.5 rounded-xl font-black text-xs uppercase tracking-wider transition-all duration-200 text-white bg-charcoal-950 shadow-xs" data-target="tab-kelas-10">
                    Kelas X (Fase E)
                </button>
                <button type="button" class="tab-btn px-6 py-2.5 rounded-xl font-black text-xs uppercase tracking-wider transition-all duration-200 text-charcoal-600 hover:text-charcoal-900" data-target="tab-kelas-11">
                    Kelas XI (Fase F)
                </button>
                <button type="button" class="tab-btn px-6 py-2.5 rounded-xl font-black text-xs uppercase tracking-wider transition-all duration-200 text-charcoal-600 hover:text-charcoal-900" data-target="tab-kelas-12">
                    Kelas XII (Fase F & Magang)
                </button>
            </div>

            <!-- TAB 1: KELAS X -->
            <div id="tab-kelas-10" class="tab-panel block reveal-on-scroll reveal-up">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <div class="lg:col-span-4 bg-charcoal-950 text-white rounded-3xl p-6 lg:p-8 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded bg-primary-600 text-white font-black text-[10px] uppercase tracking-widest mb-4">
                                TINGKAT 1 / FASE E
                            </span>
                            <h3 class="text-2xl font-black uppercase tracking-tight mb-3">
                                <?php echo e($settings->get('academic_curriculum_x_title', 'Fondasi Kejuruan Otomotif')); ?>

                            </h3>
                            <p class="text-xs text-charcoal-300 leading-relaxed">
                                <?php echo e($settings->get('academic_curriculum_x_desc', 'Penanaman budaya kerja industri 5R, keselamatan kerja (K3LH), penguasaan alat ukur mekanik presisi, serta logika koding dan kecerdasan artifisial dasar.')); ?>

                            </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-charcoal-800 space-y-3 text-xs">
                            <div class="flex items-center justify-between text-charcoal-400">
                                <span>Alokasi Kejuruan:</span>
                                <strong class="text-white"><?php echo e($settings->get('academic_curriculum_x_hours', '12 JP / Minggu')); ?></strong>
                            </div>
                            <div class="flex items-center justify-between text-charcoal-400">
                                <span>Fokus Utama:</span>
                                <strong class="text-white"><?php echo e($settings->get('academic_curriculum_x_focus', 'Disiplin & Ketelitian Ukur')); ?></strong>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Mapel 1 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Mata Pelajaran Wajib</span>
                                <span class="text-xs font-mono text-charcoal-400">GTO</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Gambar Teknik Otomotif</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Pengenalan standarisasi ISO, pembuatan proyeksi ortogonal, potongan komponen mesin, dan pembacaan diagram teknis perakitan kendaraan.
                            </p>
                        </div>

                        <!-- Mapel 2 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Mata Pelajaran Wajib</span>
                                <span class="text-xs font-mono text-charcoal-400">TDO</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Teknologi Dasar Otomotif</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Prinsip konversi energi termodinamika motor bakar 4 tak, hidrolika, pneumatik dasar, dan sifat material komponen otomotif.
                            </p>
                        </div>

                        <!-- Mapel 3 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Mata Pelajaran Wajib</span>
                                <span class="text-xs font-mono text-charcoal-400">PDO</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Peralatan Dasar Otomotif</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Penggunaan hand tools, power tools, serta alat ukur presisi (Jangka Sorong, Micrometer sekrup, Dial Bore Gauge) standar bengkel resmi Honda.
                            </p>
                        </div>

                        <!-- Mapel 4 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Muatan Kurikulum Baru</span>
                                <span class="text-xs font-mono text-charcoal-400">KKA</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Koding & Kecerdasan Artifisial</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Pembekalan logika komputasi, dasar algoritma pemrograman, pengenalan sensor cerdas mikrokontroler, dan sistem kontrol kendaraan otonom masa depan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: KELAS XI -->
            <div id="tab-kelas-11" class="tab-panel hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <div class="lg:col-span-4 bg-charcoal-950 text-white rounded-3xl p-6 lg:p-8 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded bg-primary-600 text-white font-black text-[10px] uppercase tracking-widest mb-4">
                                TINGKAT 2 / FASE F
                            </span>
                            <h3 class="text-2xl font-black uppercase tracking-tight mb-3">
                                <?php echo e($settings->get('academic_curriculum_xi_title', 'Konsentrasi & TeFa Level 1')); ?>

                            </h3>
                            <p class="text-xs text-charcoal-300 leading-relaxed">
                                <?php echo e($settings->get('academic_curriculum_xi_desc', 'Masuk ke pendalaman teknis 3 sistem sepeda motor, simulasi pelayanan servis konsumen nyata (Teaching Factory), dan proyek produk kreatif kewirausahaan.')); ?>

                            </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-charcoal-800 space-y-3 text-xs">
                            <div class="flex items-center justify-between text-charcoal-400">
                                <span>Alokasi Kejuruan:</span>
                                <strong class="text-white"><?php echo e($settings->get('academic_curriculum_xi_hours', '18 JP / Minggu')); ?></strong>
                            </div>
                            <div class="flex items-center justify-between text-charcoal-400">
                                <span>Fokus Utama:</span>
                                <strong class="text-white"><?php echo e($settings->get('academic_curriculum_xi_focus', 'Perawatan Berkala & TeFa')); ?></strong>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Mapel 1 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Konsentrasi Keahlian</span>
                                <span class="text-xs font-mono text-charcoal-400">CHASSIS</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Sasis Sepeda Motor</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Perawatan sistem rem Combi Brake System (CBS) & Anti-lock Braking System (ABS), kemudi, suspensi hidrolik, pelek, dan penggantian ban tubeless.
                            </p>
                        </div>

                        <!-- Mapel 2 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Konsentrasi Keahlian</span>
                                <span class="text-xs font-mono text-charcoal-400">ELEC</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Kelistrikan Sepeda Motor</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Pengujian alternator pengisian, starter motor, lampu sistem LED, sistem alarm terintegrasi, dan pemahaman diagram wiring bodi motor.
                            </p>
                        </div>

                        <!-- Mapel 3 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Konsentrasi Keahlian</span>
                                <span class="text-xs font-mono text-charcoal-400">ENGINE</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Mesin Sepeda Motor</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Pembongkaran kepala silinder, pembersihan ruang bakar, penyetelan celah katup, kalibrasi sistem PGM-FI, dan penggantian pelumas mesin berkala.
                            </p>
                        </div>

                        <!-- Mapel 4 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Kewirausahaan & Mapel Pilihan</span>
                                <span class="text-xs font-mono text-charcoal-400">PKK</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Produk Kreatif & Mapel Pilihan</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Perencanaan produksi jasa bengkel, perhitungan biaya operasional, serta mata pelajaran pilihan teknologi injeksi terapan dan servis cepat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 3: KELAS XII -->
            <div id="tab-kelas-12" class="tab-panel hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <div class="lg:col-span-4 bg-charcoal-950 text-white rounded-3xl p-6 lg:p-8 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded bg-primary-600 text-white font-black text-[10px] uppercase tracking-widest mb-4">
                                TINGKAT 3 / FASE F
                            </span>
                            <h3 class="text-2xl font-black uppercase tracking-tight mb-3">
                                <?php echo e($settings->get('academic_curriculum_xii_title', 'Pemantapan Industri & PKL')); ?>

                            </h3>
                            <p class="text-xs text-charcoal-300 leading-relaxed">
                                <?php echo e($settings->get('academic_curriculum_xii_desc', 'Pelaksanaan Praktik Kerja Lapangan (PKL) 6 bulan di AHASS, pemecahan masalah (troubleshooting) tingkat lanjut, pengelolaan manajemen bengkel, dan Uji Sertifikasi LSP/UKK.')); ?>

                            </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-charcoal-800 space-y-3 text-xs">
                            <div class="flex items-center justify-between text-charcoal-400">
                                <span>Durasi Magang:</span>
                                <strong class="text-white"><?php echo e($settings->get('academic_curriculum_xii_hours', '6 Bulan Penuh di AHASS')); ?></strong>
                            </div>
                            <div class="flex items-center justify-between text-charcoal-400">
                                <span>Muara Kelulusan:</span>
                                <strong class="text-white"><?php echo e($settings->get('academic_curriculum_xii_focus', 'UKK, BNSP, Rekrutmen BKK')); ?></strong>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Mapel 1 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Konsentrasi Lanjut</span>
                                <span class="text-xs font-mono text-charcoal-400">TROUBLE</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Troubleshooting 3 Sistem</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Analisis kerusakan kompleks pada sasis, kelistrikan, dan mesin motor injeksi menggunakan diagnostic tool berstandar bengkel resmi.
                            </p>
                        </div>

                        <!-- Mapel 2 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Keahlian Manajerial</span>
                                <span class="text-xs font-mono text-charcoal-400">WORKSHOP</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Pengelolaan Bengkel Sepeda Motor</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Penerapan manajemen perawatan, penanganan konsumen oleh Service Advisor, estimasi waktu kerja (*flat rate time*), dan pembukuan spare parts.
                            </p>
                        </div>

                        <!-- Mapel 3 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Pengalaman Nyata</span>
                                <span class="text-xs font-mono text-charcoal-400">PKL AHASS</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Praktik Kerja Industri (PKL)</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Penempatan kerja magang di bengkel resmi Honda (AHASS) selama 6 bulan untuk mengasah jam terbang dan adaptasi budaya kerja industri.
                            </p>
                        </div>

                        <!-- Mapel 4 -->
                        <div class="bg-charcoal-50 rounded-2xl p-5 border border-charcoal-200 hover:bg-white hover:border-charcoal-300 transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-black text-primary-600 uppercase tracking-wider">Evaluasi Akhir</span>
                                <span class="text-xs font-mono text-charcoal-400">UKK / LSP</span>
                            </div>
                            <h4 class="text-base font-bold text-charcoal-900 mb-2">Uji Kompetensi Keahlian & PKK</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">
                                Sidang uji kelayakan teknisi di hadapan asesor eksternal industri, pameran produk kewirausahaan siswa, dan uji lisensi BNSP.
                            </p>
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

    <!-- ============================================================================ -->
    <!-- 04. SERTIFIKASI KEAHLIAN & LISENSI INDUSTRI -->
    <!-- ============================================================================ -->
    <section id="sertifikasi" class="bg-charcoal-50 py-16 lg:py-24 border-b border-charcoal-200 scroll-mt-16">
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

            <div class="max-w-3xl mb-12 reveal-on-scroll reveal-up">
                <div class="inline-block py-1 px-3 rounded bg-primary-50 border border-primary-200 text-[10px] font-black uppercase tracking-widest text-primary-700 mb-3">
                    03 / PENGAKUAN RESMI
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-charcoal-950 uppercase tracking-tight leading-tight">
                    Sertifikasi Keahlian & Lisensi
                </h2>
                <p class="mt-3 text-base text-charcoal-600 leading-relaxed">
                    Setiap lulusan dibekali sertifikat kompetensi ganda dari negara dan industri, memastikan legalitas dan kualifikasi kerja yang diakui secara nasional maupun internasional.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 reveal-on-scroll reveal-up delay-100">
                
                <!-- CERT 1: UKK -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 border border-charcoal-200 shadow-sm flex flex-col justify-between hover:border-primary-600 transition-all group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-charcoal-100 text-charcoal-900 flex items-center justify-center font-black mb-6 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600">Evaluasi Nasional</span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3">
                            <?php echo e($settings->get('academic_cert_ukk_title', 'Uji Kompetensi Keahlian (UKK)')); ?>

                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-6">
                            <?php echo e($settings->get('academic_cert_ukk_desc', 'Penilaian capaian kemampuan teknis menyeluruh di akhir masa studi oleh tim asesor internal dan penguji eksternal dari industri mitra untuk memverifikasi kesiapan kerja.')); ?>

                        </p>
                    </div>

                    <div class="pt-4 border-t border-charcoal-100 text-xs">
                        <div class="flex items-center justify-between text-charcoal-500 py-1">
                            <span>Penerbit:</span>
                            <strong class="text-charcoal-900"><?php echo e($settings->get('academic_cert_ukk_issuer', 'Kemendikbudristek & DUDI')); ?></strong>
                        </div>
                        <div class="flex items-center justify-between text-charcoal-500 py-1">
                            <span>Sifat:</span>
                            <strong class="text-emerald-600"><?php echo e($settings->get('academic_cert_ukk_nature', 'Wajib Kelulusan SMK')); ?></strong>
                        </div>
                    </div>
                </div>

                <!-- CERT 2: BNSP / LSP-P1 -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 border-2 border-primary-600/30 shadow-sm flex flex-col justify-between hover:border-primary-600 transition-all group relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-primary-600 text-white text-[9px] font-black uppercase tracking-widest py-1 px-3 rounded-bl-xl">
                        Standar Nasional
                    </div>
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center font-black mb-6 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600">Badan Nasional Sertifikasi Profesi</span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3">
                            <?php echo e($settings->get('academic_cert_bnsp_title', 'Sertifikasi BNSP / LSP-P1')); ?>

                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-6">
                            <?php echo e($settings->get('academic_cert_bnsp_desc', 'Sertifikat Garuda Emas resmi dari BNSP melalui Lembaga Sertifikasi Profesi Pihak Pertama (LSP-P1) berstandar SKKNI, diakui di seluruh wilayah Republik Indonesia dan ASEAN.')); ?>

                        </p>
                    </div>

                    <div class="pt-4 border-t border-charcoal-100 text-xs">
                        <div class="flex items-center justify-between text-charcoal-500 py-1">
                            <span>Lisensi:</span>
                            <strong class="text-charcoal-900"><?php echo e($settings->get('academic_cert_bnsp_license', 'BNSP (LSP-P1 SMKN 1)')); ?></strong>
                        </div>
                        <div class="flex items-center justify-between text-charcoal-500 py-1">
                            <span>Level Kualifikasi:</span>
                            <strong class="text-primary-600"><?php echo e($settings->get('academic_cert_bnsp_level', 'KKNI Level II Otomotif')); ?></strong>
                        </div>
                    </div>
                </div>

                <!-- CERT 3: AHM CERTIFICATION -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 border border-charcoal-200 shadow-sm flex flex-col justify-between hover:border-primary-600 transition-all group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-charcoal-100 text-charcoal-900 flex items-center justify-center font-black mb-6 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600">Mitra Industri Utama</span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3">
                            <?php echo e($settings->get('academic_cert_ahm_title', 'Lisensi Astra Honda Motor')); ?>

                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-6">
                            <?php echo e($settings->get('academic_cert_ahm_desc', 'Standarisasi mekanik resmi dari PT Astra Honda Motor melalui kurikulum binaan sejak 2016, membuka jalur prioritas rekrutmen kerja langsung ke jaringan AHASS nasional.')); ?>

                        </p>
                    </div>

                    <div class="pt-4 border-t border-charcoal-100 text-xs">
                        <div class="flex items-center justify-between text-charcoal-500 py-1">
                            <span>Sertifikasi:</span>
                            <strong class="text-charcoal-900"><?php echo e($settings->get('academic_cert_ahm_issuer', 'Astra Motor Training Center')); ?></strong>
                        </div>
                        <div class="flex items-center justify-between text-charcoal-500 py-1">
                            <span>Peluang Kerja:</span>
                            <strong class="text-emerald-600"><?php echo e($settings->get('academic_cert_ahm_opportunity', 'Prioritas Rekrutmen AHASS')); ?></strong>
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

    <!-- ============================================================================ -->
    <!-- 05. PROGRAM PEMBELAJARAN UNGGULAN (TEFA, PKL, KELAS INDUSTRI, SAFETY RIDING) -->
    <!-- ============================================================================ -->
    <section id="program-unggulan" class="bg-white py-16 lg:py-24 border-b border-charcoal-200 scroll-mt-16">
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

            <div class="max-w-3xl mb-12 reveal-on-scroll reveal-up">
                <div class="inline-block py-1 px-3 rounded bg-primary-50 border border-primary-200 text-[10px] font-black uppercase tracking-widest text-primary-700 mb-3">
                    04 / PROGRAM UNGGULAN
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-charcoal-950 uppercase tracking-tight leading-tight">
                    <?php echo e($settings->get('academic_flagship_title', 'Ekosistem Belajar Nyata')); ?>

                </h2>
                <p class="mt-3 text-base text-charcoal-600 leading-relaxed">
                    <?php echo e($settings->get('academic_flagship_desc', 'Kami menghadirkan atmosfer industri langsung ke sekolah melalui fasilitas bengkel nyata, pembinaan keselamatan berkendara, dan budaya disiplin kerja tinggi.')); ?>

                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 reveal-on-scroll reveal-up delay-100">
                
                <!-- 1. KELAS INDUSTRI ASTRA HONDA -->
                <div class="bg-charcoal-50 rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-white border border-charcoal-200 text-primary-600 flex items-center justify-center font-bold mb-6 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600"><?php echo e($settings->get('academic_prog_honda_badge', 'Binaan Resmi Sejak 2016')); ?></span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3"><?php echo e($settings->get('academic_prog_honda_title', 'Kelas Industri Honda')); ?></h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                            <?php echo e($settings->get('academic_prog_honda_desc', 'Sinkronisasi kurikulum resmi dengan standar PT Astra Honda Motor. Guru dan instruktur tersertifikasi berkala di Astra Motor Training Center, menggunakan bike lift dan modul ajar resmi AHASS.')); ?>

                        </p>
                    </div>
                    <div class="pt-4 border-t border-charcoal-200 text-[11px] font-bold text-charcoal-700 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-600"></span> <?php echo e($settings->get('academic_prog_honda_tag', 'Standar bengkel resmi AHASS')); ?>

                    </div>
                </div>

                <!-- 2. TEACHING FACTORY (TEFA) -->
                <div class="bg-charcoal-50 rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-white border border-charcoal-200 text-primary-600 flex items-center justify-center font-bold mb-6 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600"><?php echo e($settings->get('academic_prog_tefa_badge', 'Unit Servis Konsumen')); ?></span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3"><?php echo e($settings->get('academic_prog_tefa_title', 'Teaching Factory (TeFa)')); ?></h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                            <?php echo e($settings->get('academic_prog_tefa_desc', 'Bengkel operasional nyata di lingkungan sekolah. Siswa mempraktikkan servis berkala, tune-up injeksi, ganti oli, dan perbaikan motor milik konsumen umum di bawah supervisi mekanik ahli.')); ?>

                        </p>
                    </div>
                    <div class="pt-4 border-t border-charcoal-200 text-[11px] font-bold text-charcoal-700 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-600"></span> <?php echo e($settings->get('academic_prog_tefa_tag', 'Pengalaman servis pelanggan riil')); ?>

                    </div>
                </div>

                <!-- 3. PKL 6 BULAN DI AHASS -->
                <div class="bg-charcoal-50 rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-white border border-charcoal-200 text-primary-600 flex items-center justify-center font-bold mb-6 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600"><?php echo e($settings->get('academic_prog_pkl_badge', 'Imersi Dunia Usaha')); ?></span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3"><?php echo e($settings->get('academic_prog_pkl_title', 'Magang PKL di AHASS')); ?></h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                            <?php echo e($settings->get('academic_prog_pkl_desc', 'Praktik kerja industri 6 bulan penuh di jaringan bengkel resmi Honda se-Karesidenan Pati (Jepara, Pati, Kudus) untuk mengasah jam terbang dan adaptasi budaya kerja industri.')); ?>

                        </p>
                    </div>
                    <div class="pt-4 border-t border-charcoal-200 text-[11px] font-bold text-charcoal-700 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-600"></span> <?php echo e($settings->get('academic_prog_pkl_tag', 'Durasi 6 bulan di bengkel resmi')); ?>

                    </div>
                </div>

                <!-- 4. SAFETY RIDING ACADEMY -->
                <div class="bg-charcoal-50 rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-white border border-charcoal-200 text-primary-600 flex items-center justify-center font-bold mb-6 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600"><?php echo e($settings->get('academic_prog_safety_badge', 'Juara 1 Karesidenan & Nasional')); ?></span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3"><?php echo e($settings->get('academic_prog_safety_title', 'Safety Riding Academy')); ?></h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                            <?php echo e($settings->get('academic_prog_safety_desc', 'Program pelatihan berkendara aman berstandar Honda. SMKN 1 Bangsri konsisten menjuarai Safety Riding Competition putra & putri tingkat Karesidenan Pati hingga tingkat Nasional.')); ?>

                        </p>
                    </div>
                    <div class="pt-4 border-t border-charcoal-200 text-[11px] font-bold text-charcoal-700 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-600"></span> <?php echo e($settings->get('academic_prog_safety_tag', 'Pelatihan keselamatan bersertifikat')); ?>

                    </div>
                </div>

                <!-- 5. BUDAYA KERJA 5R & APD -->
                <div class="bg-charcoal-50 rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-white border border-charcoal-200 text-primary-600 flex items-center justify-center font-bold mb-6 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600"><?php echo e($settings->get('academic_prog_5r_badge', 'Tata Tertib Bengkel')); ?></span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3"><?php echo e($settings->get('academic_prog_5r_title', 'Budaya Industri 5R & APD')); ?></h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                            <?php echo e($settings->get('academic_prog_5r_desc', 'Penerapan disiplin kerja ala Jepang: Ringkas, Rapi, Resik, Rawat, Rajin. Kewajiban pemakaian Alat Pelindung Diri (APD), standar rambut rapi (2-1-1), dan kebersihan area bengkel.')); ?>

                        </p>
                    </div>
                    <div class="pt-4 border-t border-charcoal-200 text-[11px] font-bold text-charcoal-700 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-600"></span> <?php echo e($settings->get('academic_prog_5r_tag', 'Standar K3LH & kedisiplinan kerja')); ?>

                    </div>
                </div>

                <!-- 6. KONTES PRESTASI & LOMBA -->
                <div class="bg-charcoal-50 rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-white border border-charcoal-200 text-primary-600 flex items-center justify-center font-bold mb-6 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary-600"><?php echo e($settings->get('academic_prog_lks_badge', 'Ajang Kompetisi Vokasi')); ?></span>
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mt-1 mb-3"><?php echo e($settings->get('academic_prog_lks_title', 'Lomba LKS & Kontes Honda')); ?></h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-4">
                            <?php echo e($settings->get('academic_prog_lks_desc', 'Pembinaan khusus siswa dan guru untuk bertarung di Lomba Kompetensi Siswa (LKS) tingkat Kabupaten, Provinsi, hingga Kontes Guru & Siswa Nasional Astra Motor.')); ?>

                        </p>
                    </div>
                    <div class="pt-4 border-t border-charcoal-200 text-[11px] font-bold text-charcoal-700 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-600"></span> <?php echo e($settings->get('academic_prog_lks_tag', 'Tradisi juara LKS & Astra Motor')); ?>

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

    <!-- ============================================================================ -->
    <!-- 06. PILIHAN KARIR & PROSPEK LULUSAN (SLIDE 7 PDF) -->
    <!-- ============================================================================ -->
    <section id="prospek-karir" class="bg-charcoal-50 py-16 lg:py-24 border-b border-charcoal-200 scroll-mt-16">
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

            <div class="max-w-3xl mb-12 reveal-on-scroll reveal-up">
                <div class="inline-block py-1 px-3 rounded bg-primary-50 border border-primary-200 text-[10px] font-black uppercase tracking-widest text-primary-700 mb-3">
                    05 / MASA DEPAN LULUSAN
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-charcoal-950 uppercase tracking-tight leading-tight">
                    Pilihan Karir & Prospek Kerja
                </h2>
                <p class="mt-3 text-base text-charcoal-600 leading-relaxed">
                    Kombinasi keterampilan mekanik presisi dan pemahaman bisnis perbengkelan membuka tiga jalur utama karir lulusan TBSM SMK Negeri 1 Bangsri.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 reveal-on-scroll reveal-up delay-100">
                
                <!-- KARIR 1: TEKNISI SERVIS -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group shadow-xs">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="w-10 h-10 rounded-xl bg-primary-600 text-white font-black text-sm flex items-center justify-center">
                                01
                            </span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-primary-600 bg-primary-50 px-2.5 py-1 rounded-full">
                                Jalur Utama
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mb-3">
                            <?php echo e($settings->get('academic_career_1_title', 'Teknisi Servis Sepeda Motor')); ?>

                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-6">
                            <?php echo e($settings->get('academic_career_1_desc', 'Menjadi teknisi mekanik handal dan profesional dalam servis dan perawatan berkala di jaringan bengkel resmi Honda (AHASS) maupun bengkel multibrand modern.')); ?>

                        </p>
                    </div>

                    <div class="pt-4 border-t border-charcoal-100 text-xs space-y-1.5">
                        <div class="text-[11px] font-bold text-charcoal-800">Jenjang Karir:</div>
                        <div class="text-charcoal-500"><?php echo e($settings->get('academic_career_1_ladder', 'Mekanik Pratama → Senior Mechanic → Service Advisor → Kepala Bengkel')); ?></div>
                    </div>
                </div>

                <!-- KARIR 2: PERAKITAN / MANUFAKTUR -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group shadow-xs">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="w-10 h-10 rounded-xl bg-charcoal-900 text-white font-black text-sm flex items-center justify-center">
                                02
                            </span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-charcoal-600 bg-charcoal-100 px-2.5 py-1 rounded-full">
                                Manufaktur
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mb-3">
                            <?php echo e($settings->get('academic_career_2_title', 'Industri Perakitan Otomotif')); ?>

                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-6">
                            <?php echo e($settings->get('academic_career_2_desc', 'Bekerja di bidang perakitan sepeda motor, industri komponen presisi suku cadang, lini produksi pabrik otomotif (Assembly Line), dan Quality Control (QC).')); ?>

                        </p>
                    </div>

                    <div class="pt-4 border-t border-charcoal-100 text-xs space-y-1.5">
                        <div class="text-[11px] font-bold text-charcoal-800">Peluang Penempatan:</div>
                        <div class="text-charcoal-500"><?php echo e($settings->get('academic_career_2_placement', 'Pabrik Manufaktur Otomotif, Operator Lini Perakitan, Teknisi Quality Control')); ?></div>
                    </div>
                </div>

                <!-- KARIR 3: WIRAUSAHA BENGKEL -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 border border-charcoal-200 hover:border-primary-600 transition-all flex flex-col justify-between group shadow-xs">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="w-10 h-10 rounded-xl bg-charcoal-900 text-white font-black text-sm flex items-center justify-center">
                                03
                            </span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-charcoal-600 bg-charcoal-100 px-2.5 py-1 rounded-full">
                                Wirausaha
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-black text-charcoal-950 uppercase tracking-tight mb-3">
                            <?php echo e($settings->get('academic_career_3_title', 'Wirausaha Bengkel Mandiri')); ?>

                        </h3>
                        <p class="text-xs text-charcoal-600 leading-relaxed mb-6">
                            <?php echo e($settings->get('academic_career_3_desc', 'Membuka usaha bengkel mandiri, toko suku cadang (spare parts store), jasa modifikasi standar, atau penyedia layanan panggilan darurat (home service).')); ?>

                        </p>
                    </div>

                    <div class="pt-4 border-t border-charcoal-100 text-xs space-y-1.5">
                        <div class="text-[11px] font-bold text-charcoal-800">Bekal Kompetensi:</div>
                        <div class="text-charcoal-500"><?php echo e($settings->get('academic_career_3_skills', 'Pengelolaan Bengkel, Estimasi Biaya Servis, Manajemen Toko Spare Parts')); ?></div>
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

    <!-- ============================================================================ -->
    <!-- 07. ROADMAP ALUR AKADEMIK SISWA (PERJALANAN 3 TAHUN) -->
    <!-- ============================================================================ -->
    <section id="roadmap-akademik" class="bg-white py-16 lg:py-24 border-b border-charcoal-200 scroll-mt-16">
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

            <div class="max-w-3xl mb-12 reveal-on-scroll reveal-up">
                <div class="inline-block py-1 px-3 rounded bg-charcoal-100 border border-charcoal-200 text-[10px] font-black uppercase tracking-widest text-charcoal-800 mb-3">
                    06 / ALUR PERJALANAN BELAJAR
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-charcoal-950 uppercase tracking-tight leading-tight">
                    Roadmap Belajar 3 Tahun
                </h2>
                <p class="mt-3 text-base text-charcoal-600 leading-relaxed">
                    Tahapan sistematis yang dilalui peserta didik dari orientasi awal di kelas X sampai dengan rekrutmen kerja industri di kelas XII.
                </p>
            </div>

            <!-- TIMELINE CONTAINER -->
            <div class="relative pl-6 lg:pl-10 border-l-2 border-primary-600/30 space-y-12 reveal-on-scroll reveal-up delay-100">
                
                <!-- STEP 1 -->
                <div class="relative">
                    <div class="absolute -left-[31px] lg:-left-[47px] top-1 w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center text-xs font-black shadow-sm ring-4 ring-white">
                        1
                    </div>
                    <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-200 max-w-3xl">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                            <span class="text-xs font-black uppercase tracking-widest text-primary-600">Tahun Pertama • Kelas X (Fase E)</span>
                            <span class="text-[11px] font-bold text-charcoal-500">Semester 1 & 2</span>
                        </div>
                        <h4 class="text-lg font-black text-charcoal-900 uppercase mb-2">
                            <?php echo e($settings->get('academic_roadmap_1_title', 'Fondasi Mekanika, Pengukuran Presisi & Budaya 5R')); ?>

                        </h4>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            <?php echo e($settings->get('academic_roadmap_1_desc', 'Siswa mempelajari dasar teknologi otomotif, gambar teknik, penguasaan hand tools dan alat ukur presisi (Jangka Sorong & Micrometer), serta pembentukan karakter disiplin industri (APD lengkap dan tata tertib 2-1-1).')); ?>

                        </p>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div class="relative">
                    <div class="absolute -left-[31px] lg:-left-[47px] top-1 w-6 h-6 rounded-full bg-charcoal-900 text-white flex items-center justify-center text-xs font-black shadow-sm ring-4 ring-white">
                        2
                    </div>
                    <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-200 max-w-3xl">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                            <span class="text-xs font-black uppercase tracking-widest text-charcoal-700">Tahun Kedua • Kelas XI (Fase F)</span>
                            <span class="text-[11px] font-bold text-charcoal-500">Semester 3 & 4</span>
                        </div>
                        <h4 class="text-lg font-black text-charcoal-900 uppercase mb-2">
                            <?php echo e($settings->get('academic_roadmap_2_title', 'Konsentrasi Kejuruan, Praktik TeFa & Safety Riding')); ?>

                        </h4>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            <?php echo e($settings->get('academic_roadmap_2_desc', 'Mendalami perawatan mesin sepeda motor, sasis, dan kelistrikan. Siswa mulai diterjunkan pada unit Teaching Factory (TeFa) untuk melayani servis berkala sepeda motor nyata dan mendapatkan pembinaan Safety Riding bersertifikat.')); ?>

                        </p>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div class="relative">
                    <div class="absolute -left-[31px] lg:-left-[47px] top-1 w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center text-xs font-black shadow-sm ring-4 ring-white">
                        3
                    </div>
                    <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-200 max-w-3xl">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                            <span class="text-xs font-black uppercase tracking-widest text-primary-600">Tahun Ketiga • Kelas XII (Fase F)</span>
                            <span class="text-[11px] font-bold text-charcoal-500">Semester 5</span>
                        </div>
                        <h4 class="text-lg font-black text-charcoal-900 uppercase mb-2">
                            <?php echo e($settings->get('academic_roadmap_3_title', 'Praktik Kerja Lapangan (PKL) 6 Bulan di Bengkel Resmi AHASS')); ?>

                        </h4>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            <?php echo e($settings->get('academic_roadmap_3_desc', 'Imersi kerja langsung di jaringan bengkel resmi Honda se-Karesidenan Pati. Siswa mengasah kecepatan, ketepatan diagnosa, pemecahan masalah konsumen, dan mentalitas profesional di bawah supervisi mekanik senior AHASS.')); ?>

                        </p>
                    </div>
                </div>

                <!-- STEP 4 -->
                <div class="relative">
                    <div class="absolute -left-[31px] lg:-left-[47px] top-1 w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-black shadow-sm ring-4 ring-white">
                        ✓
                    </div>
                    <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-200 max-w-3xl">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                            <span class="text-xs font-black uppercase tracking-widest text-emerald-700">Tahap Akhir • Kelas XII (Fase F)</span>
                            <span class="text-[11px] font-bold text-charcoal-500">Semester 6</span>
                        </div>
                        <h4 class="text-lg font-black text-charcoal-900 uppercase mb-2">
                            <?php echo e($settings->get('academic_roadmap_4_title', 'Uji Sertifikasi BNSP / LSP-P1, Lisensi AHM & Rekrutmen Kerja')); ?>

                        </h4>
                        <p class="text-xs text-charcoal-600 leading-relaxed">
                            <?php echo e($settings->get('academic_roadmap_4_desc', 'Pengelolaan bengkel, pelaksanaan Uji Kompetensi Keahlian (UKK), asesmen lisensi BNSP, sertifikasi mekanik Astra Motor, serta penyaluran kerja langsung lewat Bursa Kerja Khusus (BKK) SMK Negeri 1 Bangsri.')); ?>

                        </p>
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

    <!-- ============================================================================ -->
    <!-- 08. TENAGA PENGAJAR / INSTRUKTUR INDUSTRI (SUBTLE REFINED CALLOUT) -->
    <!-- ============================================================================ -->
    <section class="bg-charcoal-50 py-12 lg:py-16 border-b border-charcoal-200">
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

            <div class="bg-white rounded-3xl p-6 lg:p-10 border border-charcoal-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-8 reveal-on-scroll reveal-up">
                <div class="max-w-2xl">
                    <span class="inline-block px-3 py-1 rounded bg-charcoal-100 text-charcoal-800 text-[10px] font-black uppercase tracking-widest mb-3">
                        TENAGA PENDIDIK & INSTRUKTUR
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-black text-charcoal-950 uppercase tracking-tight mb-2">
                        <?php echo e($settings->get('academic_teacher_title', 'Dibimbing oleh Instruktur Tersertifikasi Astra Motor')); ?>

                    </h3>
                    <p class="text-xs sm:text-sm text-charcoal-600 leading-relaxed">
                        <?php echo e($settings->get('academic_teacher_desc', 'Guru kejuruan dan instruktur TBSM SMK Negeri 1 Bangsri rutin mengikuti program peningkatan kompetensi dan sertifikasi berjenjang di Astra Motor Training Center.')); ?>

                    </p>
                </div>

                <div class="flex-shrink-0">
                    <a href="<?php echo e(route('academic.teachers')); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-charcoal-950 text-white font-black text-xs uppercase tracking-wider hover:bg-primary-600 transition-colors shadow-sm focus-ring">
                        <span>Lihat Profil Pengampu</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
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

    <!-- ============================================================================ -->
    <!-- 09. FINAL CALL TO ACTION (PPDB & FASILITAS) -->
    <!-- ============================================================================ -->
    <section class="bg-charcoal-950 text-white py-16 lg:py-24 relative overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: radial-gradient(#DC2626 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-primary-600/15 blur-3xl pointer-events-none"></div>

        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 text-center max-w-3xl mx-auto reveal-on-scroll reveal-up']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 text-center max-w-3xl mx-auto reveal-on-scroll reveal-up']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <span class="inline-block py-1.5 px-3 rounded bg-white/10 border border-white/20 text-[10px] font-black uppercase tracking-widest text-primary-400 mb-6">
                <?php echo e($settings->get('academic_cta_badge', 'SIAP BERKARIER DI DUNIA OTOMOTIF?')); ?>

            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight leading-tight mb-6">
                <?php echo e($settings->get('academic_cta_title', 'Wujudkan Masa Depan Teknisi Andal Bersama TBSM SMKN 1 Bangsri')); ?>

            </h2>
            <p class="text-sm lg:text-base text-charcoal-400 leading-relaxed mb-8 max-w-xl mx-auto">
                <?php echo e($settings->get('academic_cta_desc', 'Dapatkan pendidikan vokasi berkualitas dengan fasilitas laboratorium berstandar Astra Honda Motor dan peluang kerja nyata setelah lulus.')); ?>

            </p>

            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo e(route('academic.facilities')); ?>" class="px-8 py-3.5 rounded-xl bg-primary-600 hover:bg-primary-700 text-white font-black text-xs uppercase tracking-wider transition-colors shadow-lg focus-ring">
                    Jelajahi Fasilitas Bengkel
                </a>
                <a href="<?php echo e(route('contact.index')); ?>" class="px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-black text-xs uppercase tracking-wider transition-colors focus-ring">
                    Kontak & Konsultasi Jurusan
                </a>
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

    <!-- ============================================================================ -->
    <!-- MODAL: RINGKASAN SILABUS & KURIKULUM -->
    <!-- ============================================================================ -->
    <div id="syllabus-modal" class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[85vh] overflow-y-auto p-6 lg:p-8 border border-charcoal-200 shadow-2xl relative">
            <div class="flex items-center justify-between pb-4 mb-6 border-b border-charcoal-100">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-primary-600">Dokumen Kurikulum</span>
                    <h3 class="text-xl font-black text-charcoal-900 uppercase">Struktur Kurikulum TBSM</h3>
                </div>
                <button type="button" onclick="closeSyllabusModal()" class="w-9 h-9 rounded-xl bg-charcoal-100 hover:bg-charcoal-200 text-charcoal-700 flex items-center justify-center font-bold transition-colors">
                    ✕
                </button>
            </div>

            <div class="space-y-4 text-xs text-charcoal-700 leading-relaxed">
                <p>
                    <?php echo e($settings->get('academic_syllabus_modal_intro', 'Kurikulum Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri dirancang berdasarkan Kepmendikbudristek Kurikulum Merdeka yang diselaraskan secara konsisten dengan kompetensi industri PT Astra Honda Motor.')); ?>

                </p>

                <div class="bg-charcoal-50 p-4 rounded-xl border border-charcoal-200">
                    <h5 class="font-bold text-charcoal-900 uppercase text-[11px] mb-2">Struktur Alokasi Jam (JP):</h5>
                    <div class="space-y-1 text-charcoal-600 whitespace-pre-line">
                        <?php echo e($settings->get('academic_syllabus_modal_hours', "• Kelas X (Fase E): Dasar-Dasar Kejuruan Otomotif (12 JP) + Koding & AI (2 JP).\n• Kelas XI (Fase F): Konsentrasi Keahlian Mesin, Sasis, Kelistrikan (18 JP) + PKK (5 JP).\n• Kelas XII (Fase F): Pemantapan Troubleshooting (14 JP) + PKL Industri AHASS (6 Bulan Penuh).")); ?>

                    </div>
                </div>

                <div class="bg-primary-50 p-4 rounded-xl border border-primary-200 text-primary-900">
                    <h5 class="font-bold uppercase text-[11px] mb-1">Standar Kelulusan Kompetensi:</h5>
                    <p class="text-[11px] leading-relaxed">
                        <?php echo e($settings->get('academic_syllabus_modal_standards', 'Siswa dinyatakan kompeten setelah menyelesaikan seluruh modul capaian pembelajaran, lulus Uji Kompetensi Keahlian (UKK) dari penguji eksternal, dan memperoleh sertifikat kompetensi BNSP / Astra Motor.')); ?>

                    </p>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-charcoal-100 flex flex-wrap items-center justify-end gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($syllabusFile = $settings->get('academic_syllabus_file')): ?>
                    <a href="<?php echo e(Storage::url($syllabusFile)); ?>" target="_blank" download class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-charcoal-900 hover:bg-black text-white font-bold text-xs uppercase tracking-wider transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span>Unduh File PDF</span>
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <button type="button" onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-charcoal-100 hover:bg-charcoal-200 text-charcoal-800 font-bold text-xs uppercase tracking-wider transition-colors">
                    Cetak Halaman Ini
                </button>
                <button type="button" onclick="closeSyllabusModal()" class="px-5 py-2.5 rounded-xl bg-primary-600 hover:bg-primary-700 text-white font-bold text-xs uppercase tracking-wider transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- TAB INTERACTION SCRIPT -->
    <?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabPanels = document.querySelectorAll('.tab-panel');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');

                    // Reset buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active', 'text-white', 'bg-charcoal-950', 'shadow-xs');
                        btn.classList.add('text-charcoal-600');
                    });

                    // Activate current button
                    button.classList.add('active', 'text-white', 'bg-charcoal-950', 'shadow-xs');
                    button.classList.remove('text-charcoal-600');

                    // Hide all panels
                    tabPanels.forEach(panel => {
                        panel.classList.add('hidden');
                        panel.classList.remove('block');
                    });

                    // Show targeted panel
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.remove('hidden');
                        targetPanel.classList.add('block');
                    }
                });
            });
        });

        function openSyllabusModal() {
            const modal = document.getElementById('syllabus-modal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeSyllabusModal() {
            const modal = document.getElementById('syllabus-modal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSyllabusModal();
            }
        });
    </script>
    <?php $__env->stopPush(); ?>

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
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/frontend/academic/programs.blade.php ENDPATH**/ ?>