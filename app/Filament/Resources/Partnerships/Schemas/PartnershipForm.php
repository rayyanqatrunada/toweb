<?php

namespace App\Filament\Resources\Partnerships\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PartnershipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('industry_partner_id')
                    ->relationship('industryPartner', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('type')
                    ->options([
                        'mou' => 'MoU',
                        'internship' => 'Internship',
                        'recruitment' => 'Recruitment',
                    ])
                    ->required()
                    ->default('mou'),
                TextInput::make('title')
                    ->maxLength(255)
                    ->label('Partnership Title/Name'),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->afterOrEqual('start_date'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('document_file')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('partnership_documents')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'terminated' => 'Terminated',
                    ])
                    ->required()
                    ->default('active'),
            ]);
    }
}
