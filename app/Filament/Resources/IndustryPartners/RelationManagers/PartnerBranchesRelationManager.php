<?php

namespace App\Filament\Resources\IndustryPartners\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PartnerBranchesRelationManager extends RelationManager
{
    protected static string $relationship = 'branches';

    protected static ?string $title = 'Cabang & Lokasi AHASS (Kabupaten Jepara)';
    protected static ?string $modelLabel = 'Cabang AHASS';
    protected static ?string $pluralModelLabel = 'Cabang AHASS';

    public static function getDistrictOptions(): array
    {
        return [
            'Bangsri' => 'Bangsri',
            'Jepara Kota' => 'Jepara Kota',
            'Welahan' => 'Welahan',
            'Pecangaan' => 'Pecangaan',
            'Mayong' => 'Mayong',
            'Keling' => 'Keling',
            'Tahunan' => 'Tahunan',
            'Mlonggo' => 'Mlonggo',
            'Batealit' => 'Batealit',
            'Kedung' => 'Kedung',
            'Nalumsari' => 'Nalumsari',
            'Kalinyamatan' => 'Kalinyamatan',
            'Pakis Aji' => 'Pakis Aji',
            'Kembang' => 'Kembang',
            'Donorojo' => 'Donorojo',
            'Karimunjawa' => 'Karimunjawa',
        ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Cabang & Wilayah')
                    ->description('Lengkapi kode AHASS, nama cabang resmi, dan kecamatan di Kabupaten Jepara.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Cabang AHASS')
                            ->placeholder('Contoh: AHASS 07123 - Astra Motor Bangsri')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        TextInput::make('branch_code')
                            ->label('Kode Bengkel AHASS')
                            ->placeholder('Contoh: AHASS 07123')
                            ->maxLength(50),

                        Select::make('district')
                            ->label('Kecamatan (Kabupaten Jepara)')
                            ->options(static::getDistrictOptions())
                            ->required()
                            ->searchable(),

                        TextInput::make('city')
                            ->label('Kota / Kabupaten')
                            ->default('Kabupaten Jepara')
                            ->required()
                            ->maxLength(100),

                        Textarea::make('address')
                            ->label('Alamat Lengkap Bengkel')
                            ->placeholder('Contoh: Jl. Raya Bangsri - Jepara KM 1, Bangsri, Kabupaten Jepara')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),

                        TextInput::make('google_maps_url')
                            ->label('Tautan Google Maps')
                            ->placeholder('https://maps.google.com/?q=...')
                            ->url()
                            ->maxLength(1000)
                            ->helperText('Digunakan pengunjung website untuk navigasi rute langsung ke bengkel.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Kontak & Pembimbing DU/DI (PIC)')
                    ->description('Data komunikasi cabang dan kepala bengkel untuk keperluan koordinasi PKL.')
                    ->schema([
                        TextInput::make('phone')
                            ->label('Nomor Telepon Kantor / Bengkel')
                            ->tel()
                            ->placeholder('0291-771234')
                            ->maxLength(50),

                        TextInput::make('whatsapp')
                            ->label('Nomor WhatsApp CS / Bengkel')
                            ->tel()
                            ->placeholder('081225567890')
                            ->helperText('Format: 08... akan otomatis dikonversi ke link wa.me')
                            ->maxLength(50),

                        TextInput::make('pic_name')
                            ->label('Nama Kepala Bengkel / Pembimbing')
                            ->placeholder('Contoh: Budi Santoso, S.T. (Ka. Bengkel)')
                            ->maxLength(150),

                        TextInput::make('pic_phone')
                            ->label('Nomor HP Pembimbing (PIC)')
                            ->tel()
                            ->placeholder('081225567890')
                            ->maxLength(50),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Kapasitas PKL & Fasilitas')
                    ->description('Daya tampung siswa magang dan kelengkapan pit servis cabang.')
                    ->schema([
                        TextInput::make('internship_quota')
                            ->label('Kapasitas / Kuota Siswa PKL')
                            ->placeholder('Contoh: 4 - 6 Siswa / Gelombang')
                            ->maxLength(100),

                        Textarea::make('facilities')
                            ->label('Fasilitas Bengkel (1 Baris per Item)')
                            ->placeholder("6 Pit Servis Hidrolik\nExhaust Gas Extraction\nScanner HIDS Honda\nRuang Tunggu AC")
                            ->rows(3)
                            ->columnSpanFull(),

                        FileUpload::make('photo')
                            ->label('Foto Dokumentasi Bengkel / Fasad')
                            ->disk('public')
                            ->directory('partner_branches')
                            ->image()
                            ->imageEditor()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),

                        Toggle::make('is_main_branch')
                            ->label('Tandai Sebagai Cabang Utama / Terdekat')
                            ->helperText('Cabang utama akan diprioritaskan di baris teratas dengan ikon bintang.')
                            ->default(false),

                        Toggle::make('is_active')
                            ->label('Status Kerjasama Aktif')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
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
                    ->options(static::getDistrictOptions()),

                TernaryFilter::make('is_main_branch')
                    ->label('Cabang Utama'),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->headerActions([
                CreateAction::make()->label('Tambah Cabang AHASS'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
