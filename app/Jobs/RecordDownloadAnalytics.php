<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Download;
use Illuminate\Support\Facades\Log;

class RecordDownloadAnalytics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var array<int, int>
     */
    public $backoff = [5, 10, 20];

    public function __construct(
        protected int $downloadId
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Atomically increment the download count without triggering model events
        $updated = Download::where('id', $this->downloadId)->increment('download_count');
        
        if (!$updated) {
            // The download record might have been deleted, safely ignore.
            Log::info('RecordDownloadAnalytics job skipped: Download record not found.', [
                'download_id' => $this->downloadId
            ]);
        }
    }
}
