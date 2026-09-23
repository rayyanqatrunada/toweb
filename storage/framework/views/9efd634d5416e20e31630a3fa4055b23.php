<?php
    $isHome = request()->routeIs('home');
    $isPrograms = request()->routeIs('academic.programs');
    $isTeachers = request()->routeIs('academic.teachers');
    $isFacilities = request()->routeIs('academic.facilities');

    $menuTiles = [
        [
            'label' => 'Beranda',
            'route' => route('home'),
            'active' => $isHome,
            'icon' => 'home',
        ],
        [
            'label' => 'Tentang',
            'route' => route('about'),
            'active' => request()->routeIs('about'),
            'icon' => 'info',
        ],
        [
            'label' => 'Program',
            'route' => route('academic.programs'),
            'active' => $isPrograms,
            'icon' => 'academic',
        ],
        [
            'label' => 'Guru',
            'route' => route('academic.teachers'),
            'active' => $isTeachers,
            'icon' => 'users',
        ],
        [
            'label' => 'Fasilitas',
            'route' => route('academic.facilities'),
            'active' => $isFacilities,
            'icon' => 'building',
        ],
        [
            'label' => 'Prestasi',
            'route' => route('achievements.index'),
            'active' => request()->is('prestasi*'),
            'icon' => 'trophy',
        ],
        [
            'label' => 'Industri',
            'route' => route('partnership.index'),
            'active' => request()->is('pkl*') || request()->is('mitra-industri*') || request()->is('lowongan*'),
            'icon' => 'briefcase',
        ],
        [
            'label' => 'Alumni',
            'route' => route('alumni.index'),
            'active' => request()->is('alumni*'),
            'icon' => 'user-group',
        ],
        [
            'label' => 'Galeri',
            'route' => route('gallery.index'),
            'active' => request()->is('galeri*'),
            'icon' => 'camera',
        ],
        [
            'label' => 'Berita',
            'route' => route('news.index'),
            'active' => request()->is('berita*') || request()->is('pengumuman*'),
            'icon' => 'newspaper',
        ],
        [
            'label' => 'Unduhan',
            'route' => route('download.index'),
            'active' => request()->is('unduhan*') || request()->is('download*'),
            'icon' => 'download',
        ],
        [
            'label' => 'Kontak',
            'route' => route('contact.index'),
            'active' => request()->routeIs('contact.index'),
            'icon' => 'mail',
        ],
    ];
?>

