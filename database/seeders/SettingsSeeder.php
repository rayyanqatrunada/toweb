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
            ['key' => 'site_name', 'value' => 'Teknik dan Bisnis Sepeda Motor SMKN 1 Bangsri', 'type' => 'text'],
            ['key' => 'site_short_name', 'value' => 'TBSM SMKN 1 Bangsri', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Pusat Keunggulan Vokasi Otomotif Binaan PT Astra Honda Motor', 'type' => 'text'],
            ['key' => 'site_description', 'value' => 'Website resmi Konsentrasi Keahlian Teknik Otomotif & Sepeda Motor (TBSM) SMK Negeri 1 Bangsri Jepara. Kelas industri binaan PT Astra Honda Motor, lab bengkel standar AHASS, kurikulum PGM-FI, & BKK.', 'type' => 'text'],
            ['key' => 'site_keywords', 'value' => 'teknik otomotif smkn 1 bangsri, teknik sepeda motor smkn 1 bangsri, tbsm smkn 1 bangsri, tsm smkn 1 bangsri, jurusan otomotif smk bangsri jepara, smk binaan astra honda motor bangsri, bengkel ahass smkn 1 bangsri', 'type' => 'text'],
            ['key' => 'google_site_verification', 'value' => '', 'type' => 'text'],
            
            ['key' => 'hero_title', 'value' => 'Mencetak Teknisi Andal berkarakter Industri.', 'type' => 'text'],
            ['key' => 'hero_subtitle', 'value' => 'Jurusan Teknik dan Bisnis Sepeda Motor (TBSM) kami berdiri dengan satu tujuan: menjembatani kesenjangan antara pendidikan sekolah dengan kebutuhan riil dunia otomotif modern.', 'type' => 'text'],
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
