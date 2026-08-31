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
    
    // Only target files that have the raw components format (no Group::make, no Section::make)
    if (!str_contains($content, 'Group::make()') && !str_contains($content, 'Section::make(')) {
        
        $content = str_replace(
            "->components([",
            "->components([\n                \Filament\Schemas\Components\Section::make('Informasi Utama')\n                    ->schema([",
            $content
        );
        
        $content = preg_replace(
            "/\]\)->columns\(\d+\);\n    \}\n\}/s",
            "                    ])->columns(2),\n            ]);\n    }\n}",
            $content
        );
        
        // If the regex didn't match because ->columns(2) is missing or slightly different
        if (str_contains($content, "])->columns(2);")) {
             // Handled by regex
        } else {
             $content = preg_replace(
                "/\]\);\n    \}\n\}/s",
                "                    ])->columns(2),\n            ]);\n    }\n}",
                $content
            );
        }
        
        file_put_contents($file, $content);
        echo "Wrapped in Section: $file\n";
    }
}
