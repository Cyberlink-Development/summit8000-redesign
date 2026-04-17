<?php

namespace App\Http\Controllers\AdminControllers\Members;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        return view('admin.users.create');
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
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
        ]);

      //  $data[] = $request->name;

      /*  if(Users::create($request)){
            redirect()->back()->with('message','Success.');
        }*/

        /* try{
          // $user = App\Models\::create($validatedData);
        }catch(\Exception $exception){
              logger()->error($exception);
            redirect()->back()->with('message','Unable to create new user.');
        } */

        \DB::table('users')->insert([
            [ 'name'=>$request->name, 'email'=>$request->email, 'password'=>Hash::make($request->password), 'user_type'=>$request->user_type ]
        ]);
        \Session::flash('message','Successfully added.');
        return redirect()->back()->with('message','New user create');

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
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return 'destroy';
    }

    public function admin_user(){
        
        return "Admin user";
    }

    public function agent_user(){
        //
        return "Agent user";
    }
    
    public function userprofile(){
        $data = Auth::user();
        return view('admin.users.userprofile',compact('data'));
    }

    public function update_password(Request $request){

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:5|max:15',
            'password' => 'required|min:5|max:15|required_with:cpassword',
            'cpassword' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $user = User::find(Auth::user()->id);  
        if($user){           
           if(Hash::check($request['old_password'],$user->password)){
            $user->password = bcrypt($request['password']);
            $user->save();
            return redirect()->back()->with('message','Your password has been updated.');
           }else{
            return redirect()->back()->with('message','The entered does not match your current password!');
           }           
        }

       // return view('admin.users.passwordEdit');
    }

    public function changepassword(){
        if(Auth::user()){
            return view('admin.users.changepassword');
        }else{
            return redirect()->back();
        }        
    }
}
