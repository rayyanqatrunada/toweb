<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryPartner;

class PartnershipController extends Controller
{
    public function index()
    {
        // Gunakan withCount alih-alih with('partnerships') untuk menghindari
        // memuat semua baris partnership ke memori. select() hanya kolom yang
        // diperlukan di tampilan list.
        $partners = IndustryPartner::select(
                'id', 'name', 'slug', 'industry_type', 'logo', 'address', 'website', 'published_at'
            )
            ->withCount('partnerships')
            ->withCount(['jobVacancies' => function ($q) {
                $q->published()->where(function ($query) {
                    $query->whereNull('deadline')
                          ->orWhere('deadline', '>=', now());
                });
            }])
            ->published()
            ->latest('published_at')
            ->paginate(12);
        return view('frontend.partnership', compact('partners'));
    }
    
    public function show($slug)
    {
        $partner = IndustryPartner::published()->where('slug', $slug)->firstOrFail();
        return view('frontend.partnership_show', compact('partner'));
    }
}
