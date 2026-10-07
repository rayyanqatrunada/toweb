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
            ->path(env('ADMIN_PANEL_PATH', 'admin'))
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login(\App\Filament\Pages\Auth\Login::class)
            ->profile(\App\Filament\Pages\Auth\EditProfile::class, isSimple: false)
            ->userMenuItems([
                'profile' => fn (\Filament\Actions\Action $action) => $action->label('Profil Saya')->icon('heroicon-o-user-circle'),
            ])
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
            ->brandName(fn () => (app(\App\Services\SettingsService::class)->get('site_short_name', 'TBSM') ?: 'TBSM') . ' Admin')
            ->brandLogo(fn () => view('filament.logo'))
            ->brandLogoHeight('2.5rem')
            ->favicon(function () {
                try {
                    $logo = app(\App\Services\SettingsService::class)->get('site_logo');
                    return ($logo && \Illuminate\Support\Facades\Storage::disk('public')->exists($logo))
                        ? \Illuminate\Support\Facades\Storage::url($logo)
                        : asset('logo.png');
                } catch (\Throwable $e) {
                    return asset('logo.png');
                }
            })
            ->databaseNotifications()
            ->sidebarWidth('15rem')
            ->collapsedSidebarWidth('4rem')
            ->sidebarCollapsibleOnDesktop()
            ->collapsibleNavigationGroups(true)
            ->navigationGroups([
                'Pengaturan Halaman',
                'Akademik & Profil',
                'Kemitraan & Karir',
                'Publikasi & Informasi',
                'Pusat Layanan & Sistem',
            ])
            ->navigationItems([
                \Filament\Navigation\NavigationItem::make('Profil Akun Admin')
                    ->url(fn (): string => route('filament.admin.auth.profile'))
                    ->icon('heroicon-o-user-circle')
                    ->group('Pusat Layanan & Sistem')
                    ->sort(99)
                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.auth.profile')),
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
                \App\Http\Middleware\SecurityHeaders::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
