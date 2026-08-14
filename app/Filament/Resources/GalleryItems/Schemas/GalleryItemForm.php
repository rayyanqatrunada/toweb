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
                TextInput::make('gallery_album_id')
                    ->required()
                    ->numeric(),
                TextInput::make('file_path')
                    ->required(),
                Select::make('type')
                    ->options(['image' => 'Image', 'video' => 'Video'])
                    ->default('image')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
