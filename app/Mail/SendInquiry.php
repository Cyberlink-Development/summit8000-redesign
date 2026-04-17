<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Models\Settings\SettingModel;

class SendInquiry extends Mailable
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
        $mail=$request->email;
        $name=$request->name;
        $contact=$request->phone;
        $message=$request->comments;
        $trip=$request->trip_id;
        $email = $data->email_secondary;
        return $this->view('themes.default.mail.SendInquiry',['name'=>$name,'mail'=>$mail,'phone'=>$contact,'messages'=>$message,'trip'=>$trip])->subject('Inquiry')
             ->to($email);
    }
}
