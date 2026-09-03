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

        if ($request->has('album') && $request->album !== 'all') {
            $query->whereHas('album', function($q) use ($request) {
                $q->where('slug', $request->album);
            });
        }

        $items = $query->orderBy('gallery_album_id')->orderBy('sort_order')->orderBy('id')->paginate(30);

        return view('frontend.gallery', compact('albums', 'items'));
    }

    public function show($slug)
    {
        $album = GalleryAlbum::with(['items' => function($q) {
            $q->orderBy('sort_order')->orderBy('id');
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.gallery_show', compact('album'));
    }
}
