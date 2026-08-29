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
            ->limit(8)
            ->get()
            ->map(function ($activity) {
                $description = $activity->description ?? 'Aktivitas';
                $subjectType = class_basename($activity->subject_type ?? '');
                $causerName = $activity->causer?->name ?? 'System';

                return [
                    'text' => "{$causerName} — {$description} {$subjectType}",
                    'time' => $activity->created_at->diffForHumans(),
                ];
            });

        return [
            'activities' => $activities,
        ];
    }
}
