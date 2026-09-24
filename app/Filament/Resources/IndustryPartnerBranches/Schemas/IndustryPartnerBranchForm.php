<?php

namespace App\Filament\Resources\IndustryPartnerBranches\Schemas;

use App\Filament\Resources\IndustryPartners\RelationManagers\PartnerBranchesRelationManager;
use App\Models\IndustryPartner;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class IndustryPartnerBranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Cabang & Wilayah (Kabupaten Jepara)')
                    ->description('Lengkapi kode bengkel AHASS, nama cabang resmi, dan kecamatan.')
                    ->schema([
                        Hidden::make('industry_partner_id')
                            ->default(fn () => IndustryPartner::first()?->id ?? 1),

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
                            ->options(PartnerBranchesRelationManager::getDistrictOptions())
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
                            ->helperText('Digunakan untuk navigasi rute langsung ke lokasi bengkel.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Kontak & Pembimbing DU/DI (PIC)')
                    ->description('Data komunikasi cabang dan penanggung jawab PKL siswa.')
                    ->schema([
                        TextInput::make('phone')
                            ->label('Nomor Telepon Kantor / Bengkel')
                            ->tel()
                            ->placeholder('0291-771234')
                            ->maxLength(50),

                        TextInput::make('whatsapp')
                            ->label('Nomor WhatsApp Bengkel / CS')
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
                            ->helperText('Cabang utama akan diprioritaskan di posisi teratas dengan lencana bintang.')
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
}
