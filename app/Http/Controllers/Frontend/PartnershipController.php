<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryPartner;

class PartnershipController extends Controller
{
    public function index()
    {
        // Hanya ada 1 mitra untuk jurusan TBSM, jadi kita langsung ambil mitra pertama beserta lowongan kerjanya.
        $partner = IndustryPartner::with(['jobVacancies' => function($query) {
            $query->published()->latest();
        }])->published()->first();
        
        if (!$partner) {
            // Jika belum ada mitra sama sekali, mungkin tampilkan view kosong atau 404
            abort(404, 'Belum ada data kemitraan.');
        }

        return view('frontend.partnership_show', compact('partner'));
    }
    
    public function show($slug)
    {
        $partner = IndustryPartner::with(['jobVacancies' => function($query) {
            $query->published()->latest();
        }])->published()->where('slug', $slug)->firstOrFail();
        return view('frontend.partnership_show', compact('partner'));
    }
}
