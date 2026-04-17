<?php

namespace App\Http\Controllers;

use App\Model\Subscriber;
use App\Model\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use App\Model\Contact;
use App\Models\Inquiry\BookingModel;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(Request $request)
    {
        $total_posts = PostModel::count();
        $total_trips = TripModel::count();
        $total_inquires = Contact::count();
        $total_booking = BookingModel::count();
         return view('admin.dashboard',compact('total_posts','total_trips','total_inquires','total_booking'));
    }

}
