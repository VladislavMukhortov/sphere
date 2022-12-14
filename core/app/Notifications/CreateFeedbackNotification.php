<?php

namespace App\Notifications;

use App\Models\Feedback;
use App\Models\User;
use App\Notifications\Traits\FcmNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateFeedbackNotification extends Notification implements ShouldQueue
{
    use Queueable;
    use FcmNotification;

    private string $title;
    private string $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Feedback $feedback)
    {
        $this->title = "У {$user->first_name} {$user->last_name} новый отзыв!";
        $this->body  = $feedback->comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            //
        ];
    }

    public function viaQueues()
    {
        return [
            'mail' => 'mail-queue',
        ];
    }
}
