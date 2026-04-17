<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;

class UserTripSuggestion extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $setting;
    public $trip;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $trip)
    {
        $this->data = $data;
        $this->trip = $trip;
        $this->setting = SettingModel::find(1);
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject( " {$this->data->name} just shared a trip idea with you!")
            ->view('emails.user-suggestion')
            ->with([
                'data' => $this->data,
                'setting'  => $this->setting,
                'trip' => $this->trip
            ]);
    }
}
