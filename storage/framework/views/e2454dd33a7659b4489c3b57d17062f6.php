<footer class="bg-charcoal-950 text-charcoal-400 mt-auto border-none relative overflow-hidden">
    <!-- Subtle gradient accent at the top of the footer -->
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-charcoal-700 to-transparent opacity-50"></div>
    
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

        <div class="py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
            
            <!-- Brand Section -->
            <div class="lg:col-span-4 lg:pr-12">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 mb-6 focus-ring rounded-xl py-1 px-1 -ml-1 group w-fit">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-charcoal-950 font-black text-xl shadow-sm group-hover:scale-105 transition-transform duration-300">
                        <span class="sr-only">Logo</span>
                        TO
                    </div>
                    <div class="flex flex-col">
                        <span class="font-black text-2xl text-white tracking-tighter leading-none"><?php echo e($settings->get('site_name', 'Teknik Otomotif')); ?></span>
                        <span class="text-[10px] font-bold text-charcoal-500 uppercase tracking-widest mt-1">Sekolah Vokasi</span>
                    </div>
                </a>
                <p class="text-sm leading-relaxed text-charcoal-500 mb-8">
                    <?php echo e($settings->get('site_description', 'Mencetak mekanik dan ahli otomotif masa depan yang kompeten, tangguh, dan berdaya saing di industri modern.')); ?>

                </p>
                
                <!-- Social Media -->
                <div class="flex items-center gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_instagram')): ?>
                    <a href="<?php echo e($settings->get('social_instagram')); ?>" target="_blank" rel="noopener" class="w-10 h-10 rounded-full flex items-center justify-center text-charcoal-500 hover:bg-charcoal-800 hover:text-white transition-all focus-ring"><span class="sr-only">Instagram</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_youtube')): ?>
                    <a href="<?php echo e($settings->get('social_youtube')); ?>" target="_blank" rel="noopener" class="w-10 h-10 rounded-full flex items-center justify-center text-charcoal-500 hover:bg-charcoal-800 hover:text-white transition-all focus-ring"><span class="sr-only">YouTube</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" /></svg></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_facebook')): ?>
                    <a href="<?php echo e($settings->get('social_facebook')); ?>" target="_blank" rel="noopener" class="w-10 h-10 rounded-full flex items-center justify-center text-charcoal-500 hover:bg-charcoal-800 hover:text-white transition-all focus-ring"><span class="sr-only">Facebook</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->get('social_linkedin')): ?>
                    <a href="<?php echo e($settings->get('social_linkedin')); ?>" target="_blank" rel="noopener" class="w-10 h-10 rounded-full flex items-center justify-center text-charcoal-500 hover:bg-charcoal-800 hover:text-white transition-all focus-ring"><span class="sr-only">LinkedIn</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" /></svg></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <!-- Menus Grid -->
            <div class="lg:col-span-8 grid grid-cols-2 sm:grid-cols-3 gap-8">
                <!-- Navigasi -->
                <div>
                    <h3 class="text-white font-black tracking-wide text-sm mb-6">Navigasi</h3>
                    <ul class="space-y-4">
                        <li><a href="<?php echo e(route('home')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Beranda</a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Tentang Jurusan</a></li>
                        <li><a href="<?php echo e(route('academic.programs')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Program Akademik</a></li>
                        <li><a href="<?php echo e(route('academic.teachers')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Direktori Guru</a></li>
                    </ul>
                </div>

                <!-- Informasi -->
                <div>
                    <h3 class="text-white font-black tracking-wide text-sm mb-6">Informasi</h3>
                    <ul class="space-y-4">
                        <li><a href="<?php echo e(route('internships.index')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Info PKL</a></li>
                        <li><a href="<?php echo e(route('jobs.index')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Lowongan BKK</a></li>
                        <li><a href="<?php echo e(route('news.index')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Berita Terkini</a></li>
                        <li><a href="<?php echo e(route('download.index')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md">Pusat Unduhan</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-span-2 sm:col-span-1">
                    <h3 class="text-white font-black tracking-wide text-sm mb-6">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-charcoal-400">
                            <svg class="h-5 w-5 shrink-0 text-charcoal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span><?php echo e($settings->get('contact_address', 'Jl. Pendidikan No. 1, Kota Belajar')); ?></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 shrink-0 text-charcoal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $settings->get('contact_phone', '(021) 123-4567'))); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md"><?php echo e($settings->get('contact_phone', '(021) 123-4567')); ?></a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 shrink-0 text-charcoal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:<?php echo e($settings->get('contact_email', 'info@otomotif.sch.id')); ?>" class="text-sm text-charcoal-400 hover:text-white transition-colors focus-ring rounded-md"><?php echo e($settings->get('contact_email', 'info@otomotif.sch.id')); ?></a>
                        </li>
                    </ul>
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

    <div class="border-t border-charcoal-900 bg-[#0a0a0c] relative z-10">
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

            <div class="py-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-charcoal-600 font-medium">
                    &copy; <?php echo e(date('Y')); ?> <span class="text-charcoal-300"><?php echo e($settings->get('site_name', 'Teknik Otomotif')); ?></span>. Seluruh Hak Cipta Dilindungi.
                </p>
                <div class="flex items-center gap-6">
                    <a href="/admin" class="text-xs font-semibold text-charcoal-600 hover:text-white transition-colors">Portal Admin</a>
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
    </div>
</footer>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/components/footer.blade.php ENDPATH**/ ?>