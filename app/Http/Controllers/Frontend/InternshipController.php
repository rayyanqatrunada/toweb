<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;

class InternshipController extends Controller
{
    public function index()
    {
        $internships = Internship::with('industryPartner')->published()->latest()->paginate(10);
        return view('frontend.internships.index', compact('internships'));
    }

    public function show($slug)
    {
        // Internship does not have a slug field based on migration, so we use ID or add slug logic. 
        // Let's use ID for internship since slug might not exist.
        $internship = Internship::with('industryPartner')->published()->findOrFail($slug);
        return view('frontend.internships.show', compact('internship'));
    }
}
