<?php

$dir = __DIR__ . '/app/Filament/Resources/';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$files = [];
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), 'Form.php')) {
        $files[] = $file->getPathname();
    }
}

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    if (str_contains($content, '])->columns(2),') && str_contains($content, '])->columns(2),') ) {
        // Fix the double ])->columns(2)
        $content = preg_replace(
            "/\]\)->columns\(2\),\n\s+\]\)->columns\(2\),/s",
            "])->columns(2),",
            $content
        );
        file_put_contents($file, $content);
        echo "Fixed: $file\n";
    }
}
