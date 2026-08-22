<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Announcement;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::select('id', 'category_id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt')
                    ->with('category:id,name,slug')
                    ->published()->latest()->paginate(9);
        return view('frontend.news.index', compact('news'));
    }

    public function show($slug)
    {
        $post = Post::with('category', 'tags')->published()->where('slug', $slug)->firstOrFail();
        return view('frontend.news.show', compact('post'));
    }

    public function announcements()
    {
        $announcements = Announcement::select('id', 'title', 'slug', 'created_at', 'is_active')
                                     ->active()->latest()->paginate(10);
        return view('frontend.announcements.index', compact('announcements'));
    }

    public function announcementShow($slug)
    {
        $announcement = Announcement::active()->where('slug', $slug)->firstOrFail();
        return view('frontend.announcements.show', compact('announcement'));
    }
}
