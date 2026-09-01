<?php

namespace App\Filament\Resources\Internships\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParticipantsRelationManager extends RelationManager
{
    protected static string $relationship = 'participants';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('student_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('student_id')
                    ->label('Student ID / NISN')
                    ->maxLength(50),
                TextInput::make('role')
                    ->maxLength(255)
                    ->label('Role / Position'),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'dropped' => 'Dropped',
                    ])
                    ->required()
                    ->default('active'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('student_name')
            ->columns([
                TextColumn::make('student_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('student_id')
                    ->label('Student ID')
                    ->searchable(),
                TextColumn::make('role')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planned' => 'gray',
                        'active' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    })
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
            ]);
    }
}
