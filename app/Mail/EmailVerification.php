<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $buyer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyer)
    {
        $this->buyer=$buyer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.email_verification')->with([
            'seller' => $this->buyer
        ]);
    }
}
