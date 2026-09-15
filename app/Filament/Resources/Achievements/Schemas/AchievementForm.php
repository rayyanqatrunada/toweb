<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
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
                Group::make()
                    ->schema([
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
                        \Filament\Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                    ])->columns(2)->columnSpanFull(),

                                    ])->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make('Media')
                            ->schema([
                                FileUpload::make('photo')
                                    ->label('Foto Utama (Sertifikat / Piala / Panggung)')
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                    ->maxSize(3072)
                                    ->disk('public')
                                    ->directory('achievements')
                                    ->imageEditor()
                                    ->helperText('Foto utama yang ditampilkan di kartu rekam jejak dan banner prestasi.'),
                                FileUpload::make('supporting_photos')
                                    ->label('Foto Pendukung (Dokumentasi Tambahan)')
                                    ->multiple()
                                    ->reorderable()
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(3072)
                                    ->disk('public')
                                    ->directory('achievements/gallery')
                                    ->helperText('Foto dokumentasi tambahan selama kompetisi atau penyerahan piala. Jika tidak diisi (hanya 1 foto utama), bagian foto pendukung pada halaman publik otomatis disembunyikan.'),
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
                    ])->columns(2)->columnSpanFull(),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->helperText('Meta title for search engines.'),
                        Textarea::make('meta_description')
                            ->helperText('Brief description used by search engines.'),
                    ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }
}
