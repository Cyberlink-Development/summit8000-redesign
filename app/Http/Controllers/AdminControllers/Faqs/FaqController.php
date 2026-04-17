<?php

namespace App\Http\Controllers\AdminControllers\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs\FaqModel;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tirp_id = request()->segment(2);
      $data = FaqModel::where('trip_id',$tirp_id)->orderBy('id','desc')->get();
        return view('admin.faqs.index',compact('data','tirp_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tirp_id = request()->segment(2);
        $ordering = FaqModel::max('ordering');
        $ordering = $ordering + 1;
        return view('admin.faqs.create',compact('tirp_id','ordering'));
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
        $result = FaqModel::create($data);
        if($result){
            return redirect()->back()->with('message','Successfully added.');
        }
        return redirect()->back()->with('message','Try again!');
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
    public function edit($trip,$id)
    {
        $tirp_id = $trip;
        $data = FaqModel::find($id);
        return view('admin.faqs.edit',compact('data','tirp_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip, $id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
          ]);

          $data = FaqModel::find($id);
          $data->trip_id = $trip;
          $data->title = $request->title;
          $data->content = $request->content;
          $data->ordering = $request->ordering;

          if($data->save()){
              return redirect()->back()->with('message','Update Successful.');
          }
          return redirect()->back()->with('message','Try again!');
            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip, $id)
    {
        $data = FaqModel::find($id);
        $data->delete();
        return "Destroy Success";
    }
}
