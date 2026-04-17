<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $token;
    protected $id;
    protected $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $id, $name)
    {
        $this->token = $token;
        $this->id = $id;
        $this->user_name = $name;
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
        return $this->view('emails.verifyuser', ['email' => $email, 'token' => $token, 'user_id' => $user_id])->to($email);
    }
}
