<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Program;
use App\Models\Teacher;
use App\Models\Facility;

class AcademicController extends Controller
{
    public function programs()
    {
        $programs = Cache::remember('academic:programs', 3600, fn() =>
            Program::select('id', 'name', 'slug', 'description', 'logo', 'sort_order')
                ->with('competencies:id,program_id,name,description')
                ->orderBy('sort_order')
                ->get()
        );
        return view('frontend.academic.programs', compact('programs'));
    }

    public function teachers()
    {
        $teachers = Cache::remember('academic:teachers', 1800, fn() =>
            Teacher::select('id', 'name', 'nip', 'subject', 'photo', 'position', 'is_head_of_department', 'is_active')
                ->where('is_active', true)
                ->orderBy('is_head_of_department', 'desc')
                ->orderBy('name')
                ->get()
        );
        return view('frontend.academic.teachers', compact('teachers'));
    }

    public function facilities()
    {
        $facilities = Cache::remember('academic:facilities', 3600, fn() =>
            Facility::select('id', 'name', 'slug', 'description', 'photo', 'capacity')
                ->latest()
                ->get()
        );
        return view('frontend.academic.facilities', compact('facilities'));
    }
}
