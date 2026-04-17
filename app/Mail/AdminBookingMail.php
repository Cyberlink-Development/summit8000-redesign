<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Travels\TripModel;
use App\Models\Settings\SettingModel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminBookingMail extends Mailable
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
        // dd($request->all());
        $data = SettingModel::where('id',1)->first();
        $tripData = TripModel::where('id',$request->trip)->first();
        $trip_name = $tripData->trip_title;


        // $email = $data->email_secondary;
        $email = 'anilcyberlink@gmail.com';
        
        return $this->view('emails.admin-bookingmail', [
            'trip_name' => $trip_name, 
        
            'request' => $request
            
        ])->subject('Trip Booking')->to($email)->from('anilkafle22@gmail.com');
    }
}
