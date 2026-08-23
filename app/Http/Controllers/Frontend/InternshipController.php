<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;

class InternshipController extends Controller
{
    public function index()
    {
        // select() pada Internship + constrained eager load IndustryPartner
        // hanya ambil kolom yang dibutuhkan di view (bukan semua kolom)
        $internships = Internship::select('id', 'industry_partner_id', 'title', 'start_date', 'end_date', 'status')
            ->with('industryPartner:id,name,logo,slug')
            ->published()->latest()->paginate(10);
        return view('frontend.internships.index', compact('internships'));
    }

    public function show($id)
    {
        // Internship does not have a slug field based on migration, so we use ID or add slug logic. 
        // Let's use ID for internship since slug might not exist.
        $internship = Internship::with('industryPartner')->published()->findOrFail($id);
        return view('frontend.internships.show', compact('internship'));
    }
}
