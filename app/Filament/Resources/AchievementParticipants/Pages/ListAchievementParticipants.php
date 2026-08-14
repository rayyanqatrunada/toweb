<?php

namespace App\Filament\Resources\AchievementParticipants\Pages;

use App\Filament\Resources\AchievementParticipants\AchievementParticipantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAchievementParticipants extends ListRecords
{
    protected static string $resource = AchievementParticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
