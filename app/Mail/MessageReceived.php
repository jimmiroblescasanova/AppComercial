<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;

    /**
     * Create a new message instance.
     *
     * @param $mensaje
     */
    public function __construct($mensaje)
    {
        $this->msg = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mensaje recibido')
            ->markdown('mails.MessageReceived');
    }
}
