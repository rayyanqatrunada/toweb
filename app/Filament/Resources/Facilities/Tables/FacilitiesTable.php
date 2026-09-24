<?php

namespace App\Filament\Resources\Facilities\Tables;

use App\Models\Facility;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FacilitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->size(54)
                    ->square()
                    ->extraImgAttributes(['class' => 'rounded-lg object-cover']),

                TextColumn::make('name')
                    ->label('Nama Fasilitas')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->description(fn (Facility $record): string => Str::limit(strip_tags($record->description ?? ''), 55)),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => Facility::getCategoryOptions()[$state] ?? ($state ?: '-'))
                    ->colors([
                        'primary' => 'tefa_workshop',
                        'info' => 'electrical_lab',
                        'warning' => 'engine_lab',
                        'success' => 'chassis_lab',
                        'gray' => 'theory_room',
                        'secondary' => 'tool_storage',
                    ])
                    ->sortable(),

                TextColumn::make('capacity')
                    ->label('Kapasitas')
                    ->placeholder('-')
                    ->toggleable(),

                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->suffix(' Unit')
                    ->sortable(),

                TextColumn::make('condition')
                    ->label('Kondisi')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'good' => 'Prima',
                        'fair' => 'Perawatan',
                        'poor' => 'Pemeliharaan',
                        default => ucfirst($state),
                    })
                    ->colors([
                        'success' => 'good',
                        'warning' => 'fair',
                        'danger' => 'poor',
                    ]),

                ToggleColumn::make('is_featured')
                    ->label('Unggulan')
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori Fasilitas')
                    ->options(Facility::getCategoryOptions()),

                SelectFilter::make('condition')
                    ->label('Kondisi')
                    ->options([
                        'good' => 'Kondisi Prima',
                        'fair' => 'Perawatan Berkala',
                        'poor' => 'Dalam Pemeliharaan',
                    ]),

                TernaryFilter::make('is_featured')
                    ->label('Status Unggulan'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
