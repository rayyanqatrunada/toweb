<?php
/**
 * =========================================================================
 * TBSM DEVOPS & REPO SYNC TERMINAL — SMKN 1 BANGSRI
 * =========================================================================
 * Utilitas deployment & pemeliharaan server mandiri untuk sinkronisasi GitHub,
 * migrasi database, database seeder, rollback/undo, dan manajemen cache.
 * 
 * SIFAT: RAHASIA / RESTRICTED ACCESS.
 * Gunakan kunci otentikasi untuk membuka konsol kontrol ini.
 * =========================================================================
 */

// Kirim header keamanan ketat
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-XSS-Protection: 1; mode=block');

// Mulai sesi PHP untuk persistensi otentikasi
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// -------------------------------------------------------------------------
// 1. KUNCI OTENTIKASI & KEAMANAN
// -------------------------------------------------------------------------
$SECRET_KEY = null;

// Dukungan baca dari .env (DEPLOY_KEY atau UPDATE_KEY)
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (str_starts_with($line, 'DEPLOY_KEY=') || str_starts_with($line, 'UPDATE_KEY=')) {
            $parts = explode('=', $line, 2);
            if (!empty($parts[1])) {
                $SECRET_KEY = trim($parts[1], " \t\n\r\0\x0B\"'");
                break;
            }
        }
    }
}

// Jika belum diset di .env, gunakan fallback terproteksi (bukan default publik)
if (empty($SECRET_KEY) || $SECRET_KEY === 'tsmtsmtsm') {
    $isKeyConfigured = false;
    $SECRET_KEY = 'tsm_bangsri_2026_super_deploy_key'; // Fallback aman
} else {
    $isKeyConfigured = true;
}

// Tangani aksi Logout
if (isset($_GET['logout'])) {
    unset($_SESSION['tsm_deployer_auth_v2'], $_SESSION['tsm_deployer_csrf'], $_SESSION['tsm_deployer_login_time'], $_SESSION['tsm_deployer_auth']);
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
    }
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

// Rate Limiting & Brute Force Lockout
$maxAttempts = 5;
$lockoutTime = 900; // 15 menit
$attempts = $_SESSION['tsm_login_attempts'] ?? 0;
$lockedUntil = $_SESSION['tsm_lockout_until'] ?? 0;

if ($lockedUntil > time()) {
    $remainingSeconds = $lockedUntil - time();
    $remainingMinutes = ceil($remainingSeconds / 60);
    $isLockedOut = true;
    $loginError = "⛔ Akun terkunci sementara akibat terlalu banyak percobaan gagal. Silakan coba lagi dalam {$remainingMinutes} menit.";
} else {
    $isLockedOut = false;
    if ($lockedUntil > 0 && $lockedUntil <= time()) {
        unset($_SESSION['tsm_login_attempts'], $_SESSION['tsm_lockout_until']);
        $attempts = 0;
    }
}

// Deteksi jika pengguna mencoba memasukkan sandi lewat URL query string (GET)
$urlParamAttempt = false;
if (isset($_GET['key']) || isset($_GET['password']) || isset($_GET['sandi']) || isset($_GET['token']) || isset($_GET['auth'])) {
    $urlParamAttempt = true;
}

// Proses login HANYA via HTTP POST dari form (jika tidak terkunci)
if (!$isLockedOut && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
    $submittedKey = (string)($_POST['key'] ?? '');
    if (!empty($submittedKey) && !empty($SECRET_KEY) && hash_equals($SECRET_KEY, $submittedKey)) {
        session_regenerate_id(true);
        $_SESSION['tsm_deployer_auth_v2'] = true;
        $_SESSION['tsm_deployer_csrf'] = bin2hex(random_bytes(32));
        $_SESSION['tsm_deployer_login_time'] = time();
        unset($_SESSION['tsm_login_attempts'], $_SESSION['tsm_lockout_until']);
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
        exit;
    } else {
        $attempts++;
        $_SESSION['tsm_login_attempts'] = $attempts;
        $remaining = $maxAttempts - $attempts;
        if ($remaining <= 0) {
            $_SESSION['tsm_lockout_until'] = time() + $lockoutTime;
            $loginError = '⛔ Terlalu banyak percobaan sandi salah. Akses terkunci selama 15 menit.';
            $isLockedOut = true;
        } else {
            $loginError = "⛔ Kata sandi tidak valid. Sisa percobaan: {$remaining} kali.";
        }
    }
}

// Hapus variabel sesi lama (v1) agar tidak ada celah akses tanpa sandi
if (isset($_SESSION['tsm_deployer_auth'])) {
    unset($_SESSION['tsm_deployer_auth']);
}

// Validasi status sesi v2 saat ini (Timeout 30 menit)
$isAuthenticated = false;
if (!empty($_SESSION['tsm_deployer_auth_v2'])) {
    if (isset($_SESSION['tsm_deployer_login_time']) && (time() - $_SESSION['tsm_deployer_login_time'] > 1800)) {
        unset($_SESSION['tsm_deployer_auth_v2'], $_SESSION['tsm_deployer_csrf'], $_SESSION['tsm_deployer_login_time']);
        $isAuthenticated = false;
    } else {
        $_SESSION['tsm_deployer_login_time'] = time();
        $isAuthenticated = true;
    }
}

