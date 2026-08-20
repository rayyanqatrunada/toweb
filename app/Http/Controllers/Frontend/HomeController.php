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
        // Stats
        $alumniCount = Cache::remember('homepage:stats:alumni', now()->addMinutes(60), fn() => Alumni::public()->count());
        $partnerCount = Cache::remember('homepage:stats:partner', now()->addMinutes(60), fn() => IndustryPartner::published()->count());
        $achievementCount = Cache::remember('homepage:stats:achievement', now()->addMinutes(60), fn() => Achievement::published()->count());
        $facilityCount = Cache::remember('homepage:stats:facility', now()->addMinutes(60), fn() => Facility::count());

        // Data for sections
        $programs = Cache::remember('homepage:programs', now()->addMinutes(60), fn() => Program::with('competencies')->get());
        $facilities = Cache::remember('homepage:facilities', now()->addMinutes(60), fn() => Facility::latest()->take(3)->get());
        $partners = Cache::remember('homepage:partners', now()->addMinutes(15), fn() => IndustryPartner::published()->latest()->take(8)->get());
        $jobVacancies = Cache::remember('homepage:jobs', now()->addMinutes(15), fn() => JobVacancy::with('industryPartner')->published()->latest()->take(3)->get());
        $alumnis = Cache::remember('homepage:alumnis', now()->addMinutes(15), fn() => Alumni::public()->latest()->take(6)->get());
        $latestNews = Cache::remember('homepage:news', now()->addMinutes(15), fn() => Post::with('category')->published()->latest()->take(3)->get());
        $agendas = Cache::remember('homepage:agendas', now()->addMinutes(15), fn() => Announcement::active()->latest()->take(3)->get());
        $galleries = Cache::remember('homepage:galleries', now()->addMinutes(15), fn() => GalleryAlbum::with('items')->published()->latest()->take(4)->get());
        
        $headOfDepartment = Cache::remember('homepage:head_teacher', now()->addMinutes(60), fn() => Teacher::where('is_head_of_department', true)->where('is_active', true)->first());

        return view('frontend.home', compact(
            'alumniCount', 'partnerCount', 'achievementCount', 'facilityCount',
            'programs', 'facilities', 'partners', 'jobVacancies',
            'alumnis', 'latestNews', 'agendas', 'galleries', 'headOfDepartment'
        ));
    }

    public function about()
    {
        $headOfDepartment = Cache::remember('about:head_teacher', now()->addMinutes(60), fn() => Teacher::where('is_head_of_department', true)->where('is_active', true)->first());
        $programs = Cache::remember('about:programs', now()->addMinutes(60), fn() => Program::all());
        $facilities = Cache::remember('about:facilities', now()->addMinutes(60), fn() => Facility::latest()->take(3)->get());

        return view('frontend.about', compact('headOfDepartment', 'programs', 'facilities'));
    }
}
