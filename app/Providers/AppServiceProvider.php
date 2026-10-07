<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\SettingsService::class, function ($app) {
            return new \App\Services\SettingsService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->isProduction() || str_starts_with(config('app.url'), 'https://') || request()->header('x-forwarded-proto') === 'https') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        \Illuminate\Database\Eloquent\Model::preventLazyLoading(!app()->isProduction());

        // Otomatis rekam IP Address & User Agent pada setiap Activity Log
        \Spatie\Activitylog\Models\Activity::saving(function (\Spatie\Activitylog\Models\Activity $activity): void {
            try {
                if (app()->bound('request') && request()) {
                    $ip = request()->header('CF-Connecting-IP')
                        ?? request()->header('X-Forwarded-For')
                        ?? request()->ip();

                    if (!empty($ip) && (!app()->runningInConsole() || request()->server('REMOTE_ADDR'))) {
                        $props = $activity->properties ?? collect();
                        if (is_array($props)) {
                            $props = collect($props);
                        }

                        if (str_contains($ip, ',')) {
                            $ip = trim(explode(',', $ip)[0]);
                        }

                        $activity->properties = $props->merge([
                            'ip' => $ip,
                            'user_agent' => request()->userAgent() ?: 'Browser/Unknown',
                        ]);
                    }
                }
            } catch (\Throwable $e) {
                // Jangan gagalkan proses jika ada kendala saat membaca request
            }
        });

        \Filament\Forms\Components\FileUpload::configureUsing(function (\Filament\Forms\Components\FileUpload $component): void {
            // Default: simpan ke disk 'public' (public/storage/) agar bisa diakses via URL
            // Ini penting untuk shared hosting yang tidak support symlink
            $component->disk('public')->visibility('public');

            $component->beforeStateDehydrated(function (\Filament\Forms\Components\FileUpload $component): void {
                $component->saveUploadedFiles();

                if (! $component->isMultiple()) {
                    $rawState = $component->getRawState();
                    if (is_array($rawState)) {
                        $filtered = array_values(array_filter($rawState, fn ($item) => filled($item)));
                        if (count($filtered) > 1) {
                            $component->rawState([\Illuminate\Support\Arr::last($filtered)]);
                        }
                    }
                }
            }, shouldUpdateValidatedStateAfter: true);
        });

        \Illuminate\Support\Facades\View::composer(
            ['frontend.*', 'components.*'], 
            function ($view) {
                $view->with('settings', app(\App\Services\SettingsService::class));
            }
        );
    }
}
