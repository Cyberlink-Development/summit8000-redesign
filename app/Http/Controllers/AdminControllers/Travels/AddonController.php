<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use App\Models\Travels\AddonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AddonModel::orderBy('ordering', 'asc')->get();

        return view('admin.addons.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordering = AddonModel::max('ordering');

        $ordering = $ordering ? $ordering + 1 : 1;

        return view('admin.addons.create', compact('ordering'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $req = $request->all();

        /*
        |--------------------------------------------------------------------------
        | Thumbnail Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            $thumb_file = $request->file('thumbnail');

            $originalName = pathinfo(
                $thumb_file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $thumbnail_name = Str::slug($originalName)
                . '-' . Str::random(5) . '.webp';

            $destinationPath = public_path('uploads/thumbnails');

            Image::make($thumb_file->getRealPath())
                ->encode('webp', 90)
                ->save($destinationPath . '/' . $thumbnail_name);

            $req['thumbnail'] = $thumbnail_name;
        }

        /*
        |--------------------------------------------------------------------------
        | Auto Ordering
        |--------------------------------------------------------------------------
        */

        if (empty($request->ordering)) {

            $lastOrder = AddonModel::max('ordering');

            $req['ordering'] = $lastOrder ? $lastOrder + 1 : 1;
        }

        AddonModel::create($req);

        return redirect()
            ->back()
            ->with('success', 'Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddonModel $addonModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddonModel $addonModel, $id)
    {
        $data = AddonModel::findOrFail($id);

        return view('admin.addons.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddonModel $addonModel, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = AddonModel::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Thumbnail Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            // Delete old image
            if ($data->thumbnail) {

                $oldImage = public_path(
                    'uploads/thumbnails/' . $data->thumbnail
                );

                if (file_exists($oldImage)) {

                    unlink($oldImage);
                }
            }

            // Upload new image
            $thumb_file = $request->file('thumbnail');

            $originalName = pathinfo(
                $thumb_file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $thumbnail_name = Str::slug($originalName)
                . '-' . Str::random(5) . '.webp';

            $destinationPath = public_path('uploads/thumbnails');

            Image::make($thumb_file->getRealPath())
                ->encode('webp', 90)
                ->save($destinationPath . '/' . $thumbnail_name);

            $data->thumbnail = $thumbnail_name;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Fields
        |--------------------------------------------------------------------------
        */

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->thumbnail_alt = $request->thumbnail_alt;
        $data->ordering = $request->ordering ?? $data->ordering;
        $data->status = $request->status ?? 1;

        $data->save();

        return redirect()
            ->back()
            ->with('success', 'Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddonModel $addonModel, $id)
    {
        $data = AddonModel::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Delete Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($data->thumbnail) {

            $imagePath = public_path(
                'uploads/thumbnails/' . $data->thumbnail
            );

            if (file_exists($imagePath)) {

                unlink($imagePath);
            }
        }

        $data->delete();

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Delete addon image
     */
    public function delete_thumbnail($id)
    {
        $data = AddonModel::findOrFail($id);

        if ($data->thumbnail) {

            $imagePath = public_path(
                'uploads/thumbnails/' . $data->thumbnail
            );

            if (file_exists($imagePath)) {

                unlink($imagePath);
            }
        }

        $data->thumbnail = null;

        $data->save();

        return response('Delete Successful.');
    }
}
