<?php

namespace App\Filament\Resources\IndustryPartners\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnershipsRelationManager extends RelationManager
{
    protected static string $relationship = 'partnerships';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Select::make('type')
                    ->options([
                        'mou' => 'MoU',
                        'internship' => 'Internship',
                        'recruitment' => 'Recruitment',
                    ])
                    ->required()
                    ->default('mou'),
                TextInput::make('title')
                    ->maxLength(255)
                    ->label('Partnership Title/Name'),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->afterOrEqual('start_date'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('document_file')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(5120)
                    ->disk('public')
                    ->directory('partnership_documents')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'terminated' => 'Terminated',
                    ])
                    ->required()
                    ->default('active'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('type')
                    ->badge()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'expired' => 'warning',
                        'terminated' => 'danger',
                        default => 'primary',
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
