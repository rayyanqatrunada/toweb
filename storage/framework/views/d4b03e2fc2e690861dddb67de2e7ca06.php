<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Prestasi & Penghargaan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Prestasi & Penghargaan']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php $__env->startPush('json-ld'); ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "CollectionPage",
      "name": "Prestasi & Penghargaan Teknik Otomotif",
      "description": "Daftar prestasi kompetisi, sertifikasi, dan penghargaan jurusan Teknik Otomotif."
    }
    </script>
    <?php $__env->stopPush(); ?>

    <main class="flex flex-col items-center bg-[#FBF8FC] w-full overflow-hidden relative">

        
        <section class="w-full bg-[#F5F3F6] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-12 md:py-12">
                <div class="flex flex-col gap-6">
                    
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                        <?php if (isset($component)) { $__componentOriginal98ae32034a5e9865062f4201185788de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal98ae32034a5e9865062f4201185788de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.breadcrumbs','data' => ['items' => ['Prestasi & Penghargaan' => route('achievements.index')]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Prestasi & Penghargaan' => route('achievements.index')])]); ?>
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
                        <div class="flex items-center gap-2 px-3 py-1 bg-[#F0EDF1] rounded-[2px]">
                            <span class="w-2 h-2 bg-[#DC2626] rounded-full"></span>
                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5C403C]">PRESTASI REKAM JEJAK TERBARU</span>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                        
                        <div class="lg:col-span-7 xl:col-span-8 reveal-on-scroll reveal-up">
                            <span class="font-sans font-bold text-[12px] tracking-[0.6px] uppercase text-[#DC2626] mb-2 block">
                                PUSAT KEUNGGULAN PENDIDIKAN VOKASI
                            </span>
                            <h1 class="font-heading font-extrabold text-4xl sm:text-5xl lg:text-[64px] lg:leading-[64px] tracking-[-1.6px] uppercase text-[#1B1B1E] mb-6">
                                PRESTASI &amp;<br>PENGHARGAAN<br>TEKNIK OTOMOTIF
                            </h1>
                            <p class="font-sans text-base lg:text-lg leading-[29px] text-[#5C403C] max-w-[768px]">
                                Daftar prestasi kompetisi, sertifikasi industri, dan penghargaan siswa serta tenaga pendidik jurusan Teknik Otomotif SMK Negeri 1 Bangsri di kancah lokal, regional, nasional, dan kompetisi bertaraf internasional manufaktur.
                            </p>
                        </div>

                        
                        <div class="lg:col-span-5 xl:col-span-4 flex flex-col gap-3 reveal-on-scroll reveal-up delay-100">
                            
                            <div class="flex items-center justify-between bg-white p-4 rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                                <div>
                                    <span class="font-heading font-bold text-[40px] leading-[48px] tracking-[-0.4px] text-[#1B1B1E]"><?php echo e($totalAchievements); ?>+</span>
                                    <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">TOTAL PRESTASI TERCATAT</span>
                                </div>
                                <svg class="w-7 h-7 text-[#DC2626]" fill="currentColor" viewBox="0 0 24 24"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            </div>
                            
                            <div class="flex items-center justify-between bg-white p-4 rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                                <div>
                                    <span class="font-heading font-bold text-[40px] leading-[48px] tracking-[-0.4px] text-[#DC2626]"><?php echo e($nationalCount); ?></span>
                                    <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">PRESTASI TINGKAT NASIONAL</span>
                                </div>
                                <svg class="w-[15px] h-[30px] text-[#5F5E5E]" fill="currentColor" viewBox="0 0 15 30"><rect width="15" height="30" rx="2"/></svg>
                            </div>
                            
                            <div class="flex items-center justify-between bg-white p-4 rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                                <div>
                                    <span class="font-heading font-bold text-[40px] leading-[48px] tracking-[-0.4px] text-[#1B1B1E]">100%</span>
                                    <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">RASIO KELULUSAN SERTIFIKASI</span>
                                </div>
                                <svg class="w-8 h-8 text-[#59595C]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="w-full bg-[#FBF8FC] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16">
                <div class="flex flex-col gap-8">
                    
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
                        <div class="reveal-on-scroll reveal-up">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-3 h-3 bg-[#DC2626] rounded-[2px]"></span>
                                <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#DC2626]">6 MILESTONE TERBARU</span>
                            </div>
                            <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-0.4px] uppercase text-[#1B1B1E]">
                                ROADMAP PRESTASI TERBARU
                            </h2>
                            <p class="font-sans text-base leading-6 text-[#5F5E5E] mt-1 max-w-2xl">
                                Enam pencapaian teknis terbaru dari bengkel kompetisi dan forum sertifikasi industri.
                            </p>
                        </div>
                        
                        <div class="flex items-center gap-2 reveal-on-scroll reveal-up delay-100">
                            <button onclick="document.getElementById('roadmap-scroll').scrollBy({left: -310, behavior: 'smooth'})" class="w-10 h-10 flex items-center justify-center bg-[#F0EDF1] rounded-[2px] hover:bg-[#E4E1E5] transition-colors" aria-label="Scroll left">
                                <svg class="w-5 h-3.5 text-[#1B1B1E]" fill="none" viewBox="0 0 20 14" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1L7 7l6 6"/></svg>
                            </button>
                            <button onclick="document.getElementById('roadmap-scroll').scrollBy({left: 310, behavior: 'smooth'})" class="w-10 h-10 flex items-center justify-center bg-[#F0EDF1] rounded-[2px] hover:bg-[#E4E1E5] transition-colors" aria-label="Scroll right">
                                <svg class="w-5 h-3.5 text-[#1B1B1E]" fill="none" viewBox="0 0 20 14" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>

                    
                    <div class="relative">
                        
                        <div class="absolute top-7 left-0 right-0 h-[2px] bg-[#E4E1E5] z-0 hidden md:block"></div>
                        
                        <div id="roadmap-scroll" class="flex gap-6 overflow-x-auto pb-6 scrollbar-hide relative z-10 snap-x snap-mandatory" style="-webkit-overflow-scrolling: touch;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recentAchievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $ra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <?php
                                    $isFirst = $idx === 0;
                                    $iconBg = $isFirst ? 'bg-[#DC2626]' : ($idx === 1 ? 'bg-[#303033]' : 'bg-[#E4E1E5]');
                                    $iconColor = $isFirst || $idx === 1 ? 'text-white' : 'text-[#1B1B1E]';
                                    $levelBg = $isFirst ? 'bg-[#FFDAD6] text-[#410002]' : 'bg-[#E5E2E1] text-[#656464]';
                                    $levelLabel = match($ra->level) {
                                        'national' => 'NASIONAL',
                                        'province' => 'PROVINSI',
                                        'district' => 'KAB/KOTA',
                                        default => strtoupper($ra->level),
                                    };
                                    $icons = ['M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z','M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z','M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z','M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z','M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z','M13 10V3L4 14h7v7l9-11h-7z'];
                                ?>
                                <div class="flex flex-col flex-shrink-0 w-[280px] min-w-[280px] snap-start reveal-on-scroll reveal-up" style="transition-delay: <?php echo e($idx * 60); ?>ms;">
                                    
                                    <div class="flex items-center gap-3 mb-4 h-12">
                                        <div class="w-12 h-12 <?php echo e($iconBg); ?> rounded-[2px] flex items-center justify-center shadow-md flex-shrink-0">
                                            <svg class="w-[15px] h-[15px] <?php echo e($iconColor); ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($icons[$idx % count($icons)]); ?>"/></svg>
                                        </div>
                                        <div>
                                            <span class="inline-block px-2 py-1 rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase <?php echo e($levelBg); ?>"><?php echo e($levelLabel); ?></span>
                                            <span class="block font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E] mt-1"><?php echo e($ra->date ? $ra->date->format('M Y') : '—'); ?></span>
                                        </div>
                                    </div>

                                    
                                    <div class="bg-white rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)] p-5 flex flex-col flex-grow">
                                        <div class="flex-grow">
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#DC2626] mb-2 block"><?php echo e($ra->category ? strtoupper($ra->category->name) : 'PRESTASI'); ?></span>
                                            <h3 class="font-heading font-bold text-lg leading-[29px] uppercase text-[#1B1B1E] mb-2 line-clamp-2">
                                                <a href="<?php echo e(route('achievements.show', $ra->slug)); ?>" class="hover:text-[#DC2626] transition-colors">
                                                    <?php echo e($ra->title); ?>

                                                </a>
                                            </h3>
                                            <p class="font-sans text-base leading-6 text-[#5F5E5E] line-clamp-3"><?php echo e(Str::limit(strip_tags($ra->description), 120)); ?></p>
                                        </div>
                                        <div class="flex items-center gap-1 pt-4 mt-4 border-t border-[#F0EDF1]">
                                            <svg class="w-3 h-3 text-[#5F5E5E]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]"><?php echo e(Str::limit($ra->organizer, 30)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <div class="w-full py-12 text-center text-[#5F5E5E]">Belum ada data prestasi.</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featuredAchievements->isNotEmpty()): ?>
        <section class="w-full bg-[#F5F3F6] border-b border-[#E4E1E5]">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16">
                <div class="flex flex-col gap-10">
                    
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 reveal-on-scroll reveal-up">
                        <div>
                            <span class="font-sans font-bold text-[12px] tracking-[0.6px] uppercase text-[#DC2626] mb-1 block">PRESTASI UNGGULAN NASIONAL</span>
                            <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-0.4px] uppercase text-[#1B1B1E]">
                                PENCAPAIAN TERBAIK
                            </h2>
                            <p class="font-sans text-base leading-6 text-[#5F5E5E] mt-1">
                                Gelar tertinggi yang menonjolkan supremasi teknik otomotif SMKN 1 Bangsri di panggung nasional & regional.
                            </p>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block px-3 py-1 bg-[#E4E1E5] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#1B1B1E]">CURATED SELECTION &mdash; <?php echo e($featuredAchievements->count()); ?> ENTRIES</span>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-1 <?php echo e($featuredAchievements->count() > 1 ? 'lg:grid-cols-2' : 'max-w-3xl mx-auto w-full'); ?> gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredAchievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi => $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <?php
                                $levelLabel = match($feat->level) {
                                    'national' => 'NASIONAL',
                                    'province' => 'PROVINSI',
                                    'district' => 'KAB/KOTA',
                                    default => strtoupper($feat->level),
                                };
                                $participantNames = $feat->participants->pluck('student_name')->join(', ');
                                $rankText = str_starts_with(strtolower($feat->rank), 'juara') ? strtoupper($feat->rank) : 'JUARA ' . strtoupper($feat->rank);
                            ?>
                            <article class="bg-white rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col reveal-on-scroll reveal-up" style="transition-delay: <?php echo e($fi * 80); ?>ms;">
                                
                                <div class="relative h-[288px] overflow-hidden">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($feat->photo): ?>
                                        <img src="<?php echo e(Storage::url($feat->photo)); ?>" alt="<?php echo e($feat->title); ?>" class="w-full h-full object-cover" loading="lazy">
                                    <?php else: ?>
                                        <div class="w-full h-full bg-[#E4E1E5]"></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="absolute inset-0 bg-gradient-to-t from-[rgba(48,48,51,0.9)] via-[rgba(48,48,51,0.3)] to-transparent"></div>

                                    
                                    <div class="absolute top-4 left-4 flex items-center gap-2 z-10">
                                        <span class="px-3 py-1 bg-[#DC2626] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-white shadow-md"><?php echo e($rankText); ?> <?php echo e($levelLabel); ?></span>
                                        <span class="px-3 py-1 bg-[#303033] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#F3F0F4]"><?php echo e($feat->category ? strtoupper($feat->category->name) : 'KOMPETISI'); ?></span>
                                    </div>

                                    
                                    <div class="absolute bottom-4 left-4 right-4 z-10">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#FFDAD6] block mb-1"><?php echo e($rankText); ?></span>
                                        <h3 class="font-heading font-bold text-xl md:text-2xl leading-[31px] uppercase text-white">
                                            <a href="<?php echo e(route('achievements.show', $feat->slug)); ?>" class="hover:underline">
                                                <?php echo e($feat->title); ?>

                                            </a>
                                        </h3>
                                    </div>
                                </div>

                                
                                <div class="p-6 flex flex-col flex-grow">
                                    <p class="font-sans text-base leading-6 text-[#5C403C] mb-4 line-clamp-3"><?php echo e(Str::limit(strip_tags($feat->description), 200)); ?></p>

                                    
                                    <div class="bg-[#F0EDF1] rounded-[2px] p-4 grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E] block">SISWA BERPRESTASI</span>
                                            <span class="font-sans font-bold text-base text-[#1B1B1E] mt-1 block"><?php echo e($participantNames ?: 'Tim Teknik Otomotif'); ?></span>
                                            <span class="font-sans text-[12px] text-[#5C403C] block"><?php echo e($feat->category ? $feat->category->name : 'Kompetisi'); ?></span>
                                        </div>
                                        <div>
                                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E] block">PENYELENGGARA</span>
                                            <span class="font-sans font-bold text-base text-[#1B1B1E] mt-1 block"><?php echo e($feat->organizer); ?></span>
                                            <span class="font-sans text-[12px] text-[#5C403C] block"><?php echo e($feat->date ? $feat->date->translatedFormat('d F Y') : ''); ?></span>
                                        </div>
                                    </div>

                                    
                                    <div class="flex items-center justify-between pt-4 border-t border-[#E4E1E5] mt-auto">
                                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]"><?php echo e($feat->date ? $feat->date->translatedFormat('d F Y') : ''); ?> &mdash; TERVERIFIKASI</span>
                                        <a href="<?php echo e(route('achievements.show', $feat->slug)); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-[#303033] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#F3F0F4] hover:bg-[#1B1B1E] transition-colors">
                                            LIHAT DETAIL
                                            <svg class="w-[9px] h-[9px]" fill="currentColor" viewBox="0 0 12 12"><path d="M1 6h10M7 2l4 4-4 4"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <section class="w-full bg-[#FBF8FC]" id="arsip">
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16">
                <div class="flex flex-col gap-8">
                    
                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-4 reveal-on-scroll reveal-up">
                        <div>
                            <span class="font-sans font-bold text-[12px] tracking-[0.6px] uppercase text-[#DC2626] mb-1 block">07 MULTI-YEAR ARCHIVE</span>
                            <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-0.4px] uppercase text-[#1B1B1E]">
                                DAFTAR REKAM JEJAK &amp; PENCAPAIAN
                            </h2>
                            <p class="font-sans text-base leading-6 text-[#5F5E5E] mt-1 max-w-2xl">
                                Katalog lengkap penghargaan, kompetisi, sertifikasi, dan pengakuan resmi sejak jurusan berdiri.
                            </p>
                        </div>
                        
                        <form method="GET" action="<?php echo e(route('achievements.index')); ?>#arsip" class="relative w-full lg:w-[288px]">
                            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama kompetisi, siswa..." class="w-full pl-10 pr-4 py-2.5 bg-[#F0EDF1] rounded-[2px] font-sans text-base text-[#1B1B1E] placeholder-[#5F5E5E] border-0 focus:ring-2 focus:ring-[#DC2626] outline-none">
                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-[13.5px] h-[13.5px] text-[#5F5E5E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('category')): ?><input type="hidden" name="category" value="<?php echo e(request('category')); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('year')): ?><input type="hidden" name="year" value="<?php echo e(request('year')); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </form>
                    </div>

                    
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 reveal-on-scroll reveal-up delay-100">
                        
                        <div class="flex items-center gap-2 flex-wrap">
                            <a href="<?php echo e(route('achievements.index', array_merge(request()->except('category','page'), []))); ?>#arsip"
                               class="px-4 py-2 rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase <?php echo e(!request('category') ? 'bg-[#DC2626] text-white' : 'bg-[#F0EDF1] text-[#1B1B1E] hover:bg-[#E4E1E5]'); ?> transition-colors">
                                SEMUA
                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e(route('achievements.index', array_merge(request()->except('page'), ['category' => $cat->slug]))); ?>#arsip"
                                   class="px-4 py-2 rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase <?php echo e(request('category') === $cat->slug ? 'bg-[#DC2626] text-white' : 'bg-[#F0EDF1] text-[#1B1B1E] hover:bg-[#E4E1E5]'); ?> transition-colors">
                                    <?php echo e(strtoupper($cat->name)); ?>

                                </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($years->count() > 0): ?>
                        <div class="flex items-center gap-2">
                            <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">TAHUN:</span>
                            <form method="GET" action="<?php echo e(route('achievements.index')); ?>#arsip" id="year-filter-form">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('category')): ?><input type="hidden" name="category" value="<?php echo e(request('category')); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('search')): ?><input type="hidden" name="search" value="<?php echo e(request('search')); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <select name="year" onchange="document.getElementById('year-filter-form').submit()" class="px-4 py-2 bg-[#F0EDF1] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#1B1B1E] border-0 focus:ring-2 focus:ring-[#DC2626] cursor-pointer">
                                    <option value="">SEMUA TAHUN</option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($yr); ?>" <?php echo e(request('year') == $yr ? 'selected' : ''); ?>><?php echo e($yr); ?></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </form>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allAchievements->count() > 0): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allAchievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ai => $ach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <?php
                                $levelLabel = match($ach->level) {
                                    'national' => 'NASIONAL',
                                    'province' => 'PROVINSI',
                                    'district' => 'KAB/KOTA',
                                    default => strtoupper($ach->level),
                                };
                                $isJuara1 = str_contains(strtolower($ach->rank), 'juara 1') || str_contains(strtolower($ach->rank), 'juara i');
                                $rankBg = $isJuara1 ? 'bg-[#DC2626] text-white' : 'bg-[#303033] text-[#F3F0F4]';
                                $participantNames = $ach->participants->pluck('student_name')->join(' & ');
                            ?>
                            <article class="bg-white rounded-[2px] shadow-[0_1px_2px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col reveal-on-scroll reveal-up" style="transition-delay: <?php echo e(($ai % 3) * 50); ?>ms;">
                                <div class="p-6 flex flex-col flex-grow">
                                    
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="px-2.5 py-1 bg-[#F0EDF1] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5C403C]">
                                            TINGKAT <?php echo e($levelLabel); ?>

                                        </span>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isJuara1): ?>
                                            <span class="w-8 h-8 rounded-[2px] <?php echo e($rankBg); ?> flex items-center justify-center font-sans font-bold text-sm">1</span>
                                        <?php else: ?>
                                            <?php
                                                $rankNum = preg_replace('/[^0-9]/', '', $ach->rank);
                                            ?>
                                            <span class="w-8 h-8 rounded-[2px] <?php echo e($rankBg); ?> flex items-center justify-center font-sans font-bold text-sm"><?php echo e($rankNum ?: '—'); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                    
                                    <h3 class="font-heading font-bold text-lg leading-[29px] uppercase text-[#1B1B1E] mb-2 line-clamp-2">
                                        <a href="<?php echo e(route('achievements.show', $ach->slug)); ?>" class="hover:text-[#DC2626] transition-colors">
                                            <?php echo e($ach->title); ?>

                                        </a>
                                    </h3>

                                    
                                    <p class="font-sans text-base leading-6 text-[#5F5E5E] line-clamp-3 mb-4 flex-grow"><?php echo e(Str::limit(strip_tags($ach->description), 150)); ?></p>
                                </div>

                                
                                <div class="bg-[#F5F3F6] px-6 py-4 rounded-b-[2px] flex items-center justify-between">
                                    <div>
                                        <span class="font-sans font-semibold text-[12px] tracking-[1.2px] uppercase text-[#1B1B1E] block"><?php echo e($participantNames ?: strtoupper($ach->rank)); ?></span>
                                        <span class="font-sans text-[12px] leading-4 text-[#5F5E5E] block mt-1">Penyelenggara: <?php echo e($ach->organizer); ?></span>
                                    </div>
                                    <a href="<?php echo e(route('achievements.show', $ach->slug)); ?>" class="p-2 text-[#303033] hover:text-[#DC2626] transition-colors" title="Lihat Detail">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </article>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allAchievements->hasPages()): ?>
                    <div class="flex flex-col items-center gap-3 pt-8">
                        <?php echo e($allAchievements->appends(request()->except('page'))->fragment('arsip')->links()); ?>

                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#5F5E5E]">
                            MENAMPILKAN <?php echo e($allAchievements->firstItem()); ?>-<?php echo e($allAchievements->lastItem()); ?> DARI TOTAL <?php echo e($allAchievements->total()); ?> PRESTASI
                        </span>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                    <div class="w-full py-16 flex flex-col items-center text-center">
                        <?php if (isset($component)) { $__componentOriginalb1651f2374e13365b46984f667e2eec8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1651f2374e13365b46984f667e2eec8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.ui.empty-state','data' => ['title' => 'Tidak Ada Hasil','message' => 'Tidak ditemukan prestasi yang sesuai dengan filter Anda.','icon' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frontend.ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tidak Ada Hasil','message' => 'Tidak ditemukan prestasi yang sesuai dengan filter Anda.','icon' => 'document']); ?>
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
                </div>
            </div>
        </section>

        
        <section class="w-full bg-[#303033] relative overflow-hidden">
            
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, rgba(255,255,255,0.5) 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="max-w-[1440px] mx-auto px-6 md:px-16 py-16 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 reveal-on-scroll reveal-up">
                        <span class="font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#FFDAD6] mb-3 block">SIAP MENGUKIR PRESTASI BERSAMA KAMI?</span>
                        <h2 class="font-heading font-bold text-3xl lg:text-[40px] lg:leading-[48px] tracking-[-1px] uppercase text-[#FBF8FC] mb-4">
                            BERGABUNG DENGAN JURUSAN TEKNIK OTOMOTIF
                        </h2>
                        <p class="font-sans text-lg leading-[29px] text-[#E4E1E5] max-w-2xl">
                            Raih pengalaman belajar dengan fasilitas dan bengkel modern, bimbingan instruktur berpengalaman, dan kesempatan produksi berkompetisi di tingkat nasional.
                        </p>
                    </div>
                    <div class="lg:col-span-5 flex flex-wrap gap-4 justify-start lg:justify-end reveal-on-scroll reveal-up delay-100">
                        <a href="<?php echo e(route('contact.index')); ?>" class="inline-flex items-center gap-6 px-8 py-4 bg-[#DC2626] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-white shadow-md hover:bg-[#B70011] transition-colors">
                            DAFTAR
                            <svg class="w-[15px] h-[12px]" fill="none" viewBox="0 0 15 12" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 6h13M9 1l5 5-5 5"/></svg>
                        </a>
                        <a href="<?php echo e(route('gallery.index')); ?>" class="inline-flex items-center gap-3 px-6 py-4 bg-[rgba(228,225,229,0.2)] rounded-[2px] font-sans font-bold text-[12px] tracking-[1.2px] uppercase text-[#FBF8FC] hover:bg-[rgba(228,225,229,0.35)] transition-colors">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                            LIHAT GALERI DOKUMENTASI
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
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
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/frontend/achievements/index.blade.php ENDPATH**/ ?>