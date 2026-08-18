<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Teknik Otomotif', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Website Resmi SMK Negeri 1', 'type' => 'text'],
            ['key' => 'site_description', 'value' => 'Program Keahlian Teknik Otomotif berdedikasi untuk mencetak mekanik dan ahli otomotif masa depan yang kompeten, disiplin, dan siap kerja di dunia industri modern.', 'type' => 'text'],
            
            ['key' => 'hero_title', 'value' => 'Mencetak Teknisi Andal berkarakter Industri.', 'type' => 'text'],
            ['key' => 'hero_subtitle', 'value' => 'Jurusan Teknik Otomotif kami berdiri dengan satu tujuan: menjembatani kesenjangan antara pendidikan sekolah dengan kebutuhan riil dunia otomotif modern.', 'type' => 'text'],
            ['key' => 'head_quote', 'value' => 'Menyiapkan lulusan yang bukan hanya paham mesin, tapi memiliki karakter profesional industri.', 'type' => 'text'],
            
            ['key' => 'youtube_video_id', 'value' => 'dQw4w9WgXcQ', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com', 'type' => 'text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com', 'type' => 'text'],
            
            ['key' => 'contact_address', 'value' => 'Jl. Pendidikan No. 1, Kota Belajar', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '(021) 123-4567', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@otomotif.sch.id', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::firstOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => $setting['type']]
            );
        }
        
        \Illuminate\Support\Facades\Cache::forget('site_settings');
    }
}
