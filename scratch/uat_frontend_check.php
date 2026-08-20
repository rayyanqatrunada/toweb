<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$routes = [
    '/' => 'TOWEB',
    '/tentang' => 'Sejarah',
    '/akademik/program' => 'Program Keahlian',
    '/akademik/guru' => 'Tenaga Pendidik',
    '/akademik/fasilitas' => 'Fasilitas',
    '/berita' => 'Berita',
    '/pengumuman' => 'Pengumuman',
    '/prestasi' => 'Prestasi',
    '/galeri' => 'Galeri',
    '/pkl' => 'Praktik Kerja',
    '/lowongan' => 'Lowongan',
    '/alumni' => 'Alumni',
    '/unduhan' => 'Unduhan',
];

echo "Starting Frontend UAT...\n";
echo str_pad("ROUTE", 25) . " | " . str_pad("STATUS", 6) . " | " . str_pad("DATA/RENDER", 15) . " | ERRORS\n";
echo str_repeat("-", 80) . "\n";

foreach ($routes as $uri => $expectedText) {
    $request = Illuminate\Http\Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    $exceptionOutput = '';
    if ($response->exception) {
        $exceptionOutput = $response->exception->getMessage();
    }
    
    $dataOk = str_contains($content, $expectedText) ? 'PASS' : 'FAIL';
    
    $errors = [];
    if (str_contains($content, 'Exception')) $errors[] = 'Exception';
    if (str_contains($content, 'Undefined variable')) $errors[] = 'UndefVar';
    if (preg_match('/<img[^>]+src=["\'][\s]*["\']/i', $content)) $errors[] = 'EmptyImageSrc';
    
    $errorStr = empty($errors) ? 'NONE' : implode(',', $errors);
    
    echo str_pad($uri, 25) . " | " . str_pad($status, 6) . " | " . str_pad($dataOk, 15) . " | " . $errorStr . " | " . $exceptionOutput . "\n";
    $kernel->terminate($request, $response);
}

// Check some detail pages
$detailRoutes = [
    '/berita' => \App\Models\Post::first(),
    '/pengumuman' => \App\Models\Announcement::first(),
    '/prestasi' => \App\Models\Achievement::first(),
    '/pkl' => \App\Models\Internship::first(),
    '/lowongan' => \App\Models\JobVacancy::first(),
];

echo "\nChecking Detail Pages...\n";
foreach ($detailRoutes as $prefix => $model) {
    if (!$model) continue;
    $uri = $prefix . '/' . $model->slug;
    $request = Illuminate\Http\Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    $exceptionOutput = '';
    if ($response->exception) {
        $exceptionOutput = $response->exception->getMessage();
    }
    
    $dataOk = str_contains($content, $model->title ?? '') ? 'PASS' : 'FAIL';
    echo str_pad($uri, 40) . " | " . str_pad($status, 6) . " | " . str_pad($dataOk, 15) . " | " . $exceptionOutput . "\n";
    $kernel->terminate($request, $response);
}

echo "Done.\n";
