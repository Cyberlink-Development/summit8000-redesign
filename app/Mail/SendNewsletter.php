<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
      $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
         $news=Newsletter::where('id',$request->news_id)->first();
        $title=$news->title;
        $content=$news->content;
        return $this->view('emails.Test_mail',['title'=>$title,'content' => $content])->subject($title);;
    }
}
