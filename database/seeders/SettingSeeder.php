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
            ['key' => 'site_name', 'value' => 'Teknik dan Bisnis Sepeda Motor'],
            ['key' => 'site_description', 'value' => 'Website Resmi Jurusan Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri.'],
            ['key' => 'site_tagline', 'value' => 'Terbentuknya SDM profesional dalam bidang TBSM dan berkarakter positif'],
            ['key' => 'contact_address', 'value' => 'JL. KH. Achmad Fauzan No. 17 Bangsri Jepara'],
            ['key' => 'contact_phone', 'value' => '082323429052'],
            ['key' => 'contact_email', 'value' => 'smkn1bangsri@yahoo.co.id'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/'],
            ['key' => 'youtube_video_id', 'value' => 'dQw4w9WgXcQ'], // Dummy youtube ID
            ['key' => 'profile_history', 'value' => '<p>Jurusan Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri berdiri sejak tahun 2011.</p>'],
            ['key' => 'profile_vision', 'value' => 'Terbentuknya SDM profesional dalam bidang Teknik dan Bisnis Sepeda Motor dan berkarakter positif.'],
            ['key' => 'profile_mission', 'value' => '<ol><li>Menyiapkan lulusan kreatif dan profesional dalam bidang TBSM guna memasuki dunia kerja dan Era pasar bebas industrialisasi.</li><li>Mempersiapkan lulusan dalam mengembangkan potensi menjadi peluang bisnis.</li><li>Membentuk siswa berkarakter positif dan mampu berfikir kritis untuk siap bersaing di dunia kerja.</li></ol>'],
            // Facility page settings
            ['key' => 'facility_hero_badge', 'value' => 'INFRASTRUKTUR & BENGKEL ASTRA HONDA'],
            ['key' => 'facility_hero_title', 'value' => 'FASILITAS BENGKEL STANDAR INDUSTRI TBSM'],
            ['key' => 'facility_hero_subtitle', 'value' => 'Dilengkapi bike lift hidrolik, simulator injeksi PGM-FI, engine overhaul stand berputar, special service tools (SST) lengkap, dan budaya kerja 5R/K3LH untuk mencetak teknisi profesional berstandar AHASS.'],
            ['key' => 'facility_stat_1_val', 'value' => '70%'],
            ['key' => 'facility_stat_1_label', 'value' => 'Proporsi Praktikum & TeFa'],
            ['key' => 'facility_stat_2_val', 'value' => '6 Pit'],
            ['key' => 'facility_stat_2_label', 'value' => 'Stall Servis Hidrolik AHASS'],
            ['key' => 'facility_stat_3_val', 'value' => '100%'],
            ['key' => 'facility_stat_3_label', 'value' => 'Peralatan Standar Pabrikan'],
            ['key' => 'facility_stat_4_val', 'value' => '5R & K3'],
            ['key' => 'facility_stat_4_label', 'value' => 'Budaya Disiplin Industri'],
            ['key' => 'facility_5r_badge', 'value' => 'DISIPLIN KERJA JEPANG & K3LH'],
            ['key' => 'facility_5r_title', 'value' => 'Penerapan Budaya Kerja Industri 5R & Standar K3LH'],
            ['key' => 'facility_5r_desc', 'value' => 'Sebelum dan sesudah melaksanakan kegiatan di bengkel otomotif, seluruh siswa dibiasakan menerapkan 5R (Ringkas, Rapi, Resik, Rawat, Rajin) serta standar Keselamatan dan Kesehatan Kerja Lingkungan Hidup (K3LH).'],
            ['key' => 'facility_5r_ringkas_title', 'value' => 'Ringkas (Seiri)'],
            ['key' => 'facility_5r_ringkas_desc', 'value' => 'Memisahkan alat kerja, material sisa, dan suku cadang yang diperlukan dengan yang tidak terpakai sehingga area pit servis selalu efisien dan teratur.'],
            ['key' => 'facility_5r_rapi_title', 'value' => 'Rapi (Seiton)'],
            ['key' => 'facility_5r_rapi_desc', 'value' => 'Menata seluruh perkakas tangan (hand tools) dan SST pada shadow board serta toolbox dengan penandaan posisi yang presisi.'],
            ['key' => 'facility_5r_resik_title', 'value' => 'Resik (Seiso)'],
            ['key' => 'facility_5r_resik_desc', 'value' => 'Menjaga kebersihan lantai bengkel dan bike lift dari ceceran oli maupun sisa bensin guna mencegah kecelakaan kerja tergelincir.'],
            ['key' => 'facility_5r_rawat_title', 'value' => 'Rawat (Seiketsu)'],
            ['key' => 'facility_5r_rawat_desc', 'value' => 'Mempertahankan standar kebersihan, kelengkapan Alat Pelindung Diri (APD wearpack & safety shoes), dan kalibrasi alat ukur secara konsisten.'],
            ['key' => 'facility_5r_rajin_title', 'value' => 'Rajin (Shitsuke)'],
            ['key' => 'facility_5r_rajin_desc', 'value' => 'Membiasakan briefing kedisiplinan pagi, doa bersama, dan pembagian job sheet sebelum sesi praktik dimulai.'],
            ['key' => 'facility_k3_apd', 'value' => 'Wearpack Standar AHASS, Safety Shoes Ujung Besi, Kacamata Pelindung Serpihan Logam, Sarung Tangan Karet Nitrile.'],
            ['key' => 'facility_k3_safety', 'value' => 'Tabung Pemadam Api (APAR) Powder & CO2 di Setiap Sudut, Eye Washer Darurat, Kotak P3K Lengkap, Jalur Evakuasi Evacuation Assembly Point.'],
            ['key' => 'facility_k3_limbah', 'value' => 'Penampung Limbah B3 Berstandar Lingkungan: Drum Oli Bekas Bersegel, Pemilah Aki Bekas & Kain Majun Terkontaminasi.'],
            ['key' => 'facility_tefa_badge', 'value' => 'UNIT PRODUKSI & TEFA'],
            ['key' => 'facility_tefa_title', 'value' => 'Teaching Factory (TeFa) TBSM SMKN 1 Bangsri'],
            ['key' => 'facility_tefa_subtitle', 'value' => 'Menghadirkan layanan perawatan berkala dan perbaikan sepeda motor untuk warga masyarakat, guru, dan siswa dengan kualitas pengerjaan berstandar bengkel resmi AHASS.'],
            ['key' => 'facility_tefa_hours', 'value' => 'Senin – Jumat : 08.00 – 15.00 WIB'],
            ['key' => 'facility_tefa_location', 'value' => 'Gedung Bengkel Otomotif SMKN 1 Bangsri, Jl. Raya Bangsri - Keling, Jepara'],
            ['key' => 'facility_tefa_services', 'value' => "Servis Berkala & Tune Up Injeksi PGM-FI (Reset Scanner ECM)\nPerawatan Transmisi Otomatis CVT (V-Belt & Roller)\nGanti Oli Mesin & Transmisi (Astra Honda Oil Asli)\nServis Sistem Pengereman Hidrolik (CBS / ABS)\nPembersihan Injektor Ultrasonik & Throttle Body\nPenggantian Suku Cadang Orisinal Honda Genuine Parts (HGP)\nUji Emisi Gas Buang Sepeda Motor"],
            ['key' => 'facility_tefa_note', 'value' => 'Seluruh proses pengerjaan dilakukan oleh siswa berprestasi kelas XI & XII di bawah supervisi mekanik instruktur bersertifikasi Astra Motor.'],
            ['key' => 'facility_cta_badge', 'value' => 'KUNJUNGAN & INFORMASI'],
            ['key' => 'facility_cta_title', 'value' => 'Tertarik Melihat Langsung Fasilitas Bengkel Kami?'],
            ['key' => 'facility_cta_desc', 'value' => 'Kami menyambut baik kunjungan calon siswa, orang tua, sekolah mitra tingkat SMP/MTs, dan mitra industri yang ingin melihat langsung ekosistem pembelajaran otomotif berstandar Astra Honda di SMKN 1 Bangsri.'],
            ['key' => 'facility_cta_button_text', 'value' => 'Hubungi Kami / Jadwalkan Kunjungan'],
            ['key' => 'facility_cta_button_url', 'value' => '/kontak'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => 'text']
            );
        }
    }
}
