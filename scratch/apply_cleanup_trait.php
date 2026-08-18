<?php

$models = [
    'Achievement' => 'photo',
    'Alumni' => 'photo',
    'Announcement' => 'file_attachment',
    'Download' => 'file_path',
    'GalleryItem' => 'file_path',
    'IndustryPartner' => 'logo',
    'Post' => 'thumbnail',
    'Program' => 'thumbnail',
    'Teacher' => 'photo',
];

foreach ($models as $model => $field) {
    $path = __DIR__ . "/../app/Models/{$model}.php";
    if (!file_exists($path)) {
        echo "Missing $path\n";
        continue;
    }
    $content = file_get_contents($path);

    // Remove existing Download's explicit deleted hook if present to avoid conflicts
    if ($model === 'Download' && strpos($content, 'static::deleted(function ($download)') !== false) {
        $content = preg_replace('/static::deleted\(function \(\$download\) \{.*?\n\s+\}\);/s', '// Removed old deleted hook', $content);
    }

    if (strpos($content, 'use App\Traits\CleansUpFiles;') === false) {
        // Insert trait use
        $content = preg_replace('/class '.$model.' extends Model\s*\{/', "class $model extends Model\n{\n    use \\App\\Traits\\CleansUpFiles;", $content);
        
        // Insert getFileFields method
        $method = "\n    public function getFileFields(): array\n    {\n        return ['$field'];\n    }\n";
        
        // Add before last closing brace
        $pos = strrpos($content, '}');
        if ($pos !== false) {
            $content = substr_replace($content, $method . "}\n", $pos, 1);
        }

        file_put_contents($path, $content);
        echo "Updated $model\n";
    } else {
        echo "Skipped $model\n";
    }
}
