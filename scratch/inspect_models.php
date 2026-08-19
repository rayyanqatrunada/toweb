<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$models = glob(app_path('Models/*.php'));
foreach ($models as $modelPath) {
    $modelName = basename($modelPath, '.php');
    $className = "\\App\\Models\\$modelName";
    
    if (class_exists($className)) {
        echo "=== $modelName ===\n";
        $model = new $className;
        echo "Fillable: " . implode(', ', $model->getFillable()) . "\n";
        
        $casts = $model->getCasts();
        $castStrings = [];
        foreach ($casts as $key => $type) {
            $castStrings[] = "$key => " . (is_string($type) ? $type : get_class($type));
        }
        echo "Casts: " . implode(', ', $castStrings) . "\n\n";
    }
}
