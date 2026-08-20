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
                'description' => '<p>Konsentrasi keahlian Teknik dan Bisnis Sepeda Motor (TBSM) membekali peserta didik dengan keterampilan perawatan dan perbaikan sepeda motor secara profesional.</p>
                <h4>Pilihan Karir:</h4>
                <ul>
                    <li>Menjadi Teknisi yang handal dalam servis sepeda motor.</li>
                    <li>Bekerja di bidang perakitan sepeda motor atau produk sejenisnya.</li>
                    <li>Menjadi Wirausaha bengkel perbaikan sepeda motor atau bidang sejenisnya.</li>
                </ul>',
                'competencies' => [
                    [
                        'name' => 'Mesin',
                        'description' => 'Mendiagnosis gangguan atau kerusakan pada Engine Sepeda Motor meliputi Komponen Utama Engine, Sistem Pelumasan, Sistem Pendinginan, Sistem Bahan Bakar, dll.'
                    ],
                    [
                        'name' => 'Sasis',
                        'description' => 'Mendiagnosis gangguan atau kerusakan pada Sasis Sepeda Motor beserta komponen-komponennya diantaranya Sistem Rem, Sistem Kemudi, Suspensi, Rangka, Pelek, Ban, dll.'
                    ],
                    [
                        'name' => 'Kelistrikan',
                        'description' => 'Mendiagnosis gangguan atau kerusakan pada Sistem Kelistrikan Sepeda Motor diantaranya Sistem Pengapian, Sistem Pengisian, Motor Starter, Sistem Penerangan, Sistem Pengaman (Alarm), Sistem Instrumen dan Sinyal, dll.'
                    ],
                    [
                        'name' => 'Pengelolaan Bengkel',
                        'description' => 'Mampu menerapkan pengelolaan, pengembangan teknik dan manajemen perawatan Sepeda Motor.'
                    ]
                ]
            ]
        ];

        foreach ($programs as $progData) {
            $thumbnail = SeedAssetGenerator::generateImage('Prog ' . $progData['name'], 'programs', 800, 600, '#3b82f6', '#ffffff');
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
                        'program_id' => $program->id,
                        'slug' => Str::slug($comp['name'])
                    ],
                    [
                        'name' => $comp['name'],
                        'description' => $comp['description']
                    ]
                );
            }
        }

        // 2. Teachers
        $teachers = [
            ['name' => 'Laily Rizqissalim, S.Pd.', 'nip' => '198001012005011001', 'position' => 'Ketua Kompetensi Keahlian', 'is_hod' => true],
            ['name' => 'Akhmad Lutfianto, S.Pd.', 'nip' => '198202022006021002', 'position' => 'Bendahara', 'is_hod' => false],
            ['name' => 'Ahmad Wildan, S.Pd.', 'nip' => '198503032008032003', 'position' => 'Sekretaris', 'is_hod' => false],
            ['name' => 'Galih Zainawan, S.Pd.', 'nip' => '199004042010041004', 'position' => 'Kepala Laboratorium', 'is_hod' => false],
            ['name' => 'Ahmad Arif Johan, S.Pd.', 'nip' => '199205052015052005', 'position' => 'Bidang Event dan Prestasi', 'is_hod' => false],
            ['name' => 'Hisyam Kholil, S.Pd.', 'nip' => '199506062020061006', 'position' => 'Bidang IDUKA', 'is_hod' => false],
            ['name' => 'Muslikan, S.Pd.', 'nip' => '199607072021071007', 'position' => 'Bidang PKL', 'is_hod' => false],
            ['name' => 'Khasan Taufik', 'nip' => '199808082022081008', 'position' => 'Toolman', 'is_hod' => false],
        ];

        foreach ($teachers as $idx => $tData) {
            $photo = SeedAssetGenerator::generateImage('Guru ' . ($idx+1), 'teachers', 400, 400, '#10b981', '#ffffff');
            Teacher::updateOrCreate(
                ['nip' => $tData['nip']],
                [
                    'name' => $tData['name'],
                    'position' => $tData['position'],
                    'phone' => '0812' . rand(10000000, 99999999),
                    'photo' => $photo,
                    'is_head_of_department' => $tData['is_hod'],
                    'is_active' => true,
                    'user_id' => null
                ]
            );
        }

        // 3. Facilities
        $facilities = [
            'Laboratorium Teknik Otomotif'
        ];

        foreach ($facilities as $idx => $facName) {
            $photo = SeedAssetGenerator::generateImage('Fasilitas ' . ($idx+1), 'facilities', 800, 600, '#f59e0b', '#ffffff');
            Facility::updateOrCreate(
                ['slug' => Str::slug($facName)],
                [
                    'name' => $facName,
                    'description' => 'Fasilitas ' . $facName . ' merupakan sarana penunjang kegiatan praktikum peserta didik Teknik Otomotif.',
                    'photo' => $photo,
                    'quantity' => 1,
                    'condition' => 'good'
                ]
            );
        }
    }
}
