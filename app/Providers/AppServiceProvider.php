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
        
        \App\Models\Setting::observe(\App\Observers\SettingObserver::class);

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
