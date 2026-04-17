<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;

class UserCustomizeTrip extends Mailable
{
    use Queueable, SerializesModels;

    public $customize;
    public $setting;

    /**
     * Create a new message instance.
     */
    public function __construct($customize)
    {
        $this->customize = $customize;
        $this->setting = SettingModel::find(1);
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('We Received Your Customize Trip Request - ' . $this->customize->title)
            ->view('emails.user-customize')
            ->with([
                'customize' => $this->customize,
                'setting'   => $this->setting,
            ]);
    }
}
