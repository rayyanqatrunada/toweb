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
    
    if (str_contains($content, "Section::make('Informasi Utama')")) {
        if (!str_contains($content, "->columnSpanFull()")) {
            // Replace both with and without comma
            $content = str_replace(
                "])->columns(2),\n            ]);",
                "])->columns(2)->columnSpanFull(),\n            ]);",
                $content
            );
            $content = str_replace(
                "])->columns(2)\n            ]);",
                "])->columns(2)->columnSpanFull()\n            ]);",
                $content
            );
            $content = str_replace(
                "])->columns(2),\n                                ])->columns(2),", // this one is wrong, just look for the end
                "])->columns(2)->columnSpanFull(),",
                $content
            );
            
            // The most robust way is just:
            $content = preg_replace('/\]\)->columns\(2\),?\n\s*\]\);\n\s*\}\n\}/', "])->columns(2)->columnSpanFull(),\n            ]);\n    }\n}", $content);
            
            file_put_contents($file, $content);
            echo "Added columnSpanFull: $file\n";
        }
    }
}
