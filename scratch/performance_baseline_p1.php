<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

$routesToTest = [
    '/',
    '/tentang',
    '/akademik/program',
    '/akademik/guru',
    '/akademik/fasilitas',
    '/berita',
    '/prestasi',
    '/mitra-industri',
    '/alumni',
    '/galeri',
    '/pkl',
    '/lowongan',
    '/unduhan'
];

$results = [];

function measureRoute($kernel, $uri) {
    DB::flushQueryLog();
    DB::enableQueryLog();
    
    $request = Request::create($uri, 'GET');
    
    $startTime = microtime(true);
    $memoryBefore = memory_get_usage();
    
    $response = $kernel->handle($request);
    
    $memoryAfter = memory_get_usage();
    $endTime = microtime(true);
    
    $queries = DB::getQueryLog();
    $kernel->terminate($request, $response);
    
    return [
        'time_ms' => round(($endTime - $startTime) * 1000, 2),
        'queries' => count($queries),
        'query_time_ms' => round(array_sum(array_column($queries, 'time')), 2),
        'memory_mb' => round(($memoryAfter - $memoryBefore) / 1024 / 1024, 2),
        'status' => $response->getStatusCode()
    ];
}

foreach ($routesToTest as $uri) {
    // COLD RUN
    Cache::flush();
    $cold = measureRoute($kernel, $uri);
    
    // WARM RUN
    $warm = measureRoute($kernel, $uri);
    
    $results[] = [
        'route' => $uri,
        'cold_ms' => $cold['time_ms'],
        'warm_ms' => $warm['time_ms'],
        'cold_queries' => $cold['queries'],
        'warm_queries' => $warm['queries'],
        'cold_memory_mb' => $cold['memory_mb'],
        'warm_memory_mb' => $warm['memory_mb'],
        'status' => $cold['status']
    ];
}

// Generate JSON
file_put_contents(__DIR__ . '/../docs/p1-before-performance.json', json_encode($results, JSON_PRETTY_PRINT));

// Generate Markdown
$md = "# P1 BEFORE PERFORMANCE\n\n";
$md .= "| Route | Cold ms | Warm ms | Cold Queries | Warm Queries | Cold Memory (MB) | Warm Memory (MB) | Status |\n";
$md .= "|---|---:|---:|---:|---:|---:|---:|---:|\n";

foreach ($results as $res) {
    $md .= "| {$res['route']} | {$res['cold_ms']} | {$res['warm_ms']} | {$res['cold_queries']} | {$res['warm_queries']} | {$res['cold_memory_mb']} | {$res['warm_memory_mb']} | {$res['status']} |\n";
}

file_put_contents(__DIR__ . '/../docs/p1-before-performance.md', $md);

echo "Baseline created successfully.\n";
