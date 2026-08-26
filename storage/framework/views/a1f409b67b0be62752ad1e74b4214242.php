<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => $partner->name . ' - Mitra Industri']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($partner->name . ' - Mitra Industri')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    
    <!-- Hero Section (Parallax & Animated) -->
    <div class="relative w-full h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden bg-charcoal-950">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <!-- Using Unsplash as a fallback background, simulating a workshop/industry -->
            <img src="https://images.unsplash.com/photo-1599252328221-5c8c50b73df7?q=80&w=1920&auto=format&fit=crop" 
                 alt="Industri Otomotif" 
                 class="w-full h-full object-cover mix-blend-overlay opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-950/60 to-transparent"></div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute inset-0 z-10 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-figma-red/20 to-transparent z-10"></div>

        <!-- Content -->
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-20 text-center reveal-on-scroll reveal-up']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-20 text-center reveal-on-scroll reveal-up']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <div class="inline-flex items-center gap-3 mb-6">
                <div class="w-12 h-[2px] bg-figma-red"></div>
                <span class="font-sans font-bold text-[14px] md:text-[16px] leading-none tracking-[3px] text-white uppercase">
                    Mitra Utama Industri
                </span>
                <div class="w-12 h-[2px] bg-figma-red"></div>
            </div>

            <!-- Logo (Large) -->
            <div class="w-32 h-32 md:w-48 md:h-48 mx-auto bg-white rounded-full flex items-center justify-center p-6 shadow-2xl mb-8 transform hover:scale-105 transition-transform duration-500 border-4 border-white/10 relative">
                <div class="absolute inset-0 rounded-full border border-figma-red animate-ping opacity-20"></div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->logo): ?>
                    <img src="<?php echo e(Storage::url($partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" class="w-full h-full object-contain">
                <?php else: ?>
                    <span class="font-heading font-black text-4xl text-charcoal-300"><?php echo e(substr($partner->name, 0, 1)); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <h1 class="font-heading font-black text-[40px] md:text-[56px] text-white leading-tight mb-4 drop-shadow-lg">
                <?php echo e($partner->name); ?>

            </h1>
            
            <p class="font-sans text-[18px] md:text-[20px] text-gray-300 max-w-[800px] mx-auto">
                <?php echo e($partner->industry_type ?? 'Industri Manufaktur & Distribusi Otomotif'); ?>

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
    </div>

    <!-- Main Content Sections (Stacked vertically like a Landing Page) -->
    
    <!-- Section 1: Profil Perusahaan -->
    <section class="py-20 md:py-28 bg-white relative z-30 -mt-8 rounded-t-[32px] md:rounded-t-[48px] shadow-[0_-10px_40px_rgba(0,0,0,0.1)] border-t border-gray-100">
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

            <div class="max-w-4xl mx-auto text-center reveal-on-scroll reveal-up">
                <div class="inline-flex items-center gap-3 mb-6 justify-center">
                    <h2 class="font-heading font-extrabold text-[32px] md:text-[40px] text-figma-dark">Profil & Sejarah</h2>
                </div>
                <div class="w-24 h-[3px] bg-figma-red mx-auto mb-10"></div>
                
                <div class="prose prose-lg mx-auto font-sans text-gray-600 leading-[1.8] prose-headings:font-heading prose-headings:font-bold prose-headings:text-figma-dark prose-a:text-figma-red prose-img:rounded-xl text-left">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->description): ?>
                        <?php echo \App\Support\HtmlSanitizer::clean($partner->description); ?>

                    <?php else: ?>
                        <p class="italic text-gray-400 text-center">Deskripsi profil belum ditambahkan.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

    <!-- Section 2: Program Kemitraan (Alternating Background) -->
    <section class="py-20 md:py-28 bg-gray-50 border-y border-gray-200 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute -left-32 -bottom-32 w-96 h-96 bg-figma-red/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -right-32 -top-32 w-96 h-96 bg-figma-red/5 rounded-full blur-3xl pointer-events-none"></div>
        
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

            <div class="text-center mb-16">
                <h2 class="font-heading font-extrabold text-[32px] md:text-[40px] text-figma-dark mb-6">Program Kelas Industri</h2>
                <div class="w-24 h-[3px] bg-figma-red mx-auto mb-6"></div>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto text-[16px] md:text-[18px]">
                    Kolaborasi nyata untuk menciptakan lulusan yang siap kerja dengan standar operasional dan teknologi otomotif mutakhir.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-figma-red/30 transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-figma-red/5 rounded-full group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>
                    <div class="w-14 h-14 bg-charcoal-900 text-white rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-[22px] text-figma-dark mb-4">Sinkronisasi Kurikulum</h3>
                    <p class="font-sans text-[15px] text-gray-600 leading-relaxed">
                        Kurikulum TBSM diselaraskan secara penuh dengan standar kompetensi teknis Astra Honda Motor, memastikan materi yang dipelajari relevan dengan kebutuhan bengkel resmi AHASS.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-figma-red/30 transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-figma-red/5 rounded-full group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>
                    <div class="w-14 h-14 bg-charcoal-900 text-white rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-[22px] text-figma-dark mb-4">Teaching Factory</h3>
                    <p class="font-sans text-[15px] text-gray-600 leading-relaxed">
                        Penerapan standar operasional prosedur (SOP) AHASS di bengkel praktik sekolah, didukung dengan donasi unit motor injeksi terbaru untuk praktik simulasi kerja nyata.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-figma-red/30 transition-all duration-300 group relative overflow-hidden md:col-span-2 lg:col-span-1">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-figma-red/5 rounded-full group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>
                    <div class="w-14 h-14 bg-figma-red text-white rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-[22px] text-figma-dark mb-4">OJT & Perekrutan BKK</h3>
                    <p class="font-sans text-[15px] text-gray-600 leading-relaxed">
                        Program magang bersertifikat langsung di jaringan bengkel AHASS. Siswa unggulan memiliki peluang besar untuk direkrut segera setelah lulus melalui Bursa Kerja Khusus.
                    </p>
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

    <!-- Section 3: Bursa Karir -->
    <section class="py-20 md:py-28 bg-white reveal-on-scroll reveal-up">
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'max-w-5xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-5xl']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <h2 class="font-heading font-extrabold text-[32px] md:text-[40px] text-figma-dark mb-4">Bursa Karir Tersedia</h2>
                    <div class="w-24 h-[3px] bg-figma-red"></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($partner->jobVacancies) && $partner->jobVacancies->count() > 0): ?>
                    <div class="font-sans font-bold text-gray-500 bg-gray-100 px-4 py-2 rounded-lg">
                        <?php echo e($partner->jobVacancies->count()); ?> Lowongan Aktif
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($partner->jobVacancies) && $partner->jobVacancies->count() > 0): ?>
                <div class="grid grid-cols-1 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $partner->jobVacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" class="flex flex-col md:flex-row md:items-center justify-between p-6 md:p-8 bg-white border-2 border-gray-100 hover:border-figma-red hover:shadow-xl transition-all duration-300 gap-6 rounded-2xl group">
                            
                            <div>
                                <h3 class="font-heading font-bold text-[22px] text-figma-dark group-hover:text-figma-red transition-colors mb-3"><?php echo e($job->title); ?></h3>
                                <div class="flex flex-wrap items-center gap-x-8 gap-y-3 font-sans text-[15px] text-gray-500">
                                    <span class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        </div>
                                        <?php echo e($job->location ?? 'Indonesia'); ?>

                                    </span>
                                    <span class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <?php echo e($job->work_type ?? 'Full-time'); ?>

                                    </span>
                                </div>
                            </div>
                            
                            <div class="md:text-right shrink-0">
                                <div class="inline-flex items-center justify-center px-6 py-3 bg-figma-dark text-white font-sans font-bold text-[14px] uppercase tracking-wide rounded-lg group-hover:bg-figma-red transition-colors shadow-md">
                                    Lihat Detail
                                </div>
                            </div>
                        </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php else: ?>
                <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-16 text-center flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-6 text-gray-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-[24px] text-figma-dark mb-3">Belum Ada Lowongan</h3>
                    <p class="font-sans text-[16px] text-gray-500 max-w-md">Saat ini belum ada informasi lowongan karir yang diterbitkan oleh mitra ini. Silakan pantau secara berkala.</p>
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

    <!-- Section 4: Kontak & Informasi -->
    <section class="py-20 md:py-28 bg-charcoal-900 text-white relative reveal-on-scroll reveal-up">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
        
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 max-w-5xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 max-w-5xl']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <div class="text-center mb-16">
                <h2 class="font-heading font-extrabold text-[32px] md:text-[40px] text-white mb-6">Informasi Kontak</h2>
                <div class="w-24 h-[3px] bg-figma-red mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->address): ?>
                    <div class="bg-charcoal-800 p-8 rounded-2xl border border-charcoal-700 flex flex-col items-center text-center hover:border-figma-red/50 hover:bg-charcoal-800/80 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full bg-charcoal-950 flex items-center justify-center text-figma-red shadow-inner mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="block font-heading font-bold text-[18px] text-white mb-3">Kantor Pusat</span>
                        <span class="font-sans text-[15px] text-gray-400 leading-relaxed"><?php echo e($partner->address); ?></span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->website): ?>
                    <a href="<?php echo e(Str::startsWith($partner->website, 'http') ? $partner->website : 'https://'.$partner->website); ?>" target="_blank" class="bg-charcoal-800 p-8 rounded-2xl border border-charcoal-700 flex flex-col items-center text-center hover:border-figma-red hover:bg-figma-red hover:text-white transition-all duration-300 group">
                        <div class="w-14 h-14 rounded-full bg-charcoal-950 group-hover:bg-charcoal-900/20 flex items-center justify-center text-figma-red group-hover:text-white shadow-inner mb-6 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <span class="block font-heading font-bold text-[18px] text-white mb-3">Situs Resmi</span>
                        <span class="font-sans text-[15px] text-gray-400 group-hover:text-white/90 line-clamp-2 leading-relaxed transition-colors"><?php echo e($partner->website); ?></span>
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->phone): ?>
                    <div class="bg-charcoal-800 p-8 rounded-2xl border border-charcoal-700 flex flex-col items-center text-center hover:border-figma-red/50 hover:bg-charcoal-800/80 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full bg-charcoal-950 flex items-center justify-center text-figma-red shadow-inner mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <span class="block font-heading font-bold text-[18px] text-white mb-3">Telepon</span>
                        <span class="font-sans text-[15px] text-gray-400 leading-relaxed"><?php echo e($partner->phone); ?></span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->email): ?>
                    <div class="bg-charcoal-800 p-8 rounded-2xl border border-charcoal-700 flex flex-col items-center text-center hover:border-figma-red/50 hover:bg-charcoal-800/80 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full bg-charcoal-950 flex items-center justify-center text-figma-red shadow-inner mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="block font-heading font-bold text-[18px] text-white mb-3">Alamat Email</span>
                        <span class="font-sans text-[15px] text-gray-400 leading-relaxed break-all"><?php echo e($partner->email); ?></span>
                    </div>
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
    </section>

    <!-- Final CTA Section -->
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
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views\frontend\partnership_show.blade.php ENDPATH**/ ?>