<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Travels\RegionModel;
use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use Intervention\Image\Facades\Image;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RegionModel::orderBy('ordering', 'asc')->get();
        return view('admin.regions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = RegionModel::max('ordering');
        $ordering += $ordering + 1;
        $activities = ActivityModel::all();
        return view('admin.regions.create', compact('ordering', 'activities'));
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
            'title' => 'required',
             'uri' => 'required|unique:cl_trip_regions',
        ]);

        $data = $request->all();
        $file = $request->file('banner');
        $banner_name = '';
        if ($request->hasfile('banner')) {

            $banner = $request->file('banner')->getClientOriginalName();
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner = explode('.', $banner);
            $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath = public_path('uploads/banners');

            $banner_picture = Image::make($file->getRealPath());
           
            $banner_picture->save($destinationPath . '/' . $banner_name);

        }
          $icon_file = $request->file('thumbnail');
          $icon_name = '';
          if ($request->hasfile('thumbnail')) {
              $icon = $request->file('thumbnail')->getClientOriginalName();
              $extension = $request->file('thumbnail')->getClientOriginalExtension();
              $icon = explode('.', $icon);
              $icon_name = Str::slug($icon[0]) . '-' . Str::random(40) . '.' . $extension;

              $OdestinationPath = public_path('uploads/original');

              $icon_picture = Image::make($icon_file->getRealPath());
              $width = Image::make($icon_file->getRealPath())->width();
              $height = Image::make($icon_file->getRealPath())->height();
              $icon_picture->save($OdestinationPath . '/' . $icon_name);
          }

        $data['banner'] = $banner_name;
        $data['thumbnail'] = $icon_name;
        $result = RegionModel::create($data);
        $last_id = $result->id;

        return redirect()->back()->with('success', 'Successfully added.');

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
        $data = RegionModel::find($id);
       
        $activities = ActivityModel::all();
        return view('admin.regions.edit', compact('data', 'activities'));
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
            'title' => 'required',
             'uri' => 'required|unique:cl_trip_regions,uri,'.$id,
        ]);

        // return $request;

        $banner_width = env('BANNER_WIDTH');
        $banner_height = env('BANNER_HEIGHT');

        $data = RegionModel::find($id);
        $file = $request->file('banner');
        $banner_name = '';
        if ($request->hasfile('banner')) {          
            if ($data->banner) {
                if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
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

            $banner_picture->save($destinationPath . '/' . $banner_name);

            $data->banner = $banner_name;
        }

        $i_file = $request->file('thumbnail'); 
      $icon_name = '';
      if($request->hasfile('thumbnail')){       
        if($data->thumbnail){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
          }
        }
        $icon = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $icon = explode('.', $icon);
        $icon_name = Str::slug($icon[0]) . '-' . Str::random(40) . '.' . $extension;

        $destinationPath = public_path('uploads/original');
        $icon_picture = Image::make($i_file->getRealPath());
        $icon_picture->save($destinationPath .'/'. $icon_name ); 

        $data->thumbnail = $icon_name;
      }      

        $data->title = $request->title;
        $data->sub_title = $request->sub_title;       
        $data->excerpt = $request->excerpt;
        $data->content = $request->content;
        $data->uri = $request->uri;
        $data->ordering = $request->ordering;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->video = $request->video;

        if ($data->save()) {
            return redirect()->back()->with('success', 'Update Sucessfully.');
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
        $data = RegionModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        $data->delete();
        return 'Are you sure to delete?';
    }
    
      public function filter($id)
    {
        $data = RegionModel::find($id)->trips()->get();
       return view('admin.trips.index', compact('data'));
    }
    
    // Delete Region Banner
    public function delete_region_banner($id)
    {
        $data = RegionModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->banner = null;
        $data->save();
        return response('Delete Successful.');
    }

     public function delete_region_thumb($id)
    {
        $data = RegionModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        $data->thumbnail = null;
        $data->save();
        return response('Delete Successful.');
    }


    // Remove Extention
    private function remove_extention($filename)
    {
        $exp = explode('.', $filename);
        $file = $exp[0];
        return $file;
    }

}