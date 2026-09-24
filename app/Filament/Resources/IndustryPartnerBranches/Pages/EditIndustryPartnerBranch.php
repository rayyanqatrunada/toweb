<?php

namespace App\Filament\Resources\IndustryPartnerBranches\Pages;

use App\Filament\Resources\IndustryPartnerBranches\IndustryPartnerBranchResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIndustryPartnerBranch extends EditRecord
{
    protected static string $resource = IndustryPartnerBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
