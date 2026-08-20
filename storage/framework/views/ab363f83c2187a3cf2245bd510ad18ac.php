<div class="flex min-h-screen bg-slate-50 font-sans w-full absolute inset-0 z-50">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
        <!-- Modern Split Design -->
        <div class="hidden lg:flex w-1/2 bg-charcoal-950 relative items-center justify-center overflow-hidden">
            <!-- Decorative background -->
            <div class="absolute inset-0 bg-gradient-to-br from-charcoal-800 to-charcoal-950"></div>
            <!-- Glow effect -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-600/20 blur-[100px] rounded-full pointer-events-none"></div>
            
            <div class="relative z-10 p-12 text-center max-w-lg">
                <div class="w-20 h-20 mx-auto bg-white rounded-2xl flex items-center justify-center text-charcoal-950 font-black text-3xl mb-8 shadow-2xl">
                    TO
                </div>
                <h1 class="text-3xl font-black text-white mb-4 tracking-tight leading-snug">Sistem Informasi<br>Manajemen Terpadu</h1>
                <p class="text-charcoal-400 text-base">Portal administrasi eksklusif untuk staf dan pengajar jurusan Teknik Otomotif.</p>
            </div>
        </div>
        
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white relative shadow-2xl lg:shadow-none lg:rounded-none rounded-t-[3rem] mt-10 lg:mt-0">
            <div class="w-full max-w-sm">
                
                <div class="lg:hidden flex flex-col items-center text-center mb-8">
                    <div class="w-16 h-16 bg-charcoal-950 rounded-xl flex items-center justify-center text-white font-black text-2xl mb-4 shadow-lg">
                        TO
                    </div>
                    <h2 class="text-2xl font-black text-charcoal-900 tracking-tight">Portal Admin</h2>
                </div>

                <div class="hidden lg:block mb-8">
                    <h2 class="text-3xl font-black text-charcoal-900 mb-2 tracking-tight">Masuk</h2>
                    <p class="text-charcoal-500 text-sm">Gunakan kredensial yang diberikan administrator.</p>
                </div>

                <form wire:submit="authenticate">
                    <?php echo e($this->form); ?>


                    <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['type' => 'submit','class' => 'w-full mt-6','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full mt-6','size' => 'lg']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        Masuk ke Dasbor
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
                </form>

                <div class="mt-12 text-center border-t border-charcoal-100 pt-6">
                    <a href="<?php echo e(route('home')); ?>" class="text-sm font-semibold text-charcoal-400 hover:text-charcoal-900 transition-colors inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Kembali ke Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/filament/pages/auth/login.blade.php ENDPATH**/ ?>