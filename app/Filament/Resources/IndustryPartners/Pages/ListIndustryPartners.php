<?php

namespace App\Filament\Resources\IndustryPartners\Pages;

use App\Filament\Resources\IndustryPartners\IndustryPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIndustryPartners extends ListRecords
{
    protected static string $resource = IndustryPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
