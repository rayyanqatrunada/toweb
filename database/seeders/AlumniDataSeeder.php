<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AlumniDataSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data alumni lama berstatus placeholder
        Alumni::where('bio', 'like', '%NOT VERIFIED%')
            ->orWhere('current_company', 'Nasmoco')
            ->delete();

        // 6 Profil Alumni Representasi BMW (Bekerja, Melanjutkan, Wirausaha) TBSM SMKN 1 Bangsri
        $alumniList = [
            [
                'name' => 'Muhammad Rizqi Pratama, A.Md.T.',
                'student_id' => '0019283741',
                'year' => 2019,
                'occupation' => 'Service Advisor (SA)',
                'company' => 'Muncul Jaya Motor Bangsri (AHASS)',
                'city' => 'Jepara',
                'education' => 'D3 Teknik Otomotif',
                'bio' => 'Alumni TBSM SMKN 1 Bangsri angkatan 2019 yang kini dipercaya sebagai Service Advisor di Bengkel Resmi AHASS Muncul Jaya Motor Bangsri. Berbekal sertifikasi teknisi Honda AMTC dan pembiasaan budaya industri di sekolah, saya dapat melayani konsumen dengan standar profesional tinggi.',
                'success_story' => 'Mengawali karir dari teknisi servis berkala pasca lulus, Rizqi menunjukkan etos kerja 5R dan komunikasi prima hingga dipromosikan menjadi Service Advisor dalam kurun waktu 2 tahun.',
                'achievements' => 'Juara 2 Kontes Layanan Service Advisor Honda Karesidenan Pati 2023',
                'is_featured' => true,
                'featured_order' => 1,
            ],
            [
                'name' => 'Bagas Aditya Saputra',
                'student_id' => '0038192048',
                'year' => 2021,
                'occupation' => 'Kepala Mekanik (Head Mechanic)',
                'company' => 'AHASS Ajima Bangsri',
                'city' => 'Jepara',
                'education' => 'SMK Teknik dan Bisnis Sepeda Motor',
                'bio' => 'Lulusan tahun 2021 yang langsung direkrut melalui jalur BKK TBSM SMKN 1 Bangsri. Sangat terbiasa menangani troubleshooting sistem injeksi PGM-FI rumit dan overhaul mesin transmisi matic Honda.',
                'success_story' => 'Berkat ketekunan selama praktik bengkel di sekolah, Bagas berhasil lulus sertifikasi teknisi tingkat AHASS dan kini memimpin tim teknisi muda di cabang Bangsri.',
                'achievements' => 'Teknisi Terbaik Jaringan AHASS Jepara Utara 2024',
                'is_featured' => true,
                'featured_order' => 2,
            ],
            [
                'name' => 'Wahyu Triyono',
                'student_id' => '0008472910',
                'year' => 2018,
                'occupation' => 'Wirausahawan & Owner Bengkel',
                'company' => 'Berkah Motor Speed (Spesialis Injeksi)',
                'city' => 'Jepara',
                'education' => 'SMK Teknik dan Bisnis Sepeda Motor',
                'bio' => 'Membuktikan jiwa wirausaha vokasi dengan mendirikan bengkel spesialis servis injeksi dan suku cadang di Bangsri. Kini mampu membuka lapangan kerja bagi adik-adik kelas lulusan TBSM.',
                'success_story' => 'Memulai usaha bengkel mandiri dengan modal ilmu pengelolaan bengkel dan alat ukur presisi dari SMKN 1 Bangsri. Saat ini bengkelnya menjadi salah satu rujukan perawatan motor injeksi terpercaya di Jepara utara.',
                'achievements' => 'Wirausaha Muda Vokasi Inspiratif Kab. Jepara 2022',
                'is_featured' => true,
                'featured_order' => 3,
            ],
            [
                'name' => 'Fajar Nur Rochman',
                'student_id' => '0029384756',
                'year' => 2020,
                'occupation' => 'Quality Control (QC) Inspector',
                'company' => 'PT Astra Honda Motor (Plant Cikarang)',
                'city' => 'Bekasi',
                'education' => 'SMK Teknik dan Bisnis Sepeda Motor',
                'bio' => 'Lulusan angkatan 2020 yang lolos seleksi nasional rekrutmen PT Astra Honda Motor melalui BKK sekolah. Bertugas melakukan inspeksi akhir kualitas perakitan lini produksi sepeda motor Honda.',
                'success_story' => 'Ketelitian dan kedisiplinan kerja 5R yang ditanamkan sejak di bangku sekolah mengantarkan Fajar menjadi QC Inspector berprestasi di lini manufaktur AHM.',
                'achievements' => 'Karyawan Teladan Divisi Quality Assurance AHM 2023',
                'is_featured' => true,
                'featured_order' => 4,
            ],
            [
                'name' => 'Ahmad Danu Prasetyo, S.Pd.',
                'student_id' => '9992837461',
                'year' => 2017,
                'occupation' => 'Instruktur Kejuruan Otomotif',
                'company' => 'Balai Pelatihan Vokasi Otomotif',
                'city' => 'Kudus',
                'education' => 'S1 Pendidikan Teknik Mesin/Otomotif',
                'bio' => 'Alumni yang melanjutkan studi ke jenjang sarjana pendidikan vokasi dan kini mengabdikan ilmunya melatih generasi muda dalam program pemeliharaan sepeda motor injeksi.',
                'success_story' => 'Menjadikan pondasi praktik bengkel SMKN 1 Bangsri sebagai landasan kuat meraih gelar sarjana dengan predikat cumlaude dan sertifikasi asesor kompetensi BNSP.',
                'achievements' => 'Instruktur Vokasi Bersertifikasi BNSP RI',
                'is_featured' => false,
                'featured_order' => 5,
            ],
            [
                'name' => 'Dedi Kurniawan',
                'student_id' => '0047382910',
                'year' => 2022,
                'occupation' => 'Diagnostic Specialist & Teknisi PGM-FI',
                'company' => 'Jaya Motor Pecangaan (AHASS)',
                'city' => 'Jepara',
                'education' => 'SMK Teknik dan Bisnis Sepeda Motor',
                'bio' => 'Mantan peserta LKS perwakilan sekolah yang kini mendedikasikan keterampilannya sebagai spesialis pembacaan scanner diagnostik dan trouble code kelistrikan di bengkel resmi AHASS Jaya Motor Pecangaan.',
                'success_story' => 'Keahlian menganalisis sinyal sensor kelistrikan yang dipelajari di Lab Injeksi sekolah menjadikannya teknisi rujukan untuk kasus-kasus sepeda motor modern.',
                'achievements' => 'Juara 1 LKS Otomotif Sepeda Motor Tingkat Kabupaten Jepara 2022',
                'is_featured' => false,
                'featured_order' => 6,
            ],
        ];

        foreach ($alumniList as $idx => $alumni) {
            $photo = SeedAssetGenerator::generateImage('Alumni ' . ($idx+1) . ' ' . $alumni['name'], 'alumni', 400, 400, '#0284c7', '#ffffff');
            Alumni::updateOrCreate(
                ['slug' => Str::slug($alumni['name'] . ' ' . $alumni['year'])],
                [
                    'name' => $alumni['name'],
                    'student_id' => $alumni['student_id'],
                    'graduation_year' => $alumni['year'],
                    'photo' => $photo,
                    'city' => $alumni['city'],
                    'education' => $alumni['education'],
                    'current_occupation' => $alumni['occupation'],
                    'current_company' => $alumni['company'],
                    'bio' => $alumni['bio'],
                    'success_story' => $alumni['success_story'],
                    'achievements' => $alumni['achievements'],
                    'is_featured' => $alumni['is_featured'],
                    'featured_order' => $alumni['featured_order'],
                    'is_public' => true,
                    'status' => 'published',
                    'published_at' => now()->subDays(($idx * 5) + 3)
                ]
            );
        }
    }
}
