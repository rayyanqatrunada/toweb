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

class ManageAcademicPrograms extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Halaman Akademik';
    protected static ?string $title = 'Kelola Halaman Akademik';
    protected static string | \UnitEnum | null $navigationGroup = 'Profil & Akademik';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.manage-academic-programs';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $siteName = $settings->get('site_name', 'Teknik Sepeda Motor');
        $siteShortName = $settings->get('site_short_name', 'TBSM');
        $schoolName = $settings->get('school_name', 'SMK Negeri 1 Bangsri');

        $this->form->fill([
            // 01. Hero & Metrik Utama
            'academic_hero_badge' => $settings->get('academic_hero_badge', 'KURIKULUM & KOMPETENSI KEJURUAN'),
            'academic_hero_title' => $settings->get('academic_hero_title', 'Akademik & Kurikulum ' . $siteShortName),
            'academic_hero_subtitle' => $settings->get('academic_hero_subtitle', 'Penyelarasan Kurikulum Merdeka dengan standar AMTC PT Astra Honda Motor (AHM) untuk mencetak teknisi sepeda motor profesional, kompeten, dan siap kerja.'),
            'academic_partner_name' => $settings->get('academic_partner_name', 'Astra Honda Motor (AHASS)'),
            'academic_praktikum_pct' => $settings->get('academic_praktikum_pct', '70%'),
            'academic_teori_pct' => $settings->get('academic_teori_pct', '30%'),

            // 02. 4 Pilar Kompetensi Teknis
            'academic_comp_engine_title' => $settings->get('academic_comp_engine_title', 'Sistem Mesin'),
            'academic_comp_engine_desc' => $settings->get('academic_comp_engine_desc', 'Mendiagnosis dan servis komponen engine, sistem pendingin radiator, pelumasan, dan sistem bahan bakar injeksi PGM-FI.'),
            'academic_comp_engine_scope' => $settings->get('academic_comp_engine_scope', "Overhaul Silinder & Katup\nInjektor & Throttle Body PGM-FI\nRadiator & Pendingin Cair"),

            'academic_comp_chassis_title' => $settings->get('academic_comp_chassis_title', 'Sistem Sasis'),
            'academic_comp_chassis_desc' => $settings->get('academic_comp_chassis_desc', 'Perawatan dan perbaikan sistem rem hidrolik (CBS/ABS), kemudi presisi, suspensi teleskopik/monoshock, pelek, dan ban.'),
            'academic_comp_chassis_scope' => $settings->get('academic_comp_chassis_scope', "Servis & Bleeding Rem CBS/ABS\nPerbaikan Suspensi & Kemudi\nWheel Alignment & Tyre Changer"),

            'academic_comp_electrical_title' => $settings->get('academic_comp_electrical_title', 'Sistem Kelistrikan'),
            'academic_comp_electrical_desc' => $settings->get('academic_comp_electrical_desc', 'Diagnosis scanner injeksi HIDS, starter ACG, sistem pengisian baterai, pencahayaan LED, serta fitur Smart Key / Alarm.'),
            'academic_comp_electrical_scope' => $settings->get('academic_comp_electrical_scope', "Scanner Diagnostik HIDS / ECM\nSmart Key System & Alarm\nWiring Harness & Alternator"),

            'academic_comp_management_title' => $settings->get('academic_comp_management_title', 'Pengelolaan Bengkel'),
            'academic_comp_management_desc' => $settings->get('academic_comp_management_desc', 'Alur Service Advisor (SA), kalkulasi estimasi biaya, inventaris suku cadang HGP, dan budaya kerja industri 5R/K3LH.'),
            'academic_comp_management_scope' => $settings->get('academic_comp_management_scope', "Alur Service Advisor & Front Desk\nEstimasi Biaya & Faktur Servis\nInventaris Tools & Suku Cadang"),

            // 03. Struktur Kurikulum 3 Tahun
            'academic_curriculum_heading' => $settings->get('academic_curriculum_heading', 'Struktur Kurikulum 3 Tahun'),
            'academic_syllabus_file' => $settings->get('academic_syllabus_file'),
            'academic_syllabus_modal_intro' => $settings->get('academic_syllabus_modal_intro', "Kurikulum {$siteName} ({$siteShortName}) {$schoolName} diselaraskan secara penuh dengan standar industri PT Astra Honda Motor."),
            'academic_syllabus_modal_hours' => $settings->get('academic_syllabus_modal_hours', "• Kelas X (Fase E): Dasar-Dasar Kejuruan Otomotif (12 JP)\n• Kelas XI (Fase F): Konsentrasi Keahlian Mesin, Sasis, Kelistrikan (18 JP) + Praktikum Kejuruan\n• Kelas XII (Fase F): Pemantapan Troubleshooting & PKL AHASS (6 Bulan Penuh)"),
            'academic_syllabus_modal_standards' => $settings->get('academic_syllabus_modal_standards', 'Siswa dinyatakan kompeten setelah menyelesaikan seluruh modul capaian pembelajaran, lulus UKK dari asesor industri Astra Motor, dan bersertifikasi BNSP.'),

            'academic_curriculum_x_title' => $settings->get('academic_curriculum_x_title', 'Fondasi Kejuruan Otomotif'),
            'academic_curriculum_x_desc' => $settings->get('academic_curriculum_x_desc', 'Penanaman budaya industri 5R, keselamatan kerja (K3LH), penguasaan alat ukur mekanik presisi, serta logika koding dan kecerdasan artifisial dasar.'),
            'academic_curriculum_x_hours' => $settings->get('academic_curriculum_x_hours', '12 JP / Minggu'),
            'academic_curriculum_x_focus' => $settings->get('academic_curriculum_x_focus', 'Disiplin & Ketelitian Ukur'),

            'academic_curriculum_xi_title' => $settings->get('academic_curriculum_xi_title', 'Konsentrasi Keahlian Otomotif'),
            'academic_curriculum_xi_desc' => $settings->get('academic_curriculum_xi_desc', 'Pendalaman teknis 3 sistem utama sepeda motor, praktik kerja bangku dan perawatan berkala, serta proyek produk kreatif kewirausahaan.'),
            'academic_curriculum_xi_hours' => $settings->get('academic_curriculum_xi_hours', '18 JP / Minggu'),
            'academic_curriculum_xi_focus' => $settings->get('academic_curriculum_xi_focus', 'Injeksi PGM-FI & Perawatan Berkala'),

            'academic_curriculum_xii_title' => $settings->get('academic_curriculum_xii_title', 'Pemantapan Industri & PKL'),
            'academic_curriculum_xii_desc' => $settings->get('academic_curriculum_xii_desc', 'Pelaksanaan Praktik Kerja Lapangan (PKL) 6 bulan di AHASS, pemecahan masalah (troubleshooting) tingkat lanjut, dan Uji Sertifikasi LSP/UKK.'),
            'academic_curriculum_xii_hours' => $settings->get('academic_curriculum_xii_hours', '6 Bulan Penuh di AHASS'),
            'academic_curriculum_xii_focus' => $settings->get('academic_curriculum_xii_focus', 'UKK, BNSP, Rekrutmen BKK'),

            // 04. Sertifikasi & Lisensi Lulusan
            'academic_cert_bnsp_title' => $settings->get('academic_cert_bnsp_title', 'Sertifikasi BNSP / LSP-P1'),
            'academic_cert_bnsp_license' => $settings->get('academic_cert_bnsp_license', 'LSP-P1 SMKN 1 Bangsri'),
            'academic_cert_bnsp_desc' => $settings->get('academic_cert_bnsp_desc', 'Sertifikat Garuda Emas resmi berstandar SKKNI, diakui di seluruh wilayah Republik Indonesia dan ASEAN.'),

            'academic_cert_ahm_title' => $settings->get('academic_cert_ahm_title', 'Lisensi Astra Honda Motor'),
            'academic_cert_ahm_level' => $settings->get('academic_cert_ahm_level', 'AMTC Honda Level 1 Bronze'),
            'academic_cert_ahm_desc' => $settings->get('academic_cert_ahm_desc', 'Standar keahlian mekanik resmi Honda yang membuka akses prioritas rekrutmen kerja langsung di jaringan AHASS.'),

            'academic_cert_ukk_title' => $settings->get('academic_cert_ukk_title', 'Uji Kompetensi Keahlian (UKK)'),
            'academic_cert_ukk_issuer' => $settings->get('academic_cert_ukk_issuer', 'Kemendikbud & DUDI Astra Motor'),
            'academic_cert_ukk_desc' => $settings->get('academic_cert_ukk_desc', 'Verifikasi kemampuan akhir siswa yang diuji langsung oleh instruktur bengkel resmi eksternal.'),
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Tabs::make('Pengaturan Halaman Akademik')
                    ->tabs([
                        // =========================================================================
                        // TAB 1: HERO & METRIK UTAMA
                        // =========================================================================
                        Tab::make('Hero & Metrik Utama')
                            ->icon('heroicon-o-sparkles')
                            ->badge('01')
                            ->schema([
                                Section::make('Header Utama Halaman')
                                    ->description('Atur badge pengenal, judul besar, dan ringkasan pengantar di bagian paling atas halaman.')
                                    ->icon('heroicon-o-presentation-chart-line')
                                    ->schema([
                                        TextInput::make('academic_hero_badge')
                                            ->label('Badge Pengenal Atas')
                                            ->placeholder('Contoh: KURIKULUM & KOMPETENSI KEJURUAN')
                                            ->required(),
                                        TextInput::make('academic_hero_title')
                                            ->label('Judul Utama (Heading)')
                                            ->placeholder('Contoh: Akademik & Kurikulum TBSM')
                                            ->required(),
                                        Textarea::make('academic_hero_subtitle')
                                            ->label('Deskripsi Pengantar Ringkas')
                                            ->rows(3)
                                            ->helperText('Tulis pengantar 1-2 kalimat yang padat dan jelas mengenai orientasi kejuruan.')
                                            ->required(),
                                    ]),

                                Section::make('Kemitraan Industri & Proporsi Belajar')
                                    ->description('Informasi mitra industri binaan resmi dan rasio perbandingan praktikum versus teori.')
                                    ->icon('heroicon-o-building-office-2')
                                    ->schema([
                                        TextInput::make('academic_partner_name')
                                            ->label('Nama Mitra Industri Utama')
                                            ->columnSpanFull()
                                            ->required(),
                                        TextInput::make('academic_praktikum_pct')
                                            ->label('Persentase Praktikum')
                                            ->placeholder('70%')
                                            ->required(),
                                        TextInput::make('academic_teori_pct')
                                            ->label('Persentase Teori')
                                            ->placeholder('30%')
                                            ->required(),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 2: 4 PILAR KOMPETENSI TEKNIS
                        // =========================================================================
                        Tab::make('4 Pilar Kompetensi Teknis')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->badge('02')
                            ->schema([
                                Section::make('Keahlian Utama Siswa')
                                    ->description('4 pilar kompetensi teknis: Sistem Mesin, Sasis, Kelistrikan, dan Pengelolaan Bengkel.')
                                    ->schema([
                                        // Mesin
                                        Section::make('1. Sistem Mesin (Engine)')
                                            ->schema([
                                                TextInput::make('academic_comp_engine_title')->label('Judul Modul')->required(),
                                                Textarea::make('academic_comp_engine_desc')->label('Deskripsi Ringkas')->rows(2)->required(),
                                                Textarea::make('academic_comp_engine_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3)->helperText('Pisahkan setiap poin dengan baris baru.')->required(),
                                            ])->columnSpan(1),

                                        // Sasis
                                        Section::make('2. Sistem Sasis (Chassis)')
                                            ->schema([
                                                TextInput::make('academic_comp_chassis_title')->label('Judul Modul')->required(),
                                                Textarea::make('academic_comp_chassis_desc')->label('Deskripsi Ringkas')->rows(2)->required(),
                                                Textarea::make('academic_comp_chassis_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3)->helperText('Pisahkan setiap poin dengan baris baru.')->required(),
                                            ])->columnSpan(1),

                                        // Kelistrikan
                                        Section::make('3. Sistem Kelistrikan (Electrical)')
                                            ->schema([
                                                TextInput::make('academic_comp_electrical_title')->label('Judul Modul')->required(),
                                                Textarea::make('academic_comp_electrical_desc')->label('Deskripsi Ringkas')->rows(2)->required(),
                                                Textarea::make('academic_comp_electrical_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3)->helperText('Pisahkan setiap poin dengan baris baru.')->required(),
                                            ])->columnSpan(1),

                                        // Pengelolaan Bengkel
                                        Section::make('4. Pengelolaan Bengkel (Management)')
                                            ->schema([
                                                TextInput::make('academic_comp_management_title')->label('Judul Modul')->required(),
                                                Textarea::make('academic_comp_management_desc')->label('Deskripsi Ringkas')->rows(2)->required(),
                                                Textarea::make('academic_comp_management_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3)->helperText('Pisahkan setiap poin dengan baris baru.')->required(),
                                            ])->columnSpan(1),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 3: STRUKTUR KURIKULUM 3 TAHUN
                        // =========================================================================
                        Tab::make('Kurikulum 3 Tahun & Silabus')
                            ->icon('heroicon-o-academic-cap')
                            ->badge('03')
                            ->schema([
                                Section::make('Pengantar Kurikulum & Berkas PDF')
                                    ->description('Judul bagian kurikulum dan berkas PDF silabus yang dapat diunduh.')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        TextInput::make('academic_curriculum_heading')->label('Judul Bagian Kurikulum')->columnSpanFull()->required(),
                                        FileUpload::make('academic_syllabus_file')
                                            ->label('Unggah Berkas Silabus Kurikulum (PDF)')
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->directory('academic')
                                            ->helperText('Jika diunggah, tombol "Ringkasan Silabus PDF" akan menampilkan opsi unduh berkas resmi ini.')
                                            ->columnSpanFull(),
                                        Textarea::make('academic_syllabus_modal_intro')->label('Teks Pengantar Silabus (Modal)')->rows(2)->columnSpanFull(),
                                        Textarea::make('academic_syllabus_modal_hours')->label('Rincian Struktur Jam Pelajaran (Modal)')->rows(3),
                                        Textarea::make('academic_syllabus_modal_standards')->label('Standar Kelulusan Kompetensi (Modal)')->rows(3),
                                    ])->columns(2),

                                Section::make('Tahapan Pembelajaran Berjenjang (X, XI, XII)')
                                    ->description('Alur capaian kompetensi per tingkat kelas dari orientasi dasar hingga magang industri.')
                                    ->icon('heroicon-o-map')
                                    ->schema([
                                        Section::make('Tingkat Kelas X (Fase E)')
                                            ->schema([
                                                TextInput::make('academic_curriculum_x_title')->label('Judul Fase')->required(),
                                                Textarea::make('academic_curriculum_x_desc')->label('Deskripsi Pembelajaran')->rows(3)->required(),
                                                TextInput::make('academic_curriculum_x_hours')->label('Alokasi JP')->required(),
                                                TextInput::make('academic_curriculum_x_focus')->label('Fokus Utama')->required(),
                                            ]),

                                        Section::make('Tingkat Kelas XI (Fase F)')
                                            ->schema([
                                                TextInput::make('academic_curriculum_xi_title')->label('Judul Fase')->required(),
                                                Textarea::make('academic_curriculum_xi_desc')->label('Deskripsi Pembelajaran')->rows(3)->required(),
                                                TextInput::make('academic_curriculum_xi_hours')->label('Alokasi JP')->required(),
                                                TextInput::make('academic_curriculum_xi_focus')->label('Fokus Utama')->required(),
                                            ]),

                                        Section::make('Tingkat Kelas XII (Fase F & Magang)')
                                            ->schema([
                                                TextInput::make('academic_curriculum_xii_title')->label('Judul Fase')->required(),
                                                Textarea::make('academic_curriculum_xii_desc')->label('Deskripsi Pembelajaran')->rows(3)->required(),
                                                TextInput::make('academic_curriculum_xii_hours')->label('Alokasi / Durasi PKL')->required(),
                                                TextInput::make('academic_curriculum_xii_focus')->label('Muara Kelulusan')->required(),
                                            ]),
                                    ])->columns(3),
                            ]),

                        // =========================================================================
                        // TAB 4: SERTIFIKASI & LISENSI
                        // =========================================================================
                        Tab::make('Sertifikasi & Lisensi Lulusan')
                            ->icon('heroicon-o-shield-check')
                            ->badge('04')
                            ->schema([
                                Section::make('Standar Sertifikasi Keahlian Lulusan')
                                    ->description('3 sertifikasi resmi yang diperoleh lulusan: BNSP, Honda AMTC, dan UKK.')
                                    ->schema([
                                        Section::make('1. Sertifikasi BNSP / LSP-P1')
                                            ->schema([
                                                TextInput::make('academic_cert_bnsp_title')->label('Nama Sertifikasi')->required(),
                                                TextInput::make('academic_cert_bnsp_license')->label('Lembaga Lisensi')->required(),
                                                Textarea::make('academic_cert_bnsp_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),

                                        Section::make('2. Lisensi Astra Honda Motor')
                                            ->schema([
                                                TextInput::make('academic_cert_ahm_title')->label('Nama Sertifikasi')->required(),
                                                TextInput::make('academic_cert_ahm_level')->label('Level Kualifikasi')->required(),
                                                Textarea::make('academic_cert_ahm_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),

                                        Section::make('3. Uji Kompetensi Keahlian (UKK)')
                                            ->schema([
                                                TextInput::make('academic_cert_ukk_title')->label('Nama Sertifikasi')->required(),
                                                TextInput::make('academic_cert_ukk_issuer')->label('Lembaga Penguji')->required(),
                                                Textarea::make('academic_cert_ukk_desc')->label('Deskripsi')->rows(2)->required(),
                                            ])->columnSpan(1),
                                    ])->columns(3),
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
            ->title('Pengaturan Halaman Akademik berhasil disimpan')
            ->success()
            ->send();
    }
}
