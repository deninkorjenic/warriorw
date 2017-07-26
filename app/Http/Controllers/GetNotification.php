<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetNotification extends Controller
{
    public function getNotifications($markAsRead = 0)
    {

        $notifications = json_encode(auth()->user()->unreadNotifications);

        if($markAsRead) {
            auth()->user()->unreadNotifications->markAsRead();
        }

        echo $notifications;
    }

    public function markAsRead($notificationId)
    {
        foreach(auth()->user()->unreadNotifications as $notification) {
            if($notification->id === $notificationId) {
                $notification->markAsRead();
            }
        }
    }
}
