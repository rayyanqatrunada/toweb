<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Facility;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use App\Models\Post;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $albums = GalleryAlbum::select('id', 'title', 'slug')->published()->get();
        $selectedAlbum = $request->get('album', 'all');

        $allItems = collect();

        // 1. Ambil data dari GalleryItem
        $galleryQuery = GalleryItem::with('album')->whereHas('album', fn($q) => $q->published());
        if ($selectedAlbum !== 'all' && !in_array($selectedAlbum, ['prestasi', 'fasilitas', 'berita'])) {
            $galleryQuery->whereHas('album', fn($q) => $q->where('slug', $selectedAlbum));
        }

        if (!in_array($selectedAlbum, ['prestasi', 'fasilitas', 'berita'])) {
            foreach ($galleryQuery->get() as $item) {
                $allItems->push((object)[
                    'file_path' => $item->file_path,
                    'title' => $item->title ?: ($item->album ? $item->album->title : 'Foto Dokumentasi'),
                    'album_title' => $item->album ? $item->album->title : 'Dokumentasi',
                    'category' => 'galeri',
                    'description' => $item->description,
                    'date' => $item->created_at,
                ]);
            }
        }

        // 2. Ambil aset foto dari Prestasi jika 'all' atau 'prestasi'
        if ($selectedAlbum === 'all' || $selectedAlbum === 'prestasi') {
            $achievements = Achievement::select('id', 'title', 'slug', 'rank', 'level', 'photo', 'date')
                ->whereNotNull('photo')
                ->published()
                ->latest('date')
                ->get();

            foreach ($achievements as $ach) {
                $badge = ($ach->rank ? $ach->rank . ' ' : '') . ($ach->level ? '(' . $ach->level . ')' : '');
                $allItems->push((object)[
                    'file_path' => $ach->photo,
                    'title' => $ach->title,
                    'album_title' => 'Prestasi ' . trim($badge),
                    'category' => 'prestasi',
                    'description' => 'Dokumentasi kejuaraan & kompetisi otomotif siswa SMKN 1 Bangsri.',
                    'date' => $ach->date,
                ]);
            }
        }

        // 3. Ambil aset foto dari Fasilitas jika 'all' atau 'fasilitas'
        if ($selectedAlbum === 'all' || $selectedAlbum === 'fasilitas') {
            $facilities = Facility::whereNotNull('photo')->get();
            foreach ($facilities as $fac) {
                $allItems->push((object)[
                    'file_path' => $fac->photo,
                    'title' => $fac->name,
                    'album_title' => 'Fasilitas & Bengkel AHASS',
                    'category' => 'fasilitas',
                    'description' => strip_tags($fac->description ?? 'Sarana dan prasarana praktik standar Astra Honda Motor.'),
                    'date' => $fac->created_at,
                ]);
            }
        }

        // 4. Ambil aset foto dari Berita/Warta jika 'all' atau 'berita'
        if ($selectedAlbum === 'all' || $selectedAlbum === 'berita') {
            $posts = Post::select('id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt')
                ->whereNotNull('thumbnail')
                ->published()
                ->latest('published_at')
                ->take(12)
                ->get();

            foreach ($posts as $post) {
                $allItems->push((object)[
                    'file_path' => $post->thumbnail,
                    'title' => $post->title,
                    'album_title' => 'Warta & Kegiatan',
                    'category' => 'berita',
                    'description' => $post->excerpt ?: 'Dokumentasi kegiatan dan liputan seputar TBSM SMKN 1 Bangsri.',
                    'date' => $post->published_at,
                ]);
            }
        }

        // 5. Cek fisik file di storage & prioritaskan foto dengan data riil (>= 6KB) di atas
        $processed = $allItems->map(function ($item) {
            $filePath = $item->file_path;
            $hasRealFile = false;
            $fileSize = 0;

            if (!empty($filePath)) {
                if (str_starts_with($filePath, 'http://') || str_starts_with($filePath, 'https://')) {
                    $hasRealFile = true;
                    $fileSize = 10000;
                } else {
                    $clean = ltrim(preg_replace('#^storage/#', '', $filePath), '/');
                    $fullPath = public_path('storage/' . $clean);

                    if (file_exists($fullPath) && filesize($fullPath) > 100) {
                        $hasRealFile = true;
                        $fileSize = filesize($fullPath);
                    } else {
                        // Jika foto belum ada di storage hosting, buat file placeholder 6KB-12KB dinamis
                        try {
                            SeedAssetGenerator::generateImageForPath($clean, $item->title, 800, 600, '#1f2937', '#ffffff');
                            if (file_exists($fullPath)) {
                                $hasRealFile = true;
                                $fileSize = filesize($fullPath);
                            }
                        } catch (\Throwable $e) {
                            // Abaikan jika GD bermasalah
                        }
                    }
                }
            }

            $item->has_photo = $hasRealFile ? 1 : 0;
            // Bobot prioritas: Memiliki foto riil (>= 6000 bytes) prioritas paling atas (bobot 2)
            $item->is_priority_photo = ($hasRealFile && $fileSize >= 6000) ? 2 : ($hasRealFile ? 1 : 0);
            $item->file_size = $fileSize;

            return $item;
        });

        // Urutkan: Yang memiliki foto jadi prioritas di atas
        $sorted = $processed->sort(function ($a, $b) {
            if ($a->is_priority_photo !== $b->is_priority_photo) {
                return $b->is_priority_photo <=> $a->is_priority_photo;
            }
            if ($a->has_photo !== $b->has_photo) {
                return $b->has_photo <=> $a->has_photo;
            }
            return strcmp((string)$b->date, (string)$a->date);
        })->values();

        // Pagination
        $perPage = 24;
        $currentPage = (int)$request->get('page', 1);
        $pagedData = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $items = new LengthAwarePaginator(
            $pagedData,
            $sorted->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('frontend.gallery', compact('albums', 'items', 'selectedAlbum'));
    }

    public function show($slug)
    {
        $album = GalleryAlbum::with(['items' => function($q) {
            $q->orderBy('sort_order')->orderBy('id');
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.gallery_show', compact('album'));
    }
}
