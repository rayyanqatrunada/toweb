<?php

namespace App\Filament\Resources\Internships;

use App\Filament\Resources\Internships\Pages\CreateInternship;
use App\Filament\Resources\Internships\Pages\EditInternship;
use App\Filament\Resources\Internships\Pages\ListInternships;
use App\Filament\Resources\Internships\Schemas\InternshipForm;
use App\Filament\Resources\Internships\Tables\InternshipsTable;
use App\Models\Internship;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InternshipResource extends Resource
{
    protected static ?string $model = Internship::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;
    protected static string | \UnitEnum | null $navigationGroup = '2. Kemitraan & Karir';

    public static function form(Schema $schema): Schema
    {
        return InternshipForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InternshipsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ParticipantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInternships::route('/'),
            'create' => CreateInternship::route('/create'),
            'edit' => EditInternship::route('/{record}/edit'),
        ];
    }
}


