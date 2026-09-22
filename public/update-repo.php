<?php
/**
 * TSM Webhook / Git Auto-Deploy Script
 * Digunakan untuk menyinkronkan website dengan GitHub tanpa memerlukan terminal SSH.
 */

// =========================================================================
// 1. PENGATURAN KUNCI RAHASIA (Ganti jika ingin password sendiri)
// =========================================================================
$SECRET_KEY = 'tsm2026bangsri';

// =========================================================================
// 2. PROTEKSI KEAMANAN: HANYA BISA DIAKSES JIKA KEY SESUAI
// =========================================================================
if (!isset($_GET['key']) || $_GET['key'] !== $SECRET_KEY) {
    http_response_code(403);
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>403 Forbidden</title>
        <style>
            body { font-family: system-ui, -apple-system, sans-serif; background: #0f172a; color: #f8fafc; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
            .card { background: #1e293b; padding: 2.5rem; border-radius: 12px; border: 1px solid #334155; text-align: center; max-width: 420px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
            h1 { color: #ef4444; margin-top: 0; font-size: 1.8rem; }
            p { color: #94a3b8; font-size: 0.95rem; line-height: 1.5; }
        </style>
    </head>
    <body>
        <div class="card">
            <h1>⛔ Akses Ditolak</h1>
            <p>Halaman ini dilindungi kunci keamanan. Silakan sertakan parameter <code>?key=...</code> yang valid pada URL.</p>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Berpindah ke root folder Laravel (satu level di atas /public)
chdir(__DIR__ . '/..');

$runSync = isset($_GET['sync']) && $_GET['sync'] === 'now';
$runMigrate = isset($_GET['migrate']) && $_GET['migrate'] === '1';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git Deployer — TSM SMKN 1 Bangsri</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #090d16; color: #e2e8f0; margin: 0; padding: 2rem 1rem; }
        .container { max-width: 800px; margin: 0 auto; background: #111827; border: 1px solid #1f2937; border-radius: 14px; padding: 2rem; box-shadow: 0 20px 40px rgba(0,0,0,0.6); }
        .header { display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #1f2937; padding-bottom: 1.25rem; margin-bottom: 1.5rem; }
        .header h1 { font-size: 1.5rem; color: #f8fafc; margin: 0; display: flex; align-items: center; gap: 0.5rem; }
        .badge { background: #065f46; color: #34d399; font-size: 0.75rem; font-weight: 600; padding: 0.25rem 0.6rem; border-radius: 9999px; }
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; background: #dc2626; color: #fff; text-decoration: none; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; font-size: 0.95rem; border: none; cursor: pointer; transition: all 0.2s; }
        .btn:hover { background: #b91c1c; transform: translateY(-1px); }
        .btn-outline { background: transparent; border: 1px solid #374151; color: #9ca3af; margin-left: 0.5rem; }
        .btn-outline:hover { background: #1f2937; color: #fff; }
        .console { background: #030712; border: 1px solid #1f2937; border-radius: 8px; padding: 1.25rem; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 0.85rem; color: #4ade80; overflow-x: auto; margin-bottom: 1.25rem; line-height: 1.6; }
        .console-title { font-size: 0.85rem; font-weight: 600; color: #94a3b8; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .alert { background: #1e3a8a; border: 1px solid #2563eb; color: #bfdbfe; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem; }
        .alert-success { background: #064e3b; border-color: #059669; color: #a7f3d0; }
        .info-box { background: #182234; border: 1px solid #233554; border-radius: 8px; padding: 1rem; margin-top: 1.5rem; font-size: 0.85rem; color: #94a3b8; }
        .info-box ul { margin: 0.5rem 0 0 1.2rem; padding: 0; }
        .info-box li { margin-bottom: 0.3rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>🚀 TSM Auto-Updater <span class="badge">Development Mode</span></h1>
        <a href="/" target="_blank" class="btn btn-outline" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Lihat Website ↗</a>
    </div>

    <?php if (!$runSync): ?>
        <div class="alert">
            ℹ️ Tekan tombol di bawah untuk menyinkronkan hosting dengan commit terbaru dari branch <code>main</code> di GitHub.
        </div>

        <div class="console-title">Status Repository Saat Ini:</div>
        <div class="console">
            Commit Terakhir: <?php echo htmlspecialchars(shell_exec('git log -1 --oneline 2>&1') ?? 'N/A'); ?><br>
            Branch Aktif: <?php echo htmlspecialchars(trim(shell_exec('git branch --show-current 2>&1') ?? 'N/A')); ?><br>
            Status File: <?php echo htmlspecialchars(trim(shell_exec('git status -s 2>&1') ?? 'Clean (Tidak ada perubahan lokal)')); ?>
        </div>

        <form method="GET" action="">
            <input type="hidden" name="key" value="<?php echo htmlspecialchars($SECRET_KEY); ?>">
            <input type="hidden" name="sync" value="now">
            
            <p style="margin-bottom: 1rem;">
                <label style="cursor: pointer; display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; color: #cbd5e1;">
                    <input type="checkbox" name="migrate" value="1">
                    Jalankan juga <code>php artisan migrate --force</code> (Centang hanya jika Anda baru saja menambah file migrasi database baru)
                </label>
            </p>

            <button type="submit" class="btn">
                ⚡ Sinkronkan Sekarang dari GitHub
            </button>
        </form>

    <?php else: ?>

        <div class="alert alert-success">
            ✨ Proses sinkronisasi telah dijalankan! Silakan periksa hasil eksekusi berikut:
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

        <div class="console-title">Cache Laravel Cleared:</div>
        <?php
        $cmdView   = shell_exec('php artisan view:clear 2>&1');
        $cmdCache  = shell_exec('php artisan cache:clear 2>&1');
        $cmdConfig = shell_exec('php artisan config:clear 2>&1');
        ?>
        <div class="console">
            <?php echo htmlspecialchars($cmdView ?? ''); ?><br>
            <?php echo htmlspecialchars($cmdCache ?? ''); ?><br>
            <?php echo htmlspecialchars($cmdConfig ?? ''); ?>
        </div>

        <div class="console-title">Commit Aktif Terbaru:</div>
        <div class="console" style="color: #38bdf8;">
            <?php echo htmlspecialchars(shell_exec('git log -1 --pretty=format:"Hash: %h | Pesan: %s | Tanggal: %cd" 2>&1') ?? 'N/A'); ?>
        </div>

        <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem;">
            <a href="?key=<?php echo htmlspecialchars($SECRET_KEY); ?>" class="btn btn-outline">⬅ Kembali</a>
            <a href="/" target="_blank" class="btn">Buka Website TSM ↗</a>
        </div>

    <?php endif; ?>

    <div class="info-box">
        <strong>💡 Panduan Penggunaan Selama Masa Pengembangan:</strong>
        <ul>
            <li>Setiap selesai mengubah kode di VS Code, lakukan <code>git push origin main</code> seperti biasa.</li>
            <li>Buka link <code>https://tsm.smkn1bangsri.sch.id/update-repo.php?key=<?php echo htmlspecialchars($SECRET_KEY); ?></code> di browser dan tekan tombol sinkronkan.</li>
            <li><strong>Keamanan:</strong> Link ini aman karena memerlukan parameter <code>?key=...</code>. Orang luar yang membuka tanpa key akan mendapatkan pesan 403 Forbidden.</li>
            <li><strong>Setelah Project Fix & Siap Rilis Publik Luas:</strong> Anda cukup menghapus file <code>update-repo.php</code> dari File Manager hosting atau me-rename ekstensinya.</li>
        </ul>
    </div>
</div>
</body>
</html>
