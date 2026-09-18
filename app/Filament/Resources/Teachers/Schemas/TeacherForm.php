<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas & Jabatan Tenaga Pendidik')
                    ->description('Lengkapi data identitas pengajar, NIP, serta bidang keahlian otomotif.')
                    ->schema([
                        Hidden::make('user_id')
                            ->default(fn () => auth()->id()),

                        TextInput::make('name')
                            ->label('Nama Lengkap & Gelar')
                            ->placeholder('Contoh: Ahmad Wildan, S.Pd.')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('nip')
                            ->label('NIP / NUPTK / Kode Guru')
                            ->placeholder('198503032008032003')
                            ->maxLength(50),

                        TextInput::make('position')
                            ->label('Jabatan / Peran di Sekolah')
                            ->placeholder('Contoh: Guru Kejuruan Otomotif / Kepala Bengkel')
                            ->maxLength(100),

                        TextInput::make('specialization')
                            ->label('Bidang Spesialisasi Kejuruan')
                            ->placeholder('Contoh: Sistem Injeksi & Kelistrikan Sepeda Motor')
                            ->maxLength(150),

                        TextInput::make('phone')
                            ->label('Nomor Telepon / WhatsApp')
                            ->tel()
                            ->placeholder('081234567890')
                            ->maxLength(30),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Foto Profil & Kutipan Guru')
                    ->description('Sesuaikan foto profil agar tampil proporsional dan tidak terdistorsi di halaman web.')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Foto Profil Guru (1 Foto Resmi)')
                            ->disk('public')
                            ->directory('teachers')
                            ->image()
                            ->maxFiles(1)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(3072)
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageEditorAspectRatios([
                                '1:1',
                                '4:5',
                                '3:4',
                            ])
                            ->helperText('Hanya 1 file foto yang digunakan. Klik ikon kuas/editor untuk crop wajah dengan rasio 1:1 persegi agar tampilan avatar lingkaran di website presisi dan tidak lonjong/terpotong.')
                            ->columnSpanFull(),

                        Textarea::make('bio')
                            ->label('Biografi Singkat / Kutipan Pengajar')
                            ->placeholder('Tuliskan komitmen mengajar atau pesan inspiratif untuk siswa...')
                            ->rows(3)
                            ->helperText('Khusus Kepala Jurusan: Teks ini otomatis dijadikan kutipan visi misi di kartu utama Tim Akademik.')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('Status & Publikasi')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif / Tampilkan di Website Publik')
                            ->helperText('Jika dinonaktifkan, profil guru tidak akan muncul di daftar guru dan beranda.')
                            ->default(true),

                        Toggle::make('is_head_of_department')
                            ->label('Tetapkan Sebagai Kepala Kompetensi Keahlian (Kajur)')
                            ->helperText('Jika diaktifkan, otomatis akan menggantikan posisi Kepala Jurusan yang sedang aktif sebelumnya.')
                            ->default(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}

