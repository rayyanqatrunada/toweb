<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $urls = [];
        $appUrl = config('app.url');

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

        // Dynamic routes
        $posts = Post::published()->latest()->get();
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => route('news.show', $post->slug),
                'lastmod' => $post->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }

        $achievements = Achievement::published()->latest()->get();
        foreach ($achievements as $achievement) {
            $urls[] = [
                'loc' => route('achievements.show', $achievement->slug),
                'lastmod' => $achievement->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }

        $albums = GalleryAlbum::published()->latest()->get();
        foreach ($albums as $album) {
            $urls[] = [
                'loc' => route('gallery.show', $album->slug),
                'lastmod' => $album->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }

        $jobs = JobVacancy::published()->latest()->get();
        foreach ($jobs as $job) {
            $urls[] = [
                'loc' => route('jobs.show', $job->slug),
                'lastmod' => $job->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }

        $alumnis = Alumni::public()->latest()->get();
        foreach ($alumnis as $alumni) {
            $urls[] = [
                'loc' => route('alumni.show', $alumni->slug),
                'lastmod' => $alumni->updated_at->toAtomString(),
                'priority' => '0.5'
            ];
        }

        $announcements = Announcement::active()->latest()->get();
        foreach ($announcements as $announcement) {
            $urls[] = [
                'loc' => route('announcements.show', $announcement->slug),
                'lastmod' => $announcement->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }
        
        $partners = IndustryPartner::published()->latest()->get();
        foreach ($partners as $partner) {
            $urls[] = [
                'loc' => route('partnership.show', $partner->slug),
                'lastmod' => $partner->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }
        
        $internships = Internship::published()->latest()->get();
        foreach ($internships as $internship) {
            $urls[] = [
                'loc' => route('internships.show', $internship->slug),
                'lastmod' => $internship->updated_at->toAtomString(),
                'priority' => '0.6'
            ];
        }

        return response()->view('frontend.sitemap', [
            'urls' => $urls
        ])->header('Content-Type', 'text/xml');
    }
}
