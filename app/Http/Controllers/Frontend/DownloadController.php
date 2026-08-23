<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Download;
use App\Jobs\RecordDownloadAnalytics;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::with('category:id,name,slug')
            ->select('id', 'title', 'slug', 'description', 'file_type', 'file_size', 'download_category_id', 'published_at')
            ->public()
            ->latest('published_at')
            ->paginate(20);
        return view('frontend.download', compact('downloads'));
    }

    public function download($slug)
    {
        $download = Download::public()->where('slug', $slug)->firstOrFail();
        
        if (!Storage::disk('public')->exists($download->file_path)) {
            Log::warning('Download file missing in storage', [
                'download_id' => $download->id,
                'slug' => $slug,
                'file_path' => $download->file_path,
            ]);
            abort(404, 'File not found');
        }

        // Dispatch analytics logging to queue
        RecordDownloadAnalytics::dispatch($download->id);

        return response()->download(
            Storage::disk('public')->path($download->file_path),
            $download->file_name ?? 'download'
        );
    }
}
