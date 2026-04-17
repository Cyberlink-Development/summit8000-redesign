<?php

namespace App\Http\Controllers\AdminControllers\Destinations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destinations\DestinationModel;
use App\Models\Destinations\DestinationBannerModel;

class DestinationBannerController extends Controller
{
    public function index($id){
        $data = DestinationModel::find($id);
        $image = DestinationBannerModel::where('banner_id',$data->id)->get();
        // dd($image);
        return view('admin.destinations-banner.banner',compact('data','image'));
    }
    public function store(Request $request){
        // dd($request->all());
        $banner = new DestinationBannerModel();
        $banner->banner_id = $request->banner_id;

        if($request->hasfile('picture')){
            $image = $request->file('picture');
            $name = time().rand(1,50).'.'.$image->extension();
            $image->move(public_path('uploads/original/'),$name);
            $banner->picture = $name;
          
        }
        $banner->save();
        return back()->with('success','Banner added successfully');
    }
    public function delete_banner_destination($id){
        // dd('here');  
        $data = DestinationBannerModel::find($id);
             if ($data->picture) {
                 if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture)) {
                     unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture);
                 }
             }
             $data->picture = null;
             $data->delete();
             return response('Delete Successful.');
      }
}
