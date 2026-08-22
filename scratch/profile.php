<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$queries = [];
$dbTime = 0;
\Illuminate\Support\Facades\DB::listen(function ($query) use (&$queries, &$dbTime) {
    $dbTime += $query->time;
    $queries[] = $query->sql;
});

$s4 = microtime(true);
$request = Illuminate\Http\Request::create('/', 'GET');
$response = $kernel->handle($request);
$s5 = microtime(true);

echo "Handle time: " . (($s5 - $s4) * 1000) . " ms\n";
echo "DB Queries Count: " . count($queries) . "\n";
echo "DB Queries Time: " . $dbTime . " ms\n";

foreach (array_count_values($queries) as $sql => $count) {
    if ($count > 1) {
        echo "Duplicate ($count times): $sql\n";
    }
}

$kernel->terminate($request, $response);
