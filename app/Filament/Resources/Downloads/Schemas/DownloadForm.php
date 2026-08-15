<?php

namespace App\Filament\Resources\Downloads\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class DownloadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Select::make('download_category_id')
                            ->relationship('category', 'name')
                            ->label('Category')
                            ->nullable(),
                        Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('File Upload')
                    ->schema([
                        FileUpload::make('file_path')
                            ->label('Document File')
                            ->required()
                            ->directory('documents')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                'application/vnd.ms-excel',
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/vnd.ms-powerpoint',
                                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                                'application/zip',
                            ])
                            ->maxSize(25600) // 25MB
                            ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                                if ($state) {
                                    if (is_array($state)) {
                                        $file = array_values($state)[0] ?? null;
                                    } else {
                                        $file = $state;
                                    }
                                    
                                    if ($file && $file instanceof \Illuminate\Http\UploadedFile) {
                                        $set('file_name', $file->getClientOriginalName());
                                        $set('file_size', $file->getSize());
                                        $set('file_type', $file->getClientOriginalExtension());
                                    }
                                }
                            })
                            ->columnSpanFull(),
                        TextInput::make('file_name')
                            ->maxLength(255),
                        TextInput::make('file_type')
                            ->maxLength(50),
                        TextInput::make('file_size')
                            ->numeric()
                            ->label('File Size (Bytes)')
                            ->default(0),
                        TextInput::make('download_count')
                            ->numeric()
                            ->disabled()
                            ->default(0),
                    ])->columns(2),

                Section::make('Visibility & Publishing')
                    ->schema([
                        Toggle::make('is_public')
                            ->label('Public Document')
                            ->helperText('Jika dinonaktifkan, dokumen hanya terlihat di internal/backend.')
                            ->default(true),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('draft'),
                        DateTimePicker::make('published_at'),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),

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
