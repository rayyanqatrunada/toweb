<?php

namespace App\Filament\Resources\GalleryItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GalleryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('gallery_album_id')
                    ->relationship('album', 'title')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('file_path')
                    ->required()
                    ->directory('gallery-items')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml', 'video/mp4', 'video/webm'])
                    ->maxSize(10240),
                Select::make('type')
                    ->options(['image' => 'Image', 'video' => 'Video'])
                    ->default('image')
                    ->required(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\Toggle::make('is_featured')
                    ->default(false),
                \Filament\Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
