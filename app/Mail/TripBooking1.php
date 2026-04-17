<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Models\Settings\SettingModel;

class TripBooking1 extends Mailable
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
            'fullname'=> 'Required',
            'email'=>'Required|email'
            ]);
        
        $emailfrom = env('MAIL_USERNAME');
        $message_subject = "Booking Complete";
        
        
        $trip_title = "";
        if($request->trip_title){
            $trip_title = $request->trip_title;
        }
        
        $fullname = "";
        if($request->fullname){
            $fullname = $request->fullname;
        }
        $phone = "";
        if($request->phone){
            $phone = $request->phone;
        }
         $num_of_person = "";
         if($request->num_of_person){
            $num_of_person = $request->num_of_person;
        }
        $duration = "";
         if($request->duration){
            $duration = $request->duration;
        }
        $arrival_date = "";
         if($request->arrival_date){
            $arrival_date = $request->arrival_date;
        }
        $additional_requirement = "";
         if($request->additional_requirement){
            $additional_requirement = $request->additional_requirement;
        }
        $country = "";
        if($request->country){
            $country = $request->country;
        }
        
        $data = SettingModel::where('id',1)->first();
        return $this->from($emailfrom)
            ->view('themes.default.mail.tripbooking1',['trip_title'=>$trip_title,'fullname'=>$fullname,'phone'=>$phone,'num_of_person'=>$num_of_person,
            'duration'=>$duration,'arrival_date'=>$arrival_date,'additional_requirement'=>$additional_requirement,'country'=>$country,'data'=>$data
           
            ])->subject($message_subject);
        }
}
