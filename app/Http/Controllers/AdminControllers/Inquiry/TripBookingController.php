<?php

namespace App\Http\Controllers\AdminControllers\Inquiry;

use App\Model\Contact;
use App\Model\VerifyContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry\BookingModel;
use App\Models\Inquiry\Emergency;
use App\Models\Inquiry\Insurance;
use App\Models\Inquiry\FlightDetails;

class TripBookingController extends Controller
{

    public function index()
    {
        $data = Contact::orderBy('id','desc')->get();
        return view('admin.contact.index',compact('data'));    
    }

   
    public function destroy($id)
    {
        $del = Contact::findorfail($id);
       
           $del->delete();
             return redirect()->back()->with('success','Contact deleted  successfully');     
        
    }

    public function trip_booking(Request $request)
     {
     if ($request->isMethod('get'))
     {
         $book=BookingModel::orderby('id','desc')->get();
         return view('admin.trip-booking.index',compact('book'));

     }
    }
    
     public function view_trip_booking($id)
     {
      $book = BookingModel::where('id',$id)->first();
      return view('admin.trip-booking.show',compact('book'));
     
    }
    
    public function trip_booking_delete(Request $request)
    {
        $del = BookingModel::findorfail($request->id);
        $flight = FlightDetails::where('booking_id', $del->id)->first();
        $insurance = Insurance::where('booking_id',$del->id)->first();
        $emergency = Emergency::where('booking_id', $del->id)->first();
        if($flight){
            $flight->delete();
        }
        if($insurance){
            $insurance->delete();
        }
        if($emergency){
            $emergency->delete();
        }
        if($del->delete())
        {
            return redirect()->back()->with('success','Booking deleted  successfully');
        }
    }

    public function update_status(Request $request)
    {
        $data = BookingModel::findorFail($request->id);
        if($data){
            $data->paid_status = 1;
            $data->update();
            return redirect()->back()->with('success','Mark as paid  successfully');
        }
        return redirect()->back()->with('error','Booking not found');
    }

    
}
