<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $unsub_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $unsub_link)
    {
        $this->name = $name;
        $this->unsub_link = $unsub_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Completed')->view('emails.user.registered');
    }
}
