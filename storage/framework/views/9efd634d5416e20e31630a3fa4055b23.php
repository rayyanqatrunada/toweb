<?php
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $isHome = request()->routeIs('home');
    $isPrograms = request()->routeIs('academic.programs');
    $isTeachers = request()->routeIs('academic.teachers');
    $isFacilities = request()->routeIs('academic.facilities');
?>

<!-- Native App-Like Mobile Bottom Navigation Bar (Dock) -->
<nav aria-label="Mobile Navigation Bar" 
     class="lg:hidden fixed bottom-0 left-0 right-0 z-[90] bg-white/92 backdrop-blur-lg border-t border-slate-200/80 shadow-[0_-4px_24px_rgba(0,0,0,0.07)] transition-all duration-300">
    <div class="max-w-[540px] mx-auto px-3 flex items-center justify-around h-[62px]">
        
        <!-- Tab 1: Beranda -->
        <a href="<?php echo e(route('home')); ?>" 
           class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none <?php echo e($isHome ? 'text-red-600' : 'text-slate-500 hover:text-slate-900'); ?>">
            <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors <?php echo e($isHome ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100'); ?>">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="<?php echo e($isHome ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isHome ? '2.2' : '1.9'); ?>" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isHome): ?>
                    <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 <?php echo e($isHome ? 'text-red-600' : 'text-slate-500'); ?>">
                Beranda
            </span>
        </a>

        <!-- Tab 2: Program -->
        <a href="<?php echo e(route('academic.programs')); ?>" 
           class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none <?php echo e($isPrograms ? 'text-red-600' : 'text-slate-500 hover:text-slate-900'); ?>">
            <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors <?php echo e($isPrograms ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100'); ?>">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="<?php echo e($isPrograms ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isPrograms ? '2.2' : '1.9'); ?>" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isPrograms): ?>
                    <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 <?php echo e($isPrograms ? 'text-red-600' : 'text-slate-500'); ?>">
                Program
            </span>
        </a>

        <!-- Tab 3: Guru -->
        <a href="<?php echo e(route('academic.teachers')); ?>" 
           class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none <?php echo e($isTeachers ? 'text-red-600' : 'text-slate-500 hover:text-slate-900'); ?>">
            <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors <?php echo e($isTeachers ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100'); ?>">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="<?php echo e($isTeachers ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isTeachers ? '2.2' : '1.9'); ?>" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isTeachers): ?>
                    <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 <?php echo e($isTeachers ? 'text-red-600' : 'text-slate-500'); ?>">
                Guru
            </span>
        </a>

        <!-- Tab 4: Fasilitas -->
        <a href="<?php echo e(route('academic.facilities')); ?>" 
           class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 group focus:outline-none <?php echo e($isFacilities ? 'text-red-600' : 'text-slate-500 hover:text-slate-900'); ?>">
            <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors <?php echo e($isFacilities ? 'bg-red-50 text-red-600' : 'group-hover:bg-slate-100'); ?>">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="<?php echo e($isFacilities ? 'currentColor' : 'none'); ?>" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="<?php echo e($isFacilities ? '2.2' : '1.9'); ?>" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isFacilities): ?>
                    <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-red-600"></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 <?php echo e($isFacilities ? 'text-red-600' : 'text-slate-500'); ?>">
                Fasilitas
            </span>
        </a>

        <!-- Tab 5: Menu Drawer Trigger -->
        <button type="button" 
                @click="$dispatch('toggle-mobile-menu')"
                aria-label="Buka Menu Lengkap" 
                class="flex-1 flex flex-col items-center justify-center py-1.5 px-1 rounded-xl transition-all active:scale-90 text-slate-500 hover:text-slate-900 group focus:outline-none">
            <div class="relative flex items-center justify-center w-8 h-8 rounded-full transition-colors group-hover:bg-slate-100">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </div>
            <span class="text-[10px] font-heading font-bold tracking-tight mt-0.5 text-slate-500">
                Menu
            </span>
        </button>

    </div>
</nav>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/mobile-bottom-nav.blade.php ENDPATH**/ ?>