<?php

namespace App\Filament\Resources\Alumnis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AlumniForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('student_id')
                    ->required(),
                TextInput::make('graduation_year')
                    ->required()
                    ->numeric(),
                Select::make('current_status')
                    ->options([
                        'working' => 'Working',
                        'studying' => 'Studying',
                        'entrepreneur' => 'Entrepreneur',
                        'looking_for_job' => 'Looking for Job',
                    ])
                    ->default('looking_for_job')
                    ->required(),
                TextInput::make('company_name'),
                TextInput::make('university_name'),
                Textarea::make('testimonial')
                    ->columnSpanFull(),
                TextInput::make('photo'),
            ]);
    }
}
