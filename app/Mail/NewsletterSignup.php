<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class NewsletterSignup extends Mailable
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
        $email = $request->email;
        return $this->view('emails.newsletter-signup', ['email' => $email])->subject('Newsletter Sign Up Confrimation')->to($email);
    }
}
