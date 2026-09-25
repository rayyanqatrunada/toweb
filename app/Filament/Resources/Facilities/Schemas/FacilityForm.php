<?php

namespace App\Filament\Resources\Facilities\Schemas;

use App\Models\Facility;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas & Klasifikasi Fasilitas')
                    ->description('Tentukan nama sarana praktik, kategori kejuruan, dan kondisi operasional.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Fasilitas / Laboratorium')
                            ->placeholder('Contoh: Bengkel Praktik & Pit Servis Honda AHASS')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->maxLength(255)
                            ->columnSpan(2),

                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->columnSpan(2),

                        Select::make('category')
                            ->label('Kategori Fasilitas')
                            ->options(Facility::getCategoryOptions())
                            ->default('tefa_workshop')
                            ->required(),

                        Select::make('condition')
                            ->label('Kondisi Operasional')
                            ->options([
                                'good' => 'Kondisi Prima (Standar Industri)',
                                'fair' => 'Perawatan Berkala',
                                'poor' => 'Dalam Pemeliharaan',
                            ])
                            ->default('good')
                            ->required(),

                        TextInput::make('quantity')
                            ->label('Jumlah Unit / Stall')
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->required(),

                        TextInput::make('capacity')
                            ->label('Kapasitas Area / Siswa')
                            ->placeholder('Contoh: 36 Siswa / 6 Pit Servis')
                            ->maxLength(100),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Deskripsi & Dokumentasi Foto')
                    ->description('Uraikan fungsi dan pemanfaatan fasilitas bagi pembelajaran kejuruan.')
                    ->schema([
                        RichEditor::make('description')
                            ->label('Deskripsi Lengkap Fasilitas')
                            ->placeholder('Jelaskan peran sarana ini dalam mencetak kompetensi kejuruan...')
                            ->columnSpanFull(),

                        FileUpload::make('photo')
                            ->label('Foto Dokumentasi Fasilitas')
                            ->disk('public')
                            ->directory('facilities')
                            ->image()
                            ->imageEditor()
                            ->maxFiles(1)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('Spesifikasi Teknis & Standar K3LH')
                    ->description('Daftar peralatan utama dan standar keselamatan kerja yang diterapkan.')
                    ->schema([
                        Textarea::make('specifications')
                            ->label('Daftar Spesifikasi & Alat Utama (1 Baris per Item)')
                            ->placeholder("6 Stall Servis Resmi Berstandar AHASS\nBike Lift Hidrolik Kapasitas 500 kg\nExhaust Gas Extraction System\nScanner Diagnostik HIDS")
                            ->rows(5)
                            ->helperText('Tuliskan setiap peralatan atau spesifikasi penting dalam baris baru.')
                            ->columnSpanFull(),

                        TextInput::make('safety_standards')
                            ->label('Standar K3LH & Keselamatan Kerja')
                            ->placeholder('Contoh: Wearpack Standar AHASS, Safety Shoes, Tabung APAR 6 kg, Jalur Evakuasi')
                            ->helperText('Alat Pelindung Diri (APD) dan sarana keselamatan wajib di area ini.')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('Pengaturan Tampilan & Prioritas')
                    ->description('Atur urutan penayangan dan status unggulan pada website.')
                    ->schema([
                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0)
                            ->helperText('Semakin kecil angka (0, 1, 2...), semakin awal posisinya ditampilkan.'),

                        Toggle::make('is_featured')
                            ->label('Tandai Sebagai Fasilitas Unggulan')
                            ->helperText('Fasilitas unggulan akan ditonjolkan dengan lencana khusus pada grid fasilitas.')
                            ->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
