<?php

namespace App\Filament\Resources\GalleryAlbums\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $recordTitleAttribute = 'title';
    
    protected static ?string $title = 'Gallery Images';

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                Forms\Components\FileUpload::make('file_path')->image()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->image()
                    ->required()
                    ->maxSize(5120) // 5MB
                    ->directory('galleries/items')
                    ->columnSpanFull(),
                Forms\Components\Select::make('aspect_ratio')
                    ->label('Ukuran Layout Grid')
                    ->options([
                        '1:1' => 'Persegi (1:1 / Normal)',
                        '4:3' => 'Mendatar (4:3 / Lebar)',
                        '3:4' => 'Memanjang (3:4 / Tinggi)',
                        'large' => 'Besar (2x2 / Dominan)',
                    ])
                    ->default('1:1')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alt_text')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Caption')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Set as Featured Image')
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\ImageColumn::make('file_path')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                \Filament\Actions\CreateAction::make(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order');
    }
}
