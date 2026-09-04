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

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Pengaturan Web';
    protected static ?string $title = 'Pengaturan Website';
    protected static string | \UnitEnum | null $navigationGroup = '5. Pengaturan Sistem';

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $heroSlidesJson = $settings->get('hero_slides');
        $heroSlides = $heroSlidesJson ? json_decode($heroSlidesJson, true) : [];

        $this->form->fill([
            'site_name' => $settings->get('site_name'),
            'site_tagline' => $settings->get('site_tagline'),
            'site_description' => $settings->get('site_description'),
            'site_logo' => $settings->get('site_logo'),
            'hero_slides' => $heroSlides,
            'head_quote' => $settings->get('head_quote'),
            'youtube_video_id' => $settings->get('youtube_video_id'),
            'social_youtube' => $settings->get('social_youtube'),
            'social_instagram' => $settings->get('social_instagram'),
            'social_facebook' => $settings->get('social_facebook'),
            'contact_address' => $settings->get('contact_address'),
            'contact_phone' => $settings->get('contact_phone'),
            'contact_email' => $settings->get('contact_email'),
            'contact_operating_hours' => $settings->get('contact_operating_hours', 'Senin - Jumat: 07:00 - 15:30 WIB'),
            'contact_map_embed' => $settings->get('contact_map_embed'),
            'profile_history' => $settings->get('profile_history', 'Sejarah singkat jurusan Teknik dan Bisnis Sepeda Motor (TBSM) bermula dari...'),
            'profile_vision' => $settings->get('profile_vision', 'Menjadi program studi otomotif terdepan di tingkat nasional.'),
            'profile_mission' => $settings->get('profile_mission', '<ul><li>Menyelenggarakan pendidikan berkualitas...</li></ul>'),
            'homepage_about_image' => $settings->get('homepage_about_image'),
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Identitas Website')
                    ->description('Pengaturan dasar website dan SEO.')
                    ->schema([
                        TextInput::make('site_name')->label('Nama Website')->required(),
                        TextInput::make('site_tagline')->label('Tagline Singkat')->required(),
                        Textarea::make('site_description')->label('Deskripsi Website (SEO & Footer)')->required()->rows(3),
                        \Filament\Forms\Components\FileUpload::make('site_logo')->label('Logo Website')->image()->directory('settings')->maxSize(2048),
                    ]),

                Section::make('Konten Beranda (Hero Slider)')
                    ->description('Atur gambar latar, judul, dan subjudul untuk slider di halaman depan.')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('hero_slides')
                            ->label('Slide Hero')
                            ->schema([
                                \Filament\Forms\Components\FileUpload::make('image')
                                    ->label('Gambar Latar')
                                    ->image()
                                    ->directory('hero-slides')
                                    ->required()
                                    ->maxSize(5120),
                                TextInput::make('eyebrow')
                                    ->label('Teks Kecil Atas (Eyebrow)')
                                    ->default('TEKNIK DAN BISNIS SEPEDA MOTOR')
                                    ->required(),
                                TextInput::make('title')
                                    ->label('Judul Utama')
                                    ->required(),
                                Textarea::make('desc')
                                    ->label('Deskripsi Singkat')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->defaultItems(1)
                            ->maxItems(5)
                            ->reorderableWithButtons(),
                            
                        Textarea::make('head_quote')->label('Kutipan Kepala Jurusan')->required()->rows(2),
                    ]),
                
                Section::make('Profil Jurusan (Tentang Kami)')
                    ->description('Konten untuk halaman Profil/Tentang Kami.')
                    ->schema([
                        \Filament\Forms\Components\FileUpload::make('homepage_about_image')->label('Gambar Tentang Kami (Beranda)')->image()->directory('settings')->maxSize(2048),
                        \Filament\Forms\Components\RichEditor::make('profile_history')->label('Sejarah Singkat')->required(),
                        Textarea::make('profile_vision')->label('Visi Jurusan')->required()->rows(3),
                        \Filament\Forms\Components\RichEditor::make('profile_mission')->label('Misi Jurusan')->required(),
                    ]),
                
                Section::make('Informasi Kontak')
                    ->description('Alamat, Email, Telepon, jam operasional, dan peta Google Maps.')
                    ->schema([
                        TextInput::make('contact_address')->label('Alamat Lengkap')->required(),
                        TextInput::make('contact_phone')->label('Nomor Telepon/WA')->required(),
                        TextInput::make('contact_email')->label('Email')->email()->required(),
                        TextInput::make('contact_operating_hours')->label('Jam Operasional')->required()->default('Senin - Jumat: 07:00 - 15:30 WIB'),
                        Textarea::make('contact_map_embed')->label('Kode Embed Google Maps')->helperText('Buka Google Maps > Cari Lokasi > Klik "Share" (Bagikan) > Pilih tab "Embed a map" (Sematkan peta) > Klik "Copy HTML". Lalu paste seluruh kodenya di sini.')->rows(3),
                    ]),

                Section::make('Media Sosial & YouTube')
                    ->description('Tautan ke profil sosial media jurusan.')
                    ->schema([
                        TextInput::make('social_youtube')->label('Link YouTube Channel')->url(),
                        TextInput::make('social_instagram')->label('Link Instagram')->url(),
                        TextInput::make('social_facebook')->label('Link Facebook')->url(),
                        TextInput::make('youtube_video_id')->label('ID Video YouTube (Home)')->helperText('Contoh: dQw4w9WgXcQ (diambil dari https://www.youtube.com/watch?v=dQw4w9WgXcQ)')->required(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(SettingsService $settings): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            // Encode the repeater array to JSON
            if ($key === 'hero_slides') {
                $value = json_encode($value);
            }
            $settings->set($key, $value);
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}
