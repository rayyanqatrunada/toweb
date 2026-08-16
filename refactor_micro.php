<?php
$files = glob('resources/views/frontend/**/*.blade.php', GLOB_BRACE);
$files = array_merge($files, glob('resources/views/frontend/*.blade.php'));
foreach($files as $file) {
    if (is_file($file)) {
        $content = file_get_contents($file);
        
        // Find links with arrow and group
        // If they have inline SVG arrow, add group-hover:translate-x-1 transition-transform
        $content = str_replace('class="w-4 h-4 ml-2"', 'class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"', $content);
        $content = str_replace('class="ml-2 w-4 h-4"', 'class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform"', $content);
        $content = str_replace('class="w-5 h-5 ml-2"', 'class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"', $content);
        
        file_put_contents($file, $content);
    }
}
echo "Updated micro interactions\n";
