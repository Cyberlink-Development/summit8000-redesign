<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Travels\TripGearModel;
use Image;

class TripGearController extends Controller
{

    private $trip_id;
    private $ordering;

    public function __construct(){
        $this->trip_id = request()->segment(2);
        $ordering = TripGearModel::max('ordering');
        $this->ordering = $ordering + 1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip_id = $this->trip_id;
        $data = TripGearModel::where('trip_id',$trip_id)->get();
        return view('admin.trip-gear.index',compact('data','trip_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trip_id = $this->trip_id;
        $ordering = $this->ordering;
        return view('admin.trip-gear.create',compact('trip_id','ordering'));
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
            'content'=>'required'
        ]);
        $data = $request->all();

        $file =  $request->file('thumbnail');

        $file_name = "";
        if($request->hasfile('thumbnail')){

            $category_file = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $category_file = explode('.', $category_file);
            $file_name = Str::slug( 'icon-'.$category_file[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationOriginal = public_path('uploads/original');
            $pic = Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();

            $pic->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $file_name );
        }

        if(TripGearModel::create($data)){
            return redirect()->back()->with('success','Added Successfully.');
        }
        return redirect()->back()->with('message','Try Again!');
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
    public function edit($trip, $id)
    {
        $data = TripGearModel::find($id);
        $trip_id = $this->trip_id;
        $ordering = $data->ordering;
        return view('admin.trip-gear.edit',compact('data','trip_id','ordering'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip_id, $id)
    {
        $request->validate([
            'thumbnail' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $data = TripGearModel::find($id);
        $file =  $request->file('thumbnail');
         $file_name = '';
        if($request->hasfile('thumbnail')){
            $data = TripGearModel::find($id);
            if($data->thumbnail){
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }
            }
            $category_file = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $category_file = explode('.', $category_file);
            $file_name = Str::slug($category_file[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationOriginal = public_path('uploads/original');


        $product_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();

        /****Upload Original Image****/
        $product_picture->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $file_name );

        $data->thumbnail = $file_name;
        }

        $data->trip_id = $trip_id;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->video = $request->video;
        $data->ordering = $request->ordering;

        if($data->save()){
            return redirect()->back()->with('success','Update Successful.');
        }
        return redirect()->back()->with('message','Try Again!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip_id, $id)
    {
        $data = TripGearModel::find($id);
         if($data->thumbnail  != NULL){
            unlink('uploads/original/' . $data->thumbnail );
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

        // Delete Post Thumbnail
        function delete_gear_thumb(TripGearModel $tripGearModel, $id){
            $data = TripGearModel::find($id);
            if($data->thumbnail){
                   if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                       unlink('uploads/original/' . $data->thumbnail);
                   }
               }
            $data->thumbnail = NULL;
            $data->save();
            return response('Delete Successful.');
       }

    public function gear_thumb_update(Request $request, $id){
        // $request->validate([
        //     'thumbnail' => 'required|mimes:png,jpg,jpeg|max:2048',
        // ]);
        $data = TripGearModel::find($id);
        $file_name =  time() .'-'. $_POST['thumbnail'];

        if($file_name){
            $tripGear = TripGearModel::find($id);
            if($data->thumbnail){
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }
            }
            $destinationPath = public_path('uploads/original') . $file_name;
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $destinationPath);
            // $request->file->move($destinationPath.'/', $file);
            $tripGear->thumbnail = $file_name;
        }
        $tripGear->save();
        return "Thumbnail update success.";

    }

}
