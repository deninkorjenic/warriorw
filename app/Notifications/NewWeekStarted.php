<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewWeekStarted extends Notification
{
    use Queueable;

    protected $weekNumber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($weekNumber)
    {
        $this->weekNumber = $weekNumber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Week number ' . $this->weekNumber . ' has started.',
        ];
    }
}
