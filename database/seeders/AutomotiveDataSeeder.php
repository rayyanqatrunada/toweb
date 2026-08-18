<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Announcement;
use App\Models\Program;
use App\Models\Competency;
use App\Models\Teacher;
use App\Models\Facility;
use App\Models\Achievement;
use App\Models\IndustryPartner;
use App\Models\Partnership;
use App\Models\Internship;
use App\Models\JobVacancy;
use App\Models\Alumni;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use App\Models\DownloadCategory;
use App\Models\Download;

class AutomotiveDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Dapatkan Admin User
        $admin = User::first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@smk.id',
                'password' => bcrypt('password'),
            ]);
            $admin->assignRole('admin');
        }

        // 2. Kategori Berita & Tags
        $catBerita = Category::create(['name' => 'Berita Sekolah', 'slug' => 'berita-sekolah']);
        $catKegiatan = Category::create(['name' => 'Kegiatan Industri', 'slug' => 'kegiatan-industri']);
        $catPrestasi = Category::create(['name' => 'Kabar Prestasi', 'slug' => 'kabar-prestasi']);

        $tagOtomotif = Tag::create(['name' => 'Otomotif', 'slug' => 'otomotif']);
        $tagInovasi = Tag::create(['name' => 'Inovasi', 'slug' => 'inovasi']);
        $tagLKS = Tag::create(['name' => 'LKS', 'slug' => 'lks']);

        // 3. Berita / Posts
        $post1 = Post::create([
            'title' => 'Siswa TKRO Berhasil Merakit Prototype Mobil Listrik',
            'slug' => 'siswa-tkro-berhasil-merakit-prototype-mobil-listrik',
            'excerpt' => 'Inovasi membanggakan datang dari bengkel TKRO SMK kita.',
            'content' => '<p>Siswa jurusan Teknik Kendaraan Ringan Otomotif (TKRO) berhasil menyelesaikan perakitan prototype mobil listrik generasi pertama. Mobil ini ditenagai oleh baterai lithium-ion 72V dan motor listrik BLDC 5kW. Proses perakitan memakan waktu selama 3 bulan di bawah bimbingan guru produktif.</p>',
            'thumbnail' => 'https://picsum.photos/seed/mobil-listrik/800/600',
            'status' => 'published',
            'published_at' => now()->subDays(2),
            'user_id' => $admin->id,
            'category_id' => $catKegiatan->id,
        ]);
        $post1->tags()->attach([$tagOtomotif->id, $tagInovasi->id]);

        $post2 = Post::create([
            'title' => 'Kunjungan Industri ke Pabrik Perakitan Toyota Astra Motor',
            'slug' => 'kunjungan-industri-pabrik-toyota',
            'excerpt' => 'Meningkatkan wawasan industri, siswa kelas XII berkunjung ke pabrik Toyota.',
            'content' => '<p>Sebagai bagian dari sinkronisasi kurikulum, puluhan siswa kelas XII mengadakan kunjungan langsung ke fasilitas perakitan PT Toyota Astra Motor di Karawang. Siswa diajak melihat langsung proses manufaktur otomotif modern dengan standar industri global.</p>',
            'thumbnail' => 'https://picsum.photos/seed/kunjungan-industri/800/600',
            'status' => 'published',
            'published_at' => now()->subDays(5),
            'user_id' => $admin->id,
            'category_id' => $catBerita->id,
        ]);
        $post2->tags()->attach([$tagOtomotif->id]);

        // 4. Pengumuman
        Announcement::create([
            'title' => 'Jadwal Ujian Kompetensi Keahlian (UKK) Otomotif 2026',
            'slug' => 'jadwal-ukk-otomotif-2026',
            'content' => '<p>Diberitahukan kepada seluruh siswa kelas XII, UKK akan diselenggarakan pada tanggal 10 - 20 Mei 2026 di Bengkel Utama. Harap mempersiapkan wearpack dan modul kelistrikan bodi serta engine tune-up.</p>',
            'is_active' => true,
        ]);

        // 5. Program Keahlian & Kompetensi
        $tkro = Program::create([
            'name' => 'Teknik Kendaraan Ringan Otomotif (TKRO)',
            'slug' => 'tkro',
            'description' => '<p>Membekali siswa dengan kompetensi perawatan dan perbaikan kendaraan bermotor roda empat (Mobil).</p>'
        ]);
        Competency::create(['program_id' => $tkro->id, 'name' => 'Pemeliharaan Mesin Kendaraan Ringan', 'slug' => 'pemeliharaan-mesin-kendaraan-ringan']);
        Competency::create(['program_id' => $tkro->id, 'name' => 'Pemeliharaan Sasis dan Pemindah Tenaga', 'slug' => 'pemeliharaan-sasis-pemindah-tenaga']);
        Competency::create(['program_id' => $tkro->id, 'name' => 'Pemeliharaan Kelistrikan Kendaraan Ringan', 'slug' => 'pemeliharaan-kelistrikan-kendaraan-ringan']);

        $tbsm = Program::create([
            'name' => 'Teknik & Bisnis Sepeda Motor (TBSM)',
            'slug' => 'tbsm',
            'description' => '<p>Mempelajari teknologi otomotif roda dua, dari sistem konvensional hingga fuel injection (FI).</p>'
        ]);
        Competency::create(['program_id' => $tbsm->id, 'name' => 'Pemeliharaan Mesin Sepeda Motor', 'slug' => 'pemeliharaan-mesin-sepeda-motor']);
        Competency::create(['program_id' => $tbsm->id, 'name' => 'Pemeliharaan Sasis Sepeda Motor', 'slug' => 'pemeliharaan-sasis-sepeda-motor']);

        // 6. Guru
        Teacher::create([
            'name' => 'Budi Santoso, S.Pd., M.T.',
            'nip' => '198005122005011003',
            'position' => 'Kepala Bengkel TKRO',
            'photo' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=random&size=200',
        ]);
        Teacher::create([
            'name' => 'Ahmad Rifai, S.T.',
            'nip' => '198503222010011005',
            'position' => 'Guru Produktif TBSM',
            'photo' => 'https://ui-avatars.com/api/?name=Ahmad+Rifai&background=random&size=200',
        ]);

        // 7. Fasilitas
        Facility::create([
            'name' => 'Lab Spooring & Balancing',
            'slug' => 'lab-spooring-balancing',
            'description' => '<p>Dilengkapi dengan teknologi wheel alignment 3D terkini untuk akurasi maksimal.</p>',
            'photo' => 'https://picsum.photos/seed/spooring/800/600',
        ]);
        Facility::create([
            'name' => 'Lab Engine Stand',
            'slug' => 'lab-engine-stand',
            'description' => '<p>Berisi puluhan live engine dari berbagai pabrikan untuk praktek bongkar pasang.</p>',
            'photo' => 'https://picsum.photos/seed/engine-stand/800/600',
        ]);

        // 8. Prestasi
        $ach = Achievement::create([
            'title' => 'Juara 1 LKS Tingkat Provinsi Bidang Automobile Technology',
            'slug' => 'juara-1-lks-automobile-technology-2025',
            'description' => '<p>Siswa kita berhasil meraih medali emas pada Lomba Kompetensi Siswa (LKS) bidang teknologi mobil dan akan mewakili ke tingkat Nasional.</p>',
            'date' => now()->subMonths(2),
            'level' => 'province',
            'rank' => 'Juara 1',
            'organizer' => 'Dinas Pendidikan Provinsi',
            'photo' => 'https://picsum.photos/seed/lks-juara/800/600',
            'status' => 'published',
            'published_at' => now()->subMonths(2),
        ]);
        // Achievement participant is removed

        // 9. Mitra Industri
        $partner1 = IndustryPartner::create([
            'name' => 'PT Toyota Astra Motor',
            'slug' => 'pt-toyota-astra-motor',
            'description' => '<p>Pabrikan dan distributor kendaraan bermotor Toyota di Indonesia.</p>',
            'industry_type' => 'Manufaktur & Distributor',
            'address' => 'Sunter, Jakarta Utara',
            'website' => 'https://toyota.astra.co.id',
            'logo' => 'https://ui-avatars.com/api/?name=Toyota+Astra&background=ed1c24&color=fff&size=200',
            'status' => 'published',
            'published_at' => now(),
        ]);
        $partnership = Partnership::create([
            'industry_partner_id' => $partner1->id,
            'title' => 'Sinkronisasi Kurikulum & Kelas Industri Toyota',
            'type' => 'mou',
            'start_date' => now()->subYears(2),
            'end_date' => now()->addYears(3),
            'status' => 'active'
        ]);

        $intern = Internship::create([
            'industry_partner_id' => $partner1->id,
            'partnership_id' => $partnership->id,
            'title' => 'Program Magang Mekanik PT Toyota',
            'description' => '<p>Program magang untuk siswa kelas XII di bengkel resmi Toyota.</p>',
            'start_date' => now()->subMonths(3),
            'end_date' => now()->subMonths(1),
            'status' => 'completed',
        ]);

        // Internship participant is removed

        $partner2 = IndustryPartner::create([
            'name' => 'Auto2000',
            'slug' => 'auto2000',
            'description' => '<p>Jaringan jasa penjualan, perawatan, perbaikan dan penyediaan suku cadang Toyota terbesar di Indonesia.</p>',
            'industry_type' => 'Dealer & Bengkel Resmi',
            'address' => 'Jakarta Pusat',
            'website' => 'https://auto2000.co.id',
            'logo' => 'https://ui-avatars.com/api/?name=Auto+2000&background=000&color=fff&size=200',
            'status' => 'published',
            'published_at' => now(),
        ]);
        
        $partner3 = IndustryPartner::create([
            'name' => 'PT Astra Honda Motor',
            'slug' => 'pt-astra-honda-motor',
            'description' => '<p>Pelopor industri sepeda motor di Indonesia.</p>',
            'industry_type' => 'Manufaktur Roda Dua',
            'address' => 'Cikarang, Bekasi',
            'website' => 'https://astra-honda.com',
            'logo' => 'https://ui-avatars.com/api/?name=Honda+Motor&background=e3000f&color=fff&size=200',
            'status' => 'published',
            'published_at' => now(),
        ]);

        // 10. PKL
        $pkl = Internship::create([
            'industry_partner_id' => $partner2->id,
            'title' => 'PKL Auto2000 Periode Ganjil',
            'description' => '<p>Program Praktik Kerja Lapangan di bengkel resmi Auto2000 cabang Sudirman.</p>',
            'start_date' => now()->subMonths(1),
            'end_date' => now()->addMonths(2),
            'status' => 'ongoing',
        ]);
        // PKL Participants removed

        // 11. Lowongan Kerja
        JobVacancy::create([
            'industry_partner_id' => $partner2->id,
            'title' => 'Service Advisor',
            'slug' => 'service-advisor-auto2000',
            'position' => 'Service Advisor',
            'description' => '<p>Dibutuhkan lulusan TKRO berprestasi untuk dilatih menjadi Service Advisor handal.</p>',
            'requirements' => '1. Lulusan SMK TKRO<br>2. Komunikatif<br>3. Mampu mengoperasikan komputer',
            'location' => 'Jakarta Selatan',
            'work_type' => 'onsite',
            'employment_type' => 'full-time',
            'application_email' => 'hrd@auto2000.example.com',
            'application_deadline' => now()->addDays(30),
            'status' => 'published',
            'published_at' => now(),
        ]);

        JobVacancy::create([
            'industry_partner_id' => $partner3->id,
            'title' => 'Mekanik AHASS',
            'slug' => 'mekanik-ahass-honda',
            'position' => 'Mekanik Junior',
            'description' => '<p>Lowongan mekanik untuk bengkel resmi AHASS seluruh Indonesia.</p>',
            'requirements' => '1. Lulusan SMK TBSM<br>2. Paham sistem injeksi PGM-FI<br>3. Disiplin',
            'location' => 'Seluruh Indonesia',
            'work_type' => 'onsite',
            'employment_type' => 'contract',
            'application_email' => 'karir@astra-honda.example.com',
            'application_deadline' => now()->addDays(20),
            'status' => 'published',
            'published_at' => now(),
        ]);

        // 12. Alumni
        Alumni::create([
            'name' => 'Hendra Setiawan',
            'student_id' => 'ALM-2022-001',
            'slug' => 'hendra-setiawan',
            'graduation_year' => '2022',
            'current_occupation' => 'Kepala Mekanik',
            'current_company' => 'Auto2000 Bekasi',
            'bio' => 'Lulusan TKRO yang kini memimpin tim mekanik di dealer resmi.',
            'photo' => 'https://ui-avatars.com/api/?name=Hendra+Setiawan&background=random&size=200',
            'is_public' => true,
            'status' => 'published',
            'published_at' => now(),
        ]);
        
        Alumni::create([
            'name' => 'Satria Tama',
            'student_id' => 'ALM-2023-002',
            'slug' => 'satria-tama',
            'graduation_year' => '2023',
            'current_occupation' => 'Quality Control',
            'current_company' => 'PT Toyota Astra Motor',
            'bio' => 'Diterima bekerja langsung setelah lulus berkat program Kelas Industri.',
            'photo' => 'https://ui-avatars.com/api/?name=Satria+Tama&background=random&size=200',
            'is_public' => true,
            'status' => 'published',
            'published_at' => now(),
        ]);

        // 13. Galeri
        $album = GalleryAlbum::create([
            'title' => 'Praktek Overhaul Mesin Kelas XII TKRO',
            'slug' => 'praktek-overhaul-mesin-kelas-xii-tkro',
            'description' => 'Dokumentasi ujian praktek bongkar pasang mesin transmisi otomatis dan manual.',
            'thumbnail' => 'https://picsum.photos/seed/overhaul-mesin/800/600',
            'status' => 'published',
            'published_at' => now(),
        ]);
        GalleryItem::create(['gallery_album_id' => $album->id, 'description' => 'Pengecekan Blok Silinder', 'file_path' => 'https://picsum.photos/seed/blok-silinder/800/600']);
        GalleryItem::create(['gallery_album_id' => $album->id, 'description' => 'Pemasangan Piston', 'file_path' => 'https://picsum.photos/seed/piston/800/600']);
        GalleryItem::create(['gallery_album_id' => $album->id, 'description' => 'Uji Coba Pengapian', 'file_path' => 'https://picsum.photos/seed/pengapian/800/600']);

        // 14. Download
        $dlCat = DownloadCategory::create(['name' => 'Modul Ajar', 'slug' => 'modul-ajar']);
        Download::create([
            'download_category_id' => $dlCat->id,
            'title' => 'Modul Kelistrikan Bodi SMK Kelas XI',
            'slug' => 'modul-kelistrikan-bodi-smk-kelas-xi',
            'description' => 'Modul lengkap wiring diagram kelistrikan kendaraan ringan standar industri.',
            'file_path' => '#',
            'is_public' => true,
            'status' => 'published',
            'published_at' => now(),
        ]);
    }
}
