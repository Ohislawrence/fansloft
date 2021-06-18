<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProposalReceived extends Notification
{
    use Queueable;

    public $user;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $body1 = $this->user->brandname.' has approved your proposal, go to your PROPOSAL tab for more info on the campaign. ';
        $greeting = 'Hello,' .$notifiable->name;
        $subject = 'Congratulations, your have one approved proposal' ;
        
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($body1)
                    ->action('Go to your tasks', url('creator/tasks/view'))
                    ->line('Kindly check the campaign and carry out the actions as needed.')
                    ->line('Thank you.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->brandname,
            'message' => $this->user->brandname.' has approved your proposal, go to your PROPOSAL tab for more info on the campaign. '
        ];
    }
}
