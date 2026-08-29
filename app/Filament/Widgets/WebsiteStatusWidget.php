<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class WebsiteStatusWidget extends Widget
{
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 1;

    protected string $view = 'filament.widgets.website-status';

    protected function getViewData(): array
    {
        // Lightweight checks — no heavy operations
        $dbConnected = true;
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            $dbConnected = false;
        }

        $cacheActive = true;
        try {
            Cache::store()->put('health_check', true, 5);
            Cache::store()->forget('health_check');
        } catch (\Exception $e) {
            $cacheActive = false;
        }

        $storageWritable = is_writable(storage_path('app'));

        return [
            'statuses' => [
                ['label' => 'Website', 'ok' => true, 'text' => 'Online'],
                ['label' => 'Database', 'ok' => $dbConnected, 'text' => $dbConnected ? 'Connected' : 'Error'],
                ['label' => 'Cache', 'ok' => $cacheActive, 'text' => $cacheActive ? 'Active' : 'Error'],
                ['label' => 'Storage', 'ok' => $storageWritable, 'text' => $storageWritable ? 'Available' : 'Read-only'],
            ],
        ];
    }
}
