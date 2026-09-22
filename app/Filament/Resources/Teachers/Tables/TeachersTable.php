<?php

namespace App\Filament\Resources\Teachers\Tables;

use App\Models\Teacher;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('is_head_of_department', 'desc')
            ->columns([
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular()
                    ->disk('public')
                    ->size(46)
                    ->defaultImageUrl(fn (Teacher $record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=0f172a&color=ffffff&bold=true'),

                TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),

                TextColumn::make('position')
                    ->label('Jabatan')
                    ->searchable()
                    ->badge()
                    ->color('gray')
                    ->placeholder('-'),

                TextColumn::make('specialization')
                    ->label('Bidang Spesialisasi')
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(),

                IconColumn::make('is_head_of_department')
                    ->label('Kepala Program')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->falseIcon('heroicon-o-minus')
                    ->trueColor('warning')
                    ->falseColor('gray')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif / Publik')
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Kontak / WA')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('user_id')
                    ->label('User ID')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                TernaryFilter::make('is_head_of_department')
                    ->label('Kepala Program Keahlian'),
                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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

