<?php

namespace App\Filament\Resources\Partnerships\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PartnershipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('industry_partner_id')
                    ->required()
                    ->numeric(),
                Select::make('type')
                    ->options([
                        'mou' => 'MoU',
                        'internship' => 'Internship',
                        'recruitment' => 'Recruitment',
                    ])
                    ->default('mou')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date'),
                TextInput::make('document_file'),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'terminated' => 'Terminated',
                    ])
                    ->default('active')
                    ->required(),
            ]);
    }
}
