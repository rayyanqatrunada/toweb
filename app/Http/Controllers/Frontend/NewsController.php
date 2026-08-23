<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Announcement;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        // Cache per halaman — TTL 5 menit. Data berita relatif statis.
        $news = Cache::remember("news:index:page:{$page}", 300, fn() =>
            Post::select('id', 'category_id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt')
                ->with('category:id,name,slug')
                ->published()->latest()->paginate(9)
        );
        return view('frontend.news.index', compact('news'));
    }

    public function show($slug)
    {
        $post = Post::with('category', 'tags')->published()->where('slug', $slug)->firstOrFail();
        return view('frontend.news.show', compact('post'));
    }

    public function announcements(Request $request)
    {
        $page = $request->get('page', 1);
        // Cache per halaman — TTL 5 menit.
        $announcements = Cache::remember("announcements:index:page:{$page}", 300, fn() =>
            Announcement::select('id', 'title', 'slug', 'created_at', 'is_active')
                         ->active()->latest()->paginate(10)
        );
        return view('frontend.announcements.index', compact('announcements'));
    }

    public function announcementShow($slug)
    {
        $announcement = Announcement::active()->where('slug', $slug)->firstOrFail();
        return view('frontend.announcements.show', compact('announcement'));
    }
}
