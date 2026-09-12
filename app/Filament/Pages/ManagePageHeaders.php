<?php

namespace App\Filament\Pages;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use App\Services\SettingsService;
use Filament\Notifications\Notification;

class ManagePageHeaders extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Foto Header Halaman';
    protected static ?string $title = 'Pengaturan Foto Header Halaman';
    protected static string | \UnitEnum | null $navigationGroup = '5. Pengaturan Sistem';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.manage-page-headers';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $this->form->fill([
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
                Section::make('Profil & Akademik')
                    ->description('Gambar latar untuk halaman Tentang Kami dan Akademik.')
                    ->schema([
                        FileUpload::make('header_about_image')->label('Tentang Kami (About)')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                        FileUpload::make('header_academic_programs_image')->label('Program Keahlian')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                        FileUpload::make('header_academic_facilities_image')->label('Fasilitas')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                    ])->columns(3),

                Section::make('Publikasi & Jejaring')
                    ->description('Gambar latar untuk Galeri, Alumni, dan Kemitraan.')
                    ->schema([
                        FileUpload::make('header_gallery_image')->label('Galeri Dokumentasi')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                        FileUpload::make('header_alumni_image')->label('Jejaring Alumni')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                        FileUpload::make('header_partnership_image')->label('Kemitraan (PKL & BKK)')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                    ])->columns(3),

                Section::make('Informasi Umum')
                    ->description('Gambar latar untuk halaman Berita, Unduhan, dan Kontak.')
                    ->schema([
                        FileUpload::make('header_news_image')->label('Berita & Informasi')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                        FileUpload::make('header_download_image')->label('Pusat Unduhan')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                        FileUpload::make('header_contact_image')->label('Kontak & Lokasi')->image()->directory('headers')->maxSize(2048)->imageEditor(),
                    ])->columns(3),
            ])
            ->statePath('data');
    }

    public function save(SettingsService $settings): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $settings->set($key, $value);
        }

        Notification::make()
            ->title('Pengaturan foto header berhasil disimpan')
            ->success()
            ->send();
    }
}
