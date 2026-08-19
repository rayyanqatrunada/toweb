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
                'name' => 'Teknik Kendaraan Ringan',
                'description' => 'Membekali peserta didik dengan keterampilan perawatan dan perbaikan kendaraan ringan (mobil).',
                'competencies' => ['Perawatan Mesin', 'Sistem Kelistrikan', 'Sistem Pemindah Tenaga', 'Chassis dan Suspensi']
            ],
            [
                'name' => 'Teknik Sepeda Motor',
                'description' => 'Konsentrasi pada perawatan, perbaikan, dan modifikasi sepeda motor injeksi maupun karburator.',
                'competencies' => ['Engine Management', 'Sistem Injeksi', 'Kelistrikan Sepeda Motor', 'Perawatan Berkala']
            ],
            [
                'name' => 'Teknik Bodi Otomotif',
                'description' => 'Berfokus pada perbaikan panel, pengecatan, dan restorasi bodi kendaraan otomotif.',
                'competencies' => ['Perbaikan Panel', 'Pengecatan Kendaraan', 'Kelistrikan Bodi', 'Welding Otomotif']
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

            foreach ($progData['competencies'] as $compName) {
                Competency::updateOrCreate(
                    [
                        'program_id' => $program->id,
                        'slug' => Str::slug($compName)
                    ],
                    [
                        'name' => $compName,
                        'description' => 'Kompetensi keahlian ' . $compName . ' untuk program ' . $program->name . '.'
                    ]
                );
            }
        }

        // 2. Teachers
        $teachers = [
            ['name' => 'Budi Santoso, S.Pd., M.T.', 'nip' => '198001012005011001', 'position' => 'Kepala Jurusan', 'is_hod' => true],
            ['name' => 'Ahmad Riyadi, S.T.', 'nip' => '198202022006021002', 'position' => 'Guru Produktif TKR', 'is_hod' => false],
            ['name' => 'Siti Aminah, S.Pd.', 'nip' => '198503032008032003', 'position' => 'Guru Produktif TSM', 'is_hod' => false],
            ['name' => 'Eko Prasetyo, S.T.', 'nip' => '199004042010041004', 'position' => 'Kepala Bengkel', 'is_hod' => false],
            ['name' => 'Rina Wijayanti, S.Pd.', 'nip' => '199205052015052005', 'position' => 'Guru Normatif/Adaptif', 'is_hod' => false],
            ['name' => 'Joko Susilo, A.Md.', 'nip' => '199506062020061006', 'position' => 'Toolman', 'is_hod' => false],
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
            'Bengkel Mesin TKR', 'Bengkel Kelistrikan', 'Bengkel Sepeda Motor',
            'Laboratorium Komputer', 'Ruang Praktik Simulasi', 'Area Training Dasar',
            'Tool Room Standard ISO', 'Spooring Balancing Area'
        ];

        foreach ($facilities as $idx => $facName) {
            $photo = SeedAssetGenerator::generateImage('Fasilitas ' . ($idx+1), 'facilities', 800, 600, '#f59e0b', '#ffffff');
            Facility::updateOrCreate(
                ['slug' => Str::slug($facName)],
                [
                    'name' => $facName,
                    'description' => 'Fasilitas unggulan ' . $facName . ' untuk menunjang praktik siswa secara profesional.',
                    'photo' => $photo,
                    'quantity' => rand(1, 5),
                    'condition' => 'good'
                ]
            );
        }
    }
}
