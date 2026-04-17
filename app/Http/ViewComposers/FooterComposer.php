<?php

namespace App\Http\ViewComposers;

use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use App\Models\Travels\RegionModel;
use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityModel;
use App\Models\Destinations\DestinationModel;
use App\Models\Posts\PostImageModel;
use App\Models\Posts\PostTypeModel;
use App\Models\HomeBrief\HomeBriefModel;

class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('best_sellers', TripModel::where(['trip_of_the_month' => '1', 'status' => '1'])->orderBy('ordering', 'asc')->take('8')->get());
		$view->with('luxury_tirps', TripModel::where(['video_status' => '1', 'status' => '1'])->orderBy('ordering', 'asc')->take('8')->get());
        $view->with('footer', PostTypeModel::where(['is_footer' => '0'])->orderBy('ordering', 'asc')->get());
        $view->with('ttk', PostTypeModel::where(['is_footer' => '1'])->orderBy('ordering', 'asc')->get());
        $view->with('homebrief', HomeBriefModel::where('id',1)->first());

	}
}
