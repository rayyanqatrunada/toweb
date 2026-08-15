<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Facility;
use App\Models\Teacher;
use App\Models\GalleryAlbum;
use App\Models\IndustryPartner;
use App\Models\JobVacancy;
use App\Models\Download;
use App\Models\Achievement;

class FrontendController extends Controller
{
    public function index()
    {
        $latestNews = Post::with('category')->published()->latest()->take(3)->get();
        $partners = IndustryPartner::published()->latest()->take(6)->get();
        return view('frontend.home', compact('latestNews', 'partners'));
    }

    public function about()
    {
        $facilities = Facility::all();
        $teachers = Teacher::with('user')->get();
        return view('frontend.about', compact('facilities', 'teachers'));
    }

    public function news()
    {
        $news = Post::with('category')->published()->latest()->paginate(9);
        return view('frontend.news.index', compact('news'));
    }

    public function newsShow($slug)
    {
        $post = Post::with('category', 'tags')->published()->where('slug', $slug)->firstOrFail();
        return view('frontend.news.show', compact('post'));
    }

    public function announcements()
    {
        $announcements = \App\Models\Announcement::active()->latest()->paginate(10);
        return view('frontend.announcements.index', compact('announcements'));
    }

    public function announcementShow($slug)
    {
        $announcement = \App\Models\Announcement::active()->where('slug', $slug)->firstOrFail();
        return view('frontend.announcements.show', compact('announcement'));
    }

    public function programs()
    {
        $programs = \App\Models\Program::with('competencies')->get();
        return view('frontend.academic.programs', compact('programs'));
    }

    public function teachers()
    {
        $teachers = Teacher::all();
        return view('frontend.academic.teachers', compact('teachers'));
    }

    public function facilities()
    {
        $facilities = Facility::all();
        return view('frontend.academic.facilities', compact('facilities'));
    }

    public function achievements()
    {
        $achievements = Achievement::with('category')->published()->latest()->paginate(12);
        return view('frontend.achievements.index', compact('achievements'));
    }

