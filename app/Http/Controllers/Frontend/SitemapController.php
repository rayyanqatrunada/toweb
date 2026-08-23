<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Achievement;
use App\Models\Program;
use App\Models\GalleryAlbum;
use App\Models\JobVacancy;
use App\Models\Alumni;
use App\Models\Internship;
use App\Models\Announcement;
use App\Models\IndustryPartner;

class SitemapController extends Controller
{
    public function index()
    {
        // Cache seluruh sitemap 1 jam — model observers bust key ini saat data berubah.
        // Di testing environment, langsung generate tanpa cache agar test dapat data terbaru.
        $ttl = app()->environment('testing') ? 0 : 3600;
        $urls = Cache::remember('sitemap:urls', $ttl, function () {
            $appUrl = config('app.url');
            $urls = [];

            // Static routes
            $urls[] = ['loc' => $appUrl . '/', 'lastmod' => now()->toAtomString(), 'priority' => '1.0'];
            $urls[] = ['loc' => $appUrl . '/tentang', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/berita', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/pengumuman', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/akademik/program', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/akademik/guru', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/akademik/fasilitas', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/prestasi', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/galeri', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/mitra-industri', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/pkl', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/lowongan', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/alumni', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];
            $urls[] = ['loc' => $appUrl . '/unduhan', 'lastmod' => now()->toAtomString(), 'priority' => '0.8'];

            // Dynamic routes — hanya ambil kolom yang diperlukan (slug + updated_at)
            Post::published()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($post) => $urls[] = [
                    'loc'     => route('news.show', $post->slug),
                    'lastmod' => $post->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            Achievement::published()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('achievements.show', $item->slug),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            GalleryAlbum::published()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('gallery.show', $item->slug),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            JobVacancy::published()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('jobs.show', $item->slug),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            Alumni::public()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('alumni.show', $item->slug),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.5',
                ]);

            Announcement::active()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('announcements.show', $item->slug),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            IndustryPartner::published()->select(['slug', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('partnership.show', $item->slug),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            // Internship tidak punya slug — route pakai ID
            Internship::published()->select(['id', 'updated_at'])->latest()->get()
                ->each(fn($item) => $urls[] = [
                    'loc'     => route('internships.show', $item->id),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'priority' => '0.6',
                ]);

            return $urls;
        });

        return response()->view('frontend.sitemap', [
            'urls' => $urls,
        ])->header('Content-Type', 'text/xml');
    }
}