// Sediakan token CSRF untuk aksi-aksi berikutnya
if ($isAuthenticated && empty($_SESSION['tsm_deployer_csrf'])) {
    $_SESSION['tsm_deployer_csrf'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['tsm_deployer_csrf'] ?? '';

// -------------------------------------------------------------------------
// 2. DETEKSI LINGKUNGAN & PATH LARAVEL
// -------------------------------------------------------------------------
$laravelRoot = null;
if (file_exists(__DIR__ . '/../artisan')) {
    $laravelRoot = realpath(__DIR__ . '/..');
} elseif (file_exists(__DIR__ . '/artisan')) {
    $laravelRoot = __DIR__;
} elseif (file_exists(__DIR__ . '/../../artisan')) {
    $laravelRoot = realpath(__DIR__ . '/../..');
}

if ($laravelRoot) {
    chdir($laravelRoot);
}

// Deteksi binary PHP
$phpBinary = 'php';
if (defined('PHP_BINARY') && PHP_BINARY && is_executable(PHP_BINARY)) {
    $phpBinary = PHP_BINARY;
}

// -------------------------------------------------------------------------
// 3. TELEMETRI SISTEM & STATUS REPO
// -------------------------------------------------------------------------
$gitBranch     = 'N/A';
$gitCommitHash = 'N/A';
$gitCommitMsg  = 'N/A';
$gitCommitDate = 'N/A';
$gitCommitAuthor = 'N/A';
$gitStatusClean = true;
$gitUncommitted = [];
$gitRecentLogs = [];
$isDown = false;
$storageLinked = false;
$diskFreeGB = null;

if ($isAuthenticated && $laravelRoot) {
    // Info Git Aktif
    $gitBranch = trim((string)shell_exec('git branch --show-current 2>&1')) ?: 'main';
    $logRaw = trim((string)shell_exec('git log -1 --pretty=format:"%h|%an|%ar|%s" 2>&1'));
    if ($logRaw && str_contains($logRaw, '|')) {
        $parts = explode('|', $logRaw, 4);
        $gitCommitHash   = $parts[0] ?? 'N/A';
        $gitCommitAuthor = $parts[1] ?? 'N/A';
        $gitCommitDate   = $parts[2] ?? 'N/A';
        $gitCommitMsg    = $parts[3] ?? 'N/A';
    }

    // Status Perubahan Lokal Uncommitted
    $statusRaw = trim((string)shell_exec('git status --porcelain 2>&1'));
    if (!empty($statusRaw)) {
        $gitStatusClean = false;
        $gitUncommitted = array_slice(explode("\n", $statusRaw), 0, 8);
    }

    // Riwayat 6 Commit Terakhir
    $recentRaw = trim((string)shell_exec('git log -6 --pretty=format:"%h|%an|%ar|%s" 2>&1'));
    if (!empty($recentRaw)) {
        foreach (explode("\n", $recentRaw) as $item) {
            $p = explode('|', $item, 4);
            if (count($p) === 4) {
                $gitRecentLogs[] = [
                    'hash'   => $p[0],
                    'author' => $p[1],
                    'date'   => $p[2],
                    'msg'    => $p[3],
                ];
            }
        }
    }

    // Cek Maintenance Mode
    $isDown = file_exists($laravelRoot . '/storage/framework/down');

    // Cek Symlink Storage
    $publicStorage = $laravelRoot . '/public/storage';
    $storageLinked = is_link($publicStorage) || (file_exists($publicStorage) && is_dir($publicStorage));

    // Disk space
    $freeBytes = @disk_free_space($laravelRoot);
    if ($freeBytes !== false) {
        $diskFreeGB = round($freeBytes / 1024 / 1024 / 1024, 2);
    }
}

// Daftar Seeder Tersedia
$availableSeeders = [
    'DatabaseSeeder'         => 'Semua Seeder Utama (DatabaseSeeder)',
    'RoleAndUserSeeder'      => 'Akun Pengguna & Hak Akses (RoleAndUserSeeder)',
    'SettingSeeder'          => 'Pengaturan Situs & Hero (SettingSeeder)',
    'AcademicDataSeeder'     => 'Program & Fasilitas Bengkel (AcademicDataSeeder)',
    'AutomotiveDataSeeder'   => 'Data Kompetensi TBSM (AutomotiveDataSeeder)',
    'IndustryDataSeeder'     => 'Mitra DUDI & Cabang AHASS (IndustryDataSeeder)',
    'AlumniDataSeeder'       => 'Tracer Study Alumni BMW (AlumniDataSeeder)',
    'MediaDataSeeder'        => 'Album & Item Galeri (MediaDataSeeder)',
    'ContentDataSeeder'      => 'Artikel Warta & Pengumuman (ContentDataSeeder)',
    'DownloadDataSeeder'     => 'Pusat Unduhan & Kategori (DownloadDataSeeder)',
];

// -------------------------------------------------------------------------
// 4. PEMROSESAN AKSI OPERASIONAL
// -------------------------------------------------------------------------
$actionResult = null;
$actionTitle  = null;
$actionStatus = 'success';
$actionTime   = 0;

if ($isAuthenticated && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $submittedCsrf = (string)($_POST['csrf_token'] ?? '');
    if (empty($csrfToken) || !hash_equals($csrfToken, $submittedCsrf)) {
        $actionTitle  = 'Keamanan Ditolak (Sesi Kedaluwarsa)';
        $actionResult = 'Aksi dibatalkan demi keamanan karena token CSRF sesi tidak valid atau kedaluwarsa. Silakan refresh halaman dan coba kembali.';
        $actionStatus = 'danger';
    } else {
        $startTime = microtime(true);
        $action = $_POST['action'];

        switch ($action) {
        // -------------------------------------------------------------
        // A. SINKRONISASI GIT
        // -------------------------------------------------------------
        case 'git_pull':
            $actionTitle = 'Git Fast Pull (origin/main)';
            $output = [];
            $output[] = "$ git pull origin main";
            $output[] = (string)shell_exec('git pull origin main 2>&1');
            $output[] = "$ php artisan optimize:clear";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize:clear 2>&1');
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        case 'git_force_sync':
            $actionTitle = 'Git Force Reset & Clean Sync';
            $output = [];
            $output[] = "$ git fetch origin main";
            $output[] = (string)shell_exec('git fetch origin main 2>&1');
            $output[] = "$ git checkout -f -B main origin/main";
            $output[] = (string)shell_exec('git checkout -f -B main origin/main 2>&1');
            $output[] = "$ git reset --hard origin/main";
            $output[] = (string)shell_exec('git reset --hard origin/main 2>&1');
            $output[] = "$ git clean -fd -e .env -e public/build -e public/storage -e storage";
            $output[] = (string)shell_exec('git clean -fd -e .env -e public/build -e public/storage -e storage 2>&1');
            $output[] = "$ php artisan optimize:clear";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize:clear 2>&1');
            $actionResult = implode("\n\n", array_map('trim', $output));
            break;

        // -------------------------------------------------------------
        // B. UNDO / ROLLBACK COMMIT
        // -------------------------------------------------------------
        case 'git_undo':
            $steps = max(1, min(5, (int)($_POST['undo_steps'] ?? 1)));
            $actionTitle = "Git Undo (Rollback $steps Commit ke Belakang)";
            $output = [];
            $prevCommit = trim((string)shell_exec('git log -1 --oneline 2>&1'));
            $output[] = "[SEBELUM UNDO]: " . $prevCommit;
            $output[] = "$ git reset --hard HEAD~$steps";
            $output[] = (string)shell_exec("git reset --hard HEAD~$steps 2>&1");
            $newCommit = trim((string)shell_exec('git log -1 --oneline 2>&1'));
            $output[] = "[SETELAH UNDO]: " . $newCommit;
            $output[] = "$ php artisan optimize:clear";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize:clear 2>&1');
            $actionResult = implode("\n\n", array_map('trim', $output));
            break;

        // -------------------------------------------------------------
        // C. BASIS DATA: MIGRATE & ROLLBACK
        // -------------------------------------------------------------
        case 'db_migrate':
            $actionTitle = 'Database Migration (artisan migrate --force)';
            $output = [];
            $output[] = "$ php artisan migrate --force";
            $output[] = (string)shell_exec($phpBinary . ' artisan migrate --force 2>&1');
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        case 'db_migrate_status':
            $actionTitle = 'Status Migrasi Basis Data';
            $output = [];
            $output[] = "$ php artisan migrate:status";
            $output[] = (string)shell_exec($phpBinary . ' artisan migrate:status 2>&1');
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        case 'db_migrate_rollback':
            $step = max(1, min(10, (int)($_POST['rollback_step'] ?? 1)));
            $actionTitle = "Rollback Migrasi ($step Step)";
            $output = [];
            $output[] = "$ php artisan migrate:rollback --step=$step --force";
            $output[] = (string)shell_exec($phpBinary . " artisan migrate:rollback --step=$step --force 2>&1");
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        case 'db_fresh':
            $withSeed = isset($_POST['with_seed']) && $_POST['with_seed'] === '1';
            $actionTitle = $withSeed 
                ? 'Refresh & Buat Ulang Database + Seeder Lengkap (migrate:fresh --seed)' 
                : 'Refresh Database Total (migrate:fresh)';
            $output = [];
            $cmd = $phpBinary . ' artisan migrate:fresh' . ($withSeed ? ' --seed' : '') . ' --force';
            $output[] = "$ " . $cmd;
            $output[] = (string)shell_exec($cmd . ' 2>&1');
            $output[] = "$ php artisan optimize:clear";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize:clear 2>&1');
            $actionResult = implode("\n\n", array_map('trim', $output));
            break;

        // -------------------------------------------------------------
        // D. BASIS DATA: SEEDER
        // -------------------------------------------------------------
        case 'db_seed':
            $seederClass = trim($_POST['seeder_class'] ?? 'DatabaseSeeder');
            if (!preg_match('/^[A-Za-z0-9_\\\\]+$/', $seederClass)) {
                $seederClass = 'DatabaseSeeder';
            }
            $actionTitle = "Database Seeder ($seederClass)";
            $output = [];
            $cmd = $phpBinary . ' artisan db:seed --class=' . escapeshellarg($seederClass) . ' --force';
            $output[] = "$ " . $cmd;
            $output[] = (string)shell_exec($cmd . ' 2>&1');
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        // -------------------------------------------------------------
        // E. CACHE & OPTIMASI
        // -------------------------------------------------------------
        case 'cache_clear':
            $actionTitle = 'Pembersihan Seluruh Cache (optimize:clear)';
            $output = [];
            $output[] = "$ php artisan optimize:clear";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize:clear 2>&1');
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        case 'cache_optimize':
            $actionTitle = 'Optimasi & Cache Warmup (optimize)';
            $output = [];
            $output[] = "$ php artisan optimize";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize 2>&1');
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        // -------------------------------------------------------------
        // F. STORAGE SYMLINK & IZIN UPLOAD FOTO
        // -------------------------------------------------------------
        case 'storage_fix_permissions':
        case 'storage_link':
            $actionTitle = 'Perbaikan Folder & Izin Upload Foto Hosting';
            $output = [];
            
            $dirsToEnsure = [
                'storage/app/public',
                'storage/app/private/livewire-tmp',
                'storage/framework/cache/data',
                'storage/framework/sessions',
                'storage/framework/views',
                'storage/logs',
                'public/storage',
                'public/storage/galleries',
                'public/storage/galleries/covers',
                'public/storage/galleries/items',
                'public/storage/facilities',
                'public/storage/teachers',
                'public/storage/documents',
                'public/storage/headers',
                'public/storage/settings',
                'public/storage/posts',
                'public/storage/alumni',
                'public/storage/achievements',
            ];
            
            foreach ($dirsToEnsure as $dir) {
                $fullPath = $laravelRoot . '/' . $dir;
                if (!file_exists($fullPath)) {
                    @mkdir($fullPath, 0775, true);
                    $output[] = "[DIR CREATED]: $dir";
                }
                @chmod($fullPath, 0775);
            }
            
            $output[] = "$ php artisan storage:link";
            $output[] = (string)shell_exec($phpBinary . ' artisan storage:link 2>&1');

            $output[] = "$ php artisan gallery:sync-assets";
            $output[] = (string)shell_exec($phpBinary . ' artisan gallery:sync-assets 2>&1');
            
            $output[] = "$ php artisan optimize:clear";
            $output[] = (string)shell_exec($phpBinary . ' artisan optimize:clear 2>&1');
            
            $pubStorage = $laravelRoot . '/public/storage';
            $isWritable = is_writable($pubStorage);
            $output[] = "[HASIL]: public/storage writable = " . ($isWritable ? '✅ BISA DITULIS (Izin OK)' : '⚠️ TIDAK BISA DITULIS (Cek file manager / permission 775)');
            
            $actionResult = implode("\n", array_map('trim', $output));
            break;

        // -------------------------------------------------------------
        // G. MAINTENANCE MODE
        // -------------------------------------------------------------
        case 'maintenance_toggle':
            if ($isDown) {
                $actionTitle = 'Mengaktifkan Website (php artisan up)';
                $output = [];
                $output[] = "$ php artisan up";
                $output[] = (string)shell_exec($phpBinary . ' artisan up 2>&1');
                $actionResult = implode("\n", array_map('trim', $output));
            } else {
                $actionTitle = 'Mematikan Website Sementara (php artisan down)';
                $secretToken = 'tsm' . date('Y');
                $output = [];
                $cmd = $phpBinary . ' artisan down --secret=' . escapeshellarg($secretToken) . ' --render="errors::503"';
                $output[] = "$ " . $cmd;
                $output[] = (string)shell_exec($cmd . ' 2>&1');
                $output[] = "Bypass URL: /" . $secretToken;
                $actionResult = implode("\n", array_map('trim', $output));
            }
            break;

        default:
            $actionTitle  = 'Perintah Tidak Dikenal';
            $actionResult = 'Aksi tidak valid atau tidak didukung.';
            $actionStatus = 'danger';
            break;
    }

        $actionTime = round(microtime(true) - $startTime, 3);

        // Refresh status setelah aksi
        if ($laravelRoot) {
            $gitBranch = trim((string)shell_exec('git branch --show-current 2>&1')) ?: 'main';
            $logRaw = trim((string)shell_exec('git log -1 --pretty=format:"%h|%an|%ar|%s" 2>&1'));
            if ($logRaw && str_contains($logRaw, '|')) {
                $parts = explode('|', $logRaw, 4);
                $gitCommitHash   = $parts[0] ?? 'N/A';
                $gitCommitAuthor = $parts[1] ?? 'N/A';
                $gitCommitDate   = $parts[2] ?? 'N/A';
                $gitCommitMsg    = $parts[3] ?? 'N/A';
            }
            $isDown = file_exists($laravelRoot . '/storage/framework/down');
            $storageLinked = is_link($laravelRoot . '/public/storage') || (file_exists($laravelRoot . '/public/storage') && is_dir($laravelRoot . '/public/storage'));
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>DevOps Terminal — TBSM SMKN 1 Bangsri</title>
    
    <!-- Google Fonts: Inter & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --tbsm-red: #DC2626;
            --tbsm-red-hover: #B91C1C;
            --tbsm-red-soft: rgba(220, 38, 38, 0.12);
            --tbsm-dark-bg: #09090C;
            --tbsm-card-bg: #121217;
            --tbsm-card-inner: #18181F;
            --tbsm-border: #27272A;
            --tbsm-border-light: rgba(255, 255, 255, 0.08);
            --tbsm-text: #F4F4F5;
            --tbsm-muted: #A1A1AA;
            --tbsm-muted-dark: #71717A;
            --tbsm-emerald: #10B981;
            --tbsm-amber: #F59E0B;
            --tbsm-sky: #0EA5E9;
            --radius-sm: 4px;
            --radius-md: 6px;
            --radius-lg: 8px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--tbsm-dark-bg);
            color: var(--tbsm-text);
            min-height: 100vh;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(220, 38, 38, 0.08), transparent 45%),
                linear-gradient(to right, rgba(255,255,255,0.015) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.015) 1px, transparent 1px);
            background-size: 100% 100%, 32px 32px, 32px 32px;
            padding: 1.5rem 1rem 3rem;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .container {
            max-width: 1080px;
            margin: 0 auto;
        }

        /* Top Bar */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--tbsm-card-bg);
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-md);
            padding: 0.85rem 1.25rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .brand-section {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .brand-badge-red {
            width: 8px;
            height: 28px;
            background: var(--tbsm-red);
            border-radius: 2px;
        }

        .brand-title {
            font-size: 1.05rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .brand-title span {
            color: var(--tbsm-red);
        }

        .brand-subtitle {
            font-size: 0.72rem;
            color: var(--tbsm-muted);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 0.25rem 0.65rem;
            border-radius: 9999px;
            border: 1px solid transparent;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .badge-emerald {
            background: rgba(16, 185, 129, 0.12);
            color: #34D399;
            border-color: rgba(16, 185, 129, 0.25);
        }

        .badge-amber {
            background: rgba(245, 158, 11, 0.12);
            color: #FBBF24;
            border-color: rgba(245, 158, 11, 0.25);
        }

        .badge-red {
            background: rgba(220, 38, 38, 0.15);
            color: #F87171;
            border-color: rgba(220, 38, 38, 0.3);
        }

        .badge-sky {
            background: rgba(14, 165, 233, 0.12);
            color: #38BDF8;
            border-color: rgba(14, 165, 233, 0.25);
        }

        .pulse-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: currentColor;
            box-shadow: 0 0 8px currentColor;
        }

        /* Tombol & Link */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.55rem 1rem;
            border-radius: var(--radius-sm);
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s ease;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--tbsm-red);
            color: #FFFFFF;
            border-color: var(--tbsm-red-hover);
        }

        .btn-primary:hover {
            background: var(--tbsm-red-hover);
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35);
        }

        .btn-outline {
            background: transparent;
            color: var(--tbsm-muted);
            border-color: var(--tbsm-border);
        }

        .btn-outline:hover {
            background: var(--tbsm-card-inner);
            color: #FFFFFF;
            border-color: rgba(255, 255, 255, 0.2);
        }

        .btn-danger-outline {
            background: transparent;
            color: #F87171;
            border-color: rgba(220, 38, 38, 0.3);
        }

        .btn-danger-outline:hover {
            background: rgba(220, 38, 38, 0.12);
            color: #FFFFFF;
            border-color: var(--tbsm-red);
        }

        .btn-amber-outline {
            background: transparent;
            color: #FBBF24;
            border-color: rgba(245, 158, 11, 0.3);
        }

        .btn-amber-outline:hover {
            background: rgba(245, 158, 11, 0.12);
            color: #FFFFFF;
            border-color: var(--tbsm-amber);
        }

        .btn-sky-outline {
            background: transparent;
            color: #38BDF8;
            border-color: rgba(14, 165, 233, 0.3);
        }

        .btn-sky-outline:hover {
            background: rgba(14, 165, 233, 0.12);
            color: #FFFFFF;
            border-color: var(--tbsm-sky);
        }

        /* Telemetri Grid */
        .telemetry-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .telemetry-card {
            background: var(--tbsm-card-bg);
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-md);
            padding: 1rem 1.15rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            position: relative;
            overflow: hidden;
        }

        .telemetry-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: transparent;
        }

        .telemetry-card.red-top::before { background: var(--tbsm-red); }
        .telemetry-card.emerald-top::before { background: var(--tbsm-emerald); }
        .telemetry-card.sky-top::before { background: var(--tbsm-sky); }
        .telemetry-card.amber-top::before { background: var(--tbsm-amber); }

        .telemetry-label {
            font-size: 0.7rem;
            color: var(--tbsm-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .telemetry-value {
            font-size: 0.98rem;
            font-weight: 700;
            color: #FFFFFF;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .telemetry-sub {
            font-size: 0.72rem;
            color: var(--tbsm-muted-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main Workspace Panels */
        .workspace-panel {
            background: var(--tbsm-card-bg);
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-md);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
            padding-bottom: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .panel-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            letter-spacing: -0.01em;
        }

        .panel-desc {
            font-size: 0.8rem;
            color: var(--tbsm-muted);
            margin-top: 0.2rem;
        }

        /* Action Grid */
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.25rem;
        }

        .action-card {
            background: var(--tbsm-card-inner);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: var(--radius-sm);
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.2s ease;
        }

        .action-card:hover {
            border-color: rgba(220, 38, 38, 0.4);
            transform: translateY(-1px);
        }

        .action-card-header {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .action-icon {
            width: 34px;
            height: 34px;
            border-radius: var(--radius-sm);
            background: rgba(220, 38, 38, 0.15);
            color: var(--tbsm-red);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.1rem;
        }

        .action-icon.sky {
            background: rgba(14, 165, 233, 0.15);
            color: var(--tbsm-sky);
        }

        .action-icon.amber {
            background: rgba(245, 158, 11, 0.15);
            color: var(--tbsm-amber);
        }

        .action-icon.emerald {
            background: rgba(16, 185, 129, 0.15);
            color: var(--tbsm-emerald);
        }

        .action-card-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #FFFFFF;
        }

        .action-card-desc {
            font-size: 0.78rem;
            color: var(--tbsm-muted);
            line-height: 1.45;
            margin-top: 0.2rem;
        }

        .action-card-form {
            margin-top: 1rem;
            padding-top: 0.85rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Form Controls */
        .form-select, .form-input {
            width: 100%;
            background: #09090C;
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-sm);
            padding: 0.55rem 0.75rem;
            color: #FFFFFF;
            font-size: 0.82rem;
            font-family: inherit;
            margin-bottom: 0.75rem;
            outline: none;
            transition: border-color 0.15s ease;
        }

        .form-select:focus, .form-input:focus {
            border-color: var(--tbsm-red);
        }

        /* Console Output */
        .terminal-box {
            background: #050507;
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-md);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .terminal-header {
            background: #0D0D12;
            padding: 0.6rem 1rem;
            border-bottom: 1px solid var(--tbsm-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--tbsm-muted);
        }

        .terminal-dots {
            display: flex;
            gap: 6px;
        }

        .terminal-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #27272A;
        }

        .terminal-dot.r { background: #EF4444; }
        .terminal-dot.y { background: #F59E0B; }
        .terminal-dot.g { background: #10B981; }

        .terminal-content {
            padding: 1.25rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.82rem;
            line-height: 1.6;
            color: #34D399;
            white-space: pre-wrap;
            word-break: break-all;
            max-height: 380px;
            overflow-y: auto;
        }

        /* Commit History Table */
        .commit-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.8rem;
        }

        .commit-table th {
            text-align: left;
            padding: 0.6rem 0.85rem;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--tbsm-muted-dark);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--tbsm-border);
        }

        .commit-table td {
            padding: 0.65rem 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--tbsm-text);
        }

        .commit-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .commit-hash {
            font-family: 'JetBrains Mono', monospace;
            color: #38BDF8;
            font-weight: 600;
        }

        /* Auth Gate Screen */
        .auth-wrapper {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: var(--tbsm-card-bg);
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-md);
            padding: 2.25rem 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            position: relative;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--tbsm-red), #F87171);
            border-radius: var(--radius-md) var(--radius-md) 0 0;
        }

        .alert-box {
            padding: 0.75rem 1rem;
            border-radius: var(--radius-sm);
            font-size: 0.8rem;
            margin-bottom: 1.25rem;
            border: 1px solid transparent;
            line-height: 1.45;
        }

        .alert-box.danger {
            background: rgba(220, 38, 38, 0.15);
            border-color: rgba(220, 38, 38, 0.4);
            color: #FCA5A5;
        }

        .alert-box.info {
            background: rgba(14, 165, 233, 0.12);
            border-color: rgba(14, 165, 233, 0.3);
            color: #BAE6FD;
        }

        .alert-box.success {
            background: rgba(16, 185, 129, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
            color: #A7F3D0;
        }

        /* Modal Dialog */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 1rem;
        }

        .modal-box {
            background: var(--tbsm-card-bg);
            border: 1px solid var(--tbsm-border);
            border-radius: var(--radius-md);
            max-width: 480px;
            width: 100%;
            padding: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.7);
        }

        .modal-title {
            font-size: 1rem;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 0.5rem;
        }

        .modal-body {
            font-size: 0.84rem;
            color: var(--tbsm-muted);
            margin-bottom: 1.25rem;
            line-height: 1.5;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        /* Footer */
        .footer-note {
            text-align: center;
            font-size: 0.75rem;
            color: var(--tbsm-muted-dark);
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<?php if (!$isAuthenticated): ?>
<!-- ======================================================================= -->
<!-- TAMPILAN 1: AUTHENTICATION GATE (KUNCI RAHASIA)                          -->
<!-- ======================================================================= -->
<div class="auth-wrapper">
    <div class="auth-card">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div class="brand-badge-red" style="height: 32px;"></div>
            <div>
                <div class="brand-title">TBSM <span>DEVOPS</span></div>
                <div class="brand-subtitle">Automated Sync & Server Terminal</div>
            </div>
        </div>

        <?php if (!empty($loginError)): ?>
            <div class="alert-box danger">
                <?php echo htmlspecialchars($loginError); ?>
            </div>
        <?php elseif ($urlParamAttempt): ?>
            <div class="alert-box danger" style="background: rgba(220, 38, 38, 0.15); border-color: rgba(220, 38, 38, 0.4); color: #fca5a5;">
                ⚠️ <strong>Akses URL Ditolak:</strong> Kata sandi tidak dapat dimasukkan melalui parameter URL (GET). Silakan masukkan kata sandi secara manual melalui formulir di bawah ini.
            </div>
        <?php else: ?>
            <div class="alert-box info">
                🔒 Area tertutup ini dilindungi kata sandi server. Masukkan kata sandi repositori untuk melanjutkan.
            </div>
        <?php endif; ?>

        <?php if (!$isKeyConfigured): ?>
            <div class="alert-box info" style="background: rgba(245, 158, 11, 0.1); border-color: rgba(245, 158, 11, 0.3); color: #fcd34d; font-size: 0.8rem; margin-bottom: 1rem;">
                🛡️ <strong>Rekomendasi Keamanan:</strong> Pasang nilai rahasia unik pada parameter <code>DEPLOY_KEY</code> di berkas <code>.env</code> server untuk mengunci terminal ini secara mandiri.
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars(strtok($_SERVER['REQUEST_URI'], '?')); ?>" autocomplete="off">
            <input type="hidden" name="login_submit" value="1">
            <label style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--tbsm-muted); display: block; margin-bottom: 0.45rem;">
                Kata Sandi Server:
            </label>
            <div style="position: relative; margin-bottom: 1.25rem;">
                <input type="password" id="authKeyInput" name="key" class="form-input" placeholder="<?php echo $isLockedOut ? 'Akses terkunci sementara...' : 'Masukkan kata sandi...'; ?>" value="" required autofocus autocomplete="current-password" style="margin-bottom: 0; padding-right: 2.5rem;" <?php echo $isLockedOut ? 'disabled' : ''; ?>>
                <button type="button" onclick="togglePassword()" style="position: absolute; right: 0.65rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--tbsm-muted); cursor: pointer; font-size: 0.85rem;" title="Lihat/Sembunyikan" <?php echo $isLockedOut ? 'disabled' : ''; ?>>👁️</button>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.75rem; font-size: 0.88rem;" <?php echo $isLockedOut ? 'disabled style="opacity: 0.5; cursor: not-allowed;"' : ''; ?>>
                <?php echo $isLockedOut ? 'Terkunci Sementara ⏳' : 'Buka Terminal DevOps ⚡'; ?>
            </button>
        </form>

        <div style="margin-top: 1.5rem; text-align: center;">
            <a href="/" class="btn btn-outline" style="font-size: 0.78rem; padding: 0.45rem 0.85rem;">← Kembali ke Beranda Publik</a>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    var input = document.getElementById('authKeyInput');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

<?php else: ?>
<!-- ======================================================================= -->
<!-- TAMPILAN 2: DEVOPS WORKSPACE UTAMA (TERAUTENTIKASI)                     -->
<!-- ======================================================================= -->
<div class="container">

    <!-- Top Navigation Bar -->
    <div class="topbar">
        <div class="brand-section">
            <div class="brand-badge-red"></div>
            <div>
                <div class="brand-title">TBSM <span>DEVOPS TERMINAL</span></div>
                <div class="brand-subtitle">SMK Negeri 1 Bangsri — Honda Binaan Resmi</div>
            </div>
        </div>

        <div class="topbar-actions">
            <span class="badge badge-emerald">
                <span class="pulse-dot"></span>
                Terminal Online
            </span>

            <?php if ($isDown): ?>
                <span class="badge badge-red">Mode Pemeliharaan (DOWN)</span>
            <?php endif; ?>

            <a href="/" target="_blank" class="btn btn-outline">
                Lihat Web ↗
            </a>

            <a href="/admin" target="_blank" class="btn btn-outline">
                Admin Panel ↗
            </a>

            <a href="?logout=1" class="btn btn-danger-outline" style="padding: 0.45rem 0.75rem;">
                Kunci Keluar 🔒
            </a>
        </div>
    </div>

    <!-- Telemetri Sistem -->
    <div class="telemetry-grid">
        <!-- Card 1: Git Branch & Commit -->
        <div class="telemetry-card red-top">
            <div class="telemetry-label">
                <span>Git Active Branch</span>
                <span class="badge badge-sky" style="font-size: 0.65rem; padding: 0.1rem 0.45rem;"><?php echo htmlspecialchars($gitBranch); ?></span>
            </div>
            <div class="telemetry-value mono" style="font-size: 0.85rem;">
                #<?php echo htmlspecialchars($gitCommitHash); ?> <span style="font-size: 0.75rem; font-weight: normal; color: var(--tbsm-muted);"><?php echo htmlspecialchars(mb_strimwidth($gitCommitMsg, 0, 32, '...')); ?></span>
            </div>
            <div class="telemetry-sub">
                <?php echo htmlspecialchars($gitCommitAuthor); ?> • <?php echo htmlspecialchars($gitCommitDate); ?>
            </div>
        </div>

        <!-- Card 2: Status File Lokal -->
        <div class="telemetry-card <?php echo $gitStatusClean ? 'emerald-top' : 'amber-top'; ?>">
            <div class="telemetry-label">
                <span>Working Tree Status</span>
                <?php if ($gitStatusClean): ?>
                    <span class="badge badge-emerald" style="font-size: 0.65rem; padding: 0.1rem 0.45rem;">Bersih (Clean)</span>
                <?php else: ?>
                    <span class="badge badge-amber" style="font-size: 0.65rem; padding: 0.1rem 0.45rem;"><?php echo count($gitUncommitted); ?> Perubahan</span>
                <?php endif; ?>
            </div>
            <div class="telemetry-value" style="font-size: 0.88rem;">
                <?php echo $gitStatusClean ? 'Sinkron dengan Repository' : 'Ada file lokal termodifikasi'; ?>
            </div>
            <div class="telemetry-sub">
                Path: <span class="mono"><?php echo htmlspecialchars($laravelRoot ?? 'Tidak terdeteksi'); ?></span>
            </div>
        </div>

        <!-- Card 3: Storage Symlink & Disk -->
        <div class="telemetry-card sky-top">
            <div class="telemetry-label">
                <span>Storage & Disk Server</span>
                <span class="badge <?php echo $storageLinked ? 'badge-emerald' : 'badge-amber'; ?>" style="font-size: 0.65rem; padding: 0.1rem 0.45rem;">
                    <?php echo $storageLinked ? 'Symlink OK' : 'Symlink Belum'; ?>
                </span>
            </div>
            <div class="telemetry-value" style="font-size: 0.88rem;">
                <?php echo $diskFreeGB !== null ? $diskFreeGB . ' GB Sisa Ruang' : 'Penyimpanan Aktif'; ?>
            </div>
            <div class="telemetry-sub">
                PHP Binary: <span class="mono"><?php echo htmlspecialchars(basename($phpBinary)); ?></span>
            </div>
        </div>
    </div>

    <!-- Alert / Hasil Eksekusi Terakhir -->
    <?php if ($actionResult !== null): ?>
        <div class="terminal-box">
            <div class="terminal-header">
                <div style="display: flex; align-items: center; gap: 0.6rem;">
                    <div class="terminal-dots">
                        <span class="terminal-dot r"></span>
                        <span class="terminal-dot y"></span>
                        <span class="terminal-dot g"></span>
                    </div>
                    <span>HASIL EKSEKUSI: <?php echo htmlspecialchars($actionTitle ?? 'Console Output'); ?></span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span class="badge badge-emerald" style="font-size: 0.65rem;">Selesai dalam <?php echo $actionTime; ?>s</span>
                    <button type="button" onclick="copyConsoleOutput()" class="btn btn-outline" style="padding: 0.2rem 0.5rem; font-size: 0.7rem;">Salin Log</button>
                </div>
            </div>
            <div class="terminal-content" id="consoleOutputArea"><?php echo htmlspecialchars($actionResult); ?></div>
        </div>
    <?php endif; ?>

    <!-- PANEL AKSI UTAMA -->
    <div class="workspace-panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">
                    <span>⚡</span> Pusat Kendali Deployment & Basis Data
                </div>
                <div class="panel-desc">
                    Pilih aksi DevOps yang ingin dijalankan pada instalasi server ini.
                </div>
            </div>
        </div>

        <div class="action-grid">
            <!-- 1. GIT PULL BIASA -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon">🚀</div>
                        <div>
                            <div class="action-card-title">Git Fast Pull</div>
                            <div class="action-card-desc">Tarik commit terbaru dari branch <code>main</code> GitHub dan bersihkan cache aplikasi.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <form method="POST" action="">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                        <input type="hidden" name="action" value="git_pull">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            ⚡ Pull & Clear Cache
                        </button>
                    </form>
                </div>
            </div>

            <!-- 2. GIT FORCE RESET & SYNC -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon amber">💥</div>
                        <div>
                            <div class="action-card-title">Force Sync (Hard Reset)</div>
                            <div class="action-card-desc">Paksa sinkronisasi persis dengan GitHub origin/main. File .env & folder storage tetap aman.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <button type="button" class="btn btn-amber-outline" style="width: 100%;" onclick="confirmAction('formForceSync', 'Konfirmasi Force Sync', 'Tindakan ini akan menimpa seluruh file lokal agar persis dengan branch origin/main GitHub (kecuali file .env dan storage). Lanjutkan?')">
                        ⚡ Force Reset & Sync
                    </button>
                    <form id="formForceSync" method="POST" action="" style="display: none;">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                        <input type="hidden" name="action" value="git_force_sync">
                    </form>
                </div>
            </div>

            <!-- 3. GIT UNDO / ROLLBACK COMMIT -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon amber">↩️</div>
                        <div>
                            <div class="action-card-title">Undo Git Commit (Rollback)</div>
                            <div class="action-card-desc">Kembalikan kode ke 1 atau beberapa commit sebelumnya jika commit terbaru bermasalah.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <form id="formGitUndo" method="POST" action="">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                        <input type="hidden" name="action" value="git_undo">
                        <div style="display: flex; gap: 0.5rem; margin-bottom: 0.65rem;">
                            <select name="undo_steps" class="form-select" style="margin-bottom: 0; flex: 1;">
                                <option value="1">Undo 1 Commit Terakhir (HEAD~1)</option>
                                <option value="2">Undo 2 Commit Terakhir (HEAD~2)</option>
                                <option value="3">Undo 3 Commit Terakhir (HEAD~3)</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-amber-outline" style="width: 100%;" onclick="confirmAction('formGitUndo', 'Konfirmasi Undo Commit', 'Apakah Anda yakin ingin melakukan rollback commit ke belakang? Pastikan tidak ada pekerjaan yang hilang.')">
                            ↩️ Eksekusi Undo Commit
                        </button>
                    </form>
                </div>
            </div>

            <!-- 4. DATABASE MIGRATE -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon sky">🗄️</div>
                        <div>
                            <div class="action-card-title">Database Migrate</div>
                            <div class="action-card-desc">Jalankan file migrasi baru ke MariaDB (<code>php artisan migrate --force</code>).</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <div style="display: flex; gap: 0.5rem;">
                        <form method="POST" action="" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                            <input type="hidden" name="action" value="db_migrate">
                            <button type="submit" class="btn btn-sky-outline" style="width: 100%;">
                                ⚡ Run Migrate
                            </button>
                        </form>
                        <form method="POST" action="" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                            <input type="hidden" name="action" value="db_migrate_status">
                            <button type="submit" class="btn btn-outline" style="width: 100%;">
                                📋 Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 5. DATABASE SEEDER -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon emerald">🌱</div>
                        <div>
                            <div class="action-card-title">Database Seeder</div>
                            <div class="action-card-desc">Isi data awal atau mock ke basis data. Pilih seeder spesifik atau jalankan semua.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <form id="formDbSeed" method="POST" action="">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                        <input type="hidden" name="action" value="db_seed">
                        <select name="seeder_class" class="form-select">
                            <?php foreach ($availableSeeders as $class => $desc): ?>
                                <option value="<?php echo htmlspecialchars($class); ?>"><?php echo htmlspecialchars($desc); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="btn btn-outline" style="width: 100%; border-color: rgba(16, 185, 129, 0.4); color: #34D399;" onclick="confirmAction('formDbSeed', 'Konfirmasi Seeder', 'Menjalankan seeder akan menginput record data ke database. Lanjutkan?')">
                            🌱 Eksekusi Seeder
                        </button>
                    </form>
                </div>
            </div>

            <!-- 6. REFRESH / BUAT ULANG DATABASE (migrate:fresh) -->
            <div class="action-card" style="border-color: rgba(225, 29, 72, 0.25);">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon" style="background: rgba(225, 29, 72, 0.15); color: #FB7185;">♻️</div>
                        <div>
                            <div class="action-card-title" style="color: #FDA4AF;">Refresh / Buat Ulang Database</div>
                            <div class="action-card-desc">Hapus seluruh tabel dan susun ulang struktur basis data dari awal (<code>php artisan migrate:fresh --force</code>). Dilengkapi opsi pengisian seeder data baru otomatis.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <form id="formDbFresh" method="POST" action="">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                        <input type="hidden" name="action" value="db_fresh">
                        <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.8125rem; color: #E2E8F0; cursor: pointer; margin-bottom: 0.65rem; user-select: none;">
                            <input type="checkbox" name="with_seed" value="1" checked style="accent-color: var(--tbsm-red); width: 16px; height: 16px;">
                            <span>Isi ulang seluruh data seeder baru (<code>--seed</code>)</span>
                        </label>
                        <button type="button" class="btn btn-danger-outline" style="width: 100%; border-color: rgba(225, 29, 72, 0.4); color: #FB7185;" onclick="confirmAction('formDbFresh', 'Konfirmasi Reset Total Database', 'PERINGATAN KERAS: Aksi ini akan MENGHAPUS SEMUA TABEL di database dan menyusunnya kembali dari awal (artisan migrate:fresh). Jika opsi seeder dicentang, seluruh data awal baru akan diisi ulang. Apakah Anda yakin?')">
                            🔥 Reset &amp; Buat Ulang Database
                        </button>
                    </form>
                </div>
            </div>

            <!-- 7. ROLLBACK MIGRASI -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon amber">🔄</div>
                        <div>
                            <div class="action-card-title">Rollback Migrasi Database</div>
                            <div class="action-card-desc">Membatalkan migrasi tabel database sebelumnya (<code>migrate:rollback --step=1</code>).</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <form id="formMigrateRollback" method="POST" action="">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                        <input type="hidden" name="action" value="db_migrate_rollback">
                        <input type="hidden" name="rollback_step" value="1">
                        <button type="button" class="btn btn-danger-outline" style="width: 100%;" onclick="confirmAction('formMigrateRollback', 'Konfirmasi Rollback Migrasi', 'PERINGATAN: Rollback migrasi dapat menghapus tabel atau kolom database. Lanjutkan rollback 1 step?')">
                            ⚠️ Rollback 1 Batch Migrasi
                        </button>
                    </form>
                </div>
            </div>

            <!-- 7. BERSIHKAN & OPTIMASI CACHE -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon">🧹</div>
                        <div>
                            <div class="action-card-title">Manajemen Cache Laravel</div>
                            <div class="action-card-desc">Bersihkan cache tampilan, rute, config, dan lakukan cache warmup untuk kecepatan produksi.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <div style="display: flex; gap: 0.5rem;">
                        <form method="POST" action="" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                            <input type="hidden" name="action" value="cache_clear">
                            <button type="submit" class="btn btn-outline" style="width: 100%;">
                                🧹 Clear Cache
                            </button>
                        </form>
                        <form method="POST" action="" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                            <input type="hidden" name="action" value="cache_optimize">
                            <button type="submit" class="btn btn-outline" style="width: 100%; color: var(--tbsm-red); border-color: rgba(220, 38, 38, 0.4);">
                                🚀 Warmup Cache
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 8. STORAGE LINK & MAINTENANCE -->
            <div class="action-card">
                <div>
                    <div class="action-card-header">
                        <div class="action-icon sky">🔗</div>
                        <div>
                            <div class="action-card-title">Storage Izin Upload & Maintenance</div>
                            <div class="action-card-desc">Buat folder foto, perbaiki izin tulis (chmod) storage upload, atau mode perbaikan.</div>
                        </div>
                    </div>
                </div>
                <div class="action-card-form">
                    <div style="display: flex; gap: 0.5rem;">
                        <form method="POST" action="" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                            <input type="hidden" name="action" value="storage_fix_permissions">
                            <button type="submit" class="btn btn-outline" style="width: 100%;">
                                📁 Fix Izin & Folder Storage
                            </button>
                        </form>
                        <form method="POST" action="" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
                            <input type="hidden" name="action" value="maintenance_toggle">
                            <button type="submit" class="btn <?php echo $isDown ? 'btn-primary' : 'btn-amber-outline'; ?>" style="width: 100%;">
                                <?php echo $isDown ? '🟢 Buka Web (UP)' : '🚧 Matikan (DOWN)'; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PANEL RIWAYAT COMMIT TERAKHIR -->
    <div class="workspace-panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">
                    <span>📜</span> Riwayat Commit Git Terbaru di Server
                </div>
                <div class="panel-desc">
                    Catatan 6 commit terakhir yang tersinkronisasi di server hosting.
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table class="commit-table">
                <thead>
                    <tr>
                        <th style="width: 90px;">Hash</th>
                        <th style="width: 140px;">Author</th>
                        <th style="width: 120px;">Waktu</th>
                        <th>Pesan Commit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($gitRecentLogs)): ?>
                        <?php foreach ($gitRecentLogs as $idx => $c): ?>
                            <tr>
                                <td class="commit-hash">
                                    #<?php echo htmlspecialchars($c['hash']); ?>
                                    <?php if ($idx === 0): ?>
                                        <span class="badge badge-emerald" style="font-size: 0.55rem; padding: 0.05rem 0.35rem; margin-left: 0.2rem;">HEAD</span>
                                    <?php endif; ?>
                                </td>
                                <td style="color: var(--tbsm-muted);"><?php echo htmlspecialchars($c['author']); ?></td>
                                <td style="color: var(--tbsm-muted-dark);"><?php echo htmlspecialchars($c['date']); ?></td>
                                <td style="font-weight: 500; color: #FFFFFF;"><?php echo htmlspecialchars($c['msg']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--tbsm-muted); padding: 1.5rem;">Tidak dapat membaca riwayat commit git.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer-note">
        DevOps Terminal & Git Deployment Utility — Konsentrasi Keahlian TBSM SMK Negeri 1 Bangsri.<br>
        Binaan Resmi PT Astra Honda Motor. File ini dilindungi kunci keamanan server.
    </div>

