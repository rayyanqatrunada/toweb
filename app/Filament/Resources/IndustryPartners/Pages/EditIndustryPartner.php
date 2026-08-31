<?php

namespace App\Filament\Resources\IndustryPartners\Pages;

use App\Filament\Resources\IndustryPartners\IndustryPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIndustryPartner extends EditRecord
{
    protected static string $resource = IndustryPartnerResource::class;

    public function mount(int | string $record = null): void
    {
        // Selalu set record ke ID 1 (atau buat jika belum ada)
        $partner = \App\Models\IndustryPartner::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Mitra Industri Utama', 
                'slug' => 'mitra-industri-utama',
                'status' => 'published',
                'industry_type' => 'Data mitra industri belum ditambahkan di sistem.'
            ]
        );

        parent::mount($partner->id);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
