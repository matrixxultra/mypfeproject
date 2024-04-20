<?php

namespace App\Notifications;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CongratsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $idf;
    public function __construct($id)
    {
        $this->idf = $id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Hello')
                    ->subject('Congratulation')
                    ->line('Congratulation Your Are Accepted In Our School')
                    ->action('Sign in Now', url('/'. base64_encode(Str::random(16))) .'/'.$this->idf."/".base64_encode("Anaidrisschrit5bonbon")."/".base64_encode("hamza_nadi"))
                    ->line('Best Regards!');
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
