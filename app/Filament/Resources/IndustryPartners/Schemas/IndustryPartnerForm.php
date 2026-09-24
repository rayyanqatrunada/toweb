<?php

namespace App\Filament\Resources\IndustryPartners\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class IndustryPartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('PartnerManagementTabs')
                    ->tabs([
                        // TAB 1: IDENTITAS & MOU
                        Tab::make('Identitas & Perjanjian MoU')
                            ->icon('heroicon-o-building-office-2')
                            ->schema([
                                Section::make('Identitas Resmi Mitra Industri')
                                    ->description('Nama perusahaan, status binaan, dan nomor perjanjian kerjasama (MoU).')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Nama Resmi Mitra Industri')
                                            ->placeholder('Contoh: PT Astra Honda Motor (Astra Motor)')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpan(2),

                                        TextInput::make('slug')
                                            ->label('Slug URL')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255)
                                            ->columnSpan(2),

                                        TextInput::make('industry_type')
                                            ->label('Kategori Bidang Industri')
                                            ->placeholder('Contoh: Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)')
                                            ->maxLength(255),

                                        TextInput::make('partnership_level')
                                            ->label('Tingkat / Status Kemitraan')
                                            ->placeholder('Contoh: Kelas Industri Binaan Grade A+')
                                            ->maxLength(100),

                                        TextInput::make('mou_number')
                                            ->label('Nomor Perjanjian MoU')
                                            ->placeholder('Contoh: 042/MoU-AHM/SMKN1BSR/TBSM/2021')
                                            ->maxLength(150),

                                        TextInput::make('headquarters_city')
                                            ->label('Kota Kantor Pusat')
                                            ->placeholder('Contoh: Jakarta Utara, DKI Jakarta')
                                            ->maxLength(100),

                                        DatePicker::make('mou_start_date')
                                            ->label('Tanggal Mulai Kemitraan')
                                            ->displayFormat('d/m/Y'),

                                        DatePicker::make('mou_end_date')
                                            ->label('Tanggal Berakhir MoU')
                                            ->displayFormat('d/m/Y')
                                            ->afterOrEqual('mou_start_date'),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),

                                Section::make('Kontak & Komunikasi Kantor Pusat')
                                    ->description('Alamat kantor pusat, telepon, email, dan situs resmi mitra.')
                                    ->schema([
                                        TextInput::make('address')
                                            ->label('Alamat Kantor Pusat')
                                            ->placeholder('Contoh: Jl. Laksda Yos Sudarso, Sunter I, Jakarta 14350')
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        TextInput::make('phone')
                                            ->label('Nomor Telepon')
                                            ->tel()
                                            ->maxLength(50),

                                        TextInput::make('email')
                                            ->label('Alamat Email')
                                            ->email()
                                            ->maxLength(255),

                                        TextInput::make('website')
                                            ->label('Situs Web Resmi')
                                            ->url()
                                            ->maxLength(255)
                                            ->columnSpan(2),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ]),

                        // TAB 2: PROFIL & SINKRONISASI KURIKULUM
                        Tab::make('Profil & Kurikulum')
                            ->icon('heroicon-o-academic-cap')
                            ->schema([
                                Section::make('Logo & Banner Dokumentasi')
                                    ->schema([
                                        FileUpload::make('logo')
                                            ->label('Logo Resmi Mitra Industri')
                                            ->image()
                                            ->disk('public')
                                            ->directory('industry_partners')
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                            ->imageEditor()
                                            ->maxSize(2048),

                                        FileUpload::make('banner_image')
                                            ->label('Foto Banner Pabrik / Gedung Mitra (Opsional)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('industry_partners')
                                            ->imageEditor()
                                            ->maxSize(4096),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),

                                Section::make('Deskripsi Profil & Sejarah Kemitraan')
                                    ->schema([
                                        RichEditor::make('description')
                                            ->label('Profil Lengkap Perusahaan & Kerjasama')
                                            ->placeholder('Uraikan latar belakang kemitraan, peran industri bagi sekolah...')
                                            ->columnSpanFull(),

                                        Textarea::make('curriculum_sync_info')
                                            ->label('Catatan Sinkronisasi Kurikulum & Modul Ajar')
                                            ->placeholder('Contoh: Kurikulum Merdeka diselaraskan dengan modul standar Astra Motor Training Center (AMTC) Level 1 & 2...')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                        // TAB 3: PUBLIKASI & SEO
                        Tab::make('Status & SEO')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                Section::make('Pengaturan Penayangan')
                                    ->schema([
                                        Select::make('status')
                                            ->label('Status Publikasi')
                                            ->options([
                                                'draft' => 'Draft (Draf Rahasia)',
                                                'published' => 'Published (Tayang Publik)',
                                                'archived' => 'Archived (Diarsipkan)',
                                            ])
                                            ->default('published')
                                            ->required(),

                                        DateTimePicker::make('published_at')
                                            ->label('Waktu Penayangan'),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),

                                Section::make('Optimasi Mesin Pencari (SEO)')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Judul Meta Halaman (SEO Title)')
                                            ->placeholder('Contoh: Kemitraan Resmi Astra Honda Motor - TBSM SMKN 1 Bangsri')
                                            ->maxLength(255),

                                        Textarea::make('meta_description')
                                            ->label('Deskripsi Meta (SEO Description)')
                                            ->placeholder('Ringkasan 1-2 kalimat untuk hasil pencarian Google...')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
