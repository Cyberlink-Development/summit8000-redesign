<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Settings\SettingModel;
use App\Models\Travels\TripModel;
use App\Models\Posts\PostTypeModel;
use App\Http\Resources\FooterResource;
use Illuminate\Support\Facades\Cache;

class FooterController extends Controller
{
    public function index()
    {
        $data = Cache::remember('footer', 3600, function () {

            $settings = SettingModel::with('seo')->first();

            $trips = TripModel::where('status', 1)
                ->orderBy('ordering')
                ->take(6)
                ->get();

            $pages = PostTypeModel::where('status', 1)
                ->where('is_footer', 1)
                ->orderBy('ordering')
                ->get();

            return (new FooterResource([
                'settings' => $settings,
                'trips' => $trips,
                'pages' => $pages,
            ]))->resolve();
        });

        return response()->json([
            'success' => true,
            'message' => 'Footer fetched successfully',
            'data' => $data,
        ]);
    }
}
