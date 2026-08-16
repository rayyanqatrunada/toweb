<?php
$directories = [
    'resources/views/frontend',
    'resources/views/components'
];

function processDir($dir) {
    $files = glob($dir . '/*');
    foreach ($files as $file) {
        if (is_dir($file)) {
            processDir($file);
        } elseif (substr($file, -10) === '.blade.php') {
            processFile($file);
        }
    }
}

function processFile($file) {
    $content = file_get_contents($file);
    $original = $content;

    // We only touch the colors that represent the brand (blue -> red)
    // For hero sections, bg-blue-600 py-16 is a common pattern.
    // Let's first replace all blue with red/slate carefully.

    // 1. Hero background: bg-blue-600 py-* lg:py-* -> bg-slate-900 py-*
    $content = preg_replace('/bg-blue-600(\s+)py-([0-9]+)(\s+)lg:py-([0-9]+)/', 'bg-slate-900$1py-$2$3lg:py-$4', $content);
    $content = preg_replace('/text-blue-100/', 'text-slate-300', $content);
    
    // 2. Buttons, text colors, borders, rings
    $content = str_replace('bg-blue-600', 'bg-red-600', $content);
    $content = str_replace('hover:bg-blue-700', 'hover:bg-red-700', $content);
    $content = str_replace('text-blue-600', 'text-red-600', $content);
    $content = str_replace('hover:text-blue-800', 'hover:text-red-700', $content);
    $content = str_replace('hover:text-blue-400', 'hover:text-red-400', $content);
    $content = str_replace('text-blue-800', 'text-red-800', $content);
    $content = str_replace('bg-blue-50', 'bg-red-50', $content);
    $content = str_replace('hover:bg-blue-50', 'hover:bg-red-50', $content);
    $content = str_replace('bg-blue-100', 'bg-red-100', $content);
    $content = str_replace('hover:border-blue-100', 'hover:border-red-200', $content);
    $content = str_replace('border-blue-200', 'border-red-200', $content);
    $content = str_replace('border-blue-500', 'border-red-500', $content);
    $content = str_replace('focus:ring-blue-500', 'focus:ring-red-500', $content);
    $content = str_replace('focus:border-blue-500', 'focus:border-red-500', $content);

    // Some icons use bg-blue-50 text-blue-600, which now become bg-red-50 text-red-600. That's fine.

    if ($original !== $content) {
        file_put_contents($file, $content);
        echo "Updated: $file\n";
    }
}

foreach ($directories as $dir) {
    processDir($dir);
}
echo "Done.\n";
