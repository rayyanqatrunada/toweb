<?php

namespace App\Filament\Resources\IndustryPartnerBranches\Pages;

use App\Filament\Resources\IndustryPartnerBranches\IndustryPartnerBranchResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIndustryPartnerBranch extends CreateRecord
{
    protected static string $resource = IndustryPartnerBranchResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
