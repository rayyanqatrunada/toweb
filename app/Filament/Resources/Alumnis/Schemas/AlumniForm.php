<?php

namespace App\Filament\Resources\Alumnis\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AlumniForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identity')
                    ->description('Private & basic identification.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        TextInput::make('graduation_year')
                            ->numeric()
                            ->required()
                            ->minValue(1900)
                            ->maxValue(date('Y') + 1),
                        TextInput::make('student_id')
                            ->label('Student ID / NISN')
                            ->maxLength(50)
                            ->unique(ignoreRecord: true)
                            ->required(),
                    ])->columns(2),

                Section::make('Profile')
                    ->schema([
                        FileUpload::make('photo')->image()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                            ->image()
                            ->maxSize(2048)
                            ->directory('alumni-photos')
                            ->columnSpanFull(),
                        TextInput::make('city')
                            ->maxLength(255),
                        TextInput::make('education')
                            ->label('Current/Latest Education')
                            ->maxLength(255),
                        RichEditor::make('bio')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Career')
                    ->schema([
                        TextInput::make('current_occupation')
                            ->maxLength(255),
                        TextInput::make('current_company')
                            ->maxLength(255),
                        RichEditor::make('achievements')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Privacy & Visibility')
                    ->schema([
                        Toggle::make('is_public')
                            ->label('Public Profile')
                            ->helperText('Jika dinonaktifkan, profil alumni tidak akan ditampilkan pada direktori publik.')
                            ->default(false),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('draft')
                            ->helperText('Status rilis. Hanya "Published" & "Public Profile" aktif yang akan tampil di publik.'),
                        DateTimePicker::make('published_at')
                            ->label('Published At'),
                    ])->columns(3),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255),
                        Textarea::make('meta_description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
