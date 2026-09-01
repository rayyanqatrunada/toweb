<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\WelcomeWidget;
use App\Filament\Widgets\QuickActionsWidget;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\LatestPostsWidget;
use App\Filament\Widgets\RecentActivityWidget;
use App\Filament\Widgets\WebsiteStatusWidget;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login(\App\Filament\Pages\Auth\Login::class)
            ->colors([
                'primary' => '#DC2626', // TBSM Red
                'gray'    => Color::Zinc,
                'danger'  => Color::Rose,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'info'    => Color::Blue,
            ])
            ->darkMode(false) // Force Light Mode for the custom design system
            ->maxContentWidth('full')
            ->font('Inter')
            ->brandName('TBSM Admin')
            ->brandLogo(fn () => view('filament.logo'))
            ->favicon(asset('logo.png'))
            ->databaseNotifications()
            ->sidebarWidth('14rem')
            ->collapsedSidebarWidth('4rem')
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                '1. Operasional Harian',
                '2. Konten Situasional',
                '3. Master Data & Pengaturan',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->widgets([
                WelcomeWidget::class,
                QuickActionsWidget::class,
                StatsOverview::class,
                LatestPostsWidget::class,
                RecentActivityWidget::class,
                WebsiteStatusWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
