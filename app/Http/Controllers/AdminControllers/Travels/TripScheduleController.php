<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Travels\TripScheduleModel;

class TripScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = TripScheduleModel::where('trip_detail_id',$id)->orderBy('ordering','desc')->get();
        return view('admin.tripschedule.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = 0;
        $ord = TripScheduleModel::max('ordering');
        $ordering += $ord + 1;
        $availability=array('GUARANTEED'=>'GUARANTEED', 'AVAILABLE'=>'AVAILABLE', 'LIMITED'=>'LIMITED', 'CLOSED'=>'CLOSED');
        return view('admin.tripschedule.create',compact('availability','ordering'));
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
        'start_date'=>'required',
        'end_date'=>'required'             
        ]);
        $data = $request->all();
        $result = TripScheduleModel::create($data);
        return redirect()->back()->with('message','Successfully added.');
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
    public function edit($strip_id,$id)
    {
        $data = TripScheduleModel::find($id);
        $availability=array('GUARANTEED'=>'GUARANTEED', 'AVAILABLE'=>'AVAILABLE', 'LIMITED'=>'LIMITED', 'CLOSED'=>'CLOSED');
        return view('admin.tripschedule.edit', compact('data','availability'));
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
        'start_date'=>'required',
        'end_date'=>'required'             
        ]);      

      $data = TripScheduleModel::find($id);  
      $data->start_date = $request->start_date;
      $data->end_date = $request->end_date;
      $data->price = $request->price;
      $data->group_size = $request->group_size;
      $data->availability = $request->availability;
      $data->remarks = $request->remarks;
      $data->ordering = $request->ordering;            
    
      if($data->save()){
        return redirect()->back()->with('message','Update Sucessfully.');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip_id,$id)
    {
      $data = TripScheduleModel::find($id);      
      $data->delete();
      return 'Are you sure to delete?';
    }
}
