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

class GlobalSearchService
{
    /**
     * Perform global search across all relevant models.
     *
     * @param string $query
     * @return array
     */
    public function search(string $query): array
    {
        $results = [];

        if (empty($query)) {
            return $results;
        }

        // Berita
        $posts = Post::published()
            ->select(['id', 'title', 'slug', 'excerpt', 'content', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('news.show', $item->slug),
                excerpt: $item->excerpt ?? Str::limit(strip_tags($item->content), 100),
                date: $item->published_at?->format('d M Y')
            ));
        if ($posts->isNotEmpty()) $results['Berita'] = $posts;

        // Pengumuman
        $announcements = Announcement::active()
            ->select(['id', 'title', 'slug', 'content', 'created_at'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->latest()->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('announcements.show', $item->slug),
                excerpt: Str::limit(strip_tags($item->content), 100),
                date: $item->created_at->format('d M Y')
            ));
        if ($announcements->isNotEmpty()) $results['Pengumuman'] = $announcements;

        // Program Keahlian
        $programs = Program::query()
            ->select(['id', 'name', 'slug', 'description'])
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->latest()->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->name,
                url: route('academic.programs'),
                excerpt: Str::limit(strip_tags($item->description), 100)
            ));
        if ($programs->isNotEmpty()) $results['Program Keahlian'] = $programs;

        // Prestasi
        $achievements = Achievement::published()
            ->select(['id', 'title', 'slug', 'level', 'rank', 'organizer', 'description', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('organizer', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('achievements.show', $item->slug),
                excerpt: "Tingkat: " . ucfirst($item->level) . ($item->rank ? " - {$item->rank}" : ""),
                date: $item->published_at?->format('d M Y')
            ));
        if ($achievements->isNotEmpty()) $results['Prestasi'] = $achievements;

        // Mitra Industri
        $partners = IndustryPartner::published()
            ->select(['id', 'name', 'slug', 'industry_type', 'address', 'description', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('address', 'like', "%{$query}%")
                  ->orWhere('industry_type', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->name,
                url: route('partnership.show', $item->slug),
                excerpt: $item->industry_type
            ));
        if ($partners->isNotEmpty()) $results['Mitra Industri'] = $partners;

        // Info PKL
        $internships = Internship::published()
            ->select(['id', 'title', 'description'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->latest()->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('internships.show', $item->id),
                excerpt: Str::limit(strip_tags($item->description), 100)
            ));
        if ($internships->isNotEmpty()) $results['Info PKL'] = $internships;

        // Lowongan Kerja
        $jobs = JobVacancy::published()
            ->select(['id', 'title', 'slug', 'position', 'location', 'description', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('position', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
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

        // Alumni
        $alumnis = Alumni::public()
            ->select(['id', 'name', 'slug', 'current_occupation', 'current_company', 'bio', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('current_occupation', 'like', "%{$query}%")
                  ->orWhere('current_company', 'like', "%{$query}%")
                  ->orWhere('bio', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->name,
                url: route('alumni.show', $item->slug),
                excerpt: $item->current_occupation . ($item->current_company ? " di {$item->current_company}" : "")
            ));
        if ($alumnis->isNotEmpty()) $results['Alumni'] = $alumnis;

        // Galeri
        $galleries = GalleryAlbum::published()
            ->select(['id', 'title', 'slug', 'location', 'description', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('location', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('gallery.show', $item->slug),
                excerpt: $item->location,
                date: $item->published_at?->format('d M Y')
            ));
        if ($galleries->isNotEmpty()) $results['Galeri'] = $galleries;

        // Dokumen
        $downloads = Download::public()
            ->select(['id', 'title', 'slug', 'description', 'published_at'])
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->latest('published_at')->take(10)->get()
            ->map(fn($item) => new SearchResult(
                title: $item->title,
                url: route('download.file', $item->slug),
                excerpt: Str::limit(strip_tags($item->description), 100),
                date: $item->published_at?->format('d M Y')
            ));
        if ($downloads->isNotEmpty()) $results['Dokumen'] = $downloads;

        return $results;
    }
}
