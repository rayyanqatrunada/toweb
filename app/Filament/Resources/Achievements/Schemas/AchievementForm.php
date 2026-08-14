<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('level')
                    ->options([
                        'school' => 'School',
                        'district' => 'District',
                        'city' => 'City',
                        'province' => 'Province',
                        'national' => 'National',
                        'international' => 'International',
                    ])
                    ->default('district')
                    ->required(),
                TextInput::make('rank'),
                DatePicker::make('date')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('photo'),
            ]);
    }
}
