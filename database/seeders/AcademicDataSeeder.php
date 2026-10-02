<?php

namespace Database\Seeders;

use App\Models\Competency;
use App\Models\Facility;
use App\Models\Program;
use App\Models\Teacher;
use App\Models\User;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AcademicDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Programs & Competencies
        $programs = [
            [
                'name' => 'Teknik dan Bisnis Sepeda Motor',
                'description' => '<p>Konsentrasi keahlian Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri merupakan program kejuruan unggulan binaan resmi PT Astra Honda Motor (Grade A+). Kurikulum dirancang menyelaraskan kompetensi teknis sepeda motor terkini (PGM-FI, eSP+, Smart Key) dengan kebutuhan riil bengkel resmi AHASS.</p>
                <h4>Pilihan Prospek Karir & Masa Depan:</h4>
                <ul>
                    <li>Teknisi Sepeda Motor Andal di jaringan Bengkel Resmi AHASS.</li>
                    <li>Front Desk & Service Advisor profesional bengkel modern.</li>
                    <li>Operator dan Quality Control di industri manufaktur otomotif perakitan motor.</li>
                    <li>Wirausahawan mandiri pemilik bengkel servis injeksi dan suku cadang.</li>
                    <li>Melanjutkan studi ke jenjang pendidikan tinggi vokasi teknik mesin / otomotif.</li>
                </ul>',
                'competencies' => [
                    [
                        'name' => 'Mesin (Engine Sepeda Motor)',
                        'slug' => 'mesin',
                        'description' => 'Mendiagnosis gangguan atau kerusakan pada Engine Sepeda Motor meliputi Komponen Utama Engine 4-Tak, Sistem Pelumasan, Sistem Pendinginan, dan Sistem Suplai Bahan Bakar Injeksi PGM-FI.'
                    ],
                    [
                        'name' => 'Sasis & Pemindah Tenaga',
                        'slug' => 'sasis',
                        'description' => 'Mendiagnosis gangguan atau kerusakan pada Sasis Sepeda Motor beserta komponen-komponennya diantaranya Sistem Rem Hidrolik (CBS/ABS), Sistem Kemudi, Suspensi, Rangka, Pelek, Ban, dan Transmisi Otomatis CVT.'
                    ],
                    [
                        'name' => 'Kelistrikan & Sistem Sensor Otomotif',
                        'slug' => 'kelistrikan',
                        'description' => 'Mendiagnosis gangguan atau kerusakan pada Sistem Kelistrikan Sepeda Motor diantaranya Sistem Pengapian Full Transistor, Sistem Pengisian Baterai, Starter ACG, Sistem Penerangan LED, Sistem Smart Key (Keyless), dan Reset Sensor ECM dengan Diagnostic Scanner HIDS.'
                    ],
                    [
                        'name' => 'Pengelolaan & Manajemen Bengkel',
                        'slug' => 'pengelolaan-bengkel',
                        'description' => 'Mampu menerapkan tata kelola administrasi bengkel resmi AHASS, customer service Service Advisor, alur penerimaan servis (work order), manajemen suku cadang Honda Genuine Parts (HGP), serta budaya kerja 5R dan K3LH.'
                    ]
                ]
            ]
        ];

        foreach ($programs as $progData) {
            $thumbnail = SeedAssetGenerator::generateImage('Program ' . $progData['name'], 'programs', 800, 600, '#dc2626', '#ffffff');
            $program = Program::updateOrCreate(
                ['slug' => Str::slug($progData['name'])],
                [
                    'name' => $progData['name'],
                    'description' => $progData['description'],
                    'thumbnail' => $thumbnail
                ]
            );

            foreach ($progData['competencies'] as $comp) {
                Competency::updateOrCreate(
                    [
                        'slug' => $comp['slug'] ?? Str::slug($comp['name'])
                    ],
                    [
                        'program_id' => $program->id,
                        'name' => $comp['name'],
                        'description' => $comp['description']
                    ]
                );
            }
        }

        // 2. Teachers (Tenaga Pengajar TBSM SMKN 1 Bangsri)
        $teachers = [
            ['name' => 'Laily Rizqissalim, S.Pd.', 'nip' => '198001012005011001', 'position' => 'Ketua Kompetensi Keahlian', 'is_hod' => true],
            ['name' => 'Akhmad Lutfianto, S.Pd.', 'nip' => '198202022006021002', 'position' => 'Bendahara Jurusan', 'is_hod' => false],
            ['name' => 'Ahmad Wildan, S.Pd.', 'nip' => '198503032008032003', 'position' => 'Sekretaris Jurusan', 'is_hod' => false],
            ['name' => 'Galih Zainawan, S.Pd.', 'nip' => '199004042010041004', 'position' => 'Kepala Laboratorium Bengkel', 'is_hod' => false],
            ['name' => 'Ahmad Arif Johan, S.Pd.', 'nip' => '199205052015052005', 'position' => 'Bidang Event dan Prestasi', 'is_hod' => false],
            ['name' => 'Hisyam Kholil, S.Pd.', 'nip' => '199506062020061006', 'position' => 'Bidang Kerjasama IDUKA', 'is_hod' => false],
            ['name' => 'Muslikan, S.Pd.', 'nip' => '199607072021071007', 'position' => 'Koordinator Praktik Kerja Lapangan (PKL)', 'is_hod' => false],
            ['name' => 'Khasan Taufik', 'nip' => '199808082022081008', 'position' => 'Toolman Bengkel Otomotif', 'is_hod' => false],
        ];

        foreach ($teachers as $idx => $tData) {
            $photo = SeedAssetGenerator::generateImage('Guru ' . ($idx+1), 'teachers', 400, 400, '#059669', '#ffffff');
            Teacher::updateOrCreate(
                ['nip' => $tData['nip']],
                [
                    'name' => $tData['name'],
                    'position' => $tData['position'],
                    'phone' => '08232342905' . ($idx+1),
                    'photo' => $photo,
                    'is_head_of_department' => $tData['is_hod'],
                    'is_active' => true,
                    'user_id' => null
                ]
            );
        }

        // 3. Facilities
        $sstPhoto = SeedAssetGenerator::generateImage('Gudang SST dan Suku Cadang Asli HGP', 'facilities', 800, 600, '#1e293b', '#ffffff');

        $facilities = [
            [
                'name' => 'Bengkel Praktik & Pit Servis Honda AHASS',
                'slug' => 'bengkel-praktik-pit-servis-honda-ahass',
                'category' => 'tefa_workshop',
                'description' => '<p>Unit bengkel operasional berstandar bengkel resmi Astra Honda Motor (AHASS) di lingkungan SMKN 1 Bangsri. Berfungsi sebagai fasilitas praktik kejuruan siswa untuk melatih keterampilan servis berkala, tune-up injeksi PGM-FI, penggantian suku cadang asli HGP (Honda Genuine Parts), dan uji kelayakan sepeda motor sesuai SOP industri.</p>',
                'specifications' => "6 Stall Servis Resmi Berstandar AHASS\nExhaust Gas Extraction System (Penyedot Emisi Gas Buang)\nBike Lift Hidrolik Kapasitas 500 kg\nTool Cabinet & Mekanik Trolley Lengkap per Stall\nKompresor Udara Sentral Bertekanan Tinggi\nService Advisor Front Desk & Sistem Antrean Terkomputerisasi",
                'photo' => 'facilities/bengkel-praktik-otomotif.png',
                'quantity' => 6,
                'capacity' => '36 Siswa / 6 Pit Servis',
                'safety_standards' => 'Wearpack Standar AHASS, Safety Shoes, Kacamata Pelindung, Tabung APAR 6 kg, Jalur Evakuasi Evacuation Point',
                'condition' => 'good',
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'name' => 'Stall Servis & Unit Praktik Sepeda Motor Honda',
                'slug' => 'stall-servis-unit-praktik-sepeda-motor-honda',
                'category' => 'tefa_workshop',
                'description' => '<p>Lini praktik langsung menggunakan unit sepeda motor Honda generasi terbaru (tipe Matic eSP+, Bebek/Cub, dan Sport). Siswa berlatih bongkar pasang komponen, perawatan sistem transmisi otomatis CVT, penggantian roller & v-belt, serta penyetelan sistem rem hidrolik secara langsung pada unit kerja nyata.</p>',
                'specifications' => "Unit Motor Praktik: Honda Beat ESP, Vario 125/160, Blade, Revo FI, Supra X 125, CB150R\nHydraulic Bike Lift dengan pengunci roda depan pneumatik\nOil Drainer Catcher & Penampung Limbah Oli Bekas B3\nDiagnostic Battery Tester Digital\nPneumatic Air Impact Wrench & Torque Wrench Terkalibrasi",
                'photo' => 'facilities/stall-servis-motor-praktik.png',
                'quantity' => 8,
                'capacity' => '24 Siswa / 4 Stall Unit',
                'safety_standards' => 'Penampung Limbah B3 Bersegel, Kacamata Kerja, Sarung Tangan Karet Nitrile',
                'condition' => 'good',
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'name' => 'Laboratorium Sistem Injeksi PGM-FI & Simulator Kelistrikan',
                'slug' => 'laboratorium-sistem-injeksi-pgm-fi-simulator-kelistrikan',
                'category' => 'electrical_lab',
                'description' => '<p>Laboratorium pengujian kelistrikan otomotif dan simulasi kontrol elektronik terkomputerisasi. Menggunakan media trainer stand interaktif resmi Honda untuk mensimulasikan kegagalan sensor (MIL Trouble Code), pembacaan scanner diagnostik HIDS (Honda Intelligent Diagnostic System), reset ECM, dan kalibrasi sistem Smart Key (Keyless).</p>',
                'specifications' => "Trainer Stand PGM-FI Full Wiring & Sensor Simulation Board\nDiagnostic Scanner HIDS & Multi-Tester Digital\nOscilloscope Digital untuk Pembacaan Sinyal Sensor CKP/CMP\nSimulator Sistem Smart Key System & Answer Back Honda\nInjector Cleaner & Ultrasonic Tester Bench\nSistem Pengisian, Pengapian Full Transistor & Starter ACG",
                'photo' => 'facilities/trainer-injeksi-kelistrikan.png',
                'quantity' => 5,
                'capacity' => '30 Siswa / 5 Meja Trainer',
                'safety_standards' => 'Matras Karet Anti-Statis, Fuse Proteksi Sirkuit, APAR Powder Kimia',
                'condition' => 'good',
                'sort_order' => 3,
                'is_featured' => true,
            ],
            [
                'name' => 'Ruang Overhaul Mesin & Pengukuran Presisi (Engine Stand)',
                'slug' => 'ruang-overhaul-mesin-pengukuran-presisi-engine-stand',
                'category' => 'engine_lab',
                'description' => '<p>Ruang khusus pembedahan komponen dalam mesin (engine overhaul) 4-tak. Dilengkapi deretan engine stand berputar untuk memudahkan siswa menganalisis keausan silinder blok, pembersihan kerak ruang bakar, pengukuran celah katup dengan feeler gauge, hingga penataan timing rantai keteng (cam chain).</p>',
                'specifications' => "Multi-Tier Rotary Engine Stand Honda 110cc - 150cc\nCylinder Bore Gauge, Micrometer Luar & Micrometer Dalam (Ketelitian 0.01 mm)\nDial Indicator & V-Block untuk Pemeriksaan Keolengan Crankshaft & Camshaft\nFeeler Gauge Presisi & Valve Spring Compressor\nTorque Wrench (Kunci Torsi Kunci Momen) Standar Pabrikan\nMeja Kerja Heavy Duty Dilapisi Plat Logam & Nampan Komponen",
                'photo' => 'facilities/engine-stand-overhaul.png',
                'quantity' => 10,
                'capacity' => '28 Siswa / 7 Engine Stand',
                'safety_standards' => 'Kacamata Pelindung Serpihan, Sarung Tangan Mekanik, Oil Spill Kit',
                'condition' => 'good',
                'sort_order' => 4,
                'is_featured' => true,
            ],
            [
                'name' => 'Ruang Kelas Teori & Multimedia Otomotif',
                'slug' => 'ruang-kelas-teori-multimedia-otomotif',
                'category' => 'theory_room',
                'description' => '<p>Ruang pembelajaran teori kejuruan otomotif yang nyaman, ber-AC, dan dilengkapi proyektor interaktif. Digunakan untuk pendalaman teori kerja mesin motor, gambar teknik otomotif, manual book servis (BPR Honda), serta diskusi modul Kurikulum Merdeka sebelum praktik bengkel.</p>',
                'specifications' => "Proyektor Multimedia Full HD & Audio Surround Sound\nWhiteboard Magnetik & Display Komponen Potong (Cutaway Model)\nMeja dan Kursi Ergonomis untuk 36 Siswa\nAkses Internet Wi-Fi Dedicated untuk E-Learning & Manual Honda\nRuangan Berpendingin Udara (AC) & Pencahayaan Standar Belajar",
                'photo' => 'facilities/ruang-teori-otomotif.png',
                'quantity' => 2,
                'capacity' => '36 Siswa',
                'safety_standards' => 'Sirkulasi Udara Alami & AC, Jalur Evakuasi Tangga Darurat',
                'condition' => 'good',
                'sort_order' => 5,
                'is_featured' => true,
            ],
            [
                'name' => 'Gudang Special Service Tools (SST) & Suku Cadang Asli HGP',
                'slug' => 'gudang-special-service-tools-sst-suku-cadang-asli-hgp',
                'category' => 'tool_storage',
                'description' => '<p>Ruang penyimpanan terpusat untuk perkakas khusus (SST), alat ukur kalibrasi, dan suku cadang orisinal Honda Genuine Parts (HGP) & AHM Oil. Menggunakan sistem kartu kontrol pinjam alat terkomputerisasi untuk melatih tanggung jawab dan kedisiplinan inventaris bengkel.</p>',
                'specifications' => "Shadow Board Dinding Alat Khusus (Flywheel Puller, Bearing Driver, dll)\nLemari Khusus Alat Ukur Presisi Berpengatur Kelembaban (Dry Box)\nRak Penyimpanan Bertingkat Suku Cadang Orisinal HGP & Oli AHM\nSistem Kartu Inventaris & Barcode Scanner Peminjaman Alat\nMeja Penerimaan & Pengecekan Kondisi Alat Sebelum/Sesudah Praktik",
                'photo' => $sstPhoto,
                'quantity' => 1,
                'capacity' => 'Pengelola Gudang & 1 Kelompok Siswa Per Sesi',
                'safety_standards' => 'Kunci Pengaman Terpusat, Ventilasi Khusus Zat Kimia, APAR CO2',
                'condition' => 'good',
                'sort_order' => 6,
                'is_featured' => false,
            ],
        ];

        foreach ($facilities as $facData) {
            $slug = $facData['slug'] ?? Str::slug($facData['name']);
            Facility::updateOrCreate(
                ['slug' => $slug],
                $facData
            );
        }
    }
}
