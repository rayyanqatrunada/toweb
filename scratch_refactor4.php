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
    
    // We only want to target the ones that have "\Filament\Schemas\Components\Section::make('Informasi Utama')"
    if (str_contains($content, "Section::make('Informasi Utama')")) {
        // If it doesn't already have columnSpanFull
        if (!str_contains($content, "->columnSpanFull()")) {
            // Find the ending of that section, which is currently "])->columns(2),"
            // We want to replace it with "])->columns(2)->columnSpanFull(),"
            
            // Note: The previous script replaced the ending with "])->columns(2),\n            ]);"
            // Let's just do a string replace for "])->columns(2)," to "])->columns(2)->columnSpanFull(),"
            // Only if it's right before the closing "]);"
            
            $content = preg_replace(
                "/\]\)->columns\(2\),\n\s*\]\);\n\s*\}\n\}/s",
                "])->columns(2)->columnSpanFull(),\n            ]);\n    }\n}",
                $content
            );
            
            file_put_contents($file, $content);
            echo "Added columnSpanFull: $file\n";
        }
    }
}
