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

        // 2. Partnerships (Sinergi Resmi Binaan AHM)
        $partnerships = [
            ['partner' => $partnerModels[0], 'type' => 'internship', 'title' => 'Praktik Kerja Lapangan (PKL) AHASS', 'desc' => 'Program magang 6 bulan di seluruh jaringan bengkel resmi AHASS se-Kabupaten Jepara untuk memperkuat jam terbang mekanikal siswa.'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Pelatihan & Sertifikasi Guru (AMTC)', 'desc' => 'Program peningkatan kompetensi instruktur berkala yang didukung langsung oleh Astra Motor Training Center Jawa Tengah.'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Kontes Keterampilan Guru & Siswa Honda', 'desc' => 'Partisipasi rutin dalam ajang kompetisi kompetensi kejuruan tingkat SMK Binaan Honda se-Jawa Tengah dan Nasional.'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Edukasi Safety Riding & Budaya 5R', 'desc' => 'Kampanye keselamatan berkendara #Cari_Aman serta pembiasaan etos kerja kedisiplinan industri Jepang di lingkungan sekolah.'],
            ['partner' => $partnerModels[0], 'type' => 'mou', 'title' => 'Perekrutan Tenaga Kerja BKK Mandiri', 'desc' => 'Penyaluran langsung lulusan kompeten TBSM SMKN 1 Bangsri ke jaringan dealer dan bengkel AHASS rekanan.'],
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

        // 3. Internships (Program PKL Terpadu)
        Internship::updateOrCreate(
            [
                'industry_partner_id' => $partnerModels[0]->id,
                'title' => 'Praktik Kerja Industri di Jaringan Bengkel Resmi AHASS Jepara'
            ],
            [
                'start_date' => now()->subDays(15),
                'end_date' => now()->addMonths(6),
                'status' => 'ongoing',
                'description' => '<p>Program Praktik Kerja Lapangan (PKL) terstruktur bagi siswa kelas XI di 8 bengkel resmi AHASS rekanan Kabupaten Jepara. Siswa melatih keterampilan tune-up PGM-FI, transmisi CVT, dan servis berkala dengan supervisi langsung Service Advisor.</p>'
            ]
        );

        // 4. Job Vacancies (Hapus data placeholder lama dan buat lowongan riil)
        JobVacancy::where('slug', 'like', '%placeholder%')->delete();

        $vacancies = [
            [
                'title' => 'Teknisi Sepeda Motor Junior (Mekanik AHASS)',
                'slug' => 'teknisi-sepeda-motor-junior-mekanik-ahass',
                'position' => 'Mekanik / Teknisi Sepeda Motor',
                'description' => '<p>Jaringan Bengkel Resmi AHASS di Kabupaten Jepara membuka kesempatan bagi alumni SMK Jurusan TBSM (Teknik dan Bisnis Sepeda Motor) SMKN 1 Bangsri untuk bergabung sebagai Teknisi Sepeda Motor Junior. Teknisi akan mendapatkan pelatihan komprehensif berstandar PT Astra Honda Motor serta peluang jenjang sertifikasi teknisi tingkat AHASS.</p>',
                'requirements' => '<ul><li>Lulusan SMK Konsentrasi Keahlian TBSM / Otomotif Sepeda Motor.</li><li>Memahami prinsip kerja mesin 4-tak, sistem kelistrikan, sasis, dan teknologi injeksi PGM-FI.</li><li>Memiliki sertifikat kompetensi praktik / UKK menjadi nilai tambah.</li><li>Mampu bekerja sama dalam tim, disiplin tinggi (budaya 5R), dan jujur.</li><li>Bersedia ditempatkan di cabang bengkel resmi AHASS wilayah Kabupaten Jepara.</li></ul>',
                'responsibilities' => '<ul><li>Melakukan servis berkala (tune-up, ganti oli mesin & transmisi, pembersihan injektor & saringan udara).</li><li>Melakukan pemeriksaan dan perbaikan komponen transmisi otomatis CVT serta sistem pengereman hidrolik.</li><li>Menggunakan peralatan Special Service Tools (SST) dan Diagnostic Scanner HIDS sesuai SOP Honda.</li><li>Menjaga kebersihan area pit lift servis dan mematuhi standar K3LH.</li></ul>',
                'location' => 'Kabupaten Jepara (Jaringan Bengkel AHASS)',
                'work_type' => 'Full-time',
                'employment_type' => 'Kontrak Menuju Tetap',
                'salary_text' => 'Sesuai Standar UMK Jepara + Insentif Servis',
                'application_deadline' => now()->addMonths(2),
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Front Desk & Service Advisor (SA) AHASS',
                'slug' => 'front-desk-service-advisor-sa-ahass',
                'position' => 'Service Advisor (SA)',
                'description' => '<p>Membuka kesempatan karir profesional bagi alumni TBSM SMKN 1 Bangsri yang komunikatif untuk bertugas sebagai garda terdepan pelayanan servis pelanggan sepeda motor Honda di bengkel AHASS.</p>',
                'requirements' => '<ul><li>Pria/Wanita lulusan SMK TBSM / Otomotif yang memiliki keterampilan komunikasi dan interpersonal yang baik.</li><li>Mampu mengoperasikan komputer dan memahami istilah teknis keluhan sepeda motor.</li><li>Berpenampilan rapi, ramah, dan berorientasi pada kepuasan pelanggan (Customer Satisfaction).</li><li>Penempatan di wilayah Bangsri dan Jepara Kota.</li></ul>',
                'responsibilities' => '<ul><li>Menyambut pelanggan dan mendengarkan keluhan performa sepeda motor Honda.</li><li>Melakukan pemeriksaan awal kondisi kendaraan (tampilan fisik, jarak tempuh, fungsi lampu/rem) bersama pelanggan.</li><li>Menerbitkan Work Order (Surat Perintah Kerja) dan mengestimasi biaya serta durasi perbaikan.</li><li>Menjelaskan riwayat perbaikan dan rekomendasi perawatan saat penyerahan kembali motor kepada konsumen.</li></ul>',
                'location' => 'Bangsri & Jepara Kota',
                'work_type' => 'Full-time',
                'employment_type' => 'Kontrak',
                'salary_text' => 'Kompetitif + Tunjangan Kinerja',
                'application_deadline' => now()->addMonths(2),
                'status' => 'published',
                'published_at' => now()->subDays(4),
            ],
        ];

        foreach ($vacancies as $vacData) {
            JobVacancy::updateOrCreate(
                [
                    'industry_partner_id' => $partnerModels[0]->id,
                    'slug' => $vacData['slug']
                ],
                $vacData
            );
        }
    }
}
