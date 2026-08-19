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
            ['key' => 'site_name', 'value' => 'TOWEB — Teknik Otomotif'],
            ['key' => 'site_description', 'value' => 'Website Resmi Jurusan Teknik Otomotif SMK Negeri 1 Bangsri. Kami mendidik siswa menjadi tenaga profesional di bidang otomotif.'],
            ['key' => 'site_tagline', 'value' => 'Membangun Karakter & Kompetensi Industri'],
            ['key' => 'contact_address', 'value' => 'Jl. KH. Wahid Hasyim, Bangsri, Jepara'],
            ['key' => 'contact_phone', 'value' => '+62 812-3456-7890'],
            ['key' => 'contact_email', 'value' => 'otomotif@smkn1bangsri.sch.id'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/'],
            ['key' => 'youtube_video_id', 'value' => 'dQw4w9WgXcQ'], // Dummy youtube ID
            ['key' => 'profile_history', 'value' => '<p>Jurusan Teknik Otomotif SMK Negeri 1 Bangsri didirikan untuk menjawab kebutuhan industri akan tenaga terampil di bidang otomotif. Dengan fasilitas standar industri dan tenaga pendidik profesional, kami terus berkomitmen menghasilkan lulusan unggul.</p>'],
            ['key' => 'profile_vision', 'value' => 'Menjadi pusat pendidikan vokasi bidang otomotif yang unggul, berkarakter, dan berdaya saing global.'],
            ['key' => 'profile_mission', 'value' => '<ul><li>Menyelenggarakan pembelajaran berbasis industri.</li><li>Membentuk karakter disiplin dan profesional.</li><li>Mengembangkan kerjasama kemitraan dengan DUDI.</li></ul>'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => 'text']
            );
        }
    }
}
