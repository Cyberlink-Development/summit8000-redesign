<?php

namespace App\Http\Controllers\AdminControllers\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostTypeModel;
use Image;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PostCategoryModel::orderBy('id','desc')->get();
        return view('admin.post-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = PostTypeModel::all();
        $ordering = PostCategoryModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.post-category.create', compact('data','ordering'));
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
            'category'=>'required',
            'uri'=>'required'
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

        $data['uri'] = Str::slug($request->uri); 
        $data['thumbnail'] = $file_name;
        $result = PostCategoryModel::create($data);
        if($result){
            return redirect()->back()->with('message','Successfully added.');
        }else{
            return "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts\PostCategoryModel  $postCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategoryModel $postCategoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts\PostCategoryModel  $postCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategoryModel $postCategoryModel, $id)
    {   
       $data = PostCategoryModel::find($id);
       $posttype = PostTypeModel::all();
       return view('admin.post-category.edit', compact('data','posttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts\PostCategoryModel  $postCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategoryModel $postCategoryModel, $id)
    {
        $request->validate([
            'category'=>'required',
            'uri'=>'required'
        ]);
        
        $data = PostCategoryModel::find($id);
        $file =  $request->file('thumbnail');
        $file_name = '';
        if($request->hasfile('thumbnail')){
            $data = PostCategoryModel::find($id);  
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

        $data->post_type = $request->post_type;
        $data->category = $request->category;
        $data->uri = Str::slug($request->uri);  
        $data->ordering = $request->ordering;  
        $data->category_caption = $request->category_caption;
        $data->category_content = $request->category_content;        
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts\PostCategoryModel  $postCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategoryModel $postCategoryModel, $id)
    {
        $data = PostCategoryModel::find($id);
         if($data->thumbnail  != NULL){
            unlink('uploads/original/' . $data->thumbnail );
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

     // Delete Post Thumbnail
     function delete_category_thumb(PostCategoryModel $postCategoryModel, $id){
         $data = PostCategoryModel::find($id);
         if($data->thumbnail){                
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }                   
            }
         $data->thumbnail = NULL;
         $data->save();
         return response('Delete Successful.');
    }


}
