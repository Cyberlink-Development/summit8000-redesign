<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;
use App\Models\Travels\TripModel;

class AdminFilmMakingMail extends Mailable
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
        $data = SettingModel::where('id',1)->first();
        $trip_get = TripModel::where('id',$request->trip_id)->first();
        $trip_name = $trip_get->trip_title;
        $num_ppl = $request->num_ppl;
        $duration = $request->duration;
        $start_date = $request->start_date;
        $mail = $request->email;
        $full_name = $request->full_name;
        $country = $request->country;
        $contact = $request->contact;
        $message = $request->message;
        $email = $data->email_secondary;
        return $this->view('emails.admin-filmmakingmail', 
        ['duration'=>$duration,'start_date' => $start_date,'num_ppl'=> $num_ppl,'mail' => $mail,
        'full_name'=>$full_name,'country'=>$country,'contact'=>$contact,'messages'=>$message,'trip_name'=>$trip_name])->to($email);
    }
}
