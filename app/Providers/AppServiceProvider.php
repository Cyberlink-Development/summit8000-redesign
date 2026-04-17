<?php

namespace App\Providers;

use App\Models\Destinations\DestinationModel;
use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\RegionModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = SettingModel::where('id', 1)->first();
        $company = PostModel::where(['post_type' => 1, 'post_parent' => 0])->get();
        $expeditions = DestinationModel::get();
        $regions = RegionModel::get();
        $partners = PostModel::where('post_type', 6)->get();
        $footers = PostModel::where('post_type', 7)->get();
        $popular = TripModel::Where('visiter','>',0)->orderBy('visiter','desc')->limit(5)->get();
        View::share(['setting' => $setting, 'company' => $company, 'expeditions' => $expeditions, 
        'regions' => $regions, 'partners' => $partners, 'footers' => $footers,'popular'=>$popular]);
    }
}
