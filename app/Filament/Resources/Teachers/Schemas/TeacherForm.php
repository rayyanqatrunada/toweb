<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Informasi Utama')
                    ->schema([
                \Filament\Forms\Components\Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                TextInput::make('name')
                    ->required(),
                TextInput::make('nip'),
                TextInput::make('position'),
                TextInput::make('specialization')
                    ->label('Spesialisasi'),
                TextInput::make('phone')
                    ->tel(),
                \Filament\Forms\Components\Textarea::make('bio')
                    ->label('Biografi Singkat')
                    ->rows(3)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('teachers'),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->label('Aktif / Tampilkan di Publik')
                    ->default(true),
                \Filament\Forms\Components\Toggle::make('is_head_of_department')
                    ->label('Jadikan Kepala Jurusan')
                    ->helperText('Jika diaktifkan, otomatis akan menggantikan kepala jurusan yang aktif saat ini.'),
                                ])->columns(2)->columnSpanFull(),
            ]);
    }
}
