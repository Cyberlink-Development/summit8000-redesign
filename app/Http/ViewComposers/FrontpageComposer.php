<?php

namespace App\Http\ViewComposers;

use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityModel;

class FrontpageComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
		$view->with('activity', ActivityModel::all());
		$view->with('default_activity',ActivityModel::where('isdefault','1')->first());		
		
	}
	
}