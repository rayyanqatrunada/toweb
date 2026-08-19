<?php
$commands = [
    'php artisan migrate:status',
    'php artisan db:seed --force',
    'php artisan db:seed --force', // testing idempotency
    'php artisan test',
    'php artisan optimize:clear',
    'php artisan view:cache',
    'php artisan route:cache',
    'php artisan about',
    'php artisan route:list',
    'npm run build',
    'php scratch/verify_seed_data.php'
];

$output = '';
foreach ($commands as $cmd) {
    echo "Executing: $cmd\n";
    $output .= ">>> Executing: $cmd\n";
    $result = shell_exec($cmd . ' 2>&1');
    $output .= $result . "\n\n";
}

file_put_contents('scratch/phase_j1_checks.txt', $output);
echo "Completed!\n";
