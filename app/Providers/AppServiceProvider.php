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

        \Illuminate\Support\Facades\View::composer(
            ['frontend.*', 'components.*'], 
            function ($view) {
                $view->with('settings', app(\App\Services\SettingsService::class));
            }
        );
    }
}
