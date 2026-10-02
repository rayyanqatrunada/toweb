<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use Database\Seeders\Support\SeedAssetGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MediaDataSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            [
                'title' => 'Praktikum Diagnostik Injeksi PGM-FI Honda',
                'desc' => 'Dokumentasi kegiatan siswa melakukan pembacaan scanner HIDS, reset ECM, dan kalibrasi sensor throttle position pada sepeda motor injeksi Honda.',
                'captions' => [
                    'Siswa memantau pembacaan data parameter sensor injeksi pada scanner HIDS.',
                    'Pemeriksaan tekanan pompa bahan bakar (fuel pump pressure test) pada unit Honda Beat.',
                    'Pembersihan nosel injektor menggunakan ultrasonic injector cleaner bench.',
                    'Simulasi penanganan kode kedipan MIL pada panel instrumen trainer injeksi.',
                    'Pengukuran tahanan sensor suhu oli mesin (EOT) menggunakan multimeter digital.',
                    'Reset data memori ECM dan penyetelan putaran stasioner mesin sepeda motor.'
                ]
            ],
            [
                'title' => 'Bengkel Praktik & Fasilitas Pit Servis Standar AHASS',
                'desc' => 'Dokumentasi infrastruktur bengkel otomotif SMKN 1 Bangsri, deretan bike lift hidrolik, special service tools, dan penerapan 5R.',
                'captions' => [
                    'Jajaran 6 pit lift hidrolik berstandar bengkel resmi AHASS siap melayani servis.',
                    'Shadow board dinding penataan Special Service Tools (SST) teratur rapi.',
                    'Front desk Service Advisor dan area penerimaan pelanggan bengkel sekolah.',
                    'Penerapan budaya industri 5R: siswa membersihkan lantai bengkel pasca praktik.',
                    'Rotary engine stand untuk simulasi bedah komponen mesin 4-tak.',
                    'Penyimpanan teratur suku cadang asli Honda Genuine Parts (HGP) dan botol AHM Oil.'
                ]
            ],
            [
                'title' => 'Praktik Kerja Lapangan (PKL) di Cabang AHASS Jepara',
                'desc' => 'Potret aktivitas siswa saat magang kerja di bengkel resmi AHASS se-Kabupaten Jepara bersama mekanik profesional dan Service Advisor.',
                'captions' => [
                    'Siswa melakukan servis berkala sepeda motor konsumen di AHASS Bangsri.',
                    'Bimbingan teknis penggantian roller dan v-belt CVT bersama Kepala Mekanik.',
                    'Pemeriksaan sistem rem cakram hidrolik CBS di bengkel AHASS Pemuda Jepara.',
                    'Siswa belajar melayani pendaftaran konsumen pada komputer front desk AHASS.',
                    'Kunjungan dan monitoring guru pembimbing sekolah ke bengkel AHASS mitra.',
                    'Evaluasi harian dan penandatanganan buku jurnal logbook magang PKL.'
                ]
            ],
            [
                'title' => 'Prestasi LKS Otomotif & Safety Riding Competition',
                'desc' => 'Dokumentasi perjuangan kontingen siswa dan guru TBSM dalam kejuaraan LKS dan lomba keselamatan berkendara tingkat daerah hingga nasional.',
                'captions' => [
                    'Penyerahan trofi Juara 1 Safety Riding Competition Karesidenan Pati.',
                    'Aksi lincah siswa saat melewati rintangan slalom dan papan narrow plank.',
                    'Peserta LKS TBSM berkonsentrasi tinggi saat uji perakitan mesin presisi.',
                    'Guru pembimbing menerima medali penghargaan Kontes Guru Nasional Astra Honda.',
                    'Sesi foto bersama kepala sekolah dan tim piala kejuaraan otomotif.',
                    'Pemberian piagam penghargaan apresiasi siswa berprestasi di upacara sekolah.'
                ]
            ],
            [
                'title' => 'Kunjungan Industri & Pelatihan di Astra Motor Training Center',
                'desc' => 'Momen kunjungan ke fasilitas industri dan program peningkatan kompetensi instruktur di Astra Motor Training Center (AMTC).',
                'captions' => [
                    'Rombongan siswa TBSM tiba di fasilitas pabrik perakitan sepeda motor Honda.',
                    'Pemaparan teknologi motor listrik dan masa depan otomotif oleh engineer Astra.',
                    'Guru produktif mengikuti sertifikasi teknisi tingkat lanjut di AMTC Semarang.',
                    'Sesi tanya jawab interaktif siswa dengan manajer produksi lini manufaktur.',
                    'Penyerahan cinderamata kerja sama dari SMKN 1 Bangsri ke pihak PT Astra Honda Motor.',
                    'Foto bersama di lobi utama Astra Motor Training Center Jawa Tengah.'
                ]
            ]
        ];

        foreach ($albums as $idx => $albumData) {
            $thumbnail = SeedAssetGenerator::generateImage('Album ' . ($idx+1) . ' ' . $albumData['title'], 'gallery', 800, 600, '#8b5cf6', '#ffffff');
            $album = GalleryAlbum::updateOrCreate(
                ['slug' => Str::slug($albumData['title'])],
                [
                    'title' => $albumData['title'],
                    'description' => $albumData['desc'],
                    'thumbnail' => $thumbnail,
                    'status' => 'published',
                    'published_at' => now()->subDays(($idx * 4) + 2)
                ]
            );

            // Generate 6 items per album dengan deskripsi autentik
            for ($i = 1; $i <= 6; $i++) {
                $caption = $albumData['captions'][$i-1] ?? ('Dokumentasi ' . $albumData['title'] . ' foto ke-' . $i);
                $itemImage = SeedAssetGenerator::generateImage($albumData['title'] . ' ' . $i, 'gallery', 800, 600, '#a78bfa', '#ffffff');
                GalleryItem::updateOrCreate(
                    [
                        'gallery_album_id' => $album->id,
                        'file_path' => $itemImage
                    ],
                    [
                        'type' => 'image',
                        'description' => $caption,
                        'is_featured' => ($i === 1)
                    ]
                );
            }
        }
    }
}
