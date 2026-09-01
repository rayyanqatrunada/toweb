<?php

namespace App\Filament\Resources\Achievements\RelationManagers;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ParticipantsRelationManager extends RelationManager
{
    protected static string $relationship = 'participants';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('student_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('student_id')
                    ->maxLength(50)
                    ->label('Student ID / NISN'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('student_name')
            ->columns([
                Tables\Columns\TextColumn::make('student_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_id')
                    ->searchable()
                    ->label('Student ID'),
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
            ]);
    }
}
