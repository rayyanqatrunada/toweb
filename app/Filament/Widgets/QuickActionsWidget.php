<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Filament\Resources\Posts\PostResource;
use App\Filament\Resources\Announcements\AnnouncementResource;
use App\Filament\Resources\Achievements\AchievementResource;
use App\Filament\Resources\JobVacancies\JobVacancyResource;
use App\Filament\Resources\Alumnis\AlumniResource;
use App\Filament\Resources\GalleryAlbums\GalleryAlbumResource;

class QuickActionsWidget extends Widget
{
    protected static ?int $sort = -2;
    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.quick-actions';

    protected function getViewData(): array
    {
        return [
            'actions' => [
                [
                    'label' => 'Buat Artikel',
                    'url' => PostResource::getUrl('create'),
                    'icon' => 'heroicon-o-newspaper',
                ],
                [
                    'label' => 'Tambah Pengumuman',
                    'url' => AnnouncementResource::getUrl('create'),
                    'icon' => 'heroicon-o-speaker-wave',
                ],
                [
                    'label' => 'Tambah Prestasi',
                    'url' => AchievementResource::getUrl('create'),
                    'icon' => 'heroicon-o-trophy',
                ],
                [
                    'label' => 'Tambah Lowongan',
                    'url' => JobVacancyResource::getUrl('create'),
                    'icon' => 'heroicon-o-building-office-2',
                ],
                [
                    'label' => 'Tambah Alumni',
                    'url' => AlumniResource::getUrl('create'),
                    'icon' => 'heroicon-o-users',
                ],
                [
                    'label' => 'Kelola Galeri',
                    'url' => GalleryAlbumResource::getUrl('index'),
                    'icon' => 'heroicon-o-photo',
                ],
            ],
        ];
    }
}
