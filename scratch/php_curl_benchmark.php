<?php
$routes = [
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

exec('php artisan cache:clear');
exec('php artisan view:clear');

function curl_request($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $start = microtime(true);
    $response = curl_exec($ch);
    $end = microtime(true);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [
        'time_ms' => round(($end - $start) * 1000, 2),
        'status' => $status,
    ];
}

foreach ($routes as $route) {
    $url = "http://127.0.0.1:8000" . $route;
    
    // Cold Run
    $cold = curl_request($url);
    
    // Warm Run
    $warm = curl_request($url);
    
    $results[] = [
        'route' => $route,
        'cold_ms' => $cold['time_ms'],
        'warm_ms' => $warm['time_ms'],
        'status' => $cold['status']
    ];
}

file_put_contents(__DIR__.'/../docs/p1-after-performance.json', json_encode($results, JSON_PRETTY_PRINT));

$md = "# P1 AFTER PERFORMANCE\n\n";
$md .= "| Route | Cold ms | Warm ms | Status |\n";
$md .= "|---|---:|---:|---:|\n";

foreach ($results as $res) {
    $md .= "| {$res['route']} | {$res['cold_ms']} | {$res['warm_ms']} | {$res['status']} |\n";
}

file_put_contents(__DIR__.'/../docs/p1-after-performance.md', $md);
echo "Benchmark completed.\n";
