<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Delegasi ke SettingSeeder agar konfigurasi selalu terpusat dan konsisten.
     */
    public function run(): void
    {
        $this->call(SettingSeeder::class);
    }
}
