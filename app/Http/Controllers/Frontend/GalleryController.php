<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::select('id', 'title', 'slug', 'thumbnail', 'published_at')
                              ->with(['featuredImage:id,gallery_album_id,file_path'])
                              ->withCount('items')
                              ->published()->latest()->paginate(9);
        return view('frontend.gallery', compact('albums'));
    }

    public function show($slug)
    {
        $album = GalleryAlbum::with(['items' => function($q) {
            $q->orderBy('sort_order')->orderBy('id');
        }])->published()->where('slug', $slug)->firstOrFail();
        
        return view('frontend.gallery_show', compact('album'));
    }
}
