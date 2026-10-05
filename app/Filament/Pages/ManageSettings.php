<?php

namespace App\Filament\Pages;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use App\Services\SettingsService;
use Filament\Notifications\Notification;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-adjustments-horizontal';
    protected static ?string $navigationLabel = 'Pengaturan Umum Website';
    protected static ?string $title = 'Informasi & Pengaturan Umum Website';
    protected static string | \UnitEnum | null $navigationGroup = 'Pusat Layanan & Sistem';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $this->form->fill([
            // Identitas & Branding
            'site_short_name' => $settings->get('site_short_name', 'TBSM'),
            'site_name' => $settings->get('site_name', 'Teknik dan Bisnis Sepeda Motor SMKN 1 Bangsri'),
            'site_tagline' => $settings->get('site_tagline', 'Pusat Keunggulan Vokasi Otomotif Berstandar Industri Astra Honda Motor'),
            'site_logo' => $settings->get('site_logo'),

            // Kontak & Lokasi
            'contact_address' => $settings->get('contact_address', 'Jl. KH. Achmad Fauzan No. 17, Bangsri, Jepara, Jawa Tengah 59453'),
            'contact_phone' => $settings->get('contact_phone', '082323429052'),
            'contact_email' => $settings->get('contact_email', 'smkn1bangsri@yahoo.co.id'),
            'contact_operating_hours' => $settings->get('contact_operating_hours', 'Senin - Jumat: 07:00 - 15:30 WIB'),
            'contact_map_embed' => $settings->get('contact_map_embed'),

            // Media Sosial
            'social_youtube' => $settings->get('social_youtube'),
            'social_instagram' => $settings->get('social_instagram'),
            'social_facebook' => $settings->get('social_facebook'),
            'social_tiktok' => $settings->get('social_tiktok'),

            // SEO & Webmaster
            'site_description' => $settings->get('site_description', 'Website resmi Konsentrasi Keahlian Teknik Otomotif & Sepeda Motor (TBSM) SMK Negeri 1 Bangsri. Informasi kurikulum, kemitraan PT Astra Honda Motor, fasilitas bengkel, dan prestasi siswa.'),
            'site_keywords' => $settings->get('site_keywords', 'teknik otomotif smkn 1 bangsri, teknik sepeda motor smkn 1 bangsri, tbsm smkn 1 bangsri, tsm smkn 1 bangsri, astra honda motor bangsri'),
            'google_site_verification' => $settings->get('google_site_verification', ''),

            // Foto Banner Header Halaman
            'header_about_image' => $settings->get('header_about_image'),
            'header_academic_programs_image' => $settings->get('header_academic_programs_image'),
            'header_academic_facilities_image' => $settings->get('header_academic_facilities_image'),
            'header_gallery_image' => $settings->get('header_gallery_image'),
            'header_alumni_image' => $settings->get('header_alumni_image'),
            'header_partnership_image' => $settings->get('header_partnership_image'),
            'header_news_image' => $settings->get('header_news_image'),
            'header_contact_image' => $settings->get('header_contact_image'),
            'header_download_image' => $settings->get('header_download_image'),
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Tabs::make('Pengaturan Umum')
                    ->tabs([
                        // =========================================================================
                        // TAB 1: IDENTITAS & BRANDING
                        // =========================================================================
                        Tab::make('Identitas & Logo')
                            ->icon('heroicon-o-identification')
                            ->badge('01')
                            ->schema([
                                Section::make('Identitas & Logo Website')
                                    ->description('Informasi utama identitas jurusan/sekolah yang ditampilkan di header, navbar, dan footer.')
                                    ->icon('heroicon-o-building-library')
                                    ->schema([
                                        TextInput::make('site_short_name')
                                            ->label('Singkatan Jurusan')
                                            ->helperText('Ditampilkan di samping logo navbar (contoh: TBSM).')
                                            ->required()
                                            ->default('TBSM'),
                                        TextInput::make('site_name')
                                            ->label('Nama Lengkap Website / Jurusan')
                                            ->required(),
                                        TextInput::make('site_tagline')
                                            ->label('Tagline Singkat')
                                            ->required()
                                            ->columnSpanFull(),
                                        FileUpload::make('site_logo')
                                            ->label('Logo Website')
                                            ->helperText('Format PNG atau SVG transparan direkomendasikan (Maks. 2MB).')
                                            ->disk('public')
                                            ->visibility('public')
                                            ->image()
                                            ->directory('settings')
                                            ->maxSize(2048)
                                            ->openable()
                                            ->downloadable()
                                            ->imageEditor()
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 2: KONTAK & ALAMAT
                        // =========================================================================
                        Tab::make('Kontak & Alamat')
                            ->icon('heroicon-o-map-pin')
                            ->badge('02')
                            ->schema([
                                Section::make('Informasi Kontak & Jam Kerja')
                                    ->description('Data kontak dan alamat resmi yang tampil di footer seluruh halaman serta halaman Kontak.')
                                    ->icon('heroicon-o-phone')
                                    ->schema([
                                        TextInput::make('contact_address')
                                            ->label('Alamat Lengkap Sekolah / Bengkel')
                                            ->required()
                                            ->columnSpanFull(),
                                        TextInput::make('contact_phone')
                                            ->label('Nomor Telepon / WhatsApp')
                                            ->required(),
                                        TextInput::make('contact_email')
                                            ->label('Alamat Email Resmi')
                                            ->email()
                                            ->required(),
                                        TextInput::make('contact_operating_hours')
                                            ->label('Jam Layanan Operasional')
                                            ->required()
                                            ->default('Senin - Jumat: 07:00 - 15:30 WIB')
                                            ->columnSpanFull(),
                                        Textarea::make('contact_map_embed')
                                            ->label('Kode Embed Peta Google Maps (iframe)')
                                            ->helperText('Buka Google Maps > Cari Lokasi > Klik "Share" > "Embed a map" > Salin kode HTML lalu paste di sini.')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 3: MEDIA SOSIAL
                        // =========================================================================
                        Tab::make('Media Sosial')
                            ->icon('heroicon-o-share')
                            ->badge('03')
                            ->schema([
                                Section::make('Akun Media Sosial Resmi')
                                    ->description('Tautan ke kanal media sosial jurusan yang terhubung di navbar dan footer web.')
                                    ->icon('heroicon-o-globe-alt')
                                    ->schema([
                                        TextInput::make('social_youtube')
                                            ->label('Kanal YouTube')
                                            ->placeholder('https://youtube.com/@...')
                                            ->url(),
                                        TextInput::make('social_instagram')
                                            ->label('Instagram Resmi')
                                            ->placeholder('https://instagram.com/...')
                                            ->url(),
                                        TextInput::make('social_facebook')
                                            ->label('Halaman Facebook')
                                            ->placeholder('https://facebook.com/...')
                                            ->url(),
                                        TextInput::make('social_tiktok')
                                            ->label('Akun TikTok')
                                            ->placeholder('https://tiktok.com/@...')
                                            ->url(),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 4: SEO GLOBAL
                        // =========================================================================
                        Tab::make('SEO Global')
                            ->icon('heroicon-o-magnifying-glass')
                            ->badge('04')
                            ->schema([
                                Section::make('Search Engine Optimization (SEO)')
                                    ->description('Pengaturan meta tag global untuk Google Search dan indeks mesin pencari.')
                                    ->icon('heroicon-o-code-bracket')
                                    ->schema([
                                        Textarea::make('site_description')
                                            ->label('Deskripsi Website (Meta Description)')
                                            ->helperText('Ringkasan 1-2 kalimat untuk hasil pencarian Google.')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('site_keywords')
                                            ->label('Kata Kunci Pencarian (SEO Keywords)')
                                            ->helperText('Pisahkan dengan tanda koma.')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                        TextInput::make('google_site_verification')
                                            ->label('Token Verifikasi Google Search Console')
                                            ->helperText('Kode verifikasi Google (token atau tag meta HTML).')
                                            ->nullable()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 5: FOTO BANNER HEADER HALAMAN
                        // =========================================================================
                        Tab::make('Banner Header Halaman')
                            ->icon('heroicon-o-photo')
                            ->badge('05')
                            ->schema([
                                Section::make('Banner Latar Header Tiap Halaman')
                                    ->description('Atur gambar latar belakang untuk banner header pada setiap halaman website. Rasio yang disarankan adalah 16:9 atau 21:9.')
                                    ->icon('heroicon-o-rectangle-group')
                                    ->schema([
                                        FileUpload::make('header_about_image')
                                            ->label('Header Halaman Tentang Kami')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_academic_programs_image')
                                            ->label('Header Halaman Kurikulum Akademik')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_academic_facilities_image')
                                            ->label('Header Halaman Fasilitas Bengkel')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_partnership_image')
                                            ->label('Header Halaman Kemitraan Industri')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_alumni_image')
                                            ->label('Header Halaman Alumni')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_gallery_image')
                                            ->label('Header Halaman Galeri')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_news_image')
                                            ->label('Header Halaman Berita & Artikel')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_download_image')
                                            ->label('Header Halaman Unduhan Dokumen')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                        FileUpload::make('header_contact_image')
                                            ->label('Header Halaman Kontak')
                                            ->image()->disk('public')->visibility('public')->directory('headers')->maxSize(3072)->imageEditor(),
                                    ])->columns(3),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(SettingsService $settings): void
    {
        $data = $this->form->getState();

        if (!empty($data['google_site_verification']) && preg_match('/content=["\']([^"\']+)["\']/', $data['google_site_verification'], $matches)) {
            $data['google_site_verification'] = $matches[1];
        }

        foreach ($data as $key => $value) {
            $settings->set($key, $value);
        }

        $this->form->fill($data);

        \Illuminate\Support\Facades\Cache::forget('site_settings');
        \Illuminate\Support\Facades\Cache::forget('homepage:stats:achievements');

        Notification::make()
            ->title('Pengaturan Umum berhasil disimpan')
            ->success()
            ->send();
    }
}
