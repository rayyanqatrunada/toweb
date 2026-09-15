<?php if (isset($component)) { $__componentOriginale960ae7ad1b1ce9e3596e483505fadc9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.layout.base','data' => ['livewire' => $livewire]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::layout.base'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['livewire' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($livewire)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <!-- Custom CSS Overrides for Filament UI to match the strict Design Brief -->
    <style>
        .fi-input-wrapper {
            border-radius: 8px !important;
            border-color: #E5E7EB !important;
            box-shadow: none !important;
            transition: all 150ms ease !important;
        }
        .fi-input-wrapper:focus-within {
            border-color: #DC2626 !important;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15) !important;
        }
        .fi-input {
            height: 50px !important;
            padding: 0 16px !important;
            font-size: 15px !important;
        }
        .fi-btn {
            border-radius: 8px !important;
            height: 52px !important;
            font-weight: 600 !important;
            transition: all 150ms ease !important;
        }
        .fi-btn-color-primary {
            background-color: #DC2626 !important;
            color: #ffffff !important;
        }
        .fi-btn-color-primary:hover {
            background-color: #B91C1C !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 6px -1px rgba(220, 38, 38, 0.2) !important;
        }
        .fi-btn-color-primary:active {
            transform: scale(0.98) !important;
        }
        /* Force Light Mode styling for the form text (because the background is forced white) */
        .fi-input, .dark .fi-input {
            color: #111111 !important;
            background-color: #ffffff !important;
        }
        
        /* Fix Chrome Autofill turning background gray and text white */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #111111 !important;
        }

        /* Enforce dark colors for all labels and spans inside the form */
        form label, form label span, .dark form label, .dark form label span {
            color: #111111 !important;
        }
        form span, .dark form span {
            color: inherit;
        }
        form .text-gray-400, form .dark\:text-gray-400 {
            color: #6b7280 !important;
        }
        .fi-checkbox-label, .dark .fi-checkbox-label {
            color: #4b5563 !important;
        }
        .fi-input-wrapper button, .dark .fi-input-wrapper button {
            color: #6b7280 !important;
        }
        /* Hide Filament's default top form actions to avoid duplicates since we render actions manually */
        .fi-form > .fi-form-actions { display: none !important; }
    </style>

    <div class="flex min-h-screen bg-white font-sans text-[#181818]">
        
        <!-- LEFT SIDE: BRAND / VISUAL (55%) -->
        <div class="hidden lg:flex lg:w-[55%] relative bg-[#F8F8F7] overflow-hidden flex-col p-12 lg:p-16 border-r border-gray-100">
            <!-- Decorative Background Elements (Opacity 5-15%) -->
            
            <!-- 1. Engineering Grid -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(#181818 1px, transparent 1px), linear-gradient(90deg, #181818 1px, transparent 1px); background-size: 40px 40px; pointer-events: none;"></div>
            
            <!-- 2. Large Abstract Red Circle (Geometric) -->
            <div class="absolute -top-[10%] -left-[10%] w-[600px] h-[600px] rounded-full border-[1px] border-figma-red opacity-[0.08] pointer-events-none"></div>
            <div class="absolute -bottom-[20%] -right-[10%] w-[800px] h-[800px] rounded-full border-[1px] border-figma-red opacity-[0.05] pointer-events-none"></div>
            
            <!-- 3. Thin Red Diagonal Line -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-0 left-[20%] w-[1px] h-[150%] bg-figma-red opacity-[0.12] transform rotate-[35deg] origin-top-left"></div>
                <div class="absolute top-0 left-[22%] w-[1px] h-[150%] bg-figma-red opacity-[0.06] transform rotate-[35deg] origin-top-left"></div>
            </div>

            <!-- 4. Mechanical-inspired shape (Subtle) -->
            <div class="absolute bottom-12 right-12 w-[300px] h-[300px] opacity-[0.04] pointer-events-none">
                <svg viewBox="0 0 200 200" fill="none" stroke="#181818" stroke-width="0.5">
                    <circle cx="100" cy="100" r="80"/>
                    <circle cx="100" cy="100" r="70" stroke-dasharray="4 4"/>
                    <circle cx="100" cy="100" r="30"/>
                    <path d="M100 20 L100 180 M20 100 L180 100 M43 43 L157 157 M43 157 L157 43"/>
                </svg>
            </div>

            <!-- Content -->
            <div class="relative z-10 w-full reveal-on-scroll reveal-up h-full flex flex-col">
                <!-- Top Left Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#181818] rounded-lg flex items-center justify-center text-white font-black text-xl tracking-tighter">
                        T.
                    </div>
                    <span class="font-heading font-bold text-lg tracking-widest text-[#111111]">TBSM</span>
                </div>

                <div class="mt-auto mb-20">
                    <h1 class="font-heading font-black text-[38px] md:text-[44px] text-[#111111] leading-[1.1] mb-6 tracking-tight max-w-lg">
                        TEKNIK DAN BISNIS SEPEDA MOTOR
                    </h1>
                    <p class="font-sans text-[16px] text-gray-500 max-w-md leading-relaxed border-l-2 border-figma-red pl-4 font-medium">
                        Portal Administrasi Jurusan TBSM
                    </p>
                </div>
            </div>
        </div>
        
        <!-- RIGHT SIDE: LOGIN AREA (45%) -->
        <div class="w-full lg:w-[45%] flex flex-col p-6 sm:p-12 lg:px-20 lg:py-12 bg-white relative justify-between overflow-y-auto">
            
            <!-- Navigation -->
            <div class="flex justify-end w-full mb-8 lg:mb-0 relative z-20">
                <a href="/" class="flex items-center gap-2 text-[13px] font-semibold text-gray-400 hover:text-figma-red transition-colors group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Website
                </a>
            </div>

            <!-- Form Card Wrapper -->
            <div class="w-full max-w-[400px] mx-auto flex-1 flex flex-col justify-center relative z-10 py-8">
                <!-- Mobile Only Brand Area -->
                <div class="lg:hidden mb-10 flex flex-col items-center">
                    <div class="w-12 h-12 bg-[#181818] rounded-xl flex items-center justify-center text-white font-black text-2xl tracking-tighter mb-4">
                        T.
                    </div>
                    <h2 class="font-heading font-black text-2xl text-[#111111] mb-1">TBSM</h2>
                    <p class="font-sans text-[11px] text-gray-500 font-bold uppercase tracking-[2px]">Admin Panel</p>
                </div>

                <!-- Clean Card -->
                <div class="bg-white lg:bg-transparent lg:shadow-none lg:border-none lg:p-0 rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 sm:p-10 w-full">
                    <?php echo e($slot); ?>

                </div>
                
                <!-- Minimal Footer -->
                <div class="mt-12 text-center text-[12px] text-gray-400 font-sans">
                    &copy; <?php echo e(date('Y')); ?> TBSM &mdash; Admin Panel
                </div>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9)): ?>
<?php $attributes = $__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9; ?>
<?php unset($__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale960ae7ad1b1ce9e3596e483505fadc9)): ?>
<?php $component = $__componentOriginale960ae7ad1b1ce9e3596e483505fadc9; ?>
<?php unset($__componentOriginale960ae7ad1b1ce9e3596e483505fadc9); ?>
<?php endif; ?>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/filament/layouts/auth.blade.php ENDPATH**/ ?>