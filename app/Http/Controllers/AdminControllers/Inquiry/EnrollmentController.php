<?php

namespace App\Http\Controllers\AdminControllers\Inquiry;

use App\Http\Controllers\Controller;
use App\Models\Inquiry\EnrollmentModel;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){
        $enrollment = EnrollmentModel::orderby('id','desc')->get();
        // dd($enrollment);
        return view('admin.training-enrollment.index',compact('enrollment'));

    }
    public function destroy($id){
        $del = EnrollmentModel::findorfail($id);
        if($del->delete())
        {
            return redirect()->back()->with('success',' Deleted  successfully');
        }
    }
}
