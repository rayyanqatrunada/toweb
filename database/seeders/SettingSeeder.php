<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Identitas Situs & SEO
            ['key' => 'site_name', 'value' => 'Teknik dan Bisnis Sepeda Motor SMKN 1 Bangsri'],
            ['key' => 'site_short_name', 'value' => 'TBSM SMKN 1 Bangsri'],
            ['key' => 'school_name', 'value' => 'SMK Negeri 1 Bangsri'],
            ['key' => 'site_tagline', 'value' => 'Pusat Keunggulan Vokasi Otomotif Binaan PT Astra Honda Motor'],
            ['key' => 'site_description', 'value' => 'Website resmi Konsentrasi Keahlian Teknik Otomotif & Sepeda Motor (TBSM) SMK Negeri 1 Bangsri Jepara. Kelas industri binaan PT Astra Honda Motor, lab bengkel standar AHASS, kurikulum PGM-FI, & BKK.'],
            ['key' => 'site_keywords', 'value' => 'teknik otomotif smkn 1 bangsri, teknik sepeda motor smkn 1 bangsri, tbsm smkn 1 bangsri, tsm smkn 1 bangsri, jurusan otomotif smk bangsri jepara, smk binaan astra honda motor bangsri, bengkel ahass smkn 1 bangsri'],
            ['key' => 'google_site_verification', 'value' => ''],
            ['key' => 'site_logo', 'value' => ''],

            // Beranda & Hero
            ['key' => 'hero_title', 'value' => 'Mencetak Teknisi Andal Berkarakter Industri Astra Honda.'],
            ['key' => 'hero_subtitle', 'value' => 'Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri membekali siswa dengan kurikulum mutakhir, teknologi injeksi PGM-FI, dan budaya kerja 5R berstandar AHASS.'],
            ['key' => 'head_quote', 'value' => 'Mendedikasikan diri memimpin sinkronisasi kurikulum berbasis industri untuk mencetak lulusan berintegritas, terampil, dan siap kerja di dunia otomotif modern.'],
            ['key' => 'youtube_video_id', 'value' => 'g1t3bhDiqCQ'],

            // Media Sosial Resmi
            ['key' => 'social_youtube', 'value' => 'https://www.youtube.com/@SMKN1BANGSRI'],
            ['key' => 'social_instagram', 'value' => 'https://www.instagram.com/smkn1bangsri'],
            ['key' => 'social_facebook', 'value' => 'https://www.facebook.com/smkn1bangsri'],
            ['key' => 'social_linkedin', 'value' => ''],

            // Kontak & Operasional
            ['key' => 'contact_address', 'value' => 'Jl. KH. Achmad Fauzan No. 17, Bangsri, Kabupaten Jepara, Jawa Tengah 59453'],
            ['key' => 'contact_phone', 'value' => '082323429052'],
            ['key' => 'contact_email', 'value' => 'smkn1bangsri@yahoo.co.id'],
            ['key' => 'contact_operating_hours', 'value' => 'Senin - Jumat: 07:00 - 15:30 WIB'],
            ['key' => 'contact_map_embed', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.8569858525046!2d110.7570535!3d-6.5397395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7118af06a3f5a5%3A0x6b744d081fdf3b02!2sSMK%20Negeri%201%20Bangsri!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],

            // Profil Jurusan (Tentang Kami)
            ['key' => 'profile_history', 'value' => '<p>Jurusan Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri berdiri sejak tahun 2011 guna menjawab tingginya kebutuhan tenaga mekanik sepeda motor profesional di Kabupaten Jepara dan sekitarnya. Sejak tahun 2016, jurusan ini secara resmi menjadi Sekolah Binaan PT Astra Honda Motor (Grade A+), mengadopsi kurikulum industri otomotif Honda, serta fasilitas bengkel standar AHASS.</p>'],
            ['key' => 'profile_vision', 'value' => 'Terbentuknya SDM profesional dalam bidang Teknik dan Bisnis Sepeda Motor yang kompeten, adaptif terhadap perkembangan teknologi industri, serta berkarakter positif.'],
            ['key' => 'profile_mission', 'value' => '<ol><li>Menyiapkan lulusan yang kompeten dan profesional dalam bidang Teknik dan Bisnis Sepeda Motor sesuai tuntutan dunia industri.</li><li>Membekali peserta didik dengan kecakapan teknologi injeksi PGM-FI, kelistrikan modern, dan manajemen bengkel.</li><li>Mempersiapkan lulusan yang mandiri, berkarakter 5R/K3LH, dan berjiwa wirausaha di sektor otomotif.</li><li>Memperkuat sinergi link and match dengan PT Astra Honda Motor dan jaringan bengkel AHASS.</li></ol>'],
            ['key' => 'homepage_about_image', 'value' => 'facilities/bengkel-praktik-otomotif.png'],

            // Header Background Images
            ['key' => 'header_about_image', 'value' => 'facilities/ruang-teori-otomotif.png'],
            ['key' => 'header_academic_facilities_image', 'value' => 'facilities/bengkel-praktik-otomotif.png'],
            ['key' => 'header_academic_programs_image', 'value' => 'facilities/stall-servis-motor-praktik.png'],
            ['key' => 'header_partnership_image', 'value' => 'facilities/bengkel-praktik-otomotif.png'],
            ['key' => 'header_news_image', 'value' => 'facilities/trainer-injeksi-kelistrikan.png'],
            ['key' => 'header_gallery_image', 'value' => 'facilities/stall-servis-motor-praktik.png'],
            ['key' => 'header_download_image', 'value' => 'facilities/ruang-teori-otomotif.png'],
            ['key' => 'header_contact_image', 'value' => 'facilities/bengkel-praktik-otomotif.png'],
            ['key' => 'header_alumni_image', 'value' => 'facilities/bengkel-praktik-otomotif.png'],

            // Kurikulum & Akademik
            ['key' => 'academic_hero_badge', 'value' => 'KURIKULUM BERSTANDAR ASTRA HONDA'],
            ['key' => 'academic_hero_title', 'value' => 'Kurikulum Vokasi Otomotif Terintegrasi Industri'],
            ['key' => 'academic_hero_subtitle', 'value' => 'Penyelarasan struktur pembelajaran dengan standar kompetensi teknis Astra Honda Motor (AMTC) untuk mencetak teknisi sepeda motor yang siap kerja dan bersertifikasi.'],
            ['key' => 'academic_teori_pct', 'value' => '30%'],
            ['key' => 'academic_praktikum_pct', 'value' => '70%'],
            ['key' => 'academic_partner_name', 'value' => 'PT Astra Honda Motor (AHM)'],
            ['key' => 'academic_curriculum_heading', 'value' => 'Tahapan Struktur Pembelajaran Berjenjang Tiga Tahun'],
            ['key' => 'academic_syllabus_modal_intro', 'value' => 'Silabus Kurikulum TBSM SMKN 1 Bangsri disusun bersama PT Astra Honda Motor mengacu pada Standar Kerja Khusus Teknisi Honda (Level 1 & Level 2).'],
            ['key' => 'academic_syllabus_modal_hours', 'value' => '1.400+ Jam Praktik'],
            ['key' => 'academic_syllabus_modal_standards', 'value' => 'Standar AMTC & BNSP LSP-P1'],
            ['key' => 'academic_curriculum_x_title', 'value' => 'Fase Fondasi & Dasar Otomotif'],
            ['key' => 'academic_curriculum_x_desc', 'value' => 'Pengenalan dasar otomotif, gambar teknik, teknologi kerja bangku, K3LH, dan budaya industri 5R.'],
            ['key' => 'academic_curriculum_x_hours', 'value' => '384 Jam Pembelajaran'],
            ['key' => 'academic_curriculum_x_focus', 'value' => 'K3LH, Gambar Teknik Otomotif, Dasar Kerja Bangku & Alat Ukur'],
            ['key' => 'academic_curriculum_xi_title', 'value' => 'Fase Konsentrasi & Pemeliharaan Berkala'],
            ['key' => 'academic_curriculum_xi_desc', 'value' => 'Pendalaman komponen utama mesin, sistem bahan bakar injeksi PGM-FI, sasis, rem hidrolik, dan transmisi otomatis CVT.'],
            ['key' => 'academic_curriculum_xi_hours', 'value' => '648 Jam Pembelajaran'],
            ['key' => 'academic_curriculum_xi_focus', 'value' => 'Tune-up PGM-FI, CVT Matic Honda, Kelistrikan Bodi, Overhaul Rem'],
            ['key' => 'academic_curriculum_xii_title', 'value' => 'Fase Lanjut, PKL AHASS & Sertifikasi'],
            ['key' => 'academic_curriculum_xii_desc', 'value' => 'Penerapan diagnostik HIDS pada sistem sensor, manajemen bengkel, Praktik Kerja Lapangan 6 bulan di AHASS, dan Uji Kompetensi Keahlian.'],
            ['key' => 'academic_curriculum_xii_hours', 'value' => '720 Jam Pembelajaran & Magang'],
            ['key' => 'academic_curriculum_xii_focus', 'value' => 'Diagnostik Scanner HIDS, Smart Key System, PKL AHASS & UKK AHM'],
            ['key' => 'academic_comp_engine_title', 'value' => 'Pemeliharaan Mesin (Engine)'],
            ['key' => 'academic_comp_engine_desc', 'value' => 'Mendiagnosis gangguan dan servis berkala mesin 4-tak, sistem pendingin, pelumasan, dan suplai bahan bakar PGM-FI.'],
            ['key' => 'academic_comp_engine_scope', 'value' => 'Overhaul Silinder, Penyetelan Katup, Kalibrasi Throttle Body & Injektor'],
            ['key' => 'academic_comp_chassis_title', 'value' => 'Pemeliharaan Sasis & Transmisi'],
            ['key' => 'academic_comp_chassis_desc', 'value' => 'Perawatan dan perbaikan sistem suspensi, rangka kemudi, rem cakram/CBS/ABS, dan transmisi CVT matic.'],
            ['key' => 'academic_comp_chassis_scope', 'value' => 'Servis CVT, Penggantian Roller & Belt, Servis Suspensi Teleskopik/Monoshock'],
            ['key' => 'academic_comp_electrical_title', 'value' => 'Pemeliharaan Kelistrikan & Sensor'],
            ['key' => 'academic_comp_electrical_desc', 'value' => 'Mendiagnosis sistem pengapian full transistor, starter ACG, sistem pengisian baterai, dan sistem Smart Key.'],
            ['key' => 'academic_comp_electrical_scope', 'value' => 'Wiring Diagram Honda, Reset ECM/MIL, Trouble Code HIDS'],
            ['key' => 'academic_comp_management_title', 'value' => 'Manajemen & Pengelolaan Bengkel'],
            ['key' => 'academic_comp_management_desc', 'value' => 'Penerapan administrasi operasional bengkel, customer service standar AHASS, alur penerimaan servis dan inventaris suku cadang.'],
            ['key' => 'academic_comp_management_scope', 'value' => 'SOP Service Advisor, Kasir Bengkel, Penataan Suku Cadang HGP'],
            ['key' => 'academic_cert_ahm_title', 'value' => 'Sertifikasi Teknisi Astra Honda Motor'],
            ['key' => 'academic_cert_ahm_level', 'value' => 'Level AMTC 1 & 2'],
            ['key' => 'academic_cert_ahm_desc', 'value' => 'Sertifikasi kompetensi resmi dari Main Dealer Astra Motor Jawa Tengah bagi lulusan yang memenuhi standar uji mekanik Honda.'],
            ['key' => 'academic_cert_bnsp_title', 'value' => 'Sertifikasi BNSP LSP-P1'],
            ['key' => 'academic_cert_bnsp_license', 'value' => 'Lisensi BNSP RI'],
            ['key' => 'academic_cert_bnsp_desc', 'value' => 'Sertifikat kompetensi nasional yang diakui secara legal di seluruh wilayah Indonesia untuk skema Pemeliharaan Sepeda Motor.'],
            ['key' => 'academic_cert_ukk_title', 'value' => 'Uji Kompetensi Keahlian (UKK) Industri'],
            ['key' => 'academic_cert_ukk_issuer', 'value' => 'Penguji Industri AHASS'],
            ['key' => 'academic_cert_ukk_desc', 'value' => 'Ujian praktik akhir yang dinilai langsung oleh tim penguji eksternal dan kepala bengkel AHASS rekanan di Kabupaten Jepara.'],

            // Facility page settings
            ['key' => 'facility_hero_badge', 'value' => 'INFRASTRUKTUR & BENGKEL ASTRA HONDA'],
            ['key' => 'facility_hero_title', 'value' => 'FASILITAS BENGKEL STANDAR INDUSTRI TBSM'],
            ['key' => 'facility_hero_subtitle', 'value' => 'Dilengkapi bike lift hidrolik, simulator injeksi PGM-FI, engine overhaul stand berputar, special service tools (SST) lengkap, dan budaya kerja 5R/K3LH untuk mencetak teknisi profesional berstandar AHASS.'],
            ['key' => 'facility_stat_1_val', 'value' => '70%'],
            ['key' => 'facility_stat_1_label', 'value' => 'Proporsi Praktik Kejuruan'],
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
            ['key' => 'facility_tefa_badge', 'value' => 'BENGKEL PRAKTIK KEJURUAN'],
            ['key' => 'facility_tefa_title', 'value' => 'Bengkel Praktik TBSM SMKN 1 Bangsri'],
            ['key' => 'facility_tefa_subtitle', 'value' => 'Fasilitas praktik perawatan berkala dan pemeliharaan sepeda motor dengan standar operasional prosedur (SOP) bengkel resmi AHASS.'],
            ['key' => 'facility_tefa_hours', 'value' => 'Senin – Jumat : 08.00 – 15.00 WIB'],
            ['key' => 'facility_tefa_location', 'value' => 'Gedung Bengkel Otomotif SMKN 1 Bangsri, Jl. KH. Achmad Fauzan No. 17, Bangsri, Jepara'],
            ['key' => 'facility_tefa_services', 'value' => "Servis Berkala & Tune Up Injeksi PGM-FI (Reset Scanner ECM)\nPerawatan Transmisi Otomatis CVT (V-Belt & Roller)\nGanti Oli Mesin & Transmisi (Astra Honda Oil Asli)\nServis Sistem Pengereman Hidrolik (CBS / ABS)\nPembersihan Injektor Ultrasonik & Throttle Body\nPenggantian Suku Cadang Orisinal Honda Genuine Parts (HGP)\nUji Emisi Gas Buang Sepeda Motor"],
            ['key' => 'facility_tefa_note', 'value' => 'Seluruh kegiatan praktik siswa dilaksanakan di bawah supervisi instruktur mekanik bersertifikasi Astra Motor.'],
            ['key' => 'facility_cta_badge', 'value' => 'KUNJUNGAN & INFORMASI'],
            ['key' => 'facility_cta_title', 'value' => 'Tertarik Melihat Langsung Fasilitas Bengkel Kami?'],
            ['key' => 'facility_cta_desc', 'value' => 'Kami menyambut baik kunjungan calon siswa, orang tua, sekolah mitra tingkat SMP/MTs, dan mitra industri yang ingin melihat langsung ekosistem pembelajaran otomotif berstandar Astra Honda di SMKN 1 Bangsri.'],
            ['key' => 'facility_cta_button_text', 'value' => 'Hubungi Kami / Jadwalkan Kunjungan'],
            ['key' => 'facility_cta_button_url', 'value' => '/kontak'],

            // Industry & Partnership Page Settings
            ['key' => 'industry_hero_badge', 'value' => 'KEMITRAAN RESMI KELAS INDUSTRI BINAAN'],
            ['key' => 'industry_hero_title', 'value' => 'Sinergi Industri Resmi Bersama PT Astra Honda Motor'],
            ['key' => 'industry_hero_subtitle', 'value' => 'Program kemitraan strategis link & match kurikulum, sertifikasi kompetensi teknisi level Honda, fasilitas lab bengkel standar pabrikan, serta penyerapan magang dan kerja di jaringan bengkel resmi AHASS se-Kabupaten Jepara.'],
            ['key' => 'industry_stat_1_val', 'value' => '2016'],
            ['key' => 'industry_stat_1_label', 'value' => 'Tahun Awal Sinergi Binaan'],
            ['key' => 'industry_stat_2_val', 'value' => 'Grade A+'],
            ['key' => 'industry_stat_2_label', 'value' => 'Standar Akreditasi Lab Honda'],
            ['key' => 'industry_stat_3_val', 'value' => '100%'],
            ['key' => 'industry_stat_3_label', 'value' => 'Kurikulum Sinkronisasi PGM-FI'],
            ['key' => 'industry_stat_4_val', 'value' => '8+ Cabang'],
            ['key' => 'industry_stat_4_label', 'value' => 'Jaringan AHASS se-Kab. Jepara'],
            ['key' => 'industry_pillars_badge', 'value' => '6 PILAR KEMITRAAN RESMI'],
            ['key' => 'industry_pillars_title', 'value' => 'Ruang Lingkup Sinergi SMK & Industri'],
            ['key' => 'industry_pillars_desc', 'value' => 'Enam pondasi kolaborasi komprehensif yang dirancang untuk menjamin kesiapan kerja lulusan TBSM SMKN 1 Bangsri di dunia industri otomotif modern.'],
            ['key' => 'industry_pillar_1_title', 'value' => 'Sinkronisasi Kurikulum Industri'],
            ['key' => 'industry_pillar_1_desc', 'value' => 'Penyelarasan silabus Kurikulum Merdeka dengan standar kompetensi teknis Astra Honda Motor (AMTC Level 1 & 2), memastikan penguasaan teknologi injeksi PGM-FI dan eSP+ mutakhir.'],
            ['key' => 'industry_pillar_2_title', 'value' => 'Praktik Kerja Lapangan (PKL) AHASS'],
            ['key' => 'industry_pillar_2_desc', 'value' => 'Siswa diterjunkan magang selama 6 bulan penuh di jaringan bengkel resmi AHASS se-Kabupaten Jepara dan Karesidenan Pati untuk merasakan ritme kerja industri sesungguhnya.'],
            ['key' => 'industry_pillar_3_title', 'value' => 'Laboratorium & Bengkel Standar AHASS'],
            ['key' => 'industry_pillar_3_desc', 'value' => 'Implementasi bengkel praktik kejuruan berstandar bengkel resmi AHASS di sekolah, menggunakan bike lift hidrolik, SOP servis, dan peralatan standar Astra Honda.'],
            ['key' => 'industry_pillar_4_title', 'value' => 'Bantuan Sarana & Special Tools'],
            ['key' => 'industry_pillar_4_desc', 'value' => 'Dukungan unit sepeda motor praktik Honda generasi terbaru, alat diagnostik HIDS (Honda Intelligent Diagnostic System), dan special service tools resmi pabrikan.'],
            ['key' => 'industry_pillar_5_title', 'value' => 'Uji Sertifikasi Mekanik Berstandar Honda'],
            ['key' => 'industry_pillar_5_desc', 'value' => 'Pelaksanaan Uji Kompetensi Keahlian (UKK) dinilai langsung oleh asesor eksternal dari industri Astra Motor serta sertifikasi LSP-P1 berlisensi BNSP.'],
            ['key' => 'industry_pillar_6_title', 'value' => 'Prioritas Rekrutmen BKK SMKN 1 Bangsri'],
            ['key' => 'industry_pillar_6_desc', 'value' => 'Jalur cepat (fast-track) rekrutmen mekanik baru bagi lulusan TBSM SMKN 1 Bangsri langsung ke dealer dan bengkel AHASS rekanan tanpa perantara.'],
            ['key' => 'industry_roadmap_badge', 'value' => 'ROADMAP PENDIDIKAN VOKASI'],
            ['key' => 'industry_roadmap_title', 'value' => 'Jalur Jenjang Karir & Kompetensi Siswa'],
            ['key' => 'industry_roadmap_desc', 'value' => 'Perjalanan terstruktur 3 tahun dari penguasaan dasar mekanikal hingga sertifikasi teknisi AHASS siap pakai.'],
            ['key' => 'industry_branch_badge', 'value' => 'JARINGAN KERJA SAMA SE-KABUPATEN JEPARA'],
            ['key' => 'industry_branch_title', 'value' => 'Mitra Bengkel Resmi AHASS di Kabupaten Jepara'],
            ['key' => 'industry_branch_desc', 'value' => 'Daftar bengkel resmi AHASS rekanan tempat siswa melaksanakan Praktik Kerja Lapangan (PKL), uji kompetensi eksternal, dan penempatan kerja lulusan di seluruh kecamatan se-Kabupaten Jepara.'],
            ['key' => 'industry_cta_badge', 'value' => 'BURSA KERJA KHUSUS (BKK) TBSM'],
            ['key' => 'industry_cta_title', 'value' => 'Siap Berkarir di Dunia Otomotif Bersama AHASS?'],
            ['key' => 'industry_cta_desc', 'value' => 'Bagi siswa dan alumni TBSM SMKN 1 Bangsri yang ingin mendaftar magang PKL atau mengikuti seleksi rekrutmen mekanik resmi AHASS di wilayah Kabupaten Jepara dan sekitarnya, hubungi koordinator BKK kami.'],
            ['key' => 'industry_cta_btn_text', 'value' => 'Konsultasi BKK & Magang'],
            ['key' => 'industry_cta_btn_url', 'value' => 'https://wa.me/6282323429052?text=Halo%20Admin%20BKK%20TBSM%20SMKN%201%20Bangsri,%20saya%20ingin%20informasi%20lowongan%20dan%20magang%20AHASS.'],
            ['key' => 'industry_cta_button_text', 'value' => 'Hubungi Hubin & BKK'],
            ['key' => 'industry_cta_button_url', 'value' => '/kontak'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => 'text']
            );
        }

        Cache::forget('site_settings');
    }
}
