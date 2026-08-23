<?php

namespace App\Services\Search;

use App\Models\Post;
use App\Models\Announcement;
use App\Models\Program;
use App\Models\Achievement;
use App\Models\IndustryPartner;
use App\Models\Internship;
use App\Models\JobVacancy;
use App\Models\Alumni;
use App\Models\GalleryAlbum;
use App\Models\Download;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class GlobalSearchService
{
    /**
     * Perform global search across all relevant models.
     *
     * Hasil pencarian di-cache per keyword selama 5 menit untuk menghindari
     * 10 query LIKE berulang pada keyword yang sama.
     * Pencarian hanya dilakukan pada kolom pendek (title, excerpt, dll.)
     * — bukan kolom TEXT besar (content, bio, description) untuk mencegah
     * full table scan yang lambat dan tidak bisa menggunakan index.
     *
     * @param string $query
     * @return array
     */
    public function search(string $query): array
    {
        $query = trim($query);

        if (strlen($query) < 3) {
            return [];
        }

        // Cache per keyword — bust otomatis setelah 5 menit
        $cacheKey = 'search:' . md5(mb_strtolower($query));

        return Cache::remember($cacheKey, 300, function () use ($query) {
            return $this->executeSearch($query);
        });
    }

    private function executeSearch(string $query): array
    {
        $results = [];

        // Berita — cari di title & excerpt (bukan content TEXT besar)
        $posts = Post::published()
            ->select(['id', 'title', 'slug', 'excerpt', 'published_at'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('news.show', $item->slug),
                excerpt: $item->excerpt ?? '',
                date: $item->published_at?->format('d M Y')
            ));
        if ($posts->isNotEmpty()) $results['Berita'] = $posts;

        // Pengumuman — cari di title saja (content TEXT terlalu besar untuk LIKE)
        $announcements = Announcement::active()
            ->select(['id', 'title', 'slug', 'created_at'])
            ->where('title', 'like', "%{$query}%")
            ->latest()->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('announcements.show', $item->slug),
                excerpt: '',
                date: $item->created_at->format('d M Y')
            ));
        if ($announcements->isNotEmpty()) $results['Pengumuman'] = $announcements;

        // Program Keahlian — tabel kecil, aman cari di name
        $programs = Program::query()
            ->select(['id', 'name', 'slug', 'description'])
            ->where('name', 'like', "%{$query}%")
            ->latest()->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->name,
                url: route('academic.programs'),
                excerpt: Str::limit(strip_tags($item->description ?? ''), 100)
            ));
        if ($programs->isNotEmpty()) $results['Program Keahlian'] = $programs;

        // Prestasi — cari di title & organizer (bukan description TEXT)
        $achievements = Achievement::published()
            ->select(['id', 'title', 'slug', 'level', 'rank', 'organizer', 'published_at'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('organizer', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('achievements.show', $item->slug),
                excerpt: 'Tingkat: ' . ucfirst($item->level) . ($item->rank ? " - {$item->rank}" : ''),
                date: $item->published_at?->format('d M Y')
            ));
        if ($achievements->isNotEmpty()) $results['Prestasi'] = $achievements;

        // Mitra Industri — cari di name, industry_type, address (pendek)
        $partners = IndustryPartner::published()
            ->select(['id', 'name', 'slug', 'industry_type', 'address', 'published_at'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('industry_type', 'like', "%{$query}%")
                  ->orWhere('address', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->name,
                url: route('partnership.show', $item->slug),
                excerpt: $item->industry_type ?? ''
            ));
        if ($partners->isNotEmpty()) $results['Mitra Industri'] = $partners;

        // Info PKL — cari di title saja (description TEXT besar)
        $internships = Internship::published()
            ->select(['id', 'title'])
            ->where('title', 'like', "%{$query}%")
            ->latest()->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('internships.show', $item->id),
                excerpt: ''
            ));
        if ($internships->isNotEmpty()) $results['Info PKL'] = $internships;

        // Lowongan Kerja — cari di title, position, location (bukan description TEXT)
        $jobs = JobVacancy::published()
            ->select(['id', 'title', 'slug', 'position', 'location', 'published_at'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('position', 'like', "%{$query}%")
                  ->orWhere('location', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('jobs.show', $item->slug),
                excerpt: $item->position . ' - ' . $item->location,
                date: $item->published_at?->format('d M Y')
            ));
        if ($jobs->isNotEmpty()) $results['Lowongan Kerja'] = $jobs;

        // Alumni — cari di name, current_occupation, current_company (bukan bio TEXT)
        $alumnis = Alumni::public()
            ->select(['id', 'name', 'slug', 'current_occupation', 'current_company', 'published_at'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('current_occupation', 'like', "%{$query}%")
                  ->orWhere('current_company', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->name,
                url: route('alumni.show', $item->slug),
                excerpt: $item->current_occupation . ($item->current_company ? " di {$item->current_company}" : '')
            ));
        if ($alumnis->isNotEmpty()) $results['Alumni'] = $alumnis;

        // Galeri — cari di title & location (bukan description TEXT)
        $galleries = GalleryAlbum::published()
            ->select(['id', 'title', 'slug', 'location', 'published_at'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('location', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('gallery.show', $item->slug),
                excerpt: $item->location ?? '',
                date: $item->published_at?->format('d M Y')
            ));
        if ($galleries->isNotEmpty()) $results['Galeri'] = $galleries;

        // Dokumen — cari di title saja
        $downloads = Download::public()
            ->select(['id', 'title', 'slug', 'published_at'])
            ->where('title', 'like', "%{$query}%")
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('download.file', $item->slug),
                excerpt: '',
                date: $item->published_at?->format('d M Y')
            ));
        if ($downloads->isNotEmpty()) $results['Dokumen'] = $downloads;

        return $results;
    }
}
