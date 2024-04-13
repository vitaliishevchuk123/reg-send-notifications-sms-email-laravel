<?php

namespace App\Providers;

use App\Channels\SMSChannel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Notification::extend('sms', function ($app) {
            return new SMSChannel();
        });
    }
}
