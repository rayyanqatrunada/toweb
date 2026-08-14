<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Facility;
use App\Models\Teacher;
use App\Models\GalleryAlbum;
use App\Models\IndustryPartner;
use App\Models\JobVacancy;
use App\Models\Download;

class FrontendController extends Controller
{
    public function index()
    {
        $latestNews = Post::with('category')->where('status', 'published')->latest()->take(3)->get();
        $partners = IndustryPartner::latest()->take(6)->get();
        return view('frontend.home', compact('latestNews', 'partners'));
    }

    public function about()
    {
        $facilities = Facility::all();
        $teachers = Teacher::with('user')->get();
        return view('frontend.about', compact('facilities', 'teachers'));
    }

    public function news()
    {
        $news = Post::with('category')->where('status', 'published')->latest()->paginate(9);
        return view('frontend.news.index', compact('news'));
    }

    public function newsShow($slug)
    {
        $post = Post::with('category', 'tags')->where('status', 'published')->where('slug', $slug)->firstOrFail();
        return view('frontend.news.show', compact('post'));
    }

    public function gallery()
    {
        $albums = GalleryAlbum::where('status', 'published')->latest()->paginate(9);
        return view('frontend.gallery', compact('albums'));
    }

    public function partnership()
    {
        $partners = IndustryPartner::with(['jobVacancies' => function($q) {
            $q->where('status', 'open');
        }])->get();
        return view('frontend.partnership', compact('partners'));
    }

    public function download()
    {
        $downloads = Download::with('category')->latest()->get();
        return view('frontend.download', compact('downloads'));
    }
}
