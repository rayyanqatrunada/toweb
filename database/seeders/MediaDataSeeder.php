<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MediaDataSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            'Kegiatan Praktik Siswa',
            'Kunjungan Industri ke Pabrik',
            'Lomba Kompetensi Siswa',
            'Workshop dan Pelatihan',
            'Fasilitas dan Peralatan Bengkel'
        ];

        foreach ($albums as $idx => $albumTitle) {
            $thumbnail = SeedAssetGenerator::generateImage('Album ' . ($idx+1), 'gallery', 800, 600, '#8b5cf6', '#ffffff');
            $album = GalleryAlbum::updateOrCreate(
                ['slug' => Str::slug($albumTitle)],
                [
                    'title' => $albumTitle,
                    'description' => 'Dokumentasi foto dari kegiatan ' . $albumTitle . '.',
                    'thumbnail' => $thumbnail,
                    'event_date' => now()->subDays(rand(1, 100)),
                    'location' => 'Bangsri, Jepara',
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 20))
                ]
            );

            // Generate 6 items per album
            for ($i = 1; $i <= 6; $i++) {
                $itemImage = SeedAssetGenerator::generateImage('Foto ' . $i, 'gallery', 800, 600, '#a78bfa', '#ffffff');
                GalleryItem::updateOrCreate(
                    [
                        'gallery_album_id' => $album->id,
                        'title' => $albumTitle . ' - Foto ' . $i
                    ],
                    [
                        'file_path' => $itemImage,
                        'type' => 'image',
                        'description' => 'Momen dokumentasi dari ' . $albumTitle . ' bagian ' . $i,
                        'alt_text' => 'Foto ' . $i . ' ' . $albumTitle,
                        'is_featured' => ($i === 1)
                    ]
                );
            }
        }
    }
}
