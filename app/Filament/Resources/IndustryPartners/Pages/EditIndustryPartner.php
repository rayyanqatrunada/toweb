<?php

namespace App\Filament\Resources\IndustryPartners\Pages;

use App\Filament\Resources\IndustryPartners\IndustryPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIndustryPartner extends EditRecord
{
    protected static string $resource = IndustryPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
