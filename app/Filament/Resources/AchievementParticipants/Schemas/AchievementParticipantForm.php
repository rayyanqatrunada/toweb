<?php

namespace App\Filament\Resources\AchievementParticipants\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AchievementParticipantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('achievement_id')
                    ->required()
                    ->numeric(),
                TextInput::make('student_name')
                    ->required(),
                TextInput::make('student_id'),
            ]);
    }
}
