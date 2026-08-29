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
      "name": "<?php echo e($settings->get('site_name', 'TBSM')); ?>",
      "url": "<?php echo e(url('/')); ?>",
      "logo": "<?php echo e(url('/logo.png')); ?>"
    }
    </script>
    <?php $__env->stopPush(); ?>

    <!-- Main Auto Layout Wrapper -->
    <main class="flex flex-col items-center bg-white w-full overflow-hidden">
        
        <!-- 01. Hero Section -->
        <?php if (isset($component)) { $__componentOriginale51f528b6a918368a1bc14f88f330599 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale51f528b6a918368a1bc14f88f330599 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.hero-slider','data' => ['mainImage' => $settings->get('hero_image')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.hero-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['main-image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings->get('hero_image'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale51f528b6a918368a1bc14f88f330599)): ?>
<?php $attributes = $__attributesOriginale51f528b6a918368a1bc14f88f330599; ?>
<?php unset($__attributesOriginale51f528b6a918368a1bc14f88f330599); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale51f528b6a918368a1bc14f88f330599)): ?>
<?php $component = $__componentOriginale51f528b6a918368a1bc14f88f330599; ?>
<?php unset($__componentOriginale51f528b6a918368a1bc14f88f330599); ?>
<?php endif; ?>

        <!-- 02. Introduction -->
        <?php if (isset($component)) { $__componentOriginal56698e88d6c7cfff743551f3d24675e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56698e88d6c7cfff743551f3d24675e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.intro','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.intro'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56698e88d6c7cfff743551f3d24675e9)): ?>
<?php $attributes = $__attributesOriginal56698e88d6c7cfff743551f3d24675e9; ?>
<?php unset($__attributesOriginal56698e88d6c7cfff743551f3d24675e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56698e88d6c7cfff743551f3d24675e9)): ?>
<?php $component = $__componentOriginal56698e88d6c7cfff743551f3d24675e9; ?>
<?php unset($__componentOriginal56698e88d6c7cfff743551f3d24675e9); ?>
<?php endif; ?>
        
        <!-- 03. Statistics -->
        <?php if (isset($component)) { $__componentOriginalfb39aa7ed1f0133a6c11f7e498f6663a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb39aa7ed1f0133a6c11f7e498f6663a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.statistics','data' => ['alumniCount' => $alumniCount ?? 0,'partnerCount' => $partnerCount ?? 0,'achievementCount' => $achievementCount ?? 0,'facilityCount' => $facilityCount ?? 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.statistics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['alumni-count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($alumniCount ?? 0),'partner-count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($partnerCount ?? 0),'achievement-count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($achievementCount ?? 0),'facility-count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($facilityCount ?? 0)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb39aa7ed1f0133a6c11f7e498f6663a)): ?>
<?php $attributes = $__attributesOriginalfb39aa7ed1f0133a6c11f7e498f6663a; ?>
<?php unset($__attributesOriginalfb39aa7ed1f0133a6c11f7e498f6663a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb39aa7ed1f0133a6c11f7e498f6663a)): ?>
<?php $component = $__componentOriginalfb39aa7ed1f0133a6c11f7e498f6663a; ?>
<?php unset($__componentOriginalfb39aa7ed1f0133a6c11f7e498f6663a); ?>
<?php endif; ?>

        <!-- 04. Why TBSM -->
        <?php if (isset($component)) { $__componentOriginala845f62f2f6c1bd1f38e93f156d34b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala845f62f2f6c1bd1f38e93f156d34b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.why-tbsm','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.why-tbsm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala845f62f2f6c1bd1f38e93f156d34b41)): ?>
<?php $attributes = $__attributesOriginala845f62f2f6c1bd1f38e93f156d34b41; ?>
<?php unset($__attributesOriginala845f62f2f6c1bd1f38e93f156d34b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala845f62f2f6c1bd1f38e93f156d34b41)): ?>
<?php $component = $__componentOriginala845f62f2f6c1bd1f38e93f156d34b41; ?>
<?php unset($__componentOriginala845f62f2f6c1bd1f38e93f156d34b41); ?>
<?php endif; ?>

        <!-- 05. Academic / Programs -->
        <?php if (isset($component)) { $__componentOriginala00babb7da8d7112f4bee0c7770df83a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala00babb7da8d7112f4bee0c7770df83a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.academic','data' => ['programs' => $programs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.academic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['programs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($programs)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala00babb7da8d7112f4bee0c7770df83a)): ?>
<?php $attributes = $__attributesOriginala00babb7da8d7112f4bee0c7770df83a; ?>
<?php unset($__attributesOriginala00babb7da8d7112f4bee0c7770df83a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala00babb7da8d7112f4bee0c7770df83a)): ?>
<?php $component = $__componentOriginala00babb7da8d7112f4bee0c7770df83a; ?>
<?php unset($__componentOriginala00babb7da8d7112f4bee0c7770df83a); ?>
<?php endif; ?>

        <!-- 06. Facilities -->
        <?php if (isset($component)) { $__componentOriginal004431fd59e1124a6022093dc7dd4536 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal004431fd59e1124a6022093dc7dd4536 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.facilities','data' => ['facilities' => $facilities]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.facilities'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['facilities' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($facilities)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal004431fd59e1124a6022093dc7dd4536)): ?>
