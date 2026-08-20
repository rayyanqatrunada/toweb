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
        // NOT VERIFIED FROM OFFICIAL PDF
        // Data alumni tidak tersedia dalam PDF resmi. 
        // Data di bawah adalah placeholder untuk keperluan struktural aplikasi.
        $alumniList = [
            ['name' => 'Ahmad Fauzi', 'year' => 2018, 'occupation' => 'Mekanik Senior', 'company' => 'Astra Honda Motor'],
            ['name' => 'Bima Saputra', 'year' => 2019, 'occupation' => 'Service Advisor', 'company' => 'Nasmoco'],
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
                    'bio' => 'Lulusan tahun ' . $alumni['year'] . ' yang kini bekerja sebagai ' . $alumni['occupation'] . ' di ' . $alumni['company'] . ' (NOT VERIFIED FROM OFFICIAL PDF).',
                    'is_public' => true,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 30))
                ]
            );
        }
    }
}
