<div class="tbsm-welcome">
    <div>
        <h2>Selamat datang kembali, <?php echo e(auth()->user()->name ?? 'Administrator'); ?></h2>
        <p>Pantau konten, akademik, industri, dan aktivitas website TBSM dari satu tempat.</p>
    </div>
    <div class="tbsm-welcome-date">
        <?php echo e(now()->locale('id')->translatedFormat('l, d F Y')); ?>

    </div>
</div>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/filament/widgets/welcome.blade.php ENDPATH**/ ?>