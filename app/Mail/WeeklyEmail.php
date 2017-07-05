<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeeklyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $unsub_link;
    public $week_description;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $unsub_link, $week_description)
    {
        $this->name = $name;
        $this->unsub_link = $unsub_link;
        $this->week_description = $week_description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Weekly Reminder')->view('emails.reminder');
    }
}
