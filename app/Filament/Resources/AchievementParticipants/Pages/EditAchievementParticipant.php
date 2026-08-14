<?php

namespace App\Filament\Resources\AchievementParticipants\Pages;

use App\Filament\Resources\AchievementParticipants\AchievementParticipantResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAchievementParticipant extends EditRecord
{
    protected static string $resource = AchievementParticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
