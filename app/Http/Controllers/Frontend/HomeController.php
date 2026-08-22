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
        $alumniCount = Alumni::public()->count();
        $partnerCount = IndustryPartner::published()->count();
        $achievementCount = Achievement::published()->count();
        $facilityCount = Facility::count();

        // Data for sections
        $programs = Program::with('competencies:id,program_id,name')->get();
        $facilities = Facility::select('id', 'name', 'slug', 'description', 'photo')->latest()->take(3)->get();
        $partners = IndustryPartner::select('id', 'name', 'slug', 'logo', 'industry_type')->published()->latest()->take(8)->get();
        $jobVacancies = JobVacancy::select('id', 'industry_partner_id', 'title', 'slug', 'work_type', 'location', 'published_at')
                                    ->with('industryPartner:id,name,logo')
                                    ->published()->latest()->take(3)->get();
        $alumnis = Alumni::select('id', 'name', 'graduation_year', 'current_company', 'current_occupation', 'photo')->public()->latest()->take(6)->get();
        $latestNews = Post::select('id', 'category_id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt')
                            ->with('category:id,name,slug')
                            ->published()->latest()->take(3)->get();
        $agendas = Announcement::select('id', 'title', 'slug', 'created_at')->active()->latest()->take(3)->get();
        $galleries = GalleryAlbum::select('id', 'title', 'slug', 'thumbnail', 'published_at')
                                  ->with('items:id,gallery_album_id,file_path,type')
                                  ->published()->latest()->take(4)->get();
        
        $headOfDepartment = Teacher::where('is_head_of_department', true)->where('is_active', true)->first();

        return view('frontend.home', compact(
            'alumniCount', 'partnerCount', 'achievementCount', 'facilityCount',
            'programs', 'facilities', 'partners', 'jobVacancies',
            'alumnis', 'latestNews', 'agendas', 'galleries', 'headOfDepartment'
        ));
    }

    public function about()
    {
        $headOfDepartment = Teacher::where('is_head_of_department', true)->where('is_active', true)->first();
        $programs = Program::all();
        $facilities = Facility::latest()->take(3)->get();

        return view('frontend.about', compact('headOfDepartment', 'programs', 'facilities'));
    }
}
