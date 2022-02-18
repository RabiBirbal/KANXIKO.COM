<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PointsCreditedSucessfullMail extends Mailable
{
    use Queueable, SerializesModels;
    public $wallet;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($wallet)
    {
        $this->wallet=$wallet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.points_credited_successfull_mail')->with([
            'seller' => $this->wallet
        ]);
    }
}
