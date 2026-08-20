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
        // 1. Industry Partners
        $partners = [
            ['name' => 'Astra Honda Motor', 'type' => 'Industri Manufaktur Otomotif', 'email' => 'contact@astra-honda.com'],
        ];

        $partnerModels = [];
        foreach ($partners as $idx => $p) {
            $logo = SeedAssetGenerator::generateImage('Logo ' . $p['name'], 'industry', 400, 400, '#e11d48', '#ffffff');
            $partnerModels[] = IndustryPartner::updateOrCreate(
                ['slug' => Str::slug($p['name'])],
                [
                    'name' => $p['name'],
                    'industry_type' => $p['type'],
                    'description' => 'TO SMK Negeri 1 Bangsri Merupakan Binaan Langsung dari Astra Honda Motor Sejak 2016',
                    'address' => 'Jakarta, Indonesia',
                    'phone' => '021-000000',
                    'email' => $p['email'],
                    'website' => 'https://www.astra-honda.com',
                    'logo' => $logo,
                    'status' => 'published',
                    'published_at' => now()
                ]
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
