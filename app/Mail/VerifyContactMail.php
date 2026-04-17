<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $token;
    protected $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $id)
    {
        $this->token = $token;
        $this->id = $id;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $email = $request->email;
        $token = $this->token;
        $user_id = $this->id;
        return $this->view('emails.verify-contact', ['email' => $email, 'token' => $token, 'user_id' => $user_id])->to($email);

    }
}
