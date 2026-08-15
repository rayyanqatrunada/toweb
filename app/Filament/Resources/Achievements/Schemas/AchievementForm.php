<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->nullable(),
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
                        TextInput::make('rank')
                            ->maxLength(255),
                        TextInput::make('organizer')
                            ->maxLength(255),
                        DatePicker::make('date')
                            ->label('Achievement Date')
                            ->required(),
                        Textarea::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Media')
                    ->schema([
                        FileUpload::make('photo')->image()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                            ->image()
                            ->maxSize(2048)
                            ->disk('public')
                            ->directory('achievements')
                            ->imageEditor(),
                    ]),

                Section::make('Publishing')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->default('draft')
                            ->required(),
                        DateTimePicker::make('published_at'),
                    ])->columns(2),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->helperText('Meta title for search engines.'),
                        Textarea::make('meta_description')
                            ->helperText('Brief description used by search engines.'),
                    ]),
            ]);
    }
}
