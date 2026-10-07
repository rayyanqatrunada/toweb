<?php

namespace App\Console\Commands;

use App\Models\Achievement;
use App\Models\Facility;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use App\Models\Post;
use App\Models\Teacher;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SyncGalleryAssetsCommand extends Command
{
    protected $signature = 'gallery:sync-assets';
    protected $description = 'Sinkronisasi dan pastikan semua file foto database tersedia di storage publik (menghindari 404 pada hosting)';

    public function handle(): int
    {
        $this->info('Memulai sinkronisasi aset foto galeri & website...');
        $generated = 0;
        $existing = 0;

        // 1. Gallery Albums Cover
        $albums = GalleryAlbum::all();
        foreach ($albums as $album) {
            if (!empty($album->thumbnail)) {
                $clean = ltrim(preg_replace('#^storage/#', '', $album->thumbnail), '/');
                if (!Storage::disk('public')->exists($clean) || Storage::disk('public')->size($clean) < 100) {
                    SeedAssetGenerator::generateImageForPath($clean, $album->title, 800, 600, '#dc2626', '#ffffff');
                    $generated++;
                } else {
                    $existing++;
                }
            }
        }

        // 2. Gallery Items
        $items = GalleryItem::with('album')->get();
        foreach ($items as $item) {
            if (!empty($item->file_path)) {
                $clean = ltrim(preg_replace('#^storage/#', '', $item->file_path), '/');
                if (!Storage::disk('public')->exists($clean) || Storage::disk('public')->size($clean) < 100) {
                    $title = $item->title ?: ($item->album ? $item->album->title : 'Foto Galeri');
                    SeedAssetGenerator::generateImageForPath($clean, $title, 800, 600, '#1f2937', '#ffffff');
                    $generated++;
                } else {
                    $existing++;
                }
            }
        }

        // 3. Achievements
        $achievements = Achievement::whereNotNull('photo')->get();
        foreach ($achievements as $ach) {
            $clean = ltrim(preg_replace('#^storage/#', '', $ach->photo), '/');
            if (!Storage::disk('public')->exists($clean) || Storage::disk('public')->size($clean) < 100) {
                SeedAssetGenerator::generateImageForPath($clean, $ach->title, 800, 600, '#b91c1c', '#ffffff');
                $generated++;
            } else {
                $existing++;
            }
        }

        // 4. Facilities
        $facilities = Facility::whereNotNull('photo')->get();
        foreach ($facilities as $fac) {
            $clean = ltrim(preg_replace('#^storage/#', '', $fac->photo), '/');
            if (!Storage::disk('public')->exists($clean) || Storage::disk('public')->size($clean) < 100) {
                SeedAssetGenerator::generateImageForPath($clean, $fac->name, 800, 600, '#0f172a', '#ffffff');
                $generated++;
            } else {
                $existing++;
            }
        }

        // 5. Teachers
        $teachers = Teacher::whereNotNull('photo')->get();
        foreach ($teachers as $teacher) {
            $clean = ltrim(preg_replace('#^storage/#', '', $teacher->photo), '/');
            if (!Storage::disk('public')->exists($clean) || Storage::disk('public')->size($clean) < 100) {
                SeedAssetGenerator::generateImageForPath($clean, $teacher->name, 400, 400, '#334155', '#ffffff');
                $generated++;
            } else {
                $existing++;
            }
        }

        // 6. Posts
        $posts = Post::whereNotNull('thumbnail')->get();
        foreach ($posts as $post) {
            $clean = ltrim(preg_replace('#^storage/#', '', $post->thumbnail), '/');
            if (!Storage::disk('public')->exists($clean) || Storage::disk('public')->size($clean) < 100) {
                SeedAssetGenerator::generateImageForPath($clean, $post->title, 800, 600, '#374151', '#ffffff');
                $generated++;
            } else {
                $existing++;
            }
        }

        // 7. Homepage Showcase & Essential System Assets
        $systemAssets = [
            'facilities/stall-servis-motor-praktik.png' => ['Kelas Industri AHASS', 800, 600, '#dc2626', '#ffffff'],
            'facilities/gudang-sst-dan-suku-cadang-asli-hgp-800x600.jpg' => ['Special Service Tools (SST)', 800, 600, '#1e293b', '#ffffff'],
            'facilities/bengkel-praktik-otomotif.png' => ['Bengkel Praktik TBSM', 800, 600, '#0f172a', '#ffffff'],
            'programs/prog-teknik-dan-bisnis-sepeda-motor-800x600.jpg' => ['Kesiapan Kerja & Wirausaha', 800, 600, '#b91c1c', '#ffffff'],
        ];
        foreach ($systemAssets as $path => $meta) {
            if (!Storage::disk('public')->exists($path) || Storage::disk('public')->size($path) < 100) {
                SeedAssetGenerator::generateImageForPath($path, $meta[0], $meta[1], $meta[2], $meta[3], $meta[4]);
                $generated++;
            } else {
                $existing++;
            }
        }

        $this->info("Sinkronisasi selesai! $existing file sudah ada, $generated file berhasil dibuat (ukuran rata-rata 6KB-12KB).");
        return self::SUCCESS;
    }
}
