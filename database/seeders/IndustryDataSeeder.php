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
            ['name' => 'PT Astra Honda Motor', 'type' => 'Industri Manufaktur', 'email' => 'contact@astra-honda.com'],
            ['name' => 'Nasmoco Jepara', 'type' => 'Dealer Resmi', 'email' => 'info@nasmoco.co.id'],
            ['name' => 'Yamaha Mataram Sakti', 'type' => 'Bengkel Resmi', 'email' => 'bengkel@yamaha-motor.co.id'],
            ['name' => 'Bintang Auto Service', 'type' => 'Bengkel Umum', 'email' => 'admin@bintangauto.com'],
            ['name' => 'Oto Mandiri Sejahtera', 'type' => 'Perusahaan Jasa Otomotif', 'email' => 'hr@otomandiri.com'],
        ];

        $partnerModels = [];
        foreach ($partners as $idx => $p) {
            $logo = SeedAssetGenerator::generateImage('Logo ' . $p['name'], 'industry', 400, 400, '#e11d48', '#ffffff');
            $partnerModels[] = IndustryPartner::updateOrCreate(
                ['slug' => Str::slug($p['name'])],
                [
                    'name' => $p['name'],
                    'industry_type' => $p['type'],
                    'description' => 'Mitra industri ' . $p['name'] . ' yang bergerak di bidang otomotif.',
                    'address' => 'Jl. Industri Otomotif No. ' . ($idx + 1) . ', Kawasan Industri',
                    'phone' => '021-12345' . $idx,
                    'email' => $p['email'],
                    'website' => 'https://www.' . Str::slug($p['name']) . '.com',
                    'logo' => $logo,
                    'status' => 'published',
                    'published_at' => now()
                ]
            );
        }

        // 2. Partnerships
        $partnerships = [
            ['partner' => $partnerModels[0], 'type' => 'Penyaluran Lulusan', 'status' => 'active'],
            ['partner' => $partnerModels[1], 'type' => 'Tempat PKL', 'status' => 'active'],
            ['partner' => $partnerModels[2], 'type' => 'Guru Tamu', 'status' => 'completed'],
            ['partner' => $partnerModels[3], 'type' => 'Tempat PKL', 'status' => 'active'],
        ];

        $partnershipModels = [];
        foreach ($partnerships as $pt) {
            $partnershipModels[] = Partnership::updateOrCreate(
                [
                    'industry_partner_id' => $pt['partner']->id,
                    'type' => $pt['type']
                ],
                [
                    'title' => 'Kerjasama ' . $pt['type'] . ' dengan ' . $pt['partner']->name,
                    'start_date' => now()->subMonths(6),
                    'end_date' => now()->addYears(2),
                    'description' => 'Implementasi kerjasama Link & Match antara sekolah dan ' . $pt['partner']->name,
                    'status' => $pt['status']
                ]
            );
        }

        // 3. Internships
        $internships = [
            ['partner' => $partnerModels[1], 'title' => 'PKL Gelombang 1 Mekanik Nasmoco', 'status' => 'ongoing'],
            ['partner' => $partnerModels[3], 'title' => 'PKL Bintang Auto Servis Batch 2', 'status' => 'planned'],
            ['partner' => $partnerModels[0], 'title' => 'Prakerin AHM Periode Gasal', 'status' => 'completed'],
            ['partner' => $partnerModels[2], 'title' => 'PKL Mekanik Motor Yamaha', 'status' => 'ongoing'],
            ['partner' => $partnerModels[4], 'title' => 'Magang Teknisi Spooring', 'status' => 'planned'],
        ];

        foreach ($internships as $intern) {
            Internship::updateOrCreate(
                [
                    'industry_partner_id' => $intern['partner']->id,
                    'title' => $intern['title']
                ],
                [
                    'start_date' => now()->subDays(rand(1, 30)),
                    'end_date' => now()->addMonths(3),
                    'status' => $intern['status'],
                    'description' => 'Program Praktik Kerja Lapangan di ' . $intern['partner']->name . ' untuk kompetensi perbengkelan.'
                ]
            );
        }

        // 4. Job Vacancies
        $jobs = [
            ['partner' => $partnerModels[0], 'title' => 'Operator Perakitan Mesin', 'status' => 'open'],
            ['partner' => $partnerModels[1], 'title' => 'Service Advisor Trainee', 'status' => 'open'],
            ['partner' => $partnerModels[2], 'title' => 'Mekanik Junior Sepeda Motor', 'status' => 'closed'],
            ['partner' => $partnerModels[4], 'title' => 'Teknisi AC Mobil', 'status' => 'open'],
            ['partner' => $partnerModels[3], 'title' => 'Asisten Mekanik Bengkel Umum', 'status' => 'open'],
        ];

        foreach ($jobs as $job) {
            JobVacancy::updateOrCreate(
                [
                    'industry_partner_id' => $job['partner']->id,
                    'slug' => Str::slug($job['title'])
                ],
                [
                    'title' => $job['title'],
                    'position' => 'Teknisi/Mekanik',
                    'description' => 'Dibutuhkan segera ' . $job['title'] . ' di ' . $job['partner']->name,
                    'requirements' => '<ul><li>Lulusan SMK Otomotif</li><li>Sehat jasmani dan rohani</li><li>Bersedia bekerja shift</li></ul>',
                    'responsibilities' => 'Melakukan perawatan dan perbaikan kendaraan sesuai standar operasional perusahaan.',
                    'location' => 'Kawasan Industri Setempat',
                    'work_type' => 'Full-time',
                    'employment_type' => 'Kontrak',
                    'salary_text' => 'UMK Setempat + Lembur',
                    'application_deadline' => $job['status'] === 'open' ? now()->addMonths(1) : now()->subDays(10),
                    'status' => $job['status'],
                    'published_at' => now()->subDays(rand(1, 10))
                ]
            );
        }
    }
}
