<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\DownloadCategory;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DownloadDataSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Modul Pembelajaran',
            'Administrasi Jurusan',
            'Panduan PKL',
            'Dokumen Kelulusan'
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[] = DownloadCategory::updateOrCreate(
                ['slug' => Str::slug($cat)],
                ['name' => $cat, 'description' => 'Kategori dokumen ' . $cat]
            );
        }

        $downloads = [
            ['title' => 'Modul Perawatan Mesin Kendaraan Ringan', 'cat' => 0],
            ['title' => 'Modul Kelistrikan Sepeda Motor', 'cat' => 0],
            ['title' => 'Formulir Pendaftaran Siswa Baru', 'cat' => 1],
            ['title' => 'Buku Panduan Tata Tertib Bengkel', 'cat' => 1],
            ['title' => 'Buku Jurnal PKL Siswa', 'cat' => 2],
            ['title' => 'Format Laporan PKL', 'cat' => 2],
            ['title' => 'Formulir Pendaftaran Uji Kompetensi', 'cat' => 3],
            ['title' => 'Panduan Penulisan Tugas Akhir', 'cat' => 3],
        ];

        foreach ($downloads as $idx => $dl) {
            $pdfPath = SeedAssetGenerator::generatePdf($dl['title'], 'downloads');
            Download::updateOrCreate(
                ['slug' => Str::slug($dl['title'])],
                [
                    'download_category_id' => $catModels[$dl['cat']]->id,
                    'title' => $dl['title'],
                    'description' => 'Dokumen resmi terkait ' . $dl['title'] . '.',
                    'file_path' => $pdfPath,
                    'file_name' => basename($pdfPath),
                    'file_type' => 'application/pdf',
                    'file_size' => 1024 * rand(100, 500), // Random size in KB
                    'is_public' => true,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 10))
                ]
            );
        }
    }
}
