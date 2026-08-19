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

echo str_pad("MODEL", 25) . "COUNT\n";
echo str_repeat("-", 35) . "\n";

$pass = true;

foreach ($models as $name => $class) {
    if (!class_exists($class)) {
        echo str_pad($name, 25) . "MISSING CLASS\n";
        $pass = false;
        continue;
    }
    
    try {
        $count = $class::count();
        echo str_pad($name, 25) . $count . "\n";
        if ($count === 0 && $name !== 'Event') { // Just to be safe, no models should be 0
            echo "WARNING: Model $name has 0 records!\n";
            $pass = false;
        }
    } catch (\Exception $e) {
        echo str_pad($name, 25) . "ERROR\n";
        $pass = false;
    }
}

echo "\n--- RELATIONSHIP VERIFICATIONS ---\n";

// Check orphan posts (missing category)
if (\App\Models\Post::whereNull('category_id')->count() > 0) {
    echo "FAIL: Found orphan Posts without category.\n";
    $pass = false;
}

// Check competencies missing program
if (\App\Models\Competency::whereNull('program_id')->count() > 0) {
    echo "FAIL: Found Competencies without program.\n";
    $pass = false;
}

// Check items missing album
if (\App\Models\GalleryItem::whereNull('gallery_album_id')->count() > 0) {
    echo "FAIL: Found GalleryItems without album.\n";
    $pass = false;
}

// Ensure there is exactly 1 head of department
$hodCount = \App\Models\Teacher::where('is_head_of_department', true)->count();
if ($hodCount !== 1) {
    echo "FAIL: Found $hodCount Head of Departments, expected 1.\n";
    $pass = false;
}

echo "\nFINAL STATUS: " . ($pass ? "PASS" : "FAIL") . "\n";
