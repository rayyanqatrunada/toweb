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

        $adminId = \App\Models\User::first()->id ?? 1;

        // 3. Posts (Adding Curriculum as a Post since there is no curriculum table)
        $posts = [
            [
                'title' => 'Struktur Kurikulum Teknik dan Bisnis Sepeda Motor', 
                'cat' => 0,
                'content' => '<p><strong>KELAS X:</strong></p><ul><li>Gambar Teknik Otomotif</li><li>Teknologi Dasar Otomotif</li><li>Peralatan Dasar Otomotif</li><li>KKA (Koding dan Kecerdasan Artifisial)</li><li>Konsentrasi Keahlian:<ul><li>Sasis Sepeda Motor</li><li>Kelistrikan Sepeda Motor</li><li>Mesin Sepeda Motor</li></ul></li><li>Produk Kreatif Kewirausahaan</li><li>Mata Pelajaran Pilihan</li></ul><p><strong>KELAS XI:</strong></p><ul><li>Konsentrasi Keahlian:<ul><li>Sasis Sepeda Motor</li><li>Kelistrikan Sepeda Motor</li><li>Mesin Sepeda Motor</li><li>Pengelolaan Bengkel</li></ul></li><li>Produk Kreatif Kewirausahaan</li><li>Mata Pelajaran Pilihan</li><li>Praktik Kerja Industri</li></ul><p><strong>KELAS XII:</strong></p><p><em>(Menunggu pembaruan struktur kelas XII)</em></p>'
            ],
            [
                'title' => 'Siswa TKR Melakukan Praktik Tune Up Kendaraan Injeksi (NOT VERIFIED FROM OFFICIAL PDF)', 
                'cat' => 1,
                'content' => '<p>Konten dummy untuk keperluan layout UI.</p>'
            ],
        ];

        foreach ($posts as $idx => $p) {
            $thumbnail = SeedAssetGenerator::generateImage('Berita ' . ($idx+1), 'posts', 800, 600, '#0ea5e9', '#ffffff');
            $post = Post::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                [
                    'title' => $p['title'],
                    'category_id' => $catModels[$p['cat']]->id,
                    'user_id' => $adminId,
                    'excerpt' => 'Informasi mengenai ' . $p['title'],
                    'content' => $p['content'],
                    'thumbnail' => $thumbnail,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 20))
                ]
            );
            $post->tags()->sync([$tagModels[rand(0, 2)]->id]);
        }

        // 4. Announcements (Adding Tata Tertib as an Announcement)
        $announcements = [
            [
                'title' => 'Tata Tertib Jurusan',
                'content' => '<ol><li>Hadir tepat waktu sesuai jadwal.</li><li>Selalu memakai alat pelindung diri (APD).</li><li>Gunakan alat dan bahan sesuai dengan petunjuk dan fungsi yang benar.</li><li>Pastikan area kerja tetap bersih dan teratur setelah digunakan.</li><li>Bersikaplah sopan dan hormat terhadap instruktur dan rekan kerja.</li><li>Dilarang merokok dan bercanda berlebihan.</li><li>Rambut rapi (2-1-1) dan kebersihan kuku selalu terjaga.</li></ol>'
            ],
            [
                'title' => 'Jadwal Praktik Bengkel Semester Genap (NOT VERIFIED FROM OFFICIAL PDF)',
                'content' => '<p>Konten placeholder untuk UI.</p>'
            ]
        ];

        foreach ($announcements as $ann) {
            Announcement::updateOrCreate(
                ['slug' => Str::slug($ann['title'])],
                [
                    'title' => $ann['title'],
                    'content' => $ann['content'],
                    'is_active' => true
                ]
            );
        }

        // 5. Achievements (10 strictly from PDF)
        $achievements = [
            ['title' => 'LKS Tingkat Nasional Th. 2022', 'level' => 'national', 'rank' => 'Juara 8', 'year' => '2022'],
            ['title' => 'LKS Jawa Tengah dan 1 Jepara Th. 2022', 'level' => 'province', 'rank' => 'Juara 1', 'year' => '2022'],
            ['title' => 'Kontes Guru Tingkat Nasional Th. 2021', 'level' => 'national', 'rank' => 'Juara 5', 'year' => '2021'],
            ['title' => 'Video Pembelajaran Astra Motor Jateng Th. 2021', 'level' => 'province', 'rank' => 'Juara', 'year' => '2021'],
            ['title' => 'Safety Riding Explorer Jambore Safety Riding Kares Pati Th. 2020', 'level' => 'district', 'rank' => 'Juara 1', 'year' => '2020'],
            ['title' => 'Cerdas Cermat Safety Riding Kares Pati Th. 2020', 'level' => 'district', 'rank' => 'Juara 1', 'year' => '2020'],
            ['title' => 'LKS Kab. Jepara Th. 2019 dan 2020', 'level' => 'district', 'rank' => 'Juara 1', 'year' => '2019'],
            ['title' => 'Safety Riding Putra Honda Th. 2023', 'level' => 'province', 'rank' => 'Juara 1', 'year' => '2023'],
            ['title' => 'Safety Riding Skill Competition Honda Kares Pati Putra Th. 2025', 'level' => 'district', 'rank' => 'Juara 1', 'year' => '2025'],
            ['title' => 'Safety Riding Skill Competition Honda Kares Pati Putri Th. 2026', 'level' => 'district', 'rank' => 'Juara 1', 'year' => '2026'],
        ];

        foreach ($achievements as $idx => $ach) {
            $photo = SeedAssetGenerator::generateImage('Prestasi ' . ($idx+1), 'achievements', 800, 600, '#eab308', '#ffffff');
            Achievement::updateOrCreate(
                ['slug' => Str::slug($ach['rank'] . ' ' . $ach['title'])],
                [
                    'category_id' => $catModels[2]->id,
                    'title' => $ach['title'],
                    'level' => $ach['level'],
                    'rank' => $ach['rank'],
                    'organizer' => 'Penyelenggara Lomba Resmi',
                    'date' => $ach['year'] . '-01-01',
                    'description' => 'Meraih ' . $ach['rank'] . ' pada ajang ' . $ach['title'] . '.',
                    'photo' => $photo,
                    'status' => 'published',
                    'published_at' => now(),
                ]
            );
        }
    }
}
