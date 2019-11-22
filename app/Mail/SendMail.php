<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use App\User;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userOnExp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userOnExp)
    {
        $this->userOnExp = $userOnExp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject('Email Reminder | Notification')
                ->view('emails.sendReminder');
    }
}
