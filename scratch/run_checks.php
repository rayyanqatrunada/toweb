<?php

$commands = [
    'php artisan test',
    'php artisan optimize:clear',
    'php artisan config:cache',
    'php artisan route:cache',
    'php artisan event:cache',
    'npm run build',
    'php artisan migrate:status',
    'php artisan about',
];

$output = '';
foreach ($commands as $cmd) {
    $output .= ">>> Executing: $cmd\n";
    $result = shell_exec($cmd . ' 2>&1');
    $output .= $result . "\n\n";
}

file_put_contents('scratch/phase_i_production_check.txt', $output);
echo "Checks completed and saved to scratch/phase_i_production_check.txt";
