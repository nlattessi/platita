<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Gasto;

class RecordatorioServicio extends Mailable
{
    use Queueable, SerializesModels;

    public $gasto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Gasto $gasto)
    {
        $this->gasto = $gasto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('recordatorio@platita.com.ar')
                    ->markdown('emails.recordatorios.servicio');
    }
}
