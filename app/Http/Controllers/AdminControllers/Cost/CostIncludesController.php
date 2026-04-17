<?php

namespace App\Http\Controllers\AdminControllers\Cost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cost\CostIncludesModel;

class CostIncludesController extends Controller
{

    private $trip_id;
    private $ordering;

    public function __construct(){
        $this->trip_id = request()->segment(2);
        $ordering = CostIncludesModel::max('ordering');
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
        $data = CostIncludesModel::where('trip_id',$trip_id)->get();
        return view('admin.cost-includes.index',compact('data','trip_id'));
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
        return view('admin.cost-includes.create',compact('trip_id','ordering'));
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

        if(CostIncludesModel::create($data)){
            return redirect()->back()->with('message','Added Successfully.');
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
        $data = CostIncludesModel::find($id);
        $trip_id = $this->trip_id;
        $ordering = $data->ordering;
        return view('admin.cost-includes.edit',compact('data','trip_id','ordering'));
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
        $data = CostIncludesModel::find($id);
        $data->trip_id = $trip_id;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->ordering = $request->ordering;

        if($data->save()){
            return redirect()->back()->with('message','Update Successful.');
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
        $data = CostIncludesModel::find($id);
        $data->delete();
    }
}
