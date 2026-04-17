<?php
namespace App\Http\Controllers\AdminControllers\Inquiry;

use App\Http\Controllers\Controller;
use App\Models\Inquiry\TripFilmMakingModel;
use Illuminate\Http\Request;

class TripFilmMakingController extends Controller
{
    //

    public function index()
    {
        $filmmaking = TripFilmMakingModel::orderBy('id','desc')->get();
        return view('admin.trip-filmmaking.index',compact('filmmaking'));
    }

    public function show($id){
        // 
    }

    public function destroy($id){
        $del=TripFilmMakingModel::findorfail($id);
        if($del->delete())
        {
            return redirect()->back()->with('success',' Deleted  successfully');
        }
    }
}

