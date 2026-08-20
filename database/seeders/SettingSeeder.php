<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Teknik Otomotif'],
            ['key' => 'site_description', 'value' => 'Website Resmi Jurusan Teknik Otomotif (Konsentrasi Teknik dan Bisnis Sepeda Motor) SMK Negeri 1 Bangsri.'],
            ['key' => 'site_tagline', 'value' => 'Terbentuknya SDM profesional dalam bidang Teknik Otomotif dan berkarakter positif'],
            ['key' => 'contact_address', 'value' => 'JL. KH. Achmad Fauzan No. 17 Bangsri Jepara'],
            ['key' => 'contact_phone', 'value' => '082323429052'],
            ['key' => 'contact_email', 'value' => 'smkn1bangsri@yahoo.co.id'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/'],
            ['key' => 'youtube_video_id', 'value' => 'dQw4w9WgXcQ'], // Dummy youtube ID
            ['key' => 'profile_history', 'value' => '<p>Jurusan Teknik Otomotif SMK Negeri 1 Bangsri dengan konsentrasi Teknik dan Bisnis Sepeda Motor (TSM) berdiri sejak tahun 2011.</p>'],
            ['key' => 'profile_vision', 'value' => 'Terbentuknya SDM profesional dalam bidang Teknik Otomotif dan berkarakter positif.'],
            ['key' => 'profile_mission', 'value' => '<ol><li>Menyiapkan lulusan kreatif dan profesional dalam bidang Teknik Otomotif guna memasuki dunia kerja dan Era pasar bebas industrialisasi.</li><li>Mempersiapkan lulusan dalam mengembangkan potensi menjadi peluang bisnis.</li><li>Membentuk siswa berkarakter positif dan mampu berfikir kritis untuk siap bersaing di dunia kerja.</li></ol>'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => 'text']
            );
        }
    }
}
