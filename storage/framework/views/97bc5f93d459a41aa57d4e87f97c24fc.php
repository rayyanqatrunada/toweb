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
    <?php $__env->stopPush(); ?>

    <!-- Main Auto Layout Wrapper -->
    <main class="flex flex-col items-center bg-figma-bg-light w-full overflow-hidden">
        
        <!-- 01. Hero Section -->
        <section class="flex flex-col lg:flex-row justify-center items-center py-20 lg:py-32 px-6 lg:px-16 gap-6 w-full max-w-[1280px] min-h-[calc(100vh-80px)] mt-[80px]">
            
            <!-- Left: Text Content -->
            <div class="flex flex-col items-start gap-4 lg:w-1/2 w-full z-10 reveal-on-scroll reveal-left">
                <!-- Eyebrow -->
                <div class="font-sans font-normal text-[16px] leading-[24px] tracking-[1.6px] text-figma-gray uppercase mb-2">
                    TEKNIK OTOMOTIF <?php echo e($settings->get('site_name', 'SMK NEGERI 1 BANGSRI')); ?>

                </div>
                
                <!-- Heading 1 -->
                <h1 class="font-heading font-extrabold text-[48px] lg:text-[64px] leading-[1.1] tracking-[-1.28px] text-figma-dark">
                    Menyiapkan Generasi Profesional di Dunia Otomotif
                </h1>
                
                <!-- Description -->
                <p class="font-sans font-normal text-[18px] leading-[29px] text-figma-gray mt-2 mb-6 max-w-[512px]">
                    <?php echo \App\Support\HtmlSanitizer::clean($settings->get('hero_subtitle', 'Program keahlian spesifik yang dirancang selaras dengan kebutuhan kompetensi di berbagai sektor otomotif. Bersama kami, melangkah pasti menuju masa depan gemilang.')); ?>

                </p>
                
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <a href="<?php echo e(route('academic.programs')); ?>" class="flex flex-col justify-center items-center px-8 py-4 bg-figma-red rounded-[2px] w-full sm:w-auto h-[58px] hover:bg-figma-dark-red transition-colors focus-ring">
                        <span class="font-sans font-normal text-[16px] leading-[24px] text-white text-center w-[120px]">Program Studi</span>
                    </a>
                    
                    <a href="<?php echo e(route('about')); ?>" class="box-border flex flex-col justify-center items-center px-8 py-4 border border-[#E4E1E5] rounded-[2px] w-full sm:w-auto h-[58px] hover:bg-gray-100 transition-colors focus-ring">
                        <span class="font-sans font-normal text-[16px] leading-[24px] text-figma-dark text-center w-[105px]">Tentang Kami</span>
                    </a>
                </div>
            </div>

            <!-- Right: Image Content -->
            <div class="box-border flex flex-col justify-center items-start p-2 bg-white border border-[#E4E1E5] rounded-[4px] lg:w-[564px] h-[400px] lg:h-[600px] w-full reveal-on-scroll reveal-right delay-200 mt-10 lg:mt-0">
                <img src="<?php echo e($settings->get('hero_image') ? Storage::url($settings->get('hero_image')) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1200&auto=format&fit=crop'); ?>" 
                     alt="Workshop" 
                     class="w-full h-full object-cover rounded-[2px]">
            </div>
            
        </section>

        <!-- 02. Identity / Introduction Section -->
        <section class="flex flex-col items-center bg-figma-bg-alt py-32 px-6 lg:px-16 w-full">
            <div class="flex flex-col items-center gap-20 w-full max-w-[1280px]">
                
                <!-- Section Header -->
                <div class="flex flex-col items-center gap-6 max-w-[768px] reveal-on-scroll reveal-up">
                    <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-figma-dark text-center">
                        Lebih dari Sekadar Belajar Otomotif
                    </h2>
                    <p class="font-sans font-normal text-[16px] lg:text-[18px] leading-[1.6] text-figma-gray text-center">
                        Kami memiliki komitmen penuh untuk membangun ekosistem pendidikan vokasi otomotif yang tidak hanya unggul secara akademis, namun juga adaptif terhadap perkembangan teknologi industri.
                    </p>
                </div>

                <!-- Cards Container -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full reveal-on-scroll reveal-up delay-200">
                    
                    <!-- Card 1 -->
                    <div class="box-border flex flex-col items-start p-8 gap-4 bg-figma-bg-card border border-[#E4E1E5] rounded-[4px]">
                        <div class="w-full h-[30px] bg-figma-dark-red flex items-center px-4 rounded-t-sm">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="font-heading font-bold text-[24px] leading-[1.3] text-figma-dark mt-2">Kompetensi Teknis</h3>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Penguasaan teknologi mesin, sasis, dan kelistrikan otomotif modern dengan standar operasional prosedur yang ketat.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="box-border flex flex-col items-start p-8 gap-4 bg-figma-bg-card border border-[#E4E1E5] rounded-[4px]">
                        <div class="w-full h-[30px] bg-figma-dark-red flex items-center px-4 rounded-t-sm">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="font-heading font-bold text-[24px] leading-[1.3] text-figma-dark mt-2">Pengalaman Praktik</h3>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Jam terbang praktik yang tinggi di fasilitas laboratorium yang dirancang menyerupai lingkungan kerja industri otomotif sesungguhnya.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="box-border flex flex-col items-start p-8 gap-4 bg-figma-bg-card border border-[#E4E1E5] rounded-[4px]">
                        <div class="w-full h-[30px] bg-figma-dark-red flex items-center px-4 rounded-t-sm">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="font-heading font-bold text-[24px] leading-[1.3] text-figma-dark mt-2">Koneksi Industri</h3>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Kemitraan strategis dengan perusahaan otomotif terkemuka untuk memastikan kurikulum relevan dengan kebutuhan pasar kerja.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- 03. Program & Competency Section -->
        <section class="flex flex-col items-center bg-figma-bg-light py-20 px-6 lg:px-16 w-full">
            <div class="flex flex-col lg:flex-row gap-16 w-full max-w-[1152px] relative reveal-on-scroll reveal-up">
                
                <!-- Left: Description -->
                <div class="flex flex-col gap-6 lg:w-[466px]">
                    <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-figma-dark">
                        Teknik dan Bisnis Sepeda Motor (TBSM)
                    </h2>
                    <p class="font-sans font-normal text-[16px] lg:text-[18px] leading-[1.6] text-figma-gray">
                        Program keahlian ini membekali siswa dengan keterampilan komprehensif dalam perawatan, perbaikan, dan manajemen bisnis sepeda motor.
                    </p>
                    <a href="<?php echo e(route('academic.programs')); ?>" class="flex items-center gap-2 mt-2">
                        <div class="w-4 h-4 bg-figma-dark-red rounded-full"></div>
                        <span class="font-sans font-normal text-[16px] leading-[1.5] text-figma-dark-red uppercase hover:underline">Lihat Semua Program</span>
                    </a>
                </div>

                <!-- Right: Competency Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:flex-1 relative">
                    <!-- Tech Mesin -->
                    <div class="box-border flex flex-col p-6 gap-3 border border-[#E4E1E5] rounded-[4px] bg-white">
                        <h4 class="font-heading font-bold text-[18px] leading-[1.56] text-figma-dark">Teknologi Mesin</h4>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Diagnosa dan perbaikan komponen mesin, sistem bahan bakar injeksi, dan transmisi otomatis/manual.
                        </p>
                    </div>

                    <!-- Sistem Sasis -->
                    <div class="box-border flex flex-col p-6 gap-3 border border-[#E4E1E5] rounded-[4px] bg-white">
                        <h4 class="font-heading font-bold text-[18px] leading-[1.56] text-figma-dark">Sistem Sasis</h4>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Perawatan dan perbaikan sistem pengereman, suspensi, dan kemudi sepeda motor.
                        </p>
                    </div>

                    <!-- Kelistrikan -->
                    <div class="box-border flex flex-col p-6 gap-3 border border-[#E4E1E5] rounded-[4px] bg-white">
                        <h4 class="font-heading font-bold text-[18px] leading-[1.56] text-figma-dark">Kelistrikan</h4>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Pemahaman sirkuit kelistrikan, sistem pengapian, sistem pengisian, dan komponen elektronik modern.
                        </p>
                    </div>

                    <!-- Pengelolaan Bengkel -->
                    <div class="box-border flex flex-col p-6 gap-3 border border-[#E4E1E5] rounded-[4px] bg-white">
                        <h4 class="font-heading font-bold text-[18px] leading-[1.56] text-figma-dark">Pengelolaan Bengkel</h4>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Dasar-dasar manajemen layanan purna jual, administrasi bengkel, dan pelayanan pelanggan.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 04. Why Teknik Otomotif Section -->
        <section class="flex flex-col items-center bg-figma-bg-section py-32 px-6 lg:px-16 w-full">
            <div class="flex flex-col items-center gap-20 w-full max-w-[1280px]">
                
                <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-figma-dark text-center">
                    Mengapa Memilih Teknik Otomotif?
                </h2>

                <div class="flex flex-col gap-24 lg:gap-32 w-full max-w-[1152px]">
                    
                    <!-- Point 1 -->
                    <div class="flex flex-col-reverse lg:flex-row items-center gap-6 lg:gap-10 w-full reveal-on-scroll reveal-up">
                        <div class="flex flex-col justify-center items-start lg:w-1/2 bg-[#E4E1E5] rounded-[4px] h-[317px] w-full overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1503375176161-0498a9d18721?q=80&w=800&auto=format&fit=crop" alt="Praktik Langsung" class="w-full h-full object-cover mix-blend-saturation grayscale">
                        </div>
                        <div class="flex flex-col items-start gap-4 lg:w-1/2 lg:pl-12 w-full">
                            <h3 class="font-heading font-bold text-[24px] leading-[1.3] text-figma-dark">Praktik Langsung Lebih Banyak</h3>
                            <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                                Porsi pembelajaran praktik mencapai 70%, memastikan setiap siswa memiliki kesempatan luas untuk membongkar, merakit, dan menganalisa kendaraan secara langsung.
                            </p>
                        </div>
                    </div>

                    <!-- Point 2 -->
                    <div class="flex flex-col lg:flex-row items-center gap-6 lg:gap-10 w-full reveal-on-scroll reveal-up">
                        <div class="flex flex-col items-start gap-4 lg:w-1/2 lg:pr-12 w-full">
                            <h3 class="font-heading font-bold text-[24px] leading-[1.3] text-figma-dark">Sertifikasi Kompetensi Industri</h3>
                            <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                                Lulusan kami dibekali dengan sertifikat keahlian yang diakui oleh asosiasi industri otomotif, memberikan keunggulan kompetitif saat melamar pekerjaan.
                            </p>
                        </div>
                        <div class="flex flex-col justify-center items-start lg:w-1/2 bg-[#E4E1E5] rounded-[4px] h-[317px] w-full overflow-hidden relative mt-6 lg:mt-0">
                            <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?q=80&w=800&auto=format&fit=crop" alt="Sertifikasi" class="w-full h-full object-cover mix-blend-saturation grayscale">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 05. Facilities Section -->
        <section class="flex flex-col items-center bg-figma-bg-light py-32 px-6 lg:px-16 w-full">
            <div class="flex flex-col items-center gap-8 w-full max-w-[1280px]">
                
                <div class="flex flex-col items-center text-center gap-4 max-w-[672px] reveal-on-scroll reveal-up">
                    <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-figma-dark">
                        Ruang untuk Belajar dan Berlatih
                    </h2>
                    <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                        Fasilitas laboratorium dirancang sedemikian rupa untuk mensimulasikan kondisi bengkel sebenarnya agar siswa terbiasa dengan lingkungan kerja profesional.
                    </p>
                </div>

                <div class="flex flex-col gap-4 w-full max-w-[1152px] reveal-on-scroll reveal-up delay-100">
                    <!-- Main Facility -->
                    <div class="relative box-border w-full h-[300px] sm:h-[400px] lg:h-[532px] border border-[#E4E1E5] rounded-[4px] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1620025968593-be349b1a53ac?q=80&w=1200&auto=format&fit=crop" alt="Laboratorium Otomotif Terpadu" class="absolute inset-0 w-full h-full object-cover z-0">
                        <div class="absolute bottom-0 inset-x-0 h-[112px] bg-gradient-to-t from-black/80 to-transparent p-6 sm:p-8 flex flex-col justify-end z-10">
                            <h3 class="font-heading font-normal text-[16px] sm:text-[18px] text-white">Laboratorium Otomotif Terpadu</h3>
                            <p class="font-sans font-normal text-[14px] sm:text-[16px] text-gray-300 truncate">Dilengkapi dengan alat uji emisi, dynotest, dan peralatan diagnostik standar dealer.</p>
                        </div>
                    </div>
                    
                    <!-- Sub Facilities Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full h-auto sm:h-[192px]">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facilities->isNotEmpty()): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $facilities->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="box-border w-full h-[150px] sm:h-full border border-[#E4E1E5] rounded-[2px] overflow-hidden relative group">
                                <img src="<?php echo e($facility->photo ? Storage::url($facility->photo) : 'https://images.unsplash.com/photo-1635831968846-512ce24e930f?q=80&w=400&auto=format&fit=crop'); ?>" class="w-full h-full object-cover" alt="<?php echo e($facility->name); ?>">
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-4">
                                    <span class="text-white font-sans text-sm text-center"><?php echo e($facility->name); ?></span>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <!-- Fill empty slots if less than 3 -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = $facilities->count(); $i < 3; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="box-border w-full h-[150px] sm:h-full border border-[#E4E1E5] rounded-[2px] overflow-hidden bg-gray-200"></div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <?php else: ?>
                            <div class="box-border w-full h-[150px] sm:h-full border border-[#E4E1E5] rounded-[2px] bg-gray-200"></div>
                            <div class="box-border w-full h-[150px] sm:h-full border border-[#E4E1E5] rounded-[2px] bg-gray-200"></div>
                            <div class="box-border w-full h-[150px] sm:h-full border border-[#E4E1E5] rounded-[2px] bg-gray-200"></div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <a href="<?php echo e(route('academic.facilities')); ?>" class="box-border flex justify-center items-center w-full h-[150px] sm:h-full bg-figma-bg-section border border-[#E4E1E5] rounded-[2px] hover:bg-gray-200 transition-colors">
                            <span class="font-sans font-normal text-[16px] text-figma-gray">Lihat Semua Fasilitas</span>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- 06. Industry Connection Section -->
        <section class="flex flex-col items-center bg-figma-dark py-24 px-6 lg:px-16 w-full">
            <div class="flex flex-col items-center gap-6 w-full max-w-[1280px]">
                
                <h2 class="font-heading font-bold text-[24px] lg:text-[32px] leading-[1.3] text-white text-center">
                    Berkolaborasi dengan Industri Terbaik
                </h2>
                <p class="font-sans font-normal text-[16px] leading-[1.5] text-gray-400 text-center max-w-[672px]">
                    Kemitraan strategis untuk memastikan sinkronisasi kurikulum, pelaksanaan magang, penyaluran tenaga kerja, serta kelas industri unggulan.
                </p>

                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12 w-full max-w-[1152px] mt-10 opacity-70 reveal-on-scroll reveal-up">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partners->isNotEmpty()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($partner->logo): ?>
                                <img src="<?php echo e(Storage::url($partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" class="h-10 md:h-12 object-contain grayscale hover:grayscale-0 transition-all duration-300">
                            <?php else: ?>
                                <div class="w-32 h-12 bg-figma-gray-dark rounded-[2px] flex items-center justify-center text-white text-xs font-bold"><?php echo e($partner->name); ?></div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php else: ?>
                        <!-- Placeholders -->
                        <div class="w-32 h-12 bg-figma-gray-dark rounded-[2px]"></div>
                        <div class="w-40 h-16 bg-figma-gray-dark rounded-[2px]"></div>
                        <div class="w-32 h-12 bg-figma-gray-dark rounded-[2px]"></div>
                        <div class="w-36 h-14 bg-figma-gray-dark rounded-[2px]"></div>
                        <div class="w-28 h-12 bg-figma-gray-dark rounded-[2px]"></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <!-- 07. Achievements Section -->
        <section class="flex flex-col items-center bg-figma-bg-light py-32 px-6 lg:px-16 w-full">
            <div class="flex flex-col gap-16 w-full max-w-[1280px]">
                
                <!-- Section Header -->
                <div class="flex flex-col lg:flex-row justify-between lg:items-end items-start gap-4 w-full max-w-[1152px] mx-auto reveal-on-scroll reveal-up">
                    <div class="flex flex-col gap-4 max-w-[562px]">
                        <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-figma-dark">
                            Prestasi yang Menjadi Bukti
                        </h2>
                        <p class="font-sans font-normal text-[16px] leading-[1.5] text-figma-gray">
                            Dedikasi kami mencetak lulusan terbaik telah diakui dalam berbagai ajang kompetisi kompetensi siswa.
                        </p>
                    </div>
                    <a href="<?php echo e(route('news.index', ['category' => 'prestasi'])); ?>" class="font-sans font-normal text-[16px] leading-[1.5] text-figma-dark-red hover:underline">
                        Lihat Semua Prestasi
                    </a>
                </div>

                <!-- Main Content -->
                <div class="relative flex flex-col lg:flex-row gap-8 w-full max-w-[1152px] mx-auto min-h-[426px] reveal-on-scroll reveal-up delay-100">
                    
                    <!-- Left: Featured Image Box -->
                    <div class="relative box-border flex flex-col justify-end p-8 bg-figma-red rounded-[4px] lg:w-[60%] w-full h-[426px] overflow-hidden isolate">
                        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?q=80&w=1200&auto=format&fit=crop')] mix-blend-multiply opacity-20 bg-cover bg-center z-0"></div>
                        
                        <div class="relative flex flex-col z-10 w-full max-w-[696px]">
                            <div class="mb-4">
                                <span class="px-3 py-1 bg-white rounded-full font-sans font-bold text-[12px] leading-[1.3] text-figma-dark-red inline-block">Penghargaan Utama</span>
                            </div>
                            <h3 class="font-heading font-bold text-[24px] lg:text-[28px] leading-[1.3] text-white mb-2">
                                Juara 1 Lomba Kompetensi Siswa Bidang Otomotif Tingkat Nasional
                            </h3>
                            <p class="font-sans font-normal text-[16px] leading-[1.5] text-white/80">
                                Siswa kami berhasil membuktikan keahlian diagnostik dan perbaikan mesin yang melampaui peserta dari seluruh Indonesia.
                            </p>
                        </div>
                    </div>

                    <!-- Right: Timeline Cards -->
                    <div class="flex flex-col gap-6 lg:w-[40%] w-full z-10 h-full overflow-y-auto pr-2">
                        
                        <div class="box-border flex flex-col p-6 gap-2 bg-figma-bg-card border border-[#E4E1E5] rounded-[4px]">
                            <span class="font-sans font-bold text-[12px] leading-[1.3] text-figma-gray uppercase">Tahun 2022</span>
                            <h4 class="font-sans font-bold text-[16px] leading-[1.5] text-figma-dark">Juara Umum Festival Keterampilan SMK Tingkat Provinsi</h4>
                        </div>
                        
                        <div class="box-border flex flex-col p-6 gap-2 bg-figma-bg-card border border-[#E4E1E5] rounded-[4px]">
                            <span class="font-sans font-bold text-[12px] leading-[1.3] text-figma-gray uppercase">Tahun 2021</span>
                            <h4 class="font-sans font-bold text-[16px] leading-[1.5] text-figma-dark">Penghargaan Bengkel Sekolah Standar Bintang 5 dari Mitra Industri</h4>
                        </div>
                        
                        <div class="box-border flex flex-col p-6 gap-2 bg-figma-bg-card border border-[#E4E1E5] rounded-[4px]">
                            <span class="font-sans font-bold text-[12px] leading-[1.3] text-figma-gray uppercase">Tahun 2020</span>
                            <h4 class="font-sans font-bold text-[16px] leading-[1.5] text-figma-dark">Juara 2 Lomba Inovasi Teknologi Tepat Guna Bidang Otomotif</h4>
                        </div>
                        
                    </div>

                </div>

            </div>
        </section>

        <!-- 08. Final CTA Section -->
        <section class="flex flex-col items-center bg-figma-dark py-32 px-6 lg:px-16 w-full">
            <div class="flex flex-col items-center gap-6 w-full max-w-[672px] reveal-on-scroll reveal-up">
                
                <h2 class="font-heading font-bold text-[32px] lg:text-[40px] leading-[1.2] tracking-[-0.4px] text-white text-center">
                    Siap Mengenal Lebih Dekat Teknik Otomotif?
                </h2>
                <p class="font-sans font-normal text-[16px] leading-[1.5] text-gray-400 text-center mb-4">
                    Mari bergabung bersama kami dalam menciptakan mekanik handal masa depan. Hubungi kami untuk informasi lebih lanjut mengenai program pendidikan unggulan.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full">
                    <a href="<?php echo e(route('about')); ?>#contact" class="flex flex-col justify-center items-center px-8 py-4 bg-figma-red rounded-[2px] w-full sm:w-auto h-[58px] hover:bg-figma-dark-red transition-colors focus-ring">
                        <span class="font-sans font-normal text-[16px] leading-[24px] text-white text-center">Hubungi Kami</span>
                    </a>
                    
                    <a href="<?php echo e(route('academic.programs')); ?>" class="box-border flex flex-col justify-center items-center px-8 py-4 border border-gray-600 rounded-[2px] w-full sm:w-auto h-[58px] hover:bg-gray-800 transition-colors focus-ring">
                        <span class="font-sans font-normal text-[16px] leading-[24px] text-white text-center">Jelajahi Profil</span>
                    </a>
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
<?php /**PATH D:\Project\test\Web Jurusan\TOWEB\resources\views/frontend/home.blade.php ENDPATH**/ ?>