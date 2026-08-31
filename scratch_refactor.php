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
    
    if (str_contains($content, 'Group::make()')) continue;
    
    // Add use statement
    if (!str_contains($content, 'use Filament\Schemas\Components\Group;')) {
        $content = str_replace(
            "use Filament\Schemas\Components\Section;",
            "use Filament\Schemas\Components\Group;\nuse Filament\Schemas\Components\Section;",
            $content
        );
    }
    
    // 1. Wrap the start of components
    $content = str_replace(
        "->components([",
        "->components([\n                Group::make()\n                    ->schema([",
        $content
    );
    
    // 2. Find the first sidebar section and close the first group, then open the second
    $sidebarSections = [
        "Section::make('Media')",
        "Section::make('Publishing')",
        "Section::make('SEO')",
        "Section::make('Image')"
    ];
    
    $sidebarStartFound = false;
    foreach ($sidebarSections as $section) {
        if (str_contains($content, $section) && !$sidebarStartFound) {
            $content = str_replace(
                $section,
                "                    ])->columnSpan(['lg' => 2]),\n\n                Group::make()\n                    ->schema([\n                        " . $section,
                $content
            );
            $sidebarStartFound = true;
        }
    }
    
    if ($sidebarStartFound) {
        // 3. Close the second group and add ->columns(3)
        // Find the last "]);" or similar before "    }\n}"
        $content = preg_replace(
            "/\n            \]\);\n    \}\n\}/s",
            "\n                    ])->columnSpan(['lg' => 1]),\n            ])->columns(3);\n    }\n}",
            $content
        );
        file_put_contents($file, $content);
        echo "Refactored: $file\n";
    } else {
        // If no sidebar section found, just close the first group and make it full width or undo
        // Actually, just undo the first step if no sidebar section found
        $content = str_replace(
            "->components([\n                Group::make()\n                    ->schema([",
            "->components([",
            $content
        );
        file_put_contents($file, $content);
        echo "Skipped (No sidebar sections): $file\n";
    }
}
