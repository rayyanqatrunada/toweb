<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndUserSeeder::class,
            SettingSeeder::class,
            AcademicDataSeeder::class,
            IndustryDataSeeder::class,
            ContentDataSeeder::class,
            MediaDataSeeder::class,
            AlumniDataSeeder::class,
            DownloadDataSeeder::class,
        ]);
    }
}
