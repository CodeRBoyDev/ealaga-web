<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $userData, $subject)
    {
        $this->userData = $userData;
        $this->subject = $subject;
    }

    public function setUserData($userData)
    {

        $this->userData = $userData;

        // dd($this->userData);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // dd($this->subject);
        return $this->subject($this->subject)
            ->view('email.email_notification')
            ->with('userData', $this->userData);
    }
}
