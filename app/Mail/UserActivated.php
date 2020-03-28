<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivated extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Tu usuario ha sido activado';

    public $usuario;

    public function __construct($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.usuario-activado', [
            'usuario' => $this->usuario,
        ]);
    }
}
