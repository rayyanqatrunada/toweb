<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::with('category')->published()->latest()->paginate(12);
        return view('frontend.achievements.index', compact('achievements'));
    }

    public function show($slug)
    {
        $achievement = Achievement::with(['category', 'participants' => function($q) {
            $q->select('id', 'achievement_id', 'student_name'); // Hide student_id
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.achievements.show', compact('achievement'));
    }
}
