<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Contact Inquiry')
            ->view('emails.admin-contactmail')
            ->with([
                'name'     => $this->data['full_name'],
                'mail'     => $this->data['email'],
                'country'  => $this->data['country'],
                'contact'  => $this->data['number'],
                'messages' => $this->data['comments'],
            ]);
    }
}
