<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Nuevo cliente registrado';

    public $cliente;

    public function __construct($cliente)
    {
        $this->cliente = $cliente;
    }

    public function build()
    {
        return $this->markdown('mails.UserRegistered');
    }
}
