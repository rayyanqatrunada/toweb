<?php

namespace App\Filament\Resources\IndustryPartners;

use App\Filament\Resources\IndustryPartners\Pages\CreateIndustryPartner;
use App\Filament\Resources\IndustryPartners\Pages\EditIndustryPartner;
use App\Filament\Resources\IndustryPartners\Pages\ListIndustryPartners;
use App\Filament\Resources\IndustryPartners\Schemas\IndustryPartnerForm;
use App\Filament\Resources\IndustryPartners\Tables\IndustryPartnersTable;
use App\Models\IndustryPartner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IndustryPartnerResource extends Resource
{
    protected static ?string $model = IndustryPartner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;
    protected static string | \UnitEnum | null $navigationGroup = 'KARIER & INDUSTRI';

    public static function form(Schema $schema): Schema
    {
        return IndustryPartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IndustryPartnersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PartnershipsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIndustryPartners::route('/'),
            'create' => CreateIndustryPartner::route('/create'),
            'edit' => EditIndustryPartner::route('/{record}/edit'),
        ];
    }
}


