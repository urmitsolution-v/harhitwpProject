<?php

// app/Mail/ConversationUserMail.php
namespace App\Mail;

use App\Models\Conversation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConversationUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $conversation;

    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function build()
    {
        return $this->subject('We’ve received your message')
            ->view('emails.conversation_user');
    }
}