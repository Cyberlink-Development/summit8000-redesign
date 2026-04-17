<?php

namespace App\Http\Controllers\AdminControllers\Members;

use App\Models\Members\MemberModel;
use App\Models\Members\RoleModel;
use App\Models\Departments\DepartmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MemberModel::orderBy('id','desc')->get();
        return view('admin.members.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = DepartmentModel::all();
        return view('admin.members.create', compact('department'));
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
            'phone'=>'required',
            'designation'=>'required',
            'department'=>'required',
        ]);
        $data = $request->all();
        $data['password'] = sha1($request->password); 
        $result = MemberModel::create($data);
        if($result){
            return redirect()->back()->with('message','Successfully added.'); 
        }else{
            return "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Members\MemberModel  $memberModel
     * @return \Illuminate\Http\Response
     */
    public function show(MemberModel $memberModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Members\MemberModel  $memberModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberModel $memberModel, $id)
    {
        $data = MemberModel::find($id);
        $department = DepartmentModel::all();
        return view('admin.members.edit', compact('data','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Members\MemberModel  $memberModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberModel $memberModel, $id)
    {    
         $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'designation'=>'required',
            'department'=>'required',
        ]);
        
        $data = MemberModel::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->role_id = $request->role;
        $data->phone = $request->phone;
        $data->designation = $request->designation;
        $data->department = $request->department;
        $data->save();
         return redirect()->back()->with('message','Update Successful.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Members\MemberModel  $memberModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberModel $memberModel, $id)
    {
        $data = MemberModel::find($id);
        $data->delete();
    }
}
