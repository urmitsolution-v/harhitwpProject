<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($subscriber, $type = 'user')
    {
        $this->subscriber = $subscriber;
        $this->type = $type; // 'user' or 'admin'
    }

    /**
     * Build the message.
     */
    public function build()
    {
         if ($this->type === 'admin') {
            return $this->subject('New Subscriber on Codevelop')
                ->view('emails.subscriber_admin');
        }

        return $this->subject('Subscription Confirmation - Codevelop')
            ->view('emails.subscriber_user');
    }
}