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
                'name' => 'Astra Honda Motor Bangsri',
                'branch_code' => 'AHASS-07123',
                'district' => 'Bangsri',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Jepara - Bangsri, Krsak, Bangsri, Kec. Bangsri, Kabupaten Jepara',
                'phone' => '+62 812-2593-0233',
                'whatsapp' => '6281225930233',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=Astra+Honda+Motor+Jl.+Jepara+-+Bangsri+Krsak+Bangsri+Jepara',
                'pic_name' => 'Bambang Sutrisno, S.T. (Kepala Cabang & Penjualan)',
                'pic_phone' => '081225930233',
                'internship_quota' => 6,
                'facilities' => "Rating: 4.8\nJam Buka: Senin–Sabtu 08.00–16.00, Minggu 09.00–12.00\nAstra Honda Motor yang berlokasi di area Bangsri ini melayani kebutuhan penjualan dan informasi terkait produk sepeda motor Honda.\nDealer Resmi & Penjualan Motor Honda\nLayanan Servis & Konsultasi Produk\nDisplay Unit Honda Terbaru & Suku Cadang Asli HGP",
                'is_main_branch' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Muncul Jaya Motor Bangsri',
                'branch_code' => 'AHASS-02397',
                'district' => 'Bangsri',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Jepara - Bangsri, Krsak, Bangsri, Kec. Bangsri, Kabupaten Jepara',
                'phone' => '+62 823-2934-2297',
                'whatsapp' => '6282329342297',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=Muncul+Jaya+Motor+Bangsri+Jl.+Jepara+-+Bangsri+Krsak+Bangsri+Jepara',
                'pic_name' => 'Agus Wahyudi (Service Advisor)',
                'pic_phone' => '082329342297',
                'internship_quota' => 5,
                'facilities' => "Rating: 4.7\nJam Buka: Senin–Sabtu 08.00–17.00, Minggu 09.00–14.00\nMuncul Jaya Motor Bangsri adalah salah satu dealer resmi Honda dan bengkel AHASS terkemuka untuk kawasan Jepara bagian utara.\nDealer Resmi & Bengkel Perawatan AHASS\n6 Pit Servis Bike Lift Hidrolik\nSuku Cadang Asli Honda Genuine Parts (HGP)",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Muncul Jaya Motor Pemuda Jepara',
                'branch_code' => 'AHASS-01875',
                'district' => 'Jepara Kota',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Pemuda No.8, Panggang III, Panggang, Kec. Jepara, Kabupaten Jepara',
                'phone' => '+62 881-4187-522',
                'whatsapp' => '628814187522',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=Muncul+Jaya+Motor+Jl.+Pemuda+No.8+Panggang+Jepara',
                'pic_name' => 'Haryanto, A.Md. (Kepala Bengkel)',
                'pic_phone' => '08814187522',
                'internship_quota' => 4,
                'facilities' => "Rating: 4.7\nJam Buka: Senin–Sabtu 08.00–17.00, Minggu 09.00–14.00\nMuncul Jaya Motor Pemuda Jepara melayani penjualan sepeda motor Honda, suku cadang asli Honda (HGP), serta bengkel perawatan resmi AHASS di area kota Jepara.\nSales Counter & Showroom Resmi Honda\nBengkel Perawatan Resmi AHASS\nDiagnostic Scanner Injeksi PGM-FI",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Jaya Motor Pecangaan',
                'branch_code' => 'AHASS-04506',
                'district' => 'Pecangaan',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Pecangaan, Jepara-Kudus No.45, Pecangaan Kulon, Kec. Pecangaan, Kabupaten Jepara',
                'phone' => '+62 822-9406-7458',
                'whatsapp' => '6282294067458',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=Jaya+Motor+Pecangaan+Jl.+Raya+Pecangaan+Jepara-Kudus+No.45+Pecangaan+Kulon+Jepara',
                'pic_name' => 'Didik Kurniawan (Service Advisor)',
                'pic_phone' => '082294067458',
                'internship_quota' => 4,
                'facilities' => "Rating: 4.8\nJam Buka: Senin–Sabtu 08.00–16.30, Minggu 08.00–16.00\nJaya Motor Pecangaan merupakan dealer resmi dan bengkel AHASS untuk wilayah selatan Jepara di jalur utama Pecangaan arah Kudus.\nDealer Resmi Sepeda Motor Honda\nBengkel AHASS Servis Ringan & Berat\nOverhaul Mesin & Penggantian Sparepart Asli",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Bengkel Honda AHASS Blok M Mlonggo',
                'branch_code' => 'AHASS-05151',
                'district' => 'Mlonggo',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Jepara - Bangsri Km. 8, Jambu, Kec. Mlonggo, Kabupaten Jepara',
                'phone' => '+62 852-1515-1551',
                'whatsapp' => '6285215151551',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=Bengkel+Honda+AHASS+Blok+M+Mlonggo+Jl.+Jepara+-+Bangsri+Km.+8+Jambu+Mlonggo+Jepara',
                'pic_name' => 'Sunarto, S.Pd. (Kepala Bengkel)',
                'pic_phone' => '085215151551',
                'internship_quota' => 4,
                'facilities' => "Rating: 4.6\nJam Buka: Senin–Jumat 07.30–17.00, Sabtu–Minggu 08.00–16.00\nBengkel Honda AHASS Blok M Mlonggo melayani pemeliharaan rutin, servis berkala, dan suku cadang asli bagi pengendara motor Honda di kawasan Mlonggo dan sekitarnya.\n5 Pit Servis Hidrolik & Tune Up PGM-FI\nGudang Suku Cadang & Oli AHM Oil\nRuang Istirahat Konsumen Nyaman",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'AHASS Ajima',
                'branch_code' => 'AHASS-08819',
                'district' => 'Bangsri',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Raya Jepara - Bangsri, Krsak, Bangsri, Kec. Bangsri, Kabupaten Jepara',
                'phone' => '+62 812-2881-951',
                'whatsapp' => '628122881951',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=AHASS+Ajima+Jl.+Raya+Jepara+-+Bangsri+Krsak+Bangsri+Jepara',
                'pic_name' => 'Rahmat Hidayat (Service Advisor)',
                'pic_phone' => '08122881951',
                'internship_quota' => 3,
                'facilities' => "Rating: 4.4\nJam Buka: Senin–Sabtu 08.00–16.00, Minggu 09.00–14.00\nAHASS Ajima menyediakan layanan servis resmi dan penggantian onderdil motor Honda di kawasan Bangsri.\nServis Rutin Berkala & Ganti Oli Resmi\nDiagnostik Injeksi PGM-FI\nSuku Cadang Asli Honda (HGP)",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'AHASS AGUNG MOTOR JEPARA',
                'branch_code' => 'AHASS-03003',
                'district' => 'Jepara Kota',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Veteran No.03, Jobokuto III, Jobokuto, Kec. Jepara, Kabupaten Jepara',
                'phone' => '0291-593003',
                'whatsapp' => null,
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=AHASS+AGUNG+MOTOR+JEPARA+Jl.+Veteran+No.03+Jobokuto+Jepara',
                'pic_name' => 'Eko Prasetyo (Kepala Bengkel)',
                'pic_phone' => '0291-593003',
                'internship_quota' => 3,
                'facilities' => "Rating: 4.5\nJam Buka: Setiap hari 07.00–16.00\nAHASS AGUNG MOTOR JEPARA melayani perbaikan dan perawatan sepeda motor Honda di area Jobokuto, Jepara.\nServis Berkala & Perbaikan Mesin\nPembersihan Injektor & Ruang Bakar\nPenggantian Suku Cadang Asli Honda",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'AHASS Kembangan Sakti Jepara',
                'branch_code' => 'AHASS-02438',
                'district' => 'Tahunan',
                'city' => 'Kabupaten Jepara',
                'address' => 'Jl. Ratu Kalinyamat No.Km.2, Krapyak, Kec. Tahunan, Kabupaten Jepara',
                'phone' => '+62 822-4384-4439',
                'whatsapp' => '6282243844439',
                'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=AHASS+Kembangan+Sakti+Jl.+Ratu+Kalinyamat+No.Km.2+Krapyak+Tahunan+Jepara',
                'pic_name' => 'Wahyu Triyono (Kepala Bengkel)',
                'pic_phone' => '082243844439',
                'internship_quota' => 4,
                'facilities' => "Rating: 4.6\nJam Buka: Setiap hari 08.00–16.00\nAHASS Kembangan Sakti Jepara adalah bengkel resmi AHASS yang berlokasi strategis di area Tahunan untuk perawatan berkala dan perbaikan motor Honda.\nServis Cepat, Reguler & Tune Up\nPeralatan Khusus Scanner HIDS Injeksi\nDisplay Suku Cadang HGP Lengkap",
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
        ];

        // Hapus cabang lama untuk mitra ini agar bersih dari data duplikat/dummy
        \App\Models\IndustryPartnerBranch::where('industry_partner_id', $partner->id)->delete();

        foreach ($branches as $branchData) {
            \App\Models\IndustryPartnerBranch::create(array_merge($branchData, [
                'industry_partner_id' => $partner->id,
            ]));
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
