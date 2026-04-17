<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Travels\TripModel;
use App\Models\Settings\SettingModel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminTailorMadeMail extends Mailable
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
        if($trip_get){
        $trip_name = $trip_get->trip_title;
        }else{
            $trip_name = 'N/A';
        }
        $num_ppl = $request->num_ppl;
        $duration = $request->duration;
        $start_date = $request->start_date;
        $mail = $request->email;
        $full_name = $request->full_name;
        $country = $request->country;
        $contact = $request->contact;
        $message = $request->message;
        $destination = $request->destination;
        $title = $request->title;
        $email = $data->email_secondary;
        return $this->view('emails.admin-tailormademail', 
        ['duration'=>$duration,'start_date' => $start_date,'num_ppl'=> $num_ppl,'mail' => $mail,
        'full_name'=>$full_name,'country'=>$country,'contact'=>$contact,
        'messages'=>$message,'trip_name'=>$trip_name,'destination'=>$destination,'title'=>$title])->subject('Category Inquiry')->to($email);
    }
}
