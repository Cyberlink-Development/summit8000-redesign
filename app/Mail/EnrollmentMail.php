<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Travels\TripModel;
use App\Models\Settings\SettingModel;

class EnrollmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    public function build(Request $request)
    {
        // dd($request->all());
        $data = SettingModel::where('id',1)->first();

        $email = $data->email_secondary;
        $training_title = $request->training_title;
        return $this->view('emails.admin-bookingmail', [
            'training_title' => $training_title,
            'request' => $request
            
        ])->subject('Trip Booking')->to($email);
    }
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Enrollment Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
