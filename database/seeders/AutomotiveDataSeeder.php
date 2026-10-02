<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AutomotiveDataSeeder extends Seeder
{
    /**
     * Seeder data kompetensi otomotif & kemitraan industri TBSM.
     * Mengalirkan pemanggilan ke AcademicDataSeeder dan IndustryDataSeeder
     * agar data kurikulum, kompetensi sepeda motor, fasilitas bengkel, dan jaringan AHASS selalu mutakhir dan konsisten.
     */
    public function run(): void
    {
        $this->call([
            AcademicDataSeeder::class,
            IndustryDataSeeder::class,
        ]);
    }
}