<!-- Container Mobile Navigation & Bottom Drawer -->
<div class="lg:hidden" id="mobile-nav-container">

    <!-- 1. Backdrop Scrim Gelap (Fade In/Out) -->
    <div id="mobile-menu-backdrop"
         onclick="window.closeMobileNavDrawer()"
         style="display: none; position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.65); z-index: 9998; opacity: 0; transition: opacity 0.3s ease;">
    </div>

    <!-- 2. Kotak Drawer yang Bergeser ke Atas (Solid Pure White - 4 Kolom) -->
    <div id="mobile-menu-drawer"
         style="display: none; position: fixed; bottom: 72px; left: 12px; right: 12px; max-width: 520px; margin: 0 auto; z-index: 9999; transform: translateY(120%); opacity: 0; transition: transform 0.32s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease;">

        <div style="background-color: #ffffff !important; border: 1px solid #e2e8f0; border-radius: 24px; box-shadow: 0 -12px 35px rgba(0, 0, 0, 0.2); padding: 16px 14px 18px 14px; overflow: hidden;">
            
            <!-- Drag Handle Bar (Pill) -->
            <div onclick="window.closeMobileNavDrawer()" style="width: 100%; display: flex; justify-content: center; padding: 2px 0 10px 0; cursor: pointer;">
                <span style="display: block; width: 44px; height: 5px; background-color: #cbd5e1; border-radius: 9999px;"></span>
            </div>

            <!-- Header Panel Menu -->
            <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; margin-bottom: 12px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 32px; height: 32px; border-radius: 10px; background-color: #fef2f2; color: #dc2626; display: flex; align-items: center; justify-content: center; border: 1px solid #fee2e2;">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-family: system-ui, sans-serif; font-weight: 800; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em; color: #0f172a; line-height: 1;">Pilihan Menu TSM</div>
                        <div style="font-size: 11px; color: #64748b; margin-top: 3px;">Navigasi cepat & praktis</div>
                    </div>
                </div>
                <button type="button" 
                        onclick="window.closeMobileNavDrawer()" 
                        style="background: transparent; border: none; padding: 6px; border-radius: 9999px; color: #94a3b8; cursor: pointer; display: flex; align-items: center; justify-content: center;"
                        aria-label="Tutup Menu">
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- KOTAK MENU: GRID 4 KOLOM PERSISI -->
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; max-height: 60vh; overflow-y: auto;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $menuTiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e($item['route']); ?>" 
                       onclick="window.closeMobileNavDrawer()"
                       style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 8px 4px; border-radius: 14px; text-decoration: none; transition: background-color 0.15s; <?php echo e($item['active'] ? 'background-color: #fef2f2; border: 1px solid #fecaca;' : 'background-color: #f8fafc; border: 1px solid #f1f5f9;'); ?>">
                       
                        <!-- Kotak Icon Persegi -->
                        <div style="position: relative; width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; <?php echo e($item['active'] ? 'background-color: #dc2626; color: #ffffff; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);' : 'background-color: #ffffff; color: #334155; border: 1px solid #e2e8f0;'); ?>">
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item['icon'] === 'home'): ?>
                                <svg style="width: 20px; height: 20px;" fill="<?php echo e($item['active'] ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            <?php elseif($item['icon'] === 'info'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            <?php elseif($item['icon'] === 'academic'): ?>
                                <svg style="width: 20px; height: 20px;" fill="<?php echo e($item['active'] ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            <?php elseif($item['icon'] === 'users'): ?>
                                <svg style="width: 20px; height: 20px;" fill="<?php echo e($item['active'] ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            <?php elseif($item['icon'] === 'building'): ?>
                                <svg style="width: 20px; height: 20px;" fill="<?php echo e($item['active'] ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            <?php elseif($item['icon'] === 'trophy'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2 0h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            <?php elseif($item['icon'] === 'briefcase'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            <?php elseif($item['icon'] === 'user-group'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/>
                                </svg>
                            <?php elseif($item['icon'] === 'camera'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            <?php elseif($item['icon'] === 'newspaper'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            <?php elseif($item['icon'] === 'download'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            <?php elseif($item['icon'] === 'mail'): ?>
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item['active']): ?>
                                <span style="position: absolute; top: -3px; right: -3px; width: 10px; height: 10px; border-radius: 9999px; background-color: #dc2626; border: 2px solid #ffffff;"></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        
                        <!-- Label Nama Menu -->
                        <span style="font-family: system-ui, sans-serif; font-size: 11px; font-weight: 700; text-align: center; margin-top: 5px; line-height: 1.1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 100%; <?php echo e($item['active'] ? 'color: #dc2626;' : 'color: #334155;'); ?>">
                            <?php echo e($item['label']); ?>

                        </span>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

        </div>
    </div>

    <!-- 3. Bottom Navigation Bar Dock (100% Solid Pure White, Tanpa Tembus) -->
    <nav aria-label="Mobile Navigation Bar" 
         style="position: fixed; bottom: 0; left: 0; right: 0; z-index: 10000; height: 64px; background-color: #ffffff !important; background: #ffffff !important; border-top: 1px solid #e2e8f0; box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.08);">
        <div style="max-width: 540px; margin: 0 auto; padding: 0 8px; display: flex; align-items: center; justify-content: space-around; height: 100%; background: #ffffff !important;">
            
            <!-- Tab 1: Beranda -->
            <a href="<?php echo e(route('home')); ?>" 
               onclick="window.closeMobileNavDrawer()"
               style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; text-decoration: none; color: <?php echo e($isHome ? '#dc2626' : '#64748b'); ?>;">
                <div style="position: relative; display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 9999px; <?php echo e($isHome ? 'background-color: #fef2f2;' : ''); ?>">
                    <svg style="width: 20px; height: 20px;" fill="<?php echo e($isHome ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isHome ? '2.2' : '1.9'); ?>" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isHome): ?>
                        <span style="position: absolute; bottom: -3px; width: 4px; height: 4px; border-radius: 9999px; background-color: #dc2626;"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <span style="font-size: 10px; font-weight: 700; margin-top: 2px;">Beranda</span>
            </a>

            <!-- Tab 2: Program -->
            <a href="<?php echo e(route('academic.programs')); ?>" 
               onclick="window.closeMobileNavDrawer()"
               style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; text-decoration: none; color: <?php echo e($isPrograms ? '#dc2626' : '#64748b'); ?>;">
                <div style="position: relative; display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 9999px; <?php echo e($isPrograms ? 'background-color: #fef2f2;' : ''); ?>">
                    <svg style="width: 20px; height: 20px;" fill="<?php echo e($isPrograms ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isPrograms ? '2.2' : '1.9'); ?>" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isPrograms): ?>
                        <span style="position: absolute; bottom: -3px; width: 4px; height: 4px; border-radius: 9999px; background-color: #dc2626;"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <span style="font-size: 10px; font-weight: 700; margin-top: 2px;">Program</span>
            </a>

            <!-- Tab 3: Guru -->
            <a href="<?php echo e(route('academic.teachers')); ?>" 
               onclick="window.closeMobileNavDrawer()"
               style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; text-decoration: none; color: <?php echo e($isTeachers ? '#dc2626' : '#64748b'); ?>;">
                <div style="position: relative; display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 9999px; <?php echo e($isTeachers ? 'background-color: #fef2f2;' : ''); ?>">
                    <svg style="width: 20px; height: 20px;" fill="<?php echo e($isTeachers ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isTeachers ? '2.2' : '1.9'); ?>" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isTeachers): ?>
                        <span style="position: absolute; bottom: -3px; width: 4px; height: 4px; border-radius: 9999px; background-color: #dc2626;"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <span style="font-size: 10px; font-weight: 700; margin-top: 2px;">Guru</span>
            </a>

            <!-- Tab 4: Fasilitas -->
            <a href="<?php echo e(route('academic.facilities')); ?>" 
               onclick="window.closeMobileNavDrawer()"
               style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; text-decoration: none; color: <?php echo e($isFacilities ? '#dc2626' : '#64748b'); ?>;">
                <div style="position: relative; display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 9999px; <?php echo e($isFacilities ? 'background-color: #fef2f2;' : ''); ?>">
                    <svg style="width: 20px; height: 20px;" fill="<?php echo e($isFacilities ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isFacilities ? '2.2' : '1.9'); ?>" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isFacilities): ?>
                        <span style="position: absolute; bottom: -3px; width: 4px; height: 4px; border-radius: 9999px; background-color: #dc2626;"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <span style="font-size: 10px; font-weight: 700; margin-top: 2px;">Fasilitas</span>
            </a>

            <!-- Tab 5: Menu Trigger Button -->
            <button type="button" 
                    id="mobile-menu-btn"
                    onclick="window.toggleMobileNavDrawer()"
                    aria-label="Buka Menu Lengkap" 
                    style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; background: transparent; border: none; cursor: pointer; color: #64748b; padding: 0;">
                
                <div id="mobile-menu-btn-icon-wrapper"
                     style="position: relative; display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 9999px; transition: all 0.2s;">
                    
                    <!-- Ikon Menu (Saat Tertutup) -->
                    <svg id="mobile-menu-icon-closed" style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                    
                    <!-- Ikon Close Silang (Saat Terbuka) -->
                    <svg id="mobile-menu-icon-open" style="display: none; width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                    <span id="mobile-menu-dot" style="display: none; position: absolute; bottom: -3px; width: 4px; height: 4px; border-radius: 9999px; background-color: #dc2626;"></span>
                </div>
                
                <span id="mobile-menu-btn-label" style="font-size: 10px; font-weight: 700; margin-top: 2px; color: #64748b;">
                    Menu
                </span>
            </button>

        </div>
    </nav>
