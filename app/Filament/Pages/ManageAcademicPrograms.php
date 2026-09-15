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
        $this->form->fill([
            // 01. Hero & Metrik
            'academic_hero_badge' => $settings->get('academic_hero_badge', 'KURIKULUM & KOMPETENSI KEJURUAN'),
            'academic_hero_title' => $settings->get('academic_hero_title', 'AKADEMIK & KURIKULUM TBSM'),
            'academic_hero_subtitle' => $settings->get('academic_hero_subtitle', 'Standar kompetensi kejuruan teknik sepeda motor berbasis industri Astra Honda Motor (AHM) dengan Kurikulum Merdeka terintegrasi, dirancang untuk melahirkan teknisi profesional dan wirausahawan tangguh.'),
            'academic_partner_name' => $settings->get('academic_partner_name', 'Astra Honda Motor (AHASS)'),
            'academic_praktikum_pct' => $settings->get('academic_praktikum_pct', '70%'),
            'academic_praktikum_label' => $settings->get('academic_praktikum_label', 'Praktikum & TeFa'),
            'academic_teori_pct' => $settings->get('academic_teori_pct', '30%'),
            'academic_teori_label' => $settings->get('academic_teori_label', 'Teori & K3LH'),

            // 02. 4 Pilar Kompetensi
            'academic_comp_engine_title' => $settings->get('academic_comp_engine_title', 'Sistem Mesin'),
            'academic_comp_engine_desc' => $settings->get('academic_comp_engine_desc', 'Mendiagnosis gangguan atau kerusakan pada Engine Sepeda Motor meliputi komponen utama engine, sistem pelumasan, sistem pendinginan, dan sistem bahan bakar injeksi PGM-FI.'),
            'academic_comp_engine_scope' => $settings->get('academic_comp_engine_scope', "Overhaul Silinder & Valve\nKalibrasi Injektor & Throttle Body\nSistem Pendingin Cair & Radiator"),

            'academic_comp_chassis_title' => $settings->get('academic_comp_chassis_title', 'Sistem Sasis'),
            'academic_comp_chassis_desc' => $settings->get('academic_comp_chassis_desc', 'Mendiagnosis gangguan pada sasis sepeda motor beserta komponennya, meliputi sistem rem hidrolik (CBS/ABS), sistem kemudi, suspensi, rangka, pelek, dan ban.'),
            'academic_comp_chassis_scope' => $settings->get('academic_comp_chassis_scope', "Bleeding & Servis Rem CBS/ABS\nPerbaikan Suspensi & Kemudi\nWheel Alignment & Spoke Lacing"),

            'academic_comp_electrical_title' => $settings->get('academic_comp_electrical_title', 'Sistem Kelistrikan'),
            'academic_comp_electrical_desc' => $settings->get('academic_comp_electrical_desc', 'Mendiagnosis gangguan pada sistem kelistrikan motor, mencakup pengapian, pengisian, starter, penerangan LED, sistem pengaman (Smart Key / Alarm), instrumen dan sinyal.'),
            'academic_comp_electrical_scope' => $settings->get('academic_comp_electrical_scope', "Diagnosis Scanner Injeksi (HIDS)\nTroubleshooting Smart Key & Alarm\nWiring Harness & Pengisian Aki"),

            'academic_comp_management_title' => $settings->get('academic_comp_management_title', 'Pengelolaan Bengkel'),
            'academic_comp_management_desc' => $settings->get('academic_comp_management_desc', 'Menerapkan pengelolaan teknis, alur Service Advisor (SA), estimasi biaya, inventaris suku cadang, serta manajemen operasional dan perawatan berkala sepeda motor.'),
            'academic_comp_management_scope' => $settings->get('academic_comp_management_scope', "Alur Service Advisor & Front Desk\nEstimasi Biaya & Faktur Servis\nInventaris Tools & Suku Cadang"),

            // 03. Struktur Kurikulum & Silabus
            'academic_curriculum_heading' => $settings->get('academic_curriculum_heading', 'Peta Mata Pelajaran Produktif'),
            'academic_curriculum_subheading' => $settings->get('academic_curriculum_subheading', 'Pola pembelajaran bertahap dari pengenalan fondasi otomotif dasar, konsentrasi kejuruan, hingga pemantapan industri dan magang penuh di bengkel resmi AHASS.'),
            'academic_syllabus_file' => $settings->get('academic_syllabus_file'),
            'academic_syllabus_modal_intro' => $settings->get('academic_syllabus_modal_intro', 'Kurikulum Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri dirancang berdasarkan Kepmendikbudristek Kurikulum Merdeka yang diselaraskan secara konsisten dengan kompetensi industri PT Astra Honda Motor.'),
            'academic_syllabus_modal_hours' => $settings->get('academic_syllabus_modal_hours', "• Kelas X (Fase E): Dasar-Dasar Kejuruan Otomotif (12 JP) + Koding & AI (2 JP).\n• Kelas XI (Fase F): Konsentrasi Keahlian Mesin, Sasis, Kelistrikan (18 JP) + PKK (5 JP).\n• Kelas XII (Fase F): Pemantapan Troubleshooting (14 JP) + PKL Industri AHASS (6 Bulan Penuh)."),
            'academic_syllabus_modal_standards' => $settings->get('academic_syllabus_modal_standards', 'Siswa dinyatakan kompeten setelah menyelesaikan seluruh modul capaian pembelajaran, lulus Uji Kompetensi Keahlian (UKK) dari penguji eksternal, dan memperoleh sertifikat kompetensi BNSP / Astra Motor.'),

            'academic_curriculum_x_title' => $settings->get('academic_curriculum_x_title', 'Fondasi Kejuruan Otomotif'),
            'academic_curriculum_x_desc' => $settings->get('academic_curriculum_x_desc', 'Penanaman budaya kerja industri 5R, keselamatan kerja (K3LH), penguasaan alat ukur mekanik presisi, serta logika koding dan kecerdasan artifisial dasar.'),
            'academic_curriculum_x_hours' => $settings->get('academic_curriculum_x_hours', '12 JP / Minggu'),
            'academic_curriculum_x_focus' => $settings->get('academic_curriculum_x_focus', 'Disiplin & Ketelitian Ukur'),

            'academic_curriculum_xi_title' => $settings->get('academic_curriculum_xi_title', 'Konsentrasi & TeFa Level 1'),
            'academic_curriculum_xi_desc' => $settings->get('academic_curriculum_xi_desc', 'Masuk ke pendalaman teknis 3 sistem sepeda motor, simulasi pelayanan servis konsumen nyata (Teaching Factory), dan proyek produk kreatif kewirausahaan.'),
            'academic_curriculum_xi_hours' => $settings->get('academic_curriculum_xi_hours', '18 JP / Minggu'),
            'academic_curriculum_xi_focus' => $settings->get('academic_curriculum_xi_focus', 'Perawatan Berkala & TeFa'),

            'academic_curriculum_xii_title' => $settings->get('academic_curriculum_xii_title', 'Pemantapan Industri & PKL'),
            'academic_curriculum_xii_desc' => $settings->get('academic_curriculum_xii_desc', 'Pelaksanaan Praktik Kerja Lapangan (PKL) 6 bulan di AHASS, pemecahan masalah (troubleshooting) tingkat lanjut, pengelolaan manajemen bengkel, dan Uji Sertifikasi LSP/UKK.'),
            'academic_curriculum_xii_hours' => $settings->get('academic_curriculum_xii_hours', '6 Bulan Penuh di AHASS'),
            'academic_curriculum_xii_focus' => $settings->get('academic_curriculum_xii_focus', 'UKK, BNSP, Rekrutmen BKK'),

            // 04. Sertifikasi & Lisensi
            'academic_cert_ukk_title' => $settings->get('academic_cert_ukk_title', 'Uji Kompetensi Keahlian (UKK)'),
            'academic_cert_ukk_desc' => $settings->get('academic_cert_ukk_desc', 'Penilaian capaian kemampuan teknis menyeluruh di akhir masa studi oleh tim asesor internal dan penguji eksternal dari industri mitra untuk memverifikasi kesiapan kerja.'),
            'academic_cert_ukk_issuer' => $settings->get('academic_cert_ukk_issuer', 'Kemendikbudristek & DUDI'),
            'academic_cert_ukk_nature' => $settings->get('academic_cert_ukk_nature', 'Wajib Kelulusan SMK'),

            'academic_cert_bnsp_title' => $settings->get('academic_cert_bnsp_title', 'Sertifikasi BNSP / LSP-P1'),
            'academic_cert_bnsp_desc' => $settings->get('academic_cert_bnsp_desc', 'Sertifikat Garuda Emas resmi dari BNSP melalui Lembaga Sertifikasi Profesi Pihak Pertama (LSP-P1) berstandar SKKNI, diakui di seluruh wilayah Republik Indonesia dan ASEAN.'),
            'academic_cert_bnsp_license' => $settings->get('academic_cert_bnsp_license', 'BNSP (LSP-P1 SMKN 1)'),
            'academic_cert_bnsp_level' => $settings->get('academic_cert_bnsp_level', 'KKNI Level II Otomotif'),

            'academic_cert_ahm_title' => $settings->get('academic_cert_ahm_title', 'Lisensi Astra Honda Motor'),
            'academic_cert_ahm_desc' => $settings->get('academic_cert_ahm_desc', 'Standarisasi mekanik resmi dari PT Astra Honda Motor melalui kurikulum binaan sejak 2016, membuka jalur prioritas rekrutmen kerja langsung ke jaringan AHASS nasional.'),
            'academic_cert_ahm_issuer' => $settings->get('academic_cert_ahm_issuer', 'Astra Motor Training Center'),
            'academic_cert_ahm_opportunity' => $settings->get('academic_cert_ahm_opportunity', 'Prioritas Rekrutmen AHASS'),

            // 05. Program Unggulan
            'academic_flagship_title' => $settings->get('academic_flagship_title', 'Ekosistem Belajar Nyata'),
            'academic_flagship_desc' => $settings->get('academic_flagship_desc', 'Kami menghadirkan atmosfer industri langsung ke sekolah melalui fasilitas bengkel nyata, pembinaan keselamatan berkendara, dan budaya disiplin kerja tinggi.'),

            'academic_prog_honda_title' => $settings->get('academic_prog_honda_title', 'Kelas Industri Honda'),
            'academic_prog_honda_desc' => $settings->get('academic_prog_honda_desc', 'Sinkronisasi kurikulum resmi dengan standar PT Astra Honda Motor. Guru dan instruktur tersertifikasi berkala di Astra Motor Training Center, menggunakan bike lift dan modul ajar resmi AHASS.'),
            'academic_prog_honda_badge' => $settings->get('academic_prog_honda_badge', 'Binaan Resmi Sejak 2016'),
            'academic_prog_honda_tag' => $settings->get('academic_prog_honda_tag', 'Standar bengkel resmi AHASS'),

            'academic_prog_tefa_title' => $settings->get('academic_prog_tefa_title', 'Teaching Factory (TeFa)'),
            'academic_prog_tefa_desc' => $settings->get('academic_prog_tefa_desc', 'Bengkel operasional nyata di lingkungan sekolah. Siswa mempraktikkan servis berkala, tune-up injeksi, ganti oli, dan perbaikan motor milik konsumen umum di bawah supervisi mekanik ahli.'),
            'academic_prog_tefa_badge' => $settings->get('academic_prog_tefa_badge', 'Unit Servis Konsumen'),
            'academic_prog_tefa_tag' => $settings->get('academic_prog_tefa_tag', 'Pengalaman servis pelanggan riil'),

            'academic_prog_pkl_title' => $settings->get('academic_prog_pkl_title', 'Magang PKL di AHASS'),
            'academic_prog_pkl_desc' => $settings->get('academic_prog_pkl_desc', 'Praktik kerja industri 6 bulan penuh di jaringan bengkel resmi Honda se-Karesidenan Pati (Jepara, Pati, Kudus) untuk mengasah jam terbang dan adaptasi budaya kerja industri.'),
            'academic_prog_pkl_badge' => $settings->get('academic_prog_pkl_badge', 'Imersi Dunia Usaha'),
            'academic_prog_pkl_tag' => $settings->get('academic_prog_pkl_tag', 'Durasi 6 bulan di bengkel resmi'),

            'academic_prog_safety_title' => $settings->get('academic_prog_safety_title', 'Safety Riding Academy'),
            'academic_prog_safety_desc' => $settings->get('academic_prog_safety_desc', 'Program pelatihan berkendara aman berstandar Honda. SMKN 1 Bangsri konsisten menjuarai Safety Riding Competition putra & putri tingkat Karesidenan Pati hingga tingkat Nasional.'),
            'academic_prog_safety_badge' => $settings->get('academic_prog_safety_badge', 'Juara 1 Karesidenan & Nasional'),
            'academic_prog_safety_tag' => $settings->get('academic_prog_safety_tag', 'Pelatihan keselamatan bersertifikat'),

            'academic_prog_5r_title' => $settings->get('academic_prog_5r_title', 'Budaya Industri 5R & APD'),
            'academic_prog_5r_desc' => $settings->get('academic_prog_5r_desc', 'Penerapan disiplin kerja ala Jepang: Ringkas, Rapi, Resik, Rawat, Rajin. Kewajiban pemakaian Alat Pelindung Diri (APD), standar rambut rapi (2-1-1), dan kebersihan area bengkel.'),
            'academic_prog_5r_badge' => $settings->get('academic_prog_5r_badge', 'Tata Tertib Bengkel'),
            'academic_prog_5r_tag' => $settings->get('academic_prog_5r_tag', 'Standar K3LH & kedisiplinan kerja'),

            'academic_prog_lks_title' => $settings->get('academic_prog_lks_title', 'Lomba LKS & Kontes Honda'),
            'academic_prog_lks_desc' => $settings->get('academic_prog_lks_desc', 'Pembinaan khusus siswa dan guru untuk bertarung di Lomba Kompetensi Siswa (LKS) tingkat Kabupaten, Provinsi, hingga Kontes Guru & Siswa Nasional Astra Motor.'),
            'academic_prog_lks_badge' => $settings->get('academic_prog_lks_badge', 'Ajang Kompetisi Vokasi'),
            'academic_prog_lks_tag' => $settings->get('academic_prog_lks_tag', 'Tradisi juara LKS & Astra Motor'),

            // 06. Karir & Roadmap
            'academic_career_1_title' => $settings->get('academic_career_1_title', 'Teknisi Servis Sepeda Motor'),
            'academic_career_1_desc' => $settings->get('academic_career_1_desc', 'Menjadi teknisi mekanik handal dan profesional dalam servis dan perawatan berkala di jaringan bengkel resmi Honda (AHASS) maupun bengkel multibrand modern.'),
            'academic_career_1_ladder' => $settings->get('academic_career_1_ladder', 'Mekanik Pratama → Senior Mechanic → Service Advisor → Kepala Bengkel'),

            'academic_career_2_title' => $settings->get('academic_career_2_title', 'Industri Perakitan Otomotif'),
            'academic_career_2_desc' => $settings->get('academic_career_2_desc', 'Bekerja di bidang perakitan sepeda motor, industri komponen presisi suku cadang, lini produksi pabrik otomotif (Assembly Line), dan Quality Control (QC).'),
            'academic_career_2_placement' => $settings->get('academic_career_2_placement', 'Pabrik Manufaktur Otomotif, Operator Lini Perakitan, Teknisi Quality Control'),

            'academic_career_3_title' => $settings->get('academic_career_3_title', 'Wirausaha Bengkel Mandiri'),
            'academic_career_3_desc' => $settings->get('academic_career_3_desc', 'Membuka usaha bengkel mandiri, toko suku cadang (spare parts store), jasa modifikasi standar, atau penyedia layanan panggilan darurat (home service).'),
            'academic_career_3_skills' => $settings->get('academic_career_3_skills', 'Pengelolaan Bengkel, Estimasi Biaya Servis, Manajemen Toko Spare Parts'),

            'academic_roadmap_1_title' => $settings->get('academic_roadmap_1_title', 'Fondasi Mekanika, Pengukuran Presisi & Budaya 5R'),
            'academic_roadmap_1_desc' => $settings->get('academic_roadmap_1_desc', 'Siswa mempelajari dasar teknologi otomotif, gambar teknik, penguasaan hand tools dan alat ukur presisi (Jangka Sorong & Micrometer), serta pembentukan karakter disiplin industri (APD lengkap dan tata tertib 2-1-1).'),

            'academic_roadmap_2_title' => $settings->get('academic_roadmap_2_title', 'Konsentrasi Kejuruan, Praktik TeFa & Safety Riding'),
            'academic_roadmap_2_desc' => $settings->get('academic_roadmap_2_desc', 'Mendalami perawatan mesin sepeda motor, sasis, dan kelistrikan. Siswa mulai diterjunkan pada unit Teaching Factory (TeFa) untuk melayani servis berkala sepeda motor nyata dan mendapatkan pembinaan Safety Riding bersertifikat.'),

            'academic_roadmap_3_title' => $settings->get('academic_roadmap_3_title', 'Praktik Kerja Lapangan (PKL) 6 Bulan di Bengkel Resmi AHASS'),
            'academic_roadmap_3_desc' => $settings->get('academic_roadmap_3_desc', 'Imersi kerja langsung di jaringan bengkel resmi Honda se-Karesidenan Pati. Siswa mengasah kecepatan, ketepatan diagnosa, pemecahan masalah konsumen, dan mentalitas profesional di bawah supervisi mekanik senior AHASS.'),

            'academic_roadmap_4_title' => $settings->get('academic_roadmap_4_title', 'Uji Sertifikasi BNSP / LSP-P1, Lisensi AHM & Rekrutmen Kerja'),
            'academic_roadmap_4_desc' => $settings->get('academic_roadmap_4_desc', 'Pengelolaan bengkel, pelaksanaan Uji Kompetensi Keahlian (UKK), asesmen lisensi BNSP, sertifikasi mekanik Astra Motor, serta penyaluran kerja langsung lewat Bursa Kerja Khusus (BKK) SMK Negeri 1 Bangsri.'),

            // 07. Instruktur & CTA
            'academic_teacher_title' => $settings->get('academic_teacher_title', 'Dibimbing oleh Instruktur Tersertifikasi Astra Motor'),
            'academic_teacher_desc' => $settings->get('academic_teacher_desc', 'Guru kejuruan dan instruktur TBSM SMK Negeri 1 Bangsri rutin mengikuti program peningkatan kompetensi dan sertifikasi berjenjang di Astra Motor Training Center.'),

            'academic_cta_badge' => $settings->get('academic_cta_badge', 'SIAP BERKARIER DI DUNIA OTOMOTIF?'),
            'academic_cta_title' => $settings->get('academic_cta_title', 'Wujudkan Masa Depan Teknisi Andal Bersama TBSM SMKN 1 Bangsri'),
            'academic_cta_desc' => $settings->get('academic_cta_desc', 'Dapatkan pendidikan vokasi berkualitas dengan fasilitas laboratorium berstandar Astra Honda Motor dan peluang kerja nyata setelah lulus.'),
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Tabs::make('Pengaturan Halaman Akademik')
                    ->tabs([
                        // TAB 1: HERO & METRIK
                        Tab::make('Hero & Metrik')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Header Utama Halaman')
                                    ->description('Atur judul besar, badge, dan pengantar di bagian paling atas.')
                                    ->schema([
                                        TextInput::make('academic_hero_badge')->label('Badge Atas')->required(),
                                        TextInput::make('academic_hero_title')->label('Judul Besar (Heading)')->required(),
                                        Textarea::make('academic_hero_subtitle')->label('Deskripsi Pengantar')->rows(3)->required(),
                                    ]),

                                Section::make('Kotak Ringkasan & Kemitraan')
                                    ->description('Informasi rasio praktikum dan mitra industri di sisi kanan header.')
                                    ->schema([
                                        TextInput::make('academic_partner_name')->label('Nama Mitra Industri Utama')->required(),
                                        TextInput::make('academic_praktikum_pct')->label('Persentase Praktikum')->required(),
                                        TextInput::make('academic_praktikum_label')->label('Label Praktikum')->required(),
                                        TextInput::make('academic_teori_pct')->label('Persentase Teori')->required(),
                                        TextInput::make('academic_teori_label')->label('Label Teori')->required(),
                                    ])->columns(2),
                            ]),

                        // TAB 2: 4 PILAR KOMPETENSI
                        Tab::make('4 Pilar Kompetensi')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('01. Sistem Mesin (Engine)')
                                    ->schema([
                                        TextInput::make('academic_comp_engine_title')->label('Judul Modul')->required(),
                                        Textarea::make('academic_comp_engine_desc')->label('Deskripsi Teknis')->rows(2)->required(),
                                        Textarea::make('academic_comp_engine_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3),
                                    ]),

                                Section::make('02. Sistem Sasis (Chassis)')
                                    ->schema([
                                        TextInput::make('academic_comp_chassis_title')->label('Judul Modul')->required(),
                                        Textarea::make('academic_comp_chassis_desc')->label('Deskripsi Teknis')->rows(2)->required(),
                                        Textarea::make('academic_comp_chassis_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3),
                                    ]),

                                Section::make('03. Sistem Kelistrikan (Electrical)')
                                    ->schema([
                                        TextInput::make('academic_comp_electrical_title')->label('Judul Modul')->required(),
                                        Textarea::make('academic_comp_electrical_desc')->label('Deskripsi Teknis')->rows(2)->required(),
                                        Textarea::make('academic_comp_electrical_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3),
                                    ]),

                                Section::make('04. Pengelolaan Bengkel (Management)')
                                    ->schema([
                                        TextInput::make('academic_comp_management_title')->label('Judul Modul')->required(),
                                        Textarea::make('academic_comp_management_desc')->label('Deskripsi Teknis')->rows(2)->required(),
                                        Textarea::make('academic_comp_management_scope')->label('Cakupan Keahlian (1 baris per poin)')->rows(3),
                                    ]),
                            ]),

                        // TAB 3: STRUKTUR KURIKULUM & SILABUS
                        Tab::make('Kurikulum & Silabus')
                            ->icon('heroicon-o-book-open')
                            ->schema([
                                Section::make('Pengantar & Dokumen Silabus')
                                    ->description('Unggah file PDF silabus dan atur teks ringkasan untuk modal dialog.')
                                    ->schema([
                                        TextInput::make('academic_curriculum_heading')->label('Judul Bagian')->required(),
                                        Textarea::make('academic_curriculum_subheading')->label('Deskripsi Singkat')->rows(2)->required(),
                                        FileUpload::make('academic_syllabus_file')
                                            ->label('Unggah File Silabus / Kurikulum (PDF)')
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->directory('academic')
                                            ->helperText('Jika diisi, tombol "Ringkasan Silabus PDF" akan membuka modal dengan opsi unduh file PDF resmi ini.'),
                                        Textarea::make('academic_syllabus_modal_intro')->label('Teks Pengantar Silabus (Modal)')->rows(2),
                                        Textarea::make('academic_syllabus_modal_hours')->label('Rincian Struktur Jam Pelajaran (JP)')->rows(3),
                                        Textarea::make('academic_syllabus_modal_standards')->label('Standar Kelulusan Kompetensi')->rows(2),
                                    ]),

                                Section::make('Tingkat Kelas X (Fase E)')
                                    ->schema([
                                        TextInput::make('academic_curriculum_x_title')->label('Judul Fase')->required(),
                                        Textarea::make('academic_curriculum_x_desc')->label('Deskripsi Pembelajaran')->rows(2)->required(),
                                        TextInput::make('academic_curriculum_x_hours')->label('Alokasi JP')->required(),
                                        TextInput::make('academic_curriculum_x_focus')->label('Fokus Utama')->required(),
                                    ])->columns(2),

                                Section::make('Tingkat Kelas XI (Fase F)')
                                    ->schema([
                                        TextInput::make('academic_curriculum_xi_title')->label('Judul Fase')->required(),
                                        Textarea::make('academic_curriculum_xi_desc')->label('Deskripsi Pembelajaran')->rows(2)->required(),
                                        TextInput::make('academic_curriculum_xi_hours')->label('Alokasi JP')->required(),
                                        TextInput::make('academic_curriculum_xi_focus')->label('Fokus Utama')->required(),
                                    ])->columns(2),

                                Section::make('Tingkat Kelas XII (Fase F & Magang)')
                                    ->schema([
                                        TextInput::make('academic_curriculum_xii_title')->label('Judul Fase')->required(),
                                        Textarea::make('academic_curriculum_xii_desc')->label('Deskripsi Pembelajaran')->rows(2)->required(),
                                        TextInput::make('academic_curriculum_xii_hours')->label('Alokasi JP / Durasi PKL')->required(),
                                        TextInput::make('academic_curriculum_xii_focus')->label('Fokus Utama / Muara')->required(),
                                    ])->columns(2),
                            ]),

                        // TAB 4: SERTIFIKASI & LISENSI
                        Tab::make('Sertifikasi & Lisensi')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('01. Uji Kompetensi Keahlian (UKK)')
                                    ->schema([
                                        TextInput::make('academic_cert_ukk_title')->label('Nama Sertifikasi')->required(),
                                        Textarea::make('academic_cert_ukk_desc')->label('Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_cert_ukk_issuer')->label('Lembaga Penerbit')->required(),
                                        TextInput::make('academic_cert_ukk_nature')->label('Sifat Sertifikasi')->required(),
                                    ])->columns(2),

                                Section::make('02. Sertifikasi BNSP / LSP-P1')
                                    ->schema([
                                        TextInput::make('academic_cert_bnsp_title')->label('Nama Sertifikasi')->required(),
                                        Textarea::make('academic_cert_bnsp_desc')->label('Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_cert_bnsp_license')->label('Badan / Lembaga Lisensi')->required(),
                                        TextInput::make('academic_cert_bnsp_level')->label('Level Kualifikasi')->required(),
                                    ])->columns(2),

                                Section::make('03. Lisensi Astra Honda Motor (AHM)')
                                    ->schema([
                                        TextInput::make('academic_cert_ahm_title')->label('Nama Sertifikasi')->required(),
                                        Textarea::make('academic_cert_ahm_desc')->label('Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_cert_ahm_issuer')->label('Lembaga Verifikasi')->required(),
                                        TextInput::make('academic_cert_ahm_opportunity')->label('Peluang Penempatan')->required(),
                                    ])->columns(2),
                            ]),

                        // TAB 5: PROGRAM UNGGULAN
                        Tab::make('Program Unggulan')
                            ->icon('heroicon-o-trophy')
                            ->schema([
                                Section::make('Pengantar Program Unggulan')
                                    ->schema([
                                        TextInput::make('academic_flagship_title')->label('Judul Seksi')->required(),
                                        Textarea::make('academic_flagship_desc')->label('Deskripsi Seksi')->rows(2)->required(),
                                    ]),

                                Section::make('Daftar 6 Program Unggulan')
                                    ->description('Atur judul, deskripsi, dan badge highlight untuk masing-masing kartu.')
                                    ->schema([
                                        TextInput::make('academic_prog_honda_title')->label('Program 1: Judul')->required(),
                                        TextInput::make('academic_prog_honda_badge')->label('Program 1: Badge Atas')->required(),
                                        Textarea::make('academic_prog_honda_desc')->label('Program 1: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_prog_honda_tag')->label('Program 1: Tag Bawah')->required(),

                                        TextInput::make('academic_prog_tefa_title')->label('Program 2: Judul')->required(),
                                        TextInput::make('academic_prog_tefa_badge')->label('Program 2: Badge Atas')->required(),
                                        Textarea::make('academic_prog_tefa_desc')->label('Program 2: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_prog_tefa_tag')->label('Program 2: Tag Bawah')->required(),

                                        TextInput::make('academic_prog_pkl_title')->label('Program 3: Judul')->required(),
                                        TextInput::make('academic_prog_pkl_badge')->label('Program 3: Badge Atas')->required(),
                                        Textarea::make('academic_prog_pkl_desc')->label('Program 3: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_prog_pkl_tag')->label('Program 3: Tag Bawah')->required(),

                                        TextInput::make('academic_prog_safety_title')->label('Program 4: Judul')->required(),
                                        TextInput::make('academic_prog_safety_badge')->label('Program 4: Badge Atas')->required(),
                                        Textarea::make('academic_prog_safety_desc')->label('Program 4: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_prog_safety_tag')->label('Program 4: Tag Bawah')->required(),

                                        TextInput::make('academic_prog_5r_title')->label('Program 5: Judul')->required(),
                                        TextInput::make('academic_prog_5r_badge')->label('Program 5: Badge Atas')->required(),
                                        Textarea::make('academic_prog_5r_desc')->label('Program 5: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_prog_5r_tag')->label('Program 5: Tag Bawah')->required(),

                                        TextInput::make('academic_prog_lks_title')->label('Program 6: Judul')->required(),
                                        TextInput::make('academic_prog_lks_badge')->label('Program 6: Badge Atas')->required(),
                                        Textarea::make('academic_prog_lks_desc')->label('Program 6: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_prog_lks_tag')->label('Program 6: Tag Bawah')->required(),
                                    ])->columns(2),
                            ]),

                        // TAB 6: KARIR & ROADMAP 3 TAHUN
                        Tab::make('Karir & Roadmap')
                            ->icon('heroicon-o-briefcase')
                            ->schema([
                                Section::make('Pilihan Karir Lulusan')
                                    ->schema([
                                        TextInput::make('academic_career_1_title')->label('Karir 1: Judul')->required(),
                                        Textarea::make('academic_career_1_desc')->label('Karir 1: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_career_1_ladder')->label('Karir 1: Jenjang Karir')->required(),

                                        TextInput::make('academic_career_2_title')->label('Karir 2: Judul')->required(),
                                        Textarea::make('academic_career_2_desc')->label('Karir 2: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_career_2_placement')->label('Karir 2: Peluang Penempatan')->required(),

                                        TextInput::make('academic_career_3_title')->label('Karir 3: Judul')->required(),
                                        Textarea::make('academic_career_3_desc')->label('Karir 3: Deskripsi')->rows(2)->required(),
                                        TextInput::make('academic_career_3_skills')->label('Karir 3: Bekal Kompetensi')->required(),
                                    ]),

                                Section::make('Alur Perjalanan Siswa (Roadmap 3 Tahun)')
                                    ->schema([
                                        TextInput::make('academic_roadmap_1_title')->label('Tahun 1 (Kelas X): Judul')->required(),
                                        Textarea::make('academic_roadmap_1_desc')->label('Tahun 1 (Kelas X): Deskripsi')->rows(2)->required(),

                                        TextInput::make('academic_roadmap_2_title')->label('Tahun 2 (Kelas XI): Judul')->required(),
                                        Textarea::make('academic_roadmap_2_desc')->label('Tahun 2 (Kelas XI): Deskripsi')->rows(2)->required(),

                                        TextInput::make('academic_roadmap_3_title')->label('Tahun 3 (Kelas XII PKL): Judul')->required(),
                                        Textarea::make('academic_roadmap_3_desc')->label('Tahun 3 (Kelas XII PKL): Deskripsi')->rows(2)->required(),

                                        TextInput::make('academic_roadmap_4_title')->label('Tahap Akhir (Sertifikasi & Kerja): Judul')->required(),
                                        Textarea::make('academic_roadmap_4_desc')->label('Tahap Akhir (Sertifikasi & Kerja): Deskripsi')->rows(2)->required(),
                                    ]),
                            ]),

                        // TAB 7: INSTRUKTUR & CTA
                        Tab::make('Instruktur & CTA')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Banner Bimbingan Instruktur')
                                    ->schema([
                                        TextInput::make('academic_teacher_title')->label('Judul Banner')->required(),
                                        Textarea::make('academic_teacher_desc')->label('Deskripsi Singkat')->rows(2)->required(),
                                    ]),

                                Section::make('Call to Action (CTA) Penutup')
                                    ->schema([
                                        TextInput::make('academic_cta_badge')->label('Badge CTA')->required(),
                                        TextInput::make('academic_cta_title')->label('Judul Ajakan')->required(),
                                        Textarea::make('academic_cta_desc')->label('Deskripsi Ajakan')->rows(2)->required(),
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
            ->title('Pengaturan Halaman Akademik berhasil disimpan')
            ->success()
            ->send();
    }
}
