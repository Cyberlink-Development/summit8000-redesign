<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostTypeModel;
use App\Http\Resources\HeaderResource;
use App\Http\Resources\FooterResource;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index()
    {
        $data = Cache::remember('settings', 3600, function () {

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
                'data' => [
                    'site_name' => $settings->site_name,

                    'header' => (new HeaderResource([
                        'menus' => $menus,
                        'settings' => $settings
                    ]))->resolve(),

                    'footer' => (new FooterResource([
                        'settings' => $settings,
                        'pages' => $pages
                    ]))->resolve(),

                    'seo' => \App\DTO\Common\SeoDTO::fromModel($settings),
                ],

                'meta' => [],
            ];
        });

        return $this->successResponse(
            $data,
            'Settings fetched successfully'
        );
    }
}
