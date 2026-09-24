<?php

namespace Database\Seeders;

use App\Models\IndustryPartner;
use App\Models\Internship;
use App\Models\JobVacancy;
use App\Models\Partnership;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IndustryDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Industry Partners (Fokus 1 Mitra: PT Astra Honda Motor)
        $partner = IndustryPartner::updateOrCreate(
            ['slug' => 'astra-honda-motor'],
            [
                'name' => 'PT Astra Honda Motor (Astra Motor)',
                'industry_type' => 'Manufaktur & Distribusi Sepeda Motor Resmi (AHASS)',
                'description' => '<p>Program Kemitraan Kelas Industri Binaan PT Astra Honda Motor (AHM) di Jurusan Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri telah terjalin resmi sejak tahun 2016. Sinergi ini mencakup sinkronisasi kurikulum berbasis teknologi injeksi PGM-FI Honda, standarisasi sarana bengkel praktikum standar AHASS Grade A+, pelatihan dan sertifikasi kompetensi guru/instruktur, program magang PKL terstruktur, serta rekrutmen mekanik resmi di jaringan dealer dan bengkel AHASS se-Kabupaten Jepara dan sekitarnya.</p>',
                'address' => 'Jl. Laksda Yos Sudarso, Sunter I, Jakarta Utara, DKI Jakarta 14350',
                'phone' => '021-6518080',
                'email' => 'contact@astra-honda.com',
                'website' => 'https://www.astra-honda.com',
                'logo' => SeedAssetGenerator::generateImage('Logo AHM', 'industry', 400, 400, '#dc2626', '#ffffff'),
                'status' => 'published',
                'published_at' => now(),
                'mou_number' => '042/MoU-AHM/SMKN1BSR/TBSM/2021',
                'mou_start_date' => '2016-01-01',
                'mou_end_date' => '2028-12-31',
                'partnership_level' => 'Kelas Industri Binaan Grade A+',
                'headquarters_city' => 'Jakarta Utara (Pusat) & Semarang (Main Dealer Astra Motor Jateng)',
                'curriculum_sync_info' => 'Kurikulum TBSM SMKN 1 Bangsri telah disinkronkan 100% dengan Kurikulum Vokasi Astra Honda Motor, mencakup teknologi PGM-FI injeksi, engine scanner, transmisi otomatis eSP, sistem kelistrikan & starter smart key, serta pemeliharaan sasis berstandar AHASS.',
            ]
        );

        $partnerModels = [$partner];

        // 1.1 Branches di 1 Kabupaten (Kabupaten Jepara)
        $branches = [
            [
                'name' => 'AHASS 07123 - Astra Motor Bangsri',
                'branch_code' => 'AHASS-07123',
                'district' => 'Bangsri',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Bangsri - Mlonggo Km. 1, Bangsri, Jepara',
                'phone' => '0291-771234',
                'whatsapp' => '6282323429052',
                'google_maps_url' => 'https://maps.google.com/?q=Astra+Motor+Bangsri+Jepara',
                'pic_name' => 'Bambang Sutrisno, S.T. (Kepala Bengkel)',
                'pic_phone' => '082323429052',
                'internship_quota' => 6,
                'facilities' => "6 Pit Bike Lift Hidrolik\nRuang Uji Emisi Gas Buang\nScanner ECM PGM-FI Diagnostic\nRuang Tunggu AC & Display Sparepart HGP\nSpecial Service Tools (SST) Honda Lengkap",
                'is_main_branch' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'AHASS 01844 - Nusantara Sakti Jepara',
                'branch_code' => 'AHASS-01844',
                'district' => 'Jepara',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Pemuda No. 45, Potroyudan, Kec. Jepara Kota, Jepara',
                'phone' => '0291-591844',
                'whatsapp' => '6281228001844',
                'google_maps_url' => 'https://maps.google.com/?q=Nusantara+Sakti+Jepara',
                'pic_name' => 'Haryanto, A.Md. (Service Advisor)',
                'pic_phone' => '081228001844',
                'internship_quota' => 4,
                'facilities' => "8 Pit Servis Express & Reguler\nRuang Overhaul Mesin Bersih\nKompresor Sentral & Oil Drainer\nTools Injeksi & HIDS Scanner",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'AHASS 06552 - Surya Motor Welahan',
                'branch_code' => 'AHASS-06552',
                'district' => 'Welahan',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Welahan - Gotputuk No. 88, Welahan, Jepara',
                'phone' => '0291-756552',
                'whatsapp' => '6285325065521',
                'google_maps_url' => 'https://maps.google.com/?q=Surya+Motor+Welahan+Jepara',
                'pic_name' => 'Agus Priyono (Kepala Bengkel)',
                'pic_phone' => '085325065521',
                'internship_quota' => 4,
                'facilities' => "5 Pit Bike Lift Hidrolik\nCharger Battery Digital & Tester\nPeralatan Ganti Ban Otomatis (Tyre Changer)",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'AHASS 08219 - Mitra Jaya Motor Pecangaan',
                'branch_code' => 'AHASS-08219',
                'district' => 'Pecangaan',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Kauman No. 12, Pecangaan Kulon, Pecangaan, Jepara',
                'phone' => '0291-758219',
                'whatsapp' => '6281390082190',
                'google_maps_url' => 'https://maps.google.com/?q=Mitra+Jaya+Motor+Pecangaan+Jepara',
                'pic_name' => 'Didik Kurniawan (Supervisor Service)',
                'pic_phone' => '081390082190',
                'internship_quota' => 4,
                'facilities' => "5 Pit Servis & 1 Pit Final Inspection\nTool Box Mekanik Standar Honda\nUltrasonic Injector Cleaner",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'AHASS 09142 - Cendana Motor Keling',
                'branch_code' => 'AHASS-09142',
                'district' => 'Keling',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Sambungoyot - Keling No. 23, Keling, Jepara',
                'phone' => '0291-579142',
                'whatsapp' => '6287733091422',
                'google_maps_url' => 'https://maps.google.com/?q=Cendana+Motor+Keling+Jepara',
                'pic_name' => 'Rahmat Hidayat (Kepala Bengkel)',
                'pic_phone' => '087733091422',
                'internship_quota' => 3,
                'facilities' => "4 Pit Servis Hidrolik\nRuang Sparepart Honda Genuine Parts\nScanner Diagnostik HIDS",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'AHASS 10331 - Pratama Motor Mayong',
                'branch_code' => 'AHASS-10331',
                'district' => 'Mayong',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Mayong - Pancur Km. 0.5, Pelemkerep, Mayong, Jepara',
                'phone' => '0291-751033',
                'whatsapp' => '6281901103311',
                'google_maps_url' => 'https://maps.google.com/?q=Pratama+Motor+Mayong+Jepara',
                'pic_name' => 'Eko Prasetyo (Instruktur Lapangan)',
                'pic_phone' => '081901103311',
                'internship_quota' => 4,
                'facilities' => "4 Pit Servis Hidrolik\nAlat Uji Kelistrikan & Multitester Digital\nRuang Briefing & Evaluasi Siswa",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'AHASS 11204 - Armada Sakti Tahunan',
                'branch_code' => 'AHASS-11204',
                'district' => 'Tahunan',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Soekarno-Hatta Km. 6, Senenan, Tahunan, Jepara',
                'phone' => '0291-591120',
                'whatsapp' => '6282242112044',
                'google_maps_url' => 'https://maps.google.com/?q=Armada+Sakti+Tahunan+Jepara',
                'pic_name' => 'Wahyu Triyono (Kepala Bengkel)',
                'pic_phone' => '082242112044',
                'internship_quota' => 4,
                'facilities' => "6 Pit Servis Hidrolik\nFasilitas Spooring Roda & Tune Up\nArea TeFa Kerjasama Vokasi",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'AHASS 12055 - Mlonggo Motor Prima',
                'branch_code' => 'AHASS-12055',
                'district' => 'Mlonggo',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Jepara - Bangsri Km. 8, Surodadi, Mlonggo, Jepara',
                'phone' => '0291-771205',
                'whatsapp' => '6285290120550',
                'google_maps_url' => 'https://maps.google.com/?q=Mlonggo+Motor+Prima+Jepara',
                'pic_name' => 'Sunarto (Service Advisor)',
                'pic_phone' => '085290120550',
                'internship_quota' => 3,
                'facilities' => "4 Pit Servis Hidrolik\nScanner Injeksi PGM-FI\nGudang Suku Cadang & Oli AHM",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($branches as $branchData) {
            \App\Models\IndustryPartnerBranch::updateOrCreate(
                [
                    'industry_partner_id' => $partner->id,
                    'branch_code' => $branchData['branch_code'],
                ],
                $branchData
            );
        }

        // 2. Partnerships
        $partnerships = [
            ['partner' => $partnerModels[0], 'type' => 'internship', 'title' => 'Magang (PKL)', 'desc' => 'Praktik Kerja Industri di bengkel resmi honda (Ahass)'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Pelatihan & Sertifikasi Guru', 'desc' => 'Setiap tahun agenda Sertifikasi Guru bertahap yang di support langsung Astra Motor Training Center'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Lomba Honda', 'desc' => 'Lomba Guru dan Siswa tingkat SMK Binaan'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Safety Riding', 'desc' => 'Program meningkatkan kemampuan berkendara siswa'],
        ];

        foreach ($partnerships as $pt) {
            Partnership::updateOrCreate(
                [
                    'industry_partner_id' => $pt['partner']->id,
                    'title' => $pt['title']
                ],
                [
                    'type' => $pt['type'],
                    'start_date' => '2016-01-01',
                    'end_date' => now()->addYears(5),
                    'description' => $pt['desc'],
                    'status' => 'active'
                ]
            );
        }

        // 3. Internships
        Internship::updateOrCreate(
            [
                'industry_partner_id' => $partnerModels[0]->id,
                'title' => 'Praktik Kerja Industri di bengkel resmi honda (Ahass)'
            ],
            [
                'start_date' => now()->subDays(10),
                'end_date' => now()->addMonths(6),
                'status' => 'ongoing',
                'description' => 'Program Magang / PKL'
            ]
        );

        // 4. Job Vacancies (Placeholder)
        JobVacancy::updateOrCreate(
            [
                'industry_partner_id' => $partnerModels[0]->id,
                'slug' => Str::slug('Mekanik AHASS (Placeholder)')
            ],
            [
                'title' => 'Mekanik AHASS (Placeholder)',
                'position' => 'Teknisi/Mekanik',
                'description' => 'Dibutuhkan segera Teknisi (NOT VERIFIED FROM OFFICIAL PDF - Data Placeholder).',
                'requirements' => '<ul><li>Lulusan SMK Otomotif</li></ul>',
                'responsibilities' => 'Melakukan perawatan kendaraan.',
                'location' => 'Jepara',
                'work_type' => 'Full-time',
                'employment_type' => 'Kontrak',
                'salary_text' => 'UMK Setempat',
                'application_deadline' => now()->addMonths(1),
                'status' => 'published',
                'published_at' => now()->subDays(2)
            ]
        );
    }
}
