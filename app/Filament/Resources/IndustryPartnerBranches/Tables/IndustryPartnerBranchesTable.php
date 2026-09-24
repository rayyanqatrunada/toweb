<?php

namespace App\Filament\Resources\IndustryPartnerBranches\Tables;

use App\Filament\Resources\IndustryPartners\RelationManagers\PartnerBranchesRelationManager;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class IndustryPartnerBranchesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->size(46)
                    ->square()
                    ->defaultImageUrl(fn () => asset('storage/industry_partners/01M1DB84NZV7C26TS184CWVE8F.png')),

                TextColumn::make('name')
                    ->label('Nama Cabang AHASS')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->description(fn ($record) => $record->address),

                TextColumn::make('branch_code')
                    ->label('Kode')
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                TextColumn::make('district')
                    ->label('Kecamatan')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('internship_quota')
                    ->label('Kuota PKL')
                    ->placeholder('-'),

                TextColumn::make('pic_name')
                    ->label('Kepala Bengkel / PIC')
                    ->placeholder('-')
                    ->toggleable(),

                TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->placeholder('-')
                    ->toggleable(),

                IconColumn::make('is_main_branch')
                    ->label('Utama')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->falseIcon('heroicon-o-minus')
                    ->trueColor('warning')
                    ->falseColor('gray')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('district')
                    ->label('Kecamatan')
                    ->options(PartnerBranchesRelationManager::getDistrictOptions()),

                TernaryFilter::make('is_main_branch')
                    ->label('Cabang Utama'),

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