<?php $attributes = $__attributesOriginal004431fd59e1124a6022093dc7dd4536; ?>
<?php unset($__attributesOriginal004431fd59e1124a6022093dc7dd4536); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal004431fd59e1124a6022093dc7dd4536)): ?>
<?php $component = $__componentOriginal004431fd59e1124a6022093dc7dd4536; ?>
<?php unset($__componentOriginal004431fd59e1124a6022093dc7dd4536); ?>
<?php endif; ?>

        <!-- 07. Industry Partnership -->
        <?php if (isset($component)) { $__componentOriginal9f568400951972cf39156b5821071b31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f568400951972cf39156b5821071b31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.partnership','data' => ['partner' => $partner]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.partnership'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['partner' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($partner)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f568400951972cf39156b5821071b31)): ?>
<?php $attributes = $__attributesOriginal9f568400951972cf39156b5821071b31; ?>
<?php unset($__attributesOriginal9f568400951972cf39156b5821071b31); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f568400951972cf39156b5821071b31)): ?>
<?php $component = $__componentOriginal9f568400951972cf39156b5821071b31; ?>
<?php unset($__componentOriginal9f568400951972cf39156b5821071b31); ?>
<?php endif; ?>

        <!-- 08. Achievements -->
        <?php if (isset($component)) { $__componentOriginalc2241c57112ee1982dc41526b63fd686 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2241c57112ee1982dc41526b63fd686 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.achievements','data' => ['achievements' => $achievements]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.achievements'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['achievements' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($achievements)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2241c57112ee1982dc41526b63fd686)): ?>
<?php $attributes = $__attributesOriginalc2241c57112ee1982dc41526b63fd686; ?>
<?php unset($__attributesOriginalc2241c57112ee1982dc41526b63fd686); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2241c57112ee1982dc41526b63fd686)): ?>
<?php $component = $__componentOriginalc2241c57112ee1982dc41526b63fd686; ?>
<?php unset($__componentOriginalc2241c57112ee1982dc41526b63fd686); ?>
<?php endif; ?>

        <!-- 09. Teachers / Instructors -->
        <?php if (isset($component)) { $__componentOriginal8454ea0020a187c33f279cdb427b8546 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8454ea0020a187c33f279cdb427b8546 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.teachers','data' => ['headOfDepartment' => $headOfDepartment,'teachers' => $teachers]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.teachers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['head-of-department' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($headOfDepartment),'teachers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teachers)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8454ea0020a187c33f279cdb427b8546)): ?>
<?php $attributes = $__attributesOriginal8454ea0020a187c33f279cdb427b8546; ?>
<?php unset($__attributesOriginal8454ea0020a187c33f279cdb427b8546); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8454ea0020a187c33f279cdb427b8546)): ?>
<?php $component = $__componentOriginal8454ea0020a187c33f279cdb427b8546; ?>
<?php unset($__componentOriginal8454ea0020a187c33f279cdb427b8546); ?>
<?php endif; ?>

        <!-- 10. News / Information -->
        <?php if (isset($component)) { $__componentOriginale6585e16031ab65948b9f301f09cf7de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6585e16031ab65948b9f301f09cf7de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.news','data' => ['latestNews' => $latestNews]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['latest-news' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestNews)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6585e16031ab65948b9f301f09cf7de)): ?>
<?php $attributes = $__attributesOriginale6585e16031ab65948b9f301f09cf7de; ?>
<?php unset($__attributesOriginale6585e16031ab65948b9f301f09cf7de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6585e16031ab65948b9f301f09cf7de)): ?>
<?php $component = $__componentOriginale6585e16031ab65948b9f301f09cf7de; ?>
<?php unset($__componentOriginale6585e16031ab65948b9f301f09cf7de); ?>
<?php endif; ?>

        <!-- 11. Gallery -->
        <?php if (isset($component)) { $__componentOriginaleaeb962b499eaa6fe8d42e4734a63d66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleaeb962b499eaa6fe8d42e4734a63d66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.gallery','data' => ['galleries' => $galleries]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['galleries' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($galleries)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleaeb962b499eaa6fe8d42e4734a63d66)): ?>
<?php $attributes = $__attributesOriginaleaeb962b499eaa6fe8d42e4734a63d66; ?>
<?php unset($__attributesOriginaleaeb962b499eaa6fe8d42e4734a63d66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleaeb962b499eaa6fe8d42e4734a63d66)): ?>
<?php $component = $__componentOriginaleaeb962b499eaa6fe8d42e4734a63d66; ?>
<?php unset($__componentOriginaleaeb962b499eaa6fe8d42e4734a63d66); ?>
<?php endif; ?>

        <!-- 12. Career / Future -->
        <?php if (isset($component)) { $__componentOriginal0319a387f4e5e5acb83897926f0a529a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0319a387f4e5e5acb83897926f0a529a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.home.career','data' => ['jobVacancies' => $jobVacancies]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.home.career'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['job-vacancies' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobVacancies)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0319a387f4e5e5acb83897926f0a529a)): ?>
<?php $attributes = $__attributesOriginal0319a387f4e5e5acb83897926f0a529a; ?>
<?php unset($__attributesOriginal0319a387f4e5e5acb83897926f0a529a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0319a387f4e5e5acb83897926f0a529a)): ?>
<?php $component = $__componentOriginal0319a387f4e5e5acb83897926f0a529a; ?>
<?php unset($__componentOriginal0319a387f4e5e5acb83897926f0a529a); ?>
<?php endif; ?>

        <!-- 13. Final CTA -->
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

    <?php $__env->startPush('scripts'); ?>
    <!-- The hero slider logic is included in app.js via Vite -->
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
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/frontend/home.blade.php ENDPATH**/ ?>