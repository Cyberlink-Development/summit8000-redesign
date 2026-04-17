<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Travels\TripItineraryModel;

class TripItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = TripItineraryModel::where('trip_detail_id',$id)->orderBy('ordering','desc')->get();
        return view('admin.itinerary.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = 0;
        $ord = TripItineraryModel::max('ordering');
        $ordering += $ord + 1;
        return view('admin.itinerary.create',compact('ordering'));
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
        'title'=>'required'        
        ]);
        $data = $request->all();
        
        $result = TripItineraryModel::create($data);
        return redirect()->back()->with('success','Successfully added.');
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
    public function edit($trip_id,$id)
    {
        $data = TripItineraryModel::find($id);
        return view('admin.itinerary.edit', compact('data'));
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
        'title'=>'required'
        ]);      

      $data = TripItineraryModel::find($id);  
      $data->title = $request->title;
      $data->content = $request->content;
      $data->days = $request->days;
      $data->ordering = $request->ordering;            
    
      if($data->save()){
        return redirect()->back()->with('success','Update Sucessfully.');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$info_id)
    {
      $data = TripItineraryModel::find($info_id);  
      $data->delete();
      return back()->with('success','Deleted Sucessfully.');
    }
}
