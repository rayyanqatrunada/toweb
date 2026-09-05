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
    protected static string | \UnitEnum | null $navigationGroup = '3. Publikasi & Informasi';

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(SettingsService $settings): void
    {
        $heroSlidesJson = $settings->get('hero_slides');
        $heroSlides = $heroSlidesJson ? json_decode($heroSlidesJson, true) : [];

        $this->form->fill([
            'hero_slides' => $heroSlides,
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
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
                    ]),
            ])
            ->statePath('data');
    }

    public function save(SettingsService $settings): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            if ($key === 'hero_slides') {
                $value = json_encode($value);
            }
            $settings->set($key, $value);
        }

        Notification::make()
            ->title('Pengaturan Hero Slider berhasil disimpan')
            ->success()
            ->send();
    }
}
