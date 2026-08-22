<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::select('id', 'name', 'slug', 'graduation_year', 'current_company', 'current_occupation', 'photo')
                         ->public()->latest('graduation_year')->paginate(12);
        return view('frontend.alumni.index', compact('alumnis'));
    }

    public function show($slug)
    {
        $alumni = Alumni::public()->where('slug', $slug)->firstOrFail();
        return view('frontend.alumni.show', compact('alumni'));
    }
}
