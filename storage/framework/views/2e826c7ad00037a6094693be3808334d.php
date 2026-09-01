<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Fasilitas Unggulan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Fasilitas Unggulan']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    
    <!-- Hero Section -->
    <section class="relative flex flex-col justify-center items-center py-20 lg:py-[150px] bg-[#1B1B1E] w-full min-h-[600px] mt-[80px]">
        <!-- Image Background -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?q=80&w=1280&auto=format&fit=crop')] bg-cover bg-center opacity-40"></div>
        
        <!-- Content Container -->
        <div class="relative flex flex-col items-center gap-4 z-10 px-6 max-w-[768px] reveal-on-scroll reveal-up">
            <!-- Label -->
            <div class="flex flex-row justify-center items-center px-3 py-1 bg-[#1B1B1E]/80 border border-[#E4E1E5] rounded-[2px]">
                <span class="font-sans font-bold text-[12px] leading-[12px] tracking-[1.2px] text-[#FFB4AB] uppercase">
                    Infrastruktur Teknik
                </span>
            </div>
            
            <!-- Heading -->
            <h1 class="font-heading font-extrabold text-[40px] lg:text-[64px] leading-[1.1] tracking-[-1.28px] text-[#FBF8FC] text-center mb-2">
                Fasilitas Unggulan
            </h1>
            
            <!-- Description -->
            <p class="font-sans font-normal text-[16px] lg:text-[18px] leading-[1.6] text-[#E4E1E5] text-center max-w-[756px]">
                Lingkungan belajar berstandar industri dengan peralatan diagnostik terkini, dirancang untuk mencetak teknisi otomotif profesional yang siap menghadapi tantangan teknologi masa depan.
            </p>
        </div>
    </section>

    <!-- Section - Facility Categories Bento Grid -->
    <section class="flex flex-col items-center py-16 lg:py-[96px] px-6 lg:px-[64px] w-full relative">
        <div class="flex flex-col w-full max-w-[1152px] z-10 gap-12">
            
            <!-- Header -->
            <div class="flex flex-col border-b border-[#E4E1E5] pb-4 reveal-on-scroll reveal-up">
                <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E]">
                    Area Praktik Terpadu
                </h2>
            </div>
            
            <!-- Bento Grid Container -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 w-full reveal-on-scroll reveal-up delay-100">
                
                <!-- Lab Engine (Large - Top Left) -->
                <div class="lg:col-span-8 flex flex-col bg-white border border-[#E4E1E5] p-6 lg:p-8 gap-6 relative overflow-hidden group hover:border-[#DC2626] transition-colors">
                    <div class="absolute top-0 right-0 w-[200px] h-[200px] opacity-20 pointer-events-none bg-[linear-gradient(45deg,transparent_2.76%,rgba(228,228,231,0.5)_2.76%,rgba(228,228,231,0.5)_5.52%)] z-10"></div>
                    
                    <div class="flex flex-col gap-2 z-20">
                        <div class="w-12 h-[2px] bg-[#DC2626] mb-2"></div>
                        <h3 class="font-heading font-bold text-[24px] lg:text-[32px] text-[#1B1B1E]">Laboratorium Engine</h3>
                        <p class="font-sans text-[16px] leading-[1.5] text-[#5F5E5E] max-w-[500px]">
                            Fasilitas pembongkaran, perakitan, dan pengujian performa mesin pembakaran dalam, dilengkapi dengan simulator injeksi elektronik dan sistem kontrol gas buang berstandar Euro 4.
                        </p>
                    </div>
                    
                    <div class="w-full h-[256px] lg:h-[300px] mt-4 relative overflow-hidden bg-[#F0EDF1]">
                        <img src="https://images.unsplash.com/photo-1632823462991-3f2d2429671d?q=80&w=800&auto=format&fit=crop" alt="Laboratorium Engine" class="w-full h-full object-cover mix-blend-saturation group-hover:mix-blend-normal transition-all duration-500 group-hover:scale-105">
                    </div>
                </div>

                <!-- Bengkel Sasis (Tall - Top Right) -->
                <div class="lg:col-span-4 flex flex-col bg-white border border-[#E4E1E5] p-6 lg:p-8 gap-6 group hover:border-[#1C1B1B] transition-colors">
                    <div class="flex flex-col gap-2 h-full">
                        <div class="w-12 h-[2px] bg-[#1C1B1B] mb-2"></div>
                        <h3 class="font-heading font-bold text-[24px] text-[#1B1B1E]">Bengkel Sasis & Pemindah Tenaga</h3>
                        <p class="font-sans text-[16px] leading-[1.5] text-[#5F5E5E]">
                            Fokus pada sistem suspensi, pengereman ABS, dan transmisi manual/otomatis modern.
                        </p>
                    </div>
                    
                    <div class="w-full h-[192px] lg:h-[240px] mt-auto relative overflow-hidden bg-[#F0EDF1]">
                        <img src="https://images.unsplash.com/photo-1486262715619-6708146fbdb8?q=80&w=800&auto=format&fit=crop" alt="Bengkel Sasis" class="w-full h-full object-cover mix-blend-saturation group-hover:mix-blend-normal transition-all duration-500 group-hover:scale-105">
                    </div>
                </div>

                <!-- Lab Kelistrikan (Small - Bottom Left) -->
                <div class="lg:col-span-4 flex flex-col justify-center bg-white border border-[#E4E1E5] p-6 lg:p-8 gap-6 group hover:border-[#1C1B1B] transition-colors">
                    <div class="flex flex-col gap-2">
                        <div class="w-12 h-[2px] bg-[#1C1B1B] mb-2"></div>
                        <h3 class="font-heading font-bold text-[24px] text-[#1B1B1E]">Lab Kelistrikan Otomotif</h3>
                        <p class="font-sans text-[16px] leading-[1.5] text-[#5F5E5E]">
                            Simulasi sistem kelistrikan bodi, AC, dan manajemen mesin (ECU) menggunakan modul latih interaktif.
                        </p>
                    </div>
                </div>

                <!-- Unit Produksi (Wide - Bottom Right) -->
                <div class="lg:col-span-8 flex flex-col md:flex-row bg-white border border-[#E4E1E5] p-6 lg:p-8 gap-6 lg:gap-12 group hover:border-[#1C1B1B] transition-colors items-center">
                    <div class="flex flex-col gap-2 w-full md:w-1/2">
                        <div class="w-12 h-[2px] bg-[#1C1B1B] mb-2"></div>
                        <h3 class="font-heading font-bold text-[24px] text-[#1B1B1E]">Unit Produksi & Jasa</h3>
                        <p class="font-sans text-[16px] leading-[1.5] text-[#5F5E5E]">
                            Teaching factory yang melayani perbaikan kendaraan umum, memberikan pengalaman nyata menghadapi pelanggan dan memecahkan masalah teknis aktual.
                        </p>
                    </div>
                    
                    <div class="w-full md:w-1/2 h-[160px] lg:h-[200px] relative overflow-hidden bg-[#F0EDF1]">
                        <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=800&auto=format&fit=crop" alt="Unit Produksi" class="w-full h-full object-cover mix-blend-saturation group-hover:mix-blend-normal transition-all duration-500 group-hover:scale-105">
                    </div>
                </div>

            </div>
            
            <!-- Add dynamic facilities if any exist that are not covered by the hardcoded ones -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($facilities) > 4): ?>
            <div class="mt-16 flex flex-col border-b border-[#E4E1E5] pb-4 reveal-on-scroll reveal-up">
                <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-[#1B1B1E]">
                    Fasilitas Lainnya
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full reveal-on-scroll reveal-up">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $facilities->skip(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="flex flex-col bg-[#FBF8FC] border border-[#E4E1E5] p-4 group hover:border-[#B70011] transition-colors">
                    <div class="w-full aspect-video mb-4 overflow-hidden bg-gray-100">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facility->photo): ?>
                            <img src="<?php echo e(Storage::url($facility->photo)); ?>" alt="<?php echo e($facility->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center bg-[#E4E1E5]">
                                <svg class="w-8 h-8 text-[#5F5E5E]/30" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <h3 class="font-heading font-bold text-[18px] text-[#1B1B1E] group-hover:text-[#B70011] line-clamp-1"><?php echo e($facility->name); ?></h3>
                    <p class="font-sans text-[14px] text-[#5F5E5E] line-clamp-2 mt-1"><?php echo e(strip_tags($facility->description)); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
        </div>
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
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/frontend/academic/facilities.blade.php ENDPATH**/ ?>