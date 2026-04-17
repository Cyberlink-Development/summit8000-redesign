<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use App\Models\Travels\TripBanner;
use App\Http\Controllers\Controller;

class TripBannerController extends Controller
{
    public function destory($id, $banner_id){
    // dd($banner_id);
        // dd($banner_id);
        $data = TripBanner::find($banner_id);
        $data->delete();
        return back()->with('success','Deleted Sucessfully.');
    }
    public function delete_banner_thumb($id){
        $data = TripBanner::find($id);
        if($data->banner){
               if(file_exists(public_path('uploads/original/' .  $data->banner))){
                   unlink('uploads/original/' . $data->banner);
               }
           }
        $data->banner = NULL;
        $data->save();
        return response('Delete Successful.');
    }
}
