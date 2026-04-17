<?php

namespace App\Http\Controllers\AdminControllers\Inquiry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry\TripTailormadeModel;

class TripTailorMadeController extends Controller
{
    //
      //
      public function index(){
        $tailormade=TripTailormadeModel::orderby('id','desc')->get();
        return view('admin.trip-tailormade.index',compact('tailormade'));
        
    }

//This one is used in TripFilmMaking Model.
    public function destroy($id){
        $del=TripTailormadeModel::findorfail($id);
        if($del->delete())
        {
            return redirect()->back()->with('success',' Deleted  successfully');
        }
    }
}
