<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryPartner;

class PartnershipController extends Controller
{
    public function index()
    {
        $partners = IndustryPartner::published()->get();
        return view('frontend.partnership', compact('partners'));
    }
    
    public function show($slug)
    {
        $partner = IndustryPartner::published()->where('slug', $slug)->firstOrFail();
        return view('frontend.partnership_show', compact('partner'));
    }
}