</div>

<!-- Modal Konfirmasi Dialog -->
<div id="confirmModal" class="modal-overlay">
    <div class="modal-box">
        <div id="modalTitle" class="modal-title">Konfirmasi Aksi</div>
        <div id="modalBody" class="modal-body">Apakah Anda yakin ingin menjalankan aksi ini?</div>
        <div class="modal-actions">
            <button type="button" onclick="closeConfirmModal()" class="btn btn-outline">Batal</button>
            <button type="button" id="modalConfirmBtn" class="btn btn-primary">Lanjutkan Aksi</button>
        </div>
    </div>
</div>

<script>
var targetFormId = null;

function confirmAction(formId, title, message) {
    targetFormId = formId;
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalBody').innerText = message;
    document.getElementById('confirmModal').style.display = 'flex';
}

function closeConfirmModal() {
    document.getElementById('confirmModal').style.display = 'none';
    targetFormId = null;
}

document.getElementById('modalConfirmBtn').addEventListener('click', function() {
    if (targetFormId) {
        var form = document.getElementById(targetFormId);
        if (form) {
            closeConfirmModal();
            form.submit();
        }
    }
});

function copyConsoleOutput() {
    var text = document.getElementById('consoleOutputArea').innerText;
    navigator.clipboard.writeText(text).then(function() {
        alert('Log output berhasil disalin ke clipboard!');
    });
}
</script>

<?php endif; ?>

</body>
</html>
