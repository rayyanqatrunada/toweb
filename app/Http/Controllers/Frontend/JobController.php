<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobVacancy;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobVacancy::select('id', 'industry_partner_id', 'title', 'slug', 'work_type', 'location', 'published_at', 'deadline', 'created_at')
                          ->with('industryPartner:id,name,slug,logo')
                          ->published()->latest()->paginate(10);
        return view('frontend.jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = JobVacancy::with('industryPartner')->published()->where('slug', $slug)->firstOrFail();
        return view('frontend.jobs.show', compact('job'));
    }
}
