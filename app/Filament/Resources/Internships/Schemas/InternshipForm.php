<?php

namespace App\Filament\Resources\Internships\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InternshipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Internship Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Program Title (e.g. PKL 2026 Batch 1)'),
                        Select::make('industry_partner_id')
                            ->relationship('industryPartner', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('partnership_id')
                            ->relationship('partnership', 'title')
                            ->searchable()
                            ->preload()
                            ->label('Related Partnership (MoU) (Optional)'),
                    ])->columns(1),

                Section::make('Period')
                    ->schema([
                        DatePicker::make('start_date')
                            ->required(),
                        DatePicker::make('end_date')
                            ->afterOrEqual('start_date'),
                    ])->columns(2)->columnSpanFull(),

                Section::make('Status')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'planned' => 'Planned',
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->default('planned'),
                    ]),

                Section::make('Description')
                    ->schema([
                        Textarea::make('description')
                            ->columnSpanFull(),
                    ]),
            ])->columns(2);
    }
}
