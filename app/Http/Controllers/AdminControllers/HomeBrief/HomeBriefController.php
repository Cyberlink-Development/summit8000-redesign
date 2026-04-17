<?php

namespace App\Http\Controllers\AdminControllers\HomeBrief;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeBrief\HomeBriefModel;

class HomeBriefController extends Controller
{
    public function index(){
        $data = HomeBriefModel::where('id',1)->first();
        return view('admin.homeBrief.homeBrief',compact('data'));
    }
    public function create(){
        return view('admin.homeBrief.add');
    }
    public function store(Request $request){
        // dd($request->all()); 
        return back()->with('Home Brief cannot be added');   
        $validate =  $request->validate([
            'title'=> 'required',
        ]);
        $homeBrief = new HomeBriefModel();
        
        $user_name1 = '';
        if($request->hasFile('thumbnail')){
            $user_img_name1 = $request->file('thumbnail');
            $user_name1 = time().'.'.$user_img_name1->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name1->move($destinationPath, $user_name1);

            // $homeBrief->picture1 = $user_name1;
        } 

        // dd($homeBrief->picture1);
        $user_name2 = '';
        if($request->hasFile('image')){
            $user_img_name2 = $request->file('image');
            $user_name2 = time().'.'.$user_img_name2->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name2->move($destinationPath, $user_name2);

            // $homeBrief->picture2 = $user_name2;
            // $homeBrief->picture2->save();
        }
        $user_name3 = '';
        if($request->hasFile('pic')){
            $user_img_name3 = $request->file('pic');
            $user_name3 = time().'.'.$user_img_name3->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name3->move($destinationPath, $user_name3);

            // $homeBrief->picture3 = $user_name3;
            // $homeBrief->picture3->save();
        } 
        if($request->hasFile('video')) {
            $user_img_name = $request->file('video');
            $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name->move($destinationPath, $user_name);
            $req['video'] = $user_name;
    
        }
        // dd($user_name3);
        // dd($homeBrief->picture3);
        $homeBrief->title = $request->input('title');
        $homeBrief->brief = $request->input('brief');
        $homeBrief['thumbnail'] = $user_name1;
        $homeBrief['image'] = $user_name2;
        $homeBrief['pic']   = $user_name3;
        $homeBrief->save();
        return back()->with('Home Brief has been added');
    }

    public function update(Request $request, $id){
        $data = HomeBriefModel::where('id', $id)->first();
        // dd($data);
        // dd($request->all());
        if($request->hasFile('thumbnail')){
            $user_img_name = $request->file('thumbnail');
            $user_name = Str::random(5).'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name->move($destinationPath, $user_name);
    
            $data->thumbnail = $user_name;
        }
        if($request->hasFile('image')){
            $user_img_name = $request->file('image');
            $user_name = Str::random(5).'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name->move($destinationPath, $user_name);

            $data->image = $user_name;
        }
        if($request->hasFile('pic')){
            $user_img_name = $request->file('pic');
            $user_name = Str::random(5).'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/original');
            $user_img_name->move($destinationPath, $user_name);
    
            $data->pic = $user_name;
        }
        // if($request->hasFile('video')) {
        //     $user_img_name = $request->file('video');
        //     $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
        //     $destinationPath = public_path('uploads/original');
        //     $user_img_name->move($destinationPath, $user_name);
        //     $data->video = $user_name;
    
        // }

        $data->title = $request->title;
        $data->brief = $request->brief;
        $data->video = $request->video;
        $data->save();

        return back()->with('success', 'Home Brief Edited');
    }
    public function pic1_destory($id){
        $data = HomeBriefModel::find($id);
        if($data->thumbnail){
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
            }
        }
        $data->thumbnail = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    public function pic2_destory($id){
        $data = HomeBriefModel::find($id);
        if($data->image){
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->image)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->image);
            }
        }
        $data->image = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    public function pic3_destory($id){
        $data = HomeBriefModel::find($id);
        if($data->pic){
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->pic)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->pic);
            }
        }
        $data->pic = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    public function video_delete($id){
        // dd($id);
        $data = HomeBriefModel::find($id);
        if($data->video){
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->video)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->video);
            }
        }
        $data->video = NULL;
        $data->save();
        return response('Delete Successful.');
    }
}
