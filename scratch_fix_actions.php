<?php

$dir = __DIR__ . '/app/Filament/Resources/';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$files = [];
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $files[] = $file->getPathname();
    }
}

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    $modified = false;
    
    // Replace Tables\Actions\ with \Filament\Actions\
    if (str_contains($content, 'Tables\Actions\\')) {
        $content = str_replace('Tables\Actions\\', '\Filament\Actions\\', $content);
        $modified = true;
    }
    
    // Replace \Filament\Tables\Actions\ with \Filament\Actions\
    if (str_contains($content, '\Filament\Tables\Actions\\')) {
        $content = str_replace('\Filament\Tables\Actions\\', '\Filament\Actions\\', $content);
        $modified = true;
    }
    
    // In case of use Filament\Tables\Actions\...
    if (str_contains($content, 'use Filament\Tables\Actions\\')) {
        $content = str_replace('use Filament\Tables\Actions\\', 'use Filament\Actions\\', $content);
        $modified = true;
    }

    if ($modified) {
        file_put_contents($file, $content);
        echo "Fixed Actions in: $file\n";
    }
}