</div>

<!-- Script Mandiri: Langsung Mengontrol DOM Secara Real-Time -->
<script>
(function() {
    window.openMobileNavDrawer = function() {
        const drawer = document.getElementById('mobile-menu-drawer');
        const backdrop = document.getElementById('mobile-menu-backdrop');
        const iconClosed = document.getElementById('mobile-menu-icon-closed');
        const iconOpen = document.getElementById('mobile-menu-icon-open');
        const dot = document.getElementById('mobile-menu-dot');
        const label = document.getElementById('mobile-menu-btn-label');
        const iconWrapper = document.getElementById('mobile-menu-btn-icon-wrapper');
        const btn = document.getElementById('mobile-menu-btn');

        if (!drawer || !backdrop) return;

        drawer.style.display = 'block';
        backdrop.style.display = 'block';

        // Animasi buka
        requestAnimationFrame(function() {
            backdrop.style.opacity = '1';
            drawer.style.transform = 'translateY(0)';
            drawer.style.opacity = '1';
        });

        if (iconClosed) iconClosed.style.display = 'none';
        if (iconOpen) iconOpen.style.display = 'block';
        if (dot) dot.style.display = 'block';
        if (label) {
            label.textContent = 'Tutup';
            label.style.color = '#dc2626';
        }
        if (iconWrapper) {
            iconWrapper.style.backgroundColor = '#fef2f2';
            iconWrapper.style.color = '#dc2626';
            iconWrapper.style.transform = 'rotate(90deg)';
        }
        if (btn) btn.style.color = '#dc2626';
    };

    window.closeMobileNavDrawer = function() {
        const drawer = document.getElementById('mobile-menu-drawer');
        const backdrop = document.getElementById('mobile-menu-backdrop');
        const iconClosed = document.getElementById('mobile-menu-icon-closed');
        const iconOpen = document.getElementById('mobile-menu-icon-open');
        const dot = document.getElementById('mobile-menu-dot');
        const label = document.getElementById('mobile-menu-btn-label');
        const iconWrapper = document.getElementById('mobile-menu-btn-icon-wrapper');
        const btn = document.getElementById('mobile-menu-btn');

        if (!drawer || !backdrop) return;

        // Animasi tutup
        backdrop.style.opacity = '0';
        drawer.style.transform = 'translateY(120%)';
        drawer.style.opacity = '0';

        setTimeout(function() {
            if (drawer.style.transform === 'translateY(120%)') {
                drawer.style.display = 'none';
                backdrop.style.display = 'none';
            }
        }, 320);

        if (iconClosed) iconClosed.style.display = 'block';
        if (iconOpen) iconOpen.style.display = 'none';
        if (dot) dot.style.display = 'none';
        if (label) {
            label.textContent = 'Menu';
            label.style.color = '#64748b';
        }
        if (iconWrapper) {
            iconWrapper.style.backgroundColor = 'transparent';
            iconWrapper.style.color = '#64748b';
            iconWrapper.style.transform = 'rotate(0deg)';
        }
        if (btn) btn.style.color = '#64748b';
    };

    window.toggleMobileNavDrawer = function() {
        const drawer = document.getElementById('mobile-menu-drawer');
        if (!drawer) return;
        if (drawer.style.display === 'block' && drawer.style.opacity === '1') {
            window.closeMobileNavDrawer();
        } else {
            window.openMobileNavDrawer();
        }
    };

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            window.closeMobileNavDrawer();
        }
    });
})();
</script>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/mobile-bottom-nav.blade.php ENDPATH**/ ?>