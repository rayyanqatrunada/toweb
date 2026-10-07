<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    /**
     * Halaman direktori alumni dinonaktifkan sementara.
     * Catatan: Data, model, dan struktur view tetap dipertahankan penuh.
     */
    public function index()
    {
        return redirect()->route('home');

        /* Kode asli dipertahankan untuk aktivasi kembali:
        $featuredAlumni = Alumni::public()
            ->featured()
            ->select('id', 'name', 'slug', 'graduation_year', 'current_company', 'current_occupation', 'photo', 'success_story', 'city', 'featured_order')
            ->get();

        $otherAlumni = Alumni::select('id', 'name', 'slug', 'graduation_year', 'current_company', 'current_occupation', 'photo')
                         ->public()
                         ->where('is_featured', false)
                         ->latest('graduation_year')
                         ->paginate(12);

        return view('frontend.alumni.index', compact('featuredAlumni', 'otherAlumni'));
        */
    }

    public function show($slug)
    {
        return redirect()->route('home');

        /* Kode asli dipertahankan untuk aktivasi kembali:
        $alumni = Alumni::public()->where('slug', $slug)->firstOrFail();
        return view('frontend.alumni.show', compact('alumni'));
        */
    }
}
