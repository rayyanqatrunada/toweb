<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        $hasParticipants = Schema::hasTable('achievement_participants');
        $withRelations = $hasParticipants ? ['category', 'participants'] : ['category'];

        // Stats
        $totalAchievements = Achievement::published()->count();
        $nationalCount = Achievement::published()->where('level', 'national')->count();

        // 6 recent for roadmap (ordered chronologically: oldest first -> newest last)
        $recentAchievements = Achievement::with($withRelations)
                                ->published()
                                ->latest('date')
                                ->take(6)
                                ->get()
                                ->sortBy('date')
                                ->values();

        // 2 featured (Juara 1, highest level first, with photo)
        $levelOrder = "CASE level WHEN 'national' THEN 1 WHEN 'province' THEN 2 WHEN 'district' THEN 3 ELSE 4 END ASC";
        $isMySql = in_array(\Illuminate\Support\Facades\DB::getDriverName(), ['mysql', 'mariadb']);
        $rankOrder = $isMySql
            ? "CAST(REGEXP_REPLACE(rank, '[^0-9]', '') AS UNSIGNED) ASC"
            : "rank ASC";

        $featuredAchievements = Achievement::with($withRelations)
                                ->published()
                                ->whereNotNull('photo')
                                ->orderByRaw($levelOrder)
                                ->orderByRaw($rankOrder)
                                ->orderBy('date', 'desc')
                                ->take(2)
                                ->get();

        // All achievements with filter
        $query = Achievement::with($withRelations)->published();

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
            $query->where(function($q) use ($search, $hasParticipants) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('organizer', 'like', "%{$search}%");

                if ($hasParticipants) {
                    $q->orWhereHas('participants', function($pq) use ($search) {
                        $pq->where('student_name', 'like', "%{$search}%");
                    });
                }
            });
        }

        $allAchievements = $query->latest('date')->paginate(12);

        // Safeguard participants relation in collections if table does not exist
        if (!$hasParticipants) {
            $emptyParticipants = collect();
            $recentAchievements->each(fn($a) => $a->setRelation('participants', $emptyParticipants));
            $featuredAchievements->each(fn($a) => $a->setRelation('participants', $emptyParticipants));
            $allAchievements->getCollection()->each(fn($a) => $a->setRelation('participants', $emptyParticipants));
        }

        // Categories used by achievements
        $categories = Category::whereHas('achievements')->get();

        // Available years
        $yearExpr = \Illuminate\Support\Facades\DB::getDriverName() === 'sqlite'
            ? "strftime('%Y', date) as year"
            : "YEAR(date) as year";

        $years = Achievement::published()
                    ->selectRaw($yearExpr)
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
        $hasParticipants = Schema::hasTable('achievement_participants');
        $withRelations = $hasParticipants ? ['category', 'participants'] : ['category'];

        $achievement = Achievement::with($withRelations)->published()->where('slug', $slug)->firstOrFail();

        if (!$hasParticipants) {
            $achievement->setRelation('participants', collect());
        }

        $relatedAchievements = Achievement::published()
            ->where('id', '!=', $achievement->id)
            ->when($achievement->category_id, fn($q) => $q->orderByRaw('category_id = ? desc', [$achievement->category_id]))
            ->latest('date')
            ->take(3)
            ->get();

        if (!$hasParticipants) {
            $emptyParticipants = collect();
            $relatedAchievements->each(fn($a) => $a->setRelation('participants', $emptyParticipants));
        }

        return view('frontend.achievements.show', compact('achievement', 'relatedAchievements'));
    }
}
