<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function build()
    {
        $token = $this->message->token;
        return $this->markdown('emails.message_sent')
                    ->with([
                        'url' => route('messages.show', ['token' => $token]),
                        'token' => $token
                    ]);
    }
}
