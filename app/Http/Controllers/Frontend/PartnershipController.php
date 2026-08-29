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
            // Jika belum ada mitra sama sekali, tampilkan layout kosong (tanpa 404)
            $partner = new IndustryPartner([
                'name' => 'Mitra Belum Tersedia',
                'industry_type' => 'Data mitra industri belum ditambahkan di sistem.',
                'description' => '<p>Halaman ini akan menampilkan profil mitra industri utama dari program keahlian TBSM. Saat ini data belum tersedia. Administrator dapat menambahkan data mitra melalui dashboard admin.</p>',
            ]);
            // Pastikan relasi jobVacancies tidak null agar view tidak error
            $partner->setRelation('jobVacancies', collect([]));
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
