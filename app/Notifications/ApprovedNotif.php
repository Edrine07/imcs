<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

class ApprovedNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['vonage'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
        ->content('Appointment Confirmation: Thank you for making an appointment with IMMACULATE MEDICO-SURGICAL CLINIC on ' . $this->app['date'] . ' at ' . $this->app['time'] . '. Please arrive 10 minutes before the scheduled time. Have a nice day!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
