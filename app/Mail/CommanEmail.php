<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommanEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $verification;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verification)
    {
        $this->data = $verification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.commanemail')->subject($this->data['subject'])->with('data', $this->data);;
    }
}
