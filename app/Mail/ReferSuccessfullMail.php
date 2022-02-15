<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferSuccessfullMail extends Mailable
{
    use Queueable, SerializesModels;
    public $seller1;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller1)
    {
        $this->seller1=$seller1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.refer_successfull_mail')->with([
            'seller' => $this->seller1
        ]);
    }
}
