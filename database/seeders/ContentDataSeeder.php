<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories
        $categories = ['Akademik', 'Kegiatan', 'Prestasi', 'Informasi', 'Industri'];
        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[] = Category::updateOrCreate(
                ['slug' => Str::slug($cat)],
                ['name' => $cat, 'description' => 'Kategori konten ' . $cat]
            );
        }

        // 2. Tags
        $tags = ['Teknik Otomotif', 'Praktik', 'Kompetensi', 'Industri', 'Prestasi', 'Siswa'];
        $tagModels = [];
        foreach ($tags as $tag) {
            $tagModels[] = Tag::updateOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag]
            );
        }

        // 3. Posts
        $posts = [
            ['title' => 'Siswa TKR Melakukan Praktik Tune Up Kendaraan Injeksi', 'cat' => 1],
            ['title' => 'Kunjungan Industri ke Pabrik Perakitan Toyota', 'cat' => 4],
            ['title' => 'Kerjasama Link & Match dengan Astra Honda Motor', 'cat' => 4],
            ['title' => 'Juara 1 Lomba Kompetensi Siswa Bidang Otomotif Tingkat Provinsi', 'cat' => 2],
            ['title' => 'Penerapan Pembelajaran Project Based Learning (PjBL) di Bengkel', 'cat' => 0],
            ['title' => 'Pelaksanaan Uji Kompetensi Keahlian (UKK) Bersama Asesor Eksternal', 'cat' => 0],
            ['title' => 'Kegiatan Ekstrakurikuler Modifikasi Sepeda Motor', 'cat' => 1],
            ['title' => 'Informasi PPDB Jurusan Teknik Otomotif Tahun Ajaran Baru', 'cat' => 3],
        ];

        foreach ($posts as $idx => $p) {
            $thumbnail = SeedAssetGenerator::generateImage('Berita ' . ($idx+1), 'posts', 800, 600, '#0ea5e9', '#ffffff');
            $post = Post::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                [
                    'title' => $p['title'],
                    'category_id' => $catModels[$p['cat']]->id,
                    'user_id' => 1, // Asumsi Admin ID 1
                    'excerpt' => 'Ini adalah ringkasan berita mengenai ' . $p['title'] . ' yang dilaksanakan oleh jurusan.',
                    'content' => '<p>Kegiatan <strong>' . $p['title'] . '</strong> telah berjalan dengan lancar. Kegiatan ini bertujuan untuk meningkatkan kompetensi siswa agar siap menghadapi dunia industri.</p><p>Para peserta sangat antusias mengikuti seluruh rangkaian acara dari awal hingga akhir. Harapannya, kegiatan seperti ini dapat terus diselenggarakan secara rutin.</p>',
                    'thumbnail' => $thumbnail,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 20))
                ]
            );
            $post->tags()->sync([$tagModels[rand(0, 2)]->id, $tagModels[rand(3, 5)]->id]);
        }

        // 4. Announcements
        $announcements = [
            ['title' => 'Jadwal Praktik Bengkel Semester Genap'],
            ['title' => 'Pengumuman Pelaksanaan Uji Kompetensi Keahlian'],
            ['title' => 'Informasi Pendaftaran PKL Gelombang 1'],
            ['title' => 'Jadwal Kegiatan Kunjungan Industri Siswa Kelas XI'],
            ['title' => 'Persiapan Lomba Kompetensi Siswa (LKS) Tingkat Kabupaten'],
        ];

        foreach ($announcements as $ann) {
            Announcement::updateOrCreate(
                ['slug' => Str::slug($ann['title'])],
                [
                    'title' => $ann['title'],
                    'content' => '<p>Diberitahukan kepada seluruh siswa bahwa <strong>' . $ann['title'] . '</strong> akan segera dilaksanakan. Mohon mempersiapkan diri dengan baik dan memperhatikan instruksi dari wali kelas atau instruktur pembimbing.</p>',
                    'is_active' => true
                ]
            );
        }

        // 5. Achievements
        $achievements = [
            ['title' => 'Juara 1 LKS Otomotif Tingkat Provinsi', 'level' => 'Provinsi', 'rank' => 'Juara 1'],
            ['title' => 'Medali Emas Kompetisi Keterampilan Teknik Motor', 'level' => 'Nasional', 'rank' => 'Medali Emas'],
            ['title' => 'Juara 2 Lomba Modifikasi Kendaraan Ringan', 'level' => 'Kabupaten', 'rank' => 'Juara 2'],
            ['title' => 'Penghargaan Siswa Teladan Vokasi', 'level' => 'Nasional', 'rank' => 'Terbaik'],
            ['title' => 'Juara 3 Olimpiade Mekanik Muda', 'level' => 'Provinsi', 'rank' => 'Juara 3'],
            ['title' => 'Juara Harapan 1 Safety Riding Competition', 'level' => 'Kabupaten', 'rank' => 'Harapan 1'],
        ];

        foreach ($achievements as $idx => $ach) {
            $photo = SeedAssetGenerator::generateImage('Prestasi ' . ($idx+1), 'achievements', 800, 600, '#eab308', '#ffffff');
            Achievement::updateOrCreate(
                ['slug' => Str::slug($ach['title'])],
                [
                    'category_id' => $catModels[2]->id,
                    'title' => $ach['title'],
                    'level' => $ach['level'],
                    'rank' => $ach['rank'],
                    'organizer' => 'Dinas Pendidikan & Industri Mitra',
                    'date' => now()->subDays(rand(30, 300)),
                    'description' => 'Siswa berhasil meraih ' . $ach['rank'] . ' pada ajang ' . $ach['title'] . ' tingkat ' . $ach['level'] . '.',
                    'photo' => $photo,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 20))
                ]
            );
        }
    }
}
