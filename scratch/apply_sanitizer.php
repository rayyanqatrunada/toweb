<?php

$dir = __DIR__ . '/../resources/views/frontend';

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getPathname();
        $content = file_get_contents($path);

        // Replace {!! $x !!} with <x-frontend.html :content="$x" />
        // But ignore cases containing 'strip_tags' or 'nl2br(e' because they are already safe
        
        $newContent = preg_replace_callback('/\{!!\s*(.*?)\s*!!\}/s', function ($matches) {
            $inner = $matches[1];
            if (strpos($inner, 'strip_tags(') !== false || strpos($inner, 'nl2br(e') !== false) {
                return $matches[0];
            }
            
            // Escape double quotes inside the expression if we put it inside attribute?
            // Actually, in Blade, you can do :content="$settings->get('key', 'default')"
            // It just parses it as PHP.
            // Wait, if it has double quotes, like: :content="$settings->get(\"key\")", then <x-frontend.html :content="... " /> might break.
            // Let's use single quotes for the attribute if the inner string has double quotes.
            // But it's easier to just use {!! \App\Support\HtmlSanitizer::clean($inner) !!} inline!!
            
            return '{!! \App\Support\HtmlSanitizer::clean(' . $inner . ') !!}';

        }, $content);

        if ($content !== $newContent) {
            file_put_contents($path, $newContent);
            echo "Updated $path\n";
        }
    }
}
