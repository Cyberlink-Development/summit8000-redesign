<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Model\Newsletter;
use App\Mail\SendNewsletter;
use Illuminate\Support\Facades\Mail;
use App\Model\Subscriber;
use App\Model\VerifyUser;
use DB;

class SendMailController extends Controller 
{
  public function send_mail(Request $request)
 {
   $details = [
     'subject' => 'Test Notification',
     'email'=>'kebib96@gmail.com'
   ];
     $job = (new \App\Jobs\SendQueueEmail($details))
           ->delay(now()->addSeconds(2));

     dispatch($job);
     echo "Mail send successfully !!";
 }

 public function index(Request $request)
    {
        $users = Subscriber::orderBy('id','desc')->paginate(100); 
        $news=Newsletter::orderBy('id','desc')->get();
        return view('admin.newsletter.send_newsletter', compact('users','news'));
    }


    public function sendEmail(Request $request)
    {
      $users = Subscriber::whereIn("id", $request->ids)->get();
      $news_id=Newsletter::where('id',$request->news_id)->first();
      foreach ($users as $key => $user) {
          $mail = preg_replace( "/<br>|\n/", "", $user->email );
          Mail::to($mail)->send(new SendNewsletter($news_id));
      }
      return response()->json(['success'=>'Newsletter sent successfully']);
  }

  public function newsletter(Request $request)
  {
    if($request->isMethod('get')){
         return view('admin.newsletter.newsletter');
    }

    if($request->isMethod('post')){
      $request->validate([
         'title'=>'required',
         'content'=>'required',
         'publish_date'=>'required'
      ]);
        $data['title']=$request->title;
        $data['content']=$request->content;
        $data['publish_date']=$request->publish_date;
        $store=Newsletter::create($data);
        if($store)
        {
          return back()->with('success','Newsletter added successfully');
        }
    }
  }

  public function newsindex(Request $request)
  {
     if($request->isMethod('get'))
     {
       $data=Newsletter::orderBy('id','desc')->get();
       return view('admin.newsletter.news-index', compact('data'));
     }
  }

  public function newsedit(Request $request)
  {
     if($request->isMethod('get'))
     {
       $id=$request->id;
       $data=Newsletter::find($id);
       return view('admin.newsletter.news-edit',compact('data'));
     }
     if($request->isMethod('post'))
     {
          $request->validate([
         'title'=>'required',
         'content'=>'required',
         'publish_date'=>'required'
      ]);
         $id=$request->id;
        $data=Newsletter::find($id);
        $data['title']=$request->title;
        $data['content']=$request->content;
        $data['publish_date']=$request->publish_date;
        $update=$data->save();
          if($update)
        {
          return back()->with('success','Newsletter updated successfully');
        }
     }
  }

  public function newsdelete(Request $request)
  {
    $id=$request->id;
    $data=Newsletter::find($id);
    $del=$data->delete();
    return back()->with('success','Newsletter deleted successfully');
    
  }

  public function usercreate(Request $request)
  {
    if($request->isMethod('get')){       
         return view('admin.newsletter.user-create');
    }

    if($request->isMethod('post')){
      $request->validate([
         'email'=>'required|unique:subscribers,email|email'
      ]);
        $data['email']=$request->email;
        $store=Subscriber::create($data);
        if($store)
        {
          return back()->with('success','Subscriber added successfully');
        }
    }
  }

    public function userindex(Request $request)
  {
     if($request->isMethod('get'))
     {
        //  delete Duplicate emails
//          $data1=Subscriber::all();
//          $duplicateRecords = $data1->unique('email');
//           $usersDupes = $data1->diff($duplicateRecords);
//           foreach($usersDupes as $record) {
//              $record->delete();
//            }
       $data=Subscriber::orderBy('id','desc')->get();
       return view('admin.newsletter.user-index', compact('data'));
     }
  }

   public function useredit(Request $request)
  {
     if($request->isMethod('get'))
     {
       $id=$request->id;
       $data=Subscriber::find($id);
       return view('admin.newsletter.user-edit',compact('data'));
     }
     if($request->isMethod('post'))
     { $id=$request->id;
          $request->validate([
          'email'=>'required|email|unique:subscribers,email,'.$id,
      ]);
        
          $data=Subscriber::find($id);
         $data['email']=$request->email;
         $update=$data->save();
          if($update)
        {
          return back()->with('success','Subscriber updated successfully');
        }
     }
  }

    public function userdelete(Request $request)
  {
    $id=$request->id;
    $data=Subscriber::find($id);
    $verified = VerifyUser::where('user_id',$id)->delete();
    $del=$data->delete();
    return back()->with('success','User deleted successfully');
    
  }
}
