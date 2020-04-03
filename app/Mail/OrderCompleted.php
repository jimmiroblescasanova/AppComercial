<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

//    public $subject = 'Orden completada';

    public $orden;

    /**
     * Create a new message instance.
     *
     * @param $orden
     */
    public function __construct($orden)
    {
        $this->orden = $orden;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pedido: '. $this->orden->id .' ha sido completado')
            ->markdown('mails.OrderCompleted');
    }
}
