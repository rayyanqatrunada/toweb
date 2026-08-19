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
        $alumniList = [
            ['name' => 'Ahmad Fauzi', 'year' => 2018, 'occupation' => 'Mekanik Senior', 'company' => 'Astra Honda Motor'],
            ['name' => 'Bima Saputra', 'year' => 2019, 'occupation' => 'Service Advisor', 'company' => 'Nasmoco'],
            ['name' => 'Citra Lestari', 'year' => 2020, 'occupation' => 'Quality Control', 'company' => 'Yamaha Motor'],
            ['name' => 'Doni Setiawan', 'year' => 2015, 'occupation' => 'Wirausaha Bengkel', 'company' => 'Doni Auto Service'],
            ['name' => 'Eka Pratama', 'year' => 2021, 'occupation' => 'Teknisi Pesawat', 'company' => 'GMF AeroAsia'],
            ['name' => 'Fajar Nugroho', 'year' => 2017, 'occupation' => 'Supervisor Produksi', 'company' => 'PT Hino Motors'],
            ['name' => 'Gilang Ramadhan', 'year' => 2019, 'occupation' => 'Teknisi Alat Berat', 'company' => 'United Tractors'],
            ['name' => 'Hadi Susanto', 'year' => 2022, 'occupation' => 'Mekanik Junior', 'company' => 'Auto2000'],
            ['name' => 'Indra Wijaya', 'year' => 2016, 'occupation' => 'Instructor Training', 'company' => 'Pusdiklat Otomotif'],
            ['name' => 'Joko Purwanto', 'year' => 2020, 'occupation' => 'Foreman', 'company' => 'Mitsubishi Motors']
        ];

        foreach ($alumniList as $idx => $alumni) {
            $photo = SeedAssetGenerator::generateImage('Alumni ' . ($idx+1), 'alumni', 400, 400, '#64748b', '#ffffff');
            Alumni::updateOrCreate(
                ['slug' => Str::slug($alumni['name'] . ' ' . $alumni['year'])],
                [
                    'name' => $alumni['name'],
                    'student_id' => 'NISN' . rand(10000000, 99999999),
                    'graduation_year' => $alumni['year'],
                    'photo' => $photo,
                    'city' => 'Jepara',
                    'education' => 'Lulusan SMK',
                    'current_occupation' => $alumni['occupation'],
                    'current_company' => $alumni['company'],
                    'bio' => 'Lulusan tahun ' . $alumni['year'] . ' yang kini bekerja sebagai ' . $alumni['occupation'] . ' di ' . $alumni['company'] . '.',
                    'is_public' => true,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 30))
                ]
            );
        }
    }
}
