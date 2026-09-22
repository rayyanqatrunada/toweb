<?php

namespace App\Filament\Pages;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use App\Services\SettingsService;
use Filament\Notifications\Notification;

class ManageHeroSlider extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Hero Slider';
    protected static ?string $title = 'Pengaturan Hero Slider';
    protected static string | \UnitEnum | null $navigationGroup = 'Publikasi & Informasi';
    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

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

        $this->form->fill([
            'hero_slides' => $heroSlides,
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Konten Beranda (Hero Slider)')
                    ->description('Kelola gambar latar, judul, subjudul, dan tombol navigasi untuk slider di halaman depan.')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('hero_slides')
                            ->label('Daftar Slide Hero')
                            ->schema([
                                \Filament\Forms\Components\FileUpload::make('image')
                                    ->label('Gambar Latar')
                                    ->image()
                                    ->disk('public')
                                    ->visibility('public')
                                    ->directory('hero-slides')
                                    ->imagePreviewHeight('280')
                                    ->openable()
                                    ->downloadable()
                                    ->previewable(true)
                                    ->imageEditor()
                                    ->imageEditorMode(2)
                                    ->imageCropAspectRatio('16:9')
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '21:9',
                                        '4:3',
                                        '1:1',
                                        null,
                                    ])
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/avif'])
                                    ->maxSize(5120)
                                    ->helperText('Rasio ideal 16:9 atau 21:9 (Maks. 5MB). Klik ikon pensil untuk crop / atur posisi gambar, ikon mata untuk melihat gambar penuh, atau ikon unduh.')
                                    ->required()
                                    ->columnSpanFull(),

                                TextInput::make('eyebrow')
                                    ->label('Teks Kecil Atas (Eyebrow)')
                                    ->default(fn () => strtoupper(app(\App\Services\SettingsService::class)->get('site_name', 'TEKNIK SEPEDA MOTOR')))
                                    ->required(),

                                TextInput::make('title')
                                    ->label('Judul Utama')
                                    ->required(),

                                Textarea::make('desc')
                                    ->label('Deskripsi Singkat')
                                    ->rows(2)
                                    ->required()
                                    ->columnSpanFull(),

                                TextInput::make('button_primary_text')
                                    ->label('Teks Tombol Utama (Opsional)')
                                    ->placeholder('Contoh: Jelajahi TSM'),

                                TextInput::make('button_primary_url')
                                    ->label('Tautan Tombol Utama (Opsional)')
                                    ->placeholder('Contoh: /tentang'),

                                TextInput::make('button_secondary_text')
                                    ->label('Teks Tombol Kedua (Opsional)')
                                    ->placeholder('Contoh: Program'),

                                TextInput::make('button_secondary_url')
                                    ->label('Tautan Tombol Kedua (Opsional)')
                                    ->placeholder('Contoh: /akademik/program'),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Slide Hero')
                            ->defaultItems(1)
                            ->maxItems(6)
                            ->reorderableWithButtons(),
                    ]),
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
            $settings->set($key, $value);
        }

        \Illuminate\Support\Facades\Cache::forget('site_settings');
        \Illuminate\Support\Facades\Cache::forget('homepage:hero_slides');

        Notification::make()
            ->title('Pengaturan Hero Slider berhasil disimpan')
            ->success()
            ->send();
    }
}
