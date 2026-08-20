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

    <!-- 01. HERO SECTION -->
    <section class="relative bg-white overflow-hidden flex flex-col justify-center min-h-[85vh] lg:min-h-[75vh] pt-8 pb-16 lg:py-0 border-b border-charcoal-100">
        <!-- Decorative Grid Background -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20" style="background-image: linear-gradient(to right, #e2e8f0 1px, transparent 1px), linear-gradient(to bottom, #e2e8f0 1px, transparent 1px); background-size: 4rem 4rem;"></div>
        
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 w-full']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Text Content -->
                <div class="lg:col-span-7 flex flex-col justify-center reveal-on-scroll reveal-up">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-10 h-0.5 bg-primary-600"></span>
                        <span class="text-xs font-bold tracking-widest text-charcoal-500 uppercase">Vocational Education &middot; Automotive</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-charcoal-900 tracking-tight leading-[1.1] mb-6">
                        <?php echo \App\Support\HtmlSanitizer::clean($settings->get('hero_title', 'Menyiapkan Talenta Otomotif untuk Dunia Industri.')); ?>

                    </h1>
                    
                    <p class="text-lg sm:text-xl text-charcoal-600 font-medium leading-relaxed mb-10 max-w-2xl">
                        <?php echo \App\Support\HtmlSanitizer::clean($settings->get('hero_subtitle', 'Pusat keunggulan pendidikan vokasi dengan fasilitas standar industri dan kurikulum berbasis kompetensi yang dirancang bersama mitra perusahaan.')); ?>

                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                        <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.programs')).'','variant' => 'primary','size' => 'lg','class' => 'justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.programs')).'','variant' => 'primary','size' => 'lg','class' => 'justify-center']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            Jelajahi Program
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('about')).'','variant' => 'outline','size' => 'lg','class' => 'justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'','variant' => 'outline','size' => 'lg','class' => 'justify-center']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            Profil Kami
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

                <!-- Visual Content -->
                <div class="lg:col-span-5 relative reveal-on-scroll reveal-fade delay-200">
                    <div class="relative w-full aspect-[4/3] lg:aspect-[3/4] rounded-2xl overflow-hidden bg-charcoal-100 border border-charcoal-200">
                        <img src="<?php echo e($settings->get('hero_image') ? Storage::url($settings->get('hero_image')) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1000&auto=format&fit=crop'); ?>" alt="Kegiatan Praktik Siswa" class="absolute inset-0 w-full h-full object-cover" loading="eager">
                        
                        <!-- Overlay Accent -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-charcoal-900/60 via-transparent to-transparent"></div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-6 left-6 right-6 lg:right-auto bg-white/95 backdrop-blur-sm p-4 rounded-xl shadow-xl border border-white/20">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center text-primary-600">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-charcoal-500 uppercase tracking-wider">Mitra Aktif</p>
                                    <p class="text-xl font-extrabold text-charcoal-900"><?php echo e($partnerCount ?: '30'); ?>+ Industri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative Dots -->
                    <div class="absolute -z-10 -bottom-6 -right-6 text-charcoal-200 hidden lg:block">
                        <svg width="104" height="104" fill="currentColor" viewBox="0 0 104 104"><pattern id="dots" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="2"></circle></pattern><rect width="104" height="104" fill="url(#dots)"></rect></svg>
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

    <!-- 02. QUICK TRUST STRIP -->
    <section class="bg-charcoal-950 py-8 lg:py-10 border-b-4 border-primary-600">
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

            <div class="flex flex-col sm:flex-row flex-wrap sm:flex-nowrap justify-between gap-6 sm:gap-4 divide-y sm:divide-y-0 sm:divide-x divide-charcoal-800">
                
                <div class="flex-1 flex items-center justify-center sm:justify-start gap-4 pt-4 sm:pt-0">
                    <span class="text-4xl font-light text-charcoal-500">01</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white"><?php echo e($programs->count() ?: 3); ?></p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Program Ahli</p>
                    </div>
                </div>

                <div class="flex-1 flex items-center justify-center sm:justify-center gap-4 pt-4 sm:pt-0 pl-0 sm:pl-8">
                    <span class="text-4xl font-light text-charcoal-500">02</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white"><?php echo e($facilityCount ?: 8); ?></p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Fasilitas Bengkel</p>
                    </div>
                </div>

                <div class="flex-1 flex items-center justify-center sm:justify-center gap-4 pt-4 sm:pt-0 pl-0 sm:pl-8">
                    <span class="text-4xl font-light text-charcoal-500">03</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white"><?php echo e($achievementCount ?: 24); ?></p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Prestasi Siswa</p>
                    </div>
                </div>

                <div class="flex-1 flex items-center justify-center sm:justify-end gap-4 pt-4 sm:pt-0 pl-0 sm:pl-8">
                    <span class="text-4xl font-light text-charcoal-500">04</span>
                    <div>
                        <p class="text-2xl font-extrabold text-white"><?php echo e($alumniCount ?: 1200); ?>+</p>
                        <p class="text-xs font-bold text-charcoal-400 uppercase tracking-wider mt-0.5">Alumni Bekerja</p>
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

    <!-- 03. INTRODUCTION / ABOUT -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-charcoal-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-charcoal-50']); ?>
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <!-- Left: Typography -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up">
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
01 &nbsp;/&nbsp; PROFIL KAMI <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight leading-tight mt-4 mb-6">
                        Menyiapkan kompetensi masa depan, hari ini.
                    </h2>
                    <div class="text-charcoal-600 text-lg leading-relaxed mb-8 space-y-4">
                        <?php echo \App\Support\HtmlSanitizer::clean($settings->get('profile_history', '<p>Jurusan Teknik Otomotif kami berdiri dengan komitmen menjembatani gap antara kurikulum sekolah dengan tuntutan riil di industri otomotif modern.</p>')); ?>

                    </div>
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('about')).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'','variant' => 'outline']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Baca Selengkapnya
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

                <!-- Right: Editorial Image & Quote -->
                <div class="lg:col-span-7 relative reveal-on-scroll reveal-fade delay-100">
                    <div class="flex justify-end relative">
                        <img src="<?php echo e(isset($headOfDepartment) && $headOfDepartment->photo ? Storage::url($headOfDepartment->photo) : 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=600&auto=format&fit=crop'); ?>" alt="Ketua Jurusan" class="w-[85%] lg:w-[75%] rounded-2xl shadow-xl aspect-square object-cover" loading="lazy">
                        
                        <!-- Overlay Quote Box -->
                        <div class="absolute bottom-0 left-0 lg:-left-12 bg-white p-6 lg:p-8 rounded-2xl shadow-2xl border border-charcoal-100 max-w-sm transform translate-y-8 lg:translate-y-12">
                            <svg class="w-8 h-8 text-primary-500 mb-4 opacity-50" fill="currentColor" viewBox="0 0 32 32"><path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" /></svg>
                            <p class="text-charcoal-900 font-bold text-sm lg:text-base italic leading-relaxed">
                                "<?php echo \App\Support\HtmlSanitizer::clean($settings->get('head_quote', 'Fokus kami adalah membentuk mekanik yang tidak hanya mengerti mesin, tetapi memiliki etos kerja industri.')); ?>"
                            </p>
                            <p class="mt-4 text-xs font-extrabold text-charcoal-500 uppercase tracking-widest">- <?php echo e(isset($headOfDepartment) ? $headOfDepartment->name : 'Kepala Jurusan'); ?></p>
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

    <!-- 04. PROGRAM & COMPETENCY -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-white']); ?>
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

            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-up">
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
02 &nbsp;/&nbsp; KOMPETENSI KEAHLIAN <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Jalur Pilihan Masa Depan</h2>
            </div>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($programs->isNotEmpty()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('academic.programs')); ?>#<?php echo e($program->slug); ?>" class="group block relative bg-charcoal-50 rounded-2xl overflow-hidden border border-charcoal-100 hover:border-primary-200 hover:shadow-xl transition-all duration-300 focus-ring reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100); ?>">
                    <!-- Thumbnail -->
                    <div class="aspect-video relative overflow-hidden bg-charcoal-200">
                        <img src="<?php echo e($program->thumbnail ? Storage::url($program->thumbnail) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=600&auto=format&fit=crop'); ?>" alt="<?php echo e($program->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <!-- Decorative tag -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal-900 text-xs font-bold px-3 py-1 rounded shadow-sm">
                            <?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?>

                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 lg:p-8 flex flex-col h-full">
                        <h3 class="text-xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors mb-3 leading-tight"><?php echo e($program->name); ?></h3>
                        <p class="text-sm text-charcoal-600 line-clamp-3 mb-6"><?php echo e(Str::limit(strip_tags($program->description), 120)); ?></p>
                        
                        <!-- List Kompetensi Preview -->
                        <ul class="mt-auto space-y-2 border-t border-charcoal-100 pt-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $program->competencies->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li class="flex items-start text-xs font-medium text-charcoal-600">
                                <svg class="w-4 h-4 mr-2 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="line-clamp-1"><?php echo e($comp->name); ?></span>
                            </li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <li class="text-xs text-charcoal-400 italic">Data kompetensi belum diisi.</li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->competencies->count() > 2): ?>
                            <li class="text-xs font-bold text-charcoal-400 pl-6">+<?php echo e($program->competencies->count() - 2); ?> lainnya</li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php else: ?>
            <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Program Keahlian Belum Tersedia','message' => 'Kami sedang menyusun kurikulum terbaik untuk Anda.','icon' => 'academic-cap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Program Keahlian Belum Tersedia','message' => 'Kami sedang menyusun kurikulum terbaik untuk Anda.','icon' => 'academic-cap']); ?>
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

    <!-- 05. FACILITIES (EDITORIAL) -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-charcoal-900 text-white overflow-hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-charcoal-900 text-white overflow-hidden']); ?>
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Text Intro -->
                <div class="lg:col-span-4 flex flex-col justify-center reveal-on-scroll reveal-up">
                    <div class="text-primary-500 text-sm font-bold tracking-widest uppercase mb-4">03 &nbsp;/&nbsp; FASILITAS BENGKEL</div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight mb-6">Standar Industri di Lingkungan Sekolah.</h2>
                    <p class="text-charcoal-300 text-lg mb-8 leading-relaxed">Peralatan praktik yang dirancang menyamai kondisi riil di bengkel resmi untuk memastikan siswa terbiasa dengan teknologi terkini.</p>
                    <div class="hidden lg:block">
                        <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.facilities')).'','variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.facilities')).'','variant' => 'primary']); ?>
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
                </div>

                <!-- Facilities Composition -->
                <div class="lg:col-span-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facilities->isNotEmpty()): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('academic.facilities')); ?>" class="group block relative rounded-2xl overflow-hidden <?php echo e($index === 0 ? 'md:col-span-2 aspect-video' : 'aspect-square'); ?> focus-ring bg-charcoal-800 reveal-on-scroll reveal-fade delay-<?php echo e($index * 100); ?>">
                            <img src="<?php echo e($facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1632823465306-cdbb32ab7586?q=80&w=800&auto=format&fit=crop'); ?>" alt="<?php echo e($facility->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/40 to-transparent opacity-90"></div>
                            
                            <div class="absolute inset-0 p-6 lg:p-8 flex flex-col justify-end">
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-primary-400 transition-colors"><?php echo e($facility->name); ?></h3>
                                <p class="text-sm text-charcoal-300 line-clamp-2 md:opacity-0 md:translate-y-4 md:group-hover:opacity-100 md:group-hover:translate-y-0 transition-all duration-300"><?php echo e(Str::limit(strip_tags($facility->description), 100)); ?></p>
                            </div>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Belum Ada Data Fasilitas','message' => 'Informasi bengkel sedang diperbarui.','icon' => 'cog']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Data Fasilitas','message' => 'Informasi bengkel sedang diperbarui.','icon' => 'cog']); ?>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Mobile CTA -->
                <div class="col-span-full lg:hidden text-center mt-4">
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.facilities')).'','variant' => 'outline','class' => 'w-full justify-center text-white border-charcoal-600 hover:bg-charcoal-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.facilities')).'','variant' => 'outline','class' => 'w-full justify-center text-white border-charcoal-600 hover:bg-charcoal-800']); ?>
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

    <!-- 06. INDUSTRY & CAREER -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-charcoal-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-charcoal-50']); ?>
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

            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-up">
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
04 &nbsp;/&nbsp; KONEKSI INDUSTRI <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Peluang Karier Lulusan</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Partner Wall -->
                <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                    <div class="bg-white rounded-2xl p-8 border border-charcoal-100 shadow-sm h-full">
                        <h3 class="text-xl font-bold text-charcoal-900 mb-8 flex items-center gap-3">
                            <svg class="w-6 h-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            Partner Penyaluran Lulusan
                        </h3>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e(route('partnership.show', $partner->slug)); ?>" class="group flex items-center justify-center p-4 border border-charcoal-100 rounded-xl hover:border-primary-200 transition-colors focus-ring h-20">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->logo): ?>
                                    <img src="<?php echo e(Storage::url($partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" class="max-h-10 max-w-full object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all" loading="lazy">
                                <?php else: ?>
                                    <span class="text-xs font-bold text-charcoal-400 text-center uppercase"><?php echo e($partner->name); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <div class="col-span-full">
                                <p class="text-sm text-charcoal-500 text-center py-4">Belum ada partner industri tercatat.</p>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="mt-8">
                            <a href="<?php echo e(route('partnership.index')); ?>" class="text-sm font-bold text-primary-600 hover:text-primary-700 flex items-center w-max">
                                Lihat Seluruh Mitra <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Job Vacancies -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-up delay-100">
                    <div class="bg-primary-950 rounded-2xl p-8 shadow-xl relative overflow-hidden h-full">
                        <!-- BG Accent -->
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary-900 rounded-full blur-3xl opacity-50"></div>
                        
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-white mb-2">Bursa Kerja Khusus (BKK)</h3>
                            <p class="text-sm text-primary-200 mb-8">Informasi lowongan kerja terbaru untuk alumni dan siswa tingkat akhir.</p>
                            
                            <div class="space-y-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $jobVacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" class="group block bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors focus-ring">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-white group-hover:text-primary-300 transition-colors pr-4"><?php echo e($job->title); ?></h4>
                                        <?php if (isset($component)) { $__componentOriginal22ac0d6ca2c1f719a8573e07756385be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22ac0d6ca2c1f719a8573e07756385be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.badge','data' => ['type' => 'primary','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','size' => 'sm']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
<?php echo e(ucfirst(str_replace('_', ' ', $job->employment_type))); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22ac0d6ca2c1f719a8573e07756385be)): ?>
<?php $attributes = $__attributesOriginal22ac0d6ca2c1f719a8573e07756385be; ?>
<?php unset($__attributesOriginal22ac0d6ca2c1f719a8573e07756385be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22ac0d6ca2c1f719a8573e07756385be)): ?>
<?php $component = $__componentOriginal22ac0d6ca2c1f719a8573e07756385be; ?>
<?php unset($__componentOriginal22ac0d6ca2c1f719a8573e07756385be); ?>
<?php endif; ?>
                                    </div>
                                    <p class="text-sm text-primary-100 mb-3"><?php echo e($job->industryPartner->name ?? $job->position); ?></p>
                                    <div class="flex items-center text-xs text-primary-300 gap-4">
                                        <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg> <?php echo e($job->location); ?></span>
                                    </div>
                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center">
                                    <p class="text-sm text-primary-200">Belum ada lowongan baru.</p>
                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            
                            <div class="mt-8 text-center">
                                <a href="<?php echo e(route('jobs.index')); ?>" class="inline-flex w-full items-center justify-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors focus-ring">
                                    Lihat Semua Lowongan
                                </a>
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

    <!-- 07. NEWS & AGENDA -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-white']); ?>
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

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 reveal-on-scroll reveal-up">
                <div>
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
05 &nbsp;/&nbsp; INFORMASI TERKINI <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Berita & Agenda</h2>
                </div>
                <div class="mt-6 md:mt-0">
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('news.index')).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('news.index')).'','variant' => 'outline']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Arsip Berita
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <!-- Latest News -->
                <div class="lg:col-span-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestNews->isNotEmpty()): ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $latestNews->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <article class="group reveal-on-scroll reveal-up delay-<?php echo e($loop->iteration * 100); ?>">
                            <a href="<?php echo e(route('news.show', $news->slug)); ?>" class="block relative aspect-video rounded-2xl overflow-hidden mb-5 bg-charcoal-100 focus-ring">
                                <img src="<?php echo e($news->thumbnail ? Storage::url($news->thumbnail) : 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=600&auto=format&fit=crop'); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="<?php echo e($news->title); ?>" loading="lazy">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($news->category): ?>
                                <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1 text-xs font-bold text-primary-600 rounded shadow-sm">
                                    <?php echo e($news->category->name); ?>

                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </a>
                            <div>
                                <time class="text-xs font-bold text-charcoal-500 uppercase tracking-wider mb-2 block">
                                    <?php echo e($news->published_at ? $news->published_at->translatedFormat('d F Y') : $news->created_at->translatedFormat('d F Y')); ?>

                                </time>
                                <h3 class="text-xl font-bold text-charcoal-900 group-hover:text-primary-600 transition-colors leading-snug mb-3">
                                    <a href="<?php echo e(route('news.show', $news->slug)); ?>" class="focus:outline-none focus:underline"><?php echo e($news->title); ?></a>
                                </h3>
                                <p class="text-sm text-charcoal-600 line-clamp-2"><?php echo e($news->excerpt ?? Str::limit(strip_tags($news->content), 100)); ?></p>
                            </div>
                        </article>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Belum Ada Berita','message' => 'Berita terbaru akan muncul di sini.','icon' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Berita','message' => 'Berita terbaru akan muncul di sini.','icon' => 'document']); ?>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Agendas -->
                <div class="lg:col-span-4 reveal-on-scroll reveal-up delay-200">
                    <h3 class="text-lg font-bold text-charcoal-900 mb-6 border-b border-charcoal-200 pb-4">Agenda Mendatang</h3>
                    <div class="space-y-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('announcements.show', $agenda->slug)); ?>" class="group flex gap-5 items-start focus-ring rounded-lg p-2 -m-2 hover:bg-charcoal-50 transition-colors">
                            <div class="flex-shrink-0 w-14 h-14 bg-charcoal-100 rounded-xl flex flex-col items-center justify-center border border-charcoal-200 group-hover:bg-primary-50 group-hover:border-primary-200 transition-colors">
                                <span class="text-[10px] font-bold text-charcoal-500 uppercase group-hover:text-primary-600"><?php echo e($agenda->created_at->translatedFormat('M')); ?></span>
                                <span class="text-lg font-extrabold text-charcoal-900 leading-none group-hover:text-primary-700"><?php echo e($agenda->created_at->format('d')); ?></span>
                            </div>
                            <div>
                                <h4 class="font-bold text-charcoal-900 text-sm group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug mb-1"><?php echo e($agenda->title); ?></h4>
                                <span class="text-xs font-medium text-charcoal-500">Lihat Pengumuman &rarr;</span>
                            </div>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <p class="text-sm text-charcoal-500 italic">Tidak ada agenda dalam waktu dekat.</p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

    <!-- 08. GALLERY -->
    <?php if (isset($component)) { $__componentOriginald3709a60425609ff17b7472c44e8aa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3709a60425609ff17b7472c44e8aa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.section','data' => ['class' => 'bg-charcoal-50 border-t border-charcoal-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-charcoal-50 border-t border-charcoal-200']); ?>
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

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 reveal-on-scroll reveal-up">
                <div>
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
06 &nbsp;/&nbsp; AKTIVITAS JURUSAN <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $attributes = $__attributesOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__attributesOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9)): ?>
<?php $component = $__componentOriginalac1079511a1017c8db3b04bb1937d3e9; ?>
<?php unset($__componentOriginalac1079511a1017c8db3b04bb1937d3e9); ?>
<?php endif; ?>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-charcoal-900 tracking-tight mt-4">Galeri Kegiatan</h2>
                </div>
                <div class="mt-6 md:mt-0">
                    <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('gallery.index') ?? '/galeri').'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gallery.index') ?? '/galeri').'','variant' => 'outline']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Lihat Semua Album
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

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($galleries->isNotEmpty()): ?>
            <!-- CSS Grid Asymmetric -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $galleries->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('gallery.show', $album->slug) ?? '#'); ?>" class="group block relative rounded-2xl overflow-hidden bg-charcoal-200 focus-ring <?php echo e($index === 0 ? 'col-span-2 row-span-2 aspect-square md:aspect-auto' : 'col-span-1 aspect-square md:aspect-[4/3]'); ?> reveal-on-scroll reveal-up delay-<?php echo e($index * 100); ?>">
                    <?php 
                        $coverItem = $album->items->first(); 
                        $imageSrc = $coverItem ? Storage::url($coverItem->file_path) : 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=800&auto=format&fit=crop';
                    ?>
                    <img src="<?php echo e($imageSrc); ?>" alt="<?php echo e($album->title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-950 via-charcoal-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    
                    <div class="absolute inset-0 p-4 lg:p-6 flex flex-col justify-end">
                        <h3 class="text-white font-bold <?php echo e($index === 0 ? 'text-2xl lg:text-3xl mb-2' : 'text-sm lg:text-base leading-tight'); ?> group-hover:text-primary-400 transition-colors"><?php echo e($album->title); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index === 0): ?>
                        <p class="text-charcoal-300 text-sm hidden md:block line-clamp-2"><?php echo e(Str::limit(strip_tags($album->description), 100)); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <!-- Photo Count Badge -->
                    <div class="absolute top-4 right-4 bg-charcoal-900/60 backdrop-blur-sm px-2.5 py-1 text-xs font-bold text-white rounded shadow-sm">
                        <?php echo e($album->items->count()); ?> Foto
                    </div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php else: ?>
            <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Belum Ada Album','message' => 'Galeri foto belum tersedia saat ini.','icon' => 'photograph']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Album','message' => 'Galeri foto belum tersedia saat ini.','icon' => 'photograph']); ?>
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

    <!-- 09. FINAL CTA -->
    <section class="bg-charcoal-900 text-white overflow-hidden relative">
        <!-- Decorative grid -->
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(to right, #475569 1px, transparent 1px), linear-gradient(to bottom, #475569 1px, transparent 1px); background-size: 4rem 4rem;"></div>
        
        <?php if (isset($component)) { $__componentOriginal264d3cdba9db237c49d9665edc40da42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264d3cdba9db237c49d9665edc40da42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.layout.container','data' => ['class' => 'relative z-10 py-20 lg:py-28 text-center max-w-4xl mx-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.layout.container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 py-20 lg:py-28 text-center max-w-4xl mx-auto']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <h2 class="text-4xl lg:text-5xl font-extrabold tracking-tight mb-6">Siap Menjadi Ahli Otomotif?</h2>
            <p class="text-lg text-charcoal-300 mb-10 max-w-2xl mx-auto">Bergabunglah dengan jurusan kami dan raih masa depan gemilang di industri otomotif. Fasilitas lengkap, guru profesional, dan lulusan yang terjamin kompetensinya.</p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if (isset($component)) { $__componentOriginal4790532a04fde6528e82c3998ebdc4a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4790532a04fde6528e82c3998ebdc4a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('academic.programs')).'','variant' => 'primary','size' => 'lg','class' => 'w-full sm:w-auto justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('academic.programs')).'','variant' => 'primary','size' => 'lg','class' => 'w-full sm:w-auto justify-center']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Eksplorasi Program
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.button','data' => ['href' => ''.e(route('about')).'#kontak','variant' => 'outline','size' => 'lg','class' => 'w-full sm:w-auto justify-center text-white border-charcoal-600 hover:bg-charcoal-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'#kontak','variant' => 'outline','size' => 'lg','class' => 'w-full sm:w-auto justify-center text-white border-charcoal-600 hover:bg-charcoal-800']); ?>
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