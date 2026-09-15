<div class="w-full">
    <div class="mb-8">
        <span class="block text-[12px] font-semibold text-gray-400 uppercase tracking-[2px] mb-2">
            Administrator
        </span>
        <h2 class="text-[32px] md:text-[36px] font-extrabold text-[#111111] font-heading leading-tight mb-2 tracking-tight">
            Masuk ke Admin Panel
        </h2>
        <p class="text-[14px] text-gray-500 font-sans">
            Kelola konten dan informasi resmi Jurusan TBSM.
        </p>
    </div>

    <!-- Render custom form output -->
    <div class="w-full">
        <!-- We use Filament's native form builder, but the visual styles are overridden in the layout CSS -->
        <?php echo e($this->content); ?>

    </div>

    <!-- Security Indicator -->
    <div class="mt-8 flex items-center justify-center gap-2 text-gray-400">
        <svg class="w-[14px] h-[14px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
        </svg>
        <span class="text-[12px] font-medium tracking-wide">Area ini khusus administrator.</span>
    </div>
</div>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/filament/pages/auth/login.blade.php ENDPATH**/ ?>