<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$models = [
    'Setting' => [\App\Models\Setting::class, 14],
    'Program' => [\App\Models\Program::class, 3],
    'Competency' => [\App\Models\Competency::class, 12],
    'Teacher' => [\App\Models\Teacher::class, 6],
    'Facility' => [\App\Models\Facility::class, 8],
    'IndustryPartner' => [\App\Models\IndustryPartner::class, 5],
    'Partnership' => [\App\Models\Partnership::class, 4],
    'Internship' => [\App\Models\Internship::class, 5],
    'JobVacancy' => [\App\Models\JobVacancy::class, 5],
    'Category' => [\App\Models\Category::class, 5],
    'Tag' => [\App\Models\Tag::class, 6],
    'Post' => [\App\Models\Post::class, 8],
    'Announcement' => [\App\Models\Announcement::class, 5],
    'Achievement' => [\App\Models\Achievement::class, 6],
    'GalleryAlbum' => [\App\Models\GalleryAlbum::class, 5],
    'GalleryItem' => [\App\Models\GalleryItem::class, 30],
    'Alumni' => [\App\Models\Alumni::class, 10],
    'DownloadCategory' => [\App\Models\DownloadCategory::class, 4],
    'Download' => [\App\Models\Download::class, 8],
];

echo str_pad("MODEL", 25) . " | " . str_pad("COUNT", 10) . " | STATUS\n";
echo str_repeat("-", 55) . "\n";

foreach ($models as $name => $data) {
    $class = $data[0];
    $expected = $data[1];
    
    if (!class_exists($class)) {
        echo str_pad($name, 25) . " | " . str_pad("ERROR", 10) . " | FAIL\n";
        continue;
    }
    
    try {
        $count = $class::count();
        $status = ($count >= $expected) ? "PASS" : "FAIL (Expected $expected)";
        echo str_pad($name, 25) . " | " . str_pad($count, 10) . " | $status\n";
    } catch (\Exception $e) {
        echo str_pad($name, 25) . " | " . str_pad("ERROR", 10) . " | FAIL\n";
    }
}
