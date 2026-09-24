<?php

namespace App\Filament\Resources\IndustryPartnerBranches;

use App\Filament\Resources\IndustryPartnerBranches\Pages\CreateIndustryPartnerBranch;
use App\Filament\Resources\IndustryPartnerBranches\Pages\EditIndustryPartnerBranch;
use App\Filament\Resources\IndustryPartnerBranches\Pages\ListIndustryPartnerBranches;
use App\Filament\Resources\IndustryPartnerBranches\Schemas\IndustryPartnerBranchForm;
use App\Filament\Resources\IndustryPartnerBranches\Tables\IndustryPartnerBranchesTable;
use App\Models\IndustryPartnerBranch;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IndustryPartnerBranchResource extends Resource
{
    protected static ?string $model = IndustryPartnerBranch::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;
    protected static string | \UnitEnum | null $navigationGroup = 'Kemitraan & Karir';
    
    protected static ?string $navigationLabel = 'Cabang & Lokasi AHASS';
    protected static ?int $navigationSort = 3;
    protected static ?string $modelLabel = 'Cabang AHASS';
    protected static ?string $pluralModelLabel = 'Cabang & Lokasi AHASS';

    public static function form(Schema $schema): Schema
    {
        return IndustryPartnerBranchForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IndustryPartnerBranchesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIndustryPartnerBranches::route('/'),
            'create' => CreateIndustryPartnerBranch::route('/create'),
            'edit' => EditIndustryPartnerBranch::route('/{record}/edit'),
        ];
    }
}
