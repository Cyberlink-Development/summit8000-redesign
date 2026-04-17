<?php
namespace App\Http\Controllers\AdminControllers\Banners;

use App\Http\Controllers\Controller;
use App\Models\Banners\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\File;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BannerModel::all();
        return view('admin.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'title' => 'required'
            // 'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $req = $request->all();
        $file = $request->file('picture');

        if ($request->hasFile('picture')) {
            $banner = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $banner = explode('.', $banner);
            $banner_name = Str::slug($banner[0]) . '-' . Str::random(5) . '.webp';
            // $banner_name = Str::slug($banner[0]) . '-' . Str::random(5) . '.' . $extension;
            $destinationPath = public_path('uploads/banners');
            $banner_picture = Image::make($file->getRealPath());
            // $banner_picture->save($destinationPath . '/' . $banner_name);
            $banner_picture->encode('webp', 85)->save($destinationPath . '/' . $banner_name);
            $req['picture'] = $banner_name;
        }
        if ($request->hasFile('video')) {
            $user_img_name = $request->file('video');
            $user_name = time() . '.' . $user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/banners');
            $user_img_name->move($destinationPath, $user_name);
            $req['video'] = $user_name;

        }
        $data = BannerModel::create($req);
        if ($data) {
            return redirect()->back()->with('success', 'Successfully added.');
        } else {
            return "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function show(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerModel $bannerModel, $id)
    {
        $data = BannerModel::find($id);
        return view('admin.banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerModel $bannerModel, $id)
    {
        $request->validate([
            'title' => 'required'
            // 'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $data = BannerModel::find($id);
        $file = $request->file('picture');

        if ($request->hasFile('picture')) {

            // Remove old file if exists
            $data = BannerModel::find($id);
            if (file_exists(public_path('public/uploads/banners/' . $data->picture))) {
                unlink('public/uploads/banners/' . $data->picture);
            }

            // Upload new file
            $banner = $request->file('picture')->getClientOriginalName();
            $extension = $request->file('picture')->getClientOriginalExtension();
            $banner = explode('.', $banner);
            // $banner_name = Str::slug($banner[0]) . '-' . Str::random(5) . '.' . $extension;
            $banner_name = Str::slug($banner[0]) . '-' . Str::random(5) . '.webp';
            $destinationPath = public_path('uploads/banners');
            $banner_picture = Image::make($file->getRealPath());
            // $banner_picture->save($destinationPath . '/' . $banner_name);
            $banner_picture->encode('webp', 85)->save($destinationPath . '/' . $banner_name);
            $data->picture = $banner_name;
        }

        if ($request->hasFile('video')) {
            if (file_exists(public_path('public/uploads/banners/' . $data->video))) {
                unlink('public/uploads/banners/' . $data->video);
            }
            $user_img_name = $request->file('video');
            $user_name = time() . '.' . $user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('uploads/banners');
            $user_img_name->move($destinationPath, $user_name);


            $data->video = $user_name;

        }
        $data->title = $request->title;
        $data->picture_alt = $request->picture_alt;
        $data->caption = $request->caption;
        $data->link = $request->link;
        $data->youtube_link = $request->youtube_link;
        $data->save();
        if ($data->save()) {
            return redirect()->back()->with('success', 'Update Successful.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerModel $bannerModel, $id)
    {


        $data = BannerModel::find($id);
        if ($data->picture) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture);
            }
        }
        if ($data->video) {
            if (file_exists(public_path('public/uploads/banners/' . $data->video))) {
                unlink('public/uploads/banners/' . $data->video);
            }
        }

        $data->delete();


    }
    public function isdefault(Request $request)
    {
        $data = BannerModel::find($request->id);
        $default = BannerModel::where('id', '!=', $data->id)->get();
        if ($data->status == '1') {
            $data->status = '0';
            $data->save();
            return back();
        } else if ($data->status == '0') {
            foreach ($default as $row) {
                if ($row->status == '1') {
                    $default = BannerModel::where('id', $row->id)->update(['status' => '0']);
                }
            }
            $data->status = '1';
            $data->save();
            return back();
        }
        return back();
    }
    public function delete_video($id)
    {
        $data = BannerModel::find($id);
        if ($data->video) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->video)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->video);
            }
        }
        $data->video = null;
        $data->save();
        return response('Delete Successful.');
    }
    public function delete_pic($id)
    {
        $data = BannerModel::find($id);
        if ($data->video) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture);
            }
        }
        $data->picture = null;
        $data->save();
        return response('Delete Successful.');
    }
}
