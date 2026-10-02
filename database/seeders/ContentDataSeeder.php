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
        $categories = [
            ['name' => 'Akademik', 'desc' => 'Informasi kurikulum, jadwal, dan kegiatan pembelajaran'],
            ['name' => 'Kegiatan', 'desc' => 'Dokumentasi kegiatan siswa, praktikum, dan event sekolah'],
            ['name' => 'Prestasi', 'desc' => 'Capaian medali dan kejuaraan siswa serta guru TBSM'],
            ['name' => 'Informasi', 'desc' => 'Pengumuman dan informasi resmi jurusan'],
            ['name' => 'Industri', 'desc' => 'Kabar kemitraan PT Astra Honda Motor dan bengkel AHASS'],
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[] = Category::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                ['name' => $cat['name'], 'description' => $cat['desc']]
            );
        }

        // 2. Tags
        $tags = [
            'Teknik Otomotif',
            'Praktik Bengkel',
            'Injeksi PGM-FI',
            'Astra Honda',
            'AHASS',
            'Sertifikasi Mekanik',
            'Safety Riding',
            'Prestasi Siswa',
            'Budaya 5R',
            'PKL Industri'
        ];

        $tagModels = [];
        foreach ($tags as $tag) {
            $tagModels[] = Tag::updateOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag]
            );
        }

        $adminId = \App\Models\User::first()->id ?? 1;

        // Bersihkan postingan dummy/placeholder lama
        Post::where('title', 'like', '%NOT VERIFIED%')
            ->orWhere('title', 'like', '%TKR%')
            ->orWhere('content', 'like', '%Konten dummy%')
            ->delete();

        // 3. Posts
        $posts = [
            [
                'title' => 'Struktur Kurikulum Merdeka & AMTC Konsentrasi TBSM SMKN 1 Bangsri',
                'cat' => 0,
                'excerpt' => 'Penyelarasan struktur kurikulum kejuruan sepeda motor dengan standar teknis industri Astra Honda Motor.',
                'content' => '<p>Konsentrasi Keahlian Teknik dan Bisnis Sepeda Motor (TBSM) SMK Negeri 1 Bangsri mengimplementasikan Kurikulum Merdeka yang disinkronisasi penuh dengan standar teknis Astra Motor Training Center (AMTC).</p>
                <h4>Struktur Pembelajaran Per Jenjang:</h4>
                <p><strong>KELAS X (Fase E - Dasar Otomotif):</strong></p>
                <ul>
                    <li>Gambar Teknik Otomotif & Proyeksi 2D/3D</li>
                    <li>Teknologi Dasar Otomotif (Termodinamika & Hidrolik)</li>
                    <li>Peralatan Dasar Otomotif, Hand Tools & Pengukuran Presisi</li>
                    <li>Keselamatan, Kesehatan Kerja Lingkungan Hidup (K3LH) & Budaya Kerja 5R</li>
                </ul>
                <p><strong>KELAS XI (Fase F - Konsentrasi Kejuruan):</strong></p>
                <ul>
                    <li>Pemeliharaan Mesin Sepeda Motor (Engine Overhaul & Sistem Pelumasan)</li>
                    <li>Pemeliharaan Sasis & Transmisi Otomatis CVT Matic</li>
                    <li>Sistem Kelistrikan, Pengapian Full Transistor, & Starter ACG</li>
                    <li>Sistem Suplai Bahan Bakar Injeksi Honda PGM-FI</li>
                    <li>Produk Kreatif & Kewirausahaan Bengkel Sepeda Motor</li>
                </ul>
                <p><strong>KELAS XII (Fase F Lanjut - Industri & Sertifikasi):</strong></p>
                <ul>
                    <li>Praktik Kerja Lapangan (PKL) 6 Bulan di Jaringan AHASS se-Kabupaten Jepara</li>
                    <li>Diagnostik Kerusakan Terkomputerisasi menggunakan Scanner HIDS</li>
                    <li>Manajemen & Administrasi Bengkel Resmi Sepeda Motor</li>
                    <li>Uji Kompetensi Keahlian (UKK) Mandiri & Eksternal Industri AHM</li>
                </ul>',
                'tags' => [0, 2, 3, 5]
            ],
            [
                'title' => 'Siswa TBSM Sukses Jalani Uji Kompetensi Keahlian (UKK) Bersama Asesor Astra Honda Motor',
                'cat' => 1,
                'excerpt' => 'Puluhan siswa kelas XII sukses menyelesaikan ujian praktik kejuruan berstandar bengkel resmi AHASS dengan penguji industri.',
                'content' => '<p>Sebanyak 72 siswa kelas XII Konsentrasi Keahlian TBSM SMK Negeri 1 Bangsri telah menyelesaikan rangkaian Uji Kompetensi Keahlian (UKK) praktikum mandiri dan eksternal. Ujian ini dinilai langsung oleh tim asesor industri bersertifikasi dari PT Astra Honda Motor (Astra Motor Jawa Tengah).</p>
                <p>Materi uji praktik mencakup empat pos utama, yaitu:</p>
                <ol>
                    <li><strong>Pos Engine Tune-Up:</strong> Pengukuran kompresi silinder, penyetelan kerenggangan katup dengan feeler gauge, serta penggantian oli dan filter udara.</li>
                    <li><strong>Pos Sistem Injeksi PGM-FI:</strong> Pembacaan kode kedipan MIL, penanganan sensor gagal fungsi, pemeriksaan tekanan pompa bahan bakar (fuel pump), dan reset ECM/TP.</li>
                    <li><strong>Pos Sistem Sasis & Rem:</strong> Servis transmisi otomatis CVT matic (pemeriksaan keausan roller & v-belt) serta bleed minyak rem hidrolik CBS.</li>
                    <li><strong>Pos Kelistrikan Bodi & Smart Key:</strong> Penelusuran sirkuit perkabelan lampu LED dan kalibrasi remote Smart Key Honda.</li>
                </ol>
                <p>Hasil evaluasi tim penguji eksternal menyatakan 100% siswa peserta dinyatakan kompeten dengan predikat membanggakan, memperkuat komitmen SMKN 1 Bangsri dalam mencetak teknisi handal siap kerja.</p>',
                'tags' => [1, 2, 3, 5]
            ],
            [
                'title' => 'Pelepasan Siswa Praktik Kerja Lapangan (PKL) ke Jaringan Bengkel Resmi AHASS se-Kabupaten Jepara',
                'cat' => 4,
                'excerpt' => 'Siswa kelas XI diterjunkan magang selama 6 bulan penuh di 8 cabang AHASS rekanan untuk mengasah keterampilan teknis dan etos kerja.',
                'content' => '<p>SMK Negeri 1 Bangsri secara resmi melepas para peserta didik kelas XI Konsentrasi Keahlian TBSM untuk mengikuti program Praktik Kerja Lapangan (PKL) semester genap. Program magang industri ini berlangsung selama 6 bulan penuh di 8 cabang bengkel resmi AHASS yang tersebar di Kabupaten Jepara.</p>
                <p>Kepala Program Keahlian TBSM menyampaikan bahwa program magang ini bukan sekadar menguji kemampuan membongkar pasang onderdil motor, melainkan wahana penempaan mental kedisiplinan industri, etika komunikasi kepada konsumen, dan kecepatan penyelesaian servis (work order).</p>
                <p>Jaringan AHASS mitra penempatan meliputi Astra Honda Motor Bangsri, Muncul Jaya Motor Bangsri, Muncul Jaya Motor Pemuda Jepara, Jaya Motor Pecangaan, AHASS Blok M Mlonggo, AHASS Ajima Bangsri, AHASS Agung Motor, dan AHASS Kembangan Sakti Tahunan.</p>',
                'tags' => [1, 4, 8, 9]
            ],
            [
                'title' => 'Edukasi Keselamatan Berkendara (Safety Riding) Bersama Instruktur Astra Honda Motor',
                'cat' => 1,
                'excerpt' => 'Menanamkan budaya #Cari_Aman sejak dini, ratusan siswa antusias mengikuti simulasi teknik pengereman dan keseimbangan berkendara.',
                'content' => '<p>Bekerja sama dengan Tim Safety Riding Astra Motor Jawa Tengah, SMK Negeri 1 Bangsri menggelar workshop dan pelatihan keselamatan berkendara bagi seluruh siswa jurusan otomotif. Kegiatan ini merupakan wujud nyata kepedulian Astra Honda dalam menurunkan angka kecelakaan lalu lintas di kalangan generasi muda.</p>
                <p>Instruktur bersertifikasi AHM memaparkan materi penting terkait perlengkapan berkendara standar (helm SNI, jaket pelindung, sarung tangan, sepatu tertutup), teknik pengereman terukur saat kondisi jalan basah, etika menyalip kendaraan, dan blind spot kendaraan berat.</p>
                <p>Sesi praktik dilanjutkan di lapangan upacara dengan rintangan slalom, narrow plank (papan keseimbangan), dan demonstrasi pengereman mendadak (braking obstacle) menggunakan Honda Vario 160 dan Beat eSP.</p>',
                'tags' => [0, 3, 6, 7]
            ],
            [
                'title' => 'Bursa Kerja Khusus (BKK) TBSM: Jalur Cepat Rekrutmen Mekanik Baru Jaringan AHASS',
                'cat' => 4,
                'excerpt' => 'Sinergi kelas industri memfasilitasi lulusan langsung terserap bekerja tanpa jeda menganggur melalui mekanisme seleksi BKK sekolah.',
                'content' => '<p>Bursa Kerja Khusus (BKK) SMK Negeri 1 Bangsri kembali memfasilitasi rekrutmen kerja eksklusif bagi para calon wisudawan dan alumni jurusan TBSM. Tim HRD dan Service Manager dari jaringan bengkel resmi AHASS di Jepara dan sekitarnya hadir langsung menyelenggarakan seleksi wawancara dan tes praktik kerja.</p>
                <p>Keunggulan kurikulum sinkronisasi AHM membuat alumni TBSM SMKN 1 Bangsri memiliki daya saing tinggi karena telah terbiasa menggunakan bike lift, special service tools, dan software diagnostic scanner injeksi selama pembelajaran di bengkel sekolah.</p>
                <p>Dari seleksi yang diadakan, puluhan lulusan langsung menandatangani kontrak penempatan kerja sebagai teknisi sepeda motor junior di cabang-cabang AHASS sebelum wisuda kelulusan resmi digelar.</p>',
                'tags' => [4, 5, 8, 9]
            ],
        ];

        foreach ($posts as $idx => $p) {
            $thumbnail = SeedAssetGenerator::generateImage('Warta ' . ($idx+1) . ' ' . $p['title'], 'posts', 800, 600, '#dc2626', '#ffffff');
            $post = Post::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                [
                    'title' => $p['title'],
                    'category_id' => $catModels[$p['cat']]->id,
                    'user_id' => $adminId,
                    'excerpt' => $p['excerpt'],
                    'content' => $p['content'],
                    'thumbnail' => $thumbnail,
                    'status' => 'published',
                    'published_at' => now()->subDays(($idx * 3) + 1)
                ]
            );

            $attachedTags = array_map(fn($tIdx) => $tagModels[$tIdx]->id, $p['tags'] ?? [0, 1]);
            $post->tags()->sync($attachedTags);
        }

        // Bersihkan pengumuman lama yang tidak valid
        Announcement::where('title', 'like', '%NOT VERIFIED%')->delete();

        // 4. Announcements
        $announcements = [
            [
                'title' => 'Tata Tertib dan Budaya Kerja 5R Laboratorium & Bengkel Otomotif',
                'content' => '<p>Seluruh civitas akademika TBSM SMKN 1 Bangsri wajib mematuhi aturan standar bengkel industri berikut:</p>
                <ol>
                    <li>Hadir di bengkel tepat waktu 10 menit sebelum jam praktik dimulai untuk mengikuti briefing kedisiplinan dan doa bersama.</li>
                    <li>Wajib mengenakan Alat Pelindung Diri (APD) lengkap: Wearpack standar AHASS, safety shoes ujung besi, kacamata pelindung, dan sarung tangan sesuai SOP.</li>
                    <li>Penggunaan Special Service Tools (SST) dan alat ukur presisi wajib melalui pencatatan kartu peminjaman pada Toolman bengkel.</li>
                    <li>Terapkan budaya 5R (Ringkas, Rapi, Resik, Rawat, Rajin) sebelum meninggalkan stall servis atau pit lift masing-masing.</li>
                    <li>Dilarang keras merokok, membawa makanan ke area kerja mesin, atau mengoperasikan ponsel saat praktik perakitan/tune-up berlangsung.</li>
                    <li>Rambut tertata rapi (standar 2-1-1), kuku bersih, dan menjaga sikap santun terhadap instruktur serta rekan kerja.</li>
                </ol>'
            ],
            [
                'title' => 'Jadwal Pelaksanaan Uji Kompetensi Keahlian (UKK) Mandiri & Industri AHM Tahun 2026',
                'content' => '<p>Diberitahukan kepada seluruh siswa kelas XII TBSM bahwa Ujian Praktik Kejuruan (UKK) semester akhir akan dilaksanakan pada:</p>
                <ul>
                    <li><strong>Waktu Pelaksanaan:</strong> 11 - 23 Mei 2026</li>
                    <li><strong>Tempat:</strong> Bengkel Praktik TBSM Standar AHASS SMKN 1 Bangsri</li>
                    <li><strong>Ketentuan:</strong> Hadir sesuai jadwal shift pembagian kelompok, membawa wearpack bersih, kartu peserta ujian, dan modul penugasan.</li>
                </ul>
                <p>Penilaian akan dilakukan secara langsung oleh Asesor Eksternal dari PT Astra Honda Motor dan LSP-P1.</p>'
            ],
            [
                'title' => 'Pengumuman Pembekalan & Penyerahan Jurnal Praktik Kerja Lapangan (PKL) Siswa Kelas XI',
                'content' => '<p>Apel pembekalan dan penyerahan buku jurnal harian PKL bagi siswa kelas XI yang akan ditempatkan di 8 Cabang Bengkel Resmi AHASS rekanan se-Kabupaten Jepara akan dilaksanakan pada hari Senin pukul 07.30 WIB di Ruang Teori Otomotif.</p>
                <p>Siswa diharapkan membawa surat pengantar industri resmi dan telah menyelesaikan kelengkapan administrasi bimbingan.</p>'
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

        // 5. Achievements (10 Prestasi Resmi TBSM SMKN 1 Bangsri)
        $achievements = [
            [
                'title' => 'Safety Riding Skill Competition Honda Kares Pati Putri Th. 2026',
                'level' => 'district',
                'rank' => 'Juara 1',
                'year' => '2026',
                'organizer' => 'Main Dealer Astra Motor & Karesidenan Pati',
                'desc' => 'Meraih Juara 1 pada ajang Safety Riding Skill Competition kategori pelajar putri tingkat Karesidenan Pati.'
            ],
            [
                'title' => 'Safety Riding Skill Competition Honda Kares Pati Putra Th. 2025',
                'level' => 'district',
                'rank' => 'Juara 1',
                'year' => '2025',
                'organizer' => 'Main Dealer Astra Motor & Karesidenan Pati',
                'desc' => 'Meraih Juara 1 pada ajang Safety Riding Skill Competition kategori pelajar putra tingkat Karesidenan Pati.'
            ],
            [
                'title' => 'Safety Riding Putra Honda Jawa Tengah Th. 2023',
                'level' => 'province',
                'rank' => 'Juara 1',
                'year' => '2023',
                'organizer' => 'Astra Motor Jawa Tengah',
                'desc' => 'Meraih Juara 1 Lomba Safety Riding kategori pelajar putra tingkat Provinsi Jawa Tengah.'
            ],
            [
                'title' => 'LKS Tingkat Nasional Bidang Motorcycle Technology Th. 2022',
                'level' => 'national',
                'rank' => 'Juara 8',
                'year' => '2022',
                'organizer' => 'Puspresnas Kemendikbudristek RI',
                'desc' => 'Meraih Juara 8 (Medallion for Excellence) pada Lomba Kompetensi Siswa (LKS) Tingkat Nasional bidang teknologi sepeda motor.'
            ],
            [
                'title' => 'LKS Jawa Tengah dan Juara 1 Kab. Jepara Th. 2022',
                'level' => 'province',
                'rank' => 'Juara 1',
                'year' => '2022',
                'organizer' => 'Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah',
                'desc' => 'Meraih Juara 1 LKS tingkat Kabupaten Jepara dan mewakili Kontingen Jepara pada LKS Provinsi Jawa Tengah.'
            ],
            [
                'title' => 'Kontes Guru Otomotif Tingkat Nasional Th. 2021',
                'level' => 'national',
                'rank' => 'Juara 5',
                'year' => '2021',
                'organizer' => 'PT Astra Honda Motor (AHM)',
                'desc' => 'Guru produktif TBSM SMKN 1 Bangsri meraih Juara 5 pada Kontes Keterampilan Guru SMK Binaan Honda Tingkat Nasional.'
            ],
            [
                'title' => 'Video Pembelajaran Inovatif Astra Motor Jateng Th. 2021',
                'level' => 'province',
                'rank' => 'Juara 1',
                'year' => '2021',
                'organizer' => 'Astra Motor Jawa Tengah',
                'desc' => 'Meraih Juara 1 Lomba Media Video Pembelajaran Injeksi PGM-FI yang diselenggarakan oleh Astra Motor Jateng.'
            ],
            [
                'title' => 'Safety Riding Explorer Jambore Safety Riding Kares Pati Th. 2020',
                'level' => 'district',
                'rank' => 'Juara 1',
                'year' => '2020',
                'organizer' => 'Komunitas Safety Riding & Astra Motor',
                'desc' => 'Meraih Juara 1 Jambore Safety Riding Explorer se-Karesidenan Pati.'
            ],
            [
                'title' => 'Cerdas Cermat Safety Riding Kares Pati Th. 2020',
                'level' => 'district',
                'rank' => 'Juara 1',
                'year' => '2020',
                'organizer' => 'Main Dealer Astra Motor',
                'desc' => 'Meraih Juara 1 Cerdas Cermat Wawasan Keselamatan Berkendara dan Regulasi Lalu Lintas Karesidenan Pati.'
            ],
            [
                'title' => 'LKS Bidang Otomotif Sepeda Motor Kab. Jepara Th. 2019-2020',
                'level' => 'district',
                'rank' => 'Juara 1',
                'year' => '2019',
                'organizer' => 'Musyawarah Kerja Kepala Sekolah (MKKS) SMK Kab. Jepara',
                'desc' => 'Juara Bertahan 1 Lomba Kompetensi Siswa (LKS) Bidang Sepeda Motor tingkat Kabupaten Jepara dua tahun berturut-turut.'
            ],
        ];

        foreach ($achievements as $idx => $ach) {
            $photo = SeedAssetGenerator::generateImage('Prestasi ' . ($idx+1) . ' ' . $ach['title'], 'achievements', 800, 600, '#eab308', '#ffffff');
            Achievement::updateOrCreate(
                ['slug' => Str::slug($ach['rank'] . ' ' . $ach['title'])],
                [
                    'category_id' => $catModels[2]->id,
                    'title' => $ach['title'],
                    'level' => $ach['level'],
                    'rank' => $ach['rank'],
                    'organizer' => $ach['organizer'],
                    'date' => $ach['year'] . '-01-01',
                    'description' => $ach['desc'],
                    'photo' => $photo,
                    'status' => 'published',
                    'published_at' => now(),
                ]
            );
        }
    }
}
