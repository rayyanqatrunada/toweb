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
        // Bersihkan data download kategori/item kendaraan ringan/dummy
        Download::where('title', 'like', '%Kendaraan Ringan%')->delete();

        $categories = [
            'Kurikulum & Modul Pembelajaran',
            'Panduan Praktik Kerja Lapangan (PKL)',
            'Uji Kompetensi Keahlian (UKK)',
            'SOP Bengkel & Administrasi Jurusan'
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[] = DownloadCategory::updateOrCreate(
                ['slug' => Str::slug($cat)],
                ['name' => $cat, 'description' => 'Kategori dokumen ' . $cat]
            );
        }

        $downloads = [
            [
                'title' => 'Modul Sistem Injeksi Sepeda Motor Honda PGM-FI',
                'cat' => 0,
                'desc' => 'Modul teori dan job sheet praktikum pengetesan sensor injeksi serta pembacaan scanner diagnostik HIDS PGM-FI.'
            ],
            [
                'title' => 'Modul Pemeliharaan Sasis & Transmisi Otomatis CVT Matic',
                'cat' => 0,
                'desc' => 'Panduan praktikum perawatan transmisi otomatis CVT Honda, pemeriksaan roller, v-belt, dan sistem rem hidrolik CBS/ABS.'
            ],
            [
                'title' => 'Modul Sistem Kelistrikan & Smart Key System Sepeda Motor',
                'cat' => 0,
                'desc' => 'Pedoman pembacaan wiring diagram kelistrikan, sistem starter ACG, sistem pengapian full transistor, dan remote Smart Key.'
            ],
            [
                'title' => 'Buku Panduan Pelaksanaan PKL di Bengkel Resmi AHASS',
                'cat' => 1,
                'desc' => 'Pedoman teknis, etika kerja industri 5R, dan tata tertib magang bagi siswa kelas XI di bengkel AHASS rekanan.'
            ],
            [
                'title' => 'Buku Jurnal Harian & Lembar Evaluasi Logbook PKL Siswa',
                'cat' => 1,
                'desc' => 'Format pencatatan pekerjaan harian dan penilaian berkala pembimbing industri bengkel AHASS.'
            ],
            [
                'title' => 'Kisi-Kisi & Lembar Penilaian Uji Kompetensi Keahlian (UKK) TBSM',
                'cat' => 2,
                'desc' => 'Dokumen standar penilaian praktik kejuruan mandiri dan eksternal bersama penguji industri PT Astra Honda Motor.'
            ],
            [
                'title' => 'Standar Operasional Prosedur (SOP) Keselamatan Kerja Bengkel (K3LH & 5R)',
                'cat' => 3,
                'desc' => 'Pedoman penggunaan Alat Pelindung Diri (APD), penanganan limbah oli B3, dan pemeliharaan alat bengkel.'
            ],
            [
                'title' => 'Formulir Peminjaman Special Service Tools (SST) & Inventaris Alat',
                'cat' => 3,
                'desc' => 'Formulir resmi kartu kontrol peminjaman dan pengembalian perkakas khusus pada Toolman bengkel otomotif.'
            ],
        ];

        foreach ($downloads as $idx => $dl) {
            $pdfPath = SeedAssetGenerator::generatePdf($dl['title'], 'downloads');
            Download::updateOrCreate(
                ['slug' => Str::slug($dl['title'])],
                [
                    'download_category_id' => $catModels[$dl['cat']]->id,
                    'title' => $dl['title'],
                    'description' => $dl['desc'],
                    'file_path' => $pdfPath,
                    'file_name' => basename($pdfPath),
                    'file_type' => 'application/pdf',
                    'file_size' => 1024 * rand(250, 750), // Ukuran file simulasi KB
                    'is_public' => true,
                    'status' => 'published',
                    'published_at' => now()->subDays($idx + 1)
                ]
            );
        }
    }
}
