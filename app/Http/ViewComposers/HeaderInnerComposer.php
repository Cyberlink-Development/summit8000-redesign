<?php

namespace App\Http\ViewComposers;

use App\Models\Travels\TripModel;
use App\Models\Posts\PostTypeModel;
use Illuminate\Contracts\View\view;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripGroupModel;
use App\Models\Destinations\DestinationModel;

class HeaderInnerComposer
{

	public function __construct()
	{
		// Dependencies automatically resolved by service container...
	}

	public function compose(View $view)
	{

		$view->with('navigations', PostTypeModel::where(['is_menu' => '1'])
			->orderBy('ordering', 'asc')
			->get());
		$view->with('contact_us', PostTypeModel::where(['is_menu' => '1'])->where(['id' => '26'])->first());
		$view->with('destinations', DestinationModel::orderBy('ordering', 'asc')->get());
		$view->with('activities', ActivityModel::where('activity_parent', 'Category')->orderBy('ordering', 'asc')->get());
		$view->with('experience', ActivityModel::where('activity_parent', 'Experience')->orderBy('ordering', 'asc')->get());
		$view->with('random_tour', TripModel::where('status', '1')->inRandomOrder()->first());
		$view->with('luxury_trip', TripGroupModel::find(3)->trips()->where('status', '1')->orderBy('ordering', 'asc')->paginate(4));
	}
}
