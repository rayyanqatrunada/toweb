<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    protected $settings = null;

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        if ($this->settings === null) {
            $this->settings = Cache::rememberForever('site_settings', function () {
                return Setting::pluck('value', 'key')->toArray();
            });
        }

        return $this->settings[$key] ?? $default;
    }

    /**
     * Update a setting value and clear cache.
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function set(string $key, $value)
    {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget('site_settings');
        $this->settings = null;
    }
}
