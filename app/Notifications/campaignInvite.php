<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\Models\Campaign;

class campaignInvite extends Notification implements ShouldQueue
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
        //$url = url('brand/campaign/'.$this->thecamp.'/view');
        $body1 = $this->user->brandname.' has invited you to send a proposal for a campaign, kindly view the campaign and send your proposal.';
        $subject = 'You have been invited to apply for a campaign' ;
        $greeting = 'Hello ' .$notifiable->name;
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($body1)
                    ->line('Go to your inbox on Fansloft.com to get more information on the campaign invite.')
                    //->action('View Campaign', $url)
                    ->line('Thank you!');
    }


    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->brandname,
            'message' => $this->user->brandname.' has invited you to send a proposal for a campaign, kindly view the campaign and send your proposal.'
            
        ];
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
}
