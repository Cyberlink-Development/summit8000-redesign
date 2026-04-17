<?php

namespace App\Http\Controllers;

use App\Model\DirectPay;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use App\Mail\AdminBookingMail;
use App\Mail\BookTrip;
use Str;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Mail;

class DirectPayController extends Controller
{
    public function index()
    {
        $data = DirectPay::latest()->paginate(10);
        return view('admin.direct-pay.index', compact('data'));
    }
    public function show($id)
    {
        $data = DirectPay::findOrFail($id);
        return view('admin.direct-pay.show', compact('data'));
    }
    public function delete($id)
    {
        $data = DirectPay::findOrFail($id);
        $data->delete();
        return  redirect()->back()->with('success','Successfully deleted.');
    }
    public function payment_direct()
    {
        $trip = TripModel::where(['status' => 1])->get();
        return view('themes.default.payment-direct', compact('trip'));
    }
    public function payment_store(Request $request)
    {
        try{
            $g_recaptcha_response = $request->input('g_recaptcha_response');
            $result = $this->getCaptcha($g_recaptcha_response);
            // dd($result);
            if ($result->success == true) {
                $validatedData = $request->validate([
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'email' => 'required|email',
                    'phone'=> 'required',
                    'country' => 'required',
                    'trip_id' => 'required|exists:cl_trip_details,id',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date',
                    'price' => 'required|numeric',
                    'no_of_people' => 'required|integer'
                ]);
                $data = array_merge([
                    'payment_type' => 'hbl-pay',
                    'paid_status' => 0
                ], $validatedData);
                $data = [
                    'payment_type' => 'hbl-pay',
                    'paid_status' => 0
                ];
                $data = array_merge($data, $request->all());
                $data = DirectPay::create($data);
                Mail::send(new AdminBookingMail());
                Mail::send(new BookTrip($request->email));
                return redirect()->route('payment.verify', $data->id);
            }
            else
            {
                // dd($result);
                return back()->with('error', 'You are a robot');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function payment_verify($id){
        $data = DirectPay::where('id', $id)->first();
        $payment_id = $data->id;
        $amt = $data->price;
        $refId= $payment_id.'-' . Str::random(5);
        $trip = TripModel::where('id', $data->trip_id)->first();
        $productName = $trip->trip_title;
        $threeD = 'Y';
        $api_key = 'bc1864199c35420587b8134a463eb117';
        $mid = 9103336467;
        $curr = 'USD';
        $success_url =  route('payment.success');
        $failed_url =  route('payment.failure');
        $cancel_url = route('payment.failure');
        $backend_url = route('index.front');
        // dd($mid,$api_key,$curr,$amt,$threeD,$success_url,$failed_url,$cancel_url,$backend_url,$refId,$productName);
        $payment = new PaymentService();
        $joseResponse=$payment->ExecuteFormJose($mid,$api_key,$curr,$amt,$threeD,$success_url,$failed_url,$cancel_url,$backend_url,$refId,$productName);
        $response_obj = json_decode($joseResponse);
        return redirect($response_obj->response->Data->paymentPage->paymentPageURL);
    }

    public function success(Request $request){
        if($request->segment(2) == 'success'){
            $ref = explode('-',$request->orderNo)[0];
            $payment = DirectPay::where("id", $ref)->firstorfail();
            $payment->paid_status='1';
            $payment->payment_type='hbl-pay';
            $payment->save();
            // Mail::to($payment->email)->send(new SuccessMail($payment->id));
            return redirect()->route('payment.response',$payment->ref_id)->with('success_message','Payment Successful');
        }
        return redirect()->route('payment.response')->with('failure_message', 'Sorry! Payment Failed.');
    }

    public function failure(Request $request){
        if($request->segment(2) == 'failed'){
            $ref = explode('-',$request->orderNo)[0];
            $get=DirectPay::where('id',$ref)->first();
            $get->delete();
        }
        return redirect()->route('payment.response')->with('failure_message', 'Sorry! Payment Failed.');
    }

    public function response(Request $request){
        $get=DirectPay::where('id',$request->id)->first();
        return view('themes.default.response',compact('get'));
    }
    private function getCaptcha($secretKey)
    {
        $secret_key = env('SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response={$secretKey}");
        $result = json_decode($response);
        return $result;
    }
}
