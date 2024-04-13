<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserRegistrationNotification implements ShouldQueue
{
    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        $user->notify(new UserRegisteredNotification());
    }
}
