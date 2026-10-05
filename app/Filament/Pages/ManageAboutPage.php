<?php

namespace App\Filament\Pages;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use App\Services\SettingsService;
use Filament\Notifications\Notification;

class ManageAboutPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Halaman Tentang Kami';
    protected static ?string $title = 'Kelola Halaman Tentang Kami';
    protected static string | \UnitEnum | null $navigationGroup = 'Pengaturan Halaman';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $siteName = $settings->get('site_name', 'Teknik dan Bisnis Sepeda Motor');
        $siteShortName = $settings->get('site_short_name', 'TBSM');

        $this->form->fill([
            'header_about_image' => $settings->get('header_about_image'),
            'homepage_about_image' => $settings->get('homepage_about_image'),
            'about_hero_subtitle' => $settings->get('about_hero_subtitle', 'Membangun kompetensi teknis, karakter disiplin, dan kesiapan untuk memimpin di era industri otomotif modern.'),
            'about_focus' => $settings->get('about_focus', 'Teknologi Mekanik & Kendaraan Modern'),
            'about_orientation' => $settings->get('about_orientation', 'Penyaluran Tenaga Kerja & Wirausaha'),
            'profile_history' => $settings->get('profile_history', "<p>Sejarah singkat jurusan {$siteName} ({$siteShortName}) bermula dari dedikasi kami untuk mencetak tenaga kerja profesional. Dengan fasilitas yang terus berkembang, kami selalu berusaha menyesuaikan kurikulum dengan teknologi terkini di dunia otomotif.</p>"),
            'profile_vision' => $settings->get('profile_vision', 'Menjadi program keahlian teknik otomotif terdepan di tingkat nasional yang menghasilkan lulusan berakhlak mulia, kompeten, berdaya saing global, dan berjiwa wirausaha.'),
            'profile_mission' => $settings->get('profile_mission', '<ul><li>Menyelenggarakan pendidikan dan pelatihan kejuruan otomotif berstandar industri Astra Honda Motor.</li><li>Membentuk karakter peserta didik yang disiplin, jujur, dan berbudaya kerja 5R/K3LH.</li><li>Mengembangkan kerjasama kemitraan strategis dengan dunia usaha dan industri secara berkelanjutan.</li><li>Mendorong jiwa inovasi dan kewirausahaan di bidang otomotif modern.</li></ul>'),
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Tabs::make('Pengaturan Halaman Tentang')
                    ->tabs([
                        // =========================================================================
                        // TAB 1: BANNER & FOTO PROFIL
                        // =========================================================================
                        Tab::make('Foto & Banner')
                            ->icon('heroicon-o-photo')
                            ->badge('01')
                            ->schema([
                                Section::make('Gambar Header & Foto Profil Utama')
                                    ->description('Atur gambar latar atas dan foto dokumentasi kegiatan praktik di halaman Tentang Kami.')
                                    ->icon('heroicon-o-camera')
                                    ->schema([
                                        FileUpload::make('header_about_image')
                                            ->label('Gambar Banner Header (Atas)')
                                            ->helperText('Gambar latar di balik judul halaman tentang. Rasio ideal 16:9 atau 21:9.')
                                            ->image()
                                            ->disk('public')
                                            ->visibility('public')
                                            ->directory('headers')
                                            ->maxSize(3072)
                                            ->openable()
                                            ->downloadable()
                                            ->imageEditor(),

                                        FileUpload::make('homepage_about_image')
                                            ->label('Foto Utama Kegiatan Praktik')
                                            ->helperText('Foto besar di samping judul Tentang Jurusan.')
                                            ->image()
                                            ->disk('public')
                                            ->visibility('public')
                                            ->directory('settings')
                                            ->maxSize(4096)
                                            ->openable()
                                            ->downloadable()
                                            ->imageEditor()
                                            ->imageEditorAspectRatios(['16:9', '4:3', '1:1', null]),
                                    ])->columns(2),
                            ]),

                        // =========================================================================
                        // TAB 2: SEJARAH & SAMBUTAN
                        // =========================================================================
                        Tab::make('Sejarah & Profil')
                            ->icon('heroicon-o-book-open')
                            ->badge('02')
                            ->schema([
                                Section::make('Pengantar & Sejarah Singkat Jurusan')
                                    ->description('Teks pengantar di bawah judul dan naskah sejarah perjalanan jurusan.')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Textarea::make('about_hero_subtitle')
                                            ->label('Subjudul Pengantar (Di Bawah Nama Jurusan)')
                                            ->helperText('Ringkasan 1-2 kalimat pengantar.')
                                            ->rows(2)
                                            ->required()
                                            ->columnSpanFull(),

                                        RichEditor::make('profile_history')
                                            ->label('Naskah Sejarah & Perjalanan Jurusan')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 3: VISI & MISI
                        // =========================================================================
                        Tab::make('Visi & Misi')
                            ->icon('heroicon-o-flag')
                            ->badge('03')
                            ->schema([
                                Section::make('Visi & Misi Jurusan')
                                    ->description('Arah strategis dan tujuan pembelajaran kejuruan.')
                                    ->icon('heroicon-o-sparkles')
                                    ->schema([
                                        Textarea::make('profile_vision')
                                            ->label('Visi Jurusan')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        RichEditor::make('profile_mission')
                                            ->label('Misi Jurusan')
                                            ->helperText('Gunakan format daftar poin (bullet points).')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // =========================================================================
                        // TAB 4: FOKUS & ORIENTASI
                        // =========================================================================
                        Tab::make('Fokus & Orientasi')
                            ->icon('heroicon-o-academic-cap')
                            ->badge('04')
                            ->schema([
                                Section::make('Fokus Pembelajaran & Orientasi Lulusan')
                                    ->description('Poin ringkas yang tampil pada sidebar informasi profil.')
                                    ->icon('heroicon-o-clipboard-document-list')
                                    ->schema([
                                        TextInput::make('about_focus')
                                            ->label('Fokus Pendidikan')
                                            ->placeholder('Contoh: Teknologi Mekanik & Kendaraan Modern')
                                            ->required(),

                                        TextInput::make('about_orientation')
                                            ->label('Orientasi Industri')
                                            ->placeholder('Contoh: Penyaluran Tenaga Kerja & Wirausaha')
                                            ->required(),
                                    ])->columns(2),
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
            $settings->set($key, $value);
        }

        $this->form->fill($data);

        \Illuminate\Support\Facades\Cache::forget('site_settings');

        Notification::make()
            ->title('Pengaturan Halaman Tentang Kami berhasil disimpan')
            ->success()
            ->send();
    }
}
