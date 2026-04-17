<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CareerApply extends Mailable
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
            'phone'=>'Required',
            'email'=>'Required|email'
            ]);
        $emailfrom = env('MAIL_USERNAME');
        return $this->from($emailfrom)
            ->view('themes.default.mail.appication-template',['career_title'=>$request->career_title,'first_name'=>$request->first_name,'last_name'=>$request->last_name,'phone'=>$request->phone,'email'=>$request->email,'position_applied'=>$request->position_applied,'description'=>$request->description])
            ->subject('Applied Position');
    }
}
