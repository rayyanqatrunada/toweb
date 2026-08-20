<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Teacher;
use App\Models\Facility;

class AcademicController extends Controller
{
    public function programs()
    {
        $programs = \Illuminate\Support\Facades\Cache::remember('academic:programs', now()->addMinutes(30), function () {
            return Program::with('competencies')->get();
        });
        return view('frontend.academic.programs', compact('programs'));
    }

    public function teachers()
    {
        $teachers = \Illuminate\Support\Facades\Cache::remember('academic:teachers', now()->addMinutes(30), function () {
            return Teacher::where('is_active', true)->get();
        });
        return view('frontend.academic.teachers', compact('teachers'));
    }

    public function facilities()
    {
        $facilities = \Illuminate\Support\Facades\Cache::remember('academic:facilities', now()->addMinutes(30), function () {
            return Facility::all();
        });
        return view('frontend.academic.facilities', compact('facilities'));
    }
}
