<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$models = [
    'Setting' => \App\Models\Setting::class,
    'Program' => \App\Models\Program::class,
    'Competency' => \App\Models\Competency::class,
    'Teacher' => \App\Models\Teacher::class,
    'Facility' => \App\Models\Facility::class,
    'IndustryPartner' => \App\Models\IndustryPartner::class,
    'Partnership' => \App\Models\Partnership::class,
    'Internship' => \App\Models\Internship::class,
    'JobVacancy' => \App\Models\JobVacancy::class,
    'Category' => \App\Models\Category::class,
    'Tag' => \App\Models\Tag::class,
    'Post' => \App\Models\Post::class,
    'Announcement' => \App\Models\Announcement::class,
    'Achievement' => \App\Models\Achievement::class,
    'GalleryAlbum' => \App\Models\GalleryAlbum::class,
    'GalleryItem' => \App\Models\GalleryItem::class,
    'Alumni' => \App\Models\Alumni::class,
    'DownloadCategory' => \App\Models\DownloadCategory::class,
    'Download' => \App\Models\Download::class,
];

echo "=== PHASE K1: DATA VALIDATION ===\n";
foreach ($models as $name => $class) {
    if (!class_exists($class)) {
        echo "$name: MODEL MISSING\n";
        continue;
    }
    
    try {
        $count = $class::count();
        echo "$name: $count records\n";
    } catch (\Exception $e) {
        echo "$name: ERROR " . $e->getMessage() . "\n";
    }
}

// Special checks
echo "\n--- SPECIAL CHECKS ---\n";
echo "Active Teachers: " . \App\Models\Teacher::where('is_active', true)->count() . "\n";
echo "Head of Departments: " . \App\Models\Teacher::where('is_head_of_department', true)->count() . "\n";
echo "Published Posts: " . \App\Models\Post::where('status', 'published')->count() . "\n";
echo "Published Albums: " . \App\Models\GalleryAlbum::where('status', 'published')->count() . "\n";

