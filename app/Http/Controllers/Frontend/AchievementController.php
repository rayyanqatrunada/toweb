<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Category;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        // Stats
        $totalAchievements = Achievement::published()->count();
        $nationalCount = Achievement::published()->where('level', 'national')->count();

        // 6 latest for roadmap
        $recentAchievements = Achievement::with(['category', 'participants'])
                                ->published()
                                ->latest('date')
                                ->take(6)
                                ->get();

        // 2 featured (Juara 1, highest level first, with photo)
        $featuredAchievements = Achievement::with(['category', 'participants'])
                                ->published()
                                ->whereNotNull('photo')
                                ->orderByRaw("FIELD(level, 'national', 'province', 'district') ASC")
                                ->orderByRaw("CAST(REGEXP_REPLACE(rank, '[^0-9]', '') AS UNSIGNED) ASC")
                                ->orderBy('date', 'desc')
                                ->take(2)
                                ->get();

        // All achievements with filter
        $query = Achievement::with(['category', 'participants'])->published();

        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('organizer', 'like', "%{$search}%")
                  ->orWhereHas('participants', function($pq) use ($search) {
                      $pq->where('student_name', 'like', "%{$search}%");
                  });
            });
        }

        $allAchievements = $query->latest('date')->paginate(12);

        // Categories used by achievements
        $categories = Category::whereHas('achievements')->get();

        // Available years
        $years = Achievement::published()
                    ->selectRaw('YEAR(date) as year')
                    ->distinct()
                    ->orderBy('year', 'desc')
                    ->pluck('year')
                    ->filter();

        return view('frontend.achievements.index', compact(
            'totalAchievements',
            'nationalCount',
            'recentAchievements',
            'featuredAchievements',
            'allAchievements',
            'categories',
            'years'
        ));
    }

    public function show($slug)
    {
        $achievement = Achievement::with(['category', 'participants'])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.achievements.show', compact('achievement'));
    }
}
