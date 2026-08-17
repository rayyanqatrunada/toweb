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
        $programs = Program::with('competencies')->get();
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
}
