<?php
$files = [
    'resources/views/frontend/news/index.blade.php' => ['Belum Ada Berita', 'Konten berita atau pengumuman belum tersedia.', 'document'],
    'resources/views/frontend/announcements/index.blade.php' => ['Belum Ada Pengumuman', 'Pengumuman belum tersedia saat ini.', 'calendar'],
    'resources/views/frontend/achievements/index.blade.php' => ['Belum Ada Prestasi', 'Data prestasi belum ditambahkan.', 'document'],
    'resources/views/frontend/alumni/index.blade.php' => ['Belum Ada Data Alumni', 'Data alumni belum tersedia saat ini.', 'users'],
    'resources/views/frontend/internships/index.blade.php' => ['Belum Ada Informasi PKL', 'Data informasi PKL belum tersedia saat ini.', 'document'],
    'resources/views/frontend/jobs/index.blade.php' => ['Belum Ada Lowongan', 'Lowongan pekerjaan belum tersedia saat ini.', 'document'],
];

foreach ($files as $file => $data) {
    if (!file_exists($file)) continue;
    
    $content = file_get_contents($file);
    
    // Pattern to catch empty state block (starts after @empty and ends before @endforelse)
    $pattern = '/@empty(.*?)@endforelse/s';
    
    $replacement = "@empty\n                    <x-empty-state title=\"{$data[0]}\" message=\"{$data[1]}\" icon=\"{$data[2]}\" />\n                @endforelse";
    
    $content = preg_replace($pattern, $replacement, $content);
    
    file_put_contents($file, $content);
    echo "Updated empty state in: $file\n";
}
