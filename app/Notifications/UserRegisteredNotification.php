<?php

namespace App\Notifications;

use App\Notifications\Messages\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return [
            'mail',
//            'sms'
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Our Application!')
            ->greeting('Hello, ' . $notifiable->name . '!')
            ->line('Welcome to our application. We are excited to have you on board!')
            ->action('Start Exploring', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toSms($notifiable): SmsMessage
    {
        return (new SmsMessage())
            ->line('Hello, ' . $notifiable->name . '!')
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
