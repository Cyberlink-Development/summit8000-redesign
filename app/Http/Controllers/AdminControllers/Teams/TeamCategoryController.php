<?php

namespace App\Http\Controllers\AdminControllers\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use App\Models\Team\TeamModel;
use Image;

class TeamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $data = TeamCategory::orderBy('id','desc')->get();    
        return view('admin.team-category.index', compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = TeamCategory::max('ordering');
        $ordering = $ordering + 1;
        $category = TeamCategory::where('team_parent',0)->get();
        return view('admin.team-category.create', compact('ordering','category'));
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
        $file =  $request->file('picture');
        $file_name = "";
        if($request->hasfile('picture')){

            $category_file = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $category_file = explode('.', $category_file);
            $file_name = Str::slug( 'icon-'.$category_file[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationOriginal = public_path('uploads/team');
            $pic = Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height(); 

            $pic->save($destinationOriginal .'/'. $file_name );
        }

        $data['uri'] = Str::slug($request->uri); 
        $data['picture'] = $file_name;
        $result = TeamCategory::create($data);
        if($result){
            return redirect()->back()->with('message','Successfully added.');
        }else{
            return "Error";
        }
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
      $data = TeamCategory::find($id);
    //   $teamparent = $data
        $category1= TeamCategory::where('team_parent', $id)->get();   
                $category = TeamCategory::where('team_parent',0)->get();

        //    dd($category);
       return view('admin.team-category.edit', compact('data','category')); 
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
            'category'=>'required',
            'uri'=>'required'
        ]);
        
        $data = TeamCategory::find($id);
        $file =  $request->file('picture');
        $file_name = '';
        if($request->hasfile('picture')){
            $data = TeamCategory::find($id);  
            if($data->picture){               
                if(file_exists(public_path('uploads/team/' .  $data->picture))){
                    unlink('uploads/team/' . $data->picture);
                }                  
            }
            $category_file = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $category_file = explode('.', $category_file);
            $file_name = Str::slug($category_file[0]) . '-' . Str::random(40) . '.' . $extension;
            
            $destinationOriginal = public_path('uploads/team');
            

        $product_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();        
      
        /****Upload Original Image****/
        $product_picture->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $file_name ); 

        $data->picture = $file_name;
        }   

        $data->team_parent = $request->team_parent;
        $data->category = $request->category;
        $data->uri = Str::slug($request->uri);  
        $data->ordering = $request->ordering;  
        $data->caption = $request->caption;
        $data->content = $request->content;  
        $data->status = $request->status; 
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = TeamCategory::find($id);
         if($data->picture  != NULL){
            unlink('uploads/team/' . $data->picture );
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

    public function delete_teamcategory_thumb($id)
    {
        $data = TeamCategory::find($id);
     if($data->picture){      
      if(file_exists(env('PUBLIC_PATH').'uploads/team/' . $data->picture)){
        unlink(env('PUBLIC_PATH').'uploads/team/' . $data->picture);
      }
    }
    $data->picture = NULL;
    $data->save();
    return response('Delete Successful.');
    }
}
