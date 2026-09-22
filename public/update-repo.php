<?php
/**
 * TSM Webhook / Git Auto-Deploy Script
 * Digunakan untuk menyinkronkan website dengan GitHub tanpa memerlukan terminal SSH.
 */

// =========================================================================
// 1. PENGATURAN KUNCI KEAMANAN (Password)
// =========================================================================
$SECRET_KEY = 'tsm2026bangsri';

// Cek apakah key dikirim melalui GET atau POST
$inputKey = $_GET['key'] ?? $_POST['key'] ?? '';
$isAuthenticated = ($inputKey === $SECRET_KEY);

// Deteksi direktori root Laravel secara otomatis
$laravelRoot = null;
if (file_exists(__DIR__ . '/artisan')) {
    $laravelRoot = __DIR__;
} elseif (file_exists(__DIR__ . '/../artisan')) {
    $laravelRoot = realpath(__DIR__ . '/..');
} elseif (file_exists(__DIR__ . '/../../artisan')) {
    $laravelRoot = realpath(__DIR__ . '/../..');
}

if ($laravelRoot) {
    chdir($laravelRoot);
}

$runSync = isset($_GET['sync']) && $_GET['sync'] === 'now' && $isAuthenticated;
$runMigrate = isset($_GET['migrate']) && $_GET['migrate'] === '1';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git Deployer — TSM SMKN 1 Bangsri</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #090d16; color: #e2e8f0; margin: 0; padding: 2.5rem 1rem; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { width: 100%; max-width: 820px; background: #111827; border: 1px solid #1f2937; border-radius: 16px; padding: 2.25rem; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.7); }
        .header { display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #1f2937; padding-bottom: 1.25rem; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
        .header h1 { font-size: 1.5rem; color: #f8fafc; margin: 0; display: flex; align-items: center; gap: 0.6rem; }
        .badge { background: #065f46; color: #34d399; font-size: 0.75rem; font-weight: 600; padding: 0.3rem 0.7rem; border-radius: 9999px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #dc2626; color: #fff; text-decoration: none; padding: 0.8rem 1.6rem; border-radius: 8px; font-weight: 600; font-size: 0.95rem; border: none; cursor: pointer; transition: all 0.2s; }
        .btn:hover { background: #b91c1c; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(220,38,38,0.3); }
        .btn-outline { background: transparent; border: 1px solid #374151; color: #9ca3af; padding: 0.6rem 1.1rem; }
        .btn-outline:hover { background: #1f2937; color: #fff; }
        .console { background: #030712; border: 1px solid #1f2937; border-radius: 8px; padding: 1.25rem; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 0.85rem; color: #4ade80; overflow-x: auto; margin-bottom: 1.25rem; line-height: 1.6; }
        .console-title { font-size: 0.85rem; font-weight: 600; color: #94a3b8; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .alert { background: #1e3a8a; border: 1px solid #2563eb; color: #bfdbfe; padding: 1rem 1.25rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem; line-height: 1.5; }
        .alert-success { background: #064e3b; border-color: #059669; color: #a7f3d0; }
        .alert-danger { background: #7f1d1d; border-color: #dc2626; color: #fecaca; }
        .input-group { display: flex; gap: 0.75rem; margin-top: 1rem; }
        .input-text { flex: 1; background: #030712; border: 1px solid #374151; border-radius: 8px; padding: 0.75rem 1rem; color: #fff; font-size: 0.95rem; }
        .input-text:focus { outline: none; border-color: #dc2626; }
        .info-box { background: #182234; border: 1px solid #233554; border-radius: 8px; padding: 1.1rem; margin-top: 1.75rem; font-size: 0.85rem; color: #94a3b8; line-height: 1.6; }
        .info-box ul { margin: 0.5rem 0 0 1.2rem; padding: 0; }
        .info-box li { margin-bottom: 0.35rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>🚀 TSM Auto-Updater <span class="badge">Development Mode</span></h1>
        <a href="/" target="_blank" class="btn btn-outline" style="font-size: 0.85rem;">Lihat Website ↗</a>
    </div>

    <?php if (!$isAuthenticated): ?>
        <!-- FORM LOGIN KUNCI KEAMANAN -->
        <?php if (!empty($inputKey)): ?>
            <div class="alert alert-danger">
                ⛔ Kunci keamanan yang Anda masukkan salah. Silakan coba lagi.
            </div>
        <?php else: ?>
            <div class="alert">
                🔒 Halaman ini dilindungi kunci keamanan. Masukkan kunci rahasia untuk melanjutkan pembaruan repository.
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label style="font-size: 0.9rem; color: #cbd5e1; font-weight: 500;">Kunci Rahasia (Password):</label>
            <div class="input-group">
                <input type="password" name="key" class="input-text" placeholder="Masukkan kunci..." value="tsm2026bangsri" required autofocus>
                <button type="submit" class="btn">Buka Panel</button>
            </div>
            <p style="font-size: 0.8rem; color: #64748b; margin-top: 0.5rem;">Default key: <code>tsm2026bangsri</code></p>
        </form>

    <?php elseif (!$runSync): ?>
        <!-- PANEL SEBELUM SYNC -->
        <div class="alert">
            ℹ️ Sistem siap menyinkronkan website dengan commit terbaru dari branch <code>main</code> di GitHub.
        </div>

        <div class="console-title">Status Repository Hosting Saat Ini:</div>
        <div class="console">
            Folder Root: <?php echo htmlspecialchars($laravelRoot ?? 'Tidak terdeteksi!'); ?><br>
            Commit Saat Ini: <?php echo htmlspecialchars(trim(shell_exec('git log -1 --oneline 2>&1') ?? 'N/A')); ?><br>
            Branch Aktif: <?php echo htmlspecialchars(trim(shell_exec('git branch --show-current 2>&1') ?? 'N/A')); ?>
        </div>

        <form method="GET" action="">
            <input type="hidden" name="key" value="<?php echo htmlspecialchars($SECRET_KEY); ?>">
            <input type="hidden" name="sync" value="now">
            
            <p style="margin-bottom: 1.25rem;">
                <label style="cursor: pointer; display: flex; align-items: center; gap: 0.6rem; font-size: 0.9rem; color: #cbd5e1;">
                    <input type="checkbox" name="migrate" value="1">
                    Jalankan juga <code>php artisan migrate --force</code> (Centang hanya jika Anda menambah file migrasi database baru)
                </label>
            </p>

            <button type="submit" class="btn" style="width: 100%; font-size: 1.05rem; padding: 0.9rem;">
                ⚡ Sinkronkan Sekarang dari GitHub (Force Pull & Reset)
            </button>
        </form>

    <?php else: ?>
        <!-- PROSES DAN HASIL SYNC -->
        <div class="alert alert-success">
            ✨ Proses sinkronisasi berhasil dieksekusi!
        </div>

        <div class="console-title">1. Git Fetch & Force Reset ke Origin Main:</div>
        <?php
        $cmdFetch    = shell_exec('git fetch origin main 2>&1');
        $cmdCheckout = shell_exec('git checkout -f -B main origin/main 2>&1');
        $cmdReset    = shell_exec('git reset --hard origin/main 2>&1');
        $cmdClean    = shell_exec('git clean -fd -e .env -e public/build -e public/storage -e storage 2>&1');
        ?>
        <div class="console">
            [git fetch origin main]<br><?php echo htmlspecialchars($cmdFetch ?? 'OK'); ?><br><br>
            [git checkout -f -B main origin/main]<br><?php echo htmlspecialchars($cmdCheckout ?? 'OK'); ?><br><br>
            [git reset --hard origin/main]<br><?php echo htmlspecialchars($cmdReset ?? 'OK'); ?><br><br>
            [git clean (preserve .env & assets)]<br><?php echo htmlspecialchars($cmdClean ?? 'OK'); ?>
        </div>

        <?php if ($runMigrate): ?>
            <div class="console-title">2. Database Migration:</div>
            <?php $cmdMigrate = shell_exec('php artisan migrate --force 2>&1'); ?>
            <div class="console">
                [php artisan migrate --force]<br><?php echo htmlspecialchars($cmdMigrate ?? 'No output'); ?>
            </div>
        <?php endif; ?>

        <div class="console-title">Pembersihan Cache Laravel:</div>
        <?php
        $cmdView     = shell_exec('php artisan view:clear 2>&1');
        $cmdCache    = shell_exec('php artisan cache:clear 2>&1');
        $cmdConfig   = shell_exec('php artisan config:clear 2>&1');
        $cmdOptimize = shell_exec('php artisan optimize:clear 2>&1');
        ?>
        <div class="console">
            <?php echo htmlspecialchars($cmdView ?? ''); ?><br>
            <?php echo htmlspecialchars($cmdCache ?? ''); ?><br>
            <?php echo htmlspecialchars($cmdConfig ?? ''); ?><br>
            <?php echo htmlspecialchars($cmdOptimize ?? ''); ?>
        </div>

        <div class="console-title">Commit Aktif Terbaru di Hosting:</div>
        <div class="console" style="color: #38bdf8;">
            <?php echo htmlspecialchars(shell_exec('git log -1 --pretty=format:"Hash: %h | Pesan: %s | Tanggal: %cd" 2>&1') ?? 'N/A'); ?>
        </div>

        <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
            <a href="?key=<?php echo htmlspecialchars($SECRET_KEY); ?>" class="btn btn-outline">⬅ Kembali ke Panel</a>
            <a href="/" target="_blank" class="btn">Buka Website TSM ↗</a>
        </div>

    <?php endif; ?>

    <div class="info-box">
        <strong>💡 Panduan Penggunaan:</strong>
        <ul>
            <li>File ini dapat diletakkan di <code>public_html/public/update-repo.php</code>.</li>
            <li>Setiap kali Anda selesai <code>git push origin main</code> dari VS Code/laptop, cukup buka halaman ini dan tekan tombol sinkronisasi.</li>
            <li>File <code>.env</code> dan gambar upload di <code>storage</code> tetap aman terjaga.</li>
            <li>Jika proyek sudah 100% fix dan siap dipublikasikan ke khalayak luas, hapus file <code>update-repo.php</code> ini dari File Manager demi keamanan.</li>
        </ul>
    </div>
</div>
</body>
</html>
