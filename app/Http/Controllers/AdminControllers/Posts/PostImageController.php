<?php

namespace App\Http\Controllers\AdminControllers\Posts;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts\PostImageModel;
use Validator;
use Image;

class PostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'file_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072|dimensions:max_width=2500,max_height=2000',
        ]);

        $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');

        $req = $request->all();
        $file =  $request->file('file_image');

        if($request->hasfile('file_image')){
            $_file = $request->file('file_image')->getClientOriginalName();
            $extension = $request->file('file_image')->getClientOriginalExtension();
            $_file = explode('.', $_file);            
            $file_name = Str::slug($_file[0]) . '-' . Str::random(40) . '.' . $extension;
            $destinationPath_medium = public_path('uploads/medium');
            $thumbanil_picture = Image::make($file->getRealPath());
            $thumbanil_picture->save($destinationPath_medium .'/'. $file_name );           
        }
        
        $req['post_id'] = $request->post_id;
        $req['file_name'] = $file_name;
        $req['title'] = $request->title;
        $data = PostImageModel::create($req);

        return redirect()->back()->with('message','Image Upload Successful');
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
    public function edit($post_id, $id)
    {
        $data = PostImageModel::where('id',$id)->first();
        return view('admin.multiple-photo.edit', compact('id','data'));
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
        $req = PostImageModel::find($id);
        $post_id = $req->post_id;
         $data = PostImageModel::where('post_id',$post_id)->get();
        $document = "";
        
          if($request->hasfile('file_name')){

            $req = PostImageModel::find($id);
         
             if(file_exists(public_path('uploads/medium/' .  $req->file_name))){
                unlink('uploads/medium/' . $req->file_name);
            }
          

            $doc = $request->file('file_name')->getClientOriginalName();
            $extension = $request->file('file_name')->getClientOriginalExtension();
            $doc = explode('.', $doc);
            $document = Str::slug($doc[0]) . '-' . uniqid() . '.' . $extension;
            $request->file('file_name')->move( public_path('uploads/medium/'), $document);

        $req->file_name = $document;
    } 

    $req->title = $request->title;

    if($req->save()){
         return redirect()->route('admin.multiplephoto',compact('post_id','data'))->with('message','Update Sucessful.');
    }else{
        return "Error";
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
        $data = PostImageModel::find($id);
        if($data->file_name){
            
        if(file_exists(public_path('uploads/medium/' .  $data->file_name))){
            unlink('uploads/medium/' . $data->file_name);
        }
        
    }
    $data->delete();
    return response()->json([
                'message' => 'Delete Successful!',
                'class_name' => 'alert-success'
            ]);
    }

    public function upload_form($id){
        // return $id;
        $post_id = $id;
          $data = PostImageModel::where('post_id',$id)->get();
        return view('admin.multiple-photo.create', compact('post_id','data'));
    }

}
