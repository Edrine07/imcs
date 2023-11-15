<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

class CancelledNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $reason;

    public function __construct($reason)
    {
        $this->reason = $reason;
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
        ->content('Dear ' . $this->reason['name'] . ', We regret to inform you that your appointment scheduled at IMMACULATE MEDICO-SURGICAL CLINIC on ' .  $this->reason['date'] . ' at ' .  $this->reason['time'] . ' has been canceled due to: ' . $this->reason['reason'] . '. We apologize for any inconvenience this may cause. Thank you for your understanding.');

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
