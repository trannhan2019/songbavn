<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserNotification;
use App\Events\NewUserEvent;
use App\User;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        $admin = User::where('role', 1)->get();

        Notification::send($admin, new NewUserNotification($event->user));
    }
}
