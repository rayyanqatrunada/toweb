<?php

namespace App\Filament\Resources\IndustryPartnerBranches\Pages;

use App\Filament\Resources\IndustryPartnerBranches\IndustryPartnerBranchResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIndustryPartnerBranches extends ListRecords
{
    protected static string $resource = IndustryPartnerBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Cabang AHASS'),
        ];
    }
}
