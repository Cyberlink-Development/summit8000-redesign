<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Travels\TripGroupModel;
use Image;

class TripGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TripGroupModel::orderBy('id','desc')->get();
        return view('admin.tripgroups.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = 0;
        $ord = TripGroupModel::max('ordering');
        $ordering += $ord + 1;
        return view('admin.tripgroups.create', compact('ordering'));
      // return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'title'=>'required',
        'uri' => 'required|unique:cl_trip_groups',       
        ]);

        $data = $request->all();
        $file =  $request->file('banner');
        $banner_name = '';
        if($request->hasfile('banner')){

        $banner = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $banner = explode('.', $banner);
        $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/banners');

        $banner_picture = Image::make($file->getRealPath());
      
        $banner_picture->save($destinationPath .'/'. $banner_name ); 

      }
      $data['uri'] = Str::slug($request->uri);    
      $data['banner'] = $banner_name;     
      $result = TripGroupModel::create($data);

      return redirect()->back()->with('success','Successfully added.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TripGroupModel::find($id);
        return view('admin.tripgroups.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=>'required',
         'uri' => 'required|unique:cl_trip_groups,uri,'.$id, 
      ]); 

      $data = TripGroupModel::find($id);  
      $file = $request->file('banner'); 
      $banner_name = '';
      if($request->hasfile('banner')){
        $data = TripGroupModel::find($id); 
        if($data->banner){
          if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
            unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
          }
        }
        $banner = $request->file('banner')->getClientOriginalName();
        $extension = $request->file('banner')->getClientOriginalExtension();
        $banner = explode('.', $banner);
        $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/banners');

        $banner_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();    

        $banner_picture->save($destinationPath .'/'. $banner_name ); 

        $data->banner = $banner_name;
      }    
         
      $data->title = $request->title;
      $data->sub_title = $request->sub_title;      
      $data->content = $request->content;
      $data->excerpt = $request->excerpt;
      $data->uri = Str::slug($request->uri);    
      $data->ordering = $request->ordering;            
      $data->meta_keyword = $request->meta_keyword;
      $data->meta_description = $request->meta_description;
     
      if($data->save()){
        return redirect()->back()->with('success','Update Sucessfully.');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TripGroupModel::find($id);
        if($data->banner){
        if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
          unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
        }
      }
      $data->delete();
      return 'Are you sure to delete?';
    }

     // Delete banner
     function delete_tripgroup_thumb(TripGroupModel $tripGroupModel, $id){
      $data = TripGroupModel::find($id);
      if($data->banner){
       if(file_exists(env('PUBLIC_PATH').'uploads/banners/' . $data->banner)){
         unlink(env('PUBLIC_PATH').'uploads/banners/' . $data->banner);
       }      
     }
     $data->banner = NULL;
     $data->save();
     return response('Delete Successful.');
   }
}
