<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Models\Settings\SettingModel;

class BookingComplete extends Mailable
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

        $activity = "";
        if($request->activity){
            $activity = $request->activity;
        }
         $trip = "";
         if($request->trip){
            $trip = $request->trip;
        }
        $trip_start_date = "";
         if($request->trip_start_date){
            $trip_start_date = $request->trip_start_date;
        }
        $nop = "";
         if($request->nop){
            $nop = $request->nop;
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
        
        $arrival_date = "";
        if($request->arrival_date){
            $arrival_date = $request->arrival_date;
        }
        $arrival_hour = "";
        if($request->arrival_hour){
            $arrival_hour = $request->arrival_hour;
        }
        $arrival_minute = "";
        if($request->arrival_minute){
            $arrival_minute = $request->arrival_minute;
        }
        $arrival_ampm = "";
        if($request->arrival_ampm){
            $arrival_ampm = $request->arrival_ampm;
        }
        $arrival_flight = "";
        if($request->arrival_flight){
            $arrival_flight = $request->arrival_flight;
        }
        $arrival_pickup = "";
        if($request->arrival_pickup){
            $arrival_pickup = $request->arrival_pickup;
        }
        
        $depature_date = "";
        if($request->depature_date){
            $depature_date = $request->depature_date;
        }
         $depature_hour = "";
        if($request->depature_hour){
            $depature_hour = $request->depature_hour;
        }
         $depature_minute = "";
        if($request->depature_minute){
            $depature_minute = $request->depature_minute;
        }
         $depature_ampm = "";
        if($request->depature_ampm){
            $depature_ampm = $request->depature_ampm;
        }
         $depature_flight = "";
        if($request->depature_flight){
            $depature_flight = $request->depature_flight;
        }
         $depature_dropoff = "";
        if($request->depature_dropoff){
            $depature_dropoff = $request->depature_dropoff;
        }
         $special_message  = "";
        if($request->special_message ){
            $special_message = $request->special_message ;
        }
        $source = "";
        if($request->source){
            $source = $request->source;
        }
        $data = SettingModel::where('id',1)->first();
        return $this->from($emailfrom)
            ->view('themes.default.mail.booking',['activity'=>$activity,'trip'=>$trip,'trip_start_date'=>$trip_start_date,
            'nop'=>$nop,'title'=>$title,'first_name'=>$first_name,'middle_name'=>$middle_name,'last_name'=>$last_name,'dob'=>$dob,'country'=>$country,
            'passport_number'=>$passport_number,'expire_date'=>$expire_date,'email'=>$email,
            'phone'=>$phone,'mobile'=>$mobile,'occupation'=>$occupation,'mailing_address'=>$mailing_address,
            'emergency_contact'=>$emergency_contact,'relationship'=>$relationship,
            'arrival_date'=>$arrival_date,'arrival_hour'=>$arrival_hour,'arrival_minute'=>$arrival_minute,
            'arrival_ampm'=>$arrival_ampm,'arrival_flight'=>$arrival_flight,'arrival_pickup'=>$arrival_pickup,
            'depature_date'=>$depature_date,'depature_hour'=>$depature_hour,'depature_minute'=>$depature_minute,
            'depature_ampm'=>$depature_ampm,'depature_flight'=>$depature_flight,'depature_dropoff'=>$depature_dropoff,
            'special_message'=>$special_message,'source'=>$source,'data'=>$data
           
])->subject($message_subject);
        }
}
