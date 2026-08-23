<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Teacher;
use App\Models\Alumni;
use App\Models\Internship;
use App\Models\Achievement;
use App\Models\JobVacancy;
use App\Models\Announcement;
use App\Models\GalleryAlbum;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalPosts       = Post::count();
        $publishedPosts   = Post::where('status', 'published')->count();
        $totalTeachers    = Teacher::count();
        $totalAlumni      = Alumni::count();
        $totalInternship  = Internship::count();
        $totalAchievement = Achievement::count();
        $totalJobVacancy  = JobVacancy::where('status', 'published')->count();
        $totalAnnouncement = Announcement::count();

        return [
            Stat::make('Total Artikel', $totalPosts)
                ->description($publishedPosts . ' dipublikasikan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info')
                ->icon('heroicon-o-newspaper'),

            Stat::make('Guru & Staff', $totalTeachers)
                ->description('Tenaga pengajar terdaftar')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success')
                ->icon('heroicon-o-academic-cap'),

            Stat::make('Alumni', $totalAlumni)
                ->description('Data alumni terdata')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning')
                ->icon('heroicon-o-users'),

            Stat::make('Program Magang', $totalInternship)
                ->description('Program PKL / magang')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary')
                ->icon('heroicon-o-briefcase'),

            Stat::make('Prestasi', $totalAchievement)
                ->description('Penghargaan & prestasi')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('danger')
                ->icon('heroicon-o-trophy'),

            Stat::make('Lowongan Kerja', $totalJobVacancy)
                ->description('Lowongan aktif / published')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('gray')
                ->icon('heroicon-o-building-office-2'),
        ];
    }
}
