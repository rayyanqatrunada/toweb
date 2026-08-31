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
    
    // If it was skipped by the previous script (meaning it has no sidebar sections like 'Media' and wasn't refactored to Group::make)
    if (!str_contains($content, 'Group::make()')) {
        // Just append ->columns(2) to the end of ->components([...]) if it doesn't already have it
        if (!preg_match('/\]\)->columns\(\d+\);/', $content)) {
            $content = preg_replace(
                "/\]\);\n    \}\n\}/s",
                "])->columns(2);\n    }\n}",
                $content
            );
            file_put_contents($file, $content);
            echo "Added ->columns(2) to: $file\n";
        }
    }
}
