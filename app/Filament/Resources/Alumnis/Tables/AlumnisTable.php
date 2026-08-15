<?php

namespace App\Filament\Resources\Alumnis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class AlumnisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->circular(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('graduation_year')
                    ->sortable(),
                TextColumn::make('current_occupation')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('current_company')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                IconColumn::make('is_public')
                    ->boolean()
                    ->label('Public')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'warning',
                        default => 'secondary',
                    })
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('graduation_year', 'desc')
            ->filters([
                SelectFilter::make('graduation_year')
                    ->options(function () {
                        $years = \App\Models\Alumni::select('graduation_year')->distinct()->pluck('graduation_year')->toArray();
                        rsort($years);
                        return array_combine($years, $years);
                    })
                    ->searchable(),
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),
                TernaryFilter::make('is_public')
                    ->label('Public Visibility'),
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
