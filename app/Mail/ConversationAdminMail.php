<?php

namespace App\Mail;

use App\Models\Conversation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConversationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $conversation;

    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function build()
    {
        return $this->subject('New Conversation Request')
                    ->view('emails.conversation_admin');
    }
}