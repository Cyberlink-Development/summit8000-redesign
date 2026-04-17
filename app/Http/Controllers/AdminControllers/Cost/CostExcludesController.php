<?php

namespace App\Http\Controllers\AdminControllers\Cost;

use App\Http\Controllers\Controller;
use App\Models\Cost\CostExcludesModel;
use Illuminate\Http\Request;

class CostExcludesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = CostExcludesModel::where('trip_detail_id', $id)->orderBy('ordering', 'desc')->get();
        return view('admin.cost-excludes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = 0;
        $ord = CostExcludesModel::max('ordering');
        $ordering += $ord + 1;
        return view('admin.cost-excludes.create', compact('ordering'));
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
        ]);
        $data = $request->all();
        $result = CostExcludesModel::create($data);
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
    public function edit($trip_id, $id)
    {
        $data = CostExcludesModel::find($id);
        return view('admin.cost-excludes.edit', compact('data'));
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
            'title' => 'required',
        ]);

        $data = CostExcludesModel::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->ordering = $request->ordering;

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
    public function destroy($trip_id, $id)
    {
        $data = CostExcludesModel::find($id);
        $data->delete();      
    }
}
