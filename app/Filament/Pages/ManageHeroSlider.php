<?php

namespace App\Filament\Pages;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use App\Services\SettingsService;
use Filament\Notifications\Notification;

class ManageHeroSlider extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Halaman Beranda';
    protected static ?string $title = 'Kelola Halaman Beranda';
    protected static string | \UnitEnum | null $navigationGroup = 'Pengaturan Halaman';
    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public static function getDefaultFaqs(): array
    {
        return [
            [
                'question' => 'Apa saja keunggulan utama jurusan TBSM SMKN 1 Bangsri dibandingkan sekolah lain?',
                'answer' => 'Konsentrasi keahlian Teknik dan Bisnis Sepeda Motor (TBSM) SMKN 1 Bangsri merupakan sekolah binaan resmi PT Astra Honda Motor (AHM) dengan status Pos Teaching Factory (Tefa). Kurikulum diselaraskan langsung dengan standar Astra Motor Technical Center (AMTC), menggunakan peralatan praktik bengkel resmi AHASS, serta dibimbing oleh guru dan instruktur tersertifikasi industri.',
                'badge' => 'Keunggulan',
                'is_active' => true,
            ],
            [
                'question' => 'Di mana siswa melaksanakan Praktik Kerja Lapangan (PKL) dan berapa lama durasinya?',
                'answer' => 'Siswa melaksanakan PKL selama 6 bulan penuh di jaringan Bengkel Resmi Honda (AHASS) mitra terkemuka di wilayah Jepara, Kudus, Pati, dan sekitarnya. Selama PKL, siswa terlibat langsung dalam penanganan servis berkala, overhaul mesin, kelistrikan, dan diagnosis scanner injeksi PGM-FI bersama mekanik profesional AHASS.',
                'badge' => 'PKL & Magang',
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana peluang kerja lulusan TBSM SMKN 1 Bangsri setelah tamat?',
                'answer' => 'Lulusan memiliki prospek karir luas sebagai Teknisi Ahli AHASS, Service Advisor (SA), Partsman, operator industri perakitan otomotif, mekanik balap, hingga wirausahawan bengkel mandiri. Sekolah memiliki Bursa Kerja Khusus (BKK) aktif yang rutin mengadakan rekrutmen kerja langsung bersama industri mitra.',
                'badge' => 'Peluang Karir',
                'is_active' => true,
            ],
            [
                'question' => 'Sertifikasi apa saja yang akan diperoleh siswa selama masa studi?',
                'answer' => 'Setiap lulusan dibekali sertifikat kompetensi resmi berstandar SKKNI dari Badan Nasional Sertifikasi Profesi (BNSP) melalui LSP-P1 SMKN 1 Bangsri, sertifikat pelatihan teknis dari PT Astra Honda Motor, serta sertifikat Uji Kompetensi Keahlian (UKK) yang diuji langsung oleh instruktur eksternal industri.',
                'badge' => 'Sertifikasi',
                'is_active' => true,
            ],
            [
                'question' => 'Fasilitas praktik apa saja yang tersedia di bengkel otomotif sekolah?',
                'answer' => 'Bengkel TBSM dilengkapi dengan 6 Stall Servis Hidrolik (Bike Lift) standar AHASS, Honda Injection Diagnostic System (HIDS Scanner), Engine Overhaul Stand berputar, Tyre Changer hidrolik, Wheel Balancer presisi, Exhaust Gas Analyzer, serta unit simulator kelistrikan dan sistem injeksi modern.',
                'badge' => 'Fasilitas',
                'is_active' => true,
            ],
            [
                'question' => 'Apakah jurusan TBSM terbuka untuk siswa perempuan?',
                'answer' => 'Ya, jurusan TBSM SMKN 1 Bangsri terbuka bagi seluruh calon siswa putra maupun putri. Di industri otomotif modern, terbuka banyak peluang karir seperti Service Advisor (front desk bengkel), Parts Inventory Controller, Quality Control, hingga manajemen layanan servis yang sangat cocok untuk siswa putri.',
                'badge' => 'Pendaftaran',
                'is_active' => true,
            ],
        ];
    }

    public function mount(SettingsService $settings): void
    {
        $heroSlidesJson = $settings->get('hero_slides');
        $heroSlides = $heroSlidesJson ? json_decode($heroSlidesJson, true) : [];

        if (empty($heroSlides)) {
            $siteName = $settings->get('site_name', 'Teknik Sepeda Motor');
            $siteShortName = $settings->get('site_short_name', 'TSM');
            $heroSlides = [
                [
                    'image' => 'hero-slides/slide-1.jpg',
                    'eyebrow' => strtoupper($siteName),
                    'title' => 'Menyiapkan Generasi Profesional di Dunia Otomotif',
                    'desc' => 'Program keahlian yang membekali peserta didik dengan kompetensi teknis dan profesional di bidang sepeda motor serta kesiapan dunia kerja.',
                    'button_primary_text' => 'Jelajahi ' . $siteShortName,
                    'button_primary_url' => '/tentang',
                    'button_secondary_text' => 'Program',
                    'button_secondary_url' => '/akademik/program',
                ],
                [
                    'image' => 'hero-slides/slide-2.jpg',
                    'eyebrow' => 'FASILITAS STANDAR INDUSTRI',
                    'title' => 'Pusat Keunggulan Vokasi Otomotif',
                    'desc' => 'Menggunakan fasilitas laboratorium yang dirancang menyerupai lingkungan kerja industri otomotif sesungguhnya untuk pengalaman belajar maksimal.',
                    'button_primary_text' => 'Lihat Fasilitas',
                    'button_primary_url' => '/akademik/fasilitas',
                    'button_secondary_text' => 'Kemitraan Industri',
                    'button_secondary_url' => '/mitra-industri',
                ],
            ];
        }

        $faqsJson = $settings->get('homepage_faqs');
        $faqs = $faqsJson ? json_decode($faqsJson, true) : [];
        if (empty($faqs)) {
            $faqs = static::getDefaultFaqs();
        }

        $this->form->fill([
            'hero_slides' => $heroSlides,
            'head_quote' => $settings->get('head_quote', 'Teknologi otomotif terus melaju kencang. Misi kami adalah membekali setiap siswa dengan keterampilan teknis presisi, integritas tinggi, dan etos kerja industri kelas dunia agar siap menjadi teknisi andal dan profesional masa depan.'),
            'youtube_video_id' => $settings->get('youtube_video_id', 'dQw4w9WgXcQ'),
            'faq_badge' => $settings->get('faq_badge', 'TANYA JAWAB UMUM'),
            'faq_title' => $settings->get('faq_title', 'Pertanyaan yang Sering Diajukan'),
            'faq_subtitle' => $settings->get('faq_subtitle', 'Temukan jawaban lengkap seputar kurikulum, fasilitas praktik, kemitraan Astra Honda Motor, dan prospek karir di TBSM SMKN 1 Bangsri.'),
            'homepage_faqs' => $faqs,
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Tabs::make('Pengaturan Beranda')
                    ->tabs([
                        // =========================================================================
                        // TAB 1: HERO SLIDER
                        // =========================================================================
                        Tab::make('Hero Slider Beranda')
                            ->icon('heroicon-o-photo')
                            ->badge('01')
                            ->schema([
                                Section::make('Daftar Slide Banner Beranda')
                                    ->description('Kelola gambar latar, judul, subjudul, dan tombol navigasi untuk slider banner utama di halaman depan.')
                                    ->icon('heroicon-o-presentation-chart-bar')
                                    ->schema([
                                        Repeater::make('hero_slides')
                                            ->label('Slide Hero Aktif')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Gambar Latar Slide')
                                                    ->image()
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->directory('hero-slides')
                                                    ->imagePreviewHeight('240')
                                                    ->openable()
                                                    ->downloadable()
                                                    ->previewable(true)
                                                    ->imageEditor()
                                                    ->imageEditorAspectRatios([
                                                        '16:9',
                                                        '21:9',
                                                        '4:3',
                                                        null,
                                                    ])
                                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/avif'])
                                                    ->maxSize(5120)
                                                    ->helperText('Rasio ideal 16:9 atau 21:9 (Maks. 5MB).')
                                                    ->required()
                                                    ->columnSpanFull(),

                                                TextInput::make('eyebrow')
                                                    ->label('Teks Label Atas (Eyebrow)')
                                                    ->placeholder('Contoh: TEKNIK DAN BISNIS SEPEDA MOTOR')
                                                    ->required(),

                                                TextInput::make('title')
                                                    ->label('Judul Utama Slide')
                                                    ->placeholder('Contoh: Menyiapkan Generasi Profesional di Dunia Otomotif')
                                                    ->required(),

                                                Textarea::make('desc')
                                                    ->label('Deskripsi Ringkas')
                                                    ->rows(2)
                                                    ->required()
                                                    ->columnSpanFull(),

                                                TextInput::make('button_primary_text')
                                                    ->label('Teks Tombol Utama')
                                                    ->placeholder('Contoh: Jelajahi TBSM'),

                                                TextInput::make('button_primary_url')
                                                    ->label('Tautan Tombol Utama')
                                                    ->placeholder('Contoh: /tentang'),

                                                TextInput::make('button_secondary_text')
                                                    ->label('Teks Tombol Kedua')
                                                    ->placeholder('Contoh: Program Keahlian'),

                                                TextInput::make('button_secondary_url')
                                                    ->label('Tautan Tombol Kedua')
                                                    ->placeholder('Contoh: /akademik/program'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Slide Hero')
                                            ->defaultItems(1)
                                            ->maxItems(6)
                                            ->reorderableWithButtons(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 2: SAMBUTAN & VIDEO PROFIL
                        // =========================================================================
                        Tab::make('Sambutan & Video')
                            ->icon('heroicon-o-video-camera')
                            ->badge('02')
                            ->schema([
                                Section::make('Kutipan Sambutan & Video Profil')
                                    ->description('Kutipan Kepala Jurusan dan ID Video YouTube profil yang disematkan di section pengantar beranda.')
                                    ->icon('heroicon-o-sparkles')
                                    ->schema([
                                        Textarea::make('head_quote')
                                            ->label('Kutipan Sambutan Kepala Jurusan')
                                            ->helperText('Pesan inspiratif yang tampil di section pengantar beranda.')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        TextInput::make('youtube_video_id')
                                            ->label('ID Video YouTube Profil Beranda')
                                            ->helperText('Contoh: dQw4w9WgXcQ (diambil dari https://www.youtube.com/watch?v=dQw4w9WgXcQ)')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 3: TANYA JAWAB (FAQ)
                        // =========================================================================
                        Tab::make('Tanya Jawab (FAQ)')
                            ->icon('heroicon-o-question-mark-circle')
                            ->badge('03')
                            ->schema([
                                Section::make('Header Bagian FAQ')
                                    ->description('Atur badge label, judul utama, dan subjudul pada section FAQ di bagian bawah beranda.')
                                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                                    ->schema([
                                        TextInput::make('faq_badge')
                                            ->label('Badge Label Atas')
                                            ->placeholder('Contoh: TANYA JAWAB UMUM')
                                            ->required(),
                                        TextInput::make('faq_title')
                                            ->label('Judul Utama FAQ')
                                            ->placeholder('Contoh: Pertanyaan yang Sering Diajukan')
                                            ->required(),
                                        Textarea::make('faq_subtitle')
                                            ->label('Deskripsi / Subjudul FAQ')
                                            ->rows(2)
                                            ->required()
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Section::make('Daftar Pertanyaan & Jawaban')
                                    ->description('Tambah, ubah, urutkan, atau nonaktifkan pertanyaan yang tampil pada accordion FAQ di beranda.')
                                    ->icon('heroicon-o-queue-list')
                                    ->schema([
                                        Repeater::make('homepage_faqs')
                                            ->label('Daftar Pertanyaan FAQ')
                                            ->schema([
                                                TextInput::make('question')
                                                    ->label('Pertanyaan')
                                                    ->placeholder('Contoh: Apa keunggulan jurusan TBSM SMKN 1 Bangsri?')
                                                    ->required()
                                                    ->columnSpanFull(),
                                                Textarea::make('answer')
                                                    ->label('Jawaban')
                                                    ->placeholder('Tuliskan jawaban lengkap dan jelas...')
                                                    ->rows(3)
                                                    ->required()
                                                    ->columnSpanFull(),
                                                TextInput::make('badge')
                                                    ->label('Kategori / Tag (Opsional)')
                                                    ->placeholder('Contoh: Keunggulan, PKL & Magang, Peluang Karir'),
                                                Toggle::make('is_active')
                                                    ->label('Tampilkan di Website')
                                                    ->default(true)
                                                    ->inline(false),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['question'] ?? 'Item FAQ')
                                            ->defaultItems(1)
                                            ->reorderableWithButtons(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(SettingsService $settings): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            if ($key === 'hero_slides') {
                $value = json_encode(array_values($value ?? []));
            }
            if ($key === 'homepage_faqs') {
                $value = json_encode(array_values($value ?? []));
            }
            $settings->set($key, $value);
        }

        $this->form->fill($data);

        \Illuminate\Support\Facades\Cache::forget('site_settings');
        \Illuminate\Support\Facades\Cache::forget('homepage:hero_slides');
        \Illuminate\Support\Facades\Cache::forget('homepage:faqs');

        Notification::make()
            ->title('Pengaturan Halaman Beranda & FAQ berhasil disimpan')
            ->success()
            ->send();
    }
}
