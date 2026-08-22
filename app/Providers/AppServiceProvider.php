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
        \Illuminate\Database\Eloquent\Model::preventLazyLoading(!app()->isProduction());
        
        \App\Models\Setting::observe(\App\Observers\SettingObserver::class);

        \Illuminate\Support\Facades\View::composer(
            ['frontend.layouts.app', 'components.layouts.app', 'components.footer', 'frontend.home', 'frontend.about'], 
            function ($view) {
                $view->with('settings', app(\App\Services\SettingsService::class));
            }
        );
    }
}
