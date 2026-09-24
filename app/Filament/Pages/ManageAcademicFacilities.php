<?php

namespace App\Filament\Pages;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use App\Services\SettingsService;
use Filament\Notifications\Notification;

class ManageAcademicFacilities extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Halaman Fasilitas';
    protected static ?string $title = 'Kelola Halaman Fasilitas';
    protected static string | \UnitEnum | null $navigationGroup = 'Profil & Akademik';
    protected static ?int $navigationSort = 3;

    protected string $view = 'filament.pages.manage-academic-facilities';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $siteShortName = $settings->get('site_short_name', 'TBSM');

        $this->form->fill([
            // 01. Hero & Metrik
            'facility_hero_badge' => $settings->get('facility_hero_badge', 'INFRASTRUKTUR & BENGKEL ASTRA HONDA'),
            'facility_hero_title' => $settings->get('facility_hero_title', 'FASILITAS BENGKEL STANDAR INDUSTRI ' . $siteShortName),
            'facility_hero_subtitle' => $settings->get('facility_hero_subtitle', 'Dilengkapi bike lift hidrolik, simulator injeksi PGM-FI, engine overhaul stand berputar, special service tools (SST) lengkap, dan budaya kerja 5R/K3LH untuk mencetak teknisi profesional berstandar AHASS.'),
            'facility_hero_bg_image' => $settings->get('facility_hero_bg_image'),
            'facility_stat_1_val' => $settings->get('facility_stat_1_val', '70%'),
            'facility_stat_1_label' => $settings->get('facility_stat_1_label', 'Proporsi Praktikum & TeFa'),
            'facility_stat_2_val' => $settings->get('facility_stat_2_val', '6 Pit'),
            'facility_stat_2_label' => $settings->get('facility_stat_2_label', 'Stall Servis Hidrolik AHASS'),
            'facility_stat_3_val' => $settings->get('facility_stat_3_val', '100%'),
            'facility_stat_3_label' => $settings->get('facility_stat_3_label', 'Peralatan Standar Pabrikan'),
            'facility_stat_4_val' => $settings->get('facility_stat_4_val', '5R & K3'),
            'facility_stat_4_label' => $settings->get('facility_stat_4_label', 'Budaya Disiplin Industri'),

            // 02. Standar 5R & K3LH
            'facility_5r_badge' => $settings->get('facility_5r_badge', 'DISIPLIN KERJA JEPANG & K3LH'),
            'facility_5r_title' => $settings->get('facility_5r_title', 'Penerapan Budaya Kerja Industri 5R & Standar K3LH'),
            'facility_5r_desc' => $settings->get('facility_5r_desc', 'Sebelum dan sesudah melaksanakan kegiatan di bengkel otomotif, seluruh siswa dibiasakan menerapkan 5R (Ringkas, Rapi, Resik, Rawat, Rajin) serta standar Keselamatan dan Kesehatan Kerja Lingkungan Hidup (K3LH).'),
            'facility_5r_ringkas_title' => $settings->get('facility_5r_ringkas_title', 'Ringkas (Seiri)'),
            'facility_5r_ringkas_desc' => $settings->get('facility_5r_ringkas_desc', 'Memisahkan alat kerja, material sisa, dan suku cadang yang diperlukan dengan yang tidak terpakai sehingga area pit servis selalu efisien dan teratur.'),
            'facility_5r_rapi_title' => $settings->get('facility_5r_rapi_title', 'Rapi (Seiton)'),
            'facility_5r_rapi_desc' => $settings->get('facility_5r_rapi_desc', 'Menata seluruh perkakas tangan (hand tools) dan SST pada shadow board serta toolbox dengan penandaan posisi yang presisi.'),
            'facility_5r_resik_title' => $settings->get('facility_5r_resik_title', 'Resik (Seiso)'),
            'facility_5r_resik_desc' => $settings->get('facility_5r_resik_desc', 'Menjaga kebersihan lantai bengkel dan bike lift dari ceceran oli maupun sisa bensin guna mencegah kecelakaan kerja tergelincir.'),
            'facility_5r_rawat_title' => $settings->get('facility_5r_rawat_title', 'Rawat (Seiketsu)'),
            'facility_5r_rawat_desc' => $settings->get('facility_5r_rawat_desc', 'Mempertahankan standar kebersihan, kelengkapan Alat Pelindung Diri (APD wearpack & safety shoes), dan kalibrasi alat ukur secara konsisten.'),
            'facility_5r_rajin_title' => $settings->get('facility_5r_rajin_title', 'Rajin (Shitsuke)'),
            'facility_5r_rajin_desc' => $settings->get('facility_5r_rajin_desc', 'Membiasakan briefing kedisiplinan pagi, doa bersama, dan pembagian job sheet sebelum sesi praktik dimulai.'),
            'facility_k3_apd' => $settings->get('facility_k3_apd', 'Wearpack Standar AHASS, Safety Shoes Ujung Besi, Kacamata Pelindung Serpihan Logam, Sarung Tangan Karet Nitrile.'),
            'facility_k3_safety' => $settings->get('facility_k3_safety', 'Tabung Pemadam Api (APAR) Powder & CO2 di Setiap Sudut, Eye Washer Darurat, Kotak P3K Lengkap, Jalur Evakuasi Evacuation Assembly Point.'),
            'facility_k3_limbah' => $settings->get('facility_k3_limbah', 'Penampung Limbah B3 Berstandar Lingkungan: Drum Oli Bekas Bersegel, Pemilah Aki Bekas & Kain Majun Terkontaminasi.'),

            // 03. Teaching Factory & Layanan TeFa
            'facility_tefa_badge' => $settings->get('facility_tefa_badge', 'UNIT PRODUKSI & TEFA'),
            'facility_tefa_title' => $settings->get('facility_tefa_title', 'Teaching Factory (TeFa) TBSM SMKN 1 Bangsri'),
            'facility_tefa_subtitle' => $settings->get('facility_tefa_subtitle', 'Menghadirkan layanan perawatan berkala dan perbaikan sepeda motor untuk warga masyarakat, guru, dan siswa dengan kualitas pengerjaan berstandar bengkel resmi AHASS.'),
            'facility_tefa_hours' => $settings->get('facility_tefa_hours', 'Senin – Jumat : 08.00 – 15.00 WIB'),
            'facility_tefa_location' => $settings->get('facility_tefa_location', 'Gedung Bengkel Otomotif SMKN 1 Bangsri, Jl. Raya Bangsri - Keling, Jepara'),
            'facility_tefa_services' => $settings->get('facility_tefa_services', "Servis Berkala & Tune Up Injeksi PGM-FI (Reset Scanner ECM)\nPerawatan Transmisi Otomatis CVT (V-Belt & Roller)\nGanti Oli Mesin & Transmisi (Astra Honda Oil Asli)\nServis Sistem Pengereman Hidrolik (CBS / ABS)\nPembersihan Injektor Ultrasonik & Throttle Body\nPenggantian Suku Cadang Orisinal Honda Genuine Parts (HGP)\nUji Emisi Gas Buang Sepeda Motor"),
            'facility_tefa_note' => $settings->get('facility_tefa_note', 'Seluruh proses pengerjaan dilakukan oleh siswa berprestasi kelas XI & XII di bawah supervisi mekanik instruktur bersertifikasi Astra Motor.'),

            // 04. Call to Action (CTA)
            'facility_cta_badge' => $settings->get('facility_cta_badge', 'KUNJUNGAN & INFORMASI'),
            'facility_cta_title' => $settings->get('facility_cta_title', 'Tertarik Melihat Langsung Fasilitas Bengkel Kami?'),
            'facility_cta_desc' => $settings->get('facility_cta_desc', 'Kami menyambut baik kunjungan calon siswa, orang tua, sekolah mitra tingkat SMP/MTs, dan mitra industri yang ingin melihat langsung ekosistem pembelajaran otomotif berstandar Astra Honda di SMKN 1 Bangsri.'),
            'facility_cta_button_text' => $settings->get('facility_cta_button_text', 'Hubungi Kami / Jadwalkan Kunjungan'),
            'facility_cta_button_url' => $settings->get('facility_cta_button_url', '/kontak'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('FacilitiesManagementTabs')
                    ->tabs([
                        // =========================================================================
                        // TAB 1: HERO & METRIK FASILITAS
                        // =========================================================================
                        Tab::make('Hero & Metrik Fasilitas')
                            ->icon('heroicon-o-sparkles')
                            ->badge('01')
                            ->schema([
                                Section::make('Header & Banner Utama')
                                    ->description('Konfigurasi teks judul, pengantar, dan gambar latar belakang hero halaman fasilitas.')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        TextInput::make('facility_hero_badge')
                                            ->label('Badge Pengenal Atas')
                                            ->placeholder('Contoh: INFRASTRUKTUR & BENGKEL ASTRA HONDA')
                                            ->required(),
                                        TextInput::make('facility_hero_title')
                                            ->label('Judul Utama (Heading)')
                                            ->placeholder('Contoh: FASILITAS BENGKEL STANDAR INDUSTRI TBSM')
                                            ->required(),
                                        Textarea::make('facility_hero_subtitle')
                                            ->label('Deskripsi Pengantar Ringkas')
                                            ->rows(3)
                                            ->helperText('Tulis pengantar ringkas mengenai keunggulan sarana prasarana bengkel TBSM.')
                                            ->required(),
                                        FileUpload::make('facility_hero_bg_image')
                                            ->label('Foto Latar Belakang Hero (Opsional)')
                                            ->disk('public')
                                            ->directory('facilities')
                                            ->image()
                                            ->imageEditor()
                                            ->helperText('Biarkan kosong jika ingin menggunakan gambar bawaan sistem.'),
                                    ]),

                                Section::make('4 Kartu Statistik Metrik Fasilitas')
                                    ->description('Angka sorotan utama seperti rasio praktikum, jumlah stall servis, dan standar bengkel.')
                                    ->icon('heroicon-o-chart-bar')
                                    ->schema([
                                        Section::make('Metrik 1')
                                            ->schema([
                                                TextInput::make('facility_stat_1_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('facility_stat_1_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),

                                        Section::make('Metrik 2')
                                            ->schema([
                                                TextInput::make('facility_stat_2_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('facility_stat_2_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),

                                        Section::make('Metrik 3')
                                            ->schema([
                                                TextInput::make('facility_stat_3_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('facility_stat_3_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),

                                        Section::make('Metrik 4')
                                            ->schema([
                                                TextInput::make('facility_stat_4_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('facility_stat_4_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 2: STANDAR 5R & K3LH
                        // =========================================================================
                        Tab::make('Standar Budaya 5R & K3LH')
                            ->icon('heroicon-o-shield-check')
                            ->badge('02')
                            ->schema([
                                Section::make('Pengantar Budaya Kerja Bengkel')
                                    ->description('Penanaman karakter kedisiplinan dan keselamatan kerja siswa.')
                                    ->icon('heroicon-o-clipboard-document-check')
                                    ->schema([
                                        TextInput::make('facility_5r_badge')->label('Badge Section')->required(),
                                        TextInput::make('facility_5r_title')->label('Judul Section 5R & K3LH')->required(),
                                        Textarea::make('facility_5r_desc')->label('Deskripsi Penjelasan')->rows(2)->required(),
                                    ]),

                                Section::make('5 Prinsip Budaya Kerja 5R (Jepang)')
                                    ->description('Nilai-nilai kerja industri manufaktur dan bengkel resmi.')
                                    ->icon('heroicon-o-numbered-list')
                                    ->schema([
                                        Section::make('1. Ringkas (Seiri)')
                                            ->schema([
                                                TextInput::make('facility_5r_ringkas_title')->label('Label Prinsip')->required(),
                                                Textarea::make('facility_5r_ringkas_desc')->label('Uraian Implementasi')->rows(2)->required(),
                                            ]),

                                        Section::make('2. Rapi (Seiton)')
                                            ->schema([
                                                TextInput::make('facility_5r_rapi_title')->label('Label Prinsip')->required(),
                                                Textarea::make('facility_5r_rapi_desc')->label('Uraian Implementasi')->rows(2)->required(),
                                            ]),

                                        Section::make('3. Resik (Seiso)')
                                            ->schema([
                                                TextInput::make('facility_5r_resik_title')->label('Label Prinsip')->required(),
                                                Textarea::make('facility_5r_resik_desc')->label('Uraian Implementasi')->rows(2)->required(),
                                            ]),

                                        Section::make('4. Rawat (Seiketsu)')
                                            ->schema([
                                                TextInput::make('facility_5r_rawat_title')->label('Label Prinsip')->required(),
                                                Textarea::make('facility_5r_rawat_desc')->label('Uraian Implementasi')->rows(2)->required(),
                                            ]),

                                        Section::make('5. Rajin (Shitsuke)')
                                            ->schema([
                                                TextInput::make('facility_5r_rajin_title')->label('Label Prinsip')->required(),
                                                Textarea::make('facility_5r_rajin_desc')->label('Uraian Implementasi')->rows(2)->required(),
                                            ]),
                                    ]),

                                Section::make('Protokol K3LH & Pengelolaan Limbah B3')
                                    ->description('Peralatan keselamatan, fasilitas tanggap darurat, dan pembuangan limbah oli/aki.')
                                    ->icon('heroicon-o-exclamation-triangle')
                                    ->schema([
                                        TextInput::make('facility_k3_apd')
                                            ->label('Kelengkapan APD Wajib Siswa')
                                            ->helperText('Contoh: Wearpack Standar AHASS, Safety Shoes Ujung Besi, Kacamata Pelindung, Sarung Tangan')
                                            ->required(),
                                        TextInput::make('facility_k3_safety')
                                            ->label('Sarana Tanggap Darurat & Kebakaran')
                                            ->helperText('Contoh: Tabung Pemadam APAR Powder & CO2, Kotak P3K, Jalur Evakuasi')
                                            ->required(),
                                        TextInput::make('facility_k3_limbah')
                                            ->label('Pengelolaan Limbah Bengkel B3')
                                            ->helperText('Contoh: Drum Penampung Oli Bekas Bersegel, Pemilah Aki & Majun Terkontaminasi')
                                            ->required(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 3: TEACHING FACTORY & LAYANAN TEFA
                        // =========================================================================
                        Tab::make('Teaching Factory (TeFa)')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->badge('03')
                            ->schema([
                                Section::make('Identitas Unit Teaching Factory (TeFa)')
                                    ->description('Unit layanan servis nyata untuk publik dan masyarakat sekitar.')
                                    ->icon('heroicon-o-building-storefront')
                                    ->schema([
                                        TextInput::make('facility_tefa_badge')->label('Badge TeFa')->required(),
                                        TextInput::make('facility_tefa_title')->label('Nama Unit Layanan TeFa')->required(),
                                        Textarea::make('facility_tefa_subtitle')->label('Deskripsi Layanan Konsumen')->rows(2)->required(),
                                        TextInput::make('facility_tefa_hours')->label('Jam Operasional Layanan')->placeholder('Senin – Jumat : 08.00 – 15.00 WIB')->required(),
                                        TextInput::make('facility_tefa_location')->label('Lokasi Gedung Bengkel')->required(),
                                    ]),

                                Section::make('Menu Layanan & Catatan Supervisi')
                                    ->description('Daftar jenis perawatan sepeda motor dan jaminan mutu supervisi instruktur.')
                                    ->icon('heroicon-o-clipboard-document-list')
                                    ->schema([
                                        Textarea::make('facility_tefa_services')
                                            ->label('Daftar Layanan Servis Publik (1 Baris per Layanan)')
                                            ->rows(6)
                                            ->helperText('Tuliskan setiap layanan servis dalam baris baru.')
                                            ->required(),
                                        Textarea::make('facility_tefa_note')
                                            ->label('Jaminan Supervisi Mekanik Instruktur')
                                            ->rows(2)
                                            ->required(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 4: CALL TO ACTION (CTA)
                        // =========================================================================
                        Tab::make('Ajakan Kunjungan (CTA)')
                            ->icon('heroicon-o-megaphone')
                            ->badge('04')
                            ->schema([
                                Section::make('Banner Ajakan Kunjungan Bengkel')
                                    ->description('Undang calon siswa, orang tua, dan perwakilan industri untuk melihat fasilitas secara langsung.')
                                    ->icon('heroicon-o-arrow-right-circle')
                                    ->schema([
                                        TextInput::make('facility_cta_badge')->label('Badge Ajakan')->required(),
                                        TextInput::make('facility_cta_title')->label('Judul Ajakan Kunjungan')->required(),
                                        Textarea::make('facility_cta_desc')->label('Deskripsi Penjelasan Ajakan')->rows(3)->required(),
                                        TextInput::make('facility_cta_button_text')->label('Label Tombol Aksi')->placeholder('Hubungi Kami / Jadwalkan Kunjungan')->required(),
                                        TextInput::make('facility_cta_button_url')->label('Tautan / URL Tombol')->placeholder('/kontak')->required(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(SettingsService $settings): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $settings->set($key, $value);
        }

        Notification::make()
            ->title('Pengaturan Halaman Fasilitas berhasil disimpan')
            ->success()
            ->send();
    }
}
