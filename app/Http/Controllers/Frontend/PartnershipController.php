<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\IndustryPartner;
use App\Models\IndustryPartnerBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PartnershipController extends Controller
{
    public function index()
    {
        // Hanya ada 1 mitra utama untuk jurusan TBSM (PT Astra Honda Motor / AHASS)
        $partner = Cache::remember('industry:partner:main', 3600, function () {
            return IndustryPartner::with([
                'branches' => function ($query) {
                    $query->active()->orderBy('is_main_branch', 'desc')->orderBy('sort_order', 'asc');
                },
                'jobVacancies' => function ($query) {
                    $query->published()->latest();
                },
                'internships' => function ($query) {
                    $query->published()->latest();
                },
                'partnerships' => function ($query) {
                    $query->where('status', 'active')->latest();
                },
            ])->published()->first();
        });

        if (!$partner) {
            $shortName = app(\App\Services\SettingsService::class)->get('site_short_name', 'TBSM');
            $partner = new IndustryPartner([
                'name' => 'PT Astra Honda Motor (Astra Motor)',
                'slug' => 'astra-honda-motor',
                'industry_type' => 'Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)',
                'description' => '<p>Halaman ini menampilkan kemitraan strategis kelas industri binaan Astra Honda Motor untuk ' . $shortName . ' SMK Negeri 1 Bangsri.</p>',
                'partnership_level' => 'Kelas Industri Binaan Grade A+',
            ]);
            $partner->setRelation('branches', collect([]));
            $partner->setRelation('jobVacancies', collect([]));
            $partner->setRelation('internships', collect([]));
            $partner->setRelation('partnerships', collect([]));
        }

        $branches = $partner->branches;
        $districts = $branches->pluck('district')->unique()->values();

        return view('frontend.partnership_show', compact('partner', 'branches', 'districts'));
    }

    public function show($slug)
    {
        $partner = IndustryPartner::with([
            'branches' => function ($query) {
                $query->active()->orderBy('is_main_branch', 'desc')->orderBy('sort_order', 'asc');
            },
            'jobVacancies' => function ($query) {
                $query->published()->latest();
            },
            'internships' => function ($query) {
                $query->published()->latest();
            },
            'partnerships' => function ($query) {
                $query->where('status', 'active')->latest();
            },
        ])->published()->where('slug', $slug)->firstOrFail();

        $branches = $partner->branches;
        $districts = $branches->pluck('district')->unique()->values();

        return view('frontend.partnership_show', compact('partner', 'branches', 'districts'));
    }
}
