<div class="relative flex items-center justify-between w-full px-4 py-6 border-b border-white/5 mb-4">
    <!-- Logo & Text -->
    <div class="flex items-center gap-3">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(file_exists(public_path('logo.png'))): ?>
            <img src="<?php echo e(asset('logo.png')); ?>" alt="Logo" class="w-8 h-8 rounded-md object-contain bg-white p-1">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <span class="font-bold text-lg tracking-tight text-white whitespace-nowrap" x-show="$store.sidebar.isOpen" x-transition>TBSM Admin</span>
    </div>
    
    <!-- Custom Minimize Button (On the edge) -->
    <button x-on:click="$store.sidebar.toggle()" 
            class="absolute -right-[14px] top-1/2 -translate-y-1/2 flex items-center justify-center w-7 h-7 bg-[#DC2626] text-white rounded-full border-2 border-[#1B1B1E] hover:bg-red-700 hover:scale-110 transition-all z-50 shadow-sm"
            title="Toggle Sidebar">
        <!-- Icon when Open (Chevron Left) -->
        <svg x-show="$store.sidebar.isOpen" xmlns="http://www.3.org/2000/svg" class="h-3 w-3 stroke-[3px]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <!-- Icon when Closed (Chevron Right) -->
        <svg x-show="!$store.sidebar.isOpen" style="display: none;" xmlns="http://www.3.org/2000/svg" class="h-3 w-3 stroke-[3px]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/filament/sidebar-logo.blade.php ENDPATH**/ ?>