    public function achievementShow($slug)
    {
        $achievement = Achievement::with(['category', 'participants' => function($q) {
            $q->select('id', 'achievement_id', 'student_name'); // Hide student_id
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.achievements.show', compact('achievement'));
    }

    public function gallery()
    {
        $albums = GalleryAlbum::withCount('items')->published()->latest()->paginate(9);
        return view('frontend.gallery', compact('albums'));
    }

    public function galleryShow($slug)
    {
        $album = GalleryAlbum::with(['items' => function($q) {
            $q->orderBy('sort_order')->orderBy('id');
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.gallery_show', compact('album'));
    }

    public function partnership()
    {
        $partners = IndustryPartner::published()->get();
        return view('frontend.partnership', compact('partners'));
    }
    
    public function partnershipShow($slug)
    {
        $partner = IndustryPartner::published()->where('slug', $slug)->firstOrFail();
        return view('frontend.partnership_show', compact('partner'));
    }

    public function internships()
    {
        $internships = \App\Models\Internship::with('industryPartner')->published()->latest()->paginate(10);
        return view('frontend.internships.index', compact('internships'));
    }

    public function internshipShow($slug)
    {
        // Internship does not have a slug field based on migration, so we use ID or add slug logic. 
        // Let's use ID for internship since slug might not exist.
        $internship = \App\Models\Internship::with('industryPartner')->published()->findOrFail($slug);
        return view('frontend.internships.show', compact('internship'));
    }

    public function jobVacancies()
    {
        $jobs = JobVacancy::with('industryPartner')->published()->latest()->paginate(10);
        return view('frontend.jobs.index', compact('jobs'));
    }

    public function jobVacancyShow($slug)
    {
        $job = JobVacancy::with('industryPartner')->published()->where('slug', $slug)->firstOrFail();
        return view('frontend.jobs.show', compact('job'));
    }

    public function alumni()
    {
        $alumnis = \App\Models\Alumni::public()->latest('graduation_year')->paginate(12);
        return view('frontend.alumni.index', compact('alumnis'));
    }

    public function alumniShow($slug)
    {
        $alumni = \App\Models\Alumni::public()->where('slug', $slug)->firstOrFail();
        return view('frontend.alumni.show', compact('alumni'));
    }

    public function download()
    {
        $downloads = Download::with('category')->public()->latest('published_at')->get();
        return view('frontend.download', compact('downloads'));
    }

    public function downloadFile($slug)
    {
        $download = Download::public()->where('slug', $slug)->firstOrFail();
        
        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($download->file_path)) {
            abort(404, 'File not found');
        }

        $download->increment('download_count');

        return response()->download(
            \Illuminate\Support\Facades\Storage::disk('public')->path($download->file_path),
            $download->file_name ?? 'download'
        );
    }

    public function search(Request $request)
    {
        $q = trim($request->input('q'));
        if (strlen($q) > 100) {
            $q = substr($q, 0, 100);
        }

        $results = [];

        if (!empty($q)) {
            $results['Berita'] = Post::published()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('excerpt', 'like', "%{$q}%")
                          ->orWhere('content', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => $item->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($item->content), 100),
                    'url' => route('news.show', $item->slug),
                    'date' => $item->published_at?->format('d M Y')
                ]);

            $results['Pengumuman'] = \App\Models\Announcement::active()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('content', 'like', "%{$q}%");
                })
                ->latest()->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => \Illuminate\Support\Str::limit(strip_tags($item->content), 100),
                    'url' => route('announcements.show', $item->slug),
                    'date' => $item->created_at->format('d M Y')
                ]);

            $results['Program Keahlian'] = \App\Models\Program::query()
                ->where(function($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%");
                })
                ->latest()->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->name,
                    'excerpt' => \Illuminate\Support\Str::limit(strip_tags($item->description), 100),
                    'url' => route('academic.programs'),
                    'date' => null
                ]);

            $results['Prestasi'] = \App\Models\Achievement::published()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%")
                          ->orWhere('organizer', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => "Tingkat: " . ucfirst($item->level) . ($item->rank ? " - {$item->rank}" : ""),
                    'url' => route('achievements.show', $item->slug),
                    'date' => $item->published_at?->format('d M Y')
                ]);

            $results['Mitra Industri'] = IndustryPartner::published()
                ->where(function($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%")
                          ->orWhere('address', 'like', "%{$q}%")
                          ->orWhere('industry_type', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->name,
                    'excerpt' => $item->industry_type,
                    'url' => route('partnership.show', $item->slug),
                    'date' => null
                ]);

            $results['Info PKL'] = \App\Models\Internship::published()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%");
                })
                ->latest()->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => \Illuminate\Support\Str::limit(strip_tags($item->description), 100),
                    'url' => route('internships.show', $item->id),
                    'date' => null
                ]);

            $results['Lowongan Kerja'] = JobVacancy::published()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('position', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%")
                          ->orWhere('location', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => $item->position . ' - ' . $item->location,
                    'url' => route('jobs.show', $item->slug),
                    'date' => $item->published_at?->format('d M Y')
                ]);

            $results['Alumni'] = \App\Models\Alumni::public()
                ->where(function($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%")
                          ->orWhere('current_occupation', 'like', "%{$q}%")
                          ->orWhere('current_company', 'like', "%{$q}%")
                          ->orWhere('bio', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->name,
                    'excerpt' => $item->current_occupation . ($item->current_company ? " di {$item->current_company}" : ""),
                    'url' => route('alumni.show', $item->slug),
                    'date' => null
                ]);

            $results['Galeri'] = GalleryAlbum::published()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%")
                          ->orWhere('location', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => $item->location,
                    'url' => route('gallery.show', $item->slug),
                    'date' => $item->published_at?->format('d M Y')
                ]);

            $results['Dokumen'] = Download::public()
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%");
                })
                ->latest('published_at')->take(10)->get()
                ->map(fn($item) => (object)[
                    'title' => $item->title,
                    'excerpt' => \Illuminate\Support\Str::limit(strip_tags($item->description), 100),
                    'url' => route('download.file', $item->slug),
                    'date' => $item->published_at?->format('d M Y')
                ]);
        }
        
        $totalResults = collect($results)->sum(fn($group) => count($group));

        return view('frontend.search', compact('q', 'results', 'totalResults'));
    }
}
