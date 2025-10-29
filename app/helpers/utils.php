<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if (!function_exists('getCustomSetting')) {
    function getCustomSetting(string $key, $default = null)
    {
        $settings = Cache::remember('global_settings', 60, function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }
}