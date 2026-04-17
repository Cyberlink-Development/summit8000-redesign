<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Models\Settings\SettingModel;

class TripBooking2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $request->validate([
            'first_name'=> 'Required',
            'last_name'=>'Required',
            'email'=>'Required|email'
            ]);
        
        $emailfrom = env('MAIL_USERNAME');
        $message_subject = "Booking Complete";

        $trip_title = "";
        if($request->trip_title){
            $trip_title = $request->trip_title;
        }
         $start_date = "";
         if($request->start_date){
            $start_date = $request->start_date;
        }
        $end_date = "";
         if($request->end_date){
            $end_date = $request->end_date;
        }
        $group_size = "";
         if($request->group_size){
            $group_size = $request->group_size;
        }
        $price = "";
         if($request->price){
            $price = $request->price;
        }
        
        $title = "";
         if($request->title){
            $title = $request->title;
        }
        $first_name = "";
        if($request->first_name){
            $first_name = $request->first_name;
        }
        $middle_name = "";
        if($request->middle_name){
            $middle_name = $request->middle_name;
        }
        $last_name = "";
        if($request->last_name){
            $last_name = $request->last_name;
        }
        $dob = "";
        if($request->dob){
            $dob = $request->dob;
        }
        $country = "";
        if($request->country){
            $country = $request->country;
        }
        $passport_number = "";
        if($request->passport_number){
            $passport_number = $request->passport_number;
        }
        $expire_date = "";
        if($request->expire_date){
            $expire_date = $request->expire_date;
        }
        $email = "";
        if($request->email){
            $email = $request->email;
        }
        $phone = "";
        if($request->phone){
            $phone = $request->phone;
        }
        $mobile = "";
        if($request->mobile){
            $mobile = $request->mobile;
        }
        $occupation = "";
        if($request->occupation){
            $occupation = $request->occupation;
        }
        $mailing_address = "";
        if($request->mailing_address){
            $mailing_address = $request->mailing_address;
        }
        $emergency_contact = "";
        if($request->emergency_contact){
            $emergency_contact = $request->emergency_contact;
        }
        $relationship = "";
        if($request->relationship){
            $relationship = $request->relationship;
        }
        $data = SettingModel::where('id',1)->first();
        return $this->from($emailfrom)
            ->view('themes.default.mail.tripbooking',['trip_title'=>$trip_title,'start_date'=>$start_date,'end_date'=>$end_date,
            'group_size'=>$group_size,'price'=>$price,'title'=>$title,'first_name'=>$first_name,'middle_name'=>$middle_name,'last_name'=>$last_name,'dob'=>$dob,'country'=>$country,
            'passport_number'=>$passport_number,'expire_date'=>$expire_date,'email'=>$email,
            'phone'=>$phone,'mobile'=>$mobile,'occupation'=>$occupation,'mailing_address'=>$mailing_address,
            'emergency_contact'=>$emergency_contact,'relationship'=>$relationship,'data'=>$data
           
])->subject($message_subject);
        }
}
