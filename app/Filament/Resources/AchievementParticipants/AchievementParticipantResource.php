<?php

namespace App\Filament\Resources\AchievementParticipants;

use App\Filament\Resources\AchievementParticipants\Pages\CreateAchievementParticipant;
use App\Filament\Resources\AchievementParticipants\Pages\EditAchievementParticipant;
use App\Filament\Resources\AchievementParticipants\Pages\ListAchievementParticipants;
use App\Filament\Resources\AchievementParticipants\Schemas\AchievementParticipantForm;
use App\Filament\Resources\AchievementParticipants\Tables\AchievementParticipantsTable;
use App\Models\AchievementParticipant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AchievementParticipantResource extends Resource
{
    protected static ?string $model = AchievementParticipant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AchievementParticipantForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AchievementParticipantsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAchievementParticipants::route('/'),
            'create' => CreateAchievementParticipant::route('/create'),
            'edit' => EditAchievementParticipant::route('/{record}/edit'),
        ];
    }
}
