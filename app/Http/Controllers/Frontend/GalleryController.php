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
            if ($request->get('page', 1) == 1) {
                $achievements = \App\Models\Achievement::whereNotNull('photo')
                                    ->published()
                                    ->orderBy('date', 'desc')
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
