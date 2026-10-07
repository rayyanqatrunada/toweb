<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Spatie\Activitylog\Models\Activity;

class RecentActivityWidget extends Widget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 1;

    protected string $view = 'filament.widgets.recent-activity';

    protected function getViewData(): array
    {
        $activities = Activity::query()
            ->with('causer')
            ->latest()
            ->limit(10)
            ->get()
            ->map(function ($activity) {
                $description = $activity->description ?? 'Aktivitas';
                $subjectType = class_basename($activity->subject_type ?? '');
                $causerName = $activity->causer?->name ?? 'System';

                // Ekstrak IP Address & Perangkat dari JSON properties
                $props = $activity->properties ?? [];
                $ip = $props['ip'] ?? null;
                $userAgent = $props['user_agent'] ?? null;

                $deviceInfo = null;
                if ($userAgent) {
                    if (str_contains($userAgent, 'Mobile') || str_contains($userAgent, 'Android') || str_contains($userAgent, 'iPhone')) {
                        $deviceInfo = 'HP/Mobile';
                    } elseif (str_contains($userAgent, 'Windows')) {
                        $deviceInfo = 'Windows';
                    } elseif (str_contains($userAgent, 'Macintosh') || str_contains($userAgent, 'Mac OS')) {
                        $deviceInfo = 'Mac';
                    } elseif (str_contains($userAgent, 'Linux')) {
                        $deviceInfo = 'Linux';
                    }
                }

                return [
                    'causer' => $causerName,
                    'text' => "{$causerName} — {$description} {$subjectType}",
                    'ip' => $ip,
                    'device' => $deviceInfo,
                    'user_agent' => $userAgent,
                    'time' => $activity->created_at->diffForHumans(),
                    'full_time' => $activity->created_at->translatedFormat('d M Y, H:i:s'),
                ];
            });

        return [
            'activities' => $activities,
        ];
    }
}
