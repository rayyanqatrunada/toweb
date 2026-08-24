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
        $generator = function () {
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
            try {
                Post::published()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($post) => $urls[] = [
                        'loc'     => route('news.show', $post->slug),
                        'lastmod' => $post->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load posts', ['error' => $e->getMessage()]);
            }

            try {
                Achievement::published()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('achievements.show', $item->slug),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load achievements', ['error' => $e->getMessage()]);
            }

            try {
                GalleryAlbum::published()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('gallery.show', $item->slug),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load galleries', ['error' => $e->getMessage()]);
            }

            try {
                JobVacancy::published()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('jobs.show', $item->slug),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load jobs', ['error' => $e->getMessage()]);
            }

            try {
                Alumni::public()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('alumni.show', $item->slug),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.5',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load alumni', ['error' => $e->getMessage()]);
            }

            try {
                Announcement::active()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('announcements.show', $item->slug),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load announcements', ['error' => $e->getMessage()]);
            }

            try {
                IndustryPartner::published()->select(['slug', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('partnership.show', $item->slug),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load partners', ['error' => $e->getMessage()]);
            }

            try {
                // Internship tidak punya slug — route pakai ID
                Internship::published()->select(['id', 'updated_at'])->latest()->get()
                    ->each(fn($item) => $urls[] = [
                        'loc'     => route('internships.show', $item->id),
                        'lastmod' => $item->updated_at->toAtomString(),
                        'priority' => '0.6',
                    ]);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Sitemap: failed to load internships', ['error' => $e->getMessage()]);
            }

            return $urls;
        };

        // Bypass cache in testing so tests always get fresh dynamic data.
        // Cache::remember with TTL=0 does NOT execute the closure — it returns null.
        $urls = app()->environment('testing')
            ? $generator()
            : Cache::remember('sitemap:urls', 3600, $generator);

        return response()->view('frontend.sitemap', [
            'urls' => $urls,
        ])->header('Content-Type', 'text/xml');
    }
}
