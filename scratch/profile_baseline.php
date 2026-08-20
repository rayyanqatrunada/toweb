<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap(); // Bootstrap facades and providers!

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

foreach ($routesToTest as $uri) {
    DB::flushQueryLog();
    DB::enableQueryLog();

    $request = Request::create($uri, 'GET');

    $startTime = microtime(true);
    $response = $kernel->handle($request);
    $endTime = microtime(true);

    $queries = DB::getQueryLog();
    
    $totalTime = round(($endTime - $startTime) * 1000, 2);
    $queryTime = round(array_sum(array_column($queries, 'time')), 2);
    $queryCount = count($queries);
    
    $responseSize = strlen($response->getContent());

    $results[] = [
        'uri' => $uri,
        'status' => $response->getStatusCode(),
        'total_time_ms' => $totalTime,
        'query_count' => $queryCount,
        'query_time_ms' => $queryTime,
        'response_size_kb' => round($responseSize / 1024, 2),
        'queries' => $queries
    ];
    
    $kernel->terminate($request, $response);
}

// Generate report
$report = "PHASE P0 - PERFORMANCE BASELINE (LOCAL)\n\n";
$report .= sprintf("%-25s | %-6s | %-12s | %-12s | %-12s | %-12s\n", "URI", "Status", "Time (ms)", "Query Count", "Query Time", "Size (KB)");
$report .= str_repeat("-", 90) . "\n";

foreach ($results as $res) {
    $report .= sprintf("%-25s | %-6s | %-12s | %-12s | %-12s | %-12s\n", 
        $res['uri'], 
        $res['status'], 
        $res['total_time_ms'], 
        $res['query_count'], 
        $res['query_time_ms'],
        $res['response_size_kb']
    );
}

$report .= "\n\nDETAILED QUERY LOG FOR LARGEST QUERY COUNTS\n";
usort($results, fn($a, $b) => $b['query_count'] <=> $a['query_count']);

for ($i=0; $i<min(5, count($results)); $i++) {
    $res = $results[$i];
    $report .= "\n=============================================\n";
    $report .= "URI: {$res['uri']} (Status: {$res['status']})\n";
    $report .= "Total Queries: {$res['query_count']}\n";
    
    $queryStrings = array_map(fn($q) => $q['query'], $res['queries']);
    $queryCounts = array_count_values($queryStrings);
    arsort($queryCounts);
    
    $report .= "Most Frequent Queries (Potential N+1):\n";
    $count = 0;
    foreach ($queryCounts as $query => $times) {
        if ($times > 1) {
            $report .= "- [x{$times}] {$query}\n";
            $count++;
        }
    }
    if ($count == 0) {
        $report .= "- No duplicate queries found.\n";
    }
}

file_put_contents(__DIR__ . '/p0_report.txt', $report);
echo "Report generated at scratch/p0_report.txt\n";
