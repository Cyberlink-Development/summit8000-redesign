<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\AdminControllers\Inquiry;

use App\Models\Inquiry\TripInquiryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    

class TripInquiryController extends Controller
{
    //
    public function index(){
        $inquiry=TripInquiryModel::orderby('id','desc')->get();
        return view('admin.trip-inquiry.index',compact('inquiry'));

    }
    public function destroy($id){
        $del=TripInquiryModel::findorfail($id);
        if($del->delete())
        {
            return redirect()->back()->with('success',' Deleted  successfully');
        }
    }
}
