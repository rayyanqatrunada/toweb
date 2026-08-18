<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

$models = collect(File::files(app_path('Models')))->map(function ($file) {
    return pathinfo($file->getFilename(), PATHINFO_FILENAME);
});

$report = [];

foreach ($models as $model) {
    $class = "\\App\\Models\\{$model}";
    $reflection = new ReflectionClass($class);
    
    // Check if migration exists
    $tableName = (new $class)->getTable();
    $migrationExists = collect(File::files(database_path('migrations')))->contains(function($file) use ($tableName) {
        return Str::contains($file->getFilename(), 'create_'.$tableName.'_table');
    });

    // Check Filament Resource
    $resourceName = $model . 'Resource.php';
    $resourceExists = File::exists(app_path("Filament/Resources/{$resourceName}"));
    
    // Check Policy
    $policyName = $model . 'Policy.php';
    $policyExists = File::exists(app_path("Policies/{$policyName}"));
    
    $report[] = [
        'Model' => $model,
        'Table' => $tableName,
        'Migration' => $migrationExists ? 'Yes' : 'No',
        'Resource' => $resourceExists ? 'Yes' : 'No',
        'Policy' => $policyExists ? 'Yes' : 'No',
    ];
}

echo "=== H1 CORE SYSTEM AUDIT MATRIX ===\n";
echo str_pad("Model", 20) . str_pad("Migration", 12) . str_pad("Policy", 10) . str_pad("Resource", 10) . "\n";
echo str_repeat("-", 52) . "\n";
foreach ($report as $r) {
    echo str_pad($r['Model'], 20) . str_pad($r['Migration'], 12) . str_pad($r['Policy'], 10) . str_pad($r['Resource'], 10) . "\n";
}

// Check Routes
echo "\n=== FRONTEND ROUTES ===\n";
$routes = app('router')->getRoutes();
foreach ($routes as $route) {
    if (Str::startsWith($route->uri(), '_') || Str::startsWith($route->uri(), 'api') || Str::startsWith($route->uri(), 'admin') || Str::startsWith($route->uri(), 'livewire')) {
        continue;
    }
    echo str_pad($route->methods()[0], 6) . " " . str_pad($route->uri(), 30) . " " . $route->getName() . "\n";
}
