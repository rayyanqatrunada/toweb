<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Teacher;
use App\Models\Alumni;
use App\Models\Achievement;
use App\Models\JobVacancy;
use App\Models\Announcement;
use App\Models\GalleryAlbum;
use App\Models\Program;
use App\Models\IndustryPartner;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = -1;

    protected function getStats(): array
    {
        // Aggregate post stats in a single query
        $postStats = Post::query()
            ->selectRaw('COUNT(*) as total')
            ->selectRaw("SUM(CASE WHEN status = 'published' THEN 1 ELSE 0 END) as published")
            ->selectRaw("SUM(CASE WHEN status = 'draft' THEN 1 ELSE 0 END) as draft")
            ->first();

        // Batch count other models — 1 query per model but only COUNT
        $totalTeachers    = Teacher::count();
        $totalAlumni      = Alumni::count();
        $totalAchievement = Achievement::count();
        $activeJobs       = JobVacancy::where('status', 'published')->count();
        $totalPrograms    = Program::count();
        $totalPartners    = IndustryPartner::count();
        $activeAnnouncements = Announcement::where('is_active', true)->count();
        $totalGallery     = GalleryAlbum::count();

        return [
            Stat::make('Artikel', $postStats->total)
                ->description($postStats->published . ' dipublikasikan, ' . $postStats->draft . ' draft')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('primary')
                ->icon('heroicon-o-newspaper'),

            Stat::make('Pengumuman', $activeAnnouncements)
                ->description('Pengumuman aktif')
                ->descriptionIcon('heroicon-m-speaker-wave')
                ->color('info')
                ->icon('heroicon-o-speaker-wave'),

            Stat::make('Prestasi', $totalAchievement)
                ->description('Penghargaan & prestasi')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('warning')
                ->icon('heroicon-o-trophy'),

            Stat::make('Alumni', $totalAlumni)
                ->description('Alumni terdata')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->icon('heroicon-o-users'),

            Stat::make('Lowongan Aktif', $activeJobs)
                ->description('Lowongan published')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info')
                ->icon('heroicon-o-building-office-2'),

            Stat::make('Galeri', $totalGallery)
                ->description('Album galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success')
                ->icon('heroicon-o-photo'),

            Stat::make('Guru & Staff', $totalTeachers)
                ->description('Tenaga pengajar')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('gray')
                ->icon('heroicon-o-academic-cap'),

            Stat::make('Program', $totalPrograms)
                ->description('Program keahlian')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('gray')
                ->icon('heroicon-o-book-open'),
        ];
    }
}

