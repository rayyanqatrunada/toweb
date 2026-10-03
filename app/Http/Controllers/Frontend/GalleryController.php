<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $albums = GalleryAlbum::select('id', 'title', 'slug')->published()->get();
        
        $query = \App\Models\GalleryItem::with('album')
                    ->whereHas('album', function($q) {
                        $q->published();
                    });

        $achievements = collect();
        if (!$request->has('album') || $request->album === 'all') {
            if ((int)$request->get('page', 1) === 1) {
                $achievements = \App\Models\Achievement::select('id', 'title', 'slug', 'rank', 'level', 'photo', 'date')
                                    ->whereNotNull('photo')
                                    ->published()
                                    ->latest('date')
                                    ->take(12)
                                    ->get();
            }
        } else {
            $query->whereHas('album', function($q) use ($request) {
                $q->where('slug', $request->album);
            });
        }

        $items = $query->orderBy('gallery_album_id')->orderBy('sort_order')->orderBy('id')->paginate(24);

        return view('frontend.gallery', compact('albums', 'items', 'achievements'));
    }

    public function show($slug)
    {
        $album = GalleryAlbum::with(['items' => function($q) {
            $q->orderBy('sort_order')->orderBy('id');
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.gallery_show', compact('album'));
    }
}
