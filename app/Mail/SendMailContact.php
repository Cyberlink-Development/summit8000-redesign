<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SendMailContact extends Mailable
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
            'full_name'=> 'Required',
            'country'=>'Required',
            'email_address'=>'Required',
            'phone'=>'Required',            
            'comments'=>'Required'
            ]);
        $emailfrom = env('MAIL_USERNAME');
        $message_subject = env('MESSAGE_SUBJECT');
        return $this->from($emailfrom)
            ->view('themes.default.mail.contact-message2',['full_name'=>$request->full_name,'country'=>$request->country,'phone'=>$request->phone,'email_address'=>$request->email_address,'comments'=>$request->comments])
            ->subject($message_subject);
    }
}
