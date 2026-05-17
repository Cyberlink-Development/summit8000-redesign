<?php

namespace App\Services\Settings;

use App\Models\Posts\PostTypeModel;
use App\Models\Settings\SettingModel;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    public function getSettings(): array
    {
        return Cache::remember('settings', 3600, function () {
            $settings = SettingModel::with('seo')->first();

            $menus = PostTypeModel::where('status', 1)
                ->where('is_menu', 1)
                ->orderBy('ordering')
                ->get();

            $pages = PostTypeModel::where('status', 1)
                ->where('is_footer', 1)
                ->orderBy('ordering')
                ->get();

            return [
                'settings' => $settings,
                'menus'    => $menus,
                'pages'    => $pages,
            ];
        });
    }
}