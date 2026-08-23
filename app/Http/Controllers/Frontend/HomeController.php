<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Alumni;
use App\Models\IndustryPartner;
use App\Models\Achievement;
use App\Models\Facility;
use App\Models\Program;
use App\Models\JobVacancy;
use App\Models\Post;
use App\Models\Announcement;
use App\Models\GalleryAlbum;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index()
    {
        // Stats — cached individually with model-booted invalidation
        $alumniCount = Cache::remember('homepage:stats:alumni', 600, fn() => Alumni::public()->count());
        $partnerCount = Cache::remember('homepage:stats:partners', 600, fn() => IndustryPartner::published()->count());
        $achievementCount = Cache::remember('homepage:stats:achievements', 600, fn() => Achievement::published()->count());
        $facilityCount = Cache::remember('homepage:stats:facilities', 3600, fn() => Facility::count());

        // Data sections — grouped cache to reduce cache entries
        $programs = Cache::remember('homepage:programs', 3600, fn() =>
            Program::with('competencies:id,program_id,name')->get()
        );

        $facilities = Cache::remember('homepage:facilities', 1800, fn() =>
            Facility::select('id', 'name', 'slug', 'description', 'photo')->latest()->take(3)->get()
        );

        $partners = Cache::remember('homepage:partners', 600, fn() =>
            IndustryPartner::select('id', 'name', 'slug', 'logo', 'industry_type')
                ->published()->latest()->take(8)->get()
        );

        $jobVacancies = Cache::remember('homepage:jobs', 300, fn() =>
            JobVacancy::select('id', 'industry_partner_id', 'title', 'slug', 'work_type', 'location', 'published_at')
                ->with('industryPartner:id,name,logo')
                ->published()->latest()->take(3)->get()
        );

        $alumnis = Cache::remember('homepage:alumnis', 600, fn() =>
            Alumni::select('id', 'name', 'graduation_year', 'current_company', 'current_occupation', 'photo')
                ->public()->latest()->take(6)->get()
        );

        $latestNews = Cache::remember('homepage:news', 300, fn() =>
            Post::select('id', 'category_id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt')
                ->with('category:id,name,slug')
                ->published()->latest()->take(3)->get()
        );

        $agendas = Cache::remember('homepage:agendas', 300, fn() =>
            Announcement::select('id', 'title', 'slug', 'created_at')->active()->latest()->take(3)->get()
        );

        $galleries = Cache::remember('homepage:galleries', 600, fn() =>
            GalleryAlbum::select('id', 'title', 'slug', 'thumbnail', 'published_at')
                ->with('items:id,gallery_album_id,file_path,type')
                ->published()->latest()->take(4)->get()
        );

        $headOfDepartment = Cache::remember('homepage:head_of_department', 3600, fn() =>
            Teacher::where('is_head_of_department', true)->where('is_active', true)->first()
        );

        return view('frontend.home', compact(
            'alumniCount', 'partnerCount', 'achievementCount', 'facilityCount',
            'programs', 'facilities', 'partners', 'jobVacancies',
            'alumnis', 'latestNews', 'agendas', 'galleries', 'headOfDepartment'
        ));
    }

    public function about()
    {
        $headOfDepartment = Cache::remember('homepage:head_of_department', 3600, fn() =>
            Teacher::where('is_head_of_department', true)->where('is_active', true)->first()
        );

        $programs = Cache::remember('homepage:programs', 3600, fn() =>
            Program::with('competencies:id,program_id,name')->get()
        );

        $facilities = Cache::remember('homepage:facilities', 1800, fn() =>
            Facility::select('id', 'name', 'slug', 'description', 'photo')->latest()->take(3)->get()
        );

        return view('frontend.about', compact('headOfDepartment', 'programs', 'facilities'));
    }
}
