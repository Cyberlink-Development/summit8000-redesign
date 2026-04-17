<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SendMail extends Mailable
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
            'name'=> 'Required',
            'subject'=>'Required',
            'email'=>'Required|email',
            'phone'=>'Required',            
            'message'=>'Required'
            ]);
        $emailfrom = env('MAIL_USERNAME');
        $message_subject = env('MESSAGE_SUBJECT');
        return $this->from($emailfrom)
            ->view('themes.default.mail.contact-message',['name'=>$request->name,'subject'=>$request->subject,'phone'=>$request->phone,'email'=>$request->email,'message'=>$request->message])
            ->subject($message_subject);
    }
}
