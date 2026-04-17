<?php

namespace App\Http\Controllers\AdminControllers\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Posts\AssociatedPostModel;
use Image;

class AssociatedPostController extends Controller
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

  public function associated_post($type, $id)
  {
    $data = AssociatedPostModel::where('post_id', $id)->get();
    return view('admin.associated-post.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $ordering = AssociatedPostModel::max('ordering');
    $ordering += 1;
    return view('admin.associated-post.create', compact('ordering'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request->has('post_id')) {
      $post_type = $request->input('post_id');
    } else {
      return "Invalid Post";
    }

    $request->validate([
      'title' => 'required',
    ]);

    $medium_width = env('MEDIUM_WIDTH');
    $medium_height = env('MEDIUM_HEIGHT');

    $data = $request->all();

    if ($request->hasFile('thumbnail')) {
      $user_img_name = $request->file('thumbnail');
      $user_name = time() . '.' . $user_img_name->getClientOriginalExtension();
      $destinationPath = public_path('uploads/associated');
      $user_img_name->move($destinationPath, $user_name);
      $data['thumbnail'] = $user_name;
    }

    $data['page_key'] = time() . rand(500, 999);
    $result = AssociatedPostModel::create($data);
    if ($result) {
      return redirect()->back()->with('success', 'Successfully added.');
    } else {
      return 'Error';
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
  public function edit($type, $id)
  {
    $data = AssociatedPostModel::find($id);
    return view('admin.associated-post.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $type, $id)
  {
    $medium_width = env('MEDIUM_WIDTH');
    $medium_height = env('MEDIUM_HEIGHT');

    $data = AssociatedPostModel::find($id);
    $file =  $request->file('thumbnail');
    $thumbnail_name = '';
    if ($request->hasFile('thumbnail')) {
      $data = AssociatedPostModel::find($id);
      if ($data->thumbnail) {
        if (file_exists(env('PUBLIC_PATH') . 'uploads/associated/' . $data->thumbnail)) {
          unlink(env('PUBLIC_PATH') . 'uploads/associated/' . $data->thumbnail);
        }
      }
      $user_img_name = $request->file('thumbnail');
      $user_name = time() . '.' . $user_img_name->getClientOriginalExtension();
      $destinationPath = public_path('uploads/associated');
      $user_img_name->move($destinationPath, $user_name);

      $data->thumbnail = $user_name;
    }

    $data->title = $request->title;
    $data->brief = $request->brief;
    $data->content = $request->content;
    $data->ordering = $request->ordering;
    $isChecked = $request->has('show_in_home');
    $data->show_in_home = ($isChecked) ? '1' : '0';
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
  public function destroy($type, $id)
  {
    $data = AssociatedPostModel::find($id);
    if ($data->thumbnail  != NULL) {
      if (file_exists(env('PUBLIC_PATH') . 'uploads/associated/' . $data->thumbnail)) {
        unlink(env('PUBLIC_PATH') . 'uploads/associated/' . $data->thumbnail);
      }
    }
    $data->delete();
    return "Delete Successful";
  }
}
