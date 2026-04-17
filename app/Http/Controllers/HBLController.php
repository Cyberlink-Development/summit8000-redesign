<?php

namespace App\Http\Controllers;

use App\Models\Inquiry\BookingModel;
use App\Models\Inquiry\Emergency;
use App\Models\Inquiry\FlightDetails;
use App\Models\Inquiry\Insurance;
use App\Models\Travels\TripModel;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Str;

class HBLController extends Controller
{
    public function payment_verify($data){
        $data = json_decode(urldecode($data), true);
        $booking_id = $data['booking_id'];
        $amt = $data['total_price'];
        $trip_id = $data['trip_id'];
        $refId= $booking_id.'-' . Str::random(5). '-'. $trip_id;
        $trip = TripModel::where('id', $trip_id)->first();
        $productName = $trip->trip_title;
        $threeD = 'Y';
        $api_key = 'bc1864199c35420587b8134a463eb117';
        $mid = 9103336467;
        $curr = 'USD';
        $success_url =  route('himalayan.success');
        $failed_url =  route('himalayan.failure');
        $cancel_url = route('himalayan.failure');
        $backend_url = route('index.front');
        $payment = new PaymentService();
        // dd($mid,$api_key,$curr,$amt,$threeD,$success_url,$failed_url,$cancel_url,$backend_url,$refId,$productName);
        $joseResponse=$payment->ExecuteFormJose($mid,$api_key,$curr,$amt,$threeD,$success_url,$failed_url,$cancel_url,$backend_url,$refId,$productName);
        $response_obj = json_decode($joseResponse);
        return redirect($response_obj->response->Data->paymentPage->paymentPageURL);
    }

    public function success(Request $request){
        if($request->segment(2) == 'success'){
            $ref = explode('-',$request->orderNo)[0];
            $payment = BookingModel::where("id", $ref)->firstorfail();
            $payment->paid_status='1';
            $payment->payment_type='hbl-pay';
            $payment->save();
            // Mail::to($payment->email)->send(new SuccessMail($payment->id));
            return redirect()->route('himalayan.payment.response',$payment->ref_id)->with('success_message','Payment Successful');
        }
        return redirect()->route('himalayan.payment.response')->with('failure_message', 'Sorry! Payment Failed.');
    }

    public function failure(Request $request){
        if($request->segment(2) == 'failed'){
            $ref = explode('-',$request->orderNo)[0];
            $get=BookingModel::where('id',$ref)->first();
            if($get){
                Emergency::where('booking_id', $ref)->delete();
                FlightDetails::where('booking_id', $ref)->delete();
                Insurance::where('booking_id', $ref)->delete();
                $get->delete();
            }
            else{
                return redirect()->route('himalayan.payment.response')->with('failure_message', 'Sorry! Payment Failed.');
            }
        }
        return redirect()->route('himalayan.payment.response')->with('failure_message', 'Sorry! Payment Failed.');
    }

    public function response(Request $request){
        $get=BookingModel::where('id',$request->id)->first();
        return view('themes.default.response',compact('get'));
    }
}
