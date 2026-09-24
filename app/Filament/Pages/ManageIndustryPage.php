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

class ManageIndustryPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Pengaturan Halaman Industri';
    protected static ?string $title = 'Kelola Halaman Industri & Mitra';
    protected static string | \UnitEnum | null $navigationGroup = 'Kemitraan & Karir';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.manage-industry-page';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $this->form->fill([
            // 01. Hero & Metrik Kemitraan
            'industry_hero_badge' => $settings->get('industry_hero_badge', 'KEMITRAAN KELAS INDUSTRI RESMI'),
            'industry_hero_title' => $settings->get('industry_hero_title', 'Kemitraan Industri PT Astra Honda Motor'),
            'industry_hero_subtitle' => $settings->get('industry_hero_subtitle', 'Komitmen strategis sejak 2016 antara SMK Negeri 1 Bangsri dengan PT Astra Honda Motor (AHM) untuk mencetak teknisi sepeda motor profesional berstandar bengkel resmi AHASS.'),
            'industry_hero_bg_image' => $settings->get('industry_hero_bg_image'),
            'industry_stat_1_val' => $settings->get('industry_stat_1_val', '2016'),
            'industry_stat_1_label' => $settings->get('industry_stat_1_label', 'Awal Kemitraan Resmi Honda'),
            'industry_stat_2_val' => $settings->get('industry_stat_2_val', '8 Cabang'),
            'industry_stat_2_label' => $settings->get('industry_stat_2_label', 'Jaringan AHASS Mitra di Jepara'),
            'industry_stat_3_val' => $settings->get('industry_stat_3_val', '100%'),
            'industry_stat_3_label' => $settings->get('industry_stat_3_label', 'Penyaluran Magang PKL Siswa'),
            'industry_stat_4_val' => $settings->get('industry_stat_4_val', 'Grade A+'),
            'industry_stat_4_label' => $settings->get('industry_stat_4_label', 'Standarisasi Kelas Industri'),

            // 02. 6 Pilar Kerjasama
            'industry_pillar_1_title' => $settings->get('industry_pillar_1_title', 'Sinkronisasi Kurikulum Industri'),
            'industry_pillar_1_desc' => $settings->get('industry_pillar_1_desc', 'Penyelarasan silabus Kurikulum Merdeka dengan standar kompetensi teknis Astra Honda Motor (AMTC Level 1 & 2), memastikan penguasaan teknologi injeksi PGM-FI dan eSP+ mutakhir.'),

            'industry_pillar_2_title' => $settings->get('industry_pillar_2_title', 'Praktik Kerja Lapangan (PKL) AHASS'),
            'industry_pillar_2_desc' => $settings->get('industry_pillar_2_desc', 'Siswa diterjunkan magang selama 6 bulan penuh di jaringan bengkel resmi AHASS se-Kabupaten Jepara dan Karesidenan Pati untuk merasakan ritme kerja industri sesungguhnya.'),

            'industry_pillar_3_title' => $settings->get('industry_pillar_3_title', 'Teaching Factory (TeFa) Standar AHASS'),
            'industry_pillar_3_desc' => $settings->get('industry_pillar_3_desc', 'Implementasi bengkel operasional berstandar bengkel resmi di sekolah, melayani servis riil kendaraan masyarakat dengan standar operasional prosedur (SOP) Astra Honda.'),

            'industry_pillar_4_title' => $settings->get('industry_pillar_4_title', 'Bantuan Sarana & Special Tools (SST)'),
            'industry_pillar_4_desc' => $settings->get('industry_pillar_4_desc', 'Dukungan unit sepeda motor praktik Honda generasi terbaru, alat diagnostik HIDS (Honda Intelligent Diagnostic System), dan special service tools resmi pabrikan.'),

            'industry_pillar_5_title' => $settings->get('industry_pillar_5_title', 'Uji Sertifikasi Mekanik Berstandar Honda'),
            'industry_pillar_5_desc' => $settings->get('industry_pillar_5_desc', 'Pelaksanaan Uji Kompetensi Keahlian (UKK) dinilai langsung oleh asesor eksternal dari industri Astra Motor serta sertifikasi LSP-P1 berlisensi BNSP.'),

            'industry_pillar_6_title' => $settings->get('industry_pillar_6_title', 'Prioritas Rekrutmen BKK SMKN 1 Bangsri'),
            'industry_pillar_6_desc' => $settings->get('industry_pillar_6_desc', 'Jalur cepat (fast-track) rekrutmen mekanik baru bagi lulusan TBSM SMKN 1 Bangsri langsung ke dealer dan bengkel AHASS rekanan tanpa perantara.'),

            // 03. Call to Action (CTA)
            'industry_cta_badge' => $settings->get('industry_cta_badge', 'HUBIN & BKK SMKN 1 BANGSRI'),
            'industry_cta_title' => $settings->get('industry_cta_title', 'Tertarik Bekerjasama atau Merekrut Lulusan Kami?'),
            'industry_cta_desc' => $settings->get('industry_cta_desc', 'Bursa Kerja Khusus (BKK) SMK Negeri 1 Bangsri siap memfasilitasi kebutuhan tenaga teknisi otomotif kompeten dan berintegritas untuk jaringan industri otomotif.'),
            'industry_cta_button_text' => $settings->get('industry_cta_button_text', 'Hubungi Hubin & BKK'),
            'industry_cta_button_url' => $settings->get('industry_cta_button_url', '/kontak'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('IndustryPageTabs')
                    ->tabs([
                        // =========================================================================
                        // TAB 1: HERO & METRIK KEMITRAAN
                        // =========================================================================
                        Tab::make('Hero & Metrik Kemitraan')
                            ->icon('heroicon-o-sparkles')
                            ->badge('01')
                            ->schema([
                                Section::make('Header & Banner Hero Industri')
                                    ->description('Judul halaman, pengantar kemitraan, dan foto latar belakang hero.')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        TextInput::make('industry_hero_badge')
                                            ->label('Badge Pengenal Atas')
                                            ->placeholder('Contoh: KEMITRAAN KELAS INDUSTRI RESMI')
                                            ->required(),
                                        TextInput::make('industry_hero_title')
                                            ->label('Judul Utama (Heading)')
                                            ->placeholder('Contoh: Kemitraan Industri PT Astra Honda Motor')
                                            ->required(),
                                        Textarea::make('industry_hero_subtitle')
                                            ->label('Deskripsi Pengantar Ringkas')
                                            ->rows(3)
                                            ->required(),
                                        FileUpload::make('industry_hero_bg_image')
                                            ->label('Foto Banner Latar Belakang Hero (Opsional)')
                                            ->disk('public')
                                            ->directory('industry_partners')
                                            ->image()
                                            ->imageEditor()
                                            ->helperText('Biarkan kosong untuk menggunakan background default.'),
                                    ]),

                                Section::make('4 Kartu Statistik Metrik Kemitraan')
                                    ->description('Angka sorotan utama seperti tahun binaan resmi, cabang AHASS di Jepara, dan kualifikasi kelas.')
                                    ->icon('heroicon-o-chart-bar')
                                    ->schema([
                                        Section::make('Metrik 1')
                                            ->schema([
                                                TextInput::make('industry_stat_1_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('industry_stat_1_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),

                                        Section::make('Metrik 2')
                                            ->schema([
                                                TextInput::make('industry_stat_2_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('industry_stat_2_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),

                                        Section::make('Metrik 3')
                                            ->schema([
                                                TextInput::make('industry_stat_3_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('industry_stat_3_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),

                                        Section::make('Metrik 4')
                                            ->schema([
                                                TextInput::make('industry_stat_4_val')->label('Nilai / Angka')->required(),
                                                TextInput::make('industry_stat_4_label')->label('Keterangan Singkat')->required(),
                                            ])->columnSpan(1),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 2: 6 PILAR KERJASAMA HONDA
                        // =========================================================================
                        Tab::make('6 Pilar Kerjasama Honda')
                            ->icon('heroicon-o-squares-2x2')
                            ->badge('02')
                            ->schema([
                                Section::make('Pilar 1 & 2: Kurikulum & PKL')
                                    ->schema([
                                        Section::make('Pilar 1: Kurikulum Industri')
                                            ->schema([
                                                TextInput::make('industry_pillar_1_title')->label('Judul Pilar 1')->required(),
                                                Textarea::make('industry_pillar_1_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),

                                        Section::make('Pilar 2: Praktik Kerja Lapangan (PKL)')
                                            ->schema([
                                                TextInput::make('industry_pillar_2_title')->label('Judul Pilar 2')->required(),
                                                Textarea::make('industry_pillar_2_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),
                                    ])->columns(2),

                                Section::make('Pilar 3 & 4: Teaching Factory & Sarana')
                                    ->schema([
                                        Section::make('Pilar 3: Teaching Factory (TeFa)')
                                            ->schema([
                                                TextInput::make('industry_pillar_3_title')->label('Judul Pilar 3')->required(),
                                                Textarea::make('industry_pillar_3_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),

                                        Section::make('Pilar 4: Bantuan Sarana & Special Tools')
                                            ->schema([
                                                TextInput::make('industry_pillar_4_title')->label('Judul Pilar 4')->required(),
                                                Textarea::make('industry_pillar_4_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),
                                    ])->columns(2),

                                Section::make('Pilar 5 & 6: Sertifikasi & Rekrutmen Kerja')
                                    ->schema([
                                        Section::make('Pilar 5: Sertifikasi Keahlian')
                                            ->schema([
                                                TextInput::make('industry_pillar_5_title')->label('Judul Pilar 5')->required(),
                                                Textarea::make('industry_pillar_5_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),

                                        Section::make('Pilar 6: Rekrutmen Kerja Prioritas BKK')
                                            ->schema([
                                                TextInput::make('industry_pillar_6_title')->label('Judul Pilar 6')->required(),
                                                Textarea::make('industry_pillar_6_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 3: BKK & CTA
                        // =========================================================================
                        Tab::make('BKK & Call to Action (CTA)')
                            ->icon('heroicon-o-megaphone')
                            ->badge('03')
                            ->schema([
                                Section::make('Banner Ajakan Kerjasama / BKK')
                                    ->description('Informasi bursa kerja khusus dan penyaluran teknisi siap kerja.')
                                    ->schema([
                                        TextInput::make('industry_cta_badge')->label('Badge Ajakan')->required(),
                                        TextInput::make('industry_cta_title')->label('Judul Ajakan Kerjasama')->required(),
                                        Textarea::make('industry_cta_desc')->label('Deskripsi Penjelasan')->rows(3)->required(),
                                        TextInput::make('industry_cta_button_text')->label('Label Tombol Aksi')->required(),
                                        TextInput::make('industry_cta_button_url')->label('Tautan / URL Tombol')->required(),
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
            ->title('Pengaturan Halaman Industri berhasil disimpan')
            ->success()
            ->send();
    }
}
